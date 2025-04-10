<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = ['user_id', 'wallet_method_id', 'amount', 'screenshot_path', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    public function walletMethod()
    {
        return $this->belongsTo(WalletMethod::class);
    }

}
