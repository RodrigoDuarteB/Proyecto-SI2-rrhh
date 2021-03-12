@extends('layouts.app')
@section('title', 'Contratos')
    @section('content')
        <h1>Contratos</h1>
        @include('layouts.session-messages')
        <div class="container table-responsive table-bordered table table-hover table-bordered results">
            <a class="btn btn-primary mb-3 ml-2 mt-2" type="button" href="{{ route('contracts.create', auth()->user()->employee) }}">Nuevo Contrato</a>
            @if(count($contracts) >= 1)
                <div class="card" style="font-size: 20px">
                    <div class="card-body" style="font-weight: bold">
                        <table class="table table-bordered table-hover text-center" id="contracts">
                            <thead class="bill-header cs">
                            <tr>
                                <th id="trs-hd">id</th>
                                <th id="trs-hd">Empleado</th>
                                <th id="trs-hd">Titulo</th>
                                <th id="trs-hd">Descripcion</th>
                                <th id="trs-hd">Fecha Inicio - Fecha Fin</th>
                                <th id="trs-hd">Cargo - Departamento</th>
                                <th id="trs-hd">Planificacion - Horario</th>
                                <th id="trs-hd">Estado</th>
                                <th id="trs-hd">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contracts as $contract)
                                <tr>
                                    <td>{{ $contract->id }}</td>
                                    @php
                                        $employee = $contract->employee;
                                    @endphp
                                    <td>{{ $employee->name.' - '.$employee->last_name }}</td>
                                    <td>{{ $contract->name }}</td>
                                    <td>{{ $contract->description }}</td>
                                    <td>{{ $contract->initial_date.' - '.$contract->final_date }}</td>
                                    <td>{{ $contract->job->name.' - '.$contract->job->department->name }}</td>
                                    @php
                                        $planning = $contract->planning;
                                        $schedule = $planning->schedule;
                                        $full_schedule = $schedule->clock_in.' - '.$schedule->clock_out;
                                    @endphp
                                    <td>{{ $planning->name.' : '.$full_schedule }}</td>
                                    <td>{{ $contract->status }}</td>
                                    <td>
                                        <a class="btn btn-success" style="margin-left: 5px;" href="{{ route('contracts.edit', $planning) }}">
                                            <i class="fa fa-pencil" style="font-size: 15px;"></i>
                                        </a>
                                        <a class="btn btn-danger" style="margin-left: 5px;" role="button"
                                           data-toggle="modal" data-target="#delete{{$contract->id}}">
                                            <i class="fa fa-trash" style="font-size: 15px;"></i>
                                        </a>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="delete{{$contract->id}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Eliminar Contrato</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close"><span
                                                                aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center text-muted">¿Está seguro que desea proceder a eliminar el contrato con id {{ $contract->id }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('contracts.destroy', $contract) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-light" data-dismiss="modal"
                                                                    type="button">Cancelar</button>
                                                            <button class="btn btn-primary" type="submit">Aceptar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                        No hay Contratos registrados aún
                    </x-slot>
                </x-alert>
            @endif
        </div>
    @endsection
    @section('other-scripts')
        <script>
            $('#contracts').DataTable({
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
