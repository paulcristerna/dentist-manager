<?php class Paciente extends AccesoBD
    {        
        public $IdPaciente;
        public $Nombre;
        public $ApellidoPaterno;
        public $ApellidoMaterno;
        public $Sexo;
        public $FechaNacimiento;
        public $Calle;
        public $Numero;
        public $Colonia;
        public $Poblacion;
        public $Telefono;
        public $Email;
        public $Ocupacion;
	public $LugarNacimiento;
	public $CodigoPostal;
	public $EstadoCivil;
	public $Escolaridad;
	public $Escuela;
	public $GradoEscolar;
	public $NumHermanos;
	public $NombrePadre;
	public $OcupacionPadre;
	public $TelefonoPadre;
	public $NombreMedico;
        public $Estatura;
        public $Peso;
        public $Estatus;
        public $FechaRegistro;
        
        public function __construct
		(
			$varIdPaciente = null,
		 	$varNombre = null,
		 	$varApellidoPaterno = null,
		 	$varApellidoMaterno = null,
		 	$varSexo = null,
		 	$varFechaNacimiento = null,
		 	$varCalle = null,
		 	$varNumero = null,
		 	$varColonia = null,
		 	$varPoblacion = null,
		 	$varTelefono = null,
		 	$varEmail = null,
		 	$varOcupacion = null,
			$varLugarNacimiento = null,
			$varCodigoPostal = null,
			$varEstadoCivil = null,
			$varEscolaridad = null,
			$varEscuela = null,
			$varGradoEscolar = null,
			$varNumHermanos = null,
			$varNombrePadre = null,
			$varOcupacionPadre = null,
			$varTelefonoPadre = null,
			$varNombreMedico = null,
		 	$varEstatura = null,
		 	$varPeso = null,
		 	$varEstatus = null,
		 	$varFechaRegistro = null
		)
		{
		        $this->IdPaciente = $varIdPaciente;
		 	$this->Nombre = $varNombre;
		 	$this->ApellidoPaterno = $varApellidoPaterno;
		 	$this->ApellidoMaterno = $varApellidoMaterno;
		 	$this->Sexo = $varSexo;
		 	$this->FechaNacimiento = $varFechaNacimiento;
		 	$this->Calle = $varCalle;
		 	$this->Numero = $varNumero;
		 	$this->Colonia = $varColonia;
		 	$this->Poblacion = $varPoblacion;
		 	$this->Telefono = $varTelefono;
		 	$this->Email = $varEmail;
		 	$this->Ocupacion = $varOcupacion;
			$this->LugarNacimiento = $varLugarNacimiento;
			$this->CodigoPostal = $varCodigoPostal;
			$this->EstadoCivil = $varEstadoCivil;
			$this->Escolaridad = $varEscolaridad;
			$this->Escuela = $varEscuela;
			$this->GradoEscolar = $varGradoEscolar;
			$this->NumHermanos = $varNumHermanos;
			$this->NombrePadre = $varNombrePadre;
			$this->OcupacionPadre = $varOcupacionPadre;
			$this->TelefonoPadre = $varTelefonoPadre;
			$this->NombreMedico = $varNombreMedico;
		 	$this->Estatura = $varEstatura;
		 	$this->Peso = $varPeso;
		 	$this->Estatus = $varEstatus;
		 	$this->FechaRegistro = $varFechaRegistro;
		}    
	
		//catalogo de pacientes
        
        public function Catalogo_Pacientes($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdPaciente,
                                Nombre,
                                ApellidoPaterno,
                                ApellidoMaterno,
                                Sexo,
                                FechaNacimiento,
                                Calle,
                                Numero,
                                Colonia,
                                Poblacion,
                                Telefono,
                                Email,
                                Ocupacion,
                                Estatura,
                                Peso
                        FROM SIS_Listado_Pacientes;";
            else:
                $SQL = "SELECT  IdPaciente,
                                Nombre,
                                ApellidoPaterno,
                                ApellidoMaterno,
                                Sexo,
                                FechaNacimiento,
                                Calle,
                                Numero,
                                Colonia,
                                Poblacion,
                                Telefono,
                                Email,
                                Ocupacion,
                                Estatura,
                                Peso
                        FROM SIS_Listado_Pacientes
                        WHERE Nombre LIKE '%$Buscar%' OR
                        ApellidoPaterno LIKE '%$Buscar%' OR
                        ApellidoMaterno LIKE '%$Buscar%' OR
                        Sexo LIKE '%$Buscar%' OR
                        FechaNacimiento LIKE '%$Buscar%' OR
                        Calle LIKE '%$Buscar%' OR
                        Numero LIKE '%$Buscar%' OR
                        Colonia LIKE '%$Buscar%' OR
                        Poblacion LIKE '%$Buscar%' OR
                        Telefono LIKE '%$Buscar%' OR
                        Email LIKE '%$Buscar%' OR
                        Ocupacion LIKE '%$Buscar%' OR
                        Estatura LIKE '%$Buscar%' OR
                        Peso LIKE'%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['Nombre'].' '.$Linea['ApellidoPaterno'].' '.$Linea['ApellidoMaterno']; ?></td>
                        <td><?php echo $Linea['Sexo']; ?></td>
						<td><a href="paciente-editar.php?paciente=<?php echo $Linea['IdPaciente']; ?>" class='btn btn-institucional'>Editar</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay pacientes registrados todavía.":"No se encontro ningún paciente en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de pacientes en reportes
        
        public function Catalogo_Pacientes_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdPaciente,
                                Nombre,
                                ApellidoPaterno,
                                ApellidoMaterno,
                                Sexo,
                                FechaNacimiento,
                                Calle,
                                Numero,
                                Colonia,
                                Poblacion,
                                Telefono,
                                Email,
                                Ocupacion,
                                Estatura,
                                Peso
                        FROM SIS_Listado_Pacientes;";
            else:
                $SQL = "SELECT  IdPaciente,
                                Nombre,
                                ApellidoPaterno,
                                ApellidoMaterno,
                                Sexo,
                                FechaNacimiento,
                                Calle,
                                Numero,
                                Colonia,
                                Poblacion,
                                Telefono,
                                Email,
                                Ocupacion,
                                Estatura,
                                Peso
                        FROM SIS_Listado_Pacientes
                        WHERE Nombre LIKE '%$Buscar%' OR
                        ApellidoPaterno LIKE '%$Buscar%' OR
                        ApellidoMaterno LIKE '%$Buscar%' OR
                        Sexo LIKE '%$Buscar%' OR
                        FechaNacimiento LIKE '%$Buscar%' OR
                        Calle LIKE '%$Buscar%' OR
                        Numero LIKE '%$Buscar%' OR
                        Colonia LIKE '%$Buscar%' OR
                        Poblacion LIKE '%$Buscar%' OR
                        Telefono LIKE '%$Buscar%' OR
                        Email LIKE '%$Buscar%' OR
                        Ocupacion LIKE '%$Buscar%' OR
                        Estatura LIKE '%$Buscar%' OR
                        Peso LIKE'%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php 
                            $string = $Linea['Nombre'].' '.$Linea['ApellidoPaterno'].' '.$Linea['ApellidoMaterno']; 
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['Sexo']; 
            
                            echo (strlen($string) > 1) ? substr($string,0,1).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $date = new DateTime($Linea['FechaNacimiento']);
        					$FechaNacimiento = $date->format('d-m-Y');
            
                            $string = $FechaNacimiento; 
            
                            echo (strlen($string) > 10) ? substr($string,0,10).'...' : $string; 
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
					<td colspan="3"><?php echo ($Buscar==null ? "No hay pacientes registrados todavía.":"No se encontro ningún paciente en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//dar de alta un paciente
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Paciente_Alta(
			'$this->Nombre',
                        '$this->ApellidoPaterno',
                        '$this->ApellidoMaterno',
                        '$this->Sexo',
                        '$this->FechaNacimiento',
                        '$this->Calle',
                        '$this->Numero',
                        '$this->Colonia',
                        '$this->Poblacion',
                        '$this->Telefono',
                        '$this->Email',
                        '$this->Ocupacion',
                        '$this->LugarNacimiento',
			'$this->CodigoPostal',
			'$this->EstadoCivil',
			'$this->Escolaridad'
			);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{    
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta un paciente",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: pacientes.php?exito=Se guardo el paciente con exito');
			}else{
                header('Location: pacientes.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
        
		//obtener los datos de un paciente
	
        public function Obtener_Paciente()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "SELECT  IdPaciente,
                                Nombre,
                                ApellidoPaterno,
                                ApellidoMaterno,
                                Sexo,
                                FechaNacimiento,
                                Calle,
                                Numero,
                                Colonia,
                                Poblacion,
                                Telefono,
                                Email,
                                Ocupacion,
                                Estatura,
                                Peso,
                                LugarNacimiento,
                                CodigoPostal,
                                Escuela,
		                GradoEscolar,
		                NumHermanos,
		                NombrePadre,
		                OcupacionPadre,
		                TelefonoPadre,
		                NombreMedico,
		                EstadoCivil,
                        Escolaridad,
                        Estatus
                        FROM SIS_Listado_Pacientes
					    WHERE IdPaciente = $this->IdPaciente;";

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
	
		//actualizar un paciente
        
        public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Paciente_Actualizar(
                        '$this->IdPaciente',
						'$this->Nombre',
                        '$this->ApellidoPaterno',
                        '$this->ApellidoMaterno',
                        '$this->Sexo',
                        '$this->FechaNacimiento',
                        '$this->Calle',
                        '$this->Numero',
                        '$this->Colonia',
                        '$this->Poblacion',
                        '$this->Telefono',
                        '$this->Email',
                        '$this->Ocupacion',
                        '$this->LugarNacimiento',
			'$this->CodigoPostal',
			'$this->EstadoCivil',
			'$this->Escolaridad',
                        '$this->Estatus'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{    
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo un paciente",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: pacientes.php?exito=Se edito el paciente con exito');
			}else{
                header('Location: pacientes.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//listado de pacientes en select
        
        public function ListadoSelect()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT IdPaciente, Nombre, ApellidoPaterno, ApellidoMaterno FROM SIS_Listado_Pacientes;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0):?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdPaciente']; ?>' <?php echo ($this->IdPaciente == $Linea['IdPaciente'] ? "selected":""); ?>><?php echo $Linea['Nombre'].' '.$Linea['ApellidoPaterno'].' '.$Linea['ApellidoMaterno']; ?></option>
			<?php endwhile;endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>