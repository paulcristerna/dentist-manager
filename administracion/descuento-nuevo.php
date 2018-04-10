<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="descuentos">
<script src="validacion_descuento.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include "../menu.php"; ?>

        <div class="span9">
          
          <h2>Nuevo Descuento</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_descuento.php" onsubmit="return validacion_descuento()"> 
            <div class="well">
              <div class="row">
                <div class="span3"> 

                <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" style="width:100%;" maxlength="50">
                </div>
              </div>
				
			  <div class="row">
                <div class="span5"> 
                  <br>
                <label><strong>Porcentaje</strong><span class="obligatorio">*</span></label>
                <input type="text" class="solo-numeros" maxlength="5" id="porcentaje" name="porcentaje" style="width:50px;" placeholder="0.00" class="solo-numeros"> %
                </div>
              </div>
            </div>
            
            <div align="row">
              <input type="submit" name="guardar" value="Guardar" class="btn btn-institucional guardar">
              <a href="../administracion/descuentos.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
            </div>
          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>