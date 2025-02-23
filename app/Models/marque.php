<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class marque extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'marques';

    protected $fillable = [
        'nom',
        'image_nom',
        'image_chemin',
        'created_at',
        'updated_at',
    ];
}
