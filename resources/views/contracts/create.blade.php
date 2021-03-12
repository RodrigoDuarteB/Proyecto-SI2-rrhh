@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-1" style="padding-bottom: 17px;"><strong>Contratos</strong><br></h3>
    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Crear Contrato</p>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <div class="form-group" style="margin-bottom: 30px;"><label><strong>Nombre
                                :</strong><br></label><input type="text" name="name" value="name"
                            style="margin-left: 25px;width: 290px;"></div>
                    <div class="form-group" style="margin-top: 33px;margin-bottom: 46px;"><label><strong>Descripción
                                :</strong><br></label><textarea style="margin-bottom: -35px;margin-left: 10px;"
                            name="description"></textarea></div>
                </div>
                <div class="col">
                    <div class="form-group"><label><strong>ID Empleado:</strong><br></label><input type="text"
                            name="id_employee" value="id" style="margin-left: 25px;"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><label><strong>Fecha Inicio :</strong><br></label><input type="date"
                            name="date_start" style="margin-left: 20px;"></div>
                    <div class="form-group"><label for="last_name"><strong>Cargo :</strong><br></label><select
                            class="form-control" id="exampleSelect-2" style="min-width: 0px|;width: 50%;">
                            <option value="">Tipo1</option>
                            <option value="">Tipo2</option>
                            <option value="">Tipo3</option>
                        </select></div>
                    <div class="form-group"><label for="last_name"><strong>Planificación Laboral
                                :</strong><br></label><select class="form-control" id="exampleSelect-3"
                            style="min-width: 0px|;width: 50%;">
                            <option value="">Tipo1</option>
                            <option value="">Tipo2</option>
                            <option value="">Tipo3</option>
                        </select></div>
                </div>
                <div class="col">
                    <div class="form-group"><label><strong>Fecha Final :</strong><br></label><input type="date"
                            name="date_end" style="margin-left: 20px;"></div>
                    <div class="form-group"><label for="last_name"><strong>Departamento :</strong><br></label><select
                            class="form-control" id="exampleSelect-1" style="min-width: 0px|;width: 50%;">
                            <option value="">Tipo1</option>
                            <option value="">Tipo2</option>
                            <option value="">Tipo3</option>
                        </select></div>
                    <div class="form-group"><label for="last_name"><strong>Horario :</strong><br></label><select
                            class="form-control" id="exampleSelect-4" style="min-width: 0px|;width: 50%;">
                            <option value="">Tipo1</option>
                            <option value="">Tipo2</option>
                            <option value="">Tipo3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center h-100" style="margin-top: 13px;padding-top: 40px;">
                <div class="col-sm-8 align-self-center text-center"><button class="btn btn-success" type="submit"
                        style="margin-right: 77px;width: 95px;">Crear</button><a class="btn btn-danger" role="button"
                        href="#">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
