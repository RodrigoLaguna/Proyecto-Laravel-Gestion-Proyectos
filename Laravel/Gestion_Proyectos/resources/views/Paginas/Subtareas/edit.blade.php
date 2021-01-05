@extends('plantilla')
@section('AgregarProyecto')
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
                        <h1>Añadir Subtarea</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/subtareas')}}">Subtareas</a></li>
                            <li class="breadcrumb-item active">Crear</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Proyecto" class="control-label">Proyecto </label>
                                    <select class="form-control" id="Proyecto" name="Proyecto">
                                        <option selected="{{$subtarea->Proyecto}}" disabled="{{$subtarea->Proyecto}}">{{$subtarea->Proyecto}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Tarea" class="control-label">Tarea</label>
                                    <select  id="Tarea" name="Tarea" class="form-control">
                                        <option selected="{{$subtarea->Tarea}}" disabled="{{$subtarea->Tarea}}">{{$subtarea->Tarea}}</option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <form action="{{url('/subtareas/'.$subtarea->Clave)}}" method="POST" id="CreateForm" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                <div class="form-group">
                                    <label for="Titulo">Titulo</label>
                                    <input type="text" id="Titulo" name="Titulo" class="form-control" required placeholder="Titulo" value="{{$subtarea->Titulo}}">
                                </div>

                                <div class="form-group">
                                    <label for="Descripcion">Descripción</label>
                                    <textarea id="Descripcion" name="Descripcion" class="form-control" rows="4" required>{{$subtarea->Descripcion}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="Duracion">Duracion estimada</label>
                                    <input type="text" id="Duracion" name="Duracion" class="form-control" required placeholder="Duración" value="{{$subtarea->Duracion}}">
                                </div>
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label for="Fecha_inicio">Fecha inicio</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" value="{{$subtarea->Fecha_inicio}}" id="Fecha_inicio" name="Fecha_inicio" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask="" im-insert="false" required>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" value="Crear Proyecto" class="btn btn-success toastsDefaultSuccess float-right" form="CreateForm">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <span></span>
            </form>
        </section>
        <!-- /.content -->
    </div>



@endsection
