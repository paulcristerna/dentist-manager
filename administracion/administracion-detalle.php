<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="administraciones">
<script src="validacion_administracion.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Administracion.php"; ?>

        <div class="span9">
          
          <h2>Detalle Administración</h2>
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
            
        <div class="well">
            <div class="row">
              <div class="span3"> 
                <input type="hidden" name="administracion" value="<?php echo $_GET['administracion']; ?>">
                <label><strong>Fecha de Inicio</strong></label>
                <p><?php echo $FechaInicio; ?></p> 
              </div>
              <div class="span3"> 
                <label><strong>Fecha de Fin</strong></label>
                <p><?php echo $FechaFin; ?></p>           
              </div>
            </div>

            <div class="row">
              <div class="span3">
                <br>
                <label><strong>Director(a)</strong></label>
                <p><?php echo $Datos_Administracion['NombreDirector'].' '.$Datos_Administracion['ApellidoPaternoDirector'].' '.$Datos_Administracion['ApellidoMaternoDirector']; ?></p>
              </div>

              <div class="span3">
              <br>          
              <label><strong>Secretario Administrativo</strong></label>
              <p><?php echo $Datos_Administracion['NombreSecretarioAdministrativo'].' '.$Datos_Administracion['ApellidoPaternoSecretarioAdministrativo'].' '.$Datos_Administracion['ApellidoMaternoSecretarioAdministrativo']; ?></p>
              </div>
            </div>

            <div class="row">
              <div class="span3">  
              <br>       
              <label><strong>Secretario Academico</strong></label>
              <p><?php echo $Datos_Administracion['NombreSecretarioAcademico'].' '.$Datos_Administracion['ApellidoPaternoSecretarioAcademico'].' '.$Datos_Administracion['ApellidoMaternoSecretarioAcademico']; ?></p>
              </div>
            </div>

            <div class="row"> 

              <div class="span3">  
              <br>   
              <label><strong>Folio de Entradas</strong></label>
              <p><?php echo $Datos_Administracion['FolioEntradasMaterial']; ?></p>
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Folio de Solicitudes</strong></label>
              <p><?php echo $Datos_Administracion['FolioDevolucionesMaterial']; ?></p>
              </div>
            </div>

            <div class="row">  
              <div class="span3">  
                <br>   
                <label><strong>Folio de Salidas</strong></label>
                <p><?php echo $Datos_Administracion['FolioSalidasMaterial']; ?></p>
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Folio de Devoluciones</strong></label>
              <p><?php echo $Datos_Administracion['FolioDevolucionesMaterial']; ?></p>
              </div>
            </div>
			
			<div class="row">
			  <div class="span2">  
              <br>   
              <label><strong>Folio de Cobros</strong></label>
              <p><?php echo $Datos_Administracion['FolioCobrosCaja']; ?></p>
              </div>
            </div>

            <div class="row">
              <div class="span5"> 
                <br>
                <label><strong>Activo/Inactivo</strong></label>
                <p><?php echo ($Datos_Administracion['Activo'] == '0' ? "Inactivo":"Activo"); ?></p>
              </div>
            </div>           
          </div> 
          <div class="row">
            <a href="../administracion/administraciones.php" class="btn btn-danger pull-right "> Atras</a>
          </div>         
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>
