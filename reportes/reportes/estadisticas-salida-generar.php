<html>
<head>
  <meta charset="utf-8">
  <title>Reporte de Estadisticas de Salida</title>
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
          <h4>Reporte Estadistico de Salida</h4>
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
         if(isset($_GET['reporte-fecha'])){
            $date = new DateTime($_GET['fecha-inicio']);
            $FechaInicio = $date->format('Y-m-d');

            $date = new DateTime($_GET['fecha-fin']);
            $FechaFin = $date->format('Y-m-d'); 
        }
        else if(isset($_GET['reporte-administracion'])){
            $fechas = explode('|',$_GET['administracion']);
            $date = new DateTime($fechas[1]);
            $FechaInicio = $date->format('Y-m-d');

            $date = new DateTime($fechas[2]);
            $FechaFin = $date->format('Y-m-d'); 
        }
        else if(isset($_GET['reporte-ciclo'])){
            $fechas = explode('|',$_GET['ciclo']);
            $date = new DateTime($fechas[0]);
            $FechaInicio = $date->format('Y-m-d');

            $date = new DateTime($fechas[1]);
            $FechaFin = $date->format('Y-m-d'); 
        }
        else if(isset($_GET['reporte-semestre'])){
            $fechas = explode('|',$_GET['semestre']);
            $date = new DateTime($fechas[0]);
            $FechaInicio = $date->format('Y-m-d');

            $date = new DateTime($fechas[1]);
            $FechaFin = $date->format('Y-m-d'); 
        }

        $Reporte = new Reporte('',$FechaInicio,$FechaFin);
      
        $date = new DateTime($FechaInicio);
        $FechaInicio = $date->format('d-m-Y');
      
        $date = new DateTime($FechaFin);
        $FechaFin = $date->format('d-m-Y'); ?>
      
      <p>Fecha de: <strong><?php echo $FechaInicio; ?></strong> al <strong><?php echo $FechaFin; ?></strong></p>
      <?php $Reporte->Generar_Estadistica_Salida(); ?>
  </div>
</body>
</html>
