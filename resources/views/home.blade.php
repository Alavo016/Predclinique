@extends('include.master')

@section('title', 'Acceuil')


@section('content')


<div class="banner-slide owl-carousel owl-theme">
    <div class="banner-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="b-two-text">
                        <h1>Votre santé, notre priorité</h1>
                        <p>Bienvenue dans notre clinique, où nous nous engageons à fournir des soins de santé de qualité supérieure. Notre équipe de professionnels est là pour répondre à vos besoins médicaux avec compétence et compassion.</p>
                        <div class="b-two-btn">
                            <a href="appoinments.html" class="default-btn two">
                                Prendre un rendez-vous
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="b-two-img">
                        <div class="main-img">
                            <img src="{{ asset("assets/istockphoto-1372113926-612x612.jpg") }}" alt="Image">
                        </div>
                        <div class="shape">
                            <img src="assets/img/shapes/shape-9.png" alt="Shape">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-two-shape">
                <div class="shape-1">
                    <img src="assets/img/shapes/shape-7.png" alt="Shape">
                </div>
                <div class="shape-2">
                    <img src="assets/img/shapes/shape-8.png" alt="Shape">
                </div>
                <div class="shape-3">
                    <img src="assets/img/shapes/shape-10.png" alt="Shape">
                </div>
                <div class="shape-4">
                    <img src="assets/img/shapes/shape-11.png" alt="Shape">
                </div>
            </div>
        </div>
    </div>
</div>



