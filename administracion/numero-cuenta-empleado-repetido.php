<?php 
	include("../core-saec/AccesoBD.php");
	include("../core-saec/Usuario.php");

	//verificar numero de cuenta/empleado
	$NumCuentaEmp = $_GET['num_cuenta_empleado'];

	$Usuario = new Usuario();
	$Usuario->NumeroCuentaEmpleado = $NumCuentaEmp;
	$Datos = $Usuario->Verificar_Num_Cuenta_Empleado_Repetido();

	echo $Datos;
?>