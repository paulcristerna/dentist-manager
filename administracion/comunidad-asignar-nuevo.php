<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="comunidades-asignar">
<script src="validacion_comunidad_asignar.js"></script>
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Comunidad.php"; ?>

        <div class="span9">
          
          <h2>Asignar Comunidad</h2>
          <div id="campo-error"></div>
          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_comunidad_asignar.php" onsubmit="return validacion_comunidad_asignar()">

          <div class="well"> 

            <div class="row">
              <div class="span4"> 
              <label><strong>Comunidad<span class="obligatorio">*</span></strong></label>
              <select class="input-block-level2" name="comunidad" id="comunidad">
                <option value="0" selected>---</option>
                <?php 
                  //listado de comunidades
                  $Comunidad = new Comunidad();
                  $Comunidad->ListadoSelect();
                ?>
              </select>
              </div>
            </div>        

            <div class="row"> 
            <div class="span4"> 
              <br />
              <label><strong>Doctor Comunitario<span class="obligatorio">*</span></strong></label>
              <select class="input-block-level2" name="doctor-comunitario" id="doctor" >
              <option value="0" selected>---</option>
              <?php 
                //listado de doctor comunitarios
                $Usuario = new Usuario();
                $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Doctor Comunitario');
              ?>
              </select>
              </div>

              <div class="span4">
                <br />
                <label><strong>Alumno Tesorero<span class="obligatorio">*</span></strong></label>
                <select class="input-block-level2" name="alumno-tesorero" id="alumno">
                <option value="0" selected>---</option>
                <?php 
                  //listado de alumno tesorero
                  $Usuario = new Usuario();
                  $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Alumno Tesorero');
                ?>
                </select>
              </div>

              <div class="span1">
              <br />
              <label><strong>Semestre<span class="obligatorio">*</span></strong></label>
              <input type="text" class="solo-numeros" maxlength="2" id="semestre" name="semestre" style="width:100%" placeholder="Semestre">
              </div>

              <div class="span1">
              <br />
              <label><strong>Grupo<span class="obligatorio">*</span></strong></label>
              <input type="text" class="solo-numeros" maxlength="2" id="grupo" name="grupo" style="width:100%" placeholder="Grupo">
              </div>

            </div> 
          </div>
          
          <div align="row">
            <input type="submit" id="Guardar" name="guardar" value="Guardar" class="btn btn-institucional guardar">
            <a href="../administracion/comunidades-asignadas.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div>  

          </form>

        </div>
        
      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>