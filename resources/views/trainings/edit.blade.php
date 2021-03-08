@extends('layouts.app')
    @section('content')
    <div class="container-fluid">
                <div class="col" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-center text-primary m-0 font-weight-bold">Editar Evento</p>
                        </div>
                        <div class="card-body">
                            <div class="form-group" style="margin-left: 12px;"><label for="first_name"><strong>Nombre del Evento:</strong><br></label><input type="text" name="title" value="titulo del evento" style="margin-left: 25px;" disabled=""></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-2" style="margin-left: 11px;"><label class="col-form-label" for="last_name"><strong>Tipo de Evento:</strong><br></label></div>
                                    <div class="col-xl-4"><select class="form-control" id="exampleSelect-2" style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;min-width: 0px|;width: 227px;"><option value="">Seleccione un tipo</option><option value="Tipo1">Tipo1</option><option value="Tipo2">Tipo2</option></select></div>
                                </div>
                            </div>
                            <div class="col-xl-10 offset-xl-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group"><label><strong>Hora de Inicio :</strong><br></label><input type="text" name="clock_in" value="hora de inicio" style="margin-left: 25px;"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label><strong>Hora Fin :</strong><br></label><input type="text" name="clock_out" value="hora final" style="margin-left: 25px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-10 offset-xl-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group"><label><strong>Fecha de Inicio :</strong><br></label><input type="date" name="date_start" style="margin-left: 20px;"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label><strong>Fecha Fin :</strong><br></label><input type="date" name="date_end" style="margin-left: 20px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center h-100" style="margin-top: 13px;">
                                <div class="col-sm-8 align-self-center text-center"><button class="btn btn-success" type="submit" style="margin-right: 77px;">Guardar</button><button class="btn btn-danger" type="button">Cancelar</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
