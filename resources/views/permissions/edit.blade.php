@extends('layouts.app')
    @section('content')
        <div class="card shadow mb-3">
            @include('layouts.session-messages')
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">{{ 'Editar Permiso '.$permission->id  }}</p>
            </div>
            <form action="{{ route('permissions.update', $permission) }}" method="POST">
                @csrf @method('PUT')
            <div class="card-body">
                <div class="container">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name"><strong>Nombre del Permiso:</strong><br></label>
                                        <input class="form-control" type="text" name="name" id="name"
                                               value="{{ $permission->name }}">
                                    </div>
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="dropdown-divider"></div>
                <div class="container">
                    <h5>Asignar Permiso a algun Rol</h5>
                    @forelse($roles as $role)
                        <div class="row">
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" value="{{ $role->id }}"
                                           id="flexCheckDefault" name="roles[]" {{ $permission->hasRole($role->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    @empty
                        <x-alert color="danger" >
                            <x-slot name="message">
                                No Hay Roles registrados
                            </x-slot>
                        </x-alert>
                    @endforelse
                </div>
                <div class="form-group ml-3 mt-4">
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </div>
            </form>
        </div>
    @endsection
