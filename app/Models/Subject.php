<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends BaseModel
{
    protected $fillable = ['created_by', 'last_updated_by', 'title', 'code', 
    'full_mark_theory', 'pass_mark_theory',
    'full_mark_ca_test1', 'pass_mark_ca_test1', 
    'full_mark_ca_test2', 'pass_mark_ca_test2', 
    'full_mark_assign', 'pass_mark_assign', 
    'full_mark_class_exe', 'pass_mark_class_exe', 
    'full_mark_affective', 'pass_mark_affective', 
    'full_mark_physc', 'pass_mark_physc', 
    'full_mark_practical', 'pass_mark_practical', 'credit_hour', 'sub_type', 'class_type', 'staff_id',
    'description', 'status'];


    public function semester()
    {
        return $this->belongsToMany(Semester::class);
    }
}
