<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Specialites;
use App\Models\User;
use Illuminate\Http\Request;
use WisdomDiala\Countrypkg\Models\Country;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPatients = User::where('id_role', 1)->count();
        $doctors = User::where('id_role', 2)->count();
        $infirmiere =  User::where('id_role', 3)->count();

        return view('users.admin.dashbord', compact('totalPatients', 'doctors', 'infirmiere'));
    }
    public function statistique()
    {
        return view('users.admin.statistique');
    }
    public function listdocteur()
    {
        $roles = Roles::all();
        $specialites = Specialites::all();

        $listdocteurs = User::where('id_role', 2)->get();
        return view('users.admin.listedoctor', compact('listdocteurs', 'roles', 'specialites'));
    }

    public function ajouterdoc()
    {
        $specialites = Specialites::all();
        $contries = Country::all();
        return view('users.admin.ajtdocteur', compact('specialites','contries'));
    }

    public function states(){
        $country_id = request('contrie');
        return $country_id;
    }

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
        $user->id_role = 2;
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
        return redirect()->route('admin.listdocteur')->with('success', 'Utilisateur créé avec succès.');
    }


    public function supprimerDocteur($id)
    {
        // Code pour supprimer le docteur avec l'ID donné
        // Par exemple :
        $docteur = User::find($id);
        if ($docteur) {
            $docteur->delete();
            return redirect()->back()->with('success', 'Le docteur a été supprimé avec succès.');
        } else {
            return redirect()->back()->with('error', 'Le docteur n\'a pas été trouvé.');
        }
    }


    public function modifier($id)
    {
        if (!$id) {
            return redirect()->route('users.admin.listdocteur')->with('error', 'Aucun docteur n\'a été sélectionné pour la modification.');
        }

        $docteur = User::find($id);
        if (!$docteur) {
            return redirect()->route('users.admin.listdocteur')->with('error', 'Le docteur sélectionné n\'existe pas.');
        }

        $roles = Roles::all();
        $specialites = Specialites::all();

        return view('users.admin.modifier_doc', compact('docteur',  'specialites'));
    }





    public function updateDocteur(Request $request, $id)
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
            'status' => 'required|in:active,inactive',

        ]);

        // Trouver le docteur à mettre à jour
        $docteur = User::findOrFail($id);

        // Mettre à jour les informations du docteur
        $docteur->name = $request->name;
        $docteur->prenom = $request->prenom;
        $docteur->pseudo = $request->pseudo;
        $docteur->email = $request->email;
        $docteur->specialite_id = $request->specialite;
        $docteur->telephone = $request->telephone;
        $docteur->date_naissance = $request->date_naissance;
        $docteur->sexe = $request->sexe;
        $docteur->address = $request->address;
        $docteur->ville = $request->ville;
        $docteur->nationalite = $request->nationalite;
        $docteur->status = $request->status;

        // Si une nouvelle photo est soumise, enregistrer
        if ($request->hasFile('photo')) {
            // Gérer l'enregistrement de la nouvelle photo
            $photoPath = $request->photo->store('avatars'); // Stocke la photo dans le dossier "avatars" dans le dossier de stockage
            $docteur->photo = $photoPath;
        }

        $docteur->save();

        // Redirection avec un message de succès
        return redirect()->route('admin.listdocteur')->with('success', 'Les informations du docteur ont été mises à jour avec succès.');
    }

    public function profile($id)
    {
        // Récupérer les informations de l'utilisateur depuis la base de données
        $user = User::findOrFail($id);

        // Passer les informations de l'utilisateur à la vue pour l'affichage
        return view("users.admin.profile", ['user' => $user]);
    }
}
