@extends('layouts.indexMiCuenta')

@section('contenidoMiCuenta')

<div class="col-md-10 row">
    <div class="col-md-2">
        <strong class="labelWhite text-md-right"> USUARIO </strong>
    </div>
    <div class="col-md-6">
        <strong class="labelWhite text-md-right"> COMENTARIO </strong>
    </div>
    <div class="col-md-2">
        <strong class="labelWhite text-md-right"> PERFIL PROFESIONAL </strong>
    </div>
    <div class="col-md-2">
        <strong class="labelWhite text-md-right"> ESTADO </strong>
    </div>
    @foreach ($objTestimonios as $item)
        <div class="col-md-2">
            <h6 class="labelWhite text-md-right">{{$item->usuario}}</h6>
        </div>
        <div class="col-md-6">
            <h6 class="labelWhite text-md-right">{{$item->comentario}}</h6>
        </div>
        <div class="col-md-2">
            <h6 class="labelWhite text-md-right">{{$item->usuario}}</h6>
        </div>
        <div class="col-md-2">
            <select id="slcEstado" class="inputEspecialFormProfesionales" name="slcEstado" require >
                <option value=' '>Seleccione Estado</option>
                @foreach ($objEstados as $itemEstado)
                    <option value="{{$item->valor}}"
                        <?php 
                                    if ($itemEstado->valor ==  $item->aprobado) {
                                        echo('selected = "selected"');
                                    } 
                            
                            ?>
                            
                        >

                        {{$itemEstado->nombre}}
                    </option>
                @endforeach
            </select>
        </div>
        @endforeach

</div>
@endsection