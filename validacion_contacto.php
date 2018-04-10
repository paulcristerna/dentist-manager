<?php
include("core-saec/AccesoBD.php");
include("core-saec/Usuario.php");

if(isset($_REQUEST['enviar']))
{
  $Nombre = $_POST["nombre"];
  $Email = $_POST["email"];
  $Mensaje = $_POST["mensaje"];

  //revisar que los campos no esten vacios
  if(empty($Nombre))
  {
    header('Location: area-nueva.php?error=El campo de <strong>Nombre</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Email))
  {
    header('Location: area-nueva.php?error=El campo de <strong>Correo Electronico</strong> esta vacio, favor de llenarlo#header');
  }
  else if(empty($Mensaje))
  {
    header('Location: area-nueva.php?error=El campo de <strong>Mensaje</strong> esta vacio, favor de llenarlo#header');
  }
  else
  {
    $Para = 'paul13_707@hotmail.com';
    $Titulo = "Mensaje de $Nombre por medio del Sistema SAEC.";
    $Mensaje = "<html>
                <head>
                    <meta charset='utf-8'>
                    <title>Envio de Datos de Ingreso al Sistema FOUAS:</title>
                </head>
                <body>
                    <h1>Mensaje de $Nombre por medio del Sistema SAEC:</h1>
                    <p>Nombre: $Nombre</p>
                    <p>Correo: $Email</p>
                    <p>Mensaje: $Mensaje</p>
                </body>
                </html>";

    // Para enviar un correo
    $Cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $Cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    mail($Para, $Titulo, $Mensaje, $Cabeceras);
    header('Location: contacto.php?exito=Se enviaron sus comentarios a los Administradores del Sistema SAEC');
  }
} 
?>