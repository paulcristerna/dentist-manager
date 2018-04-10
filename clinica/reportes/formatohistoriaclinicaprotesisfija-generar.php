<html>
<head>
  <meta charset="utf-8">
  <title>Formato de Historia Clinica de Protesis Fija</title>
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
  <?php include('../../core-saec/Usuario.php') ?>
  <?php include('../../core-saec/Pareja_Clinica.php') ?>
  <?php include("../../core-saec/Formato_Historia_Clinica_Protesis_Fija.php"); ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <th style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </th>
        <th style="width:470px;">
          <h4>Formato de Historia Clinica de Protesis Fija</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </th>
        <th style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </th>
      </tr> 
    </table>   
      
    <?php 
            $Formato_Historia_Clinica_Protesis_Fija = new Formato_Historia_Clinica_Protesis_Fija();

            $Formato_Historia_Clinica_Protesis_Fija->IdHistoriaClinicaProtesisFija = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Protesis_Fija->Obtener_Formato();

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
	    <td><strong>Domicilio:</strong></td>
	    <td><?php echo $Datos_Formato['CallePaciente'].' '.$Datos_Formato['NumeroPaciente'].' '.$Datos_Formato['ColoniaPaciente'].' '.$Datos_Formato['PoblacionPaciente']; ?></td>
	  </tr>
	  <tr>
	    <td><strong>Lugar de Nacimiento:</strong></td>
	    <td><?php echo $Datos_Formato['PoblacionPaciente']; ?></td>
	  </tr>
	  <tr>
	    <td><strong>¿Cuál es el Motivo de la Consulta?</strong></td>
	    <td><?php echo $Datos_Formato['Motivo_Consulta']; ?></td>
	  </tr>
	  <tr>
	    <td><strong>¿Se encuentra bajo Tx Médico?</strong></td>
	    <td><?php echo $Datos_Formato['Tx_Medico']; ?></td>
	  </tr>
	  <tr>
	    <td><strong>¿Cuál?</strong></td>
	    <td><?php echo $Datos_Formato['Cual_Motivo']; ?></td>
	  </tr>
	  </table>

	  <h4>Evaluación Clínica</h4>

	    <p><strong>C:</strong> Caries, <strong>PPF:</strong> Prótesis Parcial Fija, <strong>PPR:</strong> Prótesis Parcial Removible, <strong>A:</strong> Diente Ausente, <strong>RI:</strong> Restauraciones Individuales</p>

	  <table class="tabla">                           
                  <tr>
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
                  </tr>
                  <tr>
			<td><?php switch($Datos_Formato['DienteIzq_1']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
		        <td><?php switch($Datos_Formato['DienteIzq_2']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td> 
			<td><?php switch($Datos_Formato['DienteIzq_3']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteIzq_4']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteIzq_5']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteIzq_6']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteIzq_7']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td></td>
			<td><?php switch($Datos_Formato['DienteIzq_8']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteIzq_9']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteIzq_10']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteIzq_11']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteIzq_12']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteIzq_13']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteIzq_14']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
                  </tr>
                 </table>

		<table class="tabla">                           
                  <tr>
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
                  </tr>
                  <tr>
			<td><?php switch($Datos_Formato['DienteDer_1']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
		        <td><?php switch($Datos_Formato['DienteDer_2']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td> 
			<td><?php switch($Datos_Formato['DienteDer_3']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteDer_4']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteDer_5']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteDer_6']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteDer_7']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td></td>
			<td><?php switch($Datos_Formato['DienteDer_8']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteDer_9']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteDer_10']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteDer_11']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteDer_12']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteDer_13']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
			<td><?php switch($Datos_Formato['DienteDer_14']){
			case 1:
			  echo "C";
			break;
			case 2:
			  echo "PPF";
			break;
			case 3:
			  echo "PPR";
			break;
			case 4:
			  echo "A";
			break;
			case 5:
			  echo "RI";
			break;
			} ?></td>
                  </tr>
                 </table>

		 <br />

		 <table>
		    <tr>
			<td><strong>Observaciones:</strong></td>
			<td><?php echo $Datos_Formato['Observaciones_1']; ?></td>
		    </tr>
		 </table>

		<h4>Análisis de la Oclusión</h4>

	        <table>
		    <tr>
			<td><strong>Clasificación de Angle:</strong></td>
			<td><?php switch($Datos_Formato['Clasificacion_Angle']){
			case 1:
			  echo "Grado 1";
			  break;
			case 2:
			  echo "Grado 2";
			  break;
			case 3:
			  echo "Grado 3";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Protección Canina:</strong></td>
			<td><?php switch($Datos_Formato['Proteccion_Canina']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Protección Anterior:</strong></td>
			<td><?php switch($Datos_Formato['Proteccion_Anterior']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Función de Grupo:</strong></td>
			<td><?php switch($Datos_Formato['Funcion_Grupo']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Protección Mutua:</strong></td>
			<td><?php switch($Datos_Formato['Proteccion_Mutua']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Mordida Cruzada:</strong></td>
			<td><?php switch($Datos_Formato['Mordida_Cruzada']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Mordida Abierta:</strong></td>
			<td><?php switch($Datos_Formato['Mordida_Abierta']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Sobremordida:</strong></td>
			<td><?php switch($Datos_Formato['Sobremordida']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Traslape Horizontal:</strong></td>
			<td><?php switch($Datos_Formato['Traslape_Horizontal']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			} ?></td>
		    </tr>
		     <tr>
			<td><strong>Observaciones:</strong></td>
			<td><?php echo $Datos_Formato['Observaciones_2']; ?></td>
		    </tr>
		    <tr>
			<td><strong>Examen Radiográfico:</strong></td>
			<td><?php switch($Datos_Formato['Examen_Radiografico']){
			case 1:
			  echo "Periapical";
			  break;
			case 2:
			  echo "Craneal";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Relación Corona-Raíz:</strong></td>
			<td><?php switch($Datos_Formato['Relacion_Corona_Raiz']){
			case 1:
			  echo "Buena";
			  break;
			case 2:
			  echo "Regular";
			  break;
			case 3:
			  echo "Mala";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Soporte Óseo:</strong></td>
			<td><?php switch($Datos_Formato['Soporte_Oseo']){
			case 1:
			  echo "Buena";
			  break;
			case 2:
			  echo "Regular";
			  break;
			case 3:
			  echo "Mala";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Región Desdentada:</strong></td>
			<td><?php echo $Datos_Formato['Region_Desdentada']; ?></td>
		    </tr>
		    <tr>
			<td><strong>Observaciones:</strong></td>
			<td><?php echo $Datos_Formato['Observaciones_3']; ?></td>
		    </tr>
		    <tr>
			<td><strong>¿Dolor en la Región de las Articulaciones Temporomandibulares?:</strong></td>
			<td><?php switch($Datos_Formato['Pregunta_1']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>¿Sensibilidad o Dolor en la Región de los Músculos de la Masticación?:</strong></td>
			<td><?php switch($Datos_Formato['Pregunta_2']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>¿Dolor en la Espalda o Cuello?:</strong></td>
			<td><?php switch($Datos_Formato['Pregunta_3']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			} ?></td>
		    </tr>
		    <tr>
			<td><strong>Hábitos Bucales:</strong></td>
			<td><?php echo $Datos_Formato['Habitos_Bucales'];?></td>
		    </tr>
		    <tr>
			<td><strong>Plan de Tratamiento:</strong></td>
			<td><?php echo $Datos_Formato['Plan_Tratamiento'];?></td>
		    </tr>
		    <tr>
			<td><strong>Dientes Pilares:</strong></td>
			<td><?php echo $Datos_Formato['Dientes_Pilares'];?></td>
		    </tr>
		    <tr>
			<td><strong>Pónticos:</strong></td>
			<td><?php echo $Datos_Formato['Ponticos'];?></td>
		    </tr>
		    <tr>
			<td><strong>Restauraciones Individuales:</strong></td>
			<td><?php echo $Datos_Formato['Restauraciones_Individuales'];?></td>
		    </tr>
		    <tr>
			<td><strong>Otros:</strong></td>
			<td><?php echo $Datos_Formato['Otros'];?></td>
		    </tr>
		    <tr>
			<td><strong>Material a Utilizar:</strong></td>
			<td><?php echo $Datos_Formato['Material_Utilizar'];?></td>
		    </tr>
		    <tr>
			<td><strong>Modelos de Estudio:</strong></td>
			<td><?php switch($Datos_Formato['Modelos_Estudio']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			};?></td>
		    </tr>
		    <tr>
			<td><strong>Preparaciones:</strong></td>
			<td><?php echo $Datos_Formato['Preparaciones'];?></td>
		    </tr>
		    <tr>
			<td><strong>Impresiones:</strong></td>
			<td><?php switch($Datos_Formato['Impresiones']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			};?></td>
		    </tr>
		    <tr>
			<td><strong>Prótesis Provisionales:</strong></td>
			<td><?php switch($Datos_Formato['Protesis_Provicionales']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			};?></td>
		    </tr>
		    <tr>
			<td><strong>Prueba de Metal:</strong></td>
			<td><?php switch($Datos_Formato['Prueba_Metal']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			};?></td>
		    </tr>
		    <tr>
			<td><strong>Prueba de Prótesis:</strong></td>
			<td><?php switch($Datos_Formato['Prueba_Protesis']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			};?></td>
		    </tr>
		    <tr>
			<td><strong>Cemento:</strong></td>
			<td><?php switch($Datos_Formato['Cemento']){
			case 1:
			  echo "Si";
			  break;
			case 2:
			  echo "No";
			  break;
			};?></td>
		    </tr>
		    <tr>
			<td><strong>Otros Tratamientos:</strong></td>
			<td><?php echo $Datos_Formato['Otros_Tratamientos'];?></td>
		    </tr>
		 </table>

		<br /><br /><br /><br />

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
