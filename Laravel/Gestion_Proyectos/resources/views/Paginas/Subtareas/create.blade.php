@extends('plantilla')
@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('subtareas.create')}}" class="nav-link">Añadir subtarea</a>
    </li>
@endsection
@section('content')

    <div class="content-wrapper" style="min-height: 2343.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Añadir Tarea</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/subtareas')}}">Subtareas</a></li>
                            <li class="breadcrumb-item active">Crear</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <form action="{{route('subtareas.store')}}" method="post" id="CreateForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Proyecto" class="control-label">Proyecto </label>
                                    <select class="form-control" id="Proyecto" name="Proyecto">
                                        <option selected="" disabled="">Selecciona</option>
                                        @foreach($proyectos as $proyect)
                                            <option value="{{$proyect->Clave}}">{{$proyect->Titulo}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Tarea" class="control-label">Tarea</label>
                                    <select  id="Tarea" name="Tarea" class="form-control">
                                        <option selected="" disabled="">Selecciona</option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Titulo">Titulo</label>
                                    <input type="text" id="Titulo" name="Titulo" class="form-control" required placeholder="Titulo">
                                </div>

                                <div class="form-group">
                                    <label for="Descripcion">Descripción</label>
                                    <textarea id="Descripcion" name="Descripcion" class="form-control" rows="4" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="Duracion">Duracion estimada</label>
                                    <input type="text" id="Duracion" name="Duracion" class="form-control" required placeholder="Duración">
                                </div>
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label for="Fecha_inicio">Fecha inicio</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" id="Fecha_inicio" name="Fecha_inicio" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask="" im-insert="false" required>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" value="Crear Proyecto" class="btn btn-success toastsDefaultSuccess float-right" form="CreateForm">
                                        Crear
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <span></span>
            </form>
        </section>
        <!-- /.content -->
    </div>



@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#Proyecto").change(function(){
                var proyecto = $(this).val();
                $.get( 'http://localhost/Laravel/Gestion_Proyectos/public/tarea/' + proyecto, function(data){
                    //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
                    console.log(data);
                    var producto_select = '<option value="">Seleccione tarea</option>'
                    for (var i=0; i<data.length;i++)
                        producto_select+='<option value="'+data[i].Clave +'">'+data[i].Titulo+'</option>';

                    $("#Tarea").html(producto_select);

                });
            });
        });
    </script>
@endsection


