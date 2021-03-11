@extends('layouts.app')
    @section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-1" style="padding-bottom: 17px;"><strong>Ausencias</strong><br></h3>
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Solicitar Ausencia</p>
            </div>
            <form action="{{ route('absences.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group" style="margin-bottom: 30px;">
                                <label><strong>Título:</strong><br></label>
                                <input type="text" name="title" value="{{ old('title') }}"
                                       style="margin-left: 25px;width: 290px;">
                            </div>
                            <div class="form-group" style="margin-top: 33px;margin-bottom: 46px;">
                                <label><strong>Razón de la
                                        Solicitud :</strong><br></label>
                                <textarea style="margin-bottom: -35px;margin-left: 10px;" name="reason">{{ old('reason') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="last_name">
                                    <strong>Tipo de Solicitud:</strong><br></label>
                                <select class="form-control" id="exampleSelect-2" style="min-width: 0px|;" name="type">
                                    <option disabled selected value="">Elija una Opcion</option>
                                    <option value="1">Tipo1</option>
                                    <option value="2">Tipo2</option>
                                    <option value="3">Tipo3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>ID Empleado:</strong><br></label>
                                <input type="text" name="employee_id"
                                       value="{{ auth()->user()->employee->id }}" style="margin-left: 25px;" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Fecha Inicio :</strong><br></label>
                                <input type="date" name="begin" style="margin-left: 20px;" value="{{ old('begin') }}"></div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Fecha Final :</strong><br></label>
                                <input type="date" name="end" style="margin-left: 20px;" value="{{ old('end') }}"></div>
                        </div>
                    </div>
                    <div class="row justify-content-center h-100" style="margin-top: 13px;padding-top: 40px;">
                        <div class="col-sm-8 align-self-center text-center">
                            <button class="btn btn-success" type="submit" style="margin-right: 77px;">Solicitar</button>
                            <a class="btn btn-danger" role="button"
                               href="{{ route('absences.index') }}">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
