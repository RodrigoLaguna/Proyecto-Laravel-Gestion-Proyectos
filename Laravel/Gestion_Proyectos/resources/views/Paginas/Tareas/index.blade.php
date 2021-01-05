@extends('plantilla')
@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/tareas/crear')}}" class="nav-link">Añadir Tarea</a>
    </li>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1419.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tareas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/index')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Tareas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>



        {{--combobox--}}
        <section class="content ">
            <form action="{{url('/tareas/visualizar')}}" method="post" id="CreateForm">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <p>
                            <label for="Clave">Proyecto </label>
                            <select class="form-control custom-select" id="Clave" name="Clave" required>
                                <option selected="Selecciona" disabled="Selecciona">Selecciona</option>
                                @foreach($proyectos as $proyect)
                                <option value="{{$proyect->Clave}}">{{$proyect->Titulo}}</option>
                                @endforeach
                            </select>
                            </p>
                            <button type="submit" style="float: right" class="btn btn-dark btn-sm">Consultar</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </section>

    @if (isset($tareas))
            <div class="card" style="text-align: center" >
                <h4>{{$clave->Titulo}}</h4>
            </div>

            <div class="row">
                @foreach($tareas as $tarea)

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{$tarea->Titulo}}
                            </h3>
                        </div>
                        <table class="table table-striped projects">
                            <tbody>
                            <tr>
                                <td class="project_progress">
                                    <small>
                                        {{$tarea->Progreso}}% Completo
                                    </small>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-volumemin="0" aria-volumemax="100" style="width: {!!$tarea['Progreso'] !!}%">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>


                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Encargado</dt>
                                <dd class="col-sm-8">{{$tarea->Nombre}} {{$tarea->AppelidoPat}} {{$tarea->AppelidoMat}}</dd>
                                <dt class="col-sm-4">Descripción</dt>
                                <dd class="col-sm-8">{{$tarea->Descripcion}}</dd>
                                <dt class="col-sm-4">Duración estimada</dt>
                                <dd class="col-sm-8">{{$tarea->Duracion_Estimada}}</dd>
                                <dt class="col-sm-4">Fecha inicio</dt>
                                <dd class="col-sm-8">{{$tarea->Fecha_inicio}}</dd>
                                <dt class="col-sm-4">Fecha fin</dt>
                                <dd class="col-sm-8">{{$tarea->Fecha_fin}}</dd>
                                <dt class="col-sm-4">Utilización</dt>
                                <dd class="col-sm-8">{{$tarea->Utilizacion}}</dd>
                                <dt class="col-sm-4">Horas por dia</dt>
                                <dd class="col-sm-8">{{$tarea->HorasXdia}}</dd>
                                <dt class="col-sm-4">Dias empleados</dt>
                                <dd class="col-sm-8">{{$tarea->Dias_trabajados}}</dd>
                                <dt class="col-sm-4">Recurso Humano</dt>
                                <dd class="col-sm-8">{{$tarea->Nombre_Recurso}}</dd>
                                <dt class="col-sm-4">Recurso Tecnologíco</dt>
                                <dd class="col-sm-8">{{$tarea->RTec}}</dd>
                            </dl>
                        </div>

                        <div class="text-center mt-5 mb-3">
                            <a class="btn btn-info btn-sm"  href="{{url('/tareas/'.$tarea->Clave.'/edit')}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Editar
                            </a>
                            <a>
                                <form  method="post" action="{{url('/tareas/eliminar',$tarea->Clave)}}"
                                       onclick="return confirm('¿Estas seguro de eliminar la tarea?')" style="display: inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" value="eliminar" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                @endforeach
            </div>


    </div>
    @else

    @endif
@endsection
