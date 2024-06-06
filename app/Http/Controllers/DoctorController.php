<?php

namespace App\Http\Controllers;

use App\Models\Specialites;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
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
        //bmiCategory
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user= Auth::user();
        return view("users.doctor.Profil",compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        $specialites = Specialites::all();
        return view("users.doctor.modifierprofil", compact('user', 'specialites'));
    }

    // Mettre à jour le profil du docteur
    public function update(Request $request, $id)
{
    

    $request->validate([
        'prenom' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'pseudo' => 'required|string|max:255',
        'telephone' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'date_naissance' => 'required|date',
        'sexe' => 'required|string|in:M,F',
        'specialite' => 'required|exists:specialites,id',
        'address' => 'nullable|string',
        'ville' => 'nullable|string',
        'nationalite' => 'nullable|string',
      
        'photo' => 'nullable|image|max:2048',
    ]);
   
    $user = User::findOrFail($id);

    $user->prenom = $request->prenom;
    $user->name = $request->name;
    $user->pseudo = $request->pseudo;
    $user->telephone = $request->telephone;
    $user->email = $request->email;
    $user->date_naissance = $request->date_naissance;
    $user->sexe = $request->sexe;
    $user->specialite_id = $request->specialite;
    $user->address = $request->address;
    $user->ville = $request->ville;
    $user->nationalite = $request->nationalite;
    $user->status = $request->status;

    if ($request->hasFile('photo')) {
        try {
            // Stocke la photo dans le dossier "avatars" dans le dossier de stockage
            $photoPath = $request->photo->store('avatars', 'public');
            $user->photo ="/storage/". $photoPath;
        } catch (\Exception $e) {
            Log::error("Erreur lors du téléchargement de la photo : " . $e->getMessage());
            return redirect()->route("doctor.edit_doctor")->with('error', 'Erreur lors du téléchargement de la photo.');
        }
    }

    $user->save();

    return redirect()->route("doctor.dashboard")->with('success', 'Profil du docteur mis à jour avec succès');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
