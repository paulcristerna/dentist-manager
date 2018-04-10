function validacion_comunidad()
{
	if($("#nombre").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Nombre de la comunidad</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}
	else if($("#colonia").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Colonia</strong> esta vacio, favor de llenarlo.</div>");
		$("#colonia").focus();
		return false;
	}
	else if($("#poblacion").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Población</strong> esta vacio, favor de llenarlo.</div>");
		$("#poblacion").focus();
		return false;
	}
    else if($('[name="area[]"]:checked').length==0){
        $("#campo-error").html("<div class='alert alert-danger' id='error'>Las <strong>Areas</strong> estas vacias, favor de llenarlo.</div>");
		$("#area").focus();
		return false;
    }
}