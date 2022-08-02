<?php

namespace Database\Seeders;

use App\Models\SourceType;
use Illuminate\Database\Seeder;

class SourceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
            'Admin Single Question Uploader',
            'Form - Homepage',
            'Link - Homepage',
            'Form - All QnA page',
            'Form - Subject page',
            'Form - Solved Question page',
            'Form - Unsolved Question page',
            'Link - Solved Question page',
            'Link - Unsolved Question page',
        ];
        foreach ($sources as $s) {
            SourceType::firstOrCreate([
                'name' => $s,
            ], [
                'name' => $s,
            ]);
        }
    }
}
