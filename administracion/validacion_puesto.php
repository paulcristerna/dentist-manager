<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Puesto.php");

//validar el guardado de un puesto

if(isset($_REQUEST['guardar']))
{
  $Nombre = ucwords(strtolower($_POST["nombre"]));
  $Descripcion = ucwords(strtolower($_POST["descripcion"]));

  //revisar que los campos no esten vacios
	
  if(empty($Nombre))
  {
    header('Location: puesto-nuevo.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Descripcion))
  {
    header('Location: puesto-nuevo.php?error=La <strong>Descripción</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar un puesto
    $Puesto = new Puesto('',$Nombre,$Descripcion);
    $Puesto->Alta();
  }
} 

//validar una edicion de un puesto

if(isset($_REQUEST['editar']))
{
  $IdPuesto = $_POST["puesto"];
  $Nombre = ucwords(strtolower($_POST["nombre"]));
  $Descripcion = ucwords(strtolower($_POST["descripcion"]));
  $Estatus = $_POST["estatus"];

  //revisar que los campos no esten vacios
	
  if(empty($Nombre))
  {
    header('Location: puesto-editar.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Descripcion))
  {
    header('Location: puesto-editar.php?error=La <strong>Descripcion</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//editar un puesto
    $Puesto = new Puesto($IdPuesto,$Nombre,$Descripcion,$Estatus);
    $Puesto->Actualizar();
  }
}
?>