<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="asignacion-parejas-clinica">
<script src="validacion_asignacion_parejas_clinica.js"></script>
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Departamento.php"); ?>
        <?php include("../core-saec/Comunidad.php"); ?>
        <?php include("../core-saec/Materia.php"); ?>

        <div class="span9">
          
          <h2>Nueva Asignación de Pareja Clínica</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_asignacion_parejas_clinica.php" onsubmit="return validacion_asignacion_parejas_clinica()">

          <div class="well">
            <div class="row">
              <div class="span3">
                <label><strong>Clínica<span class="obligatorio">*</span></strong></label>
                <select class="input-block-level2" name="departamento" id="departamento"> 
                  <option value="0">------</option>
                  <?php 
                    //listado de clinicas
                    $Departamento = new Departamento();
                    $Departamento->ListadoSelectClinica();
                  ?>                  
                </select>
              </div> 
              <div class="span0.5"><br /><p>ó</p></div>
              <div class="span3">
                <label><strong>Comunidad<span class="obligatorio">*</span></strong></label>
                <select class="input-block-level2" name="comunidad" id="comunidad"> 
                  <option value="0">------</option>
                  <?php 
                    //listado de comunidades
                    $Comunidad = new Comunidad();
                    $Comunidad->ListadoSelect();
                  ?>                  
                </select>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="span3">
                <label><strong>Medico Titular<span class="obligatorio">*</span></strong></label>
                <select class="input-block-level2" name="medico-titular" id="medico-titular"> 
                  <option value="0">------</option>
                  <?php 
                    //listado de medico titular
                    $Usuario = new Usuario();
                    $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Medico Titular');
                  ?>                  
                </select>
              </div>             
            </div>
              
            <div class="row">
              <div class="span3">
                <br />
                <label><strong>Materia<span class="obligatorio">*</span></strong></label>
                <select class="input-block-level2" name="materia" id="materia"> 
                  <option value="0">------</option>
                  <?php 
                    //listado de materia
                    $Materia = new Materia();
                    $Materia->ListadoSelectMaterias();
                  ?>                  
                </select>
              </div>             
            </div>

            <div class="row">
              <div class="span3">
                <br>
                <label><strong>Alumno Operador/Asistente 1<span class="obligatorio">*</span></strong></label>
                <select class="input-block-level2" name="alumno-op-as-1" id="alumno-op-as-1"> 
                  <option value="0">------</option>
                  <?php 
                    //listado de alumno operadores/asistentes
                    $Usuario = new Usuario();
                    $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Alumno Operador/Asistente');
                  ?>                  
                </select>
              </div>   
                
              <div class="span3">
                <br>
                <label><strong>Alumno Operador/Asistente 2<span class="obligatorio">*</span></strong></label>
                <select class="input-block-level2" name="alumno-op-as-2" id="alumno-op-as-2"> 
                  <option value="0">------</option>
                  <?php 
                    //listado de alumno operadores/asistentes
                    $Usuario = new Usuario();
                    $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Alumno Operador/Asistente');
                  ?>                  
                </select>
              </div>             
            </div>
              
            <div class="row">
                <div class="span3">
                    <br>
                    <label><strong>Grupo<span class="obligatorio">*</span></strong></label>
                    <input type="text" id="grupo" name="grupo" class="solo-numeros" style="width:80px;" placeholder="Grupo" maxlength="2">
                </div>
            </div>
              
        </div> 

          <div align="row">
            <input type="submit" name="guardar" value="Guardar" class="btn btn-institucional guardar">
            <a href="../clinica/asignacion-parejas-clinica.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div>

          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>