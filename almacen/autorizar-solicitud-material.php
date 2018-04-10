<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="autorizar-solicitudes">
<script src="validacion_aprobacion_solicitud_material.js"></script>
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Solicitud_Material.php"); ?>

        <div class="span9">

          <h2>Autorizar Solicitud de Material</h2>

          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

           <?php 
            $Solicitud_Material = new Solicitud_Material($_GET['solicitud']);
            $Datos_Solicitud_Material = $Solicitud_Material->Obtener_Solicitud_Material();
          ?>

          <form method="post" id="form" action="validacion_solicitud_material.php" onsubmit="return validacion_aprobacion_solicitud_material()">
          <div class="well"> 
            <div class="row">
              <div class="span3">
                <label><strong>Folio de Solicitud</strong></label>
                <span><?php echo $Datos_Solicitud_Material['FolioSolicitudMaterial']; ?></span>
              </div>
            
              <div class="span3">
                <label><strong>Fecha de Registro</strong></label>
                <?php 
                    $FechaRegistro = $Datos_Solicitud_Material['FechaRegistro'];
                    $date = new DateTime($FechaRegistro);
                    $FechaRegistro = $date->format('d-m-Y h:i:s'); 
                ?>
                <span><?php echo $FechaRegistro; ?></span>
              </div>
            </div>
			  
			<br />
			  
			<div class="row">
              <div class="span3">
                <label><strong>Departamento/Comunidad</strong></label>
                <span>
					<?php echo ($Datos_Solicitud_Material['NombreDepartamento'] != "" ? $Datos_Solicitud_Material['NombreDepartamento']:""); ?>
					<?php echo ($Datos_Solicitud_Material['NombreComunidad'] != "" ? $Datos_Solicitud_Material['NombreComunidad']:""); ?>
				</span>
				  
				<input type="hidden" name="departamento" value="<?php echo ($Datos_Solicitud_Material['IdDepartamento'] != "" ? $Datos_Solicitud_Material['IdDepartamento']:""); ?>">

				<input type="hidden" name="comunidad" value="<?php echo ($Datos_Solicitud_Material['IdComunidad'] != "" ? $Datos_Solicitud_Material['IdComunidad']:""); ?>">				
              </div>
            </div>

	    <hr style="border-top:1px solid lightgray"> 
            <div class="row">  
              <div class="span4">
              <label><strong>Nombre del Material</strong><span class="obligatorio">*</span></label>
                <select id="sltmaterial" style="width:350px">
                    <option value="0">----------</option>
                    <?php 
                    //listado de materiales
                    $Material = new Material();
                    $Material->ListadoMaterialSelect();
                    ?>
                </select>
              </div>
              <div class="span3">
              <label><strong>Código de Producto</strong><span class="obligatorio">*</span></label>
                <select id="sltcodigomaterial">
                    <option value="0">----------</option>
                    <?php 
                    //listado de productos
                    $Material = new Material();
                    $Material->ListadoCodigosSelect();
                    ?>
                </select>
              </div>
              <div class="span2">
                <br>   
                <label><strong>Unidad de Medida</strong></label>
                <label id="lblunidadmedida">------</label>
                <input type="hidden" name="campo-precio" id="precio">
              </div>
            </div>

            <div class="row">  
              <div class="span2">  
                <br>   
                <label><strong>Cantidad</strong><span class="obligatorio">*</span></label>
                <input type="text" maxlength="10" class="solo-numeros" id="txtcantidad" style="width:100px;" placeholder="Cantidad" value="1">
              </div>

              <div class="span2">  
                <br><br>
                <a id="btnagregar-solicitud-aprobacion" class="btn btn-institucional">Agregar</a>
              </div>
            </div>

            <hr style="border-top:1px solid lightgray">                    
            
            <table id="tabla" class="table table-striped" style="overflow-y:scroll">
              <thead>
                <tr>
                  <th>Material</th>
                  <th>Cantidad</th>
		  <th>Existencia</th>
                  <th></th>
                </tr>
              </thead>
              <?php $Solicitud_Material->Datos_Materiales_Solicitud_Autorizar();  ?>
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
              <label><strong>Sugerencias y Comentarios Aquí:</strong></label>
              <textarea name="nota" rows="3" cols="80" style="width:100%" placeholder="Notas" id="notas" maxlength="100"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="span5"> 
              <br>
              <label><strong>Acción</strong></label>
              <select name="autorizado" id="accion">
                <option value="1" selected>Autorizar</option>
                <option value="2">No Autorizar</option>
              </select>
            </div>
            <input type="hidden" name="solicitud-material" value="<?php echo $_GET['solicitud'] ?>">
            <input type="hidden" name="solicitante" value="<?php echo $SIS_Usuario; ?>">
          </div>         

          </div>
          <div align="row">
              <input type="submit" name="autorizar" value="Guardar" class="btn btn-institucional guardar">
              <a href="../almacen/solicitudes-material.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
            </form>
          </div>
        </div>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>