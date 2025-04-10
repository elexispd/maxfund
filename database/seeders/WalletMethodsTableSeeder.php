<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WalletMethod;

class WalletMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $walletMethods = [
            [
                'name' => 'Bitcoin',
                'code' => 'bitcoin',
                'network' => null,
                'is_active' => true
            ],
            [
                'name' => 'Ethereum',
                'code' => 'ethereum',
                'network' => null,
                'is_active' => true
            ],
            [
                'name' => 'Solana',
                'code' => 'solana',
                'network' => null,
                'is_active' => true
            ],
            [
                'name' => 'Binance Coin',
                'code' => 'binancecoin',
                'network' => 'BEP20',
                'is_active' => true
            ],
            [
                'name' => 'Tether',
                'code' => 'tether',
                'network' => 'ERC20',
                'is_active' => true
            ],
            [
                'name' => 'Tron',
                'code' => 'tron',
                'network' => null,
                'is_active' => true
            ],
            [
                'name' => 'USD Coin',
                'code' => 'usdc',
                'network' => 'Solana',
                'is_active' => true
            ],
            // Add more methods as needed
        ];

        foreach ($walletMethods as $method) {
            WalletMethod::firstOrCreate(
                ['code' => $method['code']], // Search condition
                $method // Data to create if not exists
            );
        }

        // Alternatively you could use create() if you want new records each time
        // WalletMethod::insert($walletMethods);
    }
}
