<!DOCTYPE html>
<html class="js" lang="fr">
    
<head>
    <meta charset="utf-8">
    <meta content="Softnio" name="author">
    <meta content="text/html;charset=utf-8" http-equiv="content-type"/>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Bolides Deals CI est une application web dédiée à la mise en relation entre acheteurs, vendeurs et locataires de véhicules en Côte d'Ivoire." name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <script src="https://cdn.cinetpay.com/seamless/main.js"></script> --}}
    <link href="{{asset('images/logo/icon/logo.ico')}}" rel="shortcut icon">

    <title>
        @yield('titre') | BOLIDES DEALS CI
    </title>

    <link href="{{asset('assets/css/dashlite55a0.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/theme55a0.css')}}" id="skin-default" rel="stylesheet">
    <link href="{{asset('assets/css/style_preloader.css')}}" rel="stylesheet">

    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/app/js/preloader.js') }}"></script>
    <script src="{{asset('assets/js/app/js/cookies.js') }}"></script>
    <script src="{{asset('assets/js/app/js/cookies_data.js') }}"></script>
    <script src="{{asset('alert.js')}}"></script>
    <script src="{{asset('assets/js/app/js/urlHis.js')}}"></script>
    <script src="{{asset('assets/js/app/js/script.js')}}"></script>

    </link>
    </link>
    </link>
    </meta>
    </meta>
    </meta>
    </meta>
</head>

