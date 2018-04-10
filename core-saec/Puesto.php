<?php class Puesto extends AccesoBD
	{
		public $IdPuesto;
		public $Nombre;
		public $Descripcion;
		public $FechaRegistro;
		public $Estatus;

		public function __construct
		(
			$varIdPuesto = null,
		 	$varNombre = null,
		 	$varDescripcion = null,
		 	$varEstatus = null,
		 	$varFechaRegistro = null
		)
		{
			$this->IdPuesto = $varIdPuesto;
			$this->Nombre = $varNombre;
			$this->Descripcion = $varDescripcion;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de puestos

		public function Catalogo_Puestos($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdPuesto, 
                                Nombre, 
                                Descripcion 
                        FROM SIS_Listado_Puestos;";
            else:
                $SQL = "SELECT  IdPuesto, 
                                Nombre, 
                                Descripcion 
                        FROM SIS_Listado_Puestos
                        WHERE Nombre LIKE '%$Buscar%' OR
                        Descripcion LIKE '%$Buscar%';";
            endif;
            
            $Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));
            
			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['Nombre']; ?></td>
						<td><?php echo $Linea['Descripcion']; ?></td>
						<td><a href="puesto-editar.php?puesto=<?php echo $Linea['IdPuesto']; ?>" title="Editar" class="btn btn-institucional">Editar</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay puestos registrados todavía.":"No se encontro ningún puesto en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de puestos en reporte
        
        public function Catalogo_Puestos_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdPuesto, 
                                Nombre, 
                                Descripcion 
                        FROM SIS_Listado_Puestos;";
            else:
                $SQL = "SELECT  IdPuesto, 
                                Nombre, 
                                Descripcion 
                        FROM SIS_Listado_Puestos
                        WHERE Nombre LIKE '%$Buscar%' OR
                        Descripcion LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php 
                            $string = $Linea['Nombre']; 
        
                            echo (strlen($string) > 65) ? substr($string,0,65).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['Descripcion'];
        
                            echo (strlen($string) > 65) ? substr($string,0,65).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar==null ? "No hay puestos registrados todavía.":"No se encontro ningún puesto en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//dar de alta un puesto

		public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Puesto_Alta(
						'$this->Nombre',
						'$this->Descripcion'
					);";

			echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta un puesto",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
                header('Location: puestos.php?exito=Se guardo el Puesto con exito');
			}else{
                header('Location: puestos.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de un puesto

		public function Obtener_Puesto()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdPuesto, 
                            Nombre, 
                            Descripcion 
                    FROM SIS_Listado_Puestos
                    WHERE IdPuesto = $this->IdPuesto;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			$Datos = null;

			if($Num_Filas > 0):
				$Datos = mysqli_fetch_array($Resultado);
			endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
            
            return $Datos;
		}
	
		//listado de puestos en un select

		public function ListadoSelect()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT IdPuesto, Nombre FROM SIS_Listado_Puestos;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0):?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdPuesto']; ?>' <?php echo ($this->IdPuesto == $Linea['IdPuesto'] ? "selected":""); ?>><?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;
			endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//actualizar un puesto

		public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Puesto_Actualizar(
							'$this->IdPuesto',
							'$this->Nombre',
							'$this->Descripcion',
							'$this->Estatus'
						);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo un puesto",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: puestos.php?exito=Se guardo el Puesto con exito');
			}else{
				header('Location: puestos.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	}
?>
