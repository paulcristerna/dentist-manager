<?php
    include("../core-saec/AccesoBD.php");
    include("../core-saec/Concepto.php");

	//actualizar el campo del precio del concepto
	$IdConcepto = $_GET['concepto'];

	$Concepto = new Concepto($IdConcepto);

	$Datos = $Concepto->Obtener_Concepto();

	$DatosConcepto[0] = ($Datos['Precio'] == "" ? "0.00":$Datos['Precio']);

	echo json_encode($DatosConcepto);
?>