function validacion_asignacion_parejas_clinica()
{	
	if($("#medico-titular").val()=='0')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Medico Titular</strong> esta vacio, favor de llenarlo.</div>");
		$("#medico-titular").focus();
		return false;
	}
	else if($("#materia").val()=='0')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Materia</strong> esta vacio, favor de llenarlo.</div>");
		$("#materia").focus();
		return false;
	}	
	else if($("#alumno-op-as-1").val()=='0')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Alumno Operador/Asistente 1</strong> esta vacio, favor de llenarlo.</div>");
		$("#alumno-op-as-1").focus();
		return false;
	}
	else if($("#alumno-op-as-2").val()=='0')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Alumno Operador/Asistente 2</strong> esta vacio, favor de llenarlo.</div>");
		$("#alumno-op-as-2").focus();
		return false;
	}
    else if($("#grupo").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Grupo</strong> esta vacio, favor de llenarlo.</div>");
		$("#grupo").focus();
		return false;
	}
}