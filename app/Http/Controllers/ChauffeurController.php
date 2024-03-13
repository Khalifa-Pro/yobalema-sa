<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;


class ChauffeurController extends Controller
{
    public function liste(){
        $liste = User::where('usertype','CHAUFFEUR_ROLE')
                            ->orderBy('firstName')
                            ->get();
        return view('admin.espaceChauffeur',['liste' => $liste]);
    }

    public function creer(){
        return view('admin.gestion_chauffeurs.creer');
    }

    // public function notification(){
    //     $details = $this->notif();
    //     return view('chauffeur.chauffeurDashboard',['details' => $details]);
    // }

    // public function notif(){
    //     $user = auth()->user();

    //     // Vérifier si l'utilisateur est un chauffeur
    //     if ($user->usertype === 'CHAUFFEUR_ROLE') {
    //         // Récupérer les détails de l'utilisateur connecté et du véhicule qu'il conduit
    //        return DB::table('conduires')
    //                     ->join('vehicules', 'conduires.id_vehicule', '=', 'vehicules.id_vehicule')
    //                     ->where('conduires.id_chauffeur', $user->id)
    //                     ->select('*')
    //                     ->first();
    //     }
    //     return null;
    // }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'experience' => ['required', 'integer'],
            'numero_permis' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'integer'],
            'date_emission' => ['required', 'string', 'max:255'],
            'date_expiration' => ['required', 'string', 'max:255'],
            'categorie' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'experience' => $request->experience,
            'numero_permis' => $request->numero_permis,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'date_emission' => $request->date_emission,
            'date_expiration' => $request->date_expiration,
            'categorie' => $request->categorie,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //event(new Registered($user));

        //Auth::login($user);

        return redirect()->route('admin.espaceChauffeur');
    }
}
