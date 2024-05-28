<?php

namespace App\Http\Middleware;

use App\Models\Rendez_vous;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CleanupRdvNonPris
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Trouver les rendez-vous dont le statut est "rdv non pris" et qui ont été créés il y a plus de 30 minutes
        $rendezVousASupprimer = Rendez_vous::where('statut', 'Rdv non cloturé')
            ->where('created_at', '<=', Carbon::now()->subMinutes(30))
            ->get();

        // Supprimer les rendez-vous trouvés
        foreach ($rendezVousASupprimer as $rdv) {
            $rdv->delete();
        }

        return $next($request);
    }
}
