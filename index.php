<?php include("header.php"); ?> 
<?php include("core-saec/AccesoBD.php"); ?>
<?php include("core-saec/Usuario.php"); ?>

    <div class="container">

      <div class="container">

      <div class="row" id="contenido-sistema">
        <div class="nav-collapse collapse">

          <div class="span6" style="border-right: 1px solid #E6E6E6; padding-right: 60px;">
            <h2>Bienvenido.</h2>
            <p>El uso de este sistema queda solo para uso exclusivo de los miembros con permiso previo por parte de la dirección de la Facultad de Odontología.</p>
            <p>
              <img src="img/paciente-fouas.jpg" alt="logotipo uas">
            </p>
          </div>

        </div>

        <div class="span5" style="padding-left: 10px;">
            <h2 class="form-signin-heading">Inicio de Sesión</h2>

            <p>Proporcione el nombre de usuario y contrasena que se le han asignado
            y oprima el botón de Iniciar Sesión.</p>

            <?php 
            // autenticar usuario
            if(isset($_REQUEST['ingresar']))
            {
              $Usuario = new Usuario();
              $Usuario->Usuario = $_POST['usuario'];
              $Contrasena = $Usuario->Encriptar($_POST['contrasena'],'F32_SAEC_FOUAS');
              $Usuario->Contrasena = $Contrasena;
              $Usuario->Autenticar();
            }
            ?>

            <form class="form-signin" method="post">

            <label><strong>Nombre de Usuario</strong></label>
            <input type="text" name="usuario" class="input-block-level" placeholder="Nombre de Usuario" id="usuario-login" autofocus>

            <br /><br />

            <label><strong>Contraseña</strong></label>
            <input type="password" name="contrasena" class="input-block-level" placeholder="Contraseña" id="contrasena-login">

            <input type="submit" value="Iniciar Sesión" name="ingresar" class="btn btn-large btn-institucional" style="margin-top:20px;">
            </form>

          <p><a href="olvido_datos_ingreso.php">¿Olvidó su Nombre de Usuario y/o Contraseña?</a></p>
        </div>

      </div><!--/.row -->

<?php include("footer.php"); ?>
