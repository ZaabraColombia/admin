@extends('layouts.index')

@section('contenido')

<div class="container  marRespectHeader paddingMiCuenta alineacionFooter margenInferior">
   <br> 
    <div class="col-xs-offset-1  col-xs-9">
        <hr class="lineaInferiorMiCuenta">
    </div>
    <div class="col-12 col-md-12 row seccionMiCuenta">
        <div class="col-6 col-md-3 noPad divMiCuenta">
            <p class="tipografiaMiCuenta "> PORTAL ZAABRA </p>
        </div>
        <div  class="col-6 offset-md-3  col-md-6 noPad divMiUsuario">
            <p class="tipografiaUsuario"> {{ Auth::user()->name  }}</p>
        </div>
    </div>

    <div class="col-xs-offset-1  col-xs-9">
        <hr class="lineaInferiorMiCuenta">
    </div>

    <div class="col-md-12 row margContPlanPremMovl">
        <div class="col-md-2 listaMisDatos">
            <ul class="margenesUlMisDatos fontIndicesMiCuenta">
                <li><a class="itemMenu" href="{{ url('pedidos') }}">MIS PEDIDOS</a></li>
                <li><a class="itemMenu" href="{{ url('perfprof') }}">PERFILES PROF</a></li>
                <li><a class="itemMenu" href="{{ url('reportesSprofesionales') }}">REPORTES PROF</a></li>
                <li><a class="itemMenu" href="{{ url('testimonios') }}">TESTIMONIOS</a></li>
            </ul>  
        </div>
        @yield('contenidoMiCuenta')

    </div>




   

</div>

@endsection 