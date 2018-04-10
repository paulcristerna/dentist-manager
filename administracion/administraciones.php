<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="administraciones">
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Administracion.php"; ?>

        <div class="span9">

          <a href="../administracion/administracion-nueva.php" class="btn btn-institucional pull-left"><i class="icon-plus-sign icon-white"></i> Agregar Administración</a>

          <div class="input-append pull-right">
            <form method="get" action="administraciones.php">
                <input class="span3" type="text" value="<?php if(isset($_GET['buscar'])): echo $_GET['buscar']; endif; ?>" placeholder="Buscar" name="buscar">
              <input type="submit" class="btn btn-institucional" value="Buscar"> 
            </form>
          </div>

          <?php if(isset($_GET['exito'])): ?>
          <div class="row">
            <div class="span9">
              <div class="alert alert-success"><?php echo $_GET['exito']; ?>.</div>
            </div>
          </div> 
          <?php endif; ?> 
			
		  <?php if(isset($_GET['error'])): ?>
          <div class="row">
            <div class="span9">
              <div class="alert alert-danger"><?php echo $_GET['error']; ?>.</div>
            </div>
          </div> 
          <?php endif; ?>
         
          <div class="row">
            <div class="span9">
                <a href="reportes/administraciones-generar-pdf.php?buscar=<?php echo (isset($_GET['buscar']) ? $_GET['buscar']:"") ?>" class="btn btn-institucional pull-right" target="_blank">Generar Reporte</a>
            </div>
          </div>

          <table class="table table-striped">

            <thead>
              <tr>
                <th>Director</th>
                <th>Sec. Administrativo</th>
                <th>Sec. Academico</th>
                <th>Periodo</th>
                <th>Estado</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <?php 
                //catalogo de administraciones
                $Administracion = new Administracion();

                if(isset($_GET['buscar']))
                {
                  $Administracion->Catalogo_Administracion($_GET['buscar']); 
                }
                else
                {
                  $Administracion->Catalogo_Administracion(); 
                }                
              ?>
            </tbody>
          </table>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>