<?php
include("../core-saec/AccesoBD.php");
include("../core-saec/Concepto.php");

//validar el guardado de conceptos

if(isset($_REQUEST['guardar']))
{
  $Nombre = ucwords(strtolower($_POST["nombre"]));
  $Precio = $_POST["precio"];

  //revisar que los campos no esten vacios
	
  if(empty($Nombre))
  {
    header('Location: area-nueva.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Precio))
  {
    header('Location: area-nueva.php?error=El <strong>Precio</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar el concepto
    $Concepto = new Concepto('',$Nombre,$Precio);
    $Concepto->Alta();
  }
} 

//validar la edicion de conceptos

if(isset($_REQUEST['editar']))
{
  $IdConcepto = $_POST["concepto"];
  $Nombre = ucwords(strtolower($_POST["nombre"]));
  $Precio = $_POST["precio"];
  $Estatus = $_POST["estatus"];

  //revisar que los campos no esten vacios
	
  if(empty($Nombre))
  {
    header('Location: area-nueva.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Precio))
  {
    header('Location: area-nueva.php?error=El <strong>Precio</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//editar el concepto
    $Concepto = new Concepto($IdConcepto,$Nombre,$Precio,$Estatus);
    $Concepto->Actualizar();
  }
} 
?>