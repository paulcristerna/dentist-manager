<?php class Usuario extends AccesoBD
	{
		public $IdUsuario;
		public $NumeroCuentaEmpleado;
		public $Nombre;
		public $ApellidoPaterno;
		public $ApellidoMaterno;
		public $Sexo;
		public $FechaNacimiento;
		public $Poblacion;
		public $Colonia;
		public $Calle;
		public $Numero;
		public $Telefono;
		public $Email;
		public $Tipo;
		public $IdDepartamento;
		public $IdPuesto;
		public $Turno;
		public $Usuario;
		public $Contrasena;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdUsuario = null,
			$varNumeroCuentaEmpleado = null,
			$varNombre = null,
			$varApellidoPaterno = null,
			$varApellidoMaterno = null,
			$varSexo = null,
			$varFechaNacimiento = null,
			$varPoblacion = null,
			$varColonia = null,
			$varCalle = null,
			$varNumero = null,
			$varTelefono = null,
			$varEmail = null,
			$varTipo = null,
			$varIdDepartamento = null,
			$varIdPuesto = null,
			$varTurno = null,
			$varUsuario = null,
			$varContrasena = null,
			$varEstatus = null,
			$varFechaRegistro = null
		)
		{
			$this->IdUsuario = $varIdUsuario;
			$this->NumeroCuentaEmpleado = $varNumeroCuentaEmpleado;
			$this->Nombre = $varNombre;
			$this->ApellidoPaterno = $varApellidoPaterno;
			$this->ApellidoMaterno = $varApellidoMaterno;
			$this->Sexo = $varSexo;
			$this->FechaNacimiento = $varFechaNacimiento;
			$this->Poblacion = $varPoblacion;
			$this->Colonia = $varColonia;
			$this->Calle = $varCalle;
			$this->Numero = $varNumero;
			$this->Telefono = $varTelefono;
			$this->Email = $varEmail;
			$this->Tipo = $varTipo;
			$this->IdDepartamento = $varIdDepartamento;
			$this->IdPuesto = $varIdPuesto;
			$this->Turno = $varTurno;
			$this->Usuario = $varUsuario;
			$this->Contrasena = $varContrasena;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de usuarios

		public function Catalogo_Usuarios($Buscar = null)
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                NumeroCuentaEmpleado,
                                Nombre,
                                ApellidoPaterno,
                                ApellidoMaterno,
                                NombrePuesto
                        FROM SIS_Listado_Usuarios;";
            else:
                $SQL = "SELECT  IdUsuario,
                                NumeroCuentaEmpleado,
                                Nombre,
                                ApellidoPaterno,
                                ApellidoMaterno,
                                NombrePuesto
                        FROM SIS_Listado_Usuarios
                        WHERE NumeroCuentaEmpleado LIKE '%$Buscar%' OR
                        Nombre LIKE '%$Buscar%' OR
                        ApellidoPaterno LIKE '%$Buscar%' OR
                        ApellidoMaterno LIKE '%$Buscar%' OR
                        NombrePuesto LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['NumeroCuentaEmpleado']; ?></td>
					<td>
						<?php echo 
							$Linea['Nombre'].' '.
							$Linea['ApellidoPaterno'].' '.
							$Linea['ApellidoMaterno']; 
						?>
					</td>
					<td><?php echo $Linea['NombrePuesto']; ?></td>
					<td><a href="usuario-editar.php?usuario=<?php echo $Linea['IdUsuario'] ?>" class="btn btn-institucional">Editar</a></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="4"><?php echo ($Buscar==null ? "No hay usuarios registrados todavía.":"No se encontro ningún usuario en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de usuarios de reportes
        
        public function Catalogo_Usuarios_Reporte($Buscar = null)
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                NumeroCuentaEmpleado,
                                Nombre,
                                ApellidoPaterno,
                                ApellidoMaterno,
                                Tipo,
                                Usuario,
                                NombrePuesto
                        FROM SIS_Listado_Usuarios;";
            else:
                $SQL = "SELECT  IdUsuario,
                                NumeroCuentaEmpleado,
                                Nombre,
                                ApellidoPaterno,
                                ApellidoMaterno,
                                Tipo,
                                Usuario,
                                NombrePuesto
                        FROM SIS_Listado_Usuarios
                        WHERE NumeroCuentaEmpleado LIKE '%$Buscar%' OR
                        Nombre LIKE '%$Buscar%' OR
                        ApellidoPaterno LIKE '%$Buscar%' OR
                        ApellidoMaterno LIKE '%$Buscar%' OR
                        Usuario LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>  
                    <td><?php 
                            $string = $Linea['NumeroCuentaEmpleado'];
            
                            echo (strlen($string) > 10) ? substr($string,0,10).'...' : $string; 
                    ?></td>
					<td><?php 
                            $string = $Linea['Nombre'].' '.$Linea['ApellidoPaterno'].' '.$Linea['ApellidoMaterno'];  
            
                            echo (strlen($string) > 38) ? substr($string,0,38).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['NombrePuesto'];  
            
                            echo (strlen($string) > 38) ? substr($string,0,38).'...' : $string; 
                    ?></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay usuarios registrados todavía.":"No se encontro ningún usuario en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//dar de alta a un usuario

		public function Alta()
		{            
            //conectar a la base de datos
            $Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD)
            or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
            $SQL = "CALL Usuario_Alta(
                        '$this->NumeroCuentaEmpleado',
                        '$this->Nombre',
                        '$this->ApellidoPaterno',
                        '$this->ApellidoMaterno',
                        '$this->Sexo',
                        '$this->FechaNacimiento',
                        '$this->Poblacion',
                        '$this->Colonia',
                        '$this->Calle',
                        '$this->Numero',
                        '$this->Telefono',
                        '$this->Email',
                        '$this->Tipo',
                        '$this->IdDepartamento',
                        '$this->IdPuesto',
                        '$this->Turno',
                        '$this->Usuario',
                        '$this->Contrasena'
                    );";

            if($Conexion->query($SQL))
            {			
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta a un usuario",2);
				$Bitacora->Entrada_Bitacora();
				
				//redireaccionar
                header('Location: usuarios.php?exito=Se guardo el Usuario con exito');
            }else{
				//redireaccionar
                header('Location: usuarios.php?error=No se pudo guardar el Usuario. '.mysqli_error($Conexion));
            }

            // Cerrar la conexión
            mysqli_close($Conexion);
		}
	
		//listado de empleados por puesto en un select

		public function ListadoSelectEmpleadosPorNombrePuesto($Puesto = null)
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdUsuario, 
                            Nombre,
                            ApellidoPaterno,
                            ApellidoMaterno
                    FROM SIS_Listado_Usuarios
                    WHERE NombrePuesto = '$Puesto';";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value="<?php echo $Linea['IdUsuario']; ?>" <?php echo ($this->IdUsuario == $Linea['IdUsuario'] ? "selected":""); ?>>
					<?php echo $Linea['Nombre'].' '.$Linea['ApellidoPaterno'].' '.$Linea['ApellidoMaterno']; ?>
				</option>
			<?php endwhile;
			endif;	

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}	
	
		//actualizar a un usuario

		public function Actualizar()
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Usuario_Actualizar(
					'$this->IdUsuario',
					'$this->NumeroCuentaEmpleado',
					'$this->Nombre',
					'$this->ApellidoPaterno',
					'$this->ApellidoMaterno',
					'$this->Sexo',
					'$this->FechaNacimiento',
					'$this->Poblacion',
					'$this->Colonia',
					'$this->Calle',
					'$this->Numero',
					'$this->Telefono',
					'$this->Email',
					'$this->Tipo',
					'$this->IdDepartamento',
					'$this->IdPuesto',
					'$this->Turno',
					'$this->Usuario',
					'$this->Contrasena',
					'$this->Estatus'
					);";
			
			if($Conexion->query($SQL))
            {       
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo un usuario",2);
				$Bitacora->Entrada_Bitacora();
				
				//redireaccinar
                header('Location: usuarios.php?exito=Se guardo el Usuario con exito');
            }else{
				//redireaccionar
                header('Location: usuarios.php?error=No se pudo guardar el Usuario. '.mysqli_error($Conexion));
            }

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de un usuario

		public function Obtener_Usuario()
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysql_error());

			// realizar la consulta
			$SQL = "SELECT  IdUsuario,
							NumeroCuentaEmpleado,
							Nombre,
							ApellidoPaterno,
							ApellidoMaterno,
							Sexo,
							FechaNacimiento,
							Poblacion,
							Colonia,
							Calle,
							Numero,
							Telefono,
							Email,
							Tipo,
							IdDepartamento,
							IdPuesto,
							NombrePuesto,
							Turno,
							Usuario,
                            IdComunidad,
                            IdAsignacionComunidad
					FROM SIS_Listado_Usuarios
					WHERE IdUsuario = $this->IdUsuario;";

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
	
		//buscar el departamento o comunidad de un usuario
		
		public function Buscar_Departamento_Comunidad_Usuario()
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysql_error());

			// realizar la consulta
			$SQL = "CALL Buscar_Departamento_Comunidad_Usuario($this->IdUsuario);";

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
	
		//verificar si esta repetido un nombre de usuario
		
		public function Verificar_Usuario_Repetido()
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  Usuario
					FROM SIS_Listado_Usuarios
					WHERE Usuario = '$this->Usuario';";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);
			
			$Repetido = "El usuario esta disponible";
            
            if($Num_Filas>0):  
                $Repetido = '<p class="text-error">El usuario no esta disponible favor de cambiarlo.</p>
							<input type="hidden" id="nombre-usuario-repetido" value="1">';
            else:
                $Repetido = '<p class="text-success">El usuario esta disponible.</p>
							<input type="hidden" id="nombre-usuario-repetido" value="0">';
			endif;	

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
			
			return $Repetido;
		}
	
		//verificar un numero de cuenta de un empleado repetido
		
		public function Verificar_Num_Cuenta_Empleado_Repetido()
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  NumeroCuentaEmpleado
					FROM SIS_Listado_Usuarios
					WHERE NumeroCuentaEmpleado = '$this->NumeroCuentaEmpleado';";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);
			
			$Repetido = "El numero de cuenta/empleado no esta registrado";
            
            if($Num_Filas>0):  
                $Repetido = '<p class="text-error">El numero de cuenta/empleado ya esta registrado favor de cambiarlo.</p>
							<input type="hidden" id="numero-cuenta-empleado-campo-repetido" value="1">';
            else:
                $Repetido = '<p class="text-success">El numero de cuenta/empleado no esta registrado.</p>
							<input type="hidden" id="numero-cuenta-empleado-campo-repetido" value="0">';
			endif;	

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
			
			return $Repetido;
		}

		public function Obtener_Usuario_Puesto_Reporte($Puesto = "",$Departamento = "",$Comunidad = "")
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysql_error());

			// realizar la consulta
                        if($Departamento != ""){
			   $SQL = "SELECT  Nombre,
                                           ApellidoPaterno,
                                           ApellidoMaterno,
                                           NombrePuesto,
                                           IdDepartamento
				FROM SIS_Listado_Usuarios
				WHERE IdDepartamento = $Departamento 
                                AND NombrePuesto = '$Puesto';";
			}
			else
			{
			   $SQL = "SELECT  Nombre,
                                          ApellidoPaterno,
                                          ApellidoMaterno,
                                          NombrePuesto
				FROM SIS_Listado_Usuarios AS LisUs
                                INNER JOIN ADM_Asignacion_Comunidades AS AsigCom
                                ON AsigCom.IdComunidad = $Comunidad 
                                AND AsigCom.IdDoctorComunitario = LisUs.IdUsuario
                                OR AsigCom.IdAlumnoTesorero = LisUs.IdUsuario
				WHERE AsigCom.IdComunidad = $Comunidad 
                                AND NombrePuesto = '$Puesto';";
			}

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
	
		//envio de datos de ingreso al sistema al olvidar su usuario o contraseña
        
        public function Envio_Datos_Ingreso()
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  Email,
                            Usuario,
                            Contrasena
					FROM SIS_Listado_Usuarios
					WHERE Email = '$this->Email';";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);
            
			if($Num_Filas>0):  
			  $Linea = mysqli_fetch_array($Resultado);
			  $Para = $Linea['Email'];
			  $Titulo = "Envio de Datos de Ingreso al Sistema FOUAS.";
			  $Mensaje = "<html>
                            <head>
                                <meta charset='utf-8'>
                                <title>Envio de Datos de Ingreso al Sistema FOUAS:</title>
                            </head>
                            <body>
                                <h1>Datos de Ingreso al Sistema FOUAS:</h1>
                                <p>Usuario: ".$Linea['Usuario']."</p>
                                <p>Contraseña: ".$this->Desencriptar($Linea['Contrasena'],'F32_SAEC_FOUAS')."</p>
                            </body>
                            </html>";
            
			// Para enviar un correo
			$Cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$Cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			mail($Para, $Titulo, $Mensaje, $Cabeceras);
			header('Location: olvido_datos_ingreso.php?exito=Se enviaron los datos de ingreso al sistema a su correo: <strong>'.$Linea['Email'].'</strong>');
			else:
			  header('Location: olvido_datos_ingreso.php?error=No se pudo encontrar el correo electronico, favor de volverlo a escribir');
			endif;	

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//autenticar usuario al iniciar sesion

		public function Autenticar()
		{            
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Usuario_Autenticar('$this->Usuario', '$this->Contrasena');";
            
		    $Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0 || mysqli_fetch_array($Resultado) != null):
				while($Linea = mysqli_fetch_array($Resultado))
				{
                    //iniciar sesion
                    //session_start();
					$_SESSION['Usuario'] = $Linea['IdUsuario'];						
					
					//escribir en la bitacora
					include("Bitacora.php");
					$Bitacora = new Bitacora("inicio sesion en el sistema",1);
					$Bitacora->Entrada_Bitacora();
                    
					// echo $Linea['NombrePuesto'];
                    
                    //redireccionar a cada usuario
					switch($Linea['NombrePuesto'])
					{
						case 'Administrador':
							header('Location: administracion/administraciones.php');
						break;

						case 'Almacenista':
							header('Location: almacen/materiales.php');
						break;

						case 'Alumno Operador/Asistente':
							header('Location: clinica/formatoindicepreventivooperatoria.php');
						break;

						case 'Alumno Tesorero':
							header('Location: almacen/solicitudes-material.php');
						break;

						case 'Auditoria Interna':
							header('Location: reportes/estadisticas-salida.php');
						break;

						case 'Auxiliar De Encargado De Departamento':
							header('Location: almacen/solicitudes-material.php');
						break;

						case 'Auxiliar De Secretario Academico':
							header('Location: almacen/solicitudes-material.php');
						break;
						
						case 'Auxiliar De Secretario Administrativo':
							header('Location: almacen/autorizar-solicitudes.php');
						break;

						case 'Cajero':
							header('Location: caja/pacientes.php');
						break;

						case 'Consejo Tecnico':
							header('Location: reportes/estadisticas-salida.php');
						break;
						
						case 'Contador':
							header('Location: reportes/estadisticas-salida.php');
						break;

						case 'Coordinador De Comunidades':
							header('Location: almacen/autorizar-solicitudes.php');
						break;

						case 'Director':
							header('Location: reportes/estadisticas-salida.php');
						break;

						case 'Doctor Comunitario':
							header('Location: almacen/solicitudes-material.php');
						break;

						case 'Encargado De Departamento':
							header('Location: almacen/solicitudes-material.php');
						break;
						
						case 'Medico Titular':
							header('Location: clinica/asignacion-parejas-clinica.php');
						break;

						case 'Secretario Academico':
							header('Location: almacen/solicitudes-material.php');
						break;

						case 'Secretario Administrativo':
							header('Location: administracion/actualizar-precios.php');
						break;

						default: ?>
                            <div class='alert alert-danger'>No tiene permiso para ingresar al sistema</div>
						<?php break;
					}
				}
			else: ?>
				<div class='alert alert-danger'>Usuario y/o Contraseña Invalida.</div>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//cerrar sesion en el sistema

		public function CerrarSesion()
		{           
			session_start();

			if(isset($_SESSION['Usuario']))
			{                					
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("cerro sesion en el sistema",1);
				$Bitacora->Entrada_Bitacora();
				
                //destruir sesion                
				$_SESSION = array();
				session_destroy();
                
                //redireccionar
				header('Location: index.php');
			}else{
				echo "No se pudo cerrar sesion.";
			}
		}
	
		//encriptar contraseñas
		
		public function Encriptar($string, $key) {
           $result = '';
           for($i=0; $i<strlen($string); $i++) {
              $char = substr($string, $i, 1);
              $keychar = substr($key, ($i % strlen($key))-1, 1);
              $char = chr(ord($char)+ord($keychar));
              $result.=$char;
           }
           return base64_encode($result);
        }
	
		//desencriptar contraseñas

        public function Desencriptar($string, $key) {
           $result = '';
           $string = base64_decode($string);
           for($i=0; $i<strlen($string); $i++) {
              $char = substr($string, $i, 1);
              $keychar = substr($key, ($i % strlen($key))-1, 1);
              $char = chr(ord($char)-ord($keychar));
              $result.=$char;
           }
           return $result;
        }
	}
?>
