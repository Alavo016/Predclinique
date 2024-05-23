<?php

namespace App\Http\Controllers;

use App\Models\Creances;
use App\Models\Fournitures;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InfirmierDashboardController extends Controller
{
    public function index()
    {
        // Vérifie si l'utilisateur est connecté
        if (Auth::check()) {
            // Récupère l'utilisateur connecté
            $user = Auth::user();

            // Nombre de patients (utilisateurs avec id_role égal à 1)
            $numberOfPatients = User::where('id_role', 1)->count();

            // Nombre de fournitures
            $numberOfFournitures = Fournitures::count();

            // Liste des créances
            $creances = Creances::all();

            // Nombre total de créances
            $creancesCount = $creances->count();

            // Somme totale des créances
            $totalCreances = $creances->sum('montant_res');

            // Récupère les créances par mois sur une période de trois ans
            $creancesParMois = Creances::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(montant_tot) as total')
                ->where('date', '>=', Carbon::now()->subYears(3))
                ->groupBy('year', 'month')
                ->orderBy('year')
                ->orderBy('month')
                ->get();

            // Formate les données pour les rendre compatibles avec le graphique
            $labels = [];
            $data = [];
            foreach ($creancesParMois as $creance) {
                $labels[] = Carbon::create($creance->year, $creance->month)->format('M Y');
                $data[] = $creance->total;
            }

            // Récupérer toutes les fournitures
            $fournitures = Fournitures::all();

            // Préparer les étiquettes et les données pour le graphique donut
            $labelsDonut = $fournitures->pluck('nom')->toArray();
            $numberOfFournituresArray = $fournitures->pluck('quantite')->toArray();

            // Retourner la vue avec les données
            return view('users.infirmier.dashboard', compact('user', 'numberOfPatients', 'numberOfFournitures', 'creancesCount', 'totalCreances', 'labels', 'data', 'labelsDonut', 'numberOfFournituresArray'));
        } else {
            // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
            return redirect()->route('login');
        }
    }
}
