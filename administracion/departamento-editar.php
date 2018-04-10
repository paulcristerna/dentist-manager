<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="departamentos">
<script src="validacion_departamento.js"></script>       
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include '../core-saec/Departamento.php'; ?>
        <?php include '../core-saec/Area.php'; ?>

        <div class="span9">
          
          <h2>Editar Departamento</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php 
            $Departamento = new Departamento($_GET['departamento']);
            $Datos_Departamento = $Departamento->Obtener_Departamento();
          ?>

          <form method="post" action="validacion_departamento.php" onsubmit="return validacion_departamento()">
          <div class="well">
            <div class="row">
              <div class="span6">
                  <input type="hidden" name="departamento" value="<?php echo $_GET['departamento']; ?>">
                  <label><strong>Nombre del departamento</strong><span class="obligatorio">*</span></label>
                  <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="input-block-level2" value="<?php echo $Datos_Departamento['Nombre']; ?>" style="width:92%;" maxlength="50">
            </div>
          </div>            

            <div class="row">
              <div class="span3">  
              <br>       
              <label><strong>Calle</strong><span class="obligatorio">*</span></label>
              <input type="text" id="calle" name="calle" placeholder="Calle" value="<?php echo $Datos_Departamento['Calle']; ?>">
              </div>
                
              <div class="span3">  
              <br>       
              <label><strong>Numero</strong><span class="obligatorio">*</span></label>
              <input type="text" name="numero" id="numero" value="<?php echo $Datos_Departamento['Numero']; ?>" placeholder="Numero">
              </div>
            </div> 

              <div class="row">
                <div class="span3">  
                <br>       
                <label><strong>Colonia</strong><span class="obligatorio">*</span></label>
                <input type="text" id="colonia" name="colonia" placeholder="Colonia" value="<?php echo $Datos_Departamento['Colonia']; ?>">
              </div>
                  
            <div class="span3">
              <br>
              <label><strong>Población</strong><span class="obligatorio">*</span></label>
              <input type="text" id="poblacion" name="poblacion" value="<?php echo $Datos_Departamento['Poblacion']; ?>" placeholder="Población">
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
                $Areas = $Departamento->Obtener_Areas_Departamento();
                $Area = new Area();
                $Area->ListadoCheckBox($Areas);
              ?>
            </div>
          </div>
          
          <div align="row">
            <input type="submit" value="Guardar" name="editar" class="btn btn-institucional guardar" id="Guardar">
            <a href="../administracion/departamentos.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div>
          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>
