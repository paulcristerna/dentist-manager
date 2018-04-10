<?php include("../header2.php"); ?>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Formato_Historia_Clinica_Exodoncia.php"); ?>

        <div class="span9">

        <h2>Formato de Historia Clínica de Exodoncia</h2>

        <div class="well" style="width:1150px;">
            
        <form method="post" action="validacion_formatohistoriaclinicaexodoncia.php">

        <input type="hidden" name="historia_clinica" id="historia_clinica" value="<?php echo $_GET['formato']; ?>">
            
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Aparatos y Sístemas</a></li>
            <li><a href="#tab3">Odontograma</a></li>
          </ul>
            
          <?php 
            $Formato_Historia_Clinica_Exodoncia = new Formato_Historia_Clinica_Exodoncia();

            $Formato_Historia_Clinica_Exodoncia->IdHistoriaClinicaExodoncia = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Exodoncia->Obtener_Formato();

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
              <input type="hidden" value="<?php echo $_GET['formato']; ?>" name="historia_clinica" id="historia_clinica">
              <br>
              <div class="row"> 
                <div class="span5">
                    <label><strong>Paciente:</strong>
                    <?php echo $Datos_Formato['NombrePaciente']. ' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?>
                    </label>
                  </select>
                </div>
              </div>
              
              <div class="row">
                  <br />
                <div class="span0.5"> <label><strong>Edad: </strong> <?php echo $Edad; ?> Año(s)</label></div>
                <div class="span0.5"> <label><strong> Sexo: </strong> <?php echo $Datos_Formato['SexoPaciente']; ?></label> </div>
                <div class="span1"></div>
              </div>
              <br />
              <div class="row">
                <div class="span2"> <label><strong> Fecha: </strong> <?php echo $fecha_registro; ?></label></div>
              </div>
              <br />
              <div class="row"> 
                <div class="span2"> <label><strong>Ocupación:</strong> <?php echo $Datos_Formato['OcupacionPaciente']; ?></label> </div> 
                <div class="span1.5"><label><strong>Lugar de Nacimiento:</strong> <?php echo $Datos_Formato['PoblacionPaciente']; ?></label></div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> Examen bucal: </strong></label> </div>
                <div class="span1"> <label><strong> Diagnóstico: </strong></label> </div>
                <div class="span3.5"> <input type="text" placeholder="Diagnóstico" style="width:350px;" id="examen_buscal_diagnostico" name="examen_bucal_diagnostico" value="<?php echo $Datos_Formato['Examen_Bucal_Diagnostico']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1 offset1" style="padding-left:30px;"> <label><strong> Tratamiento: </strong></label> </div>
                <div class="span3.5"> <input type="text" placeholder="Tratamiento" style="width:350px;" id="examen_bucal_tratamiento" name="examen_bucal_tratamiento" value="<?php echo $Datos_Formato['Examen_Bucal_Tratamiento']; ?>"> </div>
              </div>
            </div><!-- fin tab1 -->
            
            <div class="tab-pane" id="tab2">
              <h2>Aparatos y Sístemas</h2>

              <table class="table table-striped">
                <thead>
                  <th></th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                    <td style="width:250px"><label><strong> Cardiovascular </strong></label></td>
                    <td><input type="text" placeholder="Cardiovascular" style="width:75%" id="aparatos_sistemas_cardiovascular" name="aparatos_sistemas_cardiovascular" value="<?php echo $Datos_Formato['Aparatos_Sistemas_Cardiovascular']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"><label><strong> Renal </strong></label></td>
                    <td><input type="text" placeholder="Renal" style="width:75%" id="aparatos_sistemas_renal" name="aparatos_sistemas_renal" value="<?php echo $Datos_Formato['Aparatos_Sistemas_Renal']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"><label><strong> Nervioso </strong></label></td>
                    <td><input type="text" placeholder="Nervioso" style="width:75%" id="aparatos_sistemas_nervioso" name="aparatos_sistemas_nervioso" value="<?php echo $Datos_Formato['Aparatos_Sistemas_Nervioso']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"><label><strong> Digestivo </strong></label></td>
                    <td><input type="text" placeholder="Digestivo" style="width:75%" id="aparatos_sistemas_digestivo" name="aparatos_sistemas_digestivo" value="<?php echo $Datos_Formato['Aparatos_Sistemas_Digestivo']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"><label><strong> Respiratorio </strong></label></td>
                    <td><input type="text" placeholder="Respiratorio" style="width:75%" id="aparatos_sistemas_respiratorio" name="aparatos_sistemas_respiratorio" value="<?php echo $Datos_Formato['Aparatos_Sistemas_Respiratorio']; ?>"></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-striped">
                <thead>
                  <th></th>
                  <th></th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                    <td rowspan="5" style="padding-top:75px; text-align:center; font-size:20px;"> <strong> Genitourinario </strong> </td>
                  </tr>
                  <tr>
                    <td> <strong> Embarazo </strong> </td>
                    <td><input type="text" placeholder="Embarazo" style="width:75%" id="genitourinario_embarazo" name="genitourinario_embarazo" value="<?php echo $Datos_Formato['Genitourinario_Embarazo']; ?>"></td>
                  </tr>
                  <tr>
                    <td> <strong> Menopausia </strong> </td>
                    <td><input type="text" placeholder="Menopausia" style="width:75%" id="genitourinario_menopausia" name="genitourinario_menopausia" value="<?php echo $Datos_Formato['Genitourinario_Menopausia']; ?>"></td>
                  </tr>
                  <tr>
                    <td> <strong> Lactancia </strong> </td>
                    <td><input type="text" placeholder="Lactancia" style="width:75%" id="genitourinario_lactancia" name="genitourinario_lactancia" value="<?php echo $Datos_Formato['Genitourinario_Lactancia']; ?>"></td>
                  </tr>
                  <tr>
                    <td> <strong> Menstruación </strong> </td>
                    <td><input type="text" placeholder="Menstruación" style="width:75%" id="genitourinario_menstruacion" name="genitourinario_menstruacion" value="<?php echo $Datos_Formato['Genitourinario_Menstruacion']; ?>"></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-striped">
                <thead>
                  <th></th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                    <td style="width:250px"> <strong> Propensión Hemorragíca </strong> </td>
                    <td><input type="text" placeholder="Propensión Hemorragíca" style="width:75%" id="propension_hemorragica" name="propension_hemorragica" value="<?php echo $Datos_Formato['Propension_Hemorragica']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"> <strong> Pruebas de Laboratorio </strong> </td>
                    <td><input type="text" placeholder="Pruebas de Laboratorio" style="width:75%" id="pruebas_laboratorio" name="pruebas_laboratorio" value="<?php echo $Datos_Formato['Pruebas_Laboratorio']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"> <strong> Estudio Radiológico </strong> </td>
                    <td><input type="text" placeholder="Estudio Radiológico" style="width:75%" id="estudio_radiologico" name="estudio_radiologico" value="<?php echo $Datos_Formato['Estudio_Radiologico']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"> <strong> Estado General </strong> </td>
                    <td><input type="text" placeholder="Estado General" style="width:75%" id="estado_general" name="estado_general" value="<?php echo $Datos_Formato['Estado_General']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"> <strong> Indica la Extracción Dentaria </strong> </td>
                    <td><input type="text" placeholder="Indica la Extracción Dentaria" style="width:75%" id="extraccion_dentaria" name="extraccion_dentaria" value="<?php echo $Datos_Formato['Extraccion_Dentaria']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"> <strong> Analgesia Indicada </strong> </td>
                    <td><input type="text" placeholder="Analgesia Indicada" style="width:75%" id="analgesia_indicada" name="analgesia_indicada" value="<?php echo $Datos_Formato['Analgesia_Indicada']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"> <strong> Prescripciones Operatorias </strong> </td>
                    <td><input type="text" placeholder="Prescripciones Operatorias" style="width:75%" id="prescripciones_operatorias" name="prescripciones_operatorias" value="<?php echo $Datos_Formato['Prescripciones_Operatorias']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"> <strong> Complicaciones </strong> </td>
                    <td><input type="text" placeholder="Complicaciones" style="width:75%" id="complicaciones" name="complicaciones" value="<?php echo $Datos_Formato['Complicaciones']; ?>"></td>
                  </tr>
                  <tr>
                    <td style="width:250px"> <strong> Indicaciones al Paciente </strong> </td>
                    <td><input type="text" placeholder="Indicaciones al Paciente" style="width:75%" id="indicacion_paciente" name="indicacion_paciente" value="<?php echo $Datos_Formato['Indicacion_Paciente']; ?>"></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- fin tab2 -->
            <div class="tab-pane" id="tab3">
              <h2>Odontograma</h2>

              <input type="hidden" id="tipo-odontograma" value="exodoncia">

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
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-18">
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_18'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-18">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-18 <?php echo ($Datos_Formato['Diente_18'] == "1" ? "seleccionado":""); ?>" id="campo-seleccionado-arriba-18">
                        </div>
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_18'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-18">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-18" id="campo-seleccionado-izquierda-18">
                        </div>
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_18'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-18">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-18" id="campo-seleccionado-centro-18">
                        </div>
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_18'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-18">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-18" name="campo-seleccionado-derecha-18">
                        </div>
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_18'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-18">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-18" name="campo-seleccionado-abajo-18">
                        </div>
                      </div>
                    </td>
                      
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-17">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_17'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-17">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-17" id="campo-seleccionado-arriba-17">
                          </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_17'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-17">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-17" id="campo-seleccionado-izquierda-17">
                          </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_17'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-17">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-17" id="campo-seleccionado-centro-17">
                          </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_17'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-17">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-17" name="campo-seleccionado-derecha-17">
                          </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_17'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-17">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-17" name="campo-seleccionado-abajo-17">
                          </div>
                      </div>
                    </td>
                      
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-16">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_16'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-16">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-16" id="campo-seleccionado-arriba-16">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_16'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-16">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-16" id="campo-seleccionado-izquierda-16">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_16'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-16">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-16" id="campo-seleccionado-centro-16">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_16'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-16">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-16" name="campo-seleccionado-derecha-16">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_16'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-16">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-16" name="campo-seleccionado-abajo-16">
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-15">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_15'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-15">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-15" id="campo-seleccionado-arriba-15">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_15'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-15">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-15" id="campo-seleccionado-izquierda-15">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_15'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-15">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-15" id="campo-seleccionado-centro-15">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_15'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-15">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-15" name="campo-seleccionado-derecha-15">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_15'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-15">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-15" name="campo-seleccionado-abajo-15">
                        </div>
                      </div>
                    </td>
                      
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-14">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_14'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-14">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-14" id="campo-seleccionado-arriba-14">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_14'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-14">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-14" id="campo-seleccionado-izquierda-14">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_14'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-14">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-14" id="campo--centro-14">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_14'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-14">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-14" name="campo-seleccionado-derecha-14">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_14'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-14">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-14" name="campo-seleccionado-abajo-14">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-13">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_13'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-13">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-13" id="campo-seleccionado-arriba-13">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_13'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-13">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-13" id="campo-seleccionado-izquierda-13">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_13'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-13">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-13" id="campo-seleccionado-centro-13">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_13'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-13">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-13" name="campo-seleccionado-derecha-13">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_13'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-13">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-13" name="campo-seleccionado-abajo-13">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-12">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_12'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-12">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-12" id="campo-seleccionado-arriba-12">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_12'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-12">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-12" id="campo-seleccionado-izquierda-12">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_12'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-12">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-12" id="campo-seleccionado-centro-12">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_12'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-12">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-12" name="campo-seleccionado-derecha-12">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_12'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-12">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-12" name="campo-seleccionado-abajo-12">
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-11">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_11'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-11">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-11" id="campo-seleccionado-arriba-11">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_11'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-11">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-11" id="campo-seleccionado-izquierda-11">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_11'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-11">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-11" id="campo-seleccionado-centro-11">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_11'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-11">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-11" name="campo-seleccionado-derecha-11">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_11'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-11">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-11" name="campo-seleccionado-abajo-11">
                        </div>
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-21">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_21'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-21">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-21" id="campo-seleccionado-arriba-21">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_21'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-21">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-21" id="campo-seleccionado-izquierda-21">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_21'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-21">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-21" id="campo-seleccionado-centro-21">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_21'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-21">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-21" name="campo-seleccionado-derecha-21">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_21'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-21">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-21" name="campo-seleccionado-abajo-21">
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-22">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_22'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-22">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-22" id="campo-seleccionado-arriba-22">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_22'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-22">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-22" id="campo-seleccionado-izquierda-22">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_22'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-22">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-22" id="campo-seleccionado-centro-22">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_22'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-22">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-22" name="campo-seleccionado-derecha-22">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_22'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-22">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-22" name="campo-seleccionado-abajo-22">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-23">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_23'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-23">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-23" id="campo-seleccionado-arriba-23">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_23'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-23">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-23" id="campo-seleccionado-izquierda-23">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_23'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-23">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-23" id="campo-seleccionado-centro-23">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_23'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-23">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-23" name="campo-seleccionado-derecha-23">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_23'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-23">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-23" name="campo-seleccionado-abajo-23">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-24">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_24'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-24">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-24" id="campo-seleccionado-arriba-24">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_24'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-24">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-24" id="campo-seleccionado-izquierda-24">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_24'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-24">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-24" id="campo-seleccionado-centro-24">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_24'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-24">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-24" name="campo-seleccionado-derecha-24">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_24'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-24">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-24" name="campo-seleccionado-abajo-24">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-25">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_25'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-25">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-25" id="campo-seleccionado-arriba-25">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_25'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-25">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-25" id="campo-seleccionado-izquierda-25">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_25'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-25">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-25" id="campo-seleccionado-centro-25">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_25'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-25">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-25" name="campo-seleccionado-derecha-25">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_25'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-25">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-25" name="campo-seleccionado-abajo-25">
                        </div>   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-26">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_26'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-26">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-26" id="campo-seleccionado-arriba-26">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_26'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-26">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-26" id="campo-seleccionado-izquierda-26">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_26'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-26">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-26" id="campo-seleccionado-centro-26">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_26'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-26">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-26" name="campo-seleccionado-derecha-26">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_26'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-26">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-26" name="campo-seleccionado-abajo-26">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-27">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_27'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-27">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-27" id="campo-seleccionado-arriba-27">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_27'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-27">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-27" id="campo-seleccionado-izquierda-27">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_27'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-27">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-27" id="campo-seleccionado-centro-27">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_27'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-27">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-27" name="campo-seleccionado-derecha-27">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_27'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-27">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-27" name="campo-seleccionado-abajo-27">
                        </div>   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-28">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_28'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-28">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-28" id="campo-seleccionado-arriba-28">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_28'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-28">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-28" id="campo-seleccionado-izquierda-28">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_28'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-28">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-28" id="campo-seleccionado-centro-28">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_28'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-28">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-28" name="campo-seleccionado-derecha-28">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_28'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-28">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-28" name="campo-seleccionado-abajo-28">
                        </div> 
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
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-48">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_48'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-48">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-48" id="campo-seleccionado-arriba-48">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_48'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-48">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-48" id="campo-seleccionado-izquierda-48">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_48'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-48">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-48" id="campo-seleccionado-centro-48">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_48'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-48">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-48" name="campo-seleccionado-derecha-48">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_48'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-48">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-48" name="campo-seleccionado-abajo-48">
                        </div>   
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-47">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_47'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-47">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-47" id="campo-seleccionado-arriba-47">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_47'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-47">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-47" id="campo-seleccionado-izquierda-47">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_47'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-47">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-47" id="campo-seleccionado-centro-47">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_47'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-47">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-47" name="campo-seleccionado-derecha-47">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_47'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-47">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-47" name="campo-seleccionado-abajo-47">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-46">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_46'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-46">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-46" id="campo-seleccionado-arriba-46">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_46'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-46">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-46" id="campo-seleccionado-izquierda-46">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_46'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-46">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-46" id="campo-seleccionado-centro-46">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_46'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-46">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-46" name="campo-seleccionado-derecha-46">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_46'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-46">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-46" name="campo-seleccionado-abajo-46">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-45">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_45'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-45">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-45" id="campo-seleccionado-arriba-45">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_45'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-45">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-45" id="campo-seleccionado-izquierda-45">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_45'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-45">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-45" id="campo-seleccionado-centro-45">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_45'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-45">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-45" name="campo-seleccionado-derecha-45">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_45'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-45">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-45" name="campo-seleccionado-abajo-45">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-44">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_44'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-44">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-44" id="campo-seleccionado-arriba-44">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_44'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-44">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-44" id="campo-seleccionado-izquierda-44">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_44'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-44">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-44" id="campo-seleccionado-centro-44">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_44'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-44">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-44" name="campo-seleccionado-derecha-44">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_44'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-44">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-44" name="campo-seleccionado-abajo-44">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-43">                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_43'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-43">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-43" id="campo-seleccionado-arriba-43">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_43'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-43">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-43" id="campo-seleccionado-izquierda-43">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_43'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-43">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-43" id="campo-seleccionado-centro-43">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_43'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-43">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-43" name="campo-seleccionado-derecha-43">
                        </div>
                          
                        <div class="seleccionado-abajo diente  <?php echo ($Datos_Formato['Diente_43'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-43">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-43" name="campo-seleccionado-abajo-43 <?php echo ($Datos_Formato['Diente_43'] == "1" ? "seleccionado":""); ?>">
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-42">                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_42'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-42">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-42" id="campo-seleccionado-arriba-42">
                        </div>                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_42'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-42">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-42" id="campo-seleccionado-izquierda-42">
                        </div>                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_42'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-42">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-42" id="campo-seleccionado-centro-42">
                        </div>                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_42'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-42">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-42" name="campo-seleccionado-derecha-42">
                        </div>                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_42'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-42">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-42" name="campo-seleccionado-abajo-42">
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-41">                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_41'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-41">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-41" id="campo-seleccionado-arriba-41">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_41'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-41">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-41" id="campo-seleccionado-izquierda-41">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_41'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-41">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-41" id="campo-seleccionado-centro-41">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_41'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-41">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-41" name="campo-seleccionado-derecha-41">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_41'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-41">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-41" name="campo-seleccionado-abajo-41">
                        </div> 
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-31">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_31'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-31">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-31" id="campo-seleccionado-arriba-31">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_31'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-31">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-31" id="campo-seleccionado-izquierda-31">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_31'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-31">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-31" id="campo-seleccionado-centro-31">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_31'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-31">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-31" name="campo-seleccionado-derecha-31">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_31'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-31">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-31" name="campo-seleccionado-abajo-31">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-32">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_32'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-32">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-32" id="campo-seleccionado-arriba-32">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_32'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-32">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-32" id="campo-seleccionado-izquierda-32">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_32'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-32">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-32" id="campo-seleccionado-centro-32">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_32'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-32">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-32" name="campo-seleccionado-derecha-32">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_32'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-32">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-32" name="campo-seleccionado-abajo-32">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-33">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_33'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-33">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-33" id="campo-seleccionado-arriba-33">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_33'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-33">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-33" id="campo-seleccionado-izquierda-33">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_33'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-33">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-33" id="campo-seleccionado-centro-33">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_33'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-33">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-33" name="campo-seleccionado-derecha-33">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_33'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-33">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-33" name="campo-seleccionado-abajo-33">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-34">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_34'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-34">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-34" id="campo-seleccionado-arriba-34">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_34'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-34">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-34" id="campo-seleccionado-izquierda-34">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_34'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-34">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-34" id="campo-seleccionado-centro-34">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_34'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-34">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-34" name="campo-seleccionado-derecha-34">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_34'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-34">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-34" name="campo-seleccionado-abajo-34">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-35">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_35'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-35">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-35" id="campo-seleccionado-arriba-35">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_35'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-35">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-35" id="campo-seleccionado-izquierda-35">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_35'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-35">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-35" id="campo-seleccionado-centro-35">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_35'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-35">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-35" name="campo-seleccionado-derecha-35">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_35'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-35">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-35" name="campo-seleccionado-abajo-35">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-36">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_36'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-36">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-36" id="campo-seleccionado-arriba-36">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_36'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-36">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-36" id="campo-seleccionado-izquierda-36">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_36'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-36">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-36" id="campo-seleccionado-centro-36">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_36'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-36">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-36" name="campo-seleccionado-derecha-36">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_36'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-36">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-36" name="campo-seleccionado-abajo-36">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-37">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_37'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-37">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-37" id="campo-seleccionado-arriba-37">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_37'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-37">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-37" id="campo-seleccionado-izquierda-37">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_37'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-37">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-37" id="campo-seleccionado-centro-37">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_37'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-37">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-37" name="campo-seleccionado-derecha-37">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_37'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-37">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-37" name="campo-seleccionado-abajo-37">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-38">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_38'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-38">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-38" id="campo-seleccionado-arriba-38">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_38'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-38">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-38" id="campo-seleccionado-izquierda-38">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_38'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-38">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-38" id="campo-seleccionado-centro-38">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_38'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-38">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-38" name="campo-seleccionado-derecha-38">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_38'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-38">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-38" name="campo-seleccionado-abajo-38">
                        </div>  
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
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-55">                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_55'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-55">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-55" id="campo-seleccionado-arriba-55">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_55'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-55">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-55" id="campo-seleccionado-izquierda-55">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_55'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-55">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-55" id="campo-seleccionado-centro-55">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_55'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-55">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-55" name="campo-seleccionado-derecha-55">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_55'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-55">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-55" name="campo-seleccionado-abajo-55">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-55" id="padecimiento-55">
                        <input type="hidden" value="0" name="numero-seleccionados-55" id="numero-seleccionados-55">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-54">                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_54'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-54">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-54" id="campo-seleccionado-arriba-54">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_54'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-54">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-54" id="campo-seleccionado-izquierda-54">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_54'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-54">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-54" id="campo-centro-54">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_54'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-54">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-54" name="campo-seleccionado-derecha-54">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_54'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-54">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-54" name="campo-seleccionado-abajo-54">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-54" id="padecimiento-54">
                        <input type="hidden" value="0" name="numero-seleccionados-54" id="numero-seleccionados-54">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-53">                        
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_53'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-53">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-53" id="campo-seleccionado-arriba-53">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_53'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-53">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-53" id="campo-seleccionado-izquierda-53">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_53'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-53">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-53" id="campo-seleccionado-centro-53">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_53'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-53">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-53" name="campo-seleccionado-derecha-53">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_53'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-53">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-53" name="campo-seleccionado-abajo-53">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-53" id="padecimiento-53">
                        <input type="hidden" value="0" name="numero-seleccionados-53" id="numero-seleccionados-53">  
                      </div>
                    </td>                    
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-52">                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_52'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-52">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-52" id="campo-seleccionado-arriba-52">
                        </div>                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_52'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-52">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-52" id="campo-seleccionado-izquierda-52">
                        </div>                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_52'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-52">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-52" id="campo-seleccionado-centro-52">
                        </div>                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_52'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-52">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-52" name="campo-seleccionado-derecha-52">
                        </div>                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_52'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-52">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-52" name="campo-seleccionado-abajo-52">
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-51">                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_51'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-51">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-51" id="campo-seleccionado-arriba-51">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_51'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-51">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-51" id="campo-seleccionado-izquierda-51">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_51'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-51">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-51" id="campo-seleccionado-centro-51">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_51'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-51">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-51" name="campo-seleccionado-derecha-51">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_51'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-51">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-51" name="campo-seleccionado-abajo-51">
                        </div> 
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-61">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_61'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-61">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-61" id="campo-seleccionado-arriba-61">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_61'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-61">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-61" id="campo-seleccionado-izquierda-61">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_61'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-61">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-61" id="campo-seleccionado-centro-61">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_61'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-61">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-61" name="campo-seleccionado-derecha-61">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_61'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-61">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-61" name="campo-seleccionado-abajo-61">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-62">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_62'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-62">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-62" id="campo-seleccionado-arriba-62">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_62'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-62">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-62" id="campo-seleccionado-izquierda-62">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_62'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-62">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-62" id="campo-seleccionado-centro-62">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_62'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-62">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-62" name="campo-seleccionado-derecha-62">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_62'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-62">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-62" name="campo-seleccionado-abajo-62">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-63">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_63'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-63">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-63" id="campo-seleccionado-arriba-63">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_63'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-63">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-63" id="campo-seleccionado-izquierda-63">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_63'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-63">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-63" id="campo-seleccionado-centro-63">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_63'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-63">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-63" name="campo-seleccionado-derecha-63">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_63'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-63">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-63" name="campo-seleccionado-abajo-63">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-64">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_64'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-64">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-64" id="campo-seleccionado-arriba-64">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_64'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-64">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-64" id="campo-seleccionado-izquierda-64">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_64'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-64">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-64" id="campo-seleccionado-centro-64">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_64'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-64">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-64" name="campo-seleccionado-derecha-64">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_64'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-64">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-64" name="campo-seleccionado-abajo-64">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-65">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_65'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-65">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-65" id="campo-seleccionado-arriba-65">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_65'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-65">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-65" id="campo-seleccionado-izquierda-65">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_65'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-65">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-65" id="campo-seleccionado-centro-65">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_65'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-65">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-65" name="campo-seleccionado-derecha-65">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_65'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-65">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-65" name="campo-seleccionado-abajo-65">
                        </div> 
                      </div>
                    </td>
                    </tr>
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
                      <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-85">                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_85'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-85">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-85" id="campo-seleccionado-arriba-85">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_85'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-85">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-85" id="campo-seleccionado-izquierda-85">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_85'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-85">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-85" id="campo-seleccionado-centro-85">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_85'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-85">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-85" name="campo-seleccionado-derecha-85">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_85'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-85">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-85" name="campo-seleccionado-abajo-85">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-85" id="padecimiento-85">
                        <input type="hidden" value="0" name="numero-seleccionados-85" id="numero-seleccionados-85">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-84">                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_84'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-84">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-84" id="campo-seleccionado-arriba-84">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_84'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-84">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-84" id="campo-seleccionado-izquierda-84">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_84'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-84">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-84" id="campo-centro-84">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_84'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-84">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-84" name="campo-seleccionado-derecha-84">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_84'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-84">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-84" name="campo-seleccionado-abajo-84">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-84" id="padecimiento-84">
                        <input type="hidden" value="0" name="numero-seleccionados-84" id="numero-seleccionados-84">  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-83">                        
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_83'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-83">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-83" id="campo-seleccionado-arriba-83">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_83'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-83">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-83" id="campo-seleccionado-izquierda-83">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_83'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-83">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-83" id="campo-seleccionado-centro-83">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_83'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-83">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-83" name="campo-seleccionado-derecha-83">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_83'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-83">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-83" name="campo-seleccionado-abajo-83">
                        </div>
                        <input type="hidden" value="0" name="padecimiento-83" id="padecimiento-83">
                        <input type="hidden" value="0" name="numero-seleccionados-83" id="numero-seleccionados-83">  
                      </div>
                    </td>                    
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-82">                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_82'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-82">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-82" id="campo-seleccionado-arriba-82">
                        </div>                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_82'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-82">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-82" id="campo-seleccionado-izquierda-82">
                        </div>                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_82'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-82">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-82" id="campo-seleccionado-centro-82">
                        </div>                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_82'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-82">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-82" name="campo-seleccionado-derecha-82">
                        </div>                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_82'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-82">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-82" name="campo-seleccionado-abajo-82">
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-81">                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_81'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-81">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-81" id="campo-seleccionado-arriba-81">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_81'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-81">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-81" id="campo-seleccionado-izquierda-81">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_81'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-81">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-81" id="campo-seleccionado-centro-81">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_81'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-81">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-81" name="campo-seleccionado-derecha-81">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_81'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-81">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-81" name="campo-seleccionado-abajo-81">
                        </div> 
                      </div>
                    </td>
                    <td></td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-71">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_71'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-71">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-71" id="campo-seleccionado-arriba-71">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_71'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-71">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-71" id="campo-seleccionado-izquierda-71">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_71'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-71">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-71" id="campo-seleccionado-centro-71">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_71'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-71">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-71" name="campo-seleccionado-derecha-71">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_71'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-71">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-71" name="campo-seleccionado-abajo-71">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-72">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_72'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-72">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-72" id="campo-seleccionado-arriba-72">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_72'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-72">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-72" id="campo-seleccionado-izquierda-72">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_72'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-72">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-72" id="campo-seleccionado-centro-72">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_72'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-72">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-72" name="campo-seleccionado-derecha-72">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_72'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-72">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-72" name="campo-seleccionado-abajo-72">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-73">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_73'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-73">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-73" id="campo-seleccionado-arriba-73">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_73'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-73">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-73" id="campo-seleccionado-izquierda-73">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_73'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-73">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-73" id="campo-seleccionado-centro-73">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_73'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-73">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-73" name="campo-seleccionado-derecha-73">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_73'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-73">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-73" name="campo-seleccionado-abajo-73">
                        </div> 
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-74">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_74'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-74">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-74" id="campo-seleccionado-arriba-74">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_74'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-74">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-74" id="campo-seleccionado-izquierda-74">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_74'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-74">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-74" id="campo-seleccionado-centro-74">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_74'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-74">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-74" name="campo-seleccionado-derecha-74">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_74'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-74">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-74" name="campo-seleccionado-abajo-74">
                        </div>  
                      </div>
                    </td>
                    <td>
                      <div class="contenedor" class="contenedor-diente" id="diente-75">
                          
                        <div class="seleccionado-arriba diente <?php echo ($Datos_Formato['Diente_75'] == "1" ? "seleccionado":""); ?>" id="seleccionado-arriba-75">
                            <input type="hidden" value="0" name="campo-seleccionado-arriba-75" id="campo-seleccionado-arriba-75">
                        </div>
                          
                        <div class="seleccionado-izquierda diente <?php echo ($Datos_Formato['Diente_75'] == "1" ? "seleccionado":""); ?>" id="seleccionado-izquierda-75">
                            <input type="hidden" value="0" name="campo-seleccionado-izquierda-75" id="campo-seleccionado-izquierda-75">
                        </div>
                          
                        <div class="seleccionado-centro diente <?php echo ($Datos_Formato['Diente_75'] == "1" ? "seleccionado":""); ?>" id="seleccionado-centro-75">
                            <input type="hidden" value="0" name="campo-seleccionado-centro-75" id="campo-seleccionado-centro-75">
                        </div>
                          
                        <div class="seleccionado-derecha diente <?php echo ($Datos_Formato['Diente_75'] == "1" ? "seleccionado":""); ?>" id="seleccionado-derecha-75">
                            <input type="hidden" value="0" id="campo-seleccionado-derecha-75" name="campo-seleccionado-derecha-75">
                        </div>
                          
                        <div class="seleccionado-abajo diente <?php echo ($Datos_Formato['Diente_75'] == "1" ? "seleccionado":""); ?>" id="seleccionado-abajo-75">
                            <input type="hidden" value="0" id="campo-seleccionado-abajo-75" name="campo-seleccionado-abajo-75">
                        </div> 
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

                
            </div><!-- fin tab3 -->
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
          <a href="../clinica/formatohistoriaclinicaexodoncia.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
        </div>
		<?php endif; ?>
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->
      <input type="hidden" id="ventana" value="formato-historia-clinica-exodoncia">

<script type="text/javascript" src="../js/chrome.js"></script>  

<?php include("../footer2.php"); ?>