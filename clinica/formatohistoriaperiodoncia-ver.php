<?php include("../header2.php"); ?>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Paciente.php"); ?>
        <?php include("../core-saec/Formato_Historia_Clinica_Periodoncia.php"); ?>

        <div class="span9">

        <h2>Formato de Historia de Periodoncia</h2>

        <div class="well" style="width:970px;">
            
        <form method="post" action="validacion_formatohistoriaclinicaperiodoncia.php">
            
        <input type="hidden" id="historia_clinica" name="historia_clinica" value="<?php echo $_GET['formato']; ?>">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Periodontograma</a></li>
            <li><a href="#tab3">Curso de la Enfermedad</a></li>
            <li><a href="#tab4">Cuantificación de Placa</a></li>
            <li><a href="#tab5">Diagnóstico Individual</a></li>
            <li><a href="#tab6">Cuantificación de Placa Post-Tratamiento</a></li>
            <li><a href="#tab7">Valoración Bolsa Post-Tratamiento</a></li>
            <li><a href="#tab8">Planificación del Tratamiento</a></li>
          </ul>
            
           <?php 
            $Formato_Historia_Clinica_Periodoncia = new Formato_Historia_Clinica_Periodoncia();

            $Formato_Historia_Clinica_Periodoncia->IdHistoriaClinicaPeriodoncia = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Periodoncia->Obtener_Formato();

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

              <div class="row"> 
                <div class="span4">
                  <h3>Datos del Paciente.</h3>
                </div>
              </div>
              <div class="row"> 
                <div class="span8">
                    <label><strong>Paciente:</strong>
                    <?php echo $Datos_Formato['NombrePaciente']. ' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></label>
                </div>
              </div>

              <br />
              
              <div class="row"> 
                <div class="span2"> 
                  <label><strong>Fecha: </strong>
			  <?php echo $fecha_registro; ?>
                  </label>
                </div>
                <div class="span2"> 
                  <label><strong>Sexo: </strong>
                      <?php echo $Datos_Formato['SexoPaciente']; ?>
                  </label>
                </div>
                <div class="span2"> 
                  <label><strong>Edad: </strong>
                  <?php echo $Edad; ?> Año(s)
                  </label>
                </div>                
              </div>

              <br />

              <div class="row">
                <div class="span3">
                  <label><strong>Ocupación: </strong>
                  <?php echo $Datos_Formato['OcupacionPaciente']; ?>
                  </label>
                </div>
                <div class="span5"> 
                  <label><strong>Dirección: </strong>
                  <?php echo $Datos_Formato['CallePaciente'].' '.$Datos_Formato['NumeroPaciente'].' '.$Datos_Formato['ColoniaPaciente'].' '.$Datos_Formato['PoblacionPaciente']; ?>.</label>
                </div> 
              </div>

              <br />

              <div class="row">
                <div class="span3"> 
                  <label><strong>Teléfono: </strong>
                    <?php echo $Datos_Formato['TelefonoPaciente']; ?>                
				  </label>
                </div> 
              </div>

            </div><!-- fin tab1 -->
  
            <div class="tab-pane" id="tab2" style="height:710px;overflow:hidden">

               <div class="row"> 
                <div class="span6">
                  <h3>Periodontograma</h3>
                </div>
              </div>

              <table>
	       <tr>
                <td style="padding:10px;">Margen Gingival <img src="../img/margen-gingival-icono.png"></td>
                <td style="padding:10px;">Ausencia <img src="../img/ausente-icono.png"></td>
                <td style="padding:10px;">Abceso <img src="../img/abceso-icono.png"></td>
                <td style="padding:10px;">Contacto Abierto <img src="../img/contacto-abierto-icono.png"></td>
                <td style="padding:10px;">Frenillo Alto <img src="../img/frenillo-alto-icono.png"></td>                
                <td style="padding:10px;">Reconstrucción <img src="../img/reconstruccion-icono.png"></td>
               </tr>
	       <tr>
                <td style="padding:10px;">Prótesis Fija <img src="../img/protesis-fija-icono.png"></td>	       
                <td style="padding:10px;">Prótesis Removible <img src="../img/protesis-removible-icono.png"></td>
                <td style="padding:10px;">Obt. Mal Ajustada <img src="../img/obt-mal-ajustada-icono.png"></td>
                <td style="padding:10px;">Faceta de Desgaste <img src="../img/faceta-desgaste-icono.png"></td>
                <td style="padding:10px;">Bolsa Parodontales <img src="../img/bolsas-parodontales-icono.png"></td>
              </tr>
	     </table>

              <input type="hidden" id="tipo" value="periodontograma">

			  <div id="periodontograma">

                <div id="dientes-superiores-arriba">
                    <?php   $Datos_Diente = explode('|',$Datos_Formato['Diente1']); 
                            $Arriba = null;
                    
                            switch($Datos_Diente[0])
                            {
                                case 'abceso':
                                    $Arriba = "abceso-1";
                                break;

                                case 'bolsa-parodontal':
                                    $Arriba = "bolsa-parodontal-1";
                                break;                        
                            } 
                    ?>                    
                  <div class="diente diente-1 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-1":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-1 <?php echo $Arriba; ?>">
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-1-01"></div>
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-1-02"></div>
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-1-03"></div>
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-1-04"></div>
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-1-05"></div>
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-1-06"></div>
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-1-07"></div>
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-1-08"></div>
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-1-09"></div>
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-1-10"></div>
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-1-11"></div>
                      <div class="linea linea-1 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-1-12"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-1";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-1";
                            break;
			    
			    case 'protesis-fija':
                                $Abajo = "protesis-fija-1";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-1";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-1";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-1 <?php echo $Abajo;?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-1"></div>
                      <div class="corona corona-der corona-der-1"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-1" id="arriba-padecimiento-1">
                    <input type="hidden" value="0" name="abajo-padecimiento-1" id="abajo-padecimiento-1">
                    <input type="hidden" value="0" name="izq-padecimiento-1" id="izq-padecimiento-1">
                    <input type="hidden" value="0" name="der-padecimiento-1" id="der-padecimiento-1">
                    <input type="hidden" value="12" name="margen-1" id="margen-1">
                  </div><!-- fin diente-1 -->
                    
                    <?php   
                        $Datos_Diente = explode('|',$Datos_Formato['Diente2']);                    
                        $Arriba = null;

                        switch($Datos_Diente[0])
                        {
                            case 'abceso':
                                $Arriba = "abceso-2";
                            break;

                            case 'bolsa-parodontal':
                                $Arriba = "bolsa-parodontal-2";
                            break;                        
                        } 
                    ?>
                    <div class="diente diente-2 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-2":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-2 <?php echo $Arriba; ?>">
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-2-01"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-2-02"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-2-03"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-2-04"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-2-05"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-2-06"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-2-07"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-2-08"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-2-09"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-2-10"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-2-11"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-2-12"></div>
                      <div class="linea linea-2 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-2-13"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-2";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-2";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-2";
                            break;
			    
                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-2";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-2";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-2 <?php echo $Abajo;?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-2"></div>
                      <div class="corona corona-der corona-der-2"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-2" id="arriba-padecimiento-2">
                    <input type="hidden" value="0" name="abajo-padecimiento-2" id="abajo-padecimiento-2">
                    <input type="hidden" value="0" name="izq-padecimiento-2" id="izq-padecimiento-2">
                    <input type="hidden" value="0" name="der-padecimiento-2" id="der-padecimiento-2">
                    <input type="hidden" value="13" name="margen-2" id="margen-2">
                  </div><!-- fin diente-2 -->
                    
                 <?php  
                    $Datos_Diente = explode('|',$Datos_Formato['Diente3']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-3";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-3";
                        break;                        
                    } 
                  ?>  
                  <div class="diente diente-3 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-3":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-3 <?php echo $Arriba; ?>">
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-3-01"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-3-02"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-3-03"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-3-04"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-3-05"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-3-06"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-3-07"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-3-08"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-3-09"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-3-10"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-3-11"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-3-12"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-3-13"></div>
                      <div class="linea linea-3 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-3-14"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-3";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-3";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-3";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-3";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-3";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-3 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-3"></div>
                      <div class="corona corona-der corona-der-3"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-3" id="arriba-padecimiento-3">
                    <input type="hidden" value="0" name="abajo-padecimiento-3" id="abajo-padecimiento-3">
                    <input type="hidden" value="0" name="izq-padecimiento-3" id="izq-padecimiento-3">
                    <input type="hidden" value="0" name="der-padecimiento-3" id="der-padecimiento-3">
                    <input type="hidden" value="14" name="margen-3" id="margen-3">
                  </div><!-- fin diente-3 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente4']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-4";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-4";
                        break;                        
                    } 
                  ?> 
                  <div class="diente diente-4 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-4":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-4 <?php echo $Arriba; ?>">
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-4-01"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-4-02"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-4-03"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-4-04"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-4-05"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-4-06"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-4-07"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-4-08"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-4-09"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-4-10"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-4-11"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-4-12"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-4-13"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-4-14"></div>
                      <div class="linea linea-4 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-4-15"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-4";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-4";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-4";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-4";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-4";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-4 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-4"></div>
                      <div class="corona corona-der corona-der-4"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-4" id="arriba-padecimiento-4">
                    <input type="hidden" value="0" name="abajo-padecimiento-4" id="abajo-padecimiento-4">
                    <input type="hidden" value="0" name="izq-padecimiento-4" id="izq-padecimiento-4">
                    <input type="hidden" value="0" name="der-padecimiento-4" id="der-padecimiento-4">
                    <input type="hidden" value="15" name="margen-4" id="margen-4">
                  </div><!-- fin diente-4 -->
                    
                <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente5']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-5";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-5";
                        break;                        
                    } 
                  ?> 
                  <div class="diente diente-5 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-5":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-5 <?php echo $Arriba; ?>">
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-5-01"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-5-02"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-5-03"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-5-04"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-5-05"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-5-06"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-5-07"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-5-08"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-5-09"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-5-10"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-5-11"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-5-12"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-5-13"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-5-14"></div>
                      <div class="linea linea-5 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-5-15"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-5";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-5";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-5";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-5";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-5";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-5 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-5"></div>
                      <div class="corona corona-der corona-der-5"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-5" id="arriba-padecimiento-5">
                    <input type="hidden" value="0" name="abajo-padecimiento-5" id="abajo-padecimiento-5">
                    <input type="hidden" value="0" name="izq-padecimiento-5" id="izq-padecimiento-5">
                    <input type="hidden" value="0" name="der-padecimiento-5" id="der-padecimiento-5">
                    <input type="hidden" value="15" name="margen-5" id="margen-5">
                  </div><!-- fin diente-5 -->
                    
                <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente6']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-6";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-6";
                        break;                        
                    } 
                  ?> 
                  <div class="diente diente-6 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-6":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-6 <?php echo $Arriba; ?>">
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-6-01"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-6-02"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-6-03"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-6-04"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-6-05"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-6-06"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-6-07"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-6-08"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-6-09"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-6-10"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-6-11"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-6-12"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-6-13"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-6-14"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-6-15"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-6-16"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-6-17"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "18" ? "linea-activa":""); ?>" id="linea-6-18"></div>
                      <div class="linea linea-6 <?php echo ($Datos_Diente[4] == "19" ? "linea-activa":""); ?>" id="linea-6-19"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-6";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-6";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-6";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-6";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-6";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-6 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-6"></div>
                      <div class="corona corona-der corona-der-6"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-6" id="arriba-padecimiento-6">
                    <input type="hidden" value="0" name="abajo-padecimiento-6" id="abajo-padecimiento-6">
                    <input type="hidden" value="0" name="izq-padecimiento-6" id="izq-padecimiento-6">
                    <input type="hidden" value="0" name="der-padecimiento-6" id="der-padecimiento-6">
                    <input type="hidden" value="19" name="margen-6" id="margen-6">
                  </div><!-- fin diente-6 -->
                    
                <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente7']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-7";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-7";
                        break;                        
                    } 
                  ?> 
                  <div class="diente diente-7 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-7":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-7 <?php echo $Arriba; ?>">
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-7-01"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-7-02"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-7-03"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-7-04"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-7-05"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-7-06"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-7-07"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-7-08"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-7-09"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-7-10"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-7-11"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-7-12"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-7-13"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-7-14"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-7-15"></div>
                      <div class="linea linea-7 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-7-16"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-7";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-7";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-7";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-7";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-7";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-7 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-7"></div>
                      <div class="corona corona-der corona-der-7"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-7" id="arriba-padecimiento-7">
                    <input type="hidden" value="0" name="abajo-padecimiento-7" id="abajo-padecimiento-7">
                    <input type="hidden" value="0" name="izq-padecimiento-7" id="izq-padecimiento-7">
                    <input type="hidden" value="0" name="der-padecimiento-7" id="der-padecimiento-7">
                    <input type="hidden" value="16" name="margen-7" id="margen-7">
                  </div><!-- fin diente-7 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente8']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-8";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-8";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-8 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-8":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-8 <?php echo $Arriba; ?>">
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-8-01"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-8-02"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-8-03"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-8-04"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-8-05"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-8-06"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-8-07"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-8-08"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-8-09"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-8-10"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-8-11"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-8-12"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-8-13"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-8-14"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-8-15"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-8-16"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-8-17"></div>
                      <div class="linea linea-8 <?php echo ($Datos_Diente[4] == "18" ? "linea-activa":""); ?>" id="linea-8-18"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-8";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-8";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-8";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-8";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-8";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-8 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-8"></div>
                      <div class="corona corona-der corona-der-8"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-8" id="arriba-padecimiento-8">
                    <input type="hidden" value="0" name="abajo-padecimiento-8" id="abajo-padecimiento-8">
                    <input type="hidden" value="0" name="izq-padecimiento-8" id="izq-padecimiento-8">
                    <input type="hidden" value="0" name="der-padecimiento-8" id="der-padecimiento-8">
                    <input type="hidden" value="18" name="margen-8" id="margen-8">
                  </div><!-- fin diente-8 -->
                  
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-01"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-02"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-03"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-04"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-05"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-06"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-07"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-08"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-09"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-10"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-11"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-12"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-1" id="frenillo-alto-arriba-1-13"></div>
                  <input type="hidden" value="0" name="frenillo-1" id="frenillo-1">            
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente9']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-9";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-9";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-9 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-9":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-9 <?php echo $Arriba; ?>">
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-9-01"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-9-02"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-9-03"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-9-04"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-9-05"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-9-06"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-9-07"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-9-08"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-9-09"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-9-10"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-9-11"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-9-12"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-9-13"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-9-14"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-9-15"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-9-16"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-9-17"></div>
                      <div class="linea linea-9 <?php echo ($Datos_Diente[4] == "18" ? "linea-activa":""); ?>" id="linea-9-18"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-9";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-9";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-9";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-9";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-9";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-9 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-9"></div>
                      <div class="corona corona-der corona-der-9"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-9" id="arriba-padecimiento-9">
                    <input type="hidden" value="0" name="abajo-padecimiento-9" id="abajo-padecimiento-9">
                    <input type="hidden" value="0" name="izq-padecimiento-9" id="izq-padecimiento-9">
                    <input type="hidden" value="0" name="der-padecimiento-9" id="der-padecimiento-9">
                    <input type="hidden" value="18" name="margen-9" id="margen-9">
                  </div><!-- fin diente-9 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente10']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-10";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-10";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-10 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-10":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-10 <?php echo $Arriba; ?>">
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-10-01"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-10-02"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-10-03"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-10-04"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-10-05"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-10-06"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-10-07"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-10-08"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-10-09"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-10-10"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-10-11"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-10-12"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-10-13"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-10-14"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-10-15"></div>
                      <div class="linea linea-10 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-10-16"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-10";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-10";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-10";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-10";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-10";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-10 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-10"></div>
                      <div class="corona corona-der corona-der-10"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-10" id="arriba-padecimiento-10">
                    <input type="hidden" value="0" name="abajo-padecimiento-10" id="abajo-padecimiento-10">
                    <input type="hidden" value="0" name="izq-padecimiento-10" id="izq-padecimiento-10">
                    <input type="hidden" value="0" name="der-padecimiento-10" id="der-padecimiento-10">
                    <input type="hidden" value="16" name="margen-10" id="margen-10">
                  </div><!-- fin diente-10 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente11']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-11";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-11";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-11 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-11":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-11 <?php echo $Arriba; ?>">
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-11-01"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-11-02"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-11-03"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-11-04"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-11-05"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-11-06"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-11-07"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-11-08"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-11-09"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-11-10"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-11-11"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-11-12"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-11-13"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-11-14"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-11-15"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-11-16"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-11-17"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "18" ? "linea-activa":""); ?>" id="linea-11-18"></div>
                      <div class="linea linea-11 <?php echo ($Datos_Diente[4] == "19" ? "linea-activa":""); ?>" id="linea-11-19"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-11";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-11";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-11";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-11";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-11";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-11 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-11"></div>
                      <div class="corona corona-der corona-der-11"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-11" id="arriba-padecimiento-11">
                    <input type="hidden" value="0" name="abajo-padecimiento-11" id="abajo-padecimiento-11">
                    <input type="hidden" value="0" name="izq-padecimiento-11" id="izq-padecimiento-11">
                    <input type="hidden" value="0" name="der-padecimiento-11" id="der-padecimiento-11">
                    <input type="hidden" value="19" name="margen-11" id="margen-11">
                  </div><!-- fin diente-11 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente12']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-12";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-12";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-12 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-12":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-12 <?php echo $Arriba; ?>">
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-12-01"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-12-02"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-12-03"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-12-04"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-12-05"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-12-06"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-12-07"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-12-08"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-12-09"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-12-10"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-12-11"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-12-12"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-12-13"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-12-14"></div>
                      <div class="linea linea-12 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-12-15"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-12";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-12";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-12";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-12";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-12";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-12 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-12"></div>
                      <div class="corona corona-der corona-der-12"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-12" id="arriba-padecimiento-12">
                    <input type="hidden" value="0" name="abajo-padecimiento-12" id="abajo-padecimiento-12">
                    <input type="hidden" value="0" name="izq-padecimiento-12" id="izq-padecimiento-12">
                    <input type="hidden" value="0" name="der-padecimiento-12" id="der-padecimiento-12">
                    <input type="hidden" value="15" name="margen-12" id="margen-12">
                  </div><!-- fin diente-12 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente13']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-13";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-13";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-13 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-13":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-13 <?php echo $Arriba; ?>">
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-12-01"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-13-02"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-13-03"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-13-04"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-13-05"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-13-06"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-13-07"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-13-08"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-13-09"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-13-10"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-13-11"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-13-12"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-13-13"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-13-14"></div>
                      <div class="linea linea-13 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-13-15"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-13";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-13";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-13";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-13";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-13";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-13 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-13"></div>
                      <div class="corona corona-der corona-der-13"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-13" id="arriba-padecimiento-13">
                    <input type="hidden" value="0" name="abajo-padecimiento-13" id="abajo-padecimiento-13">
                    <input type="hidden" value="0" name="izq-padecimiento-13" id="izq-padecimiento-13">
                    <input type="hidden" value="0" name="der-padecimiento-13" id="der-padecimiento-13">
                    <input type="hidden" value="15" name="margen-13" id="margen-13">
                  </div><!-- fin diente-13 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente14']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-14";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-14";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-14 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-14":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-14 <?php echo $Arriba; ?>">
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-14-01"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-14-02"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-14-03"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-14-04"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-14-05"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-14-06"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-14-07"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-14-08"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-14-09"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-14-10"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-14-11"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-14-12"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-14-13"></div>
                      <div class="linea linea-14 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-14-14"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-14";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-14";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-14";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-14";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-14";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-14 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-14"></div>
                      <div class="corona corona-der corona-der-14"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-14" id="arriba-padecimiento-14">
                    <input type="hidden" value="0" name="abajo-padecimiento-14" id="abajo-padecimiento-14">
                    <input type="hidden" value="0" name="izq-padecimiento-14" id="izq-padecimiento-14">
                    <input type="hidden" value="0" name="der-padecimiento-14" id="der-padecimiento-14">
                    <input type="hidden" value="14" name="margen-14" id="margen-14">
                  </div><!-- fin diente-14 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente15']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-15";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-15";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-15 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-15":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-15 <?php echo $Arriba; ?>">
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-15-01"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-15-02"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-15-03"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-15-04"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-15-05"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-15-06"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-15-07"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-15-08"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-15-09"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-15-10"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-15-11"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-15-12"></div>
                      <div class="linea linea-15 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-15-13"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-15";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-15";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-15";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-15";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-15";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-15 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-15"></div>
                      <div class="corona corona-der corona-der-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-15" id="arriba-padecimiento-15">
                    <input type="hidden" value="0" name="abajo-padecimiento-15" id="abajo-padecimiento-15">
                    <input type="hidden" value="0" name="izq-padecimiento-15" id="izq-padecimiento-15">
                    <input type="hidden" value="0" name="der-padecimiento-15" id="der-padecimiento-15">
                    <input type="hidden" value="13" name="margen-15" id="margen-15">
                  </div><!-- fin diente-15 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente16']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-16";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-16";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-16 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-16":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-16 <?php echo $Arriba; ?>">
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-16-01"></div>
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-16-02"></div>
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-16-03"></div>
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-16-04"></div>
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-16-05"></div>
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-16-06"></div>
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-16-07"></div>
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-16-08"></div>
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-16-09"></div>
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-16-10"></div>
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-16-11"></div>
                      <div class="linea linea-16 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-16-12"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-16";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-16";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-16";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-16";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-16";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-16 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-16"></div>
                      <div class="corona corona-der corona-der-16"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-16" id="arriba-padecimiento-16">
                    <input type="hidden" value="0" name="abajo-padecimiento-16" id="abajo-padecimiento-16">
                    <input type="hidden" value="0" name="izq-padecimiento-16" id="izq-padecimiento-16">
                    <input type="hidden" value="0" name="der-padecimiento-16" id="der-padecimiento-16">
                    <input type="hidden" value="12" name="margen-16" id="margen-16">
                  </div><!-- fin diente-16 -->
              
                </div><!-- fin dientes-superiores-arriba -->
                  
                <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente17']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-17";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-17";
                        break;                        
                    } 
                  ?>
                <div id="dientes-superiores-abajo">

                  <div class="diente diente-17 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-17":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-17 <?php echo $Arriba; ?>">
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-17-01"></div>
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-17-02"></div>
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-17-03"></div>
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-17-04"></div>
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-17-05"></div>
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-17-06"></div>
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-17-07"></div>
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-17-08"></div>
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-17-09"></div>
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-17-10"></div>
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-17-11"></div>
                      <div class="linea linea-17 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-17-12"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-17";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-17";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-17";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-17";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-17";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-17 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-17"></div>
                      <div class="corona corona-der corona-der-17"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-17" id="arriba-padecimiento-17">
                    <input type="hidden" value="0" name="abajo-padecimiento-17" id="abajo-padecimiento-17">
                    <input type="hidden" value="0" name="izq-padecimiento-17" id="izq-padecimiento-17">
                    <input type="hidden" value="0" name="der-padecimiento-17" id="der-padecimiento-17">
                    <input type="hidden" value="12" name="margen-17" id="margen-17">
                  </div><!-- fin diente-17 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente18']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-18";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-18";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-18 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-18":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-18 <?php echo $Arriba; ?>">
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-18-01"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-18-02"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-18-03"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-18-04"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-18-05"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-18-06"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-18-07"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-18-08"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-18-09"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-18-10"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-18-11"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-18-12"></div>
                      <div class="linea linea-18 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-18-13"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-18";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-18";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-18";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-18";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-18";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-18 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-18"></div>
                      <div class="corona corona-der corona-der-18"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-18" id="arriba-padecimiento-18">
                    <input type="hidden" value="0" name="abajo-padecimiento-18" id="abajo-padecimiento-18">
                    <input type="hidden" value="0" name="izq-padecimiento-18" id="izq-padecimiento-18">
                    <input type="hidden" value="0" name="der-padecimiento-18" id="der-padecimiento-18">
                    <input type="hidden" value="13" name="margen-18" id="margen-18">
                  </div><!-- fin diente-18 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente19']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-19";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-19";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-19 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-19":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-19 <?php echo $Arriba; ?>">
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-19-01"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-19-02"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-19-03"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-19-04"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-19-05"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-19-06"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-19-07"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-19-08"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-19-09"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-19-10"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-19-11"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-19-12"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-19-13"></div>
                      <div class="linea linea-19 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-19-14"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-19";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-19";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-19";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-19";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-19";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-19 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-19"></div>
                      <div class="corona corona-der corona-der-19"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-19" id="arriba-padecimiento-19">
                    <input type="hidden" value="0" name="abajo-padecimiento-19" id="abajo-padecimiento-19">
                    <input type="hidden" value="0" name="izq-padecimiento-19" id="izq-padecimiento-19">
                    <input type="hidden" value="0" name="der-padecimiento-19" id="der-padecimiento-19">
                    <input type="hidden" value="14" name="margen-19" id="margen-19">
                  </div><!-- fin diente-19 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente20']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-20";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-20";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-20 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-20":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-20 <?php echo $Arriba; ?>">
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-20-01"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-20-02"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-20-03"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-20-04"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-20-05"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-20-06"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-20-07"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-20-08"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-20-09"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-20-10"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-20-11"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-20-12"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-20-13"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-20-14"></div>
                      <div class="linea linea-20 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-20-15"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-20";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-20";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-20";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-20";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-20";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-20 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-20"></div>
                      <div class="corona corona-der corona-der-20"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-20" id="arriba-padecimiento-20">
                    <input type="hidden" value="0" name="abajo-padecimiento-20" id="abajo-padecimiento-20">
                    <input type="hidden" value="0" name="izq-padecimiento-20" id="izq-padecimiento-20">
                    <input type="hidden" value="0" name="der-padecimiento-20" id="der-padecimiento-20">
                    <input type="hidden" value="15" name="margen-20" id="margen-20">
                  </div><!-- fin diente-20 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente21']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-21";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-21";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-21 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-21":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-21 <?php echo $Arriba; ?>">
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-21-01"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-21-02"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-21-03"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-21-04"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-21-05"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-21-06"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-21-07"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-21-08"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-21-09"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-21-10"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-21-11"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-21-12"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-21-13"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-21-14"></div>
                      <div class="linea linea-21 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-21-15"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-21";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-21";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-21";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-21";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-21";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-21 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-21"></div>
                      <div class="corona corona-der corona-der-21"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-21" id="arriba-padecimiento-21">
                    <input type="hidden" value="0" name="abajo-padecimiento-21" id="abajo-padecimiento-21">
                    <input type="hidden" value="0" name="izq-padecimiento-21" id="izq-padecimiento-21">
                    <input type="hidden" value="0" name="der-padecimiento-21" id="der-padecimiento-21">
                    <input type="hidden" value="15" name="margen-21" id="margen-21">
                  </div><!-- fin diente-21 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente22']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-22";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-22";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-22 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-22":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-22 <?php echo $Arriba; ?>">
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-22-01"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-22-02"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-22-03"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-22-04"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-22-05"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-22-06"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-22-07"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-22-08"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-22-09"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-22-10"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-22-11"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-22-12"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-22-13"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-22-14"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-22-15"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-22-16"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-22-17"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "18" ? "linea-activa":""); ?>" id="linea-22-18"></div>
                      <div class="linea linea-22 <?php echo ($Datos_Diente[4] == "19" ? "linea-activa":""); ?>" id="linea-22-19"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-22";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-22";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-22";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-22";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-22";
                            break;
                        } 
                    ?> 
                    <div class="contenedor-corona contenedor-corona-22 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-22"></div>
                      <div class="corona corona-der corona-der-22"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-22" id="arriba-padecimiento-22">
                    <input type="hidden" value="0" name="abajo-padecimiento-22" id="abajo-padecimiento-22">
                    <input type="hidden" value="0" name="izq-padecimiento-22" id="izq-padecimiento-22">
                    <input type="hidden" value="0" name="der-padecimiento-22" id="der-padecimiento-22">
                    <input type="hidden" value="19" name="margen-22" id="margen-22">
                  </div><!-- fin diente-22 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente23']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-23";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-23";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-23 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-23":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-23 <?php echo $Arriba; ?>">
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-23-01"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-23-02"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-23-03"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-23-04"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-23-05"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-23-06"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-23-07"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-23-08"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-23-09"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-23-10"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-23-11"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-23-12"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-23-13"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-23-14"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-23-15"></div>
                      <div class="linea linea-23 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-23-16"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-23";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-23";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-23";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-23";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-23";
                            break;
                        } 
                    ?>
                    <div class="contenedor-corona contenedor-corona-23 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-23"></div>
                      <div class="corona corona-der corona-der-23"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-23" id="arriba-padecimiento-23">
                    <input type="hidden" value="0" name="abajo-padecimiento-23" id="abajo-padecimiento-23">
                    <input type="hidden" value="0" name="izq-padecimiento-23" id="izq-padecimiento-23">
                    <input type="hidden" value="0" name="der-padecimiento-23" id="der-padecimiento-23">
                    <input type="hidden" value="16" name="margen-23" id="margen-23">
                  </div><!-- fin diente-23 -->

                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente24']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-24";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-24";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-24 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-24":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-24 <?php echo $Arriba; ?>">
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-24-01"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-24-02"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-24-03"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-24-04"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-24-05"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-24-06"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-24-07"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-24-08"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-24-09"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-24-10"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-24-11"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-24-12"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-24-13"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-24-14"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-24-15"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-24-16"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-24-17"></div>
                      <div class="linea linea-24 <?php echo ($Datos_Diente[4] == "18" ? "linea-activa":""); ?>" id="linea-24-18"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-24";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-24";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-24";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-24";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-24";
                            break;
                        } 
                    ?>
                    <div class="contenedor-corona contenedor-corona-24 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-24"></div>
                      <div class="corona corona-der corona-der-24"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-24" id="arriba-padecimiento-24">
                    <input type="hidden" value="0" name="abajo-padecimiento-24" id="abajo-padecimiento-24">
                    <input type="hidden" value="0" name="izq-padecimiento-24" id="izq-padecimiento-24">
                    <input type="hidden" value="0" name="der-padecimiento-24" id="der-padecimiento-24">
                    <input type="hidden" value="18" name="margen-24" id="margen-24">
                  </div><!-- fin diente-24 -->

                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <div class="frenillo-alto-arriba frenillo-alto-arriba-2"></div>
                  <input type="hidden" value="0" name="frenillo-2" id="frenillo-2">
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente25']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-25";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-25";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-25 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-25":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-25 <?php echo $Arriba; ?>">
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-25-01"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-25-02"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-25-03"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-25-04"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-25-05"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-25-06"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-25-07"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-25-08"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-25-09"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-25-10"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-25-11"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-25-12"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-25-13"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-25-14"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-25-15"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-25-16"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-25-17"></div>
                      <div class="linea linea-25 <?php echo ($Datos_Diente[4] == "18" ? "linea-activa":""); ?>" id="linea-25-18"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-25";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-25";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-25";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-25";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-25";
                            break;
                        } 
                    ?>
                    <div class="contenedor-corona contenedor-corona-25 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-25"></div>
                      <div class="corona corona-der corona-der-25"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-25" id="arriba-padecimiento-25">
                    <input type="hidden" value="0" name="abajo-padecimiento-25" id="abajo-padecimiento-25">
                    <input type="hidden" value="0" name="izq-padecimiento-25" id="izq-padecimiento-25">
                    <input type="hidden" value="0" name="der-padecimiento-25" id="der-padecimiento-25">
                    <input type="hidden" value="18" name="margen-25" id="margen-25">
                  </div><!-- fin diente-25 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente26']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-26";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-26";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-26 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-26":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-26 <?php echo $Arriba; ?>">
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-26-01"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-26-02"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-26-03"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-26-04"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-26-05"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-26-06"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-26-07"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-26-08"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-26-09"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-26-10"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-26-11"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-26-12"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-26-13"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-26-14"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-26-15"></div>
                      <div class="linea linea-26 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-26-16"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-26";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-26";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-26";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-26";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-26";
                            break;
                        } 
                    ?>
                    <div class="contenedor-corona contenedor-corona-26 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-26"></div>
                      <div class="corona corona-der corona-der-26"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-26" id="arriba-padecimiento-26">
                    <input type="hidden" value="0" name="abajo-padecimiento-26" id="abajo-padecimiento-26">
                    <input type="hidden" value="0" name="izq-padecimiento-26" id="izq-padecimiento-26">
                    <input type="hidden" value="0" name="der-padecimiento-26" id="der-padecimiento-26">
                    <input type="hidden" value="16" name="margen-26" id="margen-26">
                  </div><!-- fin diente-26 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente27']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-27";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-27";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-27 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-27":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-27 <?php echo $Arriba; ?>">
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-27-01"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-27-02"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-27-03"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-27-0"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-27-05"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-27-06"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-27-07"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-27-08"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-27-09"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-27-10"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-27-11"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-27-12"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-27-13"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-27-14"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-27-15"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-27-16"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-27-17"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "18" ? "linea-activa":""); ?>" id="linea-27-18"></div>
                      <div class="linea linea-27 <?php echo ($Datos_Diente[4] == "19" ? "linea-activa":""); ?>" id="linea-27-19"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-26";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-26";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-26";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-26";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-26";
                            break;
                        } 
                    ?>
                    <div class="contenedor-corona contenedor-corona-27 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-27"></div>
                      <div class="corona corona-der corona-der-27"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-27" id="arriba-padecimiento-27">
                    <input type="hidden" value="0" name="abajo-padecimiento-27" id="abajo-padecimiento-27">
                    <input type="hidden" value="0" name="izq-padecimiento-27" id="izq-padecimiento-27">
                    <input type="hidden" value="0" name="der-padecimiento-27" id="der-padecimiento-27">
                    <input type="hidden" value="19" name="margen-27" id="margen-27">
                  </div><!-- fin diente-27 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente28']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-28";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-28";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-28 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-28":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-28 <?php echo $Arriba; ?>">
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-28-01"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-28-02"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-28-03"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-28-04"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-28-05"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-28-06"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-28-07"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-28-08"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-28-09"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-28-10"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-28-11"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-28-12"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-28-13"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-28-14"></div>
                      <div class="linea linea-28 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-28-15"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-28";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-28";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-28";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-28";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-28";
                            break;
                        } 
                    ?>
                    <div class="contenedor-corona contenedor-corona-28 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-28"></div>
                      <div class="corona corona-der corona-der-28"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-28" id="arriba-padecimiento-28">
                    <input type="hidden" value="0" name="abajo-padecimiento-28" id="abajo-padecimiento-28">
                    <input type="hidden" value="0" name="izq-padecimiento-28" id="izq-padecimiento-28">
                    <input type="hidden" value="0" name="der-padecimiento-28" id="der-padecimiento-28">
                    <input type="hidden" value="15" name="margen-28" id="margen-28">
                  </div><!-- fin diente-28 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente29']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-29";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-29";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-29 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-29":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-29 <?php echo $Arriba; ?>">
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-29-01"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-29-02"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-29-03"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-29-04"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-29-05"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-29-06"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-29-07"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-29-08"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-29-09"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-29-10"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-29-11"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-29-12"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-29-13"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-29-14"></div>
                      <div class="linea linea-29 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-29-15"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-29";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-29";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-29";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-29";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-29";
                            break;
                        } 
                    ?>
                    <div class="contenedor-corona contenedor-corona-29 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-29"></div>
                      <div class="corona corona-der corona-der-29"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-29" id="arriba-padecimiento-29">
                    <input type="hidden" value="0" name="abajo-padecimiento-29" id="abajo-padecimiento-29">
                    <input type="hidden" value="0" name="izq-padecimiento-29" id="izq-padecimiento-29">
                    <input type="hidden" value="0" name="der-padecimiento-29" id="der-padecimiento-29">
                    <input type="hidden" value="15" name="margen-29" id="margen-29">
                  </div><!-- fin diente-29 -->
            
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente30']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-30";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-30";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-30 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-30":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-30 <?php echo $Arriba; ?>">
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-30-01"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-30-02"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-30-03"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-30-04"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-30-05"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-30-06"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-30-07"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-30-08"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-30-09"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-30-10"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-30-11"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-30-12"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-30-13"></div>
                      <div class="linea linea-30 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-30-14"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-30";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-30";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-30";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-30";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-30";
                            break;
                        } 
                    ?>
                    <div class="contenedor-corona contenedor-corona-30 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-30"></div>
                      <div class="corona corona-der corona-der-30"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-30" id="arriba-padecimiento-30">
                    <input type="hidden" value="0" name="abajo-padecimiento-30" id="abajo-padecimiento-30">
                    <input type="hidden" value="0" name="izq-padecimiento-30" id="izq-padecimiento-30">
                    <input type="hidden" value="0" name="der-padecimiento-30" id="der-padecimiento-30">
                    <input type="hidden" value="14" name="margen-30" id="margen-30">
                  </div><!-- fin diente-30 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente31']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-31";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-31";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-31 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-31":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-31 <?php echo $Arriba; ?>">
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-31-01"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-31-02"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-31-03"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-31-04"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-31-05"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-31-06"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-31-07"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-31-08"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-31-09"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-31-10"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-31-11"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-31-12"></div>
                      <div class="linea linea-31 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-31-13"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-31";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-31";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-31";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-31";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-31";
                            break;
                        } 
                    ?>
                    <div class="contenedor-corona contenedor-corona-31 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-31"></div>
                      <div class="corona corona-der corona-der-31"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-31" id="arriba-padecimiento-31">
                    <input type="hidden" value="0" name="abajo-padecimiento-31" id="abajo-padecimiento-31">
                    <input type="hidden" value="0" name="izq-padecimiento-31" id="izq-padecimiento-31">
                    <input type="hidden" value="0" name="der-padecimiento-31" id="der-padecimiento-31">
                    <input type="hidden" value="13" name="margen-31" id="margen-31">
                  </div><!-- fin diente-31 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente32']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-32";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-32";
                        break;                        
                    } 
                  ?>
                  <div class="diente diente-32 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-32":""); ?>">
                    <div class="contenedor-lineas contenedor-lineas-32 <?php echo $Arriba; ?>">
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-32-01"></div>
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-32-02"></div>
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-32-03"></div>
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-32-04"></div>
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-32-05"></div>
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-32-06"></div>
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-32-07"></div>
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-32-08"></div>
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-32-09"></div>
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-32-10"></div>
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-32-11"></div>
                      <div class="linea linea-32 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-32-12"></div>
                    </div>
                    <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-32";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-32";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-32";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-32";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-32";
                            break;
                        } 
                    ?>
                    <div class="contenedor-corona contenedor-corona-32 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-32"></div>
                      <div class="corona corona-der corona-der-32"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-32" id="arriba-padecimiento-32">
                    <input type="hidden" value="0" name="abajo-padecimiento-32" id="abajo-padecimiento-32">
                    <input type="hidden" value="0" name="izq-padecimiento-32" id="izq-padecimiento-32">
                    <input type="hidden" value="0" name="der-padecimiento-32" id="der-padecimiento-32">
                    <input type="hidden" value="12" name="margen-32" id="margen-32">
                  </div><!-- fin diente-32 -->

                </div><!-- fin dientes-superiores-abajo -->

                <div id="dientes-inferiores-arriba">
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente33']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-33";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-33";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-33";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-33";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-33";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-33";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-33";
                            break;
                        } 
                    ?>
                  <div class="diente diente-33 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-33":""); ?>">
                    <div class="contenedor-corona contenedor-corona-33 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-33"></div>
                      <div class="corona corona-der corona-der-33"></div>
                    </div>
                    
                    <div class="contenedor-lineas contenedor-lineas-33 <?php echo $Arriba; ?>">
                      <div class="linea linea-33 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-33-01"></div>
                      <div class="linea linea-33 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-33-02"></div>
                      <div class="linea linea-33 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-33-03"></div>
                      <div class="linea linea-33 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-33-04"></div>
                      <div class="linea linea-33 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-33-05"></div>
                      <div class="linea linea-33 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-33-06"></div>
                      <div class="linea linea-33 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-33-07"></div>
                      <div class="linea linea-33 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-33-08"></div>
                      <div class="linea linea-33 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-33-09"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-33" id="arriba-padecimiento-33">
                    <input type="hidden" value="0" name="abajo-padecimiento-33" id="abajo-padecimiento-33">
                    <input type="hidden" value="0" name="izq-padecimiento-33" id="izq-padecimiento-33">
                    <input type="hidden" value="0" name="der-padecimiento-33" id="der-padecimiento-33">
                    <input type="hidden" value="1" name="margen-33" id="margen-33">
                  </div><!-- fin diente-33 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente34']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-34";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-34";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-34";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-34";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-34";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-34";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-34";
                            break;
                        } 
                    ?>
                  
                  <div class="diente diente-34 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-34":""); ?>">
                    <div class="contenedor-corona contenedor-corona-34 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-34"></div>
                      <div class="corona corona-der corona-der-34"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-34 <?php echo $Arriba; ?>">
                      <div class="linea linea-34 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-34-01"></div>
                      <div class="linea linea-34 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-34-02"></div>
                      <div class="linea linea-34 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-34-03"></div>
                      <div class="linea linea-34 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-34-04"></div>
                      <div class="linea linea-34 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-34-05"></div>
                      <div class="linea linea-34 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-34-06"></div>
                      <div class="linea linea-34 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-34-07"></div>
                      <div class="linea linea-34 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-34-08"></div>
                      <div class="linea linea-34 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-34-09"></div>
                      <div class="linea linea-34 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-34-10"></div>
                      <div class="linea linea-34 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-34-11"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-34" id="arriba-padecimiento-34">
                    <input type="hidden" value="0" name="abajo-padecimiento-34" id="abajo-padecimiento-34">
                    <input type="hidden" value="0" name="izq-padecimiento-34" id="izq-padecimiento-34">
                    <input type="hidden" value="0" name="der-padecimiento-34" id="der-padecimiento-34">
                    <input type="hidden" value="1" name="margen-34" id="margen-34">
                  </div><!-- fin diente-34 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente35']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-35";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-35";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-35";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-35";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-35";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-35";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-35";
                            break;
                        } 
                    ?>
                  <div class="diente diente-35 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-35":""); ?>">
                    <div class="contenedor-corona contenedor-corona-35 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-35"></div>
                      <div class="corona corona-der corona-der-35"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-35 <?php echo $Arriba; ?>">
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-35-01"></div>
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-35-02"></div>
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-35-03"></div>
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-35-04"></div>
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-35-05"></div>
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-35-06"></div>
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-35-07"></div>
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-35-08"></div>
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-35-09"></div>
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-35-10"></div>
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-35-11"></div>
                      <div class="linea linea-35 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-35-01"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-35" id="arriba-padecimiento-35">
                    <input type="hidden" value="0" name="abajo-padecimiento-35" id="abajo-padecimiento-35">
                    <input type="hidden" value="0" name="izq-padecimiento-35" id="izq-padecimiento-35">
                    <input type="hidden" value="0" name="der-padecimiento-35" id="der-padecimiento-35">
                    <input type="hidden" value="1" name="margen-35" id="margen-35">
                  </div><!-- fin diente-35 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente36']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-36";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-36";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-36";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-36";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-36";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-36";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-36";
                            break;
                        } 
                    ?>
                  <div class="diente diente-36 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-36":""); ?>">
                    <div class="contenedor-corona contenedor-corona-36 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-36"></div>
                      <div class="corona corona-der corona-der-36"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-36 <?php echo $Arriba; ?>">
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-36-01"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-36-02"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-36-03"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-36-04"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-36-05"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-36-06"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-36-07"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-36-08"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-36-09"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-36-10"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-36-11"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-36-12"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-36-13"></div>
                      <div class="linea linea-36 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-36-14"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-36" id="arriba-padecimiento-36">
                    <input type="hidden" value="0" name="abajo-padecimiento-36" id="abajo-padecimiento-36">
                    <input type="hidden" value="0" name="izq-padecimiento-36" id="izq-padecimiento-36">
                    <input type="hidden" value="0" name="der-padecimiento-36" id="der-padecimiento-36">
                    <input type="hidden" value="1" name="margen-36" id="margen-36">
                  </div><!-- fin diente-36 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente37']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-37";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-37";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-37";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-37";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-37";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-37";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-37";
                            break;
                        } 
                    ?>
                  <div class="diente diente-37 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-37":""); ?>">
                    <div class="contenedor-corona contenedor-corona-37 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-37"></div>
                      <div class="corona corona-der corona-der-37"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-37 <?php echo $Arriba; ?>">
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-37-01"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-37-02"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-37-03"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-37-04"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-37-05"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-37-06"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-37-07"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-37-08"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-37-09"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-37-10"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-37-11"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-37-12"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-37-13"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-37-14"></div>
                      <div class="linea linea-37 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-37-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-37" id="arriba-padecimiento-37">
                    <input type="hidden" value="0" name="abajo-padecimiento-37" id="abajo-padecimiento-37">
                    <input type="hidden" value="0" name="izq-padecimiento-37" id="izq-padecimiento-37">
                    <input type="hidden" value="0" name="der-padecimiento-37" id="der-padecimiento-37">
                    <input type="hidden" value="1" name="margen-37" id="margen-37">
                  </div><!-- fin diente-37 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente38']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-38";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-38";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-38";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-38";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-38";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-38";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-38";
                            break;
                        } 
                    ?>
                  <div class="diente diente-38 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-38":""); ?>">
                    <div class="contenedor-corona contenedor-corona-38 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-38"></div>
                      <div class="corona corona-der corona-der-38"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-38 <?php echo $Arriba; ?>">
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-38-01"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-38-02"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-38-03"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-38-04"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-38-05"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-38-06"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-38-07"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-38-08"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-38-09"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-38-10"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-38-11"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-38-12"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-38-13"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-38-14"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-38-15"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-38-16"></div>
                      <div class="linea linea-38 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-38-18"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-38" id="arriba-padecimiento-38">
                    <input type="hidden" value="0" name="abajo-padecimiento-38" id="abajo-padecimiento-38">
                    <input type="hidden" value="0" name="izq-padecimiento-38" id="izq-padecimiento-38">
                    <input type="hidden" value="0" name="der-padecimiento-38" id="der-padecimiento-38">
                    <input type="hidden" value="1" name="margen-38" id="margen-38">
                  </div><!-- fin diente-38 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente39']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-39";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-39";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-39";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-39";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-39";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-39";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-39";
                            break;
                        } 
                    ?>
                  <div class="diente diente-39 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-39":""); ?>">
                    <div class="contenedor-corona contenedor-corona-39 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-39"></div>
                      <div class="corona corona-der corona-der-39"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-39 <?php echo $Arriba; ?>">
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-39-01"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-39-02"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-39-03"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-39-04"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-39-05"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-39-06"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-39-07"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-39-08"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-39-09"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-39-10"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-39-11"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-39-12"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-39-13"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-39-14"></div>
                      <div class="linea linea-39 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-39-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-39" id="arriba-padecimiento-39">
                    <input type="hidden" value="0" name="abajo-padecimiento-39" id="abajo-padecimiento-39">
                    <input type="hidden" value="0" name="izq-padecimiento-39" id="izq-padecimiento-39">
                    <input type="hidden" value="0" name="der-padecimiento-39" id="der-padecimiento-39">
                    <input type="hidden" value="1" name="margen-39" id="margen-39">
                  </div><!-- fin diente-39 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente40']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-40";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-40";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-40";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-40";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-40";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-40";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-40";
                            break;
                        } 
                    ?>
                  <div class="diente diente-40 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-40":""); ?>">
                    <div class="contenedor-corona contenedor-corona-40 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-40"></div>
                      <div class="corona corona-der corona-der-40"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-40 <?php echo $Arriba; ?>">
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-40-01"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-40-02"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-40-03"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-40-04"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-40-05"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-40-06"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-40-07"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-40-08"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-40-09"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-40-10"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-40-11"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-40-12"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-40-13"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-40-14"></div>
                      <div class="linea linea-40 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-40-15"></div>
                    </div>                      
                      
                    <input type="hidden" value="0" name="arriba-padecimiento-40" id="arriba-padecimiento-40">
                    <input type="hidden" value="0" name="abajo-padecimiento-40" id="abajo-padecimiento-40">
                    <input type="hidden" value="0" name="izq-padecimiento-40" id="izq-padecimiento-40">
                    <input type="hidden" value="0" name="der-padecimiento-40" id="der-padecimiento-40">
                    <input type="hidden" value="1" name="margen-40" id="margen-40">
                  </div><!-- fin diente-40 -->

                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-3"></div>
                  <input type="hidden" value="0" name="frenillo-3" id="frenillo-3">
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente41']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-41";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-41";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-41";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-41";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-41";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-41";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-41";
                            break;
                        } 
                    ?>
                  <div class="diente diente-41 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-41":""); ?>">
                    <div class="contenedor-corona contenedor-corona-41 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-41"></div>
                      <div class="corona corona-der corona-der-41"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-41 <?php echo $Arriba; ?>">
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-41-01"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-41-02"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-41-03"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-41-04"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-41-05"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-41-06"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-41-07"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-41-08"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-41-09"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-41-10"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-41-11"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-41-12"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-41-13"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-41-14"></div>
                      <div class="linea linea-41 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-41-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-41" id="arriba-padecimiento-41">
                    <input type="hidden" value="0" name="abajo-padecimiento-41" id="abajo-padecimiento-41">
                    <input type="hidden" value="0" name="izq-padecimiento-41" id="izq-padecimiento-41">
                    <input type="hidden" value="0" name="der-padecimiento-41" id="der-padecimiento-41">
                    <input type="hidden" value="1" name="margen-41" id="margen-41">
                  </div><!-- fin diente-41 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente42']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-42";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-42";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-42";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-42";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-42";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-42";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-42";
                            break;
                        } 
                    ?>
                  <div class="diente diente-42 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-42":""); ?>">
                    <div class="contenedor-corona contenedor-corona-42 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-42"></div>
                      <div class="corona corona-der corona-der-42"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-42 <?php echo $Arriba; ?>">
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-42-01"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-42-02"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-42-03"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-42-04"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-42-05"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-42-06"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-42-07"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-42-08"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-42-09"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-42-10"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-42-11"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-42-12"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-42-13"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-42-14"></div>
                      <div class="linea linea-42 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-42-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-42" id="arriba-padecimiento-42">
                    <input type="hidden" value="0" name="abajo-padecimiento-42" id="abajo-padecimiento-42">
                    <input type="hidden" value="0" name="izq-padecimiento-42" id="izq-padecimiento-42">
                    <input type="hidden" value="0" name="der-padecimiento-42" id="der-padecimiento-42">
                    <input type="hidden" value="1" name="margen-42" id="margen-42">
                  </div><!-- fin diente-42 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente43']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-43";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-43";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-43";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-43";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-43";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-43";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-43";
                            break;
                        } 
                    ?>
                  <div class="diente diente-43 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-43":""); ?>">
                    <div class="contenedor-corona contenedor-corona-43 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-43"></div>
                      <div class="corona corona-der corona-der-43"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-43 <?php echo $Arriba; ?>">
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-43-01"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-43-02"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-43-03"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-43-04"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-43-05"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-43-06"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-43-07"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-43-08"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-43-09"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-43-10"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-43-11"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-43-12"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-43-13"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-43-14"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-43-15"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-43-16"></div>
                      <div class="linea linea-43 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-43-17"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-43" id="arriba-padecimiento-43">
                    <input type="hidden" value="0" name="abajo-padecimiento-43" id="abajo-padecimiento-43">
                    <input type="hidden" value="0" name="izq-padecimiento-43" id="izq-padecimiento-43">
                    <input type="hidden" value="0" name="der-padecimiento-43" id="der-padecimiento-43">
                    <input type="hidden" value="1" name="margen-43" id="margen-43">
                  </div><!-- fin diente-43 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente44']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-44";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-44";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-44";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-44";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-44";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-44";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-44";
                            break;
                        } 
                    ?>
                  <div class="diente diente-44 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-44":""); ?>">
                    <div class="contenedor-corona contenedor-corona-44 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-44"></div>
                      <div class="corona corona-der corona-der-44"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-44 <?php echo $Arriba; ?>">
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-44-01"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-44-02"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-44-03"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-44-04"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-44-05"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-44-06"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-44-07"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-44-08"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-44-09"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-44-11"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-44-12"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-44-13"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-44-14"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-44-15"></div>
                      <div class="linea linea-44 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-44-16"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-44" id="arriba-padecimiento-44">
                    <input type="hidden" value="0" name="abajo-padecimiento-44" id="abajo-padecimiento-44">
                    <input type="hidden" value="0" name="izq-padecimiento-44" id="izq-padecimiento-44">
                    <input type="hidden" value="0" name="der-padecimiento-44" id="der-padecimiento-44">
                    <input type="hidden" value="1" name="margen-44" id="margen-44">
                  </div><!-- fin diente-44 -->
                    
                 <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente45']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-45";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-45";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-45";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-45";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-45";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-45";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-45";
                            break;
                        } 
                    ?>
                  <div class="diente diente-45 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-45":""); ?>">
                    <div class="contenedor-corona contenedor-corona-45 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-45"></div>
                      <div class="corona corona-der corona-der-45"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-45 <?php echo $Arriba; ?>">
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-45-01"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-45-02"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-45-03"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-45-04"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-45-05"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-45-06"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-45-07"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-45-08"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-45-09"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-45-10"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-45-11"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-45-12"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-45-13"></div>
                      <div class="linea linea-45 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-45-14"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-45" id="arriba-padecimiento-45">
                    <input type="hidden" value="0" name="abajo-padecimiento-45" id="abajo-padecimiento-45">
                    <input type="hidden" value="0" name="izq-padecimiento-45" id="izq-padecimiento-45">
                    <input type="hidden" value="0" name="der-padecimiento-45" id="der-padecimiento-45">
                    <input type="hidden" value="1" name="margen-45" id="margen-45">
                  </div><!-- fin diente-45 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente46']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-46";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-46";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-46";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-46";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-46";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-46";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-46";
                            break;
                        } 
                    ?>
                  <div class="diente diente-46 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-46":""); ?>">
                    <div class="contenedor-corona contenedor-corona-46 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-46"></div>
                      <div class="corona corona-der corona-der-46"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-46 <?php echo $Arriba; ?>">
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-46-01"></div>
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-46-02"></div>
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-46-03"></div>
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-46-04"></div>
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-46-05"></div>
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-46-06"></div>
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-46-07"></div>
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-46-08"></div>
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-46-09"></div>
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-46-10"></div>
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-46-11"></div>
                      <div class="linea linea-46 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-46-12"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-46" id="arriba-padecimiento-46">
                    <input type="hidden" value="0" name="abajo-padecimiento-46" id="abajo-padecimiento-46">
                    <input type="hidden" value="0" name="izq-padecimiento-46" id="izq-padecimiento-46">
                    <input type="hidden" value="0" name="der-padecimiento-46" id="der-padecimiento-46">
                    <input type="hidden" value="1" name="margen-46" id="margen-46">
                  </div><!-- fin diente-46 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente47']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-47";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-47";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-47";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-47";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-47";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-47";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-47";
                            break;
                        } 
                    ?>
                  <div class="diente diente-47 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-47":""); ?>">
                    <div class="contenedor-corona contenedor-corona-47 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-47"></div>
                      <div class="corona corona-der corona-der-47"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-47 <?php echo $Arriba; ?>">
                      <div class="linea linea-47 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-47-01"></div>
                      <div class="linea linea-47 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-47-02"></div>
                      <div class="linea linea-47 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-47-03"></div>
                      <div class="linea linea-47 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-47-04"></div>
                      <div class="linea linea-47 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-47-05"></div>
                      <div class="linea linea-47 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-47-06"></div>
                      <div class="linea linea-47 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-47-07"></div>
                      <div class="linea linea-47 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-47-08"></div>
                      <div class="linea linea-47 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-47-09"></div>
                      <div class="linea linea-47 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-47-10"></div>
                      <div class="linea linea-47 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-47-11"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-47" id="arriba-padecimiento-47">
                    <input type="hidden" value="0" name="abajo-padecimiento-47" id="abajo-padecimiento-47">
                    <input type="hidden" value="0" name="izq-padecimiento-47" id="izq-padecimiento-47">
                    <input type="hidden" value="0" name="der-padecimiento-47" id="der-padecimiento-47">
                    <input type="hidden" value="1" name="margen-47" id="margen-47">
                  </div><!-- fin diente-47 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente48']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-48";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-48";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-48";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-48";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-48";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-48";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-48";
                            break;
                        } 
                    ?>
                  <div class="diente diente-48 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-48":""); ?>">
                    <div class="contenedor-corona contenedor-corona-48 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-48"></div>
                      <div class="corona corona-der corona-der-48"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-48 <?php echo $Arriba; ?>">
                      <div class="linea linea-48 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-48-01"></div>
                      <div class="linea linea-48 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-48-02"></div>
                      <div class="linea linea-48 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-48-03"></div>
                      <div class="linea linea-48 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-48-04"></div>
                      <div class="linea linea-48 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-48-05"></div>
                      <div class="linea linea-48 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-48-05"></div>
                      <div class="linea linea-48 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-48-06"></div>
                      <div class="linea linea-48 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-48-07"></div>
                      <div class="linea linea-48 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-48-08"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-48" id="arriba-padecimiento-48">
                    <input type="hidden" value="0" name="abajo-padecimiento-48" id="abajo-padecimiento-48">
                    <input type="hidden" value="0" name="izq-padecimiento-48" id="izq-padecimiento-48">
                    <input type="hidden" value="0" name="der-padecimiento-48" id="der-padecimiento-48">
                    <input type="hidden" value="1" name="margen-48" id="margen-48">
                  </div><!-- fin diente-48 -->

                </div><!-- fin dientes-inferiores-arriba -->

                <div id="dientes-inferiores-abajo">
                        
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente49']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-49";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-49";
                        break;                        
                    } 
                  ?>    
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-49";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-49";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-49";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-49";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-49";
                            break;
                        } 
                    ?>
                  <div class="diente diente-49 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-49":""); ?>">
                    <div class="contenedor-corona contenedor-corona-49 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-49"></div>
                      <div class="corona corona-der corona-der-49"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-49 <?php echo $Arriba; ?>">
                      <div class="linea linea-49 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-49-01"></div>
                      <div class="linea linea-49 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-49-02"></div>
                      <div class="linea linea-49 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-49-03"></div>
                      <div class="linea linea-49 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-49-04"></div>
                      <div class="linea linea-49 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-49-05"></div>
                      <div class="linea linea-49 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-49-06"></div>
                      <div class="linea linea-49 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-49-07"></div>
                      <div class="linea linea-49 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-49-08"></div>
                      <div class="linea linea-49 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-49-09"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-49" id="arriba-padecimiento-49">
                    <input type="hidden" value="0" name="abajo-padecimiento-49" id="abajo-padecimiento-49">
                    <input type="hidden" value="0" name="izq-padecimiento-49" id="izq-padecimiento-49">
                    <input type="hidden" value="0" name="der-padecimiento-49" id="der-padecimiento-49">
                    <input type="hidden" value="1" name="margen-49" id="margen-49">
                  </div><!-- fin diente-49 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente50']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-50";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-50";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-50";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-50";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-50";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-50";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-50";
                            break;
                        } 
                    ?>
                  <div class="diente diente-50 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-50":""); ?>">
                    <div class="contenedor-corona contenedor-corona-50 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-50"></div>
                      <div class="corona corona-der corona-der-50"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-50 <?php echo $Arriba; ?>">
                      <div class="linea linea-50 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-50-01"></div>
                      <div class="linea linea-50 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-50-02"></div>
                      <div class="linea linea-50 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-50-03"></div>
                      <div class="linea linea-50 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-50-04"></div>
                      <div class="linea linea-50 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-50-05"></div>
                      <div class="linea linea-50 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-50-06"></div>
                      <div class="linea linea-50 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-50-07"></div>
                      <div class="linea linea-50 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-50-08"></div>
                      <div class="linea linea-50 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-50-09"></div>
                      <div class="linea linea-50 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-50-10"></div>
                      <div class="linea linea-50 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-50-11"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-50" id="arriba-padecimiento-50">
                    <input type="hidden" value="0" name="abajo-padecimiento-50" id="abajo-padecimiento-50">
                    <input type="hidden" value="0" name="izq-padecimiento-50" id="izq-padecimiento-50">
                    <input type="hidden" value="0" name="der-padecimiento-50" id="der-padecimiento-50">
                    <input type="hidden" value="1" name="margen-50" id="margen-50">
                  </div><!-- fin diente-50 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente51']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-51";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-51";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-51";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-51";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-51";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-51";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-51";
                            break;
                        } 
                    ?>
                  <div class="diente diente-51 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-51":""); ?>">
                    <div class="contenedor-corona contenedor-corona-51 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-51"></div>
                      <div class="corona corona-der corona-der-51"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-51 <?php echo $Arriba; ?>">
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-51-01"></div>
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-51-02"></div>
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-51-03"></div>
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-51-04"></div>
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-51-05"></div>
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-51-06"></div>
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-51-07"></div>
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-51-08"></div>
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-51-09"></div>
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-51-11"></div>
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-51-12"></div>
                      <div class="linea linea-51 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-51-13"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-51" id="arriba-padecimiento-51">
                    <input type="hidden" value="0" name="abajo-padecimiento-51" id="abajo-padecimiento-51">
                    <input type="hidden" value="0" name="izq-padecimiento-51" id="izq-padecimiento-51">
                    <input type="hidden" value="0" name="der-padecimiento-51" id="der-padecimiento-51">
                    <input type="hidden" value="1" name="margen-51" id="margen-51">
                  </div><!-- fin diente-51 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente52']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-52";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-52";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-52";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-52";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-52";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-52";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-52";
                            break;
                        } 
                    ?>
                  <div class="diente diente-52 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-52":""); ?>">
                    <div class="contenedor-corona contenedor-corona-52 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-52"></div>
                      <div class="corona corona-der corona-der-52"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-52 <?php echo $Arriba; ?>">
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-52-01"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-52-02"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-52-03"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-52-04"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-52-05"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-52-06"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-52-07"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-52-08"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-52-09"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-52-10"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-52-11"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-52-12"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-52-13"></div>
                      <div class="linea linea-52 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-52-14"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-52" id="arriba-padecimiento-52">
                    <input type="hidden" value="0" name="abajo-padecimiento-52" id="abajo-padecimiento-52">
                    <input type="hidden" value="0" name="izq-padecimiento-52" id="izq-padecimiento-52">
                    <input type="hidden" value="0" name="der-padecimiento-52" id="der-padecimiento-52">
                    <input type="hidden" value="1" name="margen-52" id="margen-52">
                  </div><!-- fin diente-52 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente53']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-53";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-53";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-53";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-53";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-53";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-53";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-53";
                            break;
                        } 
                    ?>
                  <div class="diente diente-53 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-53":""); ?>">
                    <div class="contenedor-corona contenedor-corona-53 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-53"></div>
                      <div class="corona corona-der corona-der-53"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-53 <?php echo $Arriba; ?>">
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-53-01"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-53-02"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-53-03"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-53-04"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-53-05"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-53-06"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-53-07"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-53-08"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-53-09"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-53-10"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-53-11"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-53-12"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-53-13"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-53-14"></div>
                      <div class="linea linea-53 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-53-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-53" id="arriba-padecimiento-53">
                    <input type="hidden" value="0" name="abajo-padecimiento-53" id="abajo-padecimiento-53">
                    <input type="hidden" value="0" name="izq-padecimiento-53" id="izq-padecimiento-53">
                    <input type="hidden" value="0" name="der-padecimiento-53" id="der-padecimiento-53">
                    <input type="hidden" value="1" name="margen-53" id="margen-53">
                  </div><!-- fin diente-53 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente54']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-54";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-54";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-54";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-54";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-54";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-54";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-54";
                            break;
                        } 
                    ?>
                  <div class="diente diente-54 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-54":""); ?>">
                    <div class="contenedor-corona contenedor-corona-54 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-54"></div>
                      <div class="corona corona-der corona-der-54"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-54 <?php echo $Arriba; ?>">
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-54-01"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-54-02"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-54-03"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-54-04"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-54-05"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-54-06"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-54-07"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-54-08"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-54-09"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-54-10"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-54-11"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-54-12"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-54-13"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-54-14"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-54-15"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-54-16"></div>
                      <div class="linea linea-54 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-54-17"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-54" id="arriba-padecimiento-54">
                    <input type="hidden" value="0" name="abajo-padecimiento-54" id="abajo-padecimiento-54">
                    <input type="hidden" value="0" name="izq-padecimiento-54" id="izq-padecimiento-54">
                    <input type="hidden" value="0" name="der-padecimiento-54" id="der-padecimiento-54">
                    <input type="hidden" value="1" name="margen-54" id="margen-54">
                  </div><!-- fin diente-54 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente55']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-55";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-55";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-55";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-55";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-55";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-55";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-55";
                            break;
                        } 
                    ?>
                  <div class="diente diente-55 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-55":""); ?>">
                    <div class="contenedor-corona contenedor-corona-55 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-55"></div>
                      <div class="corona corona-der corona-der-55"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-55 <?php echo $Arriba; ?>">
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-55-01"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-55-02"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-55-03"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-55-04"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-55-05"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-55-06"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-55-07"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-55-08"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-55-09"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-55-10"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-55-11"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-55-12"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-55-13"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-55-14"></div>
                      <div class="linea linea-55 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-55-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-55" id="arriba-padecimiento-55">
                    <input type="hidden" value="0" name="abajo-padecimiento-55" id="abajo-padecimiento-55">
                    <input type="hidden" value="0" name="izq-padecimiento-55" id="izq-padecimiento-55">
                    <input type="hidden" value="0" name="der-padecimiento-55" id="der-padecimiento-55">
                    <input type="hidden" value="1" name="margen-55" id="margen-55">
                  </div><!-- fin diente-55 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente56']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-56";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-56";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-56";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-56";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-56";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-56";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-56";
                            break;
                        } 
                    ?>
                  <div class="diente diente-56 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-56":""); ?>">
                    <div class="contenedor-corona contenedor-corona-56 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-56"></div>
                      <div class="corona corona-der corona-der-56"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-56 <?php echo $Arriba; ?>">
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-56-01"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-56-02"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-56-03"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-56-04"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-56-05"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-56-06"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-56-07"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-56-08"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-56-09"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-56-10"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-56-11"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-56-12"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-56-13"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-56-14"></div>
                      <div class="linea linea-56 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-56-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-56" id="arriba-padecimiento-56">
                    <input type="hidden" value="0" name="abajo-padecimiento-56" id="abajo-padecimiento-56">
                    <input type="hidden" value="0" name="izq-padecimiento-56" id="izq-padecimiento-56">
                    <input type="hidden" value="0" name="der-padecimiento-56" id="der-padecimiento-56">
                    <input type="hidden" value="1" name="margen-56" id="margen-56">
                  </div><!-- fin diente-56 -->

                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <div class="frenillo-alto-abajo frenillo-alto-abajo-2"></div>
                  <input type="hidden" value="0" name="frenillo-1" id="frenillo-4">
                
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente57']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-57";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-57";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-57";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-57";
                            break;
			    
			    case 'protesis-fija':
                                $Abajo = "protesis-fija-57";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-57";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-57";
                            break;
                        } 
                    ?>
                  <div class="diente diente-57 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-57":""); ?>">
                    <div class="contenedor-corona contenedor-corona-57 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-57"></div>
                      <div class="corona corona-der corona-der-57"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-57 <?php echo $Arriba; ?>">
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-57-01"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-57-02"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-57-03"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-57-04"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-57-05"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-57-06"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-57-07"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-57-08"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-57-09"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-57-10"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-57-11"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-57-12"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-57-13"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-57-14"></div>
                      <div class="linea linea-57 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-57-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-57" id="arriba-padecimiento-57">
                    <input type="hidden" value="0" name="abajo-padecimiento-57" id="abajo-padecimiento-57">
                    <input type="hidden" value="0" name="izq-padecimiento-57" id="izq-padecimiento-57">
                    <input type="hidden" value="0" name="der-padecimiento-57" id="der-padecimiento-57">
                    <input type="hidden" value="1" name="margen-57" id="margen-57">
                  </div><!-- fin diente-57 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente58']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-58";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-58";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-58";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-58";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-58";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-58";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-58";
                            break;
                        } 
                    ?>
                  <div class="diente diente-58 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-58":""); ?>">
                    <div class="contenedor-corona contenedor-corona-58 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-58"></div>
                      <div class="corona corona-der corona-der-58"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-58 <?php echo $Arriba; ?>">
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-58-01"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-58-02"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-58-03"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-58-04"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-58-05"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-58-06"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-58-07"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-58-08"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-58-09"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-58-10"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-58-11"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-58-12"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-58-13"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-58-14"></div>
                      <div class="linea linea-58 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-58-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-58" id="arriba-padecimiento-58">
                    <input type="hidden" value="0" name="abajo-padecimiento-58" id="abajo-padecimiento-58">
                    <input type="hidden" value="0" name="izq-padecimiento-58" id="izq-padecimiento-58">
                    <input type="hidden" value="0" name="der-padecimiento-58" id="der-padecimiento-58">
                    <input type="hidden" value="1" name="margen-58" id="margen-58">
                  </div><!-- fin diente-58 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente59']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-59";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-59";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-59";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-59";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-59";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-59";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-59";
                            break;
                        } 
                    ?>
                  <div class="diente diente-59 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-59":""); ?>">
                    <div class="contenedor-corona contenedor-corona-59 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-59"></div>
                      <div class="corona corona-der corona-der-59"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-59 <?php echo $Arriba; ?>">
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-59-01"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-59-02"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-59-03"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-59-04"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-59-05"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-59-06"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-59-07"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-59-08"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-59-09"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-59-10"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-59-11"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-59-12"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-59-13"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-59-14"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-59-15"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "16" ? "linea-activa":""); ?>" id="linea-59-16"></div>
                      <div class="linea linea-59 <?php echo ($Datos_Diente[4] == "17" ? "linea-activa":""); ?>" id="linea-59-17"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-59" id="arriba-padecimiento-59">
                    <input type="hidden" value="0" name="abajo-padecimiento-59" id="abajo-padecimiento-59">
                    <input type="hidden" value="0" name="izq-padecimiento-59" id="izq-padecimiento-59">
                    <input type="hidden" value="0" name="der-padecimiento-59" id="der-padecimiento-59">
                    <input type="hidden" value="1" name="margen-59" id="margen-59">
                  </div><!-- fin diente-59 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente60']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-60";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-60";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-60";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-60";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-60";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-60";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-60";
                            break;
                        } 
                    ?>
                  <div class="diente diente-60 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-60":""); ?>">
                    <div class="contenedor-corona contenedor-corona-60 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-60"></div>
                      <div class="corona corona-der corona-der-60"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-60 <?php echo $Arriba; ?>">
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-60-01"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-60-02"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-60-03"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-60-04"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-60-05"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-60-06"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-60-07"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-60-08"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-60-09"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-60-10"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-60-11"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-60-12"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-60-13"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-60-14"></div>
                      <div class="linea linea-60 <?php echo ($Datos_Diente[4] == "15" ? "linea-activa":""); ?>" id="linea-60-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-60" id="arriba-padecimiento-60">
                    <input type="hidden" value="0" name="abajo-padecimiento-60" id="abajo-padecimiento-60">
                    <input type="hidden" value="0" name="izq-padecimiento-60" id="izq-padecimiento-60">
                    <input type="hidden" value="0" name="der-padecimiento-60" id="der-padecimiento-60">
                    <input type="hidden" value="1" name="margen-60" id="margen-60">
                  </div><!-- fin diente-60 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente61']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-61";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-61";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-61";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-61";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-61";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-61";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-61";
                            break;
                        } 
                    ?>
                  <div class="diente diente-61 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-61":""); ?>">
                    <div class="contenedor-corona contenedor-corona-61 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-61"></div>
                      <div class="corona corona-der corona-der-61"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-61 <?php echo $Arriba; ?>">
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-61-01"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-61-02"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-61-03"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-61-04"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-61-05"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-61-06"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-61-07"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-61-08"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-61-09"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-61-10"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-61-11"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-61-12"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "13" ? "linea-activa":""); ?>" id="linea-61-13"></div>
                      <div class="linea linea-61 <?php echo ($Datos_Diente[4] == "14" ? "linea-activa":""); ?>" id="linea-61-14"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-61" id="arriba-padecimiento-61">
                    <input type="hidden" value="0" name="abajo-padecimiento-61" id="abajo-padecimiento-61">
                    <input type="hidden" value="0" name="izq-padecimiento-61" id="izq-padecimiento-61">
                    <input type="hidden" value="0" name="der-padecimiento-61" id="der-padecimiento-61">
                    <input type="hidden" value="1" name="margen-61" id="margen-61">
                  </div><!-- fin diente-61 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente62']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-62";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-62";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-62";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-62";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-62";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-62";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-62";
                            break;
                        } 
                    ?>
                  <div class="diente diente-62 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-62":""); ?>">
                    <div class="contenedor-corona contenedor-corona-62 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-62"></div>
                      <div class="corona corona-der corona-der-62"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-62 <?php echo $Arriba; ?>">
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-62-01"></div>
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-62-02"></div>
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-62-03"></div>
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-62-04"></div>
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-62-05"></div>
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-62-06"></div>
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-62-07"></div>
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-62-08"></div>
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-62-09"></div>
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-62-10"></div>
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-62-11"></div>
                      <div class="linea linea-62 <?php echo ($Datos_Diente[4] == "12" ? "linea-activa":""); ?>" id="linea-62-12"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-62" id="arriba-padecimiento-62">
                    <input type="hidden" value="0" name="abajo-padecimiento-62" id="abajo-padecimiento-62">
                    <input type="hidden" value="0" name="izq-padecimiento-62" id="izq-padecimiento-62">
                    <input type="hidden" value="0" name="der-padecimiento-62" id="der-padecimiento-62">
                    <input type="hidden" value="1" name="margen-62" id="margen-62">
                  </div><!-- fin diente-62 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente63']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-63";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-63";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-63";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-63";
                            break;

			    case 'protesis-fija':
                                $Abajo = "protesis-fija-63";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-63";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-63";
                            break;
                        } 
                    ?>
                  <div class="diente diente-63 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-63":""); ?>">
                    <div class="contenedor-corona contenedor-corona-63 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-63"></div>
                      <div class="corona corona-der corona-der-63"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-63 <?php echo $Arriba; ?>">
                      <div class="linea linea-63 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-63-01"></div>
                      <div class="linea linea-63 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-63-02"></div>
                      <div class="linea linea-63 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-63-03"></div>
                      <div class="linea linea-63 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-63-04"></div>
                      <div class="linea linea-63 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-63-05"></div>
                      <div class="linea linea-63 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-63-06"></div>
                      <div class="linea linea-63 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-63-07"></div>
                      <div class="linea linea-63 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-63-08"></div>
                      <div class="linea linea-63 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-63-09"></div>
                      <div class="linea linea-63 <?php echo ($Datos_Diente[4] == "10" ? "linea-activa":""); ?>" id="linea-63-10"></div>
                      <div class="linea linea-63 <?php echo ($Datos_Diente[4] == "11" ? "linea-activa":""); ?>" id="linea-63-11"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-63" id="arriba-padecimiento-63">
                    <input type="hidden" value="0" name="abajo-padecimiento-63" id="abajo-padecimiento-63">
                    <input type="hidden" value="0" name="izq-padecimiento-63" id="izq-padecimiento-63">
                    <input type="hidden" value="0" name="der-padecimiento-63" id="der-padecimiento-63">
                    <input type="hidden" value="1" name="margen-63" id="margen-63">
                  </div><!-- fin diente-63 -->
                    
                  <?php     
                    $Datos_Diente = explode('|',$Datos_Formato['Diente64']);                     
                    $Arriba = null;

                    switch($Datos_Diente[0])
                    {
                        case 'abceso':
                            $Arriba = "abceso-64";
                        break;

                        case 'bolsa-parodontal':
                            $Arriba = "bolsa-parodontal-64";
                        break;                        
                    } 
                  ?>
                  <?php 
                        $Abajo = null;                    
                        switch($Datos_Diente[1])
                        {
                            case 'reconstruccion':
                                $Abajo = "reconstruccion-64";
                            break;  

                            case 'protesis-removible':
                                $Abajo = "protesis-removible-64";
                            break;
			    
			    case 'protesis-fija':
                                $Abajo = "protesis-fija-64";
                            break;

                            case 'obt-mal-ajustada':
                                $Abajo = "obt-mal-ajustada-64";
                            break;

                            case 'faceta-desgaste':
                                $Abajo = "faceta-desgaste-64";
                            break;
                        } 
                    ?>
                  <div class="diente diente-64 <?php echo ($Datos_Diente[0] == "ausente" ? "ausente-64":""); ?>">
                    <div class="contenedor-corona contenedor-corona-64 <?php echo $Abajo; ?> <?php echo ($Datos_Diente[2] == "1" ? "seleccionado-izq":""); ?> <?php echo ($Datos_Diente[3] == "1" ? "seleccionado-der":""); ?>">
                      <div class="corona corona-izq corona-izq-64"></div>
                      <div class="corona corona-der corona-der-64"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-64 <?php echo $Arriba; ?>">
                      <div class="linea linea-64 <?php echo ($Datos_Diente[4] == "1" ? "linea-activa":""); ?>" id="linea-64-01"></div>
                      <div class="linea linea-64 <?php echo ($Datos_Diente[4] == "2" ? "linea-activa":""); ?>" id="linea-64-02"></div>
                      <div class="linea linea-64 <?php echo ($Datos_Diente[4] == "3" ? "linea-activa":""); ?>" id="linea-64-03"></div>
                      <div class="linea linea-64 <?php echo ($Datos_Diente[4] == "4" ? "linea-activa":""); ?>" id="linea-64-04"></div>
                      <div class="linea linea-64 <?php echo ($Datos_Diente[4] == "5" ? "linea-activa":""); ?>" id="linea-64-05"></div>
                      <div class="linea linea-64 <?php echo ($Datos_Diente[4] == "6" ? "linea-activa":""); ?>" id="linea-64-06"></div>
                      <div class="linea linea-64 <?php echo ($Datos_Diente[4] == "7" ? "linea-activa":""); ?>" id="linea-64-07"></div>
                      <div class="linea linea-64 <?php echo ($Datos_Diente[4] == "8" ? "linea-activa":""); ?>" id="linea-64-08"></div>
                      <div class="linea linea-64 <?php echo ($Datos_Diente[4] == "9" ? "linea-activa":""); ?>" id="linea-64-09"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-64" id="arriba-padecimiento-64">
                    <input type="hidden" value="0" name="abajo-padecimiento-64" id="abajo-padecimiento-64">
                    <input type="hidden" value="0" name="izq-padecimiento-64" id="izq-padecimiento-64">
                    <input type="hidden" value="0" name="der-padecimiento-64" id="der-padecimiento-64">
                    <input type="hidden" value="1" name="margen-64" id="margen-64">
                  </div><!-- fin diente-64 -->

                </div><!-- fin dientes-inferiores-abajo -->

              </div><!-- fin pediodontograma -->              
            </div><!-- fin tab2 -->

          <div class="tab-pane" id="tab3">

            <div class="row">
              <div class="span3"><strong>Etiologia + Patogenia</strong></div>
              <div class="span2"><strong>Curso de la Enfermedad</strong></div>
            </div>
            <br />
            <div class="row">
              <div class="span1">Inflamación Microbiana</div>
              <div class="span2">
                <input type="radio" id="inflamacion_microbiana" name="inflamacion_microbiana" value="1" <?php echo ($Datos_Formato['Inflamacion_Microbiana'] == "1" ? "checked":""); ?>> Débil <br />
                <input type="radio" id="inflamacion_microbiana" name="inflamacion_microbiana" value="2" <?php echo ($Datos_Formato['Inflamacion_Microbiana'] == "2" ? "checked":""); ?>> Moderada <br />
                <input type="radio" id="inflamacion_microbiana" name="inflamacion_microbiana" value="3" <?php echo ($Datos_Formato['Inflamacion_Microbiana'] == "3" ? "checked":""); ?>> Fuerte </td>
              </div>
              <div class="span1">Traumatismo Oclusal</div>
              <div class="span2">
                  <input type="radio" id="traumatismo_oclusal" name="traumatismo_oclusal" value="1" <?php echo ($Datos_Formato['Traumatismo_Oclusal'] == "1" ? "checked":""); ?>> Ligero <br />
                  <input type="radio" id="traumatismo_oclusal" name="traumatismo_oclusal" value="2" <?php echo ($Datos_Formato['Traumatismo_Oclusal'] == "2" ? "checked":""); ?>> Mediano <br />
                  <input type="radio" id="traumatismo_oclusal" name="traumatismo_oclusal" value="3" <?php echo ($Datos_Formato['Traumatismo_Oclusal'] == "3" ? "checked":""); ?>> Fuerte </td>
              </div>
              
            </div>

            <hr />

            <div class="row">
              <div class="span6">
                <label><strong>Parafunciones (bruxismo)</strong></label>
                <input type="text" placeholder="Parafunciones (bruxismo)" id="parafunciones" name="parafunciones" value="<?php echo $Datos_Formato['Parafunciones']; ?>">
              </div>
              <div class="span6">
                <br />
                <label><strong>Morfología y Función</strong></label>
                <input type="text" id="morfologia_funcion" name="morfologia_funcion" placeholder="Morfología y Función" value="<?php echo $Datos_Formato['Morfologia_Funcion']; ?>">
              </div>
              <div class="span6">
                <br />
                <label><strong>Articulación Temporo Mandibular</strong></label>
                <input type="text" id="articulacion_temporo_mandibular" name="articulacion_temporo_mandibular" placeholder="Articulación Temporo Mandibular" value="<?php echo  $Datos_Formato['Articulacion_Temporo_Mandibular']; ?>">
              </div>
              <div class="span6">
                <br />
                <label><strong>Peculiaridad</strong></label>
                <input type="text" id="peculiaridad" name="peculiaridad" placeholder="Peculiaridad" value="<?php echo  $Datos_Formato['Peculiaridad']; ?>">
              </div>
            </div>

            <!--<hr />

            <div class="row">
              <div class="span5">
                <strong>Simbología</strong> M. Movilidad F. Furcación H. Hermorragía
              </div>
            </div>

            <br />

            <div class="row">
              <div class="span4">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="4" style="text-align: center;">P. Bolsa</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>M</td>
                    <td>F</td>
                    <td>H</td>
                    <td>V</td>
                    <td>P</td>
                    <td>D</td>
                    <td>M</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>18</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>17</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>16</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>15</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>14</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>13</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>12</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>11</td>
                  </tr>
                  </tbody>
                </table>
              </div>

              <div class="span4">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="4" style="text-align: center;">P. Bolsa</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td></td>
                    <td>M</td>
                    <td>D</td>
                    <td>P</td>
                    <td>V</td>
                    <td>H</td>
                    <td>F</td>
                    <td>M</td>
                  </tr>
                  <tr>
                    <td>28</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F"></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>27</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F"></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>26</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F"></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>25</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F"></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>24</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F"></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>23</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>22</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>21</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                </table>
              </div>

            </div>--><!-- fin row -->

            <!--<div class="row">
              <div class="span4">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="4" style="text-align: center;">P. Bolsa</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>M</td>
                    <td>F</td>
                    <td>H</td>
                    <td>V</td>
                    <td>P</td>
                    <td>D</td>
                    <td>M</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>41</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>42</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>43</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>44</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>45</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>46</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>47</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td>48</td>
                  </tr>
                  </tbody>
                </table>
              </div>

              <div class="span4">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="4" style="text-align: center;">P. Bolsa</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td></td>
                    <td>M</td>
                    <td>D</td>
                    <td>P</td>
                    <td>V</td>
                    <td>H</td>
                    <td>F</td>
                    <td>M</td>
                  </tr>
                  <tr>
                    <td>31</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>32</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>33</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>34</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>35</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>36</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>37</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                  <tr>
                    <td>38</td>
                    <td><input type="text" style="width: 20px;"></td>                    
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="text" style="width: 20px;"></td>
                    <td><input type="checkbox" name="F" value="F" disabled></td>
                    <td><input type="text" style="width: 20px;"></td>
                  </tr>
                </table>
              </div>

            </div>--><!-- fin row -->
          </div><!-- fin tab3 -->

          <div class="tab-pane" id="tab4">
            <div class="row">
              <div class="span4">
                <h3>Cuantificación de Placa.</h3>
              </div>
            </div>

            <div class="row">
              <div class="span5">
                <table class="table table-striped">
                  <thead>
                    <tr><th>Fecha</th></tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_1" name="cuant_plac_fecha_1" value="<?php echo  $Datos_Formato['Cuant_Plac_Fecha_1']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_18" name="cuant_plac_a_18" value="<?php echo  $Datos_Formato['Cuant_Plac_A_18']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_17" name="cuant_plac_a_17" value="<?php echo  $Datos_Formato['Cuant_Plac_A_17']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_16" name="cuant_plac_a_16" value="<?php echo  $Datos_Formato['Cuant_Plac_A_16']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_15" name="cuant_plac_a_15" value="<?php echo  $Datos_Formato['Cuant_Plac_A_15']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_14" name="cuant_plac_a_14" value="<?php echo  $Datos_Formato['Cuant_Plac_A_14']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_13" name="cuant_plac_a_13" value="<?php echo  $Datos_Formato['Cuant_Plac_A_13']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_12" name="cuant_plac_a_12" value="<?php echo  $Datos_Formato['Cuant_Plac_A_12']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_11" name="cuant_plac_a_11" value="<?php echo  $Datos_Formato['Cuant_Plac_A_11']; ?>"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>18</td>
                      <td>17</td>
                      <td>16</td>
                      <td>15</td>
                      <td>14</td>
                      <td>13</td>
                      <td>12</td>
                      <td>11</td>                      
                    </tr>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_2" name="cuant_plac_fecha_2" value="<?php echo  $Datos_Formato['Cuant_Plac_Fecha_2']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_18" name="cuant_plac_b_18" value="<?php echo  $Datos_Formato['Cuant_Plac_B_18']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_17" name="cuant_plac_b_17" value="<?php echo  $Datos_Formato['Cuant_Plac_B_17']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_16" name="cuant_plac_b_16" value="<?php echo  $Datos_Formato['Cuant_Plac_B_16']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_15" name="cuant_plac_b_15" value="<?php echo  $Datos_Formato['Cuant_Plac_B_15']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_14" name="cuant_plac_b_14" value="<?php echo  $Datos_Formato['Cuant_Plac_B_14']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_13" name="cuant_plac_b_13" value="<?php echo  $Datos_Formato['Cuant_Plac_B_13']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_12" name="cuant_plac_b_12" value="<?php echo  $Datos_Formato['Cuant_Plac_B_12']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_11" name="cuant_plac_b_11" value="<?php echo  $Datos_Formato['Cuant_Plac_B_11']; ?>"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>18</td>
                      <td>17</td>
                      <td>16</td>
                      <td>15</td>
                      <td>14</td>
                      <td>13</td>
                      <td>12</td>
                      <td>11</td>                      
                    </tr>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_3" name="cuant_plac_fecha_3" value="<?php echo $Datos_Formato['Cuant_Plac_Fecha_3']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_18" name="cuant_plac_c_18" value="<?php echo $Datos_Formato['Cuant_Plac_C_18']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_17" name="cuant_plac_c_17" value="<?php echo $Datos_Formato['Cuant_Plac_C_17']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_16" name="cuant_plac_c_16" value="<?php echo $Datos_Formato['Cuant_Plac_C_16']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_15" name="cuant_plac_c_15" value="<?php echo $Datos_Formato['Cuant_Plac_C_15']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_14" name="cuant_plac_c_14" value="<?php echo $Datos_Formato['Cuant_Plac_C_14']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_13" name="cuant_plac_c_13" value="<?php echo $Datos_Formato['Cuant_Plac_C_13']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_12" name="cuant_plac_c_12" value="<?php echo $Datos_Formato['Cuant_Plac_C_12']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_11" name="cuant_plac_c_11" value="<?php echo $Datos_Formato['Cuant_Plac_C_11']; ?>"></td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_4" name="cuant_plac_fecha_4" value="<?php echo $Datos_Formato['Cuant_Plac_Fecha_4']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_48" name="cuant_plac_a_48" value="<?php echo $Datos_Formato['Cuant_Plac_A_48']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_47" name="cuant_plac_a_47" value="<?php echo $Datos_Formato['Cuant_Plac_A_47']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_46" name="cuant_plac_a_46" value="<?php echo $Datos_Formato['Cuant_Plac_A_46']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_45" name="cuant_plac_a_45" value="<?php echo $Datos_Formato['Cuant_Plac_A_45']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_44" name="cuant_plac_a_44" value="<?php echo $Datos_Formato['Cuant_Plac_A_44']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_43" name="cuant_plac_a_43" value="<?php echo $Datos_Formato['Cuant_Plac_A_43']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_42" name="cuant_plac_a_42" value="<?php echo $Datos_Formato['Cuant_Plac_A_42']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_41" name="cuant_plac_a_41" value="<?php echo $Datos_Formato['Cuant_Plac_A_41']; ?>"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>48</td>
                      <td>47</td>
                      <td>46</td>
                      <td>45</td>
                      <td>44</td>
                      <td>43</td>
                      <td>42</td>
                      <td>41</td>                      
                    </tr>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_5" name="cuant_plac_fecha_5" value="<?php echo $Datos_Formato['Cuant_Plac_Fecha_5']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_48" name="cuant_plac_b_48" value="<?php echo $Datos_Formato['Cuant_Plac_B_48']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_47" name="cuant_plac_b_47" value="<?php echo $Datos_Formato['Cuant_Plac_B_47']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_46" name="cuant_plac_b_46" value="<?php echo $Datos_Formato['Cuant_Plac_B_46']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_45" name="cuant_plac_b_45" value="<?php echo $Datos_Formato['Cuant_Plac_B_45']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_44" name="cuant_plac_b_44" value="<?php echo $Datos_Formato['Cuant_Plac_B_44']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_43" name="cuant_plac_b_43" value="<?php echo $Datos_Formato['Cuant_Plac_B_43']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_42" name="cuant_plac_b_42" value="<?php echo $Datos_Formato['Cuant_Plac_B_42']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_41" name="cuant_plac_b_41" value="<?php echo $Datos_Formato['Cuant_Plac_B_41']; ?>"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>48</td>
                      <td>47</td>
                      <td>46</td>
                      <td>45</td>
                      <td>44</td>
                      <td>43</td>
                      <td>42</td>
                      <td>41</td>                      
                    </tr>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_6" name="cuant_plac_fecha_6" value="<?php echo $Datos_Formato['Cuant_Plac_Fecha_6']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_48" name="cuant_plac_c_48" value="<?php echo $Datos_Formato['Cuant_Plac_C_48']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_47" name="cuant_plac_c_47" value="<?php echo $Datos_Formato['Cuant_Plac_C_47']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_46" name="cuant_plac_c_46" value="<?php echo $Datos_Formato['Cuant_Plac_C_46']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_45" name="cuant_plac_c_45" value="<?php echo $Datos_Formato['Cuant_Plac_C_45']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_44" name="cuant_plac_c_44" value="<?php echo $Datos_Formato['Cuant_Plac_C_44']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_43" name="cuant_plac_c_43" value="<?php echo $Datos_Formato['Cuant_Plac_C_43']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_42" name="cuant_plac_c_42" value="<?php echo $Datos_Formato['Cuant_Plac_C_42']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_41" name="cuant_plac_c_41" value="<?php echo $Datos_Formato['Cuant_Plac_C_41']; ?>"></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="span4">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Porcentaje</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_21" name="cuant_plac_a_21" value="<?php echo $Datos_Formato['Cuant_Plac_A_21']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_22" name="cuant_plac_a_22" value="<?php echo $Datos_Formato['Cuant_Plac_A_22']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_23" name="cuant_plac_a_23" value="<?php echo $Datos_Formato['Cuant_Plac_A_23']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_24" name="cuant_plac_a_24" value="<?php echo $Datos_Formato['Cuant_Plac_A_24']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_25" name="cuant_plac_a_25" value="<?php echo $Datos_Formato['Cuant_Plac_A_25']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_26" name="cuant_plac_a_26" value="<?php echo $Datos_Formato['Cuant_Plac_A_26']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_27" name="cuant_plac_a_27" value="<?php echo $Datos_Formato['Cuant_Plac_A_27']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_28" name="cuant_plac_a_28" value="<?php echo $Datos_Formato['Cuant_Plac_A_28']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="cuant_plac_porcentaje_1" name="cuant_plac_porcentaje_1" value="<?php echo $Datos_Formato['Cuant_Plac_Porcentaje_1']; ?>"></td>
                    </tr>
                    <tr>
                      <td>21</td>
                      <td>22</td>
                      <td>23</td>
                      <td>24</td>
                      <td>25</td>
                      <td>26</td>
                      <td>27</td>
                      <td>28</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_21" name="cuant_plac_b_21" value="<?php echo $Datos_Formato['Cuant_Plac_B_21']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_22" name="cuant_plac_b_22" value="<?php echo $Datos_Formato['Cuant_Plac_B_22']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_23" name="cuant_plac_b_23" value="<?php echo $Datos_Formato['Cuant_Plac_B_23']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_24" name="cuant_plac_b_24" value="<?php echo $Datos_Formato['Cuant_Plac_B_24']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_25" name="cuant_plac_b_25" value="<?php echo $Datos_Formato['Cuant_Plac_B_25']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_26" name="cuant_plac_b_26" value="<?php echo $Datos_Formato['Cuant_Plac_B_26']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_27" name="cuant_plac_b_27" value="<?php echo $Datos_Formato['Cuant_Plac_B_27']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_28" name="cuant_plac_b_28" value="<?php echo $Datos_Formato['Cuant_Plac_B_28']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_porcentaje_2" name="cuant_plac_porcentaje_2" value="<?php echo $Datos_Formato['Cuant_Plac_Porcentaje_2']; ?>"></td>
                    </tr>
                    <tr>
                      <td>21</td>
                      <td>22</td>
                      <td>23</td>
                      <td>24</td>
                      <td>25</td>
                      <td>26</td>
                      <td>27</td>
                      <td>28</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_21" name="cuant_plac_c_21" value="<?php echo $Datos_Formato['Cuant_Plac_C_21']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_22" name="cuant_plac_c_22" value="<?php echo $Datos_Formato['Cuant_Plac_C_22']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_23" name="cuant_plac_c_23" value="<?php echo $Datos_Formato['Cuant_Plac_C_23']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_24" name="cuant_plac_c_24" value="<?php echo $Datos_Formato['Cuant_Plac_C_24']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_25" name="cuant_plac_c_25" value="<?php echo $Datos_Formato['Cuant_Plac_C_25']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_26" name="cuant_plac_c_26" value="<?php echo $Datos_Formato['Cuant_Plac_C_26']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_27" name="cuant_plac_c_27" value="<?php echo $Datos_Formato['Cuant_Plac_C_27']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_28" name="cuant_plac_c_28" value="<?php echo $Datos_Formato['Cuant_Plac_C_28']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_porcentaje_3" name="cuant_plac_porcentaje_3" value="<?php echo $Datos_Formato['Cuant_Plac_Porcentaje_3']; ?>"></td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-striped">
                  <tr>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_31" name="cuant_plac_a_31" value="<?php echo $Datos_Formato['Cuant_Plac_A_31']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_32" name="cuant_plac_a_32" value="<?php echo $Datos_Formato['Cuant_Plac_A_32']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_33" name="cuant_plac_a_33" value="<?php echo $Datos_Formato['Cuant_Plac_A_33']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_34" name="cuant_plac_a_34" value="<?php echo $Datos_Formato['Cuant_Plac_A_34']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_35" name="cuant_plac_a_35" value="<?php echo $Datos_Formato['Cuant_Plac_A_35']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_36" name="cuant_plac_a_36" value="<?php echo $Datos_Formato['Cuant_Plac_A_36']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_37" name="cuant_plac_a_37" value="<?php echo $Datos_Formato['Cuant_Plac_A_37']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_38" name="cuant_plac_a_38" value="<?php echo $Datos_Formato['Cuant_Plac_A_38']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_porcentaje_4" name="cuant_plac_porcentaje_4" value="<?php echo $Datos_Formato['Cuant_Plac_Porcentaje_4']; ?>"></td>
                    </tr>
                    <tr>
                      <td>31</td>
                      <td>32</td>
                      <td>33</td>
                      <td>34</td>
                      <td>35</td>
                      <td>36</td>
                      <td>37</td>
                      <td>38</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_31" name="cuant_plac_b_31" value="<?php echo $Datos_Formato['Cuant_Plac_B_31']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_32" name="cuant_plac_b_32" value="<?php echo $Datos_Formato['Cuant_Plac_B_32']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_33" name="cuant_plac_b_33" value="<?php echo $Datos_Formato['Cuant_Plac_B_33']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_34" name="cuant_plac_b_34" value="<?php echo $Datos_Formato['Cuant_Plac_B_34']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_35" name="cuant_plac_b_35" value="<?php echo $Datos_Formato['Cuant_Plac_B_35']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_36" name="cuant_plac_b_36" value="<?php echo $Datos_Formato['Cuant_Plac_B_36']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_37" name="cuant_plac_b_37" value="<?php echo $Datos_Formato['Cuant_Plac_B_37']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_38" name="cuant_plac_b_38" value="<?php echo $Datos_Formato['Cuant_Plac_B_38']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_porcentaje_5" name="cuant_plac_porcentaje_5" value="<?php echo $Datos_Formato['Cuant_Plac_Porcentaje_5']; ?>"></td>
                    </tr>
                    <tr>
                      <td>31</td>
                      <td>32</td>
                      <td>33</td>
                      <td>34</td>
                      <td>35</td>
                      <td>36</td>
                      <td>37</td>
                      <td>38</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_31" name="cuant_plac_c_31" value="<?php echo $Datos_Formato['Cuant_Plac_C_31']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_32" name="cuant_plac_c_32" value="<?php echo $Datos_Formato['Cuant_Plac_C_32']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_33" name="cuant_plac_c_33" value="<?php echo $Datos_Formato['Cuant_Plac_C_33']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_34" name="cuant_plac_c_34" value="<?php echo $Datos_Formato['Cuant_Plac_C_34']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_35" name="cuant_plac_c_35" value="<?php echo $Datos_Formato['Cuant_Plac_C_35']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_36" name="cuant_plac_c_36" value="<?php echo $Datos_Formato['Cuant_Plac_C_36']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_37" name="cuant_plac_c_37" value="<?php echo $Datos_Formato['Cuant_Plac_C_37']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_38" name="cuant_plac_c_38" value="<?php echo $Datos_Formato['Cuant_Plac_C_38']; ?>"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_porcentaje_6" name="cuant_plac_porcentaje_6" value="<?php echo $Datos_Formato['Cuant_Plac_Porcentaje_6']; ?>"></td>
                    </tr>
                </table>
              </div>
            </div><!-- fin row -->

          </div><!-- fin tab4 -->


          <div class="tab-pane" id="tab5">

            <div class="row">
              <div class="span4">
                <h3>Diagnóstico Individual</h3>
              </div>
            </div>           

            <table class="table table-striped">
              <tbody>
                <tr>
                  <td>Gingivitis</td>
                  <td><input type="text" style="width: 13px;" id="gin_18" name="gin_18" value="<?php echo $Datos_Formato['Gin_18']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_17" name="gin_17" value="<?php echo $Datos_Formato['Gin_17']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_16" name="gin_16" value="<?php echo $Datos_Formato['Gin_16']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_15" name="gin_15" value="<?php echo $Datos_Formato['Gin_15']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_14" name="gin_14" value="<?php echo $Datos_Formato['Gin_14']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_13" name="gin_13" value="<?php echo $Datos_Formato['Gin_13']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_12" name="gin_12" value="<?php echo $Datos_Formato['Gin_12']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_11" name="gin_11" value="<?php echo $Datos_Formato['Gin_11']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_21" name="gin_21" value="<?php echo $Datos_Formato['Gin_21']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_22" name="gin_22" value="<?php echo $Datos_Formato['Gin_22']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_23" name="gin_23" value="<?php echo $Datos_Formato['Gin_23']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_24" name="gin_24" value="<?php echo $Datos_Formato['Gin_24']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_25" name="gin_25" value="<?php echo $Datos_Formato['Gin_25']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_26" name="gin_26" value="<?php echo $Datos_Formato['Gin_26']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_27" name="gin_27" value="<?php echo $Datos_Formato['Gin_27']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_28" name="gin_28" value="<?php echo $Datos_Formato['Gin_28']; ?>"></td>
                </tr>
                <tr>
                  <td>Periodontitis Leve</td>
                  <td><input type="text" style="width: 13px;" id="leve_18" name="leve_18" value="<?php echo $Datos_Formato['Leve_18']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_17" name="leve_17" value="<?php echo $Datos_Formato['Leve_17']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_16" name="leve_16" value="<?php echo $Datos_Formato['Leve_16']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_15" name="leve_15" value="<?php echo $Datos_Formato['Leve_15']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_14" name="leve_14" value="<?php echo $Datos_Formato['Leve_14']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_13" name="leve_13" value="<?php echo $Datos_Formato['Leve_13']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_12" name="leve_12" value="<?php echo $Datos_Formato['Leve_12']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_11" name="leve_11" value="<?php echo $Datos_Formato['Leve_11']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_21" name="leve_21" value="<?php echo $Datos_Formato['Leve_21']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_22" name="leve_22" value="<?php echo $Datos_Formato['Leve_22']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_23" name="leve_23" value="<?php echo $Datos_Formato['Leve_23']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_24" name="leve_24" value="<?php echo $Datos_Formato['Leve_24']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_25" name="leve_25" value="<?php echo $Datos_Formato['Leve_25']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_26" name="leve_26" value="<?php echo $Datos_Formato['Leve_26']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_27" name="leve_27" value="<?php echo $Datos_Formato['Leve_27']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_28" name="leve_28" value="<?php echo $Datos_Formato['Leve_28']; ?>"></td>
                </tr>
                <tr>
                  <td>Periodontitis Moderna</td>
                  <td><input type="text" style="width: 13px;" id="moderna_18" name="moderna_18" value="<?php echo $Datos_Formato['Moderna_18']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_17" name="moderna_17" value="<?php echo $Datos_Formato['Moderna_17']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_16" name="moderna_16" value="<?php echo $Datos_Formato['Moderna_16']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_15" name="moderna_15" value="<?php echo $Datos_Formato['Moderna_15']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_14" name="moderna_14" value="<?php echo $Datos_Formato['Moderna_14']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_13" name="moderna_13" value="<?php echo $Datos_Formato['Moderna_13']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_12" name="moderna_12" value="<?php echo $Datos_Formato['Moderna_12']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_11" name="moderna_11" value="<?php echo $Datos_Formato['Moderna_11']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_21" name="moderna_21" value="<?php echo $Datos_Formato['Moderna_21']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_22" name="moderna_22" value="<?php echo $Datos_Formato['Moderna_22']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_23" name="moderna_23" value="<?php echo $Datos_Formato['Moderna_23']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_24" name="moderna_24" value="<?php echo $Datos_Formato['Moderna_24']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_25" name="moderna_25" value="<?php echo $Datos_Formato['Moderna_25']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_26" name="moderna_26" value="<?php echo $Datos_Formato['Moderna_26']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_27" name="moderna_27" value="<?php echo $Datos_Formato['Moderna_27']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_28" name="moderna_28" value="<?php echo $Datos_Formato['Moderna_28']; ?>"></td>
                </tr>
                <tr>
                  <td>Periodontitis Grave</td>
                  <td><input type="text" style="width: 13px;" id="grave_18" name="grave_18" value="<?php echo $Datos_Formato['Grave_18']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_17" name="grave_17" value="<?php echo $Datos_Formato['Grave_17']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_16" name="grave_16" value="<?php echo $Datos_Formato['Grave_16']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_15" name="grave_15" value="<?php echo $Datos_Formato['Grave_15']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_14" name="grave_14" value="<?php echo $Datos_Formato['Grave_14']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_13" name="grave_13" value="<?php echo $Datos_Formato['Grave_13']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_12" name="grave_12" value="<?php echo $Datos_Formato['Grave_12']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_11" name="grave_11" value="<?php echo $Datos_Formato['Grave_11']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_21" name="grave_21" value="<?php echo $Datos_Formato['Grave_21']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_22" name="grave_22" value="<?php echo $Datos_Formato['Grave_22']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_23" name="grave_23" value="<?php echo $Datos_Formato['Grave_23']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_24" name="grave_24" value="<?php echo $Datos_Formato['Grave_24']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_25" name="grave_25" value="<?php echo $Datos_Formato['Grave_25']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_26" name="grave_26" value="<?php echo $Datos_Formato['Grave_26']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_27" name="grave_27" value="<?php echo $Datos_Formato['Grave_27']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_28" name="grave_28" value="<?php echo $Datos_Formato['Grave_28']; ?>"></td>
                </tr>
                <tr>
                  <td></td>
                  <td>18</td>
                  <td>17</td>
                  <td>16</td>
                  <td>15</td>
                  <td>14</td>
                  <td>13</td>
                  <td>12</td>
                  <td>11</td>
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
                  <td></td>
                  <td>48</td>
                  <td>47</td>
                  <td>46</td>
                  <td>45</td>
                  <td>44</td>
                  <td>43</td>
                  <td>42</td>
                  <td>41</td>
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
                  <td>Gingivitis</td>
                  <td><input type="text" style="width: 13px;" id="gin_48" name="gin_48" value="<?php echo $Datos_Formato['Gin_48']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_47" name="gin_47" value="<?php echo $Datos_Formato['Gin_47']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_46" name="gin_46" value="<?php echo $Datos_Formato['Gin_46']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_45" name="gin_45" value="<?php echo $Datos_Formato['Gin_45']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_44" name="gin_44" value="<?php echo $Datos_Formato['Gin_44']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_43" name="gin_43" value="<?php echo $Datos_Formato['Gin_43']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_42" name="gin_42" value="<?php echo $Datos_Formato['Gin_42']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_41" name="gin_41" value="<?php echo $Datos_Formato['Gin_41']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_31" name="gin_31" value="<?php echo $Datos_Formato['Gin_31']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_32" name="gin_32" value="<?php echo $Datos_Formato['Gin_32']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_33" name="gin_33" value="<?php echo $Datos_Formato['Gin_33']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_34" name="gin_34" value="<?php echo $Datos_Formato['Gin_34']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_35" name="gin_35" value="<?php echo $Datos_Formato['Gin_35']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_36" name="gin_36" value="<?php echo $Datos_Formato['Gin_36']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_37" name="gin_37" value="<?php echo $Datos_Formato['Gin_37']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="gin_38" name="gin_38" value="<?php echo $Datos_Formato['Gin_38']; ?>"></td>
                </tr>
                <tr>
                  <td>Periodontitis Leve</td>
                  <td><input type="text" style="width: 13px;" id="leve_48" name="leve_48" value="<?php echo $Datos_Formato['Leve_48']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_47" name="leve_47" value="<?php echo $Datos_Formato['Leve_47']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_46" name="leve_46" value="<?php echo $Datos_Formato['Leve_46']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_45" name="leve_45" value="<?php echo $Datos_Formato['Leve_45']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_44" name="leve_44" value="<?php echo $Datos_Formato['Leve_44']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_43" name="leve_43" value="<?php echo $Datos_Formato['Leve_43']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_42" name="leve_42" value="<?php echo $Datos_Formato['Leve_42']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_41" name="leve_41" value="<?php echo $Datos_Formato['Leve_41']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_31" name="leve_31" value="<?php echo $Datos_Formato['Leve_31']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_32" name="leve_32" value="<?php echo $Datos_Formato['Leve_32']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_33" name="leve_33" value="<?php echo $Datos_Formato['Leve_33']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_34" name="leve_34" value="<?php echo $Datos_Formato['Leve_34']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_35" name="leve_35" value="<?php echo $Datos_Formato['Leve_35']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_36" name="leve_36" value="<?php echo $Datos_Formato['Leve_36']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_37" name="leve_37" value="<?php echo $Datos_Formato['Leve_37']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="leve_38" name="leve_38" value="<?php echo $Datos_Formato['Leve_38']; ?>"></td>
                </tr>
                <tr>
                  <td>Periodontitis Moderna</td>
                  <td><input type="text" style="width: 13px;" id="moderna_48" name="moderna_48" value="<?php echo $Datos_Formato['Moderna_48']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_47" name="moderna_47" value="<?php echo $Datos_Formato['Moderna_47']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_46" name="moderna_46" value="<?php echo $Datos_Formato['Moderna_46']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_45" name="moderna_45" value="<?php echo $Datos_Formato['Moderna_45']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_44" name="moderna_44" value="<?php echo $Datos_Formato['Moderna_44']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_43" name="moderna_43" value="<?php echo $Datos_Formato['Moderna_43']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_42" name="moderna_42" value="<?php echo $Datos_Formato['Moderna_42']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_41" name="moderna_41" value="<?php echo $Datos_Formato['Moderna_41']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_31" name="moderna_31" value="<?php echo $Datos_Formato['Moderna_31']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_32" name="moderna_32" value="<?php echo $Datos_Formato['Moderna_32']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_33" name="moderna_33" value="<?php echo $Datos_Formato['Moderna_33']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_34" name="moderna_34" value="<?php echo $Datos_Formato['Moderna_34']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_35" name="moderna_35" value="<?php echo $Datos_Formato['Moderna_35']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_36" name="moderna_36" value="<?php echo $Datos_Formato['Moderna_36']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_37" name="moderna_37" value="<?php echo $Datos_Formato['Moderna_37']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_38" name="moderna_38" value="<?php echo $Datos_Formato['Moderna_38']; ?>"></td>
                </tr>
                <tr>
                  <td>Periodontitis Grave</td>
                  <td><input type="text" style="width: 13px;" id="grave_48" name="grave_48" value="<?php echo $Datos_Formato['Grave_48']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_47" name="grave_47" value="<?php echo $Datos_Formato['Grave_47']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_46" name="grave_46" value="<?php echo $Datos_Formato['Grave_46']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_45" name="grave_45" value="<?php echo $Datos_Formato['Grave_45']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_44" name="grave_44" value="<?php echo $Datos_Formato['Grave_44']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_43" name="grave_43" value="<?php echo $Datos_Formato['Grave_43']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_42" name="grave_42" value="<?php echo $Datos_Formato['Grave_42']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_41" name="grave_41" value="<?php echo $Datos_Formato['Grave_41']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_31" name="grave_31" value="<?php echo $Datos_Formato['Grave_31']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_32" name="grave_32" value="<?php echo $Datos_Formato['Grave_32']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_33" name="grave_33" value="<?php echo $Datos_Formato['Grave_33']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_34" name="grave_34" value="<?php echo $Datos_Formato['Grave_34']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_35" name="grave_35" value="<?php echo $Datos_Formato['Grave_35']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_36" name="grave_36" value="<?php echo $Datos_Formato['Grave_36']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_37" name="grave_37" value="<?php echo $Datos_Formato['Grave_37']; ?>"></td>
                  <td><input type="text" style="width: 13px;" id="grave_38" name="grave_38" value="<?php echo $Datos_Formato['Grave_38']; ?>"></td>
                </tr>
              </tbody>
            </table>

            <label><strong>Diagnóstico General (lesión más dañada)</strong></label>
            <input type="text" placeholder="Diagnóstico General (lesión más dañada)" class="span4" id="diagnostico_general" name="diagnostico_general" value="<?php echo $Datos_Formato['Diagnostico_General']; ?>">

          </div><!-- fin tab5 -->

          <div class="tab-pane" id="tab6">
            <div class="row">
              <div class="span6">
                <h3>Cuantificación de Placa Post-Tratamiento</h3>
              </div>
            </div>

            <div class="row">
              <div class="span4">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th colspan="18">Fecha</th>
                      <th>Porcentaje</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 75px;" id="fecha_basica_1" name="fecha_basica_1" value="<?php echo $Datos_Formato['Fecha_Basica_1']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_18" name="basica_18" value="<?php echo $Datos_Formato['Basica_18']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_17" name="basica_17" value="<?php echo $Datos_Formato['Basica_17']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_16" name="basica_16" value="<?php echo $Datos_Formato['Basica_16']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_15" name="basica_15" value="<?php echo $Datos_Formato['Basica_15']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_14" name="basica_14" value="<?php echo $Datos_Formato['Basica_14']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_13" name="basica_13" value="<?php echo $Datos_Formato['Basica_13']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_12" name="basica_12" value="<?php echo $Datos_Formato['Basica_12']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_11" name="basica_11" value="<?php echo $Datos_Formato['Basica_11']; ?>"></td>
                      <td>Post T. Básica</td>                      
                      <td><input type="text" style="width: 15px;" id="basica_21" name="basica_21" value="<?php echo $Datos_Formato['Basica_21']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_22" name="basica_22" value="<?php echo $Datos_Formato['Basica_22']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_23" name="basica_23" value="<?php echo $Datos_Formato['Basica_23']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_24" name="basica_24" value="<?php echo $Datos_Formato['Basica_24']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_25" name="basica_25" value="<?php echo $Datos_Formato['Basica_25']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_26" name="basica_26" value="<?php echo $Datos_Formato['Basica_26']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_27" name="basica_27" value="<?php echo $Datos_Formato['Basica_27']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_28" name="basica_28" value="<?php echo $Datos_Formato['Basica_28']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="porcentaje_basica_1" name="porcentaje_basica_1" value="<?php echo $Datos_Formato['Porcentaje_Basica_1']; ?>"> %</td>
                    </tr>
                    <tr>
                      <td></td>
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
                      <td></td>                     
                    </tr>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 75px;" id="fecha_final_1" name="fecha_final_1"  value="<?php echo $Datos_Formato['Fecha_Final_1']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_18" name="final_18" value="<?php echo $Datos_Formato['Final_18']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_17" name="final_17" value="<?php echo $Datos_Formato['Final_17']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_16" name="final_16" value="<?php echo $Datos_Formato['Final_16']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_15" name="final_15" value="<?php echo $Datos_Formato['Final_15']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_14" name="final_14" value="<?php echo $Datos_Formato['Final_14']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_13" name="final_13" value="<?php echo $Datos_Formato['Final_13']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_12" name="final_12" value="<?php echo $Datos_Formato['Final_12']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_11" name="final_11" value="<?php echo $Datos_Formato['Final_11']; ?>"></td>
                      <td>Final</td>                      
                      <td><input type="text" style="width: 15px;" id="final_21" name="final_21" value="<?php echo $Datos_Formato['Final_21']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_22" name="final_22" value="<?php echo $Datos_Formato['Final_22']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_23" name="final_23" value="<?php echo $Datos_Formato['Final_23']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_24" name="final_24" value="<?php echo $Datos_Formato['Final_24']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_25" name="final_25" value="<?php echo $Datos_Formato['Final_25']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_26" name="final_26" value="<?php echo $Datos_Formato['Final_26']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_27" name="final_27" value="<?php echo $Datos_Formato['Final_27']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_28" name="final_28" value="<?php echo $Datos_Formato['Final_28']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="porcentaje_final_1" name="porcentaje_final_1" value="<?php echo $Datos_Formato['Porcentaje_Final_1']; ?>"> %</td>
                    </tr>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 75px;" id="fecha_basica_2" name="fecha_basica_2" value="<?php echo $Datos_Formato['Fecha_Basica_2']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_48" name="basica_48" value="<?php echo $Datos_Formato['Basica_48']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_47" name="basica_47" value="<?php echo $Datos_Formato['Basica_47']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_46" name="basica_46" value="<?php echo $Datos_Formato['Basica_46']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_45" name="basica_45" value="<?php echo $Datos_Formato['Basica_45']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_44" name="basica_44" value="<?php echo $Datos_Formato['Basica_44']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_43" name="basica_43" value="<?php echo $Datos_Formato['Basica_43']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_42" name="basica_42" value="<?php echo $Datos_Formato['Basica_42']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_41" name="basica_41" value="<?php echo $Datos_Formato['Basica_41']; ?>"></td>
                      <td>Post T. Básica</td>                      
                      <td><input type="text" style="width: 15px;" id="basica_31" name="basica_31" value="<?php echo $Datos_Formato['Basica_31']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_32" name="basica_32" value="<?php echo $Datos_Formato['Basica_32']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_33" name="basica_33" value="<?php echo $Datos_Formato['Basica_33']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_34" name="basica_34" value="<?php echo $Datos_Formato['Basica_34']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_35" name="basica_35" value="<?php echo $Datos_Formato['Basica_35']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_36" name="basica_36" value="<?php echo $Datos_Formato['Basica_36']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_37" name="basica_37" value="<?php echo $Datos_Formato['Basica_37']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="basica_38" name="basica_38" value="<?php echo $Datos_Formato['Basica_38']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="porcentaje_basica_2" name="porcentaje_basica_2" value="<?php echo $Datos_Formato['Porcentaje_Basica_2']; ?>"> %</td>
                    </tr>
                    <tr>
                      <td></td>
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
                      <td></td>                     
                    </tr>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 75px;" id="fecha_final_2" name="fecha_final_2" value="<?php echo $Datos_Formato['Fecha_Final_2']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_48" name="final_48" value="<?php echo $Datos_Formato['Final_48']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_47" name="final_47" value="<?php echo $Datos_Formato['Final_47']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_46" name="final_46" value="<?php echo $Datos_Formato['Final_46']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_45" name="final_45" value="<?php echo $Datos_Formato['Final_45']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_44" name="final_44" value="<?php echo $Datos_Formato['Final_44']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_43" name="final_43" value="<?php echo $Datos_Formato['Final_43']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_42" name="final_42" value="<?php echo $Datos_Formato['Final_42']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_41" name="final_41" value="<?php echo $Datos_Formato['Final_41']; ?>"></td>
                      <td>Final</td>                      
                      <td><input type="text" style="width: 15px;" id="final_31" name="final_31" value="<?php echo $Datos_Formato['Final_31']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_32" name="final_32" value="<?php echo $Datos_Formato['Final_32']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_33" name="final_33" value="<?php echo $Datos_Formato['Final_33']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_34" name="final_34" value="<?php echo $Datos_Formato['Final_34']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_35" name="final_35" value="<?php echo $Datos_Formato['Final_35']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_36" name="final_36" value="<?php echo $Datos_Formato['Final_36']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_37" name="final_37" value="<?php echo $Datos_Formato['Final_37']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="final_38" name="final_38" value="<?php echo $Datos_Formato['Final_38']; ?>"></td>
                      <td><input type="text" style="width: 15px;" id="porcentaje_final_2" name="porcentaje_final_2" value="<?php echo $Datos_Formato['Porcentaje_Final_2']; ?>"> %</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div><!-- fin row -->

            <label><strong>Observaciones</strong></label>
            <textarea placeholder="Observaciones" style="width: 90%;" id="observaciones" name="observaciones"><?php echo $Datos_Formato['Observaciones']; ?></textarea>
            <br /><br />
          </div><!-- fin tab6 -->

          <div class="tab-pane" id="tab7">
            <h2>Valoración Bolsa Post-Tratamiento</h2>

            <div class="row">
              <div class="span4">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th colspan="8" style="text-align: center;">P. Bolsa</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>M</td>
                    <td>F</td>
                    <td>H</td>
                    <td>V</td>
                    <td>P</td>
                    <td>D</td>
                    <td>M</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_18" name="bolsa_m_18" value="<?php echo $Datos_Formato['Bolsa_M_18']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_18" name="bolsa_f_18" <?php echo ($Datos_Formato['Bolsa_F_18'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_18" name="bolsa_h_18" value="<?php echo $Datos_Formato['Bolsa_H_18']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_18" name="bolsa_v_18" value="<?php echo $Datos_Formato['Bolsa_V_18']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_18" name="bolsa_p_18" value="<?php echo $Datos_Formato['Bolsa_P_18']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_18" name="bolsa_d_18" value="<?php echo $Datos_Formato['Bolsa_D_18']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_18" name="bolsa_m2_18" value="<?php echo $Datos_Formato['Bolsa_M2_18']; ?>"></td>
                    <td>18</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_17" name="bolsa_m_17" value="<?php echo $Datos_Formato['Bolsa_M_17']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_17" name="bolsa_f_17" <?php echo ($Datos_Formato['Bolsa_F_17'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_17" name="bolsa_h_17" value="<?php echo $Datos_Formato['Bolsa_H_17']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_17" name="bolsa_v_17" value="<?php echo $Datos_Formato['Bolsa_V_17']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_17" name="bolsa_p_17" value="<?php echo $Datos_Formato['Bolsa_P_17']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_17" name="bolsa_d_17" value="<?php echo $Datos_Formato['Bolsa_D_17']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_17" name="bolsa_m2_17" value="<?php echo $Datos_Formato['Bolsa_M2_17']; ?>"></td>
                    <td>17</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_16" name="bolsa_m_16" value="<?php echo $Datos_Formato['Bolsa_M_16']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_16" name="bolsa_f_16" <?php echo ($Datos_Formato['Bolsa_F_16'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_16" name="bolsa_h_16" value="<?php echo $Datos_Formato['Bolsa_H_16']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_16" name="bolsa_v_16" value="<?php echo $Datos_Formato['Bolsa_V_16']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_16" name="bolsa_p_16" value="<?php echo $Datos_Formato['Bolsa_P_16']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_16" name="bolsa_d_16" value="<?php echo $Datos_Formato['Bolsa_D_16']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_16" name="bolsa_m2_16" value="<?php echo $Datos_Formato['Bolsa_M2_16']; ?>"></td>
                    <td>16</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_15" name="bolsa_m_15" value="<?php echo $Datos_Formato['Bolsa_M_15']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_15" name="bolsa_f_15" <?php echo ($Datos_Formato['Bolsa_F_15'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_15" name="bolsa_h_15" value="<?php echo $Datos_Formato['Bolsa_H_15']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_15" name="bolsa_v_15" value="<?php echo $Datos_Formato['Bolsa_V_15']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_15" name="bolsa_p_15" value="<?php echo $Datos_Formato['Bolsa_P_15']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_15" name="bolsa_d_15" value="<?php echo $Datos_Formato['Bolsa_D_15']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_15" name="bolsa_m2_15" value="<?php echo $Datos_Formato['Bolsa_M2_15']; ?>"></td>
                    <td>15</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_14" name="bolsa_m_14" value="<?php echo $Datos_Formato['Bolsa_M_14']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_14" name="bolsa_f_14" <?php echo ($Datos_Formato['Bolsa_F_15'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_14" name="bolsa_h_14" value="<?php echo $Datos_Formato['Bolsa_H_14']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_14" name="bolsa_v_14" value="<?php echo $Datos_Formato['Bolsa_V_14']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_14" name="bolsa_p_14" value="<?php echo $Datos_Formato['Bolsa_P_14']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_14" name="bolsa_d_14" value="<?php echo $Datos_Formato['Bolsa_D_14']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_14" name="bolsa_m2_14" value="<?php echo $Datos_Formato['Bolsa_M2_14']; ?>"></td>
                    <td>14</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_13" name="bolsa_m_13" value="<?php echo $Datos_Formato['Bolsa_M_13']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_13" name="bolsa_f_13" <?php echo ($Datos_Formato['Bolsa_F_13'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_13" name="bolsa_h_13" value="<?php echo $Datos_Formato['Bolsa_H_13']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_13" name="bolsa_v_13" value="<?php echo $Datos_Formato['Bolsa_V_13']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_13" name="bolsa_p_13" value="<?php echo $Datos_Formato['Bolsa_P_13']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_13" name="bolsa_d_13" value="<?php echo $Datos_Formato['Bolsa_D_13']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_13" name="bolsa_m2_13" value="<?php echo $Datos_Formato['Bolsa_M2_13']; ?>"></td>
                    <td>13</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_12" name="bolsa_m_12" value="<?php echo $Datos_Formato['Bolsa_M_12']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_12" name="bolsa_f_12" <?php echo ($Datos_Formato['Bolsa_F_12'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_12" name="bolsa_h_12" value="<?php echo $Datos_Formato['Bolsa_H_12']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_12" name="bolsa_v_12" value="<?php echo $Datos_Formato['Bolsa_V_12']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_12" name="bolsa_p_12" value="<?php echo $Datos_Formato['Bolsa_P_12']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_12" name="bolsa_d_12" value="<?php echo $Datos_Formato['Bolsa_D_12']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_12" name="bolsa_m2_12" value="<?php echo $Datos_Formato['Bolsa_M2_12']; ?>"></td>
                    <td>12</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_11" name="bolsa_m_11" value="<?php echo $Datos_Formato['Bolsa_M_11']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_11" name="bolsa_f_11" <?php echo ($Datos_Formato['Bolsa_F_11'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_11" name="bolsa_h_11" value="<?php echo $Datos_Formato['Bolsa_H_11']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_11" name="bolsa_v_11" value="<?php echo $Datos_Formato['Bolsa_V_11']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_11" name="bolsa_p_11" value="<?php echo $Datos_Formato['Bolsa_P_11']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_11" name="bolsa_d_11" value="<?php echo $Datos_Formato['Bolsa_D_11']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_11" name="bolsa_m2_11" value="<?php echo $Datos_Formato['Bolsa_M2_11']; ?>"></td>
                    <td>11</td>
                  </tr>
                  </tbody>
                </table>
              </div>

              <div class="span4">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th colspan="8" style="text-align: center;">P. Bolsa</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td></td>
                    <td>M</td>
                    <td>D</td>
                    <td>P</td>
                    <td>V</td>
                    <td>H</td>
                    <td>F</td>
                    <td>M</td>                    
                  </tr>
                  <tr>
                    <td>28</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_28" name="bolsa_m2_28" value="<?php echo $Datos_Formato['Bolsa_M2_28']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_28" name="bolsa_d_28" value="<?php echo $Datos_Formato['Bolsa_D_28']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_28" name="bolsa_p_28" value="<?php echo $Datos_Formato['Bolsa_P_28']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_28" name="bolsa_v_28" value="<?php echo $Datos_Formato['Bolsa_V_28']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_28" name="bolsa_h_28" value="<?php echo $Datos_Formato['Bolsa_H_28']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_28" name="bolsa_f_28" <?php echo ($Datos_Formato['Bolsa_F_28'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_28" name="bolsa_m_28" value="<?php echo $Datos_Formato['Bolsa_M_28']; ?>"></td>
                  </tr>
                  <tr>
                    <td>27</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_27" name="bolsa_m2_27" value="<?php echo $Datos_Formato['Bolsa_M2_27']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_27" name="bolsa_d_27" value="<?php echo $Datos_Formato['Bolsa_D_27']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_27" name="bolsa_p_27" value="<?php echo $Datos_Formato['Bolsa_P_27']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_27" name="bolsa_v_27" value="<?php echo $Datos_Formato['Bolsa_V_27']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_27" name="bolsa_h_27" value="<?php echo $Datos_Formato['Bolsa_H_27']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_27" name="bolsa_f_27" <?php echo ($Datos_Formato['Bolsa_F_27'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_27" name="bolsa_m_27" value="<?php echo $Datos_Formato['Bolsa_M_27']; ?>"></td>
                  </tr>
                  <tr>
                    <td>26</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_26" name="bolsa_m2_26" value="<?php echo $Datos_Formato['Bolsa_M2_26']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_26" name="bolsa_d_26" value="<?php echo $Datos_Formato['Bolsa_D_26']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_26" name="bolsa_p_26" value="<?php echo $Datos_Formato['Bolsa_P_26']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_26" name="bolsa_v_26" value="<?php echo $Datos_Formato['Bolsa_V_26']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_26" name="bolsa_h_26" value="<?php echo $Datos_Formato['Bolsa_H_26']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_26" name="bolsa_f_26" <?php echo ($Datos_Formato['Bolsa_F_26'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_26" name="bolsa_m_26" value="<?php echo $Datos_Formato['Bolsa_M_26']; ?>"></td>
                  </tr>
                  <tr>
                    <td>25</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_25" name="bolsa_m2_25" value="<?php echo $Datos_Formato['Bolsa_M2_25']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_25" name="bolsa_d_25" value="<?php echo $Datos_Formato['Bolsa_D_25']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_25" name="bolsa_p_25" value="<?php echo $Datos_Formato['Bolsa_P_25']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_25" name="bolsa_v_25" value="<?php echo $Datos_Formato['Bolsa_V_25']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_25" name="bolsa_h_25" value="<?php echo $Datos_Formato['Bolsa_H_25']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_25" name="bolsa_f_25" <?php echo ($Datos_Formato['Bolsa_F_25'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_25" name="bolsa_m_25" value="<?php echo $Datos_Formato['Bolsa_M_25']; ?>"></td>
                  </tr>
                  <tr>
                    <td>24</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_24" name="bolsa_m2_24" value="<?php echo $Datos_Formato['Bolsa_M2_24']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_24" name="bolsa_d_24" value="<?php echo $Datos_Formato['Bolsa_D_24']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_24" name="bolsa_p_24" value="<?php echo $Datos_Formato['Bolsa_P_24']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_24" name="bolsa_v_24" value="<?php echo $Datos_Formato['Bolsa_V_24']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_24" name="bolsa_h_24" value="<?php echo $Datos_Formato['Bolsa_H_24']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_24" name="bolsa_f_24" <?php echo ($Datos_Formato['Bolsa_F_24'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_24" name="bolsa_m_24" value="<?php echo $Datos_Formato['Bolsa_M_24']; ?>"></td>
                  </tr>
                  <tr>
                    <td>23</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_23" name="bolsa_m2_23" value="<?php echo $Datos_Formato['Bolsa_M2_23']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_23" name="bolsa_d_23" value="<?php echo $Datos_Formato['Bolsa_D_23']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_23" name="bolsa_p_23" value="<?php echo $Datos_Formato['Bolsa_P_23']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_23" name="bolsa_v_23" value="<?php echo $Datos_Formato['Bolsa_V_23']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_23" name="bolsa_h_23" value="<?php echo $Datos_Formato['Bolsa_H_23']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_23" name="bolsa_f_23" <?php echo ($Datos_Formato['Bolsa_F_23'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_23" name="bolsa_m_23" value="<?php echo $Datos_Formato['Bolsa_M_23']; ?>"></td>
                  </tr>
                  <tr>
                    <td>22</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_22" name="bolsa_m2_22" value="<?php echo $Datos_Formato['Bolsa_M2_22']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_22" name="bolsa_d_22" value="<?php echo $Datos_Formato['Bolsa_D_22']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_22" name="bolsa_p_22" value="<?php echo $Datos_Formato['Bolsa_P_22']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_22" name="bolsa_v_22" value="<?php echo $Datos_Formato['Bolsa_V_22']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_22" name="bolsa_h_22" value="<?php echo $Datos_Formato['Bolsa_H_22']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_22" name="bolsa_f_22" <?php echo ($Datos_Formato['Bolsa_F_22'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_22" name="bolsa_m_22" value="<?php echo $Datos_Formato['Bolsa_M_22']; ?>"></td>
                  </tr>
                  <tr>
                    <td>21</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_21" name="bolsa_m2_21" value="<?php echo $Datos_Formato['Bolsa_M2_21']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_21" name="bolsa_d_21" value="<?php echo $Datos_Formato['Bolsa_D_21']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_21" name="bolsa_p_21" value="<?php echo $Datos_Formato['Bolsa_P_21']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_21" name="bolsa_v_21" value="<?php echo $Datos_Formato['Bolsa_V_21']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_21" name="bolsa_h_21" value="<?php echo $Datos_Formato['Bolsa_H_21']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_21" name="bolsa_f_21" <?php echo ($Datos_Formato['Bolsa_F_21'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_21" name="bolsa_m_21" value="<?php echo $Datos_Formato['Bolsa_M_21']; ?>"></td>
                  </tr>
                </table>
              </div>

            </div><!-- fin row -->
            <div class="row">
              <div class="span4">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th colspan="8" style="text-align: center;">P. Bolsa</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>M</td>
                    <td>F</td>
                    <td>H</td>
                    <td>V</td>
                    <td>P</td>
                    <td>D</td>
                    <td>M</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_41" name="bolsa_m_41" value="<?php echo $Datos_Formato['Bolsa_M_41']; ?>"></td>                    
                    <td><input type="checkbox" id="bolsa_f_41" name="bolsa_f_41" <?php echo ($Datos_Formato['Bolsa_F_41'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_41" name="bolsa_h_41" value="<?php echo $Datos_Formato['Bolsa_H_41']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_41" name="bolsa_v_41" value="<?php echo $Datos_Formato['Bolsa_V_41']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_41" name="bolsa_p_41" value="<?php echo $Datos_Formato['Bolsa_P_41']; ?>"></td>
                    <td><input  type="text" style="width: 20px;" id="bolsa_d_41" name="bolsa_d_41" value="<?php echo $Datos_Formato['Bolsa_D_41']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_41" name="bolsa_m2_41" value="<?php echo $Datos_Formato['Bolsa_M2_41']; ?>"></td>
                    <td>41</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_42" name="bolsa_m_42" value="<?php echo $Datos_Formato['Bolsa_M_42']; ?>"></td>                    
                    <td><input type="checkbox" id="bolsa_f_42" name="bolsa_f_42" <?php echo ($Datos_Formato['Bolsa_F_42'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_42" name="bolsa_h_42" value="<?php echo $Datos_Formato['Bolsa_H_42']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_42" name="bolsa_v_42" value="<?php echo $Datos_Formato['Bolsa_V_42']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_42" name="bolsa_p_42" value="<?php echo $Datos_Formato['Bolsa_P_42']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_42" name="bolsa_d_42" value="<?php echo $Datos_Formato['Bolsa_D_42']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_42" name="bolsa_m2_42" value="<?php echo $Datos_Formato['Bolsa_M2_42']; ?>"></td>
                    <td>42</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_43" name="bolsa_m_43" value="<?php echo $Datos_Formato['Bolsa_M_43']; ?>"></td>                    
                    <td><input type="checkbox" id="bolsa_f_43" name="bolsa_f_43" <?php echo ($Datos_Formato['Bolsa_F_43'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_43" name="bolsa_h_43" value="<?php echo $Datos_Formato['Bolsa_H_43']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_43" name="bolsa_v_43" value="<?php echo $Datos_Formato['Bolsa_V_43']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_43" name="bolsa_p_43" value="<?php echo $Datos_Formato['Bolsa_P_43']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_43" name="bolsa_d_43" value="<?php echo $Datos_Formato['Bolsa_D_43']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_43" name="bolsa_m2_43" value="<?php echo $Datos_Formato['Bolsa_M2_43']; ?>"></td>
                    <td>43</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_44" name="bolsa_m_44" value="<?php echo $Datos_Formato['Bolsa_M_44']; ?>"></td>                    
			  <td><input type="checkbox" id="bolsa_f_44" name="bolsa_f_44" <?php echo ($Datos_Formato['Bolsa_F_44'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_44" name="bolsa_h_44" value="<?php echo $Datos_Formato['Bolsa_H_44']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_44" name="bolsa_v_44" value="<?php echo $Datos_Formato['Bolsa_V_44']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_44" name="bolsa_p_44" value="<?php echo $Datos_Formato['Bolsa_P_44']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_44" name="bolsa_d_44" value="<?php echo $Datos_Formato['Bolsa_D_44']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_44" name="bolsa_m2_44" value="<?php echo $Datos_Formato['Bolsa_M2_44']; ?>"></td>
                    <td>44</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_45" name="bolsa_m_45" value="<?php echo $Datos_Formato['Bolsa_M_45']; ?>"></td>                    
                    <td><input type="checkbox" id="bolsa_f_45" name="bolsa_f_45" <?php echo ($Datos_Formato['Bolsa_F_45'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_45" name="bolsa_h_45" value="<?php echo $Datos_Formato['Bolsa_H_45']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_45" name="bolsa_v_45" value="<?php echo $Datos_Formato['Bolsa_V_45']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_45" name="bolsa_p_45" value="<?php echo $Datos_Formato['Bolsa_P_45']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_45" name="bolsa_d_45" value="<?php echo $Datos_Formato['Bolsa_D_45']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_45" name="bolsa_m2_45" value="<?php echo $Datos_Formato['Bolsa_M2_45']; ?>"></td>
                    <td>45</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_46" name="bolsa_m_46" value="<?php echo $Datos_Formato['Bolsa_M_46']; ?>"></td>                    
                    <td><input type="checkbox" id="bolsa_f_46" name="bolsa_f_46" <?php echo ($Datos_Formato['Bolsa_F_46'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_46" name="bolsa_h_46" value="<?php echo $Datos_Formato['Bolsa_H_46']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_46" name="bolsa_v_46" value="<?php echo $Datos_Formato['Bolsa_V_46']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_46" name="bolsa_p_46" value="<?php echo $Datos_Formato['Bolsa_P_46']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_46" name="bolsa_d_46" value="<?php echo $Datos_Formato['Bolsa_D_46']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_46" name="bolsa_m2_46" value="<?php echo $Datos_Formato['Bolsa_M2_46']; ?>"></td>
                    <td>46</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_47" name="bolsa_m_47" value="<?php echo $Datos_Formato['Bolsa_M_47']; ?>"></td>                    
                    <td><input type="checkbox" id="bolsa_f_47" name="bolsa_f_47" <?php echo ($Datos_Formato['Bolsa_F_47'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_47" name="bolsa_h_47" value="<?php echo $Datos_Formato['Bolsa_H_47']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_47" name="bolsa_v_47" value="<?php echo $Datos_Formato['Bolsa_V_47']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_47" name="bolsa_p_47" value="<?php echo $Datos_Formato['Bolsa_P_47']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_47" name="bolsa_d_47" value="<?php echo $Datos_Formato['Bolsa_D_47']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_47" name="bolsa_m2_47" value="<?php echo $Datos_Formato['Bolsa_M2_47']; ?>"></td>
                    <td>47</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_48" name="bolsa_m_48" value="<?php echo $Datos_Formato['Bolsa_M_48']; ?>"></td>                    
                    <td><input type="checkbox" style="width: 20px;" id="bolsa_f_48" name="bolsa_f_48" <?php echo ($Datos_Formato['Bolsa_F_48'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_48" name="bolsa_h_48" value="<?php echo $Datos_Formato['Bolsa_H_48']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_48" name="bolsa_v_48" value="<?php echo $Datos_Formato['Bolsa_V_48']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_48" name="bolsa_p_48" value="<?php echo $Datos_Formato['Bolsa_P_48']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_48" name="bolsa_d_48" value="<?php echo $Datos_Formato['Bolsa_D_48']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_48" name="bolsa_m2_48" value="<?php echo $Datos_Formato['Bolsa_M2_48']; ?>"></td>
                    <td>48</td>
                  </tr>
                  </tbody>
                </table>
              </div>

              <div class="span4">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th colspan="8" style="text-align: center;">P. Bolsa</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td></td>
                    <td>M</td>
                    <td>D</td>
                    <td>P</td>
                    <td>V</td>
                    <td>H</td>
                    <td>F</td>
                    <td>M</td>
                  </tr>
                  <tr>
                    <td>31</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_31" name="bolsa_m2_31" value="<?php echo $Datos_Formato['Bolsa_M2_31']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_31" name="bolsa_d_31" value="<?php echo $Datos_Formato['Bolsa_D_31']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_31" name="bolsa_p_31" value="<?php echo $Datos_Formato['Bolsa_P_31']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_31" name="bolsa_v_31" value="<?php echo $Datos_Formato['Bolsa_V_31']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_31" name="bolsa_h_31" value="<?php echo $Datos_Formato['Bolsa_H_31']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_31" name="bolsa_f_31" <?php echo ($Datos_Formato['Bolsa_F_31'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_31" name="bolsa_m_31" value="<?php echo $Datos_Formato['Bolsa_M_31']; ?>"></td>
                  </tr>
                  <tr>
                    <td>32</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_32" name="bolsa_m2_32" value="<?php echo $Datos_Formato['Bolsa_M2_32']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_32" name="bolsa_d_32" value="<?php echo $Datos_Formato['Bolsa_D_32']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_32" name="bolsa_p_32" value="<?php echo $Datos_Formato['Bolsa_P_32']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_32" name="bolsa_v_32" value="<?php echo $Datos_Formato['Bolsa_V_32']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_32" name="bolsa_h_32" value="<?php echo $Datos_Formato['Bolsa_H_32']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_32" name="bolsa_f_32" <?php echo ($Datos_Formato['Bolsa_F_32'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_32" name="bolsa_m_32" value="<?php echo $Datos_Formato['Bolsa_M_32']; ?>"></td>
                  </tr>
                  <tr>
                    <td>33</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_33" name="bolsa_m2_33" value="<?php echo $Datos_Formato['Bolsa_M2_33']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_33" name="bolsa_d_33" value="<?php echo $Datos_Formato['Bolsa_D_33']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_33" name="bolsa_p_33" value="<?php echo $Datos_Formato['Bolsa_P_33']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_33" name="bolsa_v_33" value="<?php echo $Datos_Formato['Bolsa_V_33']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_33" name="bolsa_h_33" value="<?php echo $Datos_Formato['Bolsa_H_33']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_33" name="bolsa_f_33" <?php echo ($Datos_Formato['Bolsa_F_33'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_33" name="bolsa_m_33" value="<?php echo $Datos_Formato['Bolsa_M_33']; ?>"></td>
                  </tr>
                  <tr>
                    <td>34</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_34" name="bolsa_m2_34" value="<?php echo $Datos_Formato['Bolsa_M2_34']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_34" name="bolsa_d_34" value="<?php echo $Datos_Formato['Bolsa_D_34']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_34" name="bolsa_p_34" value="<?php echo $Datos_Formato['Bolsa_P_34']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_34" name="bolsa_v_34" value="<?php echo $Datos_Formato['Bolsa_V_34']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_34" name="bolsa_h_34" value="<?php echo $Datos_Formato['Bolsa_H_34']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_34" name="bolsa_f_34" <?php echo ($Datos_Formato['Bolsa_F_34'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_34" name="bolsa_m_34" value="<?php echo $Datos_Formato['Bolsa_M_34']; ?>"></td>
                  </tr>
                  <tr>
                    <td>35</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_35" name="bolsa_m2_35" value="<?php echo $Datos_Formato['Bolsa_M2_35']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_35" name="bolsa_d_35" value="<?php echo $Datos_Formato['Bolsa_D_35']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_35" name="bolsa_p_35" value="<?php echo $Datos_Formato['Bolsa_P_35']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_35" name="bolsa_v_35" value="<?php echo $Datos_Formato['Bolsa_V_35']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_35" name="bolsa_h_35" value="<?php echo $Datos_Formato['Bolsa_H_35']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_35" name="bolsa_f_35" <?php echo ($Datos_Formato['Bolsa_F_35'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_35" name="bolsa_m_35" value="<?php echo $Datos_Formato['Bolsa_M_35']; ?>"></td>
                  </tr>
                  <tr>
                    <td>36</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_36" name="bolsa_m2_36" value="<?php echo $Datos_Formato['Bolsa_M2_36']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_36" name="bolsa_d_36" value="<?php echo $Datos_Formato['Bolsa_D_36']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_36" name="bolsa_p_36" value="<?php echo $Datos_Formato['Bolsa_P_36']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_36" name="bolsa_v_36" value="<?php echo $Datos_Formato['Bolsa_V_36']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_36" name="bolsa_h_36" value="<?php echo $Datos_Formato['Bolsa_H_36']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_36" name="bolsa_f_36" <?php echo ($Datos_Formato['Bolsa_F_36'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_36" name="bolsa_m_36" value="<?php echo $Datos_Formato['Bolsa_M_36']; ?>"></td>
                  </tr>
                  <tr>
                    <td>37</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_37" name="bolsa_m2_37" value="<?php echo $Datos_Formato['Bolsa_M2_37']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_37" name="bolsa_d_37" value="<?php echo $Datos_Formato['Bolsa_D_37']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_37" name="bolsa_p_37" value="<?php echo $Datos_Formato['Bolsa_P_37']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_37" name="bolsa_v_37" value="<?php echo $Datos_Formato['Bolsa_V_37']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_37" name="bolsa_h_37" value="<?php echo $Datos_Formato['Bolsa_H_37']; ?>"></td>
                    <td><input type="checkbox" id="bolsa_f_37" name="bolsa_f_37" <?php echo ($Datos_Formato['Bolsa_F_37'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_37" name="bolsa_m_37" value="<?php echo $Datos_Formato['Bolsa_M_37']; ?>"></td>
                  </tr>
                  <tr>
                    <td>38</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_38" name="bolsa_m2_38" value="<?php echo $Datos_Formato['Bolsa_M2_38']; ?>"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_38" name="bolsa_d_38" value="<?php echo $Datos_Formato['Bolsa_D_38']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_38" name="bolsa_p_38" value="<?php echo $Datos_Formato['Bolsa_P_38']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_38" name="bolsa_v_38" value="<?php echo $Datos_Formato['Bolsa_V_38']; ?>"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_38" name="bolsa_h_38" value="<?php echo $Datos_Formato['Bolsa_H_38']; ?>"></td>
			  <td><input type="checkbox" id="bolsa_f_38" name="bolsa_f_38" <?php echo ($Datos_Formato['Bolsa_F_38'] == "on" ? "checked":""); ?>></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_38" name="bolsa_m_38" value="<?php echo $Datos_Formato['Bolsa_M_38']; ?>"></td>
                  </tr>
                </table>
              </div>

            </div><!-- fin row -->

          </div><!-- fin tab7 -->

          <div class="tab-pane" id="tab8">
            <div class="row">
              <div class="span6">
                <h3>Planificación del Tratamiento</h3>
              </div>
            </div>

          <div class="row">
            <div class="span8">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>1. Sistémico <input type="radio" id="planificacion_tratamiento" name="planificacion_tratamiento" value="1" <?php echo ($Datos_Formato['Planificacion_Tratamiento'] == "1" ? "checked":""); ?>></td>
                    <td>2. Terapira Básica <input type="radio" id="planificacion_tratamiento" name="planificacion_tratamiento" value="2" <?php echo ($Datos_Formato['Planificacion_Tratamiento'] == "2" ? "checked":""); ?>></td>
                    <td>3. Quirúrgico <input type="radio" id="planificacion_tratamiento" name="planificacion_tratamiento" value="3" <?php echo ($Datos_Formato['Planificacion_Tratamiento'] == "3" ? "checked":""); ?>></td>
                    <td>4. Mantenimiento: <input type="radio" id="planificacion_tratamiento" name="planificacion_tratamiento" value="4" <?php echo ($Datos_Formato['Planificacion_Tratamiento'] == "4" ? "checked":""); ?>> revisión cada <input type="text" style="width: 15px;" id="revision_meses" name="revision_meses" value="<?php echo $Datos_Formato['Revision_Meses']; ?>"> mes(es). </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="span5">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Tratamiento</th>
                    <!--<th>Firma</th>-->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_1" name="fecha_tratamiento_1" value="<?php echo $Datos_Formato['Fecha_Tratamiento_1']; ?>"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_1" name="tratamiento_1" value="<?php echo $Datos_Formato['Tratamiento_1']; ?>"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_2" name="fecha_tratamiento_2" value="<?php echo $Datos_Formato['Fecha_Tratamiento_2']; ?>"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_2" name="tratamiento_2" value="<?php echo $Datos_Formato['Tratamiento_2']; ?>"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_3" name="fecha_tratamiento_3" value="<?php echo $Datos_Formato['Fecha_Tratamiento_3']; ?>"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_3" name="tratamiento_3" value="<?php echo $Datos_Formato['Tratamiento_3']; ?>"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_4" name="fecha_tratamiento_4" value="<?php echo $Datos_Formato['Fecha_Tratamiento_4']; ?>"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_4" name="tratamiento_4" value="<?php echo $Datos_Formato['Tratamiento_4']; ?>"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_5" name="fecha_tratamiento_5" value="<?php echo $Datos_Formato['Fecha_Tratamiento_5']; ?>"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_5" name="tratamiento_5" value="<?php echo $Datos_Formato['Tratamiento_5']; ?>"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_6" name="fecha_tratamiento_6" value="<?php echo $Datos_Formato['Fecha_Tratamiento_6']; ?>"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_6" name="tratamiento_6" value="<?php echo $Datos_Formato['Tratamiento_6']; ?>"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_7" name="fecha_tratamiento_7" value="<?php echo $Datos_Formato['Fecha_Tratamiento_7']; ?>"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_7" name="tratamiento_7" value="<?php echo $Datos_Formato['Tratamiento_7']; ?>"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_8" name="fecha_tratamiento_8" value="<?php echo $Datos_Formato['Fecha_Tratamiento_8']; ?>"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_8" name="tratamiento_8" value="<?php echo $Datos_Formato['Tratamiento_8']; ?>"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_9" name="fecha_tratamiento_9" value="<?php echo $Datos_Formato['Fecha_Tratamiento_9']; ?>"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_9" name="tratamiento_9" value="<?php echo $Datos_Formato['Tratamiento_9']; ?>"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_10" name="fecha_tratamiento_10" value="<?php echo $Datos_Formato['Fecha_Tratamiento_10']; ?>"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_10" name="tratamiento_10" value="<?php echo $Datos_Formato['Tratamiento_10']; ?>"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!--<div class="row">
            <div class="span4">
              <label><strong>Nombre del Alumno</strong></label>
              <input type="text" placeholder="Nombre del Alumno" class="span4">
            </div>
          </div>

          <br />

          <div class="row">
            <div class="span4">
              <label><strong>Nombre del Paciente</strong></label>
              <input type="text" placeholder="Nombre del Paciente" class="span4">
            </div>
          </div>-->

          <!--<br />

          <div class="row">
            <div class="span4">
              <label><strong>Nombre del Titular de la Materia</strong></label>
              <input type="text" placeholder="Nombre del Titular de la Materia" class="span4">
            </div>
          </div>

          <br />-->

          <div class="row">
            <div class="span4">
              <label><strong>Folio de Recibos del Tx</strong></label>
              <input type="text" placeholder="Folio de Recibos del Tx" class="span4" id="folio_recibos_tx" name="folio_recibos_tx" value="<?php echo $Datos_Formato['Folio_Recibos_TX']; ?>"> 
            </div>
          </div>

          <br />

          <div class="row">
            <div class="span4">
              <label><strong>Numeros de Recibos Radiogaficos</strong></label>
              <input type="text" placeholder="Numeros de Recibos Radiogaficos" class="span4" id="numero_recibos_radiograficos" name="numero_recibos_radiograficos" value="<?php echo $Datos_Formato['Numero_Recibos_Radiograficos']; ?>"> 
            </div>
          </div>

          <br />

          <div class="row">
            <div class="span4">
              <label><strong>Tratamiento</strong></label>
              <input type="text" placeholder="Tratamiento" class="span4" id="tratamiento_11" name="tratamiento_11" value="<?php echo $Datos_Formato['Tratamiento_11']; ?>"> 
            </div>
          </div>

          <!--<br />

          <div class="row">
            <div class="span4">
              <label><strong>Firma de Autorización del Paciente</strong></label>
              <input type="text" placeholder="Firma de Autorización del Paciente" class="span4"> 
            </div>
          </div>-->

          </div><!-- fin tab8 -->

        </div><!-- fin tab-content -->
        
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
          <input type="submit" class="btn btn-institucional" name="aprobar" id="guardar" value="Confirmar">
            
          <a href="../clinica/formatohistoriaperiodoncia.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
        </div>
		 <?php endif; ?>
        
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->
      <input type="hidden" id="ventana" value="formato-historia-periodoncia">

<?php include("../footer2.php"); ?>