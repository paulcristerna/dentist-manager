<?php
include("../core-saec/AccesoBD.php");
include("../core-saec/Descuento.php");

//validar el guardado de un descuento

if(isset($_REQUEST['guardar']))
{
  $Nombre = ucwords(strtolower($_POST['nombre']));
  $Porcentaje = $_POST['porcentaje'];

  //revisar que los campos no esten vacios
  if(empty($Nombre))
  {
    header('Location: descuento-nuevo.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Porcentaje))
  {
    header('Location: descuento-nuevo.php?error=El <strong>Porcentaje</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar un descuento
    $Descuento = new Descuento(
        '',
        $Nombre,
        $Porcentaje
    );

    $Descuento->Alta();
  }
} 

//validar la edicion de un descuento

if(isset($_REQUEST['editar']))
{
  $Descuento = $_POST['descuento'];
  $Nombre = ucwords(strtolower($_POST['nombre']));
  $Porcentaje = $_POST['porcentaje'];
  $Estatus = $_POST['estatus'];

  //revisar que los campos no esten vacios
	
  if(empty($Nombre))
  {
    header('Location: descuento-nuevo.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Porcentaje))
  {
    header('Location: descuento-nuevo.php?error=El <strong>Porcentaje</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//editar un descuento
    $Descuento = new Descuento(
        $Descuento,
        $Nombre,
        $Porcentaje,
		$Estatus
    );

    $Descuento->Actualizar();
  }
} 
?>