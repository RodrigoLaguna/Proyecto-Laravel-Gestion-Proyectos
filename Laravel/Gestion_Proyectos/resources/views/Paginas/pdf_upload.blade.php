<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <tittle></tittle>

    <link rel="stylesheet" href="{{asset('/CSS/PLUGINS/tables.css')}}">
</head>
    <body>
    <header>
        <div id="texto">
            <div align="center"><img class="align-items-center" src="{{public_path().'/IMG/IBERO.png'}}" width="300" alt="" ></div>
            <h1 >Proyecto <h2 >{{$proyecto['Titulo']}}</h2> </h1>
        </div>


        <b>Descripcion: </b>
        <p>{{$proyecto['Descripcion']}}</p>

        <b>Lider de proyecto: </b>
        <p> {{$proyecto->Nombre}} {{$proyecto->AppelidoPat}} {{$proyecto->AppelidoMat}} </p>
    </header>
    <div>
        <table class="container table table-hover"  style="width:100%">
            <thead>
            <tr>
                <th><h3>Tareas</h3></th>
                <th><h3>Descripción</h3></th>
                <th><h3>Encargado</h3></th>
                <th><h3>Progreso</h3></th>
                <th><h3>Duración</h3></th>
                <th><h3>Fecha inicio</h3></th>
                <th><h3>Fecha fin</h3></th>
                <th><h3>Horas por dia</h3></th>
                <th><h3>Dias</h3></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tareas as $tarea)
            <tr>
                    <td style="width: 15%">{{$tarea->Titulo}}</td>
                    <td style="width: 20%">{{$tarea->Descripcion}}</td>
                    <td style="width: 15%">{{$tarea->Nombre}} {{$tarea->AppelidoPat}} {{$tarea->AppelidoMat}}</td>
                    <td style="width: 8%">{{$tarea->Progreso}} %</td>
                    <td style="width: 10%">{{$tarea->Duracion_Estimada}}</td>
                    <td style="width: 10%">{{$tarea->Fecha_inicio}}</td>
                    <td style="width: 10%">{{$tarea->Fecha_fin}}</td>
                    <td style="width: 10%">{{$tarea->HorasXdia}}</td>
                    <td style="width: 5%">{{$tarea->Dias_trabajados}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>


    </div>


    </body>
</html>

