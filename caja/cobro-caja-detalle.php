<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="cobros">

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Cobro_Caja.php"); ?>

        <div class="span9">

          <h2>Detalle del Cobro</h2>
			
          <?php 
            $Cobro_Caja = new Cobro_Caja($_GET['cobro']);
            $Datos_Cobro_Caja = $Cobro_Caja->Obtener_Cobro_Caja();
          ?>
			  
          <div class="well"> 
			<div class="row">  
              <div class="span3"> 				  
                <label><strong>Folio de Cobro</strong></label>
                <label><?php echo $Datos_Cobro_Caja['FolioCobrosCaja']; ?></label>
              </div>
              <div class="span3"> 				  
                <label><strong>Fecha de Registro</strong></label>
                <?php 
                    $FechaRegistro = $Datos_Cobro_Caja['FechaRegistro'];
                    $date = new DateTime($FechaRegistro);
                    $FechaRegistro = $date->format('d-m-Y h:i:s'); 
                ?>
                <label><?php echo $FechaRegistro; ?></label>
              </div>
            </div>
			<br />
            <div class="row">  
              <div class="span9"> 				  
              <label><strong>Tipo</strong></label>
              <label><?php echo ($Datos_Cobro_Caja['Tipo']==1 ? "Administrativo":"Clínico"); ?></label>
              </div>
            </div>
			<br />  
            <div class="row">  
              <div class="span3">
				  <label><strong>Nombre del Paciente</strong></label>
				  <label>
					<?php echo $Datos_Cobro_Caja['NombrePaciente']; ?>
					<?php echo $Datos_Cobro_Caja['ApellidoPaternoPaciente']; ?>
					<?php echo $Datos_Cobro_Caja['ApellidoMaternoPaciente']; ?>
				  </label>
              </div>
              <div class="span3">  
                  <label><strong>Alumno Operador/Asistente</strong></label>
                  <label>
                      <?php echo 
                        ($Datos_Cobro_Caja['NombreAlumOpAs'].
                         $Datos_Cobro_Caja['ApellidoPaternoAlumOpAs'].
                         $Datos_Cobro_Caja['ApellidoMaternoAlumOpAs'] == "" ?
                         "----------":
                         $Datos_Cobro_Caja['NombreAlumOpAs'].' '.
                         $Datos_Cobro_Caja['ApellidoPaternoAlumOpAs'].' '.
                         $Datos_Cobro_Caja['ApellidoMaternoAlumOpAs']
                        ); ?>
                  </label> 
              </div>
            </div>
			<br />  
			<div class="row">  
              <div class="span3">  
              <label><strong>Materia</strong></label>
              <label>
			  	<?php echo ($Datos_Cobro_Caja['MateriaNombre'] == "" ? 
                            "----------":$Datos_Cobro_Caja['MateriaNombre']); ?>  
			  </label>
              </div>
            </div>	
			  
		  <hr style="border-top:1px solid lightgray">
            
          <table id="tabla" class="table table-striped" style="overflow-y:scroll">
            <thead>
              <tr>
                <th>Concepto</th>
                <th>Precio </th>
                <th>Total</th>
                <th></th>
              </tr>
            </thead>
			<tbody>
				<?php 
					$Cobro_Caja = new Cobro_Caja($_GET['cobro']);
					$Total = $Cobro_Caja->Detalle_Cobros_Caja(); 
				?>  
			</tbody>
          </table>
			  
		  <hr style="border-top:1px solid lightgray">
			  
		  <div class="row">
		  	<div class="span3">
				<label><strong>Descuento</strong></label>
				<label>
					<?php 
						echo
                        ($Datos_Cobro_Caja['DescuentoNombre'] == "" ? 
                         "----------":
                         $Datos_Cobro_Caja['DescuentoNombre']
                        ); 
					?> 	
				</label>
			</div>	
			<div class="span3">
				<label><strong>Porcentaje</strong></label>
				<label>
					<?php echo $Datos_Cobro_Caja['PorcentajeDescuento']; ?>  %
				</label>
			</div>	
		  </div>			  
		  <br />
		  <div class="row">
		  	<div class="span3">
				<label><strong>Recibí</strong></label>
				<label>
					$ <?php echo $Datos_Cobro_Caja['Recibi']; ?> 
				</label>
			</div>		  
		  </div>
		  <br />	  
		  <div class="row">
		  	<div class="span3">
				<p>
					<strong>Total a Pagar:</strong> 
					$<?php echo $Total; ?>
				</p>
				<p><strong>Cambio:</strong> 
					$<?php 
						$Recibi = $Datos_Cobro_Caja['Recibi'];
						echo $Total = $Recibi - $Total; 
					?>
				</p>
			</div>		  
		  </div>
			  
          </div><!-- well -->
			  
          <div align="row">
              <input type="submit" name="guardar" value="Guardar" class="btn btn-institucional guardar">
              <a href="../almacen/entradas-material.php" class="btn btn-danger pull-right cancelar">Cancelar</a>
          </div>
        </form>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>