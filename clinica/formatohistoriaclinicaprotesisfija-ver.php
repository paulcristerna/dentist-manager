<?php include("../header2.php"); ?>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Formato_Historia_Clinica_Protesis_Fija.php"); ?>

        <div class="span9">

        <h2>Formato de Historia Clínica de Prótesis Fija</h2>

        <div class="well">
            
        <form method="post" action="validacion_formatohistoriaclinicaprotesisfija.php">
            
        <input type="hidden" id="historia_clinica" name="historia_clinica" value="<?php echo $_GET['formato']; ?>">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Evaluación Clínica</a></li>
            <li><a href="#tab3">Análisis de la Oclusión</a></li>
          </ul>
            
          <?php 
            $Formato_Historia_Clinica_Protesis_Fija = new Formato_Historia_Clinica_Protesis_Fija();

            $Formato_Historia_Clinica_Protesis_Fija->IdHistoriaClinicaProtesisFija = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Protesis_Fija->Obtener_Formato();

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
                <div class="span5">
                    <label><strong>Paciente:</strong>
                    <?php echo $Datos_Formato['NombrePaciente'].' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></label>
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span2">
                    <label><strong>Edad:</strong> <?php echo $Edad; ?> Año(s)</label>
                </div>
                <div class="span2">
                    <label><strong>Sexo:</strong> <?php echo $Datos_Formato['SexoPaciente']; ?></label>
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span2">
                    <label><strong>Ocupación:</strong>
                    <?php echo $Datos_Formato['OcupacionPaciente']; ?></label>
                </div> 
                <div class="span2">
                    <label><strong>Teléfono:</strong> <?php echo $Datos_Formato['TelefonoPaciente']; ?></label>
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span5">
                    <label><strong>Domicilio:</strong> <?php echo $Datos_Formato['CallePaciente'].' '.$Datos_Formato['NumeroPaciente'].' '.$Datos_Formato['ColoniaPaciente'].' '.$Datos_Formato['PoblacionPaciente']; ?>.</label>
                </div>
              </div>
              <br />
              <div class="row"> 
                <div class="span1.5">
                    <label><strong>Lugar de Nacimiento:</strong> <?php echo $Datos_Formato['PoblacionPaciente']; ?>.</label>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> ¿Cuál es el Motivo de la Consulta? </strong></label> </div>
                <div class="span3.5"> <input type="text" style="width:450px;" placeholder="¿Cuál es el Motivo de la Consulta?" id="motivo_consulta" name="motivo_consulta" value="<?php echo $Datos_Formato['Motivo_Consulta']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> ¿Se encuentra bajo Tx Médico? </strong></label> </div>
                <div class="span3.5"> <input type="text" style="width:450px;" placeholder="¿Se encuentra bajo Tx Médico?" id="tx_medico" name="tx_medico" value="<?php echo $Datos_Formato['Tx_Medico']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> ¿Cuál? </strong></label> </div>
                <div class="span3.5"> <input type="text" style="width:450px;" placeholder="¿Cuál?" id="cual_motivo" name="cual_motivo" value="<?php echo $Datos_Formato['Cual_Motivo']; ?>"> </div>
              </div>

            </div><!-- fin tab1 -->

            <div class="tab-pane" id="tab2" style="height:720px;overflow:hidden">
              <h2>Evaluación Clínica</h2>
              <p>Seleccione un padecimiento y haga clic sobre el diente correspondiente.</p>

              <div class="row">
                <div class="span8">
                  <p>
                    <span class="badge btn-institucional" id="azul" style="margin: 5px">Dientes con Caries</span>
                    <span class="badge btn-warning" id="amarillo" style="margin: 5px;">Prótesis Parcial Fija</span>
                    <span class="badge btn-success" id="verde" style="margin: 5px;">Prótesis Parcial Removible</span>
                    <span class="badge btn-inverse" id="negro" style="margin: 5px;">Dientes Ausentes</span>
                    <span class="badge btn-danger" id="rojo" style="margin: 5px;">Restauraciones Individuales</span>
                  </p>
                </div>
              </div>        
                
              <input type="hidden" id="tipo" value="evaluacion_clinica">
              <div id="contenedor-dental">
                <div class="izquierda">
                  <div class="dientes diente-izq-1 
                    <?php switch($Datos_Formato['DienteIzq_1']): 
                    case '1': ?>
                    diente-izq-1-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-1-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-1-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-1-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-1-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-1" name="campo-diente-izq-1" value="0">
                  </div>
                  <div class="dientes diente-izq-2
                    <?php switch($Datos_Formato['DienteIzq_2']): 
                    case '1': ?>
                    diente-izq-2-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-2-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-2-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-2-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-2-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-2" name="campo-diente-izq-2" value="0">  
                  </div>
                  <div class="dientes diente-izq-3
                    <?php switch($Datos_Formato['DienteIzq_3']): 
                    case '1': ?>
                    diente-izq-3-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-3-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-3-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-3-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-3-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-3" name="campo-diente-izq-3" value="0">  
                  </div>
                  <div class="dientes diente-izq-4
                    <?php switch($Datos_Formato['DienteIzq_4']): 
                    case '1': ?>
                    diente-izq-4-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-4-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-4-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-4-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-4-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-4" name="campo-diente-izq-4" value="0">  
                  </div>
                  <div class="dientes diente-izq-5
                    <?php switch($Datos_Formato['DienteIzq_5']): 
                    case '1': ?>
                    diente-izq-5-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-5-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-5-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-5-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-5-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-5" name="campo-diente-izq-5" value="0">    
                  </div>
                  <div class="dientes diente-izq-6
                    <?php switch($Datos_Formato['DienteIzq_6']): 
                    case '1': ?>
                    diente-izq-6-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-6-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-6-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-6-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-6-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-6" name="campo-diente-izq-6" value="0">  
                  </div>
                  <div class="dientes diente-izq-7
                    <?php switch($Datos_Formato['DienteIzq_7']): 
                    case '1': ?>
                    diente-izq-7-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-7-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-7-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-7-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-7-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-7" name="campo-diente-izq-7" value="0">  
                  </div>
                  <div class="dientes diente-izq-8
                    <?php switch($Datos_Formato['DienteIzq_8']): 
                    case '1': ?>
                    diente-izq-8-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-8-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-8-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-8-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-8-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-8" name="campo-diente-izq-8" value="0">    
                  </div>
                  <div class="dientes diente-izq-9
                    <?php switch($Datos_Formato['DienteIzq_9']): 
                    case '1': ?>
                    diente-izq-9-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-9-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-9-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-9-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-9-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-9" name="campo-diente-izq-9" value="0">    
                  </div>
                  <div class="dientes diente-izq-10
                    <?php switch($Datos_Formato['DienteIzq_10']): 
                    case '1': ?>
                    diente-izq-10-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-10-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-10-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-10-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-10-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-10" name="campo-diente-izq-10" value="0">    
                  </div>
                  <div class="dientes diente-izq-11
                    <?php switch($Datos_Formato['DienteIzq_11']): 
                    case '1': ?>
                    diente-izq-11-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-11-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-11-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-11-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-11-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-11" name="campo-diente-izq-11" value="0">    
                  </div>
                  <div class="dientes diente-izq-12
                    <?php switch($Datos_Formato['DienteIzq_12']): 
                    case '1': ?>
                    diente-izq-12-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-12-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-12-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-12-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-12-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-12" name="campo-diente-izq-12" value="0">    
                  </div>
                  <div class="dientes diente-izq-13
                    <?php switch($Datos_Formato['DienteIzq_13']): 
                    case '1': ?>
                    diente-izq-13-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-13-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-13-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-13-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-13-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-13" name="campo-diente-izq-13" value="0">    
                  </div>
                  <div class="dientes diente-izq-14
                    <?php switch($Datos_Formato['DienteIzq_14']): 
                    case '1': ?>
                    diente-izq-14-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-izq-14-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-izq-14-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-izq-14-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-izq-14-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-izq-14" name="campo-diente-izq-14" value="0">    
                  </div>
                </div>

                <div class="derecha">
                  <div class="dientes diente-der-1
                    <?php switch($Datos_Formato['DienteDer_1']): 
                    case '1': ?>
                    diente-der-1-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-1-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-1-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-1-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-1-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-1" name="campo-diente-der-1" value="0">   
                  </div>
                  <div class="dientes diente-der-2
                    <?php switch($Datos_Formato['DienteDer_2']): 
                    case '1': ?>
                    diente-der-2-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-2-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-2-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-2-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-2-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-2" name="campo-diente-der-2" value="0">  
                  </div>
                  <div class="dientes diente-der-3
                    <?php switch($Datos_Formato['DienteDer_3']): 
                    case '1': ?>
                    diente-der-3-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-3-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-3-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-3-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-3-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-3" name="campo-diente-der-3" value="0">    
                  </div>
                  <div class="dientes diente-der-4
                    <?php switch($Datos_Formato['DienteDer_4']): 
                    case '1': ?>
                    diente-der-4-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-4-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-4-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-4-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-4-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-4" name="campo-diente-der-4" value="0">    
                  </div>
                  <div class="dientes diente-der-5
                    <?php switch($Datos_Formato['DienteDer_5']): 
                    case '1': ?>
                    diente-der-5-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-5-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-5-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-5-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-5-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-5" name="campo-diente-der-5" value="0">    
                  </div>
                  <div class="dientes diente-der-6
                    <?php switch($Datos_Formato['DienteDer_6']): 
                    case '1': ?>
                    diente-der-6-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-6-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-6-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-6-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-6-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-6" name="campo-diente-der-6" value="0">    
                  </div>
                  <div class="dientes diente-der-7
                    <?php switch($Datos_Formato['DienteDer_7']): 
                    case '1': ?>
                    diente-der-7-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-7-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-7-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-7-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-7-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-7" name="campo-diente-der-7" value="0">    
                  </div>
                  <div class="dientes diente-der-8
                    <?php switch($Datos_Formato['DienteDer_8']): 
                    case '1': ?>
                    diente-der-8-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-8-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-8-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-8-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-8-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-8" name="campo-diente-der-8" value="0">    
                  </div>
                  <div class="dientes diente-der-9
                    <?php switch($Datos_Formato['DienteDer_9']): 
                    case '1': ?>
                    diente-der-9-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-9-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-9-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-9-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-9-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-9" name="campo-diente-der-9" value="0">    
                  </div>
                  <div class="dientes diente-der-10
                    <?php switch($Datos_Formato['DienteDer_10']): 
                    case '1': ?>
                    diente-der-10-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-10-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-10-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-10-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-10-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-10" name="campo-diente-der-10" value="0">    
                  </div>
                  <div class="dientes diente-der-11
                    <?php switch($Datos_Formato['DienteDer_11']): 
                    case '1': ?>
                    diente-der-11-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-11-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-11-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-11-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-11-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-11" name="campo-diente-der-11" value="0">    
                  </div>
                  <div class="dientes diente-der-12
                    <?php switch($Datos_Formato['DienteDer_12']): 
                    case '1': ?>
                    diente-der-12-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-12-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-12-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-12-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-12-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-12" name="campo-diente-der-12" value="0">    
                  </div>
                  <div class="dientes diente-der-13
                    <?php switch($Datos_Formato['DienteDer_13']): 
                    case '1': ?>
                    diente-der-13-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-13-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-13-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-13-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-13-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-13" name="campo-diente-der-13" value="0">    
                  </div>
                  <div class="dientes diente-der-14
                    <?php switch($Datos_Formato['DienteDer_14']): 
                    case '1': ?>
                    diente-der-14-azul
                    <?php break;?>
                    <?php case '2': ?>
                    diente-der-14-amarillo
                    <?php break;?>
                    <?php case '3': ?>
                    diente-der-14-verde
                    <?php break;?>
                    <?php case '4': ?>
                    diente-der-14-negro
                    <?php break;?>
                    <?php case '5': ?>
                    diente-der-14-rojo
                    <?php break;?>
                    <?php endswitch;?>">
                    <input type="hidden" id="campo-diente-der-14" name="campo-diente-der-14" value="0">  
                  </div>
                </div>
              </div>

              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Observaciones </strong></label> </div>
              </div>
              <div class="row"> 
                <div class="span8"> <textarea rows="3" cols="10" style="width:100%;" placeholder="Observaciones" id="observaciones_1" name="observaciones_1"><?php echo $Datos_Formato['Observaciones_1']; ?></textarea> </div>
              </div>
            </div><!-- fin tab2 -->

            <div class="tab-pane" id="tab3">
              <h2>Análisis de la Oclusión</h2>
              <br><br>
              <div class="row"> 
                <div class="span2"> <label><strong> Clasificación de Angle </strong></label> </div>
                <div class="span2"> 
                  <select style="width:100px" id="clasificacion_angle" name="clasificacion_angle">
                    <option value="1" <?php echo ($Datos_Formato['Clasificacion_Angle'] == "1" ? "selected":""); ?>>Grado 1</option>
                    <option value="2" <?php echo ($Datos_Formato['Clasificacion_Angle'] == "2" ? "selected":""); ?>>Grado 2</option>
                    <option value="3" <?php echo ($Datos_Formato['Clasificacion_Angle'] == "3" ? "selected":""); ?>>Grado 3</option>
                  </select> </div>
                <div class="span2"> <label><strong> Protección Canina </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="proteccion_canina" name="proteccion_canina">
                    <option value="1" <?php echo ($Datos_Formato['Proteccion_Canina'] == "1" ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Proteccion_Canina'] == "2" ? "selected":""); ?>>No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Protección Anterior </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="proteccion_anterior" name="proteccion_anterior">
                    <option value="1" <?php echo ($Datos_Formato['Proteccion_Anterior'] == "1" ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Proteccion_Canina'] == "2" ? "selected":""); ?>>No</option>
                  </select> </div>
                <div class="span2"> <label><strong> Función de Grupo </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="funcion_grupo" name="funcion_grupo">
                    <option value="1" <?php echo ($Datos_Formato['Funcion_Grupo'] == "1" ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Funcion_Grupo'] == "2" ? "selected":""); ?>>No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Protección Mutua </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="proteccion_mutua" name="proteccion_mutua">
                    <option value="1" <?php echo ($Datos_Formato['Proteccion_Mutua'] == "1" ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Proteccion_Mutua'] == "2" ? "selected":""); ?>>No</option>
                  </select> 
                </div>
                <div class="span2"> <label><strong> Mordida Cruzada </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="mordida_cruzada" name="mordida_cruzada">
                    <option value="1" <?php echo ($Datos_Formato['Mordida_Cruzada'] == "1" ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Mordida_Cruzada'] == "2" ? "selected":""); ?>>No</option>
                  </select> 
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Mordida Abierta </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="mordida_abierta" name="mordida_abierta">
                    <option value="1" <?php echo ($Datos_Formato['Mordida_Abierta'] == "1" ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Mordida_Abierta'] == "2" ? "selected":""); ?>>No</option>
                  </select> 
                </div>
                <div class="span2"> <label><strong> Sobremordida </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="sobremordida" name="sobremordida">
                    <option value="1" <?php echo ($Datos_Formato['Sobremordida'] == "1" ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Sobremordida'] == "2" ? "selected":""); ?>>No</option>
                  </select> 
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Traslape Horizontal </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="traslape_horizontal" name="traslape_horizontal">
                    <option value="1" <?php echo ($Datos_Formato['Traslape_Horizontal'] == "1" ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Traslape_Horizontal'] == "2" ? "selected":""); ?>>No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Observaciones </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Observaciones" id="observaciones_2" name="observaciones_2"><?php echo $Datos_Formato['Observaciones_2']; ?></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Examen Radiográfico </strong></label> </div>
                <div class="span2"> 
                  <select style="width:135px" id="examen_radiografico" name="examen_radiografico">
                    <option value="1" <?php echo ($Datos_Formato['Examen_Radiografico'] == "1" ? "selected":""); ?>>Periapical</option>
                    <option value="2" <?php echo ($Datos_Formato['Examen_Radiografico'] == "2" ? "selected":""); ?>>Craneal</option>
                  </select> 
                </div>
                <div class="span2"> <label><strong> Relación Corona-Raíz </strong></label> </div>
                <div class="span2"> 
                  <select style="width:135px" id="relacion_corana_raiz" name="relacion_corona_raiz">
                    <option value="1" <?php echo ($Datos_Formato['Relacion_Corona_Raiz'] == "1" ? "selected":""); ?>>Buena</option>
                    <option value="2" <?php echo ($Datos_Formato['Relacion_Corona_Raiz'] == "2" ? "selected":""); ?>>Regular</option>
                    <option value="3" <?php echo ($Datos_Formato['Relacion_Corona_Raiz'] == "3" ? "selected":""); ?>>Mala</option>
                  </select> 
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Soporte Óseo </strong></label> </div>
                <div class="span2"> 
                  <select style="width:135px" id="soporte_oseo" name="soporte_oseo">
                    <option value="1" <?php echo ($Datos_Formato['Soporte_Oseo'] == "1" ? "selected":""); ?>>Buena</option>
                    <option value="2" <?php echo ($Datos_Formato['Soporte_Oseo'] == "2" ? "selected":""); ?>>Regular</option>
                    <option value="3" <?php echo ($Datos_Formato['Soporte_Oseo'] == "3" ? "selected":""); ?>>Mala</option>
                  </select> 
                </div>
                <div class="span1.5"> <label><strong> Región Desdentada </strong></label> </div>
                <div class="span2"> <input type="text" style="width100%" placeholder="Región Desdentada" id="region_desdentada" name="region_desdentada" value="<?php echo $Datos_Formato['Region_Desdentada']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Observaciones </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Observaciones" id="observaciones_3" name="observaciones_3"><?php echo $Datos_Formato['Observaciones_3']; ?></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span5"> <label><strong> ¿Dolor en la Región de las Articulaciones Temporomandibulares? </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="pregunta_1" name="pregunta_1">
                    <option value="1" <?php echo ($Datos_Formato['Pregunta_1'] == "1" ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Pregunta_1'] == "2" ? "selected":""); ?>>No</option>
                  </select> 
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span5"> <label><strong> ¿Sensibilidad o Dolor en la Región de los Músculos de la Masticación? </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="pregunta_2" name="pregunta_2">
                    <option value="1" <?php echo ($Datos_Formato['Pregunta_2'] == "1" ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Pregunta_2'] == "2" ? "selected":""); ?>>No</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <label><strong> ¿Dolor en la Espalda o Cuello? </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="pregunta_3" name="pregunta_3">
                    <option value="1" <?php echo ($Datos_Formato['Pregunta_3'] == "1" ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Pregunta_3'] == "2" ? "selected":""); ?>>No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Hábitos Bucales </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Hábitos Bucales" id="habitos_bucales" name="habitos_bucales"><?php echo $Datos_Formato['Habitos_Bucales']; ?></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Plan de Tratamiento </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Plan de Tratamiento" id="plan_tratamiento" name="plan_tratamiento"><?php echo $Datos_Formato['Plan_Tratamiento']; ?></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Dientes Pilares </strong> </div>
                <div class="span5"> <input type="text" style="width:100%;" placeholder="Dientes Pilares" id="dientes_pilares" name="dientes_pilares" value="<?php echo $Datos_Formato['Dientes_Pilares']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Pónticos </strong> </div>
                <div class="span5"> <input type="text" style="width:100%;" placeholder="Pónticos" id="ponticos" name="ponticos" value="<?php echo $Datos_Formato['Ponticos']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Restauraciones Individuales </strong> </div>
                <div class="span5"> <input type="text" style="width:100%;" placeholder="Restauraciones Individuales" id="restauraciones_individuales" name="restauraciones_individuales" value="<?php echo $Datos_Formato['Restauraciones_Individuales']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Otros </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Otros" id="otros" name="otros"><?php echo $Datos_Formato['Otros']; ?></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Material a Utilizar </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Material a Utilizar" id="material_utilizar" name="material_utilizar"><?php echo $Datos_Formato['Material_Utilizar']; ?></textarea> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Modelos de Estudio </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="modelos_estudio" name="modelos_estudio">
                    <option value="1" <?php echo ($Datos_Formato['Modelos_Estudio'] == '1' ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Modelos_Estudio'] == '2' ? "selected":""); ?>>No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Preparaciones </strong> </div>
                <div class="span5"> <input type="text" style="width:100%;" placeholder="Preparaciones" id="preparaciones" name="preparaciones" value="<?php echo $Datos_Formato['Preparaciones']; ?>"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Impresiones </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="impresiones" name="impresiones">
                    <option value="1" <?php echo ($Datos_Formato['Impresiones'] == '1' ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Impresiones'] == '2' ? "selected":""); ?>>No</option>
                  </select> </div>
                <div class="span2"> <label><strong> Prótesis Provisionales </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="protesis_provicionales" name="protesis_provicionales">
                    <option value="1" <?php echo ($Datos_Formato['Protesis_Provicionales'] == '1' ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Protesis_Provicionales'] == '2' ? "selected":""); ?>>No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Prueba de Metal </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="prueba_metal" name="prueba_metal">
                    <option value="1" <?php echo ($Datos_Formato['Prueba_Metal'] == '1' ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Prueba_Metal'] == '2' ? "selected":""); ?>>No</option>
                  </select> 
                </div>
                <div class="span2"> <label><strong> Prueba de Prótesis </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="prueba_protesis" name="prueba_protesis">
                    <option value="1" <?php echo ($Datos_Formato['Prueba_Protesis'] == '1' ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Prueba_Protesis'] == '2' ? "selected":""); ?>>No</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <label><strong> Cemento </strong></label> </div>
                <div class="span2"> 
                  <select style="width:75px" id="cemento" name="cemento">
                    <option value="1" <?php echo ($Datos_Formato['Cemento'] == '1' ? "selected":""); ?>>Si</option>
                    <option value="2" <?php echo ($Datos_Formato['Cemento'] == '2' ? "selected":""); ?>>No</option>
                  </select> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2"> <strong> Otros Tratamientos </strong> </div>
                <div class="span7"> <textarea rows="3" col="2" style="width:100%" placeholder="Otros Tratamientos" id="otros_tratamientos" name="otros_tratamientos"><?php echo $Datos_Formato['Otros_Tratamientos']; ?></textarea> </div>
              </div>
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
          <a href="../clinica/formatohistoriaclinicaprotesisfija.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
        </div>
		<?php endif; ?>
            
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->
      <input type="hidden" id="ventana" value="formato-historia-clinica-protesis-fija">

<script type="text/javascript" src="../js/chrome.js"></script>  

<?php include("../footer2.php"); ?>