@extends('users.patient.masterpat')

@section('title', 'Dashboard Patient')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ul>
                    </div>
                </div>
            </div>
            <x-session />

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('patient.update', $user->id) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Doctor Details</h4>
                                        </div>
                                    </div>
                                    <!-- Colonne pour le prénom -->
                                    <div class=" col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Prénom <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" placeholder="Votre prénom"
                                                name="prenom" value="{{ $user->prenom }}">
                                        </div>
                                        @error('prenom')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour le nom de famille -->
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Nom de famille <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" placeholder="Votre nom de famille"
                                                name="name" value="{{ $user->name }}">
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour le nom d'utilisateur -->
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Nom d'utilisateur <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" placeholder="Nom d'utilisateur"
                                                name="pseudo" value="{{ $user->pseudo }}">
                                        </div>
                                        @error('pseudo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- etat civile --}}
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Statut matrimonial <span class="login-danger">*</span></label>
                                            <select class="form-select" name="etat_civile">
                                                <option value="Célibataire"
                                                    {{ $user->etat_civile === 'Célibataire' ? 'selected' : '' }}>Célibataire
                                                </option>
                                                <option value="Marié(e)"
                                                    {{ $user->etat_civile === 'Marié(e)' ? 'selected' : '' }}>Marié(e)
                                                </option>
                                                <option value="Divorcé(e)"
                                                    {{ $user->etat_civile === 'Divorcé(e)' ? 'selected' : '' }}>Divorcé(e)
                                                </option>
                                            </select>
                                        </div>
                                        @error('etat_civile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour le numéro de mobile -->
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Mobile <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" placeholder="Votre numéro de mobile"
                                                name="telephone" value="{{ $user->telephone }}">
                                        </div>
                                        @error('telephone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour l'adresse e-mail -->
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" type="email" placeholder="Votre adresse e-mail"
                                                name="email" value="{{ $user->email }}">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour le mot de passe -->


                                    <!-- Colonne pour la date de naissance -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block ">
                                            <label>Date de naissance <span class="login-danger">*</span></label>
                                            <input class="form-control " type="date" name="date_naissance"
                                                value="{{ $user->date_naissance }}">
                                        </div>
                                        @error('date_naissance')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour le genre -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block select-gender">
                                            <label class="gen-label">Genre<span class="login-danger">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="sexe" class="form-check-input mt-0"
                                                        value="F" {{ $user->sexe == 'F' ? 'checked' : '' }}>Homme
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="sexe" class="form-check-input mt-0"
                                                        value="F" {{ $user->sexe == 'M' ? 'checked' : '' }}>Femme
                                                </label>
                                            </div>
                                        </div>
                                        @error('sexe')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <!-- Colonne pour la ville -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Ville <span class="login-danger"></span></label>
                                            <input type="text" name="ville" class="form-control"
                                                value="{{ $user->ville }}">
                                        </div>
                                        @error('ville')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour le pays -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Pays <span class="login-danger"></span></label>
                                            <input type="text" name="nationalite" class="form-control"
                                                value="{{ $user->nationalite }}">
                                        </div>
                                        @error('nationalité')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Colonne pour l'adresse -->
                                    <div class="col-12 col-sm-12">
                                        <div class="input-block local-forms">
                                            <label>Adresse <span class="login-danger"></span></label>
                                            <textarea class="form-control" rows="3" cols="30" placeholder="Votre adresse" name="address">{{ $user->address }} </textarea>
                                        </div>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour allergie -->
                                    <div class="col-12 col-sm-12">
                                        <div class="input-block local-forms">
                                            <label>Allergie<span class="login-danger"></span></label>
                                            <textarea class="form-control" rows="3" cols="30" placeholder="Votre adresse" name="allergie">{{ $user->allergie }} </textarea>
                                        </div>
                                        @error('allergie')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <!-- Colonne pour l'avatar -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-top-form">
                                            <label class="local-top">Avatar <span class="login-danger"></span></label>
                                            <div class="settings-btn upload-files-avator">
                                                <input type="file" accept="image/*" name="photo" id="file"
                                                    onchange="loadFile(event)" class="hide-input"
                                                    data-cf-modified-d50b1184731e13cf3a79392c->
                                                <label for="file" class="upload">Choisir le fichier</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Boutons de soumission -->
                                    <div class="col-12">
                                        <div class="doctor-submit text-end">
                                            <button type="submit"
                                                class="btn btn-primary submit-form me-2">Soumettre</button>
                                            <button type="reset" class="btn btn-primary cancel-form">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
