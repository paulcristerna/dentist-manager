<html>
<head>
  <meta charset="utf-8">
  <title>Formato de Historia Clinica de Endodoncia</title>
  <style type="text/css">
    table th{
        text-align: center;
     }

    #contenido th{
      background:#e3e3e3;
    }

    #contenido th, #contenido td{
      border:1px solid #e3e3e3;
      margin: 0;
      padding:3px;
    }

    .centrado{
      text-align:center;
    }

    #firmas{
      text-align:center;
    }

    #firmas tr td{
      padding:100px 20px 0 20px;
    }
  </style>
</head>
<body>
  <?php include('../../core-saec/AccesoBD.php') ?>
  <?php include("../../core-saec/Formato_Historia_Clinica_Endodoncia.php"); ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <th style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </th>
        <th style="width:470px;">
          <h4>Formato de Historia Clínica de Endodoncia</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </th>
        <th style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </th>
      </tr> 
    </table> 

    <?php 
            $Formato_Historia_Clinica_Endodoncia = new Formato_Historia_Clinica_Endodoncia();

            $Formato_Historia_Clinica_Endodoncia->IdHistoriaClinicaEndodoncia = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Endodoncia->Obtener_Formato();

            $fecha = date_create($Datos_Formato['FechaNacimiento']);
            $FechaNacimiento = date_format($fecha,'Y');
            $Edad = date("Y") - $FechaNacimiento;
    ?>

    <h3>Datos del Paciente</h3>
    
    <table>
      <tr>
        <td><strong>Nombre:</strong></td>
	<td><?php echo $Datos_Formato['NombrePaciente'].' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></td>
      </tr>
      <tr>
        <td><strong>Dirección:</strong></td>
	<td><?php echo $Datos_Formato['CallePaciente'].' '.$Datos_Formato['NumeroPaciente'].' '.$Datos_Formato['ColoniaPaciente'].' '.$Datos_Formato['PoblacionPaciente']; ?></td>
      </tr>
      <tr>
        <td><strong>Teléfono:</strong></td>
	<td><?php echo $Datos_Formato['TelefonoPaciente']; ?></td>
      </tr>
      <tr>
        <td><strong>Ocupación:</strong></td>
	<td><?php echo $Datos_Formato['OcupacionPaciente']; ?></td>
      </tr>
      <tr>
        <td><strong>Edad:</strong></td>
	<td><?php echo $Edad; ?> Años</td>
      </tr>
     </table>

     <h3>Síntomas Subjetivos</h3>

     <table>
      <tr>
        <td><strong>Dolor:</strong></td>
	<td><?php echo ($Datos_Formato['Dolor'] == '1' ? "Presente":"Ausente"); ?></td>
      </tr>
      <tr>
        <td><strong>Tipo de Dolor:</strong></td>
	<td><?php echo ($Datos_Formato['DolorTipo'] == '1' ? "Espontáneo":"Provocado"); ?></td>
      </tr>
      <tr>
        <td><strong>Provocado por:</strong></td>
	<td><?php
	     switch ($Datos_Formato['DolorProvocadoPor']) {
	     case 1:
	       echo "Frío";
	       break;
	     case 2:
	       echo "Calor";
	       break;
	     case 3:
	       echo "Dulce";
	       break;
             case 4:
	       echo "Presión";
	       break;
             case 5:
	       echo "Masticación";
	       break;
	     }
        ?></td>
      </tr>
      <tr>
        <td><strong>Intensidad:</strong></td>
	<td><?php
	     switch ($Datos_Formato['NivelIntensidad']) {
	     case 1:
	       echo "Media";
	       break;
	     case 2:
	       echo "Severa";
	       break;
	     case 3:
	       echo "Momentanea";
	       break;
             case 4:
	       echo "Continua";
	       break;
	     }
        ?></td>
      </tr>
      <tr>
        <td><strong>Presentación:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Presentacion']) {
	     case 1:
	       echo "Intermitente";
	       break;
	     case 2:
	       echo "Localizado";
	       break;
	     case 3:
	       echo "Difuso";
	       break;
             case 4:
	       echo "Irradiado";
	       break;
	     case 5:
	       echo "Diurno";
	       break;
	     case 6:
	       echo "Nocturno";
	       break;
	     }
        ?></td>
      </tr>
      <tr>
        <td><strong>Duración:</strong></td>
	<td>
	Segundos: <?php echo $Datos_Formato['Duracion_Seg']; ?>
	Minutos: <?php echo $Datos_Formato['Duracion_Min']; ?>
	Horas: <?php echo $Datos_Formato['Duracion_Horas']; ?>
        </td>
      </tr>
      <tr>
        <td><strong>Sensación del Diente:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Sensacion_Diente']) {
	     case 1:
	       echo "Elongado";
	       break;
	     case 2:
	       echo "Móvil";
	       break;
	     }
        ?></td>
      </tr>
      </table>

      <h3>Síntomas Objetivos</h3>

      <table>
      <tr>
      <td><strong>Exposición Pulpar por:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Exposicion_Pulpar']) {
	     case 1:
	       echo "Caries";
	       break;
	     case 2:
	       echo "Instrumento dental";
	       break;
	     case 3:
	       echo "Fractura";
	       break;
	     }
        ?></td>
      </tr>
      <tr>
	<td><strong>Lesión Pulpar:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Lesion_Pulpar']) {
	     case 1:
	       echo "Física";
	       break;
	     case 2:
	       echo "Química";
	       break;
	     case 3:
	       echo "Bacteriana";
	       break;
	     }
        ?></td>
      </tr>
       <tr>
	<td><strong>Inflamación:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Inflamacion']) {
	     case 1:
	       echo "Extraoral";
	       break;
	     case 2:
	       echo "Intraoral";
	       break;
	     case 3:
	       echo "Endurecida";
	       break;
	     case 4:
	       echo "Blanda";
	       break;
	     }
        ?></td>
      </tr>
     </table>

     <h3>Medios de Diagnóstico</h3>

     <table>
       <tr>
	<td><strong>Frío:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Frio']) {
	     case 1:
	       echo "Normal";
	       break;
	     case 2:
	       echo "Anormal";
	       break;
	     case 3:
	       echo "Ninguna";
	       break;
	     }
        ?></td>
      </tr>
       <tr>
	<td><strong>Calor:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Calor']) {
	     case 1:
	       echo "Normal";
	       break;
	     case 2:
	       echo "Anormal";
	       break;
	     case 3:
	       echo "Ninguna";
	       break;
	     }
        ?></td>
      </tr>
      <tr>
	<td><strong>Movilidad:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Movilidad']) {
	     case 1:
	       echo "Palpación";
	       break;
	     case 2:
	       echo "Percusión";
	       break;
	     case 3:
	       echo "Cambio de Color";
	       break;
	     }
        ?></td>
      </tr>
      </table>

      <h3>Examen Radiográfico</h3>

      <table>      
      <tr>
	<td><strong>Cámara y Conducto Pulpar:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Camara_Conducto_Pulpar']) {
	     case 1:
	       echo "Normal";
	       break;
	     case 2:
	       echo "Resorción Interna";
	       break;
	     case 3:
	       echo "Perforación";
	       break;
             case 4:
	       echo "Obstrucción del Conducto";
	       break;
	     case 5:
	       echo "Fractura";
	       break;
             case 6:
	       echo "Calcificación Parcial";
	       break;
	     case 7:
	       echo "Calcificación Total";
	       break;
	     }
        ?></td>
      </tr>
      <tr>
	<td><strong>Periápice:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Periapice']) {
	     case 1:
	       echo "Resorción del ápice";
	       break;
	     case 2:
	       echo "Hipercimentosis";
	       break;
	     }
        ?></td>
      </tr>
      <tr>
	<td><strong>Ligamento Periodontal:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Ligamento_Periodontal']) {
	     case 1:
	       echo "Normal";
	       break;
	     case 2:
	       echo "Engrosado";
	       break;
	     }
        ?></td>
      </tr>
      <tr>
	<td><strong>Rarefacción Ápical:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Rarefaccion_Apical']) {
	     case 1:
	       echo "Circunscrita";
	       break;
	     case 2:
	       echo "Difusa";
	       break;
	     case 3:
	       echo "Ninguna";
	       break;
	     }
        ?></td>
      </tr>
      <tr>
	<td><strong>Diagnóstico Pulpar:</strong></td>
	<td><?php echo $Datos_Formato['Diagnostico_Pulpar']; ?></td>
      </tr>
      <tr>
	<td><strong>Pronóstico:</strong></td>
	<td><?php
	     switch ($Datos_Formato['Pronostico']) {
	     case 1:
	       echo "Favorable";
	       break;
	     case 2:
	       echo "Desfavorable";
	       break;
	     }
        ?></td>
      </tr>
      <tr>
	<td><strong>Plan de Tratamiento:</strong></td>
	<td><?php echo $Datos_Formato['Plan_Tratamiento']; ?></td>
      </tr>
      <tr>
	<td><strong>Técnica Operatoria:</strong></td>
	<td><?php echo $Datos_Formato['Tecnica_Operatoria']; ?></td>
      </tr>
      <tr>
	<td><strong>Materiales de Obturación:</strong></td>
	<td><?php echo $Datos_Formato['Materiales_Obturacion']; ?></td>
      </tr>
      <tr>
	<td><strong>Grapa #: </strong></td>
	<td><?php echo $Datos_Formato['Numero_Grapa']; ?></td>
      </tr>
      <tr>
	<td><strong>Pieza Dental:</strong></td>
	<td><?php echo $Datos_Formato['Pieza_Dental']; ?></td>
      </tr>
    </table>

    <br /><br /><br /><br /><br /><br /><br />

    <h3>Secuencia del Tratamiento</h3>
	
    <table class="centrado">
                <thead>
	         <tr>
                  <th style="width:100px;">Conducto</th>
                  <th style="width:100px;"></th>
                  <th style="width:100px;">Conductometría Longitudinal</th>
                  <th style="width:100px;"></th>
                  <th style="width:100px;">Punto de Referencia</th>
                  <th style="width:100px;">Amplitud N° Instrumento</th>
                  <th style="width:100px;">Obturación N° Cono Gutapercha</th>
	         </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td>Tent.</td>
                    <td>Rectif.</td>
                    <td>Def.</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Conducto_1']; ?></td>
                    <td><?php echo $Datos_Formato['Conducto_2']; ?></td>
                    <td><?php echo $Datos_Formato['Conducto_3']; ?></td>
                    <td><?php echo $Datos_Formato['Conducto_4']; ?></td>
                    <td><?php echo $Datos_Formato['Conducto_5']; ?></td>
                    <td><?php echo $Datos_Formato['Conducto_6']; ?></td>
                    <td><?php echo $Datos_Formato['Conducto_7']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Tec_Long_Tent_1']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Tent_2']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Tent_3']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Tent_4']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Tent_5']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Tent_6']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Tent_7']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Tec_Long_Rectif_1']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Rectif_2']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Rectif_3']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Rectif_4']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Rectif_5']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Rectif_6']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Rectif_7']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Tec_Long_Def_1']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Def_2']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Def_3']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Def_4']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Def_5']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Def_6']; ?></td>
                    <td><?php echo $Datos_Formato['Tec_Long_Def_7']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Punto_Referencia_1']; ?></td>
                    <td><?php echo $Datos_Formato['Punto_Referencia_2']; ?></td>
                    <td><?php echo $Datos_Formato['Punto_Referencia_3']; ?></td>
                    <td><?php echo $Datos_Formato['Punto_Referencia_4']; ?></td>
                    <td><?php echo $Datos_Formato['Punto_Referencia_5']; ?></td>
                    <td><?php echo $Datos_Formato['Punto_Referencia_6']; ?></td>
                    <td><?php echo $Datos_Formato['Punto_Referencia_7']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Num_Instrumento_1']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Instrumento_2']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Instrumento_3']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Instrumento_4']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Instrumento_5']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Instrumento_6']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Instrumento_7']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Num_Cono_1']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Cono_2']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Cono_3']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Cono_4']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Cono_5']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Cono_6']; ?></td>
                    <td><?php echo $Datos_Formato['Num_Cono_7']; ?></td>
                  </tr>
                </tbody>
              </table>

	      <br />

	      <table>
		 <tr>
		    <td><strong>Observaciones:</strong></td>
                    <td><?php echo $Datos_Formato['Observacion']; ?></td>
                  </tr>
              </table>

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
