<?php class Departamento extends AccesoBD
	{
		public $IdDepartamento;
		public $Nombre;
		public $Poblacion;
		public $Colonia;
		public $Calle;
		public $Numero;
		public $Areas;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdDepartamento = null,
			$varNombre = null,
			$varPoblacion = null,
			$varColonia = null,
			$varCalle = null,
			$varNumero = null,
			$varAreas = null,
			$varEstatus = null,
			$varFechaRegistro = null
		)
		{
			$this->IdDepartamento = $varIdDepartamento;
			$this->Nombre = $varNombre;
			$this->Poblacion = $varPoblacion;
			$this->Colonia = $varColonia;
			$this->Calle = $varCalle;
			$this->Numero = $varNumero;
			$this->Areas = $varAreas;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de departamentos

		public function Catalogo_Departamentos($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
            // realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdDepartamento,
                                Nombre,
                                Poblacion,
                                Colonia
                        FROM SIS_Listado_Departamentos;";
            else:
                $SQL = "SELECT  IdDepartamento,
                                Nombre,
                                Poblacion,
                                Colonia
                        FROM SIS_Listado_Departamentos
                        WHERE Nombre LIKE '%$Buscar%' OR
                        Poblacion LIKE '%$Buscar%' OR
                        Colonia LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['Nombre']; ?></td>
					<td><?php echo $Linea['Colonia']; ?></td>
                                        <td><?php echo $Linea['Poblacion']; ?></td>
					<td><a href="departamento-editar.php?departamento=<?php echo $Linea['IdDepartamento']; ?>" class="btn btn-institucional">Editar</a></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="4"><?php echo ($Buscar=null ? "No hay departamentos registrados todavía.":"No se encontraron departamentos en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}	
	
		//catalogo de departamentos en reportes
        
        public function Catalogo_Departamentos_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
            // realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdDepartamento,
                                Nombre,
                                Poblacion,
                                Colonia
                        FROM SIS_Listado_Departamentos;";
            else:
                $SQL = "SELECT  IdDepartamento,
                                Nombre,
                                Poblacion,
                                Colonia
                        FROM SIS_Listado_Departamentos
                        WHERE Nombre LIKE '%$Buscar%' OR
                        Poblacion LIKE '%$Buscar%' OR
                        Colonia LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
                    <td><?php 
                            $string = $Linea['Nombre']; 
                            echo (strlen($string) > 45) ? substr($string,0,45).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Colonia']; 
                            echo (strlen($string) > 45) ? substr($string,0,45).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Poblacion']; 
                            echo (strlen($string) > 45) ? substr($string,0,45).'...' : $string; 
                    ?></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar=null ? "No hay departamentos registrados todavía.":"No se encontraron departamentos en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}	
	
		//dar de alta un departamento
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			echo $SQL = "CALL Departamento_Alta(
						'$this->Nombre', 
						'$this->Poblacion', 
						'$this->Colonia', 
						'$this->Calle',
						'$this->Numero',
						'$this->Areas'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta un departamento",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: departamentos.php?exito=Se guardo el Departamento con exito');
			}else{
				header('Location: departamentos.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//listado de departamentos en select

		public function ListadoSelect($Departamento=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Departamento!=null):
                $SQL = "SELECT  IdDepartamento, 
                                Nombre, 
                                Poblacion, 
                                Colonia, 
                                Calle, 
                                Numero 
                        FROM SIS_Listado_Departamentos
                        WHERE IdDepartamento = '$Departamento';";
            else:
                $SQL = "SELECT  IdDepartamento, 
                                Nombre, 
                                Poblacion, 
                                Colonia, 
                                Calle, 
                                Numero 
                        FROM SIS_Listado_Departamentos;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado)>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdDepartamento']; ?>' <?php echo ($this->IdDepartamento == $Linea['IdDepartamento'] ? "selected":""); ?>><?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;
			endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);	
		}

		public function ListadoSelectClinica($Departamento=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdDepartamento, 
                                Nombre, 
                                Poblacion, 
                                Colonia, 
                                Calle, 
                                Numero 
                        FROM SIS_Listado_Departamentos
                        WHERE Nombre LIKE '%Clinica%' 
                        OR Nombre LIKE '%Clínica%';";
       

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado)>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdDepartamento']; ?>' <?php echo ($this->IdDepartamento == $Linea['IdDepartamento'] ? "selected":""); ?>><?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;
			endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);	
		}
	
		//actualizar un departamento
        
		public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Departamento_Actualizar(
						'$this->IdDepartamento',
						'$this->Nombre', 
					 	'$this->Poblacion', 
					 	'$this->Colonia', 
					 	'$this->Calle',
					 	'$this->Numero',
					 	'$this->Areas',
					 	'$this->Estatus'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo un departamento",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: departamentos.php?exito=Se edito el Departamento con exito');
			}else{
				header('Location: departamentos.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de un departamento

		public function Obtener_Departamento()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdDepartamento,
							Nombre,
							Poblacion,
							Colonia,
							Calle,
							Numero
					FROM SIS_Listado_Departamentos
					WHERE IdDepartamento = $this->IdDepartamento;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			$Datos = null;

			if($Num_Filas>0):
			$Datos = mysqli_fetch_array($Resultado, MYSQL_ASSOC);
			endif;					

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);

			return $Datos;
		}
	
		//obtener las areas de un departamento

		public function Obtener_Areas_Departamento()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdArea
					FROM SIS_Listado_Areas_Departamentos
					WHERE IdDepartamento = $this->IdDepartamento;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			$Datos = null;
			$i=0;

			if($Num_Filas>0):
			while($Linea = mysqli_fetch_array($Resultado)):
				$Datos[$i] = $Linea['IdArea'];
				$i++;
			endwhile; 
			endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);

			return $Datos;
		}
	}
?>
