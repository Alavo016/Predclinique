@extends('users.admin.masteradm')

@section('title', 'Admin modifier patient')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap-datetimepicker.min.css') }}">

    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.listdocteur') }}">Doctors </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Modifier un patient </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Utilisation de la directive Laravel @csrf pour la protection CSRF -->
                            <form method="POST" action="{{ route('adm_Patient.update',$patient->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Doctor Details</h4>
                                        </div>
                                    </div>
                                    <!-- Colonne pour le prénom -->
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Prénom <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" placeholder="Votre prénom"
                                                name="prenom" value="{{ $patient->prenom }}">
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
                                                name="name" value="{{ $patient->name }}">
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
                                                name="pseudo" value="{{ $patient->pseudo }}">
                                        </div>
                                        @error('pseudo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour le numéro de mobile -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Mobile <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" placeholder="Votre numéro de mobile"
                                                name="telephone" value="{{ $patient->telephone }}">
                                        </div>
                                        @error('telephone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour l'adresse e-mail -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" type="email" placeholder="Votre adresse e-mail"
                                                name="email" value="{{ $patient->email }}">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour le mot de passe -->


                                    <!-- Colonne pour la date de naissance -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms cal-icon">
                                            <label>Date de naissance <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker" type="date" name="date_naissance"
                                                value="{{ $patient->date_naissance }}">
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
                                                        value="male"
                                                        {{ $patient->sexe == 'male' ? 'checked' : '' }}>Homme
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="sexe" class="form-check-input mt-0"
                                                        value="female"
                                                        {{ $patient->sexe == 'female' ? 'checked' : '' }}>Femme
                                                </label>
                                            </div>
                                        </div>
                                        @error('sexe')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour l'éducation -->

                                    <!-- Colonne pour le département -->
                                    {{-- <div class="col-12 col-md-12 col-xl-12">
                                        <div class="input-block local-forms">
                                            <label>Département <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="specialite">
                                                @foreach ($specialites as $specialite)
                                                    <option value="{{ $specialite->id }}"
                                                        {{ $patient->specialite_id == $specialite->id ? 'selected' : '' }}>
                                                        {{ $specialite->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('specialite')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> --}} 
                                    <!-- Colonne pour l'adresse -->
                                    <div class="col-12 col-sm-12">
                                        <div class="input-block local-forms">
                                            <label>Adresse <span class="login-danger"></span></label>
                                            <textarea class="form-control" rows="3" cols="30" placeholder="Votre adresse" name="address">{{ $patient->address }} </textarea>
                                        </div>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour la ville -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Ville <span class="login-danger"></span></label>
                                            <input type="text" name="ville" class="form-control" value="{{ $patient->ville }}">
                                        </div>
                                        @error('ville')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Colonne pour le pays -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Pays <span class="login-danger"></span></label>
                                            <input type="text" name="nationalite" class="form-control" value="{{ $patient->nationalite }}">
                                        </div>
                                        @error('nationalité')
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
                                    <!-- Colonne pour le statut -->
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block select-gender">
                                            <label class="gen-label">Statut <span class="login-danger">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status" class="form-check-input mt-0"
                                                        value="active" {{ $patient->status == "active" ? 'checked' : '' }}>Actif
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status" class="form-check-input mt-0"
                                                        value="inactive" {{ $patient->status == "inactive" ? 'checked' : '' }}>Inactif
                                                </label>
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
