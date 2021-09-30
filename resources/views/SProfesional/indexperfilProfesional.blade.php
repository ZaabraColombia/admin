@extends('layouts.indexMiCuenta')

@section('contenidoMiCuenta')
<div class="col-md-10">

    <div class="row  margenCasual">
        <div class="col-md-3">
        <label for="name" class="col-form-label labelWhite text-md-right">CEDULA </label>
        </div>
        <div class="col-md-9 noPadMar">
            <form action="{{url('/perfprof/busqueda/')}}" method="GET" class="formBarrBusquedad">
                <div class="row">
                     <div class="col-md-5 noPadMar">
                    <input type="text" name="cedula" id="" class="form-control labelWhite">
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
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($objPerfil as $item)		
                        <th><a href="{{url('/detallePerfilProf/'.$item->numero_documento)}}" class="labelWhite" >{{$item->numero_documento}}</a></th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->telefono}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          
            <div class="d-flex justify-content-center">
              
                {{$objPerfil->links()}}

            </div>
            
        </div>
        
    </div>


</div>

@endsection
