<?php

namespace App\Http\Controllers;

use App\Models\Consultations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Consulationdoc extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // Charger les consultations avec les patients associés
        $consultations = Consultations::where('doctor_id', $user->id)->with('patient')->get();
    
        return view('users.doctor.liste_consultationdoc', compact('user', 'consultations'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create($patient_id = null)
    {
        $user = Auth::user();
        $patient = $patient_id ? User::find($patient_id) : null;

        if ($patient_id && !$patient) {
            return redirect()->route('consultations.index')->with('error', 'Patient non trouvé.');
        }

        return view("users.doctor.add_consulation", compact('user', 'patient'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
