@extends("layouts.app")

@section('title', 'Orders')


@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <div class="x_panel mt-5">

        <div class="form-group pull-right col-lg-4">
            <input type="text" class="search form-control" placeholder="Search by typing here..">
        </div>
        <span class="counter pull-right"></span>
        <a class="btn btn-primary mb-3 float-right" type="button" href="{{ route('orders.create') }}">Nueva Orden de
            Trabajo</a>

        <h2>Ordenes de Trabajo</h2>
        <div class="table-responsive ">
            <table class="table table-bordered table table-hover table-striped table-bordered" style="width:100%">


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
                    @if ($orders == '[]')
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        <tr>
                            <td> aún no se ha registrado ninguna Orden de Trabajo</td>
                        </tr>

                    @else

                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
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
                                        <td>En Proceso</td>
                                    @endif

                                    <td>
                                        <form class="form-horizontal form-label-left"
                                            action="{{ route('orders.destroy', $order->id) }}" method="POST">
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
                                </tr>





                            @endif



                        @endforeach
                </tbody>


                @endif
            </table>
        </div>

    </div>

@endsection
