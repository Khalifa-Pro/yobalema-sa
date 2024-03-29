<?php

namespace App\Http\Controllers;

use App\Models\Louer;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoyageController extends Controller
{
    public function liste()
    {
        $liste = Louer::all();
        return view('admin.listeVoyage',['liste' => $liste]);
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
    
        return redirect()->route('customer.customer')->with('success', 'Réservation réussie!');
    }

    public function supprimer($id)
    {
        $voyage = Louer::find($id);

        if (!$voyage) {
            // Si aucun enregistrement n'est trouvé avec cet identifiant, rediriger avec un message d'erreur ou autre traitement
            return redirect()->back()->with('error', 'Voyage non trouvé.');
        }

        $voyage->delete();

        return redirect()->route('voyageur.liste')->with('success', 'Voyage supprimé avec succès.');
    }

}
