function validacion()
{
	if($("#sltpaciente-indice-preventivo-operatoria").val()=='0')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Paciente</strong> esta vacio, favor de llenarlo.</div>");
		$("#sltpaciente-indice-preventivo-operatoria").focus();
		return false;
	}
}