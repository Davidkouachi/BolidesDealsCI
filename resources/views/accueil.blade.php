@extends('app')

@section('titre', 'Acceuil')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block nk-block-lg">

                <div class="nk-block ">
                    <div class="row g-gs">
                        <div class="col-lg-12">
                            <div class="card card-preview" >
                                {{-- <div class="card-inner text-center rounded" style="background-image: url('{{ asset('images/logo/arriere/1.jpg') }}');background-repeat: no-repeat; background-position: left; background-position: -50px -240px; background-size: auto;"> --}}
                                    <div class="card-inner text-center rounded">
                                        <img height="200" width="200" src="{{asset('images/logo/logo.png')}}">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block" id="list_type"></div>

            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/app/js/accueil/type.js')}}"></script>

@endsection
