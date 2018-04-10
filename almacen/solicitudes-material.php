<?php include("../header2.php"); ?>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Solicitud_Material.php"); ?>

        <div class="span9">

          <a href="solicitud-material-nueva.php" class="btn btn-institucional pull-left"><i class="icon-plus-sign icon-white"></i> Solicitar de Material</a>

          <div class="input-append pull-right">
            <form method="get" action="solicitudes-material.php">
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
            
          <div class="row">
              <div class="span9">
                <a href="reportes/solicitudes-material-generar-pdf.php?buscar=<?php echo (isset($_GET['buscar']) ? $_GET['buscar']:""); ?>" class="btn btn-institucional pull-right" target="_blank">Generar Reporte</a>
              </div>
          </div>

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
                //var_dump($SIS_Datos_Usuario);
                //catalogo de solicitudes de material
                /*$Usuario = new usuario($SIS_Usuario);
        				$Datos = $Usuario->Buscar_Departamento_Comunidad_Usuario();*/

        				$Departamento = $SIS_Datos_Usuario['IdDepartamento'];
        				$Comunidad = $SIS_Datos_Usuario['IdAsignacionComunidad'];

                $Solicitud_Material = new Solicitud_Material('','','',$SIS_Usuario,'','',$Departamento,$Comunidad);

                if($SIS_Datos_Usuario['NombrePuesto']=='Administrador'):
                    if(isset($_GET['buscar'])):
                        $Solicitud_Material->Catalogo_Solicitud_Material_Administrador($_GET['buscar']);
                    else:
                        $Solicitud_Material->Catalogo_Solicitud_Material_Administrador();
                    endif;
                elseif($SIS_Datos_Usuario['NombrePuesto']=='Doctor Comunitario'):
                    if(isset($_GET['buscar'])):
                        $Solicitud_Material->Catalogo_Solicitud_Material_Doctor_Comunitario($_GET['buscar']);
                    else:
                        $Solicitud_Material->Catalogo_Solicitud_Material_Doctor_Comunitario();
                    endif;
                else:
                    if(isset($_GET['buscar'])):
                        $Solicitud_Material->Catalogo_Solicitud_Material($_GET['buscar']);
                    else:
                        $Solicitud_Material->Catalogo_Solicitud_Material();
                    endif;
                endif;
              ?>
            </tbody>
          </table>
        </div>

      </div><!--/.row -->
      <input type="hidden" id="ventana" value="solicitud-material">

<?php include("../footer2.php"); ?>