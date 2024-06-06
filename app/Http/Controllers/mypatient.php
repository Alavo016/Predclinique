<?php

namespace App\Http\Controllers;

use App\Models\Consultations;
use App\Models\Disponibilites;
use App\Models\Rendez_vous;
use App\Models\Specialites;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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

            // Utilisez paginate() pour paginer les résultats
            $rdvs = Rendez_vous::where('patient_id', $user->id)->paginate(5);
            $doctors = User::where('id_role', 2)->get();

            // Créez un tableau pour stocker les noms des médecins associés à chaque rendez-vous
            $doctorNames = [];
            $doctorPhotos = [];

            foreach ($rdvs as $rdv) {
                // Récupérez le médecin associé au rendez-vous
                $doctor = $doctors->where('id', $rdv->doctor_id)->first();
                if ($doctor) {
                    // Récupérez le nom du médecin
                    $doctorName = $doctor->name;
                    // Récupérez la photo du médecin
                    $doctorPhoto = $doctor->photo;

                    // Ajoutez le nom et la photo du médecin aux tableaux
                    $doctorNames[] = $doctorName;
                    $doctorPhotos[] = $doctorPhoto;
                }
            }

            // Récupérer les données de tension pour chaque consultation
            $tensions = Consultations::where('user_id', $user->id)->pluck('tension');

            // Récupérer les derniers poids et tailles de l'utilisateur
            $latestConsultation = Consultations::where('user_id', $user->id)
                ->latest('date')
                ->first();

            $latestWeight = $latestConsultation ? $latestConsultation->poids : 0;
            $latestHeight = $latestConsultation ? $latestConsultation->taille : 0;

            // Calculer le dernier IMC de l'utilisateur
            $latestBMI = 0;
            $bmiCategory = "";
            if ($latestWeight > 0 && $latestHeight > 0) {
                $latestBMI = $latestWeight / ($latestHeight * $latestHeight);
                // Déterminer la catégorie d'IMC en fonction de la valeur récupérée
                if ($latestBMI < 18.5) {
                    $bmiCategory = "Underweight"; // Insuffisance pondérale
                } elseif ($latestBMI >= 18.5 && $latestBMI < 25) {
                    $bmiCategory = "Normal"; // Poids normal
                } elseif ($latestBMI >= 25 && $latestBMI < 30) {
                    $bmiCategory = "Overweight"; // Surpoids
                } else {
                    $bmiCategory = "Obese"; // Obésité
                }
            }
            // Récupérer les données de température pour chaque consultation
            $temperatures = Consultations::where('user_id', $user->id)->pluck('temperature');

            // Récupérer les dates des consultations pour les utiliser comme catégories
            $consultationDates = Consultations::where('user_id', $user->id)->pluck('date');


            // Passez les données paginées à la vue
            return view("users.patient.dashbord", compact('user', 'rdvs', 'doctors', 'doctorNames', 'doctorPhotos', 'tensions', 'latestHeight', 'latestWeight', 'bmiCategory', 'temperatures', 'consultationDates'));
        } else {
            // L'utilisateur n'est pas connecté, vous pouvez le rediriger vers la page de connexion par exemple
            return redirect()->route('login');
        }
    }


    // Méthode pour calculer les statistiques mensuelles de santé
    private function calculateMonthlyStats($userId, $date = null)
    {
        if (!$date) {
            $date = Carbon::now();
        }

        $startOfMonth = $date->startOfMonth()->format('Y-m-d');
        $endOfMonth = $date->endOfMonth()->format('Y-m-d');

        $monthlyStats = DB::table('consultations')
            ->where('user_id', $userId)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->select(DB::raw('AVG(tension) AS average_tension, AVG(temperature) AS average_temperature, AVG(imc) AS average_imc, AVG(poids) AS average_poids, AVG(taille) AS average_taille, AVG(tension) AS average_bpm'))
            ->first();

        $averageBPM = $monthlyStats->average_bpm ?? 0;

        // Vérifier si la valeur de average_bpm est non nulle avant de calculer le pourcentage de changement
        if ($averageBPM != 0) {
            return [
                'average_tension' => $monthlyStats->average_tension ?? 0,
                'average_temperature' => $monthlyStats->average_temperature ?? 0,
                'average_imc' => $monthlyStats->average_imc ?? 0,
                'average_poids' => $monthlyStats->average_poids ?? 0,
                'average_taille' => $monthlyStats->average_taille ?? 0,
                'average_bpm' => $averageBPM,
            ];
        } else {
            // Si average_bpm est zéro, retourner des valeurs par défaut
            return [
                'average_tension' => 0,
                'average_temperature' => 0,
                'average_imc' => 0,
                'average_poids' => 0,
                'average_taille' => 0,
                'average_bpm' => 0,
            ];
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
        $historiqueRendezVous = Rendez_vous::where('patient_id', $id)
            ->where('fini', 1)
            ->with('doctor') // Assuming you have a relationship set up
            ->paginate(5); // Limitez à 5 par page


        return view("users.patient.profil", compact('user', "historiqueRendezVous"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        return view("users.patient.modifier _profil", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { {
            $validator = Validator::make($request->all(), [
                'prenom' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'pseudo' => 'required|string|max:255',
                'etat_civile' => 'nullable|string',
                'telephone' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'date_naissance' => 'required|date',
                'sexe' => 'required|string|in:F,M',
                'ville' => 'nullable|string|max:255',
                'nationalite' => 'nullable|string|max:255',
                'address' => 'nullable|string',
                'allergie' => 'nullable|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'prenom.required' => 'Le prénom est requis.',
                'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
                'prenom.max' => 'Le prénom ne peut pas dépasser 255 caractères.',
                'name.required' => 'Le nom est requis.',
                'name.string' => 'Le nom doit être une chaîne de caractères.',
                'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'pseudo.required' => 'Le nom d\'utilisateur est requis.',
                'pseudo.string' => 'Le nom d\'utilisateur doit être une chaîne de caractères.',
                'pseudo.max' => 'Le nom d\'utilisateur ne peut pas dépasser 255 caractères.',
                'etat_civile.required' => 'Le statut matrimonial est requis.',
                'etat_civile.string' => 'Le statut matrimonial doit être une chaîne de caractères.',
                'etat_civile.in' => 'Le statut matrimonial n\'est pas valide.',
                'telephone.required' => 'Le numéro de téléphone est requis.',
                'telephone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
                'telephone.max' => 'Le numéro de téléphone ne peut pas dépasser 255 caractères.',
                'email.required' => 'L\'adresse e-mail est requise.',
                'email.string' => 'L\'adresse e-mail doit être une chaîne de caractères.',
                'email.email' => 'L\'adresse e-mail doit être une adresse e-mail valide.',
                'email.max' => 'L\'adresse e-mail ne peut pas dépasser 255 caractères.',
                'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
                'date_naissance.required' => 'La date de naissance est requise.',
                'date_naissance.date' => 'La date de naissance doit être une date valide.',
                'sexe.required' => 'Le genre est requis.',
                'sexe.string' => 'Le genre doit être une chaîne de caractères.',
                'sexe.in' => 'Le genre n\'est pas valide.',
                'ville.string' => 'La ville doit être une chaîne de caractères.',
                'ville.max' => 'La ville ne peut pas dépasser 255 caractères.',
                'nationalite.string' => 'La nationalité doit être une chaîne de caractères.',
                'nationalite.max' => 'La nationalité ne peut pas dépasser 255 caractères.',
                'address.string' => 'L\'adresse doit être une chaîne de caractères.',
                'allergie.string' => 'Les allergies doivent être une chaîne de caractères.',
                'photo.image' => 'Le fichier doit être une image.',
                'photo.mimes' => 'Le fichier doit être de type : jpeg, png, jpg, gif ou svg.',
                'photo.max' => 'Le fichier ne peut pas dépasser 2048 kilo-octets (2 Mo).',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Code de mise à jour du patient
            $user = User::findOrFail($id);
            $user->prenom = $request->input('prenom');
            $user->name = $request->input('name');
            $user->pseudo = $request->input('pseudo');
            $user->etat_civile = $request->input('etat_civile');
            $user->telephone = $request->input('telephone');
            $user->email = $request->input('email');
            $user->date_naissance = $request->input('date_naissance');
            $user->sexe = $request->input('sexe');
            $user->ville = $request->input('ville');
            $user->nationalite = $request->input('nationalite');
            $user->address = $request->input('address');
            $user->allergie = $request->input('allergie');

            // Gestion de l'upload de l'avatar
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $fileName = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('avatars'), $fileName);
                $user->photo = "avatars/" . $fileName;
            }

            $user->save();

            return redirect()->route("patient.index")->with('success', 'Profil mis à jour avec succès.');
        }
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
        $disponibilites = Disponibilites::where('doctor_id', $medecinId)
            ->where('status', 1)
            ->get();

        $disponibilitesAvecCreneaux = [];
        foreach ($disponibilites as $disponibilite) {
            $heureDebut = Carbon::parse($disponibilite->heure_debut)->format('H:i:s');
            $heureFin = Carbon::parse($disponibilite->heure_fin)->format('H:i:s');
            $creneaux = [];

            while ($heureDebut < $heureFin) {
                $rendezVousExistants = Rendez_vous::where('doctor_id', $medecinId)
                    ->where('date', $heureDebut)
                    ->exists();

                if (!$rendezVousExistants) {
                    $creneaux[] = [
                        'heure_debut' => $heureDebut,
                        'heure_fin' => Carbon::parse($heureDebut)->addHour()->format('H:i:s'),
                        'jour' => $disponibilite->jour, // Ajout du jour de disponibilité
                    ];
                }
                $heureDebut = Carbon::parse($heureDebut)->addHour()->format('H:i:s');
            }

            $disponibilitesAvecCreneaux[] = [
                'id' => $disponibilite->id,
                'creneaux' => $creneaux,
            ];
        }

        return response()->json($disponibilitesAvecCreneaux);
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

                // Si la mise à jour des données de paiement est réussie
                return response()->json(['message' => 'Données de paiement mises à jour avec succès', 'redirect' => route('patient.index')], 200);
            } else {
                return response()->json(['error' => 'Rendez-vous non trouvé'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour des données de paiement: ' . $e->getMessage());

            return response()->json(['error' => 'Erreur lors de la mise à jour des données de paiement'], 500);
        }
    }

    public function modipass($id)
    {

        $user = User::find($id);

        return view('users.patient.modifier_pass', compact("user"));
    }



    public function dossierMedical()
    {
        // Vérifie si l'utilisateur est connecté
        if (Auth::check()) {
            // Récupère l'utilisateur connecté
            $user = Auth::user();

            // Récupère les consultations du patient
            $consultations = Consultations::with(['doctor', 'ordonnance'])
                ->where('user_id', $user->id)
                ->get();;

            // Retourne la vue avec les données du dossier médical
            return view("users.patient.dossier_medicale", compact('user', 'consultations'));
        } else {
            // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
            return redirect()->route('login');
        }
    }

    public function updatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        // Check if old password matches
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->withErrors(['old_password' => 'The old password does not match our records.']);
        }

        // Update the password
        $user = Auth::user();
        $user->password = Hash::make($request->password);

        $user->save();

        // Redirect with success message
        return back()->with('success', 'Password updated successfully.');
    }
}
