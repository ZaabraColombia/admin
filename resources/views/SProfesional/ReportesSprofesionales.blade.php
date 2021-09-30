@extends('layouts.indexMiCuenta')

@section('contenidoMiCuenta')
<div class="col-md-10">
    <form class="container-fluid" method="POST" action="" enctype="multipart/form-data" id="enviarReporte">
    @csrf
        <div class="col-md-12 row">
            <div class="col-md-7">
                <select id="slcEstado" class="inputEspecialFormProfesionales" name="slcEstado" require >
                    <option value=' '>Seleccione Reporte</option>

                    @foreach ($objReportes as $item)
                        <option value="{{$item->ruta}}" >
                            {{$item->Nombre}}
                        </option>
                    @endforeach
                </select>
                </br>
                </br>
            
            </div>
            <!-- Este espacio aplica para las fechas
            <div class="row col-md-5">
                <div class="col-md-12">
                    <h3 class="itemMenu">Fecha Inicio</h3>
                    <input type="date" class="form-control labelWhite" name="fechaInicio" id="fechaInicio">
                </div>
                <div class="col-md-12">
                    <h3 class="itemMenu">Fecha Fin</h3>
                    <input type="date" class="form-control labelWhite" name="fechaFin" id="fechaFin">
                </div>
            </div>-->
            
        </div>    
        
        <div class="col-md-6 row">
        
            <div class="col-md-6">
                <input type="submit" class="alert alert-success" value="Downoload EXCEL" id="btnExcel" data-type="1">        
            </div>   
            <!--
            <div class="col-md-6">
                <input type="submit" class=" far fa-file-alt alert alert-danger" value="Downoload PDF" id="btnPDF" data-type="2">
            </div>   
            -->
            
        </div>
        
    </form>
</div>
@endsection