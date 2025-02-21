@extends('app')

@section('titre', 'Rôles')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Rôles
                        </h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
			    <div class="row g-gs align-items-center justify-content-center">
			        <div class="col-lg-6">
			            <div class="card h-100">
			                <div class="card-inner">
			                    <div class="card-head">
			                        <h5 class="card-title">Formulaire</h5>
			                    </div>
			                    <form id="form" action="{{route('trait_role')}}" class="row g-gs" method="post">
			                    	@csrf
				                    <div class="col-12" >
					                    <div class="form-group">
					                        <div class="form-control-wrap">
					                            <input name="role" class="form-control" required type="text" oninput="this.value = this.value.toUpperCase()" placeholder="Entrer la Marque"/>
					                        </div>
					                    </div>
				                    </div>
				                    <div class="col-12" >
				                        <div class="form-group row g-gs">
	                                        <div class="col-6 text-center">
	                                            <button type="reset" class="btn btn-mw btn-dim btn-outline-danger btn-white">
	                                                <em class="icon ni ni-cross-circle"></em>
	                                                <span>Remise à Zéro</span>
	                                            </button>
	                                        </div>
	                                        <div class="col-6 text-center">
	                                            <button class="btn btn-mw btn-dim btn-outline-success btn-white " type="submit">
	                                                <span>Sauvgarder</span>
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
            <div class="nk-block">
			    <div class="card card-preview">
			        <div class="card-inner">
			        	<form id="deleteForm" action="{{route('suppr_role')}}" method="POST">
			        		@csrf
				            <table class="datatable-init table">
				            	<a id="allcheckbox" class="me-2 btn btn-white btn-dim btn-outline-primary btn-sm mb-2">
	                                <em class="icon ni ni-check" ></em>
	                                <span>Tout selectionné</span>
	                            </a>
	                            <a id="deleteButton" class="btn btn-white btn-dim btn-outline-danger btn-sm mb-2">
	                                <em class="icon ni ni-trash" ></em>
	                                <span>Supprimer</span>
	                            </a>
				                <thead>
				                    <tr>
				                        <th style="width: 50px;">
				                        	N°
				                        </th>
				                        <th>Rôle</th>
				                        <th>Nombre d'utilisateurs</th>
				                        <th>Date de création</th>
				                        <th></th>
				                    </tr>
				                </thead>
				                <tbody>
				                	@foreach($roles as $key => $value)
				                    <tr>
				                        <td class="nk-tb-col " style="width: 50px;" >
				                        	<div class="d-flex">
	                                            <div class="me-1 custom-control custom-control-sm custom-checkbox notext">
	                                            	<input type="checkbox" class="custom-control-input" id="checkbox{{ $value->id}}" name="checkboxes[]" value="{{ $value->id }}">
	                                            	<label class="custom-control-label" for="checkbox{{ $value->id}}"></label>
	                                            </div>
	                                            <spany>{{ $key+1}}</span>
	                                        </div>
				                        </td>
				                        <td class="nk-tb-col" >
				                        	{{ $value->nom}}
				                        </td>
				                        <td class="nk-tb-col" >
				                        	{{ $value->nbre_user}}
				                        </td>
				                        <td class="nk-tb-col" >
				                        	{{ \Carbon\Carbon::parse($value->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}
				                        </td>
				                        <td class="nk-tb-col" >
				                        	<a data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $value->id }}" class="btn btn-white btn-dim btn-warning btn-sm">
	                                            <em class="icon ni ni-edit" ></em>
	                                        </a>
				                        </td>
				                    </tr>
				                    @endforeach
				                </tbody>
				            </table>
				            <div class="modal fade" tabindex="-1" id="modalDelete" aria-modal="true" role="dialog">
							    <div class="modal-dialog" role="document">
							        <div class="modal-content bg-white">
							            <div class="modal-body modal-body-lg text-center">
							                <div class="nk-modal"><em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-trash bg-danger"></em>
							                    <h4 class="nk-modal-title">Confirmation</h4>
							                    <div class="nk-modal-text">
							                        <div class="caption-text">
							                            <span>
							                            	Voulez-vous vraiment éffectuée la suppression
							                            </span>
							                        </div>
							                    </div>
							                    <div class="nk-modal-action">
							                        <button class="btn btn-lg btn-mw btn-outline-success btn-dim btn-white me-2">
							                            oui
							                        </button>
							                        <a href="#" class="btn btn-lg btn-mw btn-outline-danger btn-dim btn-white" data-bs-dismiss="modal">
							                            non
							                        </a>
							                    </div>
							                </div>
							            </div>
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

