function validacion_contacto()
{
	if($("#nombre").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Nombre</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}
    else if($("#email").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Correo Electronico</strong> esta vacio, favor de llenarlo.</div>");
		$("#email").focus();
		return false;
	}
    else if($("#mensaje").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Mensaje</strong> esta vacio, favor de llenarlo.</div>");
		$("#mensaje").focus();
		return false;
	}
}