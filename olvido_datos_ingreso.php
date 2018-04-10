<?php include("header.php"); ?>
<script src="validacion_olvido_datos_ingreso.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">       

        <div class="span6">

            <h2>Envio de Datos de ingreso al Sistema.</h2>
            
            <div id="campo-error"></div>
            
            <?php if(isset($_GET['exito'])): ?>
                <div class="alert alert-success"><?php echo $_GET['exito']; ?>.</div>
            <?php endif; ?>
            
            <?php if(isset($_GET['error'])): ?>
                <div class="alert alert-danger"><?php echo $_GET['error']; ?>.</div>
            <?php endif; ?>
			
			<p>Proporcione su <strong>Correo electronico</strong> para el envío sus datos de ingreso al sistema.</p>			
			<form method="post" onsubmit="return validacion_olvido_datos_ingreso()" action="envio_datos_ingreso.php">
				<label><strong>Correo electronico:</strong></label>
				<input type="text" id="correo-electronico" name="correo-electronico" class="input-block-level2" placeholder="Correo electronico" style="text-transform:lowercase;"> 

				<input type="submit" class="btn btn-institucional" name="enviar" value="Enviar">				
			</form>
        </div>
          
        <div class="nav-collapse collapse">
          <div class="span6">
            <p><img src="img/edificio-facultad-odontologia.jpg" alt="facultad odontologia uas"></p>
          </div>
        </div>

      </div><!--/.row -->

<?php include("footer.php"); ?>