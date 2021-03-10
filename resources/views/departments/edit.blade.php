@extends("layouts.app")

@section('title', 'Create - Orders')


@section('content')

    <h3 class="text-dark mt-3">Modificar Departamento</h3>
    <div class="row mt-3">
        <div class="col-md-9 col-sm-6 float-center" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Datos del Departmaneto</p>
                </div>
                <div class="card-body">
                    <form id="form-solicitud" data-parsley-validate class="form-horizontal form-label-left" action="{{route('departments.update', [$department->id]) }}" method="POST"
                        action="/departments">
                        @csrf
                        @method('PUT')

                        <div class="col">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nombre del
                                    Departamento<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" name="name" value="{{ $department->name }}"
                                        required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" "
                                        for=" description">Descripción<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea aria-label="With textarea"  type=" text"
                                        id="description" name=" description" required="required"
                                        class="form-control">{{ $department->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Asignar Encargado del
                                    Departamento
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="employee_id" id="employee_id" class="form-control" onchange="carg(this);"
                                        >
                                        @if ($department->employee_id == null)
                                            <option value="">Sin Asignar</option>
                                            @foreach ($cargos as $cargo)

                                                <option value="{{ $cargo->id }}">
                                                    {{ $cargo->last_name }} {{ $cargo->name }}
                                                </option>

                                            @endforeach
                                        @else
                                            <option value="{{ $department->manager->id }}">
                                                {{ $department->manager->last_name }} {{ $department->manager->name }}
                                            </option>
                                            <option value="delete">Eliminar</option>
                                            @foreach ($cargos as $cargo)

                                                <option value="{{ $cargo->id }}">
                                                    {{ $cargo->last_name }} {{ $cargo->name }}
                                                </option>

                                            @endforeach
                                            @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Asignar Departamento Padre
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="parent_id" id="parent_id" class="form-control" onchange="carg2(this);">
                                        @if ($department->parent_id == null)
                                            <option value="">Sin Asignar</option>
                                            @foreach ($departments as $deparments)

                                                <option value="{{ $deparments->id }}">
                                                    {{ $deparments->name }}
                                                </option>

                                            @endforeach
                                        @else
                                            <option value="{{ $department->parent->id }}">
                                                {{ $department->parent->name }}</option>
                                            @foreach ($departments as $deparment)
                                            <option value="delete">Eliminar</option>
                                                <option value="{{ $department->id }}">
                                                    {{ $deparment->name }}
                                                </option>

                                            @endforeach

                                        @endif
                                    </select>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <a href="/orders" class="btn btn-danger" data-dismiss="modal" type="button">Cancelar</a>
                               
                                <button class="btn btn-success" type="submit">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
