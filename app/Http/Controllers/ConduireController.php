<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conduire;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConduireController extends Controller
{
    public function conduirePage(){
        $listeC = $this->listeChauffeur();
        $listeV = $this->listeVehicule();
        return view('admin.gestion_conduites.conduire',['listeC' => $listeC,'listeV' => $listeV]);
    }

    public function listeChauffeur(){
        return User::where('usertype','CHAUFFEUR_ROLE')
                            ->where('date_expiration', '>', now()->year)
                            ->orderBy('firstName')
                            ->get();
    }

    public function listeVehicule(){
        return Vehicule::all();
    }

    public function conduire(Request $request){
        $request->validate([
            'id_chauffeur' => 'required',
            'id_vehicule' => 'required',
        ]);
    
        // Récupérer la liste des conducteurs et des chauffeurs
        $conducteurs = $this->liste();
        $chauffeurs = $this->listeChauffeur();
        
        // Parcourir chaque conducteur et chaque chauffeur pour vérifier s'ils correspondent
        foreach ($conducteurs as $conducteur) {
            foreach ($chauffeurs as $chauffeur) {
                if ($conducteur->id_chauffeur == $request->id_chauffeur && $chauffeur->id == $request->id_chauffeur) {
                    // Si le chauffeur existe déjà dans la liste des conducteurs, retourner une réponse appropriée
                    return redirect()->back()->with('error', 'Le chauffeur spécifié existe déjà dans la liste des conducteurs.');
                }
            }
        }
        
        // Si le chauffeur n'existe pas dans la liste des conducteurs, enregistrer la conduite
        Conduire::create([
            'id_chauffeur' => $request->id_chauffeur,
            'id_vehicule' => $request->id_vehicule,
        ]);
        return redirect()->route('admin.espaceConducteur');
    }
    
    

    public function liste(){
        $liste = DB::table('users')
                ->join('conduires', 'users.id', '=', 'conduires.id_chauffeur')
                ->join('vehicules', 'conduires.id_vehicule', '=', 'vehicules.id_vehicule')
                ->where('users.usertype', 'CHAUFFEUR_ROLE')
                ->select('users.firstName', 'users.lastName', 'users.telephone','users.address','vehicules.marque')
                ->get();
        return view('admin.gestion_conduites.conducteurs',['liste' => $liste]);
        
    }
}
