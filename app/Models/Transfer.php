<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'amount'];
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // A transfer belongs to a receiver (User)
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
