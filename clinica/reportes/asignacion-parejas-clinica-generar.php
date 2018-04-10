<html>
<head>
  <meta charset="utf-8">
  <title>Reporte de Parejas Clínicas</title>
  <style type="text/css">
    table td, table th{
      text-align: center;
    }
    #contenido{
      border:1px solid #e3e3e3;
      margin: 0;
      padding:0px;
    }

    #contenido td{
      border:1px solid #e3e3e3;
      margin: 0;
      padding:3px;
    }
  </style>
</head>
<body>
  <?php include('../../core-saec/AccesoBD.php') ?>
  <?php include('../../core-saec/Usuario.php') ?>
  <?php include('../../core-saec/Pareja_Clinica.php') ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <td style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </td>
        <td style="width:470px;">
          <h4>Reporte de Parejas Clínica</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </td>
        <td style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </td>
      </tr> 
    </table>   
      
    <table id="contenido">
      <thead>
          <tr style="background:#e3e3e3;">
            <th style="padding:5px;width:150px;">Clinica/Comunidad</th>
            <th style="padding:5px;width:150px;">Medico Titular</th>
            <th style="padding:5px;width:150px;">Pareja Clínica</th>
            <th style="padding:5px;width:140px;">Materia</th>
          </tr>
        </thead>
        <tbody>
        <?php
            session_start();
            $SIS_Usuario = $_SESSION['Usuario'];

            $Pareja_Clinica = new Pareja_Clinica('','','',$SIS_Usuario);

            $UsuarioSIS = new Usuario($SIS_Usuario);
            $SIS_Datos_Usuario = $UsuarioSIS->Obtener_Usuario();

            if($SIS_Datos_Usuario['NombrePuesto']=='Administrador'):

                if(isset($_GET['buscar'])):
                    $Pareja_Clinica->Catalogo_Administrador_Reporte($_GET['buscar']);
                else:
                    $Pareja_Clinica->Catalogo_Administrador_Reporte();
                endif;
            else:
                if(isset($_GET['buscar'])):
                    $Pareja_Clinica->Catalogo_Reporte($_GET['buscar']);
                else:
                    $Pareja_Clinica->Catalogo_Reporte();
                endif;
            endif;    
          ?>
        </tbody>
    </table>
      
  </div>
</body>
</html>
