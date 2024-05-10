<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class search_controller extends Controller
{


    public function search(Request $request)
    {
        // Récupère la requête de recherche depuis la requête HTTP
        $searchQuery = $request->input('query');


        //Effectue la recherche dans toutes les informations pertinentes
        $results = User::where('name', 'like', '%' . $searchQuery . '%')
            ->orWhere('prenom', 'like', '%' . $searchQuery . '%')
            ->orWhere('pseudo', 'like', '%' . $searchQuery . '%')
            ->orWhere('email', 'like', '%' . $searchQuery . '%')
            ->orWhere('telephone', 'like', '%' . $searchQuery . '%')
            ->orWhere('date_naissance', 'like', '%' . $searchQuery . '%')
            ->orWhere('ville', 'like', '%' . $searchQuery . '%')
            ->orWhere('nationalite', 'like', '%' . $searchQuery . '%')

            ->get(); // Ajoutez d'autres colonnes ou modèles à rechercher si nécessaire

        $usersByRole = $results->groupBy('id_role');

        // Retourne la vue avec les utilisateurs organisés par id_role
        return view('users.admin.recherche', compact('usersByRole'));
    }
}
