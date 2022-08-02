<?php

namespace Database\Seeders;

use App\Models\Tutor;
use App\Models\TutorVerificationStatus;
use Illuminate\Database\Seeder;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $verification_statuses = [
            'Under Verification',
            'Approved',
            'Clarification Required',
            'Rejected',
        ];
        foreach ($verification_statuses as $verification_status) {
            TutorVerificationStatus::firstOrCreate([
                'name' => $verification_status,
            ], [
                'name' => $verification_status,
            ]);
        }
        foreach (range(1, 5) as $i) {
            $tutor = Tutor::factory()->create();
            $tutor->bank()->create([
                'ac_name' => fake()->word(),
                'ac_number' => fake()->word(),
                'bank_name' => fake()->word(),
                'ifsc' => fake()->word(),
                'pan' => fake()->word(),
                'pan_file' => 'https://source.unsplash.com/random/200x200?sig=1',
                'cheque_file' => 'https://source.unsplash.com/random/200x200?sig=1',
                'verification_status_id' => TutorVerificationStatus::where(['name' => 'Approved'])->first()->id,
            ]);
            $tutor->education()->create([
                'degree1' => fake()->word(),
                'college1' => fake()->word(),
                'year1' => fake()->year(),
                'degree_file_url1' => 'https://source.unsplash.com/random/200x200?sig=1',
                'degree2' => fake()->word(),
                'college2' => fake()->word(),
                'year2' => fake()->year(),
                'degree_file_url2' => 'https://source.unsplash.com/random/200x200?sig=1',
                'subjects' => json_encode(['english', 'maths', 'science']),
                'verification_status_id' => TutorVerificationStatus::where(['name' => 'Approved'])->first()->id,
            ]);
            $tutor->calarification()->create([
                'section_number' => fake()->randomDigit(),
                'clarification_msg' => fake()->text(),
            ]);
        }
    }
}
