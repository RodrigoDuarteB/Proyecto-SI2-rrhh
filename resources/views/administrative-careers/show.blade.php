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
                        <div class="form-group" style="margin-bottom: 30px;">
                            <label><strong>Fecha de Ingreso la Empresa:</strong><br></label>
                            <input type="text" name="date" value="{{ $employee->created_at }}"
                                style="margin-left: 25px;width: 290px;" disabled="">
                            </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label><strong>Tiempo Trabajando:</strong><br></label>
                            <input type="text" name="time" value="{{ \Carbon\Carbon::createFromDate($employee->created_at, 'America/La_Paz')->diffForHumans() }}" style="margin-left: 25px;" disabled="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Contrato Vigente<br></p>
            </div>
            <div class="card-body">
                @php
                    $currentContract = $employee->currentContract()
                @endphp
                @if($currentContract != null)
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group" style="margin-bottom: 30px;">
                                <label><strong>Título de Contrato :&nbsp;&nbsp;</strong><br></label>
                                <input type="text" name="title" value="{{ $currentContract->name }}" style="margin-left: 25px;width: 290px;" disabled="">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Fecha Inicio :</strong><br></label>
                                <input type="date" name="date_start" style="margin-left: 20px;"
                                       value="{{ $currentContract->initial_date }}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Fecha Final:</strong><br></label>
                                <input type="date" name="date_end" style="margin-left: 20px;"
                                       value="{{ $currentContract->final_date }}" disabled>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Cargo :</strong><br></label>
                                <input type="text" name="cargo" value="{{ $currentContract->job->name }}"
                                       style="width: 100%;" disabled="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Planificación :</strong><br></label>
                                <input type="text"
                                       name="name" value="{{ $currentContract->planning->name }}" style="width: 100%;" disabled="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Horarios :</strong><br></label>
                                <input type="text"
                                       name="horarios"
                                       value="{{ $currentContract->planning->schedule->clock_in }}" style="width: 100%;" disabled="">
                            </div>
                        </div>
                    </div>
                @else
                    <x-alert>
                        <x-slot name="message">
                            Sin contrato actual
                        </x-slot>
                    </x-alert>
                @endif
            </div>
        </div>
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Contratos Pasados<br></p>
            </div>
            <div class="card-body">
                @forelse($employee->contracts->where('id', '!=', $currentContract->id) as $contract)
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group" style="margin-bottom: 30px;">
                                <label><strong>Título de Contrato :&nbsp;&nbsp;</strong><br></label>
                                <input type="text" name="title" value="{{ $contract->name }}" style="margin-left: 25px;width: 290px;" disabled="">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Fecha Inicio :</strong><br></label>
                                <input type="date" name="date_start" style="margin-left: 20px;"
                                       value="{{ $contract->initial_date }}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Fecha Final:</strong><br></label>
                                <input type="date" name="date_end" style="margin-left: 20px;"
                                       value="{{ $contract->final_date }}" disabled>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Cargo :</strong><br></label>
                                <input type="text" name="cargo" value="{{ $contract->job->name }}"
                                       style="width: 100%;" disabled="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Planificación :</strong><br></label>
                                <input type="text"
                                       name="name" value="{{ $contract->planning->name }}" style="width: 100%;" disabled="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Horarios :</strong><br></label>
                                <input type="text"
                                       name="horarios"
                                       value="{{ $contract->planning->schedule->clock_in }}" style="width: 100%;" disabled="">
                            </div>
                        </div>
                    </div>
                @empty
                    <x-alert>
                        <x-slot name="message">
                            No hay Otros Contratos para ver
                        </x-slot>
                    </x-alert>
                @endforelse
            </div>
        </div>
    </div>

    @endsection
