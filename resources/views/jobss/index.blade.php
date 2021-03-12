@extends("layouts.app")

@section('title', 'Jobs')


@section('content')
    @include('layouts.session-messages')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <div class="x_panel mt-5">



        <a class="btn btn-primary mb-3 float-right" type="button" href="{{ route('jobs.create') }}">Nuevo Cargo</a>

        <h2>Cargos</h2>
        <div class="table-responsive">
            <table id="orders" class="table table-bordered table-hover" style="width:100%">


                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd">ID Cargo</th>
                        <th id="trs-hd">Nombre del Cargo</th>
                        <th id="trs-hd">Salario base</th>
                        <th id="trs-hd">Acciones</th>
                    </tr>

                </thead>


                <tbody>
                    @if ($jobs == '[]')

                        <tr>
                            <td> aún no se ha registrado ningún Cargo de Trabajo</td>
                        </tr>

                    @else


                        @foreach ($jobs as $job)



                            <tr>
                                <td>{{ $job->id}}</td>
                                <td>{{ $job->name}}</td>
                                <td>{{ $job->base_salary }}</td>
                                <td>
                                    <div class="text-center">
                                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                                            <a href="/jobs/{{ $job->id }}/edit" class="btn btn-success"
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
