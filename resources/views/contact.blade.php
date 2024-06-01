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
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-area bg-color ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <form id="contactForm">
                            <h3>Contactez-nous</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="name"
                                            required data-error="Veuillez entrer votre nom" placeholder="Nom complet">
                                        <div class="help-block with-errors"></div>
                                        <i class="bx bx-user"></i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="email"
                                            required data-error="Veuillez entrer votre email" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                        <i class="bx bx-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            required data-error="Veuillez entrer votre téléphone" placeholder="Numéro de téléphone">
                                        <div class="help-block with-errors"></div>
                                        <i class="bx bx-phone-call"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control" id="subject"
                                            required data-error="Veuillez entrer votre sujet" placeholder="Votre sujet">
                                        <div class="help-block with-errors"></div>
                                        <i class="bx bxs-id-card"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" cols="30" rows="6" required
                                    data-error="Veuillez entrer votre message" placeholder="Votre message"></textarea>
                                <div class="help-block with-errors"></div>
                                <i class="bx bx-envelope"></i>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="form-check agree-label">
                                        <input name="gridCheck" value="J'accepte les termes et la politique de confidentialité."
                                            class="form-check-input" type="checkbox" id="gridCheck" required>
                                        <label class="form-check-label" for="gridCheck">
                                            Accepter <a href="terms-condition.html">les Termes et Conditions</a> et <a href="privacy-policy.html">la Politique de Confidentialité</a>.
                                        </label>
                                        <div class="help-block with-errors gridCheck-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="default-btn three">Envoyer votre message <span></span></button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info">
                        <div class="section-title-two">
                            <h2>Informations de contact</h2>
                            <p>Nous sommes l'une des meilleures agences pour vous fournir un bon médecin. Cela nous aide à travailler de manière appropriée et efficace.</p>
                        </div>
                        <ul>
                            <li>
                                <i class="bx bx-phone-call"></i>
                                <a href="tel:2677844336">+267-784-4336</a>
                                <br>
                                <a href="tel:+0123456987">+0123 456 987</a>
                            </li>
                            <li>
                                <i class="bx bx-envelope"></i>
                                <a href="mailto:[email&#160;protected]">[email&#160;protected]</a>
                                <br>
                                <a href="mailto:[email&#160;protected]">[email&#160;protected]</a>
                            </li>
                            <li>
                                <i class="bx bx-map"></i>
                                5021 Franklee Lane, USA
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  

  
 


@endsection
