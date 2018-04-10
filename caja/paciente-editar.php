<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="pacientes">
<script src="validacion_paciente.js"></script>
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Paciente.php"); ?>

        <div class="span9">
          
          <h2>Nuevo Paciente</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>
            
          <?php 
            $Paciente = new Paciente($_GET['paciente']);
            $Datos_Paciente = $Paciente->Obtener_Paciente();   

            $date = new DateTime($Datos_Paciente['FechaNacimiento']);
            $FechaNacimiento = $date->format('d-m-Y');
          ?>

          <form method="post" action="validacion_paciente.php" onsubmit="return validacion_paciente()">

          <div class="well">
            <div class="row">
              <div class="span3">
              <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
              <input type="text" value="<?php echo $Datos_Paciente['Nombre']; ?>" id="nombre" name="nombre" class="input-block-level2 solo-letras" placeholder="Nombre" maxlength="30">
              </div>              
            </div>

            <div class="row">
              <div class="span3">
              <br>
              <label><strong>Apellido Paterno</strong><span class="obligatorio">*</span></label>
              <input type="text" value="<?php echo $Datos_Paciente['ApellidoPaterno']; ?>" id="apellidopaterno" name="apellido-paterno" class="input-block-level2 solo-letras" placeholder="Apellio Paterno" maxlength="30">
              </div> 

              <div class="span3">
              <br>
              <label><strong>Apellido Materno</strong></span></label>
              <input type="text" value="<?php echo $Datos_Paciente['ApellidoMaterno']; ?>" id="apellidomaterno" name="apellido-materno" class="input-block-level2 solo-letras" placeholder="Apellido Materno" maxlength="30">
              </div>             
            </div>

            <div class="row">
              <div class="span3">
              <br>
              <label><strong>Sexo</strong><span class="obligatorio">*</span></label>
              <input type="radio" name="sexo" value="M" <?php echo ($Datos_Paciente['Sexo']=='M' ? 'checked':''); ?>> Masculino 
              <input type="radio" name="sexo" value="F" <?php echo ($Datos_Paciente['Sexo']=='F' ? 'checked':''); ?>> Femenino
              </div> 

              <div class="span3">
              <br>
              <label><strong>Fecha de Nacimiento</strong><span class="obligatorio">*</span></label>
              <input type="text" value="<?php echo $FechaNacimiento; ?>" name="fecha-nacimiento" placeholder="DD-MM-AAAA" class="calendario" maxlength="10">
              </div>
            </div>            

            <div class="row">  
              <div class="span3">  
              <br>   
              <label><strong>Calle</strong></label>
              <input type="text" value="<?php echo $Datos_Paciente['Calle']; ?>" id="calle" name="calle" class="input-block-level2" placeholder="Calle" maxlength="30">
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Numero</strong></label>
              <input type="text" value="<?php echo $Datos_Paciente['Numero']; ?>" id="numero" name="numero" style="width:140px;" class="input-block-level2 solo-numeros" placeholder="Numero" maxlength="10" maxlength="10">
              </div>              
            </div>
            <div class="row">
              

              <div class="span3">  
              <br>       
              <label><strong>Colonia</strong><span class="obligatorio">*</span></label>
              <input type="text" value="<?php echo $Datos_Paciente['Colonia']; ?>" id="colonia" name="colonia" class="input-block-level2" placeholder="Colonia" maxlength="30">
              </div>
              <div class="span3">  
              <br>       
              <label><strong>Población</strong><span class="obligatorio">*</span></label>
              <input type="text" value="<?php echo $Datos_Paciente['Poblacion']; ?>" id="poblacion" name="poblacion" class="input-block-level2" placeholder="Población" maxlength="30">
              </div>
            </div>

            <div class="row">
              <div class="span3">  
              <br>   
              <label><strong>Teléfono</strong></label>
              <input type="text" value="<?php echo $Datos_Paciente['Telefono']; ?>" id="telefono" name="telefono" class="input-block-level2 solo-numeros" placeholder="Teléfono" maxlength="10">
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Correo electronico</strong></label>
              <input type="text" value="<?php echo $Datos_Paciente['Email']; ?>" style="text-transform:lowercase;" id="correo" name="email" class="input-block-level2" placeholder="Correo electronico" maxlength="30">
              </div>
            </div> 
            <br>
            <div class="row">
              <div class="span3"> 
              <label><strong>Ocupación</strong></label>
              <input type="text" value="<?php echo $Datos_Paciente['Ocupacion']; ?>" id="ocupacion" name="ocupacion" class="input-block-level2" placeholder="Ocupación" maxlength="30">
              </div>
	      <div class="span3">  
              <label><strong>Código Postal</strong></label>
              <input type="text" id="codigo-postal" name="codigo-postal" class="input-block-level2" value="<?php echo $Datos_Paciente['CodigoPostal']; ?>" placeholder="Código Postal" maxlength="30">
            </div>
            </div> 
	      
	    <br />
            <div class="row">
              <div class="span3">  
              <label><strong>Lugar de Nacimiento</strong></label>
              <input type="text" id="lugar-nacimiento" name="lugar-nacimiento" class="input-block-level2" value="<?php echo $Datos_Paciente['LugarNacimiento']; ?>" placeholder="Lugar de Nacimiento" maxlength="30">
              </div>
              <div class="span3"> 
                  <label><strong>Estado Civil: </strong></label>
                  <select name="estado-civil" id="estado-civil">
                        <option value="Soltero" <?php echo $Datos_Paciente['EstadoCivil'] == "Soltero" ? "selected":""; ?>>Soltero</option> 
                        <option value="Casado" <?php echo $Datos_Paciente['EstadoCivil'] == "Casado" ? "selected":""; ?>>Casado</option>
                  </select>
               </div> 
            </div>
            <br />
          <div class="row">
            <div class="span4"> 
                  <label><strong>Escolaridad: </strong></label>
	              <select name="escolaridad" id="escolaridad">
                    <option value="Basica" <?php echo $Datos_Paciente['Escolaridad'] == "Básica" ? "selected":""; ?>>Básica</option> 
	                <option value="Media" <?php echo $Datos_Paciente['Escolaridad'] == "Media" ? "selected":""; ?>>Media</option>
                    <option value="Media Superior" <?php echo $Datos_Paciente['Escolaridad'] == "Media Superior" ? "selected":""; ?>>Media Supeior</option> 
	                <option value="Superior" <?php echo $Datos_Paciente['Escolaridad'] == "Superior" ? "selected":""; ?>>Superior</option>
                    <option value="Posgrado" <?php echo $Datos_Paciente['Escolaridad'] == "Posgrado" ? "selected":""; ?>>Posgrado</option> 
		          </select>
                </div>
          </div>
              
            <div class="row">
              <div class="span5"> 
                  <br>
                  <label><strong>Estatus</strong></label>
                  <select name="estatus">
                    <option value="1" <?php echo $Datos_Paciente['Estatus'] == "1" ? "selected":""; ?>>Activo</option>
                    <option value="0" <?php echo $Datos_Paciente['Estatus'] == "0" ? "selected":""; ?>>Inactivo</option>
                  </select>
              </div>
            </div>
        </div> 

          <div align="row">
            <input type="hidden" value="<?php echo $_GET['paciente']; ?>" name="paciente">
            <input type="submit" name="editar" value="Guardar" class="btn btn-institucional guardar" id="Guardar">
            <a href="../clinica/pacientes.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div>

          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>