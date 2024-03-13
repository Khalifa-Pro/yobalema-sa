<?php

namespace App\Http\Controllers;

use App\Models\Louer;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{

    public function reservationPage(){
        $liste = DB::table('users')
                ->join('conduires', 'users.id', '=', 'conduires.id_chauffeur')
                ->join('vehicules', 'conduires.id_vehicule', '=', 'vehicules.id_vehicule')
                ->where('users.usertype', 'CHAUFFEUR_ROLE')
                ->select('*')
                ->get();
        return view('admin.espaceLocation',['liste' => $liste]);
    }

    public function reserver(Request $requete)
    {
        // Validation des données du formulaire
        $requete->validate([
            'nom_complet_client' => 'required',
            'telephone' => 'required',
            'pointDepart' => 'required',
            'pointArrivee' => 'required',
            'dateVoyage' => 'required',
            'heureDepart' => 'required',
            'id_vehicule' => 'required',
        ]);
    
        // Création d'une nouvelle instance de Candidat et enregistrement dans la base de données
        Louer::create([
            'nom_complet_client' => $requete->nom_complet_client,
            'telephone' => $requete->telephone,
            'pointDepart' => $requete->pointDepart,
            'pointArrivee' => $requete->pointArrivee,
            'dateVoyage' => $requete->dateVoyage,
            'heureDepart' => $requete->heureDepart,
            'id_vehicule' => $requete->id_vehicule,
        ]);

        // Mettre à jour le nombre de places disponibles du véhicule
        Vehicule::where('id_vehicule', $requete->id_vehicule)->update(['nb_place' => DB::raw('nb_place - 1')]);
    
        return redirect('/home');
    }

}
