@extends("layouts.app")

@section('title', 'Show - Orders')


@section('content')

    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">DETALLE DE LA ORDEN</p>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="col-xl-12 offset-xl-0">

                                                <div class="form-group row">
                                                    <label style="color: #2196F3" class="col-sm-2 col-form-label "
                                                        for="first_name"><strong>TITULO:</strong><br></label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label " for="
                                                            name"><strong>{{ $orders->title }}</strong><br></label>
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <label style="color: #2196F3" class="col-sm-2 col-form-label "
                                                        for="first_name"><strong>DESCIPCION:</strong><br></label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label
                                                            for="ID_employed"><strong>{{ $orders->description }}</strong><br></label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="color: #2196F3" class="col-sm-2 col-form-label "
                                                        for="first_name"><strong>ENCARGADO:</strong><br></label>
                                                    <div class="col-sm-10 mt-2">
                                                        <label for="name"><strong>{{ $orders->employee->last_name }}
                                                                {{ $orders->employee->name }}</strong><br></label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="color: #2196F3" class="col-sm col-form-label "
                                                        for="first_name"><strong>CREADA:</strong><br></label>
                                                    <div class="col-sm-10 mt-2">
                                                        <label
                                                            for="name"><strong>{{ $orders->datetime }}</strong><br></label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="color: #2196F3"
                                                        class="col-sm col-form-label "><strong>ESTADO:</strong><br></label>
                                                    @if ($orders->employees != '[]')
                                                        @if ($orders->employees[0]->acomplished == true)
                                                            <div class="col-sm-10 mt-2">
                                                                <label for="name"><strong>Completada</strong><br></label>
                                                            </div>
                                                        @else
                                                            <div class="col-sm-10 mt-2">
                                                                <label for="name"><strong>En Proceso</strong><br></label>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="col-sm-10 mt-2">
                                                            <label for="name"><strong>En Proceso</strong><br></label>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group  text-right">
                                                    <a  class="btn btn-primary stretched-link" href="/orders/{{$orders->id}}/edit">Editar Orden</a>
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

    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">PERSONAL ASIGNADO A LA ORDEN</p>
                            </div>
                            <div class="card-body">
                                @if ($orders->employees != '[]')

                                    <div class="form-group row">
                                        @foreach ($orders->employees as $employees)

                                            <div class="card mb-3"
                                                style="width: 20rem;margin-top: 4px;padding: 2px;margin-right: 2px;margin-left: 22px;padding-right: 0px;margin-bottom: -4px;padding-bottom: -7px;">
                                                <div class="card-body text-center shadow"
                                                    style="margin: 13px;margin-top: 22px;"><img
                                                        class="rounded-circle mb-3 mt-4" data-aos="fade-down"
                                                        data-aos-duration="850" src="assets/img/dogs/image3.jpeg"
                                                        width="160" height="160">
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label class="card-title" for="name"
                                                            style="color: #2196F3"><strong>{{ $employees->employee->name }}
                                                                {{ $employees->employee->last_name }}</strong></label>
                                                    </div>
                                                    <div class="form-group row text-left">
                                                        <div class="col-form-label col-sm">
                                                            <label style="color: #2196F3"
                                                                class="card-title text-left">Asignado:</label>
                                                        </div>
                                                        <div class="mt-2">
                                                            <label for="name">{{ $employees->datetime }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row text-left">
                                                        <div class="col-form-label col-sm">
                                                            <label style="color: #2196F3"
                                                                class="card-title text-left">Contacto:</label>
                                                        </div>
                                                        <div class="mt-2">
                                                            <label
                                                                for="name">{{ $employees->employee->work_phone }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row text-left">
                                                        <div class="col-form-label col-sm">
                                                            <label style="color: #2196F3"
                                                                class="card-title text-left">Correo:</label>
                                                        </div>
                                                        <div class="mt-2">
                                                            <label
                                                                for="name">{{ $employees->employee->user->email }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  text-center">
                                                        <a href="#" class="btn btn-primary stretched-link">Ver Perfil</a>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center"><strong>NO HAY EMPLEADOS ASIGNADOS A ESTA ORDEN DE
                                            TRABAJO</strong></div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
