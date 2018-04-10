<?php class Formato_Historia_Clinica_Protesis_Parcial_Removible extends AccesoBD
	{
		public $IdHistoriaClinicaProtesisParcialRemovible;
		public $IdParejaClinica;
        public $Paciente;
        public $Ocupacion;
        public $Telefono;
        public $Calle;
        public $Numero;
        public $Colonia;
        public $Poblacion;
        public $LugarNacimiento;
        public $Estado_Salud_General;
        public $Problema_Principal_1;
        public $Tratamiento_1;
        public $Ultima_Visita_Medico;
        public $Motivo_1;
        public $Estado_Salud_Oral;
        public $Problema_Principal_2;
        public $Tratamiento_2;
        public $Otros;
        public $Tratamiento_3;
        public $Ultima_Visita_Dentista;
        public $Motivo_2;
        public $Motivo_Perdia_Piezas;
        public $Tiene_Protesis;
        public $Forma_1;
        public $Color_1;
        public $Tamano_1;
        public $Posicion;
        public $Vitalidad_Pulpar;
        public $Forma_2;
        public $Tamano_2;
        public $Relacion_Intermaxilar;
        public $Procesos_Residuales;
        public $Forma_Boveda_Palatina;
        public $Presencia_Torus;
        public $Color_2;
        public $Consistencia;
        public $Espesor;
        public $Altura_Nivel_Piezas;
        public $Frenillos;
        public $Condiciones_Periodonto;
        public $Movilidad_Dental;
        public $IHOS;
        public $Clasificacion_Bracha;
        public $Hallazgos;
        public $Estudio_Radiografico;
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
        public $Diagnostico;
        public $Plan_Tratamiento;
        public $Aprobado;
        public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdHistoriaClinicaProtesisParcialRemovible = null,
            $varIdParejaClinica = null,
            $varPaciente = null,
            $varOcupacion = null,
            $varTelefono = null,
            $varCalle = null,
            $varNumero = null,
            $varColonia = null,
            $varPoblacion = null,
            $varLugarNacimiento = null,
            $varEstado_Salud_General = null,
            $varProblema_Principal_1 = null,
            $varTratamiento_1 = null,
            $varUltima_Visita_Medico = null,
            $varMotivo_1 = null,
            $varEstado_Salud_Oral = null,
            $varProblema_Principal_2 = null,
            $varTratamiento_2 = null,
            $varOtros = null,
            $varTratamiento_3 = null,
            $varUltima_Visita_Dentista = null,
            $varMotivo_2 = null,
            $varMotivo_Perdia_Piezas = null,
            $varTiene_Protesis = null,
            $varForma_1 = null,
            $varColor_1 = null,
            $varTamano_1 = null,
            $varPosicion = null,
            $varVitalidad_Pulpar = null,
            $varForma_2 = null,
            $varTamano_2 = null,
            $varRelacion_Intermaxilar = null,
            $varProcesos_Residuales = null,
            $varForma_Boveda_Palatina = null,
            $varPresencia_Torus = null,
            $varColor_2 = null,
            $varConsistencia = null,
            $varEspesor = null,
            $varAltura_Nivel_Piezas = null,
            $varFrenillos = null,
            $varCondiciones_Periodonto = null,
            $varMovilidad_Dental = null,
            $varIHOS = null,
            $varClasificacion_Bracha = null,
            $varHallazgos = null,
            $varEstudio_Radiografico = null,
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
            $varDiagnostico = null,
            $varPlan_Tratamiento = null,
            $varAprobado = null,
            $varEstatus = null,
            $varFechaRegistro = null
		)
		{
			$this->IdHistoriaClinicaProtesisParcialRemovible = $varIdHistoriaClinicaProtesisParcialRemovible;
			$this->IdParejaClinica = $varIdParejaClinica;
			$this->Paciente = $varPaciente;
            $this->Ocupacion = $varOcupacion;
            $this->Telefono = $varTelefono;
            $this->Calle = $varCalle;
            $this->Numero = $varNumero;
            $this->Colonia = $varColonia;
            $this->Poblacion = $varPoblacion;
            $this->LugarNacimiento = $varLugarNacimiento;
            $this->Estado_Salud_General = $varEstado_Salud_General;
            $this->Problema_Principal_1 = $varProblema_Principal_1;
            $this->Tratamiento_1 = $varTratamiento_1;
            $this->Ultima_Visita_Medico = $varUltima_Visita_Medico;
            $this->Motivo_1 = $varMotivo_1;
            $this->Estado_Salud_Oral = $varEstado_Salud_Oral;
            $this->Problema_Principal_2 = $varProblema_Principal_2;
            $this->Tratamiento_2 = $varTratamiento_2;
            $this->Otros = $varOtros;
            $this->Tratamiento_3 = $varTratamiento_3;
            $this->Ultima_Visita_Dentista = $varUltima_Visita_Dentista;
            $this->Motivo_2 = $varMotivo_2;
            $this->Motivo_Perdia_Piezas = $varMotivo_Perdia_Piezas;
            $this->Tiene_Protesis = $varTiene_Protesis;
            $this->Forma_1 = $varForma_1;
            $this->Color_1 = $varColor_1;
            $this->Tamano_1 = $varTamano_1;
            $this->Posicion = $varPosicion;
            $this->Vitalidad_Pulpar = $varVitalidad_Pulpar;
            $this->Forma_2 = $varForma_2;
            $this->Tamano_2 = $varTamano_2;
            $this->Relacion_Intermaxilar = $varRelacion_Intermaxilar;
            $this->Procesos_Residuales = $varProcesos_Residuales;
            $this->Forma_Boveda_Palatina = $varForma_Boveda_Palatina;
            $this->Presencia_Torus = $varPresencia_Torus;
            $this->Color_2 = $varColor_2;
            $this->Consistencia = $varConsistencia;
            $this->Espesor = $varEspesor;
            $this->Altura_Nivel_Piezas = $varAltura_Nivel_Piezas;
            $this->Frenillos = $varFrenillos;
            $this->Condiciones_Periodonto = $varCondiciones_Periodonto;
            $this->Movilidad_Dental = $varMovilidad_Dental;
            $this->IHOS = $varIHOS;
            $this->Clasificacion_Bracha = $varClasificacion_Bracha;
            $this->Hallazgos = $varHallazgos;
            $this->Estudio_Radiografico = $varEstudio_Radiografico;
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
            $this->Diagnostico = $varDiagnostico;
            $this->Plan_Tratamiento = $varPlan_Tratamiento;
            $this->Aprobado = $varAprobado;
            $this->Estatus = $varEstatus;
            $this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de formatos de historias clinicas de protesis parcial removible en modo administrador

		public function Catalogo_Administrador($Buscar=null)
		{ 
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible
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
						<td><a href="formatohistoriaclinicaprotesisparcialremovible-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisParcialRemovible']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaclinicaprotesisparcialremovible-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisParcialRemovible']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis parcial removible registradas todavía.":"No se encontro ningún formato de historias clinicas protesis parcial removible en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//catalogo de formatos de historias clinicas de protesis parcial removible en modo medico titular
        
        public function Catalogo_Medico_Titular($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible
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
                        <td><a href="formatohistoriaclinicaprotesisparcialremovible-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisParcialRemovible']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
			<td><a href="reportes/formatohistoriaclinicaprotesisparcialremovible-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisParcialRemovible']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr> 
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis parcial removible registradas todavía.":"No se encontro ningún formato de historias clinicas protesis parcial removible en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//catalogo de formatos de historias clinicas de protesis parcial removible en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible
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
						<td><a href="formatohistoriaclinicaprotesisparcialremovible-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisParcialRemovible']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaclinicaprotesisparcialremovible-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisParcialRemovible']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis parcial removible registradas todavía.":"No se encontro ningún formato de historias clinicas protesis parcial removible en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//dar de alta un formato de historia clinica de protesis parcial removible
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Protesis_Parcial_Removible_Alta(
                        '$this->IdParejaClinica',
                        '$this->Paciente',
                        '$this->Ocupacion',
                        '$this->Telefono',
                        '$this->Calle',
                        '$this->Numero',
                        '$this->Colonia',
                        '$this->Poblacion',
                        '$this->LugarNacimiento',
                        '$this->Estado_Salud_General',
                        '$this->Problema_Principal_1',
                        '$this->Tratamiento_1',
                        '$this->Ultima_Visita_Medico',
                        '$this->Motivo_1',
                        '$this->Estado_Salud_Oral',
                        '$this->Problema_Principal_2',
                        '$this->Tratamiento_2',
                        '$this->Otros',
                        '$this->Tratamiento_3',
                        '$this->Ultima_Visita_Dentista',
                        '$this->Motivo_2',
                        '$this->Motivo_Perdia_Piezas',
                        '$this->Tiene_Protesis',
                        '$this->Forma_1',
                        '$this->Color_1',
                        '$this->Tamano_1',
                        '$this->Posicion',
                        '$this->Vitalidad_Pulpar',
                        '$this->Forma_2',
                        '$this->Tamano_2',
                        '$this->Relacion_Intermaxilar',
                        '$this->Procesos_Residuales',
                        '$this->Forma_Boveda_Palatina',
                        '$this->Presencia_Torus',
                        '$this->Color_2',
                        '$this->Consistencia',
                        '$this->Espesor',
                        '$this->Altura_Nivel_Piezas',
                        '$this->Frenillos',
                        '$this->Condiciones_Periodonto',
                        '$this->Movilidad_Dental',
                        '$this->IHOS',
                        '$this->Clasificacion_Bracha',
                        '$this->Hallazgos',
                        '$this->Estudio_Radiografico',
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
                        '$this->Diente_75',
                        '$this->Diagnostico',
                        '$this->Plan_Tratamiento'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{    
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo el llenado de una historia clinica de protesis parcial removible",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaclinicaprotesisparcialremovible.php?exito=Se guardo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaclinicaprotesisparcialremovible.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de formatos de historias clinicas de protesis parcial removible en reporte en modo administrador
		
		public function Catalogo_Administrador_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis parcial removible registradas todavía.":"No se encontro ningún formato de historias clinicas protesis parcial removible en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//catalogo de formatos de historias clinicas de protesis parcial removible en reporte en modo medico titular
        
        public function Catalogo_Medico_Titular_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis parcial removible registradas todavía.":"No se encontro ningún formato de historias clinicas protesis parcial removible en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//catalogo de formatos de historias clinicas de protesis parcial removible en reporte en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis parcial removible registradas todavía.":"No se encontro ningún formato de historias clinicas protesis parcial removible en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
	
		//obtener los datos de un formato de historia clinica de protesis parcial removible
        
        public function Obtener_Formato()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "SELECT  *
                    FROM SIS_Listado_Historia_Clinica_Protesis_Parcial_Removible
                    WHERE IdHistoriaClinicaProtesisParcialRemovible = '$this->IdHistoriaClinicaProtesisParcialRemovible';";

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
	
		//aprobar un formato de historia clinica de protesis parcial removible
        
        public function Aprobar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
            // realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Protesis_Parcial_Removible_Aprobar(
                        '$this->IdHistoriaClinicaProtesisParcialRemovible',
                        '$this->Aprobado'
					);";
            
			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{  
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("aprobo una historia clinica de protesis parcial removible",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: fomatohistoriaclinicaprotesisparcialremovible.php?exito=Se aprobo la historia clinica con exito');
			}else{
                header('Location: fomatohistoriaclinicaprotesisparcialremovible.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>