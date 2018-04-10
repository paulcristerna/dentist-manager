<?php class Comunidad extends AccesoBD
	{
		public $IdComunidad;
		public $Nombre;
		public $Poblacion;
		public $Colonia;
		public $Calle;
		public $Numero;
		public $IdAreas;
		public $IdDoctorComunitario;
		public $IdAlumnoTesorero;
		public $Semestre;
		public $Grupo;
		public $IdAsignacionComunidad;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdComunidad = null,
			$varNombre = null,
			$varPoblacion = null,
			$varColonia = null,
			$varCalle = null,
			$varNumero = null,
			$varIdAreas = null,
			$varIdDoctorComunitario = null,
			$varIdAlumnoTesorero = null,
			$varSemestre = null,
			$varGrupo = null,
			$varIdAsignacionComunidad = null,
			$varEstatus = null,
			$varFechaRegistro = null
		)
		{
			$this->IdComunidad = $varIdComunidad;
			$this->Nombre = $varNombre;
			$this->Poblacion = $varPoblacion;
			$this->Colonia = $varColonia;
			$this->Calle = $varCalle;
			$this->Numero = $varNumero;
			$this->IdAreas = $varIdAreas;
			$this->IdDoctorComunitario = $varIdDoctorComunitario;
			$this->IdAlumnoTesorero = $varIdAlumnoTesorero;
			$this->Semestre = $varSemestre;
			$this->Grupo = $varGrupo;
			$this->IdAsignacionComunidad = $varIdAsignacionComunidad; 
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}

		//catalogo de comunidades
	
		public function Catalogo_Comunidades($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
            // realizar la consulta            
            if($Buscar==null):			
                $SQL = "SELECT  IdComunidad,
                                Nombre,
                                Poblacion,
                                Colonia,
                                Calle,
                                Numero
                        FROM SIS_Listado_Comunidades;";
            else:
                $SQL = "SELECT  IdComunidad,
                                Nombre,
                                Poblacion,
                                Colonia,
                                Calle,
                                Numero
                        FROM SIS_Listado_Comunidades
                        WHERE Nombre LIKE '%$Buscar%' OR 
                        Poblacion LIKE '%$Buscar%' OR
                        Colonia LIKE '%$Buscar%' OR
                        Calle LIKE '%$Buscar%' OR
                        Numero LIKE '%$Buscar%'";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['Nombre']; ?></td>
					<td><?php echo $Linea['Poblacion']; ?></td>
					<td><?php echo $Linea['Colonia']; ?></td>
					<td><?php echo $Linea['Calle']; ?></td>
					<td><?php echo $Linea['Numero']; ?></td>
					<td><a href="comunidad-editar.php?comunidad=<?php echo $Linea['IdComunidad']; ?>" class='btn btn-institucional'>Editar</a></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="6"><?php echo ($Buscar==null ? "No hay comunidades registradas todavía.":"No se encontro ninguna comunidad en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de comunidades en los reportes
        
        public function Catalogo_Comunidades_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
            // realizar la consulta            
            if($Buscar==null):			
                $SQL = "SELECT  IdComunidad,
                                Nombre,
                                Poblacion,
                                Colonia,
                                Calle,
                                Numero
                        FROM SIS_Listado_Comunidades;";
            else:
                $SQL = "SELECT  IdComunidad,
                                Nombre,
                                Poblacion,
                                Colonia,
                                Calle,
                                Numero
                        FROM SIS_Listado_Comunidades
                        WHERE Nombre LIKE '%$Buscar%' OR 
                        Poblacion LIKE '%$Buscar%' OR
                        Colonia LIKE '%$Buscar%' OR
                        Calle LIKE '%$Buscar%' OR
                        Numero LIKE '%$Buscar%'";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
                    <td><?php 
                            $string = $Linea['Nombre'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Poblacion']; 
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Colonia']; 
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                    ?></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay comunidades registradas todavía.":"No se encontro ninguna comunidad en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//alta de una comunidad
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "CALL Comunidad_Alta(
						'$this->Nombre',
						'$this->Poblacion',
						'$this->Colonia',
						'$this->Calle',
						'$this->Numero',
						'$this->IdAreas'
					);";	
            
			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta una comunidad",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: comunidades.php?exito=Se guardo la Comunidad con exito');
			}else{
				header('Location: comunidades.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);		
		}
	
		//listado de comunidades en select

		public function ListadoSelect($Comunidad=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Comunidad!=null):
                $SQL = "SELECT  IdComunidad, 
                                CONCAT(Nombre,' ',Semestre,'-',Grupo) AS Nombre,
                                IdAsignacionComunidad
                        FROM SIS_Listado_Comunidades
                        WHERE IdComunidad = $Comunidad;";
            else:
                $SQL = "SELECT  IdComunidad, 
                                Nombre,
                                IdAsignacionComunidad
                        FROM SIS_Listado_Comunidades;";
	          endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado)): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdAsignacionComunidad']; ?>' <?php echo ($this->IdComunidad == $Linea['IdComunidad'] ? "selected":""); ?>><?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;
			endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);	
		}

		public function ListadoSelectAsigCom($IdAsigCom=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($IdAsigCom!=null):
                $SQL = "SELECT  IdComunidad, 
                                CONCAT(NombreComunidad,' ',Semestre,'-',Grupo) AS Nombre,
                                IdAsignacionComunidad
                        FROM SIS_Listado_Comunidades_Asignadas
                        WHERE IdAsignacionComunidad = $IdAsigCom;";
            else:
                $SQL = "SELECT  IdComunidad, 
                                CONCAT(NombreComunidad,' ',Semestre,'-',Grupo) AS Nombre,
                                IdAsignacionComunidad
                        FROM SIS_Listado_Comunidades_Asignadas;";
	          endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado)): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdComunidad']; ?>' <?php echo ($this->IdComunidad == $Linea['IdComunidad'] ? "selected":""); ?>><?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;
			endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);	
		}

		public function ListadoSelectAsigComDocCom($IdDoctorComunitario=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($IdAsigCom!=null):
                $SQL = "SELECT  IdComunidad, 
                                CONCAT(NombreComunidad,' ',Semestre,'-',Grupo) AS Nombre,
                                IdAsignacionComunidad,
                                IdDoctorComunitario
                        FROM SIS_Listado_Comunidades_Asignadas
                        WHERE IdDoctorComunitario = $IdDoctorComunitario;";
            else:
                $SQL = "SELECT  IdComunidad, 
                                CONCAT(NombreComunidad,' ',Semestre,'-',Grupo) AS Nombre,
                                IdAsignacionComunidad,
                                IdDoctorComunitario
                        FROM SIS_Listado_Comunidades_Asignadas;";
	          endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado)): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdComunidad']; ?>' <?php echo ($this->IdComunidad == $Linea['IdComunidad'] ? "selected":""); ?>><?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;
			endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);	
		}
	
		//catalogo de comunidades asignadas

		public function CatalogoComunidadesAsignadas($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):            
                $SQL = "SELECT  IdAsignacionComunidad,
                                IdComunidad,
                                IdDoctorComunitario,
                                IdAlumnoTesorero,
                                NombreComunidad, 
                                NombreDoctorComunitario, 
                                NombreAlumnoTesorero,
                                Semestre,
                                Grupo
                        FROM SIS_Listado_Comunidades_Asignadas;";            
            else:
                $SQL = "SELECT  IdAsignacionComunidad,
                                IdComunidad,
                                IdDoctorComunitario,
                                IdAlumnoTesorero,
                                NombreComunidad, 
                                NombreDoctorComunitario, 
                                NombreAlumnoTesorero,
                                Semestre,
                                Grupo
                        FROM SIS_Listado_Comunidades_Asignadas
                        WHERE NombreComunidad LIKE '%$Buscar%' OR
                        NombreDoctorComunitario LIKE '%$Buscar%' OR
                        NombreAlumnoTesorero LIKE '%$Buscar%' OR 
                        Semestre LIKE '%$Buscar%' OR 
                        Grupo LIKE '%$Buscar%';";  
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['NombreComunidad']; ?></td>
					<td><?php echo $Linea['NombreDoctorComunitario']; ?></td>
					<td><?php echo $Linea['NombreAlumnoTesorero']; ?></td>
					<td><?php echo $Linea['Semestre']; ?></td>
					<td><?php echo $Linea['Grupo']; ?></td>
					<td><a href="comunidad-asignar-editar.php?asignacion-comunidad=<?php echo $Linea['IdAsignacionComunidad']; ?>" class='btn btn-institucional'>Editar</a></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="6"><?php echo ($Buscar==null ? "No hay comunidades asignadas registradas todavía.":"No se encontro ninguna comunidad asignada en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de comunidades asignadas en reporte
        
        public function CatalogoComunidadesAsignadas_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):            
                $SQL = "SELECT  IdAsignacionComunidad,
                                IdComunidad,
                                IdDoctorComunitario,
                                IdAlumnoTesorero,
                                NombreComunidad, 
                                NombreDoctorComunitario, 
                                NombreAlumnoTesorero,
                                Semestre,
                                Grupo
                        FROM SIS_Listado_Comunidades_Asignadas;";            
            else:
                $SQL = "SELECT  IdAsignacionComunidad,
                                IdComunidad,
                                IdDoctorComunitario,
                                IdAlumnoTesorero,
                                NombreComunidad, 
                                NombreDoctorComunitario, 
                                NombreAlumnoTesorero,
                                Semestre,
                                Grupo
                        FROM SIS_Listado_Comunidades_Asignadas
                        WHERE NombreComunidad LIKE '%$Buscar%' OR
                        NombreDoctorComunitario LIKE '%$Buscar%' OR
                        NombreAlumnoTesorero LIKE '%$Buscar%' OR 
                        Semestre LIKE '%$Buscar%' OR 
                        Grupo LIKE '%$Buscar%';";  
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
                    <td><?php 
                            $string = $Linea['NombreComunidad']; 
            
                            echo (strlen($string) >= 30) ? substr($string,0,30).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['NombreDoctorComunitario']; 
            
                            echo (strlen($string) >= 30) ? substr($string,0,30).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['NombreAlumnoTesorero']; 
            
                            echo (strlen($string) >= 30) ? substr($string,0,30).'...' : $string; 
                    ?></td>
					<td><?php echo $Linea['Semestre']; ?></td>
					<td><?php echo $Linea['Grupo']; ?></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay comunidades asignadas registradas todavía.":"No se encontro ninguna comunidad asignada en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//dar de alta una asignacion de comunidad
        
		public function AsignacionComunidad_Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Asignacion_Comunidad_Alta(
						$this->IdComunidad,
						$this->IdDoctorComunitario,
						$this->IdAlumnoTesorero,
						$this->Semestre,
						$this->Grupo
					);";	

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("asigno una comunidad",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: comunidades-asignadas.php?exito=Se guardo la Asignación de Comunidad con exito');
			}else{
				header('Location: comunidades-asignadas.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);		
		}
	
		//actualizar una asignacion de comunidad
        
		public function AsignacionComunidad_Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "CALL Asignacion_Comunidad_Actualizar(
						$this->IdAsignacionComunidad,
						$this->IdComunidad,
						$this->IdDoctorComunitario,
						$this->IdAlumnoTesorero,
						$this->Semestre,
						$this->Grupo,
						$this->Estatus
					);";	

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo la asignacion de una comunidad",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: comunidades.php?exito=Se guardo la Asignación de Comunidad con exito');
			}else{
				header('Location: comunidades.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);		
		}
	
		//actualizar una comunidad

		public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Comunidad_Actualizar(
						'$this->IdComunidad',
						'$this->Nombre',
						'$this->Poblacion',
						'$this->Colonia',
						'$this->Calle',
						'$this->Numero',
						'$this->IdAreas',
						'$this->Estatus'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo una comunidad",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: comunidades.php?exito=Se edito la Comunidad con exito');
			}else{
				header('Location: comunidades.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);	
		}
	
		//obtener los datos de una comunidad
		
        public function Obtener_Comunidad()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdComunidad,
							Nombre,
							Poblacion,
							Colonia,
							Calle,
							Numero
					FROM SIS_Listado_Comunidades
					WHERE IdComunidad = $this->IdComunidad;";

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
	
		//obtener las areas de una comunidad

		public function Obtener_Areas_Comunidad()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdComunidad,IdArea
					FROM SIS_Listado_Areas_Comunidades
					WHERE IdComunidad = $this->IdComunidad;";

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
	
		//obtener los datos de una asignacion de comunidad

		public function Obtener_Asignacion_Comunidad()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdAsignacionComunidad,
							IdComunidad,
							IdDoctorComunitario,
							IdAlumnoTesorero,
							Semestre,
							Grupo
					FROM SIS_Listado_Comunidades_Asignadas
					WHERE IdAsignacionComunidad = $this->IdAsignacionComunidad;";

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