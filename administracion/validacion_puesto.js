function validacion_puesto()
{
	if($("#nombre").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Numero de Empleado</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}		
	else if($("#descripcion").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Descripción</strong> esta vacio, favor de llenarlo.</div>");
		$("#descripcion").focus();
		return false;
	}
}