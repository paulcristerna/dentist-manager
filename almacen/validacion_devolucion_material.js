function validacion_devolucion_material()
{
	if($("#nota").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Motivo de la Devolución</strong> esta vacio, favor de llenarlo.</div>");
		$("#nota").focus();
		return false;
	}
}