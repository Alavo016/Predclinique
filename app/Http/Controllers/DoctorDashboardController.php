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

    public function dispo(){
        return view('users.doctor.disponiblites');
    }

    public function store_schedule(Request $request){ {
            // Validation des données du formulaire
            $validatedData = $request->validate([
                'available_days' => 'required|array',
                'from' => 'required|array',
                'to' => 'required|array',
                'notes' => 'required|array',
                'status' => 'required|array',
                'available_days.*' => 'required|date_format:l',
                'from.*' => 'required|date_format:H:i',
                'to.*' => 'required|date_format:H:i|after:from.*',
                'notes.*' => 'nullable|string|max:255',
                'status.*' => 'required|in:Active,Inactive',
            ], [
                'available_days.required' => 'Le jour de disponibilité est requis.',
                'available_days.*.date_format' => 'Le jour de disponibilité doit être au format jour de la semaine (par exemple, "Monday").',
                'from.required' => 'L\'heure de début est requise.',
                'from.*.date_format' => 'L\'heure de début doit être au format HH:MM.',
                'to.required' => 'L\'heure de fin est requise.',
                'to.*.date_format' => 'L\'heure de fin doit être au format HH:MM.',
                'to.*.after' => 'L\'heure de fin doit être postérieure à l\'heure de début.',
                'notes.*.max' => 'La note ne peut pas dépasser :max caractères.',
                'status.required' => 'Le statut est requis.',
                'status.*.in' => 'Le statut doit être "Actif" ou "Inactif".',
            ]);
            $id_auth = Auth::user()->id;

            // Boucle sur chaque disponibilité soumise
                $dispo = new Disponibilites();
                $dispo->doctor_id = $id_auth;
                $dispo ->jour = $validatedData[''];
                $dispo->save();
            }

            // Redirection avec un message de succès
            return redirect()->route('schedule.index')->with('success', 'Les disponibilités ont été enregistrées avec succès.');
        }}

