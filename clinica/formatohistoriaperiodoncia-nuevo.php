<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="formato-historia-periodoncia">
<script src="validacion_formatohistoriaclinicaperiodoncia.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Paciente.php"); ?>
        <?php include("../core-saec/Pareja_Clinica.php"); ?>

        <div class="span9">

        <h2>Formato de Historia de Periodoncia</h2>
		
	<div id="campo-error"></div>

        <div class="well" style="width:970px;">
            
        <form method="post" action="validacion_formatohistoriaclinicaperiodoncia.php" onsubmit="return validacion()">

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

              <div class="row"> 
                <div class="span4">
                  <h3>Datos del Paciente.</h3>
                  <input type="hidden" value="<?php echo $IdParejaClinica; ?>" name="pareja-clinica" id="pareja-clinica">
                </div>
              </div>
              <div class="row"> 
                <div class="span3">
                    <label><strong>Paciente</strong></strong></label>
                    <select class="input-block-level2" id="sltpaciente-periodoncia" name="sltpaciente-periodoncia">
                    <option value="0">------</option> 
                    <?php
                        $Paciente->ListadoSelect();
                    ?>
                  </select> 
                </div>
                <div class="span1"> 
                  <label><strong>Sexo: </strong></label>
                  <?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Sexo']:""); ?>
                </div>
                <div class="span1"> 
                  <label><strong>Edad: </strong></label>
                  <?php echo (isset($Edad) ? $Edad:""); ?> Año(s)
                </div> 
              </div>

              <br />

              <div class="row">
                <div class="span3">
                  <label><strong>Ocupación: </strong></label>
                  <input type="text" name="ocupacion" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Ocupacion']:""); ?>" placeholder="Ocupación">
                </div>
              </div>

              <br />

	      <div class="row">
                <div class="span4"> 
                  <label><strong>Calle: </strong></label>
                  <input type="text" name="calle" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Calle']:""); ?>" placeholder="Calle">
                </div>
	        <div class="span1"> 
                  <label><strong>Número: </strong></label>
                  <input type="text" name="numero" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Numero']:""); ?>" placeholder="Número">
                </div>
	      </div>

	      <br />

	      <div class="row">
                <div class="span4"> 
                  <label><strong>Colonia: </strong></label>
                  <input type="text" name="colonia" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Colonia']:""); ?>" placeholder="Colonia">
                </div>
	        <div class="span2"> 
                  <label><strong>Población: </strong></label>
                  <input type="text" name="poblacion" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Colonia']:""); ?>" placeholder="Población">
                </div>
	      </div>

	      <br />

              <div class="row">
                <div class="span3"> 
                  <label><strong>Teléfono: </strong></label>
	          <input type="text" name="telefono" style="width:100%;" value="<?php echo (isset($Datos_Paciente) ? $Datos_Paciente['Telefono']:""); ?>" placeholder="Teléfono">
                </div> 
              </div>

            </div><!-- fin tab1 -->

            <div class="tab-pane" id="tab2" style="height:710px;overflow:hidden">

               <div class="row"> 
                <div class="span6">
                  <h3>Periodontograma</h3>
                </div>
              </div>

              <p>
                <a class="btn btn-institucional boton opcion-1">Margen Gingival <img src="../img/margen-gingival-icono.png"></a>
                <a class="btn btn-institucional boton opcion-2">Ausencia <img src="../img/ausente-icono.png"></a>
                <a class="btn btn-institucional boton opcion-3">Abceso <img src="../img/abceso-icono.png"></a>
                <a class="btn btn-institucional boton opcion-4">Contacto Abierto <img src="../img/contacto-abierto-icono.png"></a>
                <a class="btn btn-institucional boton opcion-5">Frenillo Alto <img src="../img/frenillo-alto-icono.png"></a>                
                <a class="btn btn-institucional boton opcion-6">Reconstrucción <img src="../img/reconstruccion-icono.png"></a>
                <a class="btn btn-institucional boton opcion-7">Prótesis Fija <img src="../img/protesis-fija-icono.png"></a>
                <a class="btn btn-institucional boton opcion-8">Prótesis Removible <img src="../img/protesis-removible-icono.png"></a>
                <a class="btn btn-institucional boton opcion-9">Obt. Mal Ajustada <img src="../img/obt-mal-ajustada-icono.png"></a>
                <a class="btn btn-institucional boton opcion-10">Faceta de Desgaste <img src="../img/faceta-desgaste-icono.png"></a>
                <a class="btn btn-institucional boton opcion-11">Bolsa Parodontales <img src="../img/bolsas-parodontales-icono.png"></a>
              </p>

              <input type="hidden" id="tipo" value="periodontograma">

              <div id="periodontograma">

                <div id="dientes-superiores-arriba">
					
                  <div class="diente diente-1">
                    <div class="contenedor-lineas contenedor-lineas-1">
                      <div class="linea linea-1" id="linea-1-01"></div>
                      <div class="linea linea-1" id="linea-1-02"></div>
                      <div class="linea linea-1" id="linea-1-03"></div>
                      <div class="linea linea-1" id="linea-1-04"></div>
                      <div class="linea linea-1" id="linea-1-05"></div>
                      <div class="linea linea-1" id="linea-1-06"></div>
                      <div class="linea linea-1" id="linea-1-07"></div>
                      <div class="linea linea-1" id="linea-1-08"></div>
                      <div class="linea linea-1" id="linea-1-09"></div>
                      <div class="linea linea-1" id="linea-1-10"></div>
                      <div class="linea linea-1" id="linea-1-11"></div>
                      <div class="linea linea-1 linea-activa" id="linea-1-12"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-1">
                      <div class="corona corona-izq corona-izq-1"></div>
                      <div class="corona corona-der corona-der-1"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-1" id="arriba-padecimiento-1">
                    <input type="hidden" value="0" name="abajo-padecimiento-1" id="abajo-padecimiento-1">
                    <input type="hidden" value="0" name="izq-padecimiento-1" id="izq-padecimiento-1">
                    <input type="hidden" value="0" name="der-padecimiento-1" id="der-padecimiento-1">
                    <input type="hidden" value="12" name="margen-1" id="margen-1">
                  </div><!-- fin diente-1 -->
					
                  <div class="diente diente-2">
                    <div class="contenedor-lineas contenedor-lineas-2">
                      <div class="linea linea-2" id="linea-2-01"></div>
                      <div class="linea linea-2" id="linea-2-02"></div>
                      <div class="linea linea-2" id="linea-2-03"></div>
                      <div class="linea linea-2" id="linea-2-04"></div>
                      <div class="linea linea-2" id="linea-2-05"></div>
                      <div class="linea linea-2" id="linea-2-06"></div>
                      <div class="linea linea-2" id="linea-2-07"></div>
                      <div class="linea linea-2" id="linea-2-08"></div>
                      <div class="linea linea-2" id="linea-2-09"></div>
                      <div class="linea linea-2" id="linea-2-10"></div>
                      <div class="linea linea-2" id="linea-2-11"></div>
                      <div class="linea linea-2" id="linea-2-12"></div>
                      <div class="linea linea-2 linea-activa" id="linea-2-13"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-2">
                      <div class="corona corona-izq corona-izq-2"></div>
                      <div class="corona corona-der corona-der-2"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-2" id="arriba-padecimiento-2">
                    <input type="hidden" value="0" name="abajo-padecimiento-2" id="abajo-padecimiento-2">
                    <input type="hidden" value="0" name="izq-padecimiento-2" id="izq-padecimiento-2">
                    <input type="hidden" value="0" name="der-padecimiento-2" id="der-padecimiento-2">
                    <input type="hidden" value="13" name="margen-2" id="margen-2">
                  </div><!-- fin diente-2 -->
					
                  <div class="diente diente-3">
                    <div class="contenedor-lineas contenedor-lineas-3">
                      <div class="linea linea-3" id="linea-3-01"></div>
                      <div class="linea linea-3" id="linea-3-02"></div>
                      <div class="linea linea-3" id="linea-3-03"></div>
                      <div class="linea linea-3" id="linea-3-04"></div>
                      <div class="linea linea-3" id="linea-3-05"></div>
                      <div class="linea linea-3" id="linea-3-06"></div>
                      <div class="linea linea-3" id="linea-3-07"></div>
                      <div class="linea linea-3" id="linea-3-08"></div>
                      <div class="linea linea-3" id="linea-3-09"></div>
                      <div class="linea linea-3" id="linea-3-10"></div>
                      <div class="linea linea-3" id="linea-3-11"></div>
                      <div class="linea linea-3" id="linea-3-12"></div>
                      <div class="linea linea-3" id="linea-3-13"></div>
                      <div class="linea linea-3 linea-activa" id="linea-3-14"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-3">
                      <div class="corona corona-izq corona-izq-3"></div>
                      <div class="corona corona-der corona-der-3"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-3" id="arriba-padecimiento-3">
                    <input type="hidden" value="0" name="abajo-padecimiento-3" id="abajo-padecimiento-3">
                    <input type="hidden" value="0" name="izq-padecimiento-3" id="izq-padecimiento-3">
                    <input type="hidden" value="0" name="der-padecimiento-3" id="der-padecimiento-3">
                    <input type="hidden" value="14" name="margen-3" id="margen-3">
                  </div><!-- fin diente-3 -->
					
                  <div class="diente diente-4">
                    <div class="contenedor-lineas contenedor-lineas-4">
                      <div class="linea linea-4" id="linea-4-01"></div>
                      <div class="linea linea-4" id="linea-4-02"></div>
                      <div class="linea linea-4" id="linea-4-03"></div>
                      <div class="linea linea-4" id="linea-4-04"></div>
                      <div class="linea linea-4" id="linea-4-05"></div>
                      <div class="linea linea-4" id="linea-4-06"></div>
                      <div class="linea linea-4" id="linea-4-07"></div>
                      <div class="linea linea-4" id="linea-4-08"></div>
                      <div class="linea linea-4" id="linea-4-09"></div>
                      <div class="linea linea-4" id="linea-4-10"></div>
                      <div class="linea linea-4" id="linea-4-11"></div>
                      <div class="linea linea-4" id="linea-4-12"></div>
                      <div class="linea linea-4" id="linea-4-13"></div>
                      <div class="linea linea-4" id="linea-4-14"></div>
                      <div class="linea linea-4 linea-activa" id="linea-4-15"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-4">
                      <div class="corona corona-izq corona-izq-4"></div>
                      <div class="corona corona-der corona-der-4"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-4" id="arriba-padecimiento-4">
                    <input type="hidden" value="0" name="abajo-padecimiento-4" id="abajo-padecimiento-4">
                    <input type="hidden" value="0" name="izq-padecimiento-4" id="izq-padecimiento-4">
                    <input type="hidden" value="0" name="der-padecimiento-4" id="der-padecimiento-4">
                    <input type="hidden" value="15" name="margen-4" id="margen-4">
                  </div><!-- fin diente-4 -->
					
                  <div class="diente diente-5">
                    <div class="contenedor-lineas contenedor-lineas-5">
                      <div class="linea linea-5" id="linea-5-01"></div>
                      <div class="linea linea-5" id="linea-5-02"></div>
                      <div class="linea linea-5" id="linea-5-03"></div>
                      <div class="linea linea-5" id="linea-5-04"></div>
                      <div class="linea linea-5" id="linea-5-05"></div>
                      <div class="linea linea-5" id="linea-5-06"></div>
                      <div class="linea linea-5" id="linea-5-07"></div>
                      <div class="linea linea-5" id="linea-5-08"></div>
                      <div class="linea linea-5" id="linea-5-09"></div>
                      <div class="linea linea-5" id="linea-5-10"></div>
                      <div class="linea linea-5" id="linea-5-11"></div>
                      <div class="linea linea-5" id="linea-5-12"></div>
                      <div class="linea linea-5" id="linea-5-13"></div>
                      <div class="linea linea-5" id="linea-5-14"></div>
                      <div class="linea linea-5 linea-activa" id="linea-5-15"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-5">
                      <div class="corona corona-izq corona-izq-5"></div>
                      <div class="corona corona-der corona-der-5"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-5" id="arriba-padecimiento-5">
                    <input type="hidden" value="0" name="abajo-padecimiento-5" id="abajo-padecimiento-5">
                    <input type="hidden" value="0" name="izq-padecimiento-5" id="izq-padecimiento-5">
                    <input type="hidden" value="0" name="der-padecimiento-5" id="der-padecimiento-5">
                    <input type="hidden" value="15" name="margen-5" id="margen-5">
                  </div><!-- fin diente-5 -->
					
                  <div class="diente diente-6">
                    <div class="contenedor-lineas contenedor-lineas-6">
                      <div class="linea linea-6" id="linea-6-01"></div>
                      <div class="linea linea-6" id="linea-6-02"></div>
                      <div class="linea linea-6" id="linea-6-03"></div>
                      <div class="linea linea-6" id="linea-6-04"></div>
                      <div class="linea linea-6" id="linea-6-05"></div>
                      <div class="linea linea-6" id="linea-6-06"></div>
                      <div class="linea linea-6" id="linea-6-07"></div>
                      <div class="linea linea-6" id="linea-6-08"></div>
                      <div class="linea linea-6" id="linea-6-09"></div>
                      <div class="linea linea-6" id="linea-6-10"></div>
                      <div class="linea linea-6" id="linea-6-11"></div>
                      <div class="linea linea-6" id="linea-6-12"></div>
                      <div class="linea linea-6" id="linea-6-13"></div>
                      <div class="linea linea-6" id="linea-6-14"></div>
                      <div class="linea linea-6" id="linea-6-15"></div>
                      <div class="linea linea-6" id="linea-6-16"></div>
                      <div class="linea linea-6" id="linea-6-17"></div>
                      <div class="linea linea-6" id="linea-6-18"></div>
                      <div class="linea linea-6 linea-activa" id="linea-6-19"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-6">
                      <div class="corona corona-izq corona-izq-6"></div>
                      <div class="corona corona-der corona-der-6"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-6" id="arriba-padecimiento-6">
                    <input type="hidden" value="0" name="abajo-padecimiento-6" id="abajo-padecimiento-6">
                    <input type="hidden" value="0" name="izq-padecimiento-6" id="izq-padecimiento-6">
                    <input type="hidden" value="0" name="der-padecimiento-6" id="der-padecimiento-6">
                    <input type="hidden" value="19" name="margen-6" id="margen-6">
                  </div><!-- fin diente-6 -->                    
					
                  <div class="diente diente-7">
                    <div class="contenedor-lineas contenedor-lineas-7">
                      <div class="linea linea-7" id="linea-7-01"></div>
                      <div class="linea linea-7" id="linea-7-02"></div>
                      <div class="linea linea-7" id="linea-7-03"></div>
                      <div class="linea linea-7" id="linea-7-04"></div>
                      <div class="linea linea-7" id="linea-7-05"></div>
                      <div class="linea linea-7" id="linea-7-06"></div>
                      <div class="linea linea-7" id="linea-7-07"></div>
                      <div class="linea linea-7" id="linea-7-08"></div>
                      <div class="linea linea-7" id="linea-7-09"></div>
                      <div class="linea linea-7" id="linea-7-10"></div>
                      <div class="linea linea-7" id="linea-7-11"></div>
                      <div class="linea linea-7" id="linea-7-12"></div>
                      <div class="linea linea-7" id="linea-7-13"></div>
                      <div class="linea linea-7" id="linea-7-14"></div>
                      <div class="linea linea-7" id="linea-7-15"></div>
                      <div class="linea linea-7 linea-activa" id="linea-7-16"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-7">
                      <div class="corona corona-izq corona-izq-7"></div>
                      <div class="corona corona-der corona-der-7"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-7" id="arriba-padecimiento-7">
                    <input type="hidden" value="0" name="abajo-padecimiento-7" id="abajo-padecimiento-7">
                    <input type="hidden" value="0" name="izq-padecimiento-7" id="izq-padecimiento-7">
                    <input type="hidden" value="0" name="der-padecimiento-7" id="der-padecimiento-7">
                    <input type="hidden" value="16" name="margen-7" id="margen-7">
                  </div><!-- fin diente-7 -->
					
                  <div class="diente diente-8">
                    <div class="contenedor-lineas contenedor-lineas-8">
                      <div class="linea linea-8" id="linea-8-01"></div>
                      <div class="linea linea-8" id="linea-8-02"></div>
                      <div class="linea linea-8" id="linea-8-03"></div>
                      <div class="linea linea-8" id="linea-8-04"></div>
                      <div class="linea linea-8" id="linea-8-05"></div>
                      <div class="linea linea-8" id="linea-8-06"></div>
                      <div class="linea linea-8" id="linea-8-07"></div>
                      <div class="linea linea-8" id="linea-8-08"></div>
                      <div class="linea linea-8" id="linea-8-09"></div>
                      <div class="linea linea-8" id="linea-8-10"></div>
                      <div class="linea linea-8" id="linea-8-11"></div>
                      <div class="linea linea-8" id="linea-8-12"></div>
                      <div class="linea linea-8" id="linea-8-13"></div>
                      <div class="linea linea-8" id="linea-8-14"></div>
                      <div class="linea linea-8" id="linea-8-15"></div>
                      <div class="linea linea-8" id="linea-8-16"></div>
                      <div class="linea linea-8" id="linea-8-17"></div>
                      <div class="linea linea-8 linea-activa" id="linea-8-18"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-8">
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
					
                  <div class="diente diente-9">
                    <div class="contenedor-lineas contenedor-lineas-9">
                      <div class="linea linea-9" id="linea-9-01"></div>
                      <div class="linea linea-9" id="linea-9-02"></div>
                      <div class="linea linea-9" id="linea-9-03"></div>
                      <div class="linea linea-9" id="linea-9-04"></div>
                      <div class="linea linea-9" id="linea-9-05"></div>
                      <div class="linea linea-9" id="linea-9-06"></div>
                      <div class="linea linea-9" id="linea-9-07"></div>
                      <div class="linea linea-9" id="linea-9-08"></div>
                      <div class="linea linea-9" id="linea-9-09"></div>
                      <div class="linea linea-9" id="linea-9-10"></div>
                      <div class="linea linea-9" id="linea-9-11"></div>
                      <div class="linea linea-9" id="linea-9-12"></div>
                      <div class="linea linea-9" id="linea-9-13"></div>
                      <div class="linea linea-9" id="linea-9-14"></div>
                      <div class="linea linea-9" id="linea-9-15"></div>
                      <div class="linea linea-9" id="linea-9-16"></div>
                      <div class="linea linea-9" id="linea-9-17"></div>
                      <div class="linea linea-9 linea-activa" id="linea-9-18"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-9">
                      <div class="corona corona-izq corona-izq-9"></div>
                      <div class="corona corona-der corona-der-9"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-9" id="arriba-padecimiento-9">
                    <input type="hidden" value="0" name="abajo-padecimiento-9" id="abajo-padecimiento-9">
                    <input type="hidden" value="0" name="izq-padecimiento-9" id="izq-padecimiento-9">
                    <input type="hidden" value="0" name="der-padecimiento-9" id="der-padecimiento-9">
                    <input type="hidden" value="18" name="margen-9" id="margen-9">
                  </div><!-- fin diente-9 -->
					
                  <div class="diente diente-10">
                    <div class="contenedor-lineas contenedor-lineas-10">
                      <div class="linea linea-10" id="linea-10-01"></div>
                      <div class="linea linea-10" id="linea-10-02"></div>
                      <div class="linea linea-10" id="linea-10-03"></div>
                      <div class="linea linea-10" id="linea-10-04"></div>
                      <div class="linea linea-10" id="linea-10-05"></div>
                      <div class="linea linea-10" id="linea-10-06"></div>
                      <div class="linea linea-10" id="linea-10-07"></div>
                      <div class="linea linea-10" id="linea-10-08"></div>
                      <div class="linea linea-10" id="linea-10-09"></div>
                      <div class="linea linea-10" id="linea-10-10"></div>
                      <div class="linea linea-10" id="linea-10-11"></div>
                      <div class="linea linea-10" id="linea-10-12"></div>
                      <div class="linea linea-10" id="linea-10-13"></div>
                      <div class="linea linea-10" id="linea-10-14"></div>
                      <div class="linea linea-10" id="linea-10-15"></div>
                      <div class="linea linea-10 linea-activa" id="linea-10-16"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-10">
                      <div class="corona corona-izq corona-izq-10"></div>
                      <div class="corona corona-der corona-der-10"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-10" id="arriba-padecimiento-10">
                    <input type="hidden" value="0" name="abajo-padecimiento-10" id="abajo-padecimiento-10">
                    <input type="hidden" value="0" name="izq-padecimiento-10" id="izq-padecimiento-10">
                    <input type="hidden" value="0" name="der-padecimiento-10" id="der-padecimiento-10">
                    <input type="hidden" value="16" name="margen-10" id="margen-10">
                  </div><!-- fin diente-10 -->
					
                  <div class="diente diente-11">
                    <div class="contenedor-lineas contenedor-lineas-11">
                      <div class="linea linea-11" id="linea-11-01"></div>
                      <div class="linea linea-11" id="linea-11-02"></div>
                      <div class="linea linea-11" id="linea-11-03"></div>
                      <div class="linea linea-11" id="linea-11-04"></div>
                      <div class="linea linea-11" id="linea-11-05"></div>
                      <div class="linea linea-11" id="linea-11-06"></div>
                      <div class="linea linea-11" id="linea-11-07"></div>
                      <div class="linea linea-11" id="linea-11-08"></div>
                      <div class="linea linea-11" id="linea-11-09"></div>
                      <div class="linea linea-11" id="linea-11-10"></div>
                      <div class="linea linea-11" id="linea-11-11"></div>
                      <div class="linea linea-11" id="linea-11-12"></div>
                      <div class="linea linea-11" id="linea-11-13"></div>
                      <div class="linea linea-11" id="linea-11-14"></div>
                      <div class="linea linea-11" id="linea-11-15"></div>
                      <div class="linea linea-11" id="linea-11-16"></div>
                      <div class="linea linea-11" id="linea-11-17"></div>
                      <div class="linea linea-11" id="linea-11-18"></div>
                      <div class="linea linea-11 linea-activa" id="linea-11-19"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-11">
                      <div class="corona corona-izq corona-izq-11"></div>
                      <div class="corona corona-der corona-der-11"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-11" id="arriba-padecimiento-11">
                    <input type="hidden" value="0" name="abajo-padecimiento-11" id="abajo-padecimiento-11">
                    <input type="hidden" value="0" name="izq-padecimiento-11" id="izq-padecimiento-11">
                    <input type="hidden" value="0" name="der-padecimiento-11" id="der-padecimiento-11">
                    <input type="hidden" value="19" name="margen-11" id="margen-11">
                  </div><!-- fin diente-11 -->
					
                  <div class="diente diente-12">
                    <div class="contenedor-lineas contenedor-lineas-12">
                      <div class="linea linea-12" id="linea-12-01"></div>
                      <div class="linea linea-12" id="linea-12-02"></div>
                      <div class="linea linea-12" id="linea-12-03"></div>
                      <div class="linea linea-12" id="linea-12-04"></div>
                      <div class="linea linea-12" id="linea-12-05"></div>
                      <div class="linea linea-12" id="linea-12-06"></div>
                      <div class="linea linea-12" id="linea-12-07"></div>
                      <div class="linea linea-12" id="linea-12-08"></div>
                      <div class="linea linea-12" id="linea-12-09"></div>
                      <div class="linea linea-12" id="linea-12-10"></div>
                      <div class="linea linea-12" id="linea-12-11"></div>
                      <div class="linea linea-12" id="linea-12-12"></div>
                      <div class="linea linea-12" id="linea-12-13"></div>
                      <div class="linea linea-12" id="linea-12-14"></div>
                      <div class="linea linea-12 linea-activa" id="linea-12-15"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-12">
                      <div class="corona corona-izq corona-izq-12"></div>
                      <div class="corona corona-der corona-der-12"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-12" id="arriba-padecimiento-12">
                    <input type="hidden" value="0" name="abajo-padecimiento-12" id="abajo-padecimiento-12">
                    <input type="hidden" value="0" name="izq-padecimiento-12" id="izq-padecimiento-12">
                    <input type="hidden" value="0" name="der-padecimiento-12" id="der-padecimiento-12">
                    <input type="hidden" value="15" name="margen-12" id="margen-12">
                  </div><!-- fin diente-12 -->
					
                  <div class="diente diente-13">
                    <div class="contenedor-lineas contenedor-lineas-13">
                      <div class="linea linea-13" id="linea-12-01"></div>
                      <div class="linea linea-13" id="linea-13-02"></div>
                      <div class="linea linea-13" id="linea-13-03"></div>
                      <div class="linea linea-13" id="linea-13-04"></div>
                      <div class="linea linea-13" id="linea-13-05"></div>
                      <div class="linea linea-13" id="linea-13-06"></div>
                      <div class="linea linea-13" id="linea-13-07"></div>
                      <div class="linea linea-13" id="linea-13-08"></div>
                      <div class="linea linea-13" id="linea-13-09"></div>
                      <div class="linea linea-13" id="linea-13-10"></div>
                      <div class="linea linea-13" id="linea-13-11"></div>
                      <div class="linea linea-13" id="linea-13-12"></div>
                      <div class="linea linea-13" id="linea-13-13"></div>
                      <div class="linea linea-13" id="linea-13-14"></div>
                      <div class="linea linea-13 linea-activa" id="linea-13-15"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-13">
                      <div class="corona corona-izq corona-izq-13"></div>
                      <div class="corona corona-der corona-der-13"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-13" id="arriba-padecimiento-13">
                    <input type="hidden" value="0" name="abajo-padecimiento-13" id="abajo-padecimiento-13">
                    <input type="hidden" value="0" name="izq-padecimiento-13" id="izq-padecimiento-13">
                    <input type="hidden" value="0" name="der-padecimiento-13" id="der-padecimiento-13">
                    <input type="hidden" value="15" name="margen-13" id="margen-13">
                  </div><!-- fin diente-13 -->
					
                  <div class="diente diente-14">
                    <div class="contenedor-lineas contenedor-lineas-14">
                      <div class="linea linea-14" id="linea-14-01"></div>
                      <div class="linea linea-14" id="linea-14-02"></div>
                      <div class="linea linea-14" id="linea-14-03"></div>
                      <div class="linea linea-14" id="linea-14-04"></div>
                      <div class="linea linea-14" id="linea-14-05"></div>
                      <div class="linea linea-14" id="linea-14-06"></div>
                      <div class="linea linea-14" id="linea-14-07"></div>
                      <div class="linea linea-14" id="linea-14-08"></div>
                      <div class="linea linea-14" id="linea-14-09"></div>
                      <div class="linea linea-14" id="linea-14-10"></div>
                      <div class="linea linea-14" id="linea-14-11"></div>
                      <div class="linea linea-14" id="linea-14-12"></div>
                      <div class="linea linea-14" id="linea-14-13"></div>
                      <div class="linea linea-14 linea-activa" id="linea-14-14"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-14">
                      <div class="corona corona-izq corona-izq-14"></div>
                      <div class="corona corona-der corona-der-14"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-14" id="arriba-padecimiento-14">
                    <input type="hidden" value="0" name="abajo-padecimiento-14" id="abajo-padecimiento-14">
                    <input type="hidden" value="0" name="izq-padecimiento-14" id="izq-padecimiento-14">
                    <input type="hidden" value="0" name="der-padecimiento-14" id="der-padecimiento-14">
                    <input type="hidden" value="14" name="margen-14" id="margen-14">
                  </div><!-- fin diente-14 -->
					
                  <div class="diente diente-15">
                    <div class="contenedor-lineas contenedor-lineas-15">
                      <div class="linea linea-15" id="linea-15-01"></div>
                      <div class="linea linea-15" id="linea-15-02"></div>
                      <div class="linea linea-15" id="linea-15-03"></div>
                      <div class="linea linea-15" id="linea-15-04"></div>
                      <div class="linea linea-15" id="linea-15-05"></div>
                      <div class="linea linea-15" id="linea-15-06"></div>
                      <div class="linea linea-15" id="linea-15-07"></div>
                      <div class="linea linea-15" id="linea-15-08"></div>
                      <div class="linea linea-15" id="linea-15-09"></div>
                      <div class="linea linea-15" id="linea-15-10"></div>
                      <div class="linea linea-15" id="linea-15-11"></div>
                      <div class="linea linea-15" id="linea-15-12"></div>
                      <div class="linea linea-15 linea-activa" id="linea-15-13"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-15">
                      <div class="corona corona-izq corona-izq-15"></div>
                      <div class="corona corona-der corona-der-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-15" id="arriba-padecimiento-15">
                    <input type="hidden" value="0" name="abajo-padecimiento-15" id="abajo-padecimiento-15">
                    <input type="hidden" value="0" name="izq-padecimiento-15" id="izq-padecimiento-15">
                    <input type="hidden" value="0" name="der-padecimiento-15" id="der-padecimiento-15">
                    <input type="hidden" value="13" name="margen-15" id="margen-15">
                  </div><!-- fin diente-15 -->
					
                  <div class="diente diente-16">
                    <div class="contenedor-lineas contenedor-lineas-16">
                      <div class="linea linea-16" id="linea-16-01"></div>
                      <div class="linea linea-16" id="linea-16-02"></div>
                      <div class="linea linea-16" id="linea-16-03"></div>
                      <div class="linea linea-16" id="linea-16-04"></div>
                      <div class="linea linea-16" id="linea-16-05"></div>
                      <div class="linea linea-16" id="linea-16-06"></div>
                      <div class="linea linea-16" id="linea-16-07"></div>
                      <div class="linea linea-16" id="linea-16-08"></div>
                      <div class="linea linea-16" id="linea-16-09"></div>
                      <div class="linea linea-16" id="linea-16-10"></div>
                      <div class="linea linea-16" id="linea-16-11"></div>
                      <div class="linea linea-16 linea-activa" id="linea-16-12"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-16">
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
				  
                <div id="dientes-superiores-abajo">

                  <div class="diente diente-17">
                    <div class="contenedor-lineas contenedor-lineas-17">
                      <div class="linea linea-17" id="linea-17-01"></div>
                      <div class="linea linea-17" id="linea-17-02"></div>
                      <div class="linea linea-17" id="linea-17-03"></div>
                      <div class="linea linea-17" id="linea-17-04"></div>
                      <div class="linea linea-17" id="linea-17-05"></div>
                      <div class="linea linea-17" id="linea-17-06"></div>
                      <div class="linea linea-17" id="linea-17-07"></div>
                      <div class="linea linea-17" id="linea-17-08"></div>
                      <div class="linea linea-17" id="linea-17-09"></div>
                      <div class="linea linea-17" id="linea-17-10"></div>
                      <div class="linea linea-17" id="linea-17-11"></div>
                      <div class="linea linea-17 linea-activa" id="linea-17-12"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-17">
                      <div class="corona corona-izq corona-izq-17"></div>
                      <div class="corona corona-der corona-der-17"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-17" id="arriba-padecimiento-17">
                    <input type="hidden" value="0" name="abajo-padecimiento-17" id="abajo-padecimiento-17">
                    <input type="hidden" value="0" name="izq-padecimiento-17" id="izq-padecimiento-17">
                    <input type="hidden" value="0" name="der-padecimiento-17" id="der-padecimiento-17">
                    <input type="hidden" value="12" name="margen-17" id="margen-17">
                  </div><!-- fin diente-17 -->
					
                  <div class="diente diente-18">
                    <div class="contenedor-lineas contenedor-lineas-18">
                      <div class="linea linea-18" id="linea-18-01"></div>
                      <div class="linea linea-18" id="linea-18-02"></div>
                      <div class="linea linea-18" id="linea-18-03"></div>
                      <div class="linea linea-18" id="linea-18-04"></div>
                      <div class="linea linea-18" id="linea-18-05"></div>
                      <div class="linea linea-18" id="linea-18-06"></div>
                      <div class="linea linea-18" id="linea-18-07"></div>
                      <div class="linea linea-18" id="linea-18-08"></div>
                      <div class="linea linea-18" id="linea-18-09"></div>
                      <div class="linea linea-18" id="linea-18-10"></div>
                      <div class="linea linea-18" id="linea-18-11"></div>
                      <div class="linea linea-18" id="linea-18-12"></div>
                      <div class="linea linea-18 linea-activa" id="linea-18-13"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-18">
                      <div class="corona corona-izq corona-izq-18"></div>
                      <div class="corona corona-der corona-der-18"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-18" id="arriba-padecimiento-18">
                    <input type="hidden" value="0" name="abajo-padecimiento-18" id="abajo-padecimiento-18">
                    <input type="hidden" value="0" name="izq-padecimiento-18" id="izq-padecimiento-18">
                    <input type="hidden" value="0" name="der-padecimiento-18" id="der-padecimiento-18">
                    <input type="hidden" value="13" name="margen-18" id="margen-18">
                  </div><!-- fin diente-18 -->
					
                  <div class="diente diente-19">
                    <div class="contenedor-lineas contenedor-lineas-19">
                      <div class="linea linea-19" id="linea-19-01"></div>
                      <div class="linea linea-19" id="linea-19-02"></div>
                      <div class="linea linea-19" id="linea-19-03"></div>
                      <div class="linea linea-19" id="linea-19-04"></div>
                      <div class="linea linea-19" id="linea-19-05"></div>
                      <div class="linea linea-19" id="linea-19-06"></div>
                      <div class="linea linea-19" id="linea-19-07"></div>
                      <div class="linea linea-19" id="linea-19-08"></div>
                      <div class="linea linea-19" id="linea-19-09"></div>
                      <div class="linea linea-19" id="linea-19-10"></div>
                      <div class="linea linea-19" id="linea-19-11"></div>
                      <div class="linea linea-19" id="linea-19-12"></div>
                      <div class="linea linea-19" id="linea-19-13"></div>
                      <div class="linea linea-19 linea-activa" id="linea-19-14"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-19">
                      <div class="corona corona-izq corona-izq-19"></div>
                      <div class="corona corona-der corona-der-19"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-19" id="arriba-padecimiento-19">
                    <input type="hidden" value="0" name="abajo-padecimiento-19" id="abajo-padecimiento-19">
                    <input type="hidden" value="0" name="izq-padecimiento-19" id="izq-padecimiento-19">
                    <input type="hidden" value="0" name="der-padecimiento-19" id="der-padecimiento-19">
                    <input type="hidden" value="14" name="margen-19" id="margen-19">
                  </div><!-- fin diente-19 -->
					
                  <div class="diente diente-20">
                    <div class="contenedor-lineas contenedor-lineas-20">
                      <div class="linea linea-20" id="linea-20-01"></div>
                      <div class="linea linea-20" id="linea-20-02"></div>
                      <div class="linea linea-20" id="linea-20-03"></div>
                      <div class="linea linea-20" id="linea-20-04"></div>
                      <div class="linea linea-20" id="linea-20-05"></div>
                      <div class="linea linea-20" id="linea-20-06"></div>
                      <div class="linea linea-20" id="linea-20-07"></div>
                      <div class="linea linea-20" id="linea-20-08"></div>
                      <div class="linea linea-20" id="linea-20-09"></div>
                      <div class="linea linea-20" id="linea-20-10"></div>
                      <div class="linea linea-20" id="linea-20-11"></div>
                      <div class="linea linea-20" id="linea-20-12"></div>
                      <div class="linea linea-20" id="linea-20-13"></div>
                      <div class="linea linea-20" id="linea-20-14"></div>
                      <div class="linea linea-20 linea-activa" id="linea-20-15"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-20">
                      <div class="corona corona-izq corona-izq-20"></div>
                      <div class="corona corona-der corona-der-20"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-20" id="arriba-padecimiento-20">
                    <input type="hidden" value="0" name="abajo-padecimiento-20" id="abajo-padecimiento-20">
                    <input type="hidden" value="0" name="izq-padecimiento-20" id="izq-padecimiento-20">
                    <input type="hidden" value="0" name="der-padecimiento-20" id="der-padecimiento-20">
                    <input type="hidden" value="15" name="margen-20" id="margen-20">
                  </div><!-- fin diente-20 -->
					
                  <div class="diente diente-21">
                    <div class="contenedor-lineas contenedor-lineas-21">
                      <div class="linea linea-21" id="linea-21-01"></div>
                      <div class="linea linea-21" id="linea-21-02"></div>
                      <div class="linea linea-21" id="linea-21-03"></div>
                      <div class="linea linea-21" id="linea-21-04"></div>
                      <div class="linea linea-21" id="linea-21-05"></div>
                      <div class="linea linea-21" id="linea-21-06"></div>
                      <div class="linea linea-21" id="linea-21-07"></div>
                      <div class="linea linea-21" id="linea-21-08"></div>
                      <div class="linea linea-21" id="linea-21-09"></div>
                      <div class="linea linea-21" id="linea-21-10"></div>
                      <div class="linea linea-21" id="linea-21-11"></div>
                      <div class="linea linea-21" id="linea-21-12"></div>
                      <div class="linea linea-21" id="linea-21-13"></div>
                      <div class="linea linea-21" id="linea-21-14"></div>
                      <div class="linea linea-21 linea-activa" id="linea-21-15"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-21">
                      <div class="corona corona-izq corona-izq-21"></div>
                      <div class="corona corona-der corona-der-21"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-21" id="arriba-padecimiento-21">
                    <input type="hidden" value="0" name="abajo-padecimiento-21" id="abajo-padecimiento-21">
                    <input type="hidden" value="0" name="izq-padecimiento-21" id="izq-padecimiento-21">
                    <input type="hidden" value="0" name="der-padecimiento-21" id="der-padecimiento-21">
                    <input type="hidden" value="15" name="margen-21" id="margen-21">
                  </div><!-- fin diente-21 -->
					
                  <div class="diente diente-22">
                    <div class="contenedor-lineas contenedor-lineas-22">
                      <div class="linea linea-22" id="linea-22-01"></div>
                      <div class="linea linea-22" id="linea-22-02"></div>
                      <div class="linea linea-22" id="linea-22-03"></div>
                      <div class="linea linea-22" id="linea-22-04"></div>
                      <div class="linea linea-22" id="linea-22-05"></div>
                      <div class="linea linea-22" id="linea-22-06"></div>
                      <div class="linea linea-22" id="linea-22-07"></div>
                      <div class="linea linea-22" id="linea-22-08"></div>
                      <div class="linea linea-22" id="linea-22-09"></div>
                      <div class="linea linea-22" id="linea-22-10"></div>
                      <div class="linea linea-22" id="linea-22-11"></div>
                      <div class="linea linea-22" id="linea-22-12"></div>
                      <div class="linea linea-22" id="linea-22-13"></div>
                      <div class="linea linea-22" id="linea-22-14"></div>
                      <div class="linea linea-22" id="linea-22-15"></div>
                      <div class="linea linea-22" id="linea-22-16"></div>
                      <div class="linea linea-22" id="linea-22-17"></div>
                      <div class="linea linea-22" id="linea-22-18"></div>
                      <div class="linea linea-22 linea-activa" id="linea-22-19"></div>
                    </div>					  
                    <div class="contenedor-corona contenedor-corona-22">
                      <div class="corona corona-izq corona-izq-22"></div>
                      <div class="corona corona-der corona-der-22"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-22" id="arriba-padecimiento-22">
                    <input type="hidden" value="0" name="abajo-padecimiento-22" id="abajo-padecimiento-22">
                    <input type="hidden" value="0" name="izq-padecimiento-22" id="izq-padecimiento-22">
                    <input type="hidden" value="0" name="der-padecimiento-22" id="der-padecimiento-22">
                    <input type="hidden" value="19" name="margen-22" id="margen-22">
                  </div><!-- fin diente-22 -->
					
                  <div class="diente diente-23">
                    <div class="contenedor-lineas contenedor-lineas-23">
                      <div class="linea linea-23" id="linea-23-01"></div>
                      <div class="linea linea-23" id="linea-23-02"></div>
                      <div class="linea linea-23" id="linea-23-03"></div>
                      <div class="linea linea-23" id="linea-23-04"></div>
                      <div class="linea linea-23" id="linea-23-05"></div>
                      <div class="linea linea-23" id="linea-23-06"></div>
                      <div class="linea linea-23" id="linea-23-07"></div>
                      <div class="linea linea-23" id="linea-23-08"></div>
                      <div class="linea linea-23" id="linea-23-09"></div>
                      <div class="linea linea-23" id="linea-23-10"></div>
                      <div class="linea linea-23" id="linea-23-11"></div>
                      <div class="linea linea-23" id="linea-23-12"></div>
                      <div class="linea linea-23" id="linea-23-13"></div>
                      <div class="linea linea-23" id="linea-23-14"></div>
                      <div class="linea linea-23" id="linea-23-15"></div>
                      <div class="linea linea-23 linea-activa" id="linea-23-16"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-23">
                      <div class="corona corona-izq corona-izq-23"></div>
                      <div class="corona corona-der corona-der-23"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-23" id="arriba-padecimiento-23">
                    <input type="hidden" value="0" name="abajo-padecimiento-23" id="abajo-padecimiento-23">
                    <input type="hidden" value="0" name="izq-padecimiento-23" id="izq-padecimiento-23">
                    <input type="hidden" value="0" name="der-padecimiento-23" id="der-padecimiento-23">
                    <input type="hidden" value="16" name="margen-23" id="margen-23">
                  </div><!-- fin diente-23 -->
					
                  <div class="diente diente-24">
                    <div class="contenedor-lineas contenedor-lineas-24">
                      <div class="linea linea-24" id="linea-24-01"></div>
                      <div class="linea linea-24" id="linea-24-02"></div>
                      <div class="linea linea-24" id="linea-24-03"></div>
                      <div class="linea linea-24" id="linea-24-04"></div>
                      <div class="linea linea-24" id="linea-24-05"></div>
                      <div class="linea linea-24" id="linea-24-06"></div>
                      <div class="linea linea-24" id="linea-24-07"></div>
                      <div class="linea linea-24" id="linea-24-08"></div>
                      <div class="linea linea-24" id="linea-24-09"></div>
                      <div class="linea linea-24" id="linea-24-10"></div>
                      <div class="linea linea-24" id="linea-24-11"></div>
                      <div class="linea linea-24" id="linea-24-12"></div>
                      <div class="linea linea-24" id="linea-24-13"></div>
                      <div class="linea linea-24" id="linea-24-14"></div>
                      <div class="linea linea-24" id="linea-24-15"></div>
                      <div class="linea linea-24" id="linea-24-16"></div>
                      <div class="linea linea-24" id="linea-24-17"></div>
                      <div class="linea linea-24 linea-activa" id="linea-24-18"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-24">
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
					
                  <div class="diente diente-25">
                    <div class="contenedor-lineas contenedor-lineas-25">
                      <div class="linea linea-25" id="linea-25-01"></div>
                      <div class="linea linea-25" id="linea-25-02"></div>
                      <div class="linea linea-25" id="linea-25-03"></div>
                      <div class="linea linea-25" id="linea-25-04"></div>
                      <div class="linea linea-25" id="linea-25-05"></div>
                      <div class="linea linea-25" id="linea-25-06"></div>
                      <div class="linea linea-25" id="linea-25-07"></div>
                      <div class="linea linea-25" id="linea-25-08"></div>
                      <div class="linea linea-25" id="linea-25-09"></div>
                      <div class="linea linea-25" id="linea-25-10"></div>
                      <div class="linea linea-25" id="linea-25-11"></div>
                      <div class="linea linea-25" id="linea-25-12"></div>
                      <div class="linea linea-25" id="linea-25-13"></div>
                      <div class="linea linea-25" id="linea-25-14"></div>
                      <div class="linea linea-25" id="linea-25-15"></div>
                      <div class="linea linea-25" id="linea-25-16"></div>
                      <div class="linea linea-25" id="linea-25-17"></div>
                      <div class="linea linea-25 linea-activa" id="linea-25-18"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-25">
                      <div class="corona corona-izq corona-izq-25"></div>
                      <div class="corona corona-der corona-der-25"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-25" id="arriba-padecimiento-25">
                    <input type="hidden" value="0" name="abajo-padecimiento-25" id="abajo-padecimiento-25">
                    <input type="hidden" value="0" name="izq-padecimiento-25" id="izq-padecimiento-25">
                    <input type="hidden" value="0" name="der-padecimiento-25" id="der-padecimiento-25">
                    <input type="hidden" value="18" name="margen-25" id="margen-25">
                  </div><!-- fin diente-25 -->
					
                  <div class="diente diente-26">
                    <div class="contenedor-lineas contenedor-lineas-26">
                      <div class="linea linea-26" id="linea-26-01"></div>
                      <div class="linea linea-26" id="linea-26-02"></div>
                      <div class="linea linea-26" id="linea-26-03"></div>
                      <div class="linea linea-26" id="linea-26-04"></div>
                      <div class="linea linea-26" id="linea-26-05"></div>
                      <div class="linea linea-26" id="linea-26-06"></div>
                      <div class="linea linea-26" id="linea-26-07"></div>
                      <div class="linea linea-26" id="linea-26-08"></div>
                      <div class="linea linea-26" id="linea-26-09"></div>
                      <div class="linea linea-26" id="linea-26-10"></div>
                      <div class="linea linea-26" id="linea-26-11"></div>
                      <div class="linea linea-26" id="linea-26-12"></div>
                      <div class="linea linea-26" id="linea-26-13"></div>
                      <div class="linea linea-26" id="linea-26-14"></div>
                      <div class="linea linea-26" id="linea-26-15"></div>
                      <div class="linea linea-26 linea-activa" id="linea-26-16"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-26">
                      <div class="corona corona-izq corona-izq-26"></div>
                      <div class="corona corona-der corona-der-26"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-26" id="arriba-padecimiento-26">
                    <input type="hidden" value="0" name="abajo-padecimiento-26" id="abajo-padecimiento-26">
                    <input type="hidden" value="0" name="izq-padecimiento-26" id="izq-padecimiento-26">
                    <input type="hidden" value="0" name="der-padecimiento-26" id="der-padecimiento-26">
                    <input type="hidden" value="16" name="margen-26" id="margen-26">
                  </div><!-- fin diente-26 -->
					
                  <div class="diente diente-27">
                    <div class="contenedor-lineas contenedor-lineas-27">
                      <div class="linea linea-27" id="linea-27-01"></div>
                      <div class="linea linea-27" id="linea-27-02"></div>
                      <div class="linea linea-27" id="linea-27-03"></div>
                      <div class="linea linea-27" id="linea-27-0"></div>
                      <div class="linea linea-27" id="linea-27-05"></div>
                      <div class="linea linea-27" id="linea-27-06"></div>
                      <div class="linea linea-27" id="linea-27-07"></div>
                      <div class="linea linea-27" id="linea-27-08"></div>
                      <div class="linea linea-27" id="linea-27-09"></div>
                      <div class="linea linea-27" id="linea-27-10"></div>
                      <div class="linea linea-27" id="linea-27-11"></div>
                      <div class="linea linea-27" id="linea-27-12"></div>
                      <div class="linea linea-27" id="linea-27-13"></div>
                      <div class="linea linea-27" id="linea-27-14"></div>
                      <div class="linea linea-27" id="linea-27-15"></div>
                      <div class="linea linea-27" id="linea-27-16"></div>
                      <div class="linea linea-27" id="linea-27-17"></div>
                      <div class="linea linea-27" id="linea-27-18"></div>
                      <div class="linea linea-27 linea-activa" id="linea-27-19"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-27">
                      <div class="corona corona-izq corona-izq-27"></div>
                      <div class="corona corona-der corona-der-27"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-27" id="arriba-padecimiento-27">
                    <input type="hidden" value="0" name="abajo-padecimiento-27" id="abajo-padecimiento-27">
                    <input type="hidden" value="0" name="izq-padecimiento-27" id="izq-padecimiento-27">
                    <input type="hidden" value="0" name="der-padecimiento-27" id="der-padecimiento-27">
                    <input type="hidden" value="19" name="margen-27" id="margen-27">
                  </div><!-- fin diente-27 -->
					
                  <div class="diente diente-28">
                    <div class="contenedor-lineas contenedor-lineas-28">
                      <div class="linea linea-28" id="linea-28-01"></div>
                      <div class="linea linea-28" id="linea-28-02"></div>
                      <div class="linea linea-28" id="linea-28-03"></div>
                      <div class="linea linea-28" id="linea-28-04"></div>
                      <div class="linea linea-28" id="linea-28-05"></div>
                      <div class="linea linea-28" id="linea-28-06"></div>
                      <div class="linea linea-28" id="linea-28-07"></div>
                      <div class="linea linea-28" id="linea-28-08"></div>
                      <div class="linea linea-28" id="linea-28-09"></div>
                      <div class="linea linea-28" id="linea-28-10"></div>
                      <div class="linea linea-28" id="linea-28-11"></div>
                      <div class="linea linea-28" id="linea-28-12"></div>
                      <div class="linea linea-28" id="linea-28-13"></div>
                      <div class="linea linea-28" id="linea-28-14"></div>
                      <div class="linea linea-28 linea-activa" id="linea-28-15"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-28">
                      <div class="corona corona-izq corona-izq-28"></div>
                      <div class="corona corona-der corona-der-28"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-28" id="arriba-padecimiento-28">
                    <input type="hidden" value="0" name="abajo-padecimiento-28" id="abajo-padecimiento-28">
                    <input type="hidden" value="0" name="izq-padecimiento-28" id="izq-padecimiento-28">
                    <input type="hidden" value="0" name="der-padecimiento-28" id="der-padecimiento-28">
                    <input type="hidden" value="15" name="margen-28" id="margen-28">
                  </div><!-- fin diente-28 -->
					
                  <div class="diente diente-29">
                    <div class="contenedor-lineas contenedor-lineas-29">
                      <div class="linea linea-29" id="linea-29-01"></div>
                      <div class="linea linea-29" id="linea-29-02"></div>
                      <div class="linea linea-29" id="linea-29-03"></div>
                      <div class="linea linea-29" id="linea-29-04"></div>
                      <div class="linea linea-29" id="linea-29-05"></div>
                      <div class="linea linea-29" id="linea-29-06"></div>
                      <div class="linea linea-29" id="linea-29-07"></div>
                      <div class="linea linea-29" id="linea-29-08"></div>
                      <div class="linea linea-29" id="linea-29-09"></div>
                      <div class="linea linea-29" id="linea-29-10"></div>
                      <div class="linea linea-29" id="linea-29-11"></div>
                      <div class="linea linea-29" id="linea-29-12"></div>
                      <div class="linea linea-29" id="linea-29-13"></div>
                      <div class="linea linea-29" id="linea-29-14"></div>
                      <div class="linea linea-29 linea-activa" id="linea-29-15"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-29">
                      <div class="corona corona-izq corona-izq-29"></div>
                      <div class="corona corona-der corona-der-29"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-29" id="arriba-padecimiento-29">
                    <input type="hidden" value="0" name="abajo-padecimiento-29" id="abajo-padecimiento-29">
                    <input type="hidden" value="0" name="izq-padecimiento-29" id="izq-padecimiento-29">
                    <input type="hidden" value="0" name="der-padecimiento-29" id="der-padecimiento-29">
                    <input type="hidden" value="15" name="margen-29" id="margen-29">
                  </div><!-- fin diente-29 -->
					
                  <div class="diente diente-30">
                    <div class="contenedor-lineas contenedor-lineas-30">
                      <div class="linea linea-30" id="linea-30-01"></div>
                      <div class="linea linea-30" id="linea-30-02"></div>
                      <div class="linea linea-30" id="linea-30-03"></div>
                      <div class="linea linea-30" id="linea-30-04"></div>
                      <div class="linea linea-30" id="linea-30-05"></div>
                      <div class="linea linea-30" id="linea-30-06"></div>
                      <div class="linea linea-30" id="linea-30-07"></div>
                      <div class="linea linea-30" id="linea-30-08"></div>
                      <div class="linea linea-30" id="linea-30-09"></div>
                      <div class="linea linea-30" id="linea-30-10"></div>
                      <div class="linea linea-30" id="linea-30-11"></div>
                      <div class="linea linea-30" id="linea-30-12"></div>
                      <div class="linea linea-30" id="linea-30-13"></div>
                      <div class="linea linea-30 linea-activa" id="linea-30-14"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-30">
                      <div class="corona corona-izq corona-izq-30"></div>
                      <div class="corona corona-der corona-der-30"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-30" id="arriba-padecimiento-30">
                    <input type="hidden" value="0" name="abajo-padecimiento-30" id="abajo-padecimiento-30">
                    <input type="hidden" value="0" name="izq-padecimiento-30" id="izq-padecimiento-30">
                    <input type="hidden" value="0" name="der-padecimiento-30" id="der-padecimiento-30">
                    <input type="hidden" value="14" name="margen-30" id="margen-30">
                  </div><!-- fin diente-30 -->
					
                  <div class="diente diente-31">
                    <div class="contenedor-lineas contenedor-lineas-31">
                      <div class="linea linea-31" id="linea-31-01"></div>
                      <div class="linea linea-31" id="linea-31-02"></div>
                      <div class="linea linea-31" id="linea-31-03"></div>
                      <div class="linea linea-31" id="linea-31-04"></div>
                      <div class="linea linea-31" id="linea-31-05"></div>
                      <div class="linea linea-31" id="linea-31-06"></div>
                      <div class="linea linea-31" id="linea-31-07"></div>
                      <div class="linea linea-31" id="linea-31-08"></div>
                      <div class="linea linea-31" id="linea-31-09"></div>
                      <div class="linea linea-31" id="linea-31-10"></div>
                      <div class="linea linea-31" id="linea-31-11"></div>
                      <div class="linea linea-31" id="linea-31-12"></div>
                      <div class="linea linea-31 linea-activa" id="linea-31-13"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-31">
                      <div class="corona corona-izq corona-izq-31"></div>
                      <div class="corona corona-der corona-der-31"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-31" id="arriba-padecimiento-31">
                    <input type="hidden" value="0" name="abajo-padecimiento-31" id="abajo-padecimiento-31">
                    <input type="hidden" value="0" name="izq-padecimiento-31" id="izq-padecimiento-31">
                    <input type="hidden" value="0" name="der-padecimiento-31" id="der-padecimiento-31">
                    <input type="hidden" value="13" name="margen-31" id="margen-31">
                  </div><!-- fin diente-31 -->
					
                  <div class="diente diente-32">
                    <div class="contenedor-lineas contenedor-lineas-32">
                      <div class="linea linea-32" id="linea-32-01"></div>
                      <div class="linea linea-32" id="linea-32-02"></div>
                      <div class="linea linea-32" id="linea-32-03"></div>
                      <div class="linea linea-32" id="linea-32-04"></div>
                      <div class="linea linea-32" id="linea-32-05"></div>
                      <div class="linea linea-32" id="linea-32-06"></div>
                      <div class="linea linea-32" id="linea-32-07"></div>
                      <div class="linea linea-32" id="linea-32-08"></div>
                      <div class="linea linea-32" id="linea-32-09"></div>
                      <div class="linea linea-32" id="linea-32-10"></div>
                      <div class="linea linea-32" id="linea-32-11"></div>
                      <div class="linea linea-32 linea-activa" id="linea-32-12"></div>
                    </div>
                    <div class="contenedor-corona contenedor-corona-32">
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
					
                  <div class="diente diente-33">
                    <div class="contenedor-corona contenedor-corona-33">
                      <div class="corona corona-izq corona-izq-33"></div>
                      <div class="corona corona-der corona-der-33"></div>
                    </div>
                    
                    <div class="contenedor-lineas contenedor-lineas-33">
                      <div class="linea linea-33 linea-activa" id="linea-33-01"></div>
                      <div class="linea linea-33" id="linea-33-02"></div>
                      <div class="linea linea-33" id="linea-33-03"></div>
                      <div class="linea linea-33" id="linea-33-04"></div>
                      <div class="linea linea-33" id="linea-33-05"></div>
                      <div class="linea linea-33" id="linea-33-06"></div>
                      <div class="linea linea-33" id="linea-33-07"></div>
                      <div class="linea linea-33" id="linea-33-08"></div>
                      <div class="linea linea-33" id="linea-33-09"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-33" id="arriba-padecimiento-33">
                    <input type="hidden" value="0" name="abajo-padecimiento-33" id="abajo-padecimiento-33">
                    <input type="hidden" value="0" name="izq-padecimiento-33" id="izq-padecimiento-33">
                    <input type="hidden" value="0" name="der-padecimiento-33" id="der-padecimiento-33">
                    <input type="hidden" value="01" name="margen-33" id="margen-33">
                  </div><!-- fin diente-33 -->
                  
                  <div class="diente diente-34">
                    <div class="contenedor-corona contenedor-corona-34">
                      <div class="corona corona-izq corona-izq-34"></div>
                      <div class="corona corona-der corona-der-34"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-34">
                      <div class="linea linea-34 linea-activa" id="linea-34-01"></div>
                      <div class="linea linea-34" id="linea-34-02"></div>
                      <div class="linea linea-34" id="linea-34-03"></div>
                      <div class="linea linea-34" id="linea-34-04"></div>
                      <div class="linea linea-34" id="linea-34-05"></div>
                      <div class="linea linea-34" id="linea-34-06"></div>
                      <div class="linea linea-34" id="linea-34-07"></div>
                      <div class="linea linea-34" id="linea-34-08"></div>
                      <div class="linea linea-34" id="linea-34-09"></div>
                      <div class="linea linea-34" id="linea-34-10"></div>
                      <div class="linea linea-34" id="linea-34-11"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-34" id="arriba-padecimiento-34">
                    <input type="hidden" value="0" name="abajo-padecimiento-34" id="abajo-padecimiento-34">
                    <input type="hidden" value="0" name="izq-padecimiento-34" id="izq-padecimiento-34">
                    <input type="hidden" value="0" name="der-padecimiento-34" id="der-padecimiento-34">
                    <input type="hidden" value="01" name="margen-34" id="margen-34">
                  </div><!-- fin diente-34 -->
					
                  <div class="diente diente-35">
                    <div class="contenedor-corona contenedor-corona-35">
                      <div class="corona corona-izq corona-izq-35"></div>
                      <div class="corona corona-der corona-der-35"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-35">
                      <div class="linea linea-35 linea-activa" id="linea-35-01"></div>
                      <div class="linea linea-35" id="linea-35-02"></div>
                      <div class="linea linea-35" id="linea-35-03"></div>
                      <div class="linea linea-35" id="linea-35-04"></div>
                      <div class="linea linea-35" id="linea-35-05"></div>
                      <div class="linea linea-35" id="linea-35-06"></div>
                      <div class="linea linea-35" id="linea-35-07"></div>
                      <div class="linea linea-35" id="linea-35-08"></div>
                      <div class="linea linea-35" id="linea-35-09"></div>
                      <div class="linea linea-35" id="linea-35-10"></div>
                      <div class="linea linea-35" id="linea-35-11"></div>
                      <div class="linea linea-35" id="linea-35-01"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-35" id="arriba-padecimiento-35">
                    <input type="hidden" value="0" name="abajo-padecimiento-35" id="abajo-padecimiento-35">
                    <input type="hidden" value="0" name="izq-padecimiento-35" id="izq-padecimiento-35">
                    <input type="hidden" value="0" name="der-padecimiento-35" id="der-padecimiento-35">
                    <input type="hidden" value="01" name="margen-35" id="margen-35">
                  </div><!-- fin diente-35 -->
					
                  <div class="diente diente-36">
                    <div class="contenedor-corona contenedor-corona-36">
                      <div class="corona corona-izq corona-izq-36"></div>
                      <div class="corona corona-der corona-der-36"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-36">
                      <div class="linea linea-36 linea-activa" id="linea-36-01"></div>
                      <div class="linea linea-36" id="linea-36-02"></div>
                      <div class="linea linea-36" id="linea-36-03"></div>
                      <div class="linea linea-36" id="linea-36-04"></div>
                      <div class="linea linea-36" id="linea-36-05"></div>
                      <div class="linea linea-36" id="linea-36-06"></div>
                      <div class="linea linea-36" id="linea-36-07"></div>
                      <div class="linea linea-36" id="linea-36-08"></div>
                      <div class="linea linea-36" id="linea-36-09"></div>
                      <div class="linea linea-36" id="linea-36-10"></div>
                      <div class="linea linea-36" id="linea-36-11"></div>
                      <div class="linea linea-36" id="linea-36-12"></div>
                      <div class="linea linea-36" id="linea-36-13"></div>
                      <div class="linea linea-36" id="linea-36-14"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-36" id="arriba-padecimiento-36">
                    <input type="hidden" value="0" name="abajo-padecimiento-36" id="abajo-padecimiento-36">
                    <input type="hidden" value="0" name="izq-padecimiento-36" id="izq-padecimiento-36">
                    <input type="hidden" value="0" name="der-padecimiento-36" id="der-padecimiento-36">
                    <input type="hidden" value="01" name="margen-36" id="margen-36">
                  </div><!-- fin diente-36 -->
					
                  <div class="diente diente-37">
                    <div class="contenedor-corona contenedor-corona-37">
                      <div class="corona corona-izq corona-izq-37"></div>
                      <div class="corona corona-der corona-der-37"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-37">
                      <div class="linea linea-37 linea-activa" id="linea-37-01"></div>
                      <div class="linea linea-37" id="linea-37-02"></div>
                      <div class="linea linea-37" id="linea-37-03"></div>
                      <div class="linea linea-37" id="linea-37-04"></div>
                      <div class="linea linea-37" id="linea-37-05"></div>
                      <div class="linea linea-37" id="linea-37-06"></div>
                      <div class="linea linea-37" id="linea-37-07"></div>
                      <div class="linea linea-37" id="linea-37-08"></div>
                      <div class="linea linea-37" id="linea-37-09"></div>
                      <div class="linea linea-37" id="linea-37-10"></div>
                      <div class="linea linea-37" id="linea-37-11"></div>
                      <div class="linea linea-37" id="linea-37-12"></div>
                      <div class="linea linea-37" id="linea-37-13"></div>
                      <div class="linea linea-37" id="linea-37-14"></div>
                      <div class="linea linea-37" id="linea-37-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-37" id="arriba-padecimiento-37">
                    <input type="hidden" value="0" name="abajo-padecimiento-37" id="abajo-padecimiento-37">
                    <input type="hidden" value="0" name="izq-padecimiento-37" id="izq-padecimiento-37">
                    <input type="hidden" value="0" name="der-padecimiento-37" id="der-padecimiento-37">
                    <input type="hidden" value="01" name="margen-37" id="margen-37">
                  </div><!-- fin diente-37 -->                  
					
                  <div class="diente diente-38">
                    <div class="contenedor-corona contenedor-corona-38">
                      <div class="corona corona-izq corona-izq-38"></div>
                      <div class="corona corona-der corona-der-38"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-38">
                      <div class="linea linea-38 linea-activa" id="linea-38-01"></div>
                      <div class="linea linea-38" id="linea-38-02"></div>
                      <div class="linea linea-38" id="linea-38-03"></div>
                      <div class="linea linea-38" id="linea-38-04"></div>
                      <div class="linea linea-38" id="linea-38-05"></div>
                      <div class="linea linea-38" id="linea-38-06"></div>
                      <div class="linea linea-38" id="linea-38-07"></div>
                      <div class="linea linea-38" id="linea-38-08"></div>
                      <div class="linea linea-38" id="linea-38-09"></div>
                      <div class="linea linea-38" id="linea-38-10"></div>
                      <div class="linea linea-38" id="linea-38-11"></div>
                      <div class="linea linea-38" id="linea-38-12"></div>
                      <div class="linea linea-38" id="linea-38-13"></div>
                      <div class="linea linea-38" id="linea-38-14"></div>
                      <div class="linea linea-38" id="linea-38-15"></div>
                      <div class="linea linea-38" id="linea-38-16"></div>
                      <div class="linea linea-38" id="linea-38-18"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-38" id="arriba-padecimiento-38">
                    <input type="hidden" value="0" name="abajo-padecimiento-38" id="abajo-padecimiento-38">
                    <input type="hidden" value="0" name="izq-padecimiento-38" id="izq-padecimiento-38">
                    <input type="hidden" value="0" name="der-padecimiento-38" id="der-padecimiento-38">
                    <input type="hidden" value="01" name="margen-38" id="margen-38">
                  </div><!-- fin diente-38 -->
					
                  <div class="diente diente-39">
                    <div class="contenedor-corona contenedor-corona-39">
                      <div class="corona corona-izq corona-izq-39"></div>
                      <div class="corona corona-der corona-der-39"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-39">
                      <div class="linea linea-39 linea-activa" id="linea-39-01"></div>
                      <div class="linea linea-39" id="linea-39-02"></div>
                      <div class="linea linea-39" id="linea-39-03"></div>
                      <div class="linea linea-39" id="linea-39-04"></div>
                      <div class="linea linea-39" id="linea-39-05"></div>
                      <div class="linea linea-39" id="linea-39-06"></div>
                      <div class="linea linea-39" id="linea-39-07"></div>
                      <div class="linea linea-39" id="linea-39-08"></div>
                      <div class="linea linea-39" id="linea-39-09"></div>
                      <div class="linea linea-39" id="linea-39-10"></div>
                      <div class="linea linea-39" id="linea-39-11"></div>
                      <div class="linea linea-39" id="linea-39-12"></div>
                      <div class="linea linea-39" id="linea-39-13"></div>
                      <div class="linea linea-39" id="linea-39-14"></div>
                      <div class="linea linea-39" id="linea-39-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-39" id="arriba-padecimiento-39">
                    <input type="hidden" value="0" name="abajo-padecimiento-39" id="abajo-padecimiento-39">
                    <input type="hidden" value="0" name="izq-padecimiento-39" id="izq-padecimiento-39">
                    <input type="hidden" value="0" name="der-padecimiento-39" id="der-padecimiento-39">
                    <input type="hidden" value="01" name="margen-39" id="margen-39">
                  </div><!-- fin diente-39 -->
					
                  <div class="diente diente-40">
                    <div class="contenedor-corona contenedor-corona-40">
                      <div class="corona corona-izq corona-izq-40"></div>
                      <div class="corona corona-der corona-der-40"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-40">
                      <div class="linea linea-40 linea-activa" id="linea-40-01"></div>
                      <div class="linea linea-40" id="linea-40-02"></div>
                      <div class="linea linea-40" id="linea-40-03"></div>
                      <div class="linea linea-40" id="linea-40-04"></div>
                      <div class="linea linea-40" id="linea-40-05"></div>
                      <div class="linea linea-40" id="linea-40-06"></div>
                      <div class="linea linea-40" id="linea-40-07"></div>
                      <div class="linea linea-40" id="linea-40-08"></div>
                      <div class="linea linea-40" id="linea-40-09"></div>
                      <div class="linea linea-40" id="linea-40-10"></div>
                      <div class="linea linea-40" id="linea-40-11"></div>
                      <div class="linea linea-40" id="linea-40-12"></div>
                      <div class="linea linea-40" id="linea-40-13"></div>
                      <div class="linea linea-40" id="linea-40-14"></div>
                      <div class="linea linea-40" id="linea-40-15"></div>
                    </div>                      
                      
                    <input type="hidden" value="0" name="arriba-padecimiento-40" id="arriba-padecimiento-40">
                    <input type="hidden" value="0" name="abajo-padecimiento-40" id="abajo-padecimiento-40">
                    <input type="hidden" value="0" name="izq-padecimiento-40" id="izq-padecimiento-40">
                    <input type="hidden" value="0" name="der-padecimiento-40" id="der-padecimiento-40">
                    <input type="hidden" value="01" name="margen-40" id="margen-40">
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
					
                  <div class="diente diente-41">
                    <div class="contenedor-corona contenedor-corona-41">
                      <div class="corona corona-izq corona-izq-41"></div>
                      <div class="corona corona-der corona-der-41"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-41">
                      <div class="linea linea-41 linea-activa" id="linea-41-01"></div>
                      <div class="linea linea-41" id="linea-41-02"></div>
                      <div class="linea linea-41" id="linea-41-03"></div>
                      <div class="linea linea-41" id="linea-41-04"></div>
                      <div class="linea linea-41" id="linea-41-05"></div>
                      <div class="linea linea-41" id="linea-41-06"></div>
                      <div class="linea linea-41" id="linea-41-07"></div>
                      <div class="linea linea-41" id="linea-41-08"></div>
                      <div class="linea linea-41" id="linea-41-09"></div>
                      <div class="linea linea-41" id="linea-41-10"></div>
                      <div class="linea linea-41" id="linea-41-11"></div>
                      <div class="linea linea-41" id="linea-41-12"></div>
                      <div class="linea linea-41" id="linea-41-13"></div>
                      <div class="linea linea-41" id="linea-41-14"></div>
                      <div class="linea linea-41" id="linea-41-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-41" id="arriba-padecimiento-41">
                    <input type="hidden" value="0" name="abajo-padecimiento-41" id="abajo-padecimiento-41">
                    <input type="hidden" value="0" name="izq-padecimiento-41" id="izq-padecimiento-41">
                    <input type="hidden" value="0" name="der-padecimiento-41" id="der-padecimiento-41">
                    <input type="hidden" value="01" name="margen-41" id="margen-41">
                  </div><!-- fin diente-41 -->
					
                  <div class="diente diente-42">
                    <div class="contenedor-corona contenedor-corona-42">
                      <div class="corona corona-izq corona-izq-42"></div>
                      <div class="corona corona-der corona-der-42"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-42">
                      <div class="linea linea-42 linea-activa" id="linea-42-01"></div>
                      <div class="linea linea-42" id="linea-42-02"></div>
                      <div class="linea linea-42" id="linea-42-03"></div>
                      <div class="linea linea-42" id="linea-42-04"></div>
                      <div class="linea linea-42" id="linea-42-05"></div>
                      <div class="linea linea-42" id="linea-42-06"></div>
                      <div class="linea linea-42" id="linea-42-07"></div>
                      <div class="linea linea-42" id="linea-42-08"></div>
                      <div class="linea linea-42" id="linea-42-09"></div>
                      <div class="linea linea-42" id="linea-42-10"></div>
                      <div class="linea linea-42" id="linea-42-11"></div>
                      <div class="linea linea-42" id="linea-42-12"></div>
                      <div class="linea linea-42" id="linea-42-13"></div>
                      <div class="linea linea-42" id="linea-42-14"></div>
                      <div class="linea linea-42" id="linea-42-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-42" id="arriba-padecimiento-42">
                    <input type="hidden" value="0" name="abajo-padecimiento-42" id="abajo-padecimiento-42">
                    <input type="hidden" value="0" name="izq-padecimiento-42" id="izq-padecimiento-42">
                    <input type="hidden" value="0" name="der-padecimiento-42" id="der-padecimiento-42">
                    <input type="hidden" value="01" name="margen-42" id="margen-42">
                  </div><!-- fin diente-42 -->
					
                  <div class="diente diente-43">
                    <div class="contenedor-corona contenedor-corona-43">
                      <div class="corona corona-izq corona-izq-43"></div>
                      <div class="corona corona-der corona-der-43"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-43">
                      <div class="linea linea-43 linea-activa" id="linea-43-01"></div>
                      <div class="linea linea-43" id="linea-43-02"></div>
                      <div class="linea linea-43" id="linea-43-03"></div>
                      <div class="linea linea-43" id="linea-43-04"></div>
                      <div class="linea linea-43" id="linea-43-05"></div>
                      <div class="linea linea-43" id="linea-43-06"></div>
                      <div class="linea linea-43" id="linea-43-07"></div>
                      <div class="linea linea-43" id="linea-43-08"></div>
                      <div class="linea linea-43" id="linea-43-09"></div>
                      <div class="linea linea-43" id="linea-43-10"></div>
                      <div class="linea linea-43" id="linea-43-11"></div>
                      <div class="linea linea-43" id="linea-43-12"></div>
                      <div class="linea linea-43" id="linea-43-13"></div>
                      <div class="linea linea-43" id="linea-43-14"></div>
                      <div class="linea linea-43" id="linea-43-15"></div>
                      <div class="linea linea-43" id="linea-43-16"></div>
                      <div class="linea linea-43" id="linea-43-17"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-43" id="arriba-padecimiento-43">
                    <input type="hidden" value="0" name="abajo-padecimiento-43" id="abajo-padecimiento-43">
                    <input type="hidden" value="0" name="izq-padecimiento-43" id="izq-padecimiento-43">
                    <input type="hidden" value="0" name="der-padecimiento-43" id="der-padecimiento-43">
                    <input type="hidden" value="01" name="margen-43" id="margen-43">
                  </div><!-- fin diente-43 -->
					
                  <div class="diente diente-44">
                    <div class="contenedor-corona contenedor-corona-44">
                      <div class="corona corona-izq corona-izq-44"></div>
                      <div class="corona corona-der corona-der-44"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-44">
                      <div class="linea linea-44 linea-activa" id="linea-44-01"></div>
                      <div class="linea linea-44" id="linea-44-02"></div>
                      <div class="linea linea-44" id="linea-44-03"></div>
                      <div class="linea linea-44" id="linea-44-04"></div>
                      <div class="linea linea-44" id="linea-44-05"></div>
                      <div class="linea linea-44" id="linea-44-06"></div>
                      <div class="linea linea-44" id="linea-44-07"></div>
                      <div class="linea linea-44" id="linea-44-08"></div>
                      <div class="linea linea-44" id="linea-44-09"></div>
                      <div class="linea linea-44" id="linea-44-11"></div>
                      <div class="linea linea-44" id="linea-44-12"></div>
                      <div class="linea linea-44" id="linea-44-13"></div>
                      <div class="linea linea-44" id="linea-44-14"></div>
                      <div class="linea linea-44" id="linea-44-15"></div>
                      <div class="linea linea-44" id="linea-44-16"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-44" id="arriba-padecimiento-44">
                    <input type="hidden" value="0" name="abajo-padecimiento-44" id="abajo-padecimiento-44">
                    <input type="hidden" value="0" name="izq-padecimiento-44" id="izq-padecimiento-44">
                    <input type="hidden" value="0" name="der-padecimiento-44" id="der-padecimiento-44">
                    <input type="hidden" value="01" name="margen-44" id="margen-44">
                  </div><!-- fin diente-44 -->
					
                  <div class="diente diente-45">
                    <div class="contenedor-corona contenedor-corona-45">
                      <div class="corona corona-izq corona-izq-45"></div>
                      <div class="corona corona-der corona-der-45"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-45">
                      <div class="linea linea-45 linea-activa" id="linea-45-01"></div>
                      <div class="linea linea-45" id="linea-45-02"></div>
                      <div class="linea linea-45" id="linea-45-03"></div>
                      <div class="linea linea-45" id="linea-45-04"></div>
                      <div class="linea linea-45" id="linea-45-05"></div>
                      <div class="linea linea-45" id="linea-45-06"></div>
                      <div class="linea linea-45" id="linea-45-07"></div>
                      <div class="linea linea-45" id="linea-45-08"></div>
                      <div class="linea linea-45" id="linea-45-09"></div>
                      <div class="linea linea-45" id="linea-45-10"></div>
                      <div class="linea linea-45" id="linea-45-11"></div>
                      <div class="linea linea-45" id="linea-45-12"></div>
                      <div class="linea linea-45" id="linea-45-13"></div>
                      <div class="linea linea-45" id="linea-45-14"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-45" id="arriba-padecimiento-45">
                    <input type="hidden" value="0" name="abajo-padecimiento-45" id="abajo-padecimiento-45">
                    <input type="hidden" value="0" name="izq-padecimiento-45" id="izq-padecimiento-45">
                    <input type="hidden" value="0" name="der-padecimiento-45" id="der-padecimiento-45">
                    <input type="hidden" value="01" name="margen-45" id="margen-45">
                  </div><!-- fin diente-45 -->
					
                  <div class="diente diente-46">
                    <div class="contenedor-corona contenedor-corona-46">
                      <div class="corona corona-izq corona-izq-46"></div>
                      <div class="corona corona-der corona-der-46"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-46">
                      <div class="linea linea-46 linea-activa" id="linea-46-01"></div>
                      <div class="linea linea-46" id="linea-46-02"></div>
                      <div class="linea linea-46" id="linea-46-03"></div>
                      <div class="linea linea-46" id="linea-46-04"></div>
                      <div class="linea linea-46" id="linea-46-05"></div>
                      <div class="linea linea-46" id="linea-46-06"></div>
                      <div class="linea linea-46" id="linea-46-07"></div>
                      <div class="linea linea-46" id="linea-46-08"></div>
                      <div class="linea linea-46" id="linea-46-09"></div>
                      <div class="linea linea-46" id="linea-46-10"></div>
                      <div class="linea linea-46" id="linea-46-11"></div>
                      <div class="linea linea-46" id="linea-46-12"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-46" id="arriba-padecimiento-46">
                    <input type="hidden" value="0" name="abajo-padecimiento-46" id="abajo-padecimiento-46">
                    <input type="hidden" value="0" name="izq-padecimiento-46" id="izq-padecimiento-46">
                    <input type="hidden" value="0" name="der-padecimiento-46" id="der-padecimiento-46">
                    <input type="hidden" value="01" name="margen-46" id="margen-46">
                  </div><!-- fin diente-46 -->
					
                  <div class="diente diente-47">
                    <div class="contenedor-corona contenedor-corona-47">
                      <div class="corona corona-izq corona-izq-47"></div>
                      <div class="corona corona-der corona-der-47"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-47">
                      <div class="linea linea-47 linea-activa" id="linea-47-01"></div>
                      <div class="linea linea-47" id="linea-47-02"></div>
                      <div class="linea linea-47" id="linea-47-03"></div>
                      <div class="linea linea-47" id="linea-47-04"></div>
                      <div class="linea linea-47" id="linea-47-05"></div>
                      <div class="linea linea-47" id="linea-47-06"></div>
                      <div class="linea linea-47" id="linea-47-07"></div>
                      <div class="linea linea-47" id="linea-47-08"></div>
                      <div class="linea linea-47" id="linea-47-09"></div>
                      <div class="linea linea-47" id="linea-47-10"></div>
                      <div class="linea linea-47" id="linea-47-11"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-47" id="arriba-padecimiento-47">
                    <input type="hidden" value="0" name="abajo-padecimiento-47" id="abajo-padecimiento-47">
                    <input type="hidden" value="0" name="izq-padecimiento-47" id="izq-padecimiento-47">
                    <input type="hidden" value="0" name="der-padecimiento-47" id="der-padecimiento-47">
                    <input type="hidden" value="01" name="margen-47" id="margen-47">
                  </div><!-- fin diente-47 -->
					
                  <div class="diente diente-48">
                    <div class="contenedor-corona contenedor-corona-48">
                      <div class="corona corona-izq corona-izq-48"></div>
                      <div class="corona corona-der corona-der-48"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-48">
                      <div class="linea linea-48 linea-activa" id="linea-48-01"></div>
                      <div class="linea linea-48" id="linea-48-02"></div>
                      <div class="linea linea-48" id="linea-48-03"></div>
                      <div class="linea linea-48" id="linea-48-04"></div>
                      <div class="linea linea-48" id="linea-48-05"></div>
                      <div class="linea linea-48" id="linea-48-05"></div>
                      <div class="linea linea-48" id="linea-48-06"></div>
                      <div class="linea linea-48" id="linea-48-07"></div>
                      <div class="linea linea-48" id="linea-48-08"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-48" id="arriba-padecimiento-48">
                    <input type="hidden" value="0" name="abajo-padecimiento-48" id="abajo-padecimiento-48">
                    <input type="hidden" value="0" name="izq-padecimiento-48" id="izq-padecimiento-48">
                    <input type="hidden" value="0" name="der-padecimiento-48" id="der-padecimiento-48">
                    <input type="hidden" value="01" name="margen-48" id="margen-48">
                  </div><!-- fin diente-48 -->

                </div><!-- fin dientes-inferiores-arriba -->

                <div id="dientes-inferiores-abajo">
					
                  <div class="diente diente-49">
                    <div class="contenedor-corona contenedor-corona-49">
                      <div class="corona corona-izq corona-izq-49"></div>
                      <div class="corona corona-der corona-der-49"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-49">
                      <div class="linea linea-49 linea-activa" id="linea-49-01"></div>
                      <div class="linea linea-49" id="linea-49-02"></div>
                      <div class="linea linea-49" id="linea-49-03"></div>
                      <div class="linea linea-49" id="linea-49-04"></div>
                      <div class="linea linea-49" id="linea-49-05"></div>
                      <div class="linea linea-49" id="linea-49-06"></div>
                      <div class="linea linea-49" id="linea-49-07"></div>
                      <div class="linea linea-49" id="linea-49-08"></div>
                      <div class="linea linea-49" id="linea-49-09"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-49" id="arriba-padecimiento-49">
                    <input type="hidden" value="0" name="abajo-padecimiento-49" id="abajo-padecimiento-49">
                    <input type="hidden" value="0" name="izq-padecimiento-49" id="izq-padecimiento-49">
                    <input type="hidden" value="0" name="der-padecimiento-49" id="der-padecimiento-49">
                    <input type="hidden" value="01" name="margen-49" id="margen-49">
                  </div><!-- fin diente-49 -->
					
                  <div class="diente diente-50">
                    <div class="contenedor-corona contenedor-corona-50">
                      <div class="corona corona-izq corona-izq-50"></div>
                      <div class="corona corona-der corona-der-50"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-50">
                      <div class="linea linea-50 linea-activa" id="linea-50-01"></div>
                      <div class="linea linea-50" id="linea-50-02"></div>
                      <div class="linea linea-50" id="linea-50-03"></div>
                      <div class="linea linea-50" id="linea-50-04"></div>
                      <div class="linea linea-50" id="linea-50-05"></div>
                      <div class="linea linea-50" id="linea-50-06"></div>
                      <div class="linea linea-50" id="linea-50-07"></div>
                      <div class="linea linea-50" id="linea-50-08"></div>
                      <div class="linea linea-50" id="linea-50-09"></div>
                      <div class="linea linea-50" id="linea-50-10"></div>
                      <div class="linea linea-50" id="linea-50-11"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-50" id="arriba-padecimiento-50">
                    <input type="hidden" value="0" name="abajo-padecimiento-50" id="abajo-padecimiento-50">
                    <input type="hidden" value="0" name="izq-padecimiento-50" id="izq-padecimiento-50">
                    <input type="hidden" value="0" name="der-padecimiento-50" id="der-padecimiento-50">
                    <input type="hidden" value="01" name="margen-50" id="margen-50">
                  </div><!-- fin diente-50 -->
					
                  <div class="diente diente-51">
                    <div class="contenedor-corona contenedor-corona-51">
                      <div class="corona corona-izq corona-izq-51"></div>
                      <div class="corona corona-der corona-der-51"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-51">
                      <div class="linea linea-51 linea-activa" id="linea-51-01"></div>
                      <div class="linea linea-51" id="linea-51-02"></div>
                      <div class="linea linea-51" id="linea-51-03"></div>
                      <div class="linea linea-51" id="linea-51-04"></div>
                      <div class="linea linea-51" id="linea-51-05"></div>
                      <div class="linea linea-51" id="linea-51-06"></div>
                      <div class="linea linea-51" id="linea-51-07"></div>
                      <div class="linea linea-51" id="linea-51-08"></div>
                      <div class="linea linea-51" id="linea-51-09"></div>
                      <div class="linea linea-51" id="linea-51-11"></div>
                      <div class="linea linea-51" id="linea-51-12"></div>
                      <div class="linea linea-51" id="linea-51-13"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-51" id="arriba-padecimiento-51">
                    <input type="hidden" value="0" name="abajo-padecimiento-51" id="abajo-padecimiento-51">
                    <input type="hidden" value="0" name="izq-padecimiento-51" id="izq-padecimiento-51">
                    <input type="hidden" value="0" name="der-padecimiento-51" id="der-padecimiento-51">
                    <input type="hidden" value="01" name="margen-51" id="margen-51">
                  </div><!-- fin diente-51 -->
					
                  <div class="diente diente-52">
                    <div class="contenedor-corona contenedor-corona-52">
                      <div class="corona corona-izq corona-izq-52"></div>
                      <div class="corona corona-der corona-der-52"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-52">
                      <div class="linea linea-52 linea-activa" id="linea-52-01"></div>
                      <div class="linea linea-52" id="linea-52-02"></div>
                      <div class="linea linea-52" id="linea-52-03"></div>
                      <div class="linea linea-52" id="linea-52-04"></div>
                      <div class="linea linea-52" id="linea-52-05"></div>
                      <div class="linea linea-52" id="linea-52-06"></div>
                      <div class="linea linea-52" id="linea-52-07"></div>
                      <div class="linea linea-52" id="linea-52-08"></div>
                      <div class="linea linea-52" id="linea-52-09"></div>
                      <div class="linea linea-52" id="linea-52-10"></div>
                      <div class="linea linea-52" id="linea-52-11"></div>
                      <div class="linea linea-52" id="linea-52-12"></div>
                      <div class="linea linea-52"></div>
                      <div class="linea linea-52" id="linea-52-14"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-52" id="arriba-padecimiento-52">
                    <input type="hidden" value="0" name="abajo-padecimiento-52" id="abajo-padecimiento-52">
                    <input type="hidden" value="0" name="izq-padecimiento-52" id="izq-padecimiento-52">
                    <input type="hidden" value="0" name="der-padecimiento-52" id="der-padecimiento-52">
                    <input type="hidden" value="01" name="margen-52" id="margen-52">
                  </div><!-- fin diente-52 -->
					
                  <div class="diente diente-53">
                    <div class="contenedor-corona contenedor-corona-53">
                      <div class="corona corona-izq corona-izq-53"></div>
                      <div class="corona corona-der corona-der-53"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-53">
                      <div class="linea linea-53 linea-activa" id="linea-53-01"></div>
                      <div class="linea linea-53" id="linea-53-02"></div>
                      <div class="linea linea-53" id="linea-53-03"></div>
                      <div class="linea linea-53" id="linea-53-04"></div>
                      <div class="linea linea-53" id="linea-53-05"></div>
                      <div class="linea linea-53" id="linea-53-06"></div>
                      <div class="linea linea-53" id="linea-53-07"></div>
                      <div class="linea linea-53" id="linea-53-08"></div>
                      <div class="linea linea-53" id="linea-53-09"></div>
                      <div class="linea linea-53" id="linea-53-10"></div>
                      <div class="linea linea-53" id="linea-53-11"></div>
                      <div class="linea linea-53" id="linea-53-12"></div>
                      <div class="linea linea-53" id="linea-53-13"></div>
                      <div class="linea linea-53" id="linea-53-14"></div>
                      <div class="linea linea-53" id="linea-53-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-53" id="arriba-padecimiento-53">
                    <input type="hidden" value="0" name="abajo-padecimiento-53" id="abajo-padecimiento-53">
                    <input type="hidden" value="0" name="izq-padecimiento-53" id="izq-padecimiento-53">
                    <input type="hidden" value="0" name="der-padecimiento-53" id="der-padecimiento-53">
                    <input type="hidden" value="01" name="margen-53" id="margen-53">
                  </div><!-- fin diente-53 -->
					
                  <div class="diente diente-54">
                    <div class="contenedor-corona contenedor-corona-54">
                      <div class="corona corona-izq corona-izq-54"></div>
                      <div class="corona corona-der corona-der-54"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-54">
                      <div class="linea linea-54 linea-activa" id="linea-54-01"></div>
                      <div class="linea linea-54" id="linea-54-02"></div>
                      <div class="linea linea-54" id="linea-54-03"></div>
                      <div class="linea linea-54" id="linea-54-04"></div>
                      <div class="linea linea-54" id="linea-54-05"></div>
                      <div class="linea linea-54" id="linea-54-06"></div>
                      <div class="linea linea-54" id="linea-54-07"></div>
                      <div class="linea linea-54" id="linea-54-08"></div>
                      <div class="linea linea-54" id="linea-54-09"></div>
                      <div class="linea linea-54" id="linea-54-10"></div>
                      <div class="linea linea-54" id="linea-54-11"></div>
                      <div class="linea linea-54" id="linea-54-12"></div>
                      <div class="linea linea-54" id="linea-54-13"></div>
                      <div class="linea linea-54" id="linea-54-14"></div>
                      <div class="linea linea-54" id="linea-54-15"></div>
                      <div class="linea linea-54" id="linea-54-16"></div>
                      <div class="linea linea-54" id="linea-54-17"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-54" id="arriba-padecimiento-54">
                    <input type="hidden" value="0" name="abajo-padecimiento-54" id="abajo-padecimiento-54">
                    <input type="hidden" value="0" name="izq-padecimiento-54" id="izq-padecimiento-54">
                    <input type="hidden" value="0" name="der-padecimiento-54" id="der-padecimiento-54">
                    <input type="hidden" value="01" name="margen-54" id="margen-54">
                  </div><!-- fin diente-54 -->
					
                  <div class="diente diente-55">
                    <div class="contenedor-corona contenedor-corona-55">
                      <div class="corona corona-izq corona-izq-55"></div>
                      <div class="corona corona-der corona-der-55"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-55">
                      <div class="linea linea-55 linea-activa" id="linea-55-01"></div>
                      <div class="linea linea-55" id="linea-55-02"></div>
                      <div class="linea linea-55" id="linea-55-03"></div>
                      <div class="linea linea-55" id="linea-55-04"></div>
                      <div class="linea linea-55" id="linea-55-05"></div>
                      <div class="linea linea-55" id="linea-55-06"></div>
                      <div class="linea linea-55" id="linea-55-07"></div>
                      <div class="linea linea-55" id="linea-55-08"></div>
                      <div class="linea linea-55" id="linea-55-09"></div>
                      <div class="linea linea-55" id="linea-55-10"></div>
                      <div class="linea linea-55" id="linea-55-11"></div>
                      <div class="linea linea-55" id="linea-55-12"></div>
                      <div class="linea linea-55" id="linea-55-13"></div>
                      <div class="linea linea-55" id="linea-55-14"></div>
                      <div class="linea linea-55" id="linea-55-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-55" id="arriba-padecimiento-55">
                    <input type="hidden" value="0" name="abajo-padecimiento-55" id="abajo-padecimiento-55">
                    <input type="hidden" value="0" name="izq-padecimiento-55" id="izq-padecimiento-55">
                    <input type="hidden" value="0" name="der-padecimiento-55" id="der-padecimiento-55">
                    <input type="hidden" value="01" name="margen-55" id="margen-55">
                  </div><!-- fin diente-55 -->
					
                  <div class="diente diente-56">
                    <div class="contenedor-corona contenedor-corona-56">
                      <div class="corona corona-izq corona-izq-56"></div>
                      <div class="corona corona-der corona-der-56"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-56">
                      <div class="linea linea-56 linea-activa" id="linea-56-01"></div>
                      <div class="linea linea-56" id="linea-56-02"></div>
                      <div class="linea linea-56" id="linea-56-03"></div>
                      <div class="linea linea-56" id="linea-56-04"></div>
                      <div class="linea linea-56" id="linea-56-05"></div>
                      <div class="linea linea-56" id="linea-56-06"></div>
                      <div class="linea linea-56" id="linea-56-07"></div>
                      <div class="linea linea-56" id="linea-56-08"></div>
                      <div class="linea linea-56" id="linea-56-09"></div>
                      <div class="linea linea-56" id="linea-56-10"></div>
                      <div class="linea linea-56" id="linea-56-11"></div>
                      <div class="linea linea-56" id="linea-56-12"></div>
                      <div class="linea linea-56" id="linea-56-13"></div>
                      <div class="linea linea-56" id="linea-56-14"></div>
                      <div class="linea linea-56" id="linea-56-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-56" id="arriba-padecimiento-56">
                    <input type="hidden" value="0" name="abajo-padecimiento-56" id="abajo-padecimiento-56">
                    <input type="hidden" value="0" name="izq-padecimiento-56" id="izq-padecimiento-56">
                    <input type="hidden" value="0" name="der-padecimiento-56" id="der-padecimiento-56">
                    <input type="hidden" value="01" name="margen-56" id="margen-56">
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
					
                  <div class="diente diente-57">
                    <div class="contenedor-corona contenedor-corona-57">
                      <div class="corona corona-izq corona-izq-57"></div>
                      <div class="corona corona-der corona-der-57"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-57">
                      <div class="linea linea-57 linea-activa" id="linea-57-01"></div>
                      <div class="linea linea-57" id="linea-57-02"></div>
                      <div class="linea linea-57" id="linea-57-03"></div>
                      <div class="linea linea-57" id="linea-57-04"></div>
                      <div class="linea linea-57" id="linea-57-05"></div>
                      <div class="linea linea-57" id="linea-57-06"></div>
                      <div class="linea linea-57" id="linea-57-07"></div>
                      <div class="linea linea-57" id="linea-57-08"></div>
                      <div class="linea linea-57" id="linea-57-09"></div>
                      <div class="linea linea-57" id="linea-57-10"></div>
                      <div class="linea linea-57" id="linea-57-11"></div>
                      <div class="linea linea-57" id="linea-57-12"></div>
                      <div class="linea linea-57" id="linea-57-13"></div>
                      <div class="linea linea-57" id="linea-57-14"></div>
                      <div class="linea linea-57" id="linea-57-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-57" id="arriba-padecimiento-57">
                    <input type="hidden" value="0" name="abajo-padecimiento-57" id="abajo-padecimiento-57">
                    <input type="hidden" value="0" name="izq-padecimiento-57" id="izq-padecimiento-57">
                    <input type="hidden" value="0" name="der-padecimiento-57" id="der-padecimiento-57">
                    <input type="hidden" value="01" name="margen-57" id="margen-57">
                  </div><!-- fin diente-57 -->
					
                  <div class="diente diente-58">
                    <div class="contenedor-corona contenedor-corona-58">
                      <div class="corona corona-izq corona-izq-58"></div>
                      <div class="corona corona-der corona-der-58"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-58">
                      <div class="linea linea-58 linea-activa" id="linea-58-01"></div>
                      <div class="linea linea-58" id="linea-58-02"></div>
                      <div class="linea linea-58" id="linea-58-03"></div>
                      <div class="linea linea-58" id="linea-58-04"></div>
                      <div class="linea linea-58" id="linea-58-05"></div>
                      <div class="linea linea-58" id="linea-58-06"></div>
                      <div class="linea linea-58" id="linea-58-07"></div>
                      <div class="linea linea-58" id="linea-58-08"></div>
                      <div class="linea linea-58" id="linea-58-09"></div>
                      <div class="linea linea-58" id="linea-58-10"></div>
                      <div class="linea linea-58" id="linea-58-11"></div>
                      <div class="linea linea-58" id="linea-58-12"></div>
                      <div class="linea linea-58" id="linea-58-13"></div>
                      <div class="linea linea-58" id="linea-58-14"></div>
                      <div class="linea linea-58" id="linea-58-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-58" id="arriba-padecimiento-58">
                    <input type="hidden" value="0" name="abajo-padecimiento-58" id="abajo-padecimiento-58">
                    <input type="hidden" value="0" name="izq-padecimiento-58" id="izq-padecimiento-58">
                    <input type="hidden" value="0" name="der-padecimiento-58" id="der-padecimiento-58">
                    <input type="hidden" value="01" name="margen-58" id="margen-58">
                  </div><!-- fin diente-58 -->
					
                  <div class="diente diente-59">
                    <div class="contenedor-corona contenedor-corona-59">
                      <div class="corona corona-izq corona-izq-59"></div>
                      <div class="corona corona-der corona-der-59"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-59">
                      <div class="linea linea-59 linea-activa" id="linea-59-01"></div>
                      <div class="linea linea-59" id="linea-59-02"></div>
                      <div class="linea linea-59" id="linea-59-03"></div>
                      <div class="linea linea-59" id="linea-59-04"></div>
                      <div class="linea linea-59" id="linea-59-05"></div>
                      <div class="linea linea-59" id="linea-59-06"></div>
                      <div class="linea linea-59" id="linea-59-07"></div>
                      <div class="linea linea-59" id="linea-59-08"></div>
                      <div class="linea linea-59" id="linea-59-09"></div>
                      <div class="linea linea-59" id="linea-59-10"></div>
                      <div class="linea linea-59" id="linea-59-11"></div>
                      <div class="linea linea-59" id="linea-59-12"></div>
                      <div class="linea linea-59" id="linea-59-13"></div>
                      <div class="linea linea-59" id="linea-59-14"></div>
                      <div class="linea linea-59" id="linea-59-15"></div>
                      <div class="linea linea-59" id="linea-59-16"></div>
                      <div class="linea linea-59" id="linea-59-17"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-59" id="arriba-padecimiento-59">
                    <input type="hidden" value="0" name="abajo-padecimiento-59" id="abajo-padecimiento-59">
                    <input type="hidden" value="0" name="izq-padecimiento-59" id="izq-padecimiento-59">
                    <input type="hidden" value="0" name="der-padecimiento-59" id="der-padecimiento-59">
                    <input type="hidden" value="01" name="margen-59" id="margen-59">
                  </div><!-- fin diente-59 -->
					
                  <div class="diente diente-60">
                    <div class="contenedor-corona contenedor-corona-60">
                      <div class="corona corona-izq corona-izq-60"></div>
                      <div class="corona corona-der corona-der-60"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-60">
                      <div class="linea linea-60 linea-activa" id="linea-60-01"></div>
                      <div class="linea linea-60" id="linea-60-02"></div>
                      <div class="linea linea-60" id="linea-60-03"></div>
                      <div class="linea linea-60" id="linea-60-04"></div>
                      <div class="linea linea-60" id="linea-60-05"></div>
                      <div class="linea linea-60" id="linea-60-06"></div>
                      <div class="linea linea-60" id="linea-60-07"></div>
                      <div class="linea linea-60" id="linea-60-08"></div>
                      <div class="linea linea-60" id="linea-60-09"></div>
                      <div class="linea linea-60" id="linea-60-10"></div>
                      <div class="linea linea-60" id="linea-60-11"></div>
                      <div class="linea linea-60" id="linea-60-12"></div>
                      <div class="linea linea-60" id="linea-60-13"></div>
                      <div class="linea linea-60" id="linea-60-14"></div>
                      <div class="linea linea-60" id="linea-60-15"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-60" id="arriba-padecimiento-60">
                    <input type="hidden" value="0" name="abajo-padecimiento-60" id="abajo-padecimiento-60">
                    <input type="hidden" value="0" name="izq-padecimiento-60" id="izq-padecimiento-60">
                    <input type="hidden" value="0" name="der-padecimiento-60" id="der-padecimiento-60">
                    <input type="hidden" value="01" name="margen-60" id="margen-60">
                  </div><!-- fin diente-60 -->
					
                  <div class="diente diente-61">
                    <div class="contenedor-corona contenedor-corona-61">
                      <div class="corona corona-izq corona-izq-61"></div>
                      <div class="corona corona-der corona-der-61"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-61">
                      <div class="linea linea-61 linea-activa" id="linea-61-01"></div>
                      <div class="linea linea-61" id="linea-61-02"></div>
                      <div class="linea linea-61" id="linea-61-03"></div>
                      <div class="linea linea-61" id="linea-61-04"></div>
                      <div class="linea linea-61" id="linea-61-05"></div>
                      <div class="linea linea-61" id="linea-61-06"></div>
                      <div class="linea linea-61" id="linea-61-07"></div>
                      <div class="linea linea-61" id="linea-61-08"></div>
                      <div class="linea linea-61" id="linea-61-09"></div>
                      <div class="linea linea-61" id="linea-61-10"></div>
                      <div class="linea linea-61" id="linea-61-11"></div>
                      <div class="linea linea-61" id="linea-61-12"></div>
                      <div class="linea linea-61" id="linea-61-13"></div>
                      <div class="linea linea-61" id="linea-61-14"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-61" id="arriba-padecimiento-61">
                    <input type="hidden" value="0" name="abajo-padecimiento-61" id="abajo-padecimiento-61">
                    <input type="hidden" value="0" name="izq-padecimiento-61" id="izq-padecimiento-61">
                    <input type="hidden" value="0" name="der-padecimiento-61" id="der-padecimiento-61">
                    <input type="hidden" value="01" name="margen-61" id="margen-61">
                  </div><!-- fin diente-61 -->
					
                  <div class="diente diente-62">
                    <div class="contenedor-corona contenedor-corona-62">
                      <div class="corona corona-izq corona-izq-62"></div>
                      <div class="corona corona-der corona-der-62"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-62">
                      <div class="linea linea-62 linea-activa" id="linea-62-01"></div>
                      <div class="linea linea-62" id="linea-62-02"></div>
                      <div class="linea linea-62" id="linea-62-03"></div>
                      <div class="linea linea-62" id="linea-62-04"></div>
                      <div class="linea linea-62" id="linea-62-05"></div>
                      <div class="linea linea-62" id="linea-62-06"></div>
                      <div class="linea linea-62" id="linea-62-07"></div>
                      <div class="linea linea-62" id="linea-62-08"></div>
                      <div class="linea linea-62" id="linea-62-09"></div>
                      <div class="linea linea-62" id="linea-62-10"></div>
                      <div class="linea linea-62" id="linea-62-11"></div>
                      <div class="linea linea-62" id="linea-62-12"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-62" id="arriba-padecimiento-62">
                    <input type="hidden" value="0" name="abajo-padecimiento-62" id="abajo-padecimiento-62">
                    <input type="hidden" value="0" name="izq-padecimiento-62" id="izq-padecimiento-62">
                    <input type="hidden" value="0" name="der-padecimiento-62" id="der-padecimiento-62">
                    <input type="hidden" value="01" name="margen-62" id="margen-62">
                  </div><!-- fin diente-62 -->
					
                  <div class="diente diente-63">
                    <div class="contenedor-corona contenedor-corona-63">
                      <div class="corona corona-izq corona-izq-63"></div>
                      <div class="corona corona-der corona-der-63"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-63">
                      <div class="linea linea-63 linea-activa" id="linea-63-01"></div>
                      <div class="linea linea-63" id="linea-63-02"></div>
                      <div class="linea linea-63" id="linea-63-03"></div>
                      <div class="linea linea-63" id="linea-63-04"></div>
                      <div class="linea linea-63" id="linea-63-05"></div>
                      <div class="linea linea-63" id="linea-63-06"></div>
                      <div class="linea linea-63" id="linea-63-07"></div>
                      <div class="linea linea-63" id="linea-63-08"></div>
                      <div class="linea linea-63" id="linea-63-09"></div>
                      <div class="linea linea-63" id="linea-63-10"></div>
                      <div class="linea linea-63" id="linea-63-11"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-63" id="arriba-padecimiento-63">
                    <input type="hidden" value="0" name="abajo-padecimiento-63" id="abajo-padecimiento-63">
                    <input type="hidden" value="0" name="izq-padecimiento-63" id="izq-padecimiento-63">
                    <input type="hidden" value="0" name="der-padecimiento-63" id="der-padecimiento-63">
                    <input type="hidden" value="01" name="margen-63" id="margen-63">
                  </div><!-- fin diente-63 -->
					
                  <div class="diente diente-64">
                    <div class="contenedor-corona contenedor-corona-64">
                      <div class="corona corona-izq corona-izq-64"></div>
                      <div class="corona corona-der corona-der-64"></div>
                    </div>
                    <div class="contenedor-lineas contenedor-lineas-64">
                      <div class="linea linea-64 linea-activa" id="linea-64-01"></div>
                      <div class="linea linea-64" id="linea-64-02"></div>
                      <div class="linea linea-64" id="linea-64-03"></div>
                      <div class="linea linea-64" id="linea-64-04"></div>
                      <div class="linea linea-64" id="linea-64-05"></div>
                      <div class="linea linea-64" id="linea-64-06"></div>
                      <div class="linea linea-64" id="linea-64-07"></div>
                      <div class="linea linea-64" id="linea-64-08"></div>
                      <div class="linea linea-64" id="linea-64-09"></div>
                    </div>
                    <input type="hidden" value="0" name="arriba-padecimiento-64" id="arriba-padecimiento-64">
                    <input type="hidden" value="0" name="abajo-padecimiento-64" id="abajo-padecimiento-64">
                    <input type="hidden" value="0" name="izq-padecimiento-64" id="izq-padecimiento-64">
                    <input type="hidden" value="0" name="der-padecimiento-64" id="der-padecimiento-64">
                    <input type="hidden" value="01" name="margen-64" id="margen-64">
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
                <input type="radio" id="inflamacion_microbiana" name="inflamacion_microbiana" value="1" checked> Débil <br />
                  <input type="radio" id="inflamacion_microbiana" name="inflamacion_microbiana" value="2"> Moderada <br />
                  <input type="radio" id="inflamacion_microbiana" name="inflamacion_microbiana" value="3"> Fuerte </td>
              </div>
              <div class="span1">Traumatismo Oclusal</div>
              <div class="span2">
                <input type="radio" id="traumatismo_oclusal" name="traumatismo_oclusal" value="1" checked> Ligero <br />
                  <input type="radio" id="traumatismo_oclusal" name="traumatismo_oclusal" value="2"> Mediano <br />
                  <input type="radio" id="traumatismo_oclusal" name="traumatismo_oclusal" value="3"> Fuerte </td>
              </div>
              
            </div>

            <hr />

            <div class="row">
              <div class="span6">
                <label><strong>Parafunciones (bruxismo)</strong></label>
                <input type="text" placeholder="Parafunciones (bruxismo)" id="parafunciones" name="parafunciones">
              </div>
              <div class="span6">
                <br />
                <label><strong>Morfología y Función</strong></label>
                <input type="text" id="morfologia_funcion" name="morfologia_funcion" placeholder="Morfología y Función">
              </div>
              <div class="span6">
                <br />
                <label><strong>Articulación Temporo Mandibular</strong></label>
                <input type="text" id="articulacion_temporo_mandibular" name="articulacion_temporo_mandibular" placeholder="Articulación Temporo Mandibular">
              </div>
              <div class="span6">
                <br />
                <label><strong>Peculiaridad</strong></label>
                <input type="text" id="peculiaridad" name="peculiaridad" placeholder="Peculiaridad">
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
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_1" name="cuant_plac_fecha_1"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_18" name="cuant_plac_a_18"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_17" name="cuant_plac_a_17"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_16" name="cuant_plac_a_16"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_15" name="cuant_plac_a_15"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_14" name="cuant_plac_a_14"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_13" name="cuant_plac_a_13"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_12" name="cuant_plac_a_12"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_11" name="cuant_plac_a_11"></td>
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
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_2" name="cuant_plac_fecha_2"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_18" name="cuant_plac_b_18"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_17" name="cuant_plac_b_17"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_16" name="cuant_plac_b_16"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_15" name="cuant_plac_b_15"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_14" name="cuant_plac_b_14"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_13" name="cuant_plac_b_13"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_12" name="cuant_plac_b_12"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_11" name="cuant_plac_b_11"></td>
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
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_3" name="cuant_plac_fecha_3"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_18" name="cuant_plac_c_18"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_17" name="cuant_plac_c_17"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_16" name="cuant_plac_c_16"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_15" name="cuant_plac_c_15"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_14" name="cuant_plac_c_14"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_13" name="cuant_plac_c_13"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_12" name="cuant_plac_c_12"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_11" name="cuant_plac_c_11"></td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_4" name="cuant_plac_fecha_4"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_48" name="cuant_plac_a_48"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_47" name="cuant_plac_a_47"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_46" name="cuant_plac_a_46"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_45" name="cuant_plac_a_45"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_44" name="cuant_plac_a_44"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_43" name="cuant_plac_a_43"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_42" name="cuant_plac_a_42"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_41" name="cuant_plac_a_41"></td>
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
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_5" name="cuant_plac_fecha_5"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_48" name="cuant_plac_b_48"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_47" name="cuant_plac_b_47"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_46" name="cuant_plac_b_46"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_45" name="cuant_plac_b_45"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_44" name="cuant_plac_b_44"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_43" name="cuant_plac_b_43"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_42" name="cuant_plac_b_42"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_41" name="cuant_plac_b_41"></td>
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
                      <td><input type="text" placeholder="Fecha" style="width: 80px;" id="cuant_plac_fecha_6" name="cuant_plac_fecha_6"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_48" name="cuant_plac_c_48"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_47" name="cuant_plac_c_47"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_46" name="cuant_plac_c_46"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_45" name="cuant_plac_c_45"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_44" name="cuant_plac_c_44"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_43" name="cuant_plac_c_43"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_42" name="cuant_plac_c_42"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_41" name="cuant_plac_c_41"></td>
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
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_21" name="cuant_plac_a_21"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_22" name="cuant_plac_a_22"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_23" name="cuant_plac_a_23"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_24" name="cuant_plac_a_24"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_25" name="cuant_plac_a_25"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_26" name="cuant_plac_a_26"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_27" name="cuant_plac_a_27"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_28" name="cuant_plac_a_28"></td>
                      <td><input type="text" style="width: 15px;" id="cuant_plac_porcentaje_1" name="cuant_plac_porcentaje_1"></td>
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
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_21" name="cuant_plac_b_21"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_22" name="cuant_plac_b_22"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_23" name="cuant_plac_b_23"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_24" name="cuant_plac_b_24"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_25" name="cuant_plac_b_25"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_26" name="cuant_plac_b_26"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_27" name="cuant_plac_b_27"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_28" name="cuant_plac_b_28"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_porcentaje_2" name="cuant_plac_porcentaje_2"></td>
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
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_21" name="cuant_plac_c_21"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_22" name="cuant_plac_c_22"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_23" name="cuant_plac_c_23"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_24" name="cuant_plac_c_24"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_25" name="cuant_plac_c_25"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_26" name="cuant_plac_c_26"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_27" name="cuant_plac_c_27"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_28" name="cuant_plac_c_28"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_porcentaje_3" name="cuant_plac_porcentaje_3"></td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-striped">
                  <tr>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_31" name="cuant_plac_a_31"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_32" name="cuant_plac_a_32"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_33" name="cuant_plac_a_33"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_34" name="cuant_plac_a_34"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_35" name="cuant_plac_a_35"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_36" name="cuant_plac_a_36"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_37" name="cuant_plac_a_37"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_a_38" name="cuant_plac_a_38"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_porcentaje_4" name="cuant_plac_porcentaje_4"></td>
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
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_31" name="cuant_plac_b_31"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_32" name="cuant_plac_b_32"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_33" name="cuant_plac_b_33"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_34" name="cuant_plac_b_34"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_35" name="cuant_plac_b_35"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_36" name="cuant_plac_b_36"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_37" name="cuant_plac_b_37"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_b_38" name="cuant_plac_b_38"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_porcentaje_5" name="cuant_plac_porcentaje_5"></td>
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
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_31" name="cuant_plac_c_31"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_32" name="cuant_plac_c_32"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_33" name="cuant_plac_c_33"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_34" name="cuant_plac_c_34"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_35" name="cuant_plac_c_35"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_36" name="cuant_plac_c_36"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_37" name="cuant_plac_c_37"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_c_38" name="cuant_plac_c_38"></td>
                      <td><input type="text" style="width: 10px;" id="cuant_plac_porcentaje_6" name="cuant_plac_porcentaje_6"></td>
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
                  <td><input type="text" style="width: 13px;" id="gin_18" name="gin_18"></td>
                  <td><input type="text" style="width: 13px;" id="gin_17" name="gin_17"></td>
                  <td><input type="text" style="width: 13px;" id="gin_16" name="gin_16"></td>
                  <td><input type="text" style="width: 13px;" id="gin_15" name="gin_15"></td>
                  <td><input type="text" style="width: 13px;" id="gin_14" name="gin_14"></td>
                  <td><input type="text" style="width: 13px;" id="gin_13" name="gin_13"></td>
                  <td><input type="text" style="width: 13px;" id="gin_12" name="gin_12"></td>
                  <td><input type="text" style="width: 13px;" id="gin_11" name="gin_11"></td>
                  <td><input type="text" style="width: 13px;" id="gin_21" name="gin_21"></td>
                  <td><input type="text" style="width: 13px;" id="gin_22" name="gin_22"></td>
                  <td><input type="text" style="width: 13px;" id="gin_23" name="gin_23"></td>
                  <td><input type="text" style="width: 13px;" id="gin_24" name="gin_24"></td>
                  <td><input type="text" style="width: 13px;" id="gin_25" name="gin_25"></td>
                  <td><input type="text" style="width: 13px;" id="gin_26" name="gin_26"></td>
                  <td><input type="text" style="width: 13px;" id="gin_27" name="gin_27"></td>
                  <td><input type="text" style="width: 13px;" id="gin_28" name="gin_28"></td>
                </tr>
                <tr>
                  <td>Periodontitis Leve</td>
                  <td><input type="text" style="width: 13px;" id="leve_18" name="leve_18"></td>
                  <td><input type="text" style="width: 13px;" id="leve_17" name="leve_17"></td>
                  <td><input type="text" style="width: 13px;" id="leve_16" name="leve_16"></td>
                  <td><input type="text" style="width: 13px;" id="leve_15" name="leve_15"></td>
                  <td><input type="text" style="width: 13px;" id="leve_14" name="leve_14"></td>
                  <td><input type="text" style="width: 13px;" id="leve_13" name="leve_13"></td>
                  <td><input type="text" style="width: 13px;" id="leve_12" name="leve_12"></td>
                  <td><input type="text" style="width: 13px;" id="leve_11" name="leve_11"></td>
                  <td><input type="text" style="width: 13px;" id="leve_21" name="leve_21"></td>
                  <td><input type="text" style="width: 13px;" id="leve_22" name="leve_22"></td>
                  <td><input type="text" style="width: 13px;" id="leve_23" name="leve_23"></td>
                  <td><input type="text" style="width: 13px;" id="leve_24" name="leve_24"></td>
                  <td><input type="text" style="width: 13px;" id="leve_25" name="leve_25"></td>
                  <td><input type="text" style="width: 13px;" id="leve_26" name="leve_26"></td>
                  <td><input type="text" style="width: 13px;" id="leve_27" name="leve_27"></td>
                  <td><input type="text" style="width: 13px;" id="leve_28" name="leve_28"></td>
                </tr>
                <tr>
                  <td>Periodontitis Moderna</td>
                  <td><input type="text" style="width: 13px;" id="moderna_18" name="moderna_18"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_17" name="moderna_17"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_16" name="moderna_16"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_15" name="moderna_15"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_14" name="moderna_14"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_13" name="moderna_13"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_12" name="moderna_12"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_11" name="moderna_11"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_21" name="moderna_21"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_22" name="moderna_22"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_23" name="moderna_23"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_24" name="moderna_24"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_25" name="moderna_25"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_26" name="moderna_26"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_27" name="moderna_27"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_28" name="moderna_28"></td>
                </tr>
                <tr>
                  <td>Periodontitis Grave</td>
                  <td><input type="text" style="width: 13px;" id="grave_18" name="grave_18"></td>
                  <td><input type="text" style="width: 13px;" id="grave_17" name="grave_17"></td>
                  <td><input type="text" style="width: 13px;" id="grave_16" name="grave_16"></td>
                  <td><input type="text" style="width: 13px;" id="grave_15" name="grave_15"></td>
                  <td><input type="text" style="width: 13px;" id="grave_14" name="grave_14"></td>
                  <td><input type="text" style="width: 13px;" id="grave_13" name="grave_13"></td>
                  <td><input type="text" style="width: 13px;" id="grave_12" name="grave_12"></td>
                  <td><input type="text" style="width: 13px;" id="grave_11" name="grave_11"></td>
                  <td><input type="text" style="width: 13px;" id="grave_21" name="grave_21"></td>
                  <td><input type="text" style="width: 13px;" id="grave_22" name="grave_22"></td>
                  <td><input type="text" style="width: 13px;" id="grave_23" name="grave_23"></td>
                  <td><input type="text" style="width: 13px;" id="grave_24" name="grave_24"></td>
                  <td><input type="text" style="width: 13px;" id="grave_25" name="grave_25"></td>
                  <td><input type="text" style="width: 13px;" id="grave_26" name="grave_26"></td>
                  <td><input type="text" style="width: 13px;" id="grave_27" name="grave_27"></td>
                  <td><input type="text" style="width: 13px;" id="grave_28" name="grave_28"></td>
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
                  <td><input type="text" style="width: 13px;" id="gin_48" name="gin_48"></td>
                  <td><input type="text" style="width: 13px;" id="gin_47" name="gin_47"></td>
                  <td><input type="text" style="width: 13px;" id="gin_46" name="gin_46"></td>
                  <td><input type="text" style="width: 13px;" id="gin_45" name="gin_45"></td>
                  <td><input type="text" style="width: 13px;" id="gin_44" name="gin_44"></td>
                  <td><input type="text" style="width: 13px;" id="gin_43" name="gin_43"></td>
                  <td><input type="text" style="width: 13px;" id="gin_42" name="gin_42"></td>
                  <td><input type="text" style="width: 13px;" id="gin_41" name="gin_41"></td>
                  <td><input type="text" style="width: 13px;" id="gin_31" name="gin_31"></td>
                  <td><input type="text" style="width: 13px;" id="gin_32" name="gin_32"></td>
                  <td><input type="text" style="width: 13px;" id="gin_33" name="gin_33"></td>
                  <td><input type="text" style="width: 13px;" id="gin_34" name="gin_34"></td>
                  <td><input type="text" style="width: 13px;" id="gin_35" name="gin_35"></td>
                  <td><input type="text" style="width: 13px;" id="gin_36" name="gin_36"></td>
                  <td><input type="text" style="width: 13px;" id="gin_37" name="gin_37"></td>
                  <td><input type="text" style="width: 13px;" id="gin_38" name="gin_38"></td>
                </tr>
                <tr>
                  <td>Periodontitis Leve</td>
                  <td><input type="text" style="width: 13px;" id="leve_48" name="leve_48"></td>
                  <td><input type="text" style="width: 13px;" id="leve_47" name="leve_47"></td>
                  <td><input type="text" style="width: 13px;" id="leve_46" name="leve_46"></td>
                  <td><input type="text" style="width: 13px;" id="leve_45" name="leve_45"></td>
                  <td><input type="text" style="width: 13px;" id="leve_44" name="leve_44"></td>
                  <td><input type="text" style="width: 13px;" id="leve_43" name="leve_43"></td>
                  <td><input type="text" style="width: 13px;" id="leve_42" name="leve_42"></td>
                  <td><input type="text" style="width: 13px;" id="leve_41" name="leve_41"></td>
                  <td><input type="text" style="width: 13px;" id="leve_31" name="leve_31"></td>
                  <td><input type="text" style="width: 13px;" id="leve_32" name="leve_32"></td>
                  <td><input type="text" style="width: 13px;" id="leve_33" name="leve_33"></td>
                  <td><input type="text" style="width: 13px;" id="leve_34" name="leve_34"></td>
                  <td><input type="text" style="width: 13px;" id="leve_35" name="leve_35"></td>
                  <td><input type="text" style="width: 13px;" id="leve_36" name="leve_36"></td>
                  <td><input type="text" style="width: 13px;" id="leve_37" name="leve_37"></td>
                  <td><input type="text" style="width: 13px;" id="leve_38" name="leve_38"></td>
                </tr>
                <tr>
                  <td>Periodontitis Moderna</td>
                  <td><input type="text" style="width: 13px;" id="moderna_48" name="moderna_48"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_47" name="moderna_47"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_46" name="moderna_46"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_45" name="moderna_45"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_44" name="moderna_44"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_43" name="moderna_43"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_42" name="moderna_42"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_41" name="moderna_41"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_31" name="moderna_31"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_32" name="moderna_32"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_33" name="moderna_33"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_34" name="moderna_34"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_35" name="moderna_35"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_36" name="moderna_36"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_37" name="moderna_37"></td>
                  <td><input type="text" style="width: 13px;" id="moderna_38" name="moderna_38"></td>
                </tr>
                <tr>
                  <td>Periodontitis Grave</td>
                  <td><input type="text" style="width: 13px;" id="grave_48" name="grave_48"></td>
                  <td><input type="text" style="width: 13px;" id="grave_47" name="grave_47"></td>
                  <td><input type="text" style="width: 13px;" id="grave_46" name="grave_46"></td>
                  <td><input type="text" style="width: 13px;" id="grave_45" name="grave_45"></td>
                  <td><input type="text" style="width: 13px;" id="grave_44" name="grave_44"></td>
                  <td><input type="text" style="width: 13px;" id="grave_43" name="grave_43"></td>
                  <td><input type="text" style="width: 13px;" id="grave_42" name="grave_42"></td>
                  <td><input type="text" style="width: 13px;" id="grave_41" name="grave_41"></td>
                  <td><input type="text" style="width: 13px;" id="grave_31" name="grave_31"></td>
                  <td><input type="text" style="width: 13px;" id="grave_32" name="grave_32"></td>
                  <td><input type="text" style="width: 13px;" id="grave_33" name="grave_33"></td>
                  <td><input type="text" style="width: 13px;" id="grave_34" name="grave_34"></td>
                  <td><input type="text" style="width: 13px;" id="grave_35" name="grave_35"></td>
                  <td><input type="text" style="width: 13px;" id="grave_36" name="grave_36"></td>
                  <td><input type="text" style="width: 13px;" id="grave_37" name="grave_37"></td>
                  <td><input type="text" style="width: 13px;" id="grave_38" name="grave_38"></td>
                </tr>
              </tbody>
            </table>

            <label><strong>Diagnóstico General (lesión más dañada)</strong></label>
            <input type="text" placeholder="Diagnóstico General (lesión más dañada)" class="span4" id="diagnostico_general" name="diagnostico_general">

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
                      <td><input type="text" placeholder="Fecha" style="width: 75px;" id="fecha_basica_1" name="fecha_basica_1"></td>
                      <td><input type="text" style="width: 15px;" id="basica_18" name="basica_18"></td>
                      <td><input type="text" style="width: 15px;" id="basica_17" name="basica_17"></td>
                      <td><input type="text" style="width: 15px;" id="basica_16" name="basica_16"></td>
                      <td><input type="text" style="width: 15px;" id="basica_15" name="basica_15"></td>
                      <td><input type="text" style="width: 15px;" id="basica_14" name="basica_14"></td>
                      <td><input type="text" style="width: 15px;" id="basica_13" name="basica_13"></td>
                      <td><input type="text" style="width: 15px;" id="basica_12" name="basica_12"></td>
                      <td><input type="text" style="width: 15px;" id="basica_11" name="basica_11"></td>
                      <td>Post T. Básica</td>                      
                      <td><input type="text" style="width: 15px;" id="basica_21" name="basica_21"></td>
                      <td><input type="text" style="width: 15px;" id="basica_22" name="basica_22"></td>
                      <td><input type="text" style="width: 15px;" id="basica_23" name="basica_23"></td>
                      <td><input type="text" style="width: 15px;" id="basica_24" name="basica_24"></td>
                      <td><input type="text" style="width: 15px;" id="basica_25" name="basica_25"></td>
                      <td><input type="text" style="width: 15px;" id="basica_26" name="basica_26"></td>
                      <td><input type="text" style="width: 15px;" id="basica_27" name="basica_27"></td>
                      <td><input type="text" style="width: 15px;" id="basica_28" name="basica_28"></td>
                      <td><input type="text" style="width: 15px;" id="porcentaje_basica_1" name="porcentaje_basica_1"> %</td>
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
                      <td><input type="text" placeholder="Fecha" style="width: 75px;" id="fecha_final_1" name="fecha_final_1"></td>
                      <td><input type="text" style="width: 15px;" id="final_18" name="final_18"></td>
                      <td><input type="text" style="width: 15px;" id="final_17" name="final_17"></td>
                      <td><input type="text" style="width: 15px;" id="final_16" name="final_16"></td>
                      <td><input type="text" style="width: 15px;" id="final_15" name="final_15"></td>
                      <td><input type="text" style="width: 15px;" id="final_14" name="final_14"></td>
                      <td><input type="text" style="width: 15px;" id="final_13" name="final_13"></td>
                      <td><input type="text" style="width: 15px;" id="final_12" name="final_12"></td>
                      <td><input type="text" style="width: 15px;" id="final_11" name="final_11"></td>
                      <td>Final</td>                      
                      <td><input type="text" style="width: 15px;" id="final_21" name="final_21"></td>
                      <td><input type="text" style="width: 15px;" id="final_22" name="final_22"></td>
                      <td><input type="text" style="width: 15px;" id="final_23" name="final_23"></td>
                      <td><input type="text" style="width: 15px;" id="final_24" name="final_24"></td>
                      <td><input type="text" style="width: 15px;" id="final_25" name="final_25"></td>
                      <td><input type="text" style="width: 15px;" id="final_26" name="final_26"></td>
                      <td><input type="text" style="width: 15px;" id="final_27" name="final_27"></td>
                      <td><input type="text" style="width: 15px;" id="final_28" name="final_28"></td>
                      <td><input type="text" style="width: 15px;" id="porcentaje_final_1" name="porcentaje_final_1"> %</td>
                    </tr>
                    <tr>
                      <td><input type="text" placeholder="Fecha" style="width: 75px;" id="fecha_basica_2" name="fecha_basica_2"></td>
                      <td><input type="text" style="width: 15px;" id="basica_48" name="basica_48"></td>
                      <td><input type="text" style="width: 15px;" id="basica_47" name="basica_47"></td>
                      <td><input type="text" style="width: 15px;" id="basica_46" name="basica_46"></td>
                      <td><input type="text" style="width: 15px;" id="basica_45" name="basica_45"></td>
                      <td><input type="text" style="width: 15px;" id="basica_44" name="basica_44"></td>
                      <td><input type="text" style="width: 15px;" id="basica_43" name="basica_43"></td>
                      <td><input type="text" style="width: 15px;" id="basica_42" name="basica_42"></td>
                      <td><input type="text" style="width: 15px;" id="basica_41" name="basica_41"></td>
                      <td>Post T. Básica</td>                      
                      <td><input type="text" style="width: 15px;" id="basica_31" name="basica_31"></td>
                      <td><input type="text" style="width: 15px;" id="basica_32" name="basica_32"></td>
                      <td><input type="text" style="width: 15px;" id="basica_33" name="basica_33"></td>
                      <td><input type="text" style="width: 15px;" id="basica_34" name="basica_34"></td>
                      <td><input type="text" style="width: 15px;" id="basica_35" name="basica_35"></td>
                      <td><input type="text" style="width: 15px;" id="basica_36" name="basica_36"></td>
                      <td><input type="text" style="width: 15px;" id="basica_37" name="basica_37"></td>
                      <td><input type="text" style="width: 15px;" id="basica_38" name="basica_38"></td>
                      <td><input type="text" style="width: 15px;" id="porcentaje_basica_2" name="porcentaje_basica_2"> %</td>
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
                      <td><input type="text" placeholder="Fecha" style="width: 75px;" id="fecha_final_2" name="fecha_final_2"></td>
                      <td><input type="text" style="width: 15px;" id="final_48" name="final_48"></td>
                      <td><input type="text" style="width: 15px;" id="final_47" name="final_47"></td>
                      <td><input type="text" style="width: 15px;" id="final_46" name="final_46"></td>
                      <td><input type="text" style="width: 15px;" id="final_45" name="final_45"></td>
                      <td><input type="text" style="width: 15px;" id="final_44" name="final_44"></td>
                      <td><input type="text" style="width: 15px;" id="final_43" name="final_43"></td>
                      <td><input type="text" style="width: 15px;" id="final_42" name="final_42"></td>
                      <td><input type="text" style="width: 15px;" id="final_41" name="final_41"></td>
                      <td>Final</td>                      
                      <td><input type="text" style="width: 15px;" id="final_31" name="final_31"></td>
                      <td><input type="text" style="width: 15px;" id="final_32" name="final_32"></td>
                      <td><input type="text" style="width: 15px;" id="final_33" name="final_33"></td>
                      <td><input type="text" style="width: 15px;" id="final_34" name="final_34"></td>
                      <td><input type="text" style="width: 15px;" id="final_35" name="final_35"></td>
                      <td><input type="text" style="width: 15px;" id="final_36" name="final_36"></td>
                      <td><input type="text" style="width: 15px;" id="final_37" name="final_37"></td>
                      <td><input type="text" style="width: 15px;" id="final_38" name="final_38"></td>
                      <td><input type="text" style="width: 15px;" id="porcentaje_final_2" name="porcentaje_final_2"> %</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div><!-- fin row -->

            <label><strong>Observaciones</strong></label>
            <textarea placeholder="Observaciones" style="width: 90%;" id="observaciones" name="observaciones"></textarea>
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
                    <td><input type="text" style="width: 20px;" id="bolsa_m_18" name="bolsa_m_18"></td>
                    <td><input type="checkbox" id="bolsa_f_18" name="bolsa_f_18" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_18" name="bolsa_h_18"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_18" name="bolsa_v_18"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_18" name="bolsa_p_18"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_18" name="bolsa_d_18"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_18" name="bolsa_m2_18"></td>
                    <td>18</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_17" name="bolsa_m_17"></td>
                    <td><input type="checkbox" id="bolsa_f_17" name="bolsa_f_17" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_17" name="bolsa_h_17"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_17" name="bolsa_v_17"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_17" name="bolsa_p_17"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_17" name="bolsa_d_17"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_17" name="bolsa_m2_17"></td>
                    <td>17</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_16" name="bolsa_m_16"></td>
                    <td><input type="checkbox" id="bolsa_f_16" name="bolsa_f_16" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_16" name="bolsa_h_16"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_16" name="bolsa_v_16"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_16" name="bolsa_p_16"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_16" name="bolsa_d_16"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_16" name="bolsa_m2_16"></td>
                    <td>16</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_15" name="bolsa_m_15"></td>
                    <td><input type="checkbox" id="bolsa_f_15" name="bolsa_f_15" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_15" name="bolsa_h_15"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_15" name="bolsa_v_15"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_15" name="bolsa_p_15"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_15" name="bolsa_d_15"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_15" name="bolsa_m2_15"></td>
                    <td>15</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_14" name="bolsa_m_14"></td>
                    <td><input type="checkbox" id="bolsa_f_14" name="bolsa_f_14" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_14" name="bolsa_h_14"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_14" name="bolsa_v_14"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_14" name="bolsa_p_14"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_14" name="bolsa_d_14"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_14" name="bolsa_m2_14"></td>
                    <td>14</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_13" name="bolsa_m_13"></td>
                    <td><input type="checkbox" id="bolsa_f_13" name="bolsa_f_13" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_13" name="bolsa_h_13"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_13" name="bolsa_v_13"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_13" name="bolsa_p_13"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_13" name="bolsa_d_13"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_13" name="bolsa_m2_13"></td>
                    <td>13</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_12" name="bolsa_m_12"></td>
                    <td><input type="checkbox" id="bolsa_f_12" name="bolsa_f_12" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_12" name="bolsa_h_12"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_12" name="bolsa_v_12"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_12" name="bolsa_p_12"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_12" name="bolsa_d_12"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_12" name="bolsa_m2_12"></td>
                    <td>12</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_11" name="bolsa_m_11"></td>
                    <td><input type="checkbox" id="bolsa_f_11" name="bolsa_f_11" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_11" name="bolsa_h_11"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_11" name="bolsa_v_11"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_11" name="bolsa_p_11"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_11" name="bolsa_d_11"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_11" name="bolsa_m2_11"></td>
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
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_28" name="bolsa_m2_28"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_28" name="bolsa_d_28"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_28" name="bolsa_p_28"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_28" name="bolsa_v_28"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_28" name="bolsa_h_28"></td>
                    <td><input type="checkbox" id="bolsa_f_28" name="bolsa_f_28" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_28" name="bolsa_m_28"></td>
                  </tr>
                  <tr>
                    <td>27</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_27" name="bolsa_m2_27"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_27" name="bolsa_d_27"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_27" name="bolsa_p_27"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_27" name="bolsa_v_27"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_27" name="bolsa_h_27"></td>
                    <td><input type="checkbox" id="bolsa_f_27" name="bolsa_f_27" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_27" name="bolsa_m_27"></td>
                  </tr>
                  <tr>
                    <td>26</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_26" name="bolsa_m2_26"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_26" name="bolsa_d_26"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_26" name="bolsa_p_26"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_26" name="bolsa_v_26"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_26" name="bolsa_h_26"></td>
                    <td><input type="checkbox" id="bolsa_f_26" name="bolsa_f_26" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_26" name="bolsa_m_26"></td>
                  </tr>
                  <tr>
                    <td>25</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_25" name="bolsa_m2_25"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_25" name="bolsa_d_25"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_25" name="bolsa_p_25"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_25" name="bolsa_v_25"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_25" name="bolsa_h_25"></td>
                    <td><input type="checkbox" id="bolsa_f_25" name="bolsa_f_25" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_25" name="bolsa_m_25"></td>
                  </tr>
                  <tr>
                    <td>24</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_24" name="bolsa_m2_24"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_24" name="bolsa_d_24"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_24" name="bolsa_p_24"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_24" name="bolsa_v_24"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_24" name="bolsa_h_24"></td>
                    <td><input type="checkbox" id="bolsa_f_24" name="bolsa_f_24" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_24" name="bolsa_m_24"></td>
                  </tr>
                  <tr>
                    <td>23</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_23" name="bolsa_m2_23"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_23" name="bolsa_d_23"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_23" name="bolsa_p_23"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_23" name="bolsa_v_23"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_23" name="bolsa_h_23"></td>
                    <td><input type="checkbox" id="bolsa_f_23" name="bolsa_f_23" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_23" name="bolsa_m_23"></td>
                  </tr>
                  <tr>
                    <td>22</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_22" name="bolsa_m2_22"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_22" name="bolsa_d_22"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_22" name="bolsa_p_22"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_22" name="bolsa_v_22"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_22" name="bolsa_h_22"></td>
                    <td><input type="checkbox" id="bolsa_f_22" name="bolsa_f_22" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_22" name="bolsa_m_22"></td>
                  </tr>
                  <tr>
                    <td>21</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_21" name="bolsa_m2_21"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_21" name="bolsa_d_21"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_21" name="bolsa_p_21"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_21" name="bolsa_v_21"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_21" name="bolsa_h_21"></td>
                    <td><input type="checkbox" id="bolsa_f_21" name="bolsa_f_21" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_21" name="bolsa_m_21"></td>
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
                    <td><input type="text" style="width: 20px;" id="bolsa_m_41" name="bolsa_m_41"></td>                    
                    <td><input type="checkbox" id="bolsa_f_41" name="bolsa_f_41" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_41" name="bolsa_h_41"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_41" name="bolsa_v_41"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_41" name="bolsa_p_41"></td>
                    <td><input  type="text" style="width: 20px;" id="bolsa_d_41" name="bolsa_d_41"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_41" name="bolsa_m2_41"></td>
                    <td>41</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_42" name="bolsa_m_42"></td>                    
                    <td><input type="checkbox" id="bolsa_f_42" name="bolsa_f_42" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_42" name="bolsa_h_42"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_42" name="bolsa_v_42"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_42" name="bolsa_p_42"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_42" name="bolsa_d_42"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_42" name="bolsa_m2_42"></td>
                    <td>42</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_43" name="bolsa_m_43"></td>                    
                    <td><input type="checkbox" id="bolsa_f_43" name="bolsa_f_43" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_43" name="bolsa_h_43"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_43" name="bolsa_v_43"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_43" name="bolsa_p_43"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_43" name="bolsa_d_43"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_43" name="bolsa_m2_43"></td>
                    <td>43</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_44" name="bolsa_m_44"></td>                    
                    <td><input type="checkbox" id="bolsa_f_44" name="bolsa_f_44" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_44" name="bolsa_h_44"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_44" name="bolsa_v_44"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_44" name="bolsa_p_44"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_44" name="bolsa_d_44"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_44" name="bolsa_m2_44"></td>
                    <td>44</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_45" name="bolsa_m_45"></td>                    
                    <td><input type="checkbox" id="bolsa_f_45" name="bolsa_f_45" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_45" name="bolsa_h_45"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_45" name="bolsa_v_45"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_45" name="bolsa_p_45"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_45" name="bolsa_d_45"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_45" name="bolsa_m2_45"></td>
                    <td>45</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_46" name="bolsa_m_46"></td>                    
                    <td><input type="checkbox" id="bolsa_f_46" name="bolsa_f_46" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_46" name="bolsa_h_46"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_46" name="bolsa_v_46"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_46" name="bolsa_p_46"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_46" name="bolsa_d_46"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_46" name="bolsa_m2_46"></td>
                    <td>46</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_47" name="bolsa_m_47"></td>                    
                    <td><input type="checkbox" id="bolsa_f_47" name="bolsa_f_47" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_47" name="bolsa_h_47"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_47" name="bolsa_v_47"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_47" name="bolsa_p_47"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_47" name="bolsa_d_47"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_47" name="bolsa_m2_47"></td>
                    <td>47</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_48" name="bolsa_m_48"></td>                    
                    <td><input type="checkbox" style="width: 20px;" id="bolsa_f_48" name="bolsa_f_48" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_48" name="bolsa_h_48"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_48" name="bolsa_v_48"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_48" name="bolsa_p_48"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_d_48" name="bolsa_d_48"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_48" name="bolsa_m2_48"></td>
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
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_31" name="bolsa_m2_31"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_31" name="bolsa_d_31"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_31" name="bolsa_p_31"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_31" name="bolsa_v_31"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_31" name="bolsa_h_31"></td>
                    <td><input type="checkbox" id="bolsa_f_31" name="bolsa_f_31" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_31" name="bolsa_m_31"></td>
                  </tr>
                  <tr>
                    <td>32</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_32" name="bolsa_m2_32"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_32" name="bolsa_d_32"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_32" name="bolsa_p_32"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_32" name="bolsa_v_32"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_32" name="bolsa_h_32"></td>
                    <td><input type="checkbox" id="bolsa_f_32" name="bolsa_f_32" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_32" name="bolsa_m_32"></td>
                  </tr>
                  <tr>
                    <td>33</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_33" name="bolsa_m2_33"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_33" name="bolsa_d_33"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_33" name="bolsa_p_33"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_33" name="bolsa_v_33"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_33" name="bolsa_h_33"></td>
                    <td><input type="checkbox" id="bolsa_f_33" name="bolsa_f_33" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_33" name="bolsa_m_33"></td>
                  </tr>
                  <tr>
                    <td>34</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_34" name="bolsa_m2_34"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_34" name="bolsa_d_34"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_34" name="bolsa_p_34"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_34" name="bolsa_v_34"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_34" name="bolsa_h_34"></td>
                    <td><input type="checkbox" id="bolsa_f_34" name="bolsa_f_34" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_34" name="bolsa_m_34"></td>
                  </tr>
                  <tr>
                    <td>35</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_35" name="bolsa_m2_35"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_35" name="bolsa_d_35"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_35" name="bolsa_p_35"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_35" name="bolsa_v_35"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_35" name="bolsa_h_35"></td>
                    <td><input type="checkbox" id="bolsa_f_35" name="bolsa_f_35" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_35" name="bolsa_m_35"></td>
                  </tr>
                  <tr>
                    <td>36</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_36" name="bolsa_m2_36"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_36" name="bolsa_d_36"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_36" name="bolsa_p_36"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_36" name="bolsa_v_36"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_36" name="bolsa_h_36"></td>
                    <td><input type="checkbox" id="bolsa_f_36" name="bolsa_f_36" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_36" name="bolsa_m_36"></td>
                  </tr>
                  <tr>
                    <td>37</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_37" name="bolsa_m2_37"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_37" name="bolsa_d_37"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_37" name="bolsa_p_37"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_37" name="bolsa_v_37"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_37" name="bolsa_h_37"></td>
                    <td><input type="checkbox" id="bolsa_f_37" name="bolsa_f_37" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_37" name="bolsa_m_37"></td>
                  </tr>
                  <tr>
                    <td>38</td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m2_38" name="bolsa_m2_38"></td>                    
                    <td><input type="text" style="width: 20px;" id="bolsa_d_38" name="bolsa_d_38"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_p_38" name="bolsa_p_38"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_v_38" name="bolsa_v_38"></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_h_38" name="bolsa_h_38"></td>
                    <td><input type="checkbox" id="bolsa_f_38" name="bolsa_f_38" checked></td>
                    <td><input type="text" style="width: 20px;" id="bolsa_m_38" name="bolsa_m_38"></td>
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
                    <td>1. Sistémico <input type="radio" id="planificacion_tratamiento" name="planificacion_tratamiento" value="1" checked></td>
                    <td>2. Terapira Básica <input type="radio" id="planificacion_tratamiento" name="planificacion_tratamiento" value="2"></td>
                    <td>3. Quirúrgico <input type="radio" id="planificacion_tratamiento" name="planificacion_tratamiento" value="3"></td>
                    <td>4. Mantenimiento: <input type="radio" id="planificacion_tratamiento" name="planificacion_tratamiento" value="4"> revisión cada <input type="text" style="width: 15px;" id="revision_meses" name="revision_meses"> mes(es). </td>
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
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_1" name="fecha_tratamiento_1"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_1" name="tratamiento_1"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_2" name="fecha_tratamiento_2"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_2" name="tratamiento_2"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_3" name="fecha_tratamiento_3"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_3" name="tratamiento_3"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_4" name="fecha_tratamiento_4"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_4" name="tratamiento_4"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_5" name="fecha_tratamiento_5"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_5" name="tratamiento_5"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_6" name="fecha_tratamiento_6"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_6" name="tratamiento_6"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_7" name="fecha_tratamiento_7"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_7" name="tratamiento_7"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_8" name="fecha_tratamiento_8"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_8" name="tratamiento_8"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_9" name="fecha_tratamiento_9"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_9" name="tratamiento_9"></td>
                    <!--<td><input type="text" placeholder="Firma"></td>-->
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Fecha" style="width: 80px;" id="fecha_tratamiento_10" name="fecha_tratamiento_10"></td>
                    <td><input type="text" placeholder="Tratamiento" id="tratamiento_10" name="tratamiento_10"></td>
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
              <input type="text" placeholder="Folio de Recibos del Tx" class="span4" id="folio_recibos_tx" name="folio_recibos_tx"> 
            </div>
          </div>

          <br />

          <div class="row">
            <div class="span4">
              <label><strong>Numeros de Recibos Radiogaficos</strong></label>
              <input type="text" placeholder="Numeros de Recibos Radiogaficos" class="span4" id="numero_recibos_radiograficos" name="numero_recibos_radiograficos"> 
            </div>
          </div>

          <br />

          <div class="row">
            <div class="span4">
              <label><strong>Tratamiento</strong></label>
              <input type="text" placeholder="Tratamiento" class="span4" id="tratamiento_11" name="tratamiento_11"> 
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

        <div align="row">
          <input type="submit" class="btn btn-institucional guardar" name="guardar" value="Guardar">
            
          <a href="../clinica/formatohistoriaperiodoncia.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
        </div>
        
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->      

<?php include("../footer2.php"); ?>