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
                        <h1>Editar Recurso Tecnologico</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('r_tecnologico.index')}}">Recursos Tecnologicos</a></li>
                            <li class="breadcrumb-item active">Editar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <form action="{{url('/r_tecnologico/'.$r_Tecno->ID_R_Tecnologico)}}" method="POST" id="CreateForm" enctype="multipart/form-data">
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
                                    <input value="{{$r_Tecno->Nombre_Recurso}}" type="text" id="Nombre_Recurso" name="Nombre_Recurso" class="form-control" required placeholder="Titulo">
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
