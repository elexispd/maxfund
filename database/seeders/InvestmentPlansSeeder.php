<?php

namespace Database\Seeders;

use App\Models\InvestmentPlan;
use Illuminate\Database\Seeder;

class InvestmentPlansSeeder extends Seeder
{
    public function run()
    {
        $plans = [
            [
                'name' => 'Beginner Plan',
                'slug' => 'beginner-plan',
                'min_amount' => 50,
                'max_amount' => 5000,
                'interest_rate' => 5.5,
                'duration_days' => 7,
            ],
            [
                'name' => 'Amateur Plan',
                'slug' => 'amateur-plan',
                'min_amount' => 5000,
                'max_amount' => 50000,
                'interest_rate' => 7.5,
                'duration_days' => 7,
            ],
            [
                'name' => 'Regular Plan',
                'slug' => 'regular-plan',
                'min_amount' => 50000,
                'max_amount' => 500000,
                'interest_rate' => 9.5,
                'duration_days' => 7,
            ],
            [
                'name' => 'Professional Plan',
                'slug' => 'professional-plan',
                'min_amount' => 500000,
                'max_amount' => 5000000,
                'interest_rate' => 11.5,
                'duration_days' => 7,
            ],
            [
                'name' => 'Master Plan',
                'slug' => 'master-plan',
                'min_amount' => 5000000,
                'max_amount' => 50000000,
                'interest_rate' => 13.5,
                'duration_days' => 7,
            ],
        ];

        foreach ($plans as $plan) {
            InvestmentPlan::create($plan);
        }
    }
}
