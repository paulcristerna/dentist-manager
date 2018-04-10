<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="formato-historia-general">
<script src="validacion_formatohistoriageneral.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Paciente.php"); ?>
        <?php include("../core-saec/Pareja_Clinica.php"); ?>

        <div class="span9">

        <h2>Formato de Historia General</h2>
			
		<div id="campo-error"></div>

        <div class="well" style="width:1150px;">
            
        <form method="post" action="validacion_formatohistoriageneral.php" onsubmit="return validacion()">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Padecimiento Actual y Antecedentes</a></li>
            <li><a href="#tab3">Aparatos</a> </li>
            <li><a href="#tab4">Sistemas</a> </li>
            <li><a href="#tab5">Órganos de los Sentidos</a> </li>
            <li><a href="#tab6">Exploración Física</a> </li>
            <li><a href="#tab7">Exploración de la Región Oral</a> </li>
            <li><a href="#tab8">Odontograma</a></li>
            <li><a href="#tab9">Exámenes Oclusal y Radiográfico</a></li>
            <li><a href="#tab10">Diagnóstico Bucal</a></li>
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
                    <select class="input-block-level2" id="sltpaciente-general" name="sltpaciente-general">
                    <option value="0">------</option> 
                    <?php
                        $Paciente->ListadoSelect();
                    ?>
                  </select> 
                </div>
		<div class="span1">
                    <label><strong>Sexo:</strong></label>
                    <?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Sexo']:""); ?>                    
                </div>
                <div class="span2">
                    <label><strong>Edad:</strong></label>
                    <?php echo (isset($Edad) ? $Edad:""); ?> Año(s)
                </div>
              </div>
              <br>
              <div class="row">                 
                <div class="span2">
                    <label><strong>Teléfono:</strong></label>
                    <input type="text" name="telefono" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Telefono']:""); ?>">
                </div>
	        <div class="span3">
                    <label><strong>E-mail:</strong></label>
                    <input type="text" name="email" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Email']:""); ?>">
                </div>
              </div>                
              <br>
              <div class="row"> 
                <div class="span4">
                    <label><strong>Calle: </strong></label>
                    <input type="text" name="calle" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Calle']:""); ?>">
                </div> 
	        <div class="span1">
                    <label><strong>Número: </strong></label>
                    <input type="text" name="numero" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Numero']:""); ?>">
                </div> 
              </div>
	      <br>
              <div class="row"> 
                <div class="span4">
                    <label><strong>Colonia: </strong></label>
                    <input type="text" name="colonia" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Colonia']:""); ?>">
                </div> 
	        <div class="span2">
                    <label><strong>Población: </strong></label>
                    <input type="text" name="poblacion" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Poblacion']:""); ?>">
                </div> 
              </div>
            </div><!-- fin tab1 -->
            <div class="tab-pane" id="tab2">
              <h2>Padecimiento Actual y Antecedentes</h2>
              <br>
              <div class="row">
                <div class="span2.5"> <label><strong> Padecimiento Actual: </strong></label> </div>
                <div class="span5"> <input type="text" style="width:100%;" placeholder="Padecimiento Actual" id="padecimiento_actual" name="padecimiento_actual"> </div>
              </div>
              <br>
              <label><h4>Antecedentes Heredofamiliares</h4></label>
              <label>Algún familiar (padre, madre, hermano, abuelos maternos, abuelos paternos, hijos) ha padecido alguna de las siguientes enfermedades:</label>
              <br>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedades</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Diabetes</td>
                    <td><input type="radio" value="1" id="diabetes" name="diabetes" checked></td>
                    <td><input type="radio" value="2" id="diabetes" name="diabetes"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_1" name="observaciones_1"></td>
                  </tr>
                  <tr>
                    <td>Cardiopatías</td>
                    <td><input type="radio" value="1" id="cardiopatias" name="cardiopatias" checked></td>
                    <td><input type="radio" value="2" id="cardiopatias" name="cardiopatias"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_2" name="observaciones_2"></td>
                  </tr>
                  <tr>
                    <td>Hipertensión</td>
                    <td><input type="radio" value="1" id="hipertension" name="hipertension" checked></td>
                    <td><input type="radio" id="hipertension" name="hipertension" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_3" name="observaciones_3"></td>
                  </tr>
                  <tr>
                    <td>Obesidad</td>
                    <td><input type="radio" value="1" id="obesidad" name="obesidad" checked></td>
                    <td><input type="radio" value="2" id="obesidad" name="obesidad"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_4" name="observaciones_4"></td>
                  </tr>
                  <tr>
                    <td>Cáncer</td>
                    <td><input type="radio" value="1" id="cancer" name="cancer" checked></td>
                    <td><input type="radio" value="2" id="cancer" name="cancer"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_5" name="observaciones_5"></td>
                  </tr>
                  <tr>
                    <td>Sífilis</td>
                    <td><input type="radio" value="1" id="sifilis" name="sifilis" checked></td>
                    <td><input type="radio" value="2" id="sifilis" name="sifilis"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_6" name="observaciones_6"></td>
                  </tr>
                  <tr>
                    <td>Anomalías Congénitas</td>
                    <td><input type="radio" value="1" id="anomalias_congenitas" name="anomalias_congenitas" checked></td>
                    <td><input type="radio" value="2" id="anomalias_congenitas" name="anomalias_congenitas"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_7" name="observaciones_7"></td>
                  </tr>
                  <tr>
                    <td>Trastornos Hemáticos</td>
                    <td><input type="radio" value="1" id="trastornos_hematicos" name="trastornos_hematicos" checked></td>
                    <td><input type="radio" value="2" id="trastornos_hematicos" name="trastornos_hematicos"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_8" name="observaciones_8"></td>
                  </tr>
                  <tr>
                    <td>Otros</td>
                    <td><input type="radio" value="1" id="otros" name="otros" checked></td>
                    <td><input type="radio" value="2" id="otros" name="otros"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_9" name="observaciones_9"></td>
                  </tr>
                </tbody>
              </table>
              <br>
              <label><h4>Antecedentes Personales No Patológicos</h4></label>
              <br>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;"></th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Habitación</td>
                    <td><input type="radio" value="1" id="habitacion" name="habitacion" checked></td>
                    <td><input type="radio" value="2" id="habitacion" name="habitacion"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_10" name="observaciones_10"></td>
                  </tr>
                  <tr>
                    <td>Alimentación</td>
                    <td><input type="radio" value="1" id="alimentacion" name="alimentacion" checked></td>
                    <td><input type="radio" value="1" id="alimentacion" name="alimentacion"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_11" name="observaciones_11"></td>
                  </tr>
                  <tr>
                    <td>Higiene</td>
                    <td><input type="radio" value="1" id="higiene" name="higiene" checked></td>
                    <td><input type="radio" value="2" id="higiene" name="higiene"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_12" name="observaciones_12"></td>
                  </tr>
                  <tr>
                    <td>Alcoholismo</td>
                    <td><input type="radio" value="1" id="alcoholismo" name="alcoholismo" checked></td>
                    <td><input type="radio" value="2" id="alcoholismo" name="alcoholismo"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_13" name="observaciones_13"></td>
                  </tr>
                  <tr>
                    <td>Tabaquismo</td>
                    <td><input type="radio" value="1" id="tabaquismo" name="tabaquismo" checked></td>
                    <td><input type="radio" value="2" id="tabaquismo" name="tabaquismo"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_14" name="observaciones_14"></td>
                  </tr>
                  <tr>
                    <td>Toxicomanía</td>
                    <td><input type="radio" value="1" id="toxicomania" name="toxicomania" checked></td>
                    <td><input type="radio" value="2" id="toxicomania" name="toxicomania"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_15" name="observaciones_15"></td>
                  </tr>
                </tbody>
              </table>
              <br>
              <label><h4>Antecedentes Personales Patológicos</h4></label>
              <label>Padece o ha padecido alguna de las siguientes enfermedades:</label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Diabetes</td>
                    <td><input type="radio" value="1" id="diabetes_2" name="diabetes_2" checked></td>
                    <td><input type="radio" value="2" id="diabetes_2" name="diabetes_2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_16" name="observaciones_16"></td>
                  </tr>
                  <tr>
                    <td>Hipertensión</td>
                    <td><input type="radio" value="1" id="hipertension_2" name="hipertension_2" checked></td>
                    <td><input type="radio" value="2" id="hipertension_2" name="hipertension_2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_17" name="observaciones_17"></td>
                  </tr>
                  <tr>
                    <td>Gastritis</td>
                    <td><input type="radio" value="1" id="gastritis" name="gastritis" checked></td>
                    <td><input type="radio" value="2" id="gastritis" name="gastritis"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_18" name="observaciones_18"></td>
                  </tr>
                  <tr>
                    <td>Hepatitis</td>
                    <td><input type="radio" value="1" id="hepatitis" name="hepatitis" checked></td>
                    <td><input type="radio" value="2" id="hepatitis" name="hepatitis"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_19" name="observaciones_19"></td>
                  </tr>
                  <tr>
                    <td>Hipertiroidismo</td>
                    <td><input type="radio" value="1" id="hipertiroidismo" name="hipertiroidismo" checked></td>
                    <td><input type="radio" value="2" id="hipertiroidismo" name="hipertiroidismo"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_20" name="observaciones_20"></td>
                  </tr>
                  <tr>
                    <td>Hemorragias</td>
                    <td><input type="radio" value="1" id="hemorragias" name="hemorragias" checked></td>
                    <td><input type="radio" value="2" id="hemorragias" name="hemorragias"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_21" name="observaciones_21"></td>
                  </tr>
                  <tr>
                    <td>Epilepsia</td>
                    <td><input type="radio" value="1" id="epilepsia" name="epilepsia" checked></td>
                    <td><input type="radio" value="2" id="epilepsia" name="epilepsia"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_22" name="observaciones_22"></td>
                  </tr>
                  <tr>
                    <td>Alergias</td>
                    <td><input type="radio" value="1" id="alergias" name="alergias" checked></td>
                    <td><input type="radio" value="2" id="alergias" name="alergias"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_23" name="observaciones_23"></td>
                  </tr>
                  <tr>
                    <td>Transfusiones</td>
                    <td><input type="radio" value="1" id="transfusiones" name="transfusiones" checked></td>
                    <td><input type="radio" value="2" id="transfusiones" name="transfusiones"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_24" name="observaciones_24"></td>
                  </tr>
                  <tr>
                    <td>Quirurgíco</td>
                    <td><input type="radio" value="1" id="quirurgico" name="quirurgico" checked></td>
                    <td><input type="radio" value="2" id="quirurgico" name="quirurgico"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_25" name="observaciones_25"></td>
                  </tr>
                  <tr>
                    <td>Otros</td>
                    <td><input type="radio" value="1" id="otros_2" name="otros_2" checked></td>
                    <td><input type="radio" value="2" id="otros_2" name="otros_2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_26" name="observaciones_26"></td>
                  </tr>
                </tbody>
              </table>
              <br>
              <label><h4>Antecedentes Gineco-Obstetricos</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;"></th>
                  <th>Si</th>
                  <th>No</th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                    <td>Menarca</td>
                    <td><input type="radio" value="1" id="menarca" name="menarca" checked></td>
                    <td><input type="radio" value="2" id="menarca" name="menarca"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_27" name="observaciones_27"></td>
                  </tr>
                  <tr>
                    <td>Ritmo</td>
                    <td><input type="radio" value="1" id="ritmo" name="ritmo" checked></td>
                    <td><input type="radio" value="2" id="ritmo" name="ritmo"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_28" name="observaciones_28"></td>
                  </tr>
                  <tr>
                    <td>Usa</td>
                    <td><input type="radio" value="1" id="usa" name="usa" checked></td>
                    <td><input type="radio" value="2" id="usa" name="usa"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_29" name="observaciones_29"></td>
                  </tr>
                  <tr>
                    <td>Gesta</td>
                    <td><input type="radio" value="1" id="gesta" name="gesta" checked></td>
                    <td><input type="radio" value="2" id="gesta" name="gesta"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_30" name="observaciones_30"></td>
                  </tr>
                  <tr>
                    <td>Para</td>
                    <td><input type="radio" value="1" id="para" name="para" checked></td>
                    <td><input type="radio" value="2" id="para" name="para"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_31" name="observaciones_31"></td>
                  </tr>
                  <tr>
                    <td>Aborto</td>
                    <td><input type="radio" value="1" id="aborto" name="aborto" checked></td>
                    <td><input type="radio" value="2" id="aborto" name="aborto"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_32" name="observaciones_32"></td>
                  </tr>
                  <tr>
                    <td>Cesárea</td>
                    <td><input type="radio" value="1" id="cesarea" name="cesarea" checked></td>
                    <td><input type="radio" value="2" id="cesarea" name="cesarea"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_33" name="observaciones_33"></td>
                  </tr>
                  <tr>
                    <td>Fur</td>
                    <td><input type="radio" value="1" id="fur" name="fur" checked></td>
                    <td><input type="radio" value="2" id="fur" name="fur"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_34" name="observaciones_34"></td>
                  </tr>
                  <tr>
                    <td>Menopausia</td>
                    <td><input type="radio" value="1" id="menopausia" name="menopausia" checked></td>
                    <td><input type="radio" value="2" id="menopausia" name="menopausia"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_35" name="observaciones_35"></td>
                  </tr>
                  <tr>
                    <td>Doc</td>
                    <td><input type="radio" value="1" id="doc" name="doc" checked></td>
                    <td><input type="radio" value="2" id="doc" name="doc"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_36" name="observaciones_36"></td>
                  </tr>
                  <tr>
                    <td>Método de Planificación Familiar</td>
                    <td><input type="radio" value="1" id="planificacion_familiar" name="planificacion_familiar" checked></td>
                    <td><input type="radio" value="2" id="planificacion_familiar" name="planificacion_familiar"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_37" name="observaciones_37"></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- fin tab2 -->
            <div class="tab-pane" id="tab3">
              <h2>Aparatos</h2>
              <br>
              <label><h4>Aparato Digestivo</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Anorexia</td>
                    <td><input type="radio" value="1" id="anorexia" name="anorexia" checked></td>
                    <td><input type="radio" value="2" id="anorexia" name="anorexia"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_38" name="observaciones_38"></td>
                  </tr>
                  <tr>
                    <td>Polifagia</td>
                    <td><input type="radio" value="1" id="polifagia" name="polifagia" checked></td>
                    <td><input type="radio" value="2" id="polifagia" name="polifagia"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_39" name="observaciones_39"></td>
                  </tr>
                  <tr>
                    <td>Polidipsia</td>
                    <td><input type="radio" value="1" id="polidipsia" name="polidipsia" checked></td>
                    <td><input type="radio" value="2" id="polidipsia" name="polidipsia"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_40" name="observaciones_40"></td>
                  </tr>
                  <tr>
                    <td>Halitosis</td>
                    <td><input type="radio" value="1" id="halitosis" name="halitosis" checked></td>
                    <td><input type="radio" value="2" id="halitosis" name="halitosis"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_41" name="observaciones_41"></td>
                  </tr>
                  <tr>
                    <td>Sialorrea</td>
                    <td><input type="radio" value="1" id="sialorrea" name="sialorrea" checked></td>
                    <td><input type="radio" value="2" id="sialorrea" name="sialorrea"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_42" name="observaciones_42"></td>
                  </tr>
                  <tr>
                    <td>Xerostomía</td>
                    <td><input type="radio" value="1" id="xerostomia" name="xerostomia" checked></td>
                    <td><input type="radio" value="2" id="xerostomia" name="xerostomia"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_43" name="observaciones_43"></td>
                  </tr>
                  <tr>
                    <td>Disfagia</td>
                    <td><input type="radio" value="1" id="disfagia" name="disfagia" checked></td>
                    <td><input type="radio" value="2" id="disfagia" name="disfagia"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_44" name="observaciones_44"></td>
                  </tr>
                  <tr>
                    <td>Odinofagia</td>
                    <td><input type="radio" value="1" id="odinofagia" name="odinofagia" checked></td>
                    <td><input type="radio" value="2" id="odinofagia" name="odinofagia"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_45" name="observaciones_45"></td>
                  </tr>
                  <tr>
                    <td>Dolor Abdominal</td>
                    <td><input type="radio" value="1" id="dolor_abdominal" name="dolor_abdominal" checked></td>
                    <td><input type="radio" value="2" id="dolor_abdominal" name="dolor_abdominal"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_46" name="observaciones_46"></td>
                  </tr>
                  <tr>
                    <td>Hematemesis</td>
                    <td><input type="radio" value="1" id="hematemesis" name="hematemesis" checked></td>
                    <td><input type="radio" value="2" id="hematemesis" name="hematemesis"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_47" name="observaciones_47"></td>
                  </tr>
                  <tr>
                    <td>Pirosis</td>
                    <td><input type="radio" value="1" id="pirosis" name="pirosis" checked></td>
                    <td><input type="radio" value="2" id="pirosis" name="pirosis"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_48" name="observaciones_48"></td>
                  </tr>
                  <tr>
                    <td>Vómito</td>
                    <td><input type="radio" value="1" id="vomito" name="vomito" checked></td>
                    <td><input type="radio" value="2" id="vomito" name="vomito"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_49" name="observaciones_49"></td>
                  </tr>
                  <tr>
                    <td>Flatulencia</td>
                    <td><input type="radio" value="1" id="flatulencia" name="flatulencia" checked></td>
                    <td><input type="radio" value="2" id="flatulencia" name="flatulencia"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_50" name="observaciones_50"></td>
                  </tr>
                  <tr>
                    <td>Ictericia</td>
                    <td><input type="radio" value="1" id="ictericia" name="ictericia" checked></td>
                    <td><input type="radio" value="2" id="ictericia" name="ictericia"></td>
                    <td><input type="text" id="observaciones_51" name="observaciones_51" placeholder="Observaciones" style="width:85%;"></td>
                  </tr>
                  <tr>
                    <td>Rectorragia</td>
                    <td><input type="radio" value="1" id="rectorragia" name="rectorragia" checked></td>
                    <td><input type="radio" value="2" id="rectorragia" name="rectorragia"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_52" name="observaciones_52"></td>
                  </tr>
                  <tr>
                    <td>Melena</td>
                    <td><input type="radio" value="1" id="melena" name="melena" checked></td>
                    <td><input type="radio" value="2" id="melena" name="melena"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_53" name="observaciones_53"></td>
                  </tr>
                  <tr>
                    <td>Prurito Anal</td>
                    <td><input type="radio" value="1" id="prurito_anal" name="prurito_anal" checked></td>
                    <td><input type="radio" value="2" id="prurito_anal" name="prurito_anal"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_54" name="observaciones_54"></td>
                  </tr>
                </tbody>
              </table>
              <label><h4>Aparato Cardiovascular</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Dolor Precordial</td>
                    <td><input type="radio" value="1" id="dolor_precordial" name="dolor_precordial" checked></td>
                    <td><input type="radio" value="2" id="dolor_precordial" name="dolor_precordial"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_55" name="observaciones_55"></td>
                  </tr>
                  <tr>
                    <td>Disnea</td>
                    <td><input type="radio" value="1" id="disnea" name="disnea" checked></td>
                    <td><input type="radio" value="2" id="disnea" name="disnea"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_56" name="observaciones_56"></td>
                  </tr>
                  <tr>
                    <td>Ortopnea</td>
                    <td><input type="radio" value="1" id="ortopnea" name="ortopnea" checked></td>
                    <td><input type="radio" value="2" id="ortopnea" name="ortopnea"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_57" name="observaciones_57"></td>
                  </tr>
                  <tr>
                    <td>Acufenos</td>
                    <td><input type="radio" value="1" id="acufenos" name="acufenos" checked></td>
                    <td><input type="radio" value="2" id="acufenos" name="acufenos"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_58" name="observaciones_58"></td>
                  </tr>
                  <tr>
                    <td>Forfenos</td>
                    <td><input type="radio" value="1" id="forfenos" name="forfenos" checked></td>
                    <td><input type="radio" value="2" id="forfenos" name="forfenos"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_59" name="observaciones_59"></td>
                  </tr>
                  <tr>
                    <td>Vértigos</td>
                    <td><input type="radio" value="1" id="vertigos" name="vertigos" checked></td>
                    <td><input type="radio" value="2" id="vertigos" name="vertigos"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_60" name="observaciones_60"></td>
                  </tr>
                  <tr>
                    <td>Cefalea</td>
                    <td><input type="radio" value="1" id="cefalea" name="cefalea" checked></td>
                    <td><input type="radio" value="2" id="cefalea" name="cefalea"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_61" name="observaciones_61"></td>
                  </tr>
                  <tr>
                    <td>Palpitaciones</td>
                    <td><input type="radio" value="1" id="palpitaciones" name="palpitaciones" checked></td>
                    <td><input type="radio" value="2" id="palpitaciones" name="palpitaciones"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_62" name="observaciones_62"></td>
                  </tr>
                  <tr>
                    <td>Parestesias</td>
                    <td><input type="radio" value="1" id="parestesias" name="parestesias" checked></td>
                    <td><input type="radio" value="2" id="parestesias" name="parestesias"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_63" name="observaciones_63"></td>
                  </tr>
                  <tr>
                    <td>Cianosis</td>
                    <td><input type="radio" value="1" id="cianosis" name="cianosis" checked></td>
                    <td><input type="radio" value="2" id="cianosis" name="cianosis"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_64" name="observaciones_64"></td>
                  </tr>
                  <tr>
                    <td>Edema</td>
                    <td><input type="radio" value="1" id="edema" name="edema" checked></td>
                    <td><input type="radio" value="2" id="edema" name="edema"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_65" name="observaciones_65"></td>
                  </tr>
                  <tr>
                    <td>Bochorno</td>
                    <td><input type="radio" value="1" id="bochorno" name="bochorno" checked></td>
                    <td><input type="radio" value="2" id="bochorno" name="bochorno"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_66" name="observaciones_66"></td>
                  </tr>
                  <tr>
                    <td>Lipotimias</td>
                    <td><input type="radio" value="1" id="lipotimias" name="lipotimias" checked></td>
                    <td><input type="radio" value="2" id="lipotimias" name="lipotimias"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_67" name="observaciones_67"></td>
                  </tr>
                  <tr>
                    <td>Cambios en la Piel</td>
                    <td><input type="radio" value="1" id="cambios_piel" name="cambios_piel" checked></td>
                    <td><input type="radio" value="2" id="cambios_piel" name="cambios_piel"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_68" name="observaciones_68"></td>
                  </tr>
                  <tr>
                    <td>Epistaxis</td>
                    <td><input type="radio" value="1" id="epistaxis" name="epistaxis" checked></td>
                    <td><input type="radio" value="2" id="epistaxis" name="epistaxis"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_69" name="observaciones_69"></td>
                  </tr>
                </tbody>
              </table>
              <label><h4>Aparato Respiratorio</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Disnea</td>
                    <td><input type="radio" value="1" id="disnea_2" name="disnea_2" checked></td>
                    <td><input type="radio" value="2" id="disnea_2" name="disnea_2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_70" name="observaciones_70"></td>
                  </tr>
                  <tr>
                    <td>Tos</td>
                    <td><input type="radio" value="1" id="tos" name="tos" checked></td>
                    <td><input type="radio" value="2" id="tos" name="tos"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_71" name="observaciones_71"></td>
                  </tr>
                  <tr>
                    <td>Hemoptisis</td>
                    <td><input type="radio" value="1" id="hemoptisis" name="hemoptisis" checked></td>
                    <td><input type="radio" value="2" id="hemoptisis" name="hemoptisis"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_72" name="observaciones_72"></td>
                  </tr>
                  <tr>
                    <td>Sibilancias</td>
                    <td><input type="radio" value="1" id="sibilancias" name="sibilancias" checked></td>
                    <td><input type="radio" value="2" id="sibilancias" name="sibilancias"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_73" name="observaciones_73"></td>
                  </tr>
                  <tr>
                    <td>Dolor</td>
                    <td><input type="radio" value="1" id="dolor" name="dolor" checked></td>
                    <td><input type="radio" value="2" id="dolor" name="dolor"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_74" name="observaciones_74"></td>
                  </tr>
                  <tr>
                    <td>Respiración Bucal o Nasal</td>
                    <td><input type="radio" value="1" id="respiracion_bucal_nasal" name="respiracion_bucal_nasal" checked></td>
                    <td><input type="radio" value="2" id="dolor" name="dolor"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_75" name="observaciones_75"></td>
                  </tr>
                </tbody>
              </table>
              <label><h4>Aparato Genitourinarios</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Nictamero</td>
                    <td><input type="radio" value="1" id="nictamero" name="nictamero" checked></td>
                    <td><input type="radio" value="2" id="nictamero" name="nictamero"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_76" name="observaciones_76"></td>
                  </tr>
                  <tr>
                    <td>Disuria</td>
                    <td><input type="radio" value="1" id="disuria" name="disuria" checked></td>
                    <td><input type="radio" value="2" id="disuria" name="disuria"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_77" name="observaciones_77"></td>
                  </tr>
                  <tr>
                    <td>Poliuria</td>
                    <td><input type="radio" value="1" id="poliuria" name="poliuria" checked></td>
                    <td><input type="radio" value="2" id="poliuria" name="poliuria"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_78" name="observaciones_78"></td>
                  </tr>
                  <tr>
                    <td>Poliarquiuria</td>
                    <td><input type="radio" id="poliarquiuria" name="poliarquiuria" value="1" checked></td>
                    <td><input type="radio" id="poliarquiuria" name="poliarquiuria" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_79" name="observaciones_79"></td>
                  </tr>
                  <tr>
                    <td>Hematuria</td>
                    <td><input type="radio" id="hematuria" name="hematuria" value="1" checked></td>
                    <td><input type="radio" id="hematuria" name="hematuria" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_80" name="observaciones_80"></td>
                  </tr>
                  <tr>
                    <td>Algiuria</td>
                    <td><input type="radio" id="algiuria" name="algiuria" value="1" checked></td>
                    <td><input type="radio" id="algiuria" name="algiuria" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_81" name="observaciones_81"></td>
                  </tr>
                  <tr>
                    <td>En caso de Sexo Femenino (Leucorrea, Prurito Vulvar, Dispareunia)</td>
                    <td><input type="radio" id="caso_femenino" name="caso_femenino" value="1" checked></td>
                    <td><input type="radio" id="caso_femenino" name="caso_femenino" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_82" name="observaciones_82"></td>
                  </tr>
                  <tr>
                    <td>En caso de Sexo Masculino (Secreciones)</td>
                    <td><input type="radio" id="caso_masculino" name="caso_masculino" value="1" checked></td>
                    <td><input type="radio" id="caso_masculino" name="caso_masculino" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_83" name="observaciones_83"></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- fin tab3 -->
            <div class="tab-pane" id="tab4">
              <h2>Sistemas</h2>
              <br>
              <label><h4>Sistema Hemático y Linfático</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Fiebre de Larga Duración sin Causa</td>
                    <td><input type="radio" id="fiebre_larga" name="fiebre_larga" value="1" checked></td>
                    <td><input type="radio" id="fiebre_larga" name="fiebre_larga" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_84" name="observaciones_84"></td>
                  </tr>
                  <tr>
                    <td>Palidez</td>
                    <td><input type="radio" id="palidez" name="palidez" value="1" checked></td>
                    <td><input type="radio" id="palidez" name="palidez" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_85" name="observaciones_85"></td>
                  </tr>
                  <tr>
                    <td>Edema</td>
                    <td><input type="radio" id="edema_2" name="edema_2" value="1" checked></td>
                    <td><input type="radio" id="edema_2" name="edema_2" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_86" name="observaciones_86"></td>
                  </tr>
                  <tr>
                    <td>Hemorragia</td>
                    <td><input type="radio" id="hemorragia" name="hemorragia" value="1" checked></td>
                    <td><input type="radio" id="hemorragia" name="hemorragia" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_87" name="observaciones_87"></td>
                  </tr>
                  <tr>
                    <td>Petequias</td>
                    <td><input type="radio" id="petequias" name="petequias" value="1" checked></td>
                    <td><input type="radio" id="petequias" name="petequias" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_88" name="observaciones_88"></td>
                  </tr>
                  <tr>
                    <td>Equimosis</td>
                    <td><input type="radio" id="equimosis" name="equimosis" value="1" checked></td>
                    <td><input type="radio" id="equimosis" name="equimosis" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_89" name="observaciones_89"></td>
                  </tr>
                  <tr>
                    <td>Hematomas</td>
                    <td><input type="radio" id="hematomas" name="hematomas" value="1" checked></td>
                    <td><input type="radio" id="hematomas" name="hematomas" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_90" name="observaciones_90"></td>
                  </tr>
                </tbody>
              </table>
              <label><h4>Sistema Endócrino</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Pérdida o Aumento de Peso</td>
                    <td><input type="radio" id="perdida_aumento_peso" name="perdida_aumento_peso" value="1" checked></td>
                    <td><input type="radio" id="perdida_aumento_peso" name="perdida_aumento_peso" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_91" name="observaciones_91"></td>
                  </tr>
                  <tr>
                    <td>Nerviosismo</td>
                    <td><input type="radio" id="nerviosismo" name="nerviosismo" value="1" checked></td>
                    <td><input type="radio" id="nerviosismo" name="nerviosismo" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_92" name="observaciones_92"></td>
                  </tr>
                  <tr>
                    <td>Alteraciones en la Menstruación</td>
                    <td><input type="radio" id="alteraciones_menstruacion" name="alteraciones_menstruacion" value="1" checked></td>
                    <td><input type="radio" id="alteraciones_menstruacion" name="alteraciones_menstruacion" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_93" name="observaciones_93"></td>
                  </tr>
                  <tr>
                    <td>Pilificación</td>
                    <td><input type="radio" id="pilificacion" name="pilificacion" value="1" checked></td>
                    <td><input type="radio" id="pilificacion" name="pilificacion" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_94" name="observaciones_94"></td>
                  </tr>
                </tbody>
              </table>
              <label><h4>Sistema Nervioso</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Convulsiones</td>
                    <td><input type="radio" id="convulsiones" name="convulsiones" value="1" checked></td>
                    <td><input type="radio" id="convulsiones" name="convulsiones" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_95" name="observaciones_95"></td>
                  </tr>
                  <tr>
                    <td>Cefaleas</td>
                    <td><input type="radio" id="cefaleas" name="cefaleas" value="1" checked></td>
                    <td><input type="radio" id="cefaleas" name="cefaleas" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_96" name="observaciones_96"></td>
                  </tr>
                  <tr>
                    <td>Parestesias</td>
                    <td><input type="radio" id="parestesias_2" name="parestesias_2" value="1" checked></td>
                    <td><input type="radio" id="parestesias_2" name="parestesias_2" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_97" name="observaciones_97"></td>
                  </tr>
                  <tr>
                    <td>Anestesias</td>
                    <td><input type="radio" id="anestesias" name="anestesias" value="1" checked></td>
                    <td><input type="radio" id="anestesias" name="anestesias" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_98" name="observaciones_98"></td>
                  </tr>
                  <tr>
                    <td>Paresias</td>
                    <td><input type="radio" id="paresias" name="paresias" value="1" checked></td>
                    <td><input type="radio" id="paresias" name="paresias" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_99" name="observaciones_99"></td>
                  </tr>
                  <tr>
                    <td>Parálisis</td>
                    <td><input type="radio" id="paralisis" name="paralisis" value="1" checked></td>
                    <td><input type="radio" id="paralisis" name="paralisis" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_100" name="observaciones_100"></td>
                  </tr>
                  <tr>
                    <td>Vértigos</td>
                    <td><input type="radio" id="vertigos_2" name="vertigos_2" value="1" checked></td>
                    <td><input type="radio" id="vertigos_2" name="vertigos_2" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_101" name="observaciones_101"></td>
                  </tr>
                  <tr>
                    <td>Hiperestesias</td>
                    <td><input type="radio" id="hiperestesias" name="hiperestesias" value="1" checked></td>
                    <td><input type="radio" id="hiperestesias" name="hiperestesias" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_102" name="observaciones_102"></td>
                  </tr>
                  <tr>
                    <td>Angustia</td>
                    <td><input type="radio" id="angustia" name="angustia" value="1" checked></td>
                    <td><input type="radio" id="angustia" name="angustia" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_103" name="observaciones_103"></td>
                  </tr>
                  <tr>
                    <td>Ansiedad</td>
                    <td><input type="radio" id="ansiedad" name="ansiedad" value="1" checked></td>
                    <td><input type="radio" id="ansiedad" name="ansiedad" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_104" name="observaciones_104"></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- fin tab4 -->
            <div class="tab-pane" id="tab5">
              <h2>Órganos de los Sentidos</h2>
              <br>
              <label><h4>Oídos</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Otalgias</td>
                    <td><input type="radio" id="otalgias" name="otalgias" value="1" checked></td>
                    <td><input type="radio" id="otalgias" name="otalgias" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_105" name="observaciones_105"></td>
                  </tr>
                  <tr>
                    <td>Otorrea</td>
                    <td><input type="radio" id="otorrea" name="otorrea" value="1" checked></td>
                    <td><input type="radio" id="otorrea" name="otorrea" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_106" name="observaciones_106"></td>
                  </tr>
                  <tr>
                    <td>Otorragia</td>
                    <td><input type="radio" id="otorragia" name="otorragia" value="1" checked></td>
                    <td><input type="radio" id="otorragia" name="otorragia" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_107" name="observaciones_107"></td>
                  </tr>
                  <tr>
                    <td>Acufenos</td>
                    <td><input type="radio" id="acufenos_2" name="acufenos_2" value="1" checked></td>
                    <td><input type="radio" id="acufenos_2" name="acufenos_2" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_108" name="observaciones_108"></td>
                  </tr>
                  <tr>
                    <td>Vértigos</td>
                    <td><input type="radio" id="vertigos_3" name="vertigos_3" value="1" checked></td>
                    <td><input type="radio" id="vertigos_3" name="vertigos_3" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_109" name="observaciones_109"></td>
                  </tr>
                </tbody>
              </table>
              <label><h4>Ojos</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Fosfenos</td>
                    <td><input type="radio" id="fosfenos" name="fosfenos" value="1" checked></td>
                    <td><input type="radio" id="fosfenos" name="fosfenos" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_110" name="observaciones_110"></td>
                  </tr>
                  <tr>
                    <td>Agudeza Visual</td>
                    <td><input type="radio" id="agudeza_visual" name="agudeza_visual" value="1" checked></td>
                    <td><input type="radio" id="agudeza_visual" name="agudeza_visual" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_111" name="observaciones_111"></td>
                  </tr>
                  <tr>
                    <td>Fotofobia</td>
                    <td><input type="radio" id="fotofobia" name="fotofobia" value="1" checked></td>
                    <td><input type="radio" id="fotofobia" name="fotofobia" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_112" name="observaciones_112"></td>
                  </tr>
                  <tr>
                    <td>Lagrimeo</td>
                    <td><input type="radio" id="lagrimeo" name="lagrimeo" value="1" checked></td>
                    <td><input type="radio" id="lagrimeo" name="lagrimeo" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_113" name="observaciones_113"></td>
                  </tr>
                  <tr>
                    <td>Secreciones</td>
                    <td><input type="radio" id="secreciones" name="secreciones" value="1" checked></td>
                    <td><input type="radio" id="secreciones" name="secreciones" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_114" name="observaciones_114"></td>
                  </tr>
                </tbody>
              </table>
              <label><h4>Nariz</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Parosmia</td>
                    <td><input type="radio" id="parosmia" name="parosmia" value="1" checked></td>
                    <td><input type="radio" id="parosmia" name="parosmia" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_115" name="observaciones_115"></td>
                  </tr>
                  <tr>
                    <td>Hiperosmia</td>
                    <td><input type="radio" id="hiperosmia" name="hiperosmia" value="1" checked></td>
                    <td><input type="radio" id="hiperosmia" name="hiperosmia" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_116" name="observaciones_116"></td>
                  </tr>
                  <tr>
                    <td>Secreciones</td>
                    <td><input type="radio" id="secreciones_2" name="secreciones_2" value="1" checked></td>
                    <td><input type="radio" id="secreciones_2" name="secreciones_2" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_117" name="observaciones_117"></td>
                  </tr>
                  <tr>
                    <td>Prurito</td>
                    <td><input type="radio" id="prurito" name="prurito" value="1" checked></td>
                    <td><input type="radio" id="prurito" name="prurito" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_118" name="observaciones_118"></td>
                  </tr>
                  <tr>
                    <td>Epistaxis</td>
                    <td><input type="radio" id="epistaxis_2" name="epistaxis_2" value="1" checked></td>
                    <td><input type="radio" id="epistaxis_2" name="epistaxis_2" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_119" name="observaciones_119"></td>
                  </tr>
                  <tr>
                    <td>Dolor Nasal</td>
                    <td><input type="radio" id="dolor_nasal" name="dolor_nasal" value="1" checked></td>
                    <td><input type="radio" id="dolor_nasal" name="dolor_nasal" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_120" name="observaciones_120"></td>
                  </tr>
                </tbody>
              </table>
              <label><h4>Gusto</h4></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Enfermedad</th>
                  <th>Si</th>
                  <th>No</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Hipergeusia</td>
                    <td><input type="radio" id="hipergeusia" name="hipergeusia" value="1" checked></td>
                    <td><input type="radio" id="hipergeusia" name="hipergeusia" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_121" name="observaciones_121"></td>
                  </tr>
                  <tr>
                    <td>Parageusia</td>
                    <td><input type="radio" id="parageusia" name="parageusia" value="1" checked></td>
                    <td><input type="radio" id="parageusia" name="parageusia" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_122" name="observaciones_122"></td>
                  </tr>
                  <tr>
                    <td>Ageusia</td>
                    <td><input type="radio" id="ageusia" name="ageusia" value="1" checked></td>
                    <td><input type="radio" id="ageusia" name="ageusia" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_123" name="observaciones_123"></td>
                  </tr>
                  <tr>
                    <td>Glosalgia</td>
                    <td><input type="radio" id="glosalgia" name="glosalgia" value="1" checked></td>
                    <td><input type="radio" id="glosalgia" name="glosalgia" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_124" name="observaciones_124"></td>
                  </tr>
                  <tr>
                    <td>Glosodinia</td>
                    <td><input type="radio" id="glosodinia" name="glosodinia" value="1" checked></td>
                    <td><input type="radio" id="glosodinia" name="glosodinia" value="2"></td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="observaciones_125" name="observaciones_125"></td>
                  </tr>
                </tbody>
              </table>
              <br>
              <div class="row"> 
                <div class="span2.5"> <label><strong> Exámenes de Laboratorio: </strong></label> </div>
                <div class="span5"> <input type="text" style="width:100%;" placeholder="Exámenes de Laboratorio" id="examen_laboratorio" name="examen_laboratorio"> </div>
              </div>
              <br>
              <div class="row"> 
                <div class="span2.5"> <label><strong> Terapéutica Empleada: </strong></label> </div>
                <div class="span5" style="padding-left:25px;"> <input type="text" style="width:100%;" placeholder="Terapéutica Empleada" id="terapeutica" name="terapeutica"> </div>
              </div>
            </div><!-- fin tab5 -->
            <div class="tab-pane" id="tab6">
              <label><h3>Exploración Física</h3></strong></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Signos Vitales</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Frecuencia Cardiaca</td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="frecuencia_cardiaca" name="frecuencia_cardiaca"></td>
                  </tr>
                  <tr>
                    <td>Temperatura</td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="temperatura" name="temperatura"></td>
                  </tr>
                  <tr>
                    <td>Pulso</td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="pulso" name="pulso"></td>
                  </tr>
                  <tr>
                    <td>Respiración</td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="respiracion" name="respiracion"></td>
                  </tr>
                  <tr>
                    <td>Tensión Arterial</td>
                    <td><input type="text" placeholder="Observaciones" style="width:85%;" id="tension_arterial" name="tension_arterial"></td>
                  </tr>
                </tbody>
              </table>
              <br>
              <div class="row"> 
                <div class="span1.5"> <label><strong> Somatometría: </strong></label> </div>
                <div class="span0.5"> <label><strong> Peso </strong></label> </div>
                <div class="span2"> <input type="text" style="width:100px;" placeholder="Peso" id="somatometria_peso" name="somatometria_peso"> Kg. </div>
                <div class="span0.5"> <label><strong> Estatura </strong></label> </div>
                <div class="span1"> <input type="text" style="width:100%;" placeholder="Estatura" id="somatometria_estatura" name="somatometria_estatura"> </div>
              </div>
              <br><br>
              <label><strong>Cabeza</strong></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Cráneo</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Tamaño</td>
                    <td><input type="text" style="width:85%;" placeholder="Tamaño" id="craneo_tamano" name="craneo_tamano"></td>
                  </tr>
                  <tr>
                    <td>Contorno</td>
                    <td><input type="text" style="width:85%;" placeholder="Contorno" id="craneo_contorno" name="craneo_contorno"></td>
                  </tr>
                  <tr>
                    <td>Implantación de Cabello</td>
                    <td><input type="text" style="width:85%;" placeholder="Implantación de Cabello" id="craneo_implantacion_cabello" name="craneo_implantacion_cabello"></td>
                  </tr>
                  <tr>
                    <td>Deformidades</td>
                    <td><input type="text" style="width:85%;" placeholder="Deformidades" id="craneo_deformidades" name="craneo_deformidades"></td>
                  </tr>
                  <tr>
                    <td>Exóstosis</td>
                    <td><input type="text" style="width:85%;" placeholder="Exóstosis" id="craneo_exostosis" name="craneo_exostosis"></td>
                  </tr>
                  <tr>
                    <td>Endóstosis</td>
                    <td><input type="text" style="width:85%;" placeholder="Endóstosis" id="craneo_endostosis" name="craneo_endostosis"></td>
                  </tr>
                </tbody>
              </table>
              <br>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Cara</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Expresión Facial</td>
                    <td><input type="text" style="width:85%;" placeholder="Expresión Facial" id="cara_expresion_facial" name="cara_expresion_facial"></td>
                  </tr>
                  <tr>
                    <td>Simetría</td>
                    <td><input type="text" style="width:85%;" placeholder="Simetría" id="cara_simetria" name="cara_simetria"></td>
                  </tr>
                  <tr>
                    <td>Movimientos Involuntarios</td>
                    <td><input type="text" style="width:85%;" placeholder="Movimientos Involuntarios" id="cara_movimientos_involuntarios" name="cara_movimientos_involuntarios"></td>
                  </tr>
                  <tr>
                    <td>Edemas</td>
                    <td><input type="text" style="width:85%;" placeholder="Edemas" id="cara_edemas" name="cara_edemas"></td>
                  </tr>
                  <tr>
                    <td>Masas</td>
                    <td><input type="text" style="width:85%;" placeholder="Masas" id="cara_masas" name="cara_masas"></td>
                  </tr>
                </tbody>
              </table>
              <br>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;"></th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Oídos</td>    
                    <td><input type="text" style="width:85%;" placeholder="Oídos" id="oidos" name="oidos"></td>
                  </tr>
                  <tr>
                    <td>Ojos</td>
                    <td><input type="text" style="width:85%;" placeholder="Ojos" id="ojos" name="ojos"></td>
                  </tr>
                  <tr>
                    <td>Nariz</td>
                    <td><input type="text" style="width:85%;" placeholder="Nariz" id="nariz" name="nariz"></td>
                  </tr>
                </tbody>
              </table>
              <br>
              <table class="table table-striped">
                <thead>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                    <td rowspan="3" style="width:225px; text-align:center; padding-top:15px;">¿Ha tenido experiencia con Anestésicos Bucales?</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Sí</td>
                    <td>No</td>
                    <td>¿Cuál?</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><input type="radio" id="anestesicos_bucales" name="anestesicos_bucales" value="1" checked></td>
                    <td><input type="radio" id="anestesicos_bucales" name="anestesicos_bucales" value="2"></td>
                    <td><textarea rows="2" col="4" style="width:85%;" placeholder="¿Cuál?" id="pregunta_1" name="pregunta_1"></textarea></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- fin tab6 -->
            <div class="tab-pane" id="tab7">
              <label><h3>Exploración de la Región Oral</h3></strong></label>
              <label><strong>Cavidad Oral</strong></label>
              <label>(Forma, Tamaño, Consistencia,Hidratación, Coloración, Sensibilidad, Movilidad, Simetría y Patologías).</label>
              <label>NOTA: debe de ser explorado en cada una de las siguientes estructuras, además de lo que se indica individualmente.</label>
              <br><br>
              <label><strong> Región Anterior: Labios (Frenillos) </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Región Anterior: Labios (Frenillos)" id="region_anterior" name="region_anterior"></textarea>
              <br><br>
              <label><strong> Región Lateral: Mejillas o Carrillos (Músculos Masticadores) </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Región Lateral: Mejillas o Carrillos (Músculos Masticadores)" id="region_lateral" name="region_lateral"></textarea>
              <br><br>
              <label><strong> Carrillos o Mejillas (Conducto de Stenon) </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Carrillos o Mejillas (Conducto de Stenon)" id="region_mejillas" name="region_mejillas"></textarea>
              <br><br>
              <label><strong> Región Superior: Paladar Duro </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Región Superior: Paladar Duro" id="paladar_duro" name="paladar_duro"></textarea>
              <br><br>
              <label><strong> Paladar Blando </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Paladar Blando" id="paladar_blando" name="paladar_blando"></textarea>
              <br><br>
              <label><strong> Región Inferior: Lengua (Papilas, Fisuras) </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Región Inferior: Lengua (Papilas, Fisuras)" id="region_inferior" name="region_inferior"></textarea>
              <br><br>
              <label><strong> Piso de Boca: (Conductos de Wharton, Batholin, Frenillo) </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Piso de Boca: (Conductos de Wharton, Batholin, Frenillo)" id="piso_boca" name="piso_boca"></textarea>
              <br><br>
              <label><strong> Región Anterior Faríngea: Pilar Anterior </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Región Anterior Faríngea: Pilar Anterior" id="pilar_anterior" name="pilar_anterior"></textarea>
              <br><br>
              <label><strong> Pilar Posterior </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Pilar Posterior" id="pilar_posterior" name="pilar_posterior"></textarea>
              <br><br>
              <label><strong> Amígdalas </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Amígdalas" id="amigdalas" name="amigdalas"></textarea>
              <br><br>
              <label><strong> Farínge </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Farínge" id="faringe" name="faringe"></textarea>
              <br><br>
              <label><strong> Región Gingival: Encía Libre o Marginal (Abscesos Gingivales, Gingivorragias) </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Región Gingival: Encía Libre o Marginal (Abscesos Gingivales, Gingivorragias)" id="region_gingival" name="region_gingival"></textarea>
              <br><br>
              <label><strong> Encía Insertada o Adherida (Abscesos Periodontales, Bolsas Periodontales) </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Encía Insertada o Adherida (Abscesos Periodontales, Bolsas Periodontales)" id="encia_insertada_adherida" name="encia_insertada_adherida"></textarea>
              <br><br>
              <label><strong> Mucosa o Encía Alveolar </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Mucosa o Encía Alveolar" id="mucosa" name="mucosa"></textarea>
              <br><br>
              <label><strong> Proceso Alveolar </strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Proceso Alveolar" id="proceso_alveolar" name="proceso_alveolar"></textarea>
              <br><br>
              <label><strong> Glándulas Salivales </strong></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;">Dolor</th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Aumento de Volumen</td>
                    <td><input type="text" style="width:85%;" placeholder="Aumento de Volumen" id="aumento_volumen" name="aumento_volumen"></td>
                  </tr>
                  <tr>
                    <td>Masas</td>
                    <td><input type="text" style="width:85%;" placeholder="Masas" id="masas" name="masas"></td>
                  </tr>
                  <tr>
                    <td>Cantidad de Saliva</td>
                    <td><input type="text" style="width:85%;" placeholder="Cantidad de Saliva" id="cantidad_saliva" name="cantidad_saliva"></td>
                  </tr>
                  <tr>
                    <td>Calidad de Saliva</td>
                    <td><input type="text" style="width:85%;" placeholder="Calidad de Saliva" id="calidad_saliva" name="calidad_saliva"></td>
                  </tr>
                </tbody>
              </table>
              <br><br>
              <label><strong> Articulación Temporomandibular </strong></label>
              <table class="table table-striped">
                <thead>
                  <th>Auscultación de la ATM</th>
                  <th><center> ATM Derecha </center></th>
                  <th><center> ATM Izquierda </center></th>
                </thead>
                <tbody>
                  <tr>
                    <td>Palpación ATM</td>
                    <td><input type="text" style="width:85%;" placeholder="Palpación ATM" id="palpitacion_atm_i" name="palpitacion_atm_i"></td>
                    <td><input type="text" style="width:85%;" placeholder="Palpación ATM" id="palpitacion_atm_d" name="palpitacion_atm_d"></td>
                  </tr>
                  <tr>
                    <td>Apertura y Cierre</td>
                    <td><input type="text" style="width:85%;" placeholder="Apertura y Cierre" id="apertura_cierre_i" name="apertura_cierre_i"></td>
                    <td><input type="text" style="width:85%;" placeholder="Apertura y Cierre" id="apertura_cierre_d" name="apertura_cierre_d"></td>
                  </tr>
                  <tr>
                    <td>Protrusiva</td>
                    <td><input type="text" style="width:85%;" placeholder="Protrusiva" id="protrusiva_i" name="protrusiva_i"></td>
                    <td><input type="text" style="width:85%;" placeholder="Protrusiva" id="protrusiva_d" name="protrusiva_d"></td>
                  </tr>
                  <tr>
                    <td>Retrusiva</td>
                    <td><input type="text" style="width:85%;" placeholder="Retrusiva" id="retrusiva_i" name="retrusiva_i"></td>
                    <td><input type="text" style="width:85%;" placeholder="Retrusiva" id="retrusiva_d" name="retrusiva_d"></td>
                  </tr>
                  <tr>
                    <td>Lateralidades</td>
                    <td><input type="text" style="width:85%;" placeholder="Lateralidades" id="lateralidades_i" name="lateralidades_i"></td>
                    <td><input type="text" style="width:85%;" placeholder="Lateralidades" id="lateralidades_d" name="lateralidades_d"></td>
                  </tr>
                  <tr>
                    <td>Lado de Trabajo</td>
                    <td><input type="text" style="width:85%;" placeholder="Lado de Trabajo" id="lado_trabajo_i" name="lado_trabajo_i"></td>
                    <td><input type="text" style="width:85%;" placeholder="Lado de Trabajo" id="lado_trabajo_d" name="lado_trabajo_d"></td>
                  </tr>
                  <tr>
                    <td>Lado de Balance</td>
                    <td><input type="text" style="width:85%;" placeholder="Lado de Balance" id="lado_balance_i" name="lado_balance_i"></td>
                    <td><input type="text" style="width:85%;" placeholder="Lado de Balance" id="lado_balance_d" name="lado_balance_d"></td>
                  </tr>
                  <tr>
                    <td rowspan="4" style="padding-top:75px;"><strong>Exploración de Músculo de Masticación:</strong></td>
                    <td>Temporal</td>
                    <td><input type="text" style="width:85%;" placeholder="Temporal" id="temporal" name="temporal"></td>
                  </tr>
                  <tr>
                    <td>Masetero</td>
                    <td><input type="text" style="width:85%;" placeholder="Masetero" id="masetero" name="masetero"></td>
                  </tr>
                  <tr>
                    <td>Pterigoideo Externo</td>
                    <td><input type="text" style="width:85%;" placeholder="Pterigoideo Externo" id="pterigoideo_externo" name="pterigoideo_externo"></td>
                  </tr>
                  <tr>
                    <td>Pterigoideo Interno</td>
                    <td><input type="text" style="width:85%;" placeholder="Pterigoideo Interno" id="pterigoideo_interno" name="pterigoideo_interno"></td>
                  </tr>
                </tbody>
              </table>
              <label><strong>Observaciones</strong></label>
              <textarea rows="3" col="10" style="width:90%;" placeholder="Observaciones" id="observaciones_126" name="observaciones_126"></textarea>
            </div><!-- fin tab7 -->
            <div class="tab-pane" id="tab8">
              <h2>Odontograma</h2>
              <br>
              
              <input type="hidden" id="tipo-odontograma" value="normal">
              
              <p>
                <a class="btn btn-institucional boton" id="diente-ausente">Diente Ausente (A)</a>
                  <a class="btn btn-institucional boton" id="extraccion">Extracción (X)</a>
                  <a class="btn btn-institucional boton" id="caries">Caries (C)</a>
                  <a class="btn btn-institucional boton" id="dolor">Dolor (D)</a>
                  <a class="btn btn-institucional boton" id="restauracion">Restauración (R)</a>
                  <a class="btn btn-institucional boton" id="protesis">Prótesis (PR)</a>
                  <a class="btn btn-institucional boton" id="maloclusion">Maloclusión (#)</a>
                  <a class="btn btn-institucional boton" id="movilidad">Movilidad (M)</a>
              </p>

              <br />

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
                            <input type="hidden" value="0" name="campo-seleccionado-centro-14" id="campo--centro-14">
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
              
            </div><!-- fin tab8 -->
            <div class="tab-pane" id="tab9">
              <h2>Exámenes Oclusal y Radiográfico</h2>
              <br>
              <h4>Examen Oclusal</h4>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;"></th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="2"><center><input type="radio" id="examen_oclusal" name="examen_oclusal" value="1" checked> Oclusión Normal  
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="examen_oclusal" name="examen_oclusal" value="2"> Maloclusión </center></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><strong><center>Observaciones</center></strong></td>
                  </tr>
                  <tr>
                    <td>Abrasiones</td>
                    <td><input type="text" style="width:90%;" placeholder="Abrasiones"id="abrasiones" name="abrasiones"></td>
                  </tr>
                  <tr>
                    <td>Atriciones</td>
                    <td><input type="text" style="width:90%;" placeholder="Atriciones" id="atriciones" name="atriciones"></td>
                  </tr>
                  <tr>
                    <td>Apiñamiento</td>
                    <td><input type="text" style="width:90%;" placeholder="Apiñamiento" id="apinamiento" name="apinamiento"></td>
                  </tr>
                  <tr>
                    <td>Mordida Cruzada</td>
                    <td><input type="text" style="width:90%;" placeholder="Mordida Cruzada" id="mordida_cruzada" name="mordida_cruzada"></td>
                  </tr>
                  <tr>
                    <td>Malposiciones Individuales</td>
                    <td><input type="text" style="width:90%;" placeholder="Malposiciones Individuales" id="malposiciones_individuales" name="malposiciones_individuales"></td>
                  </tr>
                  <tr>
                    <td>Diastemas</td>
                    <td><input type="text" style="width:90%;" placeholder="Diastemas" id="diastemas" name="diastemas"></td>
                  </tr>
                  <tr>
                    <td>Línea Media</td>
                    <td><input type="text" style="width:90%;" placeholder="Línea Media" id="linea_media" name="linea_media"></td>
                  </tr>
                </tbody>
              </table>
              <label><strong>Examen Radiográfico (Tipo de Radiografía, Zona, Fecha, Interpretación)</strong></label>
              <textarea rows="3" col="10" style="width:92%;" placeholder="Examen Radiográfico" id="examen_radiografico" name="examen_radiografico"></textarea>
              <br><br>
              <label><strong>Cuello</strong></label>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;"></th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Forma</td>
                    <td><input type="text" style="width:90%;" placeholder="Forma" id="cuello_forma" name="cuello_forma"></td>
                  </tr>
                  <tr>
                    <td>Volumen</td>
                    <td><input type="text" style="width:90%;" placeholder="Volumen" id="cuello_volumen" name="cuello_volumen"></td>
                  </tr>
                  <tr>
                    <td>Movimientos</td>
                    <td><input type="text" style="width:90%;" placeholder="Movimientos" id="cuello_movimientos" name="cuello_movimientos"></td>
                  </tr>
                  <tr>
                    <td>Ganglios</td>
                    <td><input type="text" style="width:90%;" placeholder="Ganglios" id="cuello_ganglios" name="cuello_ganglios"></td>
                  </tr>
                  <tr>
                    <td>Tráquea</td>
                    <td><input type="text" style="width:90%;" placeholder="Tráquea" id="cuello_traquea" name="cuello_traquea"></td>
                  </tr>
                  <tr>
                    <td>Tiroides</td>
                    <td><input type="text" style="width:90%;" placeholder="Tiroides" id="cuello_tiroides" name="cuello_tiroides"></td>
                  </tr>
                  <tr>
                    <td>Masas</td>
                    <td><input type="text" style="width:90%;" placeholder="Masas" id="cuello_masas" name="cuello_masas"></td>
                  </tr>
                  <tr>
                    <td>Pulsos</td>
                    <td><input type="text" style="width:90%;" placeholder="Pulsos" id="cuello_pulsos" name="cuello_pulsos"></td>
                  </tr>
                  <tr>
                    <td>Carotideos</td>
                    <td><input type="text" style="width:90%;" placeholder="Carotideos" id="cuello_carotideos" name="cuello_carotideos"></td>
                  </tr>
                  <tr>
                    <td>Ingurgitación Yugular</td>
                    <td><input type="text" style="width:90%;" placeholder="Ingurgitación Yugular" id="cuello_ingurgitacion_yugular" name="cuello_ingurgitacion_yugular"></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-striped">
                <thead>
                  <th style="width:225px;"></th>
                  <th>Observaciones</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Tórax</td>
                    <td><input type="text" style="width:90%;" placeholder="Tórax" id="torax" name="torax"></td>
                  </tr>
                  <tr>
                    <td>Abdomen</td>
                    <td><input type="text" style="width:90%;" placeholder="Abdomen" id="abdomen" name="abdomen"></td>
                  </tr>
                  <tr>
                    <td>Miembro Superior e Inferior</td>
                    <td><input type="text" style="width:90%;" placeholder="Miembro Superior e Inferior" id="miembro_superior_inferior" name="miembro_superior_inferior"></td>
                  </tr>
                </tbody>
              </table>
              <label><strong>Observaciones Médicas</strong></label>
              <textarea rows="3" col="10" style="width:92%;" placeholder="Observaciones Médicas" id="observaciones_medicas" name="observaciones_medicas"></textarea>
            </div><!-- fin tab9 -->
            <div class="tab-pane" id="tab10">
              <h2>Diagnóstico Bucal</h2>
              <br><br>
              <label><strong>Diagnóstico Bucal</strong></label>
              <input type="text" style="width:75%;" placeholder="Diagnóstico Bucal" id="diagnostico_bucal" name="diagnostico_bucal">
              <br><br>
              <label><strong>Pronóstico:</strong></label>
              <label>Favorable:</label>
              <input type="text" style="width:75%;" placeholder="Favorable" id="pronostico_favorable" name="pronostico_favorable">
              <label>Desfavorable:</label>
              <input type="text" style="width:75%;" placeholder="Desfavorable" id="pronostico_desfavorable" name="pronostico_desfavorable">
              <label>Reservado:</label>
              <input type="text" style="width:75%;" placeholder="Reservado" id="pronostico_reservado" name="pronostico_reservado">
              <label>Porque:</label>
              <input type="text" style="width:75%;" placeholder="Porque" id="pronostico_porque" name="pronostico_porque">
              <label>Para Quien:</label>
              <input type="text" style="width:75%;" placeholder="Para Quien" id="pronostico_para_quien" name="pronostico_para_quien">
              <label>Plan de Tratamiento</label>
              <textarea rows="3" col="10" placeholder="Plan de Tratamiento" style="width:75%;" id="pronostico_plan_tratamiento" name="pronostico_plan_tratamiento"></textarea>
              <br><br>
              <!--<div class="row">
                <div class="span2.5"> <label><strong> Autorización del Profesor: </strong></label> </div>
                <div class="span2"> <input type="checkbox"> </div>
                <div class="span2.5"> <label><strong> Autorización del Alumno: </strong></label> </div>
                <div class="span1"> <input type="checkbox"> </div>
              </div>-->
            </div><!-- fin tab10 -->
        </div><!-- fin tabcontent -->

        </div><!-- well -->

        <div align="row">
          <input type="submit" name="guardar" class="btn btn-institucional guardar" value="Guardar">
          <a href="../clinica/formatohistoriageneral.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
        </div>
        
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->

<?php include("../footer2.php"); ?>