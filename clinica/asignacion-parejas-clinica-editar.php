<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="asignacion-parejas-clinica">
<script src="validacion_asignacion_parejas_clinica.js"></script>
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Pareja_Clinica.php"); ?>
        <?php include("../core-saec/Materia.php"); ?>
        <?php include("../core-saec/Departamento.php"); ?>
        <?php include("../core-saec/Comunidad.php"); ?>

        <div class="span9">
          
          <h2>Editar Asignación de Pareja Clínica</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>
            
          <?php 
            $Pareja_Clinica = new Pareja_Clinica($_GET['pareja-clinica']);
            $Datos_Pareja_Clinica = $Pareja_Clinica->Obtener_Pareja_Clinica();
          ?>

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
                    $Departamento->IdDepartamento = $Datos_Pareja_Clinica['IdDepartamento'];
                    $Departamento->ListadoSelect();
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
                    $Comunidad->IdComunidad = $Datos_Pareja_Clinica['IdComunidad'];
                    $Comunidad->ListadoSelect();
                  ?>                  
                </select>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="span3">
                <input type="hidden" value="<?php echo $Datos_Pareja_Clinica['IdParejaClinica']; ?>" name="pareja-clinica">
                <label><strong>Medico Titular<span class="obligatorio">*</span></strong></label>
                <select class="input-block-level2" name="medico-titular" id="medico-titular"> 
                  <option value="0">------</option>
                  <?php 
                    //listado de medicos titulares
                    $Usuario = new Usuario($Datos_Pareja_Clinica['IdMedicoTitular']);
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
                    //listado de materias
                    $Materia = new Materia($Datos_Pareja_Clinica['IdMateria']);
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
                    //listado de alumnos operadores/asistentes
                    $Usuario = new Usuario($Datos_Pareja_Clinica['IdAlumnoOpAs1']);
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
                    //listado de alumnos operadores/asistentes
                    $Usuario = new Usuario($Datos_Pareja_Clinica['IdAlumnoOpAs2']);
                    $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Alumno Operador/Asistente');
                  ?>                  
                </select>
              </div>             
            </div>
              
            <div class="row">
                <div class="span3">
                    <br>
                    <label><strong>Grupo<span class="obligatorio">*</span></strong></label>
                    <input type="text" id="grupo" value="<?php echo $Datos_Pareja_Clinica['Grupo']; ?>" name="grupo" class="solo-numeros" style="width:80px;" placeholder="Grupo" maxlength="2">
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
            <input type="submit" name="editar" value="Guardar" class="btn btn-institucional guardar" id="Guardar">
            <a href="../clinica/asignacion-parejas-clinica.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div>

          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>