<?php

namespace App\Http\Controllers;

use App\Models\Consultations;
use App\Models\ordonnances;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Consulationdoc extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // Charger les consultations avec les patients associés
        $consultations = Consultations::where('doctor_id', $user->id)->with('patient')->get();

        return view('users.doctor.liste_consultationdoc', compact('user', 'consultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($patient_id = null)
    {
        $user = Auth::user();
        $patient = $patient_id ? User::find($patient_id) : null;

        if ($patient_id && !$patient) {
            return redirect()->route('consultations.index')->with('error', 'Patient non trouvé.');
        }

        return view("users.doctor.add_consulation", compact('user', 'patient'));
    }


    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
    {
        // Personnalisation des messages d'erreur
        $messages = [
            'motif.required' => 'Le motif de la consultation est obligatoire.',
            'symptomes.required' => 'Les symptômes sont obligatoires.',
            'diagnostic.required' => 'Le diagnostic est obligatoire.',
            'heure_fin.required' => "L'heure de fin est obligatoire.",
            'heure_fin.date_format' => "Le format de l'heure de fin est invalide.",
            'medicaments.required' => 'Les médicaments sont obligatoires.',
            'posologie.required' => 'La posologie est obligatoire.',
        ];

        // Valider les données de la requête
        $request->validate([
            'motif' => 'required|string',
            'symptomes' => 'required|string',
            'diagnostic' => 'required|string',
            'heure_fin' => 'required|date_format:Y-m-d\TH:i',
            'medicaments' => 'required|string',
            'posologie' => 'required|string',
        ], $messages);

        // Récupérer l'ID du médecin connecté
        $doctor_id = Auth::id();

        // Récupérer le patient_id passé dans un champ caché
        $patient_id = $request->patient_id;

        // Créer une nouvelle ordonnance
        $ordonnance = new Ordonnances();
        $ordonnance->medicaments = $request->medicaments;
        $ordonnance->posologie = $request->posologie;
        $ordonnance->date = Carbon::now(); // Ajouter la date et l'heure actuelles
        $ordonnance->save();

        // Créer une nouvelle consultation
        $consultation = new Consultations();
        $consultation->date = Carbon::now(); // Ajouter la date et l'heure actuelles
        $consultation->motif = $request->motif;
        $consultation->symptomes = $request->symptomes;
        $consultation->diagnostic = $request->diagnostic;
        $consultation->heure_fin = Carbon::createFromFormat('Y-m-d\TH:i', $request->heure_fin);
        $consultation->user_id = $patient_id; // Associer la consultation au patient
        $consultation->doctor_id = $doctor_id; // Associer la consultation au médecin
        $consultation->ordonnance_id = $ordonnance->id; // Associer l'ordonnance à la consultation

        // Enregistrer la consultation
        $consultation->save();

        // Rediriger l'utilisateur vers une page appropriée
        return redirect()->route('consultations.index')->with('success', 'La consultation et l\'ordonnance ont été créées avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $consultation = Consultations::with('ordonnance')->findOrFail($id);
        return view("users.doctor.modifier_cosulation", compact('consultation'));
    }

    public function update(Request $request, $id)
    {
        // Personnalisation des messages d'erreur
        $messages = [
            'motif.required' => 'Le motif de la consultation est obligatoire.',
            'symptomes.required' => 'Les symptômes sont obligatoires.',
            'diagnostic.required' => 'Le diagnostic est obligatoire.',
            'heure_fin.required' => "L'heure de fin est obligatoire.",
            'heure_fin.date_format' => "L'heure de fin doit être au format valide.",
            'medicaments.required' => 'Les médicaments sont obligatoires.',
            'posologie.required' => 'La posologie est obligatoire.',
        ];

        // Valider les données de la requête
        $request->validate([
            'motif' => 'required|string',
            'symptomes' => 'required|string',
            'diagnostic' => 'required|string',
            'heure_fin' => 'required|date_format:Y-m-d\TH:i',
            'medicaments' => 'required|string',
            'posologie' => 'required|string',
        ], $messages);

        // Récupérer la consultation à modifier
        $consultation = Consultations::findOrFail($id);
        $consultation->motif = $request->motif;
        $consultation->symptomes = $request->symptomes;
        $consultation->diagnostic = $request->diagnostic;
        $consultation->heure_fin = Carbon::createFromFormat('Y-m-d\TH:i', $request->heure_fin);
        $consultation->save();

        // Récupérer l'ordonnance associée à cette consultation
        $ordonnance = $consultation->ordonnance;
        if (!$ordonnance) {
            $ordonnance = new Ordonnances();
            $ordonnance->consultation_id = $consultation->id;
        }
        $ordonnance->medicaments = $request->medicaments;
        $ordonnance->posologie = $request->posologie;
        $ordonnance->save();

        // Rediriger l'utilisateur vers une page appropriée
        return redirect()->route('consultations.index')->with('success', 'La consultation et l\'ordonnance ont été mises à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $consultation = Consultations::findOrFail($id);

        // Supprimer la consultation en premier
        $consultation->delete();

        // Ensuite, supprimer l'ordonnance associée
        $ordonnance = Ordonnances::find($consultation->ordonnance_id);
        if ($ordonnance) {
            $ordonnance->delete();
        }

        // Rediriger l'utilisateur avec un message de succès
        return redirect()->route('consultations.index')->with('success', 'La consultation et l\'ordonnance ont été supprimées avec succès.');
    }
}