@extends('layouts.indexMiCuenta')

@section('contenidoMiCuenta')

<div class="col-md-10 row">
    <div class="col-md-12">
    <table class="table table-borderless table-dark" id="tblCompras">
                <thead>
                    <tr>
                        <th>USUARIO</th>
                        <th>COMENTARIO</th>
                        <th>PERFIL PROFESIONAL</th>
                        <th>CALIFICACION</th>
                        <th>ESTADO</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($objTestimonios as $item)		
                        <td>{{$item->usuario}}</td>
                        <td>{{$item->comentario}}</td>
                        <td>{{$item->perfil}}</td>
                        <td>{{$item->calificacion}}</td>
                        <td>
                        <select id="slcEstado" data-filter="{{$item->id}}" class="inputEspecialFormProfesionales selectAprobadoTest" name="slcEstado" require >
                            <option value=' '>Seleccione Estado</option>
                            @foreach ($objEstados as $itemEstado)
                                <option  value="{{$itemEstado->valor}}"
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
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              
              {{$objTestimonios->links()}}

          </div>

    </div>

</div>
@endsection

<div class="modal fade bd-example-modal-sm" id="modalEstadoTestimonio" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <H3>Se esta guardando el estado del testimonio</H3>
    </div>
  </div>
</div>