<div class="span3">
  <div class="well sidebar-nav" style="padding: 20px 0px 20px 0px">

	<?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Auxiliar De Secretario Administrativo' ||       
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Secretario Administrativo'): ?>
	<ul class="nav nav-list">
	  <li class="nav-header" id="administracion">
		<img src="../img/icono-administracion.png" class="icono-menu"> 
		Administración
	  </li>
	</ul>

	<ul class="nav nav-list division administracion">
	  <?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador'): ?>
	  <li>
		<a href="../administracion/administraciones.php" id="administraciones">
		  Administraciones
		</a>
	  </li>
	  <li>
		<a href="../administracion/usuarios.php" id="usuarios">
		  Usuarios
		</a>
	  </li>
	  <li>
		<a href="../administracion/departamentos.php" id="departamentos">
		  Departamentos
		</a>
	  </li>
	  <li>
		<a href="../administracion/comunidades.php" id="comunidades">
		  Comunidades
		</a>
	  </li>
	  <li>
		<a href="../administracion/comunidades-asignadas.php" id="comunidades-asignar">
		  Comunidades Asignadas
		</a>
	  </li>
	  <li>
		<a href="../administracion/areas.php" id="areas">
		  Áreas
		</a>
	  </li>
	  <li>
		<a href="../administracion/puestos.php" id="puestos">
		  Puestos
		</a>
	  </li>
	  <li>
		<a href="../administracion/impuestos.php" id="impuestos">
		  Impuestos
		</a>
	  </li>
	  <li>
		<a href="../administracion/materias.php" id="materias">
		  Materias
		</a>
	  </li>
	  <li>
		<a href="../administracion/descuentos.php" id="descuentos">
		  Descuentos
		</a>
	  </li>
	  <li>
		<a href="../administracion/conceptos.php" id="conceptos">
		  Conceptos
		</a>
	  </li>
	  <?php endif; ?>
	  <li>
		<a href="../administracion/actualizar-precios.php" id="actualizar-precios">
		  Actualizar Precios 
			<?php 
				$Material = new Material();
				$Numeros_Precios_Nuevos = $Material->Numero_Precios_Nuevos();
			?>
			<?php if(intval($Numeros_Precios_Nuevos['NumeroPreciosNuevos']) > 0): ?>
				<span class="label label-info"><?php echo $Numeros_Precios_Nuevos['NumeroPreciosNuevos']; ?></span>
			<?php endif; ?>
		</a>
	  </li>
	</ul>
	<hr />              
	<?php endif; ?> 

	<?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Almacenista' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Alumno Tesorero' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Auxiliar De Secretario Academico' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Auxiliar De Secretario Administrativo' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Auxiliar De Encargado De Departamento' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Coordinador De Comunidades' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Doctor Comunitario' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Encargado De Departamento' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Secretario Academico' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Secretario Administrativo'): ?>
	<ul class="nav nav-list">
	  <li class="nav-header" id="almacen">
		<img src="../img/icono-almacen.png" class="icono-menu"> 
		  Almacén
	  </li>
	</ul>			           


	<ul class="nav nav-list division almacen">
	<?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Almacenista'): ?>    
	  <li>
		<a href="../almacen/proveedores.php" id="proveedores">
		  Proveedores
		</a>
	  </li>
	  <li>
		<a href="../almacen/materiales.php" id="materiales">
		  Materiales
		</a>
	  </li>
	  <li>
		<a href="../almacen/entradas-material.php" id="entradas-material">
		  Entradas de Material 
		</a>
	  </li>
	<?php endif; ?>
	  <li>
		<a href="../almacen/solicitudes-material.php" id="solicitud-material">
		  Solicitudes de Material
		</a>
	  </li>
	<?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Auxiliar De Secretario Administrativo' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Coordinador De Comunidades' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Secretario Administrativo'): ?>
	  <li>
		<a href="../almacen/autorizar-solicitudes.php" id="autorizar-solicitudes">
		  Autorizar Solicitudes de Material
		</a>
	  </li>
	<?php endif; ?>
	  <li>
		<a href="../almacen/salidas-material.php" id="salidas-material">
		  Salidas de Material
		</a>
	  </li>
	<?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Almacenista'): ?>
	  <li>
		<a href="../almacen/devoluciones-materiales.php" id="devolucion-material">
		  Devolución de Material
		</a>
	  </li>
	  <li>
		<a href="../almacen/stock-minimo.php" id="stock-minimo">
		  Stock Mínimo
		</a>
	  </li>
	  <li>
		<a href="../almacen/fechas-caducidad.php" id="fechas-caducidad">
		  Fechas de Caducidad
		</a>
	  </li>
	  <li>
		<a href="../almacen/materiales-caducados.php" id="materiales-caducados">
		  Materiales Caducados
		</a>
	  </li>
	<?php endif; ?>
	</ul>              
	<hr />
	<?php endif; ?> 

	<?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' || 
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Alumno Operador/Asistente' || 
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Medico Titular'): ?>
	<ul class="nav nav-list">
	  <li class="nav-header" id="clinica">
		<img src="../img/icono-clinica.png" class="icono-menu">
		Expediente Clínico
	  </li>
	</ul>

	<ul class="nav nav-list division clinica"> 
	<?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' || 
			 $SIS_Datos_Usuario['NombrePuesto'] == "Medico Titular"): ?>
	  <li>
		<a href="../clinica/asignacion-parejas-clinica.php" id="asignacion-parejas-clinica">
		  Asignacion de Pareja de Clínica
		</a>
	  </li>
	<?php endif; ?>
	  <li>
		<a href="../clinica/formatoindicepreventivooperatoria.php" id="formato-indice-preventivo-operatoria">
		  Formato de Indice y Preventivo de Operatoria
		</a>
	  </li>
	  <li>
		<a href="../clinica/formatohistoriaclinicaendodoncia.php" id="formato-historia-clinica-endodoncia">
		  Formato de Historia Clínica de Endodoncia
		</a>
	  </li>
	  <li>
		<a href="../clinica/formatohistoriaclinicaexodoncia.php" id="formato-historia-clinica-exodoncia">
		  Formato de Historia Clínica de Exodoncia
		</a>
	  </li>
	  <li>
		<a href="../clinica/formatohistoriaclinicaoperatoria.php" id="formato-historia-clinica-operatoria">
		  Formato de Historia Clínica de Operatoria
		</a>
	  </li>
	  <li>
		<a href="../clinica/formatohistoriaclinicaprotesisparcialremovible.php" id="formato-historia-clinica-protesis-parcial-removible">
		  Formato de Historia Clínica de Prótesis Parcial Removible
		</a>
	  </li>
	  <li>
		<a href="../clinica/formatohistoriaclinicaprotesisfija.php" id="formato-historia-clinica-protesis-fija">
		  Formato de Historia Clínica de Prótesis Fija
		</a>
	  </li>
	  <li>
		<a href="../clinica/formatohistoriaclinicaseminario.php" id="formato-historia-clinica-seminario">
		  Formato de Historia Clínica de Seminario
		</a>
	  </li>
	  <li>
		<a href="../clinica/formatohistoriaclinicaoperatoria2011b.php" id="formato-historia-clinica-operatoria-2011b">
		  Formato de Historia Clínica Operatoria 2011-B
		</a>
	  </li>
	  <li>
		<a href="../clinica/formatohistoriaperiodoncia.php" id="formato-historia-periodoncia">
		  Formato de Historia Clínica de Periodoncia
		</a>
	  </li>
	  <li>
		<a href="../clinica/formatohistoriageneral.php" id="formato-historia-general">
		  Formato de Historia Clínica General
		</a>
	  </li>
	  <li>
		<a href="../clinica/formatohistoriaprotesistotal.php" id="formato-historia-protesis-total">
		  Formato de Historia Clínica Prótesis Total
		</a>
	  </li>
          <li>
		<a href="../clinica/formatohistoriaclinicapediatrica.php" id="formato-historia-pediatrica">
		  Formato de Historia Clínica Pediatrica
		</a>
	  </li>
	  <li>
		<a href="../clinica/formatohistoriaclinicacomunitaria.php" id="formato-historia-comunitaria">
		  Formato de Historia Clínica Comunitaria
		</a>
	  </li>
	</ul>			  
	<hr />
	<?php endif; ?>

	<?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' || 
			 $SIS_Datos_Usuario['NombrePuesto'] == "Cajero"): ?>	  
	<ul class="nav nav-list">
	  <li class="nav-header" id="caja">
		<img src="../img/icono-caja.png" class="icono-menu">
		Caja
	  </li>
	</ul>
	<ul class="nav nav-list division caja">
	  <li>
		<a href="../caja/pacientes.php" id="pacientes">
		  Pacientes
		</a>
	  </li>
	  <li>
		<a href="../caja/cobros-caja.php" id="cobros">
		  Cobros
		</a>
	  </li>
	</ul>              
	<hr />
	<?php endif; ?>

	<?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' ||
             $SIS_Datos_Usuario['NombrePuesto'] == 'Almacenista' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Auditoria Interna' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Auxiliar De Secretario Administrativo' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Cajero' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Consejo Tecnico' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Contador' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Director' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Secretario Administrativo'): ?>			 
	<ul class="nav nav-list">
	  <li class="nav-header" id="reportes">
		<img src="../img/icono-reportes.png" class="icono-menu">
		Reportes
	  </li>
	</ul>
	<ul class="nav nav-list division reportes">
	<?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' ||
             $SIS_Datos_Usuario['NombrePuesto'] == 'Almacenista' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Auditoria Interna' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Auxiliar De Secretario Administrativo' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Consejo Tecnico' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Contador' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Director' ||
			 $SIS_Datos_Usuario['NombrePuesto'] == 'Secretario Administrativo'): ?>	
	  <li>
		<a href="../reportes/estadisticas-salida.php" id="estadisticas-salida">
		  Estadísticas de Salida
		</a>
	  </li>
	  <li>
		<a href="../reportes/dinero-entregado-departamentos.php" id="dinero-entregado-departamentos">
		  Dinero Entregado a Departamentos
		</a>
	  </li>
	  <li>
		<a href="../reportes/estadistico-total-materiales.php" id="estadistico-total-materiales">
		  Estadístico Total de Materiales
		</a>
	  </li>
	  <li>
		<a href="../reportes/total-egresos.php" id="total-egresos">
		  Total de Egresos
		</a>
	  </li>
      <?php endif; ?>
      <?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' ||
               $SIS_Datos_Usuario['NombrePuesto'] == 'Almacenista'): ?>
	  <li>
		<a href="../reportes/salidas-material-reporte.php" id="salidas-material-reporte">
		  Salidas de Almacén
		</a>
	  </li>
      <?php endif; ?>
      <?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' ||
               $SIS_Datos_Usuario['NombrePuesto'] == 'Auditoria Interna' ||
               $SIS_Datos_Usuario['NombrePuesto'] == 'Auxiliar De Secretario Administrativo' ||
               $SIS_Datos_Usuario['NombrePuesto'] == 'Consejo Tecnico' ||
               $SIS_Datos_Usuario['NombrePuesto'] == 'Director' ||
               $SIS_Datos_Usuario['NombrePuesto'] == 'Secretario Administrativo'): ?>	
	  <li>
		<a href="../reportes/total-pacientes-historias-clinicas.php" id="total-pacientes-historias-clinicas">
		  Total de Pacientes Historias Clínicas
		</a>
	  </li>
	  <?php endif; ?>
	  <?php if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador' ||
			   $SIS_Datos_Usuario['NombrePuesto'] == 'Cajero'): ?>	
	  <li>
		<a href="../reportes/corte-caja.php" id="corte-caja">
		  Corte de Caja
		</a>
	  </li>
	  <?php endif; ?>
	</ul>           
	<?php endif; ?>

  </div><!--/.well -->
</div><!--/span-->