<?php include("../header2.php"); ?>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Administracion.php"); ?>

        <div class="span9">
            <h2>Estadísticas de Salida</h2>
            
            <div id="campo-error"></div>
            
            <form method="get" action="reportes/estadisticas-salida-generar-pdf.php" target="_blank">
            
            <p>Seleccione el rango de fechas en las cuales quiere generar del reporte.</p>           
            <div class="well">
                <label><strong>Por Fecha:</strong></label> 
                Fecha de Inicio: 
                <input type="text" class="span2 calendario" placeholder="Fecha de Inicio" id="fecha-inicio" name="fecha-inicio">&nbsp;

                Fecha Final: 
                <input type="text" class="span2 calendario" placeholder="Fecha Final" id="fecha-fin" name="fecha-fin"> &nbsp;
                
              <input type="submit" id="reporte-fecha" name="reporte-fecha" class="btn btn-institucional" value="Generar Reporte">
            </div>
            
            <p>Seleccione la Administracion del cual quiere generar un reporte.</p>
            <div class="well">
              <label><strong>Por Administracion:</strong></label> 
              Administración:
              <select id="sltadministraciones" name="administracion">
                <option value="0">------</option>  
                <?php
                    $Administracion = new Administracion;
                    $Administracion->ListadoSelect();
                ?>
              </select> &nbsp;                
              <input type="submit" name="reporte-administracion" id="reporte-administracion" class="btn btn-institucional" value="Generar Reporte">
            </div>

            <p>Seleccione el Ciclo del cual quiere generar un reporte.</p>
            <div class="well">
              <label><strong>Por Ciclo:</strong></label>                
              Ciclo: 
              <select id="sltciclos" name="ciclo">
                <option value="0">------</option> 
                <?php 
                    $fecha1 = "2012-01-01";
                    $fecha2 = date_create();
                    $fecha2 = date_format($fecha2,'Y-m-d');

                    for($i=$fecha1;$i<=$fecha2;1+1):        
                        $FechaInicio = date_create($i);
                        $FechaInicio = date_format($FechaInicio,'Y');

                        $FechaInicioCompleta = date_create($i);
                        $FechaInicioCompleta = date_format($FechaInicioCompleta,'Y-m-d');

                        $i = date("Y-m-d", strtotime($i ."+ 1 years"));

                        $FechaFin = date_create($i);
                        $FechaFin = date_format($FechaFin,'Y');
                  
                        $FechaFinCompleta = date_create($i);
                        $FechaFinCompleta = date_format($FechaFinCompleta,'Y-m-d'); ?>

                        <option value="<?php echo $FechaInicioCompleta.'|'.$FechaFinCompleta; ?>">
                            <?php echo $FechaInicio.'-'.$FechaFin; ?>
                        </option>
                <?php endfor; ?> 
              </select> &nbsp;                
              <input type="submit" name="reporte-ciclo" id="reporte-ciclo" class="btn btn-institucional" value="Generar Reporte">
            </div>
            
            <p>Seleccione el Semestre del cual quiere generar un reporte.</p>
            <div class="well">
              <label><strong>Por Semestre:</strong></label> 
              Administración: 
              <select id="sltadministracion-semestre" name="administracion-semestre">
                <option value="0">------</option>  
                <?php
                    $Administracion = new Administracion;
                    $Administracion->ListadoSelect();
                ?>
              </select> &nbsp;
                
              Semestre:                 
              <select id="sltsemestre" name="semestre">
                <option value="0">------</option>
              </select> &nbsp;                
              <input type="submit" name="reporte-semestre" id="reporte-semestre" class="btn btn-institucional" value="Generar Reportess">
            </div>
            </form>
          </div>

      </div><!--/.row -->
      <input type="hidden" id="ventana" value="estadisticas-salida">

<?php include("../footer2.php"); ?>