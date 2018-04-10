<html>
<head>
  <meta charset="utf-8">
  <title>Corte de Caja</title>
  <style type="text/css">
    table th, table td{
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
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <td style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </td>
        <td style="width:470px;">
          <h4>Corte de Caja</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </td>
        <td style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </td>
      </tr> 
    </table>
      <?php include('../../core-saec/AccesoBD.php') ?>
      <?php include('../../core-saec/Reporte.php') ?>
      <?php    
        $date = new DateTime($_GET['fecha-inicio']);
        $FechaInicio = $date->format('Y-m-d');

        $date = new DateTime($_GET['fecha-fin']);
        $FechaFin = $date->format('Y-m-d'); 

        $IdCajero = $_GET['cajero'];
        $Turno = $_GET['turno'];

        $Reporte = new Reporte('',$FechaInicio,$FechaFin,'','','','','','',$IdCajero,$Turno);
      ?>
  </div>
    <p>Fecha de: <strong><?php echo $_GET['fecha-inicio']; ?></strong> al <strong><?php echo $_GET['fecha-fin']; ?></strong></p>
    <?php $Reporte->Generar_Corte_Caja(); ?>
</body>
</html>
