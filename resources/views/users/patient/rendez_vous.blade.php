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

        /* Couleurs personnalisées */
        :root {
            --primary-color: #2196f3;
            --secondary-color: #1976d2;
            --background-color: #f5f5f5;
            --card-background-color: #ffffff;
            --text-color: #333333;
            --selected-card-color: linear-gradient(to bottom, #14e92d21, rgb(255, 255, 255));
            /* Nouvelle couleur pour la carte sélectionnée avec un dégradé */
        }

        /* Style global */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        /* Carte de médecin */
        .doctor-card {
            background-color: var(--card-background-color);
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .doctor-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .doctor-card:hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: linear-gradient(to bottom, rgba(33, 149, 243, 0.082), transparent); */
            z-index: 1;
        }

        .doctor-card .card-body {
            text-align: center;
            padding: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .doctor-card .profile-photo {
            width: 120px;
            height: 120px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .doctor-card:hover .profile-photo {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        .doctor-card .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .doctor-card h3 {
            font-size: 1.4rem;
            margin-top: 1.5rem;
            color: var(--primary-color);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .doctor-card p {
            font-size: 1rem;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .doctor-card .contact-info {
            margin-top: 1rem;
        }

        .doctor-card .contact-info p {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.5rem;
        }

        .doctor-card .contact-info i {
            color: var(--secondary-color);
            margin-right: 0.5rem;
        }

        /* Bouton radio "Choisir" */
        .doctor-card .form-check {
            /* display: none; Masque le bouton radio */
            justify-content: center;
            align-items: center;
            margin-top: 1rem;
        }

        .doctor-card.selected .form-check {
            /* Affiche le bouton radio pour la carte sélectionnée */
            display: flex;
        }

        .doctor-card .form-check-input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }


        .doctor-card .form-check-label {
            font-size: 1rem;
            color: var(--primary-color);
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            background-color: var(--secondary-color);
            color: #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .doctor-card .form-check-label:hover {
            background-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        /* Pagination */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .pagination-wrapper button {
            background-color: var(--primary-color);
            color: #ffffff;
            border: none;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .pagination-wrapper button:hover {
            background-color: var(--secondary-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        .pagination-wrapper button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
            box-shadow: none;
        }

        .doctor-card.selected {
            background: var(--selected-card-color);
            /* Utilisation de la couleur dégradée pour la carte sélectionnée */
        }

        /* Style pour la carte de disponibilité */
        .card {
            border: none;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.2rem;
            color: #333333;
            margin-bottom: 1rem;
        }

        /* Style pour le bouton "Choisir" */
        .form-check-input {
            position: absolute;
            opacity: 0;
        }

        .form-check-label {
            font-size: 1rem;
            color: #ffffff;
            background-color: #2196f3;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-check-label:hover {
            background-color: #1976d2;
        }

        /* Style pour la pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .page-link {
            color: #2196f3;
            border: none;
            background-color: transparent;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .page-link:hover {
            color: #1976d2;
        }

        .page-item.disabled .page-link {
            pointer-events: none;
            color: #cccccc;
        }

        .page-item.active .page-link {
            background-color: #2196f3;
            border-color: #2196f3;
            color: #ffffff;
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

            const baseUrl = 'http://127.0.0.1:8000/';

            async function fetchDoctors(specialiteId, page = 1) {
                showLoadingSpinner();

                try {
                    const response = await fetch(
                        `http://127.0.0.1:8000/api/specialites/${specialiteId}/medecins`
                    );
                    if (!response.ok) {
                        throw new Error("La réponse du serveur n'est pas valide");
                    }

                    const data = await response.json();
                    const doctorCardsWrapper = document.getElementById("doctor-cards-wrapper");
                    doctorCardsWrapper.innerHTML = ""; // Clear previous cards

                    // Pagination logic
                    const startIndex = (page - 1) * itemsPerPage;
                    const endIndex = page * itemsPerPage;
                    const paginatedData = data.slice(startIndex, endIndex);

                    // Add doctor cards
                    paginatedData.forEach((medecin) => {
                        const imageUrl = medecin.photo ?
                            `${baseUrl}${medecin.photo}` :
                            `${baseUrl}storage/avatars/user.jpg`;

                        const card = document.createElement("div");
                        card.className = "col-xl-6 col-lg-3 mt-3 ";
                        card.innerHTML = `
                            <div class="card overflow-hidden shadow mb-3 doctor-card">
                            <div class="card-body text-center">
                                <div class="profile-photo">
                                <img src="${imageUrl}" width="100" class="img-fluid rounded-circle" alt="">
                                </div>
                                <h3 class="mt-4 mb-1">${medecin.name}</h3>
                                <p class="text-muted">${medecin.prenom}</p>
                                <div class="contact-info">
                                <p><i class="fas fa-phone-alt"></i> ${medecin.telephone}</p>
                                <p><i class="fas fa-envelope"></i> ${medecin.email}</p>
                                </div>
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
                    const paginationWrapper = document.createElement("div");
                    paginationWrapper.className = "d-flex justify-content-center mt-4";

                    for (let i = 1; i <= totalPages; i++) {
                        const button = document.createElement("button");
                        button.type = "button";
                        button.className = "btn btn-primary mx-1";
                        button.textContent = i;
                        button.disabled = i === page;
                        button.addEventListener("click", () => {
                            fetchDoctors(specialiteId, i);
                        });
                        paginationWrapper.appendChild(button); // Add the button to paginationWrapper
                    }

                    doctorCardsWrapper.appendChild(
                        paginationWrapper); // Add paginationWrapper to doctorCardsWrapper

                    // Ajoutez un écouteur d'événement sur les boutons radio
                    const radioButtons = document.querySelectorAll('input[name="medecinRadio"]');
                    radioButtons.forEach(radioButton => {
                        radioButton.addEventListener('change', () => {
                            const doctorCards = document.querySelectorAll('.doctor-card');
                            doctorCards.forEach(card => {
                                const radioId = card.querySelector(
                                    'input[name="medecinRadio"]').id;
                                if (radioId === radioButton.id) {
                                    card.classList.add('selected');
                                } else {
                                    card.classList.remove('selected');
                                }
                            });
                        });
                    });

                } catch (error) {
                    console.error("Error fetching doctors:", error);
                } finally {
                    hideLoadingSpinner();
                }
            }
            http: //127.0.0.1:8000/public/storage/avatars/user.jpg



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
            async function fetchAndDisplayDisponibilites(medecinId, page = 1) {
                showLoadingSpinner();

                try {
                    const response = await fetch(
                        `http://127.0.0.1:8000/api/medecins/${medecinId}/disponibilites`
                    );
                    if (!response.ok) {
                        throw new Error("La réponse du serveur n'est pas valide");
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
                        // Pagination logic
                        const itemsPerPage = 5; // 10 disponibilités par page
                        const startIndex = (page - 1) * itemsPerPage;
                        const paginatedDisponibilites = disponibilites.slice(startIndex, startIndex +
                            itemsPerPage);


                        paginatedDisponibilites.forEach(creneau => {
                            const card = createDisponibiliteCard(creneau);
                            disponibilitesWrapper.appendChild(card);
                        });

                        // Add pagination buttons
                        const totalPages = Math.ceil(disponibilites.length / itemsPerPage);
                        const paginationWrapper = document.createElement('div');
                        paginationWrapper.className = 'd-flex justify-content-center mt-4';

                        for (let i = 1; i <= totalPages; i++) {
                            const button = document.createElement('button');
                            button.type = "button";
                            button.className = 'btn btn-primary mx-1';
                            button.textContent = i;
                            button.disabled = i === page;
                            button.addEventListener('click', () => {
                                fetchAndDisplayDisponibilites(medecinId, i);
                            });
                            paginationWrapper.appendChild(button); // Add the button to paginationWrapper
                        }

                        disponibilitesWrapper.appendChild(
                            paginationWrapper); // Add paginationWrapper to disponibilitesWrapper
                    }
                } catch (error) {
                    console.error('Error fetching disponibilites:', error);
                } finally {
                    hideLoadingSpinner();
                }
            }

            // Fonction pour créer une carte de disponibilité avec la date et l'heure de début
            function createDisponibiliteCard(creneau) {
                // Vérifier si creneau.creneaux existe et est un tableau
                if (creneau && creneau.creneaux && Array.isArray(creneau.creneaux)) {
                    // Utiliser la première disponibilité de creneau.creneaux
                    const premierCreneau = creneau.creneaux[0];
                    // Vérifier si les propriétés nécessaires existent et ont une valeur
                    if (premierCreneau && premierCreneau.jour && premierCreneau.heure_debut && premierCreneau
                        .heure_fin) {
                        // Création de la carte
                        const card = document.createElement('div');
                        card.classList.add('card', 'shadow', 'mb-3', 'disponibilite-card');
                        card.id = `disponibilite-card-${premierCreneau.id}`;

                        // Contenu de la carte
                        const cardBody = document.createElement('div');
                        cardBody.classList.add('card-body');

                        // Date et heure de début
                        const dateHeureDebut = document.createElement('p');
                        dateHeureDebut.classList.add('card-text', 'mb-0');
                        dateHeureDebut.textContent =
                            `Date : ${premierCreneau.jour} |  ${premierCreneau.heure_debut} |  ${premierCreneau.heure_fin}`;

                        // Ajout de la date et de l'heure de début au corps de la carte
                        cardBody.appendChild(dateHeureDebut);

                        // Bouton radio
                        const disponibiliteRadio = document.createElement('input');
                        disponibiliteRadio.type = 'radio';
                        disponibiliteRadio.name = 'disponibilite';
                        disponibiliteRadio.value = premierCreneau.id;
                        disponibiliteRadio.id = `disponibilite-${premierCreneau.id}`;
                        disponibiliteRadio.classList.add('form-check-input', 'me-2');

                        // Label pour le bouton radio
                        const label = document.createElement('label');
                        label.htmlFor = `disponibilite-${premierCreneau.id}`;
                        label.textContent = 'Choisir';
                        label.classList.add('form-check-label', 'me-3');

                        // Ajouter le bouton radio et le label au corps de la carte
                        cardBody.appendChild(disponibiliteRadio);
                        cardBody.appendChild(label);

                        // Ajout du corps à la carte
                        card.appendChild(cardBody);

                        return card;
                    } else {
                        // Si les propriétés nécessaires de premierCreneau sont manquantes ou indéfinies, retourner null
                        console.error('Les propriétés de premierCreneau sont manquantes ou indéfinies :',
                            premierCreneau);
                        return null;
                    }
                } else {
                    // Si creneau.creneaux n'existe pas ou n'est pas un tableau, afficher un message d'erreur et retourner null
                    console.error('La propriété creneau.creneaux est manquante ou n\'est pas un tableau :',
                    creneau);
                    return null;
                }
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
