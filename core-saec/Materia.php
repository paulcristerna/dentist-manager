<?php class Materia extends AccesoBD
	{
		public $IdMateria;
		public $Nombre;
		public $Semestre;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdMateria = null,
		 	$varNombre = null,
		 	$varSemestre = null,
		 	$varEstatus = null,
		 	$varFechaRegistro = null
		)
		{
			$this->IdMateria = $varIdMateria;
			$this->Nombre = $varNombre;
			$this->Semestre = $varSemestre;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de materias

		public function Catalogo_Materias($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdMateria, 
                                Nombre, 
                                Semestre 
                        FROM SIS_Listado_Materias;";
            else:
                $SQL = "SELECT  IdMateria, 
                                Nombre, 
                                Semestre 
                        FROM SIS_Listado_Materias
                        WHERE Nombre LIKE '%$Buscar%' OR 
                        Semestre LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['Nombre']; ?></td>
						<td><?php echo $Linea['Semestre']; ?></td>
						<td><a href="materia-editar.php?materia=<?php echo $Linea['IdMateria']; ?>" class='btn btn-institucional'>Editar</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay materias registradas todavía.":"No se encontro ninguna materia en la busqueda."); ?></td>
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
			$SQL = "CALL Materia_Alta(
						'$this->Nombre',
						'$this->Semestre'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{  
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta una materia",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: materias.php?exito=Se guardo la materia con exito');
			}else{
                header('Location: materias.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de una materia
        
        public function Obtener_Materia()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdMateria, 
							Nombre, 
							Semestre
					FROM SIS_Listado_Materias
					WHERE IdMateria = $this->IdMateria;";

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
	
		//actualizar una materia
        
        public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Materia_Actualizar('$this->IdMateria','$this->Nombre','$this->Semestre','$this->Estatus');";
            
			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo una materia",3);
				$Bitacora->Entrada_Bitacora();
				
                //redirecionar
				header('Location: materias.php?exito=Se guardo el materia con exito');
			}else{
				header('Location: materias.php?error=Ocurrio un error. '.mysqli_error($Conexion));
				echo "No se pudo guardar.";
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de materias en reportes
        
        public function Catalogo_Materias_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdMateria, 
                                Nombre, 
                                Semestre 
                        FROM SIS_Listado_Materias;";
            else:
                $SQL = "SELECT  IdMateria, 
                                Nombre, 
                                Semestre 
                        FROM SIS_Listado_Materias
                        WHERE Nombre LIKE '%$Buscar%' OR 
                        Semestre LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php 
                            $string = $Linea['Nombre'];
            
                            echo (strlen($string) > 100) ? substr($string,0,100).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['Semestre'];
            
                            echo (strlen($string) > 2) ? substr($string,0,2).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar==null ? "No hay materias registradas todavía.":"No se encontro ninguna materia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//listado de materias por nombre en select
		
		public function ListadoSelectMateriasNombre()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "SELECT  IdMateria, 
                            Nombre, 
                            Semestre 
                    FROM SIS_Listado_Materias;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value="<?php echo $Linea['Nombre']; ?>" <?php echo ($this->IdMateria == $Linea['IdMateria'] ? "selected":""); ?>><?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;
			endif;	

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//listado de materias en select
        
        public function ListadoSelectMaterias()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "SELECT  IdMateria, 
                            Nombre, 
                            Semestre 
                    FROM SIS_Listado_Materias;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value="<?php echo $Linea['IdMateria']; ?>" <?php echo ($this->IdMateria == $Linea['IdMateria'] ? "selected":""); ?>><?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;
			endif;	

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}	
    }
?>