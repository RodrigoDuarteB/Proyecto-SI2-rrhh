@extends('layouts.app')
    @section('content')
        <div class="card shadow mb-3">
            @include('layouts.session-messages')
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">{{ 'Editar Rol '.$role->id  }}</p>
            </div>
            <form action="{{ route('roles.update', $role) }}" method="POST" class="container">
                @csrf @method('PUT')
                <div class="card-body">
                    <div class="container">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name"><strong>Nombre del Rol:</strong><br></label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                   value="{{ $role->name }}">
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
                    <h5>Editar Permisos</h5>
                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" id="flexCheckDefault" name="permissions[]" {{ $role->hasPermissionTo($permission->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group ml-3 mt-4">
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </div>
            </form>
        </div>
    @endsection
