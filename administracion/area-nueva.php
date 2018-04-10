<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="areas">
<script src="validacion_area.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include "../menu.php"; ?>

        <div class="span9">
          
          <h2>Nueva Área</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_area.php" onsubmit="return validacion_area()"> 
            <div class="well">
              <div class="row">
                <div class="span5"> 

                <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
                <input type="text" id="nombre" name="nombre" style="width:100%;" placeholder="Nombre" maxlength="30">
                </div>
                <div class="span5"> 
                  <br>
                <label><strong>Descripcion</strong><span class="obligatorio">*</span></label>
                <textarea id="descripcion" name="descripcion" style="width:100%" placeholder="Descripcion" maxlength="100"></textarea>
                </div>
              </div>
            </div>
            
            <div align="row">
              <input type="submit" name="guardar" value="Guardar" class="btn btn-institucional guardar">
              <a href="../administracion/areas.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
            </div>
          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>