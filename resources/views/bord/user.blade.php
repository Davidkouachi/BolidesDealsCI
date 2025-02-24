 @extends('app')

@section('titre', 'Utilisateurs')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Utilisateurs
                        </h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
			    <div class="card card-preview">
			        <div class="card-inner">
			            <table class="datatable-init table table_users">
			                <thead>
			                    <tr>
			                        <th>N°</th>
			                        <th>Nom</th>
			                        <th>Prénoms</th>
			                        <th>Contact</th>
			                        <th>Email</th>
			                        <th>Statut</th>
			                        <th>Rôle</th>
			                        <th>Date de création</th>
			                        <th></th>
			                    </tr>
			                </thead>
			                <tbody>
			                </tbody>
			            </table>
			        </div>
			    </div>
			</div>
        </div>
    </div>
</div>

@section('btn_lateral')

@endsection

{{-- @foreach ($users as $user)
<div class="modal fade zoom" tabindex="-1" id="modalInfo{{ $user->id }}">
    <div class="modal-dialog modal-md" role="document" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informations</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <div class="gy-3">
				    <div class="row g-1 align-center">
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Nom :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{$user->name}}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Prénoms :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{$user->prenom}}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Email :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{$user->email}}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Rôle :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal
				                    	@php
			                        		if ($user->role === 'ADMINISTRATEUR') {
			                        			echo 'text-danger';
			                        		}
			                        	@endphp
				                    " style="font-size: 14px;">
				                        {{$user->role}}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Date de création :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Nombre d'annonce(s) :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{ $user->nbre_annonce }}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Annonce(s) en ligne :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{ $user->nbre_annonce_ligne }}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Annonce(s) hors ligne :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{ $user->nbre_annonce_hligne }}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Annonce(s) indisponible :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{ $user->nbre_annonce_indispo }}
				                    </span>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
            </div>
        </div>
    </div>
</div>
@endforeach --}}

{{-- @foreach ($users as $user)
<div class="modal fade zoom" tabindex="-1" id="modalNote{{ $user->id }}">
    <div class="modal-dialog modal-md" role="document" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Note</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
			<div class="modal-body">
			    <form id="form" method="POST" action="#" class="form-validate">
			        @csrf
			        <div class="form-group">
					    <label class="form-label" for="fv-topics1">
					        Type de note
					    </label>
					    <div class="form-control-wrap ">
					        <select class="form-select js-select2" data-placeholder="Selectionner">
					            <option value=""></option>
					            <option value="a">Mise en garde</option>
					            <option value="b">Félicitations</option>
					            <option value="c">Regret</option>
					        </select>
					    </div>
					</div>
			        <div class="form-group">
			            <label class="form-label" for="default-textarea">Suggestion</label>
			            <div class="form-control-wrap">
			                <textarea name="text" class="form-control no-resize" id="default-textarea" required data-msg="Error message re"></textarea>
			            </div>
			        </div>
			        <div class="form-group">
			            <button type="submit" class="btn btn-white btn-dim btn-md btn-outline-success">
			                <span>Envoyer</span>
			                <em class="icon ni ni-send"></em>
			            </button>
			        </div>
			    </form>
			</div>
			<div class="modal-footer bg-light">
			    <span class="sub-text">Note</span>
			</div>
        </div>
    </div>
</div>
@endforeach --}}

<script src="{{asset('assets/js/app/js/bord/user/list.js') }}"></script>

@endsection