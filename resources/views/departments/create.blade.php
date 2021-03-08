@extends("layouts.app")

@section('title', 'Create - Orders')


@section('content')

    <h3 class="text-dark mt-3">Crear Nuevo Departamento</h3>
    <div class="row mt-3">
        <div class="col-md-9 col-sm-6 float-center" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Datos del nuevo Departmaneto</p>
                </div>
                <div class="card-body">
                    <form id="form-solicitud" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="/departments">
                        @csrf

                        <div class="col">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="cedula">Nombre del
                                    Departamento<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" name="name" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="description">Descripción<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea aria-label="With textarea" type="text" id="description" name=" description"
                                        required="required" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Asignar Encargado del
                                    Departamento
                                    </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="employee_id" id="employee_id" class="form-control"
                                        onchange="carg(this);" required="required">
                                        <option value="">Sin Asignar</option>
                                        @foreach ($cargos as $cargo)

                                            <option value="{{ $cargo->id }}">
                                                {{ $cargo->last_name }} {{ $cargo->name }}
                                            </option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Asignar Departamento Padre
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="parent_id" id="parent_id" class="form-control" 
                                        onchange="carg2(this);">
                                        <option value="">Sin Asignar</option>
                                        @foreach ($departments as $deparment)

                                            <option value="{{ $deparment->id }}">
                                                {{ $deparment->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <a href="/orders" class="btn btn-danger" data-dismiss="modal" type="button">Cancelar</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button class="btn btn-success" type="submit">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
@endsection
