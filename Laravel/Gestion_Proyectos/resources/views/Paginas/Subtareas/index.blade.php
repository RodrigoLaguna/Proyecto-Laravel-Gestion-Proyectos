@extends('plantilla')
@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('subtareas.create')}}" class="nav-link">Añadir Subtarea</a>
    </li>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1203.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subtareas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/index')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Subtareas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        {{--combobox--}}
        <section class="content">
            <form action="{{url('/subtareas/view')}}" method="post" id="CreateForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <p>
                                    <label for="Clave">Proyecto </label>
                                    <select class="form-control custom-select" id="Clave" name="Clave" required>
                                        <option selected="Selecciona" disabled="Selecciona">Selecciona</option>
                                        @foreach($proyectos as $proyecto)
                                            <option value="{{$proyecto->Clave}}">{{$proyecto->Titulo}}</option>
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
    @if (isset($subtareas))
        <!-- Main content -->
            <section class="content">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Listado de subtareas</h3>
                                    <div class="card-tools">
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-left">
                                        <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Descripción</th>
                                            <th>Duración</th>
                                            <th>Fecha inicio</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subtareas as $subtarea)
                                            <tr>
                                                <td style="width: 10%">{{$subtarea->Titulo}}</td>
                                                <td style="width: 15%">{{$subtarea->Descripcion}}</td>
                                                <td style="width: 5%">{{$subtarea->Duracion}}</td>
                                                {{--<td><span class="tag tag-success">Approved</span></td>--}}
                                                <td style="width: 5%">{{$subtarea->Fecha_inicio}}</td>
                                                <td style="width: 10%">
                                                    <a class="btn btn-info btn-sm"  href="{{route('subtareas.edit',$subtarea->Clave)}}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Editar
                                                    </a>
                                                    <a>
                                                        <form  method="post" action="{{route('subtareas.destroy',$subtarea->Clave)}}"
                                                               onclick="return confirm('¿Estas seguro de eliminar el proyecto?')" style="display: inline">
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
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
               <!-- /.container-fluid -->
            </section>
    @endif



        <!-- /.content -->
    </div>

@endsection

