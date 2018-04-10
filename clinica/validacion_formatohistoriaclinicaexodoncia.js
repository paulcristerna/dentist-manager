function validacion()
{
	if($("#sltpaciente-exodoncia").val()=='0')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Paciente</strong> esta vacio, favor de llenarlo.</div>");
		$("#sltpaciente-exodoncia").focus();
		return false;
	}
}