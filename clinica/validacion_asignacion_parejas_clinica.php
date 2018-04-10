<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Pareja_Clinica.php");

//validar el guardado de una asignacion de pareja clinica

if(isset($_REQUEST['guardar']))
{
  $Departamento = $_POST["departamento"];
  $Comunidad = $_POST["comunidad"];
  $MedicoTitular = $_POST["medico-titular"];
  $Materia = $_POST["materia"];
  $AlumnoOpAs1 = $_POST["alumno-op-as-1"];
  $AlumnoOpAs2 = $_POST["alumno-op-as-2"];
  $Grupo = $_POST["grupo"];

  //revisar que los campos no esten vacios
    
  if(empty($MedicoTitular))
  {
    header('Location: asignacion-parejas-clinica-nuevo.php?error=El <strong>Medico Titular</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Materia))
  {
    header('Location: asignacion-parejas-clinica-nuevo.php?error=La <strong>Materia</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($AlumnoOpAs1))
  {
    header('Location: asignacion-parejas-clinica-nuevo.php?error=El <strong>Alumno Operador/Asistente 1</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($AlumnoOpAs2))
  {
    header('Location: asignacion-parejas-clinica-nuevo.php?error=El <strong>Alumno Operador/Asistente 2</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Grupo))
  {
    header('Location: asignacion-parejas-clinica-nuevo.php?error=El <strong>Grupo</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar la asignacion de parejas clinicas
    $Pareja_Clinica = new Pareja_Clinica(
            '', 
            $Departamento, 
            $Comunidad,
            $MedicoTitular, 
            $AlumnoOpAs1, 
            $AlumnoOpAs2, 
            $Materia, 
            $Grupo
    );
      
    $Pareja_Clinica->Alta();
  }
} 

//validar la edicion de asignacion de parejas clinicas

if(isset($_REQUEST['editar']))
{
  $ParejaClinica = $_POST["pareja-clinica"];
  $Departamento = $_POST["departamento"];
  $Comunidad = $_POST["comunidad"];
  $MedicoTitular = $_POST["medico-titular"];
  $Materia = $_POST["materia"];
  $AlumnoOpAs1 = $_POST["alumno-op-as-1"];
  $AlumnoOpAs2 = $_POST["alumno-op-as-2"];
  $Grupo = $_POST["grupo"];
  $Estatus = $_POST["estatus"];

  //revisar que los campos no esten vacios
    
  if(empty($MedicoTitular))
  {
    header('Location: asignacion-parejas-clinica-nuevo.php?error=El <strong>Medico Titular</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Materia))
  {
    header('Location: asignacion-parejas-clinica-nuevo.php?error=La <strong>Materia</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($AlumnoOpAs1))
  {
    header('Location: asignacion-parejas-clinica-nuevo.php?error=El <strong>Alumno Operador/Asistente 1</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($AlumnoOpAs2))
  {
    header('Location: asignacion-parejas-clinica-nuevo.php?error=El <strong>Alumno Operador/Asistente 2</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Grupo))
  {
    header('Location: asignacion-parejas-clinica-nuevo.php?error=El <strong>Grupo</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//editar la asignacion de pareja clinica
    $Pareja_Clinica = new Pareja_Clinica(
                $ParejaClinica, 
                $Departamento, 
                $Comunidad, 
                $MedicoTitular, 
                $AlumnoOpAs1, 
                $AlumnoOpAs2, 
                $Materia, 
                $Grupo, 
                $Estatus
    );
      
    $Pareja_Clinica->Actualizar();
  }
} 
?>