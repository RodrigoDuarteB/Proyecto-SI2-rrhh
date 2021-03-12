@extends("layouts.app")

@section('title', 'Show - Cargo')


@section('content')
    @include('layouts.session-messages')

    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">DETALLE DEL CARGO</p>
                            </div>
                            <div class="card-body">
                                <form>

                                    <div class="col">
                                        <div class="form-group">
                                            <div class="col-xl-12 offset-xl-0">

                                                <div class="form-group row">
                                                    <label style="color: #2196F3" class="col-sm-2 col-form-label "
                                                        for="first_name"><strong>Nombre:</strong><br></label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label " for="
                                                            name"><strong>{{ $job->name }}</strong><br></label>
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <label style="color: #2196F3" class="col-sm-2 col-form-label "
                                                        for="first_name"><strong>DESCIPCION:</strong><br></label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label
                                                            for="ID_employed"><strong>{{ $job->description }}</strong><br></label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="color: #2196F3" class="col-sm-2 col-form-label "
                                                        for="first_name"><strong>Salario Base:</strong><br></label>
                                                    <div class="col-sm-10 mt-2">
                                                        <label for="name"><strong>{{ $job->base_salary }}
                                                            </strong><br></label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="color: #2196F3" class="col-sm col-form-label "
                                                        for="first_name"><strong>Departamento
                                                            Perteneciente:</strong><br></label>
                                                    <div class="col-sm-10 mt-2">
                                                        <label
                                                            for="name"><strong>{{ $job->department->name }}</strong><br></label>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="text-right">
                                                    <a class="btn btn-danger "  href="/jobs/">Volver</a>
                                                    <a class="btn btn-primary "  href="/jobs/{{ $job->id }}/edit">Editar Cargo</a>
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
