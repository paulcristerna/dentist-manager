<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="impuestos">
<script src="validacion_impuesto.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>

        <div class="span9">
          
          <h2>Nuevo Impuesto</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_impuesto.php" onsubmit="return validacion_impuesto()">          
            <div class="well">
              <div class="row">
                <div class="span9">          
                <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
                <input style="text-transform:uppercase;" type="text" id="nombre" name="nombre" placeholder="Nombre" style="width:100%;" maxlength="30">
                </div>
              </div>

              <div class="row">
                <br>
                <div class="span3">          
                <label><strong>Porcentaje</strong><span class="obligatorio">*</span></label>
                <input type="text" class="solo-numeros" maxlength="5" id="porcentaje" style="width:50px" name="porcentaje" placeholder="0.00" maxlength="5"> %
                </div>
              </div>
            </div>

            <div align="row">
              <input type="submit" value="Guardar" name="guardar" class="btn btn-institucional guardar" id="Guardar">
              <a href="../administracion/impuestos.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
            </div>
            </form>            
          </div>         

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>