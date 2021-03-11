@extends('layouts.app')
    @section('content')
        <h3 class="text-dark mb-4">Crear Nuevo Personal</h3>
        <div class="row mb-3">
            <div class="col-lg-4">


                <div class="card mb-3" style="width: 252px;margin-right: 10px; margin-left: 50px;">
                    @error('image_name')
                        <small style="color: red">{{$message}}</small>
                    @enderror

                    <div class="bootstrap_img_upload">
                        <div class="col" style="padding-left: 40px;" >
                            <!-- Uploaded image area-->
                            <img id="imageResult" src="{{ asset('assets/img/perfil_vacio.jpg') }}" alt="" class="rounded-circle mb-3 mt-4" width="160" height="160">
                        </div>
                        <!-- Upload image input-->
                        <div class="input-group px-1 py-2 rounded-pill  shadow-sm" style="margin-left: -30px;">
                            <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted"></label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                        class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                        class="text-uppercase font-weight-bold text-muted">Cargar Imagen</small></label>
                            </div>
                        </div>
                    </div>



                </div>
                
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
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
                                                    @error('name')
                                                        <small style="color: red">{{$message}}</small>
                                                    @enderror
                                                    <div class="form-group">
                                                        <label for="name">
                                                            <strong>Nombres:</strong><br>
                                                        </label>
                                                        <input
                                                            class="form-control" type="text" name="name"
                                                            value="{{ old('name') }}" id="name">
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
                                                               value="{{ old('ID_number') }}">
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
                                                               name="birthdate" value="{{ old('birthdate') }}">
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
                                                            value="{{ old('birthplace') }}">
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
                                                            value="{{ old('personal_phone') }}">
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
                                                            value="{{ old('emergency_contact') }}">
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
                                                            <option value="0" {{ old('children') == 0 ? 'selected' : '' }}>0</option>
                                                            <option value="1" {{ old('children') == 1 ? 'selected' : '' }}>1</option>
                                                            <option value="2" {{ old('children') == 2 ? 'selected' : '' }}>2</option>
                                                            <option value="3" {{ old('children') == 3 ? 'selected' : '' }}>3</option>
                                                            <option value="4" {{ old('children') == 4 ? 'selected' : '' }}>4</option>
                                                            <option value="5" {{ old('children') == 5 ? 'selected' : '' }}>5</option>
                                                            <option value="6" {{ old('children') == 6 ? 'selected' : '' }}>6</option>
                                                            <option value="7" {{ old('children') == 7 ? 'selected' : '' }}>7</option>
                                                            <option value="8" {{ old('children') == 8 ? 'selected' : '' }}>8</option>
                                                            <option value="9" {{ old('children') == 9 ? 'selected' : '' }}>9</option>
                                                            <option value="10" {{ old('children') == 10 ? 'selected' : '' }}>10 o mas</option>
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
                                                    value="{{ old('last_name') }}">
                                            </div>
                                            @error('sex')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                            <div class="form-group">
                                                <label for="last_name"><strong>Sexo:</strong><br></label>
                                                <select class="form-control form-control" id="exampleSelect-2"
                                                        style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 300px;" name="sex">
                                                    <option value="" selected disabled>Elija una opcion</option>
                                                    <option value="1" {{ old('sex') == 1 ? 'selected' : '' }}>Femenino</option>
                                                    <option value="2" {{ old('sex') == 2 ? 'selected' : '' }}>Masculino</option>
                                                    <option value="3" {{ old('sex') == 3 ? 'selected' : '' }}>Otro</option>
                                                </select>
                                            </div>
                                            @error('nationality')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                            <div class="form-group">
                                                <label><strong>Nacionalidad:</strong><br></label>
                                                <input class="form-control" type="text"
                                                       name="nationality" value="{{ old('nationality') }}">
                                            </div>
                                            @error('passport')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                            <div class="form-group">
                                                <label><strong>Nro de Pasaporte:</strong><br></label>
                                                <input class="form-control" type="text"
                                                       name="passport" value="{{ old('passport') }}">
                                            </div>
                                            @error('address')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                            <div class="form-group">
                                                <label><strong>Direccion:</strong><br></label>
                                                <input class="form-control" type="text"
                                                       name="address" value="{{ old('address') }}">
                                            </div>
                                            @error('marital_status')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                            <div class="form-group">
                                                <label for="last_name"><strong>Estado Civil:</strong><br></label>
                                                <select
                                                    class="form-control form-control" id="exampleSelect-1"
                                                    style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 300px;" name=marital_status>
                                                    <option value="" selected disabled>Elija una Opcion</option>
                                                    <option value="1" {{ old('marital_status') == 1 ? 'selected' : '' }}>Solter@</option>
                                                    <option value="2" {{ old('marital_status') == 2 ? 'selected' : '' }}>Casado@</option>
                                                    <option value="3" {{ old('marital_status') == 3 ? 'selected' : '' }}>Comprometid@</option>
                                                    <option value="4" {{ old('marital_status') == 4 ? 'selected' : '' }}>Viud@</option>
                                                    <option value="5" {{ old('marital_status') == 5 ? 'selected' : '' }}>Divorciad@</option>
                                                    <option value="6" {{ old('marital_status') == 6 ? 'selected' : '' }}>Otro</option>
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
                                                    @error('email')
                                                        <small style="color: red">{{$message}}</small>
                                                    @enderror
                                                    <div class="form-group">
                                                        <label
                                                            for="first_name"><strong>Email:</strong><br>
                                                        </label>
                                                        <input
                                                            class="form-control" type="text" name="email"
                                                            value="{{ old('email') }}"></div>
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
                                </div>
                            </div>
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Contrato</p>
                                </div>
                                <div class="card-body">
                                    
                                    @error('contract_name')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="address"><strong>Título del Contrato</strong></label>
                                        <input class="form-control" type="text" name="contract_name"
                                            value="{{ old('contract_name') }}">
                                    </div>
                                    @error('contract_description')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="address"><strong>Resumen y Descripción:&nbsp;</strong></label>
                                        <textarea
                                            class="form-control"
                                            name="contract_description">{{ old('contract_description') }}</textarea>
                                    </div>
                                    <div class="form-group" style="width: 169px;">
                                        <label><strong>Fecha del Inicio del Contrato:</strong><br></label><input
                                            class="form-control" type="text" name="contract_initial_date" disabled value="{{ date('d-m-Y') }}">
                                    </div>
                                    @error('contract_final_date')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                    <div class="form-group" style="width: 169px;">
                                        <label><strong>Final:</strong><br></label>
                                        <input class="form-control" type="date" name="contract_final_date" value="{{ old('contract_final_date') }}">
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="city" style="margin-left: 2px;"><strong>Cargo</strong></label>
                                                <select
                                                    class="form-control form-control" id="exampleSelect-1"
                                                    style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px;width: 300px;" name="contract_job">
                                                    <option value="" selected disabled>Elija un Cargo</option>
                                                    @forelse($jobs as $job)
                                                        <option value="{{ $job->id }}" {{ old('contract_job') == $job->id ? 'selected' : '' }}>{{ $job->name.' - Departamento: '.$job->department->name }}</option>
                                                    @empty
                                                        <option value="" disabled>No hay Cargos</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="city" style="margin-left: 2px;">
                                                    <strong>Planificación Laboral</strong></label>
                                                <select
                                                    class="form-control form-control" id="exampleSelect-1"
                                                    style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px;width: 300px;" name="contract_planning">
                                                    <option value="" selected disabled>Elija una Planificacion</option>
                                                    @forelse($plannings as $planning)
                                                        @php
                                                            $schedule = $planning->schedule;
                                                            $full_schedule = $schedule->clock_in.' - '.$schedule->clock_out;
                                                        @endphp
                                                        <option value="{{ $planning->id }}" {{ old('contract_planning') == $planning->id ? 'selected' : '' }}>{{ $planning->name.' - Horario: '.$full_schedule }}</option>
                                                    @empty
                                                        <option value="" disabled>No hay Planificaciones Laborales</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Información de Contacto RRHH</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                @error('personal_phone')
                                                    <small style="color: red">{{$message}}</small>
                                                @enderror
                                                <div class="col">
                                                    <div class="form-group"><label><strong>Teléfono
                                                                de Trabajo:</strong><br></label><input
                                                            class="form-control" type="text"
                                                            name="personal_phone" value="{{ old('personal_phone') }}">
                                                    </div>
                                                </div>
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
    @section('other-scripts')
        <script type="text/javascript" >
            $(function () {
                // Summernote
                $('.textarea').summernote()
            })
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                $('.custom-file-label').html(fileName);
            });
            const $seleccionArchivos = document.querySelector("#imagenR"),
                $imagenPrevisualizacion = document.querySelector("#im");
            $seleccionArchivos.addEventListener("change", () => {

                const archivos = $seleccionArchivos.files;
                if (!archivos || !archivos.length) {
                    $imagenPrevisualizacion.src = "";
                    return;
                }
                const primerArchivo = archivos[0];
                const objectURL = URL.createObjectURL(primerArchivo);
                $imagenPrevisualizacion.src = objectURL;
            });
            $('.my-colorpicker1').colorpicker()
        </script>
    @endsection