<body class="nk-body ui-rounder has-sidebar ui-light ">

    @auth
        <input type="hidden" id="mat" value="{{ Auth::user()->mat }}">
    @endauth

    <div id="preloader" class="d-flex flex-column">
        <img height="150" width="150" src="{{asset('images/logo/logo.png')}}" /></img>
        <div class="spinner_preloader"></div>
    </div>

    <div class="nk-app-root">
        <div class="nk-main ">

            @if(request()->routeIs('index_accueil_bord') )
            <div class="nk-sidebar is-light nk-sidebar-fixed " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a class="logo-link nk-sidebar-logo" onclick="window.location.reload();">
                            <img height="50" width="50" src="{{asset('images/logo/logo.png')}}" /></img>
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                            <em class="icon ni ni-arrow-left"></em>
                        </a>
                    </div>
                </div>
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar="">
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="{{route('index_accueil_bord')}}">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-trend-up">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Tableau de Bord
                                        </span>
                                    </a>
                                </li>
                                {{-- <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="{{route('index_bord_user')}}">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-user-list">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Utilisateurs
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="{{route('index_bord_role')}}">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-focus">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Rôles
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="{{route('index_bord_marque')}}">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-layout-fill">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Marques de Véhicules
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="{{route('index_bord_sugg')}}">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-contact">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Suggestions
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="{{route('index_formule')}}">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-sign-usdc">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Formules
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="{{route('index_bord_parametrage')}}">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-setting">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Paramétrage
                                        </span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="nk-wrap ">
                <div class="nk-header is-light nk-header-fixed is-light">
                    <div class="container-xl wide-xl">
                        <div class="nk-header-wrap">

                            @if(request()->routeIs('index_accueil_bord') )
                            <div class="nk-menu-trigger d-xl-none ms-n1 me-3">
                                <a class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu" href="#">
                                    <em class="icon ni ni-menu">
                                    </em>
                                </a>
                            </div>
                            @endif
                            
                            <div class="nk-header-brand ">
                                <a class="logo-link" href="{{ route('index_accueil') }}">
                                    <img height="50" width="50" src="{{asset('images/logo/logo.png')}}" /></img>
                                </a>
                            </div>                           
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    {{-- @if(!request()->routeIs('index_accueil'))
                                    <li class="dropdown notification-dropdown">
                                        <a class=" nk-quick-nav-icon" href="{{route('index_accueil')}}">
                                            <em class="icon ni ni-home"></em>
                                            <span class="fs-15px"></span>
                                        </a>
                                    </li>
                                    @endif --}}
                                    {{-- <li class="dropdown notification-dropdown" hidden>
                                        <a class=" nk-quick-nav-icon" href="{{route('index_paye')}}">
                                            <em class="icon ni ni-money"></em>
                                            <span class="fs-15px"></span>
                                        </a>
                                    </li> --}}
                                    {{-- @if(!request()->routeIs('index_annonce') )
                                    <li class="dropdown notification-dropdown">
                                        <a class=" nk-quick-nav-icon" href="{{route('index_annonce')}}">
                                            <em class="icon ni ni-box-view-fill"></em>
                                            <span class="fs-15px"></span>
                                        </a>
                                    </li>
                                    @endif --}}

                                    @auth()
                                    <li class="dropdown notification-dropdown">
                                        <a class=" nk-quick-nav-icon" data-bs-toggle="modal" data-bs-target="#modalAnnonceNew">
                                            <em class="icon ni ni-plus-circle"></em>
                                            <span class="fs-15px"></span>
                                        </a>
                                    </li>
                                    @endauth

                                    @auth()
                                    {{-- <li class="dropdown notification-dropdown">
                                        <a class="nk-quick-nav-icon" data-bs-toggle="modal" data-bs-target="#modalAnnonceNew">
                                            <div class="icon-status icon-status-info">
                                                <em class="icon ni ni-plus-circle"></em>
                                            </div>
                                        </a>
                                    </li> --}}
                                    {{-- <li class="dropdown notification-dropdown"><a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info">
                                                <em class="icon ni ni-bell"></em>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-primary-dim ni ni-bell"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">
                                                                Nouveau véhicule
                                                            </div>
                                                            <div class="nk-notification-time">il y a 5 min</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-foot center">
                                                <a href="#">Voir plus</a>
                                            </div>
                                        </div>
                                    </li> --}}
                                    @endauth

                                    @yield('menu_haut')

                                    <li class="dropdown user-dropdown">
                                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                            <div class="user-toggle">
                                                @if(Auth::user())
                                                    @if(Auth::user()->image_nom)
                                                    <div class="user-avatar sm sq " style="background: transparent;">
                                                        <span>
                                                            <img height="33px" width="33px" style="object-fit: cover;" class="thumb" src="{{asset('storage/images/'.Auth::user()->image_nom)}}">
                                                        </span>
                                                        <div class="status dot dot-lg dot-success"></div>
                                                    </div>
                                                    @else
                                                    <div class="user-avatar sm sq ">
                                                        <span>
                                                            {{ ucfirst(substr(Auth::user()->name, 0, 1)).ucfirst(substr(Auth::user()->prenom, 0, 1)) }}
                                                        </span>
                                                        <div class="status dot dot-lg dot-success"></div>
                                                    </div>
                                                    @endif
                                                <div class="user-info d-none d-md-block">
                                                    <span class="lead-text">
                                                        {{ ucfirst(explode(' ', Auth::user()->name)[0]) . ' ' . ucfirst(explode(' ', Auth::user()->prenom)[0]) }}
                                                    </span>
                                                    <div class="user-name dropdown-indicator">
                                                        {{Auth::user()->email}}
                                                    </div>
                                                </div>
                                                @else
                                                <div class="user-avatar sq sm bg-primary">
                                                    <em class="icon ni ni-user-alt">
                                                    </em>
                                                </div>
                                                @endif
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            @if(Auth::user())
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="#">
                                                            <em class="icon ni ni-user-alt">
                                                            </em>
                                                            <span>
                                                                Voir profil
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <em class="icon ni ni-growth">
                                                            </em>
                                                            <span>
                                                                Statistique
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <em class="icon ni ni-view-list-fill">
                                                            </em>
                                                            <span>
                                                                Mes annonces
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <em class="icon ni ni-bell">
                                                            </em>
                                                            <span>
                                                                Notification
                                                            </span>
                                                        </a>
                                                    </li>
                                                    @if(Auth::check() && session('role') == 'ADMINISTRATEUR')
                                                    <li>
                                                        <a href="{{ route('index_accueil_bord') }}">
                                                            <em class="icon ni ni-setting">
                                                            </em>
                                                            <span>
                                                                Configuration
                                                            </span>
                                                        </a>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="{{ route('deconnexion') }}">
                                                            <em class="icon ni ni-signout">
                                                            </em>
                                                            <span>
                                                                Se Déconnecter
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            @else
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="{{ route('index_registre') }}">
                                                            <em class="icon ni ni-user-add">
                                                            </em>
                                                            <span>
                                                                S'incrire
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('index_login') }}">
                                                            <em class="icon ni ni-lock">
                                                            </em>
                                                            <span>
                                                                Se connecter
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')

                <div class="nk-footer">
                    <div class="container-xl wide-xl bg-white rounded p-2">
                        <div class="nk-footer-wrap mt-2">
                            <div class="nk-footer-copyright">
                                <div class="container">
                                    <div class="row g-custom-x">
                                        <div class="col-lg-3 mt-2">
                                            <div class="widget">
                                                <h5>A Propos</h5>
                                                <p>
                                                    <strong>Bolides Deals CI</strong> est une application web dédiée à la mise en relation entre acheteurs, vendeurs et locataires de véhicules en Côte d'Ivoire. Elle permet aux utilisateurs de consulter et publier des annonces pour la vente et la location de voitures.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <div class="widget">
                                                <h5>Contact Info</h5>
                                                <ul class="">
                                                    <li>
                                                        <span>
                                                            <em class="icon ni ni-location"></em>
                                                            Abidjan, Cocody rivera abatta
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span>
                                                            <em class="icon ni ni-call"></em>
                                                            +225 0102514392
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span>
                                                            <em class="icon ni ni-mail"></em>
                                                            <a href="mailto:bolidesdealsci@gmail.com">
                                                                bolidesdealsci@gmail.com
                                                            </a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <h5>Liens Rapides</h5>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="widget">
                                                        <ul>
                                                            <li>
                                                                <em class="icon ni ni-home" ></em>
                                                                <a href="#">Accueil</a>
                                                            </li>
                                                            <li>
                                                                <em class="icon ni ni-box-view-fill" ></em>
                                                                <a href="#">Annonces</a>
                                                            </li>
                                                            <li>
                                                                <em class="icon ni ni-sign-usdc" ></em>
                                                                <a href="#">Formule</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <div class="widget">
                                                <h5>Réseaux Sociaux</h5>
                                                <div class="social-icons">
                                                    <a class="btn btn-outline-success btn-white btn-dim btn-sm mt-1" href="#">
                                                        <em class="icon ni ni-whatsapp"></em>
                                                    </a>
                                                    <a class="btn btn-outline-primary btn-white btn-dim btn-sm mt-1" target="_bank" href="https://www.facebook.com/profile.php?id=61564901360088&mibextid=LQQJ4d" title="facebook">
                                                        <em class="icon ni ni-facebook-f"></em>
                                                    </a>
                                                    <a class="btn btn-outline-info btn-white btn-dim btn-sm mt-1" href="#">
                                                        <em class="icon ni ni-twitter"></em>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nk-footer-wrap mt-2">
                            <div class="container wide-lg">
                                <div class="row g-3">
                                    {{-- <div class="col-lg-6 order-lg-last">
                                        <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                            <li class="nav-item"><a class="nav-link" href="#">Terms & Condition</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                                        </ul>
                                    </div> --}}
                                    <div class="col-lg-6">
                                        <div class="nk-block-content text-center text-lg-left">
                                            <p class="text-soft">
                                                <span class="w-20">
                                                    Copyright © <script>
                                                    document.write(new Date().getFullYear())
                                                    </script>
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
    </div>

    {{-- <ul class="nk-sticky-toolbar">
        @yield('btn_lateral')
        <li class="demo-thumb bg-white">
            <a class="tipinfo text-primary" target="_bank" href="https://www.facebook.com/profile.php?id=61564901360088&mibextid=LQQJ4d" title="facebook">
                <em class="icon ni ni-facebook-f"></em>
            </a>
        </li>
        <li class="demo-thumb bg-white">
            <a class="tipinfo text-primary" target="_bank" href="https://web.facebook.com/profile.php?id=61564901360088" title="instagram">
                <em class="icon ni ni-instagram"></em>
            </a>
        </li>
        <li class="demo-thumb bg-white">
            <a class="tipinfo text-primary" title="Actualiser" onclick="window.location.reload();">
                <em class="icon ni ni-regen"></em>
            </a>
        </li>
    </ul> --}}

    {{-- <a class="pmo-st pmo-dark bg-azure active" data-bs-toggle="modal" data-bs-target="#modalCommentaire" >
        <div class="pmo-st-img">
            <em class="icon ni ni-chat-circle" style="font-size: 25px;"></em>
        </div>
    </a> --}}

    {{-- @if(request()->routeIs('index_accueil','index_annonce'))
    <div class="pmo-lv pmo-dark active p-3" style="width: 200px;">
        <a class="" @if(Auth::check()) data-bs-toggle="modal" data-bs-target="#modalAnnonceNew" @else data-bs-toggle="modal" data-bs-target="#LoginRequis" @endif>
            <div class="pmo-text text-white">
                Publier une annonce
            </div>
            <p class="pmo-close">
                <em class="ni ni-arrow-long-right"></em>
            </p>
        </a>
    </div>
    @endif --}}

    @yield('btn_bas')

    <div class="modal fade" tabindex="-1" id="LoginRequis" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content bg-white">
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-alert bg-warning"></em>
                        <h4 class="nk-modal-title">Connexion requise</h4>
                        <div class="nk-modal-text">
                            <div class="caption-text">
                                <span>
                                    Vous devez être connecté d'abord.
                                </span>
                            </div>
                        </div>
                        <div class="nk-modal-action">
                            <button class="btn btn-md btn-success btn-dim btn-white me-2" onclick="window.location.href='{{ route('index_login') }}'">
                                Se connecter
                            </button>
                            <button class="btn btn-md btn-danger btn-dim btn-white me-2" data-bs-dismiss="modal">
                                Fermer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" tabindex="-1" id="modalCommentaire">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-azure text-white">
                    <h5 class="modal-title">Nouvelle suggestion</h5>
                    <a class="text-white fs-20px" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form id="form_sugg" method="post" action="{{route('trait_sugg')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="default-textarea">Nom</label>
                            <div class="form-control-wrap">
                                @if(Auth::user())
                                    <input class="form-control" name="nom" readonly type="text" placeholder="Entrer votre nom" value="{{Auth::user()->name}}" />
                                @else
                                    <input required name="nom" class="form-control" type="text" placeholder="Entrer votre nom"/>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-textarea">Email</label>
                            <div class="form-control-wrap">
                                @if(Auth::user())
                                    <input class="form-control" readonly type="email" placeholder="Entrer votre email" name="email" value="{{Auth::user()->email}}"/>
                                @else
                                    <input required class="form-control" type="email" placeholder="Entrer votre email" name="email"/>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-textarea">Suggestion</label>
                            <div class="form-control-wrap">
                                <textarea name="message" class="form-control no-resize" id="default-textarea" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-white btn-dim btn-md btn-outline-success">
                                <span>Envoyer</span>
                                <em class="icon ni ni-send" ></em>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">Suggestion</span>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="modal fade zoom" tabindex="-1" id="modalAnnonceNew">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content bg-white">
                <div class="modal-body">
                    <div class="row g-gs align-items-center justify-content-center" >
                        <div class="col-12" >
                            <h6 class="text-center" >
                                <img height="40px" width="40px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/type.jpg') }}">
                            </h6>
                            <p class="text-center text-black fs-20px" >
                                Quel type d'annonce voulez-vous créer ? 
                            </p>
                        </div>
                        <div class="col-6" >
                            <a href="#" class="btn btn-white btn-dim btn-info btn-block" >
                                <em class="icon ni ni-cc-alt2" ></em>
                                <span> Vente </span>
                            </a>
                        </div>
                        <div class="col-6" >
                            <a href="#" class="btn btn-white btn-dim btn-warning btn-block" >
                                <em class="icon ni ni-cc-alt2" ></em>
                                <span> Location </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Message de consentement aux cookies -->
    {{-- <div id="cookieConsent" class="cookie-consent">
        <p>
            Nous utilisons des cookies pour améliorer votre expérience sur notre site. En continuant à naviguer, vous acceptez l'utilisation de cookies.
            <button id="acceptCookies" class="btn btn-primary">Accepter</button>
        </p>
    </div> --}}

    <script src="{{asset('assets/js/bundle55a0.js')}}"></script>
    <script src="{{asset('assets/js/scripts55a0.js')}}"></script>
    <script src="{{asset('assets/js/demo-settings55a0.js')}}"></script>
    <script src="{{asset('assets/js/example-toastr55a0.js') }}"></script>

    @if (session('success'))
        <script>
            showAlert("Succès", "{{ session('success') }}", "success");
        </script>
        @php session()->forget('success'); @endphp
    @endif
    @if (session('error'))
        <script>
            showAlert("Erreur", "{{ session('error') }}", "error");
        </script>
        @php session()->forget('error'); @endphp
    @endif
    @if (session('warning'))
        <script>
            showAlert("Alert", "{{ session('warning') }}", "warning");
        </script>
        @php session()->forget('warning'); @endphp
    @endif
    @if (session('info'))
        <script>
            showAlert("Information", "{{ session('info') }}", "info");
        </script>
        @php session()->forget('info'); @endphp
    @endif

</body>

</html>