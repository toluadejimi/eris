<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

/**
 * Merges historical academic-year databases into the default database.
 * 
 * Prerequisites:
 * - Add source DB connections to config/database.php (see DATABASE_MERGE_MIGRATION_PLAN.md)
 * - Run migration: add_years_id_to_students_for_merge
 * - Backup all databases before running
 * 
 * Usage: php artisan db:merge-historical --dry-run
 *        php artisan db:merge-historical
 */
class MergeHistoricalDatabases extends Command
{
    protected $signature = 'db:merge-historical 
                            {--dry-run : Show what would be merged without making changes}
                            {--year= : Merge only this year key (e.g. 2022_2023)}';

    protected $description = 'Merge historical academic-year databases into the default database';

    /** Source databases: connection_name => years table title for that DB */
    protected $sources = [
        'session_2022_2023' => '2022_2023',
        'session_2023_2024' => '2023_2024',
        'session_2024_2025' => '2024_2025',
        // Add more as needed - these must exist in config/database.php
    ];

    protected $studentIdMap = [];
    protected $examScheduleIdMap = [];

    public function handle()
    {
        $dryRun = $this->option('dry-run');
        $yearFilter = $this->option('year');

        if ($dryRun) {
            $this->warn('DRY RUN – no changes will be made');
        }

        $targetConn = Config::get('database.default');
        $this->info("Target database: {$targetConn}");

        foreach ($this->sources as $connName => $yearTitle) {
            if ($yearFilter && $yearTitle !== $yearFilter) {
                continue;
            }
            if (!array_key_exists($connName, Config::get('database.connections'))) {
                $this->warn("Skipping {$connName} – connection not configured");
                continue;
            }
            $this->info("Processing {$connName} (year: {$yearTitle})...");
            $this->mergeYear($connName, $yearTitle, $dryRun);
        }

        $this->info($dryRun ? 'Dry run complete.' : 'Merge complete.');
        return 0;
    }

    protected function mergeYear(string $sourceConn, string $yearTitle, bool $dryRun): void
    {
        $this->studentIdMap = [];
        $this->examScheduleIdMap = [];

        $yearId = DB::connection(Config::get('database.default'))
            ->table('years')
            ->where('title', $yearTitle)
            ->value('id');

        if (!$yearId) {
            $this->error("Year '{$yearTitle}' not found in years table. Add it first.");
            return;
        }

        $source = DB::connection($sourceConn);

        if ($dryRun) {
            $studentCount = $source->table('students')->count();
            $examCount = $source->table('exam_schedules')->count();
            $this->line("  Would merge: {$studentCount} students, {$examCount} exam schedules");
            return;
        }

        $this->mergeStudents($source, $sourceConn, $yearId);
        $this->mergeExamSchedules($source, $sourceConn, $yearId);
        $this->mergeExamMarkLedgers($source, $sourceConn);
        $this->mergeAttendances($source, $sourceConn, $yearId);
    }

    protected function mergeStudents($source, string $sourceConn, int $yearId): void
    {
        $students = $source->table('students')->get();
        foreach ($students as $row) {
            $data = (array) $row;
            $oldId = $data['id'];
            unset($data['id']);
            $data['years_id'] = $yearId;
            $newId = DB::connection(Config::get('database.default'))
                ->table('students')
                ->insertGetId($data);
            $this->studentIdMap["{$sourceConn}_{$oldId}"] = $newId;
        }
    }

    protected function mergeExamSchedules($source, string $sourceConn, int $yearId): void
    {
        $rows = $source->table('exam_schedules')->get();
        foreach ($rows as $row) {
            $data = (array) $row;
            $oldId = $data['id'];
            unset($data['id']);
            $data['years_id'] = $yearId;
            $newId = DB::connection(Config::get('database.default'))
                ->table('exam_schedules')
                ->insertGetId($data);
            $this->examScheduleIdMap["{$sourceConn}_{$oldId}"] = $newId;
        }
    }

    protected function mergeExamMarkLedgers($source, string $sourceConn): void
    {
        $rows = $source->table('exam_mark_ledgers')->get();
        foreach ($rows as $row) {
            $data = (array) $row;
            unset($data['id']);
            $key = "{$sourceConn}_{$data['students_id']}";
            $schedKey = "{$sourceConn}_{$data['exam_schedule_id']}";
            if (isset($this->studentIdMap[$key], $this->examScheduleIdMap[$schedKey])) {
                $data['students_id'] = $this->studentIdMap[$key];
                $data['exam_schedule_id'] = $this->examScheduleIdMap[$schedKey];
                DB::connection(Config::get('database.default'))
                    ->table('exam_mark_ledgers')
                    ->insert($data);
            }
        }
    }

    protected function mergeAttendances($source, string $sourceConn, int $yearId): void
    {
        $rows = $source->table('attendances')->get();
        foreach ($rows as $row) {
            $data = (array) $row;
            unset($data['id']);
            $data['years_id'] = $yearId;
            // attendees_type 1 = student, link_id = student id
            if ($data['attendees_type'] == 1) {
                $key = "{$sourceConn}_{$data['link_id']}";
                if (isset($this->studentIdMap[$key])) {
                    $data['link_id'] = $this->studentIdMap[$key];
                    DB::connection(Config::get('database.default'))
                        ->table('attendances')
                        ->insert($data);
                }
            }
            // attendees_type 2 = staff – add staff ID mapping if merging staff tables
        }
    }
}
