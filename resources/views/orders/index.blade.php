@extends("layouts.app")
@section('title', 'Orders')
    @section('content')
        @php
            $user = auth()->user();
        @endphp
    @include('layouts.session-messages')
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if($user->employee != null)
            <h1>Mis Órdenes de Trabajo</h1>
            <div class="table-responsive">
                <table id="self-orders" class="table table-bordered table-hover" style="width:100%">
                    <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd">ID Orden</th>
                        <th id="trs-hd">Encargado de la Orden</th>
                        <th id="trs-hd">Titulo</th>
                        <th id="trs-hd">Personal Asignado</th>
                        <th id="trs-hd">Fecha Creada</th>
                        <th id="trs-hd">Fecha Asignada</th>
                        <th id="trs-hd">Estado</th>
                        <th id="trs-hd">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($user->employee->orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->employee->last_name }} {{ $order->employee->name }}</td>
                                <td>{{ $order->title }}</td>
                                <td>
                                    <ol>
                                        @foreach ($order->employees as $employees)
                                            <li>{{ $employees->employee->last_name }}
                                                {{ $employees->employee->name }}</li>
                                        @endforeach
                                    </ol>
                                </td>
                                <td>{{ $order->datetime }}</td>
                                <td>
                                    <ol>
                                        @foreach ($order->employees as $employees)
                                            <li>{{ $employees->datetime }}</li>
                                        @endforeach
                                    </ol>
                                </td>
                                @if ($employees->acomplished == true)
                                    <td>Completada</td>
                                @else
                                    <td>No Completada</td>
                                @endif
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-primary" style="margin-left: 5px;"
                                           href="/orders/{{ $order->id }}"><i class="fa fa-eye"
                                                                              style="font-size: 15px;"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            Aun no tienes Ordenes
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
        @canany(['Listar Ordenes', 'Crear Ordenes', 'Editar Ordenes', 'Eliminar Ordenes'])
            <div class="x_panel mt-5">
                @can('Crear Ordenes')
                    <a class="btn btn-primary mb-3 float-right" type="button" href="{{ route('orders.create') }}">
                        Nueva Orden de Trabajo</a>
                @endcan
                <h2>Ordenes de Trabajo</h2>
                <div class="table-responsive">
                    <table id="orders" class="table table-bordered table-hover" style="width:100%">
                        <thead class="bill-header cs">
                            <tr>
                                <th id="trs-hd">ID Orden</th>
                                <th id="trs-hd">Encargado de la Orden</th>
                                <th id="trs-hd">Titulo</th>
                                <th id="trs-hd">Personal Asignado</th>
                                <th id="trs-hd">Fecha Creada</th>
                                <th id="trs-hd">Fecha Asignada</th>
                                <th id="trs-hd">Estado</th>
                                @canany(['Listar Ordenes', 'Editar Ordenes', 'Eliminar Ordenes'])
                                    <th id="trs-hd">Acciones</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders == '[]')
                                <tr>
                                    <td> aún no se ha registrado ninguna Orden de Trabajo</td>
                                </tr>
                            @else
                                @foreach ($orders as $order)
                                    @if ($order->employees == '[]')
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->employee->last_name }} {{ $order->employee->name }}</td>
                                            <td>{{ $order->title }}</td>
                                            <td>Sin Asignar</td>
                                            <td>{{ $order->datetime }}</td>
                                            <td>Aún sin Asignar</td>
                                            <td>En Proceso</td>
                                            <td>
                                                <div class="text-center">
                                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                        <a href="/orders/{{ $order->id }}/edit" class="btn btn-success"
                                                            style="margin-left: 5px;" type="submit"><i class="fa fa-pencil"
                                                                style="font-size: 15px;"></i></a>
                                                        <a class="btn btn-primary" style="margin-left: 5px;"
                                                            href="/orders/{{ $order->id }}"><i class="fa fa-eye"
                                                                style="font-size: 15px;"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i
                                                                class="fa fa-trash" style="font-size: 15px;"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->employee->last_name }} {{ $order->employee->name }}</td>
                                            <td>{{ $order->title }}</td>
                                            <td>
                                                <ol>
                                                    @foreach ($order->employees as $employees)
                                                        <li>{{ $employees->employee->last_name }}
                                                            {{ $employees->employee->name }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                            <td>{{ $order->datetime }}</td>

                                            <td>
                                                <ol>
                                                    @foreach ($order->employees as $employees)
                                                        <li>{{ $employees->datetime }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                            @if ($employees->acomplished == true)
                                                <td>Completada</td>
                                            @else
                                                <td>No Completada</td>
                                            @endif
                                            <td>
                                                <div class="text-center">
                                                    <form class="form-horizontal form-label-left"
                                                        action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                        @can('Editar Ordenes')
                                                            <a href="/orders/{{ $order->id }}/edit"
                                                               class="btn btn-success"
                                                               style="margin-left: 5px;" type="submit">
                                                                <i class="fa fa-pencil"
                                                                   style="font-size: 15px;"></i></a>
                                                        @endcan
                                                        <a class="btn btn-primary" style="margin-left: 5px;"
                                                            href="/orders/{{ $order->id }}"><i class="fa fa-eye"
                                                                style="font-size: 15px;"></i>
                                                        </a>

                                                        @csrf
                                                        @method('DELETE')
                                                            @can('Eliminar Ordenes')
                                                        <button class="btn btn-danger"
                                                                style="margin-left: 5px;" type="submit">
                                                            <i class="fa fa-trash"
                                                               style="font-size: 15px;"></i></button>
                                                            @endcan
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>

            </div>
        @endcanany

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

            $('#self-orders').DataTable({
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
