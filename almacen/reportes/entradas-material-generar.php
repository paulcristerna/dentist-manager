<html>
<head>
  <meta charset="utf-8">
  <title>Entradas de Material</title>
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
          <h4>Reporte de Entradas de Material</h4>
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
            <th style="padding:5px;width:150px;">Folio de Entrada</th>
            <th style="padding:5px;width:150px;">Folio de Factura</th>
            <th style="padding:5px;width:380px;">Proveedor</th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $Entrada_Material = new Entrada_Material();
            $Entrada_Material->Catalogo_Entrada_Material_Reporte($_GET['buscar']); 
        ?>
        </tbody>
    </table>
     
  </div>
</body>
</html>
