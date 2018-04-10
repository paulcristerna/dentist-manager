<?php class Area extends AccesoBD
	{
		public $IdArea;
		public $Nombre;
		public $Descripcion;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdArea = null,
		 	$varNombre = null,
		 	$varDescripcion = null,
		 	$varEstatus = null,
		 	$varFechaRegistro = null
		)
		{
			$this->IdArea = $varIdArea;
			$this->Nombre = $varNombre;
			$this->Descripcion = $varDescripcion;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de areas

		public function Catalogo_Areas($Buscar=null)
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdArea, 
                                Nombre, 
                                Descripcion 
                        FROM SIS_Listado_Areas;";
            else:
                $SQL = "SELECT  IdArea, 
                                Nombre, 
                                Descripcion 
                        FROM SIS_Listado_Areas
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
						<td><a href="area-editar.php?area=<?php echo $Linea['IdArea']; ?>" class='btn btn-institucional'>Editar</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay areas registradas todavía.":"No se encontro ninguna area en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de areas
        
        public function Catalogo_Areas_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdArea, 
                                Nombre, 
                                Descripcion 
                        FROM SIS_Listado_Areas;";
            else:
                $SQL = "SELECT  IdArea, 
                                Nombre, 
                                Descripcion 
                        FROM SIS_Listado_Areas
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
            
                            echo (strlen($string) > 55) ? substr($string,0,55).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['Descripcion'];
            
                            echo (strlen($string) > 55) ? substr($string,0,55).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar==null ? "No hay areas registradas todavía.":"No se encontro ninguna area en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
        
		//dar de alta un area
	
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Area_Alta(
						'$this->Nombre',
						'$this->Descripcion'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{               				
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("guardo un area",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: areas.php?exito=Se guardo el Area con exito');
			}else{
                header('Location: areas.php?error=Ocurro un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}

		//obtener datos de un area
	
		public function Obtener_Area()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
			$SQL = "SELECT  IdArea, 
                            Nombre, 
                            Descripcion 
                    FROM SIS_Listado_Areas
                    WHERE IdArea = $this->IdArea;";

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
	
		//listado de areas en checkbox

		public function ListadoCheckBox($Area = null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysql_error());

            // realizar la consulta
			$SQL = "SELECT IdArea, Nombre FROM SIS_Listado_Areas;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			while($Linea = mysqli_fetch_array($Resultado)):
			$seleccionado = ""; ?>
			<?php for($i=0;$i<sizeof($Area);$i++): 
				if($Linea['IdArea'] == $Area[$i]):
					$seleccionado = "checked";
					$i = sizeof($Area)-1;
				endif;
			endfor;
			?>
				<div class="span2">	
					<input type="checkbox" name="area[]" id="area" value="<?php echo $Linea['IdArea']; ?>" <?php echo $seleccionado; ?>><?php echo $Linea['Nombre']; ?>					
				</div>
			<?php endwhile;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//lsitado de areas en select

		public function ListadoSelect($Area = null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT IdArea, Nombre FROM SIS_Listado_Areas;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0):?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdArea']; ?>' <?php echo ($this->IdArea == $Linea['IdArea'] ? "selected":""); ?>><?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//actualizar un area

		public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Area_Actualizar($this->IdArea,'$this->Nombre','$this->Descripcion',$this->Estatus);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo un area",3);
				$Bitacora->Entrada_Bitacora();
				
                //redirecionar
				header('Location: areas.php?exito=Se guardo el Area con exito');
			}else{
				header('Location: areas.php?error=Ocurrio un error.'.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>