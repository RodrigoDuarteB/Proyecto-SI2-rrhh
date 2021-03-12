@extends('layouts.app')

@section('content')
    <h3 class="text-dark mb-4">Agregar Postulante</h3>
    <p class="card-category">Ingrese los datos correspondientes</p>
    <div class="row mb-3">
        <div class="col-lg-3">
            
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">DATOS</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('applicants')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">
                                                <strong>{{ 'Nombres: '}}</strong><br>
                                            </label>

                                            <input class="form-control" type="text" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">
                                                <strong>{{ 'Apellidos: '}}</strong><br>
                                            </label>
                                            <input class="form-control" type="text" name="last_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="personal_phone">
                                                <strong>{{ 'Teléfono: '}}</strong><br>
                                            </label>
                                            <input class="form-control" type="tel" name="personal_phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                <strong>{{ 'Email: '}}</strong><br>
                                            </label>
                                            <input class="form-control" type="email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sex">
                                                <strong>{{ 'Sexo: ' }}</strong><br>
                                            </label>
                                            <select class="form-control form-control" id="sex" name="sex"
                                                style="padding-left: 9px;padding-right: 60px;padding-top: 0px;padding-bottom: 0px;margin-right: 5px;margin-bottom: -4px;margin-left: -1px;min-width: 0px|;width: 169px;">
                                                <option >Seleccione</option>
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer">Mujer</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nationality">
                                                <strong>{{ 'Nacionalidad: '}}</strong><br>
                                            </label>
                                            <input class="form-control" type="text" name="nationality">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="birthdate">
                                                <strong>{{ 'Fecha de Nacimiento: '}}</strong><br>
                                            </label>
                                            <input class="form-control" type="text" name="birthdate">
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <strong>{{ 'Lugar de Nacimiento: '}}</strong><br>
                                            </label>
                                            <input class="form-control" type="text" name="birthplace">
                                        </div>
                                        <div class="form-group">
                                            <label for="job_id">
                                                <strong>{{ 'Cargo a Postular: ' }}</strong><br>
                                            </label>
                                            <select class="form-control form-control" id="job_id" name="job_id" required>
                                                <option value="No seleccionado">Seleccione el Cargo</option>
                                                <option value="1">Técnico I</option>
                                                <option value="2">Profesional</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="academic_degree">
                                                <strong>{{ 'Grado Académico: ' }}</strong><br>
                                            </label>
                                            <select class="form-control form-control" id="academic_degree" name="academic_degree" required>
                                                <option value="0">Seleccione el máximo grado alcanzado</option>
                                                <option value="Bachiller">Bachiller</option>
                                                <option value="Técnico Medio">Técnico Medio</option>
                                                <option value="Técnico Superior">Técnico Superior</option>
                                                <option value="Licenciatura">Licenciatura</option>
                                                <option value="Masterado">Masterado</option>
                                                <option value="Doctorado">Doctorado</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="career">
                                                <strong>{{ 'Carrera: ' }}</strong><br>
                                            </label>
                                            <input class="form-control" type="text" name="career" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="resume_file">
                                                <strong>{{ 'Adjuntar Archivo: ' }}</strong><br>
                                            </label>
                                            <input class="form-control" type="file" name="resume_file" accept=".pdf, .PDF" multiple>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-primary btn-lg" role="button"
                                        data-toggle="modal" href="#myModal">
                                        Guardar
                                    </a>
                                <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Guardar Datos</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center text-muted">¿Está seguro de guardar los datos?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light" data-dismiss="modal" type="button">Cerrar</button>
                                                <button class="btn btn-primary" type="submit">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
   

@endsection
