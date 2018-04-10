<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="areas">
<script src="validacion_area.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include "../menu.php"; ?>
        <?php include "../core-saec/Area.php"; ?>

        <div class="span9">
          
          <h2>Editar Área</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php 
          // imprimir datos del area
          $Area = new Area($_GET['area']);
          $Datos = $Area->Obtener_Area();
          ?>

          <form method="post" action="validacion_area.php" onsubmit="return validacion_area()"> 
            <div class="well">
              <div class="row">
                <div class="span5"> 
                  <input type="hidden" name="area" value="<?php echo $_GET['area'] ?>">
                  <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
                  <input type="text" name="nombre" value="<?php echo $Datos['Nombre']; ?>" style="width:100%;" placeholder="Nombre">
                </div>
                <div class="span5"> 
                  <br>
                  <label><strong>Descripcion</strong><span class="obligatorio">*</span></label>
                  <textarea name="descripcion" style="width:100%" placeholder="Descripcion" maxlength="100"><?php echo $Datos['Descripcion']; ?></textarea>
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
              <a href="../administracion/areas.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
            </div>
          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>