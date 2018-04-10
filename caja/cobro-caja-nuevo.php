<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="cobros">
<script src="validacion_cobro_caja.js"></script>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Paciente.php"); ?>
        <?php include("../core-saec/Materia.php"); ?>
        <?php include("../core-saec/Concepto.php"); ?>
        <?php include("../core-saec/Descuento.php"); ?>

        <div class="span9">

          <h2>Nuevo Cobro</h2>
          <div id="campo-error"></div>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <form method="post" action="validacion_cobro_caja.php" onsubmit="return validacion_cobro_caja()">
			  
          <div class="well"> 
            <div class="row">  
              <div class="span9"> 				  
              <label><strong>Tipo</strong><span class="obligatorio">*</span></label>
                <select name="tipo" id="slttipo">
                    <option value="1">Administrativo</option>
                    <option value="2">Clínico</option>
                </select>
              </div>
            </div>
			<br />  
            <div class="row">  
              <div class="span3">
              <label><strong>Nombre del Paciente</strong><span class="obligatorio">*</span></label>
                <select name="paciente" id="sltpaciente">
                    <option value="0">------</option>
					<?php
						$Paciente = new Paciente();
                        $Paciente->ListadoSelect();
                    ?>
                </select>
              </div>
            </div>
			<br />  
			<div class="row">  
              <div class="span3">  
              <label><strong>Alumno Operador/Asistente</strong></label>
                <select name="alumno-operador-asistente" id="sltalumno-operador-asistente">
                    <option value="0">------</option>
					<?php 
                    $Usuario = new Usuario();
                    $Usuario->ListadoSelectEmpleadosPorNombrePuesto('Alumno Operador/Asistente');
                  ?>   
                </select>
              </div>
            </div>
			<br />  
			<div class="row">  
              <div class="span3">  
              <label><strong>Materia</strong></label>
                <select name="materia" id="sltmateria">
                    <option value="0">------</option>
					<?php 
						$Materia = new Materia();
						$Materia->ListadoSelectMaterias();
					?>
                </select>
              </div>
            </div>

            <hr style="border-top:1px solid lightgray">  

            <div class="row">  
              <div class="span3">
              <label><strong>Concepto</strong><span class="obligatorio">*</span></label>
                <select id="sltconcepto" name="concepto">
                    <option value="0">------</option>
					<?php 
						$Concepto = new Concepto();
						$Concepto->ListadoSelect();
					?>
                </select>
              </div>
              <div class="span2">
                <label><strong>Cantidad</strong><span class="obligatorio">*</span></label>
                <input type="text" id="txtcantidad" maxlength="10" class="solo-numeros" value="1" placeholder="Cantidad" style="width:80px;">
              </div>
			  <div class="span2">
			  	<label><strong>Precio</strong></label>
				<p>$ <input type="text" id="txtprecio" value="0.00" readonly style="width:80px;"></p>
			  </div>
            </div>
			<br />  
			<div class="row"> 
              <div class="span2">  
                <a id="btnagregar-concepto" class="btn btn-institucional">Agregar</a>
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
          </table>
			  
		  <hr style="border-top:1px solid lightgray"> 
			  
		  <div class="row">
		  	<div class="span3">
				<label><strong>Descuento</strong></label>
				<select id="sltdescuento" name="descuento">
                    <option value="0">------</option>
					<?php
						$Descuento = new Descuento();
						$Descuento->ListadoSelect();
					?>
                </select>
			</div>	
			<div class="span3">
				<label><strong>Porcentaje</strong></label>
				<input type="text" name="porcentaje-descuento"  id="txtporcentaje-descuento" style="width:40px;" value="0.00" readonly> %
			</div>	
		  </div>			  
		  <br />
		  <div class="row">
		  	<div class="span3">
				<label><strong>Recibí</strong><span class="obligatorio">*</span></label>
				<input type="text" maxlength="10" class="solo-numeros" name="recibi" id="txtrecibi" placeholder="$ 00.00"> 
			</div>		  
		  </div>
		  <br />	  
		  <div class="row">
		  	<div class="span3">
				<p><strong>Total a Pagar: </strong> $ <span id="total-pagar">0.00</span></p>
				<p><strong>Cambio: </strong> $ <span id="total-cambio">0.00</span></p>
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