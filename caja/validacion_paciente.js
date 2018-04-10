//validar el correo
function ValidaEmail(email) 
{
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

//validar los datos del paciente
function validacion_paciente()
{	
	if($("#nombre").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Nombre</strong> esta vacio, favor de llenarlo.</div>");
		$("#nombre").focus();
		return false;
	}
	else if($("#apellidopaterno").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Apellido Paterno</strong> esta vacio, favor de llenarlo.</div>");
		$("#apellidopaterno").focus();
		return false;
	}
	else if($("#correo").val() != "")
	{
	    if(ValidaEmail($("#correo").val()) == false)
		{
		    $("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Correo Electrónico</strong> no es valido, favor de llenarlo.</div>");
		    $("#correo").focus();
		    return false;
		}
	}
}