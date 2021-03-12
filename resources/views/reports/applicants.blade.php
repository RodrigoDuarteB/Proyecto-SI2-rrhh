@extends('layouts.app')
@section('title', 'Reportes de Postulantes')
@section('content')
    <h1>Listado General de Postulantes</h1>
    <div class="table-responsive table-bordered table table-hover table-bordered results">
        @if(count($applicants) >= 1)
            <div class="card" style="font-size: 20px; font-weight: bold">
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center" id="employees">
                        <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd">id</th>
                            <th id="trs-hd">Nombre Completo</th>
                            <th id="trs-hd">Telefono Personal</th>
                            <th id="trs-hd">Nacionalidad</th>
                            <th id="trs-hd">Sexo</th>
                            <th id="trs-hd">Cargo que postuló</th>
                            <th id="trs-hd">Fecha de Postulacion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applicants as $applicant)
                            <tr>
                                <td>{{ $applicant->id }}</td>
                                <td>{{ $applicant->name.' '.$applicant->last_name }}</td>
                                <td>{{ $applicant->personal_phone }}</td>
                                <td>{{ $applicant->nationality }}</td>
                                <td>{{ $applicant->sex }}</td>
                                <td>{{ $applicant->job->name }}</td>
                                <td>{{ $applicant->created_at }}</td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <x-alert>
                <x-slot name="message">
                    No hay Postulantes registrados aún
                </x-slot>
            </x-alert>
        @endif
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
            },
            dom: 'Bfrt',
            buttons: [
                'excel', 'pdf'
            ]
        });
    </script>
@endsection
