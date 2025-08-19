<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KYCVerification extends Model
{
    protected $fillable = [
        'user_id',
        'document_type',
        'id_number',
        'document_front',
        'document_back',
        'status',
        'rejection_reason',
        'dob',
        'state',
        'zip'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
