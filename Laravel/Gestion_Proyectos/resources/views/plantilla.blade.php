<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Proyectos</title>

    <!--================================
        PLUGINS DE CSS
    ==================================-->
    {{---FONTAWESOME--}}
    <link rel="stylesheet" href="{{asset('/CSS/PLUGINS/all.min.css')}}">
    {{--SCROLLBAR--}}
    <link rel="stylesheet" href="{{asset('/CSS/PLUGINS/OverlayScrollbars.min.css')}}">
    {{--CSS DE ADMINLTE--}}
    <link rel="stylesheet" href="{{asset('/CSS/PLUGINS/adminlte.min.css')}}">
    {{--GOOGLE FONTS--}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src=""></script>

    <!--================================
        PLUGINS DE JS
    ==================================-->
    <script> var url_global= '{{"/"}}'</script>
    {{---FONTAWESOME--}}
    <script src="{{asset('/JS/PLUGINS/all.min.js')}}"></script>
    {{---JQUERY--}}
    <script src="{{asset('/JS/PLUGINS/http_ajax.googleapis.com_ajax_libs_jquery_3.4.1_jquery.js')}}"></script>
    {{---POPPER JS--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    {{--SCROLLBAR--}}
    <link rel="stylesheet" href="{{asset('/JS/PLUGINS/overlayScrollbars.min.js')}}">
    {{--JS ADMINLTE--}}
    <script src="{{asset('/JS/PLUGINS/adminlte.js')}}"></script>
    <script src="{{asset('/JS/PLUGINS/dropdown.js')}}"></script>
    </head>
<body class="sidebar-mini layout-fixed sidebar-collapse" style="height: auto;padding:0;margin:0;">
<!-- Site wrapper -->
<div class="wrapper" id="fondo">
    @include('Modulos.header')
    @include('Modulos.sidebar')
    @yield('content')
</div>
@yield('script')
</body>
</html>
