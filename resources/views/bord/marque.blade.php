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
			        <div class="col-12">
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
			                    <div class="row g-gs align-items-center justify-content-center">
			                    	<div class="col-lg-4 h-50" >
									    <div class="">
									        <div class="card mb-3" style="display: flex;justify-content: center;align-items: center;border:block; height: 150px;">
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
									        <div class="form-group">
						                        <div class="form-control-wrap text-center">
						                            <label for="imageInput0" class="label_input_file0">Choisir une image</label>
													<input name="image" type="file" id="imageInput0" accept="image/*">
						                        </div>
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
	                                        <div class="col-12 col-sm-6 text-center">
	                                            <button id="reset_form" class="btn btn-mw btn-dim btn-outline-danger btn-white" id="btn_reset">
	                                                <em class="icon ni ni-cross-circle"></em>
	                                                <span>Remise à Zéro</span>
	                                            </button>
	                                        </div>
	                                        <div class="col-12 col-sm-6 text-center">
	                                            <button class="btn btn-mw btn-dim btn-outline-success btn-white " id="btn_eng">
	                                                <span>Sauvgarder</span>
	                                                <em class="icon ni ni-arrow-right-circle"></em>
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
            <div class="nk-block">
			    <div class="card card-preview">
			        <div class="card-inner">
			            <table class="datatable-init table table_marque">
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
			                        <th>Date de mise à jour</th>
			                        <th></th>
			                    </tr>
			                </thead>
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
			        </div>
			    </div>
			</div>
        </div>
    </div>
</div>

@section('btn_lateral')

@endsection


<div class="modal fade xxl" tabindex="-1" id="modalUpdate" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-body modal-body-lg bg-white">
                <div class="row g-gs align-items-center justify-content-center">
                	<div class="col-12 h-50" >
					    <div class="">
					        <div class="mb-3" style="display: flex;justify-content: center;align-items: center;border:block; height: 150px; border-radius: 10px;">
					            <a>
					                <img id="imagePreview_modif" style="object-fit: cover;height: 150px;" class="" src="" />
					            </a>
					        </div>
					        <div class="form-group">
		                        <div class="form-control-wrap text-center">
		                            <label for="imageInput0_modif" class="label_input_file0_modif">Choisir une image</label>
									<input type="file" id="imageInput0_modif" accept="image/*">
		                        </div>
		                    </div>
					    </div>
					</div>
                    <div class="col-12" >
	                    <div class="form-group">
	                        <div class="form-control-wrap">
	                        	<input type="hidden" id="id_marque">
	                            <input name="marque" class="form-control" required type="text" oninput="this.value = this.value.toUpperCase()" placeholder="Entrer la Marque" id="marque_modif" />
	                        </div>
	                    </div>
                    </div>
                    <div class="col-12" >
                        <div class="form-group row g-gs">
                            <div class="col-12 text-center">
                                <button class="btn btn-mw btn-dim btn-outline-success btn-white " id="btn_modif">
                                    <span>Sauvgarder</span>
                                    <em class="icon ni ni-arrow-right-circle"></em>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade zoom" id="modalImage">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        {{-- <div class="modal-content bg-transparent"> --}}
            <div class="modal-body text-center">
                <img src="" class="img-fluid modal_img_view" style="max-width: 100%; height: auto;">
            </div>
        {{-- </div> --}}
    </div>
</div>

<script src="{{asset('assets/js/app/js/bord/marque/list.js') }}"></script>
<script src="{{asset('assets/js/app/js/bord/marque/form.js') }}"></script>
<script src="{{asset('assets/js/app/js/bord/marque/delete_select_verf.js') }}"></script>
<script src="{{asset('assets/js/app/js/bord/marque/download_image_marque_vehicule.js') }}"></script>

@endsection