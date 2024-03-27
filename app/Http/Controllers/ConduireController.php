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
    
        // Vérifier si le chauffeur est déjà associé à une conduite
        $existConduite = Conduire::where('id_chauffeur', $request->id_chauffeur)->exists();
        if ($existConduite) {
            return redirect()->back()->with('error', 'Ce chauffeur est déjà associé à une conduite.');
        }
        
        // Si le chauffeur n'est pas déjà associé à une conduite, enregistrer la nouvelle conduite
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
                ->select('*')
                ->get();
        return view('admin.gestion_conduites.conducteurs',['liste' => $liste]);
        
    }

    public function supprimer($id)
    {
        $conduite = Conduire::find($id);
        
        if (!$conduite) {
            // Si aucun enregistrement n'est trouvé avec cet identifiant, rediriger avec un message d'erreur ou autre traitement
            return redirect()->back()->with('error', 'Conduite non trouvé.');
        }
    
        $conduite->delete();
    
        return redirect()->route('admin.espaceConducteur')->with('success', 'Conduite supprimé avec succès.');
    }
}
