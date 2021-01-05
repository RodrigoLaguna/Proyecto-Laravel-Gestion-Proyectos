@extends('plantilla')

@section('agregar')
        <a href="{{route('proyectos.create')}}" class="nav-link">Añadir proyecto</a>
@endsection

@section('content')

    <div class="content-wrapper" style="min-height: 1419.6px;" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detalles del proyecto</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Fecha inicio</span>
                                            <span class="info-box-number text-center text-muted mb-0">{{$proyectos->Fecha_inicio}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Fecha fin</span>
                                            <span class="info-box-number text-center text-muted mb-0">{{$proyectos->Fecha_final}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Duración Estimada</span>
                                            <span class="info-box-number text-center text-muted mb-0">{{$duracion}} HRS<span>
                                            </span></span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div style="text-align: center" class="col-12 col-md-12 col-lg-4 order-1 order-md-2"><h4>Cronología</h4></div>
                                    {{--Grafica--}}
                                    <div class="col-12">
                                        <div class="post">
                                    <div id="chart_div" style="border-top-width: 10px;" ></div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <div class="post">
                                            <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                                <div style="text-align: center"><h4>Tareas incorporadas</h4></div>
                                                <div class="post">
                                                    {{--Tabla tareas--}}
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Tareas</th>
                                                            <th>Progreso</th>
                                                            <th style="width: 40px">Nivel</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($tareas as $tarea)
                                                            <tr>
                                                                <td>{{$tarea->Titulo}}</td>
                                                                <td>
                                                                    <div class="progress progress-xs">
                                                                        @if($tarea->Progreso <= 55 )
                                                                            <div class="progress-bar bg-danger" style="width: {!!$tarea->Progreso!!}%"></div>
                                                                        @elseif ($tarea->Progreso >= 56 && $tarea->Progreso <= 79)
                                                                            <div class="progress-bar bg-warning" style="width: {!!$tarea->Progreso!!}%"></div>
                                                                        @else
                                                                            <div class="progress-bar bg-success" style="width: {!!$tarea->Progreso!!}%"></div>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                @if($tarea->Progreso <= 55 )
                                                                    <td><span class="badge bg-danger">{{$tarea->Progreso}}</span></td>
                                                                @elseif ($tarea->Progreso >= 56 && $tarea->Progreso <= 79)
                                                                    <td><span class="badge bg-warning">{{$tarea->Progreso}}</span></td>
                                                                @else
                                                                    <td><span class="badge bg-success">{{$tarea->Progreso}}</span></td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$proyectos->Titulo}}</h3>
                            <p class="text-muted">{{$proyectos->Descripcion}}</p>
                            <br>
                            <div class="text-muted">
                                <p class="text-sm">Lider de Proyecto
                                    <b class="d-block">{{$proyectos->Nombre}} {{$proyectos->AppelidoPat}} {{$proyectos->AppelidoMat}}</b>
                                </p>
                                <p class="text-sm">Puesto
                                    <b class="d-block">{{$proyectos->Puesto}}</b>
                                </p>
                                <p class="text-sm">Departamento
                                    <b class="d-block">{{$proyectos->Departamento}}</b>
                                </p>
                            </div>
                            <div class="text-center mt-5 mb-3">
                                <a href="{{url('export/'.$proyectos->Clave)}}" class="btn btn-sm btn-success">Exportar XLS</a>
                                <a class="btn bg-dark btn-sm" href="{{url('generarPDF/'.$proyectos->Clave)}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Imprimir PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <head>
        <script type="text/javascript" src="{{ asset('JS/PLUGINS/http_www.gstatic.com_charts_loader.js')}}"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['gantt']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Task ID');
                data.addColumn('string', 'Task Name');
                data.addColumn('string', 'Resource');
                data.addColumn('date', 'Start Date');
                data.addColumn('date', 'End Date');
                data.addColumn('number', 'Duration');
                data.addColumn('number', 'Percent Complete');
                data.addColumn('string', 'Dependencies');

                var filas =[
                        @foreach($gantt as $gant)
                    ['{{$gant->Clave}}', '{{$gant->Titulo}}', '{{$gant->RTec}}',
                        new Date("{{$gant->Fecha_inicio}}"),
                        new Date("{{$gant->Fecha_fin}}"), null,{!! $gant->Progreso !!}, null],
                    @endforeach
                ];

                var numRows= 5;
                for (var i = 0; i < numRows; i++) {
                    data.addRow(filas[i]);
                }

                var options = {
                    height: 200,
                    gantt: {
                        trackHeight: 30
                    }
                };

                var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

                chart.draw(data, options);
            }
        </script>
    </head>
@endsection


