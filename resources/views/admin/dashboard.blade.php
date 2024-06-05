@extends('layouts.admin')

@section('content')
<h2 class="page-title">Dashboard</h2>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default panel-equal-height">
                    <div class="panel-body bk-primary text-light">
                        <div class="stat-panel text-center">
                            <div class="stat-panel-number h1 "></div>
                            <div class="stat-panel-number h1 ">Utilisateurs inscrits</div>
                            <div class="stat-panel-title text-uppercase">Afficher tous les utilisateurs</div>
                        </div>
                    </div>
                    <a href="{{ route('registered.users') }}" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default panel-equal-height">
                    <div class="panel-body bk-success text-light">
                        <div class="stat-panel text-center">
                            <div class="stat-panel-number h1 ">Listed Vehicles</div>
                            <div class="stat-panel-title text-uppercase">Afficher tous les Vehicles</div>
                        </div>
                    </div>
                    <a href="{{ route('allcars') }}" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default panel-equal-height">
                    <div class="panel-body bk-warning text-light">
                        <div class="stat-panel text-center">
                            <div class="stat-panel-number h1 ">Réservation</div>
                            <div class="stat-panel-title text-uppercase">Afficher  tous les réservations</div>
                        </div>
                    </div>
                    <a href="{{ route('reservations') }}" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
