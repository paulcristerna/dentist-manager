function validacion()
{
	if($("#sltpaciente-protesis-fija").val()=='0')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Paciente</strong> esta vacio, favor de llenarlo.</div>");
		$("#sltpaciente-protesis-fija").focus();
		return false;
	}
}