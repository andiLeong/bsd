<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable  implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];


    protected static function booted()
    {
        static::creating(function ($user) {
            $user->username = "{$user->option}_{$user->location}_{$user->name}";
        });
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function tracking()
    {
        return $this->hasMany(Tracking::class);
    }

    public function package()
    {
        return $this->hasMany(Package::class);
    }

    public function password(): Attribute
    {
        return Attribute::set(fn($value) => bcrypt($value));
    }


    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
