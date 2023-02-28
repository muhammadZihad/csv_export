<?php

namespace App\Models;

use App\Services\CsvImport\ImportableInterface;

class Student extends Model implements ImportableInterface
{
    protected $primaryKey = 'student_id';

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject', 'student_id');
    }

    public function getExportableData(): array
    {
        return [
            $this->first_name,
            $this->last_name,
            $this->student_id,
            $this->age,
            $this->department,
            $this->subjects
        ];
    }
}
