@extends('plantilla')
@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('empleado.create')}}" class="nav-link">Añadir Empleado</a>
    </li>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 2343.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Empleado</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/empleado')}}">Empleado</a></li>
                            <li class="breadcrumb-item active">Editar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <form action="{{url('/')}}/empleado/{{$empleado->ID_Empleado}}" method="POST" id="CreateForm" enctype="multipart/form-data">
        @method('PUT')
        @csrf

            <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Empleado</h3>
                                </div>
                                <div class="card-body">

                                    <div class="card-img-top" align="center">
                                        <img class="img-fluid img-bordered-sm img-circle" style="width: 18rem" src="{{asset('images/'.$empleado->Fotografia)}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Nombre">Nombre</label>
                                        <input type="text" id="Nombre" name="Nombre" class="form-control" required placeholder="Nombre"
                                               value="{{$empleado->Nombre}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Telefono">Telefono</label>
                                        <input type="tel" id="Telefono" name="Telefono" class="form-control" placeholder="Telefono"
                                               value="{{$empleado->Telefono}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="AppelidoPat">Apellido paterno</label>
                                        <input type="text" id="AppelidoPat" name="AppelidoPat" class="form-control"
                                               required placeholder="Apellido paterno" value="{{$empleado->AppelidoPat}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="AppelidoMat">Apellido materno</label>
                                        <input type="text" id="AppelidoMat" name="AppelidoMat" class="form-control"
                                               required placeholder="Appelido materno" value="{{$empleado->AppelidoMat}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Fecha_Nacimiento">Fecha de nacimiento</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" id="Fecha_Nacimiento" name="Fecha_Nacimiento" class="form-control"
                                                   data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask=""
                                                   im-insert="false" required value="{{$empleado->Fecha_Nacimiento}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Puesto">Puesto</label>
                                        <input type="text" id="Puesto" name="Puesto" class="form-control" required placeholder="Puesto"
                                               value="{{$empleado->Puesto}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Departamento">Departamento</label>
                                        <input type="text" id="Departamento" name="Departamento" class="form-control" required
                                               placeholder="Departamento" value="{{$empleado->Departamento}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Fotografia">Fotografia</label>
                                        <input type="file" id="Fotografia" name="Fotografia" class="form-control">
                                    </div>

                                    <div >
                                        <button type="submit" value="Crear Proyecto" class="btn btn-success toastsDefaultSuccess float-right" form="CreateForm">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-dark">


                        </div>


                        <span></span>
                    </div>


            </section>
        </form>


    </div>





@endsection
