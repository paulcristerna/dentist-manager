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
          
          <h2>Nuevo Usuario</h2>
			
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_usuario.php" onsubmit="return validacion_usuario()">

          <div class="well">
            <div class="row">
              <div class="span3">          
              <label><strong>Número de Cuenta/Empleado</strong></label>
              <input type="text" id="numero-cuenta-empleado" name="numero-cuenta-empleado" class="input-block-level2 solo-numeros" placeholder="Número de Empleado" maxlength="10">
              </div>
			  <div class="span4">
				  <br />
				  <div id="numero-cuenta-empleado-repetido">
              		<input type="hidden" id="numero-cuenta-empleado-campo-repetido" value="0">
				  </div>
			  </div>
            </div>

            <div class="row">
              <div class="span3">
              <br>
              <label><strong>Nombre(s)</strong><span class="obligatorio">*</span></label>
              <input type="text" id="nombre" name="nombre" class="input-block-level2 solo-letras" placeholder="Nombre(s)" maxlength="30">
              </div>              
            </div>

            <div class="row">
              <div class="span3">
              <br>
              <label><strong>Apellido Paterno</strong><span class="obligatorio">*</span></label>
              <input type="text" id="apellidopaterno" name="apellido-paterno" class="input-block-level2 solo-letras" placeholder="Apellido Paterno" maxlength="30">
              </div> 

              <div class="span3">
              <br>
              <label><strong>Apellido Materno</strong></span></label>
              <input type="text" id="apellidomaterno" name="apellido-materno" class="input-block-level2 solo-letras" placeholder="Apellido Materno" maxlength="30">
              </div>             
            </div>

            <div class="row">
              <div class="span3">
              <br>
              <label><strong>Sexo</strong><span class="obligatorio">*</span></label>
              <input type="radio" name="sexo" value="M" checked> Masculino 
              <input type="radio" name="sexo" value="F"> Femenino
              </div> 

              <div class="span3">
              <br>
              <label><strong>Fecha de Nacimiento</strong><span class="obligatorio">*</span></label>
              <input type="text" name="fecha-nacimiento" placeholder="DD-MM-AAAA" class="calendario" maxlength="10">
              </div>
            </div>           

            <div class="row">  
              <div class="span3">  
              <br>   
              <label><strong>Calle</strong></label>
              <input type="text" id="calle" name="calle" class="input-block-level2" placeholder="Calle" maxlength="30">
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Numero</strong></label>
              <input type="text" id="numero" name="numero" style="width:140px;" class="input-block-level2 solo-numeros" placeholder="Numero" maxlength="10">
              </div>              
            </div>
			  
            <div class="row">
				<div class="span3">  
				  <br>       
				  <label><strong>Colonia</strong><span class="obligatorio">*</span></label>
				  <input type="text" id="colonia" name="colonia" class="input-block-level2" placeholder="Colonia" maxlength="30">
              	</div>
              <div class="span3">  
				  <br>       
				  <label><strong>Población</strong><span class="obligatorio">*</span></label>
				  <input type="text" value="Culiacán, Sinaloa" id="poblacion" name="poblacion" class="input-block-level2" placeholder="Población" maxlength="30">
              </div>
            </div>

            <div class="row">
              <div class="span3">  
              <br>   
              <label><strong>Teléfono</strong><span class="obligatorio">*</span></label>
              <input type="text" id="telefono" name="telefono" class="input-block-level2 solo-numeros" placeholder="Teléfono" maxlength="10">
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Correo electrónico</strong><span class="obligatorio">*</span></label>
              <input type="text" style="text-transform:lowercase;" id="correo" name="email" class="input-block-level2" placeholder="Correo electrónico" maxlength="30">
              </div>
            </div>

            <div class="row">
              <div class="span3">  
                <br>   
                <label><strong>Tipo</strong><span class="obligatorio">*</span></label>
                <select name="tipo" id="tipo">
                  <option value="1">Empleado</option>
                  <option value="2">Alumno</option>
                </select>
              </div>

              <div class="span3">  
                <br>   
                <label><strong>Departamento</strong></label>
                <select name="departamento" id="departamento">
                  <option value="0">------</option>
                <?php 
                  //listado de departamentos
                  $Departamento = new Departamento();
                  $Departamento->ListadoSelect();
                ?>
                </select>
              </div>             
             </div>

             <div class="row">
              <div class="span3">  
                <br>   
                <label><strong>Puesto</strong><span class="obligatorio">*</span></label>
                <select name="puesto" id="puesto">
                    <option value="0">------</option>
                    <?php
                      //listado de puestos
                      $Puesto = new Puesto();
                      $Puesto->ListadoSelect();
                    ?>
                </select>  
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Turno</strong><span class="obligatorio">*</span></label>
                <select name="turno" id="turno">
                    <option value="1">Matutino</option>
                    <option value="2">Vespertino</option>
                    <option value="3">Mixto</option>
                </select>
              </div>
            </div>
          </div><!-- well --> 
			
            <h2>Cuenta de Usuario</h2>
            
            <div class="well">
              <div class="row">  
                <div class="span3">     
					<label><strong>Nombre de Usuario</strong><span class="obligatorio">*</span></label>
					<input type="text" id="usuario" name="usuario" class="input-block-level2" placeholder="Nombre de Usuario" maxlength="30">
                </div>
				<div class="span4">   
					<br />
					<div id="usuario-repetido"><input type="hidden" id="nombre-usuario-repetido" value="0"></div>
                </div>
              </div>

              <div class="row">  
                <br>
                <div class="span3">     
                <label><strong>Contraseña</strong><span class="obligatorio">*</span></label>
                <input type="password" id="contrasena" name="contrasena" class="input-block-level2" value="" placeholder="Contraseña" maxlength="30">
                </div>

                <div class="span3">
                  <label><strong>Confirmar Contraseña</strong><span class="obligatorio">*</span></label>
                  <input type="password" id="contrasenaconfirmar" name="contrasena-confirmacion" class="input-block-level2" value="" placeholder="Confirmar Contraseña" maxlength="30">
                </div>
              </div>
          </div>

          <div align="row">
            <input type="submit" name="guardar" value="Guardar" class="btn btn-institucional guardar" id="Guardar">
            <a href="../administracion/usuarios.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div>

          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>