<?php
include("../core-saec/AccesoBD.php");
include("../core-saec/Area.php");

//validar el guardado del area

if(isset($_REQUEST['guardar']))
{
  $Nombre = ucwords(strtolower($_POST["nombre"]));
  $Descripcion = ucwords(strtolower($_POST["descripcion"]));

  //revisar que los campos no esten vacios
	
  if(empty($Nombre))
  {
    header('Location: area-nueva.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Descripcion))
  {
    header('Location: area-nueva.php?error=La <strong>Descripcion</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar el area
	  
    $Area = new Area('',$Nombre,$Descripcion);
    $Area->Alta();
  }
} 

//validar la edicion del area

if(isset($_REQUEST['editar']))
{
  $IdArea = $_POST["area"];
  $Nombre = $_POST["nombre"];
  $Descripcion = $_POST["descripcion"];
  $Estatus = $_POST["estatus"];

  //revisar que los campos no esten vacios
	
  if(empty($Nombre))
  {
    header('Location: area-editar.php?area='.$IdArea.'&error=El <strong>Nombre</strong> estaba vacio, favor de llenarlo#header');
  }
  else if(empty($Descripcion))
  {
    header('Location: area-editar.php?area='.$IdArea.'&error=La <strong>Descripcion</strong> estaba vacio, favor de llenarlo#header');
  }
  else
  {
	//editar el area
	  
    $Area = new Area($IdArea,$Nombre,$Descripcion,$Estatus);
    $Area->Actualizar();
  }
} 
?>