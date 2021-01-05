@extends('plantilla')

@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('empleado.create')}}" class="nav-link">Añadir Empleado</a>
    </li>
@endsection

@section('content')

    <div class="wrapper ">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1419.6px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Empleados</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('/index')}}">Inicio</a></li>
                                <li class="breadcrumb-item active">Empleado</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row d-flex align-items-stretch">
                            @foreach($empleados as $empleado)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light">
                                    <div class="card-header text-muted border-bottom-0">
                                        {{$empleado->Puesto}}
                                    </div>

                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{$empleado->Nombre}} {{$empleado->AppelidoPat}} {{$empleado->AppelidoMat}}</b></h2>
                                                <p class="text-muted text-sm"><b>Departamento: </b> {{$empleado->Departamento}} </p>
                                                <p class="text-muted text-sm"><b>Fecha de Nacimiento: </b>{{$empleado->Fecha_Nacimiento}}</p>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="images/{{$empleado->Fotografia}}" alt="" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a class="btn btn-info btn-sm"  href="{{url('/empleado/'.$empleado->ID_Empleado.'/edit')}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Editar
                                            </a>
                                            <a>
                                                <form  method="post" action="{{route('empleado.destroy',$empleado->ID_Empleado)}}"
                                                       onclick="return confirm('¿Estas seguro de eliminar el empleado?')" style="display: inline">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" value="eliminar" class="btn btn-danger btn-sm">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="row text-center">
                        <div class="col-12 text-center">
                            {{ $empleados->links() }}
                        </div>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



@endsection

