<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Specialites;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Patient extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $roles = Roles::all();
        $specialites = Specialites::all();

        $patients = User::where('id_role', 1)->get();
        return view("users.admin.listepatient", compact('patients',  'specialites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialites = Specialites::all();
        return view('users.admin.ajtpatient', compact('specialites'));
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

            'address' => ['nullable', 'string'],
            'ville' => ['nullable', 'string'],
            'nationalite' => ['nullable', 'string'],
            'photo' => ['nullable', 'image'],
            'status' => ['required', 'string', 'in:active,inactive'],
        ]);


        // Créez un nouvel utilisateur avec les données validées
        $user = new User();
        $user->id_role = 1;
        $user->prenom = $validatedData['prenom'];
        $user->name = $validatedData['name'];
        $user->pseudo = $validatedData['pseudo'];
        $user->email = $validatedData['email'];
        $user->telephone = $validatedData['telephone'];
        $user->password = Hash::make($validatedData['password']);
        $user->date_naissance = $validatedData['date_naissance'];
        $user->sexe = $validatedData['sexe'];

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
        return redirect()->route('adm_Patient.store')->with('success', 'Utilisateur créé avec succès.');
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
            return redirect()->route('adm_Patient.index')->with('error', 'Aucun patient n\'a été sélectionné pour la modification.');
        }

        $patient = User::find($id);
        if (!$patient) {
            return redirect()->route('adm_Patient.index')->with('error', 'Le patient sélectionné n\'existe pas.');
        }


        $specialites = Specialites::all();

        return view('users.admin.modifierpatient', compact('patient',  'specialites'));
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
            'address' => 'nullable|string',
            'ville' => 'nullable|string',
            'nationalite' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // Taille maximale de l'image : 2MB
            'status' => 'required|in:active,inactive',

        ]);

        // Trouver le Patient à mettre à jour
        $Patient = User::findOrFail($id);

        // Mettre à jour les informations du Patient
        $Patient->name = $request->name;
        $Patient->prenom = $request->prenom;
        $Patient->pseudo = $request->pseudo;
        $Patient->email = $request->email;
        $Patient->specialite_id = $request->specialite;
        $Patient->telephone = $request->telephone;
        $Patient->date_naissance = $request->date_naissance;
        $Patient->sexe = $request->sexe;
        $Patient->address = $request->address;
        $Patient->ville = $request->ville;
        $Patient->nationalite = $request->nationalite;
        $Patient->status = $request->status;

        // Si une nouvelle photo est soumise, enregistrer
        if ($request->hasFile('photo')) {
            // Gérer l'enregistrement de la nouvelle photo
            $photoPath = $request->photo->store('avatars'); // Stocke la photo dans le dossier "avatars" dans le dossier de stockage
            $Patient->photo = $photoPath;
        }

        $Patient->save();

        // Redirection avec un message de succès
        return redirect()->route('adm_Patient.index')->with('success', 'Les informations du Patient ont été mises à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Patient = User::find($id);
        if ($Patient) {
            $Patient->delete();
            return redirect()->route('adm_Patient.index')->with('success', "L 'Patient a été supprimé avec succès.");
        } else {
            return redirect()->back()->with('error', "L'Patient n\'a pas été trouvé.");
        }
    }

    public function contact(){
        return view("contact");

        
    }
    public function faqs(){
        return view('faqs');
    }
}
