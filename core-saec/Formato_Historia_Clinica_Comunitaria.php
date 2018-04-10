<?php class Formato_Historia_Clinica_Comunitaria extends AccesoBD
	{
	        public $IdHistoriaClinicaComunitaria;
		public $IdParejaClinica;
		public $Paciente;
		public $Calle;
		public $Numero;
		public $Colonia;
		public $Poblacion;
		public $Telefono;
		public $Ocupacion;
		public $EstadoCivil;
		public $PadecimientoActual;
		public $Temperatura;
		public $Pulso;
		public $PresionArterial;
		public $Respiracion;
		public $Altura;
		public $Peso;
		public $Pregunta1;
		public $Pregunta2;
		public $Pregunta3;
		public $Pregunta4;
		public $Pregunta5;
		public $Pregunta6;
		public $Pregunta7;
		public $Pregunta8;
		public $Pregunta9;
		public $Pregunta10;
		public $Pregunta11;
		public $Pregunta12;
		public $Pregunta13;
		public $Pregunta14;
		public $Cara;
		public $Labios;
		public $MucosaBucal;
		public $Lengua;
		public $PisoBoca;
		public $GangliosLinfaticos;
		public $PaladarDuro;
		public $PaladarBlando;
		public $BucoFaringe;
		public $Encia;    
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
		public $Pronostico;
		public $PlanTratamiento;
		public $Observaciones;
		public $Aprobado;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdHistoriaClinicaComunitaria = null,
			$varIdParejaClinica = null,
			$varPaciente = null,
			$varCalle = null,
			$varNumero = null,
			$varColonia = null,
			$varPoblacion = null,
			$varTelefono = null,
			$varOcupacion = null,
			$varEstadoCivil = null,
		    $varPadecimientoActual = null,
		$varTemperatura = null,
		$varPulso = null,
		$varPresionArterial = null,
		$varRespiracion = null,
		$varAltura = null,
		$varPeso = null,
		$varPregunta1 = null,
		$varPregunta2 = null,
		$varPregunta3 = null,
		$varPregunta4 = null,
		$varPregunta5 = null,
		$varPregunta6 = null,
		$varPregunta7 = null,
		$varPregunta8 = null,
		$varPregunta9 = null,
		$varPregunta10 = null,
		$varPregunta11 = null,
		$varPregunta12 = null,
		$varPregunta13 = null,
		$varPregunta14 = null,
		$varCara = null,
		$varLabios = null,
		$varMucosaBucal = null,
		$varLengua = null,
		$varPisoBoca = null,
		$varGangliosLinfaticos = null,
		$varPaladarDuro = null,
		$varPaladarBlando = null,
		$varBucoFaringe = null,
		$varEncia = null,    
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
		$varPronostico = null,
		$varPlanTratamiento = null,
		$varObservaciones = null,
			$varAprobado = null,
			$varEstatus = null,
			$varFechaRegistro = null
		)
		{
			$this->IdHistoriaClinicaComunitaria = $varIdHistoriaClinicaComunitaria;
			$this->IdParejaClinica = $varIdParejaClinica;
			$this->Paciente = $varPaciente;
			$this->Calle = $varCalle;
			$this->Numero = $varNumero;
			$this->Colonia = $varColonia;
			$this->Poblacion = $varPoblacion;
			$this->Telefono = $varTelefono;
			$this->Ocupacion = $varOcupacion;
			$this->EstadoCivil = $varEstadoCivil;
		    $this->PadecimientoActual = $varPadecimientoActual;
        $this->Temperatura = $varTemperatura;
		$this->Pulso = $varPulso;
		$this->PresionArterial = $varPresionArterial;
		$this->Respiracion = $varRespiracion;
		$this->Altura = $varAltura;
		$this->Peso = $varPeso;
		$this->Pregunta1 = $varPregunta1;
		$this->Pregunta2 = $varPregunta1;
		$this->Pregunta3 = $varPregunta1;
		$this->Pregunta4 = $varPregunta1;
		$this->Pregunta5 = $varPregunta1;
		$this->Pregunta6 = $varPregunta1;
		$this->Pregunta7 = $varPregunta1;
		$this->Pregunta8 = $varPregunta1;
		$this->Pregunta9 = $varPregunta1;
		$this->Pregunta10 = $varPregunta1;
		$this->Pregunta11 = $varPregunta1;
		$this->Pregunta12 = $varPregunta1;
		$this->Pregunta13 = $varPregunta1;
		$this->Pregunta14 = $varPregunta1;
		$this->Cara = $varCara;
		$this->Labios = $varLabios;
		$this->MucosaBucal = $varMucosaBucal;
		$this->Lengua = $varLengua;
		$this->PisoBoca = $varPisoBoca;
		$this->GangliosLinfaticos = $varGangliosLinfaticos;
		$this->PaladarDuro = $varPaladarDuro;
		$this->PaladarBlando = $varPaladarBlando;
		$this->BucoFaringe = $varBucoFaringe;
		$this->Encia = $varEncia;    
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
		$this->Pronostico = $varPronostico;
		$this->PlanTratamiento = $varPlanTratamiento;
		$this->Observaciones = $varObservaciones;
			$this->Aprobado = $varAprobado;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de formatos de historias clinicas de comunitaria en modo de administrador

		public function Catalogo_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria
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
						<td><a href="formatohistoriaclinicacomunitaria-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaComunitaria']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaclinicacomunitaria-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaComunitaria']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas comunitaria registradas todavía.":"No se encontro ningún formato de historias clinicas comunitaria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//catalogo de formatos de historias clinicas de comunitaria en modo de medico titular
        
        public function Catalogo_Medico_Titular($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria
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
                        <td><a href="formatohistoriaclinicacomunitaria-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaComunitaria']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>									<td><a href="reportes/formatohistoriaclinicacomunitaria-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaComunitaria']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de comunitaria registradas todavía.":"No se encontro ningún formato de historias clinicas de comunitaria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de formatos de historias clinicas de comunitaria en modo de alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria
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
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%';
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
						<td><a href="formatohistoriaclinicacomunitaria-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaComunitaria']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>								        <td><a href="reportes/formatohistoriaclinicacomunitaria-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaComunitaria']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de comunitaria registradas todavía.":"No se encontro ningún formato de historias clinicas de comunitaria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
	
		//dar de alta un formato de historia clinica de comunitaria
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Comunitaria_Alta(
                        '$this->IdParejaClinica',
                        '$this->Paciente',
                        '$this->Calle',
			'$this->Numero',
			'$this->Colonia',
			'$this->Poblacion',
			'$this->Telefono',
			'$this->Ocupacion',
			'$this->EstadoCivil',
            '$this->PadecimientoActual',
            '$this->Temperatura',
            '$this->Pulso',
            '$this->PresionArterial',
            '$this->Respiracion',
            '$this->Altura',
            '$this->Peso',
            '$this->Pregunta1',
            '$this->Pregunta2',
            '$this->Pregunta3',
            '$this->Pregunta4',
            '$this->Pregunta5',
            '$this->Pregunta6',
            '$this->Pregunta7',
            '$this->Pregunta8',
            '$this->Pregunta9',
            '$this->Pregunta10',
            '$this->Pregunta11',
            '$this->Pregunta12',
            '$this->Pregunta13',
            '$this->Pregunta14',
            '$this->Cara',
            '$this->Labios',
            '$this->MucosaBucal',
            '$this->Lengua',
            '$this->PisoBoca',
            '$this->GangliosLinfaticos',
            '$this->PaladarDuro',
            '$this->PaladarBlando',
            '$this->BucoFaringe',
            '$this->Encia',    
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
            '$this->Pronostico',
            '$this->PlanTratamiento',
            '$this->Observaciones'                     
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{ 
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo el llenado de una historia clinica comunitaria",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaclinicacomunitaria.php?exito=Se guardo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaclinicacomunitaria.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de formatos de historias clinicas de comunitaria en reporte en modo administrador
		
		public function Catalogo_Administrador_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de comunitaria registradas todavía.":"No se encontro ningún formato de historias clinicas de comunitaria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//catalogo de formatos de historias clinicas de comunitaria en reporte en modo medico titular
        
        public function Catalogo_Medico_Titular_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de comunitaria registradas todavía.":"No se encontro ningún formato de historias clinicas de comunitaria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de formatos de historias clinicas de comunitaria en reporte en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria                         WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Comunitaria
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
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%';
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de comunitaria registradas todavía.":"No se encontro ningún formato de historias clinicas de comunitaria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
	
		//obtener los datos de un formato de historia clinica de comunitaria
		
        public function Obtener_Formato()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "SELECT  *
                    FROM SIS_Listado_Historia_Clinica_Comunitaria
                    WHERE IdHistoriaClinicaComunitaria = '$this->IdHistoriaClinicaComunitaria';";
            
            //echo $SQL;

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
	
		//aprobar un formato de historia clinica de comunitaria
        
        public function Aprobar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_comunitaria_Aprobar(
                        '$this->IdHistoriaClinicacomunitaria',
                        '$this->Aprobado'
					);";
            
			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{   
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("aprobo una historia clinica de comunitaria",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaclinicacomunitaria.php?exito=Se aprobo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaclinicacomunitaria.php?error=Ocurrio un error. '.mysqli_error($Conexion));
				echo "No se pudo guardar.";
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>