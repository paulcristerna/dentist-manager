<?php include("../header2.php"); ?>
<script src="validacion_corte_caja.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">
          <!-- menu del sistema -->
          <?php include("../menu.php"); ?>

        <div class="span9">

            <h2>Corte de Caja</h2>
            
            <div id="campo-error"></div>
            
            <form method="get" onsubmit="return validacion_corte_caja()" action="reportes/corte-caja-generar-pdf.php" target="_blank">
            
            <p>Seleccione al cajero.<span class="obligatorio">*</span></p>
            <div class="well">
                <div class="row">
                    <div class="span3">
                        <label><strong>Cajero:</strong></label>
                        <select id="sltcajero" name="cajero">
                        <option value="0">------</option>
                        <?php 
                          //listado de departamentos
                          $Usuario = new Usuario();
                          $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Cajero');
                        ?>
                      </select>
                    </div>
                </div>               
          </div>
				
		  <p>Seleccione el turno.<span class="obligatorio">*</span></p>
            <div class="well">
                <div class="row">
                    <div class="span3">
                        <label><strong>Turno:</strong></label>
                        <select id="sltturno" name="turno">
                        <option value="1">Matutino</option>
                        <option value="2">Vespertino</option>
						</select>
                    </div>
                </div>               
          </div>

            <p>Seleccione el rango de fechas en las cuales quiere generar del reporte.</p>         
            <div class="well">
                <label><strong>Por Fecha:</strong></label> 
                Fecha de Inicio: 
                <input type="text" class="span2 calendario" placeholder="Fecha de Inicio" id="fecha-inicio" name="fecha-inicio">&nbsp;

                Fecha Final: 
                <input type="text" class="span2 calendario" placeholder="Fecha Final" id="fecha-fin" name="fecha-fin"> &nbsp;
                
              <input type="submit" id="reporte-fecha" name="reporte-fecha" class="btn btn-institucional" value="Generar Reporte">
            </div>
			</form>
          </div>

      </div><!--/.row -->
      <input type="hidden" id="ventana" value="corte-caja">

<?php include("../footer2.php"); ?>