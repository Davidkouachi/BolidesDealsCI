@extends('app')

@section('titre', 'Marques de véhicules')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Marques de véhicules
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
			                        <h5 class="card-title">
			                        	<span>Formulaire</span>
			                        </h5>			                        
			                    </div>
			                    <span class="text-warning " >
			                        <marquee>
			                        	Il est préférable de choisir une photo avec un fond transparent ou blanc
			                        </marquee>
			                    </span>
			                    <form id="form" action="{{route('trait_marque')}}" class="row g-gs" method="post" enctype="multipart/form-data">
			                    	@csrf
			                    	<div class="col h-50" >
									    <div class="">
									        <div class="card" style="display: flex;justify-content: center;align-items: center;border:block; height: 150px;">
									            <a>
									                <img id="imagePreview" style="object-fit: cover;height: 150px;" class="" src="" />
									            </a>
									            <ul class="product-badges" id="removeButton" style="display: none;">
									                <li>
									                    <a class="btn btn-icon btn-danger btn-sm">
									                        <em class="icon ni ni-cross"></em>
									                    </a>
									                </li>
									            </ul>
									        </div>
									    </div>
									</div>
                                    <div class="col-12" >
					                    <div class="form-group">
					                        <div class="form-control-wrap">
					                            <input name="image" required type="file" id="imageInput" style="width:120px;" accept="image/*">
					                        </div>
					                    </div>
				                    </div>
				                    <div class="col-12" >
					                    <div class="form-group">
					                        <div class="form-control-wrap">
					                            <input name="marque" class="form-control" required type="text" oninput="this.value = this.value.toUpperCase()" placeholder="Entrer la Marque" id="marque" />
					                        </div>
					                    </div>
				                    </div>
				                    <div class="col-12" >
				                        <div class="form-group row g-gs">
	                                        <div class="col-6 text-center">
	                                            <button type="reset" class="btn btn-mw btn-dim btn-outline-danger btn-white" id="btn_reset">
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
			        	<form id="deleteForm" action="{{route('suppr_marque')}}" method="POST">
			        		@csrf
				            <table class="datatable-init table">
	                            <a id="deleteButton" class="btn btn-white btn-dim btn-outline-danger btn-sm mb-2">
	                                <em class="icon ni ni-trash" ></em>
	                                <span>Supprimer</span>
	                            </a>
				                <thead>
				                    <tr>
				                        <th style="width: 50px;">
				                        	<div class=" d-flex">
				                        		
	                                            <div class="custom-control me-1 custom-control-sm custom-checkbox notext">
	                                            	<input type="checkbox" class="custom-control-input" id="pid">
	                                            	<label class="custom-control-label" for="pid"></label>
	                                            </div>
	                                            <span>N°</span>
	                                        </div>
				                        </th>
				                        <th style="width: 100px;">Image</th>
				                        <th>Marque</th>
				                        <th>Date de création</th>
				                        <th></th>
				                    </tr>
				                </thead>
				                <tbody>
				                	@foreach($marques as $key => $value)
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
				                        <td class="nk-tb-col" style="width: 100px;" >
	                                        <div class="user-avatar md sq" style="background: transparent;">
	                                            <img src="{{asset('storage/images/'.$value->image_nom)}}" alt="{{$value->marque}}" class="thumb" data-bs-toggle="modal" data-bs-target="#modalImage{{$value->id}}">
	                                        </div>
				                        </td>
				                        <td class="nk-tb-col" >
				                        	{{ $value->marque}}
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
							                            	Voulez-vous vraiment éffectuée la suppression ?
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

@foreach ($marques as $value)
<div class="modal fade xxl" tabindex="-1" id="modalUpdate{{ $value->id }}" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
        	<div class="modal-header">
                <h5 class="modal-title">
                    Mise à jour
                </h5>
            </div>
            <div class="modal-body modal-body-lg">
                <form action="{{route('update_marque',$value->id)}}" class="row g-gs" method="post" enctype="multipart/form-data">
				    @csrf
				    <div class="col h-50">
				        <div class="">
				            <div class="card" style="display: flex;justify-content: center;align-items: center;border:block; height: 150px;">
				                <a>
				                    <img id="imagePreview{{$value->id}}" style="object-fit: cover;height: 150px;" class="" src="" />
				                </a>
				                <ul class="product-badges" id="removeButton{{$value->id}}">
				                    <li>
				                        <a class="btn btn-icon btn-danger btn-sm">
				                            <em class="icon ni ni-cross"></em>
				                        </a>
				                    </li>
				                </ul>
				            </div>
				        </div>
				    </div>
				    <div class="col-12">
				        <div class="form-group">
				            <div class="form-control-wrap">
				                <input name="image" type="file" id="imageInput{{$value->id}}" style="width:120px;" accept="image/*">
				            </div>
				        </div>
				    </div>
				    <div class="col-12">
				        <div class="form-group">
				            <div class="form-control-wrap">
				                <input name="marque" class="form-control" required type="text" oninput="this.value = this.value.toUpperCase()" value="{{$value->marque}}" placeholder="Entrer la Marque" />
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

@foreach ($marques as $value)
<div class="modal fade zoom" id="modalImage{{$value->id}}">
    <div class="modal-dialog modal-dialog-centered modal-lg align-items-center justify-content-center" role="document">
        <img src="{{ asset('storage/images/'. $value->image_nom) }}" class="img-fluid" style="width: auto; height: auto;">
    </div>
</div>
@endforeach

<script>
	document.addEventListener('DOMContentLoaded', function() {
	    @foreach ($marques as $value)
		    const fileInput{{ $value->id }} = document.getElementById('imageInput{{ $value->id }}');
		    const imagePreview{{ $value->id }} = document.getElementById('imagePreview{{ $value->id }}');
		    const removeButton{{ $value->id }} = document.getElementById('removeButton{{ $value->id }}');

		    fileInput{{ $value->id }}.addEventListener('change', function(event) {
		        const file = event.target.files[0];
		        if (file) {
		            const reader = new FileReader();
		            reader.onload = function(e) {
		                imagePreview{{ $value->id }}.src = e.target.result;
		                removeButton{{ $value->id }}.style.display = 'block';
		                fileInput{{ $value->id }}.style.display = 'none';
		            }
		            reader.readAsDataURL(file);
		        }
		    });

		    removeButton{{ $value->id }}.addEventListener('click', function() {
		        imagePreview{{ $value->id }}.src = ''; // Réinitialiser l'image
		        fileInput{{ $value->id }}.value = ''; // Réinitialiser l'input file
		        removeButton{{ $value->id }}.style.display = 'none'; // Masquer le bouton
		        fileInput{{ $value->id }}.style.display = 'block'; // Réafficher l'input file
		    });

		    // Masquer le bouton au début
		    removeButton{{ $value->id }}.style.display = 'none';
	    @endforeach
	});
</script>

<script src="{{asset('assets/js/app/js/bord/marque/form.js') }}"></script>
<script src="{{asset('assets/js/app/js/bord/marque/delete_select_verf.js') }}"></script>
<script src="{{asset('assets/js/app/js/bord/marque/select_all.js') }}"></script>
<script src="{{asset('assets/js/app/js/bord/marque/download_image_marque_vehicule.js') }}"></script>

@endsection