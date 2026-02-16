<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentExamAccess extends Model
{
    protected $table = 'student_exam_access';

    protected $fillable = ['students_id', 'years_id', 'months_id', 'exams_id', 'faculty_id', 'semesters_id', 'visible'];

    protected $casts = ['visible' => 'boolean'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'students_id', 'id');
    }

    /**
     * Check if exam result is visible for this student (parent/student can view).
     * Returns true if visible, false if blocked (show pay fee message).
     */
    public static function isVisible($studentId, $year, $month, $exam, $faculty, $semester)
    {
        $record = self::where('students_id', $studentId)
            ->where('years_id', $year)
            ->where('months_id', $month)
            ->where('exams_id', $exam)
            ->where('faculty_id', $faculty)
            ->where('semesters_id', $semester)
            ->first();

        return $record ? (bool) $record->visible : true;
    }
}
