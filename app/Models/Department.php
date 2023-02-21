<?php

namespace App\Models;


class Department extends Model
{
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
