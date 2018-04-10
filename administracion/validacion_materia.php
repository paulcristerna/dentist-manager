<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Materia.php");

//validar el guardado de una materia

if(isset($_REQUEST['guardar']))
{
  $Nombre = ucwords(strtolower($_POST["nombre"]));
  $Semestre = $_POST["semestre"];

  //revisar que los campos no esten vacios

  if(empty($Nombre))
  {
    header('Location: paciente-nuevo.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Semestre))
  {
    header('Location: paciente-nuevo.php?error=El <strong>Semestre</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar una materia
    $Materia = new Materia('',$Nombre,$Semestre);
    $Materia->Alta();
  }
} 

//validar la edicion de una materia

if(isset($_REQUEST['editar']))
{
  $Materia = $_POST["materia"];
  $Nombre = ucwords(strtolower($_POST["nombre"]));
  $Semestre = $_POST["semestre"];
  $Estatus = $_POST["estatus"];

  //revisar que los campos no esten vacios

  if(empty($Nombre))
  {
    header('Location: paciente-nuevo.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Semestre))
  {
    header('Location: paciente-nuevo.php?error=El <strong>Semestre</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//editar la materia
    $Materia = new Materia($Materia,$Nombre,$Semestre,$Estatus);
    $Materia->Actualizar();
  }
} 
?>
