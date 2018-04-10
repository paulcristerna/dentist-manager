<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="entradas-material">
<script src="validacion_entrada_material.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Proveedor.php"); ?>
        <?php include("../core-saec/Impuesto.php"); ?>

        <div class="span9">

          <h2>Nueva Entrada de Material</h2>
        <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" id="form" action="validacion_entrada_material.php" onsubmit="return validacion_entrada_material()">
          <div class="well"> 
            <div class="row">  
              <div class="span9"> 
              <label><strong>Proveedor</strong><span class="obligatorio">*</span></label>
                <select name="sltproveedor" id="sltproveedor">
                    <option value="0">------</option>
                    <?php 
                      //listado de proveedores
                      if(isset($_GET['proveedor'])):
                        $Proveedor=$_GET['proveedor'];
                      else:
                        $Proveedor='';
                      endif;
                      $Proveedor = new Proveedor($Proveedor);
                      $Proveedor->ListadoSelect();
                    ?>
                </select>
              </div>
            </div>

	    <br />

            <div class="row">  
              <div class="span9"> 
              <input type="hidden" name="usuario" value="<?php echo $SIS_Usuario; ?>"> 
              <label><strong>Folio de Factura</strong><span class="obligatorio">*</span></label>
              <input type="text" name="folio-factura" id="folio-factura" placeholder="Folio de Factura" class="solo-numeros" maxlength="7">
              </div>
            </div>

            <div class="row">  
              <div class="span3">  
              <br>   
              <label><strong>Impuesto</strong></label>
                <select name="sltimpuesto" id="sltimpuesto">
                    <option value="0">------</option>
                    <?php 
                    //listado de impuestos
                    $Impuesto = new Impuesto();
                    $Impuesto->ListadoSelect();
                    ?>
                </select>
              </div>

              <div class="span3">  
              <br>   
              <label><strong>Porcentaje</strong></label>
                <label><span id="porcentaje-impuesto">0</span>%</label>
                <input type="hidden" name="porcentaje-impuesto-post" value="0" id="porcentaje-impuesto-post">
              </div>
            </div>

            <hr style="border-top:1px solid lightgray">  

            <div class="row">  
              <div class="span4">
              <label><strong>Nombre del Material</strong><span class="obligatorio">*</span></label>
                <select id="sltmaterial" style="width:350px">
                    <option value="0">------</option>
                    <?php 
                    //listado de productos
                    if(isset($_GET['proveedor'])):
                        $Material = new Material();
                        $Material->IdProveedor = $_GET['proveedor'];
                        $Material->ListadoMaterialSelect();
                    endif;
                    ?>
                </select>
              </div>
              <div class="span3">
              <label><strong>Código del Material</strong><span class="obligatorio">*</span></label>
                <select id="sltcodigomaterial">
                    <option value="0">------</option>
                    <?php 
                    //listado de codigos de los materiales
                    if(isset($_GET['proveedor'])):
                        $Material->ListadoCodigosSelect();
                    endif;
                    ?>
                </select>
              </div>
              <div class="span2">
                <br>   
                <label><strong>Unidad de Medida</strong></label>
                <label id="lblunidadmedida" value="0">------</label>
              </div>
            </div>

            <div class="row">  
              <div class="span2">  
                <br>   
                <label><strong>Cantidad</strong><span class="obligatorio">*</span></label>
                <input type="text" maxlength="10" class="solo-numeros" id="txtcantidad" style="width:100px;" placeholder="Cantidad" value="1">
              </div>
              <div class="span2">  
                <br>   
                <label><strong>Precio</strong><span class="obligatorio">*</span></label>
                <input type="text" maxlength="10" class="solo-numeros" id="txtprecio" style="width:100px;" placeholder="Precio">
              </div>
              <div class="span2">  
                <br>   
                <label><strong>Fecha de Caducidad</strong></label>
                <input type="text" class="calendario" style="width:150px;" placeholder="DD-MM-AAAA">
              </div>

              <div class="span2">  
                <br><br>
                <a id="btnagregar-entrada" class="btn btn-institucional">Agregar</a>
              </div>
            </div>
            <br>
            <hr style="border-top:1px solid lightgray">            
            
          <table id="tabla" class="table table-striped" style="overflow-y:scroll">
            <thead>
              <tr>
                <th>Material</th>
                <th>Cantidad</th>
                <th>Precio </th>
                <th>Caducidad</th>
                <th></th>
              </tr>
            </thead>
          </table>

          </div>
          <div align="row">
              <input type="submit" name="guardar" value="Guardar" class="btn btn-institucional guardar">
              <a href="../almacen/entradas-material.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
          </div>
        </form>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>