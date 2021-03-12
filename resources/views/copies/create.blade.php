@extends('layouts.app')

@section('content')
    <h3 class="text-dark mb-4">Agregar Asistencia</h3>
    <p class="card-category">Ingrese los datos correspondientes</p>
    <div class="row mb-3">
        <div class="col-lg-3">
            <div class="card shadow mb-4"></div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Asistencia</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('workdays')}}" method="post">
                                {{ csrf_field() }}
                                <div>
                                    <a class="btn btn-primary btn-lg" role="button"
                                        data-toggle="modal" href="#myModal">
                                        Marcar
                                        @if ($registered == false)
                                            {{ 'Entrada' }}
                                        @else
                                            {{ 'Salida' }}
                                        @endif
                                    </a>
                                <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Asistencia</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center text-muted">¿Está seguro de marcar asistencia?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light" data-dismiss="modal" type="button">Cerrar</button>
                                                <button class="btn btn-primary" type="submit">Marcar</button>
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
    </div>
    <div class="card shadow mb-5"></div>

@endsection
