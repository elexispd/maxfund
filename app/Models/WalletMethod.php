<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletMethod extends Model
{
    protected $fillable = ['name', 'code', 'network', 'is_active'];


}
