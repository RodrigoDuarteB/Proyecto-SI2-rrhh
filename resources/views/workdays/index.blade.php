@extends('layouts.app')

 @section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Lista de Asistencia</h4>
                    <p class="card-category">Esta es la lista de asistencia de los empleados.</p>
                </div>
                <div class="card-body">
                    @if (session('Mensaje'))
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('Mensaje') }}</span>
                        </div>
                    </div>
                    </div>
                    @endif
                    <div class="table-responsive">
                    <div class="col-12 text-right">
                        <a href="{{url('workdays/create')}}" class="btn btn-sm btn-primary">Agregar Asistencia</a>
                    </div>
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            ID
                        </th>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Entrada
                        </th>
                        <th>
                            Salida
                        </th>
                        <th>
                            Latitud
                        </th>
                        <th>
                            Longitud
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            ID Empleado
                        </th>
                        <th class="text-right">
                            Acciones
                        </th>
                        </thead>
                        <tbody>
                        @foreach($workdays as $key => $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->date}}</td>
                                <td>{{$data->clock_in}}</td>
                                <td>{{$data->clock_out}}</td>
                                <td>{{$data->latitude}}</td>
                                <td>{{$data->longitude}}</td>
                                <td>{{$data->status}}</td>
                                <td>{{$data->employee_id}}</td>

                                <td class="td-actions">
                                    <div class="row justify-content-end">
                                        <div class="p-2">
                                        <a rel="tooltip" class="btn btn-sm btn-primary btn-link" href="{{url('workdays/'.$data->id.'/edit')}}">
                                            <i class="tim-icons icon-pencil"></i>
                                        </a>
                                        </div>
                                        <div class="p-2">
                                        <form action="{{url('workdays/'.$data->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm  btn-primary btn-link" onclick="return confirm('¿Desea realmente eliminar esta información?')">
                                            <i class="tim-icons icon-trash-simple"></i>
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection

