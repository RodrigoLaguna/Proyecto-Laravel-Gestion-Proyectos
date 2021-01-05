@extends('plantilla')
@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('r_humano.create')}}" class="nav-link">Añadir Recurso Humano</a>
    </li>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1203.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Simple Tables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Recursos Humanos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listado de Recursos Humanos</h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nombre del recurso</th>
                                    <th>Nombre de personal</th>
                                    <th>Puesto</th>
                                    <th>Departamento</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($r_humano as $r_human)
                                <tr>
                                    <td>{{$r_human->Nombre_Recurso}}</td>
                                    <td>{{$r_human->Nombre}} {{$r_human->AppelidoPat}} {{$r_human->AppelidoMat}}</td>
                                    <td>{{$r_human->Puesto}}</td>
                                    <td>{{$r_human->Departamento}}</td>

                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{url('/r_humano/'.$r_human->ID_R_Humano.'/edit')}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </a>
                                        <a>
                                            <form  method="post" action="{{route('r_humano.destroy',$r_human->ID_R_Humano)}}"
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
