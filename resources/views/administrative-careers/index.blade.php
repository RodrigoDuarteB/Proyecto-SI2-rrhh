@extends('layouts.app')
    @section('content')
        <h1>Carreras Administrativas</h1>
        @include('layouts.session-messages')
        <div class="container table-responsive table-bordered table table-hover table-bordered results">
            @if(count($employees) >= 1)
                <div class="card" style="font-size: 20px">
                    <div class="card-body" style="font-weight: bold">
                        <table class="table table-bordered table-hover text-center" id="careers">
                            <thead class="bill-header cs">
                            <tr>
                                <th id="trs-hd">Empleado - Id</th>
                                <th id="trs-hd">Contrato Actual</th>
                                <th id="trs-hd">Ver Carrera Administrativa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    @php
                                        $name = $employee->name.' '.$employee->last_name;
                                        //$contract = $employee->currentContract;
                                    @endphp
                                    <td>{{ $name.' - '.$employee->id }}</td>
                                    <td>
                                        @php
                                            $contract = $employee->currentContract()
                                        @endphp
                                        @if($contract != null)
                                            <ul>
                                                <li>{{ $contract->name }}</li>
                                                <li>{{ $contract->job->name }}</li>
                                                <li>{{ $contract->planning->name }}</li>
                                                <li>{{ $contract->planning->schedule->name }}</li>
                                            </ul>
                                        @else
                                            Sin contrato
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" type="button" href="{{ route('administrative-careers.show', $employee) }}">Ver Carrera</a>
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
            $('#careers').DataTable({
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
                    }
                },
                dom: 'Blfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });
        </script>
    @endsection
