@extends('layouts.app')
@section('title', 'Reportes de Contratos')
@section('content')
    <h1>Listado General de Contratos</h1>
    <div class="table-responsive table-bordered table table-hover table-bordered results">
        @if(count($contracts) >= 1)
            <div class="card" style="font-size: 20px; font-weight: bold">
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center" id="employees">
                        <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd">id</th>
                            <th id="trs-hd">Nombre Completo de Empleado</th>
                            <th id="trs-hd">Titulo del Contrato</th>
                            <th id="trs-hd">Fecha Inicio - Fecha Fin</th>
                            <th id="trs-hd">Cargo - Planificación - Horario</th>
                            <th id="trs-hd">Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contracts as $contract)
                            <tr>
                                <td>{{ $contract->id }}</td>
                                @php
                                    $employee = $contract->employee;
                                @endphp
                                <td>{{ $employee->name.' '.$employee->last_name }}</td>
                                <td>{{ $contract->name }}</td>
                                <td>{{ $contract->initial_date.' - '.$contract->final_date }}</td>
                                <td>
                                    <ul>
                                        <li>{{ $contract->job->name }}</li>
                                        <li>{{ $contract->planning->name }}</li>
                                        @php
                                            $schedule = $contract->planning->schedule;
                                        @endphp
                                        <li>{{ $schedule->clock_in.' - '.$schedule->clock_out }}</li>
                                    </ul>
                                </td>
                                <td>
                                    @switch($contract->status)
                                        @case(1)
                                            Activo
                                        @break
                                        @case(2)
                                            Vencido
                                        @break
                                        @case(3)
                                            Cancelado
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
                    No hay contratos registrados aún
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
