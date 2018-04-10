<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="descuentos">
<script src="validacion_descuento.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include "../menu.php"; ?>
        <?php include "../core-saec/Descuento.php"; ?>

        <div class="span9">
          
          <h2>Editar Descuento</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php 
			  $Descuento = new Descuento($_GET['descuento']);
			  $Datos = $Descuento->Obtener_Descuento();
          ?>

          <form method="post" action="validacion_descuento.php" onsubmit="return validacion_descuento()"> 
            <div class="well">
              <div class="row">
                <div class="span5"> 
                  <input type="hidden" name="descuento" value="<?php echo $_GET['descuento'] ?>">
                  <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
                  <input type="text" name="nombre" value="<?php echo $Datos['Nombre']; ?>" placeholder="Nombre" style="width:100%;" maxlength="50">
                </div>
                <div class="span5"> 
                  <br>
                  <label><strong>Porcentaje</strong><span class="obligatorio">*</span></label>
                  <input type="text" class="solo-numeros" maxlength="5" name="porcentaje" style="width:50px;" value="<?php echo $Datos['Porcentaje']; ?>" placeholder="00.00"> %
                </div>
                <div class="span5"> 
                  <br>
                  <label><strong>Estatus</strong></label>
                  <select name="estatus">
                    <option value="1" selected>Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>
              </div>
            </div>
            
            <div align="row">
              <input type="submit" name="editar" value="Guardar" class="btn btn-institucional guardar">
              <a href="../administracion/descuentos.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
            </div>
          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>