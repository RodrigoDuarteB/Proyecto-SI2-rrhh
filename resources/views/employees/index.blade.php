@extends('layouts.app')
    @section('content')
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        <h2>Empleados</h2>
        <a class="btn btn-primary" type="button" href="{{ route('employees.create') }}">Nuevo Empleado</a>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            <table class="table table-bordered table-hover">
                <thead class="bill-header cs">
                <tr>
                    <th id="trs-hd" class="col-lg-1" style="width: 200px;">SL. No.</th>
                    <th id="trs-hd" class="col-lg-2">Area</th>
                    <th id="trs-hd" class="col-lg-3">Customer Name</th>
                    <th id="trs-hd" class="col-lg-2">Company Name</th>
                    <th id="trs-hd" class="col-lg-2">Member Since</th>
                    <th id="trs-hd" class="col-lg-2">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr class="warning no-result">
                    <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                </tr>
                <tr>
                    <td>01</td>
                    <td>India</td>
                    <td>Souvik Kundu</td>
                    <td>Bootstrap Stuido</td>
                    <td>2014</td>
                    <td><button class="btn btn-success" style="margin-left: 5px;" type="submit"><i class="fa fa-check" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                </tr>
                </tbody>
            </table>
        </div>
    @endsection

