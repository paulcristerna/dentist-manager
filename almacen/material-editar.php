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

          <h2>Editar Material</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php 
            $Material = new Material($_GET['material']);
            $Datos_Material = $Material->Obtener_Material();
          ?>

          <form method="post" id="form" action="validacion_material.php" onsubmit="return validacion_material()">

          <form method="post">
          
          <div class="well">
            <div class="row">
              <div class="span3">    
                 <input type="hidden" name="material" value="<?php echo $_GET['material']; ?>">       
                <label><strong>Código de Producto</strong><span class="obligatorio">*</span></label>
                <input type="text" style="text-transform:uppercase;" id="codigo" name="codigo" value="<?php echo $Datos_Material['Codigo']; ?>" style="width:180px;" class="input-block-level2" maxlength="13" placeholder="Código de Producto">
              </div>
            
              <div class="span3">         
                <label><strong>Unidad de Medida</strong><span class="obligatorio">*</span></label>
                <input type="text" id="unidad" name="unidad-medida" value="<?php echo $Datos_Material['UnidadMedida']; ?>" style="width:140px;" class="input-block-level2" placeholder="Unidad de Medida" maxlength="30">
              </div>
            </div>

            <div class="row">
              <div class="span5">
                <br>
                <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
                <input type="text" id="name" name="nombre" value="<?php echo $Datos_Material['NombreMaterial']; ?>" placeholder="Nombre" class="input-block-level2" maxlength="50">
              </div>
            </div>
            

            <div class="row">
              <div class="span3">  
              <br>       
              <label><strong>Precio</strong><span class="obligatorio">*</span></label>
              <input type="text" id="precio" name="precio" value="<?php echo $Datos_Material['Precio'] ?>" style="width:115px;" placeholder="Precio Unitario" maxlength="10" class="solo-numeros">
              </div>
            

              <div class="row">  
                <div class="span2">  
                <br>   
                <label><strong>Stock Mínimo</strong><span class="obligatorio">*</span></label>
                <input type="text" id="stock" name="stock-minimo" value="<?php echo $Datos_Material['StockMinimo'] ?>" style="width:100px;" maxlength="10" class="solo-numeros" placeholder="Stock Mínimo">
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
                      $Area = new Area($Datos_Material['IdArea']);
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
                      //listado de las proveedores
                      $Proveedor = new Proveedor($Datos_Material['IdProveedor']);
                      $Proveedor->ListadoSelect();
                    ?>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="span5"> 
                <br>
                <label><strong>Estatus</strong></label>
                <select name="estatus" id="estatus">
                  <option value="1" selected>Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
            </div>
          </div>

          <div align="row">
            <input type="submit" class="btn btn-institucional guardar" name="editar" value="Guardar">
            <a href="../almacen/materiales.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
          </div>
          </form>
        </div>
      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>