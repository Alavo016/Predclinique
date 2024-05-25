<?php

namespace App\Http\Controllers;

use App\Models\Fournitures;
use App\Models\Type_fourniture;
use App\Models\User;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Fourniture extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $infirmiers = User::where('id_role', 2)->get(); // Assuming 2 is the role ID for infirmiers


        return view("users.infirmier.fourniture_create", compact('infirmiers',  'user'));
    }


    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer',
            'seuil_minimum' => 'required|integer',
            'prix_unitaire' => 'required|numeric',
            'type_fourniture_id' => 'required|exists:type_fournitures,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nom.required' => 'Le nom de la fourniture est obligatoire.',
            'quantite.required' => 'La quantité est obligatoire.',
            'seuil_minimum.required' => 'Le seuil minimum est obligatoire.',
            'prix_unitaire.required' => 'Le prix unitaire est obligatoire.',
            'type_fourniture_id.required' => 'Veuillez sélectionner un type de fourniture.',
            'photo.required' => 'Veuillez télécharger une photo.',
            'photo.image' => 'Le fichier doit être une image.',
        ]);

        // Gestion du téléchargement de la photo
        $photoPath = $request->file('photo')->store('fourniture', 'public');

        // Création de la fourniture
        Fournitures::create([
            'nom' => $request->nom,
            'quantite' => $request->quantite,
            'seuil_minimum' => $request->seuil_minimum,
            'prix_unitaire' => $request->prix_unitaire,
            'inf_id' => Auth::id(), // Assuming the logged-in user is the infirmier
            'type_fourniture_id' => $request->type_fourniture_id,
            'photo' => 'storage/' . $photoPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirection avec message de succès
        return redirect()->route('fourniture.create')->with('success', 'Fourniture ajoutée avec succès.');
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
    public function destroy(string $id)
    {
        //
    }
}
