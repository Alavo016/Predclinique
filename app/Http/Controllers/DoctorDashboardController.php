<?php

namespace App\Http\Controllers;

use App\Models\Disponibilites;
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

            // Passez l'utilisateur à la vue
            return view('users.doctor.dashbord', compact('user'));
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
            'status' => 'required|in:active,inactive',

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

}
