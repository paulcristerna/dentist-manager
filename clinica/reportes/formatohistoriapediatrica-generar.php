<html>
<head>
  <meta charset="utf-8">
  <title>Formato de Historia de Periodoncia</title>
  <style type="text/css">
    table th{
      text-align: center;
    }

    .tabla{
      text-align: center;
      border:1px solid #e3e3e3;
    }

    .tabla th, .tabla td{
      border:1px solid #e3e3e3;
      padding:5px;
    }

    .tabla th{
      background:#e3e3e3;
      margin: 0;
    }

    #periodontograma{
      text-align: center;
      border:1px solid #e3e3e3;
    }

    #periodontograma th{
      background:#e3e3e3;
      width:25px;
    }
 
    #periodontograma th,#periodontograma td{
      border:1px solid #e3e3e3;
    }

    #firmas{
      text-align:center;
    }

    #firmas tr td{
      padding:20px 20px 0 20px;
    }
  </style>
</head>
<body>
  <?php include('../../core-saec/AccesoBD.php') ?>
  <?php include("../../core-saec/Formato_Historia_Clinica_Periodoncia.php"); ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <th style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </th>
        <th style="width:470px;">
          <h4>Formato de Historia de Periodoncia</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </th>
        <th style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </th>
      </tr> 
    </table>

    <?php 
            $Formato_Historia_Clinica_Periodoncia = new Formato_Historia_Clinica_Periodoncia();

            $Formato_Historia_Clinica_Periodoncia->IdHistoriaClinicaPeriodoncia = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Periodoncia->Obtener_Formato();

            //fecha de registro de la historia clinica

			$fecha_registro = $Datos_Formato['FechaRegistro'];
			$fecha_registro = date_create($fecha_registro);
			$fecha_registro = date_format($fecha_registro,'d-m-y');

			//calcular edad del paciente

			$dia=date('d');
			$mes=date('m');
			$ano=date('Y');

			$fecha_nacimiento = date_create($Datos_Formato['FechaNacimientoPaciente']);

			$dianac=date_format($fecha_nacimiento,'d');
			$mesnac=date_format($fecha_nacimiento,'m');
			$anonac=date_format($fecha_nacimiento,'Y');

			if (($mesnac == $mes) && ($dianac > $dia)) 
			{
				$ano=($ano-1); 
			}

			if ($mesnac > $mes)
			{
				$ano=($ano-1);
			}

			$Edad=($ano-$anonac);
          ?>

	  <h4>Datos del Paciente</h4>
                
              <table> 
                <tr>
                    <td><strong>Paciente:</strong></td>
                    <td><?php echo $Datos_Formato['NombrePaciente']. ' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></td>
                </tr>
              <tr> 
                  <td><strong>Fecha: </strong></td>
		  <td> <?php echo $fecha_registro; ?></td>
              </tr>
              <tr> 
                  <td><strong>Sexo: </strong></td>
                  <td><?php echo $Datos_Formato['SexoPaciente']; ?></td>
              </tr>
              <tr> 
                  <td><strong>Edad: </strong></td>
                  <td><?php echo $Edad; ?> Año(s)</td>
              </tr> 
              <tr>
                  <td><strong>Ocupación: </strong></td>
                  <td><?php echo $Datos_Formato['OcupacionPaciente']; ?></td>
              </tr>
              <tr> 
                  <td><strong>Dirección: </strong></td>
                  <td><?php echo $Datos_Formato['CallePaciente'].' '.$Datos_Formato['NumeroPaciente'].' '.$Datos_Formato['ColoniaPaciente'].' '.$Datos_Formato['PoblacionPaciente']; ?>.</td>
              </tr> 
              <tr>
                <td><strong>Teléfono: </strong></td>
                <td><?php echo $Datos_Formato['TelefonoPaciente']; ?></td>
              </tr> 
	 </table>

         <h4>Periodontograma</h4>

         <table>
	    <tr>
		<td>Margen Gingival (<strong>_</strong>)</td>
		<td>Ausencia (<strong>/</strong>)</td>
                <td>Abceso (<strong>*</strong>)</td>
                <td>Contacto Abierto (<strong>|</strong>)</td>
	   </tr>
	   <tr>
                <td>Frenillo Alto (<strong>v</strong>)</td>                
                <td>Reconstrucción (<strong>\\</strong>)</td>
                <td>Prótesis Fija (<strong>---</strong>)</td>
                <td>Prótesis Removible (<strong>...</strong>)</td>
	   </tr>
	   <tr>
                <td>Obt. Mal Ajustada (<strong>O</strong>)</td>
                <td>Faceta de Desgaste (<strong>D</strong>)</td>
                <td>Bolsa Parodontales (<strong>B</strong>)</td>
              </tr>
	   </table>

	   <br />

	   <table id="periodontograma">
		<tr>
		  <th colspan="3">18</th>
		  <th colspan="3">17</th>
		  <th colspan="3">16</th>
		  <th colspan="3">15</th>
		  <th colspan="3">14</th>
		  <th colspan="3">13</th>
		  <th colspan="3">12</th>
		  <th colspan="3">11</th>
		  <th colspan="3">21</th>
		  <th colspan="3">22</th>
		  <th colspan="3">23</th>
		  <th colspan="3">24</th>
		  <th colspan="3">25</th>
		  <th colspan="3">26</th>
		  <th colspan="3">27</th>
		  <th colspan="3">28</th>
		</tr>
		<tr>		  
		  <td colspan="3" style="height:10px;">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "Abc";
			  break;
			case 'bolsa-parodontal':
			  echo "BP";
			  break;
			case 'ausente':
			  echo "Aus";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		</tr>		
		<tr>		  
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
echo ($Datos_Diente[4] == "19" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
echo ($Datos_Diente[4] == "19" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td style="height:10px;">
                  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente1']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente2']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente3']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente4']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente5']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente6']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

                  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente7']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente8']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente9']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente10']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente11']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente12']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>
  
                  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente13']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente14']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente15']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente16']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>
		</tr>
	   </table>

	   <br />

	   <table id="periodontograma">
		<tr>
		  <th colspan="3">18</th>
		  <th colspan="3">17</th>
		  <th colspan="3">16</th>
		  <th colspan="3">15</th>
		  <th colspan="3">14</th>
		  <th colspan="3">13</th>
		  <th colspan="3">12</th>
		  <th colspan="3">11</th>
		  <th colspan="3">21</th>
		  <th colspan="3">22</th>
		  <th colspan="3">23</th>
		  <th colspan="3">24</th>
		  <th colspan="3">25</th>
		  <th colspan="3">26</th>
		  <th colspan="3">27</th>
		  <th colspan="3">28</th>
		</tr>
		<tr>		  
		  <td colspan="3" style="height:10px;">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "Abc";
			  break;
			case 'bolsa-parodontal':
			  echo "BP";
			  break;
			case 'ausente':
			  echo "Aus";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		</tr>		
		<tr>		  
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                        echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "7" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
echo ($Datos_Diente[4] == "19" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
echo ($Datos_Diente[4] == "19" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td style="height:10px;">
                  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente17']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente18']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente19']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente20']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente21']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente22']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

                  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente23']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente24']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente25']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente26']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente27']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente28']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>
  
                  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente29']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente30']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente31']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente32']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>
		</tr>
	   </table>

	  <br />

	  <!-- segunda parte -->

	  <table id="periodontograma">
		<tr>
		  <th colspan="3">48</th>
		  <th colspan="3">47</th>
		  <th colspan="3">46</th>
		  <th colspan="3">45</th>
		  <th colspan="3">44</th>
		  <th colspan="3">43</th>
		  <th colspan="3">42</th>
		  <th colspan="3">41</th>
		  <th colspan="3">31</th>
		  <th colspan="3">32</th>
		  <th colspan="3">33</th>
		  <th colspan="3">34</th>
		  <th colspan="3">35</th>
		  <th colspan="3">36</th>
		  <th colspan="3">37</th>
		  <th colspan="3">38</th>
		</tr>
		<tr>		  
		  <td colspan="3" style="height:10px;">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "Abc";
			  break;
			case 'bolsa-parodontal':
			  echo "BP";
			  break;
			case 'ausente':
			  echo "Aus";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		</tr>		
		<tr>		  
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "19" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "19" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Dient33']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td style="height:10px;">
                  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente33']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente34']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente35']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente36']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente37']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente38']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

                  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente39']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente40']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente41']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente42']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente43']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente44']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>
  
                  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente45']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente46']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente47']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente48']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>
		</tr>
	   </table>

	  <br /><br /><br />

	  <table id="periodontograma">
		<tr>
		  <th colspan="3">48</th>
		  <th colspan="3">47</th>
		  <th colspan="3">46</th>
		  <th colspan="3">45</th>
		  <th colspan="3">44</th>
		  <th colspan="3">43</th>
		  <th colspan="3">42</th>
		  <th colspan="3">41</th>
		  <th colspan="3">31</th>
		  <th colspan="3">32</th>
		  <th colspan="3">33</th>
		  <th colspan="3">34</th>
		  <th colspan="3">35</th>
		  <th colspan="3">36</th>
		  <th colspan="3">37</th>
		  <th colspan="3">38</th>
		</tr>
		<tr>		  
		  <td colspan="3" style="height:10px;">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "Abc";
			  break;
			case 'bolsa-parodontal':
			  echo "BP";
			  break;
			case 'ausente':
			  echo "Aus";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		  <td colspan="3">
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                    
                      switch($Datos_Diente[0]){
			case 'abceso':
			  echo "*";
			  break;
			case 'bolsa-parodontal':
			  echo "B";
			  break;
			case 'ausente':
			  echo "/";
			  break;
		      }
                  ?>
		  </td>
		</tr>		
		<tr>		  
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "19" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "19" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "18" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "17" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "16" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "15" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "14" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3"></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "13" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3"></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                        echo ($Datos_Diente[4] == "12" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                        echo ($Datos_Diente[4] == "11" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                        echo ($Datos_Diente[4] == "10" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                        echo ($Datos_Diente[4] == "09" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente65']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente66']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente67']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente68']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente69']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente70']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente71']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente72']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente73']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente74']);
                        echo ($Datos_Diente[4] == "08" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                        echo ($Datos_Diente[4] == "07" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                        echo ($Datos_Diente[4] == "06" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                        echo ($Datos_Diente[4] == "05" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                        echo ($Datos_Diente[4] == "04" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                        echo ($Datos_Diente[4] == "03" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                        echo ($Datos_Diente[4] == "02" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		  <td colspan="3" <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
echo ($Datos_Diente[4] == "01" ? 'style="background:#3e3e3e"':""); ?>></td>
		</tr>
		<tr>
		  <td style="height:10px;">
                  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente49']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente50']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente51']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente52']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente53']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente54']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

                  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente55']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente56']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente57']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente58']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente59']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente60']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>
  
                  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente61']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente62']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente63']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>

		  <td>
		  <?php $Datos_Diente = explode('|',$Datos_Formato['Diente64']);
                  echo ($Datos_Diente[2] == "1" ? "|":""); ?>
                  </td>
		  <td><?php switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
			      echo "\\";
                            break;  

                            case 'protesis-removible':
                              echo "...";
                            break;

			    case 'protesis-fija':
                              echo "---";
                            break;

                            case 'obt-mal-ajustada':
                              echo "O";
                            break;

                            case 'faceta-desgaste':
                              echo "D";
                            break;
                        }  ?></td>
                  <td><?php echo ($Datos_Diente[3] == "1" ? "|":""); ?></td>
		</tr>
	   </table>

	  <br />

         <table class="tabla">
           <tr>
	      <th colspan="2"><strong>Etiologia + Patogenia</strong></th>
	      <th colspan="2"><strong>Curso de la Enfermedad</strong></th>
            </tr>
            <tr>
              <td style="width:50px;">Inflamación Microbiana</td>
		<td><?php switch($Datos_Formato['Inflamacion_Microbiana']){
			       case 1:
			         echo "Débil";
			       break;
			       case 2:
			         echo "Moderada";
			       break;
			       case 3:
			         echo "Fuerte";
			       break;
			}?></td>
                <td style="width:50px;">Traumatismo Oclusal</td>
			<td><?php switch($Datos_Formato['Traumatismo_Oclusal']){
			       case 1:
			         echo "Ligero";
			       break;
			       case 2:
			         echo "Mediano";
			       break;
			       case 3:
			         echo "Fuerte";
			       break;
			}?></td>
              </tr>
	  </table>

          <br />

          <table>
	    <tr>
	      <td><strong>Parafunciones (bruxismo):</strong></td>
	      <td><?php echo $Datos_Formato['Parafunciones']; ?></td>
            </tr>
            <tr>
	      <td><strong>Morfología y Función:</strong></td>
              <td><?php echo $Datos_Formato['Morfologia_Funcion']; ?></td>
            </tr>
            <tr>
              <td><strong>Articulación Temporo Mandibular:</strong></td>
              <td><?php echo  $Datos_Formato['Articulacion_Temporo_Mandibular']; ?></td>
            </tr>
            <tr>
              <td><strong>Peculiaridad:</strong></td>
	      <td><?php echo  $Datos_Formato['Peculiaridad']; ?></td>
	    </tr>
          </table>

          <h4>Cuantificación de Placa.</h4>

                <table class="tabla">
                    <tr>
			  <th>Fecha</th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
                          <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th>Porcentaje</th>
		    </tr>
                    <tr>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Fecha_1']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_18']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_17']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_16']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_15']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_14']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_13']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_12']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_11']; ?></td>
		      <td></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_21']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_22']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_23']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_24']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_25']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_26']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_27']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_28']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Porcentaje_1']; ?></td>
		    </tr>
                    <tr>
                      <th></th>
                      <th>18</th>
                      <th>17</th>
                      <th>16</th>
                      <th>15</th>
                      <th>14</th>
                      <th>13</th>
                      <th>12</th>
                      <th>11</th> 
		      <th></th>
                      <th>21</th>
                      <th>22</th>
                      <th>23</th>
                      <th>24</th>
                      <th>25</th>
                      <th>26</th>
                      <th>27</th>
                      <th>28</th>
		      <th></th>
                    </tr>
                    <tr>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Fecha_2']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_18']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_17']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_16']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_15']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_14']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_13']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_12']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_11']; ?></td>
		      <td></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_21']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_22']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_23']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_24']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_25']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_26']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_27']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_28']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Porcentaje_2']; ?></td>
		    </tr>
                    <tr>
                      <th></th>
                      <th>18</th>
                      <th>17</th>
                      <th>16</th>
                      <th>15</th>
                      <th>14</th>
                      <th>13</th>
                      <th>12</th>
                      <th>11</th> 
                      <th></th>
                      <th>21</th>
                      <th>22</th>
                      <th>23</th>
                      <th>24</th>
                      <th>25</th>
                      <th>26</th>
                      <th>27</th>
                      <th>28</th>  
                      <th></th>                   
                    </tr>
                    <tr>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Fecha_3']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_18']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_17']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_16']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_15']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_14']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_13']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_12']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_11']; ?></td>
		      <td></td>
		      <td><?php echo $Datos_Formato['Cuant_Plac_C_21']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_22']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_23']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_24']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_25']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_26']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_27']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_28']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Porcentaje_3']; ?></td>
                    </tr>
                    <tr>
		      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
		      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
		      <td></td>
		    </tr>
                    <tr>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Fecha_4']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_48']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_47']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_46']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_45']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_44']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_43']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_42']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_41']; ?></td>
		      <td></td>
		      <td><?php echo $Datos_Formato['Cuant_Plac_A_31']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_32']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_33']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_34']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_35']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_36']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_37']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_A_38']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Porcentaje_4']; ?></td>
                    </tr>
                    <tr>
                      <th></th>
                      <th>48</th>
                      <th>47</th>
                      <th>46</th>
                      <th>45</th>
                      <th>44</th>
                      <th>43</th>
                      <th>42</th>
                      <th>41</th>
		      <th></th>
		      <th>31</th>
                      <th>32</th>
                      <th>33</th>
                      <th>34</th>
                      <th>35</th>
                      <th>36</th>
                      <th>37</th>
                      <th>38</th>
		      <th></th>
                    </tr>
                    <tr>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Fecha_5']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_48']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_47']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_46']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_45']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_44']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_43']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_42']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_41']; ?></td>
		      <td></td>
		      <td><?php echo $Datos_Formato['Cuant_Plac_B_31']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_32']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_33']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_34']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_35']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_36']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_37']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_B_38']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Porcentaje_5']; ?></td>
                    </tr>
                    <tr>
                      <th></th>
                      <th>48</th>
                      <th>47</th>
                      <th>46</th>
                      <th>45</th>
                      <th>44</th>
                      <th>43</th>
                      <th>42</th>
                      <th>41</th>
		      <th></th>
		      <th>31</th>
                      <th>32</th>
                      <th>33</th>
                      <th>34</th>
                      <th>35</th>
                      <th>36</th>
                      <th>37</th>
                      <th>38</th>
		      <th></th>
                    </tr>
                    <tr>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Fecha_6']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_48']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_47']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_46']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_45']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_44']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_43']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_42']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_41']; ?></td>
		      <td></td>
		      <td><?php echo $Datos_Formato['Cuant_Plac_C_31']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_32']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_33']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_34']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_35']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_36']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_37']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_C_38']; ?></td>
                      <td><?php echo $Datos_Formato['Cuant_Plac_Porcentaje_6']; ?></td>
                    </tr>
                </table>

	        <h4>Diagnóstico Individual</h4>

	      <table class="tabla">
                <tr>
                  <td>Gingivitis</td>
                  <td><?php echo $Datos_Formato['Gin_18']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_17']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_16']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_15']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_14']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_13']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_12']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_11']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_21']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_22']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_23']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_24']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_25']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_26']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_27']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_28']; ?></td>
                </tr>
                <tr>
                  <td>Periodontitis Leve</td>
                  <td><?php echo $Datos_Formato['Leve_18']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_17']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_16']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_15']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_14']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_13']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_12']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_11']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_21']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_22']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_23']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_24']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_25']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_26']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_27']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_28']; ?></td>
                </tr>
                <tr>
                  <td>Periodontitis Moderna</td>
                  <td><?php echo $Datos_Formato['Moderna_18']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_17']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_16']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_15']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_14']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_13']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_12']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_11']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_21']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_22']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_23']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_24']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_25']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_26']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_27']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_28']; ?></td>
                </tr>
                <tr>
                  <td>Periodontitis Grave</td>
                  <td><?php echo $Datos_Formato['Grave_18']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_17']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_16']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_15']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_14']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_13']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_12']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_11']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_21']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_22']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_23']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_24']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_25']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_26']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_27']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_28']; ?></td>
                </tr>
                <tr>
                  <th></th>
                  <th>18</th>
                  <th>17</th>
                  <th>16</th>
                  <th>15</th>
                  <th>14</th>
                  <th>13</th>
                  <th>12</th>
                  <th>11</th>
                  <th>21</th>
                  <th>22</th>
                  <th>23</th>
                  <th>24</th>
                  <th>25</th>
                  <th>26</th>
                  <th>27</th>
                  <th>28</th>
                </tr>
                <tr>
                  <th></th>
                  <th>48</th>
                  <th>47</th>
                  <th>46</th>
                  <th>45</th>
                  <th>44</th>
                  <th>43</th>
                  <th>42</th>
                  <th>41</th>
                  <th>31</th>
                  <th>32</th>
                  <th>33</th>
                  <th>34</th>
                  <th>35</th>
                  <th>36</th>
                  <th>37</th>
                  <th>38</th>
                </tr>
                <tr>
                  <td>Gingivitis</td>
                  <td><?php echo $Datos_Formato['Gin_48']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_47']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_46']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_45']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_44']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_43']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_42']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_41']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_31']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_32']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_33']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_34']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_35']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_36']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_37']; ?></td>
                  <td><?php echo $Datos_Formato['Gin_38']; ?></td>
                </tr>
                <tr>
                  <td>Periodontitis Leve</td>
                  <td><?php echo $Datos_Formato['Leve_48']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_47']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_46']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_45']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_44']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_43']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_42']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_41']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_31']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_32']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_33']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_34']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_35']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_36']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_37']; ?></td>
                  <td><?php echo $Datos_Formato['Leve_38']; ?></td>
                </tr>
                <tr>
                  <td>Periodontitis Moderna</td>
                  <td><?php echo $Datos_Formato['Moderna_48']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_47']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_46']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_45']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_44']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_43']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_42']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_41']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_31']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_32']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_33']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_34']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_35']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_36']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_37']; ?></td>
                  <td><?php echo $Datos_Formato['Moderna_38']; ?></td>
                </tr>
                <tr>
                  <td>Periodontitis Grave</td>
                  <td><?php echo $Datos_Formato['Grave_48']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_47']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_46']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_45']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_44']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_43']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_42']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_41']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_31']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_32']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_33']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_34']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_35']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_36']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_37']; ?></td>
                  <td><?php echo $Datos_Formato['Grave_38']; ?></td>
                </tr>
            </table>

	    <br />

	    <strong>Diagnóstico General (lesión más dañada):</strong>
            <?php echo $Datos_Formato['Diagnostico_General']; ?>

	    <h4>Cuantificación de Placa Post-Tratamiento</h4>

                <table class="tabla">
                    <tr>
                      <th>Fecha</th>
		      <th colspan="17"></th>
                      <th>Porcentaje</th>
                    </tr>
                    <tr>
                      <td><?php echo $Datos_Formato['Fecha_Basica_1']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_18']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_17']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_16']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_15']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_14']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_13']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_12']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_11']; ?></td>
                      <td>Post T. Básica</td>                      
                      <td><?php echo $Datos_Formato['Basica_21']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_22']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_23']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_24']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_25']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_26']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_27']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_28']; ?></td>
                      <td><?php echo $Datos_Formato['Porcentaje_Basica_1']; ?>%</td>
                    </tr>
                    <tr>
                      <th></th>
                      <th>18</th>
                      <th>17</th>
                      <th>16</th>
                      <th>15</th>
                      <th>14</th>
                      <th>13</th>
                      <th>12</th>
                      <th>11</th> 
                      <th></th>                     
                      <th>21</th>
                      <th>22</th>
                      <th>23</th>
                      <th>24</th>
                      <th>25</th>
                      <th>26</th>
                      <th>27</th>
                      <th>28</th>
                      <th></th>                    
                    </tr>
                    <tr>
                      <td><?php echo $Datos_Formato['Fecha_Final_1']; ?></td>
                      <td><?php echo $Datos_Formato['Final_18']; ?></td>
                      <td><?php echo $Datos_Formato['Final_17']; ?></td>
                      <td><?php echo $Datos_Formato['Final_16']; ?></td>
                      <td><?php echo $Datos_Formato['Final_15']; ?></td>
                      <td><?php echo $Datos_Formato['Final_14']; ?></td>
                      <td><?php echo $Datos_Formato['Final_13']; ?></td>
                      <td><?php echo $Datos_Formato['Final_12']; ?></td>
                      <td><?php echo $Datos_Formato['Final_11']; ?></td>
                      <td>Final</td>                      
                      <td><?php echo $Datos_Formato['Final_21']; ?></td>
                      <td><?php echo $Datos_Formato['Final_22']; ?></td>
                      <td><?php echo $Datos_Formato['Final_23']; ?></td>
                      <td><?php echo $Datos_Formato['Final_24']; ?></td>
                      <td><?php echo $Datos_Formato['Final_25']; ?></td>
                      <td><?php echo $Datos_Formato['Final_26']; ?></td>
                      <td><?php echo $Datos_Formato['Final_27']; ?></td>
                      <td><?php echo $Datos_Formato['Final_28']; ?></td>
                      <td><?php echo $Datos_Formato['Porcentaje_Final_1']; ?>%</td>
                    </tr>
                    <tr>
                      <td><?php echo $Datos_Formato['Fecha_Basica_2']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_48']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_47']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_46']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_45']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_44']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_43']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_42']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_41']; ?></td>
                      <td>Post T. Básica</td>                      
                      <td><?php echo $Datos_Formato['Basica_31']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_32']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_33']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_34']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_35']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_36']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_37']; ?></td>
                      <td><?php echo $Datos_Formato['Basica_38']; ?></td>
                      <td><?php echo $Datos_Formato['Porcentaje_Basica_2']; ?>%</td>
                    </tr>
                    <tr>
                      <th></th>
                      <th>48</th>
                      <th>47</th>
                      <th>46</th>
                      <th>45</th>
                      <th>44</th>
                      <th>43</th>
                      <th>42</th>
                      <th>41</th> 
                      <th></th>                     
                      <th>31</th>
                      <th>32</th>
                      <th>33</th>
                      <th>34</th>
                      <th>35</th>
                      <th>36</th>
                      <th>37</th>
                      <th>38</th>
                      <th></th>                     
                    </tr>
                    <tr>
                      <td><?php echo $Datos_Formato['Fecha_Final_2']; ?></td>
                      <td><?php echo $Datos_Formato['Final_48']; ?></td>
                      <td><?php echo $Datos_Formato['Final_47']; ?></td>
                      <td><?php echo $Datos_Formato['Final_46']; ?></td>
                      <td><?php echo $Datos_Formato['Final_45']; ?></td>
                      <td><?php echo $Datos_Formato['Final_44']; ?></td>
                      <td><?php echo $Datos_Formato['Final_43']; ?></td>
                      <td><?php echo $Datos_Formato['Final_42']; ?></td>
                      <td><?php echo $Datos_Formato['Final_41']; ?></td>
                      <td>Final</td>                      
                      <td><?php echo $Datos_Formato['Final_31']; ?></td>
                      <td><?php echo $Datos_Formato['Final_32']; ?></td>
                      <td><?php echo $Datos_Formato['Final_33']; ?></td>
                      <td><?php echo $Datos_Formato['Final_34']; ?></td>
                      <td><?php echo $Datos_Formato['Final_35']; ?></td>
                      <td><?php echo $Datos_Formato['Final_36']; ?></td>
                      <td><?php echo $Datos_Formato['Final_37']; ?></td>
                      <td><?php echo $Datos_Formato['Final_38']; ?></td>
                      <td><?php echo $Datos_Formato['Porcentaje_Final_2']; ?>%</td>
                    </tr>
                </table>

		<br />

		<strong>Observaciones:</strong>
                <?php echo $Datos_Formato['Observaciones']; ?>

		<h4>Valoración Bolsa Post-Tratamiento</h4>

                <table class="tabla">
                  <tr>
                    <th colspan="8">P. Bolsa</th>
		    <th colspan="8">P. Bolsa</th>
                  </tr>
                  <tr>
                    <td>M</td>
                    <td>F</td>
                    <td>H</td>
                    <td>V</td>
                    <td>P</td>
                    <td>D</td>
                    <td>M</td>
                    <td></td>
		    <td></td>
                    <td>M</td>
                    <td>D</td>
                    <td>P</td>
                    <td>V</td>
                    <td>H</td>
                    <td>F</td>
                    <td>M</td>  
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_18']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_18'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_18']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_18']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_18']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_18']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_18']; ?></td>
                    <td>18</td>
		    <td>28</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_28']; ?></td>                    
                    <td><?php echo $Datos_Formato['Bolsa_D_28']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_28']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_28']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_28']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_28'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_28']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_17']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_17'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_17']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_17']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_17']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_17']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_17']; ?></td>
                    <td>17</td>
		    <td>27</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_27']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_27']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_27']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_27']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_27']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_27'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_27']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_16']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_16'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_16']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_16']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_16']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_16']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_16']; ?></td>
                    <td>16</td>
		    <td>26</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_26']; ?></td>                    
                    <td><?php echo $Datos_Formato['Bolsa_D_26']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_26']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_26']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_26']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_26'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_26']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_15']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_15'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_15']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_15']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_15']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_15']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_15']; ?></td>
                    <td>15</td>
		    <td>25</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_25']; ?></td>                    
                    <td><?php echo $Datos_Formato['Bolsa_D_25']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_25']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_25']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_25']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_25'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_25']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_14']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_14'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_14']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_14']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_14']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_14']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_14']; ?></td>
                    <td>14</td>
		    <td>24</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_24']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_24']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_24']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_24']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_24']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_24'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_24']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_13']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_13'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_13']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_13']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_13']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_13']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_13']; ?></td>
                    <td>13</td>
		    <td>23</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_23']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_23']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_23']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_23']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_23']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_23'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_23']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_12']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_12'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_12']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_12']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_12']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_12']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_12']; ?></td>
                    <td>12</td>
		    <td>22</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_22']; ?></td> 
                    <td><?php echo $Datos_Formato['Bolsa_D_22']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_22']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_22']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_22']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_22'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_22']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_11']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_11'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_11']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_11']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_11']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_11']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_11']; ?></td>
                    <td>11</td>
		    <td>21</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_21']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_21']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_21']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_21']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_21']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_21'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_21']; ?></td>
                  </tr>
                </table>

	        <table class="tabla">
                  <tr>
                    <th colspan="8">P. Bolsa</th>
		    <th colspan="8">P. Bolsa</th>
                  </tr>
                  <tr>
                    <td>M</td>
                    <td>F</td>
                    <td>H</td>
                    <td>V</td>
                    <td>P</td>
                    <td>D</td>
                    <td>M</td>
                    <td></td>
		    <td></td>
                    <td>M</td>
                    <td>D</td>
                    <td>P</td>
                    <td>V</td>
                    <td>H</td>
                    <td>F</td>
                    <td>M</td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_41']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_41'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_41']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_41']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_41']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_41']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_41']; ?></td>
                    <td>41</td>
		    <td>31</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_31']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_31']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_31']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_31']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_31']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_31'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_31']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_42']; ?></td> 
                    <td><?php echo ($Datos_Formato['Bolsa_F_42'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_42']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_42']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_42']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_42']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_42']; ?></td>
                    <td>42</td>
		    <td>32</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_32']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_32']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_32']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_32']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_32']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_32'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_32']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_43']; ?></td>                    
                    <td><?php echo ($Datos_Formato['Bolsa_F_43'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_43']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_43']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_43']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_43']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_43']; ?></td>
                    <td>43</td>
		    <td>33</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_33']; ?></td>                    
                    <td><?php echo $Datos_Formato['Bolsa_D_33']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_33']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_33']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_33']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_33'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_33']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_44']; ?></td>  
		    <td><?php echo ($Datos_Formato['Bolsa_F_44'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_44']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_44']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_44']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_44']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_44']; ?></td>
                    <td>44</td>
		    <td>34</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_34']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_34']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_34']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_34']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_34']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_34'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_34']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_45']; ?></td> 
                    <td><?php echo ($Datos_Formato['Bolsa_F_45'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_45']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_45']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_45']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_45']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_45']; ?></td>
                    <td>45</td>
		    <td>35</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_35']; ?></td>                    
                    <td><?php echo $Datos_Formato['Bolsa_D_35']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_35']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_35']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_35']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_35'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_35']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_46']; ?></td>                    
                    <td><?php echo ($Datos_Formato['Bolsa_F_46'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_46']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_46']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_46']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_46']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_46']; ?></td>
                    <td>46</td>
		    <td>36</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_36']; ?></td> 
                    <td><?php echo $Datos_Formato['Bolsa_D_36']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_36']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_36']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_36']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_36'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_36']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_47']; ?></td> 
                    <td><?php echo ($Datos_Formato['Bolsa_F_47'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_47']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_47']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_47']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_47']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_47']; ?></td>
                    <td>47</td>
		    <td>37</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_37']; ?></td>                    
                    <td><?php echo $Datos_Formato['Bolsa_D_37']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_37']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_37']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_37']; ?></td>
                    <td><?php echo ($Datos_Formato['Bolsa_F_37'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_37']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Bolsa_M_48']; ?></td>  
                    <td><?php echo ($Datos_Formato['Bolsa_F_48'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_48']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_48']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_48']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_D_48']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_48']; ?></td>
                    <td>48</td>
		    <td>38</td>
                    <td><?php echo $Datos_Formato['Bolsa_M2_38']; ?></td>                    
                    <td><?php echo $Datos_Formato['Bolsa_D_38']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_P_38']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_V_38']; ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_H_38']; ?></td>
		    <td><?php echo ($Datos_Formato['Bolsa_F_38'] == "on" ? "Si":""); ?></td>
                    <td><?php echo $Datos_Formato['Bolsa_M_38']; ?></td>
                  </tr>
                </table>

		<h4>Planificación del Tratamiento</h4>

	        <table class="tabla">
                  <tr>
		    <td><strong>1. Sistémico:</strong></td>
		    <td><?php echo ($Datos_Formato['Planificacion_Tratamiento'] == "1" ? "Si":""); ?></td>
                    <td><strong>2. Terapira Básica:</strong></td>
		    <td><?php echo ($Datos_Formato['Planificacion_Tratamiento'] == "2" ? "Si":""); ?></td>
                    <td><strong>3. Quirúrgico:</strong></td>
		    <td><?php echo ($Datos_Formato['Planificacion_Tratamiento'] == "3" ? "Si":""); ?></td>
                    <td><strong>4. Mantenimiento:</strong></td>
		    <td><?php echo ($Datos_Formato['Planificacion_Tratamiento'] == "4" ? "checked":""); ?></td>
		    <td><strong>revisión cada:</strong></td>
		    <td><?php echo $Datos_Formato['Revision_Meses']; ?> mes(es). </td>
                  </tr>
              </table>

	      <br />

	      <table class="tabla">
                  <tr>
                    <th>Fecha</th>
                    <th>Tratamiento</th>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Fecha_Tratamiento_1']; ?></td>
                    <td><?php echo $Datos_Formato['Tratamiento_1']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Fecha_Tratamiento_2']; ?></td>
                    <td><?php echo $Datos_Formato['Tratamiento_2']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Fecha_Tratamiento_3']; ?></td>
                    <td><?php echo $Datos_Formato['Tratamiento_3']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Fecha_Tratamiento_4']; ?></td>
                    <td><?php echo $Datos_Formato['Tratamiento_4']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Fecha_Tratamiento_5']; ?></td>
                    <td><?php echo $Datos_Formato['Tratamiento_5']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Fecha_Tratamiento_6']; ?></td>
                    <td><?php echo $Datos_Formato['Tratamiento_6']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Fecha_Tratamiento_7']; ?></td>
                    <td><?php echo $Datos_Formato['Tratamiento_7']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Fecha_Tratamiento_8']; ?></td>
                    <td><?php echo $Datos_Formato['Tratamiento_8']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Fecha_Tratamiento_9']; ?></td>
                    <td><?php echo $Datos_Formato['Tratamiento_9']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Fecha_Tratamiento_10']; ?></td>
                    <td><?php echo $Datos_Formato['Tratamiento_10']; ?></td>
                  </tr>
              </table>

	      <br />

	      <table>
		<tr>
		    <td><strong>Folio de Recibos del Tx:</strong></td>
		  <td><?php echo $Datos_Formato['Folio_Recibos_TX']; ?></td>
	       </tr>
	       <tr>
                  <td><strong>Numeros de Recibos Radiogaficos:</strong></td>
                  <td><?php echo $Datos_Formato['Numero_Recibos_Radiograficos']; ?></td>
	       </tr>
	       <tr>
		  <td><strong>Tratamiento:</strong></td>
                <td><?php echo $Datos_Formato['Tratamiento_11']; ?></td> 
            </tr>
	  </table>

	  <br />

	  <table id="firmas">
	  <tr>
	    <td><p>___________________________</p>
		Firma del Alumno
	    </td>
	    <td><p>___________________________</p>
		Firma del Maestro
	    </td>
	    <td><p>___________________________</p>
		Firma del Paciente
	    </td>
	  </tr>
      </table>
      
  </div>
</body>
</html>
