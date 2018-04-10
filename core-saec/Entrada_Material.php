<?php class Entrada_Material extends AccesoBD
	{
		public $IdEntradaMaterial;
		public $IdUsuario;
		public $IdAdministracion;
		public $FolioEntradaMaterial;
		public $IdProveedor;
		public $Folio_Factura;
		public $IdImpuesto;
		public $PorcentajeImpuesto;
		public $IdMateriales;
		public $Precios;
		public $Cantidades;
		public $FechasCaducidades;
		public $FechaRegistro;
		public $Estatus;

		public function __construct
		(
			$varIdEntradaMaterial = null,
			$varIdUsuario = null,
			$varIdAdministracion = null,
			$varFolioEntradaMaterial = null,
			$varIdProveedor = null,
			$varFolio_Factura = null,
			$varIdImpuesto = null,
			$varPorcentajeImpuesto = null,
			$varIdMateriales = null,
			$varPrecios = null,
			$varCantidades = null,
			$varFechasCaducidades = null,
			$varFechaRegistro = null,
			$varEstatus = null
		)
		{
			$this->IdEntradaMaterial = $varIdEntradaMaterial;
			$this->IdUsuario = $varIdUsuario;
			$this->IdAdministracion = $varIdAdministracion;
			$this->FolioEntradaMaterial = $varFolioEntradaMaterial;
			$this->IdProveedor = $varIdProveedor;
			$this->Folio_Factura = $varFolio_Factura;
			$this->IdImpuesto = $varIdImpuesto;
			$this->PorcentajeImpuesto = $varPorcentajeImpuesto;
			$this->IdMateriales = $varIdMateriales;
			$this->Precios = $varPrecios;
			$this->Cantidades = $varCantidades;
			$this->FechasCaducidades = $varFechasCaducidades;
			$this->FechaRegistro = $varFechaRegistro;
			$this->Estatus = $varEstatus;
		}
	
		//catalogo de entradas de materiales en modo de administrador

		public function Catalogo_Entrada_Material_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                IdEntradaMaterial,
                                IdAdministracion,
                                FolioEntradaMaterial,
                                FolioFactura,
                                IdProveedor,
                                IdImpuesto,
                                PorcentajeImpuesto,
                                NombreProveedor,
                                AliasProveedor,
                                NombreImpuesto
                        FROM SIS_Listado_Entradas_Materiales;";
            else:
                $SQL = "SELECT  IdUsuario,
                                IdEntradaMaterial,
                                IdAdministracion,
                                FolioEntradaMaterial,
                                FolioFactura,
                                IdProveedor,
                                IdImpuesto,
                                PorcentajeImpuesto,
                                NombreProveedor,
                                AliasProveedor,
                                NombreImpuesto
                        FROM SIS_Listado_Entradas_Materiales
                        WHERE FolioEntradaMaterial LIKE '%$Buscar%' OR
                        PorcentajeImpuesto LIKE '%$Buscar%' OR
                        NombreProveedor LIKE '%$Buscar%' OR
                        NombreImpuesto LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['FolioEntradaMaterial']; ?></td>
                                        <td><?php echo $Linea['FolioFactura']; ?></td>
					<td><?php echo $Linea['AliasProveedor']; ?></td>
					<td><a href="entrada-material-detalle.php?entrada=<?php echo $Linea['IdEntradaMaterial']; ?>" class="btn btn-institucional">Ver Entrada</a></td>
                    <td><a href="reportes/entrada-material-generar-pdf.php?entrada=<?php echo $Linea['IdEntradaMaterial']; ?>" class="btn btn-institucional" target="_blank">Generar PDF</a></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="4"><?php echo ($Buscar == null ? "No hay entradas de materiales registradas todavía.":"No se encontro ninguna entrada de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de entradas de material en reporte
        
        public function Catalogo_Entrada_Material_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                IdEntradaMaterial,
                                IdAdministracion,
                                FolioEntradaMaterial,
                                FolioFactura,
                                IdProveedor,
                                IdImpuesto,
                                PorcentajeImpuesto,
                                NombreProveedor,
                                AliasProveedor,
                                NombreImpuesto
                        FROM SIS_Listado_Entradas_Materiales;";
            else:
                $SQL = "SELECT  IdUsuario,
                                IdEntradaMaterial,
                                IdAdministracion,
                                FolioEntradaMaterial,
                                FolioFactura,
                                IdProveedor,
                                IdImpuesto,
                                PorcentajeImpuesto,
                                NombreProveedor,
                                AliasProveedor,
                                NombreImpuesto
                        FROM SIS_Listado_Entradas_Materiales
                        WHERE FolioEntradaMaterial LIKE '%$Buscar%' OR
                        PorcentajeImpuesto LIKE '%$Buscar%' OR
                        NombreProveedor LIKE '%$Buscar%' OR
                        NombreImpuesto LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
                    <td><?php 
                            $string = $Linea['FolioEntradaMaterial']; 
            
                            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['FolioFactura'];
            
                            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['AliasProveedor'];
            
                            echo (strlen($string) > 90) ? substr($string,0,90).'...' : $string; 
                    ?></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar == null ? "No hay entradas de materiales registradas todavía.":"No se encontro ninguna entrada de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de entradas de material

		public function Catalogo_Entrada_Material($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                IdEntradaMaterial,
                                IdAdministracion,
                                FolioEntradaMaterial,
                                IdProveedor,
                                IdImpuesto,
                                PorcentajeImpuesto,
                                NombreProveedor,
                                AliasProveedor,
                                NombreImpuesto
                        FROM SIS_Listado_Entradas_Materiales
                        WHERE IdUsuario = $this->IdUsuario;";
            else:
                $SQL = "SELECT  IdUsuario,
                                IdEntradaMaterial,
                                IdAdministracion,
                                FolioEntradaMaterial,
                                IdProveedor,
                                IdImpuesto,
                                PorcentajeImpuesto,
                                NombreProveedor,
                                AliasProveedor,
                                NombreImpuesto
                        FROM SIS_Listado_Entradas_Materiales
                        WHERE IdUsuario = $this->IdUsuario AND
                        FolioEntradaMaterial LIKE '%$Buscar%' OR
                        PorcentajeImpuesto LIKE '%$Buscar%' OR
                        NombreProveedor LIKE '%$Buscar%' OR
                        NombreImpuesto LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['FolioEntradaMaterial']; ?></td>
					<td><?php echo $Linea['AliasProveedor']; ?></td>
					<td><a href="entrada-material-detalle.php?entrada=<?php echo $Linea['IdEntradaMaterial']; ?>" class="btn btn-institucional">Ver Entrada</a></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay entradas de materiales registradas todavía.":"No se encontro ninguna entrada de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//dar de alta una entrada de material

		public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Entrada_Material_Alta(
					'$this->IdUsuario',
					'$this->IdProveedor',
                                        '$this->Folio_Factura',
					'$this->IdImpuesto',
					'$this->PorcentajeImpuesto',
					'$this->IdMateriales',
					'$this->Precios',
					'$this->Cantidades',
					'$this->FechasCaducidades'
					);";
			
			//echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo una entrada de material",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: entradas-material.php?exito=Se guardo la Entrada con exito');
			}else{
				header('Location: entradas-material.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los materiales de una entrada de material

		public function Entrada_Material_Materiales()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdEntradaMaterial,
                            IdMaterial,
                            NombreMaterial,
                            Cantidad,
                            UnidadMedida,
                            Precio,
                            PorcentajeImpuesto
                    FROM SIS_Listado_Materiales_Entrada_Material
                    WHERE IdEntradaMaterial = $this->IdEntradaMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0):
            $Total = 0;
			while($Linea = mysqli_fetch_array($Resultado)):
            $Cantidad = number_format($Linea['Cantidad'],2);
            $Precio = number_format($Linea['Precio'],2);
            $Total += $Cantidad * $Precio;
            $PorcentajeImpuesto = floatval($Linea['PorcentajeImpuesto']); ?>
				<tr>
	            	<td><?php echo $Linea['NombreMaterial']; ?></td>
	            	<td><?php echo $Cantidad." ".$Linea['UnidadMedida']; ?></td>
	            	<td>$ <?php echo $Precio; ?></td>
	            	<td>$ <?php echo number_format($Cantidad*$Precio,2); ?></td>
            	</tr>
			<?php endwhile;	?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php
                            $TotalImpuesto = ($Total * $PorcentajeImpuesto)/100;
                            echo "$ ".number_format($TotalImpuesto+$Total,2);
                        ?>
                    </td>
                </tr>
            <?php else: ?>
				<tr>
					<td colspan="5">No se encontraron materiales.</td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los materiales de una entrada de materiales en reporte
        
        public function Entrada_Material_Materiales_Reporte()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdEntradaMaterial,
                            IdMaterial,
                            NombreMaterial,
                            Cantidad,
                            UnidadMedida,
                            Precio,
                            PorcentajeImpuesto
                    FROM SIS_Listado_Materiales_Entrada_Material
                    WHERE IdEntradaMaterial = $this->IdEntradaMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0):
            $Total = 0; ?>
            <table id="contenido">            
		      <tr style="background:#e3e3e3;">
		        <th style="padding:5px;width:260px;">Material</th>
		        <th style="padding:5px;width:200px;">Cantidad</th>
		        <th style="padding:5px;width:100px;">Precio</th>
		        <th style="padding:5px;width:100px;">Total</th>
		      </tr>
			<?php while($Linea = mysqli_fetch_array($Resultado)): 
                $Cantidad = number_format($Linea['Cantidad'],2);
                $Precio = number_format($Linea['Precio'],2);
                $Total += $Cantidad * $Precio;
                $PorcentajeImpuesto = floatval($Linea['PorcentajeImpuesto']); ?>
                <tr>
	            	<td><?php 
                            $string = $Linea['NombreMaterial']; 
            
                            echo (strlen($string) > 45) ? substr($string,0,45).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Cantidad." ".$Linea['UnidadMedida'];
            
                            echo (strlen($string) > 35) ? substr($string,0,35).'...' : $string; 
                    ?></td>
                    <td>$<?php 
                            $string = $Precio;
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                    ?></td>
                    <td>$<?php 
                            $string = number_format($Cantidad*$Precio,2);
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                    ?></td>
            	</tr>
			<?php endwhile; ?>
            </table>
            <table>
                <tr>
                    <td style="padding:5px;width:260px;"></td>
                    <td style="padding:5px;width:200px;"></td>
                    <td style="padding:5px;width:100px;"></td>
                    <td style="background:#e3e3e3;border:1px solid #e3e3e3;margin:0;padding:3px;width:108px;">$<?php 
                            $TotalImpuesto = ($Total * $PorcentajeImpuesto)/100;
                            $string = number_format($TotalImpuesto+$Total,2);
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                    ?></td>
                </tr>
            </table>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de una entradas de material

		public function Obtener_Entrada_Material()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
			$SQL = "SELECT  IdAdministracion,
							FolioEntradaMaterial,
                                                        FolioFactura,
							IdProveedor,
							IdImpuesto,
							PorcentajeImpuesto,
							NombreProveedor,
							NombreImpuesto
					FROM SIS_Listado_Entradas_Materiales
					WHERE IdEntradaMaterial = $this->IdEntradaMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			$Datos = null;

			if($Num_Filas>0):
				$Datos = mysqli_fetch_array($Resultado);
			endif;					

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);

			return $Datos;
		}
	}
?>