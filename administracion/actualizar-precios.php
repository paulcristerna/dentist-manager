<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="actualizar-precios">
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>

        <div class="span9">
          
          <h2>Actualizar Precios</h2>
            
          <?php if(isset($_GET['mensaje'])): ?>
          <div class="row">
            <div class="span9">
              <div class="alert alert-success"><?php echo $_GET['mensaje']; ?></div>
            </div>
          </div>              
          <?php endif; ?>    
            
        <div class="well">
            <table id="tabla" class="table table-striped" style="overflow-y:scroll">
              <thead> 
                <tr>
                  <th>Codigo</th>
                  <th>Material</th>
                  <th>Precio Actual</th>
                  <th>Precio Nuevo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  // imprimir datos de la BD                  
                  $Material = new Material();
                  $Material->CatalogoActualizarPrecios();                  
                ?>                
              </tbody>

            </table>
        </div>
            <!--<div class="row">
            <a href="../administracion/administraciones.php" class="btn btn-default pull-right "> Generar Reporte</a>
          </div>-->
      </div><!--/.row -->
    </div>
      

<?php include("../footer2.php"); ?>