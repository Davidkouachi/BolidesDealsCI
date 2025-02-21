<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class role extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'roles';
    
    protected $fillable = [
        'nom',
        'created_at',
        'updated_at',
    ];
}
