<?php include("../header2.php"); ?>

    <div class="container">

      <input type="hidden" id="ventana" value="stock-minimo">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>

        <div class="span9">
          
          <h2>Stock Mínimo</h2>
          <p>Listado que muestra los materiales que se encuentran por debajo del stock mínimo indicado.</p>
          <div class="well">
            <table id="tabla" class="table table-striped" style="overflow-y:scroll">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Material</th>
                  <th>Unidad de Medida</th>
                  <th>Stock Mínimo</th>
                  <th>Existencia</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //catalogo de stock minimo de materiales
                  $Material = new Material();
                  $Material->CatalogoStockMinimo();
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