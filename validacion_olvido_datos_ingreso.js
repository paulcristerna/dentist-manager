function validacion_olvido_datos_ingreso()
{
	if($("#correo-electronico").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Correo electronico</strong> esta vacio, favor de llenarlo.</div>");
		$("#correo-electronico").focus();
		return false;
	}
}