<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="salidas-material">
    <?php if(isset($_GET['exito'])): ?>
        <script>
        	window.open("reportes/salida-material-generar-pdf.php?salida=<?php echo $_GET['salida']; ?>");
        </script>
    <?php endif; ?>
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include "../core-saec/Salida_Material.php"; ?>

        <div class="span9">
           <div class="input-append pull-right">
            <form method="get" action="salidas-material.php">
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
                <a href="reportes/salidas-material-generar-pdf.php?buscar=<?php echo (isset($_GET['buscar']) ? $_GET['buscar']:""); ?>" class="btn btn-institucional pull-right" target="_blank">Generar Reporte</a>
              </div>
          </div>

          <table class="table table-striped">

            <thead>
              <tr>
                <th>Folio de Salida</th>
                <th>Departamento/Comunidad</th>
                <th>Estado</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
               <?php 
                //catalogo de solicitudes de material
                /*$Usuario = new usuario($SIS_Usuario);
				        $Datos = $Usuario->Buscar_Departamento_Comunidad_Usuario();*/

				        $Departamento = $SIS_Datos_Usuario['IdDepartamento'];
                $Comunidad = $SIS_Datos_Usuario['IdAsignacionComunidad'];

                $Salida_Material = new Salida_Material('',$SIS_Usuario,'','',$Departamento,$Comunidad);

                if($SIS_Datos_Usuario['NombrePuesto']=='Administrador'):
                    if(isset($_GET['buscar'])):
                        $Salida_Material->Catalogo_Salida_Material_Administrador($_GET['buscar']);
                    else:
                        $Salida_Material->Catalogo_Salida_Material_Administrador();
                    endif;
                elseif($SIS_Datos_Usuario['NombrePuesto']=='Almacenista'):
                    if(isset($_GET['buscar'])):
                        $Salida_Material->Catalogo_Salida_Material_Almacenista($_GET['buscar']);
                    else:
                        $Salida_Material->Catalogo_Salida_Material_Almacenista();
                    endif;
                elseif($SIS_Datos_Usuario['NombrePuesto']=='Doctor Comunitario'):
                    if(isset($_GET['buscar'])):
                        $Salida_Material->Catalogo_Salida_Material_Doctor_Comunitario($_GET['buscar']);
                    else:
                        $Salida_Material->Catalogo_Salida_Material_Doctor_Comunitario();
                    endif;
                else:
                    if(isset($_GET['buscar'])):
                        $Salida_Material->Catalogo_Salida_Material($_GET['buscar']);
                    else:
                        $Salida_Material->Catalogo_Salida_Material();
                    endif;
                endif;
              ?>
            </tbody>
          </table>
        </div>

      </div><!--/.row -->

<?php include("../footer2.php"); ?>