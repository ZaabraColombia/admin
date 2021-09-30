
$(document).ready(function(){
    $("#enviarReporte").bind("submit",function(ex){

        
        let subActual = document.activeElement.id
        let typeArchivo = "";
        let url ="";

        if(subActual == "btnExcel" ){
            typeArchivo = "EXL";
        }
        if(subActual == "btnPDF" ){
            typeArchivo = "PDF";
        }
        if($("#slcEstado").val() == " "){
            alert("No ha seleccionado reporte")
            return false;
        }

        /* Esto es para validar Fechas 
        if($("#fechaInicio").val() == ""){
            alert("No ha seleccionado Fecha Inicio")
            return false;
        }

        if($("#fechaFin").val() == ""){
            alert("No ha seleccionado Fecha Fin ")
            return false;
        }*/


        //Contenido 
        url = $("#slcEstado").val()+typeArchivo
        $(this).attr("action",url);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data:$(this).serialize(),
            beforeSend: function(){

            },
            complete:function(data){}
        })
        
        
    })
});