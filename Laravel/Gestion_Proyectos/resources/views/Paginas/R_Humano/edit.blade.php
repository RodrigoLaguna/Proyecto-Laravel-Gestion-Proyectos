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
                        <h1>Editar Recurso Humano</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/r_humano')}}">Tareas</a></li>
                            <li class="breadcrumb-item active">Editar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <form action="{{url('/r_humano/'.$r_humano->ID_R_Humano)}}" method="POST" id="CreateForm" enctype="multipart/form-data">
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
                                    <label for="Nombre_Recurso">Nombre del recurso</label>
                                    <input value="{{$r_humano->Nombre_Recurso}}" type="text" id="Nombre_Recurso" name="Nombre_Recurso" class="form-control" required placeholder="Titulo">
                                </div>

                                <div class="form-group">
                                    <label for="Empleado">Empleado</label>
                                    <select class="form-control custom-select" id="Empleado" name="Empleado" required>
                                        <option value="{{$r_humano->ID_Empleado}}">{{$r_humano->Nombre}} {{$r_humano->AppelidoPat}} {{$r_humano->AppelidoMat}}</option>
                                        @foreach($persona as $key => $value)
                                            <option value="{!!$value->ID_Empleado!!}">{{$value->Nombre}} {{$value->AppelidoPat}} {{$value->AppelidoMat}}</option>
                                        @endforeach
                                    </select>
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
