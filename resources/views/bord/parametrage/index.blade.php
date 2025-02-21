@extends('app')

@section('titre', 'Paramétrage')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Paramétrage
                        </h3>
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <ul class="nav nav-tabs nav-tabs-s2">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#p_ann">
                            <em class="icon ni ni-box-view-fill"></em>
                            <span>Annonces</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="p_ann">
                        <div class="nk-data data-list">
                            <div class="data-head">
                                <h6 class="overline-title">
                                    Parametrage des annonces
                                </h6>
                            </div>
                            <div class="data-item">
                                <div class="data-col">
                                    <div class="nk-block-text data-label">
                                        <h6>
                                            Temps en ligne ( {{$para->nbre_jours_ligne.' jours'}} )
                                        </h6>
                                        <p>
                                            Les annonces ont une durée de <strong>{{$para->nbre_jours_ligne}} jours maximum.</strong> Passé ce délai, elles ne seront plus en ligne.
                                        </p>
                                    </div>
                                </div>
                                <div class="nk-block-actions flex-shrink-sm-0">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                        <li class="order-md-last">
                                            <a data-bs-target="#nbre_jours_ligne" data-bs-toggle="modal" class="btn btn-primary btn-sm ">
                                                <em class="icon ni ni-pen text-white" ></em>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-col">
                                    <div class="nk-block-text data-label">
                                        <h6>
                                            Temps de supression ( {{$para->nbre_jours_delete.' jours'}} )
                                        </h6>
                                        <p>
                                            Si aucun renouvellement n'est effectué dans <strong>les {{$para->nbre_jours_delete}} jours</strong> suivant la désactivation, l'annonce sera <strong>supprimée définitivement</strong>.
                                        </p>
                                    </div>
                                </div>
                                <div class="nk-block-actions flex-shrink-sm-0">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                        <li class="order-md-last">
                                            <a data-bs-target="#nbre_jours_delete" data-bs-toggle="modal" class="btn btn-primary btn-sm text-white">
                                                <em class="icon ni ni-pen text-white" ></em>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-col">
                                    <div class="nk-block-text data-label">
                                        <h6>
                                            Renouvelement ( {{$para->nbre_refresh.' fois'}} )
                                        </h6>
                                        <p>
                                            une annonce est <strong>renouveler que {{$para->nbre_refresh}} fois seulement</strong>.
                                        </p>
                                    </div>
                                </div>
                                <div class="nk-block-actions flex-shrink-sm-0">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                        <li class="order-md-last">
                                            <a data-bs-target="#nbre_refresh" data-bs-toggle="modal" class="btn btn-primary btn-sm text-white">
                                                <em class="icon ni ni-pen text-white" ></em>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-col">
                                    <div class="nk-block-text data-label">
                                        <h6>
                                            Nombre d'images ( {{$para->nbre_photo.' photos'}} )
                                        </h6>
                                        <p>
                                            Vous devez <strong>télécharger obligatoirement {{$para->nbre_photo}} photos</strong> pour l'annonce. <strong>Chaque photo doit être inférieure à 2 Mo</strong>.
                                        </p>
                                    </div>
                                </div>
                                <div class="nk-block-actions flex-shrink-sm-0">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                        <li class="order-md-last">
                                            <a data-bs-target="#nbre_photo" data-bs-toggle="modal" class="btn btn-primary btn-sm text-white">
                                                <em class="icon ni ni-pen text-white" ></em>
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
</div>

<div class="modal fade" id="nbre_jours_ligne" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <a class="close" data-bs-dismiss="modal" href="#">
                <em class="icon ni ni-cross-sm">
                </em>
            </a>
            <div class="modal-body modal-body-lg">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form class="row gy-4" action="{{route('trait_nbre_jours_ligne')}}" method="post" id="form">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">
                                        Nombre de jours
                                    </label>
                                    <div class="form-control-wrap d-flex">
                                        <input required type="tel" name="nbre_jours_ligne" class="form-control form-control-md me-1" id="nbre_jours_ligne" placeholder="Saisie obligatoire" maxlength="2" value="{{$para->nbre_jours_ligne}}">
                                        <button type="submit" class="btn btn-white btn-lg btn-dim btn-outline-success">
                                            <em class="icon ni ni-arrow-right-circle"></em>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nbre_jours_delete" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <a class="close" data-bs-dismiss="modal" href="#">
                <em class="icon ni ni-cross-sm">
                </em>
            </a>
            <div class="modal-body modal-body-lg">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form class="row gy-4" action="{{route('trait_nbre_jours_delete')}}" method="post" id="form">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">
                                        Nombre de jours
                                    </label>
                                    <div class="form-control-wrap d-flex">
                                        <input required type="tel" name="nbre_jours_delete" class="form-control form-control-md me-1" id="nbre_jours_delete" placeholder="Saisie obligatoire" maxlength="2" value="{{$para->nbre_jours_delete}}">
                                        <button type="submit" class="btn btn-white btn-lg btn-dim btn-outline-success">
                                            <em class="icon ni ni-arrow-right-circle"></em>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nbre_refresh" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <a class="close" data-bs-dismiss="modal" href="#">
                <em class="icon ni ni-cross-sm">
                </em>
            </a>
            <div class="modal-body modal-body-lg">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form class="row gy-4" action="{{route('trait_nbre_refresh')}}" method="post" id="form">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">
                                        Nombre de fois
                                    </label>
                                    <div class="form-control-wrap d-flex">
                                        <input required type="tel" name="nbre_refresh" class="form-control form-control-md me-1" id="nbre_refresh" placeholder="Saisie obligatoire" maxlength="2" value="{{$para->nbre_jours_refresh}}">
                                        <button type="submit" class="btn btn-white btn-lg btn-dim btn-outline-success">
                                            <em class="icon ni ni-arrow-right-circle"></em>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nbre_photo" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <a class="close" data-bs-dismiss="modal" href="#">
                <em class="icon ni ni-cross-sm">
                </em>
            </a>
            <div class="modal-body modal-body-lg">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form class="row gy-4" action="{{route('trait_nbre_photo')}}" method="post" id="form">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">
                                        Nombre d'images par annonce
                                    </label>
                                    <div class="form-control-wrap d-flex">
                                        <input required type="tel" name="nbre_photo" class="form-control form-control-md me-1" id="nbre_photo" placeholder="Saisie obligatoire" maxlength="2" value="{{$para->nbre_photo}}">
                                        <button type="submit" class="btn btn-white btn-lg btn-dim btn-outline-success">
                                            <em class="icon ni ni-arrow-right-circle"></em>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var inputElement = document.getElementById('nbre_jours_ligne');
    inputElement.addEventListener('input', function() {
        // Supprimer tout sauf les chiffres
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
<script>
    var inputElement = document.getElementById('nbre_jours_delete');
    inputElement.addEventListener('input', function() {
        // Supprimer tout sauf les chiffres
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
<script>
    var inputElement = document.getElementById('nbre_refresh');
    inputElement.addEventListener('input', function() {
        // Supprimer tout sauf les chiffres
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
<script>
    var inputElement = document.getElementById('nbre_photo');
    inputElement.addEventListener('input', function() {
        // Supprimer tout sauf les chiffres
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>


@endsection