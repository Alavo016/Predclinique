@extends('users.patient.masterpat')
@section('title', 'Dashboard Patient')
@section('content')
    <style>
        #loading-spinner {
            text-align: center;
        }

        #loading-spinner img {
            width: 25%;
            height: 130px;
        }

        .disabled {
            pointer-events: none;
            opacity: 1;
        }
    </style>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Patient Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 ">
                        <div class="card p-3">
                            <div class="card-header text-center">
                                <h2 class=" text-muted">Prendre un Rendez-vous</h2>

                            </div>


                            <form id="appointment-form" method="POST" action="{{ route('patient.rdv_form') }}">
                                @csrf

                                <div class="form-step" id="step-specialite">
                                    <div class="form-group">
                                        <label for="specialite" class="form-label mt-2">Choisissez une spécialité :</label>
                                        <select class="form-control mt-2" id="specialite" name="specialite">
                                            <option value="">Sélectionnez une spécialité</option>
                                            @foreach ($specialites as $specialite)
                                                <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('specialite')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div id="loading-spinner" style="display: none;">
                                    <img src="{{ asset('load (2).gif') }}" alt="Loading..." srcset="">
                                </div>

                                <div class="form-step" id="step-medecin" style="display: none;">
                                    <div class="form-group">
                                        <label for="medecin">Choisissez un médecin :</label>
                                        <div id="medecin-select-wrapper">
                                            <select name="docteur_id" class="form-control" id="medecin">
                                                <option value="">Sélectionnez un médecin</option>
                                            </select>
                                        </div>
                                        @error('docteur_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-step" id="step-disponibilites" style="display: none;">
                                    <div class="form-group">
                                        <label for="disponibilites">Choisissez une disponibilité :</label>
                                        <div id="disponibilites-wrapper"></div>
                                        @error('disponibilites')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="button" id="next-step" class="btn btn-primary">Continuer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formSteps = document.querySelectorAll('.form-step');
            let currentStep = 0;
            const loadingSpinner = document.getElementById('loading-spinner');

            document.getElementById('next-step').addEventListener('click', async function() {
                loadingSpinner.style.display = 'block';
                document.getElementById('appointment-form').classList.add('disabled');

                formSteps[currentStep].style.display = 'none';
                currentStep++;

                if (currentStep < formSteps.length) {
                    formSteps[currentStep].style.display = 'block';

                    if (currentStep === 1) {
                        const specialiteId = document.getElementById('specialite').value;
                        fetchDoctors(specialiteId);
                    } else if (currentStep === 2) {
                        const medecinId = document.getElementById('medecin').value;
                        fetchAndDisplayDisponibilites(medecinId);
                    }

                    setTimeout(function() {
                        loadingSpinner.style.display = 'none';
                        document.getElementById('appointment-form').classList.remove(
                            'disabled');
                    }, 2000);
                } else {
                    document.getElementById('appointment-form').submit();
                }
            });

            async function fetchDoctors(specialiteId) {
                showLoadingSpinner();

                try {
                    const response = await fetch(
                        `http://127.0.0.1:8000/api/specialites/${specialiteId}/medecins`);
                    if (!response.ok) {
                        throw new Error('La réponse du serveur n\'est pas valide');
                    }

                    const data = await response.json();
                    const medecinSelect = document.getElementById('medecin-select-wrapper').querySelector(
                        'select');
                    medecinSelect.innerHTML = '';
                    data.forEach(medecin => {
                        const option = document.createElement('option');
                        option.value = medecin.id;
                        option.textContent = medecin.name;
                        medecinSelect.appendChild(option);
                        console.log(medecin.id);
                    });
                } catch (error) {
                    console.error('Erreur lors de la récupération des médecins:', error);
                } finally {
                    hideLoadingSpinner();
                }
            }

            async function fetchAndDisplayDisponibilites(medecinId) {
                showLoadingSpinner();

                try {
                    const response = await fetch(
                        `http://127.0.0.1:8000/api/medecins/${medecinId}/disponibilites`);
                    if (!response.ok) {
                        throw new Error('La réponse du serveur n\'est pas valide');
                    }

                    const disponibilites = await response.json();
                    console.log('Disponibilités récupérées :', disponibilites);

                    const disponibilitesWrapper = document.getElementById('disponibilites-wrapper');
                    disponibilitesWrapper.innerHTML = '';

                    if (disponibilites.length === 0) {
                        const message = document.createElement('p');
                        message.textContent = 'Aucune disponibilité pour ce médecin.';
                        message.classList.add('text-muted', 'font-italic', 'text-center', 'mt-3');
                        disponibilitesWrapper.appendChild(message);
                    } else {
                        const dateDebut = new Date();
                        disponibilites.forEach(disponibilite => {
                            const heureDebut = new Date(dateDebut.toDateString() + ' ' + disponibilite
                                .heure_debut);
                            const heureFin = new Date(dateDebut.toDateString() + ' ' + disponibilite
                                .heure_fin);

                            const options = {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            const jourLabel = document.createElement('p');
                            jourLabel.textContent =
                                `Disponibilité le ${new Intl.DateTimeFormat('fr-FR', options).format(new Date(disponibilite.jour))}:`;
                            jourLabel.classList.add('font-weight-bold', 'mt-3');
                            disponibilitesWrapper.appendChild(jourLabel);

                            for (let heure = new Date(heureDebut); heure < heureFin; heure.setHours(
                                    heure.getHours() + 1)) {
                                const disponibiliteRadio = document.createElement('input');
                                disponibiliteRadio.type = 'radio';
                                disponibiliteRadio.name = 'disponibilite';
                                disponibiliteRadio.value = heure
                            .toISOString(); // Utiliser toISOString pour afficher la date et l'heure complètes
                                disponibiliteRadio.id = `disponibilite-${heure.getTime()}`;
                                disponibiliteRadio.classList.add('form-check-input', 'me-2');
                                const label = document.createElement('label');
                                label.htmlFor = `disponibilite-${heure.getTime()}`;
                                label.textContent =
                                `${heure.toLocaleString('fr-FR')}`; // Utiliser toLocaleString pour afficher la date et l'heure dans le format local
                                label.classList.add('form-check-label', 'me-3');

                                const br = document.createElement('br');

                                disponibilitesWrapper.appendChild(disponibiliteRadio);
                                disponibilitesWrapper.appendChild(label);
                                disponibilitesWrapper.appendChild(br);
                            }
                        });
                    }
                } catch (error) {
                    console.error('Erreur lors de la récupération des disponibilités:', error);
                } finally {
                    hideLoadingSpinner();
                }
            }

            function showLoadingSpinner() {
                // Code pour afficher le spinner de chargement
            }

            function hideLoadingSpinner() {
                // Code pour masquer le spinner de chargement
            }
        });
    </script>

@endsection
