<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointDeVente extends Model
{
    //
    protected $fillable = [
        'nom',
        'ville',
        'code_postale'
    ];
}
