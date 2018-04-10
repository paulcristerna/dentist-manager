<?php class Administracion extends AccesoBD
	{
		public $IdAdministracion;
		public $IdDirector;
		public $IdSecretarioAdministrativo;
		public $IdSecretarioAcademico;
		public $FechaInicio;
		public $FechaFin;
		public $FolioEntradasMaterial;
		public $FolioSalidasMaterial;
		public $FolioSolicitudesMaterial;
		public $FolioDevolucionesMaterial;
		public $FolioCobrosCaja;
		public $Activo;
		public $Estatus;
		public $FechaRegistro;		

		public function __construct
		(
			$varIdAdministracion = '',
			$varIdDirector = '',
			$varIdSecretarioAdministrativo = '',
			$varIdSecretarioAcademico = '',
			$varFechaInicio = '',
			$varFechaFin = '',
			$varFolioEntradasMaterial = '',
			$varFolioSalidasMaterial = '',
			$varFolioSolicitudesMaterial = '',
			$varFolioDevolucionesMaterial = '',
			$varFolioCobrosCaja = '',
			$varActivo = '',
			$varEstatus = '',
			$varFechaRegistro = ''
		)
		{
			$this->IdAdministracion = $varIdAdministracion;
			$this->IdDirector = $varIdDirector;
			$this->IdSecretarioAdministrativo = $varIdSecretarioAdministrativo;
			$this->IdSecretarioAcademico = $varIdSecretarioAcademico;
			$this->FechaInicio = $varFechaInicio;
			$this->FechaFin = $varFechaFin;
			$this->FolioEntradasMaterial = $varFolioEntradasMaterial;
			$this->FolioSalidasMaterial = $varFolioSalidasMaterial;
			$this->FolioSolicitudesMaterial = $varFolioSolicitudesMaterial;
			$this->FolioDevolucionesMaterial = $varFolioDevolucionesMaterial;
			$this->FolioCobrosCaja = $varFolioCobrosCaja;
			$this->Activo = $varActivo;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de administraciones

		public function Catalogo_Administracion($Buscar = null)
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			if($Buscar == null):
				$SQL = "SELECT  IdAdministracion,
								NombreDirector,
								ApellidoPaternoDirector,
								ApellidoMaternoDirector,
								NombreSecretarioAdministrativo,
								ApellidoPaternoSecretarioAdministrativo,
								ApellidoMaternoSecretarioAdministrativo,
								NombreSecretarioAcademico,
								ApellidoPaternoSecretarioAcademico,
								ApellidoMaternoSecretarioAcademico,
								FechaInicio,
								FechaFin,
								Activo
						FROM SIS_Listado_Administraciones;";	
			else:
				$SQL = "SELECT  IdAdministracion,
								NombreDirector,
								ApellidoPaternoDirector,
								ApellidoMaternoDirector,
								NombreSecretarioAdministrativo,
								ApellidoPaternoSecretarioAdministrativo,
								ApellidoMaternoSecretarioAdministrativo,
								NombreSecretarioAcademico,
								ApellidoPaternoSecretarioAcademico,
								ApellidoMaternoSecretarioAcademico,
								FechaInicio,
								FechaFin,
								Activo
						FROM SIS_Listado_Administraciones
						WHERE NombreDirector LIKE '%$Buscar%' OR 
						NombreSecretarioAdministrativo LIKE '%$Buscar%' OR
						NombreSecretarioAcademico LIKE '%$Buscar%' OR
						FechaInicio LIKE '%$Buscar%' OR
						FechaFin LIKE '%$Buscar%' OR
						FolioEntradasMaterial LIKE '%$Buscar%' OR
						FolioSalidasMaterial LIKE '%$Buscar%' OR
						FolioSolicitudesMaterial LIKE '%$Buscar%' OR
						FolioDevolucionesMaterial LIKE '%$Buscar%'";
			endif;		

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['NombreDirector'].' '.$Linea['ApellidoPaternoDirector'].' '.$Linea['ApellidoMaternoDirector']; ?></td>
					<td><?php echo $Linea['NombreSecretarioAdministrativo'].' '.$Linea['ApellidoPaternoSecretarioAdministrativo'].' '.$Linea['ApellidoMaternoSecretarioAdministrativo']; ?></td>
					<td><?php echo $Linea['NombreSecretarioAcademico'].' '.$Linea['ApellidoPaternoSecretarioAcademico'].' '.$Linea['ApellidoMaternoSecretarioAcademico']; ?></td>
					<td>
						<?php
							$date = new DateTime($Linea['FechaInicio']);
        					$FechaInicio = $date->format('Y');
	 
							$date = new DateTime($Linea['FechaFin']);
        					$FechaFin = $date->format('Y');
							
							echo $FechaInicio.'-'.$FechaFin; 
						?>
					</td>
					<td><?php echo ($Linea['Activo'] == 1 ? "Activo":"Inactivo"); ?></td>
                    <?php if($Linea['Activo'] == 1): ?>
					<td><a href="administracion-editar.php?administracion=<?php echo $Linea['IdAdministracion']; ?>" class='btn btn-institucional'>Editar</a></td>
                    <?php else: ?>
                    <td><a href="administracion-detalle.php?administracion=<?php echo $Linea['IdAdministracion']; ?>" class='btn btn-institucional'>Ver Detalle</a></td>
                    <?php endif; ?>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="6"><?php echo ($Buscar == null ? "No hay administraciones registradas todavía.":"No se encontro ninguna administración en la busqueda."); ?></td>
				</tr>
			<?php endif;		

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//listado de administraciones en select
        
        public function ListadoSelect($Administracion = null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
            $SQL = "SELECT  IdAdministracion,
                            FechaInicio,
                            FechaFin
                    FROM SIS_Listado_Administraciones;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
            
			<?php while($Linea = mysqli_fetch_array($Resultado)):
                $FechaInicio = date_create($Linea['FechaInicio']);
                $FechaInicio = date_format($FechaInicio,'Y-m-d');

                $FechaFin = date_create($Linea['FechaFin']);
                $FechaFin = date_format($FechaFin,'Y-m-d'); ?>
				<option value="<?php echo $Linea['IdAdministracion']."|".$FechaInicio."|".$FechaFin; ?>" 
                        <?php echo($Administracion==$Linea['IdAdministracion'] ? "selected":""); ?>>
                    <?php 
                        $FechaInicio = date_create($Linea['FechaInicio']);
                        $FechaInicio = date_format($FechaInicio,'Y');
            
                        $FechaFin = date_create($Linea['FechaFin']);
                        $FechaFin = date_format($FechaFin,'Y');
            
                        echo $FechaInicio.'-'.$FechaFin; 
                    ?>
                </option>
			<?php endwhile;	endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de administraciones en reporte
        
        public function Catalogo_Administracion_Reporte($Buscar = null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			if($Buscar == null):
				$SQL = "SELECT  IdAdministracion,
								NombreDirector,
								ApellidoPaternoDirector,
								ApellidoMaternoDirector,
								NombreSecretarioAdministrativo,
								ApellidoPaternoSecretarioAdministrativo,
								ApellidoMaternoSecretarioAdministrativo,
								NombreSecretarioAcademico,
								ApellidoPaternoSecretarioAcademico,
								ApellidoMaternoSecretarioAcademico,
								FechaInicio,
								FechaFin,
								Activo
						FROM SIS_Listado_Administraciones;";	
			else:
				$SQL = "SELECT  IdAdministracion,
								NombreDirector,
								ApellidoPaternoDirector,
								ApellidoMaternoDirector,
								NombreSecretarioAdministrativo,
								ApellidoPaternoSecretarioAdministrativo,
								ApellidoMaternoSecretarioAdministrativo,
								NombreSecretarioAcademico,
								ApellidoPaternoSecretarioAcademico,
								ApellidoMaternoSecretarioAcademico,
								FechaInicio,
								FechaFin,
								Activo
						FROM SIS_Listado_Administraciones
						WHERE NombreDirector LIKE '%$Buscar%' OR 
						NombreSecretarioAdministrativo LIKE '%$Buscar%' OR
						NombreSecretarioAcademico LIKE '%$Buscar%' OR
						FechaInicio LIKE '%$Buscar%' OR
						FechaFin LIKE '%$Buscar%' OR
						FolioEntradasMaterial LIKE '%$Buscar%' OR
						FolioSalidasMaterial LIKE '%$Buscar%' OR
						FolioSolicitudesMaterial LIKE '%$Buscar%' OR
						FolioDevolucionesMaterial LIKE '%$Buscar%'";
			endif;		

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php 
                            $string = $Linea['NombreDirector'].' '.
                                      $Linea['ApellidoPaternoDirector'].' '.
                                      $Linea['ApellidoMaternoDirector'];
            
                            echo (strlen($string) > 30) ? substr($string,0,30).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['NombreSecretarioAdministrativo'].' '.   
                                      $Linea['ApellidoPaternoSecretarioAdministrativo'].' '.
                                      $Linea['ApellidoMaternoSecretarioAdministrativo'];            
            
                            echo (strlen($string) > 30) ? substr($string,0,30).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['NombreSecretarioAcademico'].' '.
                                      $Linea['ApellidoPaternoSecretarioAcademico'].' '.
                                      $Linea['ApellidoMaternoSecretarioAcademico'];    
            
                            echo (strlen($string) > 30) ? substr($string,0,30).'...' : $string; 
                    ?></td>
					<td>
						<?php             
							$date = new DateTime($Linea['FechaInicio']);
        					$FechaInicio = $date->format('Y');
	 
							$date = new DateTime($Linea['FechaFin']);
        					$FechaFin = $date->format('Y');
							
							$string = $FechaInicio.'-'.$FechaFin; 
                            echo (strlen($string) > 10) ? substr($string,0,10).'...' : $string;
						?>
					</td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="4"><?php echo ($Buscar == null ? "No hay administraciones registradas todavía.":"No se encontro ninguna administración en la busqueda."); ?></td>
				</tr>
			<?php endif;		

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//alta de una administracion

		public function Alta_Administracion()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Administracion_Alta(
						 $this->IdDirector,
						 $this->IdSecretarioAdministrativo,
						 $this->IdSecretarioAcademico,
						'$this->FechaInicio',
						'$this->FechaFin',
						'$this->FolioEntradasMaterial',
						'$this->FolioSalidasMaterial',
						'$this->FolioSolicitudesMaterial',
						'$this->FolioDevolucionesMaterial',
						'$this->FolioCobrosCaja'
				);";
			
			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{          
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("guardo una administracion",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: administraciones.php?exito=Se guardo la Administracion con exito');
			}else{
				header('Location: administraciones.php?error=Ocurrio un Error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//actualizar una administracion

		public function Actualizar_Administracion()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "CALL Administracion_Actualizar(
						'$this->IdAdministracion',
						'$this->IdDirector',
						'$this->IdSecretarioAdministrativo',
						'$this->IdSecretarioAcademico',
						'$this->FechaInicio',
						'$this->FechaFin',
						'$this->FolioEntradasMaterial',
						'$this->FolioSalidasMaterial',
						'$this->FolioSolicitudesMaterial',
						'$this->FolioDevolucionesMaterial',
						'$this->FolioCobrosCaja',
						'$this->Activo'
				);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{         
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo una administracion",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: administraciones.php?exito=Se edito la administracion con exito');
			}else{
				header('Location: administraciones.php?error=Ocurrio un Error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de una administracion

		public function Obtener_Administracion()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "SELECT  IdAdministracion,
                            NombreDirector,
                            ApellidoPaternoDirector,
                            ApellidoMaternoDirector,
                            NombreSecretarioAdministrativo,
                            ApellidoPaternoSecretarioAdministrativo,
                            ApellidoMaternoSecretarioAdministrativo,
                            NombreSecretarioAcademico,
                            ApellidoPaternoSecretarioAcademico,
                            ApellidoMaternoSecretarioAcademico,
                            IdDirector,
                            IdSecretarioAdministrativo,
                            IdSecretarioAcademico,
                            FechaInicio,
                            FechaFin,
                            FolioEntradasMaterial,
                            FolioSalidasMaterial,
                            FolioSolicitudesMaterial,
                            FolioDevolucionesMaterial,
                            FolioCobrosCaja,
                            Activo
					FROM SIS_Listado_Administraciones
					WHERE IdAdministracion = $this->IdAdministracion;";

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
	
		//obtener los folios del sistema
        
        public function Obtener_Folios()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "SELECT  FolioEntradasMaterial,
							FolioSolicitudesMaterial,
							FolioSalidasMaterial,
							FolioDevolucionesMaterial,
							FolioCobrosCaja
					FROM SIS_Listado_Administraciones
                    WHERE Activo = 1;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			$Datos = null;

			if($Num_Filas>0):
			while($Linea = mysqli_fetch_array($Resultado)):
				$Datos = array(
					$Linea['FolioEntradasMaterial'],
					$Linea['FolioSolicitudesMaterial'],
					$Linea['FolioSalidasMaterial'],
					$Linea['FolioDevolucionesMaterial'],
					$Linea['FolioCobrosCaja']
				);
			endwhile;
            else:
                $Datos = array("0000000","0000000","0000000","0000000","0000000");
			endif;					

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);

			return $Datos;
		}
	}
?>