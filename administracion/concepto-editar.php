<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="conceptos">
<script src="validacion_concepto.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include "../menu.php"; ?>
        <?php include "../core-saec/Concepto.php"; ?>

        <div class="span9">
          
          <h2>Editar Concepto</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php 
          //obtener los datos del concepto
          $Concepto = new Concepto($_GET['concepto']);
          $Datos = $Concepto->Obtener_Concepto();
          ?>

          <form method="post" action="validacion_concepto.php" onsubmit="return validacion_concepto()"> 
            <div class="well">
              <div class="row">
                <div class="span5"> 
                  <input type="hidden" name="concepto" value="<?php echo $_GET['concepto'] ?>">
                  <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
                  <input type="text" name="nombre" value="<?php echo $Datos['Nombre']; ?>" style="width:100%;" maxlength="50" placeholder="Nombre">
                </div>
                <div class="span5"> 
                  <br>
                  <label><strong>Precio</strong><span class="obligatorio">*</span></label>
                  <input type="text" class="solo-numeros" maxlength="10" value="<?php echo $Datos['Precio']; ?>" id="precio" name="precio" style="width:80px;" placeholder="$ 0.00" class="solo-numeros">
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