<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Louer extends Model
{
    protected $primaryKey = 'id_location';

    protected $fillable = [
        'nom_complet_client', 'telephone', 'pointDepart', 'pointArrivee','dateVoyage', 'heureDepart', 'id_vehicule',
    ];
    
    use HasFactory;
}
