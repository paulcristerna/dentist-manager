<?php 
	include("../core-saec/AccesoBD.php");
	include("../core-saec/Usuario.php");

	//varificar usuario repetido
	$Usuario_Form = $_GET['usuario'];

	$Usuario = new Usuario();
	$Usuario->Usuario = $Usuario_Form;
	$Datos = $Usuario->Verificar_Usuario_Repetido();

	echo $Datos;
?>