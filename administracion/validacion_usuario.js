//validar un email

function ValidaEmail(email) 
{
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

//validar el guardado de un usuario

function validacion_usuario()
{
	if($("#numero-cuenta-empleado").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Numero de Empleado</strong> esta vacio, favor de llenarlo.</div>");
		$("#numeroempleado").focus();
		return false;
	}		
	else if($("#nombre").val()=='')
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
	else if($(".calendario").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Fecha de Nacimiento</strong> esta vacio, favor de llenarlo.</div>");
		$(".calendario").focus();
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
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Población</strong> esta vacio, favor de llenarlo.</div>");
		$("#poblacion").focus();
		return false;
	}
	else if($("#telefono").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Teléfono</strong> esta vacio, favor de llenarlo.</div>");
		$("#telefono").focus();
		return false;
	}
	else if($("#correo").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Correo Electrónico</strong> esta vacio, favor de llenarlo.</div>");
		$("#correo").focus();
		return false;
	}
	else if(ValidaEmail($("#correo").val()) == false)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Correo Electrónico</strong> no es valido, favor de llenarlo.</div>");
		$("#correo").focus();
		return false;
	}
	else if($("#tipo").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Tipo</strong> esta vacio, favor de llenarlo.</div>");
		$("#tipo").focus();
		return false;
	}
    else if($("#puesto").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Puesto</strong> esta vacio, favor de llenarlo.</div>");
		$("#puesto").focus();
		return false;
	}
	else if($("#usuario").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Usuario</strong> esta vacio, favor de llenarlo.</div>");
		$("#usuario").focus();
		return false;
	}
	else if($("#nombre-usuario-repetido").val()=='1')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Usuario</strong> no esta disponible, favor de elegir otro.</div>");
		$("#usuario").focus();
		return false;
	}
	else if($("#contrasena").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Contraseña</strong> esta vacio, favor de llenarlo.</div>");
		$("#contrasena").focus();
		return false;
	}	
	else if($("#contrasenaconfirmar").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Confirmar Contraseña</strong> esta vacio, favor de llenarlo.</div>");
		$("#contrasenaconfirmar").focus();
		return false;
	}
	else if($("#contrasena").val()!=$("#contrasenaconfirmar").val())
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Contraseña</strong> es diferente a <strong>Confirmar Contraseña</strong>, favor de corregirlo.</div>");
		$("#contrasenaconfirmar").focus();
		return false;
	}
}

//validar la edicion de un usuario

function validacion_usuario_editar()
{
	if($("#numero-cuenta-empleado").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Numero de Empleado</strong> esta vacio, favor de llenarlo.</div>");
		$("#numeroempleado").focus();
		return false;
	}		
	else if($("#nombre").val()=='')
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
	else if($(".calendario").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Fecha de Nacimiento</strong> esta vacio, favor de llenarlo.</div>");
		$(".calendario").focus();
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
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Población</strong> esta vacio, favor de llenarlo.</div>");
		$("#poblacion").focus();
		return false;
	}
	else if($("#telefono").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Teléfono</strong> esta vacio, favor de llenarlo.</div>");
		$("#telefono").focus();
		return false;
	}
	else if($("#correo").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Correo Electrónico</strong> esta vacio, favor de llenarlo.</div>");
		$("#correo").focus();
		return false;
	}
	else if(ValidaEmail($("#correo").val()) == false)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Correo Electrónico</strong> no es valido, favor de llenarlo.</div>");
		$("#correo").focus();
		return false;
	}
	else if($("#tipo").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Tipo</strong> esta vacio, favor de llenarlo.</div>");
		$("#tipo").focus();
		return false;
	}
    else if($("#puesto").val()==0)
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Puesto</strong> esta vacio, favor de llenarlo.</div>");
		$("#puesto").focus();
		return false;
	}
	else if($("#usuario").val()=='')
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Usuario</strong> esta vacio, favor de llenarlo.</div>");
		$("#usuario").focus();
		return false;
	}
        else if($("#contrasena").val()!=$("#contrasenaconfirmar").val())
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Contraseña</strong> es diferente a <strong>Confirmar Contraseña</strong>, favor de corregirlo.</div>");
		$("#contrasenaconfirmar").focus();
		return false;
	}
}