<?php

namespace App\Http\Controllers;

use auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Alert;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

        return redirect()->route('admin.espaceChauffeur')->with('success', 'Chauffeur ajouté avec succès!');;;
    }

    /**
     * Crée une nouvelle alerte.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function alerter(Request $request)
        {
            // Valider les données du formulaire
            $request->validate([
                'message' => 'required|string',
                'id_chauffeur' => 'required'
            ]);

            $alerte = new Alert();
            $alerte->id_chauffeur = auth()->id();
            $alerte->message = $request->message;
            $alerte->save();

            return redirect()->back()->with('success', 'Alerte soumise avec succès');
        }

        // public function listeAlerts()
        // {
        //     $liste = DB::table('users')
        //         ->join('alerts', 'users.id', '=', 'alerts.id_chauffeur')
        //         ->where('users.usertype', 'CHAUFFEUR_ROLE')
        //         ->select('*')
        //         ->get();
        //     return view('admin.listeAlert',['liste' => $liste]);
        // }

        public function listeAlerts()
        {
            $now = Carbon::now();
            $thresholdDate = $now->subHours(72);

            $liste = DB::table('users')
                ->join('alerts', 'users.id', '=', 'alerts.id_chauffeur')
                ->where('users.usertype', 'CHAUFFEUR_ROLE')
                ->whereDate('alerts.created_at', '>=', $thresholdDate)
                ->select('*')
                ->get();

            return view('admin.listeAlert', ['liste' => $liste]);
        }

        public function nombreAlert()
        {
            $nombre = DB::table('alerts')
                ->select(DB::raw('count(distinct *) as count'))
                ->first();
            return view('admin.content', ['nombre' => $nombre->count]);
        }

        public function modifier($id)
        {
            $user = User::find($id);
            return view('admin.gestion_chauffeurs.modifier', ['user' => $user]);
        }

        public function update(Request $request, $id): RedirectResponse
        {
            $user = User::findOrFail($id);

            $request->validate([
                'firstName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
                'experience' => ['required', 'integer'],
                'numero_permis' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'telephone' => ['required', 'string', 'max:255'],
                'date_emission' => ['required', 'integer'],
                'date_expiration' => ['required', 'integer'],
                'categorie' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'password' => ['required', 'string', 'confirmed'],
            ]);

            $user->update([
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

            return redirect()->route('admin.espaceChauffeur')->with('success', 'Chauffeur modifié avec succès!');
        }

    
    public function supprimer($id)
    {
        $chauffeur = User::find($id);
        $chauffeur->delete();
        return redirect()->route('admin.espaceChauffeur')->with('success', 'Candidat supprimé avec succès!');
    }

}
