@extends("layouts.app")

@section('title', 'Edit - Orders')


@section('content')



    <h3 class="text-dark mt-3">Crear Nueva Orden de Trabajo</h3>
    <div class="row mt-3">
        <div class="col-md-9 col-sm-6 float-center" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Datos de la Orden de Trabajo</p>
                </div>
                <div class="card-body">
                    <form id="form-solicitud" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{route('orders.update', [$orders->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="col">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="cedula">Título de La Orden
                                    de Trabajo<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="title" name="title" required="required" class="form-control" value="{{$orders->title}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="description">Descripción<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea aria-label="With textarea" type="text" id="description"  name=" description" required="required"
                                        class="form-control">{{$orders->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Asignar Personal
                                    1</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="employee_id_1" id="employee_id_1" class="form-control"
                                        required="required">
                                        @if($orders->employees != '[]' and (count($orders->employees))  >= 1)
                          
                                        <option value="{{$orders->employees[0]->employee->id}}">{{ $orders->employees[0]->employee->last_name }} {{ $orders->employees[0]->employee->name }}</option>
                                        <option value="delete">Eliminar</option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id}}">{{ $employee->last_name }} {{ $employee->name }}</option>
                                            @endforeach
                                        @else
                                            
                                            <option value="0">Sin Asignar</option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id}}">{{ $employee->last_name }} {{ $employee->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Asignar Personal
                                    2</label>
                                <div class="col-md-6 col-sm-6 ">

                                    <script>

                                        $largo = $$orders->employees.lenght;
|
                                        export  $largo;
                                    </script>
                                    <select name="employee_id_2" id="employee_id_2" class="form-control">

                                    @if($orders->employees != '[] ' and  (count($orders->employees)) >= 2)

                                        <option value="{{$orders->employees[1]->employee->id}}">{{ $orders->employees[1]->employee->last_name }} {{ $orders->employees[1]->employee->name }}</option>
                                        <option value="delete">Eliminar</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id}}">{{ $employee->last_name }} {{ $employee->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="0">Sin Asignar</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id}}">{{ $employee->last_name }} {{ $employee->name }}</option>
                                        @endforeach
                                        
                                    @endif
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Asignar Personal
                                    3</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="employee_id_3" id="employee_id_3" class="form-control">
                                        
                                    @if($orders->employees != '[]' and (count($orders->employees)) >= 3)
                                        <option value="{{$orders->employees[2]->employee->id}}">{{ $orders->employees[2]->employee->last_name }} {{ $orders->employees[2]->employee->name }}</option>
                                        <option value="delete">Eliminar</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id}}">{{ $employee->last_name }} {{ $employee->name }}</option>
                                        @endforeach
                                        
                                    @else
                                        <option value="0">Sin Asignar</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id}}">{{ $employee->last_name }} {{ $employee->name }}</option>
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
