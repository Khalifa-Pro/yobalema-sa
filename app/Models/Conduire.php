<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conduire extends Model
{
    protected $fillable = [
        'id_chauffeur',
        'id_vehicule', 
    ];
    use HasFactory;
}
