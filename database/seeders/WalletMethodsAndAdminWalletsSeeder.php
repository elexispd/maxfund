<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WalletMethod;
use App\Models\AdminWallet;

class WalletMethodsAndAdminWalletsSeeder extends Seeder
{
    public function run()
    {
        // Wallet Methods Data
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
                'network' => 'TRC20',
                'is_active' => true
            ],
            [
                'name' => 'Tether',
                'code' => 'tether',
                'network' => 'BEP20',
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
        ];

        // Admin Wallet Addresses Data
        $adminWallets = [
            'bitcoin' => '1JuQ9vc75XchkTd7zyWsouncHqoj12UddK',
            'ethereum' => '0x6864A7deE52d9A9C395CDdCc350F46d9EFaFB38',
            'binancecoin' => '0x6864A7deE52d9A9C395CDdCc350F46d9EFaFB38',
            'tether.TRC20' => 'TCYMXyWXBtLJExGTcc3qGjf3ZtyrQE6Mvw',
            'tether.BEP20' => '0x6864A7deE52d9A9C395CDdCc350F46d9EFaFB38',
            'tron' => 'TCYMXyWXBtLJExGTcc3qGjf3ZtyrQE6Mvw',
            'solana' => '3255UweswsGcR1u3x8AoiJQQWQwGF1aLZviowQoAn1Hm',
            'usdc' => '3255UweswsGcR1u3x8AoiJQQWQwGF1aLZviowQoAn1Hm',
        ];

        // Create wallet methods
        foreach ($walletMethods as $method) {
            $walletMethod = WalletMethod::firstOrCreate(
                [
                    'code' => $method['code'],
                    'network' => $method['network']
                ],
                $method
            );

            // Create admin wallet for this method
            $key = $method['network'] ? "{$method['code']}.{$method['network']}" : $method['code'];

            if (isset($adminWallets[$key])) {
                AdminWallet::firstOrCreate(
                    [
                        'wallet_method_id' => $walletMethod->id,
                        'address' => $adminWallets[$key]
                    ],
                    [
                        'address' => $adminWallets[$key],
                        'is_active' => true
                    ]
                );
            }
        }
    }
}
