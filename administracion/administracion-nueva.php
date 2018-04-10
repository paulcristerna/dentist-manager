<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="administraciones">
<script src="validacion_administracion.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Administracion.php"); ?>

        <div class="span9">
          
          <h2>Agregar Administración</h2>

          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php
          $Administracion = new Administracion();
          $Folios = $Administracion->Obtener_Folios();
          ?>

          <form method="post" action="validacion_administracion.php" onsubmit="return validacion_administracion()">

          <div class="well">
            <div class="row">
              <div class="span3"> 
                <label><strong>Fecha de Inicio</strong><span class="obligatorio">*</span></label>
                <input type="text" name="fecha-inicio" placeholder="Fecha de Inicio" id="fecha-inicio" class="calendario" maxlength="10"> 
              </div>
              <div class="span3"> 
                <label><strong>Fecha de Fin</strong><span class="obligatorio">*</span> </label>
                <input type="text" name="fecha-fin" placeholder="Fecha de Fin" id="fecha-fin" class="calendario" maxlength="10">
              </div>
            </div>

            <div class="row">
              <div class="span3">
                <br>
                <label><strong>Director(a)<span class="obligatorio">*</span></strong></label>
                <select class="input-block-level2" name="director" id="director"> 
                  <option value="0">------</option>
                  <?php 
                    //listado de directores
                    $Usuario = new Usuario();
                    $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Director');
                  ?>
                  
                </select>
              </div>

              <div class="span3">
              <br>          
              <label><strong>Secretario Administrativo</strong><span class="obligatorio">*</span></label>
                <select class="input-block-level2" name="secretario-administrativo" id="secretario-administrativo">
                  <option value="0" selected>------</option>
                  <?php 
                    //listado de secretarios administrativos
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
                  <option value="0" selected>------</option>
                  <?php 
                    //listado de secretario academico
                    $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Secretario Academico');
                  ?>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="span2">
                <br>
                <a class="btn btn-default" name="reiniciar-folios" id="reiniciar-folios">Reiniciar Folios <i class="icon-refresh"></i></a>
              </div>
            </div>

            <div class="row"> 

              <div class="span3">  
              <br>  
              <label><strong>Folio de Entradas</strong></label>
              <input type="text" value="<?php echo $Folios[0]; ?>" id="folio-entradas" name="folio-entradas" class="input-block-level2 solo-numeros" maxlength="7">
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Folio de Solicitudes</strong></label>
              <input type="text" value="<?php echo $Folios[1]; ?>" id="folio-solicitudes" name="folio-solicitudes" class="input-block-level2 solo-numeros" maxlength="7">
              </div>
            </div>

            <div class="row">  
              <div class="span3">  
                <br>  
                <label><strong>Folio de Salidas</strong></label>
                <input type="text" value="<?php echo $Folios[2]; ?>" id="folio-salidas" name="folio-salidas" class="input-block-level2 solo-numeros" maxlength="7">
              </div>

              <div class="span2">  
              <br>   
              <?php
              ?>
              <label><strong>Folio de Devoluciones</strong></label>
              <input type="text" value="<?php echo $Folios[3]; ?>" id="folio-devoluciones" name="folio-devoluciones" class="input-block-level2 solo-numeros" maxlength="7">
              </div>
            </div>
			  
			<div class="row">
				<div class="span2">  
				  <br>   
				  <?php
				  ?>
				  <label><strong>Folio de Cobros</strong></label>
				  <input type="text" value="<?php echo $Folios[4]; ?>" id="folio-cobros-caja" name="folio-cobros-caja" class="input-block-level2 solo-numeros" maxlength="7">
              </div>
			</div>
            
          </div>
          
          <div align="row">
            <input type="submit" class="btn btn-institucional guardar" id="guardar" name="guardar" value="Guardar" id="Guardar">
            <a href="../administracion/administraciones.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div>
          </form>
          
        </div>

      </div><!--/.row -->

      
      

<?php include("../footer2.php"); ?>