<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="comunidades-asignar">
<script src="validacion_comunidades_asignar.js"></script>
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Comunidad.php"; ?>

        <div class="span9">
          
          <h2>Editar Asignación Comunidad</h2>
          <div id="campo-error"></div>

          <?php 
            $Comunidad = new Comunidad();
            $Comunidad->IdAsignacionComunidad = $_GET['asignacion-comunidad'];
            $Datos_Comunidad = $Comunidad->Obtener_Asignacion_Comunidad();
          ?>

          <form method="post" action="validacion_comunidad_asignar.php" onsubmit="return validacion_comunidad_asignar()">

          <div class="well"> 

            <div class="row">
              <div class="span4"> 
              <input type="hidden" name="asignacion-comunidad" value="<?php echo $_GET['asignacion-comunidad']; ?>">
              <label><strong>Comunidad<span class="obligatorio">*</span></strong></label>
              <select class="input-block-level2" name="comunidad">
                <option value="0" selected>---</option>
                <?php 
                  //listado de comunidades
                  $Comunidad = new Comunidad($Datos_Comunidad['IdComunidad']);
                  $Comunidad->ListadoSelect();
                ?>
              </select>
              </div>
            </div>        

            <div class="row"> 
            <div class="span4"> 
              <br />
              <label><strong>Doctor Comunitario<span class="obligatorio">*</span></strong></label>
              <select class="input-block-level2" name="doctor-comunitario">
              <option value="0" selected>---</option>
              <?php 
                //listado de doctores comunitarios
                $Usuario = new Usuario($Datos_Comunidad['IdDoctorComunitario']);
                $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Doctor Comunitario');
              ?>
              </select>
              </div>

              <div class="span4">
                <br />
                <label><strong>Alumno Tesorero<span class="obligatorio">*</span></strong></label>
                <select class="input-block-level2" name="alumno-tesorero">
                <option value="0" selected>---</option>
                <?php 
                  //listado de alumnos tesoreros
                  $Usuario = new Usuario($Datos_Comunidad['IdAlumnoTesorero']);
                  $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Alumno Tesorero');
                ?>
                </select>
              </div>

              <div class="span1">
                <br />
                <label><strong>Semestre<span class="obligatorio">*</span></strong></label>
                <input type="text" class="solo-numeros" maxlength="2" name="semestre" value="<?php echo $Datos_Comunidad['Semestre']; ?>" style="width:100%" placeholder="Semestre">
              </div>

              <div class="span1">
                <br />
                <label><strong>Grupo<span class="obligatorio">*</span></strong></label>
                <input type="text" class="solo-numeros" maxlength="2" name="grupo" value="<?php echo $Datos_Comunidad['Grupo']; ?>" style="width:100%" placeholder="Grupo">
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
          
          <div align="row">
            <input type="submit" name="editar" value="Guardar" class="btn btn-institucional guardar">
            <a href="../administracion/comunidades-asignadas.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div>  

          </form>

        </div>
        
      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>