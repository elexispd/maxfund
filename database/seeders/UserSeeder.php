<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create admin user (optional)
        // User::create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'phone' => '1234567890',
        //     'role' => 'admin',
        //     'password' => Hash::make('password'),
        //     'status' => 'active',
        //     'referral_code' => Str::random(8),
        // ]);

        // Generate 50 test users
        for ($i = 1; $i <= 50; $i++) {
            $status = $i % 5 == 0 ? 'inactive' : 'active'; // Make every 5th user inactive

            User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'phone' => $this->generatePhoneNumber(),
                'role' => 'user',
                'password' => Hash::make('password'),
                'status' => $status,
                'referral_code' => Str::random(8),
                // Optional fields with some random data
                'address' => $i % 3 == 0 ? $this->generateAddress() : null,
                'state' => $i % 4 == 0 ? $this->generateState() : null,
                'zip' => $i % 4 == 0 ? rand(10000, 99999) : null,
                'country' => $i % 5 == 0 ? 'US' : null,
                'balance' => $i % 2 == 0 ? rand(100, 10000) : 0,
                'dob' => $i % 3 == 0 ? now()->subYears(rand(18, 70))->format('Y-m-d') : null,
                'kyc_verified' => $i % 4 == 0,
                'referred_by' => $i > 10 ? rand(1, 10) : null // First 10 users have no referrer
            ]);
        }
    }

    protected function generatePhoneNumber(): string
    {
        return '+' . rand(1, 99) . rand(100, 999) . rand(100, 999) . rand(1000, 9999);
    }

    protected function generateAddress(): string
    {
        $streets = ['Main St', 'First Ave', 'Park Blvd', 'Oak Lane', 'Maple Dr'];
        return rand(100, 999) . ' ' . $streets[array_rand($streets)];
    }

    protected function generateState(): string
    {
        $states = ['CA', 'NY', 'TX', 'FL', 'IL', 'PA', 'OH', 'GA', 'NC', 'MI'];
        return $states[array_rand($states)];
    }
}
