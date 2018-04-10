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
          
          <h2>Nueva Comunidad</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_comunidades.php" onsubmit="return validacion_comunidad()">

          <div class="well">
            <div class="row">
              <div class="span6">
              <label><strong>Nombre de la comunidad</strong><span class="obligatorio">*</span></label>
              <input type="text" id="nombre" name="nombre" placeholder="Nombre" style="width:100%;" maxlength="50" class="input-block-level2">
            </div>
          </div>            

            <div class="row">
              <div class="span3">  
              <br>       
              <label><strong>Calle</strong></label>
              <input type="text" id="calle" name="calle" placeholder="Calle" maxlength="30" class="input-block-level2">
              </div>
                
              <div class="span3">  
              <br>       
              <label><strong>Numero</strong></label>
              <input type="text" id="numero" name="numero" placeholder="Numero" class="input-block-level2 solo-numeros" maxlength="10">
              </div>
            </div> 

              <div class="row">
                <div class="span3">  
                <br>       
                <label><strong>Colonia</strong><span class="obligatorio">*</span></label>
                <input type="text" id="colonia" name="colonia" placeholder="Colonia" maxlength="30" class="input-block-level2">
              </div>
                  
            <div class="span3">
              <br>
              <label><strong>Población</strong><span class="obligatorio">*</span></label>
              <input type="text" value="Culiacán, Sinaloa" id="poblacion" name="poblacion" placeholder="Población" maxlength="30" class="input-block-level2">
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
                $Area = new Area();
                $Area->ListadoCheckBox();
              ?>
            </div>
          </div>
          
          <div align="row">
            <input type="submit" value="Guardar" name="guardar" class="btn btn-institucional guardar" id="Guardar">
            <a href="../administracion/comunidades.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div> 
          </form> 
          
        </div>
                
      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>