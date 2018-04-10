<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Usuario.php");

//validar el guardado de un usuario

if(isset($_REQUEST['guardar']))
{
  $NumeroCuentaEmpleado = $_POST["numero-cuenta-empleado"];
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
  $Tipo = $_POST["tipo"];
  $IdDepartamento = $_POST["departamento"];
  $IdPuesto = $_POST["puesto"];
  $Turno = $_POST["turno"];
  $NombreUsuario = ucwords(strtolower($_POST["usuario"]));
  $Contrasena = strtolower($_POST["contrasena"]);

  //revisar que los campos no esten vacios

  if(empty($NumeroCuentaEmpleado))
  {
    header('Location: usuario-nuevo.php?error=El <strong>Numero de empleado</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Nombre))
  {
    header('Location: usuario-nuevo.php?error=El <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($ApellidoPaterno))
  {
    header('Location: usuario-nuevo.php?error=El <strong>Apellido Paterno</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Colonia))
  {
    header('Location: usuario-nuevo.php?error=La <strong>Colonia</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Poblacion))
  {
    header('Location: usuario-nuevo.php?error=La <strong>Poblacion</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Telefono))
  {
    header('Location: usuario-nuevo.php?error=El <strong>Telefono</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Email))
  {
    header('Location: usuario-nuevo.php?error=El <strong>Email</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Tipo))
  {
    header('Location: usuario-nuevo.php?error=El <strong>Tipo</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($IdPuesto))
  {
    header('Location: usuario-nuevo.php?error=El <strong>Puesto</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($NombreUsuario))
  {
    header('Location: usuario-nuevo.php?error=El <strong>Usuario</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Contrasena))
  {
    header('Location: usuario-nuevo.php?error=La <strong>Contraseña</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar al usuario   
    
    $date = new DateTime($FechaNacimiento);
    $FechaNacimiento = $date->format('Y-m-d'); 

    $Usuario = new Usuario  ('',
                            $NumeroCuentaEmpleado,
                            $Nombre, 
                            $ApellidoPaterno, 
                            $ApellidoMaterno, 
                            $Sexo, 
                            $FechaNacimiento, 
                            $Poblacion, 
                            $Colonia, 
                            $Calle, 
                            $Numero, 
                            $Telefono, 
                            $Email, 
                            $Tipo, 
                            $IdDepartamento, 
                            $IdPuesto,
                            $Turno,
                            $NombreUsuario,
                            ''); 
      
    $Contrasena = $Usuario->Encriptar($Contrasena,'F32_SAEC_FOUAS');
      
    $Usuario->Contrasena = $Contrasena;
    
    $Usuario->Alta();
  }
} 

//validar la edicion de un usuario

if(isset($_REQUEST['editar']))
{
  $IdUsuario = $_POST["usuario"];
  $NumeroCuentaEmpleado = $_POST["numero-cuenta-empleado"];
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
  $Tipo = $_POST["tipo"];
  $IdDepartamento = $_POST["departamento"];
  $IdPuesto = $_POST["puesto"];
  $Turno = $_POST["turno"];
  $NombreUsuario = ucwords(strtolower($_POST["nombre-usuario"]));
  $Contrasena = strtolower($_POST["contrasena"]);
  $Estatus = $_POST["estatus"];

  //revisar que los campos no esten vacios
	
  if(empty($NumeroCuentaEmpleado))
  {
    header('Location: usuario-editar.php?usuario='.$IdUsuario.'&error=El <strong>NumeroCuentaEmpleado</strong> estaba vacio, favor de llenarlo#header');
  }
  else if(empty($Nombre))
  {
    header('Location: usuario-editar.php?usuario='.$IdUsuario.'&error=El <strong>Nombre</strong> estaba vacio, favor de llenarlo#header');
  }
  if(empty($ApellidoPaterno))
  {
    header('Location: usuario-editar.php?usuario='.$IdUsuario.'&error=El <strong>ApellidoPaterno</strong> estaba vacio, favor de llenarlo#header');
  }
  else if(empty($Colonia))
  {
    header('Location: usuario-editar.php?usuario='.$IdUsuario.'&error=La <strong>Colonia</strong> estaba vacio, favor de llenarlo#header');
  }
  if(empty($Poblacion))
  {
    header('Location: usuario-editar.php?usuario='.$IdUsuario.'&error=La <strong>Poblacion</strong> estaba vacio, favor de llenarlo#header');
  }
  if(empty($Telefono))
  {
    header('Location: usuario-editar.php?usuario='.$IdUsuario.'&error=El <strong>Telefono</strong> estaba vacio, favor de llenarlo#header');
  }
  else if(empty($Email))
  {
    header('Location: usuario-editar.php?usuario='.$IdUsuario.'&error=El <strong>Email</strong> estaba vacio, favor de llenarlo#header');
  }
  if(empty($Tipo))
  {
    header('Location: usuario-editar.php?usuario='.$IdUsuario.'&error=El <strong>Tipo</strong> estaba vacio, favor de llenarlo#header');
  }
  if(empty($IdPuesto))
  {
    header('Location: usuario-editar.php?usuario='.$IdUsuario.'&error=El <strong>Puesto</strong> estaba vacio, favor de llenarlo#header');
  }
  else if(empty($NombreUsuario))
  {
    header('Location: usuario-editar.php?usuario='.$IdUsuario.'&error=El <strong>Usuario</strong> estaba vacio, favor de llenarlo#header');
  }
  else
  {
	//guardar a un usuario  

    $date = new DateTime($FechaNacimiento);
    $FechaNacimiento = $date->format('Y-m-d'); 
    
    $Usuario = new  Usuario(
                        $IdUsuario,
                        $NumeroCuentaEmpleado, 
                        $Nombre,
                        $ApellidoPaterno, 
                        $ApellidoMaterno, 
                        $Sexo, 
                        $FechaNacimiento, 
                        $Poblacion, 
                        $Colonia, 
                        $Calle, 
                        $Numero, 
                        $Telefono, 
                        $Email, 
                        $Tipo, 
                        $IdDepartamento, 
                        $IdPuesto, 
                        $Turno, 
                        $NombreUsuario, 
                        '', 
                        $Estatus
                    );
      
    $Contrasena = $Usuario->Encriptar($Contrasena,'F32_SAEC_FOUAS');
      
    $Usuario->Contrasena = $Contrasena;
    
    $Usuario->Actualizar();
  }
} 
?>
