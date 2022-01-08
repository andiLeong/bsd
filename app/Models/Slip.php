<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slip extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function approve()
    {
        return $this->update(['approve',true]);
    }

    public function url(): Attribute
    {
        return Attribute::get(fn($value) =>  Storage::disk('digitalocean')->url($value)  );
    }
}
