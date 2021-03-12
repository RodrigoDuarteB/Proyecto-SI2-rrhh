@extends("layouts.app")

@section('title', 'Workdays')


@section('content')
    @include('layouts.session-messages')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="x_panel mt-5">
        <a class="btn btn-primary mb-3 float-right" type="button" href="{{ route('workdays.create') }}">Registrar Asistencia</a>
        <h2>Asistencias</h2>
        <div class="table-responsive">
            <table id="tablepro" class="table table-bordered table-hover" style="width:100%">
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
                    @if ($workdays == '[]')
                        <tr>
                            <td> Aún no se ha registrado ningúna asistencia</td>
                        </tr>
                    @else
                        @foreach($workdays as $key => $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->date}}</td>
                            <td>{{$data->clock_in}}</td>
                            <td>{{$data->clock_out}}</td>
                            <td>{{$data->latitude}}</td>
                            <td>{{$data->longitude}}</td>
                            <td>
                                @switch($data->status)
                                    @case(1)
                                        {{ 'Presente' }}
                                        @break
                                    @case(2)
                                        {{ 'Atrasado' }}
                                        @break
                                    @case(3)
                                        {{ 'Falta' }}
                                        @break
                                    @default
                                        {{ 'Sin registrar' }}
                                @endswitch
                            </td>
                            <td>{{ $employee->name }}</td>
                            <td>
                                <div class="text-center">
                                    <form action="{{ route('workdays.destroy', $data->id) }}" method="POST">
                                        <a href="workdays/{{ $data->id }}/edit" class="btn btn-success"
                                            style="margin-left: 5px;" type="submit"><i class="fa fa-pencil"
                                                style="font-size: 15px;"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" style="margin-left: 5px;" type="submit">
                                            <i class="fa fa-trash" style="font-size: 15px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection
@section('table-scripts')
    <script>
        $('#tablepro').DataTable({
            responsive: true,
            autoWidth: false,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "Ningun Resultado - disculpe",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Sin registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior",
                },
            }
        });

    </script>
@endsection
