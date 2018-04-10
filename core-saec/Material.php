<?php class Material extends AccesoBD
	{
		public $IdMaterial;
		public $Nombre;
		public $Codigo;
		public $Precio;
		public $UnidadMedida;
		public $IdArea;
		public $IdProveedor;
		public $StockMinimo;
		public $Existencia;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdMaterial = null,
			$varNombre = null,
			$varCodigo = null,
			$varPrecio = null,
			$varUnidadMedida = null,
			$varIdArea = null,
			$varProveedor = null,
			$varStockMinimo = null,
			$varExistencia = null,
			$varEstatus = null,
			$varFechaRegistro = null
		)
		{
			$this->IdMaterial = $varIdMaterial;
			$this->Nombre = $varNombre;
			$this->Codigo = $varCodigo;
			$this->Precio = $varPrecio;
			$this->UnidadMedida = $varUnidadMedida;
			$this->IdArea = $varIdArea;
			$this->IdProveedor = $varProveedor;
			$this->StockMinimo = $varStockMinimo;
			$this->Existencia = $varExistencia;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de materiales

		public function Catalogo_Materiales($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdMaterial, 
                                NombreMaterial, 
                                Codigo, 
                                Precio, 
                                UnidadMedida,
                                IdArea,
                                IdProveedor,
                                NombreArea,
                                NombreProveedor,
                                StockMinimo,
                                Existencia
                        FROM SIS_Listado_Materiales;";
            else:
                $SQL = "SELECT  IdMaterial, 
						        NombreMaterial, 
							Codigo, 
							Precio, 
							UnidadMedida,
							IdArea,
							IdProveedor,
							NombreArea,
							NombreProveedor,
							StockMinimo,
                                                        Existencia
					FROM SIS_Listado_Materiales
                    WHERE NombreMaterial LIKE '%$Buscar%' OR
                    Codigo LIKE '%$Buscar%' OR
                    Precio LIKE '%$Buscar%' OR
                    UnidadMedida LIKE '%$Buscar%' OR
                    NombreArea LIKE '%$Buscar%' OR
                    NombreProveedor LIKE '%$Buscar%' OR
                    StockMinimo LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
				        <td><?php echo $Linea['Codigo']; ?></td>
					<td><?php echo $Linea['NombreMaterial']; ?></td>
					<td><?php echo $Linea['NombreArea']; ?></td>
					<td><?php echo $Linea['NombreProveedor']; ?></td>
					<td>$ <?php echo $Linea['Precio']; ?></td>
					<td><?php echo $Linea['Existencia']; ?></td>
					<td><?php echo $Linea['UnidadMedida']; ?></td>
					<td><a href="material-editar.php?material=<?php echo $Linea['IdMaterial']; ?>" class="btn btn-institucional">Editar</a></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="7"><?php echo ($Buscar==null ? "No hay materiales registradas todavía.":"No se encontro ninguna material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de materiales en reportes
        
        public function Catalogo_Materiales_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdMaterial, 
                                NombreMaterial, 
                                Codigo, 
                                Precio, 
                                UnidadMedida,
                                IdArea,
                                IdProveedor,
                                NombreArea,
                                NombreProveedor,
                                StockMinimo
                        FROM SIS_Listado_Materiales;";
            else:
                $SQL = "SELECT  IdMaterial, 
							NombreMaterial, 
							Codigo, 
							Precio, 
							UnidadMedida,
							IdArea,
							IdProveedor,
							NombreArea,
							NombreProveedor,
							StockMinimo
					FROM SIS_Listado_Materiales
                    WHERE NombreMaterial LIKE '%$Buscar%' OR
                    Codigo LIKE '%$Buscar%' OR
                    Precio LIKE '%$Buscar%' OR
                    UnidadMedida LIKE '%$Buscar%' OR
                    NombreArea LIKE '%$Buscar%' OR
                    NombreProveedor LIKE '%$Buscar%' OR
                    StockMinimo LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
		    <td><?php 
                            $string = $Linea['Codigo']; 
            
                            echo (strlen($string) > 18) ? substr($string,0,18).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['NombreMaterial']; 
            
                            echo (strlen($string) > 55) ? substr($string,0,55).'...' : $string; 
                    ?></td>
                    <td>$<?php 
                            $string = $Linea['Precio'];
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['UnidadMedida']; 
            
                            echo (strlen($string) > 30) ? substr($string,0,30).'...' : $string; 
                    ?></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="7"><?php echo ($Buscar==null ? "No hay materiales registradas todavía.":"No se encontro ninguna material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}

	        public function Catalogo_Material_Caducado_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta

			$SQL = "SELECT IdBajaMaterial,
		                       IdMaterial,
                                       Codigo,
		                       Nombre,
		                       Cantidad,
		                       Precio,
		                       IdArea,
                                       UnidadMedida,
                                       FechaRegistro
				FROM SIS_Listado_Material_Caducado
                                WHERE IdBajaMaterial = '$Buscar';";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
		    <td><?php 
                            $string = $Linea['Codigo']; 
            
                            echo (strlen($string) > 18) ? substr($string,0,18).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Nombre']; 
            
                            echo (strlen($string) > 50) ? substr($string,0,50).'...' : $string; 
                    ?></td>
		    <td><?php 
                            $string = $Linea['Cantidad']; 
            
                            echo (strlen($string) > 10) ? substr($string,0,10).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['UnidadMedida'];
            
                            echo (strlen($string) > 15) ? substr($string,0,15).'...' : $string; 
                    ?></td>
		    <td><?php 
			      $date = new DateTime($Linea['FechaRegistro']);
        		      $string = $date->format('d-m-Y');

			      echo (strlen($string) > 10) ? substr($string,0,10).'...' : $string;
		    ?></td>
		    </tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="4"><?php echo ($Buscar==null ? "No hay materiales registradas todavía.":"No se encontro ninguna material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de stock minimo de materiales

		public function CatalogoStockMinimo()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdMaterial, 
                            NombreMaterial, 
                            Codigo,
                            UnidadMedida,
                            StockMinimo,
                            Existencia
                    FROM SIS_Listado_Materiales
                    WHERE Existencia < StockMinimo;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
				        <td><?php echo $Linea['Codigo']; ?></td>
					<td><?php echo $Linea['NombreMaterial']; ?></td>
					<td><?php echo $Linea['UnidadMedida']; ?></td>
					<td><?php echo $Linea['StockMinimo']; ?></td>
					<td><?php echo ($Linea['Existencia'] > 0 ? $Linea['Existencia']:"0.00"); ?></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="6">No hay materiales por debajo del stock minimo.</td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de fechas de caducidades de materiales

		public function CatalogoFechasCaducidad()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdMaterial,
							NombreMaterial, 
							Codigo, 
							Precio, 
							UnidadMedida, 
							StockMinimo,
							Existencia,
							FechaCaducidad,
							Cantidad
					FROM SIS_Listado_Fechas_Caducidad;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
				        <td><?php echo $Linea['Codigo']; ?></td>
					<td><?php echo $Linea['NombreMaterial']; ?></td>
					<td><?php echo $Linea['UnidadMedida']; ?></td>
					<td><?php echo $Linea['Cantidad']; ?></td>
					<td><?php 
						    $date = new DateTime($Linea['FechaCaducidad']);
        					$FechaCaducidad = $date->format('d-m-Y');

							echo $FechaCaducidad; 
						?>
					</td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="6">No hay materiales con fecha de caducidad proxima a 15 dias.</td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}

		public function CatalogoMaterialCaducado()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdBajaMaterial,
		                        IdMaterial,
                                        Codigo,
		                        Nombre,
		                        Cantidad,
		                        Precio,
		                        IdArea,
                                        UnidadMedida,
                                        FechaRegistro
				FROM SIS_Listado_Material_Caducado;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
				        <td><?php echo $Linea['Codigo']; ?></td>
					<td><?php echo $Linea['Nombre']; ?></td>
					<td><?php echo $Linea['UnidadMedida']; ?></td>
					<td><?php echo $Linea['Cantidad']; ?></td>
					<td><?php 
						    $date = new DateTime($Linea['FechaRegistro']);
        					$FechaCaducidad = $date->format('d-m-Y');

							echo $FechaCaducidad; 
						?>
					</td>
					<td><a href="reportes/material-caducado-generar-pdf.php?caducado=<?php echo $Linea['IdBajaMaterial']; ?>" class="btn btn-institucional pull-right" target="_blank">Generar Reporte</a></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="6">No hay materiales caducados hasta el momento.</td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//alta de un material

		public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Material_Alta(
					'$this->Nombre', 
					'$this->Codigo', 
					 '$this->Precio', 
					'$this->UnidadMedida', 
			 		 '$this->IdArea', 
			 		 '$this->IdProveedor', 
			 		 '$this->StockMinimo'
					);";
			
			echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta un material",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: materiales.php?exito=Se guardo el Material con exito');
			}else{
				header('Location: materiales.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//actualizar un precio de un material

		public function ActualizarPrecio()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Material_Actualizar_Precio(
					'$this->IdMaterial',
					 $this->Precio
					);";

			//echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo un precio",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: actualizar-precios.php?exito=Se actualizo el precio con exito');
			}else{
				header('Location: actualizar-precios.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//eliminar un precio de un material
        
        public function EliminarPrecio()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Material_Eliminar_Precio('$this->IdMaterial');";

			//echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("elimino un precio",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: actualizar-precios.php?exito=Se elimino el precio con exito');
			}else{
				header('Location: actualizar-precios.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//actualizar un material

		public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));			

			// realizar la consulta
			$SQL = "CALL Material_Actualizar(
					'$this->IdMaterial',
					'$this->Nombre', 
					'$this->Codigo', 
					'$this->Precio', 
					'$this->UnidadMedida', 
			 		'$this->IdArea', 
			 		'$this->IdProveedor', 
			 		'$this->StockMinimo',
			 		'$this->Estatus'
					);";

			echo $SQL;	

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo un material",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: materiales.php?exito=Se guardo el Material con exito');
			}else{
				header('Location: materiales.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//actualizar campode de materiales

		public function ActualizarCamposMateriales()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdMaterial, 
                                NombreMaterial, 
                                Codigo, 
                                Precio, 
                                UnidadMedida,
                                IdArea,
                                IdProveedor,
                                NombreArea,
                                NombreProveedor,
                                StockMinimo,
                                Existencia
                        FROM SIS_Listado_Materiales
                        WHERE IdMaterial = $this->IdMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0){
				while($Linea = mysqli_fetch_array($Resultado))
				{
					$Datos[0] = $Linea['UnidadMedida'];
					$Datos[1] = $Linea['IdMaterial'];
                    $Datos[2] = $Linea['Precio'];
                    $Datos[3] = $Linea['Existencia'];
				}
			}

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
            
            return $Datos;
		}
	
		//listado de materiales en select

		public function ListadoMaterialSelect()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));			

			// realizar la consulta
            if($this->IdProveedor==null):
                $SQL = "SELECT  IdMaterial, NombreMaterial
                        FROM SIS_Listado_Materiales;";
            else:
                $SQL = "SELECT  IdMaterial, NombreMaterial
                        FROM SIS_Listado_Materiales
                        WHERE IdProveedor = $this->IdProveedor;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0):?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdMaterial']; ?>'><?php echo $Linea['NombreMaterial']; ?></option>
			<?php endwhile;endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//listado de materiales en select dependiento del departamento o comunidad
        
        public function ListadoMaterialSelectSolicitud($Departamento=0,$Comunidad=0)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Departamento != null || $Comunidad != null):
                $SQL = "CALL Listado_Materiales_Solicitudes_Materiales_Usuario($Departamento,$Comunidad);";

                $Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

                if(mysqli_num_rows($Resultado) > 0):?>
                <?php while($Linea = mysqli_fetch_array($Resultado)): ?>
                    <option value='<?php echo $Linea['IdMaterial']; ?>'><?php echo $Linea['NombreMaterial']; ?></option>
                <?php endwhile;endif;

                // Liberar resultados
                mysqli_free_result($Resultado);

                // Cerrar la conexión
                mysqli_close($Conexion);
            endif;
		}       
	
		//listado de codigos de los materiales dependiendo del departamento o comunidad

        public function ListadoCodigosSelectSolicitud($Departamento=0,$Comunidad=0)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Departamento != null || $Comunidad != null):
                $SQL = "CALL Listado_Materiales_Solicitudes_Materiales_Usuario($Departamento,$Comunidad);";

                $Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

                if(mysqli_num_rows($Resultado) > 0):?>
                <?php while($Linea = mysqli_fetch_array($Resultado)): ?>
                    <option value='<?php echo $Linea['IdMaterial']; ?>'><?php echo $Linea['Codigo']; ?></option>
                <?php endwhile;endif;

                // Liberar resultados
                mysqli_free_result($Resultado);

                // Cerrar la conexión
                mysqli_close($Conexion);
            endif;
		}
	
		//listado de materiales en select en devoluciones
        
        public function ListadoMaterialSelectDevolucion($Usuario=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Usuario!=null):
                $SQL = "CALL Listado_Materiales_Devoluciones_Materiales_Usuario($Usuario)";

                $Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

                if(mysqli_num_rows($Resultado) > 0):?>
                <?php while($Linea = mysqli_fetch_array($Resultado)): ?>
                    <option value='<?php echo $Linea['IdMaterial']; ?>'><?php echo $Linea['NombreMaterial']; ?></option>
                <?php endwhile;endif;

                // Liberar resultados
                mysqli_free_result($Resultado);

                // Cerrar la conexión
                mysqli_close($Conexion);
            endif;
		}
	
		//listado de codigos de materiales de devolucion
        
        public function ListadoCodigosSelectDevolucion($Usuario=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
            if($Usuario!=null):
                $SQL = "CALL Listado_Materiales_Devoluciones_Materiales_Usuario($Usuario)";

                $Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

                if(mysqli_num_rows($Resultado) > 0):?>
                <?php while($Linea = mysqli_fetch_array($Resultado)): ?>
                    <option value='<?php echo $Linea['IdMaterial']; ?>'
                    <?php if($this->Nombre == $Linea['Codigo']): ?>
                        selected>
                    <?php else: ?>
                        >
                    <?php endif; ?>
                        <?php echo $Linea['Codigo']; ?>
                    </option>
                <?php endwhile;endif;

                // Liberar resultados
                mysqli_free_result($Resultado);

                // Cerrar la conexión
                mysqli_close($Conexion);
             endif;
		}
	
		//listado de codigos de materiales en select
        
        public function ListadoCodigosSelect()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			if($this->IdProveedor==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Materiales;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Materiales
                        WHERE IdProveedor = $this->IdProveedor;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0):?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdMaterial']; ?>'
				<?php if($this->Nombre == $Linea['Codigo']): ?>
					selected>
				<?php else: ?>
					>
				<?php endif; ?>
					<?php echo $Linea['Codigo']; ?>
				</option>
			<?php endwhile;endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de los materiales con precios nuevos

		public function CatalogoActualizarPrecios()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "SELECT  IdHistorialPrecio,
                            Codigo,
                            Material,
                            Nombre,
                            PrecioActual,
                            PrecioNuevo
                    FROM SIS_Listado_Historial_Precios
                    WHERE PrecioActual <> PrecioNuevo;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
				        <td><?php echo $Linea['Codigo']; ?></td>
					<td><?php echo $Linea['Nombre']; ?></td>
					<td><?php echo $Linea['PrecioActual']; ?></td>
					<td><?php echo $Linea['PrecioNuevo']; ?></td>
					<td><a href="actualiza-precio.php?material=<?php echo $Linea['Material']; ?>&precio-nuevo=<?php echo $Linea['PrecioNuevo'].'&tipo=1'; ?>" class="btn btn-institucional guardar">Actualizar</a>
                    <a href="actualiza-precio.php?material=<?php echo $Linea['Material']; ?>&precio-nuevo=<?php echo $Linea['PrecioNuevo'].'&tipo=2'; ?>" class="btn btn-danger guardar">Eliminar</a>
                    </td>
				</tr>
			<?php endwhile; ?>				
			<?php else: ?>
				<tr>
					<td colspan="4">No hay precios nuevos registrados.</td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de un material

		public function Obtener_Material()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdMaterial, 
							NombreMaterial, 
							Codigo, 
							Precio, 
							UnidadMedida,
							IdArea,
							IdProveedor,
							NombreArea,
							NombreProveedor,
							StockMinimo
					FROM SIS_Listado_Materiales
					WHERE IdMaterial = $this->IdMaterial;";

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
	
		//calcular el numero de precios nuevos
        
        public function Numero_Precios_Nuevos()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  count(IdHistorialPrecio) AS NumeroPreciosNuevos
                    FROM SIS_Listado_Historial_Precios
                    WHERE PrecioActual <> PrecioNuevo;";

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
