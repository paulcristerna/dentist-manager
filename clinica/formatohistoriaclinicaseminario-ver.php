<?php include("../header2.php"); ?>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Formato_Historia_Clinica_Seminario.php"); ?>

        <div class="span9">

        <h2>Formato de Historia Clínica de Seminario</h2>

        <div class="well" style="width:1150px;">
            
        <form method="post" action="validacion_formatohistoriaclinicaseminario.php">
            
        <input type="hidden" id="historia_clinica" name="historia_clinica" value="<?php echo $_GET['formato']; ?>">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Padecimientos</a></li>
            <li><a href="#tab3">Exploración de la Cavidad Bucal</a></li>
            <li><a href="#tab4">Odontograma</a></li>
          </ul>
            
          <?php 
            $Formato_Historia_Clinica_Seminario = new Formato_Historia_Clinica_Seminario();

            $Formato_Historia_Clinica_Seminario->IdHistoriaClinicaSeminario = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Seminario->Obtener_Formato();

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
                  <label><strong>Nombre: </strong>
                  <?php echo $Datos_Formato['NombrePaciente'].' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></label>
                </div> 
                <div class="span2">
                  <label><strong>Fecha: </strong>
                  <?php echo $fecha_registro; ?></label>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Ocupación: </strong> <?php echo $Datos_Formato['OcupacionPaciente']; ?></label> </div>
                <div class="span2"> <label><strong>Teléfono: </strong> <?php echo $Datos_Formato['TelefonoPaciente']; ?></label> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span5"> <label><strong> Domicilio: </strong> <?php echo $Datos_Formato['CallePaciente'].' '.$Datos_Formato['NumeroPaciente'].' '.$Datos_Formato['ColoniaPaciente'].' '.$Datos_Formato['PoblacionPaciente']; ?>.</label> </div>
              </div>
            </div><!-- fin tab1 -->
            <div class="tab-pane" id="tab2">
              <h2>Padecimientos</h2>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> ¿Padece de alguna de las siguientes Enfermedades? </strong></label> </div>
              </div>
              <table class="table table-striped" style="width:60%">
                <thead>
                  <th></th>
                  <th></th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                    <td style="width:250px;"><strong>Diabetes</strong></td>
                    <td style="width:100px;">
                        <input type="radio" id="diabetes" name="diabetes" value="1" <?php echo ($Datos_Formato['Diabetes'] == '1' ? "checked":""); ?>> Si</td>
                    <td><input type="radio"id="diabetes" name="diabetes" value="2" <?php echo ($Datos_Formato['Diabetes'] == '2' ? "checked":""); ?>> No</td>
                  </tr>
                  <tr>
                    <td><strong>Cardiopatías</strong></td>
                    <td><input type="radio" id="cardiopatias" name="cardiopatias" value="1" <?php echo ($Datos_Formato['Cardiopatias'] == '1' ? "checked":""); ?>> Si</td>
                    <td><input type="radio" id="cardiopatias" name="cardiopatias" value="2" <?php echo ($Datos_Formato['Cardiopatias'] == '2' ? "checked":""); ?>> No</td>
                  </tr>
                  <tr>
                    <td><strong>Hipertensión</strong></td>
                    <td><input type="radio" id="hipertension" name="hipertension" value="1" <?php echo ($Datos_Formato['Hiptertension'] == '1' ? "checked":""); ?>> Si</td>
                    <td><input type="radio" id="hipertension" name="hipertension" value="2" <?php echo ($Datos_Formato['Hiptertension'] == '2' ? "checked":""); ?>> No</td>
                  </tr>
                  <tr>
                    <td><strong>Hipotensión</strong></td>
                    <td><input type="radio" id="hipotension" name="hipotension" value="1" <?php echo ($Datos_Formato['Hipotension'] == '1' ? "checked":""); ?>> Si</td>
                    <td><input type="radio" id="hipotension" name="hipotension" value="2" <?php echo ($Datos_Formato['Hipotension'] == '2' ? "checked":""); ?>> No</td>
                  </tr>
                  <tr>
                    <td><strong>Convulsiones</strong></td>
                    <td><input type="radio" id="convulsiones" name="convulsiones" value="1" <?php echo ($Datos_Formato['Convulsiones'] == '1' ? "checked":""); ?>> Si</td>
                    <td><input type="radio" id="convulsiones" name="convulsiones" value="2" <?php echo ($Datos_Formato['Convulsiones'] == '2' ? "checked":""); ?>> No</td>
                  </tr>
                  <tr>
                    <td><strong>Artritis</strong></td>
                    <td><input type="radio" id="artritis" name="artritis" value="1" <?php echo ($Datos_Formato['Artritis'] == '1' ? "checked":""); ?>> Si</td>
                    <td><input type="radio" id="artritis" name="artritis" value="2" <?php echo ($Datos_Formato['Artritis'] == '2' ? "checked":""); ?>> No</td>
                  </tr>
                  <tr>
                    <td><strong>Problemas de Alergia</strong></td>
                    <td><input type="radio" id="problemas_alergia" name="problemas_alergia" value="1" <?php echo ($Datos_Formato['Problemas_Alergia'] == '1' ? "checked":""); ?>> Si</td>
                    <td><input type="radio" id="problemas_alergia" name="problemas_alergia" value="2" <?php echo ($Datos_Formato['Problemas_Alergia'] == '2' ? "checked":""); ?>> No</td>
                  </tr>
                  <tr>
                    <td><strong>Problemas Hemorrágicos</strong></td>
                    <td><input type="radio"  id="problemas_hemorragicos" name="problemas_hemorragicos" value="1" <?php echo ($Datos_Formato['Problemas_Hemorragicos'] == '1' ? "checked":""); ?>> Si</td>
                    <td><input type="radio" id="problemas_hemorragicos" name="problemas_hemorragicos" value="2" <?php echo ($Datos_Formato['Problemas_Hemorragicos'] == '2' ? "checked":""); ?>> No</td>
                  </tr>
                  <tr>
                    <td><strong>Hepatitis</strong></td>
                    <td><input type="radio" id="hepatitis" name="hepatitis" value="1" <?php echo ($Datos_Formato['Hepatitis'] == '1' ? "checked":""); ?>> Si</td>
                    <td><input type="radio" id="hepatitis" name="hepatitis" value="2" <?php echo ($Datos_Formato['Hepatitis'] == '2' ? "checked":""); ?>> No</td>
                  </tr>
                  <tr>
                    <td><strong>Sida</strong></td>
                    <td><input type="radio" id="sida" name="sida" value="1" <?php echo ($Datos_Formato['Sida'] == '1' ? "checked":""); ?>> Si</td>
                    <td><input type="radio" id="sida" name="sida" value="2" <?php echo ($Datos_Formato['Sida'] == '2' ? "checked":""); ?>> No</td>
                  </tr>
                  <tr>
                    <td><strong>Tuberculosis</strong></td>
                    <td><input type="radio" id="tuberculosis" name="tuberculosis" value="1" <?php echo ($Datos_Formato['Tuberculosis'] == '1' ? "checked":""); ?>> Si</td>
                    <td><input type="radio" id="tuberculosis" name="tuberculosis" value="2" <?php echo ($Datos_Formato['Tuberculosis'] == '2' ? "checked":""); ?>> No</td>
                  </tr>
                </tbody>
              </table>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> ¿Se encuentra embarazada? </strong></label> </div>
                <div class="span1.5">
                    <input type="radio" id="pregunta_1" name="pregunta_1" value="1" <?php echo ($Datos_Formato['Pregunta_1'] == '1' ? "checked":""); ?>> Si 
                </div>
                <div class="span1.5">
                    <input type="radio" id="pregunta_1" name="pregunta_1" value="2" <?php echo ($Datos_Formato['Pregunta_1'] == '2' ? "checked":""); ?>> No 
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> En caso afirmativo ¿En que trimestre se encuentra? </strong></label> </div>
              </div>
              <div>
                <div class="span1.5"> <input type="radio" id="pregunta_2" name="pregunta_2" value="1" <?php echo ($Datos_Formato['Pregunta_2'] == '1' ? "checked":""); ?>> Primero </div>
                <div class="span1.5"> <input type="radio" id="pregunta_2" name="pregunta_2" value="2" <?php echo ($Datos_Formato['Pregunta_2'] == '2' ? "checked":""); ?>> Segundo </div>
                <div class="span1.5"> <input type="radio" id="pregunta_2" name="pregunta_2" value="3" <?php echo ($Datos_Formato['Pregunta_2'] == '3' ? "checked":""); ?>> Tercero </div>
              </div>
              <br><br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> ¿Actualmente esta tomando algún Medicamento? </strong></label> </div>
                <div class="span1.5"> <input type="radio" id="pregunta_3" name="pregunta_3" value="1" <?php echo ($Datos_Formato['Pregunta_3'] == '1' ? "checked":""); ?>> Si </div>
                <div class="span1.5"> <input type="radio" id="pregunta_3" name="pregunta_3" value="2" <?php echo ($Datos_Formato['Pregunta_3'] == '2' ? "checked":""); ?>> No </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> En caso afirmativo, ¿Cuál? </strong></label> </div>
                <div class="span1.5"> <input type="text" placeholder="En caso afirmativo, ¿Cuál?" style="width:250%" id="cual_medicamento" name="cual_medicamento" value="<?php echo $Datos_Formato['Cual_Medicamento']; ?>"></div>
              </div>
              <br>
              <div class="row">
                <div class="span1.5"> <label><strong> Presión Arterial: </strong></label> </div>
                <div class="span2.5"> <input type="text" placeholder="Presión Arterial" id="presion_arterial" name="presion_arterial" value="<?php echo $Datos_Formato['Presion_Arterial']; ?>"> </div>
                <div class="span0.5"> <label><strong> Pulso: </strong></label> </div>
                <div class="span2"> <input type="text" placeholder="Pulso" id="pulso" name="pulso" value="<?php echo $Datos_Formato['Pulso']; ?>"> </div>
              </div>
              <br>
              <div class="row">
                <div class="span1.5"> <label><strong> Temperatura: </strong></label> </div>
                <div class="span2.5"> <input type="text" placeholder="Temperatura" id="temperatura" name="temperatura" value="<?php echo $Datos_Formato['Temperatura']; ?>"> </div>
              </div>
              <br>
              <div class="row">
                <div class="span1.5"> <label><strong> Diagnóstico Médico: </strong></label> </div>
                <div class="span6"> <textarea rows="3" col="10" style="width:100%;" placeholder="Diagnóstico Médico" id="diagnostico_medico" name="diagnostico_medico"><?php echo $Datos_Formato['Diagnostico_Medico']; ?></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span1.5"> <label><strong> Anestésico Indicado: </strong></label> </div>
                <div class="span2.5"> <input type="text" placeholder="Anestésico Indicado" style="width:275%;" id="anestesico_indicado" name="anestesico_indicado" value="<?php echo $Datos_Formato['Anestesico_Indicado']; ?>"> </div>
              </div>
            </div><!-- fin tab2 -->
            <div class="tab-pane" id="tab3">
              <h3>Exploración de la Cavidad Bucal</h3>
              <br>
              <div class="row">
                <div class="span2"> <label><strong> Condiciones de Tejidos Blandos </strong></label> </div>
                <div class="span6"> <textarea rows="3" col="10" style="width:90%;" placeholder="Condiciones de Tejidos Blandos" id="condiciones_tejidos_blandos" name="condiciones_tejidos_blandos"><?php echo $Datos_Formato['Condiciones_Tejidos_Blandos']; ?></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span2"> <label><strong> Condiciones Óseas </strong></label> </div>
                <div class="span6"> <textarea rows="3" col="10" style="width:90%;" placeholder="Condiciones Óseas" id="condiciones_oseas" name="condiciones_oseas"><?php echo $Datos_Formato['Condiciones_Oseas']; ?></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span2"> <label><strong> Condiciones del Proceso Alveolar </strong></label> </div>
                <div class="span6"> <textarea rows="3" col="10" style="width:90%;" placeholder="Condiciones del Proceso Alveolar" id="condiciones_proceso_alveolar" name="condiciones_proceso_alveolar"><?php echo $Datos_Formato['Condiciones_Proceso_Alveolar']; ?></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span2"> <label><strong> Condiciones de la A.T.M. </strong></label> </div>
                <div class="span6"> <textarea rows="3" col="10" style="width:90%;" placeholder="Condiciones de la A.T.M." id="condiciones_atm" name="condiciones_atm"><?php echo $Datos_Formato['Condiciones_ATM']; ?></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span2"> <label><strong> Condiciones de la Oclusión </strong></label> </div>
                <div class="span6"> <textarea rows="3" col="10" style="width:90%;" placeholder="Condiciones de la Oclusión" id="condiciones_oclusion" name="condiciones_oclusion"><?php echo $Datos_Formato['Condiciones_Oclusion']; ?></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span2"> <label><strong> Condiciones del Periodonto </strong></label> </div>
                <div class="span6"> <textarea rows="3" col="10" style="width:90%;" placeholder="Condiciones del Periodonto" id="condiciones_periodonto" name="condiciones_periodonto"><?php echo $Datos_Formato['Condiciones_Periodonto']; ?></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span1.5"> <label><strong> Presencia de PDB </strong></label> </div>
                <div class="span1"> <input type="text" style="width:50px;" id="presencia_pdb" name="presencia_pdb" value="<?php echo $Datos_Formato['Presencia_PDB']; ?>"> </div>
                <div class="span2.5"> <label><strong> Cálculo Dental Supragingival </strong></label> </div>
                <div class="span3"> <input type="text" style="width:50px;" id="calculo_deltal_supragingival" name="calculo_dental_supragingival" value="<?php echo $Datos_Formato['Calculo_Dental_Supragingival']; ?>"> </div>
              </div>
              <br>
              <div class="row">
                <div class="span2.5"> <label><strong> Cálculo Dental Subgingival </strong></label> </div>
                <div class="span3"> <input type="text" style="width:50px;" id="calculo_dental_subgingival" name="calculo_dental_subgingival" value="<?php echo $Datos_Formato['Calculo_Dental_Subgingival']; ?>"> </div>
              </div>
              <br>
              <div class="row">
                <div class="span2"> <label><strong> Necesidades Radiológicas </strong></label> </div>
                <div class="span6"> <textarea rows="3" col="10" style="width:90%;" placeholder="Necesidades Radiológicas" id="necesidades_radiologicas" name="necesidades_radiologicas"><?php echo $Datos_Formato['Necesidades_Radiologicas']; ?></textarea> </div>
              </div>
              <br>
              <div class="row">
                <div class="span2"> <label><strong> Necesidades de Modelos de Estudio </strong></label> </div>
                <div class="span6"> <input type="text" placeholder="Necesidades de Modelos de Estudio" style="width:50%;" id="necesidades_modelo_estudio" name="necesidades_modelo_estudio" value="<?php echo $Datos_Formato['Necesidades_Modelo_Estudio']; ?>"> </div>
              </div>
            </div>
            <div class="tab-pane" id="tab4">
              <h2>Odontograma</h2>

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

	      <br />
                
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
                    ?></span></span></td> 
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-18">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-18" id="campo-seleccionado-arriba-18">
                        </div>
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-18">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-18" id="campo-seleccionado-izquierda-18">
                        </div>
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-18">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-18" id="campo-seleccionado-centro-18">
                        </div>
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-18">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-18" name="campo-seleccionado-derecha-18">
                        </div>
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-18">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-17">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-17" id="campo-seleccionado-arriba-17">
                          </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-17">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-17" id="campo-seleccionado-izquierda-17">
                          </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-17">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-17" id="campo-seleccionado-centro-17">
                          </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-17">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-17" name="campo-seleccionado-derecha-17">
                          </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-17">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-16">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-16" id="campo-seleccionado-arriba-16">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-16">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-16" id="campo-seleccionado-izquierda-16">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-16">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-16" id="campo-seleccionado-centro-16">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-16">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-16" name="campo-seleccionado-derecha-16">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-16">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-15">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-15" id="campo-seleccionado-arriba-15">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-15">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-15" id="campo-seleccionado-izquierda-15">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-15">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-15" id="campo-seleccionado-centro-15">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-15">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-15" name="campo-seleccionado-derecha-15">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-15">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-14">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-14" id="campo-seleccionado-arriba-14">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-14">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-14" id="campo-seleccionado-izquierda-14">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-14">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-14" id="campo-centro-14">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-14">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-14" name="campo-seleccionado-derecha-14">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-14">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-13">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-13" id="campo-seleccionado-arriba-13">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-13">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-13" id="campo-seleccionado-izquierda-13">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-13">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-13" id="campo-seleccionado-centro-13">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-13">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-13" name="campo-seleccionado-derecha-13">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-13">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-12">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-12" id="campo-seleccionado-arriba-12">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-12">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-12" id="campo-seleccionado-izquierda-12">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-12">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-12" id="campo-seleccionado-centro-12">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-12">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-12" name="campo-seleccionado-derecha-12">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-12">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-11">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-11" id="campo-seleccionado-arriba-11">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-11">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-11" id="campo-seleccionado-izquierda-11">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-11">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-11" id="campo-seleccionado-centro-11">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-11">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-11" name="campo-seleccionado-derecha-11">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-11">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-21">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-21" id="campo-seleccionado-arriba-21">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-21">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-21" id="campo-seleccionado-izquierda-21">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-21">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-21" id="campo-seleccionado-centro-21">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-21">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-21" name="campo-seleccionado-derecha-21">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-21">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-22">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-22" id="campo-seleccionado-arriba-22">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-22">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-22" id="campo-seleccionado-izquierda-22">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-22">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-22" id="campo-seleccionado-centro-22">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-22">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-22" name="campo-seleccionado-derecha-22">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-22">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-23">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-23" id="campo-seleccionado-arriba-23">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-23">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-23" id="campo-seleccionado-izquierda-23">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-23">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-23" id="campo-seleccionado-centro-23">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-23">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-23" name="campo-seleccionado-derecha-23">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-23">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-24">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-24" id="campo-seleccionado-arriba-24">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-24">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-24" id="campo-seleccionado-izquierda-24">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-24">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-24" id="campo-seleccionado-centro-24">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-24">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-24" name="campo-seleccionado-derecha-24">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-24">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-25">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-25" id="campo-seleccionado-arriba-25">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-25">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-25" id="campo-seleccionado-izquierda-25">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-25">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-25" id="campo-seleccionado-centro-25">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-25">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-25" name="campo-seleccionado-derecha-25">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-25">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-26">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-26" id="campo-seleccionado-arriba-26">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-26">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-26" id="campo-seleccionado-izquierda-26">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-26">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-26" id="campo-seleccionado-centro-26">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-26">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-26" name="campo-seleccionado-derecha-26">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-26">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-27">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-27" id="campo-seleccionado-arriba-27">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-27">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-27" id="campo-seleccionado-izquierda-27">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-27">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-27" id="campo-seleccionado-centro-27">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-27">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-27" name="campo-seleccionado-derecha-27">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-27">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-28">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-28" id="campo-seleccionado-arriba-28">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-28">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-28" id="campo-seleccionado-izquierda-28">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-28">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-28" id="campo-seleccionado-centro-28">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-28">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-28" name="campo-seleccionado-derecha-28">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-28">
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
                    ?></span></td> 
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-48">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-48" id="campo-seleccionado-arriba-48">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-48">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-48" id="campo-seleccionado-izquierda-48">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-48">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-48" id="campo-seleccionado-centro-48">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-48">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-48" name="campo-seleccionado-derecha-48">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-48">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-47">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-47" id="campo-seleccionado-arriba-47">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-47">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-47" id="campo-seleccionado-izquierda-47">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-47">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-47" id="campo-seleccionado-centro-47">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-47">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-47" name="campo-seleccionado-derecha-47">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-47">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-46">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-46" id="campo-seleccionado-arriba-46">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-46">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-46" id="campo-seleccionado-izquierda-46">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-46">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-46" id="campo-seleccionado-centro-46">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-46">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-46" name="campo-seleccionado-derecha-46">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-46">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-45">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-45" id="campo-seleccionado-arriba-45">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-45">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-45" id="campo-seleccionado-izquierda-45">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-45">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-45" id="campo-seleccionado-centro-45">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-45">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-45" name="campo-seleccionado-derecha-45">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-45">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-44">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-44" id="campo-seleccionado-arriba-44">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-44">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-44" id="campo-seleccionado-izquierda-44">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-44">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-44" id="campo-seleccionado-centro-44">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-44">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-44" name="campo-seleccionado-derecha-44">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-44">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-43">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-43" id="campo-seleccionado-arriba-43">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-43">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-43" id="campo-seleccionado-izquierda-43">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-43">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-43" id="campo-seleccionado-centro-43">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-43">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-43" name="campo-seleccionado-derecha-43">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-43">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-42">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-42" id="campo-seleccionado-arriba-42">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-42">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-42" id="campo-seleccionado-izquierda-42">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-42">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-42" id="campo-seleccionado-centro-42">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-42">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-42" name="campo-seleccionado-derecha-42">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-42">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-41">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-41" id="campo-seleccionado-arriba-41">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-41">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-41" id="campo-seleccionado-izquierda-41">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-41">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-41" id="campo-seleccionado-centro-41">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-41">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-41" name="campo-seleccionado-derecha-41">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-41">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-31">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-31" id="campo-seleccionado-arriba-31">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-31">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-31" id="campo-seleccionado-izquierda-31">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-31">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-31" id="campo-seleccionado-centro-31">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-31">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-31" name="campo-seleccionado-derecha-31">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-31">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-32">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-32" id="campo-seleccionado-arriba-32">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-32">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-32" id="campo-seleccionado-izquierda-32">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-32">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-32" id="campo-seleccionado-centro-32">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-32">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-32" name="campo-seleccionado-derecha-32">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-32">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-33">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-33" id="campo-seleccionado-arriba-33">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-33">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-33" id="campo-seleccionado-izquierda-33">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-33">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-33" id="campo-seleccionado-centro-33">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-33">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-33" name="campo-seleccionado-derecha-33">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-33">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-34">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-34" id="campo-seleccionado-arriba-34">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-34">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-34" id="campo-seleccionado-izquierda-34">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-34">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-34" id="campo-seleccionado-centro-34">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-34">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-34" name="campo-seleccionado-derecha-34">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-34">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-35">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-35" id="campo-seleccionado-arriba-35">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-35">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-35" id="campo-seleccionado-izquierda-35">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-35">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-35" id="campo-seleccionado-centro-35">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-35">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-35" name="campo-seleccionado-derecha-35">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-35">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-36">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-36" id="campo-seleccionado-arriba-36">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-36">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-36" id="campo-seleccionado-izquierda-36">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-36">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-36" id="campo-seleccionado-centro-36">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-36">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-36" name="campo-seleccionado-derecha-36">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-36">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-37">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-37" id="campo-seleccionado-arriba-37">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-37">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-37" id="campo-seleccionado-izquierda-37">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-37">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-37" id="campo-seleccionado-centro-37">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-37">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-37" name="campo-seleccionado-derecha-37">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-37">
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
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Diente[1] == '1' ? "seleccionado":""); ?>" id="seleccionado-arriba-38">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-38" id="campo-seleccionado-arriba-38">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Diente[2] == '1' ? "seleccionado":""); ?>" id="seleccionado-izquierda-38">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-38" id="campo-seleccionado-izquierda-38">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Diente[3] == '1' ? "seleccionado":""); ?>" id="seleccionado-centro-38">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-38" id="campo-seleccionado-centro-38">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Diente[4] == '1' ? "seleccionado":""); ?>" id="seleccionado-derecha-38">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-38" name="campo-seleccionado-derecha-38">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Diente[5] == '1' ? "seleccionado":""); ?>" id="seleccionado-abajo-38">
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
            </div><!-- fin tab4 -->
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
          <a href="../clinica/formatohistoriaclinicaseminario.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
        </div>
		<?php endif; ?>
            
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->
      <input type="hidden" id="ventana" value="formato-historia-clinica-seminario">

<script type="text/javascript" src="../js/chrome.js"></script>  

<?php include("../footer2.php"); ?>