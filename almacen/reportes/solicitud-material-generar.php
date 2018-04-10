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
  <?php include('../../core-saec/Solicitud_Material.php') ?>
  <?php include('../../core-saec/Usuario.php') ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <td style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </td>
        <td style="width:470px;">
          <h4>Solicitud de Material</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </td>
        <td style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </td>
      </tr> 
    </table>    
      <?php 
        $Solicitud_Material = new Solicitud_Material($_GET['solicitud']);
        $Datos_Solicitud_Material = $Solicitud_Material->Obtener_Solicitud_Material();
      ?>
      <p><strong>Folio de Solicitud:</strong> <?php echo $Datos_Solicitud_Material['FolioSolicitudMaterial']; ?></p>

      <?php $Solicitud_Material->Datos_Materiales_Solicitud_Reporte(); ?>

      <?php 
            $Departamento = $Datos_Solicitud_Material['IdDepartamento'];
            $Comunidad = $Datos_Solicitud_Material['IdComunidad'];
      ?>

      <?php 
        $Usuario = new Usuario();
      ?>

      <table style="margin-top:100px">
                <tr>
                    <td style="padding:0 70px 0 130px;">
                        <span>_____________________________</span>
	  <p><?php echo $Datos_Solicitud_Material['NombreDepartamento'] != "" ? 
	           "Firma del Encargado de Departamento":"Firma del Doctor Comunitario"; ?>
          <br />
          <?php if($Datos_Solicitud_Material['NombreDepartamento'] != "")
	     {
	       $Datos_Usuario = $Usuario->Obtener_Usuario_Puesto_Reporte('Encargado De Departamento',$Departamento,$Comunidad);
	     }else{
	       $Datos_Usuario = $Usuario->Obtener_Usuario_Puesto_Reporte('Doctor Comunitario',$Departamento,$Comunidad);
	     } ?>
	  (<?php echo $Datos_Usuario['Nombre']; ?>
	   <?php echo $Datos_Usuario['ApellidoPaterno']; ?>
	   <?php echo $Datos_Usuario['ApellidoMaterno']; ?>)
          </p>
                    </td>
                    <td style="padding:0px;">
                        <span>_____________________________</span>
          <p><?php echo $Datos_Solicitud_Material['NombreDepartamento'] != "" ? 
	           "Firma del Auxiliar de Deparmento":"Firma del Alumno Tesorero"; ?>
	  <br />
          <?php if($Datos_Solicitud_Material['NombreDepartamento'] != "")
	     {
	       $Datos_Usuario = $Usuario->Obtener_Usuario_Puesto_Reporte('Auxiliar De Encargado De Departamento',$Departamento,$Comunidad);
	     }else{
	       $Datos_Usuario = $Usuario->Obtener_Usuario_Puesto_Reporte('Alumno Tesorero',$Departamento,$Comunidad);
	     } ?>
	  (<?php echo $Datos_Usuario['Nombre']; ?>
	   <?php echo $Datos_Usuario['ApellidoPaterno']; ?>
	   <?php echo $Datos_Usuario['ApellidoMaterno']; ?>)
	  </p>
                    </td>
                </tr>
           </table>
  </div>
</body>
</html>
