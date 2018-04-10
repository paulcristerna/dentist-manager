<?php class Impuesto extends AccesoBD
	{
		public $IdImpuesto;
		public $Nombre;
		public $Porcentaje;
		public $FechaRegistro;
		public $Estatus;

		public function __construct
		(
			$varIdImpuesto = null,
			$varNombre = null,
			$varPorcentaje = null,
			$varEstatus = null,
			$varFechaRegistro = null
		)
		{
			$this->IdImpuesto = $varIdImpuesto;
			$this->Nombre = $varNombre;
			$this->Porcentaje = $varPorcentaje;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de impuestos

		public function Catalogo_Impuestos($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdImpuesto, 
                                Nombre, 
                                Porcentaje 
                        FROM SIS_Listado_Impuestos;";
            else:
                $SQL = "SELECT  IdImpuesto, 
                                Nombre, 
                                Porcentaje 
                        FROM SIS_Listado_Impuestos
                        WHERE Nombre LIKE '%$Buscar%' OR 
                        Porcentaje LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td style="text-transform:uppercase;"><?php echo $Linea['Nombre']; ?></td>
					<td><?php echo $Linea['Porcentaje']; ?> %</td>	
					<td><a href="impuesto-editar.php?impuesto=<?php echo $Linea['IdImpuesto'] ?>" class='btn btn-institucional'>Editar</a></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay impuestos registradas todavía.":"No se encontro ningún impuesto en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);			
		}
	
		//catalogo de impuestos en reportes
        
        public function Catalogo_Impuestos_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdImpuesto, 
                                Nombre, 
                                Porcentaje 
                        FROM SIS_Listado_Impuestos;";
            else:
                $SQL = "SELECT  IdImpuesto, 
                                Nombre, 
                                Porcentaje 
                        FROM SIS_Listado_Impuestos
                        WHERE Nombre LIKE '%$Buscar%' OR 
                        Porcentaje LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
                    <td><?php 
                            $string = $Linea['Nombre'];
            
                            echo (strlen($string) > 80) ? substr($string,0,80).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Porcentaje'];
            
                            echo (strlen($string) > 6) ? substr($string,0,6).'...' : $string; 
                    ?>%</td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay impuestos registradas todavía.":"No se encontro ningún impuesto en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);			
		}
	
		//dar de alta un material

		public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Impuesto_Alta(
						'$this->Nombre',
						'$this->Porcentaje'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta un impuesto",3);
				$Bitacora->Entrada_Bitacora();
				
				//redireccionar
				header('Location: impuestos.php?exito=Se guardo el Impuesto con exito');
			}else{
				header('Location: impuestos.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de un impuesto

		public function Obtener_Impuesto()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdImpuesto, 
                            Nombre, 
                            Porcentaje 
                    FROM SIS_Listado_Impuestos
                    WHERE IdImpuesto = $this->IdImpuesto;";

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
	
		//actualizar un impuesto

		public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Impuesto_Actualizar(
					 	'$this->IdImpuesto',
						'$this->Nombre',
						'$this->Porcentaje',
						'$this->Estatus'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo un impuesto",3);
				$Bitacora->Entrada_Bitacora();
				
				//redireccionar
				header('Location: impuestos.php?exito=Se guardo el Impuesto con exito');
			}else{
				header('Location: impuestos.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//listado de impuestos en select

        public function ListadoSelect()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdImpuesto, 
							Nombre,
							Porcentaje
					FROM SIS_Listado_Impuestos;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0):?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdImpuesto']; ?>'
				<?php if($this->Nombre == $Linea['Nombre']): ?>
					selected>
				<?php else: ?>
					>
				<?php endif; ?>
					<?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//actualizar campo de impuesto

        public function ActualizarCampoImpuesto()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "SELECT  IdImpuesto, 
                            Nombre, 
                            Porcentaje 
                    FROM SIS_Listado_Impuestos
                    WHERE IdImpuesto = $this->IdImpuesto;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0){
				while($Linea = mysqli_fetch_array($Resultado))
				{
					$Datos[0] = $Linea['IdImpuesto'];
					$Datos[1] = $Linea['Nombre'];
					$Datos[2] = $Linea['Porcentaje'];
				}
			}

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
            
			return $Datos;
		}
	}
?>