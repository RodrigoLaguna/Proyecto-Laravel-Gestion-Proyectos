@extends('plantilla')
@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('r_tecnologico.create')}}" class="nav-link">Añadir Recurso Tecnologico</a>
    </li>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1203.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Recursos Tecnologicos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Recursos Tecnologicos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <form action="{{route('r_tecnologico.store')}}" method="POST" id="CreateForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Agregar Recurso Tecnologico</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Nombre_Recurso">Nombre del recurso</label>
                                    <input type="text" id="Nombre_Recurso" name="Nombre_Recurso" class="form-control" required placeholder="Titulo">
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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listado de Recursos Tecnologicos</h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nombre del recurso</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($r_tec as $r_te)
                                    <tr>
                                        <td>{{$r_te->Nombre_Recurso}}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{url('/r_tecnologico/'.$r_te->ID_R_Tecnologico.'/edit')}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Editar
                                            </a>
                                            <a>
                                                <form  method="post" action="{{route('r_tecnologico.destroy',$r_te->ID_R_Tecnologico)}}"
                                                       onclick="return confirm('¿Estas seguro de eliminar el recurso?')" style="display: inline">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" value="eliminar" class="btn btn-danger btn-sm">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>


                        </div>


                        <!-- /.card-body -->
                    </div>


                </div>

            </div><!-- /.container-fluid -->


        </section>




        <!-- /.content -->
    </div>



@endsection
