<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Specialites;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    $validatedData = $request->validate([
        'prenom' => ['required', 'string', 'max:255'],
        'name' => ['required', 'string', 'max:255'],
        'pseudo' => ['required', 'string', 'max:255', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'telephone' => ['required', 'string', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'date_naissance' => ['required', 'date'],
        'sexe' => ['required', 'string', 'in:M,F'],
        'specialite' => ['required', 'integer'],
        'address' => ['nullable', 'string'],
        'ville' => ['nullable', 'string'],
        'nationalite' => ['nullable', 'string'],
        'photo' => ['nullable', 'image'],
        'status' => ['required', 'string', 'in:0,1'],
    ]);

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

    if ($request->hasFile('photo')) {
        $user->photo = $request->file('photo')->store('avatars', 'public');
        $user->photo = 'storage/' . $user->photo;
    } else {
        $user->photo = 'storage/avatars/user.jpg';
    }

    $user->status = $validatedData['status'];

    $user->save();

    return redirect()->route('adm_infirmier.index')->with('success', 'Utilisateur créé avec succès.');
}

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user= Auth::user();
        return view("users.infirmier.Profil",compact("user"));
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
            'sexe' => 'required|in:M,F',
            'specialite' => 'required|exists:specialites,id',
            'address' => 'nullable|string',
            'ville' => 'nullable|string',
            'nationalite' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // Taille maximale de l'image : 2MB
            'status' => 'required|in:1,0',

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
            $photoPath = $request->photo->store('avatars','public'); // Stocke la photo dans le dossier "avatars" dans le dossier de stockage
            $infirmier->photo = "storage/". $photoPath;
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
    public function modipass($id)
    {

        $user = User::find($id);

        //dd($user);
        return view("users.infirmier.pass_modifier", compact("user"));
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
