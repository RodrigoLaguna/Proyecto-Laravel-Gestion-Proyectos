@extends('plantilla')
@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/tareas/crear')}}" class="nav-link">Añadir tarea</a>
    </li>
@endsection
@section('content')

    <div class="content-wrapper" style="min-height: 2343.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar tarea</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/tareas')}}">Tareas</a></li>
                            <li class="breadcrumb-item active">Editar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <form action="{{url('/tareas/'.$tareas->Clave)}}" method="POST" id="CreateForm" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Proyecto">Proyecto</label>
                                    <select class="form-control custom-select" id="Proyecto" name="Proyecto" required>
                                        <option selected="{{$proyectos->Clave}}" disabled="">{{$proyectos->Titulo}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Titulo">Titulo</label>
                                    <input value="{{$tareas->Titulo}}" type="text" id="Titulo" name="Titulo" class="form-control" required placeholder="Titulo">
                                </div>

                                <div class="form-group">
                                    <label for="Descripcion">Descripción</label>
                                    <textarea id="Descripcion" name="Descripcion" class="form-control" rows="4" required>{{$tareas->Descripcion}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="Duracion_Estimada">Duracion estimada</label>
                                    <input value="{{$tareas->Duracion_Estimada}}" type="text" id="Duracion_Estimada" name="Duracion_Estimada" class="form-control" required placeholder="Duración">
                                </div>
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label for="Fecha_inicio">Fecha inicio</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" id="Fecha_inicio" name="Fecha_inicio" class="form-control"
                                               data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"
                                               data-mask="" im-insert="false" required value="{{$tareas->Fecha_inicio}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Lider de proyecto</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="Encargado">Encargado</label>
                                    <select class="form-control custom-select" id="Encargado" name="Encargado" required>
                                        <option value="{{$tareas->ID_Empleado}}">{{$tareas->Nombre}} {{$tareas->AppelidoPat}} {{$tareas->AppelidoMat}}</option>
                                        @foreach($persona as $key => $value)
                                            <option value="{!!$value->ID_Empleado!!}">{{$value->Nombre}} {{$value->AppelidoPat}} {{$value->AppelidoMat}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="R_Humano">Recurso humano</label>
                                    <select class="form-control custom-select" id="R_Humano" name="R_Humano" required>
                                        <option value="{{$tareas->ID_R_Humano}}">{{$tareas->Nombre_Recurso}}</option>
                                        @foreach($r_humano as $key => $value)
                                            <option value="{!!$value->ID_R_Humano!!}">{{$value->Nombre_Recurso}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="R_Tecnologico">Recurso tecnologico</label>
                                    <select class="form-control custom-select" id="R_Tecnologico" name="R_Tecnologico" required>
                                        <option selected="" disabled="{{$tareas->RTec}}">{{$tareas->RTec}}</option>
                                        @foreach($r_Tecnologico as $key => $value)
                                            <option value="{{$value->ID_R_Tecnologico}}">{{$value->Nombre_Recurso}} {{$value->ID_R_Tecnologico}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Utilizacion">Utilización</label>
                                    <select class="form-control custom-select" id="Utilizacion" name="Utilizacion" required>
                                        <option value="{{$tareas->Utilizacion}}">{{$tareas->Utilizacion}}</option>
                                        <option>100</option>
                                        <option>50</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Progreso">Progreso</label>
                                    <input value="{{$tareas->Progreso}}" type="text" id="Progreso" name="Progreso" class="form-control" required placeholder="Duración">
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-success toastsDefaultSuccess float-right" form="CreateForm">
                                        Guardar
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <span></span>

                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>



@endsection
