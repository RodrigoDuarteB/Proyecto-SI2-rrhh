@extends('layouts.app')
    @section('content')
        <h1>Ausencias</h1>
        @include('layouts.session-messages')
        <div class="container table-responsive table-bordered table table-hover table-bordered results">
            <a class="btn btn-primary mb-3 ml-2 mt-2" type="button" href="{{ route('absences.create') }}">Nueva Ausencia</a>
            @if(count($absences) >= 1)
                <div class="card" style="font-size: 20px">
                    <div class="card-body" style="font-weight: bold">
                        <table class="table table-bordered table-hover text-center" id="absences">
                            <thead class="bill-header cs">
                            <tr>
                                <th id="trs-hd">id</th>
                                <th id="trs-hd">Empleado</th>
                                <th id="trs-hd">Titulo</th>
                                <th id="trs-hd">Razon</th>
                                <th id="trs-hd">Tipo</th>
                                <th id="trs-hd">Desde - Hasta</th>
                                <th id="trs-hd">Fecha solicitada</th>
                                <th id="trs-hd">Estado</th>
                                <th id="trs-hd">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($absences as $absence)
                                <tr>
                                    <td>{{ $absence->id }}</td>
                                    @php
                                        $employee = $absence->employee;
                                    @endphp
                                    <td>{{ $employee->id.' - '.$employee->name.' '.$employee->last_name }}</td>
                                    <td>{{ $absence->title }}</td>
                                    <td>{{ $absence->reason }}</td>
                                    <td>{{ $absence->type }}</td>
                                    <td>{{ $absence->begin.' - '.$absence->end }}</td>
                                    <td>{{ $absence->requested_date }}</td>
                                    <td>{{ $absence->status }}</td>
                                    <td>
                                        <a class="btn btn-success" style="margin-left: 5px;" href="{{ route('absences.edit', $absence) }}">
                                            <i class="fa fa-pencil" style="font-size: 15px;"></i>
                                        </a>
                                        <a class="btn btn-danger" style="margin-left: 5px;" role="button"
                                           data-toggle="modal" data-target="#delete{{$absence->id}}">
                                            <i class="fa fa-trash" style="font-size: 15px;"></i>
                                        </a>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="delete{{$absence->id}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Eliminar Ausencia</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close"><span
                                                                aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center text-muted">¿Está seguro que desea proceder a eliminar la ausencia con id {{ $absence->id }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('absences.destroy', $absence) }}" method="POST">
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
                        No hay ausencias registradas aún
                    </x-slot>
                </x-alert>
            @endif
        </div>
    @endsection
    @section('other-scripts')
        <script>
            $('#absences').DataTable({
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
