<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentExamAccessTable extends Migration
{
    public function up()
    {
        Schema::create('student_exam_access', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('students_id');
            $table->unsignedInteger('years_id');
            $table->unsignedInteger('months_id');
            $table->unsignedInteger('exams_id');
            $table->unsignedInteger('faculty_id');
            $table->unsignedInteger('semesters_id');
            $table->boolean('visible')->default(1)->comment('1=parent/student can see result, 0=show pay fee message');
            $table->timestamps();

            $table->unique(['students_id', 'years_id', 'months_id', 'exams_id', 'faculty_id', 'semesters_id'], 'student_exam_unique');
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_exam_access');
    }
}
