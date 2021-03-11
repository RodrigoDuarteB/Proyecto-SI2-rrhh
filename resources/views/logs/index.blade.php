@extends('layouts.app')
    @section('content')
        <h1>Bitácora</h1>
        @include('layouts.session-messages')
        <div class="container table-responsive table-bordered table table-hover table-bordered results">
            @if(count($logs) >= 1)
                <div class="card" style="font-size: 20px">
                    <div class="card-body" style="font-weight: bold">
                        <table class="table table-bordered table-hover text-center" id="logs">
                            <thead class="bill-header cs">
                            <tr>
                                <th id="trs-hd">id</th>
                                <th id="trs-hd">Usaurio - ID</th>
                                <th id="trs-hd">IP Usuario</th>
                                <th id="trs-hd">Tipo de Acción</th>
                                <th id="trs-hd">Acción</th>
                                <th id="trs-hd">Fecha - Hora</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>{{ $log->user->name.' - '.$log->user->id }}</td>
                                    <td>{{ $log->user_ip }}</td>
                                    <td>
                                        @switch($log->action_type)
                                            @case('1')
                                                <button type="button" class="btn btn-success">REGISTRO</button>
                                            @break
                                            @case('2')
                                                <button type="button" class="btn btn-primary">EDITADO</button>
                                            @break
                                            @case('3')
                                                <button type="button" class="btn btn-danger">ELIMINADO</button>
                                            @break
                                            @case('4')
                                                <button type="button" class="btn btn-info">INGRESO</button>
                                            @break
                                            @case('5')
                                                <button type="button" class="btn btn-secondary">SALIDA</button>
                                            @break
                                            @default
                                                <button type="button" class="btn btn-info">INGRESO</button>
                                        @endswitch
                                    </td>
                                    <td>{{ $log->action }}</td>
                                    <td>{{ $log->datetime }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <x-alert>
                    <x-slot name="message">
                        No hay Bitácoras registradas aún
                    </x-slot>
                </x-alert>
            @endif
        </div>
    @endsection
    @section('other-scripts')
        <script>
            $('#logs').DataTable({
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
