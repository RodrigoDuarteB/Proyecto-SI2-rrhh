@extends("layouts.app")

@section('title', 'Create - Cargos')


@section('content')
    @include('layouts.session-messages')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="x_panel mt-5">

        <h3 class="text-dark mt-3">Crear Nuevo Cargo</h3>
        <div class="row mt-3">
            <div class="col-md-9 col-sm-6 float-center" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Datos del Nuevo Cargo</p>
                    </div>
                    <div class="card-body">
                        <form id="form-solicitud" data-parsley-validate class="form-horizontal form-label-left"
                            method="POST" action="/jobs">
                            @csrf

                            <div class="col">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nombre del Cargo
                                        de Trabajo<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="name" name="name" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="description">Descripción del Cargo
                                        de Trabajo<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="description" name="description" required="required"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Salario
                                        Base<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="base_salary" name="base_salary" required="required"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Departmaneto Perteneciente<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                    <select name="department_id" id="department_id" class="form-control" 
                                        onchange="carg2(this);">
                                        <option value="0">Sin Asignar</option>
                                        @foreach ($departments as $department)

                                            <option value="{{ $department->id }}">
                                                {{ $department->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/jobs" class="btn btn-danger" data-dismiss="modal"
                                        type="button">Cancelar</a>
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

            if (d == "0") {
                input.disabled = true;
                input2.disabled = true;
                input.value = '0';
                input2.value = '0';
            } else {
                input.disabled = false;
            }
        }


        function carg2(elemento) {
            d = elemento.value;

            if (d == "0") {
                input2.disabled = true;
                input2.value = '0';
            } else {
                input2.disabled = false;
            }
        }

    </script>
@endsection
