<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="devolucion-material">

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Devolucion_Material.php"; ?>

        <div class="span9">

          <a href="../almacen/devolucion-material-nueva.php" class="btn btn-institucional pull-left"><i class="icon-plus-sign icon-white"></i> Registrar Devolución de Material</a>

          <div class="input-append pull-right">
            <form method="get" action="devoluciones-materiales.php">
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
                <a href="reportes/devoluciones-material-generar-pdf.php?buscar=<?php echo (isset($_GET['buscar']) ? $_GET['buscar']:""); ?>" class="btn btn-institucional pull-right" target="_blank">Generar Reporte</a>
            </div>
          </div>

          <table class="table table-striped">

            <thead>
              <tr>
                <th>Folio de Devolución</th>
                <th>Departamento/Comunidad</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <?php 
                //catalogo de devoluciones de material
                $Devolucion_Material = new Devolucion_Material();

				if(isset($_GET['buscar'])):
					$Devolucion_Material->Catalogo_Devolucion_Material_Administrador($_GET['buscar']);
				else:
					$Devolucion_Material->Catalogo_Devolucion_Material_Administrador();
				endif;
              ?>
            </tbody>
          </table>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>