<?php
include("../core-saec/AccesoBD.php");
include("../core-saec/Salida_Material.php");

//validar la entrega de material

if(isset($_REQUEST['entregar']))
{
  $IdSalidaMaterial = $_POST['salida-material'];
  $IdUsuario = $_POST['usuario'];
	
  //guardar la entrega de material
  $Salida_Material = new Salida_Material($IdSalidaMaterial,$IdUsuario);
  $Salida_Material->Entregar();
}
?>