<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="formato-historia-pediatrica">
<script src="validacion_formatohistoriaclinicapediatrica.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Paciente.php"); ?>
        <?php include("../core-saec/Pareja_Clinica.php"); ?>

        <div class="span9">

        <h2>Formato de Historia Clínica Pediátrica</h2>
		<div id="campo-error"></div>

        <div class="well" style="width:1150px;">
            
        <form method="post" action="validacion_formatohistoriapediatrica.php" onsubmit="return validacion()">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Historia Clinica</a></li>
            <li><a href="#tab3">Examen Bucal</a></li>
            <li><a href="#tab4">Odontograma</a></li>
            <li><a href="#tab5">Información Dental</a></li>
            <li><a href="#tab6">Información Médica</a></li>
            <li><a href="#tab7">Examen Radiogragico</a></li>
            <li><a href="#tab8">Diagnostico de Riesgos de Caries</a></li>
            <li><a href="#tab9">Diagnostico Integral</a></li>
            <li><a href="#tab10">Plan de Tratamiento</a></li>
            <li><a href="#tab11">Plan de Tratamiento por Citas</a></li>
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
              <br>
              <input type="hidden" value="<?php echo $IdParejaClinica; ?>" name="pareja-clinica" id="pareja-clinica">
              <div class="row"> 
                <div class="span4"> 
                  <label><strong>Nombre:</strong></label>
                  <select class="input-block-level2" id="sltpaciente-pediatrica" name="sltpaciente-pediatrica">
                    <option value="0">------</option> 
                    <?php
                        $Paciente->ListadoSelect();
                    ?>
                  </select>
                </div>
	       <div class="span1"> 
                  <label><strong>Sexo: </strong></label>
		  <?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Sexo']:""); ?></label>
              	</div>
		<div class="span2"> 
	           <label><strong>Edad: </strong></label>
		   <?php echo (isset($Edad) ? $Edad:"0"); ?> Año(s).
                </div>
              </div>
              <br>
	      <div class="row"> 
                <div class="span4"> 
	          <label><strong>Calle: </strong></label>
                  <input type="text" name="calle" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Calle']: ""); ?>" placeholder="Calle"></div>
		<div class="span1"> 
	          <label><strong>Numero: </strong></label>
	          <input type="text" name="numero" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Numero']:""); ?>" placeholder="Numero"></div>
	      </div>
	      <br />
	      <div class="row"> 
		<div class="span4"> 
	          <label><strong>Colonia: </strong></label>
	          <input type="text" name="colonia" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Colonia']:""); ?>" placeholder="Colonia"></div>
		<div class="span2"> 
	          <label><strong>Población: </strong></label>
                  <input type="text" name="poblacion" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Poblacion']:""); ?>" placeholder="Población"></div>
	      </div>
	      <br />
              <div class="row">                  
                <div class="span2"> 
	          <label><strong>Teléfono:</strong></label>
	          <input type="text" name="telefono" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Telefono'] : ""); ?>" placeholder="Teléfono"></div>
                <div class="span2"> 
	          <label><strong>Ocupación: </strong></label>
	          <input type="text" name="ocupacion" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Ocupacion'] : ""); ?>" placeholder="Ocupación"></div>                
              </div>
	      <br />
	      <div class="row">
                <div class="span2"> 
                  <label><strong>Código postal: </strong></label>
		  <input type="text" name="codigo-postal" id="codigo-postal" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['CodigoPostal'] : ""); ?>" placeholder="Código postal">
                </div> 
              </div>
	      <br />
	      <div class="row">
                <div class="span4"> 
                  <label><strong>Escuela: </strong></label>
		  <input type="text" name="escuela" id="escuela" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Escuela'] : ""); ?>" placeholder="Escuela">
                </div>
                <div class="span2"> 
	          <label><strong>Grado escolar: </strong></label>
		  <input type="text" name="grado-escolar" id="grado-escolar" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['GradoEscolar'] : ""); ?>" placeholder="Grado escolar">
                </div> 
              </div>
	      <br />
	      <div class="row">
                <div class="span2"> 
                  <label><strong>Num. de Hermanos: </strong></label>
		  <input type="text" name="num-hermanos" id="num-hermanos" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['NumHermanos'] : ""); ?>" placeholder="Num. de Hermanos">
                </div> 
              </div>
	      <br />
	      <div class="row">
                <div class="span4"> 
                  <label><strong>Nombre del padre: </strong></label>
		  <input type="text" name="nombre-padre" id="nombre-padre" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['NombrePadre'] : ""); ?>" placeholder="Nombre del padre">
                </div> 
              </div>
	      <br />
	      <div class="row">
                <div class="span2"> 
                  <label><strong>Ocupación: </strong></label>
		  <input type="text" name="ocupacion-padre" id="ocupacion-padre" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['OcupacionPadre'] : ""); ?>" placeholder="Ocupación">
                </div> 
                <div class="span2"> 
                  <label><strong>Teléfono: </strong></label>
		  <input type="text" name="telefono-padre" id="telefono-padre" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['TelefonoPadre'] : ""); ?>" placeholder="Teléfono">
                </div> 
              </div>
	      <br />
	      <div class="row">
                <div class="span4"> 
                  <label><strong>Nombre de su médico: </strong></label>
		  <input type="text" name="nombre-medico" id="nombre-medico" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['NombreMedico'] : ""); ?>" placeholder="Nombre de su médico">
                </div> 
              </div>
	      <br />
              <div class="row">                 
                <div class="span2"> 
                  <label><strong>Peso: </strong></label>
		  <input type="text" name="peso" id="peso" style="width:50px;" value="<?php echo (isset($_GET['paciente']) ? $Datos_Paciente['Peso']:""); ?>" placeholder="00.00"> kg.
                </div>
	        <div class="span2"> 
                  <label><strong>Estatura: </strong></label>
		  <input type="text" name="estatura" id="estatura" style="width:50px;" value="<?php echo (isset($_GET['paciente']) ? $Datos_Paciente['Estatura']:""); ?>" placeholder="0.00"> cm.
                </div>
              </div> 
              <br />
              <div class="row">
                <div class="span2"> 
                  <label><strong>T/A: </strong></label>
		  <input type="text" name="ta" id="ta" style="width:50px;" placeholder="T/A">
                </div> 
                <div class="span2"> 
                  <label><strong>Temp: </strong></label>
		  <input type="text" name="temp" id="temp" style="width:50px;" placeholder="Temp">
                </div>
              </div> 
              <br />
              <div class="row">
                <div class="span6"> 
                  <label><strong>Conducta: </strong></label>
		  <textarea name="conducta" id="conducta" style="width:100%;" placeholder="Conducta"></textarea>
                </div> 
              </div> 
            </div><!-- fin tab1 -->

            <div class="tab-pane" id="tab2">
              <h3>Historia Clínica</h3>
              <div class="row"> 
                <div class="span6"> 
                  <label><strong>Estado actual de salud:</strong> </label>
                  <input type="text" id="estado_actual_salud" name="estado_actual_salud" placeholder="Estado actual de salud" style="width:100%;">
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span6"> 
                  <label><strong>Enfermedades prolongadas o debilitanes:</strong></label>
                  <input type="text" id="enfermedades_prolongadas" name="enfermedades_prolongadas" placeholder="Enfermedades prolongadas o debilitanes" style="width:100%;">
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span6"> 
                  <label><strong>Ultimo examen fisico:</strong></label>
                  <input type="text" id="ultimo_examen_fisico" name="ultimo_examen_fisico" placeholder="Ultimo examen fisico" style="width:100%;">
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span6"> 
                  <label><strong>¿Recibe atención medica?:</strong></label>
                  <input type="text" id="recibe_atencion_medica" name="recibe_atencion_medica" placeholder="¿Recibe atención medica?" style="width:100%;">
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span6"> 
                  <label><strong>¿Porqué?:</strong></label>
                  <input type="text" id="recibe_atencion_medica_porque" name="recibe_atencion_medica_porque" placeholder="¿Porqué?" style="width:100%;">
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span6"> 
                  <label><strong>Operaciones:</strong></label> 
                  <input type="text" id="operaciones" name="operaciones" placeholder="Operaciones" style="width:100%;">
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span6"> 
                  <strong>Ha recibido tratamiento dental:</strong>
                  No <input type="radio" id="recibido_tratamiento_dental" name="recibido_tratamiento_dental" value="No" checked>
                  Si <input type="radio" id="recibido_tratamiento_dental" name="recibido_tratamiento_dental" value="Si">
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span6"> 
                  <strong>¿Ha sido anestesiado?:</strong>
                  No <input type="radio" id="anestesiado" name="anestesiado" value="No" checked>
                  Si <input type="radio" id="anestesiado" name="anestesiado" value="Si">
                </div>
              </div>
               <br />
              <div class="row"> 
                <div class="span6"> 
                  <label><strong>Efectos de la Anestesia:</strong></label>
                  <input type="text" id="efectos_anestesia" name="efectos_anestesia" placeholder="Efectos de la Anestesia" style="width:100%;">
                </div>
              </div>
              
            </div><!-- fin tab2 -->

            <div class="tab-pane" id="tab3">
              <h3>Examen Bucal</h3>
              <div class="row"> 
                <div class="span6"> 
                <h4>Oclusión de molares:</h4>
	      <strong>Derecha:</strong> <input type="text" id="oclusion_molares_derecha" name="oclusion_molares_derecha" placeholder="Derecha" style="width:100px;"> 
                <strong>Izquierda:</strong> <input type="text" id="oclusion_molares_izquierda" name="oclusion_molares_izquierda" placeholder="Izquierda" style="width:100px;">
                </div>
              </div>
	      <br />
              <div class="row"> 
                <div class="span8"> 
	      <strong>Sobremordida vertical (mm):</strong> <input type="text" id="sobremordida_vertical" name="sobremordida_vertical" style="width:100px;" placeholder="mm"> 
                <strong>Sobremordida horizontal (mm):</strong> <input type="text" id="sobremordida_horizontal" name="sobremordida_horizontal" style="width:100px;" placeholder="mm">
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span8"> 
	        <strong>Mordida abierta (mm):</strong> <input type="text" id="mordida_abierta" name="mordida_abierta" style="width:100px;" placeholder="mm"> 
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span3"> 
	        <label><strong>Erupción tardía:</strong></label>
                <input type="text" id="erupcion_tardia" name="erupcion_tardia" style="width:100%;" placeholder="Erupción tardía"> 
                </div>               
                <div class="span3"> 
	        <label><strong>Dientes ausentes:</strong></label>
                <input type="text" id="dientes_ausentes" name="dientes_ausentes" style="width:100%;" placeholder="Dientes ausentes"> 
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span3"> 
	        <label><strong>Perdida prematura D. temporal</strong></label>
                <input type="text" id="perdida_prematura" name="perdida_prematura" style="width:100%;" placeholder="Perdida prematura D. temporal"> 
                </div>
                <div class="span3"> 
	        <label><strong>Perdida prolongada D. temporal</strong></label>
                <input type="text" id="perdida_prolongada" name="perdida_prolongada" style="width:100%;" placeholder="Perdida prolongada D. temporal"> 
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span3"> 
	        <label><strong>Mordida cruzada posterior</strong></label>
                <input type="text" id="mordida_cruzada_posterior" name="mordida_cruzada_posterior" style="width:100%;" placeholder="Mordida cruzada posterior"> 
                </div>
                <div class="span3"> 
	        <label><strong>Mordida cruzada anterior</strong></label>
                <input type="text" id="mordida_cruzada_anterior" name="mordida_cruzada_anterior" style="width:100%;" placeholder="Mordida cruzada anterior"> 
                </div>
              </div> 
              <br />
              <div class="row"> 
                <div class="span3"> 
	        <label><strong>Estado periodontal</strong></label>
                <input type="text" id="estado_periodontal" name="estado_periodontal" style="width:100%;" placeholder="Estado periodontal"> 
                </div>
                <div class="span3"> 
	        <label><strong>Fistula</strong></label>
                <input type="text" id="fistula" name="fistula" style="width:100%;" placeholder="Fistula"> 
                </div>
              </div>
	      <br />
              <div class="row"> 
                <div class="span3"> 
	        <label><strong>Gingivitis</strong></label>
                <input type="text" id="gingivitis" name="gingivitis" style="width:100%;" placeholder="Gingivitis"> 
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span3"> 
	        <label><strong>Hábitos</strong></label>
                <input type="text" id="habitos" name="habitos" style="width:100%;" placeholder="Habitos"> 
                </div>
                <div class="span3"> 
	        <label><strong>Dolor de cabeza</strong></label>
                <input type="text" id="dolor_cabeza" name="dolor_cabeza" style="width:100%;" placeholder="Dolor de cabeza"> 
                </div>
              </div>
              
            </div><!-- fin tab3 -->

            <div class="tab-pane" id="tab4">
              <h3>Odontograma</h3>

              <input type="hidden" id="tipo-odontograma" value="normal">

              <p>
	          <a class="btn btn-institucional boton" id="sano">Sano (S)</a>
                  <a class="btn btn-institucional boton" id="obturacion">Obturado (O)</a>
                  <a class="btn btn-institucional boton" id="caries">Cariado (C)</a>
                  <a class="btn btn-institucional boton" id="diente-ausente">Ausente (A)</a>
                  <a class="btn btn-institucional boton" id="descalcificacion">Descalcificación (D)</a>
                  <a class="btn btn-institucional boton" id="patologia-pulpar">Patología Pulpar (PP)</a>
                  <a class="btn btn-institucional boton" id="fractura">Fractura (F)</a>
              </p>
              
              <h4>Permanentes</h4>

              <table class="table table-striped tabla-centrada">                
                <tbody>                  
                  <tr>
                    <td>18</td>
                    <td>17</td>
                    <td>16</td>
                    <td>15</td>
                    <td>14</td>
                    <td>13</td>
                    <td>12</td>
                    <td>11</td>
                    <td></td>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                    <td>28</td>
                  </tr>
                  <tr>
                    <td><span id="titulo-padecimiento-18">&nbsp;</span></td>  
                    <td><span id="titulo-padecimiento-17">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-16">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-15">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-14">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-13">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-12">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-11">&nbsp;</span></td> 
                    <td></td> 
                    <td><span id="titulo-padecimiento-21">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-22">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-23">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-24">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-25">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-26">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-27">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-28">&nbsp;</span></td>                      
                  </tr>
                  <tr>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-18">
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-18">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-18" id="campo-seleccionado-arriba-18">
                        </div>
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-18">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-18" id="campo-seleccionado-izquierda-18">
                        </div>
                        <div class="seleccionado-centro diente" id="seleccionado-centro-18">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-18" id="campo-seleccionado-centro-18">
                        </div>
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-18">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-18" name="campo-seleccionado-derecha-18">
                        </div>
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-18">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-18" name="campo-seleccionado-abajo-18">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-18" id="padecimiento-18">
                        <input type="hidden" value="0" name="numero-seleccionados-18" id="numero-seleccionados-18">
                      </div>
                    </td>
                      
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-17">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-17">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-17" id="campo-seleccionado-arriba-17">
                          </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-17">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-17" id="campo-seleccionado-izquierda-17">
                          </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-17">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-17" id="campo-seleccionado-centro-17">
                          </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-17">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-17" name="campo-seleccionado-derecha-17">
                          </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-17">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-17" name="campo-seleccionado-abajo-17">
                          </div>
                        <input type="hidden" value="0" name="padecimiento-17" id="padecimiento-17">
                        <input type="hidden" value="0" name="numero-seleccionados-17" id="numero-seleccionados-17">
                      </div>
                    </td>
                      
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-16">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-16">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-16" id="campo-seleccionado-arriba-16">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-16">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-16" id="campo-seleccionado-izquierda-16">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-16">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-16" id="campo-seleccionado-centro-16">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-16">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-16" name="campo-seleccionado-derecha-16">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-16">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-16" name="campo-seleccionado-abajo-16">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-16" id="padecimiento-16">
                        <input type="hidden" value="0" name="numero-seleccionados-16" id="numero-seleccionados-16"> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-15">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-15">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-15" id="campo-seleccionado-arriba-15">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-15">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-15" id="campo-seleccionado-izquierda-15">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-15">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-15" id="campo-seleccionado-centro-15">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-15">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-15" name="campo-seleccionado-derecha-15">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-15">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-15" name="campo-seleccionado-abajo-15">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-15" id="padecimiento-15">
                        <input type="hidden" value="0" name="numero-seleccionados-15" id="numero-seleccionados-15">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-14">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-14">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-14" id="campo-seleccionado-arriba-14">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-14">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-14" id="campo-seleccionado-izquierda-14">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-14">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-14" id="campo-seleccionado-centro-14">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-14">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-14" name="campo-seleccionado-derecha-14">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-14">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-14" name="campo-seleccionado-abajo-14">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-14" id="padecimiento-14">
                        <input type="hidden" value="0" name="numero-seleccionados-14" id="numero-seleccionados-14">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-13">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-13">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-13" id="campo-seleccionado-arriba-13">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-13">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-13" id="campo-seleccionado-izquierda-13">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-13">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-13" id="campo-seleccionado-centro-13">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-13">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-13" name="campo-seleccionado-derecha-13">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-13">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-13" name="campo-seleccionado-abajo-13">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-13" id="padecimiento-13">
                        <input type="hidden" value="0" name="numero-seleccionados-13" id="numero-seleccionados-13">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-12">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-12">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-12" id="campo-seleccionado-arriba-12">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-12">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-12" id="campo-seleccionado-izquierda-12">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-12">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-12" id="campo-seleccionado-centro-12">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-12">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-12" name="campo-seleccionado-derecha-12">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-12">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-12" name="campo-seleccionado-abajo-12">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-12" id="padecimiento-12">
                        <input type="hidden" value="0" name="numero-seleccionados-12" id="numero-seleccionados-12">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-11">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-11">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-11" id="campo-seleccionado-arriba-11">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-11">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-11" id="campo-seleccionado-izquierda-11">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-11">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-11" id="campo-seleccionado-centro-11">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-11">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-11" name="campo-seleccionado-derecha-11">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-11">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-11" name="campo-seleccionado-abajo-11">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-11" id="padecimiento-11">
                        <input type="hidden" value="0" name="numero-seleccionados-11" id="numero-seleccionados-11">  
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-21">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-21">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-21" id="campo-seleccionado-arriba-21">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-21">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-21" id="campo-seleccionado-izquierda-21">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-21">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-21" id="campo-seleccionado-centro-21">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-21">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-21" name="campo-seleccionado-derecha-21">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-21">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-21" name="campo-seleccionado-abajo-21">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-21" id="padecimiento-21">
                        <input type="hidden" value="0" name="numero-seleccionados-21" id="numero-seleccionados-21">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-22">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-22">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-22" id="campo-seleccionado-arriba-22">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-22">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-22" id="campo-seleccionado-izquierda-22">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-22">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-22" id="campo-seleccionado-centro-22">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-22">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-22" name="campo-seleccionado-derecha-22">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-22">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-22" name="campo-seleccionado-abajo-22">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-22" id="padecimiento-22">
                        <input type="hidden" value="0" name="numero-seleccionados-22" id="numero-seleccionados-22">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-23">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-23">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-23" id="campo-seleccionado-arriba-23">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-23">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-23" id="campo-seleccionado-izquierda-23">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-23">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-23" id="campo-seleccionado-centro-23">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-23">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-23" name="campo-seleccionado-derecha-23">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-23">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-23" name="campo-seleccionado-abajo-23">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-23" id="padecimiento-23">
                        <input type="hidden" value="0" name="numero-seleccionados-23" id="numero-seleccionados-23">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-24">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-24">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-24" id="campo-seleccionado-arriba-24">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-24">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-24" id="campo-seleccionado-izquierda-24">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-24">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-24" id="campo-seleccionado-centro-24">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-24">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-24" name="campo-seleccionado-derecha-24">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-24">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-24" name="campo-seleccionado-abajo-24">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-24" id="padecimiento-24">
                        <input type="hidden" value="0" name="numero-seleccionados-24" id="numero-seleccionados-24">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-25">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-25">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-25" id="campo-seleccionado-arriba-25">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-25">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-25" id="campo-seleccionado-izquierda-25">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-25">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-25" id="campo-seleccionado-centro-25">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-25">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-25" name="campo-seleccionado-derecha-25">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-25">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-25" name="campo-seleccionado-abajo-25">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-25" id="padecimiento-25">
                        <input type="hidden" value="0" name="numero-seleccionados-25" id="numero-seleccionados-25">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-26">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-26">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-26" id="campo-seleccionado-arriba-26">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-26">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-26" id="campo-seleccionado-izquierda-26">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-26">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-26" id="campo-seleccionado-centro-26">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-26">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-26" name="campo-seleccionado-derecha-26">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-26">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-26" name="campo-seleccionado-abajo-26">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-26" id="padecimiento-26">
                        <input type="hidden" value="0" name="numero-seleccionados-26" id="numero-seleccionados-26">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-27">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-27">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-27" id="campo-seleccionado-arriba-27">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-27">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-27" id="campo-seleccionado-izquierda-27">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-27">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-27" id="campo-seleccionado-centro-27">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-27">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-27" name="campo-seleccionado-derecha-27">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-27">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-27" name="campo-seleccionado-abajo-27">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-27" id="padecimiento-27">
                        <input type="hidden" value="0" name="numero-seleccionados-27" id="numero-seleccionados-27">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-28">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-28">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-28" id="campo-seleccionado-arriba-28">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-28">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-28" id="campo-seleccionado-izquierda-28">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-28">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-28" id="campo-seleccionado-centro-28">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-28">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-28" name="campo-seleccionado-derecha-28">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-28">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-28" name="campo-seleccionado-abajo-28">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-28" id="padecimiento-28">
                        <input type="hidden" value="0" name="numero-seleccionados-28" id="numero-seleccionados-28">    
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-striped tabla-centrada">                
                <tbody> 
                  <tr>
                    <td>48</td>
                    <td>47</td>
                    <td>46</td>
                    <td>45</td>
                    <td>44</td>
                    <td>43</td>
                    <td>42</td>
                    <td>41</td>
                    <td></td>
                    <td>31</td>
                    <td>32</td>
                    <td>33</td>
                    <td>34</td>
                    <td>35</td>
                    <td>36</td>
                    <td>37</td>
                    <td>38</td>
                  </tr>
                  <tr>
                    <td><span id="titulo-padecimiento-48">&nbsp;</span></td>  
                    <td><span id="titulo-padecimiento-47">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-46">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-45">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-44">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-43">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-42">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-41">&nbsp;</span></td> 
                    <td></td> 
                    <td><span id="titulo-padecimiento-31">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-32">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-33">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-34">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-35">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-36">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-37">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-38">&nbsp;</span></td>                      
                  </tr>
                  <tr>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-48">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-48">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-48" id="campo-seleccionado-arriba-48">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-48">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-48" id="campo-seleccionado-izquierda-48">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-48">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-48" id="campo-seleccionado-centro-48">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-48">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-48" name="campo-seleccionado-derecha-48">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-48">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-48" name="campo-seleccionado-abajo-48">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-48" id="padecimiento-48">
                        <input type="hidden" value="0" name="numero-seleccionados-48" id="numero-seleccionados-48">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-47">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-47">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-47" id="campo-seleccionado-arriba-47">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-47">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-47" id="campo-seleccionado-izquierda-47">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-47">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-47" id="campo-seleccionado-centro-47">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-47">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-47" name="campo-seleccionado-derecha-47">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-47">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-47" name="campo-seleccionado-abajo-47">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-47" id="padecimiento-47">
                        <input type="hidden" value="0" name="numero-seleccionados-47" id="numero-seleccionados-47">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-46">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-46">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-46" id="campo-seleccionado-arriba-46">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-46">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-46" id="campo-seleccionado-izquierda-46">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-46">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-46" id="campo-seleccionado-centro-46">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-46">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-46" name="campo-seleccionado-derecha-46">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-46">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-46" name="campo-seleccionado-abajo-46">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-46" id="padecimiento-46">
                        <input type="hidden" value="0" name="numero-seleccionados-46" id="numero-seleccionados-46">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-45">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-45">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-45" id="campo-seleccionado-arriba-45">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-45">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-45" id="campo-seleccionado-izquierda-45">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-45">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-45" id="campo-seleccionado-centro-45">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-45">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-45" name="campo-seleccionado-derecha-45">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-45">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-45" name="campo-seleccionado-abajo-45">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-45" id="padecimiento-45">
                        <input type="hidden" value="0" name="numero-seleccionados-45" id="numero-seleccionados-45">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-44">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-44">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-44" id="campo-seleccionado-arriba-44">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-44">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-44" id="campo-seleccionado-izquierda-44">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-44">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-44" id="campo-seleccionado-centro-44">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-44">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-44" name="campo-seleccionado-derecha-44">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-44">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-44" name="campo-seleccionado-abajo-44">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-44" id="padecimiento-44">
                        <input type="hidden" value="0" name="numero-seleccionados-44" id="numero-seleccionados-44">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-43">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-43">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-43" id="campo-seleccionado-arriba-43">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-43">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-43" id="campo-seleccionado-izquierda-43">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-43">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-43" id="campo-seleccionado-centro-43">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-43">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-43" name="campo-seleccionado-derecha-43">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-43">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-43" name="campo-seleccionado-abajo-43">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-43" id="padecimiento-43">
                        <input type="hidden" value="0" name="numero-seleccionados-43" id="numero-seleccionados-43">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-42">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-42">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-42" id="campo-seleccionado-arriba-42">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-42">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-42" id="campo-seleccionado-izquierda-42">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-42">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-42" id="campo-seleccionado-centro-42">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-42">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-42" name="campo-seleccionado-derecha-42">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-42">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-42" name="campo-seleccionado-abajo-42">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-42" id="padecimiento-42">
                        <input type="hidden" value="0" name="numero-seleccionados-42" id="numero-seleccionados-42">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-41">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-41">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-41" id="campo-seleccionado-arriba-41">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-41">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-41" id="campo-seleccionado-izquierda-41">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-41">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-41" id="campo-seleccionado-centro-41">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-41">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-41" name="campo-seleccionado-derecha-41">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-41">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-41" name="campo-seleccionado-abajo-41">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-41" id="padecimiento-41">
                        <input type="hidden" value="0" name="numero-seleccionados-41" id="numero-seleccionados-41">   
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-31">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-31">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-31" id="campo-seleccionado-arriba-31">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-31">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-31" id="campo-seleccionado-izquierda-31">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-31">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-31" id="campo-seleccionado-centro-31">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-31">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-31" name="campo-seleccionado-derecha-31">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-31">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-31" name="campo-seleccionado-abajo-31">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-31" id="padecimiento-31">
                        <input type="hidden" value="0" name="numero-seleccionados-31" id="numero-seleccionados-31">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-32">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-32">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-32" id="campo-seleccionado-arriba-32">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-32">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-32" id="campo-seleccionado-izquierda-32">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-32">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-32" id="campo-seleccionado-centro-32">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-32">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-32" name="campo-seleccionado-derecha-32">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-32">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-32" name="campo-seleccionado-abajo-32">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-32" id="padecimiento-32">
                        <input type="hidden" value="0" name="numero-seleccionados-32" id="numero-seleccionados-32">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-33">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-33">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-33" id="campo-seleccionado-arriba-33">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-33">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-33" id="campo-seleccionado-izquierda-33">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-33">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-33" id="campo-seleccionado-centro-33">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-33">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-33" name="campo-seleccionado-derecha-33">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-33">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-33" name="campo-seleccionado-abajo-33">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-33" id="padecimiento-33">
                        <input type="hidden" value="0" name="numero-seleccionados-33" id="numero-seleccionados-33">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-34">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-34">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-34" id="campo-seleccionado-arriba-34">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-34">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-34" id="campo-seleccionado-izquierda-34">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-34">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-34" id="campo-seleccionado-centro-34">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-34">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-34" name="campo-seleccionado-derecha-34">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-34">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-34" name="campo-seleccionado-abajo-34">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-34" id="padecimiento-34">
                        <input type="hidden" value="0" name="numero-seleccionados-34" id="numero-seleccionados-34">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-35">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-35">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-35" id="campo-seleccionado-arriba-35">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-35">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-35" id="campo-seleccionado-izquierda-35">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-35">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-35" id="campo-seleccionado-centro-35">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-35">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-35" name="campo-seleccionado-derecha-35">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-35">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-35" name="campo-seleccionado-abajo-35">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-35" id="padecimiento-35">
                        <input type="hidden" value="0" name="numero-seleccionados-35" id="numero-seleccionados-35">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-36">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-36">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-36" id="campo-seleccionado-arriba-36">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-36">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-36" id="campo-seleccionado-izquierda-36">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-36">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-36" id="campo-seleccionado-centro-36">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-36">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-36" name="campo-seleccionado-derecha-36">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-36">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-36" name="campo-seleccionado-abajo-36">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-36" id="padecimiento-36">
                        <input type="hidden" value="0" name="numero-seleccionados-36" id="numero-seleccionados-36">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-37">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-37">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-37" id="campo-seleccionado-arriba-37">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-37">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-37" id="campo-seleccionado-izquierda-37">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-37">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-37" id="campo-seleccionado-centro-37">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-37">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-37" name="campo-seleccionado-derecha-37">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-37">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-37" name="campo-seleccionado-abajo-37">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-37" id="padecimiento-37">
                        <input type="hidden" value="0" name="numero-seleccionados-37" id="numero-seleccionados-37">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-38">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-38">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-38" id="campo-seleccionado-arriba-38">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-38">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-38" id="campo-seleccionado-izquierda-38">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-38">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-38" id="campo-seleccionado-centro-38">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-38">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-38" name="campo-seleccionado-derecha-38">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-38">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-38" name="campo-seleccionado-abajo-38">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-38" id="padecimiento-38">
                        <input type="hidden" value="0" name="numero-seleccionados-38" id="numero-seleccionados-38">   
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

	      <h4>Temporales</h4>

	      <table class="table table-striped tabla-centrada">                
                <tbody>                  
                  <tr>
                    <td>55</td>
                    <td>54</td>
                    <td>53</td>
                    <td>52</td>
                    <td>51</td>
                    <td></td>
                    <td>61</td>
                    <td>62</td>
                    <td>63</td>
                    <td>64</td>
                    <td>65</td>
                  </tr>
                  <tr>
                    <td><span id="titulo-padecimiento-55">&nbsp;</span></td>  
                    <td><span id="titulo-padecimiento-54">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-53">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-52">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-51">&nbsp;</span></td> 
                    <td></td> 
                    <td><span id="titulo-padecimiento-61">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-62">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-63">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-64">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-65">&nbsp;</span></td>                      
                  </tr>
                  <tr>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-55">                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-55">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-55" id="campo-seleccionado-arriba-55">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-55">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-55" id="campo-seleccionado-izquierda-55">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-55">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-55" id="campo-seleccionado-centro-55">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-55">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-55" name="campo-seleccionado-derecha-55">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-55">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-55" name="campo-seleccionado-abajo-55">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-55" id="padecimiento-55">
                        <input type="hidden" value="0" name="numero-seleccionados-55" id="numero-seleccionados-55">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-54">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-54">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-54" id="campo-seleccionado-arriba-54">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-54">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-54" id="campo-seleccionado-izquierda-54">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-54">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-54" id="campo-seleccionado-centro-54">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-54">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-54" name="campo-seleccionado-derecha-54">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-54">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-54" name="campo-seleccionado-abajo-54">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-54" id="padecimiento-54">
                        <input type="hidden" value="0" name="numero-seleccionados-54" id="numero-seleccionados-54">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-53">                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-53">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-53" id="campo-seleccionado-arriba-53">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-53">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-53" id="campo-seleccionado-izquierda-53">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-53">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-53" id="campo-seleccionado-centro-53">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-53">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-53" name="campo-seleccionado-derecha-53">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-53">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-53" name="campo-seleccionado-abajo-53">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-53" id="padecimiento-53">
                        <input type="hidden" value="0" name="numero-seleccionados-53" id="numero-seleccionados-53">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-52">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-52">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-52" id="campo-seleccionado-arriba-52">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-52">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-52" id="campo-seleccionado-izquierda-52">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-52">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-52" id="campo-seleccionado-centro-52">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-52">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-52" name="campo-seleccionado-derecha-52">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-52">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-52" name="campo-seleccionado-abajo-52">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-52" id="padecimiento-52">
                        <input type="hidden" value="0" name="numero-seleccionados-52" id="numero-seleccionados-52">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-51">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-51">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-51" id="campo-seleccionado-arriba-51">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-51">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-51" id="campo-seleccionado-izquierda-51">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-51">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-51" id="campo-seleccionado-centro-51">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-51">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-51" name="campo-seleccionado-derecha-51">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-51">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-51" name="campo-seleccionado-abajo-51">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-51" id="padecimiento-51">
                        <input type="hidden" value="0" name="numero-seleccionados-51" id="numero-seleccionados-51">  
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-61">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-61">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-61" id="campo-seleccionado-arriba-61">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-61">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-61" id="campo-seleccionado-izquierda-61">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-61">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-61" id="campo-seleccionado-centro-61">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-61">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-61" name="campo-seleccionado-derecha-61">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-61">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-61" name="campo-seleccionado-abajo-61">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-61" id="padecimiento-61">
                        <input type="hidden" value="0" name="numero-seleccionados-61" id="numero-seleccionados-61">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-62">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-62">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-62" id="campo-seleccionado-arriba-62">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-62">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-62" id="campo-seleccionado-izquierda-62">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-62">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-62" id="campo-seleccionado-centro-62">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-62">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-62" name="campo-seleccionado-derecha-62">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-62">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-62" name="campo-seleccionado-abajo-62">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-62" id="padecimiento-62">
                        <input type="hidden" value="0" name="numero-seleccionados-62" id="numero-seleccionados-62">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-23">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-63">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-63" id="campo-seleccionado-arriba-63">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-63">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-63" id="campo-seleccionado-izquierda-63">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-63">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-63" id="campo-seleccionado-centro-63">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-63">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-63" name="campo-seleccionado-derecha-63">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-63">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-63" name="campo-seleccionado-abajo-63">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-63" id="padecimiento-63">
                        <input type="hidden" value="0" name="numero-seleccionados-63" id="numero-seleccionados-63">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-64">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-64">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-64" id="campo-seleccionado-arriba-64">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-64">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-64" id="campo-seleccionado-izquierda-64">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-64">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-64" id="campo-seleccionado-centro-64">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-64">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-64" name="campo-seleccionado-derecha-64">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-64">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-64" name="campo-seleccionado-abajo-64">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-64" id="padecimiento-64">
                        <input type="hidden" value="0" name="numero-seleccionados-64" id="numero-seleccionados-64">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-65">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-65">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-65" id="campo-seleccionado-arriba-65">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-65">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-65" id="campo-seleccionado-izquierda-65">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-65">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-65" id="campo-seleccionado-centro-65">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-65">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-65" name="campo-seleccionado-derecha-65">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-65">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-65" name="campo-seleccionado-abajo-65">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-65" id="padecimiento-65">
                        <input type="hidden" value="0" name="numero-seleccionados-65" id="numero-seleccionados-65">    
                      </div>
                    </td>
                </tbody>
              </table>

	      <table class="table table-striped tabla-centrada">                
                <tbody>                  
                  <tr>
                    <td>85</td>
                    <td>84</td>
                    <td>83</td>
                    <td>82</td>
                    <td>81</td>
                    <td></td>
                    <td>71</td>
                    <td>72</td>
                    <td>73</td>
                    <td>74</td>
                    <td>75</td>
                  </tr>
                  <tr>
                    <td><span id="titulo-padecimiento-85">&nbsp;</span></td>  
                    <td><span id="titulo-padecimiento-84">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-83">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-82">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-81">&nbsp;</span></td> 
                    <td></td> 
                    <td><span id="titulo-padecimiento-71">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-72">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-73">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-74">&nbsp;</span></td> 
                    <td><span id="titulo-padecimiento-75">&nbsp;</span></td>                      
                  </tr>
                  <tr>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-85">                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-85">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-85" id="campo-seleccionado-arriba-85">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-85">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-85" id="campo-seleccionado-izquierda-85">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-85">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-85" id="campo-seleccionado-centro-85">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-85">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-85" name="campo-seleccionado-derecha-85">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-85">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-85" name="campo-seleccionado-abajo-85">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-85" id="padecimiento-85">
                        <input type="hidden" value="0" name="numero-seleccionados-85" id="numero-seleccionados-85">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-84">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-84">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-84" id="campo-seleccionado-arriba-84">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-84">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-84" id="campo-seleccionado-izquierda-84">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-84">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-84" id="campo-seleccionado-centro-84">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-84">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-84" name="campo-seleccionado-derecha-84">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-84">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-84" name="campo-seleccionado-abajo-84">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-84" id="padecimiento-84">
                        <input type="hidden" value="0" name="numero-seleccionados-84" id="numero-seleccionados-84">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-83">                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-83">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-83" id="campo-seleccionado-arriba-83">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-83">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-83" id="campo-seleccionado-izquierda-83">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-83">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-83" id="campo-seleccionado-centro-83">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-83">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-83" name="campo-seleccionado-derecha-83">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-83">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-83" name="campo-seleccionado-abajo-83">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-83" id="padecimiento-83">
                        <input type="hidden" value="0" name="numero-seleccionados-83" id="numero-seleccionados-83">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-82">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-82">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-82" id="campo-seleccionado-arriba-82">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-82">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-82" id="campo-seleccionado-izquierda-82">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-82">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-82" id="campo-seleccionado-centro-82">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-82">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-82" name="campo-seleccionado-derecha-82">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-82">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-82" name="campo-seleccionado-abajo-82">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-82" id="padecimiento-82">
                        <input type="hidden" value="0" name="numero-seleccionados-82" id="numero-seleccionados-82">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-81">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-81">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-81" id="campo-seleccionado-arriba-81">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-81">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-81" id="campo-seleccionado-izquierda-81">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-81">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-81" id="campo-seleccionado-centro-81">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-81">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-81" name="campo-seleccionado-derecha-81">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-81">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-81" name="campo-seleccionado-abajo-81">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-81" id="padecimiento-81">
                        <input type="hidden" value="0" name="numero-seleccionados-81" id="numero-seleccionados-81">  
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-71">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-71">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-71" id="campo-seleccionado-arriba-71">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-71">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-71" id="campo-seleccionado-izquierda-71">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-71">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-71" id="campo-seleccionado-centro-71">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-71">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-71" name="campo-seleccionado-derecha-71">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-71">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-71" name="campo-seleccionado-abajo-71">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-71" id="padecimiento-71">
                        <input type="hidden" value="0" name="numero-seleccionados-71" id="numero-seleccionados-71">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-72">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-72">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-72" id="campo-seleccionado-arriba-72">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-72">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-72" id="campo-seleccionado-izquierda-72">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-72">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-72" id="campo-seleccionado-centro-72">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-72">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-72" name="campo-seleccionado-derecha-72">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-72">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-72" name="campo-seleccionado-abajo-72">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-72" id="padecimiento-72">
                        <input type="hidden" value="0" name="numero-seleccionados-72" id="numero-seleccionados-72">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-73">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-73">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-73" id="campo-seleccionado-arriba-73">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-73">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-73" id="campo-seleccionado-izquierda-73">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-73">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-73" id="campo-seleccionado-centro-73">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-73">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-73" name="campo-seleccionado-derecha-73">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-73">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-73" name="campo-seleccionado-abajo-73">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-73" id="padecimiento-73">
                        <input type="hidden" value="0" name="numero-seleccionados-73" id="numero-seleccionados-73">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-74">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-74">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-74" id="campo-seleccionado-arriba-74">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-74">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-74" id="campo-seleccionado-izquierda-74">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-74">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-74" id="campo-seleccionado-centro-74">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-74">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-74" name="campo-seleccionado-derecha-74">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-74">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-74" name="campo-seleccionado-abajo-74">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-74" id="padecimiento-74">
                        <input type="hidden" value="0" name="numero-seleccionados-74" id="numero-seleccionados-74">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-75">
                          
                        <div class="seleccionado-arriba diente" id="seleccionado-arriba-75">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-75" id="campo-seleccionado-arriba-75">
                        </div>
                          
                        <div class="seleccionado-izquierda diente" id="seleccionado-izquierda-75">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-75" id="campo-seleccionado-izquierda-75">
                        </div>
                          
                        <div class="seleccionado-centro diente" id="seleccionado-centro-75">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-75" id="campo-seleccionado-centro-75">
                        </div>
                          
                        <div class="seleccionado-derecha diente" id="seleccionado-derecha-75">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-75" name="campo-seleccionado-derecha-75">
                        </div>
                          
                        <div class="seleccionado-abajo diente" id="seleccionado-abajo-75">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-75" name="campo-seleccionado-abajo-75">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-75" id="padecimiento-75">
                        <input type="hidden" value="0" name="numero-seleccionados-75" id="numero-seleccionados-75">    
                      </div>
                    </td>
                </tbody>
              </table>

            </div><!-- fin tab4 -->  

            <div class="tab-pane" id="tab5">  
	      <h3>Información Dental</h3>
	      <div class="row"> 
                <div class="span6"> 
	        <label><strong>Motivo de la consulta</strong></label>
                <input type="text" id="motivo_consulta" name="motivo_consulta" style="width:100%;" placeholder="Motivo de la Consulta"> 
                </div>
              </div>
	      <br />
              <div class="row"> 
                <div class="span6"> 
	      <label><strong>¿Ha sido atendido el niño(a) en un consultorio dental?</strong>
                No <input type="radio" id="atendido_consultorio_dental" name="atendido_consultorio_dental" value="No" checked> 
	        Si <input type="radio" id="atendido_consultorio_dental" name="atendido_consultorio_dental" value="Si"></label>
                </div>
              </div>
	      <br />
              <div class="row"> 
                <div class="span6"> 
	        <label><strong>¿Como ha sido su experiencia dental previa?</strong>
                Buena <input type="radio" id="experiencia_dental_previa" name="experiencia_dental_previa" value="Buena" checked> 
	        Mala <input type="radio" id="experiencia_dental_previa" name="experiencia_dental_previa" value="Mala"></label>
                </div>
              </div>
	      <br />
              <div class="row"> 
                <div class="span6"> 
	        <label><strong>¿Practica el paciente algún deporte?</strong>
                No <input type="radio" id="practica_deporte" name="practica_deporte" value="No" checked> 
	        Si <input type="radio" id="practica_deporte" name="practica_deporte" value="Si"></label>
                </div>
              </div>
	      <br />
              <div class="row"> 
                <div class="span6"> 
	        <label><strong>¿Cual?</strong></label>
                <input type="text" id="practica_deporte_cual" name="practica_deporte_cual" placeholder="¿Cual?" style="width:100%"> 
                </div>
              </div>
	      <br />
	      <h4>¿Ha tenido o tiene alguno de los siguientes habitos?</h4>
              <div class="row"> 
                <div class="span6"> 
	        <label><strong>Succión del dedo:</strong>
                No <input type="radio" id="succion_dedo" name="succion_dedo" value="No" checked> 
	        Si <input type="radio" id="succion_dedo" name="succion_dedo" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	        <label><strong>Morderse la uñas:</strong>
                No <input type="radio" id="morderse_unas" name="morderse_unas" value="No" checked> 
	        Si <input type="radio" id="morderse_unas" name="morderse_unas" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	        <label><strong>Morderse los labios:</strong>
                No <input type="radio" id="morderse_labios" name="morderse_labios" value="No" checked> 
	        Si <input type="radio" id="morderse_labios" name="morderse_labios" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	        <label><strong>Duerme con la boca abierta:</strong>
                No <input type="radio" id="duerme_boca_abierta" name="duerme_boca_abierta" value="No" checked> 
	        Si <input type="radio" id="duerme_boca_abierta" name="duerme_boca_abierta" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	        <label><strong>Rechinar los dientes:</strong>
                No <input type="radio" id="rechinar_dientes" name="rechinar_dientes" value="No" checked> 
	        Si <input type="radio" id="rechinar_dientes" name="rechinar_dientes" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	        <label><strong>Dolor de cabeza frecuente:</strong>
                No <input type="radio" id="dolor_cabeza_frecuente" name="dolor_cabeza_frecuente" value="No" checked> 
	        Si <input type="radio" id="dolor_cabeza_frecuente" name="dolor_cabeza_frecuente" value="Si"></label>
                </div>
              </div>
	    </div><!-- fin tab5 -->

	    <div class="tab-pane" id="tab6">  
	      <h3>Información Médica</h3>
	      <div class="row"> 
                <div class="span6"> 
	        <label><strong>¿Padece el paciente de alguna enfermedad actualmente?</strong>
                No <input type="radio" id="padece_enfermedad_actualmente" name="padece_enfermedad_actualmente" value="No" checked> 
	        Si <input type="radio" id="padece_enfermedad_actualmente" name="padece_enfermedad_actualmente" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	        <label><strong>¿Cual?</strong></label>
                <input type="text" id="padece_enfermedad_actualmente_cual" name="padece_enfermedad_actualmente_cual" placeholder="¿Cual?" style="width:100%;"> 
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	        <label><strong>¿Esta recibiendo algún medicamento?</strong>
                No <input type="radio" name="recibiendo_medicamento" value="No" checked> 
	        Si <input type="radio" name="recibiendo_medicamento" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	        <label><strong>¿Cual?</strong></label>
                <input type="text" name="recibiendo_medicamento_cual" placeholder="¿Cual?" style="width:100%;"> 
                </div>
              </div>
	      <br />
	      <h4>¿Ha padecido o padece alguna de las siguientes infecciones?</h4>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Desordenes emocionales:</strong>
	        No <input type="radio" name="desordenes_emocionales" value="No" checked> 
	        Si <input type="radio" name="desordenes_emocionales" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Sangrado persistente:</strong>
	        No <input type="radio" name="sangrado_persistente" value="No" checked> 
	        Si <input type="radio" name="sangrado_persistente" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Hepatitis:</strong>
	        No <input type="radio" name="hepatitis" value="No" checked> 
	        Si <input type="radio" name="hepatitis" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Hemofilia:</strong>
	        No <input type="radio" name="hemofilia" value="No" checked> 
	        Si <input type="radio" name="hemofilia" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Fiebre reumática:</strong>
	        No <input type="radio" name="fiebre_reumatica" value="No" checked> 
	        Si <input type="radio" name="fiebre_reumatica" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Convulsiones:</strong>
	        No <input type="radio" name="convulsiones" value="No" checked> 
	        Si <input type="radio" name="convulsiones" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Obstrucción nasal crónica:</strong>
	        No <input type="radio" name="obstruccion_nasal_cronica" value="No" checked> 
	        Si <input type="radio" name="obstruccion_nasal_cronica" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Accidentes en la cabeza y/o cara:</strong>
	        No <input type="radio" name="accidentes_cabeza_cara" value="No" checked> 
	        Si <input type="radio" name="accidentes_cabeza_cara" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>¿Cuándo?:</strong>
	        No <input type="radio" name="accidentes_cabeza_cara_cuando" value="No" checked> 
	        Si <input type="radio" name="accidentes_cabeza_cara_cuando" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Es alérgico:</strong>
	        No <input type="radio" name="alergico" value="No" checked> 
	        Si <input type="radio" name="alergico" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>¿A que?</strong>
	        No <input type="radio" name="alergico_que" value="No" checked> 
	        Si <input type="radio" name="alergico_que" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Infecciones frecuentes de garganta</strong>
	        No <input type="radio" name="infecciones_frecuentes_garganta" value="No" checked> 
	        Si <input type="radio" name="infecciones_frecuentes_garganta" value="Si"></label>
                </div>
              </div>
	      <h4>¿Ha sido operado de...?</h4>
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Amigdalas (anginas)</strong>
	        No <input type="radio" name="operado_amigdalas" value="No" checked> 
	        Si <input type="radio" name="operado_amigdalas" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	        <label><strong>¿Cuándo?</strong></label>
	        <input type="text" name="operado_amigdalas_cuando" placeholder="¿Cuando?">
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	      <label><strong>Adenoides</strong>
	        No <input type="radio" name="adenoides" value="No" checked> 
	        Si <input type="radio" name="adenoides" value="Si"></label>
                </div>
              </div>
	      <div class="row"> 
                <div class="span6"> 
	          <label><strong>¿Cuándo?</strong></label>
	          <input type="text" name="adenoides_cuando" placeholder="¿Cuando?">
                </div>
              </div>
	   </div><!-- fin tab6 -->

	   <div class="tab-pane" id="tab7">  
	      <h3>Examen Radiogragico</h3>
	      <div class="row"> 
                <div class="span3"> 
	          <label><strong>Ausentes congénitamente:</strong>
                  <input type="text" id="ausentes_congenitamente" name="ausentes_congenitamente" style="width:50px;"></label>
                </div>
	        <div class="span3"> 
	          <label><strong>Supernumerarios:</strong>
                  <input type="text" id="supernumerarios" name="supernumerarios" style="width:50px;"></label>
                </div>
	        <div class="span3"> 
	          <label><strong>Malformados:</strong>
                  <input type="text" id="malformados" name="malformados" style="width:50px;"></label>
                </div>
              </div>

	      <div class="row"> 
                <div class="span3"> 
	          <label><strong>Lesiones periapicales:</strong>
                  <input type="text" id="lesiones_periapicales" name="lesiones_periapicales" style="width:50px;"></label>
                </div>
	        <div class="span3"> 
	          <label><strong>Quistes:</strong>
                  <input type="text" id="quistes" name="quistes" style="width:50px;"></label>
                </div>
	        <div class="span3"> 
	          <label><strong>Incluidos:</strong>
                  <input type="text" id="incluidos" name="incluidos" style="width:50px;"></label>
                </div>
              </div>

	      <div class="row"> 
                <div class="span3"> 
	          <label><strong>Raíces anormales:</strong>
                  <input type="text" id="raices_anormales" name="raices_anormales" style="width:50px;"></label>
                </div>
	        <div class="span3"> 
	          <label><strong>Resorción radicular:</strong>
                  <input type="text" id="resorcion_radicular" name="resorcion_radicular" style="width:50px;"></label>
                </div>
	        <div class="span3"> 
	          <label><strong>Terceros molares:</strong>
                  <input type="text" id="terceros_molares" name="terceros_molares" style="width:50px;"></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span8"> 
	          <label><strong>Traumatismos:</strong>
                  <input type="text" id="traumatismos" name="traumatismos" style="width:100%;" placeholder="Traumatismos"></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span8"> 
	          <label><strong>Otras patologías:</strong>
                  <input type="text" id="otras_patologias" name="otras_patologias" style="width:100%;" placeholder="Otras patologías"></label>
                </div>
              </div>
	   </div><!-- fin tab7 -->

	   <div class="tab-pane" id="tab8">  
	      <h3>Diagnostico de Riesgos de Caries</h3>
	      <div class="row"> 
                <div class="span5"> 
	          <label><strong>Riesgo:</strong>
                  <input type="text" id="riesgo" name="riesgo" style="width:100%;" placeholder="Riesgo"></label>
                </div>  
	      </div> 
	      <br />
	      <div class="row"> 
                <div class="span8"> 
	          <table class="table table-striped">
	            <tr>
	               <th style="text-align:center;">Clasificación de riesgo de3 caries (del 0 al 3)</th>
	               <th style="text-align:center;">0<br />Sin</th>
	               <th style="text-align:center;">1<br />Bajo</th>
	               <th style="text-align:center;">2<br />Mediano</th>
	               <th style="text-align:center;">3<br />Alto</th>
	            </tr>
	            <tr>
	               <td>1.- Existencia ded caries clinicas o radiografias</td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-1" value="0" checked></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-1" value="1"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-1" value="2"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-1" value="3"></td>
	            </tr>
	            <tr>
	               <td>2.- Presencia de restauraciones en boca</td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-2" value="0" checked></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-2" value="1"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-2" value="2"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-2" value="3"></td>
	            </tr>
	            <tr>
	               <td>3.- Utilización de agentes fluorados</td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-3" value="0" checked></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-3" value="1"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-3" value="2"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-3" value="3"></td>
	            </tr>
	            <tr>
	               <td>4.- Ingesta de carbohidratos entre comidas</td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-4" value="0" checked></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-4" value="1"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-4" value="2"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-4" value="3"></td>
	            </tr>
	            <tr>
	               <td>5.- Niveles de infección streptococo en saliva</td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-5" value="0" checked></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-5" value="1"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-5" value="2"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-5" value="3"></td>
	            </tr>
	            <tr>
	               <td>6.- Niveles de infección de lactobacilos en saliva</td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-6" value="0" checked></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-6" value="1"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-6" value="2"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-6" value="3"></td>
	            </tr>
	            <tr>
	               <td>7.- Niveles de flujo salival</td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-7" value="0" checked></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-7" value="1"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-7" value="2"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-7" value="3"></td>
	            </tr>
	            <tr>
	               <td>8.- Niveles de PH de saliva</td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-8" value="0" checked></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-8" value="1"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-8" value="2"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-8" value="3"></td>
	            </tr>
	            <tr>
	               <td>9.- Higiene bucal</td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-9" value="0" checked></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-9" value="1"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-9" value="2"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-9" value="3"></td>
	            </tr>
	            <tr>
	               <td>10.- Utilización de antimicrobianos</td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-10" value="0" checked></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-10" value="1"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-10" value="2"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-10" value="3"></td>
	            </tr>
	            <tr>
	               <td>11.- Motivación del pacientes</td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-11" value="0" checked></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-11" value="1"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-11" value="2"></td>
	               <td style="text-align:center;"><input type="radio" name="pregunta-11" value="3"></td>
	            </tr>
	          </table>
                </div>  
	      </div> 
	   </div><!-- fin tab8 -->

	   <div class="tab-pane" id="tab9">  
	      <h3>Diagnostico Integral</h3>
	      <div class="row"> 
                <div class="span7"> 
                  <p><input type="text" id="diagnistico-integral-1" name="diagnistico-integral-1" style="width:100%;" placeholder="Diagnostico Integral"></p>
                  <p><input type="text" id="diagnistico-integral-2" name="diagnistico-integral-2" style="width:100%;" placeholder="Diagnostico Integral"></p>
                  <p><input type="text" id="diagnistico-integral-3" name="diagnistico-integral-3" style="width:100%;" placeholder="Diagnostico Integral"></p>
                  <p><input type="text" id="diagnistico-integral-4" name="diagnistico-integral-4" style="width:100%;" placeholder="Diagnostico Integral"></p>
                  <p><input type="text" id="diagnistico-integral-5" name="diagnistico-integral-5" style="width:100%;" placeholder="Diagnostico Integral"></p>
                  <p><input type="text" id="diagnistico-integral-6" name="diagnistico-integral-6" style="width:100%;" placeholder="Diagnostico Integral"></p>
                </div>  
	      </div>
	   </div><!-- fin tab9 -->
	      
	   <div class="tab-pane" id="tab10">  
	      <h3>Plan de Tratamiento</h3>
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>Prevención:</strong></label>
                  <input type="text" name="prevencion" style="width:100%;" placeholder="Prevención">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>Operación:</strong></label>
                  <input type="text" name="operacion" style="width:100%;" placeholder="Operación">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>Ortodoncia preventiva:</strong></label>
                  <input type="text" name="ortodoncia-preventiva" style="width:100%;" placeholder="Ortodoncia preventiva">
                </div>  
	      </div>
	   </div><!-- fin tab10 -->

	   <div class="tab-pane" id="tab11">  
	      <h3>Plan de Tratamiento por Citas</h3>
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>1ra. Cita:</strong></label>
                  <input type="text" name="cita-1" style="width:100%;" placeholder="1ra. Cita">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>2da. Cita:</strong></label>
                  <input type="text" name="cita-2" style="width:100%;" placeholder="2da. Cita">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>3ra. Cita:</strong></label>
                  <input type="text" name="cita-3" style="width:100%;" placeholder="3ra. Cita">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>4ta. Cita:</strong></label>
                  <input type="text" name="cita-4" style="width:100%;" placeholder="4ta. Cita">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>5ta. Cita:</strong></label>
                  <input type="text" name="cita-5" style="width:100%;" placeholder="5ta. Cita">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>6ta. Cita:</strong></label>
                  <input type="text" name="cita-6" style="width:100%;" placeholder="6ta. Cita">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>7ma. Cita:</strong></label>
                  <input type="text" name="cita-7" style="width:100%;" placeholder="7ma. Cita">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>8va. Cita:</strong></label>
                  <input type="text" name="cita-8" style="width:100%;" placeholder="8va. Cita">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>9na. Cita:</strong></label>
                  <input type="text" name="cita-9" style="width:100%;" placeholder="9na. Cita">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>10ma. Cita:</strong></label>
                  <input type="text" name="cita-10" style="width:100%;" placeholder="10ma. Cita">
                </div>  
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	          <label><strong>11va. Cita:</strong></label>
                  <input type="text" name="cita-11" style="width:100%;" placeholder="11va. Cita">
                </div>  
	      </div>
	   </div><!-- fin tab11 -->

        </div><!-- fin tabcontent -->

        </div><!-- well -->

        <div align="row">
          <input type="submit" class="btn btn-institucional guardar" name="guardar" value="Guardar">
            
            <a href="../clinica/formatohistoriaclinicaendodoncia.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
        </div>
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->      

<script type="text/javascript" src="../js/chrome.js"></script>  

<?php include("../footer2.php"); ?>