<?php

namespace App\Http\Controllers;

use App\Models\Specialites;
use Illuminate\Http\Request;

class Departement extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialites = Specialites::all();
        return view('users.admin.listespecialites', compact('specialites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.admin.Ajtspecialites');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'prix' => ['required', 'numeric'], // Ajout de la validation pour le prix
        ]);

        // Créer une nouvelle spécialité avec les données validées
        $specialite = new Specialites();
        $specialite->nom = $validatedData['nom'];
        $specialite->description = $validatedData['description'];
        $specialite->prix = $validatedData['prix']; // Assigner le prix

        // Enregistrer la spécialité dans la base de données
        $specialite->save();

        // Rediriger l'utilisateur vers une autre page après l'enregistrement
        return redirect()->route("adm_specialites.index")->with('success', 'Specialité créé avec succès.');
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
        if (!$id) {
            return redirect()->route('adm_specialites.index')->with('error', 'Aucune specialité n\'a été sélectionné pour la modification.');
        }

        $specialite = Specialites::find($id);
        if (!$specialite) {
            return redirect()->route('adm_specialites.index')->with('error', 'La specialité sélectionné n\'existe pas.');
        }

        return view('users.admin.modifierspecalites', compact('specialite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'prix' => ['required', 'numeric'], // Ajout de la validation pour le prix
        ]);

        // Trouver la spécialité à mettre à jour
        $specialite = Specialites::findOrFail($id);

        // Mettre à jour les informations de la spécialité
        $specialite->nom = $request->nom;
        $specialite->description = $request->description;
        $specialite->prix = $request->prix; // Assigner le prix

        // Enregistrer les modifications dans la base de données
        $specialite->save();

        // Rediriger avec un message de succès
        return redirect()->route('adm_specialites.index')->with('success', 'Spécialité mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specialite = Specialites::find($id);
        if ($specialite) {
            $specialite->delete();
            return redirect()->route('adm_specialites.index')->with('success', "La spécialité a été supprimée avec succès.");
        } else {
            return redirect()->back()->with('error', "La spécialité n'a pas été trouvée.");
        }
    }
}
