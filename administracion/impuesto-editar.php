<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="impuestos">
<script src="validacion_impuesto.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Impuesto.php"; ?>

        <div class="span9">
          
          <h2>Editar Impuesto</h2>
          <div id="campo-error"></div>
          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php 
            $Impuesto = new Impuesto($_GET["impuesto"]);
            $Datos = $Impuesto->Obtener_Impuesto();
          ?>

          <form method="post" action="validacion_impuesto.php" onsubmit="return validacion_impuesto()">          
            <div class="well">
              <div class="row">
                <div class="span9">  
                <input type="hidden" name="impuesto" value="<?php echo $_GET['impuesto']; ?>">        
                <label><strong>Nombre<span class="obligatorio">*</span></strong></label>
                <input style="text-transform:uppercase;" type="text" name="nombre" value="<?php echo $Datos['Nombre']; ?>" placeholder="Nombre" style="width:100%;" maxlength="30">
                </div>
              </div>

              <div class="row">
                <br>
                <div class="span3">          
                <label><strong>Porcentaje<span class="obligatorio">*</span></strong></label>
                <input type="text" name="porcentaje" value="<?php echo $Datos['Porcentaje']; ?>" style="width:50px" placeholder="0.00"> %
                </div>
              </div>

              <div class="row">
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
              <input type="submit" value="Guardar" name="editar" class="btn btn-institucional guardar">
              <a href="../administracion/impuestos.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
            </div>
            </form>
            
          </div>         

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>