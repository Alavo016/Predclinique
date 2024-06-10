@extends('include.master')

@section('title', 'Acceuil')


@section('content')


<div class="page-banner-area bg-7">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-content">
                    <h2>FAQ</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Acceuil</a></li>
                        <li>FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="frequently-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="frequently-text">
                    <div class="section-title-two">
                        <h2>Questions Fréquemment Posées</h2>
                        <p>Nous sommes toujours dévoués à vous offrir le meilleur soutien et c'est pourquoi nous avons créé une section de questions fréquemment posées pour vous. Cela vous aidera à mieux nous connaître et à obtenir de meilleures informations.</p>
                    </div>
                    <div class="faq-contant">
                        <div class="row align-items-center">
                            <ul class="accordion">
                                <li>
                                    <h3 class="title">Comment puis-je obtenir l'offre ?</h3>
                                    <div class="accordion-content">
                                        <p>Nous avons diverses offres et vous pouvez facilement vous connecter à notre agence pour en bénéficier. C'est très simple. Connectez-vous, recevez un traitement et vous obtiendrez l'offre.</p>
                                    </div>
                                </li>
                                <li>
                                    <h3 class="title">Combien de temps prennent le traitement et le test ?</h3>
                                    <div class="accordion-content">
                                        <p>Nous sommes l'un des meilleurs prestataires de services et nous faisons toujours de notre mieux pour nos clients dévoués. Nous avons des offres initiales pour nos clients précieux, ce qui est vraiment bénéfique pour nous.</p>
                                    </div>
                                </li>
                                <li>
                                    <h3 class="title">Comment se déroule le processus de paiement ?</h3>
                                    <div class="accordion-content">
                                        <p>Nous sommes l'une des meilleures entreprises pour vous fournir un bon médecin. Vous pouvez facilement prendre rendez-vous avec un bon médecin grâce à notre agence.</p>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="frequently-img">
                    <div class="main-img">
                        <img src="{{ asset('_2.jpg') }}" alt="Image">
                    </div>
                    <div class="shape-1">
                        <img src="assets/img/shapes/shape-14.png" alt="Shape">
                    </div>
                    <div class="shape-2">
                        <img src="assets/img/shapes/shape-15.png" alt="Shape">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
