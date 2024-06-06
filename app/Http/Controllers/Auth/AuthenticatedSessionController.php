<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        if ($user->id_role != 4 && $user->status == '0') {
            Auth::logout();
            return redirect()->route('blocked');
        }

        switch ($user->id_role) {
            case 4: // Admin role ID
                return redirect()->route('admin.dashboard');
            case 2: // Doctor role ID
                return redirect()->route('doctor.dashboard');
            case 3: // Infirmier role ID
                return redirect()->route('infirmier.dashboard');
            default: // Default redirect
                return redirect()->route('patient.index');
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
