@extends("layouts.app")

@section('title', 'Create - Schedules')


@section('content')
@include('layouts.session-messages')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<div class="x_panel mt-5"> 

    <h3 class="text-dark mt-3">Crear Nuevo Horario</h3>
    <div class="row mt-3">
        <div class="col-md-9 col-sm-6 float-center" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Datos del Nuevo Horario</p>
                </div>
                <div class="card-body">
                    <form id="form-solicitud" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="/schedules">
                        @csrf

                        <div class="col">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="cedula">Nombre del Horario
                                    de Trabajo<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" name="name" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="description">Hora de Entrada<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="time" id="clock_in" name="clock_in" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="description">Hora de Salida<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="time" id="clock_out" name="clock_out" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="/schedules" class="btn btn-danger" data-dismiss="modal" type="button">Cancelar</a>
                                <button class="btn btn-success" type="reset">Reset</button>
                                <button class="btn btn-primary" type="submit">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        

    
    var input = document.getElementById('employee_id_2');
    var input2 = document.getElementById('employee_id_3');

    function carg(elemento) {
    d = elemento.value;

    if(d == "0"){
    input.disabled = true;
    input2.disabled = true;
    input.value = '0';
    input2.value = '0';
    }else{
    input.disabled = false;
    }}


    function carg2(elemento) {
    d = elemento.value;

    if(d == "0"){
    input2.disabled = true;
    input2.value = '0';
    }else{
    input2.disabled = false;
    }}

    </script>
@endsection
