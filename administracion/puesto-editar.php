<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="puestos">
<script src="validacion_puesto.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include "../menu.php"; ?>
        <?php include "../core-saec/Puesto.php"; ?>

        <div class="span9">
          
          <h2>Editar Puesto</h2>
          <div id="campo-error"></div>

          <?php 
			  $Puesto = new Puesto($_GET['puesto']);
			  $Datos = $Puesto->Obtener_Puesto();
          ?>

          <form method="post" action="validacion_puesto.php" onsubmit="return validacion_puesto()"> 
            <div class="well">
              <div class="row">
                <div class="span5"> 
                <input type="hidden" name="puesto" value="<?php echo $Datos['IdPuesto']; ?>">
                <label><strong>Nombre<span class="obligatorio">*</span></strong></label>
                <input type="text" name="nombre" value="<?php echo $Datos['Nombre'] ?>" placeholder="Nombre" style="width:100%;" maxlength="50">
                </div>
                <div class="span5"> 
                  <br>
                <label><strong>Descripcion<span class="obligatorio">*</span></strong></label>
                <textarea name="descripcion" style="width:100%" placeholder="Descripcion" maxlength="100"><?php echo $Datos['Descripcion'] ?></textarea>
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
              <a href="../administracion/puestos.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
            </div>
          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>