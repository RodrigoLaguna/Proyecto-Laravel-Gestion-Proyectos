@extends('plantilla')
@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('r_humano.create')}}" class="nav-link">Añadir Recurso Humano</a>
    </li>
@endsection
@section('content')

    <div class="content-wrapper" style="min-height: 2343.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Crear Recurso Humano</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/r_humano')}}">Recurso Humano</a></li>
                            <li class="breadcrumb-item active">Crear</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <form action="{{url('r_humano')}}" method="POST" id="CreateForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Nombre_Recurso">Nombre del recurso</label>
                                    <input type="text" id="Nombre_Recurso" name="Nombre_Recurso" class="form-control" required placeholder="Titulo">
                                </div>

                                <div class="form-group">
                                    <label for="Nombre">Nombre</label>
                                    <input type="text" id="Nombre" name="Nombre" class="form-control" required placeholder="Nombre de empleado">
                                </div>

                                <div class="form-group">
                                    <label for="AppelidoPat">Apellido paterno</label>
                                    <input type="text" id="AppelidoPat" name="AppelidoPat" class="form-control" required placeholder="Apellido paterno">
                                </div>

                                <div class="form-group">
                                    <label for="AppelidoMat">Apellido materno</label>
                                    <input type="text" id="AppelidoMat" name="AppelidoMat" class="form-control" required placeholder="Appelido materno">
                                </div>

                                <div class="form-group">
                                    <label for="Fecha_Nacimiento">Fecha de nacimiento</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" id="Fecha_Nacimiento" name="Fecha_Nacimiento" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask="" im-insert="false" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="Puesto">Puesto</label>
                                        <input type="text" id="Puesto" name="Puesto" class="form-control" required placeholder="Puesto">
                                    </div>

                                    <div class="form-group">
                                        <label for="Departamento">Departamento</label>
                                        <input type="text" id="Departamento" name="Departamento" class="form-control" required placeholder="Departamento">
                                    </div>

                                <div>
                                    <button type="submit" class="btn btn-success toastsDefaultSuccess float-right" form="CreateForm">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>



@endsection
