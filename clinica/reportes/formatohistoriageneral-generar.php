<html>
<head>
  <meta charset="utf-8">
  <title>Formato de Historia General</title>
  <style type="text/css">
    table th{
      text-align: center;
    }

    .tabla{
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
  <?php include("../../core-saec/Formato_Historia_Clinica_General.php"); ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <th style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </th>
        <th style="width:470px;">
          <h4>Formato de Historia General</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </th>
        <th style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </th>
      </tr> 
    </table>  

    <?php 
            $Formato_Historia_Clinica_General = new Formato_Historia_Clinica_General();

            $Formato_Historia_Clinica_General->IdHistoriaClinicaGeneral = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_General->Obtener_Formato();
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
              <td><strong>Sexo:</strong></td>
	      <td><?php echo $Datos_Formato['SexoPaciente']; ?></td>
	  </tr>
	  <tr>
              <td><strong>Edad:</strong></td>
	      <td><?php echo (isset($Edad) ? $Edad:""); ?> Año(s)</td>
	  </tr>
	  <tr>
	      <td><strong>Teléfono:</strong></td>
	      <td><?php echo $Datos_Formato['TelefonoPaciente']; ?></td>
	  </tr>
	  <tr>
	      <td><strong>E-mail:</strong></td>
	      <td><?php echo $Datos_Formato['EmailPaciente']; ?></td>
          </tr>               
          <tr>
              <td><strong>Dirección:</strong></td>
	      <td><?php echo $Datos_Formato['CallePaciente'].' '.$Datos_Formato['NumeroPaciente'].' '.$Datos_Formato['ColoniaPaciente'].' '.$Datos_Formato['PoblacionPaciente']; ?></td>
          </tr>
	</table>

	<h4>Padecimiento Actual y Antecedentes</h4>

	<strong> Padecimiento Actual: </strong>
	<?php echo $Datos_Formato['Padecimiento_Actual']; ?>

	<h5>Antecedentes Heredofamiliares</h5>

	Algún familiar (padre, madre, hermano, abuelos maternos, abuelos paternos, hijos) ha padecido alguna de las siguientes enfermedades:<br /><br />

        <table class="tabla">
	       <tr>
                  <th style="width:100px;">Enfermedades</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Diabetes</td>
                    <td><?php echo ($Datos_Formato['Diabetes'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Diabetes'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_1']; ?></td>
                  </tr>
                  <tr>
                    <td>Cardiopatías</td>
                    <td><?php echo ($Datos_Formato['Cardiopatias'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Cardiopatias'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_2']; ?></td>
                  </tr>
                  <tr>
                    <td>Hipertensión</td>
                    <td><?php echo ($Datos_Formato['Hipertension'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hipertension'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_3']; ?></td>
                  </tr>
                  <tr>
                    <td>Obesidad</td>
                    <td><?php echo ($Datos_Formato['Obesidad'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Obesidad'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_4']; ?></td>
                  </tr>
                  <tr>
                    <td>Cáncer</td>
                    <td><?php echo ($Datos_Formato['Cancer'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Cancer'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_5']; ?></td>
                  </tr>
                  <tr>
                    <td>Sífilis</td>
                    <td><?php echo ($Datos_Formato['Sifilis'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Sifilis'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_6']; ?></td>
                  </tr>
                  <tr>
                    <td>Anomalías Congénitas</td>
                    <td><?php echo ($Datos_Formato['Anomalias_Congenitas'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Anomalias_Congenitas'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_7']; ?></td>
                  </tr>
                  <tr>
                    <td>Trastornos Hemáticos</td>
                    <td><?php echo ($Datos_Formato['Trastornos_Hematicos'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Trastornos_Hematicos'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_8']; ?></td>
                  </tr>
                  <tr>
                    <td>Otros</td>
                    <td><?php echo ($Datos_Formato['Otros'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Otros'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_9']; ?></td>
                  </tr>
              </table>

              <h5>Antecedentes Personales No Patológicos</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;"></th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Habitación</td>
                    <td><?php echo ($Datos_Formato['Habitacion'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Habitacion'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_10']; ?></td>
                  </tr>
                  <tr>
                    <td>Alimentación</td>
                    <td><?php echo ($Datos_Formato['Alimentacion'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Alimentacion'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_11']; ?></td>
                  </tr>
                  <tr>
                    <td>Higiene</td>
                    <td><?php echo ($Datos_Formato['Higiene'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Higiene'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_12']; ?></td>
                  </tr>
                  <tr>
                    <td>Alcoholismo</td>
                    <td><?php echo ($Datos_Formato['Alcoholismo'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Alcoholismo'] == "2" ? "checked":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_13']; ?></td>
                  </tr>
                  <tr>
                    <td>Tabaquismo</td>
                    <td><?php echo ($Datos_Formato['Tabaquismo'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Tabaquismo'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_14']; ?></td>
                  </tr>
                  <tr>
                    <td>Toxicomanía</td>
                    <td><?php echo ($Datos_Formato['Toxicomania'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Toxicomania'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_15']; ?></td>
                  </tr>
              </table>

	      <h5>Antecedentes Personales Patológicos</h5>
              Padece o ha padecido alguna de las siguientes enfermedades:<br /><br />
              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Diabetes</td>
                    <td><?php echo ($Datos_Formato['Diabetes_2'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Diabetes_2'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_16']; ?></td>
                  </tr>
                  <tr>
                    <td>Hipertensión</td>
                    <td><?php echo ($Datos_Formato['Hipertension_2'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hipertension_2'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_17']; ?></td>
                  </tr>
                  <tr>
                    <td>Gastritis</td>
                    <td><?php echo ($Datos_Formato['Gastritis'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Gastritis'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_18']; ?></td>
                  </tr>
                  <tr>
                    <td>Hepatitis</td>
                    <td><?php echo ($Datos_Formato['Hepatitis'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hepatitis'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_19']; ?></td>
                  </tr>
                  <tr>
                    <td>Hipertiroidismo</td>
                    <td><?php echo ($Datos_Formato['Hipertiroidismo'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hipertiroidismo'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_20']; ?></td>
                  </tr>
                  <tr>
                    <td>Hemorragias</td>
                    <td><?php echo ($Datos_Formato['Hemorragias'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hemorragias'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_21']; ?></td>
                  </tr>
                  <tr>
                    <td>Epilepsia</td>
                    <td><?php echo ($Datos_Formato['Epilepsia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Epilepsia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_22']; ?></td>
                  </tr>
                  <tr>
                    <td>Alergias</td>
                    <td><?php echo ($Datos_Formato['Alergias'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Alergias'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_23']; ?></td>
                  </tr>
                  <tr>
                    <td>Transfusiones</td>
                    <td><?php echo ($Datos_Formato['Transfuciones'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Transfuciones'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_24']; ?></td>
                  </tr>
                  <tr>
                    <td>Quirurgíco</td>
                    <td><?php echo ($Datos_Formato['Quirurgico'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Quirurgico'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_25']; ?></td>
                  </tr>
                  <tr>
                    <td>Otros</td>
                    <td><?php echo ($Datos_Formato['Otros_2'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Otros_2'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_26']; ?></td>
                  </tr>
              </table>

	      <h5>Antecedentes Gineco-Obstetricos</h5>

	      <table class="tabla">
                <tr>
                  <th style="width:100px;"></th>
                  <th>Si</th>
                  <th>No</th>
                  <th></th>
                </tr>
                  <tr>
                    <td>Menarca</td>
                    <td><?php echo ($Datos_Formato['Menarca'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Menarca'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_27']; ?></td>
                  </tr>
                  <tr>
                    <td>Ritmo</td>
                    <td><?php echo ($Datos_Formato['Ritmo'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Ritmo'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_28']; ?></td>
                  </tr>
                  <tr>
                    <td>Usa</td>
                    <td><?php echo ($Datos_Formato['Usa'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Usa'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_29']; ?></td>
                  </tr>
                  <tr>
                    <td>Gesta</td>
                    <td><?php echo ($Datos_Formato['Gesta'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Gesta'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_30']; ?></td>
                  </tr>
                  <tr>
                    <td>Para</td>
                    <td><?php echo ($Datos_Formato['Para'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Para'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_31']; ?></td>
                  </tr>
                  <tr>
                    <td>Aborto</td>
                    <td><?php echo ($Datos_Formato['Aborto'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Aborto'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_32']; ?></td>
                  </tr>
                  <tr>
                    <td>Cesárea</td>
                    <td><?php echo ($Datos_Formato['Cesarea'] == "1" ? "X":""); ?></td>
                    <td> <?php echo ($Datos_Formato['Cesarea'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_33']; ?></td>
                  </tr>
                  <tr>
                    <td>Fur</td>
                    <td><?php echo ($Datos_Formato['Fur'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Fur'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_34']; ?></td>
                  </tr>
                  <tr>
                    <td>Menopausia</td>
                    <td><?php echo ($Datos_Formato['Menopausia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Menopausia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_35']; ?></td>
                  </tr>
                  <tr>
                    <td>Doc</td>
                    <td><?php echo ($Datos_Formato['Doc'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Doc'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_36']; ?></td>
                  </tr>
                  <tr>
                    <td>Método de Planificación Familiar</td>
                    <td><?php echo ($Datos_Formato['Planificacion_Familiar'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Planificacion_Familiar'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_37']; ?></td>
                  </tr>
              </table>

	      <h4>Aparatos</h4>

	      <h5>Aparato Digestivo</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Anorexia</td>
                    <td><?php echo ($Datos_Formato['Anorexia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Anorexia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_38']; ?></td>
                  </tr>
                  <tr>
                    <td>Polifagia</td>
                    <td><?php echo ($Datos_Formato['Polifagia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Polifagia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_39']; ?></td>
                  </tr>
                  <tr>
                    <td>Polidipsia</td>
                    <td><?php echo ($Datos_Formato['Polidipsia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Polidipsia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_40']; ?></td>
                  </tr>
                  <tr>
                    <td>Halitosis</td>
                    <td><?php echo ($Datos_Formato['Halitosis'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Halitosis'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_41']; ?></td>
                  </tr>
                  <tr>
                    <td>Sialorrea</td>
                    <td><?php echo ($Datos_Formato['Sialorrea'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Sialorrea'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_42']; ?></td>
                  </tr>
                  <tr>
                    <td>Xerostomía</td>
                    <td><?php echo ($Datos_Formato['Xerostomia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Xerostomia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_43']; ?></td>
                  </tr>
                  <tr>
                    <td>Disfagia</td>
                    <td><?php echo ($Datos_Formato['Disfagia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Disfagia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_44']; ?></td>
                  </tr>
                  <tr>
                    <td>Odinofagia</td>
                    <td><?php echo ($Datos_Formato['Odinofagia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Odinofagia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_45']; ?></td>
                  </tr>
                  <tr>
                    <td>Dolor Abdominal</td>
                    <td><?php echo ($Datos_Formato['Dolor_Abdominal'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Dolor_Abdominal'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_46']; ?></td>
                  </tr>
                  <tr>
                    <td>Hematemesis</td>
                    <td><?php echo ($Datos_Formato['Hematemesis'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hematemesis'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_47']; ?></td>
                  </tr>
                  <tr>
                    <td>Pirosis</td>
                    <td><?php echo ($Datos_Formato['Pirosis'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Pirosis'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_48']; ?></td>
                  </tr>
                  <tr>
                    <td>Vómito</td>
                    <td><?php echo ($Datos_Formato['Vomito'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Vomito'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_49']; ?></td>
                  </tr>
                  <tr>
                    <td>Flatulencia</td>
                    <td><?php echo ($Datos_Formato['Flatulencia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Flatulencia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_50']; ?></td>
                  </tr>
                  <tr>
                    <td>Ictericia</td>
                    <td><?php echo ($Datos_Formato['Ictericia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Ictericia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_51']; ?></td>
                  </tr>
                  <tr>
                    <td>Rectorragia</td>
                    <td><?php echo ($Datos_Formato['Rectorragia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Rectorragia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_52']; ?></td>
                  </tr>
                  <tr>
                    <td>Melena</td>
                    <td><?php echo ($Datos_Formato['Melena'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Melena'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_53']; ?></td>
                  </tr>
                  <tr>
                    <td>Prurito Anal</td>
                    <td><?php echo ($Datos_Formato['Prurito_Anal'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Prurito_Anal'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_54']; ?></td>
                  </tr>
              </table>

	      <h4>Aparato Cardiovascular</h4>
              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Dolor Precordial</td>
                    <td><?php echo ($Datos_Formato['Dolor_Precordial'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Dolor_Precordial'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_55']; ?></td>
                  </tr>
                  <tr>
                    <td>Disnea</td>
                    <td><?php echo ($Datos_Formato['Disnea'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Disnea'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_56']; ?></td>
                  </tr>
                  <tr>
                    <td>Ortopnea</td>
                    <td><?php echo ($Datos_Formato['Ortopnea'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Ortopnea'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_57']; ?></td>
                  </tr>
                  <tr>
                    <td>Acufenos</td>
                    <td><?php echo ($Datos_Formato['Acufenos'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Acufenos'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_58']; ?></td>
                  </tr>
                  <tr>
                    <td>Forfenos</td>
                    <td><?php echo ($Datos_Formato['Forfenos'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Forfenos'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_59']; ?></td>
                  </tr>
                  <tr>
                    <td>Vértigos</td>
                    <td><?php echo ($Datos_Formato['Vertigos'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Vertigos'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_60']; ?></td>
                  </tr>
                  <tr>
                    <td>Cefalea</td>
                    <td><?php echo ($Datos_Formato['Cefalea'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Cefalea'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_61']; ?></td>
                  </tr>
                  <tr>
                    <td>Palpitaciones</td>
                    <td><?php echo ($Datos_Formato['Palpitaciones'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Palpitaciones'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_62']; ?></td>
                  </tr>
                  <tr>
                    <td>Parestesias</td>
                    <td><?php echo ($Datos_Formato['Parestesias'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Parestesias'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_63']; ?></td>
                  </tr>
                  <tr>
                    <td>Cianosis</td>
                    <td><?php echo ($Datos_Formato['Cianosis'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Cianosis'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_64']; ?></td>
                  </tr>
                  <tr>
                    <td>Edema</td>
                    <td><?php echo ($Datos_Formato['Edema'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Edema'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_65']; ?></td>
                  </tr>
                  <tr>
                    <td>Bochorno</td>
                    <td><?php echo ($Datos_Formato['Bochorno'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Bochorno'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_66']; ?></td>
                  </tr>
                  <tr>
                    <td>Lipotimias</td>
                    <td><?php echo ($Datos_Formato['Lipotimias'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Lipotimias'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_67']; ?></td>
                  </tr>
                  <tr>
                    <td>Cambios en la Piel</td>
                    <td><?php echo ($Datos_Formato['Cambios_Piel'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Cambios_Piel'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_68']; ?></td>
                  </tr>
                  <tr>
                    <td>Epistaxis</td>
                    <td><?php echo ($Datos_Formato['Epistaxis'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Epistaxis'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_69']; ?></td>
                  </tr>
              </table>

	      <h5>Aparato Respiratorio</h5>
              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Disnea</td>
                    <td><?php echo ($Datos_Formato['Disnea_2'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Disnea_2'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_70']; ?></td>
                  </tr>
                  <tr>
                    <td>Tos</td>
                    <td><?php echo ($Datos_Formato['Tos'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Tos'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_71']; ?></td>
                  </tr>
                  <tr>
                    <td>Hemoptisis</td>
                    <td><?php echo ($Datos_Formato['Hemoptisis'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hemoptisis'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_72']; ?></td>
                  </tr>
                  <tr>
                    <td>Sibilancias</td>
                    <td><?php echo ($Datos_Formato['Sibilancias'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Sibilancias'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_73']; ?></td>
                  </tr>
                  <tr>
                    <td>Dolor</td>
                    <td><?php echo ($Datos_Formato['Dolor'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Dolor'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_74']; ?></td>
                  </tr>
                  <tr>
                    <td>Respiración Bucal o Nasal</td>
                    <td><?php echo ($Datos_Formato['Respiracion_Bucal_Nasal'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Respiracion_Bucal_Nasal'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_75']; ?></td>
                  </tr>
              </table>

	      <h5>Aparato Genitourinarios</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Nictamero</td>
                    <td><?php echo ($Datos_Formato['Nictamero'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Nictamero'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_76']; ?></td>
                  </tr>
                  <tr>
                    <td>Disuria</td>
                    <td><?php echo ($Datos_Formato['Disuria'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Disuria'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_77']; ?></td>
                  </tr>
                  <tr>
                    <td>Poliuria</td>
                    <td><?php echo ($Datos_Formato['Poliuria'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Poliuria'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_78']; ?></td>
                  </tr>
                  <tr>
                    <td>Poliarquiuria</td>
                    <td><?php echo ($Datos_Formato['Poliarquiuria'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Poliarquiuria'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_79']; ?></td>
                  </tr>
                  <tr>
                    <td>Hematuria</td>
                    <td><?php echo ($Datos_Formato['Hematuria'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hematuria'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_80']; ?></td>
                  </tr>
                  <tr>
                    <td>Algiuria</td>
                    <td><?php echo ($Datos_Formato['Algiuria'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Algiuria'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_81']; ?></td>
                  </tr>
                  <tr>
                    <td>En caso de Sexo Femenino (Leucorrea, Prurito Vulvar, Dispareunia)</td>
                    <td><?php echo ($Datos_Formato['Caso_Femenino'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Caso_Femenino'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_82']; ?></td>
                  </tr>
                  <tr>
                    <td>En caso de Sexo Masculino (Secreciones)</td>
                    <td><?php echo ($Datos_Formato['Caso_Masculino'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Caso_Masculino'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_83']; ?></td>
                  </tr>
              </table>

	      <h4>Sistemas</h4>

              <h5>Sistema Hemático y Linfático</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Fiebre de Larga Duración sin Causa</td>
                    <td><?php echo ($Datos_Formato['Fiebre_Larga'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Fiebre_Larga'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_84']; ?></td>
                  </tr>
                  <tr>
                    <td>Palidez</td>
                    <td><?php echo ($Datos_Formato['Palidez'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Palidez'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_85']; ?></td>
                  </tr>
                  <tr>
                    <td>Edema</td>
                    <td><?php echo ($Datos_Formato['Edema_2'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Edema_2'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_86']; ?></td>
                  </tr>
                  <tr>
                    <td>Hemorragia</td>
                    <td><?php echo ($Datos_Formato['Hemorragia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hemorragia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_87']; ?></td>
                  </tr>
                  <tr>
                    <td>Petequias</td>
                    <td><?php echo ($Datos_Formato['Petequias'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Petequias'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_88']; ?></td>
                  </tr>
                  <tr>
                    <td>Equimosis</td>
                    <td><?php echo ($Datos_Formato['Equimosis'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Equimosis'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_89']; ?></td>
                  </tr>
                  <tr>
                    <td>Hematomas</td>
                    <td><?php echo ($Datos_Formato['Hematomas'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hematomas'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_90']; ?></td>
                  </tr>
              </table>

	      <h5>Sistema Endócrino</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Pérdida o Aumento de Peso</td>
                    <td><?php echo ($Datos_Formato['Perdida_Aumento_Peso'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Perdida_Aumento_Peso'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_91']; ?></td>
                  </tr>
                  <tr>
                    <td>Nerviosismo</td>
                    <td><?php echo ($Datos_Formato['Nerviosismo'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Nerviosismo'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_92']; ?></td>
                  </tr>
                  <tr>
                    <td>Alteraciones en la Menstruación</td>
                    <td><?php echo ($Datos_Formato['Alteraciones_Menstruacion'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Alteraciones_Menstruacion'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_93']; ?></td>
                  </tr>
                  <tr>
                    <td>Pilificación</td>
                    <td><?php echo ($Datos_Formato['Pilificacion'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Pilificacion'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_94']; ?></td>
                  </tr>
              </table>

	      <h5>Sistema Nervioso</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Convulsiones</td>
                    <td><?php echo ($Datos_Formato['Convulsiones'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Convulsiones'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_95']; ?></td>
                  </tr>
                  <tr>
                    <td>Cefaleas</td>
                    <td><?php echo ($Datos_Formato['Cefaleas'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Cefaleas'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_96']; ?></td>
                  </tr>
                  <tr>
                    <td>Parestesias</td>
                    <td><?php echo ($Datos_Formato['Parestesias_2'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Parestesias_2'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_97']; ?></td>
                  </tr>
                  <tr>
                    <td>Anestesias</td>
                    <td><?php echo ($Datos_Formato['Anestesias'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Anestesias'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_98']; ?></td>
                  </tr>
                  <tr>
                    <td>Paresias</td>
                    <td><?php echo ($Datos_Formato['Paresias'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Paresias'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_99']; ?></td>
                  </tr>
                  <tr>
                    <td>Parálisis</td>
                    <td><?php echo ($Datos_Formato['Paralisis'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Paralisis'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_100']; ?></td>
                  </tr>
                  <tr>
                    <td>Vértigos</td>
                    <td><?php echo ($Datos_Formato['Vertigos_2'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Vertigos_2'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_101']; ?></td>
                  </tr>
                  <tr>
                    <td>Hiperestesias</td>
                    <td><?php echo ($Datos_Formato['Hiperestesias'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hiperestesias'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_102']; ?></td>
                  </tr>
                  <tr>
                    <td>Angustia</td>
                    <td><?php echo ($Datos_Formato['Angustia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Angustia'] == "21" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_103']; ?></td>
                  </tr>
                  <tr>
                    <td>Ansiedad</td>
                    <td><?php echo ($Datos_Formato['Ansiedad'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Ansiedad'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_104']; ?></td>
                  </tr>
              </table>

	      <h4>Órganos de los Sentidos</h4>

              <h5>Oídos</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Otalgias</td>
                    <td><?php echo ($Datos_Formato['Otalgias'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Otalgias'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_105']; ?></td>
                  </tr>
                  <tr>
                    <td>Otorrea</td>
                    <td><?php echo ($Datos_Formato['Otorrea'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Otorrea'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_106']; ?></td>
                  </tr>
                  <tr>
                    <td>Otorragia</td>
                    <td><?php echo ($Datos_Formato['Otorragia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Otorragia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_107']; ?></td>
                  </tr>
                  <tr>
                    <td>Acufenos</td>
                    <td><?php echo ($Datos_Formato['Acufenos'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Acufenos'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_108']; ?></td>
                  </tr>
                  <tr>
                    <td>Vértigos</td>
                    <td><?php echo ($Datos_Formato['Vertigos_3'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Vertigos_3'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_109']; ?></td>
                  </tr>
              </table>

	      <h5>Ojos</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Fosfenos</td>
                    <td><?php echo ($Datos_Formato['Fosfenos'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Fosfenos'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_110']; ?></td>
                  </tr>
                  <tr>
                    <td>Agudeza Visual</td>
                    <td><?php echo ($Datos_Formato['Agudeza_Visual'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Agudeza_Visual'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_111']; ?></td>
                  </tr>
                  <tr>
                    <td>Fotofobia</td>
                    <td><?php echo ($Datos_Formato['Fotofobia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Fotofobia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_112']; ?></td>
                  </tr>
                  <tr>
                    <td>Lagrimeo</td>
                    <td><?php echo ($Datos_Formato['Lagrimeo'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Lagrimeo'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_113']; ?></td>
                  </tr>
                  <tr>
                    <td>Secreciones</td>
                    <td><?php echo ($Datos_Formato['Secreciones'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Secreciones'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_114']; ?></td>
                  </tr>
              </table>

	      <h5>Nariz</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Parosmia</td>
                    <td><?php echo ($Datos_Formato['Parosmia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Parosmia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_115']; ?></td>
                  </tr>
                  <tr>
                    <td>Hiperosmia</td>
                    <td><?php echo ($Datos_Formato['Hiperosmia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hiperosmia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_116']; ?></td>
                  </tr>
                  <tr>
                    <td>Secreciones</td>
                    <td><?php echo ($Datos_Formato['Secreciones_2'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Secreciones_2'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_117']; ?></td>
                  </tr>
                  <tr>
                    <td>Prurito</td>
                    <td><?php echo ($Datos_Formato['Prurito'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Prurito'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_118']; ?></td>
                  </tr>
                  <tr>
                    <td>Epistaxis</td>
                    <td><?php echo ($Datos_Formato['Epistaxis_2'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Epistaxis_2'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_119']; ?></td>
                  </tr>
                  <tr>
                    <td>Dolor Nasal</td>
                    <td><?php echo ($Datos_Formato['Dolor_Nasal'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Dolor_Nasal'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_120']; ?></td>
                  </tr>
              </table>

	      <h5>Gusto</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Hipergeusia</td>
                    <td><?php echo ($Datos_Formato['Hipergeusia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Hipergeusia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_121']; ?></td>
                  </tr>
                  <tr>
                    <td>Parageusia</td>
                    <td><?php echo ($Datos_Formato['Parageusia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Parageusia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_122']; ?></td>
                  </tr>
                  <tr>
                    <td>Ageusia</td>
                    <td><?php echo ($Datos_Formato['Ageusia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Ageusia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_123']; ?></td>
                  </tr>
                  <tr>
                    <td>Glosalgia</td>
                    <td><?php echo ($Datos_Formato['Glosalgia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Glosalgia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_124']; ?></td>
                  </tr>
                  <tr>
                    <td>Glosodinia</td>
                    <td><?php echo ($Datos_Formato['Glosodinia'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Glosodinia'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Observaciones_125']; ?></td>
                  </tr>
              </table>

	     <br />

	      <table>
		 <tr>
		    <td><strong> Exámenes de Laboratorio: </strong></td>
		    <td><?php echo $Datos_Formato['Examen_Laboratorio']; ?></td>
              </tr>
              <tr>
                    <td><strong> Terapéutica Empleada: </strong></td>
		    <td><?php echo $Datos_Formato['Terapeutica']; ?></td>
	      </tr>
	      </table> 

	      <h4>Exploración Física</h4>

              <table class="tabla">
                <tr>
                  <th style="width:100px;">Signos Vitales</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
		    <td>Frecuencia Cardiaca</td>
                    <td><?php echo $Datos_Formato['Frecuencia_Cardiaca']; ?></td>
                  </tr>
                  <tr>
                    <td>Temperatura</td>
                    <td><?php echo $Datos_Formato['Temperatura']; ?></td>
                  </tr>
                  <tr>
                    <td>Pulso</td>
                    <td><?php echo $Datos_Formato['Pulso']; ?></td>
                  </tr>
                  <tr>
                    <td>Respiración</td>
                    <td><?php echo $Datos_Formato['Respiracion']; ?></td>
                  </tr>
                  <tr>
                    <td>Tensión Arterial</td>
                    <td><?php echo $Datos_Formato['Tension_Arterial']; ?></td>
                  </tr>
              </table>

	      <br />

	      <table>
		  <tr>
		    <td><strong>Somatometría:</strong></td>
		    <td><strong>Peso:</strong></td>
		    <td><?php echo ($Datos_Formato['Somatometria_Peso']!="" ? $Datos_Formato['Somatometria_Peso']:"0"); ?> Kgs.</td>
		    <td><strong>Estatura:</strong></td>
		    <td><?php echo ($Datos_Formato['Somatometria_Estatura']!="" ? $Datos_Formato['Somatometria_Estatura']:"0"); ?> mts.</td>
		  </tr>
		</table>

	     <h5>Cabeza</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;">Cráneo</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Tamaño</td>
                    <td><?php echo $Datos_Formato['Craneo_Tamano']; ?></td>
                  </tr>
                  <tr>
                    <td>Contorno</td>
                    <td><?php echo $Datos_Formato['Craneo_Contorno']; ?></td>
                  </tr>
                  <tr>
                    <td>Implantación de Cabello</td>
                    <td><?php echo $Datos_Formato['Craneo_Implantacion_Cabello']; ?></td>
                  </tr>
                  <tr>
                    <td>Deformidades</td>
                    <td><?php echo $Datos_Formato['Craneo_Deformidades']; ?></td>
                  </tr>
                  <tr>
                    <td>Exóstosis</td>
                    <td><?php echo $Datos_Formato['Craneo_Exostosis']; ?></td>
                  </tr>
                  <tr>
                    <td>Endóstosis</td>
                    <td><?php echo $Datos_Formato['Craneo_Endostosis']; ?></td>
                  </tr>
              </table>

	      <br />

	      <table class="tabla">
                <tr>
                  <th style="width:100px;">Cara</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Expresión Facial</td>
                    <td><?php echo $Datos_Formato['Cara_Expresion_Facial']; ?></td>
                  </tr>
                  <tr>
                    <td>Simetría</td>
                    <td><?php echo $Datos_Formato['Cara_Simetria']; ?></td>
                  </tr>
                  <tr>
                    <td>Movimientos Involuntarios</td>
                    <td><?php echo $Datos_Formato['Cara_Movimientos_Involuntarios']; ?></td>
                  </tr>
                  <tr>
                    <td>Edemas</td>
                    <td><?php echo $Datos_Formato['Cara_Edemas']; ?></td>
                  </tr>
                  <tr>
                    <td>Masas</td>
                    <td><?php echo $Datos_Formato['Cara_Masas']; ?></td>
                  </tr>
              </table>

	      <br />

	       <table class="tabla">
                <tr>
                  <th style="width:100px;"></th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Oídos</td>    
                    <td><?php echo $Datos_Formato['Oidos']; ?></td>
                  </tr>
                  <tr>
                    <td>Ojos</td>
                    <td><?php echo $Datos_Formato['Ojos']; ?></td>
                  </tr>
                  <tr>
                    <td>Nariz</td>
                    <td><?php echo $Datos_Formato['Nariz']; ?></td>
                  </tr>
              </table>

	     <br />

	     <table class="tabla">
                  <tr>
                    <th rowspan="2" style="width:210px;">¿Ha tenido experiencia con Anestésicos Bucales?</th>
                    <th>Sí</th>
                    <th>No</th>
                    <th>¿Cuál?</th>
                  </tr>
                  <tr>
                    <td><?php echo ($Datos_Formato['Anestesicos_Bucales'] == "1" ? "X":""); ?></td>
                    <td><?php echo ($Datos_Formato['Anestesicos_Bucales'] == "2" ? "X":""); ?></td>
                    <td><?php echo $Datos_Formato['Pregunta_1']; ?></td>
                  </tr>
              </table>

	      <h5>Exploración de la Región Oral</h5>

              <strong>Cavidad Oral</strong>
              <p>(Forma, Tamaño, Consistencia,Hidratación, Coloración, Sensibilidad, Movilidad, Simetría y Patologías).<br />
              NOTA: debe de ser explorado en cada una de las siguientes estructuras, además de lo que se indica individualmente.</p>
								       
	      <table>
		<tr>
		  <td><strong>Región Anterior: Labios (Frenillos) </strong></td>
		</tr>
		<tr>
                  <td><?php echo $Datos_Formato['Region_Anterior']; ?></td>
	        </tr>
	        <tr>
                  <td><strong>Región Lateral: Mejillas o Carrillos (Músculos Masticadores) </strong></td>
		</tr>
		<tr>
                 <td><?php echo $Datos_Formato['Region_Lateral']; ?></td>
		</tr>
		<tr>						   
                  <td><strong>Carrillos o Mejillas (Conducto de Stenon) </strong></td>
                </tr>
		<tr>						   
		  <td><?php echo $Datos_Formato['Region_Mejillas']; ?></td>
                </tr>
                <tr>
                  <td><strong>Región Superior: Paladar Duro </strong></td>
		</tr>
                <tr>						
                 <td><?php echo $Datos_Formato['Paladar_Duro']; ?></td>
                </tr>
                <tr>
                  <td><strong>Paladar Blando </strong></td>
		</tr>
                <tr>  						   
                  <td><?php echo $Datos_Formato['Paladar_Blando']; ?></td>
                </tr>
                <tr>
                  <td><strong>Región Inferior: Lengua (Papilas, Fisuras) </strong></td>
                </tr>
                <tr>
                  <td><?php echo $Datos_Formato['Region_Inferior']; ?></td>
                </tr>
                <tr>
                  <td><strong>Piso de Boca: (Conductos de Wharton, Batholin, Frenillo) </strong></td>
                </tr>
                <tr>
                  <td><?php echo $Datos_Formato['Piso_Boca']; ?></td>
                </tr>
                <tr>
                  <td><strong>Región Anterior Faríngea: Pilar Anterior </strong></td>
               </tr>
	       <tr>							 
                  <td><?php echo $Datos_Formato['Pilar_Anterior']; ?></td>
               <tr>
               </tr>
                  <td><strong>Pilar Posterior </strong></td>
              </tr>
              <tr>
                  <td><?php echo $Datos_Formato['Pilar_Posterior']; ?></td>
              </tr>
              <tr>
                 <td><strong>Amígdalas </strong></td>
              </tr>
              <tr>
                 <td><?php echo $Datos_Formato['Amigdalas']; ?></td>
              </tr>
              <tr>
                <td><strong>Farínge </strong></td>
              </tr>
              <tr>
                <td><?php echo $Datos_Formato['Faringe']; ?></td>
              </tr>
              <tr>
                <td><strong>Región Gingival: Encía Libre o Marginal (Abscesos Gingivales, Gingivorragias) </strong></td>
              </tr>
              <tr>
                <td><?php echo $Datos_Formato['Region_Gingival']; ?></td>
              </tr>
              <tr>
                <td><strong>Encía Insertada o Adherida (Abscesos Periodontales, Bolsas Periodontales) </strong></td>
              </tr>
              <tr>
                <td><?php echo $Datos_Formato['Encia_Insertada_Adherida']; ?></td>
              </tr>
              <tr>
                <td><strong>Mucosa o Encía Alveolar </strong></td>
              </tr>
              <tr>
                <td><?php echo $Datos_Formato['Mucosa']; ?></td>
              </tr>
              <tr>
                <td><strong>Proceso Alveolar </strong></td>
              </tr>
              <tr>
                <td><?php echo $Datos_Formato['Proceso_Alveolar']; ?></td>
              </tr>
          </table>

          <h5>Glándulas Salivales</h5>

          <table class="tabla">
                <tr>
                  <th style="width:150px;">Dolor</th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Aumento de Volumen</td>
                    <td><?php echo $Datos_Formato['Aumento_Volumen']; ?></td>
                  </tr>
                  <tr>
                    <td>Masas</td>
                    <td><?php echo $Datos_Formato['Masas']; ?></td>
                  </tr>
                  <tr>
                    <td>Cantidad de Saliva</td>
                    <td><?php echo $Datos_Formato['Cantidad_Saliva']; ?></td>
                  </tr>
                  <tr>
                    <td>Calidad de Saliva</td>
                    <td><?php echo $Datos_Formato['Cantidad_Saliva']; ?></td>
                  </tr>
              </table>

              <h5> Articulación Temporomandibular </h5>

              <table class="tabla">
                <tr>
                  <th>Auscultación de la ATM</th>
                  <th>ATM Derecha </th>
                  <th>ATM Izquierda </th>
                </tr>
                  <tr>
                    <td>Palpación ATM</td>
                    <td><?php echo $Datos_Formato['Palpitacion_ATM_I']; ?></td>
                    <td><?php echo $Datos_Formato['Palpitacion_ATM_D']; ?></td>
                  </tr>
                  <tr>
                    <td>Apertura y Cierre</td>
                    <td><?php echo $Datos_Formato['Apertura_Cierre_I']; ?></td>
                    <td><?php echo $Datos_Formato['Apertura_Cierre_D']; ?></td>
                  </tr>
                  <tr>
                    <td>Protrusiva</td>
                    <td><?php echo $Datos_Formato['Protrusiva_I']; ?></td>
                    <td><?php echo $Datos_Formato['Protrusiva_D']; ?></td>
                  </tr>
                  <tr>
                    <td>Retrusiva</td>
                    <td><?php echo $Datos_Formato['Retrusiva_I']; ?></td>
                    <td><?php echo $Datos_Formato['Retrusiva_D']; ?></td>
                  </tr>
                  <tr>
                    <td>Lateralidades</td>
                    <td><?php echo $Datos_Formato['Lateralidades_I']; ?></td>
                    <td><?php echo $Datos_Formato['Lateralidades_D']; ?></td>
                  </tr>
                  <tr>
                    <td>Lado de Trabajo</td>
                    <td><?php echo $Datos_Formato['Lado_Trabajo_I']; ?></td>
                    <td><?php echo $Datos_Formato['Lado_Trabajo_D']; ?></td>
                  </tr>
                  <tr>
                    <td>Lado de Balance</td>
                    <td><?php echo $Datos_Formato['Lado_Balance_I']; ?></td>
                    <td><?php echo $Datos_Formato['Lado_Balance_D']; ?></td>
                  </tr>
                  <tr>
                    <td rowspan="4" style="padding-top:75px;">Exploración de Músculo de Masticación:</td>
                    <td>Temporal</td>
                    <td><?php echo $Datos_Formato['Temporal']; ?></td>
                  </tr>
                  <tr>
                    <td>Masetero</td>
                    <td><?php echo $Datos_Formato['Masetero']; ?></td>
                  </tr>
                  <tr>
                    <td>Pterigoideo Externo</td>
                    <td><?php echo $Datos_Formato['Pterigoideo_Externo']; ?></td>
                  </tr>
                  <tr>
                    <td>Pterigoideo Interno</td>
                    <td><?php echo $Datos_Formato['Pterigoideo_Interno']; ?></td>
                  </tr>
              </table>

                 <br />

                  <strong>Observaciones</strong><br />
                  <?php echo $Datos_Formato['Observaciones_126']; ?>

            <h3>Odontograma</h3>
               
            <h4>Permanentes</h4>

              <table>
	      <tr>
		<td>Diente Ausente (<strong>A</strong>)</td>
		<td>Extracción (<strong>X</strong>)</td>
                <td>Caries (<strong>C</strong>)</td>
		<td>Dolor (<strong>D</strong>)</td>             
		<td>Restauración (<strong>R</strong>)</td>
		<td>Prótesis (<strong>PR</strong>)</td>
                <td>Maloclusión (<strong>#</strong>)</td>
                <td>Movilidad (<strong>M</strong>)</td>
              </tr>
	      </table>

              <br />

              <table class="tabla">                           
                  <tr>
                    <th colspan="3">18</th>
                    <th colspan="3">17</th>
                    <th colspan="3">16</th>
                    <th colspan="3">15</th>
                    <th colspan="3">14</th>
                    <th colspan="3">13</th>
                    <th colspan="3">12</th>
                    <th colspan="3">11</th>
                    <th></th>
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
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_18']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>  
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_17']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_16']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_15']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_14']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_13']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_12']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_11']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_21']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_22']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_23']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_24']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_25']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_26']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_27']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_28']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>                      
                  </tr>

                  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_18']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_17']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_16']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_15']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_14']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_13']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_12']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_11']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_21']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_22']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_23']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_24']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_25']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_26']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_27']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_28']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    
                 </tr> 

		  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_18']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_17']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_16']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_15']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_14']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_13']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":"&nbsp;"); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_12']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_11']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_21']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_22']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_23']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_24']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_25']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_26']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_27']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_28']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>
                 </tr> 

		 <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_18']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_17']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":"&nbsp;"); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_16']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_15']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_14']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_13']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_12']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_11']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_21']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_22']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_23']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_24']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_25']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_26']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_27']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_28']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		 </tr>
                 </table>

		<table class="tabla">                           
                  <tr>
                    <th colspan="3">48</th>
                    <th colspan="3">47</th>
                    <th colspan="3">46</th>
                    <th colspan="3">45</th>
                    <th colspan="3">44</th>
                    <th colspan="3">43</th>
                    <th colspan="3">42</th>
                    <th colspan="3">41</th>
                    <th></th>
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
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_48']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>  
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_47']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_46']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_45']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_44']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_43']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_42']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_41']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_31']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_32']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_33']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_34']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_35']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_36']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_37']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_38']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>                      
                  </tr>

                  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_48']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_47']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_46']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_45']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_44']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_43']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_42']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_41']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_31']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_32']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_33']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_34']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_35']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_36']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_37']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_38']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    
                 </tr> 

		  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_48']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_47']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_46']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_45']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_44']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_43']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":"&nbsp;"); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_42']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_41']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_31']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_32']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_33']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_34']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_35']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_36']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_37']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_38']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>
                 </tr> 

		 <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_48']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_47']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":"&nbsp;"); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_46']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_45']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_44']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_43']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_42']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_41']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_31']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_32']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_33']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_34']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_35']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_36']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_37']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_38']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		 </tr>
                 </table> 
    
      
    <h4>Temporales</h4>
      
    <table class="tabla">
        <tr>
                    <th colspan="3">55</th>
                    <th colspan="3">54</th>
                    <th colspan="3">53</th>
                    <th colspan="3">52</th>
                    <th colspan="3">51</th>
                    <th></th>
                    <th colspan="3">61</th>
                    <th colspan="3">62</th>
                    <th colspan="3">63</th>
                    <th colspan="3">64</th>
                    <th colspan="3">65</th>
                  </tr>
        <tr> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_55']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_54']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_53']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_52']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_51']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_61']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_62']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_63']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_64']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_65']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>                      
                  </tr>

                  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_55']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_54']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_53']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_52']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_51']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_61']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_62']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_63']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_64']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_65']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>
		    <td></td>
		        
        </tr> 
		  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_55']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_54']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_53']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":"&nbsp;"); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_52']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_51']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_61']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_62']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_63']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_64']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_65']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>
                 </tr> 

		 <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_55']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_54']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_53']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_52']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_51']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_61']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_62']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_63']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_64']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_65']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		 </tr>
                 </table>

		<table class="tabla">                           
                  <tr>
                    <th colspan="3">85</th>
                    <th colspan="3">84</th>
                    <th colspan="3">83</th>
                    <th colspan="3">82</th>
                    <th colspan="3">81</th>
                    <th></th>
                    <th colspan="3">71</th>
                    <th colspan="3">72</th>
                    <th colspan="3">73</th>
                    <th colspan="3">74</th>
                    <th colspan="3">75</th>
                  </tr>
                  <tr>
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_85']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_84']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_83']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_82']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_81']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_71']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_72']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_73']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_74']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_75']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>                      
                  </tr>

                  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_85']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_84']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_83']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_82']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_81']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_71']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_72']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_73']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_74']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_75']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>
        </tr>
        <tr>		
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_85']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_84']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_83']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":"&nbsp;"); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_82']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_81']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_71']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_72']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_73']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_74']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_75']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>
                 </tr> 

            <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_85']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_84']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_83']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_82']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_81']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_71']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_72']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_73']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_74']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_75']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    <td></td>
		 </tr>
    </table>

                 <h4>Exámenes Oclusal y Radiográfico</h4>

	         <strong>Examen Oclusal: </strong>
                 <?php echo ($Datos_Formato['Examen_Oclusal'] == "1" ? "Oclusión Normal":"Maloclusión"); ?> 

              <table class="tabla">
                  <tr>
                    <th style="width:100px;"></th>
                    <th><strong>Observaciones</strong></th>
                  </tr>
                  <tr>
                    <td>Abrasiones</td>
                    <td><?php echo $Datos_Formato['Abrasiones']; ?></td>
                  </tr>
                  <tr>
                    <td>Atriciones</td>
                    <td><?php echo $Datos_Formato['Atriciones']; ?></td>
                  </tr>
                  <tr>
                    <td>Apiñamiento</td>
                    <td><?php echo $Datos_Formato['Apinamiento']; ?></td>
                  </tr>
                  <tr>
                    <td>Mordida Cruzada</td>
                    <td><?php echo $Datos_Formato['Mordida_Cruzada']; ?></td>
                  </tr>
                  <tr>
                    <td>Malposiciones Individuales</td>
                    <td><?php echo $Datos_Formato['Malposiciones_Individuales']; ?></td>
                  </tr>
                  <tr>
                    <td>Diastemas</td>
                    <td><?php echo $Datos_Formato['Diastemas']; ?></td>
                  </tr>
                  <tr>
                    <td>Línea Media</td>
                    <td><?php echo $Datos_Formato['Linea_Media']; ?></td>
                  </tr>
                </table>

                <br />

                <table>
                  <tr>
                    <td><strong>Examen Radiográfico (Tipo de Radiografía, Zona, Fecha, Interpretación)</strong></td>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['Examen_Radiografico']; ?></td>
                  </tr>
                </table>

                <h5>Cuello</h5>

              <table class="tabla">
                <tr>
                  <th style="width:100px;"></th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Forma</td>
                    <td><?php echo $Datos_Formato['Cuello_Forma']; ?></td>
                  </tr>
                  <tr>
                    <td>Volumen</td>
                    <td><?php echo $Datos_Formato['Cuello_Volumen']; ?></td>
                  </tr>
                  <tr>
                    <td>Movimientos</td>
                    <td><?php echo $Datos_Formato['Cuello_Movimientos']; ?></td>
                  </tr>
                  <tr>
                    <td>Ganglios</td>
                    <td><?php echo $Datos_Formato['Cuello_Ganglios']; ?></td>
                  </tr>
                  <tr>
                    <td>Tráquea</td>
                    <td><?php echo $Datos_Formato['Cuello_Traquea']; ?></td>
                  </tr>
                  <tr>
                    <td>Tiroides</td>
                    <td><?php echo $Datos_Formato['Cuello_Tiroides']; ?></td>
                  </tr>
                  <tr>
                    <td>Masas</td>
                    <td><?php echo $Datos_Formato['Cuello_Masas']; ?></td>
                  </tr>
                  <tr>
                    <td>Pulsos</td>
                    <td><?php echo $Datos_Formato['Cuello_Pulsos']; ?></td>
                  </tr>
                  <tr>
                    <td>Carotideos</td>
                    <td><?php echo $Datos_Formato['Cuello_Carotideos']; ?></td>
                  </tr>
                  <tr>
                    <td>Ingurgitación Yugular</td>
                    <td><?php echo $Datos_Formato['Cuello_Ingurgitacion_Yugular']; ?></td>
                  </tr>
              </table>

              <br />

              <table class="tabla">
                <tr>
                  <th style="width:100px;"></th>
                  <th>Observaciones</th>
                </tr>
                  <tr>
                    <td>Tórax</td>
                    <td><?php echo $Datos_Formato['Torax']; ?></td>
                  </tr>
                  <tr>
                    <td>Abdomen</td>
                    <td><?php echo $Datos_Formato['Abdomen']; ?></td>
                  </tr>
                  <tr>
                    <td>Miembro Superior e Inferior</td>
                    <td><?php echo $Datos_Formato['Miembro_Superior_Inferior']; ?></td>
                  </tr>
              </table>

              <br />
              <strong>Observaciones Médicas</strong><br />
              <?php echo $Datos_Formato['Observaciones_Medicas']; ?>

              <h4>Diagnóstico Bucal</h4>

              <table>
              <tr>
                <td><strong>Diagnóstico Bucal</strong></td>
                <td><?php echo $Datos_Formato['Diagnostico_Bucal']; ?></td>
              </tr>
              <tr>
                <td><strong>Pronóstico:</strong></td>
              </tr>
              <tr>
                <td>Favorable:</td>
              </tr>
              <tr>
                <td><?php echo $Datos_Formato['Pronostico_Favorable']; ?></td>
              </tr>
              <tr>
                <td>Desfavorable:</td>
              </tr>
              <tr>
                <td><?php echo $Datos_Formato['Pronostico_Desfavorable']; ?></td>
              </tr>
              <tr>
                <td>Reservado:</td>
              </tr>
              <tr>
                <td><?php echo $Datos_Formato['Pronostico_Reservado']; ?></td>
              </tr>
              <tr>
                <td>Porque:</td>
              </tr>
              <tr>
                <td><?php echo $Datos_Formato['Pronostico_Porque']; ?></td>
              </tr>
              <tr>
                <td>Para Quien:</td>
              </tr>
              <tr>
                <td><?php echo $Datos_Formato['Pronostico_Para_Quien']; ?></td>
              </tr>
              <tr>
                <td>Plan de Tratamiento</td>
              </tr>
              <tr>
                <td><?php echo $Datos_Formato['Pronostico_Plan_Tratamiento']; ?></td>
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
