<?php
include("../core-saec/AccesoBD.php");
include("../core-saec/Administracion.php");

//validar el guardado de una administracion

if(isset($_REQUEST['guardar']))
{
  $FechaInicio = trim($_POST['fecha-inicio']);
  $FechaFin = trim($_POST['fecha-fin']);
  $IdDirector = trim($_POST['director']);
  $IdSecretarioAdministrativo = trim($_POST['secretario-administrativo']);
  $IdSecretarioAcademico = trim($_POST['secretario-academico']);
  $FolioEntradasMaterial = trim($_POST['folio-entradas']);
  $FolioSolicitudesMaterial = trim($_POST['folio-solicitudes']);
  $FolioSalidasMaterial = trim($_POST['folio-salidas']);
  $FolioDevolucionesMaterial = trim($_POST['folio-devoluciones']);
  $FolioCobrosCaja = trim($_POST['folio-cobros-caja']);

  //revisar que los campos no esten vacios
	
  if(empty($FechaInicio))
  {
    header('Location: administracion-nueva.php?error=La <strong>Fecha de Inicio</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($FechaFin))
  {
    header('Location: administracion-nueva.php?error=La <strong>Fecha de Fin</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($IdDirector))
  {
    header('Location: administracion-nueva.php?error=El <strong>Director</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($IdSecretarioAdministrativo))
  {
    header('Location: administracion-nueva.php?error=El <strong>Secretario Administrativo</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($IdSecretarioAcademico))
  {
    header('Location: administracion-nueva.php?error=El <strong>Secretario Academico</strong> esta vacio, favor de llenarlo#header');
  }
  else if($FolioEntradasMaterial  == '')
  {
    header('Location: administracion-nueva.php?error=El <strong>Folio de Entradas</strong> este es: '.$FolioEntradasMaterial.' esta vacio, favor de llenarlo#header');
  }
  else if($FolioSolicitudesMaterial  == '')
  {
    header('Location: administracion-nueva.php?error=El <strong>Folio de Solicitudes</strong> esta vacio, favor de llenarlo#header');
  }
  else if($FolioSalidasMaterial == '')
  {
    header('Location: administracion-nueva.php?error=El <strong>Folio de Salidas</strong> esta vacio, favor de llenarlo#header');
  }
  else if($FolioDevolucionesMaterial == '')
  {
    header('Location: administracion-nueva.php?error=El <strong>Folio de Devoluciones</strong> esta vacio, favor de llenarlo#header');
  }
  else if($FolioCobrosCaja == '')
  {
    header('Location: administracion-nueva.php?error=El <strong>Folio de Cobros</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
    //guardar la administracion
	  
    $fecha = date_create($FechaInicio);
    $FechaInicio = date_format($fecha,'Y-m-d');

    $fecha = date_create($FechaFin);
    $FechaFin = date_format($fecha,'Y-m-d');

    $Administracion = new Administracion(
        '',
        $IdDirector,
        $IdSecretarioAdministrativo,
        $IdSecretarioAcademico,
        $FechaInicio,
        $FechaFin,
        $FolioEntradasMaterial,
        $FolioSalidasMaterial,
        $FolioSolicitudesMaterial,
        $FolioDevolucionesMaterial,
		$FolioCobrosCaja
    );

    $Administracion->Alta_Administracion();
  }
} 

//validar la edicion de la administracion

if(isset($_REQUEST['editar']))
{
  $IdAdministracion = trim($_POST['administracion']);
  $FechaInicio = trim($_POST['fecha-inicio']);
  $FechaFin = trim($_POST['fecha-fin']);
  $IdDirector = trim($_POST['director']);
  $IdSecretarioAdministrativo = trim($_POST['secretario-administrativo']);
  $IdSecretarioAcademico = trim($_POST['secretario-academico']);
  $FolioEntradasMaterial = trim($_POST['folio-entradas']);
  $FolioSolicitudesMaterial = trim($_POST['folio-solicitudes']);
  $FolioSalidasMaterial = trim($_POST['folio-salidas']);
  $FolioDevolucionesMaterial = trim($_POST['folio-devoluciones']);
  $FolioCobrosCaja = trim($_POST['folio-cobros-caja']);
  $Activo = trim($_POST['activo']);

  //revisar que los campos no esten vacios
	
  if(empty($FechaInicio))
  {
    header('Location: administracion-editar.php?administracion='.$IdAdministracion.'&error=La <strong>Fecha de Inicio</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($FechaFin))
  {
    header('Location: administracion-editar.php?administracion='.$IdAdministracion.'&error=La <strong>Fecha de Fin</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($IdDirector))
  {
    header('Location: administracion-editar.php?administracion='.$IdAdministracion.'&error=El <strong>Director</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($IdSecretarioAdministrativo))
  {
    header('Location: administracion-editar.php?administracion='.$IdAdministracion.'&error=El <strong>Secretario Administrativo</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($IdSecretarioAcademico))
  {
    header('Location: administracion-editar.php?administracion='.$IdAdministracion.'&error=El <strong>Secretario Academico</strong> esta vacio, favor de llenarlo#header');
  }
  else if($FolioEntradasMaterial == '')
  {
    header('Location: administracion-editar.php?administracion='.$IdAdministracion.'&error=El <strong>Folio de Entradas</strong> esta vacio, favor de llenarlo#header');
  }
  else if($FolioSolicitudesMaterial == '')
  {
    header('Location: administracion-editar.php?administracion='.$IdAdministracion.'&error=El <strong>Folio de Solicitudes</strong> esta vacio, favor de llenarlo#header');
  }
  else if($FolioSalidasMaterial == '')
  {
    header('Location: administracion-editar.php?administracion='.$IdAdministracion.'&error=El <strong>Folio de Salidas</strong> esta vacio, favor de llenarlo#header');
  }
  else if($FolioDevolucionesMaterial == '')
  {
    header('Location: administracion-editar.php?administracion='.$IdAdministracion.'&error=El <strong>Folio de Devoluciones</strong> esta vacio, favor de llenarlo#header');
  }
  else if($FolioCobrosCaja == '')
  {
    header('Location: administracion-nueva.php?error=El <strong>Folio de Cobros</strong> esta vacio, favor de llenarlo#header');
  }
  else if($Activo=='')
  {
    header('Location: administracion-editar.php?administracion='.$IdAdministracion.'&error=El <strong>Activo</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
    //editar la administracion
	  
    $fecha = date_create($FechaInicio);
    $FechaInicio = date_format($fecha,'Y-m-d');

    $fecha = date_create($FechaFin);
    $FechaFin = date_format($fecha,'Y-m-d');

    $Administracion = new Administracion(
        $IdAdministracion,
        $IdDirector,
        $IdSecretarioAdministrativo,
        $IdSecretarioAcademico,
        $FechaInicio,
        $FechaFin,
        $FolioEntradasMaterial,
        $FolioSalidasMaterial,
        $FolioSolicitudesMaterial,
        $FolioDevolucionesMaterial,
		$FolioCobrosCaja,
        $Activo
    );

    $Administracion->Actualizar_Administracion();
  }
} 
?>