<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Comunidad.php");

//validar el guardado de una comunidad

if(isset($_REQUEST['guardar']))
{
  $Nombre = ucwords(strtolower($_POST["nombre"]));
  $Poblacion = ucwords(strtolower($_POST["poblacion"]));
  $Colonia = ucwords(strtolower($_POST["colonia"]));
  $Calle = ucwords(strtolower($_POST["calle"]));
  $Numero = $_POST["numero"];
  $checkBox = $_POST["area"];
  $TotalCheckBox = sizeof($checkBox);
  $IdAreas = "";

  for($i=0; $i<$TotalCheckBox; $i++)
  {
    $IdAreas .= $checkBox[$i];
    if($i!=$TotalCheckBox-1)
    {
      $IdAreas .= "|";
    }
  }
	
  //revisar que los campos no esten vacios
  
  if(empty($Nombre))
  {
    header('Location: comunidad-nueva.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Colonia))
  {
    header('Location: comunidad-nueva.php?error=La <strong>Colonia</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Poblacion))
  {
    header('Location: comunidad-nueva.php?error=La <strong>Población</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($IdAreas))
  {
    header('Location: comunidad-nueva.php?error=Las <strong>Areas</strong> esta vacio, favor de llenarlo#header');
  }  
  else
  { 
	//guardar la comunidad
    $Comunidad = new Comunidad('',$Nombre,$Poblacion,$Colonia,$Calle,$Numero,$IdAreas);    
    $Comunidad->Alta();
  }
} 

//validar la edicion de una comunidad

if(isset($_REQUEST['editar']))
{
  $IdComunidad = $_POST["comunidad"];
  $Nombre = ucwords(strtolower($_POST["nombre"]));
  $Poblacion = ucwords(strtolower($_POST["poblacion"]));
  $Colonia = ucwords(strtolower($_POST["colonia"]));
  $Calle = ucwords(strtolower($_POST["calle"]));
  $Numero = $_POST["numero"];
  $Estatus = $_POST["estatus"];

  $checkBox = $_POST["area"];
  $TotalCheckBox = sizeof($checkBox);
  $IdAreas = "";

  for($i=0; $i<$TotalCheckBox; $i++)
  {
    $IdAreas .= $checkBox[$i];
    if($i!=$TotalCheckBox-1)
    {
      $IdAreas .= "|";
    }
  }

  //revisar que los campos no esten vacios
  
  if(empty($Nombre))
  {
    header('Location: comunidad-editar.php?area='.$IdComunidad.'&error=El <strong>Nombre</strong> estaba vacio, favor de llenarlo#header');
  }
  else if(empty($Colonia))
  {
    header('Location: comunidad-editar.php?area='.$IdComunidad.'&error=La <strong>Colonia</strong> estaba vacio, favor de llenarlo#header');
  }
  if(empty($Poblacion))
  {
    header('Location: comunidad-editar.php?area='.$IdComunidad.'&error=La <strong>Población</strong> estaba vacio, favor de llenarlo#header');
  }
  else if(empty($IdAreas))
  {
    header('Location: comunidad-editar.php?area='.$IdComunidad.'&error=Las <strong>Areas</strong> estaba vacio, favor de llenarlo#header');
  }
  else
  {
	//editar la comunidad
    $Comunidad = new Comunidad($IdComunidad,$Nombre,$Poblacion,$Colonia,$Calle,$Numero,$IdAreas,'','','','','',$Estatus);
    $Comunidad->Actualizar();
  }
} 
?>