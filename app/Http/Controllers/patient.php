<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class patient extends Controller
{
    public function accueil()
    {
        return view('patients.Acceuil');
    }

    public function contact(){
        return view('patients.contact');

    }

    public function faqs ()
    {
        return view('patients.faqs');
    }

    public function rdv(){
        return view('patients.rdv');
    }

    public function dossier()
    {
        return view('patients.dossier');
    }


}
