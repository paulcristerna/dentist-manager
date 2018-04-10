<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Area.php");
include("../core-saec/Proveedor.php");

//validar el guardado de un proveedor

if(isset($_REQUEST['guardar']))
{
  $RFC = strtoupper($_POST['rfc']);
  $Nombre = ucwords(strtolower($_POST['nombre']));
  $Alias = ucwords(strtolower($_POST['alias']));
  $Poblacion = ucwords(strtolower($_POST['poblacion']));
  $Colonia = ucwords(strtolower($_POST['colonia']));
  $Calle = ucwords(strtolower($_POST['calle']));
  $Numero = $_POST['numero'];
  $Telefono = $_POST['telefono'];
  $Email = strtolower($_POST['email']);

  //revisar que los campos no esten vacios
	
  if(empty($RFC))
  {
    header('Location: proveedor-nuevo.php?error=El <strong>RFC</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Nombre))
  {
    header('Location: proveedor-nuevo.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Alias))
  {
    header('Location: proveedor-nuevo.php?error=El <strong>Alias</strong> esta vacio, favor de llenarlo#header');
  }
  
  else if(empty($Calle))
  {
    header('Location: proveedor-nuevo.php?error=La <strong>Calle</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Numero))
  {
    header('Location: proveedor-nuevo.php?error=El <strong>Numero</strong> esta vacio, favor de llenarlo#header');
  }

  else if(empty($Colonia))
  {
    header('Location: proveedor-nuevo.php?error=La <strong>Colonia</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Poblacion))
  {
    header('Location: proveedor-nuevo.php?error=La <strong>Poblacion</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Telefono))
  {
    header('Location: proveedor-nuevo.php?error=El <strong>Teléfono</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar el proveedor
    $Proveedor = new Proveedor('',$RFC,$Nombre,$Alias,$Poblacion,$Colonia,$Calle,$Numero,$Telefono,$Email);
    $Proveedor->Alta();
  }
} 

//validar la edicion de un proveedor

if(isset($_REQUEST['editar']))
{
  $IdProveedor = $_POST["proveedor"];
  $RFC = strtoupper($_POST['rfc']);
  $Nombre = ucwords(strtolower($_POST['nombre']));
  $Alias = ucwords(strtolower($_POST['alias']));
  $Poblacion = ucwords(strtolower($_POST['poblacion']));
  $Colonia = ucwords(strtolower($_POST['colonia']));
  $Calle = ucwords(strtolower($_POST['calle']));
  $Numero = $_POST['numero'];
  $Telefono = $_POST['telefono'];
  $Email = strtolower($_POST['email']);
  $Estatus = $_POST['estatus'];

  //revisar que los campos no esten vacios
  
  if(empty($RFC))
  {
    header('Location: proveedor-editar.php?error=El <strong>RFC</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Nombre))
  {
    header('Location: proveedor-editar.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Alias))
  {
    header('Location: proveedor-editar.php?error=El <strong>Alias</strong> esta vacio, favor de llenarlo#header');
  }
  
  else if(empty($Calle))
  {
    header('Location: proveedor-editar.php?error=La <strong>Calle</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Numero))
  {
    header('Location: proveedor-editar.php?error=El <strong>Numero</strong> esta vacio, favor de llenarlo#header');
  }

  else if(empty($Colonia))
  {
    header('Location: proveedor-editar.php?error=La <strong>Colonia</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Poblacion))
  {
    header('Location: proveedor-editar.php?error=La <strong>Población</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Telefono))
  {
    header('Location: proveedor-editar.php?error=El <strong>Teléfono</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//editar al proveedor
    $Proveedor = new Proveedor($IdProveedor,$RFC,$Nombre,$Alias,$Poblacion,$Colonia,$Calle,$Numero,$Telefono,$Email,$Estatus);
    $Proveedor->Actualizar();
  }
} 
?>