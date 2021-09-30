<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('Libreriascss')
        @include('libreriasjsArriba')
        <meta charset="utf-8">
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
       <meta http-equiv='pragma' content='no-cache'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        @include('header')  
        <div class="fondoGeneral">
        @yield('contenido')

        </div>
        
        @include('footer')
    </body>
</html>
@include('libreriasjsAbajo')