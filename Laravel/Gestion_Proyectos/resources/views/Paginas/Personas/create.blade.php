@extends('plantilla')
@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('proyectos.create')}}" class="nav-link">Añadir Empleado</a>
    </li>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 2343.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Añadir Empleado</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/empleado')}}">Empleado</a></li>
                            <li class="breadcrumb-item active">Crear</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <form action="{{url('empleado')}}" method="post" id="CreateForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Lider de proyecto</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Telefono">Telefono</label>
                                    <input type="tel" id="Telefono" name="Telefono" class="form-control" placeholder="Telefono">
                                </div>

                                <div class="form-group">
                                    <label for="Nombre">Nombre</label>
                                    <input type="text" id="Nombre" name="Nombre" class="form-control" required placeholder="Nombre">
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
                                </div>

                                <div class="form-group">
                                    <label for="Puesto">Puesto</label>
                                    <input type="text" id="Puesto" name="Puesto" class="form-control" required placeholder="Puesto">
                                </div>

                                <div class="form-group">
                                    <label for="Departamento">Departamento</label>
                                    <input type="text" id="Departamento" name="Departamento" class="form-control" required placeholder="Departamento">
                                </div>

                                <div class="form-group">
                                    <label for="Fotografia">Fotografia</label>
                                    <input type="file" id="Fotografia" name="Fotografia" class="form-control" required>
                                </div>

                                <div >
                                    <button type="submit" value="Crear Proyecto" class="btn btn-success toastsDefaultSuccess float-right" form="CreateForm">
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



