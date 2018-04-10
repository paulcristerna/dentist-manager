function validacion_comunidad_asignar()
{
	if($("#comunidad").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Comunidad Comunitario</strong> esta vacio, favor de llenarlo.</div>");
		$("#comunidad").focus();
		return false;
	}
	else if($("#doctor").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Doctor Comunitario</strong> esta vacio, favor de llenarlo.</div>");
		$("#doctor").focus();
		return false;
	}		
	else if($("#alumno").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Alumno Tesorero</strong> esta vacio, favor de llenarlo.</div>");
		$("#alumno").focus();
		return false;
	}
	else if($("#semestre").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Semestre</strong> esta vacio, favor de llenarlo.</div>");
		$("#semestre").focus();
		return false;
	}
	else if($("#grupo").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Grupo</strong> esta vacio, favor de llenarlo.</div>");
		$("#grupo").focus();
		return false;
	}	

}