@extends('layouts.app')
    @section('content')
    <div class="container-fluid">
                <h3 class="text-dark mb-4">Gestionar la Capacitación Interna del Personal</h3>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <div class="row mb-3 d-none">
                            <div class="col">
                                <div class="card text-white bg-primary shadow">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <p class="m-0">Peformance</p>
                                                <p class="m-0"><strong>65.2%</strong></p>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                        </div>
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-white bg-success shadow">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <p class="m-0">Peformance</p>
                                                <p class="m-0"><strong>65.2%</strong></p>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                        </div>
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 search-table-col" style="margin-top: 50px;margin-right: 0px;margin-bottom: 0px;">
                <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Buscar..."></div><span class="counter pull-right"></span><a class="btn btn-success active text-light border rounded border-dark shadow-sm" role="button" href="employees.create.html">Añadir Nuevo Evento</a>
                <div
                    class="table-responsive table-bordered table table-hover table-bordered results">
                    <table class="table table-bordered table-hover">
                        <thead class="bill-header cs">
                            <tr>
                                <th id="trs-hd" class="col-lg-1" style="height: 44px;text-align: center;padding-bottom: 20px;">Nombre de Evento</th>
                                <th id="trs-hd" class="col-lg-2" style="padding-bottom: 20px;">Tipo</th>
                                <th id="trs-hd" class="col-lg-3" style="padding-bottom: 20px;">Hora&nbsp; Inicio</th>
                                <th id="trs-hd" class="col-lg-2" style="padding-bottom: 20px;">Hora Fin</th>
                                <th id="trs-hd-2" class="col-lg-2" style="padding-bottom: 22px;">Fecha Inicio</th>
                                <th id="trs-hd-1" class="col-lg-2" style="padding-bottom: 22px;">Fecha Fin</th>
                                <th id="trs-hd" class="col-lg-2" style="padding-bottom: 20px;">Participantes</th>
                                <th id="trs-hd" class="col-lg-2" style="padding-bottom: 20px;">Notificación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="warning no-result">
                                <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                            </tr>
                            <tr style="color: rgb(67,67,69);">
                                <td>Como Manejar Ventas</td>
                                <td>Taller</td>
                                <td>14:00</td>
                                <td>16:00</td>
                                <td>01/03/2021</td>
                                <td>01/03/2021</td>
                                <td>
                                    <div><a class="btn btn-success btn-sm align-content-center" role="button" data-toggle="modal" href="#myModal" style="margin-left: 17px;"><i class="fa fa-plus"></i></a>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Selecciona a los Participantes</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <p class="text-center text-muted">Grupos</p>
                                                        <div class="form-check"><label><input type="checkbox" value="" checked="">&nbsp;Administración</label></div>
                                                    </div>
                                                    <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Cerrar</button><button class="btn btn-primary" type="button">Guardar</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><a class="btn btn-info" role="button" style="margin-left: 5px;padding: 12px;padding-top: 2px;padding-right: 3px;padding-bottom: 4px;padding-left: 3px;margin-right: 7px;" href="employees.edit.html">Modificar</a></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    @endsection
