@extends('layouts.app')
@section('content')
    <h3 class="text-dark mb-4">Crear Nuevo Personal</h3>
    <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3" style="width: 252px;margin-right: 10px; margin-left: 50px;">
                    @error('image_name')
                    <small style="color: red">{{$message}}</small>
                    @enderror
                    <div class="bootstrap_img_upload">
                        <div class="col" style="padding-left: 40px;" >
                            <!-- Uploaded image area-->
                            <img id="imageResult" src="{{ asset('storage/images/employees/'.$employee->image_name) }}" alt="" class="rounded-circle mb-3 mt-4" width="160" height="160">
                        </div>
                        <!-- Upload image input-->
                        <div class="input-group px-1 py-2 rounded-pill  shadow-sm" style="margin-left: -30px;">
                            <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="image_name" value="{{ $employee->image_name }}" accept="image/*">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted"></label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                        class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                        class="text-uppercase font-weight-bold text-muted">Cargar Imagen</small>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
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
                                                @error('name')
                                                <small style="color: red">{{$message}}</small>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="name">
                                                        <strong>Nombres:</strong><br>
                                                    </label>
                                                    <input
                                                        class="form-control" type="text" name="name"
                                                        value="{{ $employee->name }}" id="name">
                                                </div>
                                            </div>
                                            <div class="col">
                                                @error('ID_number')
                                                <small style="color: red">{{$message}}</small>
                                                @enderror
                                                <div class="form-group">
                                                    <label><strong>Carnet de
                                                            Identidad:</strong><br>
                                                    </label>
                                                    <input class="form-control" type="text" name="ID_number"
                                                           value="{{ $employee->ID_number }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col">
                                                @error('birthdate')
                                                <small style="color: red">{{$message}}</small>
                                                @enderror
                                                <div class="form-group">
                                                    <label><strong>Fecha de
                                                            Nacimiento:</strong><br></label>
                                                    <input class="form-control" type="date"
                                                           name="birthdate" value="{{ $employee->birthdate }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                @error('birthplace')
                                                <small style="color: red">{{$message}}</small>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="last_name"><strong>Ciudad o Provincia:</strong><br></label>
                                                    <input
                                                        class="form-control" type="text" name="birthplace"
                                                        value="{{ $employee->birthplace }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                @error('personal_phone')
                                                <small style="color: red">{{$message}}</small>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="last_name">
                                                        <strong>Telefono Personal:</strong><br></label>
                                                    <input
                                                        class="form-control" type="text" name="personal_phone"
                                                        value="{{ $employee->personal_phone }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                @error('emergency_contact')
                                                <small style="color: red">{{$message}}</small>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="last_name"><strong>Contacto de Emergencia</strong><br></label>
                                                    <input
                                                        class="form-control" type="text" name="emergency_contact"
                                                        value="{{ $employee->emergency_contact }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                @error('children')
                                                <small style="color: red">{{$message}}</small>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="last_name"><strong>Hijos:</strong><br></label>
                                                    <select
                                                        class="form-control form-control"
                                                        id="exampleSelect-1" name="children"
                                                        style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 300px;">
                                                        <option value="" selected disabled>Elija una opcion</option>
                                                        <option value="0" {{ $employee->children == 0 ? 'selected' : '' }}>0</option>
                                                        <option value="1" {{ $employee->children == 1 ? 'selected' : '' }}>1</option>
                                                        <option value="2" {{ $employee->children == 2 ? 'selected' : '' }}>2</option>
                                                        <option value="3" {{ $employee->children == 3 ? 'selected' : '' }}>3</option>
                                                        <option value="4" {{ $employee->children == 4 ? 'selected' : '' }}>4</option>
                                                        <option value="5" {{ $employee->children == 5 ? 'selected' : '' }}>5</option>
                                                        <option value="6" {{ $employee->children == 6 ? 'selected' : '' }}>6</option>
                                                        <option value="7" {{ $employee->children == 7 ? 'selected' : '' }}>7</option>
                                                        <option value="8" {{ $employee->children == 8 ? 'selected' : '' }}>8</option>
                                                        <option value="9" {{ $employee->children == 9 ? 'selected' : '' }}>9</option>
                                                        <option value="10" {{ $employee->children == 10 ? 'selected' : '' }}>10 o mas</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        @error('last_name')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label for="last_name"><strong>Apellidos:</strong><br></label>
                                            <input
                                                class="form-control" type="text" name="last_name"
                                                value="{{ $employee->last_name }}">
                                        </div>
                                        @error('sex')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label for="last_name"><strong>Sexo:</strong><br></label>
                                            <select class="form-control form-control" id="exampleSelect-2"
                                                    style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 300px;" name="sex">
                                                <option value="" selected disabled>Elija una opcion</option>
                                                <option value="1" {{ $employee->sex == \App\Models\Employee::$WOMAN ? 'selected' : '' }}>Femenino</option>
                                                <option value="2" {{ $employee->sex == \App\Models\Employee::$MAN ? 'selected' : '' }}>Masculino</option>
                                                <option value="3" {{ $employee->sex == \App\Models\Employee::$OTHER ? 'selected' : '' }}>Otro</option>
                                            </select>
                                        </div>
                                        @error('nationality')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label><strong>Nacionalidad:</strong><br></label>
                                            <input class="form-control" type="text"
                                                   name="nationality" value="{{ $employee->nationality }}">
                                        </div>
                                        @error('passport')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label><strong>Nro de Pasaporte:</strong><br></label>
                                            <input class="form-control" type="text"
                                                   name="passport" value="{{ $employee->passport }}">
                                        </div>
                                        @error('address')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label><strong>Direccion:</strong><br></label>
                                            <input class="form-control" type="text"
                                                   name="address" value="{{ $employee->address }}">
                                        </div>
                                        @error('marital_status')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label for="last_name"><strong>Estado Civil:</strong><br></label>
                                            <select
                                                class="form-control form-control" id="exampleSelect-1"
                                                style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 300px;" name=marital_status>
                                                <option value="" disabled>Elija una Opcion</option>
                                                <option value="{{ $employee->marital_status }}" selected>{{ $employee->marital_status }}</option>
                                                <option value="1" {{ $employee->marital_status == 1 ? 'selected' : '' }}>Solter@</option>
                                                <option value="2" {{ $employee->marital_status == 2 ? 'selected' : '' }}>Casado@</option>
                                                <option value="3" {{ $employee->marital_status == 3 ? 'selected' : '' }}>Comprometid@</option>
                                                <option value="4" {{ $employee->marital_status == 4 ? 'selected' : '' }}>Viud@</option>
                                                <option value="5" {{ $employee->marital_status == 5 ? 'selected' : '' }}>Divorciad@</option>
                                                <option value="6" {{ $employee->marital_status == 6 ? 'selected' : '' }}>Otro</option>
                                            </select>
                                        </div>
                                        @error('work_phone')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                        <div class="form-group"><label><strong>Teléfono
                                                    de Trabajo:</strong><br></label><input
                                                class="form-control" type="text"
                                                name="work_phone" value="{{  $employee->work_phone }}">
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
                                                @error('email')
                                                <small style="color: red">{{$message}}</small>
                                                @enderror
                                                <div class="form-group">
                                                    <label
                                                        for="first_name"><strong>Email:</strong><br>
                                                    </label>
                                                    <input
                                                        class="form-control" type="text" name="email"
                                                        value="{{ $employee->user->email }}"></div>
                                            </div>
                                            <div class="col">
                                                @error('password')
                                                <small style="color: red">{{$message}}</small>
                                                @enderror
                                                <div class="form-group">
                                                    <label><strong>Contraseña:</strong><br></label><input
                                                        class="form-control" type="password"
                                                        name="password" value=""></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" style="margin-bottom: 0px;padding-bottom: 0px;padding-top: 86px;">
                                        @error('confirm_password')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                        <div class="form-group"><label for="last_name"><strong>Confirmar
                                                    Contraseña:</strong><br></label>
                                            <input
                                                class="form-control" type="password"
                                                name="confirm_password" value="">
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-primary btn-lg" role="button" data-toggle="modal"
                                   href="#myModal">Editar</a>
                            </div>
                        </div>
                        <div>
                            <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Editar empleado</h4>
                                            <button type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center text-muted">¿Está seguro que desea proceder a editar el empleado con los datos introducidos? </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-light" data-dismiss="modal"
                                                    type="button">Cancelar</button>
                                            <button
                                                class="btn btn-primary" type="submit">Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="card shadow mb-5"></div>
@endsection

