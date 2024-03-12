@extends('layouts.app')

@section('styles')
    <style>
        .data-card {
            height: 100px;
            width: 200px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div id="form-space">
            <h3 class="text-dark mb-4">Welcome {{ ucfirst($user->name) }}..!</h3>
            <div class="row d-flex justify-content-evenly">
                <div class="card shadow border-start-primary py-2 data-card m-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-primary fw-bold  mb-1">
                                    <span>Projects</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>{{ sizeof($projects) }}</span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-file-contract fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-start-primary py-2 data-card m-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-primary fw-bold  mb-1">
                                    <span>Vendors</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>{{ sizeof($vendors) }}</span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-start-primary py-2 data-card m-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-primary fw-bold  mb-1">
                                    <span>Users</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>{{ sizeof($users) }}</span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-start-primary py-2 data-card m-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-primary fw-bold  mb-1">
                                    <span>Verticals</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>{{ sizeof($verticals) }}</span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-start-primary py-2 data-card m-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-primary fw-bold  mb-1">
                                    <span>Districts</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>{{ $ud }}</span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
