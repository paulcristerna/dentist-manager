<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="entradas-material">

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Entrada_Material.php"); ?>

        <div class="span9">

          <h2>Detalle Entrada de Material</h2>

          <?php 
            $Entrada_Material = new Entrada_Material($_GET['entrada']);
            $Datos_Entrada_Material = $Entrada_Material->Obtener_Entrada_Material();
          ?>

          <form method="post" id="form" action="validacion_entrada_material.php">

          <div class="well"> 
            <div class="row">  
              <div class="span3">  
              <label><strong>Folio de Entrada</strong></label>
              <label><?php echo $Datos_Entrada_Material['FolioEntradaMaterial']; ?></label>
              </div>

              <div class="span3">  
              <label><strong>Folio de Factura</strong></label>
              <label><?php echo $Datos_Entrada_Material['FolioFactura']; ?></label>
              </div>
            </div>

            <hr style="border-top:1px solid lightgray">    

            <div class="row">  
              <div class="span9">
              <label><strong>Proveedor</strong></label>
              <label><?php echo $Datos_Entrada_Material['NombreProveedor']; ?></label>
              </div>
            </div>

            <div class="row">  
              <div class="span3">  
              <br>   
              <label><strong>Impuesto</strong></label>
              <label><?php echo $Datos_Entrada_Material['NombreImpuesto']; ?></label>
              </div>

              <div class="span3">  
              <br>   
              <label><strong>Porcentaje</strong></label>
                <label><?php echo $Datos_Entrada_Material['PorcentajeImpuesto']; ?>%</label>
              </div>
            </div>

            <hr style="border-top:1px solid lightgray">           
            
            <table id="tabla" class="table table-striped" style="overflow-y:scroll">
              <thead>
                <tr>
                  <th>Material</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <?php $Entrada_Material->Entrada_Material_Materiales(); ?>
            </table>

            </div>
             <div class="row">
            <a href="../almacen/entradas-material.php" class="btn btn-danger pull-right "> Atras</a>
          </div>  
          </form>
          </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>