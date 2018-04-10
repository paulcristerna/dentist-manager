<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="solicitud-material">
<script src="validacion_solicitud_material.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Departamento.php"); ?>
        <?php include("../core-saec/Comunidad.php"); ?>

        <div class="span9">

          <h2>Nueva Solicitud de Material</h2>
        
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" id="form" action="validacion_solicitud_material.php" onsubmit="return validacion_solicitud_material()">
          <div class="well"> 
            <div class="row">
            <?php if($SIS_Datos_Usuario['NombrePuesto']!='Alumno Tesorero'): ?>
              <div class="span3">
                <label><strong>Departamento</strong><span class="obligatorio">*</span></label>
                <select id="sltdepartamento-solicitud" name="departamento" style="width:100%">
                    <option value="0">------</option>
                    <?php 
						          //listado de departamentos
		                  $IdDepartamento = (isset($_GET['departamento']) ? $_GET['departamento']:"");
          						$Departamento = new Departamento($IdDepartamento);
          						$ValorDep = $SIS_Datos_Usuario['IdDepartamento'];
          						$ValorDep = ($ValorDep=='' ? '0':$ValorDep);
          						$Departamento->ListadoSelect($ValorDep);
                    ?>
                </select>
              </div>
            <?php endif; ?>

		        <?php if($SIS_Datos_Usuario['NombrePuesto']=='Alumno Tesorero'): ?>
                
              <div class="span3">
                <label><strong>Comunidad</strong><span class="obligatorio">*</span></label>
                <select id="sltcomunidad-solicitud" name="comunidad" style="width:100%">
                    <option value="0">------</option>
                    <?php 
          						//listado de comunidades
          		        $IdComunidad = (isset($_GET['comunidad']) ? $_GET['comunidad']:"");
          						$Comunidad = new Comunidad($IdComunidad);
          						$ValorCom = $SIS_Datos_Usuario['IdAsignacionComunidad'];
          						$ValorCom = ($ValorCom=='' ? '0':$ValorCom);
          						$Comunidad->ListadoSelectAsigCom($ValorCom);
                    ?>
                </select>
              </div>
            <?php endif; ?>

            <?php if($SIS_Datos_Usuario['NombrePuesto']=='Doctor Comunitario'): ?>
                
              <div class="span3">
                <label><strong>Comunidad</strong><span class="obligatorio">*</span></label>
                <select id="sltcomunidad-solicitud" name="comunidad" style="width:100%">
                    <option value="0">------</option>
                    <?php 
                      //listado de comunidades
                      $IdComunidad = (isset($_GET['comunidad']) ? $_GET['comunidad']:"");
                      $Comunidad = new Comunidad($IdComunidad);
                      $Comunidad->ListadoSelectAsigComDocCom($SIS_Usuario);
                    ?>
                </select>
              </div>
            <?php endif; ?>
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
                    if(isset($_GET['departamento'])):
                        $Material->ListadoMaterialSelectSolicitud($_GET['departamento'],0);
                    endif;

                    if(isset($_GET['comunidad'])):
                        $Material->ListadoMaterialSelectSolicitud(0,$_GET['comunidad']);
                    endif;
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
                    if(isset($_GET['departamento'])):
                        $Material->ListadoCodigosSelectSolicitud($_GET['departamento'],0);
                    endif;

                    if(isset($_GET['comunidad'])):
                        $Material->ListadoCodigosSelectSolicitud(0,$_GET['comunidad']);
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
                <input type="text" maxlength="10" class="solo-numeros" id="txtcantidad" style="width:100px;" placeholder="Cantidad" value="1">
              </div>

              <div class="span2">  
                <br><br>
                <a id="btnagregar-solicitud" class="btn btn-institucional">Agregar</a>
              </div>
            </div>
            <br>
            <hr style="border-top:1px solid lightgray">                    
            
            <table id="tabla" class="table table-striped" style="overflow-y:scroll">
              <thead>
                <tr>
                  <th>Material</th>
                  <th>Cantidad</th>
                  <th></th>
                </tr>
              </thead>
            </table>

          <hr style="border-top:1px solid lightgray">  

          <div class="row">
            <div class="span8">
              <label><strong>Sugerencias y Comentarios Aquí:</strong></label>
              <textarea name="nota" rows="3" cols="80" style="width:100%" placeholder="Notas" maxlength="100"></textarea>
            </div>
              <input type="hidden" name="solicitante" value="<?php echo $SIS_Usuario; ?>">
          </div>

          </div>
          <div align="row">
              <input type="submit" name="guardar" value="Guardar" class="btn btn-institucional guardar">
              <a href="../almacen/solicitudes-material.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
            </form>
          </div>
        </div>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>