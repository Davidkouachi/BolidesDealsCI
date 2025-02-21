@extends('app')

@section('titre', 'Formules')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Formules
                        </h3>
                    </div>
                </div>
            </div>
            <div class="nk-block nk-block-lg">
                <form class="nk-block" id="form_new_formule" action="{{route('trait_formule')}}" method="post">
                    @csrf
                    <div class="row g-gs" >
                        <div class="col-12" >
                            <div class="alert alert-warning alert-dismissible fade show rounded-6" role="alert">
                                <ul>
                                    <li>
                                        <p class="small mb-0 fs-14px">
                                            <strong>NB : </strong> ces élements ci-dessous s'applique uniquement aux <strong>annonces de type vente</strong>
                                        </p>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <p class="small mb-0 fs-14px">
                                            - Durée de vie d'une annonce
                                        </p>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <p class="small mb-0 fs-14px">
                                            - Suppression ou Désactivation de l'annonce
                                        </p>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <p class="small mb-0 fs-14px">
                                            - Renouvelement d'une annonce
                                        </p>
                                    </li>
                                </ul>
                                <div class="d-inline-flex position-absolute end-0 top-50 translate-middle-y me-2">
                                    <button type="button" class="btn btn-xs btn-icon btn-warning rounded-pill" data-bs-dismiss="alert">
                                        <em class="icon ni ni-cross"></em>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-inner card-inner-lg">
                                        <div id="contenu">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">Nouvelle formule</h4>
                                                </div>
                                                <div class="nk-block-des">
                                                    <p>
                                                        Vous devez fournir toutes les informations de base nécessaires pour la formule.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row g-gs mb-4" >
                                                <div class="col-lg-4 col-md-6" id="div_couleur">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Couleur
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" id="couleur" name="couleur">
                                                                <option value=""></option>
                                                                <option value="success">Success</option>
                                                                <option value="danger">Danger</option>
                                                                <option value="primary">Primary</option>
                                                                <option value="info">Info</option>
                                                                <option value="warning">Warning</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_nom">
                                                   <div class="form-group">
                                                        <label class="form-label">Nom de la formule</label>
                                                        <div class="form-control-wrap">
                                                            <input required name="nom" type="text" class="form-control form-control-md" placeholder="Nom de la formule" oninput="this.value = this.value.toUpperCase()">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_gratuit">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">
                                                            Gratuit
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" id="gratuit" name="gratuit">
                                                                <option value=""></option>
                                                                <option selected value="oui">Oui</option>
                                                                <option value="non">Non</option>
                                                            </select>
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    $('#gratuit').on('change', function() {
                                                                        var selectedValue = $(this).val();

                                                                        if (selectedValue == 'oui') {
                                                                            document.getElementById('div_prix').style.display='none';
                                                                            document.getElementById('prix').value='';

                                                                        } else {
                                                                            document.getElementById('div_prix').style.display='block';
                                                                            document.getElementById('prix').value='0';
                                                                        }
                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_prix" style="display: none;">
                                                   <div class="form-group">
                                                        <label class="form-label" for="default-05">Prix</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-text-hint">
                                                                <span class="overline-title">Fcfa / Mois</span>
                                                            </div>
                                                            <input required type="tel" class="form-control" id="prix" placeholder="Prix de la formule" name="prix" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_badge">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Badge
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" id="badge" name="badge">
                                                                <option value=""></option>
                                                                <option value="oui">Oui</option>
                                                                <option value="non">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_annonce_tete">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Annonce en tête
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" id="tete_liste" name="tete_liste">
                                                                <option value=""></option>
                                                                <option value="non">Non</option>
                                                                @for($i=1; $i <= 100 ; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12" >
                                                    <div class="form-group"><label class="form-label" for="default-03">Nombre de photo par annonce</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" id="nbre_photo" name="nbre_photo">
                                                                <option value=""></option>
                                                                @for($i=1; $i <= 25 ; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12" >
                                                    <div class="form-group"><label class="form-label" for="default-03">Nombre de renouvelemnet</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" id="nbre_refresh" name="nbre_refresh">
                                                                <option value=""></option>
                                                                @for($i=1; $i <= 10 ; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12" >
                                                    <div class="form-group"><label class="form-label" for="default-03">Durée de vie d'une annonce</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" id="duree_vie" name="duree_vie">
                                                                <option value=""></option>
                                                                @for($i=1; $i <= 31 ; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_top_annonce">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Top des annonces
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" id="top_annonce" name="top_annonce">
                                                                <option value=""></option>
                                                                <option value="oui">Oui</option>
                                                                <option value="non">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_stat">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Analyse Statistique
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" id="stat" name="stat">
                                                                <option value=""></option>
                                                                <option value="oui">Oui</option>
                                                                <option value="non">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12" >
                                                    <div class="form-group row g-gs align-items-center justify-content-center">
                                                        <div class="col-12 text-center" >
                                                            <button type="submit" class="btn btn-md btn-white btn-dim btn-outline-success ">
                                                                <span>Enregistrer</span>
                                                                <em class="icon ni ni-send"></em>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="nk-block">
                <div class="row g-gs align-items-center justify-content-center">
                    @foreach($formules as $key => $value)
                    <div class="col-sm-6 col-lg-6 col-xxl-4">
                        <div class="card trans_shado pricing recommend alert alert-pro alert-{{$value->couleur}}" style="padding-left: 10%;">
                            <div class="p-4">
                                <div class="pricing-title">
                                    <h4 class="card-title title text-{{$value->couleur}}">
                                        {{$value->nom}}
                                    </h4>
                                </div>
                                <div class="pricing-price">
                                    @if($value->gratuit === 'oui')
                                        <h5 class="display-8">Gratuit <span class="caption-text text-base fw-normal">/ mois</span></h5>
                                    @else
                                        <h5 class="display-8">
                                            {{$value->prix.' Fcfa'}} 
                                            <span class="caption-text text-base fw-normal">
                                                / mois
                                            </span>
                                        </h5>
                                    @endif
                                </div>
                            </div>
                            <div class="p-4">
                                <ul class="pricing-features">
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>{{$value->nbre_photo}} photo(s) / Annonce </span>
                                    </li>
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>Durée de vie des annonces: {{$value->duree_vie}} jours</span>
                                    </li>
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>Renouvelement d'une annonce: {{$value->nbre_refresh}} fois </span>
                                    </li>
                                    <li>
                                        @if($value->badge === 'oui')
                                            <em class="icon text-success ni ni-check-circle-fill"></em>
                                        @else
                                            <em class="icon text-danger ni ni-cross-circle"></em>
                                        @endif
                                        <span>Visibilité améliorée avec badge</span>
                                    </li>
                                    <li>
                                        @if($value->tete_liste === 'non')
                                            <em class="icon text-danger ni ni-cross-circle"></em>
                                            <span>Annonce en tête de liste </span>
                                        @else
                                            <em class="icon text-success ni ni-check-circle-fill"></em>
                                            <span>Annonce en tête de liste : {{$value->tete_liste.'h'}} </span>
                                        @endif
                                        
                                    </li>
                                    <li>
                                        @if($value->top_annonce === 'oui')
                                            <em class="icon text-success ni ni-check-circle-fill"></em>
                                        @else
                                            <em class="icon text-danger ni ni-cross-circle"></em>
                                        @endif
                                        <span>Top des annonces</span>
                                    </li>
                                    <li>
                                        @if($value->stat === 'oui')
                                            <em class="icon text-success ni ni-check-circle-fill"></em>
                                        @else
                                            <em class="icon text-danger ni ni-cross-circle"></em>
                                        @endif
                                        <span>Analyse statistique des annonces</span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Support client par email ou Chat</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="px-4 mb-4 text-center">
                                {{-- <button class="btn btn-outline-success btn-block">Souscrire</button> --}}
                                {{-- <span class="badge badge-md bg-secondary">Actuel</span> --}}
                                <a data-bs-toggle="modal" data-bs-target="#modalUpdate{{$value->id}}" class="btn btn-white btn-outline-light btn-dim">
                                    <span>Modifier</span>
                                    <em class="icon ni ni-edit" ></em>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($formules as $key => $value)
<div class="modal fade zoom" tabindex="-1" id="modalUpdate{{$value->id}}">
    <div class="modal-dialog modal-xl" role="document" style="width: 100%;">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h5 class="modal-title">Mise à jour</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body ">
                <form class="nk-block" id="form_new_formule" action="{{route('trait_formule_update',$value->id)}}" method="post">
                    @csrf
                    <div class="row g-gs mb-4">
                        <div class="col-lg-4 col-md-6" id="div_couleur">
                            <div class="form-group">
                                <label class="form-label">
                                    Couleur
                                </label>
                                <div class="form-control-wrap">
                                    <select required class="form-select js-select2" id="couleur{{$value->id}}" name="couleur">
                                        <option value="success" @if($value->couleur == 'success') selected @endif>
                                            Success</option>
                                        <option value="danger" @if($value->couleur == 'danger') selected @endif>
                                            Danger</option>
                                        <option value="primary" @if($value->couleur == 'primary') selected @endif>
                                            Primary</option>
                                        <option value="info" @if($value->couleur == 'info') selected @endif>
                                            Info</option>
                                        <option value="warning" @if($value->couleur == 'warning') selected @endif>
                                            Warning</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" id="div_nom">
                            <div class="form-group">
                                <label class="form-label">Nom de la formule</label>
                                <div class="form-control-wrap">
                                    <input required name="nom" type="text" class="form-control form-control-md" placeholder="Nom de la formule" oninput="this.value = this.value.toUpperCase()" value="{{$value->nom}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" id="div_gratuit">
                            <div class="form-group">
                                <label class="form-label" for="cp1-team-size">
                                    Gratuit
                                </label>
                                <div class="form-control-wrap">
                                    <select required class="form-select js-select2" id="gratuit{{$value->id}}" name="gratuit">
                                        <option value="oui" @if($value->gratuit == 'oui') selected @endif>Oui</option>
                                        <option value="non" @if($value->gratuit == 'non') selected @endif>Non</option>
                                    </select>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            $('#gratuitu').on('change', function() {
                                                var selectedValue = $(this).val();

                                                if (selectedValue == 'oui') {
                                                    document.getElementById('div_prixu').style.display='none';
                                                } else {
                                                    document.getElementById('div_prixu').style.display='block';
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" id="div_prixu" @if($value->gratuit == 'oui') style="display: none;" @endif  >
                            <div class="form-group">
                                <label class="form-label" for="default-05">Prix</label>
                                <div class="form-control-wrap">
                                    <div class="form-text-hint">
                                        <span class="overline-title">Fcfa / Mois</span>
                                    </div>
                                    <input required type="tel" class="form-control" id="prix{{$value->id}}" placeholder="Prix de la formule" name="prix" value="{{$value->prix}}">
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            // Écouter l'événement d'entrée sur les champs de texte
                                            document.getElementById('prix{{$value->id}}').addEventListener('input', function() {
                                                this.value = formatPrice(this.value);
                                            });
                                            // Événement pour permettre uniquement les chiffres
                                            document.getElementById('prix{{$value->id}}').addEventListener('keypress', function(event) {
                                                const key = event.key;
                                                if (isNaN(key)) {
                                                    event.preventDefault();
                                                }
                                            });
                                            // Fonction pour formater le prix avec des points
                                            function formatPrice(input) {
                                                // Supprimer tous les points existants
                                                input = input.replace(/\./g, '');

                                                // Formater le prix avec des points
                                                return input.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" id="div_badge">
                            <div class="form-group">
                                <label class="form-label">
                                    Badge
                                </label>
                                <div class="form-control-wrap">
                                    <select required class="form-select js-select2" id="badge{{$value->id}}" name="badge">
                                        <option value="oui" @if($value->badge == 'oui') selected @endif>
                                            Oui</option>
                                        <option value="non" @if($value->badge == 'non') selected @endif>
                                            Non</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" id="div_annonce_tete">
                            <div class="form-group">
                                <label class="form-label">
                                    Annonce en tête
                                </label>
                                <div class="form-control-wrap">
                                    <select required class="form-select js-select2" id="tete_liste{{$value->id}}" name="tete_liste">
                                        <option value="non" @if($value->tete_liste == 'non') selected @endif>
                                            Non</option>
                                        @for($i=1; $i <= 100 ; $i++)
                                            <option value="{{$i}}" @if($value->tete_liste == $i) selected @endif>
                                                {{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group"><label class="form-label" for="default-03">Nombre de photo par annonce</label>
                                <div class="form-control-wrap">
                                    <select required class="form-select js-select2" id="nbre_photo{{$value->id}}" name="nbre_photo">
                                        @for($i=1; $i <= 25 ; $i++)
                                            <option value="{{$i}}" @if($value->nbre_photo == $i) selected @endif>
                                                {{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group"><label class="form-label" for="default-03">Nombre de renouvelement</label>
                                <div class="form-control-wrap">
                                    <select required class="form-select js-select2" id="nbre_refresh{{$value->id}}" name="nbre_refresh">
                                        <option value=""></option>
                                        @for($i=1; $i <= 10 ; $i++)
                                            <option value="{{$i}}" @if($value->nbre_refresh == $i) selected @endif>
                                                {{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group"><label class="form-label" for="default-03">Durée de vie d'une annonce</label>
                                <div class="form-control-wrap">
                                    <select required class="form-select js-select2" id="duree_vie{{$value->id}}" name="duree_vie">
                                        <option value=""></option>
                                        @for($i=1; $i <= 31 ; $i++)
                                            <option value="{{$i}}" @if($value->duree_vie == $i) selected @endif> {{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" id="div_top_annonce">
                            <div class="form-group">
                                <label class="form-label">
                                    Top des annonces
                                </label>
                                <div class="form-control-wrap">
                                    <select required class="form-select js-select2" id="top_annonce{{$value->id}}" name="top_annonce">
                                        <option value=""></option>
                                        <option value="oui" @if($value->top_annonce == 'oui') selected @endif>
                                            Oui</option>
                                        <option value="non" @if($value->top_annonce == 'non') selected @endif>
                                            Non</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" id="div_stat">
                            <div class="form-group">
                                <label class="form-label">
                                    Analyse Statistique
                                </label>
                                <div class="form-control-wrap">
                                    <select required class="form-select js-select2" id="stat{{$value->id}}" name="stat">
                                        <option value="oui" @if($value->stat == 'oui') selected @endif>
                                            Oui</option>
                                        <option value="non" @if($value->stat == 'non') selected @endif>
                                            Non</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row g-gs align-items-center justify-content-center">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-md btn-white btn-dim btn-outline-success ">
                                        <span>Enregistrer</span>
                                        <em class="icon ni ni-send"></em>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach

<script src="{{asset('assets/js/app/js/bord/formule/form.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Écouter l'événement d'entrée sur les champs de texte
            document.getElementById('prix').addEventListener('input', function() {
                this.value = formatPrice(this.value);
            });
            document.getElementById('prixu').addEventListener('input', function() {
                this.value = formatPrice(this.value);
            });
            // Événement pour permettre uniquement les chiffres
            document.getElementById('prix').addEventListener('keypress', function(event) {
                const key = event.key;
                if (isNaN(key)) {
                    event.preventDefault();
                }
            });
            // Événement pour permettre uniquement les chiffres
            document.getElementById('prixu').addEventListener('keypress', function(event) {
                const key = event.key;
                if (isNaN(key)) {
                    event.preventDefault();
                }
            });

            // Fonction pour formater le prix avec des points
            function formatPrice(input) {
                // Supprimer tous les points existants
                input = input.replace(/\./g, '');

                // Formater le prix avec des points
                return input.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        });
    </script>

@endsection
