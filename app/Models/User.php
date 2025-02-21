<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    protected $connection = 'mongodb';

    protected $collection = 'users';
    protected $fillable = [
        'name',
        'mat',
        'prenom',
        'phone',
        'email',
        'password',
        'role_id',
        'lock',
        'adresse',
        'image_nom',
        'image_chemin',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
