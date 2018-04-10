<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Comunidad.php");

//validar el guardado de la signacion de una comunidad

if(isset($_REQUEST['guardar']))
{
  $IdComunidad = $_POST["comunidad"];
  $IdDoctorComunitario = $_POST["doctor-comunitario"];
  $IdAlumnoTesorero = $_POST["alumno-tesorero"];
  $Semestre = $_POST["semestre"];
  $Grupo = $_POST["grupo"];

  //guardar la asignacion de la comunidad
  $Comunidad = new Comunidad(
    $IdComunidad,
    '',
    '',
    '',
    '',
    '',
    '',
    $IdDoctorComunitario,
    $IdAlumnoTesorero,
    $Semestre,
    $Grupo
  );            
  
  $Comunidad->AsignacionComunidad_Alta();
} 

//validar la edicion de la signacion de una comunidad

if(isset($_REQUEST['editar']))
{
  $IdAsignacionComunidad = $_POST["asignacion-comunidad"];
  $IdComunidad = $_POST["comunidad"];
  $IdDoctorComunitario = $_POST["doctor-comunitario"];
  $IdAlumnoTesorero = $_POST["alumno-tesorero"];
  $Semestre = $_POST["semestre"];
  $Grupo = $_POST["grupo"];
  $Estatus = $_POST["estatus"];
	
  //editar la asignacion de la comunidad
  $Comunidad = new Comunidad(
    $IdComunidad,
    '',
    '',
    '',
    '',
    '',
    '',
    $IdDoctorComunitario,
    $IdAlumnoTesorero,
    $Semestre,
    $Grupo,
    $IdAsignacionComunidad,
    $Estatus
  );            
  
  $Comunidad->AsignacionComunidad_Actualizar();
} 
?>