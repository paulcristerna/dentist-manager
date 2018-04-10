<html>
<head>
  <meta charset="utf-8">
  <title>Reporte de Cobros de Caja</title>
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
  <?php include('../../core-saec/Cobro_Caja.php') ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <td style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </td>
        <td style="width:470px;">
          <h4>Reporte de Cobros de Caja</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </td>
        <td style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </td>
      </tr> 
    </table>   
      
    <?php 
        $Cobro_Caja = new Cobro_Caja($_GET['cobro']);
        $Datos_Cobro_Caja = $Cobro_Caja->Obtener_Cobro_Caja();
    ?>
    <p>
        <strong>Folio de Cobro:</strong>
        <?php 
            $string = $Datos_Cobro_Caja['FolioCobrosCaja'];

            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string;
        ?>,
        
        <strong>Paciente:</strong> 
        <?php         
            $string = $Datos_Cobro_Caja['NombrePaciente'].' '.
                      $Datos_Cobro_Caja['ApellidoPaternoPaciente'].' '.
                      $Datos_Cobro_Caja['ApellidoMaternoPaciente'];

            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string;
        ?>,
        
        <strong>Descuento:</strong> 
        <?php
            $string = $Datos_Cobro_Caja['DescuentoNombre'];

            echo (strlen($string) > 30) ? substr($string,0,30).'...' : $string;
        ?>
        <?php
            $string = $Datos_Cobro_Caja['PorcentajeDescuento'];

            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string;
        ?>%
    </p>
    <table id="contenido">
      <thead>
          <tr style="background:#e3e3e3;">
            <th style="padding:5px;width:500px;">Concepto</th>
            <th style="padding:5px;width:80px;">Precio</th>
            <th style="padding:5px;width:80px;">Total</th>
          </tr>
        </thead>
        <tbody>
            <?php $Total = $Cobro_Caja->Detalle_Cobro_Caja_Reporte(); ?>
        </tbody>
    </table>
    <table>
          <tr>
            <td style="padding:5px;width:500px;"></td>
            <td style="padding:5px;width:80px;"></td>
            <td style="background:#e3e3e3;padding:5px;width:85px;">$<?php echo $Total; ?></td>
          </tr>
    </table>      
  </div>
</body>
</html>
