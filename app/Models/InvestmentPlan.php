<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InvestmentPlan extends Model
{
    protected $fillable = ['name', 'slug', 'min_amount', 'max_amount', 'interest_rate', 'duration_days'];

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($plan) {
            $plan->slug = Str::slug($plan->name);
        });
    }
}
