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

    return redirect()->route('admin.espaceVehicule');
}

    // public function get($id)
    // {
    //     $candidat = Candidat::find($id);
    //     return view('admin.candidat.getCandidat', ['candidat' => $candidat]);
    // }

    // public function modifier($id)
    // {
    //     $candidat = Candidat::find($id);
    //     return view('admin.candidat.modifierCandidat', ['candidat' => $candidat]);
    // }

    // public function mettreAJour(Request $requete, $id)
    // {
    //     // Validation des données du formulaire
    //     $requete->validate([
    //         'nom' => 'required',
    //         'prenom' => 'required',
    //         'date_naissance' => 'required',
    //         'lieu_naissance' => 'required',
    //         'cni' => 'required',
    //         'adresse' => 'required',
    //         'parti' => 'required',
    //         'telephone' => 'required',
    //         'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     // Récupération du candidat à mettre à jour
    //     $candidat = Candidat::find($id);

    //     // Mise à jour des données du candidat
    //     $candidat->nom = $requete->nom;
    //     $candidat->prenom = $requete->prenom;
    //     $candidat->date_naissance = $requete->date_naissance;
    //     $candidat->lieu_naissance = $requete->lieu_naissance;
    //     $candidat->cni = $requete->cni;
    //     $candidat->adresse = $requete->adresse;
    //     $candidat->parti = $requete->parti;
    //     $candidat->telephone = $requete->telephone;

    //     // Traitement de l'image
    //     if ($requete->hasFile('photo')) {
    //         $image = $requete->file('photo');
    //         $nomImage = time() . '.' . $image->getClientOriginalExtension();
    //         $chemin = public_path('build/assets/images/candidats');
    //         $image->move($chemin, $nomImage);

    //         $candidat->photo = $nomImage;
    //     }

    //     $candidat->save();
    //     var_dump($candidat);
    //     return redirect()->route('liste.candidats')->with('status', 'Candidat mis à jour avec succès!');
    // }

    // public function supprimer($id)
    // {
    //     $candidat = Candidat::find($id);
    //     $candidat->delete();

    //     return redirect()->route('liste.candidats')->with('status', 'Candidat supprimé avec succès!');
    // }
}
