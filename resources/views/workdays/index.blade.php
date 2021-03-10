@extends('layouts.app')

@section('content')
    <div class="form-group pull-right col-lg-4">
        <input type="text" class="search form-control" placeholder="Busque escribiendo aquí..."></div>
        <span class="counter pull-right"></span>
        <h2>Asistencias</h2>
        <a class="btn btn-primary" type="button" href="{{ route('workdays.create') }}">Agregar Asistencia</a>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            <table class="table table-bordered table-hover">
                <thead class="bill-header cs">
                <tr>
                    <th id="trs-hd">ID</th>
                    <th id="trs-hd">Fecha</th>
                    <th id="trs-hd">Entrada</th>
                    <th id="trs-hd">Salida</th>
                    <th id="trs-hd">Latitud</th>
                    <th id="trs-hd">Longitud</th>
                    <th id="trs-hd">Estado</th>
                    <th id="trs-hd">ID Empleado</th>
                    <th class="text-right">
                        Acciones
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="warning no-result">
                    <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                </tr>

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
@endsection

