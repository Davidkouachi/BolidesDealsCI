<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class password_reset_historique extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'password_reset_historiques';
    
    protected $fillable = [
        'email',
        'token',
        'click',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
