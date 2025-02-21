@extends('app')

@section('titre', 'Suggestions')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Suggestions
                        </h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
			    <div class="card card-preview">
			        <div class="card-inner">
			            <table class="datatable-init table">
			                <thead>
			                    <tr>
			                        <th style="width: 50px;">N°</th>
			                        <th>Nom</th>
			                        <th>Email</th>
			                        <th>lu</th>
			                        <th>Date d'envoi</th>
			                        <th></th>
			                    </tr>
			                </thead>
			                <tbody>
			                	@foreach($suggs as $key => $value)
			                    <tr>
			                        <td class="nk-tb-col" style="width: 50px;">
			                        	{{$key+1}}
			                        </td>
			                        <td class="nk-tb-col">
			                        	{{$value->nom}}

			                        </td>
			                        <td class="nk-tb-col">
			                        	{{$value->email}}
			                        </td>
			                        <td class="nk-tb-col 
				                        @php
				                        	echo $value->lu === 'oui' ? 'text-success' : 'text-danger';
				                        @endphp ">
			                        	{{$value->lu}}
			                        </td>
			                        <td class="nk-tb-col">
			                        	{{ \Carbon\Carbon::parse($value->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}
			                        </td>
			                        <td class="nk-tb-col">
			                            <div class="nk-tb-col-tools">
										    <ul class="nk-tb-actions gx-1 my-n1">
										        <li class="me-n1">
										            <div class="dropdown">
										            	<a class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
										            		<em class="icon ni ni-more-h"></em>
										            	</a>
										                <div class="dropdown-menu dropdown-menu-end">
										                    <ul class="link-list-opt no-bdr">
										                        <li>
										                        	<a data-bs-toggle="modal" data-bs-target="#modalDetail{{$value->id}}" href="#" >
										                        		<em class="icon ni ni-eye"></em>
										                        		<span>Détail</span>
										                        	</a>
										                        </li>
										                    </ul>
										                </div>
										            </div>
										        </li>
										    </ul>
										</div>
			                        </td>
			                    </tr>
			                    @endforeach
			                </tbody>
			            </table>
			        </div>
			    </div>
			</div>
        </div>
    </div>
</div>

@foreach ($suggs as $value)
<div class="modal fade zoom" id="modalDetail{{$value->id}}" aria-modal="true" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-md" role="document" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <div class="gy-3">
				    <div class="row g-1 align-center">
				    	<div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Date d'envoi :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{ \Carbon\Carbon::parse($value->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}
				                    </span>
				                </div>
				            </div>
				        </div>
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
				                        {{$value->nom}}
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
				                        {{$value->email}}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Lu :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal
				                    	@php
			                        		echo $value->lu === 'oui' ? 'text-success' : 'text-danger';
			                        	@endphp
				                    " style="font-size: 14px;">
				                        {{$value->lu}}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-12">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Message :
				                    </label>
				                </div>
				            </div>
				            <div class="col-12">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{ $value->message }}
				                    </span>
				                </div>
				            </div>
				        </div>
				        @if($value->lu === 'non')
				        <div class="col-lg-12 text-center">
				            <a href="{{route('send_sugg', $value->id)}}" class="btn btn-md btn-success" >
                                <span>Bien lu</span>
                                <em class="icon ni ni-send"></em>
                            </a>
				        </div>
				        @endif
				    </div>
				</div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection