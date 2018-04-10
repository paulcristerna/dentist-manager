function validacion_corte_caja()
{
	if($("#sltcajero").val()==0 && $("#sltcajero").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>Debe seleccionar un  <strong>Cajero</strong>.</div>");
		$("#sltcajero").focus();
		return false;
	}
    else if($("#sltturno").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>Solo debe seleccionar un  <strong>Turno</strong>.</div>");
		$("#sltturno").focus();
		return false;
	}
}