function validacion_materia()
{	
	if($("#nombre").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Nombre</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}
	else if($("#semestre").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Semestre</strong> esta vacio, favor de llenarlo.</div>");
		$("#semestre").focus();
		return false;
	}	
}