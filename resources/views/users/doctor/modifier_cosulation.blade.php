@extends('users.doctor.masterdoc')

@section('title', 'Modifier une Consultation')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('consultations.index') }}">Consultations du Docteur</a></li>
                        <li class="breadcrumb-item active">Modifier une Consultation</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('consultations.update', $consultation->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="text-muted text-center">Information de la consultation</h3>

                                    <div class="form-group">
                                        <label for="motif">Motif</label>
                                        <input type="text" name="motif" id="motif" class="form-control" value="{{ old('motif', $consultation->motif) }}" required>
                                        @error('motif')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="symptomes">Symptômes</label>
                                        <textarea name="symptomes" id="symptomes" class="form-control" rows="3" required>{{ old('symptomes', $consultation->symptomes) }}</textarea>
                                        @error('symptomes')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="diagnostic">Diagnostic</label>
                                        <textarea name="diagnostic" id="diagnostic" class="form-control" rows="3" required>{{ old('diagnostic', $consultation->diagnostic) }}</textarea>
                                        @error('diagnostic')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="heure_fin">Heure de Fin</label>
                                        <input type="datetime-local" name="heure_fin" id="heure_fin" class="form-control" value="{{ old('heure_fin', \Carbon\Carbon::parse($consultation->heure_fin)->format('Y-m-d\TH:i')) }}" required>
                                        @error('heure_fin')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                        
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <h3 class="text-muted text-center">Ordonnance</h3>
                                    <div class="form-group">
                                        <label for="medicaments">Médicaments</label>
                                        <textarea name="medicaments" id="medicaments" class="form-control" rows="3" required>{{ old('medicaments', $consultation->ordonnance->medicaments ?? '') }}</textarea>
                                        @error('medicaments')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="posologie">Posologie</label>
                                        <textarea name="posologie" id="posologie" class="form-control" rows="3" required>{{ old('posologie', $consultation->ordonnance->posologie ?? '') }}</textarea>
                                        @error('posologie')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn mt-2 btn-outline-info col-3"><strong>Enregistrer</strong></button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
