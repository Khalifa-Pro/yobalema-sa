<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function liste(){
        $liste = Vehicule::all();
        return view('admin.espaceVehicule',['liste' => $liste]);
    }

    public function creer(){
        return view('admin.gestion_vehicules.creer');
    }

    public function sauvegarder(Request $requete)
    {
        // Validation des données du formulaire
        $requete->validate([
            'marque' => 'required',
            'dateAchat' => 'required',
            'kmDefaut' => 'required',
            'matricule' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour le fichier image,
            'poids' => 'required',
            'statut' => 'required',
            'nb_place' => 'required',
        ]);

        // Traitement de l'image
        if ($requete->hasFile('photo')) {
            $image = $requete->file('photo');
            $nomImage = time() . '.' . $image->getClientOriginalExtension();
            $chemin = public_path('build/assets/images/vehicules');
            $image->move($chemin, $nomImage);
        }

        // Création d'une nouvelle instance de Candidat et enregistrement dans la base de données
        Vehicule::create([
            'marque' => $requete->marque,
            'dateAchat' => $requete->dateAchat,
            'kmDefaut' => $requete->kmDefaut,
            'matricule' => $requete->matricule,
            'photo' => isset($nomImage) ? $nomImage : null,
            'poids' => $requete->poids,
            'statut' => $requete->statut,
            'nb_place' => $requete->nb_place,
        ]);

        return redirect()->route('admin.espaceVehicule')->with('success', 'Véhicule enregistré avec succès!');
    }

    public function modifier($id)
    {
        $vehicule = Vehicule::find($id);
        return view('admin.gestion_vehicules.modifier',['vehicule' => $vehicule]);
    }

    public function update(Request $requete,$id)
    {
        $vehicule = Vehicule::findOrFail($id);
        // Validation des données du formulaire
        $requete->validate([
            'marque' => 'required',
            'dateAchat' => 'required',
            'kmDefaut' => 'required',
            'matricule' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour le fichier image,
            'poids' => 'required',
            'statut' => 'required',
            'nb_place' => 'required',
        ]);

        // Traitement de l'image
        if ($requete->hasFile('photo')) {
            $image = $requete->file('photo');
            $nomImage = time() . '.' . $image->getClientOriginalExtension();
            $chemin = public_path('build/assets/images/vehicules');
            $image->move($chemin, $nomImage);
        }

        // Création d'une nouvelle instance de Candidat et enregistrement dans la base de données
        $vehicule->update([
            'marque' => $requete->marque,
            'dateAchat' => $requete->dateAchat,
            'kmDefaut' => $requete->kmDefaut,
            'matricule' => $requete->matricule,
            'photo' => isset($nomImage) ? $nomImage : null,
            'poids' => $requete->poids,
            'statut' => $requete->statut,
            'nb_place' => $requete->nb_place,
        ]);
        
        return redirect()->route('admin.espaceVehicule')->with('success', 'Véhicule modifié avec succès!');
    }

    public function supprimer($id)
    {
        $vehicule = Vehicule::find($id);
        $vehicule->delete();
        return redirect()->route('admin.espaceChauffeur')->with('success', 'Véhicule supprimé avec succès!');
    }

}
