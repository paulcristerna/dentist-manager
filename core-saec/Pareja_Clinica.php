<?php class Pareja_Clinica extends AccesoBD
	{
		public $IdParejaClinica;
		public $IdDepartamento;
		public $IdComunidad;
		public $IdMedicoTitular;
		public $IdAlumnoOpsAs1;
		public $IdAlumnoOpsAs2;
		public $IdMateria;
		public $Grupo;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdParejaClinica = null,
			$varIdDepartamento = null,
			$varIdComunidad = null,
		 	$varIdMedicoTitular = null,
		 	$varIdAlumnoOpsAs1 = null,
		 	$varIdAlumnoOpsAs2 = null,
		 	$varIdMateria = null,
		 	$varGrupo = null,
		 	$varEstatus = null,
		 	$varFechaRegistro = null
		)
		{
			$this->IdParejaClinica = $varIdParejaClinica;
			$this->IdDepartamento = $varIdDepartamento;
			$this->IdComunidad = $varIdComunidad;
			$this->IdMedicoTitular = $varIdMedicoTitular;
			$this->IdAlumnoOpsAs1 = $varIdAlumnoOpsAs1;
			$this->IdAlumnoOpsAs2 = $varIdAlumnoOpsAs2;
			$this->IdMateria = $varIdMateria;
			$this->Grupo = $varGrupo;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//listado de parejas clinicas

		public function Catalogo_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdParejaClinica,
                                IdDepartamento,
                                NombreDepartamento,
                                IdComunidad,
                                NombreComunidad,
                                IdMedicoTitular,
                                IdAlumnoOpAs1,
                                IdAlumnoOpAs2,
                                IdMateria,
                                Grupo,
                                NombreMedicoTitular,
                                ApellidoPaternoMedicoTitular,
                                ApellidoMaternoMedicoTitular,
                                NombreAlumnoOpAs1,
                                ApellidoPaternoAlumnoOpAs1,
                                ApellidoMaternoAlumnoOpAs1,
                                NombreAlumnoOpAs2,
                                ApellidoPaternoAlumnoOpAs2,
                                ApellidoMaternoAlumnoOpAs2,
                                NombreMateria
                        FROM SIS_Listado_Parejas_Clinica;";
            else:
                $SQL = "SELECT  IdParejaClinica,
                                IdDepartamento,
                                NombreDepartamento,
                                IdComunidad,
                                NombreComunidad
                                IdMedicoTitular,
                                IdAlumnoOpAs1,
                                IdAlumnoOpAs2,
                                IdMateria,
                                Grupo,
                                NombreMedicoTitular,
                                ApellidoPaternoMedicoTitular,
                                ApellidoMaternoMedicoTitular,
                                NombreAlumnoOpAs1,
                                ApellidoPaternoAlumnoOpAs1,
                                ApellidoMaternoAlumnoOpAs1,
                                NombreAlumnoOpAs2,
                                ApellidoPaternoAlumnoOpAs2,
                                ApellidoMaternoAlumnoOpAs2,
                                NombreMateria
                        FROM SIS_Listado_Parejas_Clinica
                        WHERE   NombreDepartamento LIKE '%$Buscar%' OR 
                                NombreComunidad LIKE '%$Buscar%' OR 
                                Grupo LIKE '%$Buscar%' OR 
                                NombreMedicoTitular LIKE '%$Buscar%' OR 
                                ApellidoPaternoMedicoTitular LIKE '%$Buscar%' OR 
                                ApellidoMaternoMedicoTitular LIKE '%$Buscar%' OR 
                                NombreAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                ApellidoPaternoAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                ApellidoMaternoAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                NombreAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                ApellidoPaternoAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                NombreMateria LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php echo ($Linea['NombreDepartamento'] != '' ? $Linea['NombreDepartamento']:$Linea['NombreComunidad']); ?></td>
						<td><?php echo $Linea['NombreMedicoTitular'].' '.$Linea['ApellidoPaternoMedicoTitular'].' '.$Linea['ApellidoMaternoMedicoTitular']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoMaternoAlumnoOpAs1'].' y  '.$Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoMaternoAlumnoOpAs2']; ?></td>
                        <td><?php echo $Linea['NombreMateria']; ?></td>
						<td><a href="asignacion-parejas-clinica-editar.php?pareja-clinica=<?php echo $Linea['IdParejaClinica']; ?>" class='btn btn-institucional'>Editar</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay parejas clinicas registradas todavía.":"No se encontro ninguna pareja clinica en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    
        public function Catalogo($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdParejaClinica,
                                IdDepartamento,
                                NombreDepartamento,
                                IdComunidad,
                                NombreComunidad,
                                IdMedicoTitular,
                                IdAlumnoOpAs1,
                                IdAlumnoOpAs2,
                                IdMateria,
                                Grupo,
                                NombreMedicoTitular,
                                ApellidoPaternoMedicoTitular,
                                ApellidoMaternoMedicoTitular,
                                NombreAlumnoOpAs1,
                                ApellidoPaternoAlumnoOpAs1,
                                ApellidoMaternoAlumnoOpAs1,
                                NombreAlumnoOpAs2,
                                ApellidoPaternoAlumnoOpAs2,
                                ApellidoMaternoAlumnoOpAs2,
                                NombreMateria
                        FROM SIS_Listado_Parejas_Clinica
                        WHERE IdMedicoTitular = $this->IdMedicoTitular;";
            else:
                $SQL = "SELECT  IdParejaClinica,
                                IdDepartamento,
                                NombreDepartamento,
                                IdComunidad,
                                NombreComunidad
                                IdMedicoTitular,
                                IdAlumnoOpAs1,
                                IdAlumnoOpAs2,
                                IdMateria,
                                Grupo,
                                NombreMedicoTitular,
                                ApellidoPaternoMedicoTitular,
                                ApellidoMaternoMedicoTitular,
                                NombreAlumnoOpAs1,
                                ApellidoPaternoAlumnoOpAs1,
                                ApellidoMaternoAlumnoOpAs1,
                                NombreAlumnoOpAs2,
                                ApellidoPaternoAlumnoOpAs2,
                                ApellidoMaternoAlumnoOpAs2,
                                NombreMateria
                        FROM SIS_Listado_Parejas_Clinica
                        WHERE   IdMedicoTitular = $this->IdMedicoTitular AND 
                                NombreDepartamento LIKE '%$Buscar%' OR 
                                NombreComunidad LIKE '%$Buscar%' OR 
                                Grupo LIKE '%$Buscar%' OR 
                                NombreMedicoTitular LIKE '%$Buscar%' OR 
                                ApellidoPaternoMedicoTitular LIKE '%$Buscar%' OR 
                                ApellidoMaternoMedicoTitular LIKE '%$Buscar%' OR 
                                NombreAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                ApellidoPaternoAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                ApellidoMaternoAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                NombreAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                ApellidoPaternoAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                NombreMateria LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php echo ($Linea['NombreDepartamento'] != '' ? $Linea['NombreDepartamento']:$Linea['NombreComunidad']); ?></td>
						<td><?php echo $Linea['NombreMedicoTitular'].' '.$Linea['ApellidoPaternoMedicoTitular'].' '.$Linea['ApellidoMaternoMedicoTitular']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoMaternoAlumnoOpAs1'].' y  '.$Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoMaternoAlumnoOpAs2']; ?></td>
                        <td><?php echo $Linea['NombreMateria']; ?></td>
						<td><a href="asignacion-parejas-clinica-editar.php?pareja-clinica=<?php echo $Linea['IdParejaClinica']; ?>" class='btn btn-institucional'>Editar</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay parejas clinicas registradas todavía.":"No se encontro ninguna pareja clinica en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//dar de alta a una pareja clinica
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Asignacion_Pareja_Clinica_Alta(
                        '$this->IdDepartamento',
                        '$this->IdComunidad',
                        '$this->IdMedicoTitular',
                        '$this->IdAlumnoOpsAs1',
                        '$this->IdAlumnoOpsAs2',
                        '$this->IdMateria',
                        '$this->Grupo'
					);";
            
            //echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{     
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta una pareja clinica",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: asignacion-parejas-clinica.php?exito=Se guardo la asignacion de pareja clinica con exito');
			}else{
                header('Location: asignacion-parejas-clinica.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de una pareja clinica
        
        public function Obtener_Pareja_Clinica()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdParejaClinica,
                            IdDepartamento,
                            IdComunidad,
                            IdMedicoTitular,
                            IdAlumnoOpAs1,
                            IdAlumnoOpAs2,
                            IdMateria,
                            Grupo
                    FROM SIS_Listado_Parejas_Clinica;";

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
	
		//actualizar una pareja clinica
        
        public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Asignacion_Pareja_Clinica_Actualizar(
                        '$this->IdParejaClinica',
                        '$this->IdDepartamento',
                        '$this->IdComunidad',
                        '$this->IdMedicoTitular',
                        '$this->IdAlumnoOpsAs1',
                        '$this->IdAlumnoOpsAs2',
                        '$this->IdMateria',
                        '$this->Grupo',
                        '$this->Estatus'
					);";
            
            //echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{       
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo una pareja clinica",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: asignacion-parejas-clinica.php?exito=Se guardo la asignacion de pareja clinica con exito');
			}else{
                header('Location: asignacion-parejas-clinica.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de parejas clinicas en reportes
        
        public function Catalogo_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdParejaClinica,
                                IdDepartamento,
                                NombreDepartamento,
                                IdComunidad,
                                NombreComunidad,
                                IdMedicoTitular,
                                IdAlumnoOpAs1,
                                IdAlumnoOpAs2,
                                IdMateria,
                                Grupo,
                                NombreMedicoTitular,
                                ApellidoPaternoMedicoTitular,
                                ApellidoMaternoMedicoTitular,
                                NombreAlumnoOpAs1,
                                ApellidoPaternoAlumnoOpAs1,
                                ApellidoMaternoAlumnoOpAs1,
                                NombreAlumnoOpAs2,
                                ApellidoPaternoAlumnoOpAs2,
                                ApellidoMaternoAlumnoOpAs2,
                                NombreMateria
                        FROM SIS_Listado_Parejas_Clinica
                        WHERE IdMedicoTitular = $this->IdMedicoTitular;";
            else:
                $SQL = "SELECT  IdParejaClinica,
                                IdDepartamento,
                                NombreDepartamento,
                                IdComunidad,
                                NombreComunidad
                                IdMedicoTitular,
                                IdAlumnoOpAs1,
                                IdAlumnoOpAs2,
                                IdMateria,
                                Grupo,
                                NombreMedicoTitular,
                                ApellidoPaternoMedicoTitular,
                                ApellidoMaternoMedicoTitular,
                                NombreAlumnoOpAs1,
                                ApellidoPaternoAlumnoOpAs1,
                                ApellidoMaternoAlumnoOpAs1,
                                NombreAlumnoOpAs2,
                                ApellidoPaternoAlumnoOpAs2,
                                ApellidoMaternoAlumnoOpAs2,
                                NombreMateria
                        FROM SIS_Listado_Parejas_Clinica
                        WHERE   IdMedicoTitular = $this->IdMedicoTitular AND 
                                NombreDepartamento LIKE '%$Buscar%' OR 
                                NombreComunidad LIKE '%$Buscar%' OR 
                                Grupo LIKE '%$Buscar%' OR 
                                NombreMedicoTitular LIKE '%$Buscar%' OR 
                                ApellidoPaternoMedicoTitular LIKE '%$Buscar%' OR 
                                ApellidoMaternoMedicoTitular LIKE '%$Buscar%' OR 
                                NombreAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                ApellidoPaternoAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                ApellidoMaternoAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                NombreAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                ApellidoPaternoAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                NombreMateria LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php echo ($Linea['NombreDepartamento'] != '' ? $Linea['NombreDepartamento']:$Linea['NombreComunidad']); ?></td>
						<td><?php echo $Linea['NombreMedicoTitular'].' '.$Linea['ApellidoPaternoMedicoTitular'].' '.$Linea['ApellidoMaternoMedicoTitular']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoMaternoAlumnoOpAs1'].' y  '.$Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoMaternoAlumnoOpAs2']; ?></td>
                        <td><?php echo $Linea['NombreMateria']; ?></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="4"><?php echo ($Buscar==null ? "No hay parejas clinicas registradas todavía.":"No se encontro ninguna pareja clinica en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    
        //catalogo de parejas clinicas en reportes en modo administrador
    
        public function Catalogo_Administrador_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdParejaClinica,
                                IdDepartamento,
                                NombreDepartamento,
                                IdComunidad,
                                NombreComunidad,
                                IdMedicoTitular,
                                IdAlumnoOpAs1,
                                IdAlumnoOpAs2,
                                IdMateria,
                                Grupo,
                                NombreMedicoTitular,
                                ApellidoPaternoMedicoTitular,
                                ApellidoMaternoMedicoTitular,
                                NombreAlumnoOpAs1,
                                ApellidoPaternoAlumnoOpAs1,
                                ApellidoMaternoAlumnoOpAs1,
                                NombreAlumnoOpAs2,
                                ApellidoPaternoAlumnoOpAs2,
                                ApellidoMaternoAlumnoOpAs2,
                                NombreMateria
                        FROM SIS_Listado_Parejas_Clinica;";
            else:
                $SQL = "SELECT  IdParejaClinica,
                                IdDepartamento,
                                NombreDepartamento,
                                IdComunidad,
                                NombreComunidad
                                IdMedicoTitular,
                                IdAlumnoOpAs1,
                                IdAlumnoOpAs2,
                                IdMateria,
                                Grupo,
                                NombreMedicoTitular,
                                ApellidoPaternoMedicoTitular,
                                ApellidoMaternoMedicoTitular,
                                NombreAlumnoOpAs1,
                                ApellidoPaternoAlumnoOpAs1,
                                ApellidoMaternoAlumnoOpAs1,
                                NombreAlumnoOpAs2,
                                ApellidoPaternoAlumnoOpAs2,
                                ApellidoMaternoAlumnoOpAs2,
                                NombreMateria
                        FROM SIS_Listado_Parejas_Clinica
                        WHERE   NombreDepartamento LIKE '%$Buscar%' OR 
                                NombreComunidad LIKE '%$Buscar%' OR 
                                Grupo LIKE '%$Buscar%' OR 
                                NombreMedicoTitular LIKE '%$Buscar%' OR 
                                ApellidoPaternoMedicoTitular LIKE '%$Buscar%' OR 
                                ApellidoMaternoMedicoTitular LIKE '%$Buscar%' OR 
                                NombreAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                ApellidoPaternoAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                ApellidoMaternoAlumnoOpAs1 LIKE '%$Buscar%' OR 
                                NombreAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                ApellidoPaternoAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%' OR 
                                NombreMateria LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php 
                            $string = $Linea['NombreDepartamento'] != '' ? $Linea['NombreDepartamento']:$Linea['NombreComunidad'];
            
                            echo (strlen($string) > 20) ? substr($string,0,20).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['NombreMedicoTitular'].' '.$Linea['ApellidoPaternoMedicoTitular'].' '.$Linea['ApellidoMaternoMedicoTitular'];
            
                            echo (strlen($string) > 20) ? substr($string,0,20).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoMaternoAlumnoOpAs1'];
            
                            echo (strlen($string) > 20) ? substr($string,0,20).'...' : $string; 
                        ?> y 
                        <?php 
                            $string = $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoMaternoAlumnoOpAs2'];
            
                            echo (strlen($string) > 20) ? substr($string,0,20).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['NombreMateria'];
            
                            echo (strlen($string) > 20) ? substr($string,0,20).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="4"><?php echo ($Buscar==null ? "No hay parejas clinicas registradas todavía.":"No se encontro ninguna pareja clinica en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//buscar la pareja clinica de un medico titular
        
        public function Buscar_Pareja_Clinica_Medico_Titular($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
            $SQL = "SELECT  IdParejaClinica
                    FROM SIS_Listado_Parejas_Clinica
                    WHERE IdMedicoTitular = '$this->IdMedicoTitular';";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);
            
            $Id = null;

			if($Num_Filas > 0):
				$Id = mysqli_fetch_array($Resultado);
			endif;	
            
			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
            
            return $Id;
		}
	
		//buscar la pareja clinica de un alumno operador/asistente
        
        public function Buscar_Pareja_Clinica_Alumno_Op_As($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "SELECT  IdParejaClinica
                    FROM SIS_Listado_Parejas_Clinica
                    WHERE IdAlumnoOpAs1 = '$this->IdAlumnoOpsAs1' OR 
                          IdAlumnoOpAs2 = '$this->IdAlumnoOpsAs1';";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);
            
            $Id = null;

			if($Num_Filas > 0):
				$Id = mysqli_fetch_array($Resultado);
			endif;	
            
			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
            
            return $Id;
		}
    }
?>