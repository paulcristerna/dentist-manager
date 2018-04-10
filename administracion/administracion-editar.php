<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="administraciones">
<script src="validacion_administracion.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Administracion.php"; ?>

        <div class="span9">
          
          <h2>Editar Administración</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php 
            $Administracion = new Administracion($_GET['administracion']);
            $Datos_Administracion = $Administracion->Obtener_Administracion();

            date_default_timezone_set('America/Mazatlan');

            $date = new DateTime($Datos_Administracion['FechaInicio']);
            $FechaInicio = $date->format('d-m-Y'); 

            $date = new DateTime($Datos_Administracion['FechaFin']);
            $FechaFin = $date->format('d-m-Y');
          ?>

          <form method="post" action="validacion_administracion.php" onsubmit="return validacion_administracion()">

          <div class="well">
            <div class="row">
              <div class="span3"> 
                <input type="hidden" name="administracion" value="<?php echo $_GET['administracion']; ?>">
                <label><strong>Fecha de Inicio</strong><span class="obligatorio">*</span></label>
                <input type="text" name="fecha-inicio" value="<?php echo $FechaInicio; ?>" id="fecha-inicio" class="calendario" placeholder="Fecha de Inicio" maxlength="10"> 
              </div>
              <div class="span3"> 
                <label><strong>Fecha de Fin</strong><span class="obligatorio">*</span> </label>
                <input type="text" name="fecha-fin" value="<?php echo $FechaFin; ?>" class="calendario" id="fecha-fin" placeholder="Fecha de Fin" maxlength="10">           
              </div>
            </div>

            <div class="row">
              <div class="span3">
                <br>
                <label><strong>Director(a)<span class="obligatorio">*</span></strong></label>
                <select class="input-block-level2" name="director" id="director"> 
                  <option selected>---</option>
                  <?php 
                    //listado de directores
                    $Usuario = new Usuario($Datos_Administracion['IdDirector']);
                    $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Director');
                  ?>
                  
                </select>
              </div>

              <div class="span3">
              <br>          
              <label><strong>Secretario Administrativo</strong><span class="obligatorio">*</span></label>
                <select class="input-block-level2" name="secretario-administrativo" id="secretario-administrativo">
                  <option selected>---</option>
                  <?php 
                    //listado de directores
                    $Usuario = new Usuario($Datos_Administracion['IdSecretarioAdministrativo']);
                    $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Secretario Administrativo');
                  ?>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="span3">  
              <br>       
              <label><strong>Secretario Academico</strong><span class="obligatorio">*</span></label>
                <select class="input-block-level2" name="secretario-academico" id="secretario-academico">
                  <option selected>---</option>
                  <?php 
                    //listado de directores
                    $Usuario = new Usuario($Datos_Administracion['IdSecretarioAcademico']);
                    $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Secretario Academico');
                  ?>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="span2">
                <br>
                <a class="btn btn-default" id="reiniciar-folios">Reiniciar Folios <i class="icon-refresh"></i></a>
              </div>
            </div>

            <div class="row"> 

              <div class="span3">  
              <br>   
              <label><strong>Folio de Entradas</strong></label>
              <input type="text" value="<?php echo $Datos_Administracion['FolioEntradasMaterial']; ?>" id="folio-entradas" name="folio-entradas" class="input-block-level2 solo-numeros" maxlength="7">
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Folio de Solicitudes</strong></label>
              <input type="text" value="<?php echo $Datos_Administracion['FolioDevolucionesMaterial']; ?>" id="folio-solicitudes" name="folio-solicitudes" class="input-block-level2 solo-numeros" maxlength="7">
              </div>
            </div>

            <div class="row">  
              <div class="span3">  
                <br>   
                <label><strong>Folio de Salidas</strong></label>
                <input type="text" value="<?php echo $Datos_Administracion['FolioSalidasMaterial']; ?>" id="folio-salidas" name="folio-salidas" class="input-block-level2 solo-numeros" maxlength="7">
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Folio de Devoluciones</strong></label>
              <input type="text" value="<?php echo $Datos_Administracion['FolioDevolucionesMaterial']; ?>" id="folio-devoluciones" name="folio-devoluciones" class="input-block-level2 solo-numeros" maxlength="7">
              </div>
            </div>
			  
			<div class="row">
				<div class="span2">  
				  <br>   
				  <?php
				  ?>
				  <label><strong>Folio de Cobros</strong></label>
				  <input type="text" value="<?php echo $Datos_Administracion['FolioCobrosCaja']; ?>" id="folio-cobros-caja" name="folio-cobros-caja" class="input-block-level2 solo-numeros" maxlength="7">
              </div>
			</div>

            <div class="row">
              <div class="span5"> 
                <br>
                <label><strong>Activo/Inactivo</strong></label>
                <select name="activo">
                  <option value="0" <?php echo ($Datos_Administracion['Activo'] == '0' ? "selected":""); ?>>No</option>
                  <option value="1" <?php echo ($Datos_Administracion['Activo'] == '1' ? "selected":""); ?>>Si</option>
                </select>
              </div>
            </div>           
          </div>

          <div align="row">
            <input type="submit" class="btn btn-institucional guardar" name="editar" value="Guardar" id="Guardar">
            <a href="../administracion/administraciones.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div>
          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>
