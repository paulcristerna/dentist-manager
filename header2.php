<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Sistema de Administración y Expendiente Clínico (SAEC) FOUAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../css/datepicker.css" rel="stylesheet">
    <link href="../css/tabs.css" rel="stylesheet">
    <link href="../css/periodontograma.css" rel="stylesheet">
    <link href="../css/odontograma.css" rel="stylesheet">
    <link href="../css/dientes_protesis_fija.css" rel="stylesheet">

    <script src="../js/google-code-prettify/prettify.js"></script>
    <script src="../js/jquery.js"></script> 
    <script src="../js/menu.js"></script>
    <script src="../js/funciones-sistema.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <script src="../js/dientes_protesis_fija.js"></script>
    <script src="../js/odontograma.js"></script>
    <script src="../js/periodontograma.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.js"></script>
    <![endif]-->      

    <link rel="shortcut icon" href="../img/saec_logo_icon.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top" id="header">
      <div class="navbar-inner">
        <div class="container">

          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="pull-left colapsar">
            <img src="../img/uas.png" alt="logotipo uas">
            UAS 

            <img src="../img/division.png" style="padding:0px 15px 0px 15px;">

            <img src="../img/fouas.png" alt="logotipo fouas">
            FOUAS
              
            <img src="../img/division.png" style="padding:0px 15px 0px 15px;">

            <img src="../img/saec_logo.png" alt="logotipo fouas">
            SAEC
          </div>  

          <?php 
            session_start();
            
            if(!isset($_SESSION['Usuario']))
            {
              Header('Location: ../index.php'); 
            }

            $SIS_Usuario = $_SESSION['Usuario'];
            
            include("../core-saec/AccesoBD.php");
            include("../core-saec/Usuario.php");
            include("core-saec/Material.php");
            
            $UsuarioSIS = new Usuario($SIS_Usuario);
            $SIS_Datos_Usuario = $UsuarioSIS->Obtener_Usuario();
          ?>

          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li><a href="#" style="cursor:default;pointer-events: none;">
                  Bienvenido: 
                  <strong>
                          <?php echo $SIS_Datos_Usuario['Nombre']; ?>  
                          <?php echo $SIS_Datos_Usuario['ApellidoPaterno']; ?>
                          <?php echo $SIS_Datos_Usuario['ApellidoMaterno']; ?>
                  </strong>
              </a></li>
              <li>
                <a href="../cerrar-sesion.php"> Cerrar Sesión </a>
              </li>              
            </ul>
          </div>

        </div><!-- /.container -->
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->