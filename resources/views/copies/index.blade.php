
        <div class="table-responsive">
            <table id="tablepro" class="table table-bordered table-hover" style="width:100%">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd">ID</th>
                        <th id="trs-hd">Fecha</th>
                        <th id="trs-hd">Entrada</th>
                        <th id="trs-hd">Salida</th>
                        <th id="trs-hd">Latitud</th>
                        <th id="trs-hd">Longitud</th>
                        <th id="trs-hd">Estado</th>
                        <th id="trs-hd">ID Empleado</th>
                        <th class="text-right">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($workdays == '[]')
                        <tr>
                            <td> Aún no se ha registrado ningúna asistencia</td>
                        </tr>
                    @else
                        @foreach($workdays as $key => $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>
                                @php
                                    $fecha = new DateTime($data->date);
                                    $fecha->modify('-4 hours');
                                    //echo $fecha->format('d-m-Y H:i:s');
                                    echo $fecha->format('d-m-Y');
                                @endphp
                            </td>
                            <td>
                                @php
                                    $clock_in = new DateTime($data->date . " " . $data->clock_in);
                                    $clock_in->modify('-4 hours');
                                    echo $clock_in->format('H:i:s');
                                @endphp
                            </td>
                            <td>
                                @php
                                    $clock_out = new DateTime($data->date . " " . $data->clock_out);
                                    $clock_out->modify('-4 hours');
                                    echo $clock_out->format('H:i:s');
                                @endphp
                            </td>
                            <td>{{$data->latitude}}</td>
                            <td>{{$data->longitude}}</td>
                            <td>
                                @switch($data->status)
                                    @case(1)
                                        {{ 'Presente' }}
                                        @break
                                    @case(2)
                                        {{ 'Atrasado' }}
                                        @break
                                    @case(3)
                                        {{ 'Falta' }}
                                        @break
                                    @default
                                        {{ 'Sin registrar' }}
                                @endswitch
                            </td>
                            <td>{{ $data->name }}</td>
                            <td>
                                <div class="text-center">
                                    <form action="{{ route('workdays.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" style="margin-left: 5px;" type="submit">
                                            <i class="fa fa-trash" style="font-size: 15px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection
@section('table-scripts')
    <script>
        $('#tablepro').DataTable({
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
