@extends('layouts.app')

@section('content')

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @include('Modulos.sidebar')


            <div class="content-wrapper" style="min-height: 2343.6px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Inicio</h1>
                                {{ Auth::user()->name }}
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>


            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Proyectos</h3>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped projects" >
                            <thead>
                                <tr>
                                    <th style="width: 20%">
                                        Nombre del proyecto
                                    </th>
                                    <th style="width: 20%">
                                        Progreso
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Estatus
                                    </th>
                                    <th style="width: 15%">
                                    </th>
                                </tr>
                             </thead>
                            {{--Contenido de la tabla--}}
                            <tbody>
                        @foreach($proyecto as $key => $value)
                            <tr>
                                {{--Titulo del proyecto--}}
                                <td>
                                    <a>
                                        {{$value["Titulo"]}}
                                    </a>
                                </td>

                                {{--Progreso--}}
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-cyan" role="progressbar" aria-volumemin="0" aria-volumemax="100" style="width: {!!$value['Progreso'] !!}%">
                                        </div>
                                    </div>
                                    <small>
                                        {{$value["Progreso"]}}% Completo
                                    </small>
                                </td>

                                {{--Estatus--}}
                                <td class="project-state">
                                    @if ($value['Estatus'] == 'Exito')
                                        <span class="badge badge-success">{{$value['Estatus']}}</span>
                                    @elseif($value['Estatus'] == 'En espera')
                                        <span class="badge badge-warning">{{$value['Estatus']}}</span>
                                    @elseif($value['Estatus'] == 'Cancelado')
                                        <span class="badge badge-danger">{{$value['Estatus']}}</span>
                                    @endif

                                </td>

                                {{--Acciones--}}
                                <td >
                                    <a class="btn btn-primary btn-sm" href="{{url('verProyectos/'.$value->Clave)}}"  >
                                        <i class="fas fa-folder">
                                        </i>
                                        Ver
                                    </a>
                                    <a class="btn btn-info btn-sm"  href="{{url('/proyectos/'.$value->Clave.'/edit')}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Editar
                                    </a>
                                    <a>
                                        <form  method="post" action="{{route('proyectos.destroy',$value->Clave)}}"
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
                </div>

                <div>
                    <script type="text/javascript">
                        Ploty.newPlot();
                    </script>
                </div>

            </section>

            </div>
@endsection
