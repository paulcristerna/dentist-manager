<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="solicitud-material">
<script src="validacion_solicitud_material.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Solicitud_Material.php"); ?>

        <div class="span9">

          <h2>Editar Solicitud de Material</h2>
            
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php 
            $Solicitud_Material = new Solicitud_Material($_GET['solicitud']);
            $Datos_Solicitud_Material = $Solicitud_Material->Obtener_Solicitud_Material();
          ?>

          <form method="post" id="form" action="validacion_solicitud_material.php" onsubmit="return validacion_entrada_material()">
          <div class="well"> 
            <div class="row">
              <div class="span3">
                <label><strong>Folio de Solicitud</strong></label>
                <span><?php echo $Datos_Solicitud_Material['FolioSolicitudMaterial']; ?></span>
              </div>
            </div>

            <hr style="border-top:1px solid lightgray">     

            <div class="row">  
              <div class="span4">
              <label><strong>Nombre de Material</strong><span class="obligatorio">*</span></label>
                <select id="sltmaterial" style="width:350px">
                    <option value="0">----------</option>
                    <?php   
                    $Material = new Material();
                    if($Datos_Solicitud_Material['IdDepartamento'] != ""):
                        $Material->ListadoMaterialSelectSolicitud($Datos_Solicitud_Material['IdDepartamento'],0);
                    else:
                        $Material->ListadoMaterialSelectSolicitud(0,$Datos_Solicitud_Material['IdComunidad']);
                    endif;

                    //listado de materiales
                    $Material = new Material();
                    $Material->ListadoMaterialSelectSolicitud();
                    ?>
                </select>
              </div>
              <div class="span3">
              <label><strong>Código de Producto</strong><span class="obligatorio">*</span></label>
                <select id="sltcodigomaterial">
                    <option value="0">----------</option>
                    <?php 
                    $Material = new Material();
                    if(isset($Datos_Solicitud_Material['IdDepartamento']) != ""):
                        $Material->ListadoCodigosSelectSolicitud($Datos_Solicitud_Material['IdDepartamento'],0);
                    else:
                        $Material->ListadoCodigosSelectSolicitud(0,$Datos_Solicitud_Material['IdComunidad']);
                    endif;
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
                <input type="text" maxlength="11" class="solo-numeros" id="txtcantidad" style="width:100px;" placeholder="Cantidad" value="1">
              </div>

              <div class="span2">  
                <br><br>
                <a id="btnagregar-solicitud" class="btn btn-institucional">Agregar</a>
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
              <?php $Solicitud_Material->Datos_Materiales_Solicitud(); ?>
            </table>

          <hr style="border-top:1px solid lightgray">  

          <div class="row">
            <div class="span8">
              <label><strong>Sugerencias y Comentarios Aquí:</strong></label>
              <textarea name="nota" rows="3" cols="80" style="width:100%" placeholder="Notas" maxlength="100"><?php echo $Datos_Solicitud_Material['Nota']; ?></textarea>
            </div>
          </div>
              
            <input type="hidden" name="solicitud-material" value="<?php echo $_GET['solicitud'] ?>">
            <input type="hidden" name="solicitante" value="<?php echo $SIS_Usuario; ?>">        

          </div>
          <div align="row">
              <input type="submit" name="editar" value="Guardar" class="btn btn-institucional guardar">
              <a href="../almacen/solicitudes-material.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
            </form>
          </div>
        </div>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>