<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="salidas-material-reporte">
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Salida_Material.php"; ?>

        <div class="span9">

           <div class="input-append pull-right">
            <form method="get" action="salidas-material-reporte.php">
                <input class="span3" type="text" value="<?php if(isset($_GET['buscar'])): echo $_GET['buscar']; endif; ?>" placeholder="Buscar" name="buscar">
              <input type="submit" class="btn btn-institucional" value="Buscar"> 
            </form>
          </div>
        
          <div class="row">
            <div class="span9">
                <a href="reportes/salidas-material-generar-pdf.php?buscar=<?php echo (isset($_GET['buscar']) ? $_GET['buscar']:""); ?>" class="btn btn-institucional pull-right" target="_blank">Generar Reporte</a>
            </div>
          </div>

          <table class="table table-striped">

            <thead>
              <tr>
                <th>Folio de Salida</th>
                <th>Departamento/Comunidad</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
             <?php 
                $Salida_Material = new Salida_Material();
                if(isset($_GET['buscar'])):
                        $Salida_Material->Catalogo_Salida_Material_Administrador_Reportes($_GET['buscar']);
                else:
                        $Salida_Material->Catalogo_Salida_Material_Administrador_Reportes();
                endif;
              ?>
            </tbody>
          </table>
        </div>

      </div><!--/.row -->

<?php include("../footer2.php"); ?>