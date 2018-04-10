<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Departamento.php");
include("../core-saec/Area.php");

//validar el guardado de un departamento 

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
    header('Location: departamento-nuevo.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
   
  else if(empty($Calle))
  {
    header('Location: departamento-nuevo.php?error=La <strong>Calle</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Numero))
  {
    header('Location: departamento-nuevo.php?error=El <strong>Numero</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Colonia))
  {
    header('Location: departamento-nuevo.php?error=La <strong>Colonia</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Poblacion))
  {
    header('Location: departamento-nuevo.php?error=La <strong>Población</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($IdAreas))
  {
    header('Location: departamento-nuevo.php?error=Las <strong>Areas</strong> estan vacias, favor de llenarlo#header');
  }
  else
  {    
	//guardar el departamento
    $Departamento = new Departamento('',$Nombre,$Poblacion,$Colonia,$Calle,$Numero,$IdAreas);
    $Departamento->Alta();
  }
} 

//validacion de la edicion de un departamento

if(isset($_REQUEST['editar']))
{
  $IdDepartamento = $_POST["departamento"];
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
    header('Location: departamento-editar.php?departamento='.$IdDepartamento.'&error=El <strong>Nombre</strong> estaba vacio, favor de llenarlo#header');
  } 
  else if(empty($Calle))
  {
    header('Location: departamento-editar.php?departamento='.$IdDepartamento.'&error=La <strong>Calle</strong> estaba vacio, favor de llenarlo#header');
  }
  else if(empty($Numero))
  {
    header('Location: departamento-editar.php?departamento='.$IdDepartamento.'&error=El <strong>Numero</strong> estaba vacio, favor de llenarlo#header');
  }
  if(empty($Colonia))
  {
    header('Location: departamento-editar.php?departamento='.$IdDepartamento.'&error=La <strong>Colonia</strong> estaba vacio, favor de llenarlo#header');
  }
  else if(empty($Poblacion))
  {
    header('Location: departamento-editar.php?departamento='.$IdDepartamento.'&error=La <strong>Población</strong> estaba vacio, favor de llenarlo#header');
  }
  else if(empty($IdAreas))
  {
    header('Location: departamento-editar.php?departamento='.$IdDepartamento.'&error=Las <strong>Areas</strong> estan vacias, favor de llenarlo#header');
  }
  else
  {
	//editar el departamento	  
    $Departamento = new Departamento($IdDepartamento,$Nombre,$Poblacion,$Colonia,$Calle,$Numero,$IdAreas,$Estatus);
    $Departamento->Actualizar();
  }
} 
?>