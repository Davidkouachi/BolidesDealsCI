@extends('app')

@section('titre', 'Tableau de bord')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Tableau de Bord
                        </h3>
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card card-full bg-primary">
                            <div class="card-inner">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="fs-6 text-white text-opacity-75 mb-0">
                                        Words Available
                                    </div>
                                </div>
                                <h5 class="fs-1 text-white">
                                    452
                                    <small class="fs-3">
                                        words
                                    </small>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card card-full bg-warning">
                            <div class="card-inner">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="fs-6 text-white text-opacity-75 mb-0">
                                        Words Available
                                    </div>
                                </div>
                                <h5 class="fs-1 text-white">
                                    452
                                    <small class="fs-3">
                                        words
                                    </small>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card card-full bg-danger">
                            <div class="card-inner">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="fs-6 text-white text-opacity-75 mb-0">
                                        Words Available
                                    </div>
                                </div>
                                <h5 class="fs-1 text-white">
                                    452
                                    <small class="fs-3">
                                        words
                                    </small>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="card card-full bg-success">
                            <div class="card-inner">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="fs-6 text-white text-opacity-75 mb-0">
                                        Words Available
                                    </div>
                                </div>
                                <h5 class="fs-1 text-white">
                                    452
                                    <small class="fs-3">
                                        words
                                    </small>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>

@endsection