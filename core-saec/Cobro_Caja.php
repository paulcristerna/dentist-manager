<?php class Cobro_Caja extends AccesoBD
	{
		public $IdCobroCaja;
		public $IdUsuario;
		public $IdAdministracion;
		public $FolioCobrosCaja;
		public $Tipo;
		public $IdPaciente;
		public $IdAlumnoOperadorAsistente;
		public $IdMateria;
		public $varIdConcepto;
		public $varCantidad;
		public $varPrecio;
		public $IdDescuento;
		public $PorcentajeDescuento;
		public $Recibi;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdCobroCaja = null,
		 	$varIdUsuario = null,
		 	$varIdAdministracion = null,
		 	$varFolioCobrosCaja = null,
		 	$varTipo = null,
		 	$varIdPaciente = null,
		 	$varIdAlumnoOperadorAsistente = null,
		 	$varIdMateria = null,
			$varIdConcepto = null,
			$varCantidad = null,
			$varPrecio = null,
		 	$varIdDescuento = null,
		 	$varPorcentajeDescuento = null,
		 	$varRecibi = null,
		 	$varEstatus = null,
		 	$varFechaRegistro = null
		)
		{
			$this->IdCobroCaja = $varIdCobroCaja;
			$this->IdUsuario = $varIdUsuario;
			$this->IdAdministracion = $varIdAdministracion;
			$this->FolioCobrosCaja = $varFolioCobrosCaja;
			$this->Tipo = $varTipo;
			$this->IdPaciente = $varIdPaciente;
			$this->IdAlumnoOperadorAsistente = $varIdAlumnoOperadorAsistente;
			$this->IdMateria = $varIdMateria;
			$this->IdConcepto = $varIdConcepto;
			$this->Cantidad = $varCantidad;
			$this->Precio = $varPrecio;
			$this->IdDescuento = $varIdDescuento;
			$this->PorcentajeDescuento = $varPorcentajeDescuento;
			$this->Recibi = $varRecibi;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de cobros de caja

		public function Catalogo_Cobros_Caja_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdCobroCaja, 
                                FolioCobrosCaja,
                                NombrePaciente,
								ApellidoPaternoPaciente,
								ApellidoMaternoPaciente,
								FechaRegistro
                        FROM SIS_Listado_Cobros_Caja;";
            else:
                $SQL = "SELECT  IdCobroCaja, 
                                FolioCobrosCaja,
                                NombrePaciente,
								ApellidoPaternoPaciente,
								ApellidoMaternoPaciente,
								FechaRegistro
                        FROM SIS_Listado_Cobros_Caja
                        WHERE NombrePaciente LIKE '%$Buscar%' OR 
					    ApellidoPaternoPaciente LIKE '%$Buscar%' OR
					    ApellidoMaternoPaciente LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php echo $Linea['FolioCobrosCaja']; ?></td>
						<td>
							<?php echo $Linea['NombrePaciente']; ?>
							<?php echo $Linea['ApellidoPaternoPaciente']; ?>
							<?php echo $Linea['ApellidoMaternoPaciente']; ?>
						</td>
						<td><?php echo $Linea['FechaRegistro']; ?></td>
						<td><a href="cobro-caja-detalle.php?cobro=<?php echo $Linea['IdCobroCaja']; ?>" class='btn btn-institucional'>Ver Detalle</a></td>
						<td><a href="reportes/cobro-caja-generar-pdf.php?cobro=<?php echo $Linea['IdCobroCaja']; ?>" class='btn btn-institucional' target="_blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay cobros de caja registrados todavía.":"No se encontro ningún cobro de caja en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    
        //catalogo de cobros de caja

		public function Catalogo_Cobros_Caja($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdCobroCaja, 
                                FolioCobrosCaja,
                                NombrePaciente,
								ApellidoPaternoPaciente,
								ApellidoMaternoPaciente,
								FechaRegistro
                        FROM SIS_Listado_Cobros_Caja
                        WHERE IdUsuario = $this->IdUsuario;";
            else:
                $SQL = "SELECT  IdCobroCaja, 
                                FolioCobrosCaja,
                                NombrePaciente,
								ApellidoPaternoPaciente,
								ApellidoMaternoPaciente,
								FechaRegistro
                        FROM SIS_Listado_Cobros_Caja
                        WHERE IdUsuario = $this->IdUsuario AND 
                        NombrePaciente LIKE '%$Buscar%' OR 
					    ApellidoPaternoPaciente LIKE '%$Buscar%' OR
					    ApellidoMaternoPaciente LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php echo $Linea['FolioCobrosCaja']; ?></td>
						<td>
							<?php echo $Linea['NombrePaciente']; ?>
							<?php echo $Linea['ApellidoPaternoPaciente']; ?>
							<?php echo $Linea['ApellidoMaternoPaciente']; ?>
						</td>
						<td><?php echo $Linea['FechaRegistro']; ?></td>
						<td><a href="cobro-caja-detalle.php?cobro=<?php echo $Linea['IdCobroCaja']; ?>" class='btn btn-institucional'>Ver Detalle</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay cobros de caja registrados todavía.":"No se encontro ningún cobro de caja en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de cobros de caja
        
        public function Catalogo_Cobros_Caja_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdCobroCaja, 
								FolioCobrosCaja,
                                NombrePaciente, 
                                ApellidoPaternoPaciente, 
                                ApellidoMaternoPaciente,
								MateriaNombre,
                                FechaRegistro
                        FROM SIS_Listado_Cobros_Caja;";
            else:
                $SQL = "SELECT  IdCobro, 
								FolioCobrosCaja,
                                NombrePaciente, 
                                ApellidoPaternoPaciente, 
                                ApellidoMaternoPaciente,
								MateriaNombre,
                                FechaRegistro
                        FROM SIS_Listado_Cobros_Caja
                        WHERE NombrePaciente LIKE '%$Buscar%' OR 
                        ApellidoPaternoPaciente LIKE '%$Buscar%' OR
						ApellidoMaternoPaciente LIKE '%$Buscar%';";
            endif;
			
			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php 
                            $string = $Linea['FolioCobrosCaja'];
            
                            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string;
                        ?></td>
						<td><?php
                                $string = $Linea['NombrePaciente'].' '.
							              $Linea['ApellidoPaternoPaciente'].' '.
							              $Linea['ApellidoMaternoPaciente'];
            
                                echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string;
                        ?></td>
                        <td><?php
                                $string = $Linea['FechaRegistro'];
            
                                echo (strlen($string) > 20) ? substr($string,0,20).'...' : $string;
                        ?></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay Cobros registradas todavía.":"No se encontro ningún cobro de caja en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
        
		//alta de cobro de caja
	
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Cobro_Caja_Alta(
						'$this->IdUsuario',
						'$this->Tipo',
						'$this->IdPaciente',
						'$this->IdAlumnoOperadorAsistente',
						'$this->IdMateria',
						'$this->IdConcepto',
						'$this->Cantidad',
						'$this->Precio',
						'$this->IdDescuento',
						'$this->PorcentajeDescuento',
						'$this->Recibi'
					);";
			
			//echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{             
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo un cobro en caja",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: cobros-caja.php?exito=Se guardo el Cobro de caja con exito');
			}else{
                header('Location: cobros-caja.php?error=Ocurrio un error'.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de un cobro de caja

		public function Obtener_Cobro_Caja()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
			$SQL = "SELECT  IdCobroCaja,
							IdUsuario,
							IdAdministracion,
							FolioCobrosCaja,
							Tipo,
							IdPaciente,
							IdAlumnoOperadorAsistente,
							IdMateria,
							IdDescuento,
							PorcentajeDescuento,
							Recibi,
							NombrePaciente,
							ApellidoPaternoPaciente,
							ApellidoMaternoPaciente,
							NombreAlumOpAS,
							ApellidoPaternoAlumOpAS,
							ApellidoMaternoAlumOpAS,
							MateriaNombre,
							DescuentoNombre,
                            FechaRegistro
                    FROM SIS_Listado_Cobros_Caja
                    WHERE IdCobroCaja = $this->IdCobroCaja;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			$Datos = null;

			if($Num_Filas > 0):
				$Datos = mysqli_fetch_array($Resultado, MYSQL_ASSOC);
			endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);

			return $Datos;
		}
	
		//obtener los datos del detalle de un cobro de caja 
		
		public function Detalle_Cobros_Caja()
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdDetalleCobroCaja,
							IdCobroCaja,
							IdConcepto,
							Cantidad,
							Precio,
							NombreConcepto
                    FROM SIS_Listado_Detalle_Cobros_Caja
                    WHERE IdCobroCaja = $this->IdCobroCaja;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);
			
			$Total = 0;

			if($Num_Filas>0):
			
				while($Linea = mysqli_fetch_array($Resultado)):

				$Cantidad = number_format($Linea['Cantidad'],2);
				$Precio = number_format($Linea['Precio'],2);
				$Total_Concepto = $Cantidad * $Precio;
				$Total += $Total_Concepto; ?>

					<tr>
						<td>
							<?php echo $Linea['Cantidad']; ?>
							<?php echo $Linea['NombreConcepto']; ?>
						</td>
						<td>$<?php echo $Linea['Precio']; ?> Pesos</td>
						<td>$<?php echo $Total_Concepto; ?> Pesos</td>
					</tr>

				<?php endwhile;	?>
            <?php else: ?>
				<tr>
					<td colspan="3">No se encontraron conceptos en el cobro.</td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
			
			return $Total;
		}
    
        public function Detalle_Cobro_Caja_Reporte()
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdDetalleCobroCaja,
							IdCobroCaja,
							IdConcepto,
							Cantidad,
							Precio,
							NombreConcepto
                    FROM SIS_Listado_Detalle_Cobros_Caja
                    WHERE IdCobroCaja = $this->IdCobroCaja;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);
			
			$Total = 0;

			if($Num_Filas>0):
			
				while($Linea = mysqli_fetch_array($Resultado)):

				$Cantidad = number_format($Linea['Cantidad'],2);
				$Precio = number_format($Linea['Precio'],2);
				$Total_Concepto = $Cantidad * $Precio;
				$Total += $Total_Concepto; ?>
					<tr>
                        <td><?php 
                            $string = $Linea['Cantidad'].' '.$Linea['NombreConcepto'];
            
                            echo (strlen($string) > 80) ? substr($string,0,80).'...' : $string;
                        ?></td>
                        <td>$<?php 
                            $string = $Linea['Precio'];
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string;
                        ?></td>
                        <td>$<?php 
                            $string = $Total_Concepto;
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string;
                        ?></td>
					</tr>
				<?php endwhile;	?>
            <?php else: ?>
				<tr>
					<td colspan="3">No se encontraron conceptos en el cobro.</td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
			
			return $Total;
		}
    }
?>