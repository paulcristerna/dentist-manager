function validacion_descuento()
{    
	if($("#nombre").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Nombre</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}
	else if($("#porcentaje").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Porcentaje</strong> esta vacio, favor de llenarlo.</div>");
		$("#porcentaje").focus();
		return false;
	}	
}