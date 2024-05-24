@extends('users.patient.masterpat')

@section('title', 'Dossier Médical')
@section('content')

    <!-- jQuery -->

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('patient.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dossier Médical</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ asset($user->photo) }}" alt="Photo de {{ $user->name }}"
                                class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                            <h4 class="card-title">{{ $user->name }} {{ $user->prenom }}</h4>
                            <p class="card-text">{{ $user->email }}</p>
                            <p class="card-text">Telephone :{{ $user->telephone }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Informations Personnelles</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Nom:</strong> {{ $user->name }}</li>
                                <li class="list-group-item"><strong>Prénom:</strong> {{ $user->prenom }}</li>
                                <li class="list-group-item"><strong>Sexe:</strong> {{ $user->sexe }}</li>
                                <li class="list-group-item"><strong>Date de Naissance:</strong> {{ $user->date_naissance }}
                                </li>
                                <li class="list-group-item"><strong>Adresse:</strong> {{ $user->address }}</li>
                                <li class="list-group-item"><strong>Nationalité:</strong> {{ $user->nationalite }}</li>
                                <li class="list-group-item"><strong>Ville:</strong> {{ $user->ville }}</li>
                                <li class="list-group-item"><strong>État Civil:</strong> {{ $user->etat_civile }}</li>
                                <li class="list-group-item"><strong class="text-danger">Allergies:</strong>
                                    @if ($user->allergie)
                                        <ul>
                                            @foreach (explode(',', $user->allergie) as $allergie)
                                                <li class="text-danger ">{{ $allergie }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        Aucune allergie enregistrée.
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Historique des Consultations</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($consultations as $consultation)
                                <div class="consultation mb-3">
                                    <h6 class="border-bottom pb-2 mb-2">Date: {{ $consultation->date }}</h6>
                                    <p><strong>Motif:</strong> {{ $consultation->motif }}</p>
                                    <p><strong>Symptômes:</strong> {{ $consultation->symptomes }}</p>
                                    <p><strong>Diagnostic:</strong> {{ $consultation->diagnostic }}</p>
                                    <p><strong>Heure de Fin:</strong> {{ $consultation->heure_fin }}</p>
                                    <p><strong>Médecin:</strong> {{ $consultation->doctor->name }}
                                        {{ $consultation->doctor->prenom }}</p>

                                    <h6>Ordonnances</h6>
                                    @if ($consultation->ordonnance)
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#ordonnanceModal{{ $consultation->id }}">
                                            Voir l'ordonnance
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="ordonnanceModal{{ $consultation->id }}" tabindex="-1" role="dialog" aria-labelledby="ordonnanceModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ordonnanceModalLabel">Ordonnance</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-group">
                                                            @foreach (explode(', ', $consultation->ordonnance->medicaments) as $medicament)
                                                                @if (strpos($medicament, ':') !== false)
                                                                    @php
                                                                        [$nom, $posologie] = explode(': ', $medicament);
                                                                    @endphp
                                                                    <li class="list-group-item"><strong>Nom du Médicament:</strong> {{ $nom }}</li>
                                                                    <li class="list-group-item"><strong>Posologie:</strong> {{ $posologie }}</li>
                                                                @else
                                                                    <li class="list-group-item"><strong>Médicament:</strong> {{ $medicament }}</li>
                                                                    <li class="list-group-item"><strong>Posologie:</strong> Posologie non spécifiée</li>
                                                                @endif
                                                            @endforeach
                                                            <li class="list-group-item"><strong>Date de Prescrption:</strong> {{ $consultation->ordonnance->date }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    @else
                                        <p class="text-muted">Aucune ordonnance pour cette consultation.</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
