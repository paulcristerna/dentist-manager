function validacion_material()
{
	if($("#codigo").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Codigo</strong> esta vacio, favor de llenarlo.</div>");
		$("#codigo").focus();
		return false;
	}		
	else if($("#unidad").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Medida</strong> esta vacio, favor de llenarlo.</div>");
		$("#unidad").focus();
		return false;
	}
	else if($("#nombre").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Nombre</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}
	else if($("#precio").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Precio</strong> esta vacio, favor de llenarlo.</div>");
		$("#precio").focus();
		return false;
	}
	else if($("#precio").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Precio</strong> debe ser mayor a 0.</div>");
		$("#precio").focus();
		return false;
	}
	else if(isNaN($("#precio").val()))
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Precio</strong> solo acepta numeros.</div>");
		$("#grupo").focus();
		return false;
	}	
	else if($("#stock").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Stcok Minimo</strong> esta vacio, favor de llenarlo.</div>");
		$("#stock").focus();
		return false;
	}
	else if(isNaN($("#stock").val()))
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Stock Minimo</strong> solo acepta numeros.</div>");
		$("#grupo").focus();
		return false;
	}	
	else if($("#area").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Area</strong> esta vacio, favor de llenarlo.</div>");
		$("#area").focus();
		return false;
	}
	else if($("#proveedor").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Proveedor</strong> esta vacio, favor de llenarlo.</div>");
		$("#proveedor").focus();
		return false;
	}
}