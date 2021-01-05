<?php
header('Content-type:aplication/xls');
header('Content-Disposition:attachment; filename=Reporte.xls');
?>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<table style="border-collapse: collapse; text-align: center;border: black 2px solid;">
    <thead style=" background-color: black;text-align: center;color: white;">
    <tr >
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
    <tbody >
    @foreach($tareas as $tarea)
        <tr>
            <td style="width: 5%">{{$tarea->Titulo}}</td>
            <td style="width: 10%">{{$tarea->Descripcion}}</td>
            <td style="width: 10%">{{$tarea->Nombre}} {{$tarea->AppelidoPat}} {{$tarea->AppelidoMat}}</td>
            <td style="width: 10%">{{$tarea->Progreso}}</td>
            <td style="width: 10%">{{$tarea->Duracion_Estimada}}</td>
            <td style="width: 10%">{{$tarea->Fecha_inicio}}</td>
            <td style="width: 10%">{{$tarea->Fecha_fin}}</td>
            <td style="width: 10%">{{$tarea->HorasXdia}}</td>
            <td style="width: 10%">{{$tarea->Dias_trabajados}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
