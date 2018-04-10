<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="proveedores">
<script src="validacion_proveedor.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Proveedor.php"; ?>

        <div class="span9">

          <h2>Nuevo Proveedor</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_proveedor.php" onsubmit="return validacion_proveedor()">
          <div class="well">
            <div class="row">
              <div class="span3">          
                <label><strong>RFC</strong><span class="obligatorio">*</span></label>
                <input type="text" id="rfc" name="rfc" style="width:140px;text-transform:uppercase;" maxlength="15" placeholder="RFC">
              </div>
            
              <div class="span3">         
                <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
                <input type="text" id="nombre" name="nombre" class="input-block-level2" maxlength="30" placeholder="Nombre" maxlength="30">
              </div>              
            </div>  

            <div class="row">
              <div class="span3"> 
                <br />        
                <label><strong>Alias</strong><span class="obligatorio">*</span></label>
                <input type="text" id="alias" name="alias" class="input-block-level2" placeholder="Alias" maxlength="30">
              </div>
            </div>          

            
            <div class="row">
              <div class="span3">  
              <br>       
              <label><strong>Calle</strong><span class="obligatorio">*</span></label>
              <input type="text" id="calle" name="calle" style="width:200px;" placeholder="Calle" maxlength="30">
              </div>

              <div class="span3">  
              <br>       
              <label><strong>Numero</strong><span class="obligatorio">*</span></label>
              <input type="text" id="numero" name="numero" style="width:200px;" class="solo-numeros" placeholder="Numero" maxlength="10">
              </div>
            </div>

            <div class="row">
              <div class="span3">  
              <br>       
              <label><strong>Colonia</strong><span class="obligatorio">*</span></label>
              <input type="text" id="colonia" name="colonia" style="width:200px;" placeholder="Colonia" maxlength="30">
              </div>
              <div class="span3">  
              <br>       
              <label><strong>Población</strong><span class="obligatorio">*</span></label>
              <input type="text" value="Culiacán, Sinaloa" id="poblacion" name="poblacion" style="width:200px;" placeholder="Población" maxlength="30">
              </div>

            </div>


            <div class="row">  
              <div class="span3">  
              <br>   
              <label><strong>Teléfono</strong><span class="obligatorio">*</span></label>
              <input type="text" id="telefono" name="telefono" style="width:150px;" class="solo-numeros" placeholder="Teléfono" maxlength="10">
              </div>            
            
              <div class="span">  
              <br>   
              <label><strong>E-mail</strong><span class="obligatorio">*</span></label>
                <input type="text" id="correo" name="email" style="text-transform:lowercase;width:250px;" placeholder="E-mail" maxlength="30">
              </div>
              <br>
            </div>
          </div>

          <div align="row">
            <br>
            <input type="submit" name="guardar" value="Guardar" class="btn btn-institucional guardar">
            <a href="../almacen/proveedores.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
          </div>
          </form>

        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>