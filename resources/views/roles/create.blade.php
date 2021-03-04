@extends('layouts.app')
    @section('content')
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Nuevo Rol</p>
            </div>
            <div class="card-body">
                <form action="">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <div class="col">
                                    <div class="form-group"><label
                                            for="first_name"><strong>Nombre del Rol:</strong><br></label><input
                                            class="form-control" type="text" name="name"
                                            value="nombre"></div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label><strong>Carnet de
                                                Identidad:</strong><br></label><input
                                            class="form-control" type="text" name="ID_number"
                                            value="Ci"></div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label><strong>Nacionalidad:</strong><br></label><input
                                            class="form-control" type="text"
                                            name="nationality" value="nacionalidad"></div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label><strong>Fecha de
                                                Nacimiento:</strong><br></label><input
                                            class="form-control" type="date"
                                            name="birthdate"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group"><label
                                    for="last_name"><strong>Apellidos:</strong><br></label><input
                                    class="form-control" type="text" name="last_name"
                                    value="Apellidos"></div>
                            <div class="form-group"><label for="last_name"><strong>Estado
                                        Civil:</strong><br></label><input
                                    class="form-control" type="text" name="marital_status"
                                    value="soltero"></div>
                            <div class="form-group"><label
                                    for="last_name"><strong>Sexo:</strong><br></label><select
                                    class="form-control form-control" id="exampleSelect-2"
                                    style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 169px;">
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Otros">Otros</option>
                                </select></div>
                            <div class="form-group"><label
                                    for="last_name"><strong>Hijos:</strong><br></label><select
                                    class="form-control form-control" id="exampleSelect-1"
                                    style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 169px;">
                                    <option value="4">1</option>
                                    <option value="4">2</option>
                                    <option value="4">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-primary" type="button" href="{{ route('roles.store') }}">Registrar</a>
                    </div>

                </form>
            </div>

        </div>
    @endsection
