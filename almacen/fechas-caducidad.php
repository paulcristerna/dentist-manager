<?php include("../header2.php"); ?>

    <div class="container">

      <input type="hidden" id="ventana" value="fechas-caducidad">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>

        <div class="span9">
          
          <h2>Fechas de Caducidad</h2>

          <p>Listado que muestra los materiales a caducar en los proximos 15 dias.</p>

          <div class="well">
            <table id="tabla" class="table table-striped" style="overflow-y:scroll">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Material</th>
                  <th>Unidad de Medida</th>
                  <th>Cantidad a Caducar</th>
                  <th>Fecha de Caducidad</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //catalogo de fechas de caducidad de materiales
                  $Material = new Material();
                  $Material->CatalogoFechasCaducidad();
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