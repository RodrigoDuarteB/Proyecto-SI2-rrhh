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
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>
                                                        <strong>{{ 'Fecha: '}}</strong><br>
                                                    </label>

                                                    <input class="form-control" type="date" name="date">
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <strong>{{ 'Entrada: '}}</strong><br>
                                                    </label>
                                                    <input class="form-control" type="time" name="clock_in">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>
                                                        <strong>{{ 'Salida: '}}</strong><br>
                                                    </label>
                                                    <input class="form-control" type="time" name="clock_out">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="latitude">
                                                <strong>{{ 'Latitud: ' }}</strong><br>
                                            </label>
                                            <input class="form-control" type="text" name="latitude" value="" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="longitude">
                                                <strong>{{ 'Longitud: ' }}</strong><br>
                                            </label>
                                            <input class="form-control" type="text" name="longitude" value="" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">
                                                <strong>{{ 'Estado: ' }}</strong><br>
                                            </label>
                                            <select class="form-control form-control" id="status" name="status"
                                                style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 169px;">
                                                <option value="1">Presente</option>
                                                <option value="2">Retrasado</option>
                                                <option value="3">Inasistencia</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="employee_id">
                                                <strong>{{ 'ID Empleado: ' }}</strong><br>
                                            </label>
                                            <input class="form-control" type="text" name="employee_id" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-primary btn-lg" role="button"
                                        data-toggle="modal" href="#myModal">
                                        Guardar
                                    </a>
                                <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Guardar Datos</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center text-muted">¿Está seguro de guardar los datos?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light" data-dismiss="modal" type="button">Cerrar</button>
                                                <button class="btn btn-primary" type="submit">Guardar</button>
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
