<?php
/**
 * Merge verification – diagnose why mark ledgers may be missing after merge.
 *
 * For shared hosting: run via browser
 *   https://yoursite.com/merge-verify.php?student_id=9
 * Optional: add ?key=YOUR_RUN_KEY for security (set $run_key below)
 *
 * Uses .env DB config. Place in project root or a folder accessible via URL.
 * DELETE after use (security).
 */

header('Content-Type: text/html; charset=utf-8');

$run_key = 'CHANGE_ME';  // Optional: set to a secret, then use ?key=... in URL
$key = $_GET['key'] ?? '';
if ($run_key !== 'CHANGE_ME' && $key !== $run_key) {
    echo '<!DOCTYPE html><html><head><title>Merge Verify</title></head><body>';
    echo '<h2>Merge Verification</h2><p>Add <code>?key=YOUR_RUN_KEY</code> to the URL.</p></body></html>';
    exit;
}

// Load .env (project root or parent if in public/)
$envFile = file_exists(__DIR__ . '/.env') ? __DIR__ . '/.env' : (file_exists(__DIR__ . '/../.env') ? __DIR__ . '/../.env' : null);
if ($envFile) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (preg_match('/^(\w+)=(.*)$/', $line, $m)) putenv(trim($m[1]) . '=' . trim($m[2], " \t\n\r\0\x0B\"'"));
    }
}

$config = [
    'host' => getenv('DB_HOST') ?: 'localhost',
    'username' => getenv('DB_USERNAME') ?: 'root',
    'password' => getenv('DB_PASSWORD') ?: '',
    'database' => getenv('DB_DATABASE') ?: 'eriscomn_2025_2026',
];

$studentId = isset($_GET['student_id']) ? (int) $_GET['student_id'] : 9;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Merge Verification</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 2rem auto; padding: 0 1rem; }
        h2 { color: #0f766e; }
        pre { background: #f1f5f9; padding: 1rem; overflow-x: auto; }
        .err { color: #dc2626; }
    </style>
</head>
<body>
<h2>Merge Verification for Student ID <?= (int) $studentId ?></h2>
<pre>
<?php

try {
    $pdo = new PDO(
        "mysql:host={$config['host']};dbname={$config['database']};charset=utf8mb4",
        $config['username'],
        $config['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    echo "DB connection failed: " . htmlspecialchars($e->getMessage());
    echo "\n\nCheck .env (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD) or edit \$config in this file.";
    echo '</pre></body></html>';
    exit;
}

// 1. Student info
$hasYearsId = false;
try {
    $pdo->query("SELECT years_id FROM students LIMIT 1");
    $hasYearsId = true;
} catch (PDOException $e) { /* column may not exist */ }
$cols = $hasYearsId ? 'id, reg_no, first_name, middle_name, last_name, faculty, semester, years_id' : 'id, reg_no, first_name, middle_name, last_name, faculty, semester';
$stmt = $pdo->prepare("SELECT {$cols} FROM students WHERE id = ?");
$stmt->execute([$studentId]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$student) {
    echo "ERROR: Student {$studentId} not found.";
    echo '</pre></body></html>';
    exit;
}
echo "Student: " . htmlspecialchars($student['reg_no']) . " – " . htmlspecialchars($student['first_name'] . ' ' . $student['middle_name'] . ' ' . $student['last_name']) . "\n";
echo "Faculty: {$student['faculty']}, Semester: {$student['semester']}\n";
echo "years_id: " . (isset($student['years_id']) ? $student['years_id'] : 'N/A (column not in schema)') . "\n\n";

// 2. Total mark ledgers
$totalLedgers = $pdo->prepare("SELECT COUNT(*) FROM exam_mark_ledgers WHERE students_id = ?");
$totalLedgers->execute([$studentId]);
$totalLedgers = $totalLedgers->fetchColumn();
echo "Total mark ledgers for this student: {$totalLedgers}\n";

if ($totalLedgers === 0) {
    echo "\n>>> Student has NO mark ledger entries at all.\n";
    echo "    Possible causes:\n";
    echo "    1. Marks were never entered for this student\n";
    echo "    2. Merge did not bring ledgers over (student/schedule mapping failed)\n";
    echo "    3. Student is from current year only – no historical marks to merge\n\n";
}

// 3. Ledgers by year
$stmt = $pdo->prepare("
    SELECT es.years_id, COUNT(*) as cnt
    FROM exam_mark_ledgers eml
    JOIN exam_schedules es ON es.id = eml.exam_schedule_id
    WHERE eml.students_id = ?
    GROUP BY es.years_id
");
$stmt->execute([$studentId]);
$ledgersByYear = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

echo "\nMark ledgers by year:\n";
if (empty($ledgersByYear)) {
    echo "  (none)\n";
} else {
    foreach ($ledgersByYear as $yid => $cnt) {
        $y = $pdo->prepare("SELECT title FROM years WHERE id = ?");
        $y->execute([$yid]);
        $yearTitle = $y->fetchColumn() ?: '?';
        echo "  years_id {$yid} ({$yearTitle}): {$cnt}\n";
    }
}

// 4. Exam schedules by year
echo "\nPublished exam schedules by year:\n";
$stmt = $pdo->query("
    SELECT years_id, COUNT(*) as cnt FROM exam_schedules
    WHERE publish_status = 1
    GROUP BY years_id
    ORDER BY years_id
");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $y = $pdo->prepare("SELECT title FROM years WHERE id = ?");
    $y->execute([$row['years_id']]);
    $yearTitle = $y->fetchColumn() ?: '?';
    echo "  years_id {$row['years_id']} ({$yearTitle}): {$row['cnt']} schedules\n";
}

echo "\n=== Done ===";
echo "\n\nTip: Try ?student_id=123 for another student. Delete this file when finished.";
?>
</pre>
</body>
</html>
