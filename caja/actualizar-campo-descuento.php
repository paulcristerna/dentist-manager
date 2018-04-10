<?php
    include("../core-saec/AccesoBD.php");
    include("../core-saec/Descuento.php");

	//actualizar el campo porcentaje de descuento
	$IdDescuento = $_GET['descuento'];

	$Descuento = new Descuento($IdDescuento);

	$Datos = $Descuento->Obtener_Descuento();

	$DatosDescuento[0] = ($Datos['Porcentaje'] == "" ? "0.00":$Datos['Porcentaje']);

	echo json_encode($DatosDescuento);
?>