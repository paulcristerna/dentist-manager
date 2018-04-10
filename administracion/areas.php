<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="areas">
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include "../menu.php"; ?>
        <?php include "../core-saec/Area.php"; ?>

        <div class="span9">

          <a href="../administracion/area-nueva.php" class="btn btn-institucional pull-left"><i class="icon-plus-sign icon-white"></i> Agregar Área</a>

          <div class="input-append pull-right">
            <form method="get" action="areas.php">
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
                <a href="reportes/areas-generar-pdf.php?buscar=<?php echo (isset($_GET['buscar']) ? $_GET['buscar']:"") ?>" class="btn btn-institucional pull-right" target="_blank">Generar Reporte</a>
              </div>
          </div>

          <table class="table table-striped">

            <thead>
              <tr>
                <th>Nombre del Área</th>
                <th>Descripción</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <?php // imprimir datos de la BD
                $Area = new Area();

                if(isset($_GET['buscar'])):
                    $Datos = $Area->Catalogo_Areas($_GET['buscar']);
                else:
                    $Datos = $Area->Catalogo_Areas();
                endif;
              ?>
            </tbody>
          </table>
        </div>

      </div><!--/.row -->
      
      
<?php include("../footer2.php"); ?>