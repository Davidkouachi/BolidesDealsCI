<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class type extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'types';
    
    protected $fillable = [
        'nom',
        'created_at',
        'updated_at',
    ];
}
