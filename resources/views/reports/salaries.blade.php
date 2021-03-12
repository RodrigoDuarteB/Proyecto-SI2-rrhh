@extends('layouts.app')
@section('title', 'Reportes de Planilla de Sueldos')
@section('content')
    <h1>Listado General de Planilla de Sueldos</h1>
    <div class="table-responsive table-bordered table table-hover table-bordered results">
        @if(count($employees) >= 1)
            <div class="card" style="font-size: 20px; font-weight: bold">
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center" id="employees">
                        <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd">id</th>
                            <th id="trs-hd">Nombre Completo de Empleado</th>
                            <th id="trs-hd">Cargo</th>
                            <th id="trs-hd">Departamento</th>
                            <th id="trs-hd">Salario Base</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            @php
                                $currentContract = $employee->currentContract();
                            @endphp
                            @if($employee->currentContract() != null)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->name.' '.$employee->last_name }}</td>
                                    <td>{{ $currentContract->job->name }}</td>
                                    <td>{{ $currentContract->job->department->name }}</td>
                                    <td>{{ $currentContract->job->base_salary }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <x-alert>
                <x-slot name="message">
                    No hay empleados registrados aún
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
