@extends('layouts.app')

@section('content')
    <div class="form-group pull-right col-lg-4">
        <input type="text" class="search form-control" placeholder="Busque escribiendo aquí..."></div>
        <span class="counter pull-right"></span>
        <h2>Postulantes</h2>
        <a class="btn btn-primary" type="button" href="{{ route('applicants.create') }}">Agregar Postulante</a>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            <table class="table table-bordered table-hover">
                <thead class="bill-header cs">
                <tr>
                    <th id="trs-hd">ID</th>
                    <th id="trs-hd">Nombres</th>
                    <th id="trs-hd">Apellidos</th>
                    <th id="trs-hd">Teléfono</th>
                    <th id="trs-hd">Email</th>
                    <th id="trs-hd">Cargo</th>
                    <th id="trs-hd">Grado Académico</th>
                    <th id="trs-hd">Carrera</th>
                    <th id="trs-hd">CV</th>
                    <th id="trs-hd">Valor</th>
                    <th id="trs-hd">Estado</th>
                    <th class="text-right">
                        Acciones
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="warning no-result">
                    <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                </tr>

                @foreach($applicants as $key => $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->applicantName}}</td>
                        <td>{{$data->last_name}}</td>
                        <td>{{$data->personal_phone}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->jobName}}</td>
                        <td>{{$data->academic_degree}}</td>
                        <td>{{$data->career}}</td>
                        <td>{{$data->resume_file}}</td>
                        <td>{{$data->value}}</td>
                        <td>{{$data->status}}</td>
                        <td class="td-actions">
                            <div class="row justify-content-end">
                                <div class="p-2">
                                <a rel="tooltip" class="btn btn-sm btn-primary btn-link" href="{{url('applicants/'.$data->id.'/edit')}}">
                                    <i class="tim-icons icon-pencil"></i>
                                </a>
                                </div>
                                <div class="p-2">
                                <form action="{{url('applicants/'.$data->id)}}" method="post">
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

