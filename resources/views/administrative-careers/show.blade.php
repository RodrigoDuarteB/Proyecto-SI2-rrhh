@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-1" style="padding-bottom: 17px;"><strong>Carrera Administrativa del Empleado</strong><br>
    </h3>
    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Tiempo de vida en la Empresa<br></p>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <div class="form-group" style="margin-bottom: 30px;"><label><strong>Fecha de Ingreso la
                                Empresa:</strong><br></label><input type="text" name="date" value="dd/mm/aa"
                            style="margin-left: 25px;width: 290px;" disabled=""></div>
                </div>
                <div class="col">
                    <div class="form-group"><label><strong>Tiempo Trabajando:</strong><br></label><input type="text"
                            name="time" value="54" style="margin-left: 25px;" disabled=""></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Contratos<br></p>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <div class="form-group" style="margin-bottom: 30px;"><label><strong>Contrato Actual
                                :&nbsp;&nbsp;</strong><br></label><input type="text" name="title" value="titulo"
                            style="margin-left: 25px;width: 290px;" disabled=""></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><label><strong>Fecha Inicio :</strong><br></label><input type="date"
                            name="date_start" style="margin-left: 20px;"></div>
                </div>
                <div class="col">
                    <div class="form-group"><label><strong>Hasta :</strong><br></label><input type="date"
                            name="date_end" style="margin-left: 20px;"></div>
                </div>
                <div class="col"></div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><label><strong>Cargo :</strong><br></label><input type="text" name="cargo"
                            value="cargo" style="width: 100%;" disabled=""></div>
                </div>
                <div class="col">
                    <div class="form-group"><label><strong>Planificación :</strong><br></label><input type="text"
                            name="name" value="planificacion" style="width: 100%;" disabled=""></div>
                </div>
                <div class="col">
                    <div class="form-group"><label><strong>Horarios :</strong><br></label><input type="text"
                            name="horarios" value="00:00" style="width: 100%;" disabled=""></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Contratos Pasados<br></p>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <div class="form-group" style="margin-bottom: 30px;"><label><strong>Título de Contrato
                                :&nbsp;&nbsp;</strong><br></label><input type="text" name="title" value="titulo"
                            style="margin-left: 25px;width: 290px;" disabled=""></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><label><strong>Fecha Inicio :</strong><br></label><input type="date"
                            name="date_start" style="margin-left: 20px;"></div>
                </div>
                <div class="col">
                    <div class="form-group"><label><strong>Fecha Final:</strong><br></label><input type="date"
                            name="date_end" style="margin-left: 20px;"></div>
                </div>
                <div class="col"></div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><label><strong>Cargo :</strong><br></label><input type="text" name="cargo"
                            value="cargo" style="width: 100%;" disabled=""></div>
                </div>
                <div class="col">
                    <div class="form-group"><label><strong>Planificación :</strong><br></label><input type="text"
                            name="name" value="planificacion" style="width: 100%;" disabled=""></div>
                </div>
                <div class="col">
                    <div class="form-group"><label><strong>Horarios :</strong><br></label><input type="text"
                            name="horarios" value="00:00" style="width: 100%;" disabled=""></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
