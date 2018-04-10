function validacion_departamento()
{    
	if($("#nombre").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Departamento</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}
	else if($("#calle").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Calle</strong> esta vacio, favor de llenarlo.</div>");
		$("#calle").focus();
		return false;
	}	
	else if($("#numero").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Numero</strong> esta vacio, favor de llenarlo.</div>");
		$("#numero").focus();
		return false;
	}
	else if($("#colonia").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Colonia</strong> esta vacio, favor de llenarlo.</div>");
		$("#colonia").focus();
		return false;
	}
	else if($("#poblacion").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Poblacion </strong> esta vacio, favor de llenarlo.</div>");
		$("#poblacion").focus();
		return false;
	}
    else if($('[name="area[]"]:checked').length==0){
        $("#campo-error").html("<div class='alert alert-danger' id='error'>Las <strong>Areas</strong> esta vacio, favor de llenarlo.</div>");
		$("#area").focus();
		return false;
    }
}