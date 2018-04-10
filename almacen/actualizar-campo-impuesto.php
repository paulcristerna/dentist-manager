<?php
    include("../core-saec/AccesoBD.php");
    include("../core-saec/Impuesto.php");

	//actualizar el campo de impuesto
	$IdImpuesto = $_GET['impuesto'];

	$Impuesto = new Impuesto($IdImpuesto); 

	$DatosImpuesto = $Impuesto->ActualizarCampoImpuesto();

	echo json_encode($DatosImpuesto);
?>