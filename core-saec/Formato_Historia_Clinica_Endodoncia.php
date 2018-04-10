<?php class Formato_Historia_Clinica_Endodoncia extends AccesoBD
	{
		public $IdHistoriaClinicaEndodoncia;
		public $IdParejaClinica;
        public $Paciente;
        public $Calle;
        public $Numero;
        public $Colonia;
        public $Poblacion;
        public $Telefono;
        public $Ocupacion;
        public $Dolor;
        public $DolorTipo;
        public $DolorProvocadoPor;
        public $NivelIntensidad;
        public $Presentacion;
        public $Duracion_Seg;
        public $Duracion_MIn;
        public $Duracion_Horas;
        public $Sensacion_Diente;
        public $Exposicio_Pulpar;
        public $Lesion_Pulpar;
        public $Inflamacion;
        public $Frio;
        public $Calor;
        public $Movilidad;
        public $Camara_Conducto_Pulpar;
        public $Periapice;
        public $Ligamento_Periodontal;
        public $Rarefaccion_Apical;
        public $Diagnostico_Pulpar;
        public $Pronostico;
        public $Plan_Tratamiento;
        public $Tecnica_Operatoria;
        public $Materiales_Obturacion;
        public $Numero_Grapa;
        public $Pieza_Dental;
        public $Conducto_1;
        public $Conducto_2;
        public $Conducto_3;
        public $Conducto_4;
        public $Conducto_5;
        public $Conducto_6;
        public $Conducto_7;
        public $Tec_Long_Tent_1;
        public $Tec_Long_Tent_2;
        public $Tec_Long_Tent_3;
        public $Tec_Long_Tent_4;
        public $Tec_Long_Tent_5;
        public $Tec_Long_Tent_6;
        public $Tec_Long_Tent_7;
        public $Tec_Long_Rectif_1;
        public $Tec_Long_Rectif_2;
        public $Tec_Long_Rectif_3;
        public $Tec_Long_Rectif_4;
        public $Tec_Long_Rectif_5;
        public $Tec_Long_Rectif_6;
        public $Tec_Long_Rectif_7;
        public $Tec_Long_Def_1;
        public $Tec_Long_Def_2;
        public $Tec_Long_Def_3;
        public $Tec_Long_Def_4;
        public $Tec_Long_Def_5;
        public $Tec_Long_Def_6;
        public $Tec_Long_Def_7;
        public $Punto_Referencia_1;
        public $Punto_Referencia_2;
        public $Punto_Referencia_3;
        public $Punto_Referencia_4;
        public $Punto_Referencia_5;
        public $Punto_Referencia_6;
        public $Punto_Referencia_7;
        public $Num_Instrumento_1;
        public $Num_Instrumento_2;
        public $Num_Instrumento_3;
        public $Num_Instrumento_4;
        public $Num_Instrumento_5;
        public $Num_Instrumento_6;
        public $Num_Instrumento_7;
        public $Num_Cono_1;
        public $Num_Cono_2;
        public $Num_Cono_3;
        public $Num_Cono_4;
        public $Num_Cono_5;
        public $Num_Cono_6;
        public $Num_Cono_7;
        public $Observacion;
        public $Aprobado;
        public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdIndicePreventivoOperatoria = null,
            $varIdParejaClinica = null,
            $varPaciente = null,
            $varCalle = null,
            $varNumero = null,
            $varColonia = null,
            $varPoblacion = null,
            $varTelefono = null,
            $varOcupacion = null,
            $varDolor = null,
            $varDolorTipo = null,
            $varDolorProvocadoPor = null,
            $varNivelIntensidad = null,
            $varPresentacion = null,
            $varDuracion_Seg = null,
            $varDuracion_MIn = null,
            $varDuracion_Horas = null,
            $varSensacion_Diente = null,
            $varExposicio_Pulpar = null,
            $varLesion_Pulpar = null,
            $varInflamacion = null,
            $varFrio = null,
            $varCalor = null,
            $varMovilidad = null,
            $varCamara_Conducto_Pulpar = null,
            $varPeriapice = null,
            $varLigamento_Periodontal = null,
            $varRarefaccion_Apical = null,
            $varDiagnostico_Pulpar = null,
            $varPronostico = null,
            $varPlan_Tratamiento = null,
            $varTecnica_Operatoria = null,
            $varMateriales_Obturacion = null,
            $varNumero_Grapa = null,
            $varPieza_Dental = null,
            $varConducto_1 = null,
            $varConducto_2 = null,
            $varConducto_3 = null,
            $varConducto_4 = null,
            $varConducto_5 = null,
            $varConducto_6 = null,
            $varConducto_7 = null,
            $varTec_Long_Tent_1 = null,
            $varTec_Long_Tent_2 = null,
            $varTec_Long_Tent_3 = null,
            $varTec_Long_Tent_4 = null,
            $varTec_Long_Tent_5 = null,
            $varTec_Long_Tent_6 = null,
            $varTec_Long_Tent_7 = null,
            $varTec_Long_Rectif_1 = null,
            $varTec_Long_Rectif_2 = null,
            $varTec_Long_Rectif_3 = null,
            $varTec_Long_Rectif_4 = null,
            $varTec_Long_Rectif_5 = null,
            $varTec_Long_Rectif_6 = null,
            $varTec_Long_Rectif_7 = null,
            $varTec_Long_Def_1 = null,
            $varTec_Long_Def_2 = null,
            $varTec_Long_Def_3 = null,
            $varTec_Long_Def_4 = null,
            $varTec_Long_Def_5 = null,
            $varTec_Long_Def_6 = null,
            $varTec_Long_Def_7 = null,
            $varPunto_Referencia_1 = null,
            $varPunto_Referencia_2 = null,
            $varPunto_Referencia_3 = null,
            $varPunto_Referencia_4 = null,
            $varPunto_Referencia_5 = null,
            $varPunto_Referencia_6 = null,
            $varPunto_Referencia_7 = null,
            $varNum_Instrumento_1 = null,
            $varNum_Instrumento_2 = null,
            $varNum_Instrumento_3 = null,
            $varNum_Instrumento_4 = null,
            $varNum_Instrumento_5 = null,
            $varNum_Instrumento_6 = null,
            $varNum_Instrumento_7 = null,
            $varNum_Cono_1 = null,
            $varNum_Cono_2 = null,
            $varNum_Cono_3 = null,
            $varNum_Cono_4 = null,
            $varNum_Cono_5 = null,
            $varNum_Cono_6 = null,
            $varNum_Cono_7 = null,
            $varObservacion = null,
            $varAprobado = null,
            $varEstatus = null,
            $varFechaRegistro = null
		)
		{
			$this->IdIndicePreventivoOperatoria = $varIdIndicePreventivoOperatoria;
			$this->IdParejaClinica = $varIdParejaClinica;
			$this->Paciente = $varPaciente;
            $this->Calle = $varCalle;
            $this->Numero = $varNumero;
            $this->Colonia = $varColonia;
            $this->Poblacion = $varPoblacion;
            $this->Telefono = $varTelefono;
            $this->Ocupacion = $varOcupacion;
            $this->Dolor = $varDolor;
            $this->DolorTipo = $varDolorTipo;
            $this->DolorProvocadoPor = $varDolorProvocadoPor;
            $this->NivelIntensidad = $varNivelIntensidad;
            $this->Presentacion = $varPresentacion;
            $this->Duracion_Seg = $varDuracion_Seg;
            $this->Duracion_MIn = $varDuracion_MIn;
            $this->Duracion_Horas = $varDuracion_Horas;
            $this->Sensacion_Diente = $varSensacion_Diente;
            $this->Exposicio_Pulpar = $varExposicio_Pulpar;
            $this->Lesion_Pulpar = $varLesion_Pulpar;
            $this->Inflamacion  = $varInflamacion;
            $this->Frio = $varFrio;
            $this->Calor = $varCalor;
            $this->Movilidad = $varMovilidad;
            $this->Camara_Conducto_Pulpar = $varCamara_Conducto_Pulpar;
            $this->Periapice = $varPeriapice;
            $this->Ligamento_Periodontal = $varLigamento_Periodontal;
            $this->Rarefaccion_Apical = $varRarefaccion_Apical;
            $this->Diagnostico_Pulpar = $varDiagnostico_Pulpar;
            $this->Pronostico = $varPronostico;
            $this->Plan_Tratamiento = $varPlan_Tratamiento;
            $this->Tecnica_Operatoria = $varTecnica_Operatoria;
            $this->Materiales_Obturacion = $varMateriales_Obturacion;
            $this->Numero_Grapa = $varNumero_Grapa;
            $this->Pieza_Dental = $varPieza_Dental;
            $this->Conducto_1 = $varConducto_1;
            $this->Conducto_2 = $varConducto_2;
            $this->Conducto_3 = $varConducto_3;
            $this->Conducto_4 = $varConducto_4;
            $this->Conducto_5 = $varConducto_5;
            $this->Conducto_6 = $varConducto_6;
            $this->Conducto_7 = $varConducto_7;
            $this->Tec_Long_Tent_1 = $varTec_Long_Tent_1;
            $this->Tec_Long_Tent_2 = $varTec_Long_Tent_2;
            $this->Tec_Long_Tent_3 = $varTec_Long_Tent_3;
            $this->Tec_Long_Tent_4 = $varTec_Long_Tent_4;
            $this->Tec_Long_Tent_5 = $varTec_Long_Tent_5;
            $this->Tec_Long_Tent_6 = $varTec_Long_Tent_6;
            $this->Tec_Long_Tent_7 = $varTec_Long_Tent_7;
            $this->Tec_Long_Rectif_1 = $varTec_Long_Rectif_1;
            $this->Tec_Long_Rectif_2 = $varTec_Long_Rectif_2;
            $this->Tec_Long_Rectif_3 = $varTec_Long_Rectif_3;
            $this->Tec_Long_Rectif_4 = $varTec_Long_Rectif_4;
            $this->Tec_Long_Rectif_5 = $varTec_Long_Rectif_5;
            $this->Tec_Long_Rectif_6 = $varTec_Long_Rectif_6;
            $this->Tec_Long_Rectif_7 = $varTec_Long_Rectif_7;
            $this->Tec_Long_Def_1 = $varTec_Long_Def_1;
            $this->Tec_Long_Def_2 = $varTec_Long_Def_2;
            $this->Tec_Long_Def_3 = $varTec_Long_Def_3;
            $this->Tec_Long_Def_4 = $varTec_Long_Def_4;
            $this->Tec_Long_Def_5 = $varTec_Long_Def_5;
            $this->Tec_Long_Def_6 = $varTec_Long_Def_6;
            $this->Tec_Long_Def_7 = $varTec_Long_Def_7;
            $this->Punto_Referencia_1 = $varPunto_Referencia_1;
            $this->Punto_Referencia_2 = $varPunto_Referencia_2;
            $this->Punto_Referencia_3 = $varPunto_Referencia_3;
            $this->Punto_Referencia_4 = $varPunto_Referencia_4;
            $this->Punto_Referencia_5 = $varPunto_Referencia_5;
            $this->Punto_Referencia_6 = $varPunto_Referencia_6;
            $this->Punto_Referencia_7 = $varPunto_Referencia_7;
            $this->Num_Instrumento_1 = $varNum_Instrumento_1;
            $this->Num_Instrumento_2 = $varNum_Instrumento_2;
            $this->Num_Instrumento_3 = $varNum_Instrumento_3;
            $this->Num_Instrumento_4 = $varNum_Instrumento_4;
            $this->Num_Instrumento_5 = $varNum_Instrumento_5;
            $this->Num_Instrumento_6 = $varNum_Instrumento_6;
            $this->Num_Instrumento_7 = $varNum_Instrumento_7;
            $this->Num_Cono_1 = $varNum_Cono_1;
            $this->Num_Cono_2 = $varNum_Cono_2;
            $this->Num_Cono_3 = $varNum_Cono_3;
            $this->Num_Cono_4 = $varNum_Cono_4;
            $this->Num_Cono_5 = $varNum_Cono_5;
            $this->Num_Cono_6 = $varNum_Cono_6;
            $this->Num_Cono_7 = $varNum_Cono_7;
            $this->Observacion = $varObservacion;
            $this->Aprobado = $varAprobado;
            $this->Estatus = $varEstatus;
            $this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de formatos de historias clinicas de endodoncia en modo de administrador

		public function Catalogo_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia
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
						<td><a href="formatohistoriaclinicaendodoncia-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaEndodoncia']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaclinicaendodoncia-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaEndodoncia']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de endodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de endodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//catalogo de formatos de historias clinicas de endodoncia en modo de medico titular
        
        public function Catalogo_Medico_Titular($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia
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
                        <td><a href="formatohistoriaclinicaendodoncia-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaEndodoncia']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>									<td><a href="reportes/formatohistoriaclinicaendodoncia-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaEndodoncia']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de endodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de endodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de formatos de historias clinicas de endodoncia en modo de alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia                         WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia
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
						<td><a href="formatohistoriaclinicaendodoncia-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaEndodoncia']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>								        <td><a href="reportes/formatohistoriaclinicaendodoncia-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaEndodoncia']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de endodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de endodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
	
		//dar de alta un formato de historia clinica de endodoncia
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Endodoncia_Alta(
                        '$this->IdParejaClinica',
                        '$this->Paciente',
                        '$this->Calle',
                        '$this->Numero',
                        '$this->Colonia',
                        '$this->Poblacion',
                        '$this->Telefono',
                        '$this->Ocupacion',
                        '$this->Dolor',
                        '$this->DolorTipo',
                        '$this->DolorProvocadoPor',
                        '$this->NivelIntensidad',
                        '$this->Presentacion',
                        '$this->Duracion_Seg',
                        '$this->Duracion_MIn',
                        '$this->Duracion_Horas',
                        '$this->Sensacion_Diente',
                        '$this->Exposicio_Pulpar',
                        '$this->Lesion_Pulpar',
                        '$this->Inflamacion',
                        '$this->Frio',
                        '$this->Calor',
                        '$this->Movilidad',
                        '$this->Camara_Conducto_Pulpar',
                        '$this->Periapice',
                        '$this->Ligamento_Periodontal',
                        '$this->Rarefaccion_Apical',
                        '$this->Diagnostico_Pulpar',
                        '$this->Pronostico',
                        '$this->Plan_Tratamiento',
                        '$this->Tecnica_Operatoria',
                        '$this->Materiales_Obturacion',
                        '$this->Numero_Grapa',
                        '$this->Pieza_Dental',
                        '$this->Conducto_1',
                        '$this->Conducto_2',
                        '$this->Conducto_3',
                        '$this->Conducto_4',
                        '$this->Conducto_5',
                        '$this->Conducto_6',
                        '$this->Conducto_7',
                        '$this->Tec_Long_Tent_1',
                        '$this->Tec_Long_Tent_2',
                        '$this->Tec_Long_Tent_3',
                        '$this->Tec_Long_Tent_4',
                        '$this->Tec_Long_Tent_5',
                        '$this->Tec_Long_Tent_6',
                        '$this->Tec_Long_Tent_7',
                        '$this->Tec_Long_Rectif_1',
                        '$this->Tec_Long_Rectif_2',
                        '$this->Tec_Long_Rectif_3',
                        '$this->Tec_Long_Rectif_4',
                        '$this->Tec_Long_Rectif_5',
                        '$this->Tec_Long_Rectif_6',
                        '$this->Tec_Long_Rectif_7',
                        '$this->Tec_Long_Def_1',
                        '$this->Tec_Long_Def_2',
                        '$this->Tec_Long_Def_3',
                        '$this->Tec_Long_Def_4',
                        '$this->Tec_Long_Def_5',
                        '$this->Tec_Long_Def_6',
                        '$this->Tec_Long_Def_7',
                        '$this->Punto_Referencia_1',
                        '$this->Punto_Referencia_2',
                        '$this->Punto_Referencia_3',
                        '$this->Punto_Referencia_4',
                        '$this->Punto_Referencia_5',
                        '$this->Punto_Referencia_6',
                        '$this->Punto_Referencia_7',
                        '$this->Num_Instrumento_1',
                        '$this->Num_Instrumento_2',
                        '$this->Num_Instrumento_3',
                        '$this->Num_Instrumento_4',
                        '$this->Num_Instrumento_5',
                        '$this->Num_Instrumento_6',
                        '$this->Num_Instrumento_7',
                        '$this->Num_Cono_1',
                        '$this->Num_Cono_2',
                        '$this->Num_Cono_3',
                        '$this->Num_Cono_4',
                        '$this->Num_Cono_5',
                        '$this->Num_Cono_6',
                        '$this->Num_Cono_7',
                        '$this->Observacion'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{ 
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo el llenado de una historia clinica de endodoncia",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaclinicaendodoncia.php?exito=Se guardo el area con exito');
			}else{
                header('Location: formatohistoriaclinicaendodoncia.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de formatos de historias clinicas de endodoncia en reporte en modo administrador
		
		public function Catalogo_Administrador_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de endodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de endodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//catalogo de formatos de historias clinicas de endodoncia en reporte en modo medico titular
        
        public function Catalogo_Medico_Titular_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de endodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de endodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de formatos de historias clinicas de endodoncia en reporte en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia                         WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Endodoncia
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de endodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas de endodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
	
		//obtener los datos de un formato de historia clinica de endodoncia
		
        public function Obtener_Formato()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "SELECT  *
                    FROM SIS_Listado_Historia_Clinica_Endodoncia
                    WHERE IdHistoriaClinicaEndodoncia = '$this->IdHistoriaClinicaEndodoncia';";
            
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
	
		//aprobar un formato de historia clinica de endodoncia
        
        public function Aprobar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Endodoncia_Aprobar(
                        '$this->IdHistoriaClinicaEndodoncia',
                        '$this->Aprobado'
					);";
            
			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{   
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("aprobo una historia clinica de endodoncia",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaclinicaendodoncia.php?exito=Se aprobo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaclinicaendodoncia.php?error=Ocurrio un error. '.mysqli_error($Conexion));
				echo "No se pudo guardar.";
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>