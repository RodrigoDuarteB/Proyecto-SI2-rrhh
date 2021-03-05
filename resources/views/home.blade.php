@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Bienvenido &lt;@name&gt;</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3"
                style="width: 252px;margin-top: 4px;padding: 2px;margin-right: 2px;margin-left: 22px;padding-right: 0px;margin-bottom: -4px;padding-bottom: -7px;">
                <div class="card-body text-center shadow" style="margin: 13px;margin-top: 22px;"><img
                        class="rounded-circle mb-3 mt-4" data-aos="fade-down" data-aos-duration="850"
                        src="assets/img/dogs/image3.jpeg" width="160" height="160"></div>
            </div>
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
                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month
                            </p>
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
                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Bienvenido a RR.HH.</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="col-xl-12 offset-xl-0">
                                                <div class="form-group"><label
                                                        for="first_name"><strong>Nombres:</strong><br></label><label
                                                        for="name"
                                                        style="height: 23px;min-width: 0px;min-height: 0px;padding-right: 0px;padding-left: 62px;"><strong>nombre</strong><br></label>
                                                </div>
                                                <div class="form-group"><label
                                                        for="first_name"><strong>Apellidos:</strong><br></label><label
                                                        for="last_name"
                                                        style="height: 23px;min-width: 0px;min-height: 0px;padding-right: 0px;padding-left: 58px;"><strong>apellidos</strong><br></label>
                                                </div>
                                                <div class="form-group"><label
                                                        for="first_name"><strong>ID:</strong><br></label><label
                                                        for="ID_employed"
                                                        style="height: 23px;min-width: 0px;min-height: 0px;padding-right: 0px;padding-left: 114px;"><strong>id
                                                            del empleado</strong><br></label></div>
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
<div class="row" data-aos="fade-up"
    style="height: 124px;width: 997px;margin-right: 0px;margin-left: 123px;margin-top: 0px;text-align: left;padding-left: 0px;">
    <div class="col-md-6 col-xl-3 mb-4" style="text-align: center;">
        <div class="card shadow border-left-primary py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Earnings
                                (monthly)</span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span>$40,000</span></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-info py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Tasks</span></div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span>50%</span></div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 50%;"><span class="sr-only">50%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-warning py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Pending
                                Requests</span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span>18</span></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</div>
@endsection
