<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="conceptos">
<script src="validacion_concepto.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include "../menu.php"; ?>

        <div class="span9">
          
          <h2>Nuevo Concepto</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_concepto.php" onsubmit="return validacion_concepto()"> 
            <div class="well">
              <div class="row">
                <div class="span5"> 

                <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
                <input type="text" id="nombre" name="nombre" style="width:100%;" maxlength="50" placeholder="Nombre">
                </div>
                <div class="span5"> 
                  <br>
                <label><strong>Precio</strong><span class="obligatorio">*</span></label>
                <input type="text" class="solo-numeros" maxlength="10" id="precio" name="precio" style="width:80px;" placeholder="$ 0.00" class="solo-numeros">
                </div>
              </div>
            </div>
            
            <div align="row">
              <input type="submit" name="guardar" value="Guardar" class="btn btn-institucional guardar">
              <a href="../administracion/conceptos.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
            </div>
          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>