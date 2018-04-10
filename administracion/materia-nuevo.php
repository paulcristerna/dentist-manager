<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="materias">
<script src="validacion_materia.js"></script>
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>

        <div class="span9">
          
          <h2>Nuevo Materia</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_materia.php" onsubmit="return validacion_materia()">

          <div class="well">
            <div class="row">
              <div class="span3">
              <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
              <input type="text" id="nombre" name="nombre" class="input-block-level2" placeholder="Nombre" style="width:100%;" maxlength="50">
              </div>              
            </div>

            <div class="row">
              <div class="span3">
              <br>
              <label><strong>Semestre</strong><span class="obligatorio">*</span></label>
              <input type="text" id="semestre" name="semestre" class="input-block-level2 solo-numeros" placeholder="Semestre" maxlength="2">
              </div>             
            </div> 
        </div> 

          <div align="row">
            <input type="submit" name="guardar" value="Guardar" class="btn btn-institucional guardar" id="Guardar">
            <a href="../clinica/materias.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
          </div>

          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>