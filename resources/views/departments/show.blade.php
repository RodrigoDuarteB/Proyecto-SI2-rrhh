@extends("layouts.app")

@section('title', 'Show - Orders')


@section('content')
    <div class="row">

        <div class="col-lg-8">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Detalle del Departamento</p>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="col-xl-12 offset-xl-0">

                                                        <div class="form-group row">
                                                            <label style="color: #2196F3" class="col-sm-2 col-form-label "
                                                                for="first_name"><strong>NOMBRE:</strong><br></label>
                                                            <div class="col-sm-9 mt-2">
                                                                <label " for="
                                                                    name"><strong>{{ $department->name }}</strong><br></label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">

                                                            <label style="color: #2196F3" class="col-sm-2 col-form-label "
                                                                for="first_name"><strong>DESCRIPCION:</strong><br></label>
                                                            <div class="col-sm-9 mt-2">
                                                                <label
                                                                    for="ID_employed"><strong>{{ $department->description }}</strong><br></label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group  text-right">
                                                            <a class="btn btn-primary stretched-link"
                                                                href="/departments/{{ $department->id }}/edit">Editar
                                                                Departamento</a>
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
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Personal en este Departamento</p>
                                    </div>
                                    <div class="card-body">
                                        @if ($employees == '[]')
                                            <div class="text-center"><strong>Aún no se Integrado Personal a este
                                                    Departamento</strong></div>
                                        @else
                                        <div class="container">
                                            <table id="employees" class="table table-bordered table-hover" style="width:100%">
                                                <thead class="bill-header cs">
                                                    <tr>
                                                        <th id="trs-hd">Foto</th>
                                                        <th id="trs-hd">Nombres y Apellidos</th>
                                                        <th id="trs-hd">Cargo</th>
                                                        <th id="trs-hd">Corprativo</th>
                                                        <th id="trs-hd">Email</th>
                                                        <th id="trs-hd">Acciones</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @foreach ($employees as $employee)
                                                        @foreach ($employee->jobs as $jobs)
                                                            @foreach ($jobs->contracts as $contracts)


                                                                <tr>
                                                                    <td>
                                                                        <div class="card-body text-center shadow"
                                                                            style="margin: 1px;margin-top: 1px;"><img
                                                                                class="rounded-circle mb-2 mt-3"
                                                                                data-aos="fade-down" data-aos-duration="850"
                                                                                src="assets/img/dogs/image3.jpeg" width="20"
                                                                                height="20">
                                                                        </div>
                                                                    </td>
                                                                    <td class="align-center">{{ $contracts->employee->name }}
                                                                        {{ $contracts->employee->last_name }}</td>
                                                                    <td>{{ $jobs->name }}</td>
                                                                    <td>{{ $contracts->employee->work_phone }}</td>
                                                                    <td>{{ $contracts->employee->user->email }}</td>
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <a class="btn btn-primary"
                                                                                style="margin-left: 5px;"
                                                                                href="/departments"><i class="fa fa-eye"
                                                                                    style="font-size: 15px;"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Encargado de Departamento</p>
                                    </div>
                                    <div class="card-body">
                                        @if ($department->employee_id != null)

                                            <div class="form-group row">



                                                <div class="card-body text-center shadow"
                                                    style="margin: 20px;margin-top: 20px;"><img
                                                        class="rounded-circle mb-3 mt-4" data-aos="fade-down"
                                                        data-aos-duration="850" src="assets/img/dogs/image3.jpeg"
                                                        width="190" height="190">
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label class="card-title" for="name"
                                                            style="color: #2196F3"><strong>{{ $department->manager->name }}
                                                                {{ $department->manager->last_name }}</strong></label>
                                                    </div>
                                                    <div class="form-group row text-left">
                                                        <div class="col-form-label col-sm">
                                                            <label style="color: #2196F3"
                                                                class="card-title text-left">Cargo:</label>
                                                        </div>
                                                        <div class="mt-2">
                                                            @if($department->manager->contracts != '[]')
                                                            <label
                                                                >{{ $department->manager->contracts[0]->job->name }}</label>
                                                        @else
                                                        <label >Aún no cuenta con un Cargo Asignado</label>
                                                        @endif
                                                            </div>
                                                    </div>
                                                    <div class="form-group row text-left">
                                                        <div class="col-form-label col-sm">
                                                            <label style="color: #2196F3"
                                                                class="card-title text-left">Contacto:</label>
                                                        </div>
                                                        <div class="mt-2">
                                                            <label
                                                                for="name">{{ $department->manager->work_phone }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row text-left">
                                                        <div class="col-form-label col-sm">
                                                            <label style="color: #2196F3"
                                                                class="card-title text-left">Correo:</label>
                                                        </div>
                                                        <div class="mt-2">
                                                            <label
                                                                for="name">{{ $department->manager->user->email }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  text-center">
                                                        <a href="#" class="btn btn-primary stretched-link">Ver
                                                            Perfil</a>
                                                    </div>
                                                </div>



                                            </div>
                                        @else
                                            <div class="text-center"><strong>Aún no se Asigna</strong></div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('other-scripts')
    <script>
        $('#employees').DataTable({
            responsive: true,
            autoWidth: false,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "Ningun Resultado - disculpe",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Sin registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior",
                },
            }
        });

    </script>
@endsection