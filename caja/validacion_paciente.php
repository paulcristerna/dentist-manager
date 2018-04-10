<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Paciente.php");

//validar el guardado de un paciente

if(isset($_REQUEST['guardar']))
{
  $Nombre = ucwords(strtolower($_POST["nombre"]));
  $ApellidoPaterno = ucwords(strtolower($_POST["apellido-paterno"]));
  $ApellidoMaterno = ucwords(strtolower($_POST["apellido-materno"]));
  $Sexo = $_POST["sexo"];
  $FechaNacimiento = $_POST["fecha-nacimiento"];
  $Calle = ucwords(strtolower($_POST["calle"]));
  $Numero = $_POST["numero"];
  $Colonia = ucwords(strtolower($_POST["colonia"]));
  $Poblacion = ucwords(strtolower($_POST["poblacion"]));
  $Telefono = $_POST["telefono"];
  $Email = strtolower($_POST["email"]);
  $Ocupacion = ucwords(strtolower($_POST["ocupacion"]));
  $LugarNacimiento = ucwords(strtolower($_POST["lugar-nacimiento"]));
  $CodigoPostal = ucwords(strtolower($_POST["codigo-postal"]));
  $EstadoCivil = ucwords(strtolower($_POST["estado-civil"]));
  $Escolaridad = ucwords(strtolower($_POST["escolaridad"]));

  //revisar que los campos no esten vacios

  if(empty($Nombre))
  {
    header('Location: paciente-nuevo.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($ApellidoPaterno))
  {
    header('Location: paciente-nuevo.php?error=El <strong>Apellido Paterno</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar al paciente    
    $date = new DateTime($FechaNacimiento);
    $FechaNacimiento = $date->format('Y-m-d'); 

    $Paciente = new Paciente('',
                            $Nombre, 
                            $ApellidoPaterno, 
                            $ApellidoMaterno, 
                            $Sexo, 
                            $FechaNacimiento, 
                            $Calle, 
                            $Numero, 
                            $Colonia, 
                            $Poblacion, 
                            $Telefono, 
                            $Email,
			    $Ocupacion,
			    $LugarNacimiento,
			    $CodigoPostal, 
			    $EstadoCivil, 
			    $Escolaridad 
                            );
      
    $Paciente->Alta();
  }
} 

//validar la edicion del paciente

if(isset($_REQUEST['editar']))
{
  $IdPaciente = $_POST["paciente"];
  $Nombre = ucwords(strtolower($_POST["nombre"]));
  $ApellidoPaterno = ucwords(strtolower($_POST["apellido-paterno"]));
  $ApellidoMaterno = ucwords(strtolower($_POST["apellido-materno"]));
  $Sexo = $_POST["sexo"];
  $FechaNacimiento = $_POST["fecha-nacimiento"];
  $Calle = ucwords(strtolower($_POST["calle"]));
  $Numero = $_POST["numero"];
  $Colonia = ucwords(strtolower($_POST["colonia"]));
  $Poblacion = ucwords(strtolower($_POST["poblacion"]));
  $Telefono = $_POST["telefono"];
  $Email = strtolower($_POST["email"]);
  $Ocupacion = ucwords(strtolower($_POST["ocupacion"]));
  $LugarNacimiento = ucwords(strtolower($_POST["lugar-nacimiento"]));
  $CodigoPostal = ucwords(strtolower($_POST["codigo-postal"]));
  $EstadoCivil = ucwords(strtolower($_POST["estado-civil"]));
  $Escolaridad = ucwords(strtolower($_POST["escolaridad"]));
  $Estatus = $_POST["estatus"];

  //revisar que los campos no esten vacios

  if(empty($Nombre))
  {
    header('Location: paciente-editar.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($ApellidoPaterno))
  {
    header('Location: paciente-editar.php?error=El <strong>Apellido Paterno</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//editar al paciente    
    $date = new DateTime($FechaNacimiento);
    $FechaNacimiento = $date->format('Y-m-d'); 

    $Paciente = new Paciente(
                            $IdPaciente,
                            $Nombre, 
                            $ApellidoPaterno, 
                            $ApellidoMaterno, 
                            $Sexo, 
                            $FechaNacimiento, 
                            $Calle, 
                            $Numero, 
                            $Colonia, 
                            $Poblacion, 
                            $Telefono, 
                            $Email,
                            $Ocupacion,
                            $LugarNacimiento,
			                $CodigoPostal,
			                $EstadoCivil,
			                $Escolaridad,
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            $Estatus
			    );
      
    $Paciente->Actualizar();
  }
} 
?>