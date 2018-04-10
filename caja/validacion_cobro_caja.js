function validacion_cobro_caja()
{	
	if($("#slttipo").val()=='0')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Tipo</strong> esta vacio, favor de llenarlo.</div>");
		$("#slttipo").focus();
		return false;
	}
	else if($("#sltpaciente").val()=='0')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Paciente</strong> esta vacio, favor de llenarlo.</div>");
		$("#sltpaciente").focus();
		return false;
	}
	else if($("#txtrecibi").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Recibi</strong> esta vacio, favor de llenarlo.</div>");
		$("#txtrecibi").focus();
		return false;
	}
}