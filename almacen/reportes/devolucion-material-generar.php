<html>
<head>
  <meta charset="utf-8">
  <title>Devolución de Material</title>
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
  <?php include('../../core-saec/Devolucion_Material.php') ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <td style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </td>
        <td style="width:470px;">
          <h4>Devolución de Material</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </td>
        <td style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </td>
      </tr> 
    </table>    
      <?php 
        $Devolucion_Material = new Devolucion_Material($_GET['devolucion']);
        $Datos_Devolucion_Material = $Devolucion_Material->Obtener_Devolucion_Material(); 
      ?>
      <p>
      <strong>Departamento/Comunidad:</strong> <?php echo $Datos_Devolucion_Material['NombreDepartamento'] != "" ? $Datos_Devolucion_Material['NombreDepartamento']:$Datos_Devolucion_Material['NombreComunidad']; ?>, 
      <strong>Folio de Devolución:</strong> <?php echo $Datos_Devolucion_Material['FolioDevolucionMaterial']; ?>
      </p>
      <?php $Devolucion_Material->Devolucion_Material_Materiales_Reporte(); ?>
      
  </div>
</body>
</html>
