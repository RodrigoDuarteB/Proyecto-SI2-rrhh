@extends("layouts.app")

@section('title', 'Orders')


@section('content')

    <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control"
            placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
    <a class="btn btn-primary mb-3 float-right" type="button" href="{{ route('orders.create') }}">Nueva Orden de
        Trabajo</a>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h2>Ordenes de Trabajo</h2>
    <div class="table-responsive ">
        <table class="table table-bordered table table-hover table-striped table-bordered" style="width:100%">


            <thead class="bill-header cs">
                <tr>
                    <th id="trs-hd">ID Orden</th>
                    <th id="trs-hd">Encargado de la Orden</th>
                    <th id="trs-hd">Titulo</th>
                    <th id="trs-hd">Personal Asignado</th>
                    <th id="trs-hd">Fecha de Creación</th>
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

                    @foreach ($orders as $order)
                    @foreach ($order->employees as $employees)
                        
                    

                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->employee->last_name }} {{ $order->employee->name }}</td>
                            <td>{{ $order->title }}</td>
                            <td>{{ $employees->employee->last_name}} {{ $employees->employee->name}}</td>
                            <td>{{ $order->datetime }}</td>
                            @if ($employees->acomplished == true)
                            <td>Completada</td>
                            @else
                            <td>En Proceso</td>
                            @endif
                            <td><button class="btn btn-success" style="margin-left: 5px;" type="submit"><i
                                        class="fa fa-check" style="font-size: 15px;"></i></button><button
                                    class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash"
                                        style="font-size: 15px;"></i></button></td>
                        </tr>
                        @endforeach
                        @endforeach
            </tbody>


            @endif
        </table>
    </div>


@endsection
