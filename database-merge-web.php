<?php
/**
 * Web-based database merge for shared hosting (no terminal).
 * 
 * SETUP:
 * 1. Edit the config below with your DB credentials
 * 2. Set a strong RUN_KEY (e.g. random string) - required to run the merge
 * 3. Upload this file to a SECURE location (e.g. /merge/ folder, outside public_html if possible)
 * 4. Run: https://yoursite.com/merge/database-merge-web.php?key=YOUR_RUN_KEY
 * 5. DELETE this file after the merge is complete (security)
 * 
 * PREREQUISITES:
 * - Run the years_id migration on target DB first (see DATABASE_MERGE_MIGRATION_PLAN.md)
 * - Backup all databases via phpMyAdmin before running
 */

// ============ CONFIG – EDIT THESE ============
$config = [
    'host'     => 'localhost',
    'username' => 'your_db_user',
    'password' => 'your_db_password',
    
    'target_db' => 'eriscomn_2025_2026',
    'sources'   => [
        'eriscomn_2022_2023' => '2022_2023',
        'eriscomn_2023_2024' => '2023_2024',
        'eriscomn_2024_2025' => '2024_2025',
    ],
    
    'run_key' => 'CHANGE_ME_TO_RANDOM_STRING',  // Required to execute. Use something like: MyS3cr3tM3rg3K3y2025
];

// ============ DO NOT EDIT BELOW ============
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');

$key = $_GET['key'] ?? '';
$dryRun = isset($_GET['dry_run']);
$execute = isset($_GET['execute']) && $key === $config['run_key'];

