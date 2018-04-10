//validar el email
function ValidaEmail(email) 
{
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

//validar al proveedor
function validacion_proveedor()
{
	if($("#rfc").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>RFC</strong> esta vacio, favor de llenarlo.</div>");
		$("#rfc").focus();
		return false;
	}		
	else if($("#nombre").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Nombre</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}
	else if($("#alias").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Alias</strong> esta vacio, favor de llenarlo.</div>");
		$("#lblunidadmedida").focus();
		return false;
	}
	
	else if($("#calle").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Calle</strong> esta vacio, favor de llenarlo.</div>");
		$("#calle").focus();
		return false;
	}
	else if($("#numero").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Numero</strong> esta vacio, favor de llenarlo.</div>");
		$("#numero").focus();
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
	else if($("#telefono").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Teléfono</strong> esta vacio, favor de llenarlo.</div>");
		$("#telefono").focus();
		return false;
	}
    else if($("#correo").val()!=0)
	{
		if(ValidaEmail($("#correo").val()) == false)
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Correo Electrónico</strong> no es valido, favor de llenarlo.</div>");
            $("#correo").focus();
            return false;
        }
	}
}