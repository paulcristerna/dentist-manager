function validacion_concepto()
{
	if($("#nombre").val()=="")
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Nombre</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}		
	else if($("#precio").val()=="")
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Precio</strong> esta vacio, favor de llenarlo.</div>");
		$("#precio").focus();
		return false;
	}
}