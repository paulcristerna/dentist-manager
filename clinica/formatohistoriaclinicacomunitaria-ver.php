<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="formato-historia-comunitaria">
<script src="validacion_formatohistoriacomunitaria.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php //include("../core-saec/Paciente.php"); ?>
        <?php //include("../core-saec/Pareja_Clinica.php"); ?>
        <?php include("../core-saec/Formato_Historia_Clinica_Comunitaria.php"); ?>

        <div class="span9">

        <h2>Formato de Historia Clínica Comunitaria</h2>
		<div id="campo-error"></div>

        <div class="well" style="width:1150px;">
            
        <form method="post" action="validacion_formatohistoriacomunitaria.php" onsubmit="return validacion()">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Signos Vitales</a></li>
            <li><a href="#tab3">Cuestionario de Evaluación</a></li>
            <li><a href="#tab4">Examen de la Cavidad Oral</a></li>
            <li><a href="#tab5">Odontograma</a></li>
          </ul>
            
          <?php 
            $Formato_Historia_Clinica_Comunitaria = new Formato_Historia_Clinica_Comunitaria();

            $Formato_Historia_Clinica_Comunitaria->IdHistoriaClinicaComunitaria = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Comunitaria->Obtener_Formato();

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
          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <h2>Datos del Paciente</h2>
              <br>
              <div class="row"> 
                <div class="span4"> 
                  <label><strong>Nombre:</strong></label>
                  <?php echo $Datos_Formato['NombrePaciente']; ?>
                  <?php echo $Datos_Formato['ApellidoPaternoPaciente']; ?>
                  <?php echo $Datos_Formato['ApellidoMaternoPaciente']; ?>
                </div>
		<div class="span1"> 
                  <label><strong>Sexo: </strong></label>
		  <?php echo $Datos_Formato['SexoPaciente']; ?>
              	</div>
                <div class="span4"> 
                  <label><strong>Edad: </strong></label>
		  <?php echo (isset($Edad) ? $Edad:"0"); ?> Año(s).</div>
              </div>
		<br>
	      <div class="row"> 
                <div class="span4"> 
	          <label><strong>Calle: </strong></label>
                <?php echo $Datos_Formato['CallePaciente']; ?></div>
		<div class="span1"> 
	          <label><strong>Numero: </strong></label>
	          <?php echo $Datos_Formato['NumeroPaciente']; ?></div>
	      </div>
	      <br />
	      <div class="row"> 
		<div class="span4"> 
	          <label><strong>Colonia: </strong></label>
	          <?php echo $Datos_Formato['ColoniaPaciente']; ?></div>
		<div class="span2"> 
	          <label><strong>Población: </strong></label>
                <?php echo $Datos_Formato['PoblacionPaciente']; ?></div>
	      </div>
	      <br />
              <div class="row">                  
                <div class="span2"> 
	          <label><strong>Teléfono:</strong></label>
	          <?php echo $Datos_Formato['TelefonoPaciente']; ?></div>
                <div class="span2"> 
	          <label><strong>Ocupación: </strong></label>
	          <?php echo $Datos_Formato['OcupacionPaciente']; ?></div>
              </div>
	       <br />
              <div class="row">
                <div class="span3"> 
                  <label><strong>Estado Civil: </strong></label>
	               <?php echo $Datos_Formato['EstadoCivilPaciente']; ?>
                </div> 
	        <div class="span4"> 
                  <label><strong>Escolaridad: </strong></label>
	               <?php echo $Datos_Formato['EscolaridadPaciente']; ?>
                </div> 
              </div>
	      <br />
              <div class="row">
                <div class="span6"> 
                  <label><strong>Padecimiento actual: </strong></label>
		  <?php echo $Datos_Formato['PadecimientoActual']; ?>
                </div> 
              </div> 
            </div><!-- fin tab1 -->

            <div class="tab-pane" id="tab2">
              <h3>Signos Vitales</h3>
              <div class="row"> 
                <div class="span2"> 
                  <strong>Temperatura: </strong>
                  <?php echo $Datos_Formato['Temperatura']; ?>
                </div>
	        <div class="span2"> 
                  <strong>Pulso: </strong>
                  <?php echo $Datos_Formato['Pulso']; ?>
                </div>
	        <div class="span3"> 
                  <strong>Presion arterial: </strong>
                  <?php echo $Datos_Formato['PresionArterial']; ?>
                </div>
              </div>
              <br />
	      <div class="row"> 
                <div class="span2"> 
                  <strong>Respiración: </strong>
                  <?php echo $Datos_Formato['Respiracion']; ?>
                </div>
	        <div class="span2"> 
                  <strong>Altura: </strong>
                  <?php echo $Datos_Formato['Altura']; ?>
                </div>
	        <div class="span2"> 
                  <strong>Peso: </strong>
                  <?php echo $Datos_Formato['Peso']; ?>
                </div>
              </div>           
            </div><!-- fin tab2 -->

            <div class="tab-pane" id="tab3">
              <h3>Cuestionario de Evaluación</h3>
              <div class="row"> 
                <div class="span6"> 
	         <label><strong>1. ¿Está o estuvo en los últimos 12 meses bajo Tx médico? </strong> 
                 <?php echo $Datos_Formato['Pregunta1']; ?>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>2. ¿Padece de alergia o reacción de sensibilidad conocida? </strong> 
            <?php echo $Datos_Formato['Pregunta2']; ?></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span7"> 
	         <label><strong>3. ¿Tuvo alguna vez una reacción desfavorable con los anestésicos locales? </strong> 
                <?php echo $Datos_Formato['Pregunta3']; ?></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>4. ¿Padece o padeció algún trastorno cardiaco? </strong> 
                 <?php echo $Datos_Formato['Pregunta4']; ?></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>5. ¿Tiene presión arterial alta? </strong> 
                 <?php echo $Datos_Formato['Pregunta5']; ?>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>6. ¿Es usted diabético? </strong> 
                 <?php echo $Datos_Formato['Pregunta6']; ?></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>7. ¿Tiene algún trastorno de tipo epiléptico convulsivo? </strong> 
                 <?php echo $Datos_Formato['Pregunta7']; ?></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>8. ¿Padece o padeció hepatitis? </strong> 
                 <?php echo $Datos_Formato['Pregunta8']; ?></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>9. ¿Tiene o tuvo algún padecimiento quirúrgico o infeccioso? </strong> 
                 <?php echo $Datos_Formato['Pregunta9']; ?></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>10. ¿Alctualmente está tomando algún medicamento? </strong> 
                 <?php echo $Datos_Formato['Pregunta10']; ?></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>11. ¿Es usted propenso a hemorragia? </strong> 
                 <?php echo $Datos_Formato['Pregunta11']; ?></label>
                </div>
              </div>
	      <br />
	      <h4>Únicamente Mujeres:</h4>
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>12. ¿Esta tomando anticonceptivos? </strong> 
                 <?php echo $Datos_Formato['Pregunta12']; ?></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>13. ¿Está embarazada? </strong> 
                 <?php echo $Datos_Formato['Pregunta13']; ?></label>
                </div>
              </div>
	      <br />
	      <div class="row"> 
                <div class="span6"> 
	         <label><strong>14. ¿Ha observado algún cambio en su periodo de menstruación?</strong> 
                 <?php echo $Datos_Formato['Pregunta14']; ?></label>
                </div>
              </div>

            </div><!-- fin tab3 -->

	    <div class="tab-pane" id="tab4">
              <h3>Examen de la Cavidad Oral</h3>
              <div class="row"> 
                <div class="span3"> 
                  <label><strong>Cara: </strong></label>
                  <?php echo $Datos_Formato['Cara']; ?>
                </div>
	        <div class="span3"> 
                  <label><strong>Labios: </strong></label>
                  <?php echo $Datos_Formato['Labios']; ?>
                </div>
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span3"> 
                  <label><strong>Macosa bucal: </strong></label>
                  <?php echo $Datos_Formato['MucosaBucal']; ?>
                </div>
	        <div class="span3"> 
                  <label><strong>Lengua: </strong></label>
                  <?php echo $Datos_Formato['Lengua']; ?>
                </div>
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span3"> 
                  <label><strong>Piso de boca: </strong></label>
                  <?php echo $Datos_Formato['PisoBoca']; ?>
                </div>
	        <div class="span3"> 
                  <label><strong>Ganglios linfáticos: </strong></label>
                  <?php echo $Datos_Formato['GangliosLinfaticos']; ?>
                </div>
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span3"> 
                  <label><strong>Paladar duro: </strong></label>
                  <?php echo $Datos_Formato['PaladarDuro']; ?>
                </div>
	        <div class="span3"> 
                  <label><strong>Paladar blando: </strong></label>
                  <?php echo $Datos_Formato['PaladarBlando']; ?>
                </div>
	      </div>
	      <br />
	      <div class="row"> 
                <div class="span3"> 
                  <label><strong>Buco faringe: </strong></label>
                  <?php echo $Datos_Formato['BucoFaringe']; ?>
                </div>
	        <div class="span3"> 
                  <label><strong>Encía: </strong></label>
                  <?php echo $Datos_Formato['Encia']; ?>
                </div>
	      </div>

	    </div><!-- fin tab4  -->

            <div class="tab-pane" id="tab5">
              <h3>Odontograma</h3>

              <table>
	      <tr>
	        <td>Diente Ausente (<strong>A</strong>)</td>
	        <td>Extracción (<strong>X</strong>)</td>
	        <td>Caries (<strong>C</strong>)</td>
	        <td>Dolor (<strong>D</strong>)</td>
	        <td>Restauración (<strong>R</strong>)</td>
	        <td>Traumatismo (<strong>T</strong>)</td>
	        <td>Maloclusión (<strong>#</strong>)</td>
	        <td>Movilidad (<strong>M</strong>)</td>
	        <td>Protesis Parcial Removible (<strong>PPR</strong>)</td>
	        <td>Área de Impacto de Alimento (<strong>=</strong>)</td>
	        <td>Restauración Defectuosa (<strong>RD</strong>)</td>
	        <td>Prótesis Fija (<strong>PF</strong>)</td>
	      </tr>
	      </table>

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
                    <td><span id="titulo-padecimiento-18">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_18']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td>  
                    <td><span id="titulo-padecimiento-17">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_17']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-16">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_16']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-15">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_15']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-14">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_14']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-13">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_13']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-12">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_12']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-11">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_11']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td></td> 
                    <td><span id="titulo-padecimiento-21">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_21']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-22">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_22']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-23">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_23']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-24">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_24']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-25">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_25']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-26">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_26']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-27">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_27']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-28">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_28']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td>                      
                  </tr>
                  <tr>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-18">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_18']);
                        ?>
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-18">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-18" id="campo-seleccionado-arriba-18">
                        </div>
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-18">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-18" id="campo-seleccionado-izquierda-18">
                        </div>
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-18">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-18" id="campo-seleccionado-centro-18">
                        </div>
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-18">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-18" name="campo-seleccionado-derecha-18">
                        </div>
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-18">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-18" name="campo-seleccionado-abajo-18">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-18" id="padecimiento-18">
                        <input type="hidden" value="0" name="numero-seleccionados-18" id="numero-seleccionados-18">
                      </div>
                    </td>
                      
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-17">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_17']);
                        ?>                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-17">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-17" id="campo-seleccionado-arriba-17">
                          </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-17">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-17" id="campo-seleccionado-izquierda-17">
                          </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-17">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-17" id="campo-seleccionado-centro-17">
                          </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-17">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-17" name="campo-seleccionado-derecha-17">
                          </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-17">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-17" name="campo-seleccionado-abajo-17">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-17" id="padecimiento-17">
                        <input type="hidden" value="0" name="numero-seleccionados-17" id="numero-seleccionados-17">
                      </div>
                    </td>
                      
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-16">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_16']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-16">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-16" id="campo-seleccionado-arriba-16">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-16">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-16" id="campo-seleccionado-izquierda-16">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-16">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-16" id="campo-seleccionado-centro-16">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-16">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-16" name="campo-seleccionado-derecha-16">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-16">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-16" name="campo-seleccionado-abajo-16">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-16" id="padecimiento-16">
                        <input type="hidden" value="0" name="numero-seleccionados-16" id="numero-seleccionados-16"> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-15">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_15']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-15">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-15" id="campo-seleccionado-arriba-15">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-15">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-15" id="campo-seleccionado-izquierda-15">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-15">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-15" id="campo-seleccionado-centro-15">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-15">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-15" name="campo-seleccionado-derecha-15">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-15">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-15" name="campo-seleccionado-abajo-15">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-15" id="padecimiento-15">
                        <input type="hidden" value="0" name="numero-seleccionados-15" id="numero-seleccionados-15">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-14">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_14']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-14">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-14" id="campo-seleccionado-arriba-14">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-14">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-14" id="campo-seleccionado-izquierda-14">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-14">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-14" id="campo-centro-14">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-14">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-14" name="campo-seleccionado-derecha-14">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-14">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-14" name="campo-seleccionado-abajo-14">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-14" id="padecimiento-14">
                        <input type="hidden" value="0" name="numero-seleccionados-14" id="numero-seleccionados-14">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-13">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_13']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-13">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-13" id="campo-seleccionado-arriba-13">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-13">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-13" id="campo-seleccionado-izquierda-13">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-13">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-13" id="campo-seleccionado-centro-13">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-13">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-13" name="campo-seleccionado-derecha-13">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-13">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-13" name="campo-seleccionado-abajo-13">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-13" id="padecimiento-13">
                        <input type="hidden" value="0" name="numero-seleccionados-13" id="numero-seleccionados-13">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-12">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_12']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-12">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-12" id="campo-seleccionado-arriba-12">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-12">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-12" id="campo-seleccionado-izquierda-12">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-12">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-12" id="campo-seleccionado-centro-12">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-12">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-12" name="campo-seleccionado-derecha-12">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-12">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-12" name="campo-seleccionado-abajo-12">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-12" id="padecimiento-12">
                        <input type="hidden" value="0" name="numero-seleccionados-12" id="numero-seleccionados-12">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-11">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_11']);
                        ?>                            
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-11">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-11" id="campo-seleccionado-arriba-11">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-11">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-11" id="campo-seleccionado-izquierda-11">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-11">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-11" id="campo-seleccionado-centro-11">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-11">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-11" name="campo-seleccionado-derecha-11">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-11">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-11" name="campo-seleccionado-abajo-11">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-11" id="padecimiento-11">
                        <input type="hidden" value="0" name="numero-seleccionados-11" id="numero-seleccionados-11">  
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-21">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_21']);
                        ?>                            
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-21">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-21" id="campo-seleccionado-arriba-21">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-21">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-21" id="campo-seleccionado-izquierda-21">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-21">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-21" id="campo-seleccionado-centro-21">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-21">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-21" name="campo-seleccionado-derecha-21">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-21">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-21" name="campo-seleccionado-abajo-21">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-21" id="padecimiento-21">
                        <input type="hidden" value="0" name="numero-seleccionados-21" id="numero-seleccionados-21">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-22">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_22']);
                        ?>     
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-22">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-22" id="campo-seleccionado-arriba-22">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-22">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-22" id="campo-seleccionado-izquierda-22">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-22">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-22" id="campo-seleccionado-centro-22">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-22">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-22" name="campo-seleccionado-derecha-22">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-22">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-22" name="campo-seleccionado-abajo-22">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-22" id="padecimiento-22">
                        <input type="hidden" value="0" name="numero-seleccionados-22" id="numero-seleccionados-22">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-23">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_23']);
                        ?>    
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-23">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-23" id="campo-seleccionado-arriba-23">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-23">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-23" id="campo-seleccionado-izquierda-23">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-23">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-23" id="campo-seleccionado-centro-23">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-23">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-23" name="campo-seleccionado-derecha-23">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-23">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-23" name="campo-seleccionado-abajo-23">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-23" id="padecimiento-23">
                        <input type="hidden" value="0" name="numero-seleccionados-23" id="numero-seleccionados-23">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-24">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_24']);
                        ?>                            
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-24">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-24" id="campo-seleccionado-arriba-24">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-24">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-24" id="campo-seleccionado-izquierda-24">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-24">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-24" id="campo-seleccionado-centro-24">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-24">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-24" name="campo-seleccionado-derecha-24">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-24">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-24" name="campo-seleccionado-abajo-24">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-24" id="padecimiento-24">
                        <input type="hidden" value="0" name="numero-seleccionados-24" id="numero-seleccionados-24">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-25">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_25']);
                        ?>  
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-25">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-25" id="campo-seleccionado-arriba-25">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-25">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-25" id="campo-seleccionado-izquierda-25">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-25">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-25" id="campo-seleccionado-centro-25">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-25">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-25" name="campo-seleccionado-derecha-25">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-25">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-25" name="campo-seleccionado-abajo-25">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-25" id="padecimiento-25">
                        <input type="hidden" value="0" name="numero-seleccionados-25" id="numero-seleccionados-25">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-26">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_26']);
                        ?>    
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-26">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-26" id="campo-seleccionado-arriba-26">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-26">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-26" id="campo-seleccionado-izquierda-26">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-26">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-26" id="campo-seleccionado-centro-26">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-26">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-26" name="campo-seleccionado-derecha-26">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-26">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-26" name="campo-seleccionado-abajo-26">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-26" id="padecimiento-26">
                        <input type="hidden" value="0" name="numero-seleccionados-26" id="numero-seleccionados-26">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-27">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_27']);
                        ?>    
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-27">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-27" id="campo-seleccionado-arriba-27">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-27">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-27" id="campo-seleccionado-izquierda-27">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-27">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-27" id="campo-seleccionado-centro-27">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-27">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-27" name="campo-seleccionado-derecha-27">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-27">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-27" name="campo-seleccionado-abajo-27">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-27" id="padecimiento-27">
                        <input type="hidden" value="0" name="numero-seleccionados-27" id="numero-seleccionados-27">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-28">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_28']);
                        ?>   
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-28">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-28" id="campo-seleccionado-arriba-28">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-28">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-28" id="campo-seleccionado-izquierda-28">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-28">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-28" id="campo-seleccionado-centro-28">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-28">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-28" name="campo-seleccionado-derecha-28">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-28">
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
                    <td><span id="titulo-padecimiento-48">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_48']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td>  
                    <td><span id="titulo-padecimiento-47">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_47']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-46">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_46']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-45">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_45']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-44">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_44']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-43">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_43']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-42">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_42']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-41">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_41']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></span></td> 
                    <td></td> 
                    <td><span id="titulo-padecimiento-31">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_31']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-32">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_32']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-33">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_33']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-34">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_34']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-35">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_35']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-36">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_36']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-37">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_37']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-38">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_38']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td>                      
                  </tr>
                  <tr>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-48">   
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_48']);
                        ?>
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-48">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-48" id="campo-seleccionado-arriba-48">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-48">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-48" id="campo-seleccionado-izquierda-48">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-48">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-48" id="campo-seleccionado-centro-48">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-48">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-48" name="campo-seleccionado-derecha-48">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-48">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-48" name="campo-seleccionado-abajo-48">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-48" id="padecimiento-48">
                        <input type="hidden" value="0" name="numero-seleccionados-48" id="numero-seleccionados-48">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-47">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_47']);
                        ?>                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-47">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-47" id="campo-seleccionado-arriba-47">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-47">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-47" id="campo-seleccionado-izquierda-47">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-47">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-47" id="campo-seleccionado-centro-47">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-47">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-47" name="campo-seleccionado-derecha-47">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-47">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-47" name="campo-seleccionado-abajo-47">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-47" id="padecimiento-47">
                        <input type="hidden" value="0" name="numero-seleccionados-47" id="numero-seleccionados-47">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-46">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_46']);
                        ?>                            
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-46">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-46" id="campo-seleccionado-arriba-46">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-46">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-46" id="campo-seleccionado-izquierda-46">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-46">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-46" id="campo-seleccionado-centro-46">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-46">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-46" name="campo-seleccionado-derecha-46">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-46">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-46" name="campo-seleccionado-abajo-46">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-46" id="padecimiento-46">
                        <input type="hidden" value="0" name="numero-seleccionados-46" id="numero-seleccionados-46">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-45">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_45']);
                        ?>   
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-45">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-45" id="campo-seleccionado-arriba-45">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-45">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-45" id="campo-seleccionado-izquierda-45">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-45">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-45" id="campo-seleccionado-centro-45">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-45">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-45" name="campo-seleccionado-derecha-45">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-45">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-45" name="campo-seleccionado-abajo-45">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-45" id="padecimiento-45">
                        <input type="hidden" value="0" name="numero-seleccionados-45" id="numero-seleccionados-45">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-44">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_44']);
                        ?>  
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-44">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-44" id="campo-seleccionado-arriba-44">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-44">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-44" id="campo-seleccionado-izquierda-44">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-44">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-44" id="campo-seleccionado-centro-44">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-44">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-44" name="campo-seleccionado-derecha-44">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-44">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-44" name="campo-seleccionado-abajo-44">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-44" id="padecimiento-44">
                        <input type="hidden" value="0" name="numero-seleccionados-44" id="numero-seleccionados-44">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-43">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_43']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-43">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-43" id="campo-seleccionado-arriba-43">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-43">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-43" id="campo-seleccionado-izquierda-43">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-43">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-43" id="campo-seleccionado-centro-43">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-43">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-43" name="campo-seleccionado-derecha-43">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-43">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-43" name="campo-seleccionado-abajo-43">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-43" id="padecimiento-43">
                        <input type="hidden" value="0" name="numero-seleccionados-43" id="numero-seleccionados-43">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-42">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_42']);
                        ?>     
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-42">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-42" id="campo-seleccionado-arriba-42">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-42">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-42" id="campo-seleccionado-izquierda-42">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-42">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-42" id="campo-seleccionado-centro-42">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-42">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-42" name="campo-seleccionado-derecha-42">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-42">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-42" name="campo-seleccionado-abajo-42">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-42" id="padecimiento-42">
                        <input type="hidden" value="0" name="numero-seleccionados-42" id="numero-seleccionados-42">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-41">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_41']);
                        ?>    
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-41">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-41" id="campo-seleccionado-arriba-41">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-41">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-41" id="campo-seleccionado-izquierda-41">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-41">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-41" id="campo-seleccionado-centro-41">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-41">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-41" name="campo-seleccionado-derecha-41">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-41">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-41" name="campo-seleccionado-abajo-41">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-41" id="padecimiento-41">
                        <input type="hidden" value="0" name="numero-seleccionados-41" id="numero-seleccionados-41">   
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-31">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_31']);
                        ?>    
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-31">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-31" id="campo-seleccionado-arriba-31">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-31">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-31" id="campo-seleccionado-izquierda-31">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-31">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-31" id="campo-seleccionado-centro-31">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-31">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-31" name="campo-seleccionado-derecha-31">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-31">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-31" name="campo-seleccionado-abajo-31">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-31" id="padecimiento-31">
                        <input type="hidden" value="0" name="numero-seleccionados-31" id="numero-seleccionados-31">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-32">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_32']);
                        ?>   
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-32">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-32" id="campo-seleccionado-arriba-32">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-32">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-32" id="campo-seleccionado-izquierda-32">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-32">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-32" id="campo-seleccionado-centro-32">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-32">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-32" name="campo-seleccionado-derecha-32">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-32">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-32" name="campo-seleccionado-abajo-32">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-32" id="padecimiento-32">
                        <input type="hidden" value="0" name="numero-seleccionados-32" id="numero-seleccionados-32">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-33">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_33']);
                        ?>   
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-33">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-33" id="campo-seleccionado-arriba-33">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-33">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-33" id="campo-seleccionado-izquierda-33">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-33">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-33" id="campo-seleccionado-centro-33">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-33">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-33" name="campo-seleccionado-derecha-33">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-33">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-33" name="campo-seleccionado-abajo-33">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-33" id="padecimiento-33">
                        <input type="hidden" value="0" name="numero-seleccionados-33" id="numero-seleccionados-33">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-34">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_34']);
                        ?>                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-34">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-34" id="campo-seleccionado-arriba-34">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-34">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-34" id="campo-seleccionado-izquierda-34">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-34">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-34" id="campo-seleccionado-centro-34">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-34">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-34" name="campo-seleccionado-derecha-34">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-34">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-34" name="campo-seleccionado-abajo-34">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-34" id="padecimiento-34">
                        <input type="hidden" value="0" name="numero-seleccionados-34" id="numero-seleccionados-34">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-35">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_35']);
                        ?>  
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-35">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-35" id="campo-seleccionado-arriba-35">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-35">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-35" id="campo-seleccionado-izquierda-35">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-35">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-35" id="campo-seleccionado-centro-35">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-35">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-35" name="campo-seleccionado-derecha-35">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-35">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-35" name="campo-seleccionado-abajo-35">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-35" id="padecimiento-35">
                        <input type="hidden" value="0" name="numero-seleccionados-35" id="numero-seleccionados-35">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-36">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_36']);
                        ?>    
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-36">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-36" id="campo-seleccionado-arriba-36">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-36">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-36" id="campo-seleccionado-izquierda-36">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-36">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-36" id="campo-seleccionado-centro-36">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-36">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-36" name="campo-seleccionado-derecha-36">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-36">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-36" name="campo-seleccionado-abajo-36">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-36" id="padecimiento-36">
                        <input type="hidden" value="0" name="numero-seleccionados-36" id="numero-seleccionados-36">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-37">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_37']);
                        ?>   
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-37">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-37" id="campo-seleccionado-arriba-37">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-37">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-37" id="campo-seleccionado-izquierda-37">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-37">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-37" id="campo-seleccionado-centro-37">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-37">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-37" name="campo-seleccionado-derecha-37">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-37">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-37" name="campo-seleccionado-abajo-37">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-37" id="padecimiento-37">
                        <input type="hidden" value="0" name="numero-seleccionados-37" id="numero-seleccionados-37">   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-38">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_38']);
                        ?>   
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-38">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-38" id="campo-seleccionado-arriba-38">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-38">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-38" id="campo-seleccionado-izquierda-38">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-38">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-38" id="campo-seleccionado-centro-38">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-38">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-38" name="campo-seleccionado-derecha-38">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-38">
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
                    <td><span id="titulo-padecimiento-55">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_55']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td>  
                    <td><span id="titulo-padecimiento-54">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_54']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-53">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_53']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-52">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_52']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-51">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_51']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td></td> 
                    <td><span id="titulo-padecimiento-61">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_61']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-62"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_62']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-63">
                    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_63']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-64"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_64']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-65"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_65']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td>                      
                  </tr>
                  <tr>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-55">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_55']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-55">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-55" id="campo-seleccionado-arriba-55">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-55">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-55" id="campo-seleccionado-izquierda-55">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-55">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-55" id="campo-seleccionado-centro-55">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-55">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-55" name="campo-seleccionado-derecha-55">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-55">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-55" name="campo-seleccionado-abajo-55">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-55" id="padecimiento-55">
                        <input type="hidden" value="0" name="numero-seleccionados-55" id="numero-seleccionados-55">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-54">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_54']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-54">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-54" id="campo-seleccionado-arriba-54">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-54">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-54" id="campo-seleccionado-izquierda-54">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-54">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-54" id="campo-centro-54">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-54">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-54" name="campo-seleccionado-derecha-54">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-54">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-54" name="campo-seleccionado-abajo-54">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-54" id="padecimiento-54">
                        <input type="hidden" value="0" name="numero-seleccionados-54" id="numero-seleccionados-54">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-53">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_53']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-53">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-53" id="campo-seleccionado-arriba-53">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-53">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-53" id="campo-seleccionado-izquierda-53">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-53">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-53" id="campo-seleccionado-centro-53">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-53">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-53" name="campo-seleccionado-derecha-53">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-53">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-53" name="campo-seleccionado-abajo-53">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-53" id="padecimiento-53">
                        <input type="hidden" value="0" name="numero-seleccionados-53" id="numero-seleccionados-53">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-52">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_52']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-52">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-52" id="campo-seleccionado-arriba-52">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-52">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-52" id="campo-seleccionado-izquierda-52">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-52">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-52" id="campo-seleccionado-centro-52">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-52">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-52" name="campo-seleccionado-derecha-52">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-52">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-52" name="campo-seleccionado-abajo-52">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-52" id="padecimiento-52">
                        <input type="hidden" value="0" name="numero-seleccionados-52" id="numero-seleccionados-52">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-51">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_51']);
                        ?>                            
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-51">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-51" id="campo-seleccionado-arriba-51">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-51">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-51" id="campo-seleccionado-izquierda-51">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-51">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-51" id="campo-seleccionado-centro-51">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-51">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-51" name="campo-seleccionado-derecha-51">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-51">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-51" name="campo-seleccionado-abajo-51">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-51" id="padecimiento-51">
                        <input type="hidden" value="0" name="numero-seleccionados-51" id="numero-seleccionados-51">  
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-61">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_61']);
                        ?>                            
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-61">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-61" id="campo-seleccionado-arriba-61">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-61">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-61" id="campo-seleccionado-izquierda-61">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-61">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-61" id="campo-seleccionado-centro-61">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-61">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-61" name="campo-seleccionado-derecha-61">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-61">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-61" name="campo-seleccionado-abajo-61">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-61" id="padecimiento-61">
                        <input type="hidden" value="0" name="numero-seleccionados-61" id="numero-seleccionados-61">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-62">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_62']);
                        ?>     
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-62">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-62" id="campo-seleccionado-arriba-62">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-62">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-62" id="campo-seleccionado-izquierda-62">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-62">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-62" id="campo-seleccionado-centro-62">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-62">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-62" name="campo-seleccionado-derecha-62">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-62">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-62" name="campo-seleccionado-abajo-62">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-62" id="padecimiento-62">
                        <input type="hidden" value="0" name="numero-seleccionados-62" id="numero-seleccionados-62">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-63">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_63']);
                        ?>    
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-63">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-63" id="campo-seleccionado-arriba-63">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-63">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-63" id="campo-seleccionado-izquierda-63">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-63">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-63" id="campo-seleccionado-centro-63">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-63">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-63" name="campo-seleccionado-derecha-63">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-63">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-63" name="campo-seleccionado-abajo-63">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-63" id="padecimiento-63">
                        <input type="hidden" value="0" name="numero-seleccionados-63" id="numero-seleccionados-63">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-64">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_64']);
                        ?>                            
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-64">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-64" id="campo-seleccionado-arriba-64">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-64">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-64" id="campo-seleccionado-izquierda-64">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-64">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-64" id="campo-seleccionado-centro-64">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-64">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-64" name="campo-seleccionado-derecha-64">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-64">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-64" name="campo-seleccionado-abajo-64">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-64" id="padecimiento-64">
                        <input type="hidden" value="0" name="numero-seleccionados-64" id="numero-seleccionados-64">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-65">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_65']);
                        ?>  
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-65">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-65" id="campo-seleccionado-arriba-65">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-65">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-65" id="campo-seleccionado-izquierda-65">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-65">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-65" id="campo-seleccionado-centro-65">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-65">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-65" name="campo-seleccionado-derecha-65">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-65">
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
                    <td><span id="titulo-padecimiento-85"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_85']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td>  
                    <td><span id="titulo-padecimiento-84"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_84']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-83"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_83']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-82"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_82']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-81"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_81']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td></td> 
                    <td><span id="titulo-padecimiento-71"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_71']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-72"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_72']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-73"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_73']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-74"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_74']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td> 
                    <td><span id="titulo-padecimiento-75"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_75']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></span></td>                      
                  </tr>
                  <tr>                      
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-85">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_85']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-85">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-85" id="campo-seleccionado-arriba-85">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-85">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-85" id="campo-seleccionado-izquierda-85">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-85">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-85" id="campo-seleccionado-centro-85">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-85">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-85" name="campo-seleccionado-derecha-85">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-85">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-85" name="campo-seleccionado-abajo-85">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-85" id="padecimiento-85">
                        <input type="hidden" value="0" name="numero-seleccionados-85" id="numero-seleccionados-85">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-84">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_84']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-84">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-84" id="campo-seleccionado-arriba-84">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-84">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-84" id="campo-seleccionado-izquierda-84">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-84">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-84" id="campo-centro-84">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-84">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-84" name="campo-seleccionado-derecha-84">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-84">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-84" name="campo-seleccionado-abajo-84">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-84" id="padecimiento-84">
                        <input type="hidden" value="0" name="numero-seleccionados-84" id="numero-seleccionados-84">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-83">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_83']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-83">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-83" id="campo-seleccionado-arriba-83">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-83">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-83" id="campo-seleccionado-izquierda-83">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-83">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-83" id="campo-seleccionado-centro-83">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-83">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-83" name="campo-seleccionado-derecha-83">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-83">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-83" name="campo-seleccionado-abajo-83">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-83" id="padecimiento-83">
                        <input type="hidden" value="0" name="numero-seleccionados-83" id="numero-seleccionados-83">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-82">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_82']);
                        ?>                           
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-82">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-82" id="campo-seleccionado-arriba-82">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-82">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-82" id="campo-seleccionado-izquierda-82">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-82">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-82" id="campo-seleccionado-centro-82">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-82">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-82" name="campo-seleccionado-derecha-82">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-82">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-82" name="campo-seleccionado-abajo-82">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-82" id="padecimiento-82">
                        <input type="hidden" value="0" name="numero-seleccionados-82" id="numero-seleccionados-82">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-81">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_81']);
                        ?>                            
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-81">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-81" id="campo-seleccionado-arriba-81">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-81">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-81" id="campo-seleccionado-izquierda-81">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-81">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-81" id="campo-seleccionado-centro-81">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-81">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-81" name="campo-seleccionado-derecha-81">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-81">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-81" name="campo-seleccionado-abajo-81">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-81" id="padecimiento-81">
                        <input type="hidden" value="0" name="numero-seleccionados-81" id="numero-seleccionados-81">  
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-71">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_71']);
                        ?>                            
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-71">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-71" id="campo-seleccionado-arriba-71">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-71">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-71" id="campo-seleccionado-izquierda-71">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-71">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-71" id="campo-seleccionado-centro-71">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-71">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-71" name="campo-seleccionado-derecha-71">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-71">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-71" name="campo-seleccionado-abajo-71">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-71" id="padecimiento-71">
                        <input type="hidden" value="0" name="numero-seleccionados-71" id="numero-seleccionados-71">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-72">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_72']);
                        ?>     
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-72">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-72" id="campo-seleccionado-arriba-72">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-72">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-72" id="campo-seleccionado-izquierda-72">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-72">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-72" id="campo-seleccionado-centro-72">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-72">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-72" name="campo-seleccionado-derecha-72">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-72">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-72" name="campo-seleccionado-abajo-72">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-72" id="padecimiento-72">
                        <input type="hidden" value="0" name="numero-seleccionados-72" id="numero-seleccionados-72">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-73">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_73']);
                        ?>    
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-73">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-73" id="campo-seleccionado-arriba-73">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-73">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-73" id="campo-seleccionado-izquierda-73">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-73">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-73" id="campo-seleccionado-centro-73">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-73">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-73" name="campo-seleccionado-derecha-73">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-73">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-73" name="campo-seleccionado-abajo-73">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-73" id="padecimiento-73">
                        <input type="hidden" value="0" name="numero-seleccionados-73" id="numero-seleccionados-73">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-74">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_74']);
                        ?>                            
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-74">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-74" id="campo-seleccionado-arriba-74">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-74">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-74" id="campo-seleccionado-izquierda-74">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-74">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-74" id="campo-seleccionado-centro-74">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-74">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-74" name="campo-seleccionado-derecha-74">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-74">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-74" name="campo-seleccionado-abajo-74">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-74" id="padecimiento-74">
                        <input type="hidden" value="0" name="numero-seleccionados-74" id="numero-seleccionados-74">    
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-75">
                        <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_75']);
                        ?>  
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] != "0" ? "seleccionado":""); ?>" id="seleccionado-arriba-75">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-75" id="campo-seleccionado-arriba-75">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] != "0" ? "seleccionado":""); ?>" id="seleccionado-izquierda-75">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-75" id="campo-seleccionado-izquierda-75">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] != "0" ? "seleccionado":""); ?>" id="seleccionado-centro-75">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-75" id="campo-seleccionado-centro-75">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] != "0" ? "seleccionado":""); ?>" id="seleccionado-derecha-75">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-75" name="campo-seleccionado-derecha-75">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] != "0" ? "seleccionado":""); ?>" id="seleccionado-abajo-75">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-75" name="campo-seleccionado-abajo-75">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-75" id="padecimiento-75">
                        <input type="hidden" value="0" name="numero-seleccionados-75" id="numero-seleccionados-75">    
                      </div>
                    </td>
                </tbody>
              </table>


	      <br />
	      <div class="row"> 
                <div class="span6"> 
                  <label><strong>Diagnóstico: </strong></label>
                  <?php echo $Datos_Formato['Diagnostico']; ?>
                </div>
	      </div>
	      <br />
	      <div class="row">
	        <div class="span6"> 
                  <label><strong>Pronóstico: </strong></label>
                  <?php echo $Datos_Formato['Pronostico']; ?>
                </div>
	      </div>
	      <br />
	      <div class="row">
	        <div class="span6"> 
                  <label><strong>Plan de tratamiento: </strong></label>
                  <?php echo $Datos_Formato['PlanTratamiento']; ?>
                </div>
	      </div>
	      <br />
	      <div class="row">
	        <div class="span6"> 
                  <label><strong>Observaciones: </strong></label>
                  <?php echo $Datos_Formato['Observaciones']; ?>
                </div>
	      </div>

            </div><!-- fin tab4 -->  

        </div><!-- fin tabcontent -->

        </div><!-- well -->

        <div align="row">            
            <a href="../clinica/formatohistoriaclinicacomunitaria.php" class="btn btn-danger pull-right">Volver</a>
        </div>
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->      

<script type="text/javascript" src="../js/chrome.js"></script>  

<?php include("../footer2.php"); ?>