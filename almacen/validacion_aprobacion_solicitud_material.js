function validacion_aprobacion_solicitud_material()
{
    var excedente = 0;
    var i = 0;
    var cantidad = [];

    $(".cantidad-material").each(function (index) {
	    cantidad[i] = $(this).val(); 
	    i++;
    });

    i = 0;
    var existencia = [];

    $(".existencia-material").each(function (index) {
	    existencia[i] = $(this).val();    
	    i++;
    });

    for(var i=0;i<=cantidad.length;i++)
	{
	    if(parseFloat(cantidad[i]) > parseFloat(existencia[i]))
		{
		    excedente++;
		}
	}

    if(excedente > 0 && $("#accion").val()==1)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>Hay un <strong>material</strong> que sobrepasa la existencia en la solicitud.</div>");
		return false;
	}
    else if($("#accion").val()==2 && !$("#notas").val())
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>Las <strong>Notas</strong> estan vacias, favor de llenarlas.</div>");
		$("#notas").focus();
		return false;
	}
}