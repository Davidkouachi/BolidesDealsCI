<!DOCTYPE html>
<html lang="zxx" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link href="{{asset('images/logo/icon/logo.ico')}}" rel="shortcut icon">
    <title>Mot de passe oublié | BOLIDES DEALS CI</title>
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
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs" style="margin-top: 0px;">
                        <div class="brand-logo text-center">
                            <a href="#" class="logo-link">
                                <img height="150px" width="150px" src="{{asset('images/logo/logo.png')}}">
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-inner card-inner-xxl">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Mot de passe oublié</h4>
                                        {{-- <div class="nk-block-des">
                                            <p></p>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="alert alert-fill alert-warning alert-dismissible alert-icon">
                                    <em class="icon ni ni-alert-circle"></em> 
                                    un lien sera envoyé à l'email s'il existe vraiement. 
                                    <button class="close" data-bs-dismiss="alert"></button>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <div class="form-control-wrap">
                                            <input name="email" type="email" class="form-control form-control-md" id="email" placeholder="Entrer votre Email" value="{{ old('email') }}" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row g-gs">
                                        <div class="col-lg-6">
                                            <a href="javascript:void(0);" onclick="history.back()" class="btn btn-md btn-white btn-dim btn-outline-danger btn-block">
                                                <em class="icon ni ni-arrow-left-circle"></em>
                                                <span>Retour</span>
                                            </a>
                                        </div>
                                        <div class="col-lg-6">
                                            <button id="btn_eng" class="btn btn-md btn-white btn-dim btn-outline-success btn-block" >
                                                <span>Verification</span>
                                                <em class="icon ni ni-check-circle"></em>
                                            </button>
                                        </div>
                                    </div>
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

    <script src="{{asset('assets/js/app/js/form_password_email.js') }}"></script>

</html>