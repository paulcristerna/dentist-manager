<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="salidas-material">
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Salida_Material.php"); ?>

        <div class="span9">

          <h2>Detalle Salida de Material</h2>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>
          
          <?php 
            $Salida_Material = new Salida_Material($_GET['salida']);
            $Datos_Salida_Material = $Salida_Material->Obtener_Salida_Material();
          ?>

          <form method="post" id="form" action="validacion_salida_material.php">
          <div class="well"> 
            <div class="row">
              <div class="span3">
                  <input type="hidden" value="<?php echo $_GET['salida']; ?>" name="salida-material">
	          <input type="hidden" value="<?php echo $SIS_Usuario; ?>" name="usuario">
                <label><strong>Folio de Salida</strong></label>
                <span><?php echo $Datos_Salida_Material['FolioSalidaMaterial'] ?></span>
              </div>
            </div>

            <hr style="border-top:1px solid lightgray">                    
            
            <table id="tabla" class="table table-striped" style="overflow-y:scroll">
              <thead>
                <tr>
                  <th>Material</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Total</th>
                </tr>
              </thead>
              <?php $Salida_Material->Datos_Materiales_Salida();  ?>
            </table>

          <hr style="border-top:1px solid lightgray">  

          <div class="row">
            <div class="span8">
              <label><strong>Sugerencias y Comentarios:</strong></label>
              <p><?php echo $Datos_Salida_Material['Nota'] ?></p>
            </div>
          </div>        

          </div>
          <div align="row">
              <?php 
	      if($Datos_Salida_Material['Entregado']!=1):
		if($SIS_Datos_Usuario['NombrePuesto']=='Administrador' ||
		   $SIS_Datos_Usuario['NombrePuesto']=='Almacenista'): ?>
		  <input type="submit" name="entregar" value="Entregar" class="btn btn-institucional guardar">
		<?php endif;
	      endif; ?>
              <a href="../almacen/solicitudes-material.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
            </form>
          </div>
        </div>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>