@extends('users.patient.masterpat')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'Dashboard Patient')
@section('content')
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




                    <div class="col-md-8">
                        <div class="card" p-3 mt-3>


                            <div class="card-header mt-4">Confirmation de Rendez-vous</div>

                            <div class="card-body">
                                <p>Votre rendez-vous a été enregistré avec succès.</p>
                                <p>Le prix de la consultation est : f CFA {{ $specialite->prix }}</p>

                                <input type="hidden" name="prix" value="{{ $specialite->prix }}">
                                <input type="hidden" id="rendezVousId" value="{{ $rendezVousId }}">

                                <div class="row">
                                    <div class="col-6">
                                        <button class="kkiapay-button btn btn-outline-success"> Payez Maintenant </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('patient.index') }}" class="btn btn-danger"> Retounez vous </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script amount="{{ $specialite->prix }}" callback="" data="" position="right" theme="#0095ff" sandbox="true"
        key="d82799a011c811efa9a90353f2353e80" src="https://cdn.kkiapay.me/k.js"></script>

    <script>
        function updatePayment(status, statut_paiement) {
            const prixInput = document.querySelector('input[name="prix"]');
            const prix = prixInput ? parseFloat(prixInput.value) : 0;
            const rendezVousId = document.getElementById('rendezVousId').value;

            // Récupérer le jeton CSRF à partir de la balise meta
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('{{ route('payement') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken, // Ajouter le jeton CSRF à l'en-tête de la requête
                    },
                    body: JSON.stringify({
                        status: status,
                        prix: prix,
                        statut_paiement: statut_paiement,
                        rendezVousId: rendezVousId
                    }),
                })
                // .then(response => {
                //     if (response.ok) {
                //         console.log('Données mises à jour avec succès dans la base de données');
                //     } else {
                //         console.error('Erreur lors de la mise à jour des données dans la base de données');
                //     }
                // })
                .then(response => response.json()) // Ajout de cette ligne pour convertir la réponse en JSON
                .then(data => {
                    if (data.redirect) {
                        window.location.href = data.redirect; // Rediriger vers l'URL spécifiée
                    }
                })

                .catch(error => {
                    console.error('Erreur lors de la mise à jour des données dans la base de données:', error);
                });
        }

        addSuccessListener(response => {
            updatePayment('Rdv Pris', 'Accepté');
        });

        addFailedListener(error => {
            updatePayment('Rdv non cloturé', 'Refusé');
        });
    </script>



@endsection
