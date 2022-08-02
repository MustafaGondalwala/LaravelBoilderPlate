<?php

namespace Database\Seeders;

use App\Models\RedirectionReason;
use Illuminate\Database\Seeder;

class RedirectionReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reason = [
            'Requested by student',
            'Requested by university',
            'Wrong question',
            'Duplicate question',
            'Incomplete question',
        ];
        foreach ($reason as $r) {
            RedirectionReason::firstOrCreate([
                'name' => $r,
            ], [
                'name' => $r,
            ]);
        }
    }
}
