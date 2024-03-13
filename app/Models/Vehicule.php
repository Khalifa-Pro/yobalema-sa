<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $table = 'vehicules'; // Nom de la table dans la base de données

    protected $primaryKey = 'id_vehicule'; // Nom de la clé primaire dans la table

    protected $fillable = [
        'marque', 'dateAchat', 'kmDefaut', 'matricule', 'photo', 'poids', 'statut','nb_place',
    ];
}
