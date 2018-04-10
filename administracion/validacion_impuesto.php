<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Impuesto.php");

//validar el guardado de un impuesto

if(isset($_REQUEST['guardar']))
{
  $Nombre = strtoupper($_POST["nombre"]);
  $Porcentaje = $_POST["porcentaje"];

  //revisar que los campos no esten vacios
	
  if(empty($Nombre))
  {
    header('Location: impuesto-nuevo.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Porcentaje))
  {
    header('Location: impuesto-nuevo.php?error=El <strong>Porcentaje</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar un impuesto
    $Impuesto = new Impuesto('',$Nombre,$Porcentaje);
    $Impuesto->Alta();
  }
} 

//validar la edicion de un impuesto

if(isset($_REQUEST['editar']))
{
  $IdImpuesto = $_POST["impuesto"];
  $Nombre = strtoupper($_POST["nombre"]);
  $Porcentaje = $_POST["porcentaje"];
  $Estatus = $_POST["estatus"];

  //revisar que los campos no esten vacios
	
  if(empty($Nombre))
  {
    header('Location: impuesto-editar.php?impuesto='.$IdImpuesto.'&error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Porcentaje))
  {
    header('Location: impuesto-editar.php?impuesto='.$IdImpuesto.'&error=El <strong>Porcentaje</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//editar un impuesto
    $Impuesto = new Impuesto($IdImpuesto,$Nombre,$Porcentaje,$Estatus);
    $Impuesto->Actualizar();
  }
}
?>