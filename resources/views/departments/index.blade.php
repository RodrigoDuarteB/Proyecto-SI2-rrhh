@extends("layouts.app")

@section('title', 'Orders')


@section('content')
@include('layouts.session-messages')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <div class="x_panel mt-5">



        <a class="btn btn-primary mb-3 float-right" type="button" href="{{ route('departments.create') }}">Nuevo
            Departamento</a>

        <h2>Departamentos</h2>
        <div class="table-responsive ">
            <table id="departments" class="table table-bordered table table-hover table-striped table-bordered"
                style="width:100%">


                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd">ID</th>
                        <th id="trs-hd">Departamento</th>

                        <th id="trs-hd">Departamento Padre</th>
                        <th id="trs-hd">sub-Departamentos</th>
                        <th id="trs-hd">Jede de Departamento</th>

                        <th id="trs-hd">Acciones</th>
                    </tr>

                </thead>


                <tbody>
                    @if ($departments == '[]')

                        <tr>
                            <td> aún no se ha registrado ningun Departamento</td>
                        </tr>

                    @else


                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->name }}</td>

                                @if ($department->parent_id == null)
                                    <td>No tiene departamento Padre</td>
                                @else
                                    <td>{{ $department->parent->name }}</td>
                                @endif

                                @if ($department->subDepartments == '[]')
                                    <td>No tiene Sub-departamento</td>
                                @else
                                    <td>

                                        <ol>
                                            @foreach ($department->subDepartments as $subDepartment)
                                                <li>{{ $subDepartment->name }}</li>
                                            @endforeach
                                        </ol>

                                    </td>
                                @endif





                                @if ($department->employee_id == null)

                                    <td>Aun no se ha asignado</td>

                                @else

                                    <td>{{ $department->manager->last_name }} {{ $department->manager->name }}</td>
                                @endif

                                <td>
                                    <div class="text-center">
                                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                                            <a href="/departments/{{ $department->id }}/edit" class="btn btn-success"
                                                style="margin-left: 5px;" type="submit"><i class="fa fa-pencil"
                                                    style="font-size: 15px;"></i></a>
                                            <a class="btn btn-primary" style="margin-left: 5px;"
                                                href="/departments/{{ $department->id }}"><i class="fa fa-eye"
                                                    style="font-size: 15px;"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i
                                                    class="fa fa-trash" style="font-size: 15px;"></i></button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection
@section('other-scripts')
    <script>
        $('#departments').DataTable({
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
