@extends('users.doctor.masterdoc')

@section('title', 'Dossier Médical')
@section('content')

    <!-- Ajout de la police Roboto depuis Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        /* Palette de couleurs */
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --light-gray: #f8f9fa;
        }

        /* Typographie */
        body {
            font-family: 'Roboto', sans-serif;
        }

        /* Mise en page */
        .card {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: var(--primary-color);
            color: #fff;
            font-weight: 500;
            padding: 1rem;
        }

        .card-body {
            padding: 1.25rem;
        }

        .list-group-item {
            background-color: var(--light-gray);
            border: none;
            margin-bottom: 0.5rem;
            padding: 0.75rem 1rem;
            border-radius: 4px;
        }

        /* Icônes */
        .consultation-banner {
            display: flex;
            align-items: center;
        }

        .consultation-banner i {
            margin-right: 0.5rem;
        }

        /* Animations et transitions */
        .modal .modal-dialog {
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        .modal.show .modal-dialog {
            transform: scale(1);
        }
    </style>

    <!-- Ajout d'icônes depuis Font Awesome -->
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>

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
                            <img src="{{ asset($patient->photo) }}" alt="Photo de {{ $patient->name }}"
                                class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                            <h4 class="card-title">{{ $patient->name }} {{ $patient->prenom }}</h4>
                            <p class="card-text">{{ $patient->email }}</p>
                            <p class="card-text">Téléphone : {{ $patient->telephone }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Informations Personnelles</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Nom:</strong> {{ $patient->name }}</li>
                                <li class="list-group-item"><strong>Prénom:</strong> {{ $patient->prenom }}</li>
                                <li class="list-group-item"><strong>Sexe:</strong> {{ $patient->sexe }}</li>
                                <li class="list-group-item"><strong>Date de Naissance:</strong>
                                    {{ $patient->date_naissance }}</li>
                                <li class="list-group-item"><strong>Adresse:</strong> {{ $patient->address }}</li>
                                <li class="list-group-item"><strong>Nationalité:</strong> {{ $patient->nationalite }}</li>
                                <li class="list-group-item"><strong>Ville:</strong> {{ $patient->ville }}</li>
                                <li class="list-group-item"><strong>État Civil:</strong> {{ $patient->etat_civile }}</li>
                                <li class="list-group-item"><strong class="text-primary">Allergies:</strong>
                                    @if ($patient->allergie)
                                        <ul>
                                            @foreach (explode(',', $patient->allergie) as $allergie)
                                                <li class="text-muted ">{{ $allergie }}</li>
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
                        <div class="card-header">
                            <h5 class="card-title">Historique des Consultations</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($consultations as $consultation)
                                <div class="consultation mb-4">
                                    <div class="consultation-banner bg-primary text-white p-3 mb-3">
                                        <i class="fas fa-calendar-alt"></i>
                                        <h5 class="mb-0">Consultation du : {{ $consultation->date }}</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Motif:</strong> {{ $consultation->motif }}</p>
                                            <p><strong>Symptômes:</strong> {{ $consultation->symptomes }}</p>
                                            <p><strong>Diagnostic:</strong> {{ $consultation->diagnostic }}</p>
                                            <p><strong>Heure de Fin:</strong> {{ $consultation->heure_fin }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-primary mb-3">
                                                <div class="card-header bg-primary text-white">
                                                    <h6 class="card-title text-white">Informations complémentaires</h6>
                                                </div>
                                                <div class="card-body">
                                                    <p><strong>Température corporelle:</strong>
                                                        {{ $consultation->temperature }} °C</p>
                                                    <p><strong>Tension artérielle:</strong> {{ $consultation->tension }}
                                                    </p>
                                                    <p><strong>Poids:</strong> {{ $consultation->poids }} kg</p>
                                                    <p><strong>Taille:</strong> {{ $consultation->taille }} m</p>
                                                    <p><strong>Indice de masse corporelle (IMC):</strong>
                                                        {{ $consultation->imc }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="text-center">Ordonnances</h4>
                                        @if ($consultation->ordonnance)
                                            <button type="button" class="btn btn-outline-primary col-auto mx-auto"
                                                data-toggle="modal" data-target="#ordonnanceModal{{ $consultation->id }}">
                                                <i class="fas fa-file-prescription"></i> Voir l'ordonnance
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
                    @foreach (explode(', ', $consultation->ordonnance->posologie) as $posologie)
                        @if (strpos($posologie, ':') !== false)
                            @php
                                [$nom, $posologie] = explode(': ', $posologie);
                            @endphp
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Nom du Médicament:</strong>
                                        <span>{{ $nom }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Posologie:</strong>
                                        <span>{{ $posologie }}</span>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Médicament:</strong>
                                    </div>
                                    <div class="col-md-6">
                                        {{ $posologie }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Posologie:</strong>
                                    </div>
                                    <div class="col-md-6">
                                        Posologie non spécifiée
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Date de Prescription:</strong>
                            </div>
                            <div class="col-md-6">
                                {{ $consultation->ordonnance->date }}
                            </div>
                        </div>
                    </li>
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
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
