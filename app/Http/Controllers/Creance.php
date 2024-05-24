<?php

namespace App\Http\Controllers;

use App\Models\Creances;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Creance extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $creances = Creances::all();
        return view("users.infirmier.liste_creanceinf", compact('creances',"user"));
    }

    // Méthode pour supprimer une créance
    public function destroy($id)
    {
        $creance = Creances::findOrFail($id);
        $creance->delete();
        return redirect()->route("Creance.index")->with('success', 'Créance supprimée avec succès');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user= Auth::user();
        $patients = User::where('id_role', 1)->get(); // Récupère tous les patients
        return view("users.infirmier.Ajout_creance", compact('patients',"user"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation des données avec des messages personnalisés
    $request->validate([
        'patient_id' => 'required|exists:users,id',
        'montant_tot' => 'required|numeric|min:0',
        'montant_paye' => 'required|numeric|min:0|max:'.$request->input('montant_tot'),
    ], [
        'patient_id.required' => 'Le champ patient est requis.',
        'patient_id.exists' => 'Le patient sélectionné n\'existe pas.',
        'montant_tot.required' => 'Le champ montant total est requis.',
        'montant_tot.numeric' => 'Le montant total doit être un nombre.',
        'montant_tot.min' => 'Le montant total doit être supérieur ou égal à :min.',
        'montant_paye.required' => 'Le champ montant payé est requis.',
        'montant_paye.numeric' => 'Le montant payé doit être un nombre.',
        'montant_paye.min' => 'Le montant payé doit être supérieur ou égal à :min.',
        'montant_paye.max' => 'Le montant payé ne peut pas être supérieur au montant total.',
    ]);

    // Création d'une nouvelle créance avec les données fournies
    Creances::create([
        'patient_id' => $request->input('patient_id'),
        'montant_tot' => $request->input('montant_tot'),
        'montant_res' => $request->input('montant_tot') - $request->input('montant_paye'),
        'montant_paye' => $request->input('montant_paye'),
        'date' => Carbon::now(),
    ]);

    // Redirection avec un message de succès
    return redirect()->route("Creance.create")->with('success', 'La créance a été ajoutée avec succès.');
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
    

    public function listeCreance()
    {
        $user = Auth::user();
        $creances = Creances::where('patient_id', $user->id)->paginate(6);
        return view('users.patient.liste_creance', compact('creances', 'user'));
    }
    
}
