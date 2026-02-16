<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Add years_id to students table for multi-year merge support.
 * Run this on the TARGET (merged) database before importing historical data.
 * After merge, backfill years_id for all student records.
 */
class AddYearsIdToStudentsForMerge extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedInteger('years_id')->nullable()->after('batch');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('years_id');
        });
    }
}
