<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    use HasFactory;

    protected $casts = [
        'is_paid' => 'boolean'
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->number = Str::random(32);
        });
    }

    public function tracking()
    {
        return $this->hasMany(Tracking::class);
    }

    public function slips()
    {
        return $this->hasMany(Slip::class);
    }

    public function pay()
    {
        return $this->update(['is_paid' => true]);
    }

    public function hasPaid()
    {
        return $this->is_paid;
    }
}
