<!DOCTYPE html>
<html lang="zxx" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link href="{{asset('images/logo/icon/logo.ico')}}" rel="shortcut icon">
    <title>Réinitialisation | BOLIDES DEALS CI</title>
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
                                        <h4 class="nk-block-title">Réinitialisation</h4>
                                    </div>
                                </div>
                                <div class="row g-gs">
                                    <input type="hidden" id="token" value="{{ $token }}">
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label" for="password">Nouveau mot de passe</label>
                                            <div class="form-control-wrap">
                                                <a href="#" class="form-icon form-icon-right passcode-switch md" data-target="password">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input required type="password" name="password" class="form-control form-control-md" id="password" placeholder="Entrer votre Mot de passe" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label" for="password">Confirmer le nouveau mot de passe</label>
                                            <div class="form-control-wrap">
                                                <a href="#" class="form-icon form-icon-right passcode-switch md" data-target="cpassword">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input required type="password" name="cpassword" class="form-control form-control-md" id="cpassword" placeholder="Confirmer votre Mot de passe" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group row g-gs">
                                            <div class="col-lg-12 text-center">
                                                <button id="btn_eng" class="btn btn-md btn-white btn-dim btn-outline-success" >
                                                    <span>Terminer</span>
                                                    <em class="icon ni ni-check-circle"></em>
                                                </button>
                                            </div>
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

    <script src="{{asset('assets/js/app/js/form_password_new.js') }}"></script>
    <script src="{{asset('assets/js/app/js/ctrlv_ctrlc_reset_password.js') }}"></script>
</html>