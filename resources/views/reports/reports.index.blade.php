@extends('layouts.app')
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
                    <div class="row justify-content-center"><button
                            class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5" type="submit"
                            style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;">Reportes
                            del Personal</button></div>
                    <div class="row justify-content-center"><button
                            class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5" type="submit"
                            style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;">Reportes
                            de Salarios</button></div>
                    <div class="row justify-content-center"><button
                            class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5" type="submit"
                            style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;">Reportes
                            de Contratos</button></div>
                </div>
                <div class="col">
                    <div class="row justify-content-center"><button
                            class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5" type="submit"
                            style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;">Reportes
                            de los Postulantes</button></div>
                    <div class="row justify-content-center"><button
                            class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5" type="submit"
                            style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;">Reportes
                            de Cargos</button></div>
                    <div class="row justify-content-center"><button
                            class="btn btn-success btn-outline-dark rounded-pill pl-5 pr-5" type="submit"
                            style="margin-right: 0px;color: rgb(255,255,255);margin-bottom: 50px;width: 300px;height: 50px;">Reportes
                            de Ordenes</button></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
