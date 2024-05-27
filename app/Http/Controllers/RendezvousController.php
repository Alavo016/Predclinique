<?php

namespace App\Http\Controllers;

use App\Models\Rendez_vous;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RendezvousController extends Controller
{
    public function showRendezvous()
    {
        return view("users.doctor.rendezvous");
    }

    public function getRendezvousEvents()
    {
        try {
            $medecinId = Auth::user()->id;
            $rendezvous = Rendez_vous::where('doctor_id', $medecinId)
                ->where('statut', "rdv pris")  // Filtrer les rendez-vous confirmés
                ->get(['id', 'date', 'motif', 'created_at']);

            $events = $rendezvous->map(function ($rdv) {
                return [
                    'id' => $rdv->id,
                    'title' => $rdv->motif,
                    'start' => $rdv->date,
                ];
            });

            return response()->json($events);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération des disponibilités: ' . $e->getMessage()], 500);
        }
    }
}
