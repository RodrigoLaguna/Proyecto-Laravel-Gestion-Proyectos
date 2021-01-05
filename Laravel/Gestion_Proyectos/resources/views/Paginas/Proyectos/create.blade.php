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
                        <h1>Añadir Proyecto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/index')}}">Proyectos</a></li>
                            <li class="breadcrumb-item active">Crear</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <form action="{{route('proyectos.store')}}" method="post" id="CreateForm">
                {{csrf_field()}}
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
                                           placeholder="Titulo" value="{{isset($proyecto->Titulo)?$proyecto->Titulo:old('Titulo')}}">
                                    {!! $errors->first('Titulo','<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="Descripcion">Descripción</label>
                                    <textarea id="Descripcion" name="Descripcion" class="form-control {{$errors->has('Descripcion')?'is-invalid':''}}"
                                              rows="4">{{isset($proyecto->Descripcion)?$proyecto->Descripcion:old('Descripcion')}}</textarea>
                                    {!! $errors->first('Descripcion','<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="Estatus">Estatus</label>
                                    <select class="form-control {{$errors->has('Estatus')?'is-invalid':''}} custom-select" id="Estatus" name="Estatus">
                                        {!! $errors->first('Estatus','<div class="invalid-feedback">:message</div>') !!}
                                        <option selected="" disabled="">Seleccione</option>
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
                                         <input type="date" id="Fecha_inicio" name="Fecha_inicio" class="form-control {{$errors->has('Fecha_inicio')?'is-invalid':''}}"
                                                data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask="" im-insert="false"
                                                value="{{isset($proyecto->Fecha_inicio)?$proyecto->Fecha_inicio:old('Fecha_inicio')}}">
                                                {!! $errors->first('Fecha_inicio','<div class="invalid-feedback">:message</div>') !!}
                                     </div>

                                 </div>

                                 <!-- Date dd/mm/yyyy -->
                                 <div class="form-group">
                                     <label for="Fecha_final">Fecha fin</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                         </div>
                                         <input type="date" id="Fecha_final" name="Fecha_final" class="form-control {{$errors->has('Fecha_final')?'is-invalid':''}}"
                                                data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask="" im-insert="false"
                                                value="{{isset($proyecto->Fecha_final)?$proyecto->Fecha_final:old('Fecha_final')}}">
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
                                    <input type="text" id="Nombre" name="Nombre" class="form-control {{$errors->has('Nombre')?'is-invalid':''}} "
                                           placeholder="Nombre" value="{{isset($proyecto->Nombre)?$proyecto->Nombre:old('Nombre')}}">
                                            {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="AppelidoPat">Apellido paterno</label>
                                    <input type="text" id="AppelidoPat" name="AppelidoPat" class="form-control {{$errors->has('AppelidoPat')?'is-invalid':''}}"
                                           placeholder="Apellido paterno" value="{{isset($proyecto->AppelidoPat)?$proyecto->AppelidoPat:old('AppelidoPat')}}">
                                            {!! $errors->first('AppelidoPat','<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="AppelidoMat">Apellido materno</label>
                                    <input type="text" id="AppelidoMat" name="AppelidoMat" class="form-control {{$errors->has('AppelidoMat')?'is-invalid':''}}"
                                           placeholder="Appelido materno" value="{{isset($proyecto->AppelidoMat)?$proyecto->AppelidoMat:old('AppelidoMat')}}">
                                            {!! $errors->first('AppelidoMat','<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="Fecha_Nacimiento">Fecha de nacimiento</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" id="Fecha_Nacimiento" name="Fecha_Nacimiento" class="form-control {{$errors->has('Fecha_Nacimiento')?'is-invalid':''}}"
                                               data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask="" im-insert="false"
                                               value="{{isset($proyecto->Fecha_Nacimiento)?$proyecto->Fecha_Nacimiento:old('Fecha_Nacimiento')}}">
                                                {!! $errors->first('Fecha_Nacimiento','<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                <div class="form-group">
                                    <label for="Puesto">Puesto</label>
                                    <input type="text" id="Puesto" name="Puesto" class="form-control {{$errors->has('Puesto')?'is-invalid':''}}"
                                           placeholder="Puesto" value="{{isset($proyecto->Puesto)?$proyecto->Puesto:old('Puesto')}}">
                                    {!! $errors->first('Puesto','<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="Departamento">Departamento</label>
                                    <input type="text" id="Departamento" name="Departamento" class="form-control {{$errors->has('Departamento')?'is-invalid':''}}"
                                           placeholder="Departamento" value="{{isset($proyecto->Departamento)?$proyecto->Departamento:old('Departamento')}}">
                                    {!! $errors->first('Departamento','<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                    <div class="form-group">
                                        <label for="Fotografia">Fotografia</label>
                                        <input type="file" id="Fotografia" name="Fotografia" class="form-control {{$errors->has('Fotografia')?'is-invalid':''}}"
                                               value="{{isset($proyecto->Fotografia)?$proyecto->Fotografia:old('Fotografia')}}">
                                        {!! $errors->first('Fotografia','<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div >
                                        <button type="submit" value="Crear Proyecto" class="btn btn-success toastsDefaultSuccess float-right" form="CreateForm">
                                            Crear Proyecto
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



