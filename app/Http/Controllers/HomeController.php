<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
    
            if ($usertype == 'CHAUFFEUR_ROLE') {
                $usertype = auth()->user()->usertype;

            if ($usertype == 'CHAUFFEUR_ROLE') {
                $details = $this->notif();

                // Requête pour récupérer la liste des chauffeurs avec les informations sur les véhicules qu'ils conduisent
                $liste = DB::table('users')
                            ->join('conduires', 'users.id', '=', 'conduires.id_chauffeur')
                            ->join('vehicules', 'conduires.id_vehicule', '=', 'vehicules.id_vehicule')
                            ->where('users.usertype', 'CHAUFFEUR_ROLE')
                            ->select('*')
                            ->get();

                return view('chauffeur.chauffeurDashboard', ['details' => $details, 'liste' => $liste]);
            }
            // Ajoutez ici le code pour les autres types d'utilisateur si nécessaire

            return null; // Par exemple, si l'utilisateur n'est pas un chauffeur, vous pouvez renvoyer autre chose ou null
                    }
            elseif ($usertype == 'ADMIN_ROLE') {
                return view('admin.espace');
            }

            else{
                return redirect()->back();
            }
        }
    }

    // public function listeConducteurs(){
    //     $liste = DB::table('users')
    //             ->join('conduires', 'users.id', '=', 'conduires.id_chauffeur')
    //             ->join('vehicules', 'conduires.id_vehicule', '=', 'vehicules.id_vehicule')
    //             ->where('users.usertype', 'CHAUFFEUR_ROLE')
    //             ->select('*')
    //             ->get();
    //     return view('chauffeur.chauffeurDashboard',['liste' => $liste]);
        
    // }


    public function notif(){
        $user = auth()->user();

        // Vérifier si l'utilisateur est un chauffeur
        if ($user->usertype === 'CHAUFFEUR_ROLE') {
            // Récupérer les détails de l'utilisateur connecté et du véhicule qu'il conduit
           return DB::table('conduires')
                        ->join('vehicules', 'conduires.id_vehicule', '=', 'vehicules.id_vehicule')
                        ->join('users', 'conduires.id_chauffeur', '=', 'users.id')
                        ->where('conduires.id_chauffeur', $user->id)
                        ->select('conduires.*', 'vehicules.*', 'users.*')
                        ->first();
        }
        return null;
    }



}
