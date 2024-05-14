<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Specialites;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Infirmier extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = Roles::all();
        $specialites = Specialites::all();

        $infirmiers = User::where('id_role', 3)->get();
        return view("users.admin.listinfirmier  ", compact('infirmiers', 'roles', 'specialites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialites = Specialites::all();
        return view('users.admin.ajtinfirmier', compact('specialites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validez les données du formulaire
        $validatedData = $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'pseudo' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'date_naissance' => ['required', 'date'],
            'sexe' => ['required', 'string', 'in:male,female'],
            'specialite' => ['required', 'integer'],
            'address' => ['nullable', 'string'],
            'ville' => ['nullable', 'string'],
            'nationalite' => ['nullable', 'string'],
            'photo' => ['nullable', 'image'],
            'status' => ['required', 'string', 'in:active,inactive'],
        ]);


        // Créez un nouvel utilisateur avec les données validées
        $user = new User();
        $user->id_role = 3;
        $user->prenom = $validatedData['prenom'];
        $user->name = $validatedData['name'];
        $user->pseudo = $validatedData['pseudo'];
        $user->email = $validatedData['email'];
        $user->telephone = $validatedData['telephone'];
        $user->password = Hash::make($validatedData['password']);
        $user->date_naissance = $validatedData['date_naissance'];
        $user->sexe = $validatedData['sexe'];
        $user->specialite_id = $validatedData['specialite'];
        $user->address = $validatedData['address'];
        $user->ville = $validatedData['ville'];
        $user->nationalite = $validatedData['nationalite'];
        // Vérifie si un fichier a été téléchargé
        if ($request->hasFile('photo')) {
            $user->photo = $request->file('photo')->store('avatars', 'public');
            $user->photo =  'storage/' . $user->photo;
        } else {
            // Aucun fichier n'a été téléchargé, donc utilisez l'image par défaut
            $user->photo = 'storage/avatars/user.jpg'; // Remplacez le chemin par le chemin de votre image par défaut
        }
        $user->status = $validatedData['status'];

        // Enregistrez l'utilisateur dans la base de données
        $user->save();

        // Redirigez l'utilisateur vers une autre page après l'enregistrement
        return redirect()->route('adm_infirmier.index')->with('success', 'Utilisateur créé avec succès.');
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
            return redirect()->route('adm_infirmier.index')->with('error', 'Aucun infirmier n\'a été sélectionné pour la modification.');
        }

        $infirmier = User::find($id);
        if (!$infirmier) {
            return redirect()->route('adm_infirmier.index')->with('error', 'L\' infirmier sélectionné n\'existe pas.');
        }


        $specialites = Specialites::all();

        return view('users.admin.modifoer_inf', compact('infirmier',  'specialites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'prenom' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'pseudo' => 'required|string|max:255|unique:users,pseudo,' . $id,
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,

            'date_naissance' => 'required|date',
            'sexe' => 'required|in:male,female',
            'specialite' => 'required|exists:specialites,id',
            'address' => 'nullable|string',
            'ville' => 'nullable|string',
            'nationalite' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // Taille maximale de l'image : 2MB
            'status' => 'required|in:active,inactive',

        ]);

        // Trouver le infirmier à mettre à jour
        $infirmier = User::findOrFail($id);

        // Mettre à jour les informations du infirmier
        $infirmier->name = $request->name;
        $infirmier->prenom = $request->prenom;
        $infirmier->pseudo = $request->pseudo;
        $infirmier->email = $request->email;
        $infirmier->specialite_id = $request->specialite;
        $infirmier->telephone = $request->telephone;
        $infirmier->date_naissance = $request->date_naissance;
        $infirmier->sexe = $request->sexe;
        $infirmier->address = $request->address;
        $infirmier->ville = $request->ville;
        $infirmier->nationalite = $request->nationalite;
        $infirmier->status = $request->status;

        // Si une nouvelle photo est soumise, enregistrer
        if ($request->hasFile('photo')) {
            // Gérer l'enregistrement de la nouvelle photo
            $photoPath = $request->photo->store('avatars'); // Stocke la photo dans le dossier "avatars" dans le dossier de stockage
            $infirmier->photo = $photoPath;
        }

        $infirmier->save();

        // Redirection avec un message de succès
        return redirect()->route('adm_infirmier.index')->with('success', 'Les informations du infirmier ont été mises à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $infirmier = User::find($id);
        if ($infirmier) {
            $infirmier->delete();
            return redirect()->route('adm_infirmier.index')->with('success', "L 'infirmier a été supprimé avec succès.");
        } else {
            return redirect()->back()->with('error', "L'infirmier n\'a pas été trouvé.");
        }
    }
}
