<?php

namespace App\Http\Controllers;

use App\Models\Disponibilites;
use App\Models\Rendez_vous;
use App\Models\Specialites;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class mypatient extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Vérifie si l'utilisateur est connecté
        if (Auth::check()) {
            // L'utilisateur est connecté
            // Récupérez l'utilisateur complet
            $user = Auth::user();

            $rdvs = Rendez_vous::where('patient_id', $user->id)->get();
            $doctors = User::where('id_role', 2)->get();

            // Créez un tableau pour stocker les noms des médecins associés à chaque rendez-vous
            $doctorNames = [];

            // Boucle sur les rendez-vous pour récupérer les noms des médecins
            foreach ($rdvs as $rdv) {
                // Récupérez le nom du médecin associé au rendez-vous
                $doctorName = $doctors->where('id', $rdv->doctor_id)->first()->name;
                // Ajoutez le nom du médecin au tableau
                $doctorNames[] = $doctorName;
            }

            // Passez les données à la vue
            return view("users.patient.dashbord", compact('user', 'rdvs', 'doctors', 'doctorNames'));
        } else {
            // L'utilisateur n'est pas connecté, vous pouvez le rediriger vers la page de connexion par exemple
            return redirect()->route('login');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view("users.patient.profil", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function statistique(string $id)
    {
    }

    public function rendez_vous()
    {
        // Récupérer la liste des spécialités depuis la base de données
        $specialites = Specialites::all();

        $user = Auth::user();

        // Passer les spécialités à la vue
        return view("users.patient.rendez_vous", compact('specialites', "user"));
    }



    public function getMedecinsBySpecialite($specialiteId)
    {
        try {
            // Récupérer les utilisateurs ayant le rôle_id égal à 2 et la spécialité spécifiée
            $medecins = User::where('id_role', 2)
                ->where('specialite_id', $specialiteId)
                ->get();


            return response()->json($medecins);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération des médecins: ' . $e->getMessage()], 500);
        }
    }

    public function getDisponibilites($medecinId)
    {
        try {
            $disponibilites = Disponibilites::where('doctor_id', $medecinId)->get();
            return response()->json($disponibilites);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération des disponibilités: ' . $e->getMessage()], 500);
        }
    }

    public function getPrixConsultation($specialiteId)
    {
        $specialite = Specialites::find($specialiteId);
        if ($specialite) {
            return response()->json(['prix' => $specialite->prix_consultation]);
        } else {
            return response()->json(['error' => 'Spécialité non trouvée'], 404);
        }
    }

    public function submitAppointmentForm(Request $request)
    {
        $validatedData = $request->validate([
            'specialite' => 'required|integer',
            'medecinRadio' => 'required|integer',
            'disponibilite' => 'required',
            'motif' => 'nullable|string',
            'statut' => 'nullable|string',
        ]);
        $specialite = Specialites::find($validatedData['specialite']);
        $patient_id = Auth::user()->id;
        $user = Auth::user();

        // Enregistrer les informations en base de données
        $rendezVous = new Rendez_vous();
        $rendezVous->specialites_id = $validatedData['specialite'];
        $rendezVous->patient_id = $patient_id;
        $rendezVous->doctor_id = $validatedData['medecinRadio'];
        $rendezVous->date = date("Y-m-d H:i:s", strtotime($validatedData['disponibilite']));
        $rendezVous->statut = "Rdv non cloturé";
        $rendezVous->prix = $specialite->prix; // Accéder à la propriété prix de l'instance de Specialites
        $rendezVous->statut_paiement = "Non Effectue";
        $rendezVous->save();



        $specialite = Specialites::find($validatedData['specialite']);

        // Redirection en fonction du succès ou de l'échec
        if ($rendezVous) {
            // Récupérer l'ID du rendez-vous créé
            $rendezVousId = $rendezVous->id;

            return view("users.patient.confirm", compact('specialite', 'rendezVousId', "user"));
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Une erreur s\'est produite. Veuillez réessayer.']);
        }
    }

    public function showConfirmationPage()
    {
        $user = Auth::user();
        // Afficher la page de confirmation
        return view('confirmation_page', compact('user'));
    }

    public function updatePaymentData(Request $request)
    {
        // Récupérer les données de la requête
        $status = $request->input('status');
        $prix = $request->input('prix');
        $statut_paiement = $request->input('statut_paiement');
        $rendezVousId = $request->input('rendezVousId');

        // Log des valeurs des données
        Log::info('Status: ' . $status);
        Log::info('Prix: ' . $prix);
        Log::info('Statut Paiement: ' . $statut_paiement);
        Log::info('RendezVous ID: ' . $rendezVousId);

        try {
            // Recherche du paiement à mettre à jour (exemple)
            $payment = Rendez_vous::find($rendezVousId); // Utilisation de l'ID du rendez-vous pour la mise à jour

            if ($payment) {
                $payment->statut = $status;
                $payment->prix = $prix;
                $payment->statut_paiement = $statut_paiement;
                $payment->save();

                return response()->json(['message' => 'Données de paiement mises à jour avec succès'], 200);
            } else {
                return response()->json(['error' => 'Paiement non trouvé'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour des données de paiement: ' . $e->getMessage());

            return response()->json(['error' => 'Erreur lors de la mise à jour des données de paiement'], 500);
        }
    }

    public function modipass($id)
    {

        $user = User::find($id);

        return view('users.patient.modifier_pass',compact("user"));
    }
}
