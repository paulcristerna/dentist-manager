<?php include("../header2.php"); ?>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Formato_Indice_Preventivo_Operatoria.php"); ?>
        <?php include("../core-saec/Pareja_Clinica.php"); ?>

        <div class="span9">
            
        <?php if($SIS_Datos_Usuario['NombrePuesto'] == "Alumno Operador/Asistente"): ?>
          <a href="../clinica/formatoindicepreventivooperatoria-nuevo.php" class="btn btn-institucional pull-left">
            <i class="icon-plus-sign icon-white"></i> Llenar Nuevo Formato Indice y Preventivo de Operatoria
          </a>
        <?php endif; ?>

          <div class="input-append pull-right">
            <form method="get" action="formatoindicepreventivooperatoria.php">
                <input class="span3" type="text" value="<?php if(isset($_GET['buscar'])): echo $_GET['buscar']; endif; ?>" placeholder="Buscar" name="buscar">
              <input type="submit" class="btn btn-institucional" value="Buscar"> 
            </form>
          </div>
            
          <?php if(isset($_GET['exito'])): ?>
			<div class="row">
			  <div class="span9">
				<div class="alert alert-success"><?php echo $_GET['exito']; ?></div>
			  </div>
			</div>              
		  <?php endif; ?> 

		  <?php if(isset($_GET['error'])): ?>
			<div class="row">
			  <div class="span9">
				<div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
			  </div>
			</div>              
		  <?php endif; ?>
            
          <div class="row">
            <div class="span9">
                <a href="reportes/formatosindicepreventivooperatoria-generar-pdf.php?buscar=<?php echo (isset($_GET['buscar']) ? $_GET['buscar']:"") ?>" class="btn btn-institucional pull-right" target="_blank">Generar Reporte</a>
            </div>
          </div>

          <table class="table table-striped">

            <thead>
              <tr>
                <th>Nombre del Paciente</th>
                <th>Pareja Clínica</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <?php 
                $Formato_Indice_Preventivo_Operatoria = new Formato_Indice_Preventivo_Operatoria();

                $Pareja_Clinica = new Pareja_Clinica();
                    
                if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador'){

                    if(isset($_GET['buscar'])):
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Administrador($_GET['buscar']);
                    else:
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Administrador();
                    endif;
                }
                else if($SIS_Datos_Usuario['NombrePuesto'] == 'Medico Titular'){    
                    $Pareja_Clinica->IdMedicoTitular = $SIS_Usuario;
                    $DatosParejaClinica = $Pareja_Clinica->Buscar_Pareja_Clinica_Medico_TItular();   
                    
                    $Formato_Indice_Preventivo_Operatoria->ParejaClinica = $DatosParejaClinica['IdParejaClinica'];
                    
                    if(isset($_GET['buscar'])):
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Medico_Titular($_GET['buscar']);
                    else:
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Medico_Titular();
                    endif;
                }
                else if($SIS_Datos_Usuario['NombrePuesto'] == 'Alumno Operador/Asistente'){
                    
                    $Pareja_Clinica->IdAlumnoOpsAs1 = $SIS_Usuario;
                    $DatosParejaClinica = $Pareja_Clinica->Buscar_Pareja_Clinica_Alumno_Op_As();   
                    
                    $Formato_Indice_Preventivo_Operatoria->IdParejaClinica = $DatosParejaClinica['IdParejaClinica'];

                    if(isset($_GET['buscar'])):
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Alumno_Op_As($_GET['buscar']);
                    else:
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Alumno_Op_As();
                    endif;
                }
              ?>    
            </tbody>
          </table>
        </div>

      </div><!--/.row -->
      <input type="hidden" id="ventana" value="formato-indice-preventivo-operatoria">

<?php include("../footer2.php"); ?>