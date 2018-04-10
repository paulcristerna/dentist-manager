<html>
<head>
  <meta charset="utf-8">
  <title>Salida de Material</title>
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
  <?php include('../../core-saec/AccesoBD.php') ?>
  <?php include('../../core-saec/Usuario.php') ?>
  <?php include('../../core-saec/Salida_Material.php') ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <td style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </td>
        <td style="width:470px;">
          <h4>Salida de Material</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </td>
        <td style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </td>
      </tr> 
    </table>    
      <?php     
        $Salida_Material = new Salida_Material($_GET['salida']);
        $Datos_Salida_Material = $Salida_Material->Obtener_Salida_Material();
      ?>
      <p>
      <strong>Folio de Solicitud:</strong> 
      <?php 
        $string = $Datos_Salida_Material['FolioSolicitudMaterial']; 

        echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string;
      ?>, 
      <strong>Folio de Salida:</strong> 
      <?php 
        $string = $Datos_Salida_Material['FolioSalidaMaterial']; 

        echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string;
      ?></p>

      <?php $Salida_Material->Datos_Materiales_Salida_Reporte(); ?>
      <?php 
            session_start();

            $SIS_Usuario = $_SESSION['Usuario'];
            
            $UsuarioSIS = new Usuario($SIS_Usuario);
            $SIS_Datos_Usuario = $UsuarioSIS->Obtener_Usuario();

/*if($SIS_Datos_Usuario['NombrePuesto']=='Administrador' ||
  $SIS_Datos_Usuario['NombrePuesto']=='Almacenista'):*/ ?>
	  <table style="margin-top:100px">
                <tr>
                    <td style="padding:15px;">
                        <span>_____________________________</span>
                        <p>Firma de Autorizado <br />
	      (<?php echo $Datos_Salida_Material['SolicitanteAut']; ?>)
                        </p>
                    </td>
                    <td style="padding:15px;">
                        <span>_____________________________</span>
                        <p>Firma de Almacenista <br />
	      <?php if($Datos_Salida_Material['Entregado']==0){
	               echo $SIS_Datos_Usuario['NombrePuesto'] == "Almacenista" ?
		       "(".$SIS_Datos_Usuario['Nombre']." ".
		           $SIS_Datos_Usuario['ApellidoPaterno']." ".
		           $SIS_Datos_Usuario['ApellidoMaterno'].
		       ")":"";
	    }else{
	               echo "(".$Datos_Salida_Material['SolicitanteEnt'].")";    
            } ?>
                        </p>
                    </td>
                    <td style="padding:15px;">
                        <span>_____________________________</span>
                        <p>Firma de Solicitante <br />
	      (<?php echo $Datos_Salida_Material['Solicitante']; ?>)</p>
                    </td>
                </tr>
           </table>
    
  </div>
</body>
</html>
