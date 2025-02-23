<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ville extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'villes';

    protected $fillable = [
        'nom',
        'created_at',
        'updated_at',
    ];
}
