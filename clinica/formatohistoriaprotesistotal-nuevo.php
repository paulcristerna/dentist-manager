<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="formato-historia-protesis-total">
<script src="validacion_formatohistoriaprotesistotal.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Paciente.php"); ?>
        <?php include("../core-saec/Pareja_Clinica.php"); ?>

        <div class="span9">

        <h2>Formato de Historia Clínica de Prótesis Total</h2>
			
		<div id="campo-error"></div>
            
        <form method="post" action="validacion_formatohistoriaprotesistotal.php" onsubmit="return validacion()">

        <div class="well">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Antecedentes</a></li>
            <li><a href="#tab3">Salud General del Paciente</a></li>
            <li><a href="#tab4">Examen Extrabucal</a></li>
            <li><a href="#tab5">Examen Intrabucal</a></li>
          </ul>
            
          <?php 
            $Paciente = new Paciente();
            if(isset($_GET['paciente']))
            {
                $Paciente->IdPaciente = $_GET['paciente'];
                $Datos_Paciente = $Paciente->Obtener_Paciente($_GET['paciente']);
                
                $fecha_nacimiento = date_create($Datos_Paciente['FechaNacimiento']);
				
				$dia=date('d');
				$mes=date('m');
				$ano=date('Y');

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
            }

            $Pareja_Clinica = new Pareja_Clinica();

            $Pareja_Clinica->IdAlumnoOpsAs1 = $SIS_Usuario;
            $DatosParejaClinica = $Pareja_Clinica->Buscar_Pareja_Clinica_Alumno_Op_As();   
                    
            $IdParejaClinica = $DatosParejaClinica['IdParejaClinica'];
          ?>

          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <h2>Datos del Paciente</h2>
              <input type="hidden" value="<?php echo $IdParejaClinica; ?>" name="pareja-clinica" id="pareja-clinica">
              <br>
              <div class="row"> 
                <div class="span3">
                    <label><strong>Paciente</strong></strong></label>
                    <select class="input-block-level2" id="sltpaciente-protesis-total" name="sltpaciente-protesis-total">
                    <option value="0">------</option> 
                    <?php
                        $Paciente->ListadoSelect();
                    ?>
                  </select> 
                </div>
                <div class="span1">
                    <label><strong>Edad:</strong></label>
                    <?php echo (isset($Edad) ? $Edad:""); ?>                    
                </div>
                <div class="span1">
                    <label><strong>Sexo:</strong></label>
                    <?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Sexo']:""); ?>
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span3">
                    <label><strong> Ocupación: </strong></label>
                    <input type="text" name="ocupacion" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Ocupacion']:""); ?>" placeholder="Ocupación">
                </div> 
                <div class="span3">
                    <label><strong>Teléfono: </strong></label>
                    <input type="text" name="telefono" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Telefono']:""); ?>" placeholder="Teléfono">
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span3">
                    <label><strong> Calle: </strong></label>
                    <input type="text" name="calle" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Calle']:""); ?>" placeholder="Calle">
                </div>
	        <div class="span1">
                    <label><strong> Número: </strong></label>
                    <input type="text" name="numero" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Numero']:""); ?>" placeholder="Número">
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span4">
                    <label><strong> Colonia: </strong></label>
                    <input type="text" name="colonia" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Colonia']:""); ?>" placeholder="Colonia">
                </div>
	        <div class="span2">
                    <label><strong> Población: </strong></label>
                    <input type="text" name="poblacion" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Poblacion']:""); ?>" placeholder="Población">
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"><label><strong> ¿Cuál es el Motivo de la Consulta? </strong></label> </div>
                <div class="span3.5"> <input type="text" placeholder="¿Cuál es el Motivo de la Consulta?" style="width:450px;" id="pregunta_1" name="pregunta_1"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> ¿Se encuentra bajo Tratamiento Médico? </strong></label> </div>
                <div class="span3.5"> <input type="text" placeholder="¿Se encuentra bajo Tratamiento Médico?" style="width:450px;" id="pregunta_2" name="pregunta_2"> </div>
              </div>
            </div><!-- fin tab1 -->
            <div class="tab-pane" id="tab2">
              <h2>Antecedentes</h2>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> Fecha Aproximada de sus Últimas Extracciones: </strong></label> </div>
                <div class="span1.5"> <label><strong> Superior: </strong></label> </div>
                <div class="span1.5"> <input type="text" placeholder="Fecha" class="span2" style="width:100px" id="fecha_superior" name="fecha_superior"> </div>
                <div class="span1.5"> <label><strong> Inferior: </strong></label> </div>
                <div class="span1"> <input type="text" placeholder="Fecha" class="span2" style="width:100px" id="fecha_inferior" name="fecha_inferior"> </div>
              </div>
              <br>
              <div class="row"> 
                  <div class="span1.5"> <label><strong> Razones por las que se Perdieron sus Órganos Dentarios: </strong></label> </div>
              </div>
              <div class="row"> 
                <div class="span1.5"> <input type="radio" id="pregunta_3" name="pregunta_3" value="1" checked> Caries </div>
                <div class="span1.5"> <input type="radio" id="pregunta_3" name="pregunta_3" value="2"> Lesiones Periodontales </div>
                <div class="span1.5"> <input type="radio" id="pregunta_3" name="pregunta_3" value="3"> Otras Causas </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Es portador de Dentadura: </strong> </div>
                <div class="span1"> Total <input type="radio" id="pregunta_4" name="pregunta_4" value="1" checked> </div>
                <div class="span1"> Parcial <input type="radio" id="pregunta_4" name="pregunta_4" value="2"> </div>
                <div class="span1"> Ninguna <input type="radio" id="pregunta_4" name="pregunta_4" value="3"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Experiencia en el Uso de Dentadura: </strong> </div>
                <div class="span1"> Buena <input type="radio" id="pregunta_5" name="pregunta_5" value="1" checked> </div>
                <div class="span1"> Regular <input type="radio" id="pregunta_5" name="pregunta_5" value="2"> </div>
                <div class="span1"> Pobre <input type="radio" id="pregunta_5" name="pregunta_5" value="3"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> ¿Por qué? </strong> </div>
                <div class="span6"> <textarea rows="2" col="10" style="width:100%;" placeholder="¿Por qué?" id="pregunta_6" name="pregunta_6"></textarea> </div>
              </div>
            </div><!-- fin tab2 -->
            <div class="tab-pane" id="tab3">
              <h2>Salud General del Paciente</h2>
              <br>
              <div class="row"> <div class="span2.5"> <strong> Salud General del Paciente: </strong> </div> </div>
              <div class="row"> 
                <div class="span1"> Buena <input type="radio" id="pregunta_7" name="pregunta_7" value="1" checked> </div>
                <div class="span1"> Regular <input type="radio" id="pregunta_7" name="pregunta_7" value="2"> </div>
                <div class="span1.5"> Debilitada <input type="radio" id="pregunta_7" name="pregunta_7" value="3"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Actitud Mental del Paciente: </strong> </div>
              </div>
              <div class="row">
                <div class="span1.5"> Escéptico <input type="radio" id="pregunta_8" name="pregunta_8" value="1" checked> </div>
                <div class="span1.5"> Neurótico <input type="radio" id="pregunta_8" name="pregunta_8" value="2"> </div>
                <div class="span1.5"> Receptivo <input type="radio" id="pregunta_8" name="pregunta_8" value="3"> </div>
                <div class="span1.5"> Pasivo <input type="radio" id="pregunta_8" name="pregunta_8" value="4"> </div>
              </div>

            </div><!-- fin tab3 -->
            <div class="tab-pane" id="tab4">
              <h2>Examen Extrabucal</h2>
              <br>
              <div class="row"> 
                <div class="span0.5"> <strong> Cara: </strong> </div>
                <div class="span1.5"> Patología Presente <input type="radio" id="pregunta_9" name="pregunta_9" value="1" checked> </div>
                <div class="span1.5"> Ninguna <input type="radio" id="pregunta_9" name="pregunta_9" value="2"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Forma de la Cara: </strong> </div>
                <div class="span1.5"> Cuadrada <input type="radio" id="pregunta_10" name="pregunta_10" value="1" checked> </div>
                <div class="span1.5"> Triangular <input type="radio" id="pregunta_10" name="pregunta_10" value="2"> </div>
                <div class="span1.5"> Ovoidea <input type="radio" id="pregunta_10" name="pregunta_10" value="3"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Articulación Temporomandibular: </strong> </div>
                <div class="span1.5"> Dolor <input type="radio" id="pregunta_11" name="pregunta_11" value="1" checked> </div>
                <div class="span1.5"> Chasquido <input type="radio" id="pregunta_11" name="pregunta_11" value="2"> </div>
                <div class="span1.5"> Ninguno <input type="radio" id="pregunta_11" name="pregunta_11" value="3"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Cuello: </strong> </div>
                <div class="span1.5"> Patología Presente <input type="radio" id="pregunta_12" name="pregunta_12" value="1" checked> </div>
                <div class="span1.5"> Ninguna <input type="radio" id="pregunta_12" name="pregunta_12" value="2"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Labio Superior: </strong> </div>
                <div class="span1.5"> Corto <input type="radio" id="pregunta_13" name="pregunta_13" value="1" checked> </div>
                <div class="span1.5"> Mediano <input type="radio" id="pregunta_13" name="pregunta_13" value="2"> </div>
                <div class="span1.5"> Largo <input type="radio" id="pregunta_13" name="pregunta_13" value="3"> </div>
                <div class="span1.5"> Normal <input type="radio" id="pregunta_13" name="pregunta_13" value="4"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Patología del Labio: </strong> </div>
                <div class="span1.5"> Presente <input type="radio" id="pregunta_14" name="pregunta_14" value="1" checked> </div>
                <div class="span1.5"> Ninguno <input type="radio" id="pregunta_14" name="pregunta_14" value="2"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Color de Ojos: </strong> </div>
                <div class="span1.5"> <input type="text" placeholder="Color" style="width:75px;" id="pregunta_15" name="pregunta_15"> </div>
                <div class="span1.5"> <strong> Color de Cabello: </strong> </div>
                <div class="span1.5"> <input type="text" placeholder="Color" style="width:75px;" id="pregunta_16" name="pregunta_16"> </div>
                <div class="span1.5"> <strong> Color de Piel: </strong> </div>
                <div class="span1.5"> <input type="text" placeholder="Color" style="width:75px;" id="pregunta_17" name="pregunta_17"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Tono Muscular Facial: </strong> </div>
                <div class="span1"> Flácido <input type="radio" id="pregunta_18" name="pregunta_18" value="1" checked> </div>
                <div class="span1"> Tenso <input type="radio" id="pregunta_18" name="pregunta_18" value="2"> </div>
                <div class="span1"> Medio <input type="radio" id="pregunta_18" name="pregunta_18" value="3"> </div>
              </div>
            </div><!-- fin tab4 -->
            <div class="tab-pane" id="tab5">
              <h2>Examen Intrabucal</h2>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Tamaño de los Maxilares: </strong> </div>
                <div class="span1.5"> Pequeño <input type="radio" id="pregunta_19" name="pregunta_19" value="1" checked> </div>
                <div class="span1.5"> Mediano <input type="radio" name="rbeitm" value="mediano" id="pregunta_19" name="pregunta_19" value="2"> </div>
                <div class="span1.5"> Grande <input type="radio" name="rbeitm" value="grande" id="pregunta_19" name="pregunta_19" value="3"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Forma de los Maxilares: </strong> </div>
                <div class="span1.5" style="padding-left:10px;"> Pequeño <input type="radio" id="pregunta_20" name="pregunta_20" value="1" checked> </div>
                <div class="span1.5"> Mediano <input type="radio" id="pregunta_20" name="pregunta_20" value="2"> </div>
                <div class="span1.5"> Grande <input type="radio" id="pregunta_20" name="pregunta_20" value="3"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Forma de los Procesos Residuales: </strong> </div>
                <div class="span2.5"> <strong> Superior: </strong>                       <select style="width:150px;" id="residuales_superior" name="residuales_superior">
                        <option value="1">Normal</option>
                        <option value="2">Filo de Navaja</option>
                        <option value="3">Plano</option>
                        <option value="4">Irregular</option> 
                    </select>
                </div>
                <div class="span2.5"> <strong> Inferior: </strong>                  <select style="width:150px;" id="residuales_inferior" name="residuales_inferior">
                    <option value="1">Normal</option>
                    <option value="2">Filo de Navaja</option>
                    <option value="3">Plano</option>
                    <option value="4">Irregular</option> 
                </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Salud de la Mucosa: </strong> </div>
                <div class="span1.5"> <strong> Superior: </strong> <select style="width:150px;" id="mucosa_superior" name="mucosa_superior">
                    <option value="1">Sana</option>
                    <option value="2">Irritada</option> </select>
                </div>
                <div class="span1.5"> <strong> Inferior: </strong> <select style="width:150px;" id="mucosa_inferior" name="mucosa_inferior">
                    <option value="1">Sana</option>
                    <option value="2">Irritada</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Posición Lingual: </strong> <select style="width:150px;" id="posicion_lingual" name="posicion_lingual">
                    <option value="1">Normal</option>
                    <option value="2">Retráctil</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Volumen Salival: </strong> <select style="width:150px;" id="volumen_salival" name="volumen_salival">
                    <option value="1">Insificiente</option>
                    <option value="2">Normal</option>
                    <option value="3">Excesiva</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Condición de la Saliva: </strong> <select style="width:150px;" id="condicion_salival" name="condicion_salival">
                    <option value="1">Normal</option>
                    <option value="2">Fluida</option>
                    <option value="3">Espesa</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Torus Palatino: </strong> <select style="width:150px;" id="torus_palatino" name="torus_palatino">
                    <option value="1">Chico</option>
                    <option value="2">Mediano</option>
                    <option value="3">Grande</option>
                    <option value="4">Ninguno</option> </select>
                </div>
                <div class="span1.5"> <strong> Torus Mandibular: </strong><select style="width:150px;" id="torus_mandibular" name="torus_mandibular">
                    <option value="1">Chico</option>
                    <option value="2">Mediano</option>
                    <option value="3">Grande</option>
                    <option value="4">Ninguno</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Reflejo Nauseoso: </strong> <select style="width:150px;" id="reflejo_nauseoso" name="reflejo_nauseoso">
                    <option value="1">Nulo</option>
                    <option value="2">Moderado</option>
                    <option value="3">Severo</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Relación Intermaxilar: </strong> <select style="width:150px;" id="relacion_intermaxilar" name="relacion_intermaxilar">
                    <option value="1">Ortognático</option>
                    <option value="2">Retrognático</option>
                    <option value="3">Prognático</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Frenillo: </strong> <select style="width:150px;" id="frenillo" name="frenillo">
                    <option value="1">Normal</option>
                    <option value="2">Hipertrofiado</option>
                    <option value="3">Ausente</option> </select>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="span3"> <label><strong> Observaciones Especiales: </strong></label> </div>
                <div class="span8"> <textarea rows="3" cols="10" style="width:100%;" placeholder="Observaciones Especiales" id="observaciones_especiales" name="observaciones_especiales"></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span3"> <label><strong> Diagnóstico: </strong></label> </div>
                <div class="span8"> <textarea rows="3" cols="10" style="width:100%;" placeholder="Diagnóstico" id="diagnostico" name="diagnostico"></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span1"> <label><strong> Pronóstico: </strong></label> </div>
                <div class="span3"> <input type="text" placeholder="Pronóstico" style="width:100%;" id="pronostico" name="pronostico"> </div>
              </div>
              <br>
              <div class="row">
                <div class="span3"> <label><strong> Plan de Tratamiento: </strong></label> </div>
                <div class="span8"> <textarea rows="3" cols="10" style="width:100%;" placeholder="Plan de Tratamiento" id="plan_tratamiento" name="plan_tratamiento"></textarea> </div>
              </div>
              <!--<br>
              <div class="row">
                <div class="span2.5"> <label><strong> Autorización de Maestro </strong></label> </div>
                <div class="span1"> <input type="checkbox"> </div>
                <div class="span2.5"> <label><strong> Autorización de Alumno</strong></label> </div>
                <div class="span1"> <input type="checkbox"> </div>
              </div>-->
            </div><!-- fin tab5 -->
        </div><!-- fin tabcontent -->

        </div><!-- well -->

        <div align="row">
          <input type="submit" name="guardar" class="btn btn-institucional guardar" value="Guardar">
          <a href="../clinica/formatohistoriaprotesistotal.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
        </div>
            
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->

<?php include("../footer2.php"); ?>