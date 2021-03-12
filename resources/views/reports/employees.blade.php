@extends('layouts.app')
@section('title', 'Reportes del Personal')
    @section('content')
        <h1>Listado General de Empleados</h1>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            @if(count($employees) >= 1)
                <div class="card" style="font-size: 20px; font-weight: bold">
                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center" id="employees">
                            <thead class="bill-header cs">
                            <tr>
                                <th id="trs-hd">id</th>
                                <th id="trs-hd">Nombre Completo</th>
                                <th id="trs-hd">Telefono de Trabajo</th>
                                <th id="trs-hd">CI</th>
                                <th id="trs-hd">Nacionalidad</th>
                                <th id="trs-hd">Sexo</th>
                                <th id="trs-hd">Fecha de Ingreso</th>
                                <th id="trs-hd">Tiempo Trabajando</th>
                                <th id="trs-hd">Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->name.' '.$employee->last_name }}</td>
                                    <td>{{ $employee->work_phone }}</td>
                                    <td>{{ $employee->ID_number }}</td>
                                    <td>{{ $employee->nationality }}</td>
                                    <td>{{ $employee->sex }}</td>
                                    <td>{{ $employee->created_at }}</td>
                                    <td>{{ \Carbon\Carbon::createFromDate($employee->created_at, 'America/La_Paz')->diffForHumans() }}</td>
                                    <td>
                                        @switch($employee->status)
                                            @case(1)
                                                Activo
                                            @break
                                            @case(2)
                                                Vacaciones
                                            @break
                                            @case(3)
                                                Despedido
                                            @break
                                            @case(4)
                                                Penalizado
                                            @break
                                            @default
                                                Activo
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <x-alert>
                    <x-slot name="message">
                        No hay Empleados registrados aún
                    </x-slot>
                </x-alert>
            @endif
        </div>
    @endsection
    @section('other-scripts')
        <script>
            $('#employees').DataTable({
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
                },
                dom: 'Bfrt',
                buttons: [
                    'excel', 'pdf'
                ]
            });
        </script>
    @endsection
