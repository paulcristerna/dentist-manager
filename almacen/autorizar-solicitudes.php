<?php include("../header2.php"); ?>

      <input type="hidden" id="ventana" value="autorizar-solicitudes">

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Solicitud_Material.php"); ?>

        <div class="span9">

          <div class="input-append pull-right">
            <form method="get" action="autorizar-solicitudes.php">
                <input class="span3" type="text" value="<?php if(isset($_GET['buscar'])): echo $_GET['buscar']; endif; ?>" placeholder="Buscar" name="buscar">
              <input type="submit" class="btn btn-institucional" value="Buscar"> 
            </form>
          </div>

          <?php if(isset($_GET['exito'])): ?>
			<div class="row">
			  <div class="span9">
				<div class="alert alert-success"><?php echo $_GET['exito']; ?></div>
			  </div>
			</div>              
		  <?php endif; ?> 

		  <?php if(isset($_GET['error'])): ?>
			<div class="row">
			  <div class="span9">
				<div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
			  </div>
			</div>              
		  <?php endif; ?>

          <table class="table table-striped">

            <thead>
              <tr>
                <th>Folio de Solicitud</th>
                <th>Departamento/Comunidad</th>
                <th>Estado</th>
                <th></th>
              </tr>
            </thead>

            <tbody>             
              <?php 
                //catalogo de solicitudes de materiales
                $Solicitud_Material = new Solicitud_Material();

                if($SIS_Datos_Usuario['NombrePuesto']=='Administrador'){
                    if(isset($_GET['buscar'])):
                        $Solicitud_Material->CatalogoAutorizar_Administrador($_GET['buscar']);
                    else:
                        $Solicitud_Material->CatalogoAutorizar_Administrador();
                    endif;
                    
                }else if($SIS_Datos_Usuario['NombrePuesto']=='Secretario Administrativo' || 
                         $SIS_Datos_Usuario['NombrePuesto']=='Auxiliar De Secretario Administrativo'){
                    if(isset($_GET['buscar'])):
                        $Solicitud_Material->CatalogoAutorizar_Secretario_Administrativo($_GET['buscar']);
                    else:
                        $Solicitud_Material->CatalogoAutorizar_Secretario_Administrativo();
                    endif;

                }else if($SIS_Datos_Usuario['NombrePuesto']=='Coordinador De Comunidades'){
                    if(isset($_GET['buscar'])):
                        $Solicitud_Material->CatalogoAutorizar_Coordinador_Comunidades($_GET['buscar']);
                    else:
                        $Solicitud_Material->CatalogoAutorizar_Coordinador_Comunidades();
                    endif;
                }
              ?>
            </tbody>
          </table>
        </div>

      </div><!--/.row -->

<?php include("../footer2.php"); ?>