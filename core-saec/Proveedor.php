<?php class Proveedor extends AccesoBD
	{
		public $IdProveedor;
		public $RFC;
		public $Nombre;
		public $Alias;
		public $Poblacion;
		public $Colonia;
		public $Calle;
		public $Numero;
		public $Telefono;
		public $Email;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdProveedor = null,
			$varRFC = null,
			$varNombre = null,
			$varAlias = null,
			$varPoblacion = null,
			$varColonia = null,
			$varCalle = null,
			$varNumero = null,
			$varTelefono = null,
			$varEmail = null,
			$varEstatus = null,
			$varFechaRegistro = null
		)
		{
			$this->IdProveedor = $varIdProveedor;
			$this->RFC = $varRFC;
			$this->Nombre = $varNombre;
			$this->Alias = $varAlias;
			$this->Poblacion = $varPoblacion;
			$this->Colonia = $varColonia;
			$this->Calle = $varCalle;
			$this->Numero = $varNumero;
			$this->Telefono = $varTelefono;
			$this->Email = $varEmail;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de proveedores

		public function Catalogo_Proveedores($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdProveedor, 
                                RFC, 
                                Nombre, 
                                Alias,
                                Poblacion, 
                                Colonia,
                                Calle,
                                Numero,
                                Telefono, 
                                Email 
                        FROM SIS_Listado_Proveedores;";
            else:
                $SQL = "SELECT  IdProveedor, 
							RFC, 
							Nombre, 
							Alias,
							Poblacion, 
							Colonia,
							Calle,
							Numero,
							Telefono, 
							Email 
					FROM SIS_Listado_Proveedores
                    WHERE RFC LIKE '%$Buscar%' OR
                    Nombre LIKE '%$Buscar%' OR 
                    Alias LIKE '%$Buscar%' OR
                    Poblacion LIKE '%$Buscar%' OR 
                    Colonia LIKE '%$Buscar%' OR
                    Calle LIKE '%$Buscar%' OR
                    Numero LIKE '%$Buscar%' OR
                    Telefono LIKE '%$Buscar%' OR
                    Email LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td style="text-transform:uppercase;"><?php echo $Linea['RFC']; ?></td>
					<td><?php echo $Linea['Nombre']; ?></td>
					<td><?php echo $Linea['Alias']; ?></td>
					<td><?php echo $Linea['Poblacion']; ?></td>
					<td><?php echo $Linea['Telefono']; ?></td>
					<td style="text-transform:lowercase;"><?php echo $Linea['Email']; ?></td>	
					<td><a href="proveedor-editar.php?proveedor=<?php echo $Linea['IdProveedor'] ?>" class='btn btn-institucional'>Editar</a></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="7"><?php echo ($Buscar==null ? "No hay proveedores registrados todavía.":"No se encontro ningún proveedor en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de proveedores en reporte
        
        public function Catalogo_Proveedores_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdProveedor, 
                                RFC, 
                                Nombre, 
                                Alias,
                                Poblacion, 
                                Colonia,
                                Calle,
                                Numero,
                                Telefono, 
                                Email 
                        FROM SIS_Listado_Proveedores;";
            else:
                $SQL = "SELECT  IdProveedor, 
							RFC, 
							Nombre, 
							Alias,
							Poblacion, 
							Colonia,
							Calle,
							Numero,
							Telefono, 
							Email 
					FROM SIS_Listado_Proveedores
                    WHERE RFC LIKE '%$Buscar%' OR
                    Nombre LIKE '%$Buscar%' OR 
                    Alias LIKE '%$Buscar%' OR
                    Poblacion LIKE '%$Buscar%' OR 
                    Colonia LIKE '%$Buscar%' OR
                    Calle LIKE '%$Buscar%' OR
                    Numero LIKE '%$Buscar%' OR
                    Telefono LIKE '%$Buscar%' OR
                    Email LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
                    <td><?php 
                            $string = $Linea['RFC']; 
            
                            echo (strlen($string) > 15) ? substr($string,0,15).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Nombre']; 
            
                            echo (strlen($string) > 35) ? substr($string,0,35).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Poblacion']; 
            
                            echo (strlen($string) > 20) ? substr($string,0,20).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Telefono']; 
            
                            echo (strlen($string) > 10) ? substr($string,0,10).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Email']; 
            
                            echo (strlen($string) > 30) ? substr($string,0,30).'...' : $string; 
                    ?></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay proveedores registrados todavía.":"No se encontro ningún proveedor en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//dar de alta a un proveedor

		public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD);

			// realizar la consulta
			$SQL = "CALL Proveedor_Alta(
						'$this->RFC',
						'$this->Nombre',
						'$this->Alias',
						'$this->Poblacion',
						'$this->Colonia',
						'$this->Calle',
						'$this->Numero',
						'$this->Telefono',
						'$this->Email'
					);";

			$Resultado = $Conexion->query($SQL);

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta un proveedor",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: proveedores.php?exito=Se guardo el Proveedor con exito');
			}else{
				header('Location: proveedores.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//listado de proveedores en un select

		public function ListadoSelect()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT IdProveedor, Alias FROM SIS_Listado_Proveedores;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0):?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdProveedor']; ?>' <?php echo ($this->IdProveedor == $Linea['IdProveedor'] ? "selected":""); ?>><?php echo $Linea['Alias']; ?></option>
			<?php endwhile;endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//actualizar a un proveedor

		public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Proveedor_Actualizar(
						'$this->IdProveedor',
						'$this->RFC',
						'$this->Nombre',
						'$this->Alias',
						'$this->Poblacion',
						'$this->Colonia',
						'$this->Calle',
						'$this->Numero',
						'$this->Telefono',
						'$this->Email',
						'$this->Estatus'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo un proveedor",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: proveedores.php?exito=Se guardo el Proveedor con exito');
			}else{
				header('Location: proveedores.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de un proveedor
        
        public function Obtener_Proveedor()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdProveedor, 
							RFC, 
							Nombre, 
							Alias,
							Poblacion, 
							Colonia,
							Calle,
							Numero,
							Telefono, 
							Email 
					FROM SIS_Listado_Proveedores
					WHERE IdProveedor = $this->IdProveedor;";

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