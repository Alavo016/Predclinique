@extends('include.master')

@section('title', 'Acceuil')


@section('content')



    <div class="page-banner-area bg-1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-content">
                        <h2>Contact</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Acceuil</a></li>
                            <li>Detail Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services-dateils-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="services-details">
                        <div class="header-img">
                            <img src="assets/img/services/service-details-1.jpg" alt="Image">
                        </div>
                        <div class="details-text">
                            <h2>Nos services dévoués pour votre santé</h2>
                            <p>Chez nous, vous recevrez des soins de qualité basés sur les dernières avancées médicales.
                                Notre équipe de professionnels de santé s'engage à fournir des traitements personnalisés
                                adaptés à vos besoins spécifiques.</p>
                            <p>Nous croyons en l'importance de la prévention et de l'éducation pour maintenir une bonne
                                santé. Nos médecins travaillent en étroite collaboration avec chaque patient pour élaborer
                                des plans de traitement efficaces, incluant des conseils sur le mode de vie et des
                                recommandations médicales.</p>

                        </div>
                        <div class="content-img">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <img src="assets/img/services/service-1.jpg" alt="Image">
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <img src="assets/img/services/service-2.jpg" alt="Image">
                                </div>
                            </div>
                        </div>
                        <p>Notre mission est de fournir des soins de santé accessibles et de haute qualité. Nous utilisons
                            des équipements de pointe et des techniques avancées pour diagnostiquer et traiter une variété
                            de conditions médicales. Votre bien-être est notre priorité.</p>
                        <p>Nous offrons également des consultations médicales à distance pour votre commodité, vous
                            permettant d'accéder à des soins de qualité depuis chez vous. Notre plateforme sécurisée
                            garantit la confidentialité et la sécurité de vos informations personnelles.</p>
                        <h2>Importance des consultations médicales</h2>
                        <p>Les consultations médicales jouent un rôle crucial dans le maintien de votre santé. Elles
                            permettent de détecter précocement des problèmes de santé et de les traiter efficacement. Ne
                            négligez pas vos visites médicales régulières, car elles sont essentielles pour une bonne
                            gestion de votre santé à long terme.</p>
                        <p>Nos médecins sont là pour vous accompagner dans chaque étape de votre parcours de santé, en vous
                            fournissant des conseils et des traitements adaptés. Nous nous engageons à améliorer votre
                            qualité de vie grâce à des soins attentifs et personnalisés.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="widget-area">
                        <div class="widget widget_search">
                            <h3 class="widget-title">Search</h3>
                            <form class="search-form">
                                <input type="search" class="search-field" placeholder="Search...">
                                <button type="submit"><i class="bx bx-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget_categories">
                            <h3 class="widget-title">Categories de service</h3>
                            <ul class="bg-f6f4ff">
                                <li>
                                    <i class="bx bx-chevrons-right"></i>
                                    <a href="#">Analyse de Laboratoire </a>
                                </li>
                                <li>
                                    <i class="bx bx-chevrons-right"></i>
                                    <a href="#">Opérations chirurgicales</a>
                                </li>
                                <li>
                                    <i class="bx bx-chevrons-right"></i>
                                    <a href="#">Traitements médicaux</a>
                                </li>
                                <li>
                                    <i class="bx bx-chevrons-right"></i>
                                    <a href="#">Services de pharmacie</a>
                                </li>
                                <li>
                                    <i class="bx bx-chevrons-right"></i>
                                    <a href="#">Services d'urgence</a>
                                </li>
                                <li>
                                    <i class="bx bx-chevrons-right"></i>
                                    <a href="#">Insurance</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_posts_thumb">
                            <h3 class="widget-title">Latest news</h3>
                            <div class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg1" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title"><a href="#">You can easily connect to a doctor and make a
                                            treatment</a></h4>
                                    <span>07 Mar 2024</span>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg2" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title"><a href="#">Lockdowns lead to fewer people seeking medical
                                            care</a></h4>
                                    <span>08 Mar 2024</span>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg3" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title"><a href="#">Emergency medicine research course for the
                                            doctors</a>
                                    </h4>
                                    <span>09 Mar 2024</span>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg4" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title"><a href="#">How to choose the specialist list in massage</a>
                                    </h4>
                                    <span>10 Mar 2024</span>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg5" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title"><a href="#">The ten worst hospital design features</a></h4>
                                    <span>11 Mar 2024</span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
