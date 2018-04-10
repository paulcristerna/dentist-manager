<?php class Formato_Historia_Clinica_Exodoncia extends AccesoBD
	{
		public $IdHistoriaClinicaExodoncia;
		public $IdParejaClinica;
        public $Paciente;
        public $Ocupacion;
        public $LugarNacimiento;
        public $Examen_Bucal_Diagnostico;
        public $Examen_Bucal_Tratamiento;
        public $Aparatos_Sistemas_Cardiovascular; 
        public $Aparatos_Sistemas_Renal;
        public $Aparatos_Sistemas_Nervioso;
        public $Aparatos_Sistemas_Digestivo; 
        public $Aparatos_Sistemas_Respiratorio;  
        public $Genitourinario_Embarazo;
        public $Genitourinario_Menopausia;
        public $Genitourinario_Lactancia; 
        public $Genitourinario_Menstruacion; 
        public $Propension_Hemorragica; 
        public $Pruebas_Laboratorio; 
        public $Estudio_Radiologico; 
        public $Estado_General; 
        public $Extraccion_Dentaria; 
        public $Analgesia_Indicada;  
        public $Prescripciones_Operatorias; 
        public $Complicaciones;
        public $Indicacion_Paciente;
        public $Diente_18;
        public $Diente_17;
        public $Diente_16;
        public $Diente_15;
        public $Diente_14;
        public $Diente_13;
        public $Diente_12;
        public $Diente_11;
        public $Diente_21;
        public $Diente_22;
        public $Diente_23;
        public $Diente_24;
        public $Diente_25;
        public $Diente_26;
        public $Diente_27;
        public $Diente_28;
        public $Diente_48;
        public $Diente_47;
        public $Diente_46;
        public $Diente_45;
        public $Diente_44;
        public $Diente_43;
        public $Diente_42;
        public $Diente_41;
        public $Diente_31;
        public $Diente_32;
        public $Diente_33;
        public $Diente_34;
        public $Diente_35;
        public $Diente_36;
        public $Diente_37;
        public $Diente_38;
        public $Diente_55;
		public $Diente_54;
		public $Diente_53;
		public $Diente_52;
		public $Diente_51;
		public $Diente_61;
		public $Diente_62;
		public $Diente_63;
		public $Diente_64;
		public $Diente_65;
		public $Diente_85;
		public $Diente_84;
		public $Diente_83;
		public $Diente_82;
		public $Diente_81;
		public $Diente_71;    
		public $Diente_72;
		public $Diente_73;
		public $Diente_74;
		public $Diente_75;   
        public $Aprobado;
        public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdHistoriaClinicaExodoncia = null,
            $varIdParejaClinica = null,
            $varPaciente = null,
            $varOcupacion = null,
            $varLugarNacimiento = null,
            $varExamen_Bucal_Diagnostico = null,
            $varExamen_Bucal_Tratamiento = null,
            $varAparatos_Sistemas_Cardiovascular = null, 
            $varAparatos_Sistemas_Renal = null,
            $varAparatos_Sistemas_Nervioso = null,
            $varAparatos_Sistemas_Digestivo = null, 
            $varAparatos_Sistemas_Respiratorio = null,  
            $varGenitourinario_Embarazo = null,
            $varGenitourinario_Menopausia = null,
            $varGenitourinario_Lactancia = null, 
            $varGenitourinario_Menstruacion = null, 
            $varPropension_Hemorragica = null, 
            $varPruebas_Laboratorio = null, 
            $varEstudio_Radiologico = null, 
            $varEstado_General = null, 
            $varExtraccion_Dentaria = null, 
            $varAnalgesia_Indicada = null,  
            $varPrescripciones_Operatorias = null, 
            $varComplicaciones = null,
            $varIndicacion_Paciente = null,
            $varDiente_18 = null,
            $varDiente_17 = null,
            $varDiente_16 = null,
            $varDiente_15 = null,
            $varDiente_14 = null,
            $varDiente_13 = null,
            $varDiente_12 = null,
            $varDiente_11 = null,
            $varDiente_21 = null,
            $varDiente_22 = null,
            $varDiente_23 = null,
            $varDiente_24 = null,
            $varDiente_25 = null,
            $varDiente_26 = null,
            $varDiente_27 = null,
            $varDiente_28 = null,
            $varDiente_48 = null,
            $varDiente_47 = null,
            $varDiente_46 = null,
            $varDiente_45 = null,
            $varDiente_44 = null,
            $varDiente_43 = null,
            $varDiente_42 = null,
            $varDiente_41 = null,
            $varDiente_31 = null,
            $varDiente_32 = null,
            $varDiente_33 = null,
            $varDiente_34 = null,
            $varDiente_35 = null,
            $varDiente_36 = null,
            $varDiente_37 = null,
            $varDiente_38 = null,
            $varDiente_55 = null,
            $varDiente_54 = null,
            $varDiente_53 = null,
            $varDiente_52 = null,
            $varDiente_51 = null,
            $varDiente_61 = null,
            $varDiente_62 = null,
            $varDiente_63 = null,
            $varDiente_64 = null,
            $varDiente_65 = null,
            $varDiente_85 = null,
            $varDiente_84 = null,
            $varDiente_83 = null,
            $varDiente_82 = null,
            $varDiente_81 = null,
            $varDiente_71 = null,    
            $varDiente_72 = null,
            $varDiente_73 = null,
            $varDiente_74 = null,
            $varDiente_75 = null, 
            $varAprobado = null,
            $varEstatus = null,
            $varFechaRegistro = null
		)
		{
			$this->IdHistoriaClinicaExodoncia = $varIdHistoriaClinicaExodoncia;
			$this->IdParejaClinica = $varIdParejaClinica;
            $this->Ocupacion = $varOcupacion;
            $this->LugarNacimiento = $varLugarNacimiento;
			$this->Paciente = $varPaciente;
            $this->Examen_Bucal_Diagnostico = $varExamen_Bucal_Diagnostico;
            $this->Examen_Bucal_Tratamiento = $varExamen_Bucal_Tratamiento;
            $this->Aparatos_Sistemas_Cardiovascular = $varAparatos_Sistemas_Cardiovascular; 
            $this->Aparatos_Sistemas_Renal = $varAparatos_Sistemas_Renal;
            $this->Aparatos_Sistemas_Nervioso = $varAparatos_Sistemas_Nervioso;
            $this->Aparatos_Sistemas_Digestivo = $varAparatos_Sistemas_Digestivo; 
            $this->Aparatos_Sistemas_Respiratorio = $varAparatos_Sistemas_Respiratorio;  
            $this->Genitourinario_Embarazo = $varGenitourinario_Embarazo;
            $this->Genitourinario_Menopausia = $varGenitourinario_Menopausia;
            $this->Genitourinario_Lactancia = $varGenitourinario_Lactancia; 
            $this->Genitourinario_Menstruacion = $varGenitourinario_Menstruacion; 
            $this->Propension_Hemorragica = $varPropension_Hemorragica; 
            $this->Pruebas_Laboratorio = $varPruebas_Laboratorio; 
            $this->Estudio_Radiologico = $varEstudio_Radiologico; 
            $this->Estado_General = $varEstado_General; 
            $this->Extraccion_Dentaria = $varExtraccion_Dentaria; 
            $this->Analgesia_Indicada = $varAnalgesia_Indicada;  
            $this->Prescripciones_Operatorias = $varPrescripciones_Operatorias; 
            $this->Complicaciones = $varComplicaciones;
            $this->Indicacion_Paciente = $varIndicacion_Paciente;
            $this->Diente_18 = $varDiente_18;
            $this->Diente_17 = $varDiente_17;
            $this->Diente_16 = $varDiente_16;
            $this->Diente_15 = $varDiente_15;
            $this->Diente_14 = $varDiente_14;
            $this->Diente_13 = $varDiente_13;
            $this->Diente_12 = $varDiente_12;
            $this->Diente_11 = $varDiente_11;
            $this->Diente_21 = $varDiente_21;
            $this->Diente_22 = $varDiente_22;
            $this->Diente_23 = $varDiente_23;
            $this->Diente_24 = $varDiente_24;
            $this->Diente_25 = $varDiente_25;
            $this->Diente_26 = $varDiente_26;
            $this->Diente_27 = $varDiente_27;
            $this->Diente_28 = $varDiente_28;
            $this->Diente_48 = $varDiente_48;
            $this->Diente_47 = $varDiente_47;
            $this->Diente_46 = $varDiente_46;
            $this->Diente_45 = $varDiente_45;
            $this->Diente_44 = $varDiente_44;
            $this->Diente_43 = $varDiente_43;
            $this->Diente_42 = $varDiente_42;
            $this->Diente_41 = $varDiente_41;
            $this->Diente_31 = $varDiente_31;
            $this->Diente_32 = $varDiente_32;
            $this->Diente_33 = $varDiente_33;
            $this->Diente_34 = $varDiente_34;
            $this->Diente_35 = $varDiente_35;
            $this->Diente_36 = $varDiente_36;
            $this->Diente_37 = $varDiente_37;
            $this->Diente_38 = $varDiente_38;
            $this->Diente_55 = $varDiente_55;
            $this->Diente_54 = $varDiente_54;
            $this->Diente_53 = $varDiente_53;
            $this->Diente_52 = $varDiente_52;
            $this->Diente_51 = $varDiente_51;
            $this->Diente_61 = $varDiente_61;
            $this->Diente_62 = $varDiente_62;
            $this->Diente_63 = $varDiente_63;
            $this->Diente_64 = $varDiente_64;
            $this->Diente_65 = $varDiente_65;
            $this->Diente_85 = $varDiente_85;
            $this->Diente_84 = $varDiente_84;
            $this->Diente_83 = $varDiente_83;
            $this->Diente_82 = $varDiente_82;
            $this->Diente_81 = $varDiente_81;
            $this->Diente_71 = $varDiente_71;    
            $this->Diente_72 = $varDiente_72;
            $this->Diente_73 = $varDiente_73;
            $this->Diente_74 = $varDiente_74;
            $this->Diente_75 = $varDiente_75;  
            $this->Aprobado = $varAprobado;
            $this->Estatus = $varEstatus;
            $this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de formatos de historias clinicas de exodoncia en modo administrador

		public function Catalogo_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia
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
						<td><a href="formatohistoriaclinicaexodoncia-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaExodoncia']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaclinicaexodoncia-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaExodoncia']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>								           
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de exodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de exodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//catalogo de formatos de historias clinicas de exodoncia en modo medico titular
        
        public function Catalogo_Medico_Titular($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia
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
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%'                         AND IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1']; ?> y
                            <?php echo $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2']; ?></td>
                        <td><a href="formatohistoriaclinicaexodoncia-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaExodoncia']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
					        <td><a href="reportes/formatohistoriaclinicaexodoncia-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaExodoncia']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de exodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de exodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//catalogo de formatos de historias clinicas de exodoncia en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia
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
                        AND IdParejaClinica = '$this->IdParejaClinica';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1']; ?> y
                            <?php echo $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2']; ?></td>
						<td><a href="formatohistoriaclinicaexodoncia-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaExodoncia']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaclinicaexodoncia-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaExodoncia']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de exodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de exodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//dar de alta un formato de historia clinica de exodoncia
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Exodoncia_Alta(
                        '$this->IdParejaClinica',
                        '$this->Paciente',
                        '$this->Ocupacion',
                        '$this->LugarNacimiento',
                        '$this->Examen_Bucal_Diagnostico',
                        '$this->Examen_Bucal_Tratamiento',
                        '$this->Aparatos_Sistemas_Cardiovascular', 
                        '$this->Aparatos_Sistemas_Renal',
                        '$this->Aparatos_Sistemas_Nervioso',
                        '$this->Aparatos_Sistemas_Digestivo', 
                        '$this->Aparatos_Sistemas_Respiratorio',  
                        '$this->Genitourinario_Embarazo',
                        '$this->Genitourinario_Menopausia',
                        '$this->Genitourinario_Lactancia', 
                        '$this->Genitourinario_Menstruacion', 
                        '$this->Propension_Hemorragica', 
                        '$this->Pruebas_Laboratorio', 
                        '$this->Estudio_Radiologico', 
                        '$this->Estado_General', 
                        '$this->Extraccion_Dentaria', 
                        '$this->Analgesia_Indicada',  
                        '$this->Prescripciones_Operatorias', 
                        '$this->Complicaciones',
                        '$this->Indicacion_Paciente',
                        '$this->Diente_18',
                        '$this->Diente_17',
                        '$this->Diente_16',
                        '$this->Diente_15',
                        '$this->Diente_14',
                        '$this->Diente_13',
                        '$this->Diente_12',
                        '$this->Diente_11',
                        '$this->Diente_21',
                        '$this->Diente_22',
                        '$this->Diente_23',
                        '$this->Diente_24',
                        '$this->Diente_25',
                        '$this->Diente_26',
                        '$this->Diente_27',
                        '$this->Diente_28',
                        '$this->Diente_48',
                        '$this->Diente_47',
                        '$this->Diente_46',
                        '$this->Diente_45',
                        '$this->Diente_44',
                        '$this->Diente_43',
                        '$this->Diente_42',
                        '$this->Diente_41',
                        '$this->Diente_31',
                        '$this->Diente_32',
                        '$this->Diente_33',
                        '$this->Diente_34',
                        '$this->Diente_35',
                        '$this->Diente_36',
                        '$this->Diente_37',
                        '$this->Diente_38',
                        '$this->Diente_55',
                        '$this->Diente_54',
                        '$this->Diente_53',
                        '$this->Diente_52',
                        '$this->Diente_51',
                        '$this->Diente_61',
                        '$this->Diente_62',
                        '$this->Diente_63',
                        '$this->Diente_64',
                        '$this->Diente_65',
                        '$this->Diente_85',
                        '$this->Diente_84',
                        '$this->Diente_83',
                        '$this->Diente_82',
                        '$this->Diente_81',
                        '$this->Diente_71',    
                        '$this->Diente_72',
                        '$this->Diente_73',
                        '$this->Diente_74',
                        '$this->Diente_75'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{    
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo el llenado de una historia clinica de exodoncia",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaclinicaexodoncia.php?exito=Se guardo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaclinicaexodoncia.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de formatos de historias clinicas de exodoncia en reportes en modo administrador
        
        public function Catalogo_Administrador_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de exodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de exodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//catalogo de formatos de historias clinicas de exodoncia en reportes en modo medico titular
        
        public function Catalogo_Medico_Titular_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia
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
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%'                         AND IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado, MYSQL_ASSOC)): ?>
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de exodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de exodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//catalogo de formatos de historias clinicas de exodoncia en reportes en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Exodoncia
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
                        AND IdParejaClinica = '$this->IdParejaClinica';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1']; ?> y
                            <?php echo $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2']; ?></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de exodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de exodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//obtener los datos de un formato de historia clinica de exodoncia
        
        public function Obtener_Formato()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "SELECT  *
                    FROM SIS_Listado_Historia_Clinica_Exodoncia
                    WHERE IdHistoriaClinicaExodoncia = '$this->IdHistoriaClinicaExodoncia';";

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
	
		//aprobar un formato de historia clinica de exodoncia
        
        public function Aprobar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Exodoncia_Aprobar(
                        '$this->IdHistoriaClinicaExodoncia',
                        '$this->Aprobado'          
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{ 
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("aprobo una historia clinica de exodoncia",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaclinicaexodoncia.php?exito=Se aprobo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaclinicaexodoncia.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>