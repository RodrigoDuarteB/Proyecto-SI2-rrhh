@extends('layouts.app')
    @section('content')
        <h3 class="text-dark mb-4">Modificar Información</h3>
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
                    <div class="col" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Datos Personales</p>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="col">
                                                    <div class="form-group"><label
                                                            for="first_name"><strong>Nombres:</strong><br></label><input
                                                            class="form-control" type="text" name="name"
                                                            value="nombre"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label><strong>Carnet de
                                                                Identidad:</strong><br></label><input
                                                            class="form-control" type="text"
                                                            name="ID_number" value="Ci" disabled=""></div>
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
                                                    <option value="">Femenino</option>
                                                    <option value="">Masculino</option>
                                                    <option value="">Otros</option>
                                                </select></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Datos RR.HH.</p>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group"><label
                                            for="address"><strong>Contrato</strong></label><input
                                            class="form-control" type="text" name="contrato_name"
                                            value="tipo de contrato" disabled=""></div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="city"
                                                                           style="margin-left: 2px;"><strong>Cargo</strong></label><input
                                                    class="form-control" type="text" name="cargo"
                                                    value="Adm. Bodega" disabled=""></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="country"><strong>ID
                                                        Empleado</strong></label><input class="form-control"
                                                                                        type="text" name="ID_number" value="11111" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Información de Contacto</p>
                            </div>
                            <div class="card-body">
                                <form>
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
                                </form>
                                <div><a class="btn btn-primary btn-lg" role="button" data-toggle="modal"
                                        href="#myModal">Guardar</a>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>Modal Title</h4><button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-center text-muted">Description </p>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-light"
                                                                                  data-dismiss="modal"
                                                                                  type="button">Close</button><button
                                                        class="btn btn-primary" type="button">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-5"></div>
    @endsection

