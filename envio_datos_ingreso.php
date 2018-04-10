<?php 
	include("core-saec/AccesoBD.php");
	include("core-saec/Usuario.php");

	//enviar al correo datos de ingreso al sistema

	if(isset($_POST['enviar']))
	{
    	$Usuario = new Usuario();
		$Usuario->Email = $_POST['correo-electronico'];
    	$Usuario->Envio_Datos_Ingreso();
	}
?>