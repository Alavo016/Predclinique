<?php

namespace App\Http\Controllers;

use App\Models\Type_fourniture;
use Illuminate\Http\Request;

class typefourniture extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typesFournitures = Type_fourniture::all();
        return view('users.admin.liste_typesfourniture', compact('typesFournitures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.admin.ajttypefourniture");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:type_fourniture,nom',
        ]);

        Type_fourniture::create([
            'nom' => $request->nom,
        ]);

        return redirect()->route('typefournitures.index')->with('success', 'Le type de fourniture a été créé avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $typefourniture = Type_fourniture::find($id);

        if (!$typefourniture) {
            // Gérer le cas où aucun modèle n'est trouvé pour l'ID spécifié
            abort(404);
        }

        return view("users.admin.modifier_typefouriture", compact('typefourniture'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:type_fourniture,nom,' . $id,
        ]);

        $typefourniture = Type_fourniture::findOrFail($id)
            ->update([
                'nom' => $request->nom,
            ]);

        return redirect()->route('typefournitures.index')->with('success', 'Le type de fourniture a été mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Chargez le type de fourniture à supprimer
        $typeFourniture = Type_fourniture::findOrFail($id);

        // Supprimez le type de fourniture
        $typeFourniture->delete();

        // Redirigez l'utilisateur vers la liste des types de fournitures
        return redirect()->route('typefournitures.index')
        ->with('success', 'Type de fourniture supprimé avec succès.');
    }
}
