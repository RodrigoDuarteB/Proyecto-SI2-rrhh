@extends('layouts.app')
@section('title', 'Empleados')
    @section('content')
        @include('layouts.session-messages')
        @php
            $user = auth()->user();
            $employee = $user->employee;
        @endphp
        @if($employee != null)
            <div class="container-fluid">
                <h1>Información Personal de Empleado</h1>
                <div class="card shadow mb-5">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold" style="font-size: 20px;">Mi Información</p>
                    </div>
                    <div class="card-body" style="padding-right: 225px;">
                        <div class="form-row" style="width: 80%;margin-left: 50px;">
                            <div class="col">
                                <img class="rounded-circle mb-3 mt-4" data-aos="fade-down" data-aos-duration="850"
                                     src="{{ asset('storage/images/employees/'.$employee->image_name) }}"
                                     width="250" height="250" style="margin-left: 5px;">
                            </div>
                            <div class="col">
                                <div class="form-group" style="margin-top: 60px;font-size: 18px;">
                                    <label><strong>ID Empleado:</strong><br></label>
                                    <input type="text" name="id_employee" value="{{ $employee->id }}"
                                           style="margin-left: 25px;" disabled>
                                </div>
                                <div class="form-group" style="margin-top: 60px;font-size: 18px;">
                                    <label><strong>Nombre:</strong><br></label>
                                    <input type="text" name="email"
                                           value="{{ $employee->name.' '.$employee->last_name }}" style="margin-left: 83px;" disabled>
                                </div>
                                <div class="form-group" style="margin-top: 60px;font-size: 18px;">
                                    <label><strong>Email:</strong><br></label>
                                    <input type="text" name="email" value="{{ $employee->user->email }}" style="margin-left: 83px;" disabled>
                                </div>
                                <a class="btn btn-primary" role="button" style="width: 200px;margin-top: 36px;" href="{{ route('employees.edit', $employee) }}">Editar mi Información</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-5">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold" style="font-size: 20px;">Contrato Actual</p>
                    </div>
                    <div class="card-body" style="padding-right: 225px;">
                        @if($employee->currentContract() != null)
                            @php
                                $contract = $employee->currentContract();
                            @endphp
                            <div class="form-row" style="width: 80%;margin-left: 50px;">
                                <div class="col">
                                    <div class="form-group" style="margin-top: 60px;font-size: 18px;">
                                        <label><strong>Cargo :</strong><br></label>
                                        <input type="text" name="job" value="{{ $contract->job->name }}" style="margin-left: 25px; width: 400px" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group" style="margin-top: 60px;font-size: 18px;">
                                        <label><strong>Planificación :</strong><br></label>
                                        <input type="text" name="plannings" value="{{ $contract->planning->name }}" style="margin-left: 25px; width: 300px" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row h-100" style="margin-top: 13px;padding-top: 40px;">
                                <div class="col-sm-8 align-self-center text-center" style="margin-right: 0px;margin-left: 55px;">
                                    <a class="btn btn-secondary" role="button" style="margin-right: 77px;width: 216px;" href="{{ route('contracts.show', $contract) }}">Ver Contrato Actual</a>
                                    <a class="btn btn-secondary" role="button" href="{{ route('administrative-careers.show', $employee) }}">Ver Carrera Administrativa</a>
                                </div>
                            </div>
                        @else
                            <x-alert>
                                <x-slot name="message">
                                    Sin contrato
                                </x-slot>
                            </x-alert>
                        @endif
                    </div>
                </div>
            </div>
            </div>
        @endif
        @canany(['Listar Personal', 'Crear Personal', 'Editar Personal', 'Eliminar Personal'])
            <div class="container-fluid">
                <h1>Listado General de Empleados</h1>
                @canany(['Crear Personal'])
                    <a class="btn btn-primary mb-3 ml-2 mt-2" type="button"
                       href="{{ route('employees.create') }}">Nuevo Empleado</a>
                @endcanany
                <div class="table-responsive table-bordered table table-hover table-bordered results">
                    @if($employee != null)
                        @php
                            $otherEmployees = $employees->where('id', '!=', $employee->id);
                        @endphp
                    @else
                        @php
                            $otherEmployees = $employees;
                        @endphp
                    @endif
                    @if(count($otherEmployees) >= 1)
                        <div class="card" style="font-size: 20px; font-weight: bold">
                            <div class="card-body">
                                <table class="table table-bordered table-hover text-center" id="employees">
                                    <thead class="bill-header cs">
                                    <tr>
                                        <th id="trs-hd">id</th>
                                        <th id="trs-hd">Nombre Completo</th>
                                        <th id="trs-hd">Telefono de Trabajo</th>
                                        <th id="trs-hd">CI</th>
                                        <th id="trs-hd">Nacionalidad</th>
                                        <th id="trs-hd">Sexo</th>
                                        @canany(['Editar Personal', 'Eliminar Personal'])
                                            <th id="trs-hd">Acciones</th>
                                        @endcanany
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($otherEmployees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->name.' '.$employee->last_name }}</td>
                                            <td>{{ $employee->work_phone }}</td>
                                            <td>{{ $employee->ID_number }}</td>
                                            <td>{{ $employee->nationality }}</td>
                                            <td>{{ $employee->sex }}</td>
                                            @canany(['Editar Personal', 'Eliminar Personal'])
                                                <td>
                                                    @canany(['Editar Personal'])
                                                        <a class="btn btn-success" style="margin-left: 5px;" href="{{ route('employees.edit', $employee) }}">
                                                            <i class="fa fa-check" style="font-size: 15px;"></i>
                                                        </a>
                                                    @endcanany
                                                    @canany(['Eliminar Personal'])
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
            </div>
        @endcanany
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
                }
            });
        </script>
    @endsection
