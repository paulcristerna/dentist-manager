function validacion_area()
{
	if($("#nombre").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Nombre</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}		
	else if($("#descripcion").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Descripcion</strong> esta vacio, favor de llenarlo.</div>");
		$("#descripcion").focus();
		return false;
	}
}