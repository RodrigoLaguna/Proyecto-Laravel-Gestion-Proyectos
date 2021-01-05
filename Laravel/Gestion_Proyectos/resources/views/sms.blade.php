@extends('plantilla')
@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('proyectos.create')}}" class="nav-link">Añadir Empleado</a>
    </li>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1419.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Enviar SMS  <i class="fas fa-sms"></i></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Mensajes</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{url('/enviarSMS')}}" method="post" id="CreateForm">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Mensaje</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Telefono">Número de teléfono</label>
                                <input type="text" id="Telefono" name="Telefono" class="form-control ">

                            </div>
                            <div class="form-group">
                                <label for="Mensaje">Mensaje</label>
                                <textarea id="Mensaje" name="Mensaje" rows="3" class="form-control"></textarea>
                            </div>
                            <button type="submit" style="float: right" class="btn btn-dark btn-sm">Enviar</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            </form>
        </section>
        <!-- /.content -->
    </div>





@endsection
