<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 subjects
        Subject::factory()->count(10)->create();
        // Get all the subjects array
        $subjects =  Subject::select('id')->get()->pluck('id')->toArray();
        // Attach subjects for all the student in chunk
        Student::select('student_id')->chunk(2000, function ($students) use ($subjects) {
            foreach ($students as $student) {
                // Attach 1-5 subjects for each students
                $student->subjects()->attach(Arr::random($subjects, random_int(1, 5)));
            }
        });
    }
}
