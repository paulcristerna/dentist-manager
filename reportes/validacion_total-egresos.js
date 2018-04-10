function validacion_total_egresos()
{
	if($("#sltdepartamentos").val()==0 && $("#sltcomunidades").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>Debe seleccionar un  <strong>Departamento</strong> o <strong>Comunidad</strong>.</div>");
		$("#sltclinica").focus();
		$("#sltcomunidades").focus();
		return false;
	}
    else if($("#sltdepartamentos").val()!=0 && $("#sltcomunidades").val()!=0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>Solo debe seleccionar un  <strong>Departamento</strong> o <strong>Comunidad</strong>.</div>");
		$("#sltclinica").focus();
		$("#sltcomunidades").focus();
		return false;
	}
}