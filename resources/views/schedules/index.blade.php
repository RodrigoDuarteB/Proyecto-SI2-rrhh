@extends("layouts.app")

@section('title', 'Schedules')


@section('content')
    @include('layouts.session-messages')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <div class="x_panel mt-5">



        <a class="btn btn-primary mb-3 float-right" type="button" href="{{ route('schedules.create') }}">Nuevo Horario</a>

        <h2>Horarios</h2>
        <div class="table-responsive">
            <table id="orders" class="table table-bordered table-hover" style="width:100%">


                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd">ID Horario</th>
                        <th id="trs-hd">Nombre de Horario</th>
                        <th id="trs-hd">Hora Entrada</th>
                        <th id="trs-hd">Hora Salida</th>
                        <th id="trs-hd">Acciones</th>
                    </tr>

                </thead>


                <tbody>
                    @if ($schedules == '[]')

                        <tr>
                            <td> aún no se ha registrado ningún Horario de Trabajo</td>
                        </tr>

                    @else


                        @foreach ($schedules as $schedule)



                            <tr>
                                <td>{{ $schedule->id}}</td>
                                <td>{{ $schedule->name}}</td>
                                <td>{{ $schedule->clock_in }}</td>
                                <td>{{ $schedule->clock_out }}</td>
                                <td>
                                    <div class="text-center">
                                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST">
                                            <a href="/schedules/{{ $schedule->id }}/edit" class="btn btn-success"
                                                style="margin-left: 5px;" type="submit"><i class="fa fa-pencil"
                                                    style="font-size: 15px;"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i
                                                    class="fa fa-trash" style="font-size: 15px;"></i></button>
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
@section('other-scripts')
    <script>
        $('#orders').DataTable({
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
