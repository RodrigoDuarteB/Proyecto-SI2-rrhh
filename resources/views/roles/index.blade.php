@extends('layouts.app')
    @section('content')
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        <h2>Roles</h2>
        @include('layouts.session-messages')
        <div class="container table-responsive table-bordered table table-hover table-bordered results">
            <a class="btn btn-primary mb-3" type="button" href="{{ route('roles.create') }}">Nuevo Rol</a>
            @if(count($roles) >= 1)
                <table class="table table-bordered table-hover">
                    <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd">id</th>
                            <th id="trs-hd">Nombre</th>
                            <th id="trs-hd">Permisos</th>
                            <th id="trs-hd">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <ul>
                                        @forelse($role->permissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @empty
                                            No tiene ningún Permiso
                                        @endforelse
                                    </ul>
                                </td>
                                <td>
                                    <a class="btn btn-success" style="margin-left: 5px;" href="{{ route('roles.edit', $role) }}">
                                        <i class="fa fa-check" style="font-size: 15px;"></i>
                                    </a>
                                    <a class="btn btn-danger" style="margin-left: 5px;" role="button"
                                       data-toggle="modal" data-target="#delete{{$role->id}}">
                                        <i class="fa fa-trash" style="font-size: 15px;"></i>
                                    </a>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="delete{{$role->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>Eliminar Rol</h4>
                                                    <button type="button" class="close"
                                                            data-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-center text-muted">¿Está seguro que desea proceder a eliminar el Rol con id {{ $role->id }}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('roles.destroy', $role) }}" method="POST">
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
                        No hay Roles registrados aún
                    </x-slot>
                </x-alert>
            @endif
        </div>
    @endsection
