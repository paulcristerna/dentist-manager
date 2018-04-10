<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="comunidades">
<script src="validacion_comunidades.js"></script>
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Comunidad.php"; ?>
        <?php include '../core-saec/Area.php'; ?>

        <div class="span9">
          
          <h2>Editar Comunidad</h2>
          <div id="campo-error"></div>

          <?php 
			//obtener los datos de la comunidad
            $Comunidad = new Comunidad($_GET['comunidad']);
            $Datos_Comunidad = $Comunidad->Obtener_Comunidad();
          ?>

          <form method="post" action="validacion_comunidades.php" onsubmit="return validacion_comunidad()">
          <div class="well">
            <div class="row">
              <div class="span6">
              <input type="hidden" name="comunidad" value="<?php echo $_GET['comunidad']; ?>">
              <label><strong>Nombre de la comunidad</strong><span class="obligatorio">*</span></label>
              <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $Datos_Comunidad['Nombre']; ?>" style="width:100%;" maxlength="50" class="input-block-level2">
            </div>
          </div>            

            <div class="row">  
              <div class="span3">  
              <br>   
              <label><strong>Calle</strong></label>
              <input type="text" id="calle" name="calle"  placeholder="Calle" value="<?php echo $Datos_Comunidad['Calle']; ?>" class="input-block-level2">
              </div>

              <div class="span3">  
              <br>   
              <label><strong>Numero</strong></label>
              <input type="text" id="numero" name="numero"  placeholder="Numero" maxlength="10" value="<?php echo $Datos_Comunidad['Numero']; ?>" class="input-block-level2">
              </div>              
            </div>
            <div class="row">
              

              <div class="span3">  
              <br>       
              <label><strong>Colonia</strong><span class="obligatorio">*</span></label>
              <input type="text" id="colonia" name="colonia"  placeholder="Colonia" value="<?php echo $Datos_Comunidad['Colonia']; ?>" class="input-block-level2">
              </div>
              <div class="span3">  
              <br>       
              <label><strong>Población</strong><span class="obligatorio">*</span></label>
              <input type="text" id="poblacion" name="poblacion"  placeholder="Población" value="<?php echo $Datos_Comunidad['Poblacion']; ?>" class="input-block-level2">
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

          <div>
            <h2>Asignar Areas<span class="obligatorio">*</span></h2>
          </div>
            
          <div class="well">
            <div class="row">               
              <?php 
                //listado de areas
                $Areas = $Comunidad->Obtener_Areas_Comunidad();

                $Area = new Area();
                $Area->ListadoCheckBox($Areas);
              ?>
            </div>
          </div>
          
          <div align="row">
            <input type="submit" value="Guardar" name="editar" class="btn btn-institucional guardar" id="Guardar">
            <a href="../administracion/comunidades.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div> 
          </form> 
          
        </div>
                
      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>