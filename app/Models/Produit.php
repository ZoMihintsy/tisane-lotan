<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    //
    protected $fillable = [
        'nom',
        'photo',
        'category_id',
        'description',
        'quantiter',
    ];
}
