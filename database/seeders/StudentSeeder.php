<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = Department::select('id')->get();
        $counter = 5000;

        do {
            // Create 5000 students at a time
            Student::factory()
                ->count(5000)
                ->state(new Sequence(function ($sequence) use ($departments) {
                    return ['department_id' => $departments->random()->id];
                }))
                ->create();
            $counter = $counter + 5000;
        } while ($counter <= 10000);
    }
}
