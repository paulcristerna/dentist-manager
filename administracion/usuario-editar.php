<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="usuarios">
<script src="validacion_usuario.js"></script>
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Departamento.php"; ?>
        <?php include "../core-saec/Puesto.php"; ?>

        <div class="span9">
          
          <h2>Editar Usuario</h2>
			
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php 
            $Usuario = new Usuario($_GET['usuario']);
            $Datos_Usuario = $Usuario->Obtener_Usuario();

	    	date_default_timezone_set('America/Los_Angeles');	    

            $date = new DateTime($Datos_Usuario['FechaNacimiento']);
            $FechaNacimiento = $date->format('d-m-Y'); 
          ?>

          <form method="post" action="validacion_usuario.php" onsubmit="return validacion_usuario_editar()">

          <div class="well">
            <div class="row">
              <div class="span9">
              <input type="hidden" name="usuario" value="<?php echo $_GET['usuario']; ?>">
              <label><strong>Número de Cuenta/Empleado</strong></label>
              <input type="text" id="numero-cuenta-empleado" name="numero-cuenta-empleado" value="<?php echo $Datos_Usuario['NumeroCuentaEmpleado']; ?>" placeholder="NumeroCuentaEmpleado" maxlength="10">
              </div>
            </div>

            <div class="row">
              <div class="span3">
              <br>
              <label><strong>Nombre(s)</strong><span class="obligatorio">*</span></label>
              <input type="text" id="nombre" name="nombre" value="<?php echo $Datos_Usuario['Nombre']; ?>" placeholder="Nombre(s)" maxlength="30">
              </div>              
            </div>

            <div class="row">
              <div class="span3">
              <br>
              <label><strong>Apellido Paterno</strong><span class="obligatorio">*</span></label>
              <input type="text" id="apellidopaterno" name="apellido-paterno" value="<?php echo $Datos_Usuario['ApellidoPaterno']; ?>" placeholder="Apellido Paterno" maxlength="30">
              </div> 

              <div class="span3">
              <br>
              <label><strong>Apellido Materno</strong></span></label>
              <input type="text" id="apellidomaterno" name="apellido-materno" value="<?php echo $Datos_Usuario['ApellidoMaterno']; ?>" placeholder="Apellido Materno" maxlength="30">
              </div>             
            </div>

            <div class="row">
              <div class="span3">
              <br>
              <label><strong>Sexo</strong><span class="obligatorio">*</span></label>
              <input type="radio" name="sexo" value="M" <?php echo ($Datos_Usuario['Sexo']=='M' ? 'checked':''); ?>> Masculino 
              <input type="radio" name="sexo" value="F" <?php echo ($Datos_Usuario['Sexo']=='F' ? 'checked':''); ?>> Femenino
              </div> 

              <div class="span3">
              <br>
              <label><strong>Fecha de Nacimiento</strong><span class="obligatorio">*</span></label>
              <input type="text" name="fecha-nacimiento" placeholder="DD-MM-AAAA" class="calendario" value="<?php echo $FechaNacimiento; ?>" maxlength="10">
              </div>
            </div>           

            <div class="row">  
              <div class="span3">  
              <br>   
              <label><strong>Calle</strong></label>
              <input type="text" id="calle" name="calle"  placeholder="Calle" value="<?php echo $Datos_Usuario['Calle']; ?>" maxlength="30">
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Numero</strong></label>
              <input type="text" id="numero" name="numero"  placeholder="Numero" maxlength="10" value="<?php echo $Datos_Usuario['Numero']; ?>" maxlength="10">
              </div>              
            </div>
			  
            <div class="row">
              <div class="span3">  
              <br>       
              <label><strong>Colonia</strong><span class="obligatorio">*</span></label>
              <input type="text" id="colonia" name="colonia"  placeholder="Colonia" value="<?php echo $Datos_Usuario['Colonia']; ?>" maxlength="30">
              </div>
              <div class="span3">  
              <br>       
              <label><strong>Población</strong><span class="obligatorio">*</span></label>
              <input type="text" id="poblacion" name="poblacion"  placeholder="Población" value="<?php echo $Datos_Usuario['Poblacion']; ?>" maxlength="30">
              </div>
            </div>

            <div class="row">
              <div class="span3">  
              <br>   
              <label><strong>Teléfono</strong><span class="obligatorio">*</span></label>
              <input type="text" id="telefono" name="telefono"  placeholder="Teléfono" value="<?php echo $Datos_Usuario['Telefono']; ?>" maxlength="10">
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Correo electrónico</strong><span class="obligatorio">*</span></label>
              <input type="text" id="correo" style="text-transform:lowercase;" name="email"  placeholder="Correo electronico" value="<?php echo $Datos_Usuario['Email']; ?>" maxlength="30">
              </div>
            </div>

            <div class="row">
              <div class="span3">  
                <br>   
                <label><strong>Tipo</strong><span class="obligatorio">*</span></label>
                <select name="tipo">
                  <option value="1" <?php echo ($Datos_Usuario['Tipo'] == '1' ? "selected":""); ?>>Empleado</option>
                  <option value="2" <?php echo ($Datos_Usuario['Tipo'] == '2' ? "selected":""); ?>>Alumno</option>
                </select>
              </div>

              <div class="span3">  
                <br>   
                <label><strong>Departamento</strong></label>
                <select name="departamento">
                  <option value="0">------</option>
                <?php 
                  //listado de departamentos
                  $Departamento = new Departamento($Datos_Usuario['IdDepartamento']);
                  $Departamento->ListadoSelect();
                ?>
                </select>
              </div>             
             </div>

             <div class="row">
              <div class="span3">  
                <br>   
                <label><strong>Puesto</strong><span class="obligatorio">*</span></label>
                <select name="puesto">
                    <option value="0">------</option>
                    <?php
                      //listado de puestos
                      $Puesto = new Puesto($Datos_Usuario['IdPuesto']);
                      $Puesto->ListadoSelect();
                    ?>
                </select>  
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Turno</strong><span class="obligatorio">*</span></label>
                <select name="turno">
                    <option value="1" <?php echo ($Datos_Usuario['Turno'] == '1' ? "selected":""); ?>>Matutino</option>
                    <option value="2" <?php echo ($Datos_Usuario['Turno'] == '2' ? "selected":""); ?>>Vespertino</option>
                    <option value="3" <?php echo ($Datos_Usuario['Turno'] == '3' ? "selected":""); ?>>Mixto</option>
                </select>
              </div>
                 
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
            <h2>Cuenta de Usuario</h2>
            </div>
            
            <div class="well">
              <div class="row">  
                <div class="span3">     
                <label><strong>Nombre de Usuario</strong><span class="obligatorio">*</span></label>
                <input type="text" id="usuario" name="nombre-usuario"  placeholder="Nombre de Usuario" value="<?php echo $Datos_Usuario['Usuario']; ?>" maxlength="30">
                </div>
              </div>

              <div class="row">  
                <br>
                <div class="span3">     
                <label><strong>Contraseña</strong><span class="obligatorio">*</span></label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" maxlength="30">
                </div>

                <div class="span3">
                  <label><strong>Confirmar Contraseña</strong><span class="obligatorio">*</span></label>
                  <input type="password" id="contrasenaconfirmar" name="contrasena-confirmacion" class="input-block-level2" value="" placeholder="Confirmar Contraseña" maxlength="30">
                </div>
              </div>
          </div>

          <div align="row">
            <input type="submit" name="editar" value="Guardar" class="btn btn-institucional guardar" id="Guardar">
            <a href="../administracion/usuarios.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
          </div>

          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>
