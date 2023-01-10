<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamMarkLedger extends BaseModel
{
    protected $fillable = ['created_by', 'last_updated_by', 'exam_schedule_id','students_id', 'obtain_mark_theory',
        'absent_theory','obtain_mark_practical',  'ca_test1','ca_test2','assign','class_exe','affective','physc','total','absent_practical', 'sorting_order', 'status'];

    public function students()
    {
        return $this->belongsTo(Student::class, 'id','students_id');
    }

    public function examSchedule()
    {
        return $this->belongsTo(ExamSchedule::class, 'exam_schedule_id','id');
    }


}
