<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="pacientes">
<script src="validacion_paciente.js"></script>
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>

        <div class="span9">
          
          <h2>Nuevo Paciente</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_paciente.php" onsubmit="return validacion_paciente()">

          <div class="well">
            <div class="row">
              <div class="span3">
              <label><strong>Nombre</strong><span class="obligatorio">*</span></label>
              <input type="text" id="nombre" name="nombre" class="input-block-level2 solo-letras" placeholder="Nombre" maxlength="30">
              </div>              
            </div>

            <div class="row">
              <div class="span3">
              <br>
              <label><strong>Apellido Paterno</strong><span class="obligatorio">*</span></label>
              <input type="text" id="apellidopaterno" name="apellido-paterno" class="input-block-level2 solo-letras" placeholder="Apellio Paterno" maxlength="30">
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
              <label><strong>Fecha de Nacimiento</strong></label>
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
              <input type="text" id="numero" name="numero" style="width:140px;" class="input-block-level2 solo-numeros" placeholder="Numero" maxlength="10" maxlength="10">
              </div>              
            </div>
            <div class="row">
              

              <div class="span3">  
              <br>       
              <label><strong>Colonia</strong></label>
              <input type="text" id="colonia" name="colonia" class="input-block-level2" placeholder="Colonia" maxlength="30">
              </div>
              <div class="span3">  
              <br>       
              <label><strong>Población</strong></label>
              <input type="text" value="Culiacán, Sinaloa" id="poblacion" name="poblacion" class="input-block-level2" placeholder="Población" maxlength="30">
              </div>
            </div>

            <div class="row">
              <div class="span3">  
              <br>   
              <label><strong>Teléfono</strong></label>
              <input type="text" id="telefono" name="telefono" class="input-block-level2 solo-numeros" placeholder="Teléfono" maxlength="10">
              </div>

              <div class="span2">  
              <br>   
              <label><strong>Correo electronico</strong></label>
              <input type="text" style="text-transform:lowercase;" id="correo" name="email" class="input-block-level2" placeholder="Correo electronico" maxlength="30">
              </div>
            </div>  
            <br />
            <div class="row">
              <div class="span3">  
              <label><strong>Ocupación</strong></label>
              <input type="text" id="ocupacion" name="ocupacion" class="input-block-level2" placeholder="Ocupación" maxlength="30">
              </div>
            <div class="span3">  
              <label><strong>Código Postal</strong></label>
              <input type="text" id="codigo-postal" name="codigo-postal" class="input-block-level2" placeholder="Código Postal" maxlength="30">
            </div>
          </div>
          <br />
            <div class="row">
              <div class="span3">  
              <label><strong>Lugar de Nacimiento</strong></label>
              <input type="text" id="lugar-nacimiento" name="lugar-nacimiento" class="input-block-level2" placeholder="Lugar de Nacimiento" maxlength="30" value="Culiacán, Sinaloa">
              </div>
              <div class="span3"> 
                  <label><strong>Estado Civil: </strong></label>
                  <select name="estado-civil" id="estado-civil">
                        <option value="Soltero">Soltero</option> 
                        <option value="Casado">Casado</option>
                  </select>
               </div> 
          </div>
          <br />
          <div class="row">
            <div class="span4"> 
                  <label><strong>Escolaridad: </strong></label>
	              <select name="escolaridad" id="escolaridad">
                    <option value="Basica">Básica</option> 
	                <option value="Media">Media</option>
                    <option value="Media Superior">Media Supeior</option> 
	                <option value="Superior">Superior</option>
                    <option value="Posgrado">Posgrado</option> 
		          </select>
                </div>
          </div>
        </div> 

          <div align="row">
            <input type="submit" name="guardar" value="Guardar" class="btn btn-institucional guardar" id="Guardar">
            <a href="../clinica/pacientes.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
          </div>

          </form>
          
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>