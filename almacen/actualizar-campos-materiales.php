<?php
    include("../core-saec/AccesoBD.php");
    include("../core-saec/Material.php");

	//actualizar los campos de los materiales
	$IdMaterial = $_GET['material'];
	$Material = new Material($IdMaterial);

	$Datos = $Material->ActualizarCamposMateriales();

	echo json_encode($Datos);
?>