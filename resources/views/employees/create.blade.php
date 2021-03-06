@extends('layouts.app')
    @section('content')
        <h3 class="text-dark mb-4">Crear Nuevo Personal</h3>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3"
                     style="width: 252px;margin-top: 4px;padding: 2px;margin-right: 2px;margin-left: 22px;padding-right: 0px;margin-bottom: -4px;padding-bottom: -7px;">
                    <div class="card-body text-center shadow" style="margin: 13px;margin-top: 22px;"><img
                            class="rounded-circle mb-3 mt-4" data-aos="fade-down" data-aos-duration="850"
                            src="assets/img/dogs/image3.jpeg" width="160" height="160">
                        <div class="mb-3"><button class="btn btn-outline-primary" type="button">Cargar
                                Imagen<input class="d-xl-flex form-control-file" type="file"
                                             id="exampleInputFile" aria-describedby="fileHelp"
                                             style="margin-left: -2px;padding-left: 0px;padding-right: 2px;min-height: 0px;max-height: none;margin-right: 0px;margin-bottom: 11px;"
                                             name="image_name" required="" accept="image/*"></button></div>
                    </div>
                </div>
                <div class="card shadow mb-4"></div>
            </div>
            <div class="col-lg-8">
                <div class="row mb-3 d-none">
                    <div class="col">
                        <div class="card text-white bg-primary shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5%
                                    since last month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5%
                                    since last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="col" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Datos Personales</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="name">
                                                            <strong>Nombres:</strong><br>
                                                        </label>
                                                        <input
                                                            class="form-control" type="text" name="name"
                                                            value="{{ old('name') }}" id="name">
                                                    </div>
                                                    @error('name')
                                                        <small>{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label><strong>Carnet de
                                                                Identidad:</strong><br>
                                                        </label>
                                                        <input class="form-control" type="text" name="ID_number"
                                                               value="{{ old('ID_number') }}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label><strong>Fecha de
                                                                Nacimiento:</strong><br></label>
                                                        <input class="form-control" type="date"
                                                               name="birthdate" value="{{ old('birthdate') }}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="last_name"><strong>Ciudad o Provincia:</strong><br></label>
                                                        <input
                                                            class="form-control" type="text" name="birthplace"
                                                            value="{{ old('birthplace') }}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="last_name"><strong>Telefono Personal:</strong><br></label>
                                                        <input
                                                            class="form-control" type="text" name="personal_phone"
                                                            value="{{ old('personal_phone') }}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="last_name"><strong>Contacto de Emergencia</strong><br></label>
                                                        <input
                                                            class="form-control" type="text" name="emergency_contact"
                                                            value="{{ old('emergency_contact') }}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="last_name"><strong>Hijos:</strong><br></label>
                                                        <select
                                                            class="form-control form-control" id="exampleSelect-1" name="children"
                                                            style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 300px;">
                                                            <option value="" selected disabled>Elija una opcion</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10 o mas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="last_name"><strong>Apellidos:</strong><br></label>
                                                <input
                                                    class="form-control" type="text" name="last_name"
                                                    value="{{ old('last_name') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name"><strong>Sexo:</strong><br></label>
                                                <select class="form-control form-control" id="exampleSelect-2"
                                                        style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 300px;">
                                                    <option value="" selected disabled>Elija una opcion</option>
                                                    <option value="1">Femenino</option>
                                                    <option value="2">Masculino</option>
                                                    <option value="3">Otro</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Nacionalidad:</strong><br></label>
                                                <input class="form-control" type="text"
                                                       name="nationality" value="{{ old('nationality') }}">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Nro de Pasaporte:</strong><br></label>
                                                <input class="form-control" type="text"
                                                       name="passport" value="{{ old('passport') }}">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Direccion:</strong><br></label>
                                                <input class="form-control" type="text"
                                                       name="address" value="{{ old('address') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name"><strong>Estado Civil:</strong><br></label>
                                                <select
                                                    class="form-control form-control" id="exampleSelect-1"
                                                    style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 300px;" name=marital_status>
                                                    <option value="" selected disabled>Elija una Opcion</option>
                                                    <option value="1">Solter@</option>
                                                    <option value="2">Casado@</option>
                                                    <option value="3">Comprometid@</option>
                                                    <option value="4">Viud@</option>
                                                    <option value="5">Divorciad@</option>
                                                    <option value="6">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Datos de Usuario</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label
                                                            for="first_name"><strong>Email:</strong><br>
                                                        </label>
                                                        <input
                                                            class="form-control" type="text" name="email"
                                                            value="{{ old('email') }}"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label><strong>Contraseña:</strong><br></label><input
                                                            class="form-control" type="password"
                                                            name="password" value=""></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col" style="margin-bottom: 0px;padding-bottom: 0px;padding-top: 86px;">
                                            <br>
                                            <div class="form-group"><label for="last_name"><strong>Confirmar
                                                        Contraseña:</strong><br></label>
                                                <input
                                                    class="form-control" type="password"
                                                    name="confirm_password" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Datos RR.HH.</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label
                                            for="address"><strong>Departamento:</strong>
                                        </label>
                                        <input
                                            class="form-control" type="text" name="departament"
                                            value="tipo de departamento" disabled="">
                                    </div>
                                    <div class="form-group"><label
                                            for="address"><strong>Contrato</strong></label><input
                                            class="form-control" type="text" name="contrato_name"
                                            value="tipo de contrato" disabled=""></div>
                                    <div class="form-group"><label
                                            for="address"><strong>Descripción:&nbsp;</strong></label><textarea
                                            class="form-control" name="contract_descripcion"></textarea>
                                    </div>
                                    <div class="form-group" style="width: 169px;">
                                        <label><strong>Inicio:</strong><br></label><input
                                            class="form-control" type="date" name="contract_initial_date">
                                    </div>
                                    <div class="form-group" style="width: 169px;">
                                        <label><strong>Final:</strong><br></label><input
                                            class="form-control" type="date" name="contract_final_date">
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="city"
                                                                           style="margin-left: 2px;"><strong>Cargo</strong></label><input
                                                    class="form-control" type="text" name="cargo"
                                                    value="Adm. Bodega" disabled=""></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="country"><strong>ID
                                                        Empleado</strong></label>
                                                <input class="form-control" type="text" name="ID_number"
                                                       value="11111" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Información de Contacto</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="col">
                                                    <div class="form-group"><label
                                                            for="first_name"><strong>Dirección:</strong><br></label><input
                                                            class="form-control" type="text" name="address"
                                                            value="direccion"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label><strong>Teléfono
                                                                Personal:</strong><br></label><input
                                                            class="form-control" type="text"
                                                            name="personal_phone" value="telf. personal">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="last_name"><strong>Teléfono
                                                        de Trabajo:</strong><br></label><input
                                                    class="form-control" type="text" name="work_phone"
                                                    value="telf. trabajo"></div>
                                            <div class="form-group"><label for="last_name"><strong>Contacto
                                                        de Emergencia:</strong><br></label><input
                                                    class="form-control" type="text"
                                                    name="emergency_contact" value="contc. emergencia">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="btn btn-primary btn-lg" role="button" data-toggle="modal"
                                            href="#myModal">Registrar</a>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Registrar nuevo Empleado</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close"><span
                                                                aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center text-muted">¿Está seguro que desea proceder a registrar el empleado con los datos introducidos? </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-light" data-dismiss="modal"
                                                                type="button">Cancelar</button>
                                                        <button class="btn btn-primary" type="submit">Aceptar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card shadow mb-5"></div>
    @endsection
