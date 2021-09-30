$(".selectAprobadoTest").change(function(event) {
    $('#modalEstadoTestimonio').modal('show')
    $.get("actualizarEstadoTestimonio/"+event.target.attributes.getNamedItem('data-filter').value+"/"+event.target.value, function(response) {
        
        $('#modalEstadoTestimonio').modal('hide')
    })

});