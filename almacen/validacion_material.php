<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Area.php");
include("../core-saec/Material.php");

//validar del guardado de un material

if(isset($_REQUEST['guardar']))
{
  $Nombre = ucwords(strtolower($_POST['nombre']));
  $Codigo = strtoupper($_POST['codigo']);
  $Precio = $_POST['precio'];
  $UnidadMedida = ucwords(strtolower($_POST['unidad-medida']));
  $Area = $_POST['area'];
  $Proveedor = $_POST['proveedor'];
  $StockMinimo = $_POST['stock-minimo'];
  $Existencia = 0;

  //revisar que los campos no esten vacios
	
  if(empty($Codigo))
  {
    header('Location: material-nuevo.php?error=El <strong>Codigo</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($UnidadMedida))
  {
    header('Location: material-nuevo.php?error=La <strong>UnidadMedida</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Nombre))
  {
    header('Location: material-nuevo.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  
  else if(empty($Precio))
  {
    header('Location: material-nuevo.php?error=El <strong>Precio</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($StockMinimo))
  {
    header('Location: material-nuevo.php?error=El <strong>StockMinimo</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Area))
  {
    header('Location: material-nuevo.php?error=El <strong>Area</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Proveedor))
  {
    header('Location: material-nuevo.php?error=El <strong>Proveedor</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar el material
    $Material = new Material('',$Nombre,$Codigo,$Precio,$UnidadMedida,$Area,$Proveedor,$StockMinimo);
    $Material->Alta();
  }
}

//validar la edicion de un material

if(isset($_REQUEST['editar']))
{
  $IdMaterial = $_POST["material"];
  $Nombre = ucwords(strtolower($_POST['nombre']));
  $Codigo = strtoupper($_POST['codigo']);
  $Precio = $_POST['precio'];
  $UnidadMedida = ucwords(strtolower($_POST['unidad-medida']));
  $Area = $_POST['area'];
  $Proveedor = $_POST['proveedor'];
  $StockMinimo = $_POST['stock-minimo'];
  $Estatus = $_POST['estatus'];

  //revisar que los campos no esten vacios
  
  if(empty($Nombre))
  {
    header('Location: material-editar.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Codigo))
  {
    header('Location: material-editar.php?error=El <strong>Codigo</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Precio))
  {
    header('Location: material-editar.php?error=El <strong>Precio</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($UnidadMedida))
  {
    header('Location: material-editar.php?error=La <strong>UnidadMedida</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Area))
  {
    header('Location: material-editar.php?error=El <strong>Area</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Proveedor))
  {
    header('Location: material-editar.php?error=El <strong>Proveedor</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($StockMinimo))
  {
    header('Location: material-editar.php?error=El <strong>StockMinimo</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//editar un material
    $Material = new Material($IdMaterial,$Nombre,$Codigo,$Precio,$UnidadMedida,$Area,$Proveedor,$StockMinimo,'',$Estatus);
    $Material->Actualizar();
  }
} 
?>