<?php
include("../core-saec/AccesoBD.php");
include("../core-saec/Devolucion_Material.php");

//validar el guardado de una devolucion de material

if(isset($_REQUEST['guardar']))
{
  $IdSalidaMaterial = $_POST['salida-material'];
  $IdSolicitante = $_POST['solicitante'];
  $Nota =  ucfirst(strtolower($_POST['nota']));
	
  //validar que los campos no esten vacios

  if(!isset($_POST["material"]))
  {
    header('Location: devolucion-material-nueva.php?error=El <strong>Nombre del Material</strong> esta vacio, favor de llenarlo#header');
  }
  else if(!isset($_POST["cantidad"]))
  {
    header('Location: devolucion-material-nueva.php?error=La <strong>Cantidad</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Nota))
  {
    header('Location: devolucion-material-nueva.php?error=El <strong>Motivo de la Devolución</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
    //ciclo para capturar los ids de los materiales
    $Materiales = $_POST["material"];   
    $Num_Materiales = sizeof($Materiales);
    $IdMateriales = "";

    //ciclo para capturar los id de los materiales
    for($i=0; $i<$Num_Materiales; $i++)
    {
      $IdMateriales .= $Materiales[$i];
      if($i!=$Num_Materiales-1)
      {
        $IdMateriales .= "|";
      }
    }

    //ciclo para capturar los cantidad de los materiales
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
      
    //ciclo para capturar las caducidades de los materiales
    $Caducidad = $_POST["caducidad"];  
    $Caducidades = "";

    for($i=0; $i<$Num_Materiales; $i++)
    {
      $fecha = date_create($Caducidad[$i]);
      $Caducidad[$i] = date_format($fecha,'Y-m-d');
        
      $Caducidades .= $Caducidad[$i];
      if($i!=$Num_Materiales-1)
      {
        $Caducidades .= "|";
      }
    }
	  
	//guardar la devolucion de material
    $Devolucion_Material = new Devolucion_Material(
      '',
      $IdSalidaMaterial,
      $IdSolicitante,
      '',
      '',
      $Nota,
      $IdMateriales,
      $Cantidades,
      $Caducidades
    );
      
    $Devolucion_Material->Alta();
  }
}
?>