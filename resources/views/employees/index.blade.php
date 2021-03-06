@extends('layouts.app')
    @section('content')
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        <h2>Empleados</h2>
        @if(session('info'))
            <h3>{{ session('info') }}</h3>
        @endif
        <a class="btn btn-primary mb-3" type="button" href="{{ route('employees.create') }}">Nuevo Empleado</a>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            @if(count($employees) >= 1)
                <table class="table table-bordered table-hover">
                    <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1">id</th>
                        <th id="trs-hd" class="col-lg-1">Nombre Completo</th>
                        <th id="trs-hd" class="col-lg-1">Permisos</th>
                        <th id="trs-hd" class="col-lg-1">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employees->id }}</td>
                            <td>{{ $employees->name }}</td>
                            <td>
                                <a class="btn btn-primary mb-3" type="button" href="{{ route('roles.create') }}">
                                    Ver Permisos</a>
                            </td>
                            <td>
                                <button class="btn btn-success" style="margin-left: 5px;" type="submit">
                                    <i class="fa fa-check" style="font-size: 15px;"></i>
                                </button>
                                <button class="btn btn-danger" style="margin-left: 5px;" type="submit">
                                    <i class="fa fa-trash" style="font-size: 15px;"></i></button>
                            </td>
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

