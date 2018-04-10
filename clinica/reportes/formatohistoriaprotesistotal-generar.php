<html>
<head>
  <meta charset="utf-8">
  <title>Formato de Historia Clinica de Protesis Total</title>
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
    }

    .tabla th{
      background:#e3e3e3;
      margin: 0;
    }

    .tabla td{
      height:8px;
      width:5px;
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
  <?php include("../../core-saec/Formato_Historia_Clinica_Protesis_Total.php"); ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <th style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </th>
        <th style="width:470px;">
          <h4>Formato de Historia Clínica de Prótesis Total</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </th>
        <th style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </th>
      </tr> 
    </table>   
    
    <?php 
            $Formato_Historia_Clinica_Protesis_Total = new Formato_Historia_Clinica_Protesis_Total();

            $Formato_Historia_Clinica_Protesis_Total->IdHistoriaClinicaProtesisTotal = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Protesis_Total->Obtener_Formato();

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
             <td><strong>Paciente</strong></td>
	     <td><?php echo $Datos_Formato['NombrePaciente'].' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></td>
          </tr>
          <tr>
             <td><strong>Edad:</strong></td>
             <td><?php echo $Edad; ?> Año(s)</td>
	  </tr>
	  <tr>
	     <td><strong>Sexo:</strong></td>
	     <td><?php echo $Datos_Formato['SexoPaciente']; ?></td>
	  </tr>
	  <tr>
	     <td><strong>Ocupación:</strong></td>
	     <td><?php echo $Datos_Formato['OcupacionPaciente']; ?></td>
	  </tr>
	  <tr>
	     <td><strong>Teléfono: </strong></td>
	     <td><?php echo $Datos_Formato['TelefonoPaciente']; ?></td>
          </tr>
          <tr>
             <td><strong>Domicilio:</strong></td>
	     <td><?php echo $Datos_Formato['CallePaciente'].' '.$Datos_Formato['NumeroPaciente'].' '.$Datos_Formato['ColoniaPaciente'].' '.$Datos_Formato['PoblacionPaciente']; ?></td>
          </tr>
          <tr> 
             <td><strong>¿Cuál es el Motivo de la Consulta?</strong></td>
	     <td><?php echo $Datos_Formato['Pregunta_1']; ?></td>
          </tr>
          <tr>
             <td><strong>¿Se encuentra bajo Tratamiento Médico?</strong></td>
	     <td><?php echo $Datos_Formato['Pregunta_2']; ?></td>
	  </tr>
	  </table>

              <h4>Antecedentes</h4>

              <table> 
	        <tr>
	         <td><strong>Fecha Aproximada de sus Últimas Extracciones:</strong></td>
	         <td><strong>Superior:</strong></td>
	         <td><?php echo $Datos_Formato['Fecha_Superior']; ?></td>
	         <td><strong>Inferior:</strong></td>
                 <td><?php echo $Datos_Formato['Fecha_Inferior']; ?></td>
                </tr>
              </table>

              <table> 
                  <tr>
		    <td><strong>Razones por las que se Perdieron sus Órganos Dentarios:</strong></td>
		    <td><?php switch($Datos_Formato['Pregunta_3']){
			case 1:
			  echo "Caries";
			  break;
			case 2:
			  echo "Lesiones Periodontales";
			  break;
			case 3:
			  echo "Otras Causas";
			  break;
			} ?></td>
		 </tr>
		 <tr>
		   <td><strong>Es portador de Dentadura:</strong></td>
		   <td><?php switch($Datos_Formato['Pregunta_4']){
			case 1:
			  echo "Total";
			  break;
			case 2:
			  echo "Parcial";
			  break;
			case 3:
			  echo "Ninguna";
			  break;
			} ?></td>
		</tr>
		<tr>
		  <td><strong>Experiencia en el Uso de Dentadura:</strong></td>
		  <td><?php switch($Datos_Formato['Pregunta_4']){
			case 1:
			  echo "Buena";
			  break;
			case 2:
			  echo "Regular";
			  break;
			case 3:
			  echo "Pobre";
			  break;
			} ?></td>
		</tr>
		<tr>
		  <td><strong>¿Por qué?</strong></td>
		  <td><?php echo $Datos_Formato['Pregunta_6']; ?></td>
		</tr>             
              </table>

	      <h4>Salud General del Paciente</h4>
              
              <table>
		  <tr>
		    <td><strong>Salud General del Paciente:</strong></td>
		    <td><?php switch($Datos_Formato['Pregunta_7']){
			case 1:
			  echo "Buena";
			  break;
			case 2:
			  echo "Regular";
			  break;
			case 3:
			  echo "Debilitada";
			  break;
			} ?></td>
		  </tr>
                  <tr>
		    <td><strong>Actitud Mental del Paciente:</strong></td>
		    <td><?php switch($Datos_Formato['Pregunta_8']){
			case 1:
			  echo "Escéptico";
			  break;
			case 2:
			  echo "Neurótico";
			  break;
			case 3:
			  echo "Receptivo";
			  break;
			case 4:
			  echo "Pasivo";
			  break;
			} ?></td>
                  </tr>
		</table>
		       
		<h4>Examen Extrabucal</h4>

		<table>
		  <tr>
		    <td><strong>Cara:</strong></td>
		    <td><?php echo ($Datos_Formato['Pregunta_9'] == "1" ? "Patología Presente":"Ninguna"); ?></td>
		  </tr>
		  <tr>
		    <td><strong>Forma de la Cara:</strong></td>
		    <td><?php switch($Datos_Formato['Pregunta_10']){
			case 1:
			  echo "Cuadrada";
			  break;
			case 2:
			  echo "Triangular";
			  break;
			case 3:
			  echo "Ovoidea";
			  break;
			} ?></td>
		  </tr>
		  <tr>
		     <td><strong>Articulación Temporomandibular:</strong></td>
		     <td><?php switch($Datos_Formato['Pregunta_12']){
			case 1:
			  echo "Dolor";
			  break;
			case 2:
			  echo "Chasquido";
			  break;
			case 3:
			  echo "Ninguno";
			  break;
			} ?></td>
		   </tr>
		   <tr>
		     <td><strong>Cuello:</strong></td>
		     <td><?php switch($Datos_Formato['Pregunta_13']){
			case 1:
			  echo "Dolor";
			  break;
			case 2:
			  echo "Chasquido";
			  break;
			case 3:
			  echo "Ninguno";
			  break;
			} ?></td>
		   </tr>
		   <tr>
		     <td><strong>Labio Superior:</strong></td>
		     <td><?php switch($Datos_Formato['Pregunta_13']){
			case 1:
			  echo "Corto";
			  break;
			case 2:
			  echo "Mediano";
			  break;
			case 3:
			  echo "Largo";
			  break;
			case 4:
			  echo "Normal";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Patología del Labio:</strong></td>
			<td><?php echo ($Datos_Formato['Pregunta_14'] == "1" ? "Presente":"Ninguno"); ?></td>
		    </tr>
		    <tr>
			<td><strong>Color de Ojos:</strong></td>
			<td><?php echo $Datos_Formato['Pregunta_15']; ?></td>
		    </tr>
		    <tr>
			<td><strong>Color de Cabello:</strong></td>
			<td><?php echo $Datos_Formato['Pregunta_16']; ?></td>
		    </tr>
		    <tr>
			<td><strong>Color de Piel:</strong></td>
			<td><?php echo $Datos_Formato['Pregunta_17']; ?></td>
		    </tr>
		    <tr>
			<td><strong>Tono Muscular Facial:</strong></td>
			<td><?php switch($Datos_Formato['Pregunta_18']){
			case 1:
			  echo "Flácido";
			  break;
			case 2:
			  echo "Tenso";
			  break;
			case 3:
			  echo "Medio";
			  break;
			} ?></td>
		    </tr>
		  </table>

		  <h4>Examen Intrabucal</h4>
              
	      <table>
              <tr> 
                <td><strong>Tamaño de los Maxilares:</strong></td>
		<td><?php switch($Datos_Formato['Pregunta_19']){
			case 1:
			  echo "Pequeño";
			  break;
			case 2:
			  echo "Mediano";
			  break;
			case 3:
			  echo "Grande";
			  break;
			} ?></td>
              </tr>
              <tr>
              <td><strong>Forma de los Maxilares:</strong></td>
	      <td><?php switch($Datos_Formato['Pregunta_20']){
			case 1:
			  echo "Pequeño";
			  break;
			case 2:
			  echo "Mediano";
			  break;
			case 3:
			  echo "Grande";
			  break;
			} ?></td>
	      </tr>
              <tr>
              <td><strong>Forma de los Procesos Residuales:</strong></td>
	      <td><strong>Superior:</strong></td>
	      <td><?php switch($Datos_Formato['Residuales_Superior']){
			case 1:
			  echo "Normal";
			  break;
			case 2:
			  echo "Filo de Navaja";
			  break;
			case 3:
			  echo "Plano";
			  break;
			case 4:
			  echo "Irregular";
			  break;
			} ?></td>
                </tr>
                <tr>
		    <td><strong>Inferior:</strong></td>
		    <td><?php switch($Datos_Formato['Residuales_Inferior']){
			case 1:
			  echo "Normal";
			  break;
			case 2:
			  echo "Filo de Navaja";
			  break;
			case 3:
			  echo "Plano";
			  break;
			case 4:
			  echo "Irregular";
			  break;
			} ?></td>
              </tr>
              <tr>
                <td><strong>Salud de la Mucosa:</strong></td>
	        <td><strong>Superior:</strong></td>
	        <td><?php echo ($Datos_Formato['Mucosa_Superior'] == "1" ? "Sana":"Irritada"); ?></td>
		<td><strong>Inferior:</strong></td>
	        <td><?php echo ($Datos_Formato['Mucosa_Inferior'] == "1" ? "Sana":"Irritada"); ?></td>
	      </tr>
	      <tr>
		<td><strong>Posición Lingual:</strong></td>
		<td><?php echo ($Datos_Formato['Posicion_Lingual'] == "1" ? "Normal":"Retráctil"); ?></td>
	      </tr>
	      <tr>
		<td><strong>Volumen Salival:</strong></td>
		<td><?php switch($Datos_Formato['Volumen_Salival']){
			case 1:
			  echo "Insificiente";
			  break;
			case 2:
			  echo "Normal";
			  break;
		        case 3:
			  echo "Excesiva";
			  break;
		} ?></td>
	      </tr>
	      <tr>
		<td><strong>Condición de la Saliva:</strong></td>
		<td><?php switch($Datos_Formato['Condicion_Salival']){
			case 1:
			  echo "Normal";
			  break;
			case 2:
			  echo "Fluida";
			  break;
		        case 2:
			  echo "Espesa";
			  break;
		} ?></td>
	      </tr>
	      <tr>
		<td><strong>Torus Palatino:</strong></td>
		<td><?php switch($Datos_Formato['Torus_Palatino']){
			case 1:
			  echo "Chico";
			  break;
			case 2:
			  echo "Mediano";
			  break;
		        case 2:
			  echo "Grande";
			  break;
			case 3:
			  echo "Ninguno";
			  break;
		} ?></td>
	      </tr>
	      <tr>
		<td><strong>Torus Mandibular:</strong></td>
		<td><?php switch($Datos_Formato['Torus_Mandibular']){
			case 1:
			  echo "Chico";
			  break;
			case 2:
			  echo "Mediano";
			  break;
		        case 2:
			  echo "Grande";
			  break;
			case 3:
			  echo "Ninguno";
			  break;
		} ?></td>
	      </tr>
              <tr>
                <td><strong>Reflejo Nauseoso:</strong></td>
		<td><?php switch($Datos_Formato['Reflejo_Nauseoso']){
			case 1:
			  echo "Nulo";
			  break;
			case 2:
			  echo "Moderado";
			  break;
		        case 2:
			  echo "Severo";
			  break;
		} ?></td>
	      </tr>
              <tr>
		<td><strong>Relación Intermaxilar:</strong></td>
		<td><?php switch($Datos_Formato['Relacion_Intermaxilar']){
			case 1:
			  echo "Ortognático";
			  break;
			case 2:
			  echo "Retrognático";
			  break;
		        case 2:
			  echo "Prognático";
			  break;
		} ?></td>
	      </tr>
              <tr>
              <td><strong>Frenillo:</strong></td>
	      <td><?php switch($Datos_Formato['Frenillo']){
			case 1:
			  echo "Normal";
			  break;
			case 2:
			  echo "Hipertrofiado";
			  break;
		        case 2:
			  echo "Ausente";
			  break;
		} ?></td>
	      </tr>
              <tr>
		<td><strong>Observaciones Especiales:</strong></td>
		<td><?php echo $Datos_Formato['Observaciones_Especiales']; ?></td>
              </tr >
              <tr>
                <td><strong>Diagnóstico:</strong></td>
		<td><?php echo $Datos_Formato['Diagnostico']; ?></td>
	      </tr>
              <tr>
                <td><strong>Pronóstico:</strong></td>
		<td><?php echo $Datos_Formato['Pronostico']; ?></td>
              </tr>
              <tr>
		<td><strong>Plan de Tratamiento:</strong></td>
		<td><?php echo $Datos_Formato['Plan_Tratamiento']; ?></td>
              </tr>
	    </table>

	    <br /><br />

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
