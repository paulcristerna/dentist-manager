<?php include("header.php"); ?>
<script src="validacion_contacto.js"></script>

      <div class="container">

      <div class="row" id="contenido-sistema">       

        <div class="span6">
	
          <form method="post" action="validacion_contacto.php" onsubmit="return validacion_contacto()"> 
            <h2 class="form-signin-heading">Contacto</h2>
              
            <div id="campo-error"></div>
              
            <?php if(isset($_GET['exito'])): ?>
              <div class="row">
                <div class="span6">
                  <div class="alert alert-success"><?php echo $_GET['exito']; ?>.</div>
                </div>
              </div>              
            <?php endif; ?>

            <p>Proporcione su nombre, correo electrónico y mensaje para que el administrador
              se comunique con usted a la brevedad posible.</p>

            <label><strong>Nombre:</strong></label>
            <input type="text" class="input-block-level" id="nombre" name="nombre" placeholder="Nombre">

            <p></p>

            <label><strong>Correo electrónico:</strong></label>
            <input type="text" style="text-transform:lowercase;" class="input-block-level" id="email" name="email" placeholder="Correo electrónico">

            <p></p>

            <label><strong>Mensaje:</strong></label>
            <textarea placeholder="Mensaje" id="mensaje" name="mensaje" class="input-block-level" cols="50" rows="5"></textarea>

            <input type="submit" class="btn btn-institucional" id="enviar" name="enviar" value="Envio Mensaje" style="margin-top:20px;">
          </form>
        </div>

        <div class="row">

          <div class="span6">
            <p>
              <img src="img/edificio-facultad-odontologia.jpg" alt="facultad odontologia uas">
            </p>
          </div>

        </div>
        </form>

      </div><!--/.row -->

<?php include("footer.php"); ?>