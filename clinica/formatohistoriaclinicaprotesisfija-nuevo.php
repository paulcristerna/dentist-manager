<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="formato-historia-clinica-protesis-fija">
<script src="validacion_formatohistoriaclinicaprotesisfija.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Paciente.php"); ?>
        <?php include("../core-saec/Pareja_Clinica.php"); ?>

        <div class="span9">

        <h2>Formato de Historia Clínica de Prótesis Fija</h2>
		<div id="campo-error"></div>

        <div class="well">
            
        <form method="post" action="validacion_formatohistoriaclinicaprotesisfija.php" onsubmit="return validacion()">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Evaluación Clínica</a></li>
            <li><a href="#tab3">Análisis de la Oclusión</a></li>
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
                    <select class="input-block-level2" id="sltpaciente-protesis-fija" name="sltpaciente-protesis-fija">
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
                    <label><strong>Ocupación:</strong></label>
                    <input type="text" name="ocupacion" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Ocupacion']:""); ?>">
                </div> 
                <div class="span2">
                    <label><strong>Teléfono:</strong></label>
	            <input type="text" name="telefono" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Telefono']:""); ?>">
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span4">
                    <label><strong>Calle:</strong></label>
	            <input type="text" name="calle" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Calle']:""); ?>">
                </div>
	        <div class="span1">
                    <label><strong>Número:</strong></label>
	            <input type="text" name="numero" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Numero']:""); ?>">
                </div>
              </div>
              <br />
	      <br />
              <div class="row"> 
                <div class="span4">
                    <label><strong>Colonia:</strong></label>
	            <input type="text" name="colonia" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Colonia']:""); ?>">
                </div>
	        <div class="span2">
                    <label><strong>Población:</strong></label>
	            <input type="text" name="poblacion" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Poblacion']:""); ?>">
                </div>
              </div>
	      <br />
              <div class="row"> 
                <div class="span3">
                    <label><strong>Lugar de Nacimiento:</strong><label>
	            <input type="text" name="lugar-nacimiento" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['LugarNacimiento']:""); ?>">
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> ¿Cuál es el Motivo de la Consulta? </strong></label> </div>
                <div class="span3.5"> <input type="text" style="width:450px;" placeholder="¿Cuál es el Motivo de la Consulta?" id="motivo_consulta" name="motivo_consulta"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> ¿Se encuentra bajo Tx Médico? </strong></label> </div>
	        <div class="span3.5">
	         <select class="input-block-level2" id="tx_medico" name="tx_medico">
                    <option value="Si">Si</option>
	            <option value="No">No</option>
                </select>
	        </div>	        
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> ¿Cuál? </strong></label> </div>
                <div class="span3.5"> <input type="text" style="width:450px;" placeholder="¿Cuál?" id="cual_motivo" name="cual_motivo"> </div>
              </div>

            </div><!-- fin tab1 -->

            <div class="tab-pane" id="tab2" style="height:743px;overflow:hidden">
              <h2>Evaluación Clínica</h2>
              <p>Seleccione un padecimiento y haga clic sobre el diente correspondiente.</p>

              <div class="row">
                <div class="span8">
                  <p>
                    <a class="btn btn-institucional" id="azul" style="margin: 5px">Dientes con Caries</a>
                    <a class="btn btn-warning" id="amarillo" style="margin: 5px;">Prótesis Parcial Fija</a>
                    <a class="btn btn-success" id="verde" style="margin: 5px;">Prótesis Parcial Removible</a>
                    <a class="btn btn-inverse" id="negro" style="margin: 5px;">Dientes Ausentes</a>
                    <a class="btn btn-danger" id="rojo" style="margin: 5px;">Restauraciones Individuales</a>
                    <a class="btn btn-default" id="blanco" style="margin: 5px;">Eliminar Color <i class="icon icon-remove"></i></a>
                  </p>
                </div>
              </div>        
                
              <input type="hidden" id="tipo" value="evaluacion_clinica">

              <div id="contenedor-dental">
                <div class="izquierda">
                  <div class="dientes diente-izq-1">
                    <input type="hidden" id="campo-diente-izq-1" name="campo-diente-izq-1" value="0">
                  </div>
                  <div class="dientes diente-izq-2">
                    <input type="hidden" id="campo-diente-izq-2" name="campo-diente-izq-2" value="0">  
                  </div>
                  <div class="dientes diente-izq-3">
                    <input type="hidden" id="campo-diente-izq-3" name="campo-diente-izq-3" value="0">  
                  </div>
                  <div class="dientes diente-izq-4">
                    <input type="hidden" id="campo-diente-izq-4" name="campo-diente-izq-4" value="0">  
                  </div>
                  <div class="dientes diente-izq-5">
                    <input type="hidden" id="campo-diente-izq-5" name="campo-diente-izq-5" value="0">    
                  </div>
                  <div class="dientes diente-izq-6">
                    <input type="hidden" id="campo-diente-izq-6" name="campo-diente-izq-6" value="0">  
                  </div>
                  <div class="dientes diente-izq-7">
                    <input type="hidden" id="campo-diente-izq-7" name="campo-diente-izq-7" value="0">  
                  </div>
                  <div class="dientes diente-izq-8">
                    <input type="hidden" id="campo-diente-izq-8" name="campo-diente-izq-8" value="0">    
                  </div>
                  <div class="dientes diente-izq-9">
                    <input type="hidden" id="campo-diente-izq-9" name="campo-diente-izq-9" value="0">    
                  </div>
                  <div class="dientes diente-izq-10">
                    <input type="hidden" id="campo-diente-izq-10" name="campo-diente-izq-10" value="0">    
                  </div>
                  <div class="dientes diente-izq-11">
                    <input type="hidden" id="campo-diente-izq-11" name="campo-diente-izq-11" value="0">    
                  </div>
                  <div class="dientes diente-izq-12">
                    <input type="hidden" id="campo-diente-izq-12" name="campo-diente-izq-12" value="0">    
                  </div>
                  <div class="dientes diente-izq-13">
                    <input type="hidden" id="campo-diente-izq-13" name="campo-diente-izq-13" value="0">    
                  </div>
                  <div class="dientes diente-izq-14">
                    <input type="hidden" id="campo-diente-izq-14" name="campo-diente-izq-14" value="0">    
                  </div>
                </div>

                <div class="derecha">
                  <div class="dientes diente-der-1">
                    <input type="hidden" id="campo-diente-der-1" name="campo-diente-der-1" value="0">   
                  </div>
                  <div class="dientes diente-der-2">
                    <input type="hidden" id="campo-diente-der-2" name="campo-diente-der-2" value="0">  
                  </div>
                  <div class="dientes diente-der-3">
                    <input type="hidden" id="campo-diente-der-3" name="campo-diente-der-3" value="0">    
                  </div>
                  <div class="dientes diente-der-4">
                    <input type="hidden" id="campo-diente-der-4" name="campo-diente-der-4" value="0">    
                  </div>
                  <div class="dientes diente-der-5">
                    <input type="hidden" id="campo-diente-der-5" name="campo-diente-der-5" value="0">    
                  </div>
                  <div class="dientes diente-der-6">
                    <input type="hidden" id="campo-diente-der-6" name="campo-diente-der-6" value="0">    
                  </div>
                  <div class="dientes diente-der-7">
                    <input type="hidden" id="campo-diente-der-7" name="campo-diente-der-7" value="0">    
                  </div>
                  <div class="dientes diente-der-8">
                    <input type="hidden" id="campo-diente-der-8" name="campo-diente-der-8" value="0">    
                  </div>
                  <div class="dientes diente-der-9">
                    <input type="hidden" id="campo-diente-der-9" name="campo-diente-der-9" value="0">    
                  </div>
                  <div class="dientes diente-der-10">
                    <input type="hidden" id="campo-diente-der-10" name="campo-diente-der-10" value="0">    
                  </div>
                  <div class="dientes diente-der-11">
                    <input type="hidden" id="campo-diente-der-11" name="campo-diente-der-11" value="0">    
                  </div>
                  <div class="dientes diente-der-12">
                    <input type="hidden" id="campo-diente-der-12" name="campo-diente-der-12" value="0">    
                  </div>
                  <div class="dientes diente-der-13">
                    <input type="hidden" id="campo-diente-der-13" name="campo-diente-der-13" value="0">    
                  </div>
                  <div class="dientes diente-der-14">
                    <input type="hidden" id="campo-diente-der-14" name="campo-diente-der-14" value="0">  
                  </div>
                </div>
              </div>

              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Observaciones </strong></label> </div>
              </div>
              <div class="row"> 
                <div class="span8"> <textarea rows="3" cols="10" style="width:100%;" placeholder="Observaciones" id="observaciones_1" name="observaciones_1"></textarea> </div>
              </div>
            </div><!-- fin tab2 -->

            <div class="tab-pane" id="tab3">
              <h2>Análisis de la Oclusión</h2>
              <br><br>
              <div class="row"> 
                <div class="span2"> <label><strong> Clasificación de Angle </strong></label> </div>
                <div class="span2"> 
                  <select style="width:100px" id="clasificacion_angle" name="clasificacion_angle">
                    <option value="1">Grado 1</option>
                    <option value="2">Grado 2</option>
                    <option value="3">Grado 3</option>
                  </select> </div>
                <div class="span2"> <label><strong> Protección Canina </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="proteccion_canina" name="proteccion_canina">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Protección Anterior </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="proteccion_anterior" name="proteccion_anterior">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> </div>
                <div class="span2"> <label><strong> Función de Grupo </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="funcion_grupo" name="funcion_grupo">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Protección Mutua </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="proteccion_mutua" name="proteccion_mutua">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> 
                </div>
                <div class="span2"> <label><strong> Mordida Cruzada </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="mordida_cruzada" name="mordida_cruzada">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> 
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Mordida Abierta </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="mordida_abierta" name="mordida_abierta">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> 
                </div>
                <div class="span2"> <label><strong> Sobremordida </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="sobremordida" name="sobremordida">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> 
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Traslape Horizontal </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="traslape_horizontal" name="traslape_horizontal">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Observaciones </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Observaciones" id="observaciones_2" name="observaciones_2"></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Examen Radiográfico </strong></label> </div>
                <div class="span2"> 
                  <select style="width:135px" id="examen_radiografico" name="examen_radiografico">
                    <option value="1">Periapical</option>
                    <option value="2">Craneal</option>
                  </select> 
                </div>
                <div class="span2"> <label><strong> Relación Corona-Raíz </strong></label> </div>
                <div class="span2"> 
                  <select style="width:135px" id="relacion_corana_raiz" name="relacion_corona_raiz">
                    <option value="1">Buena</option>
                    <option value="2">Regular</option>
                    <option value="3">Mala</option>
                  </select> 
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Soporte Óseo </strong></label> </div>
                <div class="span2"> 
                  <select style="width:135px" id="soporte_oseo" name="soporte_oseo">
                    <option value="1">Buena</option>
                    <option value="2">Regular</option>
                    <option value="3">Mala</option>
                  </select> 
                </div>
                <div class="span1.5"> <label><strong> Región Desdentada </strong></label> </div>
                <div class="span2"> <input type="text" style="width100%" placeholder="Región Desdentada" id="region_desdentada" name="region_desdentada"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Observaciones </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Observaciones" id="observaciones_3" name="observaciones_3"></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span5"> <label><strong> ¿Dolor en la Región de las Articulaciones Temporomandibulares? </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="pregunta_1" name="pregunta_1">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> 
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span5"> <label><strong> ¿Sensibilidad o Dolor en la Región de los Músculos de la Masticación? </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="pregunta_2" name="pregunta_2">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <label><strong> ¿Dolor en la Espalda o Cuello? </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="pregunta_3" name="pregunta_3">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Hábitos Bucales </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Hábitos Bucales" id="habitos_bucales" name="habitos_bucales"></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Plan de Tratamiento </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Plan de Tratamiento" id="plan_tratamiento" name="plan_tratamiento"></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Dientes Pilares </strong> </div>
                <div class="span5"> <input type="text" style="width:100%;" placeholder="Dientes Pilares" id="dientes_pilares" name="dientes_pilares"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Pónticos </strong> </div>
                <div class="span5"> <input type="text" style="width:100%;" placeholder="Pónticos" id="ponticos" name="ponticos"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Restauraciones Individuales </strong> </div>
                <div class="span5"> <input type="text" style="width:100%;" placeholder="Restauraciones Individuales" id="restauraciones_individuales" name="restauraciones_individuales"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Otros </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Otros" id="otros" name="otros"></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Material a Utilizar </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Material a Utilizar" id="material_utilizar" name="material_utilizar"></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Modelos de Estudio </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="modelos_estudio" name="modelos_estudio">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Preparaciones </strong> </div>
                <div class="span5"> <input type="text" style="width:100%;" placeholder="Preparaciones" id="preparaciones" name="preparaciones"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Impresiones </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="impresiones" name="impresiones">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> </div>
                <div class="span2"> <label><strong> Prótesis Provisionales </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="protesis_provicionales" name="protesis_provicionales">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Prueba de Metal </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="prueba_metal" name="prueba_metal">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> 
                </div>
                <div class="span2"> <label><strong> Prueba de Prótesis </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="prueba_protesis" name="prueba_protesis">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Cemento </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="cemento" name="cemento">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Otros Tratamientos </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Otros Tratamientos" id="otros_tratamientos" name="otros_tratamientos"></textarea> </div>
              </div>
            </div><!-- fin tab3 -->

        </div><!-- fin tabcontent -->

        </div><!-- well -->

        <div align="row">
          <input type="submit" name="guardar" class="btn btn-institucional guardar" value="Guardar">
          <a href="../clinica/formatohistoriaclinicaprotesisfija.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
        </div>
            
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->

<script type="text/javascript" src="../js/chrome.js"></script>  

<?php include("../footer2.php"); ?>