<?php

namespace App\Models;


class Student extends Model
{
    protected $primaryKey = 'student_id';

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject', 'student_id');
    }
}
