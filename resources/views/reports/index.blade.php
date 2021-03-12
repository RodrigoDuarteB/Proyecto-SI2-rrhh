@extends('layouts.app')
@section('title', 'Reportes')
    @section('content')
        <div class="container-fluid">
            <h3 class="text-dark mb-1" style="padding-bottom: 17px;"><strong>Reportes</strong><br></h3>
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Selecciona el reporte a generar :</p>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <div class="row justify-content-center">
                                <a class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5"
                                   style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;" href="{{ route('reports.employees') }}">Reportes del Personal
                                </a>
                            </div>
                            <div class="row justify-content-center">
                                <a class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5" style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;"
                                   href="{{ route('reports.salaries') }}">Reportes de Salarios
                                </a>
                            </div>
                            <div class="row justify-content-center">
                                <a class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5" style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;"
                                   href="{{ route('reports.contracts') }}">Reportes de Contratos
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row justify-content-center">
                                <a class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5" style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;"
                                   href="{{ route('reports.applicants') }}">Reportes de Postulantes
                                </a>
                            </div>
                            <div class="row justify-content-center">
                                <a class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5" style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;"
                                   href="{{ route('reports.jobs') }}">Reportes de Cargos
                                </a>
                            </div>
                            <div class="row justify-content-center">
                                <a class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5" style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;"
                                   href="{{ route('reports.orders') }}">Reportes de Ordenes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
