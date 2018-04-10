<?php include("../header2.php"); ?>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Formato_Historia_Clinica_Endodoncia.php"); ?>

        <div class="span9">

        <h2>Formato de Historia Clínica de Endodoncia</h2>

        <div class="well">
            
        <form method="post" action="validacion_formatohistoriaclinicaendodoncia.php">
            
        <input type="hidden" id="historia_clinica" name="historia_clinica" value="<?php echo $_GET['formato']; ?>">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Síntomas Subjetivos</a></li>
            <li><a href="#tab3">Síntomas Objetivos</a></li>
            <li><a href="#tab4">Medios de Diagnóstico</a></li>
            <li><a href="#tab5">Examen Radiográfico</a></li>
            <li><a href="#tab6">Secuencia del Tratamiento</a></li>
            <li><a href="#tab7">Observaciones</a></li>
          </ul>
            
          <?php 
            $Formato_Historia_Clinica_Endodoncia = new Formato_Historia_Clinica_Endodoncia();

            $Formato_Historia_Clinica_Endodoncia->IdHistoriaClinicaEndodoncia = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Endodoncia->Obtener_Formato();

            //fecha de registro de la historia clinica

			$fecha_registro = $Datos_Formato['FechaRegistro'];
			$fecha_registro = date_create($fecha_registro);
			$fecha_registro = date_format($fecha_registro,'d-m-y');

			//calcular edad del paciente

			$dia=date('d');
			$mes=date('m');
			$ano=date('Y');

			$fecha_nacimiento = date_create($Datos_Formato['FechaNacimiento']);

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

          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <h2>Datos del Paciente</h2>
              <br>
              <input type="hidden" value="<?php echo $_GET['formato']; ?>" name="historia-clinica" id="historia-clinica">
              <div class="row"> 
                <div class="span4"> 
                  <label><strong>Nombre: </strong>
                  <?php echo $Datos_Formato['NombrePaciente'].' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></label>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span4"> <label><strong>Dirección: </strong> <?php echo $Datos_Formato['CallePaciente'].' '.$Datos_Formato['NumeroPaciente'].' '.$Datos_Formato['ColoniaPaciente'].' '.$Datos_Formato['PoblacionPaciente']; ?></label></div>
                  
                <div class="span3"> <label><strong>Teléfono:</strong> <?php echo $Datos_Formato['TelefonoPaciente']; ?></label> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span3.5"> <label><strong>Ocupación: </strong> <?php echo $Datos_Formato['OcupacionPaciente']; ?></label> </div>
                <div class="span3.5"> <label><strong>Edad: </strong> <?php echo $Edad; ?> <strong>Año(s).</strong></label></div>
              </div>
            </div><!-- fin tab1 -->

            <div class="tab-pane" id="tab2">
              <h3>Síntomas Subjetivos</h3>
              <br>
              <div class="row"> 
                <div class="span1"> <label><strong>Dolor: </strong></label> </div> 
                <div class="span1.5"> Presente <input type="radio" name="dolor" value="1" <?php echo ($Datos_Formato['Dolor'] == '1' ? "checked":""); ?>> </div>
                <div class="span1.5"> Ausente <input type="radio" name="dolor" value="2" <?php echo ($Datos_Formato['Dolor'] == '2' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row">
                <div class="span1.5"><label><strong>Tipo de Dolor: </strong></label></div>
                  <div class="span1.5"> <label>Espontáneo <input type="radio" id="dolor_tipo" name="dolor_tipo" value="1" <?php echo ($Datos_Formato['DolorTipo'] == '1' ? "checked":""); ?>></label></div>
                  <div class="span2"> <label>Provocado <input type="radio" id="dolor_tipo" name="dolor_tipo" value="2" <?php echo ($Datos_Formato['DolorTipo'] == '2' ? "checked":""); ?>></label></div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong>Provocado por: </strong></label> </div>
                <div class="span0.5"> Frío <input type="radio" id="dolor_provocado_por" name="dolor_provocado_por" value="1" <?php echo ($Datos_Formato['DolorProvocadoPor'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Calor <input type="radio" id="dolor_provocado_por" name="dolor_provocado_por" value="2" <?php echo ($Datos_Formato['DolorProvocadoPor'] == '2' ? "checked":""); ?>> </div>
                <div class="span0.5"> Dulce <input type="radio" id="dolor_provocado_por" name="dolor_provocado_por" value="3" <?php echo ($Datos_Formato['DolorProvocadoPor'] == '3' ? "checked":""); ?>> </div>
                <div class="span0.5"> Presión <input type="radio" id="dolor_provocado_por" name="dolor_provocado_por" value="4" <?php echo ($Datos_Formato['DolorProvocadoPor'] == '4' ? "checked":""); ?>> </div>
                <div class="span0.5"> Masticación <input type="radio" id="dolor_provocado_por" name="dolor_provocado_por" value="5" <?php echo ($Datos_Formato['DolorProvocadoPor'] == '5' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1"> <label><strong>Intensidad: </strong></label> </div> 
                <div class="span0.5"> Media <input type="radio" id="nivel_intensidad" name="nivel_intensidad" value="1" <?php echo ($Datos_Formato['NivelIntensidad'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Severa <input type="radio" id="nivel_intensidad" name="nivel_intensidad" value="2" <?php echo ($Datos_Formato['NivelIntensidad'] == '2' ? "checked":""); ?>> </div>
                <div class="span0.5"> Momentanea <input type="radio"  id="nivel_intensidad" name="nivel_intensidad" value="3" <?php echo ($Datos_Formato['NivelIntensidad'] == '3' ? "checked":""); ?>> </div>
                <div class="span0.5"> Continua <input type="radio" id="nivel_intensidad" name="nivel_intensidad" value="4" <?php echo ($Datos_Formato['NivelIntensidad'] == '4' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1"> <label><strong>Presentación: </strong></label> </div> 
                <div class="span0.5"> Intermitente <input type="radio" id="presentacion" name="presentacion" value="1" <?php echo ($Datos_Formato['Presentacion'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Localizado <input type="radio" id="presentacion" name="presentacion" value="2" <?php echo ($Datos_Formato['Presentacion'] == '2' ? "checked":""); ?>> </div>
                <div class="span0.5"> Difuso <input type="radio" id="presentacion" name="presentacion" value="3" <?php echo ($Datos_Formato['Presentacion'] == '3' ? "checked":""); ?>> </div>
                <div class="span0.5"> Irradiado <input type="radio" id="presentacion" name="presentacion" value="4" <?php echo ($Datos_Formato['Presentacion'] == '4' ? "checked":""); ?>> </div>
                <div class="span0.5"> Diurno <input type="radio" id="presentacion" name="presentacion" value="5" <?php echo ($Datos_Formato['Presentacion'] == '5' ? "checked":""); ?>> </div>
                <div class="span0.5"> Nocturno <input type="radio" id="presentacion" name="presentacion" value="6" <?php echo ($Datos_Formato['Presentacion'] == '6' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong>Duración: </strong></label> </div>
                <div class="span0.5"> Segundos <input type="text" style="width:15px" type="radio" id="duracion_seg" name="duracion_seg" placeholder="0" value="<?php echo $Datos_Formato['Duracion_Seg']; ?>"> </div>
                <div class="span0.5"> Minutos <input type="text" style="width:15px" id="duracion_min" name="duracion_min" placeholder="0" value="<?php echo $Datos_Formato['Duracion_Min']; ?>"> </div>
                <div class="span0.5"> Horas <input type="text" style="width:15px" id="duracion_horas" name="duracion_horas" placeholder="0" value="<?php echo $Datos_Formato['Duracion_Horas']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong>Sensación del Diente: </strong></label> </div>
                <div class="span0.5"> Elongado <input type="radio" id="sensacion_diente" name="sensacion_diente" value="1" <?php echo ($Datos_Formato['Sensacion_Diente'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Móvil <input type="radio" id="sensacion_diente" name="sensacion_diente" value="2" <?php echo ($Datos_Formato['Sensacion_Diente'] == '2' ? "checked":""); ?>> </div>
              </div>
              <br>
            </div><!-- fin tab2 -->

            <div class="tab-pane" id="tab3">
              <h3>Síntomas Objetivos</h3>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong>Exposición Pulpar por: </strong></label> </div>
                <div class="span0.5"> Caries <input type="radio" id="exposicion_pulpar" name="exposicion_pulpar" value="1" <?php echo ($Datos_Formato['Exposicion_Pulpar'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Instrumento dental <input type="radio" id="exposicion_pulpar" name="exposicion_pulpar" value="2" <?php echo ($Datos_Formato['Exposicion_Pulpar'] == '2' ? "checked":""); ?>> </div>
                <div class="span0.5"> Fractura <input type="radio" id="exposicion_pulpar" name="exposicion_pulpar" value="1" <?php echo ($Datos_Formato['Exposicion_Pulpar'] == '3' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong>Lesión Pulpar: </strong></label> </div>
                <div class="span0.5"> Física <input type="radio" id="lesion_pulpar" name="lesion_pulpar" value="1" <?php echo ($Datos_Formato['Lesion_Pulpar'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Química <input type="radio" id="lesion_pulpar" name="lesion_pulpar" value="2" <?php echo ($Datos_Formato['Lesion_Pulpar'] == '2' ? "checked":""); ?>> </div>
                <div class="span0.5"> Bacteriana <input type="radio" id="lesion_pulpar" name="lesion_pulpar" value="3" <?php echo ($Datos_Formato['Lesion_Pulpar'] == '3' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong>Inflamación: </strong></label> </div>
                <div class="span0.5"> Extraoral <input type="radio" id="inflamacion" name="inflamacion" value="1" <?php echo ($Datos_Formato['Inflamacion'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Intraoral <input type="radio" id="inflamacion" name="inflamacion" value="2" <?php echo ($Datos_Formato['Inflamacion'] == '2' ? "checked":""); ?>> </div>
                <div class="span0.5"> Endurecida <input type="radio" id="inflamacion" name="inflamacion" value="3" <?php echo ($Datos_Formato['Inflamacion'] == '3' ? "checked":""); ?>> </div>
                <div class="span0.5"> Blanda <input type="radio" id="inflamacion" name="inflamacion" value="4" <?php echo ($Datos_Formato['Inflamacion'] == '4' ? "checked":""); ?>> </div>
              </div>
            </div><!-- fin tab3 -->

            <div class="tab-pane" id="tab4">
              <h3>Medios de Diagnóstico</h3>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong> Frío </strong></label> </div>
                <div class="span0.5"> Normal <input type="radio" id="frio" name="frio" value="1" <?php echo ($Datos_Formato['Frio'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Anormal <input type="radio" id="frio" name="frio" value="2" <?php echo ($Datos_Formato['Frio'] == '2' ? "checked":""); ?>> </div>
                <div class="span0.5"> Ninguna <input type="radio" id="frio" name="frio" value="3" <?php echo ($Datos_Formato['Frio'] == '3' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong> Calor </strong></label> </div>
                <div class="span0.5"> Normal <input type="radio" id="calor" name="calor" value="1" <?php echo ($Datos_Formato['Calor'] == '1' ? "checked":""); ?>></div>
                <div class="span0.5"> Anormal <input type="radio" id="calor" name="calor" value="2" <?php echo ($Datos_Formato['Calor'] == '2' ? "checked":""); ?>> </div>
                <div class="span0.5"> Ninguna <input type="radio" id="calor" name="calor" value="3" <?php echo ($Datos_Formato['Calor'] == '3' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong> Movilidad </strong></label> </div>
                <div class="span0.5"> Palpación <input type="radio" id="movilidad" name="movilidad" value="1" <?php echo ($Datos_Formato['Movilidad'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Percusión <input type="radio" id="movilidad" name="movilidad" value="2" <?php echo ($Datos_Formato['Movilidad'] == '2' ? "checked":""); ?>> </div>
                <div class="span0.5"> Cambio de Color <input type="radio" id="movilidad" name="movilidad" value="3" <?php echo ($Datos_Formato['Movilidad'] == '3' ? "checked":""); ?>> </div>
              </div>
            </div><!-- fin tab4 -->

            <div class="tab-pane" id="tab5">
              <h3>Examen Radiográfico</h3>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong> Cámara y Conducto Pulpar </strong></label> </div>
                <div class="span0.5"> Normal <input type="radio" id="camara_conducto_pulpar" name="camara_conducto_pulpar" value="1" <?php echo ($Datos_Formato['Camara_Conducto_Pulpar'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Resorción Interna <input type="radio" id="camara_conducto_pulpar" name="camara_conducto_pulpar" value="2" <?php echo ($Datos_Formato['Camara_Conducto_Pulpar'] == '2' ? "checked":""); ?>> </div>
                <div class="span0.5"> Perforación <input type="radio" id="camara_conducto_pulpar" name="camara_conducto_pulpar" value="3" <?php echo ($Datos_Formato['Camara_Conducto_Pulpar'] == '3' ? "checked":""); ?>> </div>
                <div class="span0.5"> Obstrucción del Conducto <input type="radio" id="camara_conducto_pulpar" name="camara_conducto_pulpar" value="4" <?php echo ($Datos_Formato['Camara_Conducto_Pulpar'] == '4' ? "checked":""); ?>> </div>
                <div class="span0.5"> Fractura <input type="radio" id="camara_conducto_pulpar" name="camara_conducto_pulpar" value="5" <?php echo ($Datos_Formato['Camara_Conducto_Pulpar'] == '5' ? "checked":""); ?>> </div>
                <div class="span0.5"> Calcificación Parcial <input type="radio" id="camara_conducto_pulpar" name="camara_conducto_pulpar" value="6" <?php echo ($Datos_Formato['Camara_Conducto_Pulpar'] == '6' ? "checked":""); ?>> </div>
                <div class="span0.5"> Calcificación Total <input type="radio" id="camara_conducto_pulpar" name="camara_conducto_pulpar" value="7" <?php echo ($Datos_Formato['Camara_Conducto_Pulpar'] == '7' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong> Periápice </strong></label> </div>
                <div class="span0.5"> Resorción del ápice <input type="radio" id="periapice" name="periapice" value="1" <?php echo ($Datos_Formato['Periapice'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Hipercimentosis <input type="radio" id="periapice" name="periapice" value="2" <?php echo ($Datos_Formato['Periapice'] == '2' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong> Ligamento Periodontal </strong></label> </div>
                <div class="span0.5"> Normal <input type="radio" id="ligamento_periodontal" name="ligamento_periodontal" value="1" <?php echo ($Datos_Formato['Ligamento_Periodontal'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Engrosado <input type="radio" id="ligamento_periodontal" name="ligamento_periodontal" value="2" <?php echo ($Datos_Formato['Ligamento_Periodontal'] == '2' ? "checked":""); ?>></div>
              </div>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong> Rarefacción Ápical </strong></label> </div>
                <div class="span0.5"> Circunscrita <input type="radio" id="rarefaccion_apical" name="rarefaccion_apical" value="1" <?php echo ($Datos_Formato['Rarefaccion_Apical'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Difusa <input type="radio" id="rarefaccion_apical" name="rarefaccion_apical" value="1" <?php echo ($Datos_Formato['Rarefaccion_Apical'] == '2' ? "checked":""); ?>> </div>
                <div class="span0.5"> Ninguna <input type="radio" id="rarefaccion_apical" name="rarefaccion_apical" value="3" <?php echo ($Datos_Formato['Rarefaccion_Apical'] == '3' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong> Diagnóstico Pulpar </strong></label> </div>
                <div class="span0.5"> <input type="text" placeholder="Diagnóstico Pulpar" id="diagnostico_pulpar" name="diagnostico_pulpar" value="<?php echo $Datos_Formato['Diagnostico_Pulpar']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span0.5"> <label><strong> Pronóstico </strong></label> </div>
                <div class="span0.5"> Favorable <input type="radio" id="pronostico" name="pronostico" value="1" <?php echo ($Datos_Formato['Pronostico'] == '1' ? "checked":""); ?>> </div>
                <div class="span0.5"> Desfavorable <input type="radio" id="pronostico" name="pronostico" value="2" <?php echo ($Datos_Formato['Pronostico'] == '2' ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Plan de Tratamiento </strong></label> </div>
                <div class="span1"> <input type="text" placeholder="Plan de Tratamiento" id="plan_tratamiento" name="plan_tratamiento" value="<?php echo $Datos_Formato['Plan_Tratamiento']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Técnica Operatoria </strong></label> </div>
                <div class="span1"> <input type="text" placeholder="Técnica Operatoria" id="tecnica_operatoria" name="tecnica_operatoria" value="<?php echo $Datos_Formato['Tecnica_Operatoria']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Materiales de Obturación </strong></label> </div>
                <div class="span1"> <input type="text" placeholder="Materiales de Obturación" id="materiales_obturacion" name="materiales_obturacion" value="<?php echo $Datos_Formato['Materiales_Obturacion']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Grapa # </strong></label> </div>
                <div class="span1"> <input type="text" placeholder="Grapa #" id="numero_grapa" name="numero_grapa" value="<?php echo $Datos_Formato['Numero_Grapa']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Pieza Dental </strong></label> </div>
                <div class="span1"> <input type="text" placeholder="Pieza Dental" id="pieza_dental" name="pieza_dental" value="<?php echo $Datos_Formato['Pieza_Dental']; ?>"> </div>
              </div>
            </div><!-- fin tab5 -->

            <div class="tab-pane" id="tab6">
              <h3>Secuencia del Tratamiento</h3>
              <br>
              <table class="table table-striped">
                <thead>
                  <th>Conducto</th>
                  <th></th>
                  <th><center>Conductometría Longitudinal</center> </th>
                  <th></th>
                  <th>Punto de Referencia</th>
                  <th>Amplitud N° Instrumento</th>
                  <th>Obturación N° Cono Gutapercha</th>
                </thead>
                <tbody>
                  <tr>
                    <th></th>
                    <th><center>Tent.</center></th>
                    <th><center>Rectif.</center></th>
                    <th><center>Def.</center></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr>
                    <th><center><input type="text" style="width:50%;" id="conducto_1" name="conducto_1" value="<?php echo $Datos_Formato['Conducto_1']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="conducto_2" name="conducto_2" value="<?php echo $Datos_Formato['Conducto_2']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="conducto_3" name="conducto_3" value="<?php echo $Datos_Formato['Conducto_3']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="conducto_4" name="conducto_4" value="<?php echo $Datos_Formato['Conducto_4']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="conducto_5" name="conducto_5" value="<?php echo $Datos_Formato['Conducto_5']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="conducto_6" name="conducto_6" value="<?php echo $Datos_Formato['Conducto_6']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="conducto_7" name="conducto_7" value="<?php echo $Datos_Formato['Conducto_7']; ?>"></center></th>
                  </tr>
                  <tr>
                    <th><center><input type="text" style="width:50%;" id="tec_long_tent_1" name="tec_long_tent_1" value="<?php echo $Datos_Formato['Tec_Long_Tent_1']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_tent_2" name="tec_long_tent_2" value="<?php echo $Datos_Formato['Tec_Long_Tent_2']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_tent_3" name="tec_long_tent_3" value="<?php echo $Datos_Formato['Tec_Long_Tent_3']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_tent_4" name="tec_long_tent_4" value="<?php echo $Datos_Formato['Tec_Long_Tent_4']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_tent_5" name="tec_long_tent_5" value="<?php echo $Datos_Formato['Tec_Long_Tent_5']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_tent_6" name="tec_long_tent_6" value="<?php echo $Datos_Formato['Tec_Long_Tent_6']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_tent_7" name="tec_long_tent_7" value="<?php echo $Datos_Formato['Tec_Long_Tent_7']; ?>"></center></th>
                  </tr>
                  <tr>
                    <th><center><input type="text" style="width:50%;" id="tec_long_rectif_1" name="tec_long_rectif_1" value="<?php echo $Datos_Formato['Tec_Long_Rectif_1']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_rectif_2" name="tec_long_rectif_2" value="<?php echo $Datos_Formato['Tec_Long_Rectif_2']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_rectif_3" name="tec_long_rectif_3" value="<?php echo $Datos_Formato['Tec_Long_Rectif_3']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_rectif_4" name="tec_long_rectif_4" value="<?php echo $Datos_Formato['Tec_Long_Rectif_4']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_rectif_5" name="tec_long_rectif_5" value="<?php echo $Datos_Formato['Tec_Long_Rectif_5']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_rectif_6" name="tec_long_rectif_6" value="<?php echo $Datos_Formato['Tec_Long_Rectif_6']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_rectif_7" name="tec_long_rectif_7" value="<?php echo $Datos_Formato['Tec_Long_Rectif_7']; ?>"></center></th>
                  </tr>
                  <tr>
                    <th><center><input type="text" style="width:50%;" id="tec_long_def_1" name="tec_long_def_1" value="<?php echo $Datos_Formato['Tec_Long_Def_1']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_def_2" name="tec_long_def_2" value="<?php echo $Datos_Formato['Tec_Long_Def_2']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_def_3" name="tec_long_def_3" value="<?php echo $Datos_Formato['Tec_Long_Def_3']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_def_4" name="tec_long_def_4" value="<?php echo $Datos_Formato['Tec_Long_Def_4']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_def_5" name="tec_long_def_5" value="<?php echo $Datos_Formato['Tec_Long_Def_5']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_def_6" name="tec_long_def_6" value="<?php echo $Datos_Formato['Tec_Long_Def_6']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="tec_long_def_7" name="tec_long_def_7" value="<?php echo $Datos_Formato['Tec_Long_Def_7']; ?>"></center></th>
                  </tr>
                  <tr>
                    <th><center><input type="text" style="width:50%;" id="punto_referencia_1" name="punto_referencia_1" value="<?php echo $Datos_Formato['Punto_Referencia_1']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="punto_referencia_2" name="punto_referencia_2" value="<?php echo $Datos_Formato['Punto_Referencia_2']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="punto_referencia_3" name="punto_referencia_3" value="<?php echo $Datos_Formato['Punto_Referencia_3']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="punto_referencia_4" name="punto_referencia_4" value="<?php echo $Datos_Formato['Punto_Referencia_4']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="punto_referencia_5" name="punto_referencia_5" value="<?php echo $Datos_Formato['Punto_Referencia_5']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="punto_referencia_6" name="punto_referencia_6" value="<?php echo $Datos_Formato['Punto_Referencia_6']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="punto_referencia_7" name="punto_referencia_7" value="<?php echo $Datos_Formato['Punto_Referencia_7']; ?>"></center></th>
                  </tr>
                  <tr>
                    <th><center><input type="text" style="width:50%;" id="num_instrumento_1" name="num_instrumento_1" value="<?php echo $Datos_Formato['Num_Instrumento_1']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_instrumento_2" name="num_instrumento_2" value="<?php echo $Datos_Formato['Num_Instrumento_2']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_instrumento_3" name="num_instrumento_3" value="<?php echo $Datos_Formato['Num_Instrumento_3']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_instrumento_4" name="num_instrumento_4" value="<?php echo $Datos_Formato['Num_Instrumento_4']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_instrumento_5" name="num_instrumento_5" value="<?php echo $Datos_Formato['Num_Instrumento_5']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_instrumento_6" name="num_instrumento_6" value="<?php echo $Datos_Formato['Num_Instrumento_6']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_instrumento_7" name="num_instrumento_7" value="<?php echo $Datos_Formato['Num_Instrumento_7']; ?>"></center></th>
                  </tr>
                  <tr>
                    <th><center><input type="text" style="width:50%;" id="num_cono_1" name="num_cono_1" value="<?php echo $Datos_Formato['Num_Cono_1']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_cono_2" name="num_cono_2" value="<?php echo $Datos_Formato['Num_Cono_2']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_cono_3" name="num_cono_3" value="<?php echo $Datos_Formato['Num_Cono_3']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_cono_4" name="num_cono_4" value="<?php echo $Datos_Formato['Num_Cono_4']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_cono_5" name="num_cono_5" value="<?php echo $Datos_Formato['Num_Cono_5']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_cono_6" name="num_cono_6" value="<?php echo $Datos_Formato['Num_Cono_6']; ?>"></center></th>
                    <th><center><input type="text" style="width:50%;" id="num_cono_7" name="num_cono_7" value="<?php echo $Datos_Formato['Num_Cono_7']; ?>"></center></th>
                  </tr>
                </tbody>
              </table>
            </div><!-- fin tab6 -->

            <div class="tab-pane" id="tab7">
              <h3>Observaciones</h3>
              <br>
              <div class="row"> 
                <div class="span2"><strong>Fecha:</strong> <?php echo date('d-m-y'); ?> </div>
              </div>
              <br>
              <textarea rows="3" cols="5" style="width: 75%;" placeholder="Observaciones" id="observacion" name="observacion"><?php echo $Datos_Formato['Observacion']; ?></textarea>
            </div><!-- fin tab7 -->
        </div><!-- fin tabcontent -->

        </div><!-- well -->
			
		<?php if($SIS_Datos_Usuario['NombrePuesto'] == "Medico Titular" ||
			 $SIS_Datos_Usuario['NombrePuesto'] == "Administrador"): ?>            
        <div class="row">
            <div class="span8">
            <label><strong>Aprobación de Historia Clínica</strong></label>
            <select class="input-block-level2" id="aprobacion" name="aprobacion">
                <option value="1" selected>Aprobado</option>
                <option value="2">No Aprobado</option>
            </select>            
            </div>
        </div>
        <br />
        <div align="row">
          <input type="submit" class="btn btn-institucional" name="aprobar" id="guardar" value="Confirmar">
            
            <a href="../clinica/formatohistoriaclinicaendodoncia.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
        </div>
		<?php endif; ?>
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->
      <input type="hidden" id="ventana" value="formato-historia-clinica-endodoncia">

<script type="text/javascript" src="../js/chrome.js"></script>  

<?php include("../footer2.php"); ?>