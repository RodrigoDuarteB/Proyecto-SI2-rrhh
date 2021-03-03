@include('layouts.app')
    @section('content')
        <h3 class="text-dark mb-4">Gestión del Personal</h3>
        <div class="card shadow mb-5"></div>
        <div class="col-md-12 search-table-col" style="margin-top: 50px;margin-right: 0px;margin-bottom: 0px;">
            <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control"
                                                               placeholder="Buscar..."></div><span class="counter pull-right"></span><a
                class="btn btn-success active text-light border rounded border-dark shadow-sm" role="button"
                href="{{ route('employees.create') }}">Añadir Empleado</a>
            <div class="table-responsive table-bordered table table-hover table-bordered results">
                <table class="table table-bordered table-hover">
                    <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd" class="col-lg-1">Nombre</th>
                        <th id="trs-hd" class="col-lg-2">Cargo</th>
                        <th id="trs-hd" class="col-lg-3">Estado</th>
                        <th id="trs-hd" class="col-lg-2">Company Name</th>
                        <th id="trs-hd" class="col-lg-2">Asistencia</th>
                        <th id="trs-hd" class="col-lg-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
                    <tr>
                        <td>Benito Cala</td>
                        <td>Conserje</td>
                        <td>Activo</td>
                        <td>Bootstrap Stuido</td>
                        <td>Presente</td>
                        <td><a class="btn btn-primary" role="button"
                               style="margin-left: 5px;padding: 12px;padding-top: 2px;padding-right: 27px;padding-bottom: 4px;padding-left: 25px;margin-right: 7px;"
                               href="employees.edit">Modificar</a>
                            <button class="btn btn-danger" style="margin-left: 46px;" type="submit"><i
                                    class="fa fa-trash" style="font-size: 15px;"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

