<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'email',
        'crenaux',
        'produit_id',
        'category_id',
        'place_id',
        'package',
        'type'
    ];
}