if ($key !== $config['run_key'] && !$dryRun) {
    echo '<!DOCTYPE html><html><head><title>DB Merge</title></head><body>';
    echo '<h2>Database Merge Tool</h2>';
    echo '<p>Add <code>?key=YOUR_RUN_KEY</code> to the URL to run.</p>';
    echo '<p>For dry run: <code>?dry_run=1</code></p>';
    echo '</body></html>';
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Database Merge</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 2rem auto; padding: 0 1rem; }
        h2 { color: #0f766e; }
        .ok { color: #059669; }
        .warn { color: #d97706; }
        .err { color: #dc2626; }
        pre { background: #f1f5f9; padding: 1rem; overflow-x: auto; }
        .btn { display: inline-block; padding: 0.5rem 1rem; margin: 0.25rem; text-decoration: none; border-radius: 6px; }
        .btn-dry { background: #e0f2f1; color: #0f766e; }
        .btn-run { background: #dc2626; color: white; }
    </style>
</head>
<body>
<h2>Database Merge Tool</h2>
<?php

$targetConn = null;
$errors = [];

try {
    $targetConn = new PDO(
        "mysql:host={$config['host']};dbname={$config['target_db']};charset=utf8mb4",
        $config['username'],
        $config['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    $errors[] = "Cannot connect to target: " . $e->getMessage();
}

$hasYearsId = false;
if ($targetConn) {
    try {
        $r = $targetConn->query("SHOW COLUMNS FROM students LIKE 'years_id'");
        $hasYearsId = $r && $r->rowCount() > 0;
    } catch (Exception $e) {
        $errors[] = "students table check failed: " . $e->getMessage();
    }
}

if ($errors) {
    echo '<p class="err">' . implode('<br>', $errors) . '</p>';
    echo '</body></html>';
    exit;
}

if (!$hasYearsId) {
    echo '<p class="err">students table does not have years_id. Run the migration first via Laravel or phpMyAdmin.</p>';
    echo '<pre>ALTER TABLE students ADD COLUMN years_id INT UNSIGNED NULL AFTER batch;</pre>';
    echo '</body></html>';
    exit;
}

echo '<p class="ok">Target DB: ' . htmlspecialchars($config['target_db']) . '</p>';

$results = [];
foreach ($config['sources'] as $dbName => $yearTitle) {
    try {
        $src = new PDO(
            "mysql:host={$config['host']};dbname={$dbName};charset=utf8mb4",
            $config['username'],
            $config['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        
        $yearId = $targetConn->query("SELECT id FROM years WHERE title = " . $targetConn->quote($yearTitle))->fetchColumn();
        if (!$yearId) {
            $results[] = ["{$dbName} ({$yearTitle})" => ['status' => 'skip', 'msg' => "Year '{$yearTitle}' not in years table"]];
            continue;
        }
        
        $studentCount = $src->query("SELECT COUNT(*) FROM students")->fetchColumn();
        $examCount = $src->query("SELECT COUNT(*) FROM exam_schedules")->fetchColumn();
        $ledgerCount = $src->query("SELECT COUNT(*) FROM exam_mark_ledgers")->fetchColumn();
        
        $results[] = [
            "{$dbName} ({$yearTitle})" => [
                'status' => 'ready',
                'students' => $studentCount,
                'exam_schedules' => $examCount,
                'exam_mark_ledgers' => $ledgerCount,
            ]
        ];
        
    } catch (PDOException $e) {
        $results[] = ["{$dbName}" => ['status' => 'error', 'msg' => $e->getMessage()]];
    }
}

echo '<h3>Source databases</h3><ul>';
foreach ($results as $r) {
    foreach ($r as $name => $data) {
        echo '<li><strong>' . htmlspecialchars($name) . '</strong>: ';
        if ($data['status'] === 'ready') {
            echo '<span class="ok">' . $data['students'] . ' students, ' . $data['exam_schedules'] . ' exam schedules, ' . $data['exam_mark_ledgers'] . ' mark ledgers</span>';
        } elseif ($data['status'] === 'skip') {
            echo '<span class="warn">' . htmlspecialchars($data['msg']) . '</span>';
        } else {
            echo '<span class="err">' . htmlspecialchars($data['msg']) . '</span>';
        }
        echo '</li>';
    }
}
echo '</ul>';

if ($execute) {
    echo '<h3>Executing merge…</h3><pre>';
    flush();
    
    foreach ($config['sources'] as $dbName => $yearTitle) {
        echo "\n--- {$dbName} ({$yearTitle}) ---\n";
        try {
            $src = new PDO(
                "mysql:host={$config['host']};dbname={$dbName};charset=utf8mb4",
                $config['username'],
                $config['password'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
            
            $yearId = $targetConn->query("SELECT id FROM years WHERE title = " . $targetConn->quote($yearTitle))->fetchColumn();
            if (!$yearId) {
                echo "Skip: year not found\n";
                continue;
            }
            
            $studentMap = [];
            $checkStmt = $targetConn->prepare("SELECT id FROM students WHERE reg_no = ?");
            $stmt = $src->query("SELECT * FROM students");
            $firstRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $inserted = 0;
            $reused = 0;
            if ($firstRow) {
                $cols = array_keys($firstRow);
                $cols = array_diff($cols, ['id']);
                if (!in_array('years_id', $cols)) $cols[] = 'years_id';
                $placeholders = implode(',', array_fill(0, count($cols), '?'));
                $ins = $targetConn->prepare("INSERT INTO students (" . implode(',', $cols) . ") VALUES ($placeholders)");
                do {
                    $row = $firstRow;
                    $oldId = $row['id'];
                    $regNo = $row['reg_no'];
                    $checkStmt->execute([$regNo]);
                    $existingId = $checkStmt->fetchColumn();
                    if ($existingId) {
                        $studentMap[$oldId] = (int) $existingId;
                        $reused++;
                    } else {
                        unset($row['id']);
                        $row['years_id'] = $yearId;
                        $ins->execute(array_values($row));
                        $studentMap[$oldId] = (int) $targetConn->lastInsertId();
                        $inserted++;
                    }
                } while ($firstRow = $stmt->fetch(PDO::FETCH_ASSOC));
            }
            echo "Students: " . count($studentMap) . " (inserted: {$inserted}, reused: {$reused})\n";
            
            $schedMap = [];
            $schedRows = $src->query("SELECT * FROM exam_schedules")->fetchAll(PDO::FETCH_ASSOC);
            $cols = array_keys($schedRows[0] ?? []);
            $cols = array_diff($cols, ['id']);
            if (!in_array('years_id', $cols)) $cols[] = 'years_id';
            $placeholders = implode(',', array_fill(0, count($cols), '?'));
            $insSched = $targetConn->prepare("INSERT INTO exam_schedules (" . implode(',', $cols) . ") VALUES ($placeholders)");
            foreach ($schedRows as $row) {
                $oldId = $row['id'];
                unset($row['id']);
                $row['years_id'] = $yearId;
                $vals = array_values($row);
                $insSched->execute(array_values($row));
                $schedMap[$oldId] = $targetConn->lastInsertId();
            }
            echo "Exam schedules: " . count($schedMap) . "\n";
            
            $ledgerCount = 0;
            $ledgers = $src->query("SELECT * FROM exam_mark_ledgers")->fetchAll(PDO::FETCH_ASSOC);
            $lCols = array_diff(array_keys($ledgers[0] ?? []), ['id']);
            $insLedger = $targetConn->prepare("INSERT INTO exam_mark_ledgers (" . implode(',', $lCols) . ") VALUES (" . implode(',', array_fill(0, count($lCols), '?')) . ")");
            foreach ($ledgers as $row) {
                $sid = $studentMap[$row['students_id']] ?? null;
                $eid = $schedMap[$row['exam_schedule_id']] ?? null;
                if ($sid && $eid) {
                    unset($row['id']);
                    $row['students_id'] = $sid;
                    $row['exam_schedule_id'] = $eid;
                    $insLedger->execute(array_values($row));
                    $ledgerCount++;
                }
            }
            echo "Exam mark ledgers: {$ledgerCount}\n";
            
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage() . "\n";
        }
    }
    echo "\n--- Done ---\n";
    echo '</pre><p class="ok"><strong>Merge complete.</strong> Delete this file for security.</p>';
} else {
    echo '<p><a href="?dry_run=1' . ($key ? '&key=' . urlencode($key) : '') . '" class="btn btn-dry">Dry run (no changes)</a></p>';
    if ($key === $config['run_key']) {
        echo '<p><a href="?execute=1&key=' . urlencode($key) . '" class="btn btn-run" onclick="return confirm(\'Backup done? This will INSERT data.\')">Execute merge</a></p>';
    }
}
?>
</body>
</html>
