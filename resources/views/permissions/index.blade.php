@extends('layouts.app')
    @section('content')
        <h2>Permisos</h2>
        @include('layouts.session-messages')
        <div class="container table-responsive table-bordered table table-hover table-bordered results">
            <a class="btn btn-primary mb-3" type="button" href="{{ route('permissions.create') }}">Nuevo Permiso</a>
            @if(count($permissions) >= 1)
                <table class="table table-bordered table-hover" id="permissions">
                    <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd">id</th>
                            <th id="trs-hd">Nombre</th>
                            <th id="trs-hd">Roles con el Permiso</th>
                            <th id="trs-hd">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <ul>
                                        @forelse($permission->roles as $rol)
                                            <li>{{ $rol->name }}</li>
                                        @empty
                                            No está en ningun rol
                                        @endforelse
                                    </ul>
                                </td>
                                <td>
                                    <a class="btn btn-success" style="margin-left: 5px;" href="{{ route('permissions.edit', $permission) }}">
                                        <i class="fa fa-pencil" style="font-size: 15px;"></i>
                                    </a>
                                    <a class="btn btn-danger" style="margin-left: 5px;" role="button"
                                       data-toggle="modal" data-target="#delete{{$permission->id}}">
                                        <i class="fa fa-trash" style="font-size: 15px;"></i>
                                    </a>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="delete{{$permission->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>Eliminar Permiso</h4>
                                                    <button type="button" class="close"
                                                            data-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-center text-muted">¿Está seguro que desea proceder a eliminar el permiso con id {{ $permission->id }}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('permissions.destroy', $permission) }}" method="POST">
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
            @else
                <x-alert>
                    <x-slot name="message">
                        No hay Permisos registrados aún
                    </x-slot>
                </x-alert>
            @endif
        </div>
    @endsection
    @section('other-scripts')
        <script>
            $('#permissions').DataTable({
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
