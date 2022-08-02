<?php

namespace Database\Seeders;

use App\Models\SubjectMaster;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            'Accounting',
            'Economics',
            'Finance',
            'Humanities',
            'Management',
            'Statistics',
            'Artificial Intelligence',
            'Biology',
            'Chemistry',
            'Civil Engineering',
            'Computer Science',
            'Electrical Engineering',
            'Mathematics',
            'Mechanical Engineering',
            'Physics',
            'Others',
        ];
        foreach ($subjects as $s) {
            SubjectMaster::firstOrCreate([
                'name' => $s,
            ], [
                'name' => $s,
            ]);
        }
    }
}