<div class="dedicated-area ptb-100">
    <div class="container">
        <div class="section-title-one">
            <h2>Nos services dédiés pour votre santé</h2>
        </div>
        <div class="dedicated-slider owl-carousel owl-theme">
            <div class="dedicated-card">
                <img src="{{ asset('assets/doctot1.jpg') }}" alt="Image">
                <div class="d-card-text">
                    <h3>Consultations Médicales</h3>
                    <p>Nos médecins sont à votre disposition pour des consultations complètes, adaptées à vos besoins de santé.</p>
                    <div class="d-card-btn">
                        <a href="services-details.html" class="default-btn two">
                            En savoir plus
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="dedicated-card">
                <img src="{{ asset('assets/doctor 2.jpg') }}" alt="Image">
                <div class="d-card-text">
                    <h3>Soins Infirmiers</h3>
                    <p>Nous offrons des soins infirmiers de qualité pour assurer votre bien-être et votre rétablissement.</p>
                    <div class="d-card-btn">
                        <a href="services-details.html" class="default-btn two">
                            En savoir plus
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="dedicated-card">
                <img src="{{ asset('assets/doctor4.jpg') }}" alt="Image">
                <div class="d-card-text">
                    <h3>Vaccinations</h3>
                    <p>Protégez-vous et votre famille avec notre gamme complète de services de vaccination.</p>
                    <div class="d-card-btn">
                        <a href="services-details.html" class="default-btn two">
                            En savoir plus
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="dedicated-card">
                <img src="{{ asset('assets/doctor5.jpg') }}" alt="Image">
                <div class="d-card-text">
                    <h3>Conseils Médicaux</h3>
                    <p>Nos experts sont là pour vous fournir des conseils médicaux personnalisés pour une meilleure santé.</p>
                    <div class="d-card-btn">
                        <a href="services-details.html" class="default-btn two">
                            En savoir plus
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="treatment-area ptb-100">
    <div class="container">
        <div class="section-title-one">
            <h2>Pourquoi choisir nos services médicaux ?</h2>
        </div>
        <div class="treatment-slider owl-carousel owl-theme">
            <div class="treatment-card bg-color-1">
                <div class="shape">
                    <img src="assets/img/shapes/shape-13.png" alt="Shape">
                    <i class="bx bx-user-plus"></i>
                </div>
                <h3>Médecins qualifiés</h3>
                <p>Nos médecins hautement qualifiés sont là pour vous fournir des soins de qualité, adaptés à vos besoins spécifiques.</p>
                <div class="t-card-btn">
                    <a href="services-details.html" class="default-btn two">
                        En savoir plus
                        <span></span>
                    </a>
                </div>
            </div>
            <div class="treatment-card bg-color-1">
                <div class="shape">
                    <img src="assets/img/shapes/shape-13.png" alt="Shape">
                    <i class="bx bx-brain"></i>
                </div>
                <h3>Équipements modernes</h3>
                <p>Notre clinique est équipée des technologies médicales les plus récentes pour garantir des diagnostics et des traitements précis.</p>
                <div class="t-card-btn">
                    <a href="services-details.html" class="default-btn two">
                        En savoir plus
                        <span></span>
                    </a>
                </div>
            </div>
            <div class="treatment-card bg-color-1">
                <div class="shape">
                    <img src="assets/img/shapes/shape-13.png" alt="Shape">
                    <i class="bx bx-timer"></i>
                </div>
                <h3>Service d'urgence</h3>
                <p>Nous offrons un service d'urgence 24/7 pour répondre rapidement à toutes vos situations critiques.</p>
                <div class="t-card-btn">
                    <a href="services-details.html" class="default-btn two">
                        En savoir plus
                        <span></span>
                    </a>
                </div>
            </div>
            <div class="treatment-card bg-color-1">
                <div class="shape">
                    <img src="assets/img/shapes/shape-13.png" alt="Shape">
                    <i class="bx bx-shape-circle"></i>
                </div>
                <h3>Soins personnalisés</h3>
                <p>Nous offrons des soins personnalisés pour chaque patient, en tenant compte de ses besoins et de son état de santé.</p>
                <div class="t-card-btn">
                    <a href="services-details.html" class="default-btn two">
                        En savoir plus
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="check-up-area pb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="check-up-text">
                    <div class="section-title-two">
                        <h2>Besoin d'un rendez-vous pour un examen médical ? Prenez rendez-vous rapidement</h2>
                        <p>Nous sommes là pour vous offrir les meilleurs services médicaux pour vous et votre animal de compagnie. Notre équipe de vétérinaires qualifiés est prête à vous aider à maintenir la santé et le bien-être de votre compagnon à quatre pattes.</p>
                    </div>
                    <div class="appointment-form">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="enter-your-name" placeholder="Entrez votre nom">
                                        <i class="bx bx-user"></i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="enter-your-email" placeholder="Entrez votre adresse e-mail">
                                        <i class="bx bx-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input id="datetimepicker" type="text" class="form-control" placeholder="Date & heure">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-number" placeholder="Numéro de contact">
                                        <i class="bx bx-phone-call"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="appointment-btn">
                                <button type="submit" class="default-btn">
                                    Confirmer un rendez-vous <span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="check-up-img">
                    <div class="main-img">
                        <img src="{{ asset('assets/doctor6.jpg') }}" alt="Image">
                    </div>
                    <div class="shape">
                        <img src="assets/img/shapes/shape-5.png" alt="Shape">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="doctors-area bg-color-1 ptb-100">
    <div class="container">
        <div class="section-title-one">
            <h2>Découvrez nos médecins spécialistes et leurs activités</h2>
        </div>
        <div class="doctors-slider owl-carousel owl-theme">
            <div class="doctors-card">
                <a href="doctors-details-2.html">
                    <img src="{{ asset('assets/docpres1.jpg') }}" alt="Image">
                </a>
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="caption">
                            <div class="caption-text">
                                <h3><a href="doctors-details-2.html">Dr. Adedeji Okeke</a></h3>
                                <p>Spécialiste des chiens</p>
                                <a href="#"><span class="__cf_email__" data-cfemail="b6d1dad3d8d8c4dfdad3cff6d1dbd7dfda98d5d9db">[email&#160;protected]</span></a>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="bx bxl-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/" target="_blank">
                                            <i class="bx bxl-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="bx bxl-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="doctors-card">
                <a href="doctors-details-2.html">
                    <img src="{{ asset('assets/docpres2jpg') }}" alt="Image">
                </a>
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="caption">
                            <div class="caption-text">
                                <h3><a href="doctors-details-2.html">Dr. Ifeoma Abiodun</a></h3>
                                <p>Spécialiste des lapins</p>
                                <a href="#"><span class="__cf_email__" data-cfemail="9efbedeafbf2fff6f1e9fbeceaf1f0def9f3fff7f2b0fdf1f3">[email&#160;protected]</span></a>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="bx bxl-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/" target="_blank">
                                            <i class="bx bxl-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="bx bxl-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="doctors-card">
                <a href="doctors-details-2.html">
                    <img src="{{ asset('assets/docpre3.jpg') }}" alt="Image">
                </a>
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="caption">
                            <div class="caption-text">
                                <h3><a href="doctors-details-2.html">Dr. Chika Uzodinma</a></h3>
                                <p>Spécialiste des chats</p>
                                <a href="#"><span class="__cf_email__" data-cfemail="8fe5eee2eafcf8e0fde4e2eee1cfe8e2eee6e3a1ece0e2">[email&#160;protected]</span></a>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="bx bxl-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/" target="_blank">
                                            <i class="bx bxl-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="bx bxl-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="doctors-card">
                <a href="doctors-details-2.html">
                    <img src="{{ asset('assets/docpres4.jpg') }}" alt="Image">
                </a>
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="caption">
                            <div class="caption-text">
                                <h3><a href="doctors-details-2.html">Dr. Obinna Okoye</a></h3>
                                <p>Spécialiste des chiens</p>
                                <a href="#"><span class="__cf_email__" data-cfemail="b6c2d9db98ded3d8c4cff6d1dbd7dfda98d5d9db">[email&#160;protected]</span></a>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="bx bxl-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/" target="_blank">
                                            <i class="bx bxl-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="bx bxl-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="offers-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="offer-img">
                    <img src="assets/img/offer.jpg" alt="Image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="offer-text">
                    <div class="section-title-two">
                        <h2>Commencez avec nous en profitant de nos meilleures offres existantes en un coup d'œil</h2>
                        <p>Nous sommes l'un des meilleurs fournisseurs de services et nous offrons les meilleures offres à nos clients dévoués. Nous avons des offres initiales pour nos clients fidèles. Cela est vraiment efficace pour nous. Vous pouvez facilement obtenir un résultat positif et innovant grâce à cette agence et à notre offre.</p>
                        <p>D'autre part, nous condamnons avec indignation et méprisons les hommes qui sont si séduits et démoralisés par les charmes du plaisir du moment, si aveuglés par le désir, qu'ils ne peuvent prévoir la douleur et les ennuis.</p>
                    </div>
                    <ul>
                        <li>
                            <i class="bx bx-check-circle"></i>
                            Pour la première fois, nous offrons une remise de 50%.
                        </li>
                        <li>
                            <i class="bx bx-check-circle"></i>
                            Nous offrons un traitement annuel gratuit à nos anciens clients.
                        </li>
                        <li>
                            <i class="bx bx-check-circle"></i>
                            Nous fournissons un support d'urgence à nos clients.
                        </li>
                        <li>
                            <i class="bx bx-check-circle"></i>
                            Vous obtiendrez un traitement en achetant un service.
                        </li>
                        <li>
                            <i class="bx bx-check-circle"></i>
                            Vous pouvez facilement trouver une variété de vétérinaires ici.
                        </li>
                    </ul>
                    <div class="offers-btn">
                        <a href="appoinments.html" class="default-btn two">
                            Prendre rendez-vous
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="clients-area pb-100">
    <div class="container">
        <div class="section-title-one">
            <h2>Nous donnons toujours la priorité aux avis et commentaires de nos clients</h2>
        </div>
        <div class="clients-slider owl-carousel owl-theme">
            <div class="clients-card">
                <div class="client-img">
                    <img src="{{ asset('assets/docpres1.jpg') }}" alt="Image">
                    <i class="bx bxs-quote-left"></i>
                </div>
                <p>Cette clinique possède les technologies les plus avancées et les médecins sont très qualifiés. Cela renforce notre confiance en leurs services.</p>
                <div class="clients-name">
                    <h3>Mamadou Diop</h3>
                    <span>CEO, Union des Médecins</span>
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                    </div>
                </div>
            </div>
            <div class="clients-card">
                <div class="client-img">
                    <img src="{{ asset('assets/docpre3.jpg') }}" alt="Image">
                    <i class="bx bxs-quote-left"></i>
                </div>
                <p>J'ai commencé à travailler avec cette agence et elle nous offre un soutien spécial sur le marché mondial. L'équipe est brillante pour les traitements.</p>
                <div class="clients-name">
                    <h3>Awa Ndoye</h3>
                    <span>Conseillère, Corporation Visuelle</span>
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                    </div>
                </div>
            </div>
            <div class="clients-card">
                <div class="client-img">
                    <img src="assets/img/doctors/doctor-12.jpg" alt="Image">
                    <i class="bx bxs-quote-left"></i>
                </div>
                <p>Cette clinique possède les technologies les plus avancées et les médecins sont très qualifiés. Cela renforce notre confiance en leurs services.</p>
                <div class="clients-name">
                    <h3>Fatoumata Traoré</h3>
                    <span>CEO, Union des Médecins</span>
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="blog-area blog-area-two ptb-100">
    <div class="container">
        <div class="section-title-one">
            <h2>Nos derniers articles</h2>
        </div>
        <div class="blog-slider owl-carousel owl-theme">
            <div class="blog-card">
                <a href="blog-details.html">
                    <img src="assets/img/blog/blog-1.jpg" alt="Article">
                </a>
                <div class="b-card-text">
                    <span>25 février 2024</span>
                    <span class="t-right"><i class="bx bx-user"></i> 200K</span>
                    <h3><a href="blog-details.html">Vous pouvez facilement vous connecter à un médecin et obtenir un traitement</a></h3>
                    <div class="view-more">
                        <a href="blog-details.html" class="view-more-btn">
                            Lire plus
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="blog-card">
                <a href="blog-details.html">
                    <img src="assets/img/blog/blog-2.jpg" alt="Article">
                </a>
                <div class="b-card-text">
                    <span>25 février 2024</span>
                    <span class="t-right"><i class="bx bx-user"></i> 180K</span>
                    <h3><a href="blog-details.html">Les confinements ont conduit à moins de consultations médicales</a></h3>
                    <div class="view-more">
                        <a href="blog-details.html" class="view-more-btn">
                            Lire plus
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="blog-card">
                <a href="blog-details.html">
                    <img src="assets/img/blog/blog-3.jpg" alt="Article">
                </a>
                <div class="b-card-text">
                    <span>25 février 2024</span>
                    <span class="t-right"><i class="bx bx-user"></i> 170K</span>
                    <h3><a href="blog-details.html">Cours de recherche en médecine d'urgence pour les médecins</a></h3>
                    <div class="view-more">
                        <a href="blog-details.html" class="view-more-btn">
                            Lire plus
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="blog-card">
                <a href="blog-details.html">
                    <img src="assets/img/blog/blog-4.jpg" alt="Article">
                </a>
                <div class="b-card-text">
                    <span>27 février 2024</span>
                    <span class="t-right"><i class="bx bx-user"></i> 160K</span>
                    <h3><a href="blog-details.html">Session d'information sur la planification des soins avancés - 2024</a></h3>
                    <div class="view-more">
                        <a href="blog-details.html" class="view-more-btn">
                            Lire plus
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
