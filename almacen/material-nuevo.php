<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="materiales">
<script src="validacion_material.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Area.php"); ?>
        <?php include("../core-saec/Proveedor.php"); ?>

        <div class="span9">

          <h2>Nuevo Material</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_material.php" onsubmit="return validacion_material()">
          
          <div class="well">
            <div class="row">
              <div class="span3"> 
                       
                <label><strong>Código de Producto</strong><span class="obligatorio">*</span></label>
                <input type="text" style="text-transform:uppercase;" id="codigo" name="codigo" style="width:180px;" class="input-block-level2" maxlength="13" placeholder="Código de Producto" maxlegth="30">
              </div>
            
              <div class="span3">         
                <label><strong>Unidad de Medida</strong><span class="obligatorio">*</span></label>
                <input type="text" id="unidad" name="unidad-medida" style="width:140px;" class="input-block-level2" placeholder="Unidad de Medida" maxlength="30"  maxlegth="30">
              </div>
            </div>

            <div class="row">
              <div class="span5">
                <br>
                <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="input-block-level2" maxlength="50">
              </div>
            </div>
            

            <div class="row">
              <div class="span3">  
              <br>       
              <label><strong>Precio</strong><span class="obligatorio">*</span></label>
              <input type="text" id="precio" name="precio" style="width:115px;" class="solo-numeros" placeholder="Precio Unitario" maxlength="10">
              </div>
            

              <div class="row">  
                <div class="span2">  
                <br>   
                <label><strong>Stock Mínimo</strong><span class="obligatorio">*</span></label>
                <input type="text" id="stock" name="stock-minimo" style="width:100px;" class="solo-numeros" placeholder="Stock Mínimo" maxlength="10">
                </div>
              </div>
            </div>

            <div class="row">  
              <div class="span3">  
              <br>   
              <label><strong>Área</strong><span class="obligatorio">*</span></label>
                <select name="area" id="area">
                    <option value="0" selected>---</option>
                    <?php 
                      //listado de las areas
                      $Area = new Area();
                      $Area->ListadoSelect();
                    ?>
                </select>
              </div>

              <div class="span3">  
              <br>   
              <label><strong>Proveedor</strong><span class="obligatorio">*</span></label>
                <select name="proveedor" id="proveedor">
                    <option value="0" selected>---</option>
                    <?php 
                      //listado de las proveedor
                      $Proveedor = new Proveedor();
                      $Proveedor->ListadoSelect();
                    ?>
                </select>
              </div>
            </div>
          </div>

          <div align="row">
            <input type="submit" class="btn btn-institucional guardar" name="guardar" value="Guardar">
            <a href="../almacen/materiales.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
          </div>
          </form>
        </div>
      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>