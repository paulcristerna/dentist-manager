function validacion_impuesto()
{
	if($("#nombre").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Numero de Empleado</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}		
	else if($("#porcentaje").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Porcentaje</strong> esta vacio, favor de llenarlo.</div>");
		$("#porcentaje").focus();
		return false;
	}
}