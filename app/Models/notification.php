<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class notification extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'notifications';

    protected $fillable = [
        'type',
        'message',
        'user_mat',
        'login_mat',
        'created_at',
        'updated_at',
    ];
}
