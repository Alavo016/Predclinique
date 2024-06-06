@extends('users.doctor.masterdoc')

@section('title', 'Créer une Consultation')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Créer une Consultation</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card p-2">
                    <div class="card-body">
                        <form action="{{ route('consultations.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="patient_id" value="{{ request('patient_id') }}">

                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="text-muted text-center">Information de la consultation</h3>
                                    <div class="form-group">
                                        <label class="form-label" for="motif">Motif <span class="text-danger">*</span></label>
                                        <input type="text" name="motif" id="motif" class="form-control" required>
                                        @error('motif')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="symptomes">Symptômes <span class="text-danger">*</span></label>
                                        <textarea name="symptomes" id="symptomes" class="form-control" rows="3" required></textarea>
                                        @error('symptomes')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="diagnostic">Diagnostic <span class="text-danger">*</span></label>
                                        <textarea name="diagnostic" id="diagnostic" class="form-control" rows="3" required></textarea>
                                        @error('diagnostic')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="heure_fin">Heure de Fin <span class="text-danger">*</span></label>
                                        <input type="datetime-local" name="heure_fin" id="heure_fin" class="form-control" required>
                                        @error('heure_fin')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- New Fields -->
                                    <div class="form-group">
                                        <label class="form-label" for="temperature">Température <span class="text-danger">*</span></label>
                                        <input type="number" step="0.1" name="temperature" id="temperature" class="form-control" required>
                                        @error('temperature')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="tension">Tension <span class="text-danger">*</span></label>
                                        <input type="text" name="tension" id="tension" class="form-control" required>
                                        @error('tension')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="poids">Poids <span class="text-danger">*</span></label>
                                        <input type="number" step="0.1" name="poids" id="poids" class="form-control" required>
                                        @error('poids')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="taille">Taille <span class="text-danger">*</span></label>
                                        <input type="number" step="0.01" name="taille" id="taille" class="form-control" required>
                                        @error('taille')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6 border-left">
                                    <h3 class="text-muted text-center">Ordonnance</h3>
                                    <div class="form-group">
                                        <label class="form-label" for="medicaments">Médicaments <span class="text-danger">*</span></label>
                                        <textarea name="medicaments" id="medicaments" class="form-control" rows="3" required></textarea>
                                        @error('medicaments')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="posologie">Posologie <span class="text-danger">*</span></label>
                                        <textarea name="posologie" id="posologie" class="form-control" rows="3" required></textarea>
                                        @error('posologie')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-outline-info col-3"><i class="fas fa-save mr-2"></i><strong>  Enregistrer</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .form-label {
        font-weight: bold;
    }
    .form-control {
        border-radius: 0.25rem;
    }
    .card {
        border: none;
    }
    .card-body {
        padding: 2rem;
    }
    .border-left {
        border-left: 1px solid #dee2e6 !important;
    }
    .btn-outline-info {
        border: 2px solid #17a2b8;
        color: #17a2b8;
    }
    .btn-outline-info:hover {
        background-color: #17a2b8;
        color: #fff;
    }
    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        border-radius: 0.25rem;
    }
</style>
