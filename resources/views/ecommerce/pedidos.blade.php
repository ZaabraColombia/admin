@extends('layouts.indexMiCuenta')

@section('contenidoMiCuenta')
<div class="col-md-10">

    <div class="row  margenCasual">
        <div class="col-md-3">
        <label for="name" class="col-form-label labelWhite text-md-right">CODIGO REFERENCIA</label>
        </div>
        <div class="col-md-9 noPadMar">
            <form action="{{url('/pedidos/busqueda/')}}" method="GET" class="formBarrBusquedad">
                <div class="row">
                     <div class="col-md-5 noPadMar">
                    <input type="text" name="codigoReferencia" id="" class="form-control labelWhite">
                    </div> 
                    <div class="col-md-2 noPadMar">
                        <input type="submit">
                    </div>
                </div>
               
            </form>
        </div>
        

        
    </div>
    <div class="row margenCasual">
        <div class="col-md-12">
            <table class="table table-borderless table-dark" id="tblCompras">
                <thead>
                    <tr>
                        <th>CodigoReferencia</th>
                        <th>Cliente</th>
                        <th>Direccion</th>
                        <th>Valor</th>
                        <th>fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($objEncCompra as $item)		
                        <th><a href="{{url('/detalleCompra/'.$item->referenceCode)}}" class="labelWhite" >{{$item->referenceCode}}</a></th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->direccion}}</td>
                        <td>$ {{$item->valorCompra}}</td>
                        <td>{{$item->fecha}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
              
                {{$objEncCompra->links()}}

            </div>
            
        </div>
        
    </div>


</div>

@endsection
