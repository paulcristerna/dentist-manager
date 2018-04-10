<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Sistema de Administración y Expendiente Clínico (SAEC) FOUAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="img/saec_logo_icon.png">
    <script src="js/jquery.js"></script>
  </head>

  <body>
 
  <?php   
  session_start();
      
  if(isset($_SESSION['Usuario'])){ 
        $_SESSION = array();
	session_destroy();
  } ?>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">

          <div class="pull-left colapsar">
            <img src="img/uas.png" alt="logotipo uas">
            UAS 

            <img src="img/division.png" style="padding:0px 15px 0px 15px;">

            <img src="img/fouas.png" alt="logotipo fouas">
            FOUAS
              
            <img src="img/division.png" style="padding:0px 15px 0px 15px;">

            <img src="img/saec_logo.png" alt="logotipo fouas">
            SAEC
          </div>  

          <div>
            <ul class="nav pull-right">
              <li>
                <a href="index.php" class="navbar-link"> Inicio de Sesión </a>
              </li>              
            </ul>
          </div>  

        </div><!-- /.container -->
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->