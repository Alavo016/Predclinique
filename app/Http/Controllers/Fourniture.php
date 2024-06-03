<?php

namespace App\Http\Controllers;

use App\Models\Fournitures;
use App\Models\Type_fourniture;
use App\Models\User;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Fourniture extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $fournitures = Fournitures::all();
        return view("users.infirmier.liste_fourniture", compact('fournitures',"user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $infirmiers = User::where('id_role', 2)->get(); // Assuming 2 is the role ID for infirmiers
        $types_fournitures = Type_fourniture::all();

        return view("users.infirmier.fourniture_create", compact('infirmiers',  'user',"types_fournitures"));
    }


    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer',
            'seuil_minimum' => 'required|integer',
            'prix_unitaire' => 'required|numeric',
            'type_fourniture_id' => 'required|exists:type_fourniture,id',
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
        // dd($request->input());

        // Gestion du téléchargement de la photo
        $photoPath = $request->file('photo')->store('fourniture', 'public');

        // Création de la fourniture
        $fourniture = new Fournitures();
        $fourniture->nom = $request->nom;
        $fourniture->quantite = $request->quantite;
        $fourniture->seuil_minimum = $request->seuil_minimum;
        $fourniture->prix_unitaire = $request->prix_unitaire;
        $fourniture->type_fourniture_id = $request->type_fourniture_id;


        $fourniture->photo =  $photoPath; // Enregistrement de l'URL de l'image
        $fourniture->save(); // Sauvegarde de la fourniture dans la base de données

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
    public function edit($id)
    {
        $user = Auth::user();
        $fourniture = Fournitures::findOrFail($id);
        $types_fournitures = Type_fourniture::all();
        return view("users.infirmier.modifier_listefourniture", compact('fourniture', 'types_fournitures',"user"));
    }

    // Mettre à jour une fourniture existante
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer',
            'seuil_minimum' => 'required|integer',
            'prix_unitaire' => 'required|numeric',
            'type_fourniture_id' => 'required|exists:type_fourniture,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nom.required' => 'Le nom de la fourniture est obligatoire.',
            'quantite.required' => 'La quantité est obligatoire.',
            'seuil_minimum.required' => 'Le seuil minimum est obligatoire.',
            'prix_unitaire.required' => 'Le prix unitaire est obligatoire.',
            'type_fourniture_id.required' => 'Veuillez sélectionner un type de fourniture.',
            'photo.image' => 'Le fichier doit être une image.',
        ]);

        $fourniture = Fournitures::findOrFail($id);

        // Gestion du téléchargement de la photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo
            if ($fourniture->photo) {
                Storage::disk('public')->delete($fourniture->photo);
            }

            $photoPath = $request->file('photo')->store('fourniture', 'public');
            $fourniture->photo =  $photoPath;
        }

        // Mise à jour de la fourniture
        $fourniture->update([
            'nom' => $request->nom,
            'quantite' => $request->quantite,
            'seuil_minimum' => $request->seuil_minimum,
            'prix_unitaire' => $request->prix_unitaire,
            'type_fourniture_id' => $request->type_fourniture_id,
        ]);

        // Redirection avec message de succès
        return redirect()->route('fourniture.index')->with('success', 'Fourniture mise à jour avec succès.');
    }

    // Supprimer une fourniture
    public function destroy($id)
    {
        $fourniture = Fournitures::findOrFail($id);

        // Supprimer la photo associée
        if ($fourniture->photo) {
            Storage::disk('public')->delete($fourniture->photo);
        }

        // Supprimer la fourniture
        $fourniture->delete();

        // Redirection avec message de succès
        return redirect()->route("fourniture.index")->with('success', 'Fourniture supprimée avec succès.');
    }
}
