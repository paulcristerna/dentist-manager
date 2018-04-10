<?php class Descuento extends AccesoBD
	{
		public $IdDescuento;
		public $Nombre;
		public $Porcentaje;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdDescuento = null,
		 	$varNombre = null,
		 	$varPorcentaje = null,
		 	$varEstatus = null,
		 	$varFechaRegistro = null
		)
		{
			$this->IdDescuento = $varIdDescuento;
			$this->Nombre = $varNombre;
			$this->Porcentaje = $varPorcentaje;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de descuentos

		public function Catalogo_Descuentos($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdDescuento, 
                                Nombre, 
                                Porcentaje 
                        FROM SIS_Listado_Descuentos;";
            else:
                $SQL = "SELECT  IdDescuento, 
                                Nombre, 
                                Porcentaje 
                        FROM SIS_Listado_Descuentos
                        WHERE Nombre LIKE '%$Buscar%' OR 
                        Porcentaje LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['Nombre']; ?></td>
						<td><?php echo $Linea['Porcentaje']; ?>%</td>
						<td><a href="descuento-editar.php?descuento=<?php echo $Linea['IdDescuento']; ?>" class='btn btn-institucional'>Editar</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay descuentos registrados todavía.":"No se encontro ningún descuento en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
        
		//catalogo de descuentos en reporte
	
        public function Catalogo_Descuentos_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdDescuento, 
                                Nombre, 
                                Porcentaje 
                        FROM SIS_Listado_Descuentos;";
            else:
                $SQL = "SELECT  IdDescuento, 
                                Nombre, 
                                Porcentaje 
                        FROM SIS_Listado_Descuentos
                        WHERE Nombre LIKE '%$Buscar%' OR 
                        Porcentaje LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php 
                            $string = $Linea['Nombre'];
            
                            echo (strlen($string) > 90) ? substr($string,0,90).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['Porcentaje']; 
        
                            echo (strlen($string) > 6) ? substr($string,0,6).'...' : $string; 
                        ?>%</td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar==null ? "No hay descuentos registrados todavía.":"No se encontro ningun descuento en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
        
		//dar de alta un descuento
	
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Descuento_Alta(
						'$this->Nombre',
						'$this->Porcentaje'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{  
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta un descuento",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: descuentos.php?exito=Se guardo el Descuento con exito');
			}else{
                header('Location: descuentos.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de un descuento

		public function Obtener_Descuento()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
			$SQL = "SELECT  IdDescuento, 
                            Nombre, 
                            Porcentaje 
                    FROM SIS_Listado_Descuentos
                    WHERE IdDescuento = $this->IdDescuento;";

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
	
		//listado de descuentos en select

		public function ListadoSelect($Descuento = null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT IdDescuento, Nombre FROM SIS_Listado_Descuentos;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0):?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdDescuento']; ?>' <?php echo ($this->IdDescuento == $Linea['IdDescuento'] ? "selected":""); ?>><?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//actualizar un descuento

		public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Descuento_Actualizar($this->IdDescuento,'$this->Nombre','$this->Porcentaje',$this->Estatus);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo un descuento",3);
				$Bitacora->Entrada_Bitacora();
				
                //redirecionar
				header('Location: descuentos.php?exito=Se guardo el Descuento con exito');
			}else{
				header('Location: descuentos.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>