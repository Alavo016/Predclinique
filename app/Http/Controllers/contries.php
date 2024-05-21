<?php

namespace App\Http\Controllers;
use WisdomDiala\Countrypkg\Models\State;



use Illuminate\Http\Request;


class contries extends Controller
{
    public function getEtats($paysId)
    {
        // Récupérer les états associés au pays $paysId depuis la base de données
        $etats = State::where('country_id', $paysId)->get();

        // Retourner les états au format JSON
        return response()->json($etats);
    }
}
