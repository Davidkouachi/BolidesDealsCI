<!DOCTYPE html>
<html lang="zxx" class="js">
<!-- Mirrored from dashlite.net/demo9/pages/auths/auth-register-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Jun 2023 21:49:46 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link href="{{asset('images/logo/icon/logo.ico')}}" rel="shortcut icon">
    <title>Registre | BOLIDES DEALS CI</title>
    <link href="{{asset('assets/css/dashlite55a0.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/theme55a0.css')}}" id="skin-default" rel="stylesheet">

    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('alert.js')}}"></script>
    <script src="{{asset('assets/js/app/js/script.js')}}"></script>
</head>

<body class="nk-body ui-rounder npc-general ui-light pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body wide-xs" style="margin-top: 0px;">
                        <div class="brand-logo text-center">
                            <a href="#" class="logo-link">
                                <img height="150px" width="150px" src="{{asset('images/logo/logo.png')}}">
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Inscription</h4>
                                        <div class="nk-block-des">
                                            <p>Créer un nouveau compte sur BOLIDES DEALS CI</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-gs">
                                    <div class="col h-50" >
                                        <div class="card-inner">
                                            <div class="team">
                                                <div class="user-card user-card-s2">
                                                    <label class="form-label">Photo de Profil</label>
                                                    <div class="user-avatar xl sq border" style="background: transparent;"> 
                                                        <img height="110px" width="110px" style="object-fit: cover;" class="thumb" id="imagePreview">
                                                    </div>
                                                    
                                                    <div class="user-info d-flex">
                                                        <input class="me-1" type="file" id="imageInput" style="width:120px;" accept="image/*">
                                                        <a id="btn-delete-img" class="btn btn-icon btn-danger btn-sm" style="display: none;" >
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label">Nom</label>
                                            <div class="form-control-wrap">
                                                <input type="Nom" class="form-control form-control-md" id="nom" placeholder="Entrer votre Nom" oninput="this.value = this.value.toUpperCase()" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label">Prénoms</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-md" id="prenom" placeholder="Entrer votre prénoms" oninput="this.value = this.value.toUpperCase()" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label">Contact</label>
                                            <div class="form-control-wrap">
                                                <input type="tel" class="form-control form-control-md" id="phone" placeholder="Entrer votre contact" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control form-control-md" id="email" placeholder="Entrer votre Email" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label">Adresse</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-md" id="adresse" placeholder="Entrer votre Adresse" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label" for="password">Mot de passe</label>
                                            <div class="form-control-wrap">
                                                <a href="#" class="form-icon form-icon-right passcode-switch md" data-target="password">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input type="password" class="form-control form-control-md" id="password" placeholder="Entrer votre Mot de passe" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label" for="password">Confirmer le mot de passe</label>
                                            <div class="form-control-wrap">
                                                <a href="#" class="form-icon form-icon-right passcode-switch md" data-target="cpassword">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input type="password" class="form-control form-control-md" id="cpassword" placeholder="Confirmer votre Mot de passe" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group row g-gs">
                                            <div class="col-lg-6 text-center">
                                                <a href="{{ route('index_accueil') }}" class="btn btn-md btn-white btn-dim btn-outline-danger btn-block">
                                                    <em class="icon ni ni-arrow-left-circle"></em>
                                                    <span>Acueil</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-6 text-center">
                                                <button id="btn_eng" class="btn btn-md btn-white btn-dim btn-outline-success btn-block" >
                                                    <span>S'inscrire</span>
                                                    <em class="icon ni ni-arrow-right-circle"></em>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-note-s2 text-center pt-4"> 
                                    Vous avez déjà un Compte ? 
                                    <a href="{{route('index_login')}}"><strong>Se Connecter</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-gs">
                                <div class="col-12">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">
                                            <span class="w-20">
                                                Copyright © <script>document.write(new Date().getFullYear())</script>
                                                Bolides Deals CI Dévéloppé par DAVID Kouachi.
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/bundle55a0.js')}}"></script>
    <script src="{{asset('assets/js/scripts55a0.js')}}"></script>
    <script src="{{asset('assets/js/demo-settings55a0.js')}}"></script>
    <script src="{{asset('assets/js/example-toastr55a0.js') }}"></script>

    <script src="{{asset('assets/js/app/js/registre_sinscrire.js') }}"></script>
    <script src="{{asset('assets/js/app/js/registre_sinscrire_photo.js') }}"></script>
    <script src="{{asset('assets/js/app/js/ctrlv_ctrlc_register.js') }}"></script>

</html>