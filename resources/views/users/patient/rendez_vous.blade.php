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
                    <div class="col-md-10">
                        <div class="card p-3">
                            <div class="card-header text-center">
                                <h2 class="text-muted">Prendre un Rendez-vous</h2>
                            </div>

                            <form id="appointment-form" method="POST" action="{{ route('patient.rdv_form') }}">
                                @csrf

                                <input type="hidden" id="medecin" name="medecin" value="">

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
                                        <div id="doctor-cards-wrapper" class="row">
                                            <!-- Doctor cards will be inserted here -->
                                        </div>
                                        <div id="pagination-wrapper" class="d-flex justify-content-center mt-4">
                                            <!-- Pagination buttons will be inserted here -->
                                        </div>
                                        @error('docteur_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-step" id="step-disponibilites" style="display: none;">
                                    <div class="form-group">
                                        <label for="disponibilites">Choisissez une disponibilité :</label>
                                        <div class="row" id="disponibilites-wrapper"></div>
                                        @error('disponibilites')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row">
                                    <button type="button" id="next-step"
                                        class="btn btn-primary col-3 mt-3 mx-auto">Continuer</button>
                                </div>
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
            const nextButton = document.getElementById('next-step');

            nextButton.addEventListener('click', async function() {
                showLoadingSpinner();

                formSteps[currentStep].style.display = 'none';
                currentStep++;

                if (currentStep < formSteps.length) {
                    formSteps[currentStep].style.display = 'block';

                    if (currentStep === 1) {
                        const specialiteId = document.getElementById('specialite').value;
                        await fetchDoctors(specialiteId);
                    } else if (currentStep === 2) {
                        const selectedMedecinRadio = document.querySelector(
                            'input[name="medecinRadio"]:checked');
                        if (selectedMedecinRadio) {
                            const medecinId = selectedMedecinRadio.value;
                            const medecinInput = document.getElementById('medecin');
                            if (medecinInput) {
                                medecinInput.value =
                                    medecinId; // Set the value of the hidden input field
                                await fetchAndDisplayDisponibilites(medecinId);
                            } else {
                                console.error('Element with ID "medecin" not found.');
                            }
                        } else {
                            alert('Veuillez sélectionner un médecin.');
                            currentStep--; // Go back to the previous step
                        }
                    }

                    hideLoadingSpinner();
                } else {
                    document.getElementById('appointment-form').submit();
                }
            });

            let currentPage = 1;
            const itemsPerPage = 4;

            async function fetchDoctors(specialiteId, page = 1) {
                showLoadingSpinner();

                try {
                    const response = await fetch(
                        `http://127.0.0.1:8000/api/specialites/${specialiteId}/medecins`);
                    if (!response.ok) {
                        throw new Error('La réponse du serveur n\'est pas valide');
                    }

                    const data = await response.json();
                    const doctorCardsWrapper = document.getElementById('doctor-cards-wrapper');
                    doctorCardsWrapper.innerHTML = ''; // Clear previous cards

                    // Pagination logic
                    const startIndex = (page - 1) * itemsPerPage;
                    const endIndex = page * itemsPerPage;
                    const paginatedData = data.slice(startIndex, endIndex);

                    // Add doctor cards
                    paginatedData.forEach(medecin => {
                        const imageUrl = medecin.photo ? medecin.photo :
                            'no-photo'; // Default image URL if necessary

                        const card = document.createElement('div');
                        card.className = 'col-xl-3 col-lg-3 col-sm-3 mt-3';
                        card.innerHTML = `
                    <div class="card overflow-hidden shadow mb-3">
                        <div class="card-body text-center">
                            <div class="profile-photo">
                                <img src="${imageUrl}" width="100" class="img-fluid rounded-circle" alt="">
                            </div>
                            <h3 class="mt-4
                            mb-1">${medecin.name}</h3>
                            <p class="text-muted">${medecin.prenom}</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="medecinRadio" id="medecin-${medecin.id}" value="${medecin.id}">
                                <label class="form-check-label" for="medecin-${medecin.id}">
                                    Choisir
                                </label>
                            </div>
                        </div>
                    </div>
                `;

                        doctorCardsWrapper.appendChild(card); // Add doctor card to wrapper
                    });

                    // Add pagination buttons
                    const totalPages = Math.ceil(data.length / itemsPerPage);
                    const paginationWrapper = document.createElement('div');
                    paginationWrapper.className = 'd-flex justify-content-center mt-4';

                    for (let i = 1; i <= totalPages; i++) {
                        const button = document.createElement('button');
                        button.type = "button";
                        button.className = 'btn btn-primary mx-1';
                        button.textContent = i;
                        button.disabled = i === page;
                        button.addEventListener('click', () => {
                            currentPage = i;
                            fetchDoctors(specialiteId, i);
                        });
                        paginationWrapper.appendChild(button); // Add the button to paginationWrapper
                    }

                    doctorCardsWrapper.appendChild(
                        paginationWrapper); // Add paginationWrapper to doctorCardsWrapper

                } catch (error) {
                    console.error('Error fetching doctors:', error);
                } finally {
                    hideLoadingSpinner();
                }
            }

            // Fonction pour créer une carte de disponibilité avec la date et l'heure de début
            function createDisponibiliteCard(creneau) {
                // Création de la carte
                const card = document.createElement('div');
                card.classList.add('card', 'shadow', 'mb-3');

                // Contenu de la carte
                const cardBody = document.createElement('div');
                cardBody.classList.add('card-body');

                // Date et heure de début
                const dateDebut = document.createElement('h5');
                dateDebut.classList.add('card-title');
                dateDebut.textContent =
                    `Date : ${creneau.heure_debut.substring(0, 10)} | Heure de début : ${creneau.heure_debut.substring(11, 16)}`;

                // Ajout de la date et de l'heure de début au corps de la carte
                cardBody.appendChild(dateDebut);

                // Ajout du corps à la carte
                card.appendChild(cardBody);

                return card;
            }

            // Fonction pour récupérer et afficher les disponibilités
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
                        disponibilites.forEach(disponibilite => {
                            disponibilite.creneaux.forEach(creneau => {
                                // Créer et afficher les cartes pour chaque créneau disponible
                                const card = createDisponibiliteCard(creneau);
                                disponibilitesWrapper.appendChild(card);
                            });
                        });
                    }
                } catch (error) {
                    console.error('Error fetching disponibilites:', error);
                } finally {
                    hideLoadingSpinner();
                }
            }

            // Fonction pour créer une carte de disponibilité avec la date et l'heure de début
            function createDisponibiliteCard(creneau) {
                // Création de la carte
                const card = document.createElement('div');
                card.classList.add('card', 'shadow', 'mb-3');

                // Contenu de la carte
                const cardBody = document.createElement('div');
                cardBody.classList.add('card-body');

                // Date et heure de début
                const dateHeureDebut = document.createElement('p');
                dateHeureDebut.classList.add('card-text', 'mb-0');
                const dateDebut = new Date(creneau.heure_debut);
                const heureDebut = new Date(creneau.heure_debut).toLocaleTimeString('fr-FR', {
                    hour: '2-digit',
                    minute: '2-digit'
                });
                dateHeureDebut.textContent = `${dateDebut.toLocaleDateString('fr-FR')} | ${heureDebut}`;

                // Ajout de la date et de l'heure de début au corps de la carte
                cardBody.appendChild(dateHeureDebut);

                // Bouton radio
                const disponibiliteRadio = document.createElement('input');
                disponibiliteRadio.type = 'radio';
                disponibiliteRadio.name = 'disponibilite';
                disponibiliteRadio.value = creneau.heure_debut;
                disponibiliteRadio.id = `disponibilite-${creneau.heure_debut}`;
                disponibiliteRadio.classList.add('form-check-input', 'me-2');

                // Label pour le bouton radio
                const label = document.createElement('label');
                label.htmlFor = `disponibilite-${creneau.heure_debut}`;
                label.textContent = 'Choisir';
                label.classList.add('form-check-label', 'me-3');

                // Ajouter le bouton radio et le label au corps de la carte
                cardBody.appendChild(disponibiliteRadio);
                cardBody.appendChild(label);

                // Ajout du corps à la carte
                card.appendChild(cardBody);

                return card;
            }



            function showLoadingSpinner() {
                loadingSpinner.style.display = 'block';
                document.getElementById('appointment-form').classList.add('disabled');
            }

            function hideLoadingSpinner() {
                loadingSpinner.style.display = 'none';
                document.getElementById('appointment-form').classList.remove('disabled');
            }
        });
    </script>

@endsection
