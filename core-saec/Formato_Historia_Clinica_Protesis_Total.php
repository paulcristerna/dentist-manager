<?php class Formato_Historia_Clinica_Protesis_Total extends AccesoBD
	{
		public $IdHistoriaClinicaProtesisTotal;
		public $IdParejaClinica;
        public $Paciente;
        public $Ocupacion;
        public $Telefono;
        public $Calle;
        public $Numero;
        public $Colonia;
        public $Poblacion;
        public $Pregunta_1;
        public $Pregunta_2;
        public $Fecha_Superior;
        public $Fecha_Inferior;
        public $Pregunta_3;
        public $Pregunta_4;
        public $Pregunta_5;
        public $Pregunta_6;
        public $Pregunta_7;
        public $Pregunta_8;
        public $Pregunta_9;
        public $Pregunta_10;
        public $Pregunta_11;
        public $Pregunta_12;
        public $Pregunta_13;
        public $Pregunta_14;
        public $Pregunta_15;
        public $Pregunta_16;
        public $Pregunta_17;
        public $Pregunta_18;
        public $Pregunta_19;
        public $Pregunta_20;
        public $Residuales_Superior;
        public $Residuales_Inferior;
        public $Mucosa_Superior;
        public $Mucosa_Inferior;
        public $Posicion_Lingual;
        public $Volumen_Salival;
        public $Condicion_Salival;
        public $Torus_Palatino;
        public $Torus_Mandibular;
        public $Reflejo_Nauseoso;
        public $Relacion_intermaxilar;
        public $Frenillo;
        public $Observaciones_Especiales;
        public $Diagnostico;
        public $Pronostico;
        public $Plan_Tratamiento;
        public $Aprobado;
        public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdHistoriaClinicaProtesisTotal = null,
            $varIdParejaClinica = null,
            $varPaciente = null,
            $varOcupacion = null,
            $varTelefono = null,
            $varCalle = null,
            $varNumero = null,
            $varColonia = null,
            $varPoblacion = null,
            $varPregunta_1 = null,
            $varPregunta_2 = null,
            $varFecha_Superior = null,
            $varFecha_Inferior = null,
            $varPregunta_3 = null,
            $varPregunta_4 = null,
            $varPregunta_5 = null,
            $varPregunta_6 = null,
            $varPregunta_7 = null,
            $varPregunta_8 = null,
            $varPregunta_9 = null,
            $varPregunta_10 = null,
            $varPregunta_11 = null,
            $varPregunta_12 = null,
            $varPregunta_13 = null,
            $varPregunta_14 = null,
            $varPregunta_15 = null,
            $varPregunta_16 = null,
            $varPregunta_17 = null,
            $varPregunta_18 = null,
            $varPregunta_19 = null,
            $varPregunta_20 = null,
            $varResiduales_Superior = null,
            $varResiduales_Inferior = null,
            $varMucosa_Superior = null,
            $varMucosa_Inferior = null,
            $varPosicion_Lingual = null,
            $varVolumen_Salival = null,
            $varCondicion_Salival = null,
            $varTorus_Palatino = null,
            $varTorus_Mandibular = null,
            $varReflejo_Nauseoso = null,
            $varRelacion_intermaxilar = null,
            $varFrenillo = null,
            $varObservaciones_Especiales = null,
            $varDiagnostico = null,
            $varPronostico = null,
            $varPlan_Tratamiento = null,
            $varAprobado = null,
            $varEstatus = null,
            $varFechaRegistro = null
		)
		{
			$this->IdHistoriaClinicaProtesisTotal = $varIdHistoriaClinicaProtesisTotal;
			$this->IdParejaClinica = $varIdParejaClinica;
			$this->Paciente = $varPaciente;
            $this->Ocupacion = $varOcupacion;
            $this->Telefono = $varTelefono;
            $this->Calle = $varCalle;
            $this->Numero = $varNumero;
            $this->Colonia = $varColonia;
            $this->Poblacion = $varPoblacion;
            $this->Pregunta_1 = $varPregunta_1;
            $this->Pregunta_2 = $varPregunta_2;
            $this->Fecha_Superior = $varFecha_Superior;
            $this->Fecha_Inferior = $varFecha_Inferior;
            $this->Pregunta_3 = $varPregunta_3;
            $this->Pregunta_4 = $varPregunta_4;
            $this->Pregunta_5 = $varPregunta_5;
            $this->Pregunta_6 = $varPregunta_6;
            $this->Pregunta_7 = $varPregunta_7;
            $this->Pregunta_8 = $varPregunta_8;
            $this->Pregunta_9 = $varPregunta_9;
            $this->Pregunta_10 = $varPregunta_10;
            $this->Pregunta_11 = $varPregunta_11;
            $this->Pregunta_12 = $varPregunta_12;
            $this->Pregunta_13 = $varPregunta_13;
            $this->Pregunta_14 = $varPregunta_14;
            $this->Pregunta_15 = $varPregunta_15;
            $this->Pregunta_16 = $varPregunta_16;
            $this->Pregunta_17 = $varPregunta_17;
            $this->Pregunta_18 = $varPregunta_18;
            $this->Pregunta_19 = $varPregunta_19;
            $this->Pregunta_20 = $varPregunta_20;
            $this->Residuales_Superior = $varResiduales_Superior;
            $this->Residuales_Inferior = $varResiduales_Inferior;
            $this->Mucosa_Superior = $varMucosa_Superior;
            $this->Mucosa_Inferior = $varMucosa_Inferior;
            $this->Posicion_Lingual = $varPosicion_Lingual;
            $this->Volumen_Salival = $varVolumen_Salival;
            $this->Condicion_Salival = $varCondicion_Salival;
            $this->Torus_Palatino = $varTorus_Palatino;
            $this->Torus_Mandibular = $varTorus_Mandibular;
            $this->Reflejo_Nauseoso = $varReflejo_Nauseoso;
            $this->Relacion_intermaxilar = $varRelacion_intermaxilar;
            $this->Frenillo = $varFrenillo;
            $this->Observaciones_Especiales = $varObservaciones_Especiales;
            $this->Diagnostico = $varDiagnostico;
            $this->Pronostico = $varPronostico;
            $this->Plan_Tratamiento = $varPlan_Tratamiento;
            $this->Aprobado = $varAprobado;
            $this->Estatus = $varEstatus;
            $this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de formatos de historias clinicas de protesis total en modo administrador

		public function Catalogo_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total
                        WHERE NombrePaciente LIKE '%$Buscar%' OR 
                        ApellidoPaternoPaciente LIKE '%$Buscar%' OR
                        ApellidoMaternoPaciente LIKE '%$Buscar%' OR
                        NombreMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoPaternoMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoMaternoMedicoTitular LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1']; ?> y
                            <?php echo $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2']; ?></td>
						<td><a href="formatohistoriaprotesistotal-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisTotal']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaprotesistotal-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisTotal']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis total registradas todavía.":"No se encontro ningún formato de historias clinicas protesis total en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
	
		//catalogo de formatos de historias clinicas de protesis total en modo medico titular
        
        public function Catalogo_Medico_Titular($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total
                        WHERE IdParejaClinica = '$this->IdParejaClinica'
						AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total
                        WHERE NombrePaciente LIKE '%$Buscar%' OR 
                        ApellidoPaternoPaciente LIKE '%$Buscar%' OR
                        ApellidoMaternoPaciente LIKE '%$Buscar%' OR
                        NombreMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoPaternoMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoMaternoMedicoTitular LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%'
                        AND IdParejaClinica = '$this->IdParejaClinica'
						AND Aprobado = 0;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1']; ?> y
                            <?php echo $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2']; ?></td>
                        <td><a href="formatohistoriaprotesistotal-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisTotal']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
			<td><a href="reportes/formatohistoriaprotesistotal-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisTotal']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis total registradas todavía.":"No se encontro ningún formato de historias clinicas protesis total en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//catalogo de formatos de historias clinicas de protesis total en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total
                        WHERE NombrePaciente LIKE '%$Buscar%' OR 
                        ApellidoPaternoPaciente LIKE '%$Buscar%' OR
                        ApellidoMaternoPaciente LIKE '%$Buscar%' OR
                        NombreMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoPaternoMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoMaternoMedicoTitular LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%'
                        IdParejaClinica = '$this->IdParejaClinica';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1']; ?> y
                            <?php echo $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2']; ?></td>
						<td><a href="formatohistoriaprotesistotal-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisTotal']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
					        <td><a href="reportes/formatohistoriaprotesistotal-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisTotal']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis total registradas todavía.":"No se encontro ningún formato de historias clinicas protesis total en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//dar de alta un formato de historia clinica de protesis total
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Protesis_Total_Alta(
                        '$this->IdParejaClinica',
                        '$this->Paciente',
                        '$this->Ocupacion',
                        '$this->Telefono',
                        '$this->Calle',
                        '$this->Numero',
                        '$this->Colonia',
                        '$this->Poblacion',
                        '$this->Pregunta_1',
                        '$this->Pregunta_2 ',
                        '$this->Fecha_Superior',
                        '$this->Fecha_Inferior',
                        '$this->Pregunta_3',
                        '$this->Pregunta_4',
                        '$this->Pregunta_5',
                        '$this->Pregunta_6',
                        '$this->Pregunta_7',
                        '$this->Pregunta_8',
                        '$this->Pregunta_9',
                        '$this->Pregunta_10',
                        '$this->Pregunta_11',
                        '$this->Pregunta_12',
                        '$this->Pregunta_13',
                        '$this->Pregunta_14',
                        '$this->Pregunta_15',
                        '$this->Pregunta_16',
                        '$this->Pregunta_17',
                        '$this->Pregunta_18',
                        '$this->Pregunta_19',
                        '$this->Pregunta_20',
                        '$this->Residuales_Superior',
                        '$this->Residuales_Inferior',
                        '$this->Mucosa_Superior',
                        '$this->Mucosa_Inferior',
                        '$this->Posicion_Lingual',
                        '$this->Volumen_Salival',
                        '$this->Condicion_Salival',
                        '$this->Torus_Palatino',
                        '$this->Torus_Mandibular',
                        '$this->Reflejo_Nauseoso',
                        '$this->Relacion_intermaxilar',
                        '$this->Frenillo',
                        '$this->Observaciones_Especiales',
                        '$this->Diagnostico',
                        '$this->Pronostico',
                        '$this->Plan_Tratamiento'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{   
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo el llenado de una historia clinica de protesis total",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaprotesistotal.php?exito=Se guardo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaprotesistotal.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de formatos de historias clinicas de protesis total en reportes en modo administrador
        
        public function Catalogo_Administrador_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total
                        WHERE NombrePaciente LIKE '%$Buscar%' OR 
                        ApellidoPaternoPaciente LIKE '%$Buscar%' OR
                        ApellidoMaternoPaciente LIKE '%$Buscar%' OR
                        NombreMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoPaternoMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoMaternoMedicoTitular LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php 
                            $string = $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?> y 
                        <?php 
                            $string = $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis total registradas todavía.":"No se encontro ningún formato de historias clinicas protesis total en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//catalogo de formatos de historias clinicas de protesis total en reportes en modo medico titular
        
        public function Catalogo_Medico_Titular_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total
                        WHERE IdParejaClinica = '$this->IdParejaClinica'
						AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total
                        WHERE NombrePaciente LIKE '%$Buscar%' OR 
                        ApellidoPaternoPaciente LIKE '%$Buscar%' OR
                        ApellidoMaternoPaciente LIKE '%$Buscar%' OR
                        NombreMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoPaternoMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoMaternoMedicoTitular LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%'
                        AND IdParejaClinica = '$this->IdParejaClinica'
						AND Aprobado = 0;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php 
                            $string = $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?> y 
                        <?php 
                            $string = $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis total registradas todavía.":"No se encontro ningún formato de historias clinicas protesis total en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de formatos de historias clinicas de protesis total en reportes en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Total
                        WHERE NombrePaciente LIKE '%$Buscar%' OR 
                        ApellidoPaternoPaciente LIKE '%$Buscar%' OR
                        ApellidoMaternoPaciente LIKE '%$Buscar%' OR
                        NombreMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoPaternoMedicoTitular LIKE '%$Buscar%' OR
                        ApellidoMaternoMedicoTitular LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs1 LIKE '%$Buscar%' OR
                        NombreAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoPaternoAlumnoOpAs2 LIKE '%$Buscar%' OR
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%'
                        IdParejaClinica = '$this->IdParejaClinica';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php 
                            $string = $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?> y 
                        <?php 
                            $string = $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis total registradas todavía.":"No se encontro ningún formato de historias clinicas protesis total en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//obtener los datos de un formato de historia clinica de protesis total
		
		public function Obtener_Formato($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  *
					FROM SIS_Listado_Historia_Clinica_Protesis_Total;";

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
	
		//aprobar un formato de historia clinica de protesis total
		
		public function Aprobar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Protesis_Total_Aprobar(
                        '$this->IdHistoriaClinicaProtesisTotal',
                        '$this->Aprobado'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{  
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("aprobo una historia clinica de protesis total",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaprotesistotal.php?exito=Se aprobo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaprotesistotal.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>