@extends('layouts.app')
    @section('content')
        <div class="card shadow mb-3">
            @include('layouts.session-messages')
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Nuevo Permiso</p>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name"><strong>Nombre del Permiso:</strong><br></label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                value="{{ old('name') }}">
                                        </div>
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ml-2">
                            <button class="btn btn-primary" type="submit">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
