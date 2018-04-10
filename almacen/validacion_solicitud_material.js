function validacion_solicitud_material()
{
	if($("#sltdepartamento-solicitud").val()==0 && $("#sltcomunidad-solicitud").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>Debe especificar un <strong>Departamento</strong> o <strong>Comunidad</strong> esta vacio, favor de llenarlo.</div>");
		$("#sltdepartamento").focus();
		return false;
	}
    /*else if($("#sltcomunidad-solicitud").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Comunidad</strong> esta vacio, favor de llenarlo.</div>");
		$("#sltcomunidad").focus();
		return false;
	}*/
}