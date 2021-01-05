@extends('plantilla')
@section('agregar')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('proyectos.create')}}" class="nav-link">Añadir proyecto</a>
    </li>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 2343.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Proyecto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/index')}}">Proyectos</a></li>
                            <li class="breadcrumb-item active">Editar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <form action="{{url('/')}}/proyectos/{{$proyecto->Clave}}" method="POST" id="CreateForm" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <!-- Main content -->
        <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Titulo">Nombre del proyecto</label>
                                    <input type="text" id="Titulo" name="Titulo" class="form-control {{$errors->has('Titulo')?'is-invalid':''}}"
                                            placeholder="Titulo" value="{{$proyecto->Titulo}}">
                                    {!! $errors->first('Titulo','<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="Descripcion">Descripción</label>
                                    <textarea id="Descripcion" name="Descripcion" class="form-control {{$errors->has('Descripcion')?'is-invalid':''}}" rows="4"
                                               >{{$proyecto->Descripcion}}</textarea>
                                    {!! $errors->first('Descripcion','<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="Estatus">Estatus</label>
                                    <select class="form-control custom-select" id="Estatus" name="Estatus" >
                                        <option selected="" disabled="">{{$proyecto->Estatus}}</option>
                                        <option>En espera</option>
                                        <option>Cancelado</option>
                                        <option>Exito</option>
                                    </select>
                                </div>

                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label for="Fecha_inicio">Fecha inicio</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" id="Fecha_inicio" name="Fecha_inicio" class="form-control
                                                {{$errors->has('Fecha_inicio')?'is-invalid':''}}"
                                               data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"
                                               data-mask="" im-insert="false" value="{{$proyecto->Fecha_inicio}}">
                                        {!! $errors->first('Fecha_inicio','<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="Fecha_final">Fecha final</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" id="Fecha_final" name="Fecha_final" class="form-control
                                                {{$errors->has('Fecha_final')?'is-invalid':''}}"
                                               data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"
                                               data-mask="" im-insert="false"  value="{{$proyecto->Fecha_final}}">
                                        {!! $errors->first('Fecha_final','<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Lider de proyecto</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="Nombre">Nombre</label>
                                    <input type="text" value="{{$proyecto->Nombre}}" id="Nombre" name="Nombre"
                                           class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" placeholder="Nombre">
                                    {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="AppelidoPat">Apellido paterno</label>
                                    <input type="text" value="{{$proyecto->AppelidoPat}}" id="AppelidoPat" name="AppelidoPat"
                                           class="form-control {{$errors->has('AppelidoPat')?'is-invalid':''}}"  placeholder="Apellido paterno">
                                    {!! $errors->first('AppelidoPat','<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="AppelidoMat">Apellido materno</label>
                                    <input type="text" value="{{$proyecto->AppelidoMat}}" id="AppelidoMat" name="AppelidoMat"
                                           class="form-control {{$errors->has('AppelidoMat')?'is-invalid':''}}"  placeholder="Appelido materno">
                                    {!! $errors->first('AppelidoMat','<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="Fecha_Nacimiento">Fecha de nacimiento</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" value="{{$proyecto->Fecha_Nacimiento}}" id="Fecha_Nacimiento"
                                               name="Fecha_Nacimiento" class="form-control {{$errors->has('Fecha_Nacimiento')?'is-invalid':''}}" data-inputmask-alias="datetime"
                                               data-inputmask-inputformat="yyyy/mm/dd" data-mask="" im-insert="false" >
                                        {!! $errors->first('Fecha_Nacimiento','<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="Puesto">Puesto</label>
                                        <input type="text" value="{{$proyecto->Puesto}}" id="Puesto" name="Puesto"
                                               class="form-control {{$errors->has('Puesto')?'is-invalid':''}}" placeholder="Puesto">
                                        {!! $errors->first('Puesto','<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="Departamento">Departamento</label>
                                        <input type="text" value="{{$proyecto->Departamento}}" id="Departamento" name="Departamento"
                                               class="form-control {{$errors->has('Departamento')?'is-invalid':''}}"  placeholder="Departamento">
                                        {!! $errors->first('Departamento','<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div>
                                        <label for="Progreso">Progreso</label>
                                        <input type="text" value="{{$proyecto->Progreso}}" id="Progreso" name="Progreso"
                                               class="form-control {{$errors->has('Progreso')?'is-invalid':''}}"  placeholder="Progreso">
                                        {!! $errors->first('Progreso','<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div >
                                        <button type="submit" class="btn btn-success toastsDefaultSuccess float-right" form="CreateForm">
                                            Guardar
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <span></span>

                </div>
            </form>
        </section>
        <!-- /.content -->


    </div>



@endsection
