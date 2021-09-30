@extends('layouts.index')

@section('contenido')

<div class="container">
    
        <div class="col-md-12 flexed">
            <div class="col-md-2 noMar"><label for="" class="labelWhite">Codigo Referencia</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">{{ $objEncCompra[0]->referenceCode }}</label></div>
        
            <div class="col-md-2 noMar"><label for="" class="labelWhite">Cliente</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">{{ $objEncCompra[0]->name }}</label></div>
        
            <div class="col-md-2 noMar"><label for="" class="labelWhite">Fecha</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">{{ $objEncCompra[0]->fecha }}</label></div>
        </div>
        <div class="col-md-12 flexed">
            <div class="col-md-2 noMar"><label for="" class="labelWhite">telefono</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">{{ $objEncCompra[0]->telefono }}</label></div>
        
            <div class="col-md-2 noMar"><label for="" class="labelWhite">direccion</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">{{ $objEncCompra[0]->direccion }}</label></div>
        
           
        </div>
        <div class="col-md-12 flexed">
            <div class="col-md-2 noMar"><label for="" class="labelWhite">Pais</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">{{ $objEncCompra[0]->nombrePais}}</label></div>
        
            <div class="col-md-2 noMar"><label for="" class="labelWhite">Departamento</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">{{ $objEncCompra[0]->nombreDepartamento}}</label></div>
        
            <div class="col-md-2 noMar"><label for="" class="labelWhite">Provincia</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">$ {{ $objEncCompra[0]->nombreProvincia}}</label></div>
        </div>
        <div class="col-md-12 flexed">
            <div class="col-md-2 noMar"><label for="" class="labelWhite">Ciudad</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">{{ $objEncCompra[0]->nombreMunicipio}}</label></div>
        
           
        </div>
        <div class="col-md-12 flexed">
            <div class="col-md-2 noMar"><label for="" class="labelWhite">Valor Productos</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">$ {{ $objEncCompra[0]->valorProductos }}</label></div>

            <div class="col-md-2 noMar"><label for="" class="labelWhite">Valor Envio</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">$ {{ $objEncCompra[0]->valorEnvio }}</label></div>

            <div class="col-md-2 noMar"><label for="" class="labelWhite">Valor Total</label></div>
            <div class="col-md-2 noMar"><label for="" class="labelWhite">$ {{ $objEncCompra[0]->valorCompra }}</label></div>

        </div>
    
    
    <div class="col-md-12">

    <table class="table table-borderless table-dark" id="tblCompras">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Dsitribuidor</th>
                        <th>Cantidad </th>
                        <th>valor</th>
                        
                    </tr>
                </thead>
                <tbody>
               @foreach ($objDetCompra as $item)		
                    <tr>
                        <th>{{$item->titulo.' '.$item->titular}}</th>
                        <th>{{$item->empresa}}</th>
                        <td>{{$item->cantidad}}</td>
                        <td>$ {{$item->valorTotal}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


    </div>

</div>

@endsection
