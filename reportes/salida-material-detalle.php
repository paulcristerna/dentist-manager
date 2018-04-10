<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="salidas-material-reporte">
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Salida_Material.php"); ?>

        <div class="span9">

          <h2>Detalle Salida de Material</h2>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>
          
          <?php 
            $Salida_Material = new Salida_Material($_GET['salida']);
            $Datos_Salida_Material = $Salida_Material->Obtener_Salida_Material();
          ?>
          <div class="well"> 
            <div class="row">
              <div class="span3">
                <label><strong>Folio de Salida</strong></label>
                <span><?php echo $Datos_Salida_Material['FolioSalidaMaterial'] ?></span>
              </div>
            </div>

            <hr style="border-top:1px solid lightgray">                    
            
            <table id="tabla" class="table table-striped" style="overflow-y:scroll">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th></th>
                </tr>
              </thead>
              <?php $Salida_Material->Datos_Materiales_Salida();  ?>
            </table>

          <hr style="border-top:1px solid lightgray">  

          <div class="row">
            <div class="span8">
              <label><strong>Notas</strong></label>
              <p><?php echo $Datos_Salida_Material['Nota'] ?></p>
            </div>
          </div>        

          </div>
        </div>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>