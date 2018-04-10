<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="proveedores">
<script src="validacion_proveedor.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Proveedor.php"; ?>

        <div class="span9">

          <h2>Editar Proveedor</h2>
           <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php 
          $Proveedor = new Proveedor($_GET['proveedor']);
          $Datos_Proveedor = $Proveedor->Obtener_Proveedor();
          ?>

          <form method="post" action="validacion_proveedor.php" onsubmit="return validacion_proveedor()">
          <div class="well">
            <div class="row">
              <div class="span3"> 
                <input type="hidden" name="proveedor" value="<?php echo $_GET['proveedor']; ?>">
                <label><strong>RFC</strong><span class="obligatorio">*</span></label>
                <input type="text" id="rfc" name="rfc"  value="<?php echo $Datos_Proveedor['RFC']; ?>" placeholder="RFC" maxlength="15">
              </div>
            
              <div class="span3">         
                <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
                <input type="text" id="nombre" name="nombre" class="input-block-level2"  placeholder="Nombre" value="<?php echo $Datos_Proveedor['Nombre']; ?>" maxlength="30">
              </div>              
            </div>  

            <div class="row">
              <div class="span3"> 
                <br />        
                <label><strong>Alias</strong><span class="obligatorio">*</span></label>
                <input type="text" id="alias" name="alias"  placeholder="Alias" value="<?php echo $Datos_Proveedor['Alias']; ?>" maxlength="30">
              </div>
            </div>          

            
            <div class="row">  
              <div class="span3">  
              <br>   
              <label><strong>Calle</strong></label>
              <input type="text" id="calle" name="calle"  placeholder="Calle" value="<?php echo $Datos_Proveedor['Calle']; ?>" maxlength="30">
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Numero</strong></label>
              <input type="text" id="numero" name="numero"  placeholder="Numero" value="<?php echo $Datos_Proveedor['Numero']; ?>" maxlength="10">
              </div>              
            </div>
            <div class="row">
              

              <div class="span3">  
              <br>       
              <label><strong>Colonia</strong><span class="obligatorio">*</span></label>
              <input type="text" id="colonia" name="colonia"  placeholder="Colonia" value="<?php echo $Datos_Proveedor['Colonia']; ?>" maxlength="30">
              </div>
              <div class="span3">  
              <br>       
              <label><strong>Población</strong><span class="obligatorio">*</span></label>
              <input type="text" id="poblacion" name="poblacion"  placeholder="Población" value="<?php echo $Datos_Proveedor['Poblacion']; ?>" maxlength="30">
              </div>
            </div>


            <div class="row">  
              <div class="span3">  
              <br>   
              <label><strong>Teléfono</strong><span class="obligatorio">*</span></label>
              <input type="text" id="telefono" name="telefono" value="<?php echo $Datos_Proveedor['Telefono']; ?>" placeholder="Teléfono" maxlength="10">
              </div>            
            
              <div class="span">  
              <br>   
              <label><strong>E-mail</strong><span class="obligatorio">*</span></label>
                <input type="text" id="correo" name="email"  placeholder="E-mail" value="<?php echo $Datos_Proveedor['Email']; ?>" style="text-transform:lowercase;" maxlength="30">
              </div>
              <br>
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
            <input type="submit" name="editar" value="Guardar" class="btn btn-institucional guardar">
            <a href="../almacen/proveedores.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
          </div>
          </form>

        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>