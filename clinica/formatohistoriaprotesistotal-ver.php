<?php include("../header2.php"); ?>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Formato_Historia_Clinica_Protesis_Total.php"); ?>

        <div class="span9">

        <h2>Formato de Historia Clínica de Prótesis Total</h2>
            
        <form method="post" action="validacion_formatohistoriaprotesistotal.php">
			
		<input type="hidden" id="historia_clinica" name="historia_clinica" value="<?php echo $_GET['formato']; ?>">

        <div class="well">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Antecedentes</a></li>
            <li><a href="#tab3">Salud General del Paciente</a></li>
            <li><a href="#tab4">Examen Extrabucal</a></li>
            <li><a href="#tab5">Examen Intrabucal</a></li>
          </ul>
            
          <?php 
            $Formato_Historia_Clinica_Protesis_Total = new Formato_Historia_Clinica_Protesis_Total();

            $Formato_Historia_Clinica_Protesis_Total->IdHistoriaClinicaProtesisTotal = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Protesis_Total->Obtener_Formato();

            $fecha = date_create($Datos_Formato['FechaNacimientoPaciente']);
            $FechaNacimiento = date_format($fecha,'Y');
            $Edad = date("Y") - $FechaNacimiento;
          ?>

          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <h2>Datos del Paciente</h2>
              <br>
              <div class="row"> 
                <div class="span8">
                    <label><strong>Paciente</strong>
					<?php echo $Datos_Formato['NombrePaciente'].' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></label>
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span2">
                    <label>
                        <strong>Edad:</strong>
                        <?php echo $Edad; ?> Año(s)
                    </label>
                </div>
                <div class="span1">
                    <label><strong>Sexo:</strong>
                    <?php echo $Datos_Formato['SexoPaciente']; ?>
                    </label>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span3">
                    <label><strong> Ocupación: </strong>
                    <?php echo $Datos_Formato['OcupacionPaciente']; ?>
                    </label>
                </div> 
                <div class="span3">
                    <label><strong>Teléfono: </strong>
                   <?php echo $Datos_Formato['TelefonoPaciente']; ?>
                    </label>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span5">
                    <label><strong> Domicilio: </strong>
                    <?php echo $Datos_Formato['CallePaciente'].' '.$Datos_Formato['NumeroPaciente'].' '.$Datos_Formato['ColoniaPaciente'].' '.$Datos_Formato['PoblacionPaciente']; ?>
                    </label>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"><label><strong> ¿Cuál es el Motivo de la Consulta? </strong></label> </div>
                <div class="span3.5"> <input type="text" placeholder="¿Cuál es el Motivo de la Consulta?" style="width:450px;" id="pregunta_1" name="pregunta_1" value="<?php echo $Datos_Formato['Pregunta_1']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> ¿Se encuentra bajo Tratamiento Médico? </strong></label> </div>
                <div class="span3.5"> <input type="text" placeholder="¿Se encuentra bajo Tratamiento Médico?" style="width:450px;" id="pregunta_2" name="pregunta_2" <?php echo $Datos_Formato['Pregunta_2']; ?>> </div>
              </div>
            </div><!-- fin tab1 -->
            <div class="tab-pane" id="tab2">
              <h2>Antecedentes</h2>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> Fecha Aproximada de sus Últimas Extracciones: </strong></label> </div>
                <div class="span1.5"> <label><strong> Superior: </strong></label> </div>
                <div class="span1.5"> <input type="text" placeholder="Fecha" class="span2" style="width:100px" id="fecha_superior" name="fecha_superior" value="<?php echo $Datos_Formato['Fecha_Superior']; ?>"> </div>
                <div class="span1.5"> <label><strong> Inferior: </strong></label> </div>
                <div class="span1"> <input type="text" placeholder="Fecha" class="span2" style="width:100px" id="fecha_inferior" name="fecha_inferior" value="<?php echo $Datos_Formato['Fecha_Inferior']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                  <div class="span1.5"> <label><strong> Razones por las que se Perdieron sus Órganos Dentarios: </strong></label> </div>
              </div>
              <div class="row"> 
                <div class="span1.5"> <input type="radio" id="pregunta_3" name="pregunta_3" value="1" <?php echo ($Datos_Formato['Pregunta_3'] == "1" ? "checked":""); ?>> Caries </div>
                <div class="span1.5"> <input type="radio" id="pregunta_3" name="pregunta_3" value="2" <?php echo ($Datos_Formato['Pregunta_3'] == "2" ? "checked":""); ?>> Lesiones Periodontales </div>
                <div class="span1.5"> <input type="radio" id="pregunta_3" name="pregunta_3" value="3" <?php echo ($Datos_Formato['Pregunta_3'] == "3" ? "checked":""); ?>> Otras Causas </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Es portador de Dentadura: </strong> </div>
                <div class="span1"> Total <input type="radio" id="pregunta_4" name="pregunta_4" value="1" <?php echo ($Datos_Formato['Pregunta_4'] == "1" ? "checked":""); ?>> </div>
                <div class="span1"> Parcial <input type="radio" id="pregunta_4" name="pregunta_4" value="2" <?php echo ($Datos_Formato['Pregunta_4'] == "2" ? "checked":""); ?>> </div>
                <div class="span1"> Ninguna <input type="radio" id="pregunta_4" name="pregunta_4" value="3" <?php echo ($Datos_Formato['Pregunta_4'] == "3" ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Experiencia en el Uso de Dentadura: </strong> </div>
                <div class="span1"> Buena <input type="radio" id="pregunta_5" name="pregunta_5" value="1" <?php echo ($Datos_Formato['Pregunta_5'] == "1" ? "checked":""); ?>> </div>
                <div class="span1"> Regular <input type="radio" id="pregunta_5" name="pregunta_5" value="2" <?php echo ($Datos_Formato['Pregunta_5'] == "2" ? "checked":""); ?>> </div>
                <div class="span1"> Pobre <input type="radio" id="pregunta_5" name="pregunta_5" value="3" <?php echo ($Datos_Formato['Pregunta_5'] == "3" ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> ¿Por qué? </strong> </div>
                <div class="span6"> <textarea rows="2" col="10" style="width:100%;" placeholder="¿Por qué?" id="pregunta_6" name="pregunta_6"><?php echo $Datos_Formato['Pregunta_6']; ?></textarea> </div>
              </div>
            </div><!-- fin tab2 -->
            <div class="tab-pane" id="tab3">
              <h2>Salud General del Paciente</h2>
              <br>
              <div class="row"> <div class="span2.5"> <strong> Salud General del Paciente: </strong> </div> </div>
              <div class="row"> 
                <div class="span1"> Buena <input type="radio" id="pregunta_7" name="pregunta_7" value="1" <?php echo ($Datos_Formato['Pregunta_7'] == "1" ? "checked":""); ?>></div>
                <div class="span1"> Regular <input type="radio" id="pregunta_7" name="pregunta_7" value="2" <?php echo ($Datos_Formato['Pregunta_7'] == "2" ? "checked":""); ?>> </div>
                <div class="span1.5"> Debilitada <input type="radio" id="pregunta_7" name="pregunta_7" value="3" <?php echo ($Datos_Formato['Pregunta_7'] == "3" ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Actitud Mental del Paciente: </strong> </div>
              </div>
              <div class="row">
                <div class="span1.5"> Escéptico <input type="radio" id="pregunta_8" name="pregunta_8" value="1" <?php echo ($Datos_Formato['Pregunta_8'] == "1" ? "checked":""); ?>> </div>
                <div class="span1.5"> Neurótico <input type="radio" id="pregunta_8" name="pregunta_8" value="2" <?php echo ($Datos_Formato['Pregunta_8'] == "2" ? "checked":""); ?>> </div>
                <div class="span1.5"> Receptivo <input type="radio" id="pregunta_8" name="pregunta_8" value="3" <?php echo ($Datos_Formato['Pregunta_8'] == "3" ? "checked":""); ?>> </div>
                <div class="span1.5"> Pasivo <input type="radio" id="pregunta_8" name="pregunta_8" value="4" <?php echo ($Datos_Formato['Pregunta_8'] == "4" ? "checked":""); ?>> </div>
              </div>

            </div><!-- fin tab3 -->
            <div class="tab-pane" id="tab4">
              <h2>Examen Extrabucal</h2>
              <br>
              <div class="row"> 
                <div class="span0.5"> <strong> Cara: </strong> </div>
                <div class="span1.5"> Patología Presente <input type="radio" id="pregunta_9" name="pregunta_9" value="1" <?php echo ($Datos_Formato['Pregunta_9'] == "1" ? "checked":""); ?>> </div>
                <div class="span1.5"> Ninguna <input type="radio" id="pregunta_9" name="pregunta_9" value="2" <?php echo ($Datos_Formato['Pregunta_9'] == "2" ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Forma de la Cara: </strong> </div>
                <div class="span1.5"> Cuadrada <input type="radio" id="pregunta_10" name="pregunta_10" value="1" <?php echo ($Datos_Formato['Pregunta_10'] == "1" ? "checked":""); ?>> </div>
                <div class="span1.5"> Triangular <input type="radio" id="pregunta_10" name="pregunta_10" value="2" <?php echo ($Datos_Formato['Pregunta_10'] == "2" ? "checked":""); ?>> </div>
                <div class="span1.5"> Ovoidea <input type="radio" id="pregunta_10" name="pregunta_10" value="3" <?php echo ($Datos_Formato['Pregunta_10'] == "3" ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Articulación Temporomandibular: </strong> </div>
                <div class="span1.5"> Dolor <input type="radio" id="pregunta_11" name="pregunta_11" value="1" <?php echo ($Datos_Formato['Pregunta_11'] == "1" ? "checked":""); ?>> </div>
                <div class="span1.5"> Chasquido <input type="radio" id="pregunta_11" name="pregunta_11" value="2" <?php echo ($Datos_Formato['Pregunta_11'] == "2" ? "checked":""); ?>> </div>
                <div class="span1.5"> Ninguno <input type="radio" id="pregunta_11" name="pregunta_11" value="3" <?php echo ($Datos_Formato['Pregunta_11'] == "3" ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Cuello: </strong> </div>
                <div class="span1.5"> Patología Presente <input type="radio" id="pregunta_12" name="pregunta_12" value="1" <?php echo ($Datos_Formato['Pregunta_12'] == "1" ? "checked":""); ?>> </div>
                <div class="span1.5"> Ninguna <input type="radio" id="pregunta_12" name="pregunta_12" value="2" <?php echo ($Datos_Formato['Pregunta_12'] == "2" ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Labio Superior: </strong> </div>
                <div class="span1.5"> Corto <input type="radio" id="pregunta_13" name="pregunta_13" value="1" <?php echo ($Datos_Formato['Pregunta_13'] == "1" ? "checked":""); ?>> </div>
                <div class="span1.5"> Mediano <input type="radio" id="pregunta_13" name="pregunta_13" value="2" <?php echo ($Datos_Formato['Pregunta_13'] == "2" ? "checked":""); ?>> </div>
                <div class="span1.5"> Largo <input type="radio" id="pregunta_13" name="pregunta_13" value="3" <?php echo ($Datos_Formato['Pregunta_13'] == "3" ? "checked":""); ?>> </div>
                <div class="span1.5"> Normal <input type="radio" id="pregunta_13" name="pregunta_13" value="4 <?php echo ($Datos_Formato['Pregunta_13'] == "4" ? "checked":""); ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Patología del Labio: </strong> </div>
                <div class="span1.5"> Presente <input type="radio" id="pregunta_14" name="pregunta_14" value="1" <?php echo ($Datos_Formato['Pregunta_14'] == "1" ? "checked":""); ?>> </div>
                <div class="span1.5"> Ninguno <input type="radio" id="pregunta_14" name="pregunta_14" value="2" <?php echo ($Datos_Formato['Pregunta_14'] == "2" ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Color de Ojos: </strong> </div>
                <div class="span1.5"> <input type="text" placeholder="Color" style="width:75px;" id="pregunta_15" name="pregunta_15" value="<?php echo $Datos_Formato['Pregunta_15']; ?>"> </div>
                <div class="span1.5"> <strong> Color de Cabello: </strong> </div>
                <div class="span1.5"> <input type="text" placeholder="Color" style="width:75px;" id="pregunta_16" name="pregunta_16" value="<?php echo $Datos_Formato['Pregunta_16']; ?>"> </div>
                <div class="span1.5"> <strong> Color de Piel: </strong> </div>
                <div class="span1.5"> <input type="text" placeholder="Color" style="width:75px;" id="pregunta_17" name="pregunta_17" value="<?php echo $Datos_Formato['Pregunta_17']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Tono Muscular Facial: </strong> </div>
                <div class="span1"> Flácido <input type="radio" id="pregunta_18" name="pregunta_18" value="1" <?php echo ($Datos_Formato['Pregunta_18'] == "1" ? "checked":""); ?>> </div>
                <div class="span1"> Tenso <input type="radio" id="pregunta_18" name="pregunta_18" value="2" <?php echo ($Datos_Formato['Pregunta_18'] == "2" ? "checked":""); ?>> </div>
                <div class="span1"> Medio <input type="radio" id="pregunta_18" name="pregunta_18" value="3" <?php echo ($Datos_Formato['Pregunta_18'] == "3" ? "checked":""); ?>> </div>
              </div>
            </div><!-- fin tab4 -->
            <div class="tab-pane" id="tab5">
              <h2>Examen Intrabucal</h2>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Tamaño de los Maxilares: </strong> </div>
                <div class="span1.5"> Pequeño <input type="radio" value="1" id="pregunta_19" name="pregunta_19" <?php echo ($Datos_Formato['Pregunta_19'] == "1" ? "checked":""); ?>> </div>
                <div class="span1.5"> Mediano <input type="radio" value="2" id="pregunta_19" name="pregunta_19" value="2" <?php echo ($Datos_Formato['Pregunta_19'] == "2" ? "checked":""); ?>> </div>
                <div class="span1.5"> Grande <input type="radio" value="3" id="pregunta_19" name="pregunta_19" value="3" <?php echo ($Datos_Formato['Pregunta_19'] == "3" ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Forma de los Maxilares: </strong> </div>
                <div class="span1.5" style="padding-left:10px;"> Pequeño <input type="radio" id="pregunta_20" name="pregunta_20" value="1" <?php echo ($Datos_Formato['Pregunta_20'] == "1" ? "checked":""); ?>> </div>
                <div class="span1.5"> Mediano <input type="radio" id="pregunta_20" name="pregunta_20" value="2" <?php echo ($Datos_Formato['Pregunta_20'] == "2" ? "checked":""); ?>> </div>
                <div class="span1.5"> Grande <input type="radio" id="pregunta_20" name="pregunta_20" value="3" <?php echo ($Datos_Formato['Pregunta_20'] == "3" ? "checked":""); ?>> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Forma de los Procesos Residuales: </strong> </div>
                <div class="span2.5"> <strong> Superior: </strong>                       <select style="width:150px;" id="residuales_superior" name="residuales_superior">
                        <option value="1" <?php echo ($Datos_Formato['Residuales_Superior'] == "1" ? "selected":""); ?>>Normal</option>
                        <option value="2" <?php echo ($Datos_Formato['Residuales_Superior'] == "2" ? "selected":""); ?>>Filo de Navaja</option>
                        <option value="3" <?php echo ($Datos_Formato['Residuales_Superior'] == "3" ? "selected":""); ?>>Plano</option>
                        <option value="4">Irregular</option> 
                    </select>
                </div>
                <div class="span2.5"> <strong> Inferior: </strong>                  <select style="width:150px;" id="residuales_inferior" name="residuales_inferior">
                    <option value="1" <?php echo ($Datos_Formato['Residuales_Inferior'] == "1" ? "selected":""); ?>>Normal</option>
                    <option value="2" <?php echo ($Datos_Formato['Residuales_Inferior'] == "2" ? "selected":""); ?>>Filo de Navaja</option>
                    <option value="3" <?php echo ($Datos_Formato['Residuales_Inferior'] == "3" ? "selected":""); ?>>Plano</option>
                    <option value="4" <?php echo ($Datos_Formato['Residuales_Inferior'] == "4" ? "selected":""); ?>>Irregular</option> 
                </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <strong> Salud de la Mucosa: </strong> </div>
                <div class="span1.5"> <strong> Superior: </strong> <select style="width:150px;" id="mucosa_superior" name="mucosa_superior">
                    <option value="1" <?php echo ($Datos_Formato['Mucosa_Superior'] == "1" ? "selected":""); ?>>Sana</option>
                    <option value="2" <?php echo ($Datos_Formato['Mucosa_Superior'] == "2" ? "selected":""); ?>>Irritada</option> </select>
                </div>
                <div class="span1.5"> <strong> Inferior: </strong> <select style="width:150px;" id="mucosa_inferior" name="mucosa_inferior">
                    <option value="1" <?php echo ($Datos_Formato['Mucosa_Inferior'] == "1" ? "selected":""); ?>>Sana</option>
                    <option value="2" <?php echo ($Datos_Formato['Mucosa_Inferior'] == "2" ? "selected":""); ?>>Irritada</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Posición Lingual: </strong> <select style="width:150px;" id="posicion_lingual" name="posicion_lingual">
                    <option value="1" <?php echo ($Datos_Formato['Posicion_Lingual'] == "1" ? "selected":""); ?>>Normal</option>
                    <option value="2" <?php echo ($Datos_Formato['Posicion_Lingual'] == "2" ? "selected":""); ?>>Retráctil</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Volumen Salival: </strong> <select style="width:150px;" id="volumen_salival" name="volumen_salival">
                    <option value="1" <?php echo ($Datos_Formato['Volumen_Salival'] == "1" ? "selected":""); ?>>Insificiente</option>
                    <option value="2" <?php echo ($Datos_Formato['Volumen_Salival'] == "2" ? "selected":""); ?>>Normal</option>
                    <option value="3" <?php echo ($Datos_Formato['Volumen_Salival'] == "3" ? "selected":""); ?>>Excesiva</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Condición de la Saliva: </strong> <select style="width:150px;" id="condicion_salival" name="condicion_salival">
                    <option value="1" <?php echo ($Datos_Formato['Condicion_Salival'] == "1" ? "selected":""); ?>>Normal</option>
                    <option value="2" <?php echo ($Datos_Formato['Condicion_Salival'] == "2" ? "selected":""); ?>>Fluida</option>
                    <option value="3" <?php echo ($Datos_Formato['Condicion_Salival'] == "3" ? "selected":""); ?>>Espesa</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Torus Palatino: </strong> <select style="width:150px;" id="torus_palatino" name="torus_palatino">
                    <option value="1" <?php echo ($Datos_Formato['Torus_Palatino'] == "1" ? "selected":""); ?>>Chico</option>
                    <option value="2" <?php echo ($Datos_Formato['Torus_Palatino'] == "2" ? "selected":""); ?>>Mediano</option>
                    <option value="3" <?php echo ($Datos_Formato['Torus_Palatino'] == "3" ? "selected":""); ?>>Grande</option>
                    <option value="4" <?php echo ($Datos_Formato['Torus_Palatino'] == "4" ? "selected":""); ?>>Ninguno</option> </select>
                </div>
                <div class="span1.5"> <strong> Torus Mandibular: </strong><select style="width:150px;" id="torus_mandibular" name="torus_mandibular">
                    <option value="1" <?php echo ($Datos_Formato['Torus_Mandibular'] == "1" ? "selected":""); ?>>Chico</option>
                    <option value="2" <?php echo ($Datos_Formato['Torus_Mandibular'] == "2" ? "selected":""); ?>>Mediano</option>
                    <option value="3" <?php echo ($Datos_Formato['Torus_Mandibular'] == "3" ? "selected":""); ?>>Grande</option>
                    <option value="4" <?php echo ($Datos_Formato['Torus_Mandibular'] == "4" ? "selected":""); ?>>Ninguno</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Reflejo Nauseoso: </strong> <select style="width:150px;" id="reflejo_nauseoso" name="reflejo_nauseoso">
                    <option value="1" <?php echo ($Datos_Formato['Reflejo_Nauseoso'] == "1" ? "selected":""); ?>>Nulo</option>
                    <option value="2" <?php echo ($Datos_Formato['Reflejo_Nauseoso'] == "2" ? "selected":""); ?>>Moderado</option>
                    <option value="3" <?php echo ($Datos_Formato['Reflejo_Nauseoso'] == "3" ? "selected":""); ?>>Severo</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Relación Intermaxilar: </strong> <select style="width:150px;" id="relacion_intermaxilar" name="relacion_intermaxilar">
                    <option value="1" <?php echo ($Datos_Formato['Relacion_Intermaxilar'] == "1" ? "selected":""); ?>>Ortognático</option>
                    <option value="2" <?php echo ($Datos_Formato['Relacion_Intermaxilar'] == "2" ? "selected":""); ?>>Retrognático</option>
                    <option value="3" <?php echo ($Datos_Formato['Relacion_Intermaxilar'] == "3" ? "selected":""); ?>>Prognático</option> </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <strong> Frenillo: </strong> <select style="width:150px;" id="frenillo" name="frenillo">
                    <option value="1" <?php echo ($Datos_Formato['Frenillo'] == "1" ? "selected":""); ?>>Normal</option>
                    <option value="2" <?php echo ($Datos_Formato['Frenillo'] == "2" ? "selected":""); ?>>Hipertrofiado</option>
                    <option value="3" <?php echo ($Datos_Formato['Frenillo'] == "3" ? "selected":""); ?>>Ausente</option> </select>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="span3"> <label><strong> Observaciones Especiales: </strong></label> </div>
                <div class="span8"> <textarea rows="3" cols="10" style="width:100%;" placeholder="Observaciones Especiales" id="observaciones_especiales" name="observaciones_especiales"><?php echo $Datos_Formato['Observaciones_Especiales']; ?></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span3"> <label><strong> Diagnóstico: </strong></label> </div>
                <div class="span8"> <textarea rows="3" cols="10" style="width:100%;" placeholder="Diagnóstico" id="diagnostico" name="diagnostico"><?php echo $Datos_Formato['Diagnostico']; ?></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span1"> <label><strong> Pronóstico: </strong></label> </div>
                <div class="span3"> <input type="text" placeholder="Pronóstico" style="width:100%;" id="pronostico" name="pronostico" value="<?php echo $Datos_Formato['Pronostico']; ?>"> </div>
              </div>
              <br>
              <div class="row">
                <div class="span3"> <label><strong> Plan de Tratamiento: </strong></label> </div>
                <div class="span8"> <textarea rows="3" cols="10" style="width:100%;" placeholder="Plan de Tratamiento" id="plan_tratamiento" name="plan_tratamiento"><?php echo $Datos_Formato['Plan_Tratamiento']; ?></textarea> </div>
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
			
		<?php if($SIS_Datos_Usuario['NombrePuesto'] == "Medico Titular"): ?>			
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
          <input type="submit" name="aprobar" id="guardar" class="btn btn-institucional" value="Confirmar">
			
          <a href="../clinica/formatohistoriaprotesistotal.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
        </div>
		<?php endif; ?>
            
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->
      <input type="hidden" id="ventana" value="formato-historia-protesis-total">

<script type="text/javascript" src="../js/chrome.js"></script>  

<?php include("../footer2.php"); ?>