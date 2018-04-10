<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="cobros">
    <div class="container">

      <div class="row">

        <!-- menu del sistema -->
        <?php include "../menu.php"; ?>
		<?php include "../core-saec/Cobro_Caja.php"; ?>
		  
        <div class="span9" id="contenido-sistema">

          <a href="../caja/cobro-caja-nuevo.php" class="btn btn-institucional pull-left"><i class="icon-plus-sign icon-white"></i> Nuevo Cobro</a>

          <div class="input-append pull-right">
            <form method="get" action="cobros-caja.php">
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
            
          <?php if($SIS_Datos_Usuario['NombrePuesto']=='Administrador'): ?>            
          <div class="row">
            <div class="span9">
                <a href="reportes/cobros-caja-generar-pdf.php?buscar=<?php echo (isset($_GET['buscar']) ? $_GET['buscar']:"") ?>" class="btn btn-institucional pull-right" target="_blank">Generar Reporte</a>
            </div>
          </div>
          <?php endif; ?>

          <table class="table table-striped">

            <thead>
              <tr>
                <th>Folio</th>
                <th>Nombre del Paciente</th>
                <th>Fecha y Hora</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <?php
                $Cobro_Caja = new Cobro_Caja('',$SIS_Usuario);

                if($SIS_Datos_Usuario['NombrePuesto']=='Administrador'):
                    if(isset($_GET['buscar'])):
                        $Datos = $Cobro_Caja->Catalogo_Cobros_Caja_Administrador($_GET['buscar']);
                    else:
                        $Datos = $Cobro_Caja->Catalogo_Cobros_Caja_Administrador();
                    endif;
                else:
                    if(isset($_GET['buscar'])):
                        $Datos = $Cobro_Caja->Catalogo_Cobros_Caja($_GET['buscar']);
                    else:
                        $Datos = $Cobro_Caja->Catalogo_Cobros_Caja();
                    endif;
                endif;
              ?>
            </tbody>
          </table>          
        </div>

      </div><!--/.row -->
      
      
<?php include("../footer2.php"); ?>