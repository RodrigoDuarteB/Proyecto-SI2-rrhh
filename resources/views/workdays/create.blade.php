@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Agregar Asistencia</h4>
                            <p class="card-category">Ingrese los datos correspondientes</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ url('workdays')}}" method="post">
                                    {{ csrf_field() }}
                                    <label class="col-sm-2 col-form-label" for="nombre">{{'Nombre: '}}</label>
                                    <input required type="text" name="nombre" id="nombre" >
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit"  class="btn btn-primary">{{ __('Agregar') }}</button>
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
