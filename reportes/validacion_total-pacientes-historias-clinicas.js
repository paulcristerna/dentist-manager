function validacion_total_pacientes_historias_clinicas()
{
	if($("#sltclinica").val()==0 && $("#sltcomunidades").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>Debe seleccionar una  <strong>Clinica</strong> o <strong>Comunidad</strong>.</div>");
		$("#sltclinica").focus();
		$("#sltcomunidades").focus();
		return false;
	}
    else if($("#sltclinica").val()!=0 && $("#sltcomunidades").val()!=0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>Solo debe seleccionar una  <strong>Clinica</strong> o <strong>Comunidad</strong>.</div>");
		$("#sltclinica").focus();
		$("#sltcomunidades").focus();
		return false;
	}
    else if($("#sltmateria").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La  <strong>Materia</strong> esta vacia, favor de llenarla.</div>");
		$("#sltclinica").focus();
		$("#sltcomunidades").focus();
		return false;
	}
}