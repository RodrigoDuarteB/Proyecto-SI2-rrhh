@extends('layouts.app')
    @section('content')
        <h1>Planificaciones Laborales</h1>
        @include('layouts.session-messages')
        <div class="container table-responsive table-bordered table table-hover table-bordered results">
            <a class="btn btn-primary mb-3 ml-2 mt-2" type="button" href="{{ route('plannings.create') }}">Nueva Planificacion</a>
            @if(count($plannings) >= 1)
                <div class="card" style="font-size: 20px">
                    <div class="card-body" style="font-weight: bold">
                        <table class="table table-bordered table-hover text-center" id="plannings">
                            <thead class="bill-header cs">
                            <tr>
                                <th id="trs-hd">id</th>
                                <th id="trs-hd">Nombre</th>
                                <th id="trs-hd">Descripción</th>
                                <th id="trs-hd">Horario</th>
                                <th id="trs-hd">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plannings as $planning)
                                <tr>
                                    <td>{{ $planning->id }}</td>
                                    <td>{{ $planning->name }}</td>
                                    <td>{{ $planning->description }}</td>
                                    @php
                                        $schedule = $planning->schedule;
                                        $full_schedule = $schedule->clock_in.' - '.$schedule->clock_out;
                                    @endphp
                                    <td>{{ $full_schedule }}</td>
                                    <td>
                                        <a class="btn btn-success" style="margin-left: 5px;" href="{{ route('plannings.edit', $planning) }}">
                                            <i class="fa fa-pencil" style="font-size: 15px;"></i>
                                        </a>
                                        <a class="btn btn-danger" style="margin-left: 5px;" role="button"
                                           data-toggle="modal" data-target="#delete{{$planning->id}}">
                                            <i class="fa fa-trash" style="font-size: 15px;"></i>
                                        </a>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="delete{{$planning->id}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Eliminar Planificacion</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close"><span
                                                                aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center text-muted">¿Está seguro que desea proceder a eliminar la planificacion con id {{ $planning->id }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('plannings.destroy', $planning) }}" method="POST">
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
                        No hay planificaciones registradas aún
                    </x-slot>
                </x-alert>
            @endif
        </div>
    @endsection
    @section('other-scripts')
        <script>
            $('#plannings').DataTable({
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
