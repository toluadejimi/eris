<?php
namespace App\Traits;

use App\Models\Faculty;
use App\Models\Semester;
use App\Models\StudentBatch;
use App\Models\StudentStatus;
use Illuminate\Support\Arr;

trait FacultySemesterScope{

    public function activeFaculties()
    {
        $faculty = Faculty::Active()->orderBy('faculty')->pluck('faculty','id')->toArray();
         return Arr::prepend($faculty, 'Select Class', '');
    }

    public function activeSemester()
    {
        $semester = Semester::select('id', 'semester')->Active()->pluck('semester','id')->toArray();
        return Arr::prepend($semester, 'Select Semester', '');
    }

    public function activeBatch()
    {
        $studentBatch = StudentBatch::select('id', 'title')->Active()->pluck('title','id')->toArray();
        return Arr::prepend($studentBatch, 'Select Batch', '');
    }

    public function activeStudentAcademicStatus()
    {
        $status = StudentStatus::Active()->orderBy('title')->pluck('title','id')->toArray();
        return Arr::prepend($status, 'Select Academic Status', '');
    }

    public function getFacultyTitle($id)
    {
        $faculty = Faculty::find($id);
        if ($faculty) {
            return $faculty->faculty;
        }else{
            return "Unknown";
        }
    }

    public function getSemesterById($id)
    {
        $semester = Semester::find($id);
        if ($semester) {
            return $semester->semester;
        }else{
            return "";
        }
    }

    public function getSemesterTitle($id)
    {
        $semester = Semester::find($id);
        if ($semester) {
            return $semester->semester;
        }else{
            return "Unknown";
        }
    }

}