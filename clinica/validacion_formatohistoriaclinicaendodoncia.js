function validacion()
{
	if($("#sltpaciente-endodoncia").val()=='0')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Paciente</strong> esta vacio, favor de llenarlo.</div>");
		$("#sltpaciente-endodoncia").focus();
		return false;
	}
}