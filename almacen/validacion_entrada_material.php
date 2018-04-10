<?php
include("../core-saec/AccesoBD.php");
include("../core-saec/Entrada_Material.php");

//validar el guardado de una entrada de material

if(isset($_REQUEST['guardar']))
{
  $IdUsuario = $_POST['usuario'];
  $IdProveedor = $_POST['sltproveedor'];
  $Folio_Factura = $_POST['folio-factura'];
  $IdImpuesto = $_POST['sltimpuesto'];
  $PorcentajeImpuesto = $_POST['porcentaje-impuesto-post'];
  
  //ciclo para capturar los ids de los materiales
  if(!isset($_POST["material"]))
  {
    header('Location: entrada-material-nueva.php?error=Los <strong>Materiales</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
    $Materiales = $_POST["material"];
    $Num_Materiales = sizeof($Materiales);
    $IdMateriales = "";

    for($i=0; $i<$Num_Materiales; $i++)
    {
      $IdMateriales .= $Materiales[$i];
      if($i!=$Num_Materiales-1)
      {
        $IdMateriales .= "|";
      }
    }   
  }           

  //ciclo para capturar los precios de los materiales
  if(!isset($_POST["precio"]))
  {
    header('Location: entrada-material-nueva.php?error=Los <strong>Precios</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
    $Precio = $_POST["precio"];
    $Precios = "";

    for($i=0; $i<$Num_Materiales; $i++)
    {
      $Precios .= $Precio[$i];
      if($i!=$Num_Materiales-1)
      {
        $Precios .= "|";
      }
    }
  }

  //ciclo para capturar los cantidades de los materiales
  if(!isset($_POST["cantidad"]))
  {
    header('Location: entrada-material-nueva.php?error=Las <strong>Cantidades</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
    $Cantidad = $_POST["cantidad"];
    $Cantidades = "";

    for($i=0; $i<$Num_Materiales; $i++)
    {
      $Cantidades .= $Cantidad[$i];
      if($i!=$Num_Materiales-1)
      {
        $Cantidades .= "|";
      }
    }
  }

  //ciclo para capturar las fechas de caducidad de los materiales
  if(!isset($_POST["fechacaducidad"]))
  {
    header('Location: entrada-material-nueva.php?error=Las <strong>Fechas de Caducidades</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
    $FechaCaducidad = $_POST["fechacaducidad"];
    $FechasCaducidades = "";

    for($i=0; $i<$Num_Materiales; $i++)
    {
      $fecha = date_create($FechaCaducidad[$i]);
      $FechaCaducidad[$i] = date_format($fecha,'Y-m-d');

      $FechasCaducidades .= $FechaCaducidad[$i];
      if($i!=$Num_Materiales-1)
      {
        $FechasCaducidades .= "|";
      }
    }
  }
	
  //validar que los campos no esten vacios

  if(!isset($_POST["material"]))
  {
    header('Location: entrada-material-nueva.php?error=Los <strong>Materiales</strong> estan vacios, favor de llenarlos#header');
  }
  else
  {
	//guardar la entrada de material
    $Entrada_Material = new Entrada_Material(
      '',
      $IdUsuario,
      '',
      '',
      $IdProveedor,
      $Folio_Factura,
      $IdImpuesto,
      $PorcentajeImpuesto,
      $IdMateriales,
      $Precios,
      $Cantidades,
      $FechasCaducidades
    );

    $Entrada_Material->Alta();
  }
}
?>