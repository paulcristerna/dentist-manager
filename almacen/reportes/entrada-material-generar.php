<html>
<head>
  <meta charset="utf-8">
  <title>Solicitud de Material</title>
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
  <?php include('../../core-saec/Entrada_Material.php') ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <td style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </td>
        <td style="width:470px;">
          <h4>Entrada de Material</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </td>
        <td style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </td>
      </tr> 
    </table>    
      <?php 
        $Entrada_Material = new Entrada_Material($_GET['entrada']);
        $Datos_Entrada_Material = $Entrada_Material->Obtener_Entrada_Material();
      ?>
      <p><strong>Folio de Entrada:</strong> 
         <?php 
            $string = $Datos_Entrada_Material['FolioEntradaMaterial']; 

            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
         ?>,
         <strong>Folio de Factura:</strong> 
         <?php 
            $string = $Datos_Entrada_Material['FolioFactura']; 

            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
         ?>,
         <strong>Proveedor:</strong> <?php 
            $string = $Datos_Entrada_Material['NombreProveedor'];  

            echo (strlen($string) > 30) ? substr($string,0,30).'...' : $string; 
         ?>,
         <strong>Impuesto:</strong> 
         <?php 
            $string = $Datos_Entrada_Material['NombreImpuesto']; 

            echo (strlen($string) > 10) ? substr($string,0,10).'...' : $string; 
         ?>
         <?php 
            $string = $Datos_Entrada_Material['PorcentajeImpuesto']; 

            echo (strlen($string) > 6) ? substr($string,0,6).'...' : $string; 
         ?>%</p>
      
      <?php $Entrada_Material->Entrada_Material_Materiales_Reporte(); ?>
  </div>
</body>
</html>
