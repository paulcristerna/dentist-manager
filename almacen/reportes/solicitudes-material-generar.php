<html>
<head>
  <meta charset="utf-8">
  <title>Solicitudes de Material</title>
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
  <?php include('../../core-saec/Solicitud_Material.php') ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <td style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </td>
        <td style="width:470px;">
          <h4>Reporte de Solicitudes de Material</h4>
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
            <th style="padding:5px;width:150px;">Folio de Solicitud</th>
            <th style="padding:5px;width:550px;">Departamento/Comunidad</th>
          </tr>
        </thead>
        <tbody>            
        <?php 
            //catalogo de solicitudes de material en reporte
            session_start();
            $SIS_Usuario = $_SESSION['Usuario'];

            $UsuarioSIS = new Usuario($SIS_Usuario);
            $SIS_Datos_Usuario = $UsuarioSIS->Obtener_Usuario();

            $Usuario = new usuario($SIS_Usuario);
            $Datos = $Usuario->Buscar_Departamento_Comunidad_Usuario();

            $Departamento = $Datos['Departamento'];
            $Comunidad = $Datos['Comunidad'];

            $Solicitud_Material = new Solicitud_Material('','','',$SIS_Usuario,'','',$Departamento,$Comunidad);

            if($SIS_Datos_Usuario['NombrePuesto']=='Administrador'):
                if(isset($_GET['buscar'])):
                    $Solicitud_Material->Catalogo_Solicitud_Material_Reporte_Administrador($_GET['buscar']);
                else:
                    $Solicitud_Material->Catalogo_Solicitud_Material_Reporte_Administrador();
                endif;
            else:
                if(isset($_GET['buscar'])):
                    $Solicitud_Material->Catalogo_Solicitud_Material_Reporte($_GET['buscar']);
                else:
                    $Solicitud_Material->Catalogo_Solicitud_Material_Reporte();
                endif;
            endif;
          ?>
        </tbody>
    </table>
    
  </div>
</body>
</html>
