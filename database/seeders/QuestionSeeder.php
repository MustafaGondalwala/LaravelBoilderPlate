<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\DeviceType;
use App\Models\RedirectionReason;
use App\Models\SourceType;
use App\Models\SubjectMaster;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::first();
        foreach (range(0, 5) as $i) {
            $title = fake()->sentence();
            $question = $admin->question()->create([
                'subject_id' => SubjectMaster::inRandomOrder()->first()->id,
                'title' => $title,
                'description' => fake()->text(),
                'slug' => Str::slug($title),
            ]);

            foreach (range(0, 5) as $j) {
                $question->attachment()->create([
                    'file_url' => 'https://source.unsplash.com/random/200x200?sig=1',
                ]);
            }
            $question->details()->create([
                'source_type_id' => SourceType::inRandomOrder()->first()->id,
                'device_type_id' => DeviceType::inRandomOrder()->first()->id,
                'redirection_reason_id' => RedirectionReason::inRandomOrder()->first()->id,
                'comment' => fake()->text(),
            ]);
        }
    }
}
