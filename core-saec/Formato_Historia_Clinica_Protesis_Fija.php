<?php class Formato_Historia_Clinica_Protesis_Fija extends AccesoBD
	{
		public $IdHistoriaClinicaProtesisFija;
		public $IdParejaClinica;
        public $Paciente;
        public $Ocupacion;
        public $Telefono;
        public $Calle;
        public $Numero;
        public $Colonia;
        public $Poblacion;
        public $LugarNacimiento;
        public $Motivo_Consulta;
        public $Tx_Medico;
        public $Cual_Motivo;
        public $DienteIzq_1;
        public $DienteIzq_2;
        public $DienteIzq_3;
        public $DienteIzq_4;
        public $DienteIzq_5;
        public $DienteIzq_6;
        public $DienteIzq_7;
        public $DienteIzq_8;
        public $DienteIzq_9;
        public $DienteIzq_10;
        public $DienteIzq_11;
        public $DienteIzq_12;
        public $DienteIzq_13;
        public $DienteIzq_14;
        public $DienteDer_1;
        public $DienteDer_2;
        public $DienteDer_3;
        public $DienteDer_4;
        public $DienteDer_5;
        public $DienteDer_6;
        public $DienteDer_7;
        public $DienteDer_8;
        public $DienteDer_9;
        public $DienteDer_10;
        public $DienteDer_11;
        public $DienteDer_12;
        public $DienteDer_13;
        public $DienteDer_14;
        public $Observaciones_1;
        public $Clasificacion_Angle;
        public $Proteccion_Canina;
        public $Proteccion_Anterior;
        public $Funcion_Grupo;
        public $Proteccion_Mutua;
        public $Mordida_Cruzada;
        public $Mordida_Abierta;
        public $Sobremordida;
        public $Traslape_Horizontal;
        public $Observaciones_2;
        public $Examen_Radiografico;
        public $Relacion_Corona_Raiz;
        public $Soporte_Oseo;
        public $Region_Desdentada;
        public $Observaciones_3;
        public $Pregunta_1;
        public $Pregunta_2;
        public $Pregunta_3;
        public $Habitos_Bucales;
        public $Plan_Tratamiento;
        public $Dientes_Pilares;
        public $Ponticos;
        public $Restauraciones_Individuales;
        public $Otros;
        public $Material_Utilizar;
        public $Modelos_Estudio;
        public $Preparaciones;
        public $Impresiones;
        public $Protesis_Provicionales;
        public $Prueba_Metal;
        public $Prueba_Protesis;
        public $Cemento;
        public $Otros_Tratamientos;   
        public $Aprobado;
        public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdHistoriaClinicaProtesisFija = null,
            $varIdParejaClinica = null,
            $varPaciente = null,
            $varOcupacion = null,
            $varTelefono = null,
            $varCalle = null,
            $varNumero = null,
            $varColonia = null,
            $varPoblacion = null,
            $varLugarNacimiento = null,
            $varMotivo_Consulta = null,
            $varTx_Medico = null,
            $varCual_Motivo = null,
            $varDienteIzq_1 = null,
            $varDienteIzq_2 = null,
            $varDienteIzq_3 = null,
            $varDienteIzq_4 = null,
            $varDienteIzq_5 = null,
            $varDienteIzq_6 = null,
            $varDienteIzq_7 = null,
            $varDienteIzq_8 = null,
            $varDienteIzq_9 = null,
            $varDienteIzq_10 = null,
            $varDienteIzq_11 = null,
            $varDienteIzq_12 = null,
            $varDienteIzq_13 = null,
            $varDienteIzq_14 = null,
            $varDienteDer_1 = null,
            $varDienteDer_2 = null,
            $varDienteDer_3 = null,
            $varDienteDer_4 = null,
            $varDienteDer_5 = null,
            $varDienteDer_6 = null,
            $varDienteDer_7 = null,
            $varDienteDer_8 = null,
            $varDienteDer_9 = null,
            $varDienteDer_10 = null,
            $varDienteDer_11 = null,
            $varDienteDer_12 = null,
            $varDienteDer_13 = null,
            $varDienteDer_14 = null,
            $varObservaciones_1 = null,
            $varClasificacion_Angle = null,
            $varProteccion_Canina = null,
            $varProteccion_Anterior = null,
            $varFuncion_Grupo = null,
            $varProteccion_Mutua = null,
            $varMordida_Cruzada = null,
            $varMordida_Abierta = null,
            $varSobremordida = null,
            $varTraslape_Horizontal = null,
            $varObservaciones_2 = null,
            $varExamen_Radiografico = null,
            $varRelacion_Corona_Raiz = null,
            $varSoporte_Oseo = null,
            $varRegion_Desdentada = null,
            $varObservaciones_3 = null,
            $varPregunta_1 = null,
            $varPregunta_2 = null,
            $varPregunta_3 = null,
            $varHabitos_Bucales = null,
            $varPlan_Tratamiento = null,
            $varDientes_Pilares = null,
            $varPonticos = null,
            $varRestauraciones_Individuales = null,
            $varOtros = null,
            $varMaterial_Utilizar = null,
            $varModelos_Estudio = null,
            $varPreparaciones = null,
            $varImpresiones = null,
            $varProtesis_Provicionales = null,
            $varPrueba_Metal = null,
            $varPrueba_Protesis = null,
            $varCemento = null,
            $varOtros_Tratamientos = null,   
            $varAprobado = null,
            $varEstatus = null,
            $varFechaRegistro = null
		)
		{
			$this->IdHistoriaClinicaProtesisFija = $varIdHistoriaClinicaProtesisFija;
			$this->IdParejaClinica = $varIdParejaClinica;
			$this->Paciente = $varPaciente;
            $this->Ocupacion = $varOcupacion;
            $this->Telefono = $varTelefono;
            $this->Calle = $varCalle;
            $this->Numero = $varNumero;
            $this->Colonia = $varColonia;
            $this->Poblacion = $varPoblacion;
            $this->LugarNacimiento = $varLugarNacimiento;
            $this->Motivo_Consulta = $varMotivo_Consulta;
            $this->Tx_Medico = $varTx_Medico;
            $this->Cual_Motivo = $varCual_Motivo;
            $this->DienteIzq_1 = $varDienteIzq_1;
            $this->DienteIzq_2 = $varDienteIzq_2;
            $this->DienteIzq_3 = $varDienteIzq_3;
            $this->DienteIzq_4 = $varDienteIzq_4;
            $this->DienteIzq_5 = $varDienteIzq_5;
            $this->DienteIzq_6 = $varDienteIzq_6;
            $this->DienteIzq_7 = $varDienteIzq_7;
            $this->DienteIzq_8 = $varDienteIzq_8;
            $this->DienteIzq_9 = $varDienteIzq_9;
            $this->DienteIzq_10 = $varDienteIzq_10;
            $this->DienteIzq_11 = $varDienteIzq_11;
            $this->DienteIzq_12 = $varDienteIzq_12;
            $this->DienteIzq_13 = $varDienteIzq_13;
            $this->DienteIzq_14 = $varDienteIzq_14;
            $this->DienteDer_1 = $varDienteDer_1;
            $this->DienteDer_2 = $varDienteDer_2;
            $this->DienteDer_3 = $varDienteDer_3;
            $this->DienteDer_4 = $varDienteDer_4;
            $this->DienteDer_5 = $varDienteDer_5;
            $this->DienteDer_6 = $varDienteDer_6;
            $this->DienteDer_7 = $varDienteDer_7;
            $this->DienteDer_8 = $varDienteDer_8;
            $this->DienteDer_9 = $varDienteDer_9;
            $this->DienteDer_10 = $varDienteDer_10;
            $this->DienteDer_11 = $varDienteDer_11;
            $this->DienteDer_12 = $varDienteDer_12;
            $this->DienteDer_13 = $varDienteDer_13;
            $this->DienteDer_14 = $varDienteDer_14;
            $this->Observaciones_1 = $varObservaciones_1;
            $this->Clasificacion_Angle = $varClasificacion_Angle;
            $this->Proteccion_Canina = $varProteccion_Canina;
            $this->Proteccion_Anterior = $varProteccion_Anterior;
            $this->Funcion_Grupo = $varFuncion_Grupo;
            $this->Proteccion_Mutua = $varProteccion_Mutua;
            $this->Mordida_Cruzada = $varMordida_Cruzada;
            $this->Mordida_Abierta = $varMordida_Abierta;
            $this->Sobremordida = $varSobremordida;
            $this->Traslape_Horizontal = $varTraslape_Horizontal;
            $this->Observaciones_2 = $varObservaciones_2;
            $this->Examen_Radiografico = $varExamen_Radiografico;
            $this->Relacion_Corona_Raiz = $varRelacion_Corona_Raiz;
            $this->Soporte_Oseo = $varSoporte_Oseo;
            $this->Region_Desdentada = $varRegion_Desdentada;
            $this->Observaciones_3 = $varObservaciones_3;
            $this->Pregunta_1 = $varPregunta_1;
            $this->Pregunta_2 = $varPregunta_2;
            $this->Pregunta_3 = $varPregunta_3;
            $this->Habitos_Bucales = $varHabitos_Bucales;
            $this->Plan_Tratamiento = $varPlan_Tratamiento;
            $this->Dientes_Pilares = $varDientes_Pilares;
            $this->Ponticos = $varPonticos;
            $this->Restauraciones_Individuales = $varRestauraciones_Individuales;
            $this->Otros = $varOtros;
            $this->Material_Utilizar = $varMaterial_Utilizar;
            $this->Modelos_Estudio = $varModelos_Estudio;
            $this->Preparaciones = $varPreparaciones;
            $this->Impresiones = $varImpresiones;
            $this->Protesis_Provicionales = $varProtesis_Provicionales;
            $this->Prueba_Metal = $varPrueba_Metal;
            $this->Prueba_Protesis = $varPrueba_Protesis;
            $this->Cemento = $varCemento;
            $this->Otros_Tratamientos = $varOtros_Tratamientos;  
            $this->Aprobado = $varAprobado;
            $this->Estatus = $varEstatus;
            $this->FechaRegistro = $varFechaRegistro;
		}
		
		//catalogo de formatos de historias clinicas de protesis fija en modo administrador

		public function Catalogo_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija
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
						<td><a href="formatohistoriaclinicaprotesisfija-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisFija']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaclinicaprotesisfija-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisFija']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis fija registradas todavía.":"No se encontro ningún formato de historias clinicas protesis fija en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
		
		//catalogo de formatos de historias clinicas de protesis fija en modo medico titular
        
        public function Catalogo_Medico_Titular($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija
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
                        AND IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1']; ?> y
                            <?php echo $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2']; ?></td>
                        <td><a href="formatohistoriaclinicaprotesisfija-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisFija']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
		        <td><a href="reportes/formatohistoriaclinicaprotesisfija-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisFija']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis fija registradas todavía.":"No se encontro ningún formato de historias clinicas protesis fija en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//catalogo de formatos de historias clinicas de protesis fija en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija
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
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%'                         AND IdParejaClinica = '$this->IdParejaClinica';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1']; ?> y
                            <?php echo $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2']; ?></td>
						<td><a href="formatohistoriaclinicaprotesisfija-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisFija']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaclinicaprotesisfija-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaProtesisFija']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis fija registradas todavía.":"No se encontro ningún formato de historias clinicas protesis fija en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//dar de alta un formato de historia clinica de protesis fija
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Protesis_Fija_Alta(
                        '$this->IdParejaClinica',
                        '$this->Paciente',
                        '$this->Ocupacion',
                        '$this->Telefono',
                        '$this->Calle',
                        '$this->Numero',
                        '$this->Colonia',
                        '$this->Poblacion',
                        '$this->LugarNacimiento',
                        '$this->Motivo_Consulta',
                        '$this->Tx_Medico',
                        '$this->Cual_Motivo',
                        '$this->DienteIzq_1',
                        '$this->DienteIzq_2',
                        '$this->DienteIzq_3',
                        '$this->DienteIzq_4',
                        '$this->DienteIzq_5',
                        '$this->DienteIzq_6',
                        '$this->DienteIzq_7',
                        '$this->DienteIzq_8',
                        '$this->DienteIzq_9',
                        '$this->DienteIzq_10',
                        '$this->DienteIzq_11',
                        '$this->DienteIzq_12',
                        '$this->DienteIzq_13',
                        '$this->DienteIzq_14',
                        '$this->DienteDer_1',
                        '$this->DienteDer_2',
                        '$this->DienteDer_3',
                        '$this->DienteDer_4',
                        '$this->DienteDer_5',
                        '$this->DienteDer_6',
                        '$this->DienteDer_7',
                        '$this->DienteDer_8',
                        '$this->DienteDer_9',
                        '$this->DienteDer_10',
                        '$this->DienteDer_11',
                        '$this->DienteDer_12',
                        '$this->DienteDer_13',
                        '$this->DienteDer_14',
                        '$this->Observaciones_1',
                        '$this->Clasificacion_Angle',
                        '$this->Proteccion_Canina',
                        '$this->Proteccion_Anterior',
                        '$this->Funcion_Grupo',
                        '$this->Proteccion_Mutua',
                        '$this->Mordida_Cruzada',
                        '$this->Mordida_Abierta',
                        '$this->Sobremordida',
                        '$this->Traslape_Horizontal',
                        '$this->Observaciones_2',
                        '$this->Examen_Radiografico',
                        '$this->Relacion_Corona_Raiz',
                        '$this->Soporte_Oseo',
                        '$this->Region_Desdentada',
                        '$this->Observaciones_3',
                        '$this->Pregunta_1',
                        '$this->Pregunta_2',
                        '$this->Pregunta_3',
                        '$this->Habitos_Bucales',
                        '$this->Plan_Tratamiento',
                        '$this->Dientes_Pilares',
                        '$this->Ponticos',
                        '$this->Restauraciones_Individuales',
                        '$this->Otros',
                        '$this->Material_Utilizar',
                        '$this->Modelos_Estudio',
                        '$this->Preparaciones',
                        '$this->Impresiones',
                        '$this->Protesis_Provicionales',
                        '$this->Prueba_Metal',
                        '$this->Prueba_Protesis',
                        '$this->Cemento',
                        '$this->Otros_Tratamientos'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{   
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo el llenado de una historia clinica de protesis fija",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaclinicaprotesisfija.php?exito=Se guardo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaclinicaprotesisfija.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de formatos de historias clinicas de protesis fija en reportes en modo administrador
        
        public function Catalogo_Administrador_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis fija registradas todavía.":"No se encontro ningún formato de historias clinicas protesis fija en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//catalogo de formatos de historias clinicas de protesis fija en reportes en modo medico titular
        
        public function Catalogo_Medico_Titular_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija
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
                        AND IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis fija registradas todavía.":"No se encontro ningún formato de historias clinicas protesis fija en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//catalogo de formatos de historias clinicas de protesis fija en reportes en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Protesis_Fija
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
                        ApellidoMaternoAlumnoOpAs2 LIKE '%$Buscar%'                         AND IdParejaClinica = '$this->IdParejaClinica';";
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas protesis fija registradas todavía.":"No se encontro ningún formato de historias clinicas protesis fija en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
	
		//obtener datos de un formato de historia clinica de protesis fija
        
        public function Obtener_Formato($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
            $SQL = "SELECT  *
                    FROM SIS_Listado_Historia_Clinica_Protesis_Fija
                    WHERE IdHistoriaClinicaProtesisFija = '$this->IdHistoriaClinicaProtesisFija';";

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
	
		//aprobar un formato de historia clinica de protesis fija
        
        public function Aprobar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Protesis_Fija_Aprobar(
                        '$this->IdHistoriaClinicaProtesisFija',
                        '$this->Aprobado'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{   
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("aprobo una historia clinica de protesis fija",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaclinicaprotesisfija.php?exito=Se aprobo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaclinicaprotesisfija.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>