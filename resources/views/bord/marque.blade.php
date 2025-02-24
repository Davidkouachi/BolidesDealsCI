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
			        	<div class="card">
			        		<div class="card-inner">
					        	<ul class="nav nav-tabs nav-tabs-s2">
								    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5"><em class="icon ni ni-file"></em><span>Formulaire</span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tabItem6"><em class="icon ni ni-list"></em><span>Liste</span></a> </li>
								</ul>
								<div class="tab-content">
								    <div class="tab-pane active" id="tabItem5">
								        <div class="card-inner">
						                    <div class="alert alert-fill alert-info alert-dismissible alert-icon">
						                    	<em class="icon ni ni-cross-circle"></em> 
						                    	<strong>Il est préférable de choisir une photo avec un fond transparent ou blanc.</strong>
						                    	<button class="close" data-bs-dismiss="alert"></button>
						                    </div>
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
								    <div class="tab-pane" id="tabItem6">
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

<script src="{{asset('assets/js/app/js/bord/marque/list.js') }}"></script>
<script src="{{asset('assets/js/app/js/bord/marque/form.js') }}"></script>
<script src="{{asset('assets/js/app/js/bord/marque/delete_select_verf.js') }}"></script>
<script src="{{asset('assets/js/app/js/bord/marque/download_image_marque_vehicule.js') }}"></script>

@endsection