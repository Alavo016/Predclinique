<?php

namespace App\Http\Controllers;

use App\Models\Consultations;
use App\Models\Disponibilites;
use App\Models\Rendez_vous;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importez la classe Auth

class DoctorDashboardController extends Controller
{


    public function index()
    {
        // Vérifie si l'utilisateur est connecté
        if (Auth::check()) {
            // L'utilisateur est connecté
            // Récupérez l'utilisateur complet
            $user = Auth::user();

            // Récupérer le nombre de disponibilités pour le médecin connecté
            $dispo = Disponibilites::where('doctor_id', $user->id)->count();

            // Récupérer le nombre d'utilisateurs avec le rôle de patient (id_role = 1)
            $nbrUser = User::where('id_role', 1)->count();

            // Récupérer le nombre de consultations pour le médecin connecté
            $nbrConsultation = Consultations::where('doctor_id', $user->id)->count();

            // Récupérer le nombre de rendez-vous pour le médecin connecté
            $nbrrdv = Rendez_vous::where('doctor_id', $user->id)->count();

            // Récupérer les rendez-vous du médecin
            $rdvs = Rendez_vous::where('doctor_id', $user->id)->get();
            // Récupérer le nombre de patients mâles
            $malePatientsCount = User::where('id_role', 1)->where('sexe', "M")->count();

            // Récupérer le nombre de patients femelles
            $femalePatientsCount = User::where('id_role', 1)->where('sexe', "F")->count();

            // Récupérer le nombre de nouveaux patients (inscrits il y a moins d'un mois)
            $newPatientsCount = User::where('id_role', 1)->where('created_at', '>=', now()->subMonth())->count();

            // Récupérer le nombre d'anciens patients (inscrits il y a plus d'un mois)
            $oldPatientsCount = $nbrUser - $newPatientsCount;


            // Créer un tableau pour stocker le nombre de rendez-vous par mois
            $rdvsPerMonth = [];

            // Boucle à travers les rendez-vous pour compter le nombre de rendez-vous par mois
            foreach ($rdvs as $rdv) {
                $month = Carbon::parse($rdv->date)->format('M'); // Récupérer le mois du rendez-vous
                if (isset($rdvsPerMonth[$month])) {
                    $rdvsPerMonth[$month]++;
                } else {
                    $rdvsPerMonth[$month] = 1;
                }
            }

            // Préparer les données pour ApexCharts
            $months = array_keys($rdvsPerMonth); // Récupérer les mois comme clés
            $data = array_values($rdvsPerMonth); // Récupérer les valeurs de nombre de rendez-vous

            // Passez les données à la vue
            return view('users.doctor.dashbord', compact('user', 'dispo', 'nbrUser', 'nbrConsultation', 'nbrrdv', 'months', 'data', 'malePatientsCount', 'femalePatientsCount', 'newPatientsCount',"oldPatientsCount"));
        } else {
            // L'utilisateur n'est pas connecté, vous pouvez le rediriger vers la page de connexion par exemple
            return redirect()->route('login');
        }
    }





    public function dispo()
    {
        return view('users.doctor.disponiblites');
    }

    public function disponiblites(Request $request)
    {

        // Validation des données reçues du formulaire
        $request->validate([
            'jour' => 'required|date',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
            'notes' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);
        $id_auth = Auth::user()->id;
        // Création d'une nouvelle disponibilité
        $disponibilite = new Disponibilites();
        $disponibilite->jour = $request->jour;
        $disponibilite->heure_debut = $request->heure_debut;
        $disponibilite->heure_fin = $request->heure_fin;
        $disponibilite->notes = $request->notes;
        $disponibilite->status = $request->status;
        $disponibilite->doctor_id = $id_auth;

        // Sauvegarde de la disponibilité
        $disponibilite->save();

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Disponibilité créée avec succès.');
    }

    public function showdispo()
    {
        // Récupérer l'ID du docteur connecté
        $id_auth = Auth::user()->id;

        // Récupérer toutes les disponibilités du docteur connecté
        $disponibilites = Disponibilites::where('doctor_id', $id_auth)->get(); // Ajoutez ->get() pour exécuter la requête

        // Vérifier si des disponibilités ont été récupérées
        if ($disponibilites->isEmpty()) {
            // Aucune disponibilité trouvée, faites quelque chose (par exemple, redirigez avec un message d'erreur)
            return redirect()->route('doctor.dashboard')->with('error', 'Aucune disponibilité trouvée.');
        }

        // Retourner la vue avec les disponibilités
        return view('users.doctor.listedisponiblitité', compact('disponibilites'));
    }
    public function modifierdisponi($id)
    {
        // Recherche de la disponibilité par son ID
        $disponibilite = Disponibilites::findOrFail($id);

        // Vérification de l'existence de la disponibilité
        if (!$disponibilite) {
            return redirect()->route('doctor.liste.dispo')->with('error', 'La disponibilité sélectionnée n\'existe pas.');
        }

        // Affichage du formulaire de modification avec la disponibilité trouvée
        return view('users.doctor.modifier_dispo', compact('disponibilite'));
    }


    public function updateDispo(Request $request, $id)
    {

        // Validation des données reçues du formulaire
        $request->validate([
            'jour' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'notes' => 'required|string',
            'status' => 'required|in:0,1',

        ]);




        // Récupérer la disponibilité à modifier
        $disponibilite = Disponibilites::findOrFail($request->id);

        // Mettre à jour la disponibilité avec les données du formulaire
        $disponibilite->update($request->all());

        // Redirection avec un message de succès
        return redirect()->route('doctor.liste.dispo')->with('success', 'Disponibilité mise à jour avec succès.');
    }

    public function destroydispo($id)
    {
        $disponibilite = Disponibilites::findOrFail($id);
        $disponibilite->delete();

        return redirect()->route('doctor.liste.dispo')->with('success', 'Disponibilité supprimée avec succès.');
    }

    public function listepatient()
    {
        $user = Auth::user();
        $patients = User::where('id_role', 1)->get();

        return view("users.doctor.liste_patient", compact("user", "patients"));
    }
    public function dossierMedical($id)
    {
        $user = Auth::user();
        $patient = User::find($id);
        $consultations = Consultations::where('user_id', $patient->id)->get(); // Correction de la requête

        return view('users.doctor.Dossiermedicalepatient', compact('patient', 'user', 'consultations'));
    }
}
