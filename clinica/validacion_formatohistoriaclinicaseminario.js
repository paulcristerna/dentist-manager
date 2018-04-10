function validacion()
{
	if($("#sltpaciente-seminario").val()=='0')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Paciente</strong> esta vacio, favor de llenarlo.</div>");
		$("#sltpaciente-seminario").focus();
		return false;
	}
}