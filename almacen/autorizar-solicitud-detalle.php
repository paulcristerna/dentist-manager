<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="autorizar-solicitudes">
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Solicitud_Material.php"); ?>
        <?php include("../core-saec/Material.php"); ?>

        <div class="span9">

          <h2>Autorizar Solicitud de Material</h2>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

           <?php 
            $Solicitud_Material = new Solicitud_Material($_GET['solicitud']);
            $Datos_Solicitud_Material = $Solicitud_Material->Obtener_Solicitud_Material();
          ?>

          <form method="post" id="form" action="validacion_solicitud_material.php">
          <div class="well"> 
            <div class="row">
              <div class="span3">
                <label><strong>Folio de Solicitud</strong></label>
                <span><?php echo $Datos_Solicitud_Material['FolioSolicitudMaterial']; ?></span>
              </div>
            </div>

            <hr style="border-top:1px solid lightgray">                    
            
            <table id="tabla" class="table table-striped" style="overflow-y:scroll">
              <thead>
                <tr>
                  <th>Material</th>
                  <th>Cantidad</th>
                  <th></th>
                </tr>
              </thead>
              <?php $Solicitud_Material->Datos_Materiales_Solicitud();  ?>
            </table>         

          <div class="row">
            <div class="span8">
              <label><strong>Notas del Solicitante</strong></label>
              <p><?php echo $Datos_Solicitud_Material['Nota']; ?></p>
            </div>
          </div>

          <hr style="border-top:1px solid lightgray">  

          <div class="row">
            <div class="span8">
              <label><strong>Notas</strong></label>
              <textarea name="nota" rows="3" cols="80" style="width:100%" placeholder="Notas"></textarea>
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
            <input type="hidden" name="solicitud-material" value="<?php echo $_GET['solicitud'] ?>">
            <input type="hidden" name="solicitante" value="<?php echo $SIS_Usuario; ?>">
          </div>         

          </div>
          <div align="row">
              <input type="submit" name="autorizar" value="Autorizar" class="btn btn-institucional guardar">
              <a href="../almacen/solicitudes-material.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
            </form>
          </div>
        </div>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>