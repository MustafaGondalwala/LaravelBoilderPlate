<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SubjectSeeder::class,
            SourceTypeSeeder::class,
            DeviceTypeSeeder::class,
            AdminSeeder::class,
            TutorSeeder::class,
            RedirectionReasonSeeder::class,
            QuestionSeeder::class,
        ]);
    }
}
