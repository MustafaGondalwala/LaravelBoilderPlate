<?php

namespace Database\Seeders;

use App\Models\DeviceType;
use Illuminate\Database\Seeder;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $device_types = [
            'Desktop',
            'Mobile',
            'Others',
        ];
        foreach ($device_types as $device) {
            DeviceType::firstOrCreate([
                'name' => $device,
            ], [
                'name' => $device,
            ]);
        }
    }
}
