<?php include("../header2.php"); ?>

    <div class="container">

      <input type="hidden" id="ventana" value="materiales-caducados">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>

        <div class="span9">
          
          <h2>Materiales Caducados</h2>

          <p>Listado que muestra los materiales ya caducados.</p>

          <div class="well">
            <table id="tabla" class="table table-striped" style="overflow-y:scroll">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Material</th>
                  <th>Unidad de Medida</th>
                  <th>Cantidad</th>
                  <th>Fecha de Caducidad</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //catalogo de fechas de caducidad de materiales
                  $Material = new Material();
                  $Material->CatalogoMaterialCaducado();
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