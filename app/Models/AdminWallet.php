<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminWallet extends Model
{
    protected $fillable = [
        'wallet_method_id',
        'address',
        'qr_code_path',
        'is_active',
    ];


}
