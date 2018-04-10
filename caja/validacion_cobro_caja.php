<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Cobro_Caja.php");

//validar el guardado de un cobro

if(isset($_REQUEST['guardar']))
{
  session_start();
  $IdUsuario = $_SESSION['Usuario'];
  $Tipo = (isset($_POST["tipo"]) ? $_POST["tipo"]:"");
  $IdPaciente = (isset($_POST["paciente"]) ? $_POST["paciente"]:"");
  $IdAlumnoOperadorAsistente = (isset($_POST["alumno-operador-asistente"]) ? $_POST["alumno-operador-asistente"]:"");
  $IdMateria = (isset($_POST["materia"]) ? $_POST["materia"]:"");
  $IdConceptos = (isset($_POST["conceptos"]) ? $_POST["conceptos"]:"");
  $Cantidades = (isset($_POST["cantidades"]) ? $_POST["cantidades"]:"");
  $Precios = (isset($_POST["precios"]) ? $_POST["precios"]:"");
  $IdDescuento = (isset($_POST["descuento"]) ? $_POST["descuento"]:"");
  $PorcentajeDescuento = (isset($_POST["porcentaje-descuento"]) ? $_POST["porcentaje-descuento"]:"");
  $Recibi = (isset($_POST["recibi"]) ? $_POST["recibi"]:"");

  //revisar que los campos no esten vacios

  if($Tipo=="")
  {
    header('Location: cobro-caja-nuevo.php?error=El <strong>Tipo</strong> esta vacio, favor de llenarlo#header');
  }
  else if($IdPaciente=="")
  {
    header('Location: cobro-caja-nuevo.php?error=El <strong>Paciente</strong> esta vacio, favor de llenarlo#header');
  }
  else if($IdAlumnoOperadorAsistente=="")
  {
    header('Location: cobro-caja-nuevo.php?error=El <strong>Alumno Operador/Asistente</strong> esta vacio, favor de llenarlo#header');
  }
  else if($IdMateria=="")
  {
    header('Location: cobro-caja-nuevo.php?error=La <strong>Materia</strong> esta vacia, favor de llenarla#header');
  }
  else if($IdConceptos=="")
  {
    header('Location: cobro-caja-nuevo.php?error=El <strong>Concepto</strong> esta vacio, favor de llenarlo#header');
  }
  else if($Cantidades=="")
  {
    header('Location: cobro-caja-nuevo.php?error=Las <strong>Cantidades</strong> esta vacias, favor de llenarlas#header');
  }
  else if($Precios=="")
  {
    header('Location: cobro-caja-nuevo.php?error=Las <strong>Materias</strong> esta vacias, favor de llenarlas#header');
  }
  else
  {
    $Num_Conceptos = sizeof($IdConceptos);
    $IdConceptosTotal = "";

    for($i=0; $i<$Num_Conceptos; $i++)
    {
      $IdConceptosTotal .= $IdConceptos[$i];
      if($i!=$Num_Conceptos-1)
      {
        $IdConceptosTotal .= "|";
      }
    }
	  
	$Num_Cantidad = sizeof($Cantidades);
    $CantidadesTotal = "";

    for($i=0; $i<$Num_Cantidad; $i++)
    {
      $CantidadesTotal .= $Cantidades[$i];
      if($i!=$Num_Cantidad-1)
      {
        $CantidadesTotal .= "|";
      }
    }
	  
	$Num_Precios = sizeof($Precios);
    $PreciosTotal = "";

    for($i=0; $i<$Num_Precios; $i++)
    {
      $PreciosTotal .= ($IdDescuento == "0" ? $Precios[$i]:($Precios[$i]*$PorcentajeDescuento)/100);
                        
      if($i!=$Num_Precios-1)
      {
        $PreciosTotal .= "|";
      }
    }
	  
	//guardar el cobro de caja
	  
    $Cobro_Caja = new Cobro_Caja
	(
		'',
		$IdUsuario,
		'',
		'',
		$Tipo, 
		$IdPaciente, 
		$IdAlumnoOperadorAsistente, 
		$IdMateria, 
		$IdConceptosTotal, 
		$CantidadesTotal, 
		$PreciosTotal,
		$IdDescuento,
		$PorcentajeDescuento,
		$Recibi
	);
      
    $Cobro_Caja->Alta();
  }
} 
?>
