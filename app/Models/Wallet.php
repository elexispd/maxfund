<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['user_id', 'wallet_method_id', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function walletMethod()
    {
        return $this->belongsTo(WalletMethod::class);
    }
}
