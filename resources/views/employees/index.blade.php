@extends('layouts.app')
    @section('content')
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        <h2>Empleados</h2>
        @include('layouts.session-messages')
        @canany(['Gestionar Personal', 'Crear Personal'])
            <a class="btn btn-primary mb-3" type="button"
               href="{{ route('employees.create') }}">Nuevo Empleado</a>
        @endcanany
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            @if(count($employees) >= 1)
                <table class="table table-bordered table-hover">
                    <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd">id</th>
                        <th id="trs-hd">Nombre Completo</th>
                        <th id="trs-hd">Telefono de Trabajo</th>
                        <th id="trs-hd">CI</th>
                        <th id="trs-hd">Nacionalidad</th>
                        <th id="trs-hd">Sexo</th>
                        @canany(['Gestionar Personal', 'Editar Personal', 'Eliminar Personal'])
                            <th id="trs-hd">Acciones</th>
                        @endcanany
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
                            @canany(['Gestionar Personal', 'Editar Personal', 'Eliminar Personal'])
                                <td>
                                    @canany(['Gestionar Personal', 'Editar Personal'])
                                        <a class="btn btn-success" style="margin-left: 5px;" href="{{ route('employees.edit', $employee) }}">
                                            <i class="fa fa-check" style="font-size: 15px;"></i>
                                        </a>
                                    @endcanany
                                    @canany(['Gestionar Personal', 'Eliminar Personal'])
                                        <button class="btn btn-danger" style="margin-left: 5px;" type="submit">
                                            <i class="fa fa-trash" style="font-size: 15px;"></i>
                                        </button>
                                        @endcanany
                                </td>
                            @endcanany
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <x-alert>
                    <x-slot name="message">
                        No hay Empleados registrados aún
                    </x-slot>
                </x-alert>
            @endif
        </div>
    @endsection

