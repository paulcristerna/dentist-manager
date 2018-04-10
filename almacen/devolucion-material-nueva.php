<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="devolucion-material">
<script src="validacion_devolucion_material.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Devolucion_Material.php"); ?>
	<?php include("../core-saec/Salida_Material.php"); ?>

        <div class="span9">

          <h2>Nueva Devolución de Material</h2>
            
        <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" id="form" action="validacion_devolucion_material.php" onsubmit="return validacion_devolucion_material()"> 

          <div class="well">
            <div class="row">
              <div class="span4">
              <label><strong>Folio de Salida</strong><span class="obligatorio">*</span></label>
                <input type="text" id="txtfolio-salida" value="<?php echo (isset($_GET['folio-salida']) ? $_GET['folio-salida']:""); ?>" placeholder="Folio de Salida" class="input-block-level2 solo-numeros" maxlength="7">
                <a href="#" id="buscar-folio-salida" class="btn btn-institucional">Buscar</a>
              </div>
            </div>
              
               <hr style="border-top:1px solid lightgray">   
            
          <table id="tabla" class="table table-striped" style="overflow-y:scroll">
            <thead>
              <tr>
                <th>Material</th>
                <th>Cantidad</th>
                <th>Caducidad</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_GET['folio-salida']))
                    {
                        $Devolucion_Material = new Devolucion_Material();
                        $IdSalidaMaterial = $Devolucion_Material->Salida_Material_Materiales($_GET['folio-salida']);    
                        if($IdSalidaMaterial != "")
			  {
			    $Salida_Material = new Salida_Material($IdSalidaMaterial);
			    $Datos_Salida_Material = $Salida_Material->Obtener_Salida_Material();
			  }
                    }   
                ?>  
            </tbody>
          </table>

	    <p><strong>Departamento/Comunidad:</strong> 
            <?php if(isset($_GET['folio-salida'])){
                      if($IdSalidaMaterial != "")
			  {
			    echo $Datos_Salida_Material['NombreDepartamento'] != "" ?
                              $Datos_Salida_Material['NombreDepartamento']:
                              $Datos_Salida_Material['NombreComunidad'];
			  }
            } ?>
            </p>

          <hr style="border-top:1px solid lightgray">  

          <div class="row">
            <div class="span8">
              <label><strong>Motivo de la Devolución:<span class="obligatorio">*</span></strong></label>
              <textarea name="nota" id="nota" rows="3" cols="80" style="width:100%" placeholder="Notas" maxlength="100"></textarea>
            </div>
          <?php if(isset($_GET['folio-salida']) && isset($Datos_Salida_Material['IdUsuario'])): ?>
            <input type="hidden" name="solicitante" value="<?php echo $Datos_Salida_Material['IdUsuario']; ?>">
              <?php endif; ?>
          </div>

          </div>
          <div align="row">
              <input type="submit" id="guardar-solicitud-material" name="guardar" value="Guardar" class="btn btn-institucional guardar">
              <a href="../almacen/devoluciones-materiales.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
            </form>
          </div>
        </div>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>