@section('btn_lateral')

@endsection

@foreach ($roles as $value)
<div class="modal fade xxl" tabindex="-1" id="modalUpdate{{ $value->id }}" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
        	<div class="modal-header">
                <h5 class="modal-title">
                    Mise à jour
                </h5>
            </div>
            <div class="modal-body modal-body-lg">
                <form action="{{route('update_role',$value->id)}}" class="row g-gs" method="post">
				    @csrf
				    <div class="col-12">
				        <div class="form-group">
				            <div class="form-control-wrap">
				                <input name="role" class="form-control" required type="text" oninput="this.value = this.value.toUpperCase()" value="{{$value->nom}}" placeholder="Entrer la Marque" />
				            </div>
				        </div>
				    </div>
				    <div class="col-12">
				        <div class="form-group row g-gs">
				        	<div class="col-6 text-center">
				                <a data-bs-dismiss="modal" class="btn btn-mw btn-dim btn-outline-danger">
				                    <em class="icon ni ni-cross-circle"></em>
				                    <span>Fermer</span>
				                </a>
				            </div>
				            <div class="col-6 text-center">
				                <button class="btn btn-mw btn-dim btn-outline-primary " type="submit">
				                    <span>Mise à jour</span>
				                    <em class="icon ni ni-send"></em>
				                </button>
				            </div>
				        </div>
				    </div>
				</form>
            </div>
        </div>
    </div>
</div>
@endforeach


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const allcheckbox = document.getElementById('allcheckbox');
        const checkboxes = document.querySelectorAll('input[name="checkboxes[]"]');

        // Store the roles' user counts in a JavaScript object for quick access
        const rolesUserCounts = {
            @foreach($roles as $value)
                '{{ $value->id }}': {{ $value->nbre_user }},
            @endforeach
        };

        allcheckbox.addEventListener('click', function() {
            let Count = 0;

            checkboxes.forEach(function(checkbox) {
                const roleId = checkbox.value;
                const nbreUser = rolesUserCounts[roleId];

                if (nbreUser > 0) {
                    checkbox.checked = false; // Uncheck the checkbox
                    Count++; // Increment the count of unchecked boxes
                } else {
                    checkbox.checked = true; // Ensure it's checked if nbreUser <= 0
                }
            });

            // Show warning if any checkboxes were unchecked due to existing users
            if (Count > 0) {
                NioApp.Toast("<h5>Information</h5><p>Toutes les cases ne peuvent pas être sélectionnées parce qu'il y a certains rôles qui sont déjà occupés.</p>", "info", {position: "top-right"});
            }else {
                NioApp.Toast("<h5>Information</h5><p>Toutes les cases ont été sélectionnées.</p>", "success", {position: "top-right"});
            }
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach($roles as $key => $value)
        const checkbox{{ $value->id }} = document.getElementById('checkbox{{ $value->id }}');

        if (checkbox{{ $value->id }}) {
            checkbox{{ $value->id }}.addEventListener('change', function() {
                const nbreUser = {{ $value->nbre_user }};

                if (nbreUser > 0) {
                    NioApp.Toast("<h5>Alert</h5><p>Le nombre d\'utilisateurs pour ce rôle est supérieur a zéro. Ce rôle ne peut pas être sélectionné.</p>", "warning", {position: "top-right"});
                    checkbox{{ $value->id }}.checked = false;
                }
            });
        }
        @endforeach
    });
</script>

<script src="{{asset('assets/js/app/js/bord/role/form.js') }}"></script>
<script src="{{asset('assets/js/app/js/bord/role/delete_select_verf.js') }}"></script>

@endsection