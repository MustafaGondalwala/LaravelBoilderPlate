<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlans;
use App\Models\SubscriptionStatus;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            'Active',
            'Canceled',
            'Expired',
        ];
        foreach ($status as $s) {
            SubscriptionStatus::firstOrCreate([
                'name' => $s,
            ], [
                'name' => $s,
            ]);
        }

        $plans = [
            [
                'name' => 'Premium Subscription - Monthly',
                'price' => 19.99,
                'frequency_days' => 30,
                'free_trial_days' => 0,
            ],
            [
                'name' => 'Premium Subscription - Yearly',
                'price' => 240,
                'frequency_days' => 365,
                'free_trial_days' => 0,
            ],
        ];
        foreach ($plans as $plan) {
            SubscriptionPlans::firstOrCreate([
                'name' => $plan['name'],
            ], [
                'name' => $plan['name'],
                'price' => $plan['price'],
                'frequency_days' => $plan['frequency_days'],
                'free_trial_days' => $plan['free_trial_days'],
            ]);
        }
    }
}
