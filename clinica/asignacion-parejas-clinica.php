<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="asignacion-parejas-clinica">
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include "../menu.php"; ?>
        <?php include "../core-saec/Pareja_Clinica.php"; ?>

        <div class="span9">

          <a href="../clinica/asignacion-parejas-clinica-nuevo.php" class="btn btn-institucional pull-left"><i class="icon-plus-sign icon-white"></i> Agregar Asignación de Parejas de Clínica</a>

          <div class="input-append pull-right">
            <form method="get" action="asignacion-parejas-clinica.php">
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
                <a href="reportes/asignacion-parejas-clinica-generar-pdf.php?buscar=<?php echo (isset($_GET['buscar']) ? $_GET['buscar']:"") ?>" class="btn btn-institucional pull-right" target="_blank">Generar Reporte</a>
            </div>
          </div>

          <table class="table table-striped">

            <thead>
              <tr>
                <th>Clínica/Comunidad</th>
                <th>Medico Titular</th>
                <th>Pareja Clínica</th>
                <th>Materia</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <?php
                $Pareja_Clinica = new Pareja_Clinica('','','',$SIS_Usuario);

                if($SIS_Datos_Usuario['NombrePuesto']=='Administrador'):

                    if(isset($_GET['buscar'])):
                        $Pareja_Clinica->Catalogo_Administrador($_GET['buscar']);
                    else:
                        $Pareja_Clinica->Catalogo_Administrador();
                    endif;
                else:
                    if(isset($_GET['buscar'])):
                        $Pareja_Clinica->Catalogo($_GET['buscar']);
                    else:
                         $Pareja_Clinica->Catalogo();
                    endif;
                endif;    
              ?>
            </tbody>
          </table>
        </div>

      </div><!--/.row -->
      
      
<?php include("../footer2.php"); ?>