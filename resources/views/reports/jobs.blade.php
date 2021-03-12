@extends('layouts.app')
@section('title', 'Reportes de Cargos')
@section('content')
    <h1>Listado General de Cargos</h1>
    <div class="table-responsive table-bordered table table-hover table-bordered results">
        @if(count($jobs) >= 1)
            <div class="card" style="font-size: 20px; font-weight: bold">
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center" id="employees">
                        <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd">id</th>
                            <th id="trs-hd">Nombre</th>
                            <th id="trs-hd">Descripción</th>
                            <th id="trs-hd">Salario Base</th>
                            <th id="trs-hd">Empleados con el Cargo</th>
                            <th id="trs-hd">Postulantes aspirantes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $job->id }}</td>
                                <td>{{ $job->name }}</td>
                                <td>{{ $job->description }}</td>
                                <td>{{ $job->base_salary }}</td>
                                <td>{{ count($job->contracts) }}</td>
                                <td>{{ count($job->applicants) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <x-alert>
                <x-slot name="message">
                    No hay cargos registrados aún
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
