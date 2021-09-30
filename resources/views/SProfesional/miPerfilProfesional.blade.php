@extends('layouts.indexNoFondo')

@section('contenido')
)
<form class="container-fluid" method="POST" action="{{url('/guardarEstadoPerfilProfesional')}}" enctype="multipart/form-data" >
    @csrf
        <div class="container">
            <div class="row margTopImgDatoFormProfesionales">

                <div class="col-12 col-md-10 col-lg-6 divFileFotoPerfilFormProfesionales">
                  
                    <!-- Container imagen -->

                    <div class="col-8 col-md-8 contenedor-fotografia diseñoContenedorFotoPerfil noPad alturaImgPrincProfFormProfesional">
                        <div id="preview" class="alturaImgPrincProfFormProfesional">
                        @if(!empty ($perfil->fotoperfil))
                            <img class="card-img-top alturaImgPrincProfFormProfesional" src="{{!empty ($urlZaabraSprofesional.$perfil->fotoperfil) ? $urlZaabraSprofesional.$perfil->fotoperfil: ''  }}" alt="" id="FotoloadPreview">
                        @endif
                        </div>

                        <img class="card-img-top" src="" alt="" >
                    </div>
                    
                    <input class="inputFileFotoPerfil"  type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">

                </div>
                
               

                <!-- Container del formulario fotografia -->
                <div class="col-12 col-md-12 col-lg-6 mt-3 noPad">

                    <div class="col-md-12 noPad">
                        <div class="form-group noPadMar">
                            <h3 class="fontNameFormProfesionales">{{(!empty ($objUsuario[0]->nombre) ? $objUsuario[0]->nombre : "") ." ". (!empty ($objUsuario[0]->apellido) ? $objUsuario[0]->apellido :"") }}</h3>
                        </div>
                  
                        <div class="row ">
                  
                            <div class="form-group col-md-12">
                                <h4 class="fontCityFormProfesionales">{{(!empty ($objUsuario[0]->ciudad) ? $objUsuario[0]->ciudad : "")}}</h4>
                                <input id="codigoCiudad" name="codigoCiudad" type="hidden" value="{{!empty ($objUsuario[0]->codigoCiudad) ? $objUsuario[0]->codigoCiudad : 0  }}">
                                <div>
                                    <h4 class="fontAreaFormProfesionales">Área</h4>
                                </div>
                                <div class="col-md-12 form-group propiedadesContFormProfesionales">
                                    <select id="slcAreaMiPerf" class="inputAreaFormProfesionales" name="slcAreaMiPerf" require>
                                        <option value=' '>AREAS </option>
                                        @foreach ($objbannersArea as $item)
                                        <option value="{{$item->id}}"
                                        
                                            <?php if(!empty($objAreaProfEspe[0]->idArea)) {
                                                        if ($item->id ==  $objAreaProfEspe[0]->idArea) {
                                                            echo('selected = "selected"');
                                                        } 
                                                } 
                                                ?>
                                            >
                                            {{$item->nombreArea}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>                            

                                <div>
                                    <h4 class="fontProfesionFormProfesionales">Profesión</h4>
                                </div>
                                <div class="col-md-12 form-group propiedadesContFormProfesionales">
                                    <select id="slcProfesionMiPerf" class="inputProfesionFormProfesionales" name="slcProfesionMiPerf" require>
                                        <option value=' '>PROFESIONES </option>
                                        @foreach ($objbannersProfesionales as $item)
                                        <option value="{{$item->id}}"

                                            <?php if(!empty($objAreaProfEspe[0]->idProfesion)) {
                                                    if ($item->id ==  $objAreaProfEspe[0]->idProfesion) {
                                                        echo('selected = "selected"');
                                                    } 
                                            } 
                                            ?>
                                        >
                                        
                                        
                                            {{$item->nombreProfesion}}
                                        </option>


                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <h4 class="fontEspecialFormProfesionales">Especialidad</h4>
                                </div>
                                <div class="col-md-12 form-group propiedadesContFormProfesionales">
                                    <select id="slcEspecialidadMiPerf" class="inputEspecialFormProfesionales" name="slcEspecialidadMiPerf" require >
                                        <option value=' '>ESPECIALIDAD</option>
                                        @foreach ($objbannersEspecialidades as $item)
                                            <option value="{{$item->id}}"
                                                <?php if(!empty($objAreaProfEspe[0]->idEspecialidad)) {
                                                            if ($item->id ==  $objAreaProfEspe[0]->idEspecialidad) {
                                                                echo('selected = "selected"');
                                                            } 
                                                    } 
                                                    ?>
                                                >

                                                {{$item->nombreEspecialidad}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <h4 class="fontEspecialFormProfesionales">Estado</h4>
                                </div>
                                
                                <div class="col-md-12 form-group propiedadesContFormProfesionales">
                                    <select id="slcEstado" class="inputEspecialFormProfesionales" name="slcEstado" require >
                                        <option value=' '>Seleccione Estado</option>

                                        @foreach ($objEstados as $item)
                                            <option value="{{$item->valor}}"
                                                <?php 
                                                            if ($item->valor ==  $perfil->aprobado) {
                                                                echo('selected = "selected"');
                                                            } 
                                                    
                                                    ?>
                                                    
                                                >

                                                {{$item->nombre}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                        

                        
                        
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>



        <div class="container">
            
            <div class="row shadow-lg mb-5 mt-3 px-2" style="background-color:white">
                <div class="col-md-12 shadow row OptionUserFormProfesionales">
                    <div class=" noPad seleccion-formProfesionales">
                        <a id="btnDatosPersonales" class="">
                            <div>Datos Personales</div> 
                        </a>
                    </div>     
                    <div class=" noPad seleccion-formProfesionales">     
                        <a id="btnRedes" class="">
                            <div>Redes Sociales</div> 
                        </a> 
                    </div>     
                    <div class=" noPad seleccion-formProfesionales">
                        <a id="btnEstudios" class="">
                            <div>Estudios</div> 
                        </a>
                    </div>          
                    <div class=" noPad seleccion-formProfesionales">
                        <a id="btnCertificados" class="">
                            <div>Certificaciones</div> 
                        </a>
                    </div>             
                    <div class=" noPad seleccion-formProfesionales">
                        <a id="btnPublicaciones" class="" >
                            <div>Publicaciones</div>  
                        </a>    
                    </div>
                    <div class=" noPad seleccion-formProfesionales">
                        <a id="btnGaleria" class="">
                            <div>Galería</div> 
                        </a>    
                    </div>
                </div>
               <!--Container  datosPersonales -->
                <div class="col-12 col-md-12 noPad contPrincDatProfFormProfesionales" id="datosPersonales">

                    <div class="col-md-12 tituloSeccDatosPerFormProfesionales">
                        <h3 class="fontTituloSeccFormProfesionales">DATOS PERSONALES</h3>
                    </div>
                    <!--Container del formulario datos personales-->
                    <div class="col-12 col-md-12 col-lg-6 contDatProfFormProfesionales">
                        <div class="col-12 col-md-12 noPad">
                            <label class="margin-top-1em fontLabelDatPersFormProfesionales">Fecha de nacimiento</label>
                            <input class="form-control PropiedadIputDatPersFormProfesionales" type="date" value="{{!empty ($perfil->fechanacimiento) ? $perfil->fechanacimiento: ''  }}" id="fechaNacimiento" require name="fechaNacimiento">
                        </div>
                    
                        <div class="col-12 col-md-12 noPad">
                            <label class="margin-top-1em fontLabelDatPersFormProfesionales">Hoja de vida</label>
                            <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Escribe aqui una URL donde tiene alojada su Hoja de vida"  value="{{!empty ($perfil->hojaVida) ? $perfil->hojaVida: ''  }}" required id="hojaVida"  name="hojaVida">
                        </div>

                        <div class="col-12 col-md-12 noPad">
                            <label class="margin-top-1em fontLabelDatPersFormProfesionales">Descripción Profesional</label>
                        </div>    
                        <div class="col-md-12 form-group noPadMar">
                                <textarea class="textAreaDescripcionFormProfesionales" id="descripcion" require rows="6" cols="77" name="descripcion"  >{{!empty ($perfil->descripcion) ? $perfil->descripcion : ''  }}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-12 col-lg-6 contDatProfFormProfesionales">
                        <div class="col-12 col-md-12 noPad">
                            <h6 class="margin-top-1em fontLabelDatPersFormProfesionales">valor Consulta Presencial</h6>
                            <input type="number" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Escribe aqui" value="{{!empty ($perfil->valorConsultaPresencial) ? $perfil->valorConsultaPresencial: ''  }}"  required id="valorConsultaPresencial" name="valorConsultaPresencial">
                        </div>
                        <div class="col-12 col-md-12 noPad">
                            <h6 class="margin-top-1em fontLabelDatPersFormProfesionales">valor Consulta Virtual</h6>
                            <input type="number" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Escribe aqui" value="{{!empty ($perfil->valorConsultaVirtual) ?  $perfil->valorConsultaVirtual: ''  }}"  required id="valorConsultaVirtual" name="valorConsultaVirtual">
                        </div>
                        <div class="col-12 col-md-12 noPad">
                            <h6 class="margin-top-1em fontLabelDatPersFormProfesionales">valor Consulta Telefonica</h6>
                            <input type="number" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Escribe aqui" value="{{!empty ($perfil->valorConsultaTelefonica) ? $perfil->valorConsultaTelefonica: ''  }}"  required id="valorConsultaTelefonica" name="valorConsultaTelefonica">
                        </div>
                
                        <div class="col-12 col-md-12 noPad">
                            <label class="margin-top-1em fontLabelDatPersFormProfesionales" for="">Tipo de consulta</label>
                            <select class="detallesDatos inputTextMiCuenta form-control PropiedadIputDatPersFormProfesionales" name="tipoConsulta" id="tipoConsulta"> 
                        
                                @foreach ($objTipoConsulta as $item)	
                                
                                    <option value="{{$item->id_catalogo}}" 
                                        <?php if(!empty($perfil->tipoConsulta)) {
                                                if ($item->id_catalogo ==  $perfil->tipoConsulta) {
                                                    echo('selected = "selected"');
                                                } 
                                        } 
                                        ?>
                                        >
                                        
                                        {{$item->nombre}}
                                    </option>
                                @endforeach
                            
                            </select>
                        </div>
                        <div class="col-12 col-md-12 noPad">
                            <label class="margin-top-1em fontLabelDatPersFormProfesionales">Página Web</label>
                            <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Escribe aqui"  value="{{!empty ($perfil->url) ? $perfil->url: ''  }}" required id="url" name="url">
                        </div>
                      
                    </div>
                </div>
                <br>
            
                
                <!--Container  estudios -->
                <div class="col-md-12 row noPadMar" id="estudios">
                    <div class="col-md-12 tituloSeccEstudiosPerFormProfesionales">
                        <label class="margin-top-1em noPad  fontTituloSeccFormProfesionales">ESTUDIOS <span class="agregarDivImagenestudios diseñoAgregarBoton"></label>
                    </div>
                    @if(!empty ($perfil->estudios))
                        @foreach (json_decode($perfil->estudios) as $valueJson)
                            @php $tamañoEstudios = $loop->iteration @endphp 
                        @endforeach
                    @endif
                
                    <div class="col-12 col-md-12 noPadMar input-multiple-imagenesGroup-estudios bordeContenidoDinamico" >
                        @if(!empty ($perfil->estudios))
                            @for($i = 1; $i <= $tamañoEstudios; $i++)
                                @php $padreEstudios = $i;
                                @endphp
                                

                                <div class="col-12 col-md-12 col-lg-6 contImgEstudFormProfesionales">
                                        @foreach(json_decode($perfil->nivelEstudios) as $valueJson)
                                            @if($padreEstudios == $loop->iteration)
                                            <label class="margin-top-1em fontLabelDatPersFormProfesionales">Nivel de estudios</label>
                                            <input type="text" class="form-control PropiedadIputDatPersFormProfesionales col-12 col-md-12" placeholder="Nivel Estudio" id="txtNivelEstudios{{$i}}" name="txtNivelEstudios{{$i}}" 
                                                    <?php if($padreEstudios == $loop->iteration) {
                                                                    echo('value = "'.$valueJson.' "');
                                                                } ?>   >
                                            @endif          
                                        @endforeach
                                    
                    
                                        @foreach(json_decode($perfil->nombreEstudios) as $valueJson)
                                            @if($padreEstudios == $loop->iteration)
                                            <label class="margin-top-1em fontLabelDatPersFormProfesionales">Nombre de la profesión</label>
                                            <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Nombre" id="txtNombreEstudios{{$i}}" name="txtNombreEstudios{{$i}}" 
                                                    <?php if($padreEstudios == $loop->iteration) {
                                                                    echo('value = "'.$valueJson.' "');
                                                                } ?>   >
                                            @endif          
                                        @endforeach
                                    
                                
                                        <div class="row">
                                            <div class="col-12 col-md-12"><h4 class="margin-top-1em fontLabelDatPersFormProfesionales">Fecha de culminación</h4></div>
                                            <div class="col-12 col-md-12"> <input class="form-control PropiedadIputDatPersFormProfesionales" type="date" value="" id="fechaEstudios{{$i}}" require name="fechaEstudios{{$i}}"></div>
                                        </div>

                                        <br>
                                        <div class="col-12 col-md-12 noPad diseñoContenedorFotoDocumentos FotoloadPreview{{$i}}" id="FotoloadPreview{{$i}}" >
                                            @foreach (json_decode($perfil->estudios) as $valueJson)
                                                @if($padreEstudios == $loop->iteration)
                                                    <img class="card-img-top imagenAjustadaContenedor" src="{{!empty ($urlZaabraSprofesional.$valueJson) ? $urlZaabraSprofesional.$valueJson : ''  }}" id="estudios{{$i}}" alt="Card image cap">
                                                    <input id="estudios{{$i}}" name="estudios{{$i}}" type="hidden" value="{{!empty ($valueJson) ? $valueJson : ''  }}"class="col-12 col-md-12">
                                                @endif          
                                            @endforeach
                                        </div>   


                                </div>
                                
                                    <script>
                                        if(localStorage.getItem("varEstu") != null){
                                            localStorage.removeItem('varEstu');
                                            localStorage.setItem('varEstu', {{$i}});
                                        }else{
                                            localStorage.setItem('varEstu', {{$i}});
                                        }

                                        var loadFileestudios{{$i}} = function(event) {
                                            var reader{{$i}} = new FileReader();
                                            reader{{$i}}.onload = function(){
                                            var output{{$i}} = document.getElementById('estudios{{$i}}');
                                            output{{$i}}.src = reader{{$i}}.result;
                                            };
                                            reader{{$i}}.readAsDataURL(event.target.files[0]);
                                        };
                                    </script>

                            @endfor 
                            
                        @else
                            <div class="col-12 col-md-12 col-lg-6 contImgEstudFormProfesionales">
                                <label class="margin-top-1em fontLabelDatPersFormProfesionales">Nivel de estudios</label>
                                <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Nivel Estudio" id="txtNivelEstudios1" name="txtNivelEstudios1">
                                
                                <label class="margin-top-1em fontLabelDatPersFormProfesionales">Nombre de la profesión</label>
                                <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Nombre" id="txtNombreEstudios1" name="txtNombreEstudios1">
                                
                                <div class="row">
                                    <div class="col-12 col-md-12"><h4 class="margin-top-1em fontLabelDatPersFormProfesionales">Fecha Culminación</h4></div>
                                    <div class="col-12 col-md-12"> <input class="form-control PropiedadIputDatPersFormProfesionales" type="date" value="" id="fechaEstudios1" require name="fechaEstudios1"></div>
                                </div>
                                <br>
                                <div class="col-12 col-md-12 diseñoContenedorFotoDocumentos"  >
                                    <img class="card-img-top imagenAjustadaContenedor" id="Estudios1"/>
                                </div>

                                
                                <br>
                            </div>
                            <script>
                                if(localStorage.getItem("varEstu") != null){
                                    localStorage.removeItem('varEstu');
                                    localStorage.setItem('varEstu', 1);
                                }else{
                                    localStorage.setItem('varEstu', 1);
                                }
                                var loadFileestudios1 = function(event) {
                                    var reader1 = new FileReader();
                                    reader1.onload = function(){
                                    var output1 = document.getElementById('Estudios1');
                                    output1.src = reader1.result;
                                    };
                                    reader1.readAsDataURL(event.target.files[0]);
                                };
                            </script>

                        
                        @endif

                    </div>
                
                </div>


                <br>
                <div class="col-md-12 row noPadMar" id="publicaciones">
                    <div class="col-md-12 tituloSeccEstudiosPerFormProfesionales">
                        <label class="margin-top-1em noPad fontTituloSeccFormProfesionales">PUBLICACIONES <span class="agregarDivImagenPublicacion diseñoAgregarBoton col-md-1"></label>
                    </div>
                    @if(!empty ($perfil->Publicaciones))
                        @foreach (json_decode($perfil->Publicaciones) as $valueJson)
                            @php $tamañoPublicaciones = $loop->iteration @endphp 
                        @endforeach
                    @endif
                    <div class="col-md-12 noPadMar input-multiple-imagenesGroup-Publicacion bordeContenidoDinamico">
                        @if(!empty ($perfil->Publicaciones) AND !empty ($perfil->nombrePublicacion) AND !empty ($perfil->linksPublicacion))
                                @for($i = 1; $i <= $tamañoPublicaciones; $i++)
                                @php $padrePublicaciones = $i;
                                @endphp

                                <div class="col-md-12 col-lg-6 contImgPublicFormProfesionales">
                                    @foreach(json_decode($perfil->nombrePublicacion) as $valueJson)
                                        @if($padrePublicaciones == $loop->iteration)
                                        <label class="margin-top-1em fontLabelDatPersFormProfesionales">Nombre</label>
                                        <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Nombre" id="txtNombrePublicacion{{$i}}"
                                        <?php if($padrePublicaciones == $loop->iteration) {
                                                            echo('value = "'.$valueJson.' "');
                                                        } ?> 
                                                        name="txtNombrePublicacion{{$i}}">
                                        @endif          
                                    @endforeach
                                        
                                    @foreach(json_decode($perfil->linksPublicacion) as $valueJson)
                                        @if($padrePublicaciones == $loop->iteration)
                                        <label class="margin-top-1em fontLabelDatPersFormProfesionales">Link</label>
                                        <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Link" id="txtLinkPublicacion{{$i}}" 
                                        <?php if($padrePublicaciones == $loop->iteration) {
                                                            echo('value = "'.$valueJson.' "');
                                                        } ?>  name="txtLinkPublicacion{{$i}}">
                                        @endif          
                                    @endforeach
                                    
                                    <div class="row">
                                        <div class="col-md-12"><h4 class="margin-top-1em fontLabelDatPersFormProfesionales">Fecha de culminación</h4></div>
                                        <div class="col-md-12"> <input class="form-control PropiedadIputDatPersFormProfesionales" type="date" value="" id="fechaPublicacion{{$i}}" require name="fechaPublicacion{{$i}}"></div>
                                    </div>
                                    <br>
                                    <div class="col-md-12 diseñoContenedorFotoDocumentos FotoloadPreview{{$i}}" id="FotoloadPreview{{$i}}" >
                                    @foreach (json_decode($perfil->Publicaciones) as $valueJson)
                                            @if($padrePublicaciones == $loop->iteration)
                                        <img class="card-img-top imagenAjustadaContenedor" src="{{!empty ($urlZaabraSprofesional.$valueJson) ? $urlZaabraSprofesional.$valueJson : ''  }}" id="Publicacion{{$i}}" alt="Card image cap">
                                        <input id="Publicacion{{$i}}" name="Publicacion{{$i}}" type="hidden" value="{{!empty ($valueJson) ? $valueJson : ''  }}">
                                        @endif          
                                    @endforeach
                                    </div>  
                                    
                                </div>
                                
                                <script>

                                if(localStorage.getItem("varPubl") != null){
                                    localStorage.removeItem('varPubl');
                                    localStorage.setItem('varPubl', {{$i}});
                                }else{
                                    localStorage.setItem('varPubl', {{$i}});
                                }

                                    var loadFilePublicacion{{$i}} = function(event) {
                                        var reader{{$i}} = new FileReader();
                                        reader{{$i}}.onload = function(){
                                        var output{{$i}} = document.getElementById('Publicacion{{$i}}');
                                        output{{$i}}.src = reader{{$i}}.result;
                                        };
                                        reader{{$i}}.readAsDataURL(event.target.files[0]);
                                    };
                                </script>


                            @endfor
                            @else
                            <div class="col-md-12 col-lg-6 contImgPublicFormProfesionales">
                                
                                <label class="margin-top-1em fontLabelDatPersFormProfesionales">Nombre</label>
                                <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Nombre" id="txtNombrePublicacion1" name="txtNombrePublicacion1">
                                
                                <label class="margin-top-1em fontLabelDatPersFormProfesionales">Link</label>
                                <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Link" id="txtLinkPublicacion1" name="txtLinkPublicacion1">
                            
                                <div class="row">
                                    <div class="col-md-12"><h4 class="margin-top-1em fontLabelDatPersFormProfesionales">Fecha Culminación</h4></div>
                                    <div class="col-md-12"> <input class="form-control PropiedadIputDatPersFormProfesionales" type="date" value="" id="fechaPublicacion1" require name="fechaPublicacion1"></div>
                                </div>
                                <br>
                                <div class="col-md-12 diseñoContenedorFotoDocumentos"  >
                                    <img class="card-img-top imagenAjustadaContenedor" id="Publicacion1"/>
                                </div>

                               
                                <br>
                            </div>
                            <script>
                                if(localStorage.getItem("varPubl") != null){
                                    localStorage.removeItem('varPubl');
                                    localStorage.setItem('varPubl', 1);
                                }else{
                                    localStorage.setItem('varPubl', 1);
                                }
                                var loadFilePublicacion1 = function(event) {
                                    var reader1 = new FileReader();
                                    reader1.onload = function(){
                                    var output1 = document.getElementById('Publicacion1');
                                    output1.src = reader1.result;
                                    };
                                    reader1.readAsDataURL(event.target.files[0]);
                                };
                            </script>

                        
                        @endif

                    </div>
                </div>
                <br>


                <div class="col-md-12 row noPadMar" id="certificados">
                    <div class="col-md-12 tituloSeccEstudiosPerFormProfesionales">
                        <label class="margin-top-1em noPad fontTituloSeccFormProfesionales">CERTIFICADOS <span class="agregarDivImagenCertificados diseñoAgregarBoton col-md-1"></label>
                    </div>
                    
                    @if(!empty ($perfil->titulos))
                        @foreach (json_decode($perfil->titulos) as $valueJson)
                            @php $tamañoCertificaciones = $loop->iteration @endphp 
                        @endforeach
                    @endif
                    
                    <div class="col-md-12 noPadMar input-multiple-imagenesGroup-Certificados bordeContenidoDinamico">
                
                        @if(!empty ($perfil->titulos))
                            @for($i = 1; $i <= $tamañoCertificaciones; $i++)
                                @php $padreCertificado = $i;
                                @endphp
                                
                            
                                <div class="col-md-12 col-lg-6 contImgCertifFormProfesionales">
                                    @foreach(json_decode($perfil->entidadCertificado) as $valueJson)
                                        @if($padreCertificado == $loop->iteration)
                                        <label class="margin-top-1em fontLabelDatPersFormProfesionales">Entidad</label>
                                        <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Entidad" id="txtNivelCertificados{{$i}}"
                                        <?php if($padreCertificado == $loop->iteration) {
                                                            echo('value = "'.$valueJson.' "');
                                                        } ?>  
                                        name="txtNivelCertificados{{$i}}">
                                        @endif          
                                    @endforeach
                                
                                    @foreach(json_decode($perfil->nombreCertificado) as $valueJson)
                                        @if($padreCertificado == $loop->iteration)
                                        <label class="margin-top-1em fontLabelDatPersFormProfesionales">Nombre del certificado</label>
                                        <input type="text" class="form-control PropiedadIputDatPersFormProfesionales"  placeholder="Nombre" id="txtNombreCertificados{{$i}}"
                                        <?php if($padreCertificado == $loop->iteration) {
                                                            echo('value = "'.$valueJson.' "');
                                                        } ?>  
                                    name="txtNombreCertificados{{$i}}">
                                        @endif          
                                    @endforeach
                                
                                    <div class="row">
                                        <div class="col-md-12"><h4 class="margin-top-1em fontLabelDatPersFormProfesionales">Fecha de culminación</h4></div>
                                        <div class="col-md-12"> <input class="form-control PropiedadIputDatPersFormProfesionales" type="date" value="" id="fechaCertificados{{$i}}" require name="fechaCertificados{{$i}}"></div>
                                    </div>
                                    <br>
                                    <div class="col-md-12 diseñoContenedorFotoDocumentos FotoloadPreview{{$i}}" id="FotoloadPreview{{$i}}" >
                                    @foreach (json_decode($perfil->estudios) as $valueJson)
                                        @if($padreCertificado == $loop->iteration)
                                        <img class="card-img-top imagenAjustadaContenedor" src="{{!empty ($urlZaabraSprofesional.$valueJson) ? $urlZaabraSprofesional.$valueJson : ''  }}" id="Certificados{{$i}}" alt="Card image cap">
                                        <input id="Certificado{{$i}}" name="Certificado{{$i}}" type="hidden" value="{{!empty ($valueJson) ? $valueJson : ''  }}">
                                        @endif          
                                    @endforeach
                                    </div>   
                                 
                                </div>

                                
                                <script>
                                    if(localStorage.getItem("varCert") != null){
                                    localStorage.removeItem('varCert');
                                    localStorage.setItem('varCert', {{$i}});
                                }else{
                                    localStorage.setItem('varCert', {{$i}});
                                }
                                    var loadFileCertificados{{$i}} = function(event) {
                                        var reader{{$i}} = new FileReader();
                                        reader{{$i}}.onload = function(){
                                        var output{{$i}} = document.getElementById('Certificados{{$i}}');
                                        output{{$i}}.src = reader{{$i}}.result;
                                        };
                                        reader{{$i}}.readAsDataURL(event.target.files[0]);
                                    };
                                </script>
                            @endfor 

                        
                            @else
                            <div class="col-md-12 col-lg-6 contImgCertifFormProfesionales">
                                <label class="margin-top-1em fontLabelDatPersFormProfesionales">Entidad</label>
                                <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Entidad" id="txtNivelCertificados1" name="txtNivelCertificados1">
                                
                                <label class="margin-top-1em fontLabelDatPersFormProfesionales">Nombre del certificado</label>
                                <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" placeholder="Nombre" id="txtNombreCertificados1" name="txtNombreCertificados1">
                                
                                <div class="row">
                                    <div class="col-md-12"><h4 class="margin-top-1em fontLabelDatPersFormProfesionales">Fecha Culminación</h4></div>
                                    <div class="col-md-12"> <input class="form-control PropiedadIputDatPersFormProfesionales" type="date" value="" id="fechaCertificados1" require name="fechaCertificados1"></div>
                                </div>
                                <br>
                                <div class="col-md-12 diseñoContenedorFotoDocumentos"  >
                                    <img class="card-img-top imagenAjustadaContenedor" id="Certificados1"/>

                                </div>
                                <br>
                            </div>
                            <script>
                                if(localStorage.getItem("varCert") != null){
                                    localStorage.removeItem('varCert');
                                    localStorage.setItem('varCert', 1);
                                }else{
                                    localStorage.setItem('varCert', 1);
                                }
                                var loadFileCertificados1 = function(event) {
                                    var reader1 = new FileReader();
                                    reader1.onload = function(){
                                    var output1 = document.getElementById('Certificados1');
                                    output1.src = reader1.result;
                                    };
                                    reader1.readAsDataURL(event.target.files[0]);
                                };
                            </script>

                        
                        @endif

                    </div>
                </div>
                <br>

                <div class="col-md-12 row noPadMar" id="galeria">
                    <div class="col-md-12 row noPadMar">
                        <div class="col-md-12 tituloSeccEstudiosPerFormProfesionales"><h3 class="margin-top-1em noPad fontTituloSeccFormProfesionales">GALERÍA</h3></div>
                        <div class="col-md-12 margin-top-1em noPad"><h5 class="fontFraseGaleriaFormProfesionales">Sube tus imágenes y videos que desees compartir</h5></div>
                        <div class="col-md-12 noPadMar contCrearAlbunFormProfesionales"><h3 class="fontTituloSeccFormProfesionales">Crear álbum</h3><span class="agregarDivImagen diseñoAgregarBoton col-md-1"></span></div>
                    </div>
                    <div class="row col-md-12 input-multiple-imagenesGroup noPadMar">
                    
                        @if(!empty ($perfil->imagen))
                            
                            @foreach (json_decode($perfil->imagen) as $valueJson)
                            <div class="col-12 col-md-12 col-lg-6 divFileFotosGaleria">
                                <div class="col-md-12 diseñoContenedorFoto FotoloadPreview{{$loop->iteration}}" id="FotoloadPreview1" style="height: 300px;" >
                                    <img class="card-img-top imagenAjustadaContenedor" src="{{!empty ($urlZaabraSprofesional.$valueJson) ? $urlZaabraSprofesional.$valueJson : ''  }}" id="output{{$loop->iteration}}" alt="Card image cap">
                                    <input id="imgGaleria{{$loop->iteration}}" name="imgGaleria{{$loop->iteration}}" type="hidden" value="{{!empty ($valueJson) ? $valueJson : ''  }}">
                                </div> 
                                                 
                            </div>
                            <script>
                                if(localStorage.getItem("varGale") != null){
                                    localStorage.removeItem('varGale');
                                    localStorage.setItem('varGale', {{$loop->iteration}});
                                }else{
                                    localStorage.setItem('varGale', {{$loop->iteration}});
                                }
                                var loadFile{{$loop->iteration}} = function(event) {
                                    var reader{{$loop->iteration}} = new FileReader();
                                    reader{{$loop->iteration}}.onload = function(){
                                    var output{{$loop->iteration}} = document.getElementById('output{{$loop->iteration}}');
                                    output{{$loop->iteration}}.src = reader{{$loop->iteration}}.result;
                                    };
                                    reader{{$loop->iteration}}.readAsDataURL(event.target.files[0]);
                                };



                            </script>
                            @endforeach	
                            @else
                            <div class="col-12 col-md-12 col-lg-6 divFileFotosGaleria"  >
                                <div class="col-md-12 diseñoContenedorFoto" id="FotoloadPreview1" style="height: 300px;" >
                                    <img class="card-img-top imagenAjustadaContenedor" id="output1"/>
                                </div>
                                
                            </div>
                            <script>
                                if(localStorage.getItem("varGale") != null){
                                    localStorage.removeItem('varGale');
                                    localStorage.setItem('varGale', 1);
                                }else{
                                    localStorage.setItem('varGale', 1);
                                }
                                var loadFile1 = function(event) {
                                    var reader1 = new FileReader();
                                    reader1.onload = function(){
                                    var output1 = document.getElementById('output1');
                                    output1.src = reader1.result;
                                    };
                                    reader1.readAsDataURL(event.target.files[0]);
                                };
                            </script>
                        @endif
                        
                    </div>
                        
                

                </div>

                <div class="col-md-12 row noPadMar" id="Redes">
                    <div class="col-md-12 tituloSeccDatosPerFormProfesionales">
                        <h3 class="fontTituloSeccFormProfesionales">REDES SOCIALES</h3>
                    </div>
                    <div class="col-12 noPadMar">
                        <div class="form-group col-md-12 noPad m-0">
                            <label class="margin-top-1em fontLabelDatPersFormProfesionales">WhatsApp</label>
                            <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" value="{{!empty ($perfil->whatsapp) ? $perfil->whatsapp: ''  }}" placeholder="Escribe aqui" id="whatsapp" name="whatsapp">
                        </div>
                        <div class="form-group col-md-12 noPad m-0">
                            <label class="margin-top-1em fontLabelDatPersFormProfesionales">Facebook</label>
                            <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" value="{{!empty ($perfil->facebook) ? $perfil->facebook: ''  }}" placeholder="Escribe aqui" id="facebook" name="facebook">
                        </div>
                        <div class="form-group col-md-12 noPad m-0">
                            <label class="margin-top-1em fontLabelDatPersFormProfesionales">Instagram</label>
                            <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" value="{{!empty ($perfil->instagram) ? $perfil->instagram: ''  }}" placeholder="Escribe aqui" id="instagram" name="instagram">
                        </div>
                        <div class="form-group col-md-12 noPad m-0">
                            <label class="margin-top-1em fontLabelDatPersFormProfesionales">Twitter</label>
                            <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" value="{{!empty ($perfil->twitter) ? $perfil->twitter: ''  }}" placeholder="Escribe aqui" id="twitter" name="twitter">
                        </div>
                        <div class="form-group col-md-12 noPad m-0">
                            <label class="margin-top-1em fontLabelDatPersFormProfesionales">YouTube </label>
                            <input type="text" class="form-control PropiedadIputDatPersFormProfesionales" value="{{!empty ($perfil->youtube) ? $perfil->youtube: ''  }}" placeholder="Escribe aqui" id="youtube" name="youtube">
                        </div>
                    
                    </div>
                </div>
                
                <br>
                <div class="col-md-12 container">            
                    <div>
                        <h4>Notas Aprobacion </h4>
                    </div>
                    <textarea class="textAreaDescripcionFormProfesionales" id="notasAprobacion" require rows="6" cols="77" name="notasAprobacion">{{!empty ($perfil->notasAprobacion) ? $perfil->notasAprobacion : ''  }}</textarea>
                </div>
                <div class="col-md-12 py-4 contBtnInferiorFormProfesionales">
                    <div class="col-md-12 col-lg-6 text-center px-1 m-0">
                        <button class="btn BtnGuardarFormProfesionales" type="submit">Guardar</button>
                    </div>
                </div>   
                <br>

            </div>

        </div>
    <input type="hidden" name="idUsuario" id="idUsuario" value="{{!empty ($perfil->id) ? $perfil->id: ''  }}">
    <input type="hidden" name="documentoUsuario" id="documentoUsuario" value="{{!empty ($perfil->numero_documento) ? $perfil->numero_documento: ''  }}">
    
</form>

@endsection


