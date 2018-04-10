<?php
include("../core-saec/AccesoBD.php");
include("../core-saec/Solicitud_Material.php");

//validar el guardado de una solicitud de material

if(isset($_REQUEST['guardar']))
{
  $Nota = ucfirst(strtolower($_POST['nota']));
  $IdSolicitante = $_POST['solicitante'];
    
  if(isset($_POST['departamento'])):
    $IdDepartamento = $_POST['departamento'];
  else:
    $IdDepartamento = '0';
  endif;
    
  if(isset($_POST['comunidad'])):
    $IdComunidad = $_POST['comunidad'];
  else:
    $IdComunidad = '0';
  endif;
  
  //ciclo para capturar los ids de los materiales
  if(!isset($_POST["material"]))
  {
    header('Location: solicitud-material-nueva.php?error=Los <strong>Materiales</strong> estan vacios, favor de llenarlo#header');
  }
  else
  {
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
  } 
    
  //ciclo para capturar los precios de los materiales
  if(!isset($_POST["precio"]))
  {
    header('Location: solicitud-material-nueva.php?error=Los <strong>Precios</strong> estan vacios, favor de llenarlo#header');
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

  //ciclo para capturar los cantidad de los materiales
  if(!isset($_POST["cantidad"]))
  {
    header('Location: solicitud-material-nueva.php?error=Las <strong>Cantidades</strong> esta vacias, favor de llenarlo#header');
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

  if(!isset($_POST["cantidad"]))
  {
    header('Location: solicitud-material-nueva.php?error=Los <strong>materiales</strong> estan vacios#header');
  }
  else
  {   
	//guardar una solicitud de material
    $Solicitud_Material = new Solicitud_Material(
      '',
      '',
      '',
      $IdSolicitante,
      $Nota,
      $IdMateriales,
      $IdDepartamento,
      $IdComunidad,
      $Precios,
      $Cantidades
    );
        
    $Solicitud_Material->Alta();
  }
}

//validar la edicion de una solicitud de material

if(isset($_REQUEST['editar']))
{
  $IdSolicitudMaterial = $_POST['solicitud-material'];
  $Nota = ucfirst(strtolower($_POST['nota']));
  
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
	
  //ciclo para capturar los precios de los materiales
	
  if(!isset($_POST["precio"]))
  {
    header('Location: solicitud-material-nueva.php?error=Los <strong>Precios</strong> estan vacios, favor de llenarlo#header');
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
	
  //guardar una solicitud de material
  $Solicitud_Material = new Solicitud_Material(
    $IdSolicitudMaterial,
    '',
    '',
    '',
    $Nota,
    $IdMateriales,
    '',
    '',
    $Precios,
    $Cantidades
  );

  $Solicitud_Material->Actualizar();
}

//validacion de la autorizacion una solicitud de material

if(isset($_REQUEST['autorizar']))
{
  $IdSolicitudMaterial = $_POST['solicitud-material'];
  $Solicitante = $_POST['solicitante'];
  $Nota = ucfirst(strtolower($_POST['nota']));
  $IdDepartamento = ($_POST['departamento'] != "" ? $_POST['departamento']:"0");
  $IdComunidad = ($_POST['comunidad'] != "" ? $_POST['comunidad']:"0");
  $Autorizado = $_POST['autorizado'];
  
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

  //ciclo para capturar los precios de los materiales
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

  //ciclo para capturar los cantidades de los materiales
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
	
  //autorizar la solicitud de material
  $Solicitud_Material = new Solicitud_Material(
    $IdSolicitudMaterial,
    '',
    '',
    $Solicitante,
    $Nota,
    $IdMateriales,
    $IdDepartamento,
    $IdComunidad,
    $Precios,
    $Cantidades,
    $Autorizado
  );

  $Solicitud_Material->Autorizar();
}
?>