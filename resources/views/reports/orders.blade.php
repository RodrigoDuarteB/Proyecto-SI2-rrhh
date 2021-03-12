@extends('layouts.app')
@section('title', 'Reportes de Ordenes')
@section('content')
    <h1>Listado General de Ordenes de Trabajo</h1>
    <div class="table-responsive table-bordered table table-hover table-bordered results">
        @if(count($orders) >= 1)
            <div class="card" style="font-size: 20px; font-weight: bold">
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center" id="employees">
                        <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd">id</th>
                            <th id="trs-hd">Titulo</th>
                            <th id="trs-hd">Descripción</th>
                            <th id="trs-hd">Fecha</th>
                            <th id="trs-hd">Encargado</th>
                            <th id="trs-hd">Empleados Asignados</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->title }}</td>
                                <td>{{ $order->description }}</td>
                                <td>{{ $order->datetime }}</td>
                                @php
                                    $boss = $order->employee;
                                @endphp
                                <td>{{ $boss->name.' '.$boss->last_name }}</td>
                                <td>
                                    @forelse($order->employees as $orderEmployee)
                                        <ul>
                                            <li>{{ $orderEmployee->employee->name.' '.$orderEmployee->employee->last_name }}</li>
                                        </ul>
                                    @empty
                                        No hubo empleados asignados
                                    @endforelse
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
                    No hay ordenes registradas aún
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
