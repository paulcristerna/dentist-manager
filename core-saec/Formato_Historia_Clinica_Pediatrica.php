<?php class Formato_Historia_Clinica_Pediatrica extends AccesoBD
	{
	        public $IdHistoriaClinicaPediatrica;
		public $IdParejaClinica;
		public $Paciente;
		public $Calle;
		public $Numero;
		public $Colonia;
		public $Poblacion;
		public $Telefono;
		public $Ocupacion;
		public $CodigoPostal;
		public $Escuela;
		public $GradoEscolar;
		public $NumHermanos;
		public $NombrePadre;
		public $OcupacionPadre;
		public $TelefonoPadre;
		public $NombreMedico;
		public $Peso;
		public $Estatura;
		public $TA;
		public $Temp;
		public $Conducta;
		public $EstadoActualSalud;
		public $EnfermedadesProlongadas;
		public $UltimoExamenFisico;
		public $RecibeAtencionMedica;
		public $RecibeAtencionMedicaPorque;
		public $Operaciones;
		public $RecibidoTratamientoDental;
		public $Anestesiado;
		public $EfectosAnestesia;
		public $OclusionMolaresDer;
		public $OclusionMolaresIzq;
		public $SobremordidaVert;
		public $SobremordidaHor;
		public $MordidaAbierta;
		public $ErupcionTardia;
		public $DientesAusentes;
		public $PerdidaPrematura;
		public $PerdidaProlongada;
		public $MordidaCruzadaPost;
		public $MordidaCruzadaAnt;
		public $EstadoPeriodontal;
		public $Fistula;
		public $Gingivitis;
		public $Habitos;
		public $DolorCabeza;
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
		public $MotivoConsulta;
		public $AtendidoConsultarioDental;
		public $ExperienciaDentalPrevia;
		public $PracticaDeporte;
		public $PracticaDeporteCual;
		public $SuccionDedo;
		public $MorderseUnas;
		public $MorderseLabios;
		public $DuermeBocaAbierta;
		public $RechinarDientes;
		public $DolorCabezaFrecuente;
		public $PadeceEnfermedadActualmente;
		public $PadeceEnfermedadActualmenteCual;
		public $RecibiendoMedicamento;
		public $RecibiendoMedicamentoCual;
		public $DesordenesEmocionales;
		public $SangradoPersistente;
		public $Hepatitis;
		public $Hemofilia;
		public $FiebreReumatica;
		public $Convulsiones;
		public $ObstruccionNasalCronica;
		public $AccidentesCabezaCara;
		public $AccidentesCabezaCaraCuando;
		public $Alergico;
		public $AlergicoQue;
		public $InfeccionesFrecuentesGarganta;
		public $OperadoAmigdalas;
		public $OperadoAmigdalasCuando;
		public $Adenoides;
		public $AdenoidesCuando;
		public $AusentesCongenitamente;
		public $Supernumerarios;
		public $Malformados;
		public $LesionesPeriapicales;
		public $Quistes;
		public $Incluidos;
		public $RaicesAnormales;
		public $ResorcionRadicular;
		public $TercerosMolares;
		public $Traumatismos;
		public $OtrasPatologias;
		public $Riesgo;
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
		public $DiagnosticoIntegral1;
		public $DiagnosticoIntegral2;
		public $DiagnosticoIntegral3;
		public $DiagnosticoIntegral4;
		public $DiagnosticoIntegral5;
		public $DiagnosticoIntegral6;
		public $Prevencion;
		public $Operacion;
		public $OrtodonciaPreventiva;
		public $Cita1;
		public $Cita2;
		public $Cita3;
		public $Cita4;
		public $Cita5;
		public $Cita6;
		public $Cita7;
		public $Cita8;
		public $Cita9;
		public $Cita10;
		public $Cita11;
		public $Aprobado;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdHistoriaClinicaPediatrica = null,
			$varIdParejaClinica = null,
			$varPaciente = null,
			$varCalle = null,
			$varNumero = null,
			$varColonia = null,
			$varPoblacion = null,
			$varTelefono = null,
			$varOcupacion = null,
			$varCodigoPostal = null,
			$varEscuela = null,
			$varGradoEscolar = null,
			$varNumHermanos = null,
			$varNombrePadre = null,
			$varOcupacionPadre = null,
			$varTelefonoPadre = null,
			$varNombreMedico = null,
			$varPeso = null,
			$varEstatura = null,
			$varTA = null,
			$varTemp = null,
			$varConducta = null,
			$varEstadoActualSalud = null,
			$varEnfermedadesProlongadas = null,
			$varUltimoExamenFisico = null,
			$varRecibeAtencionMedica = null,
			$varRecibeAtencionMedicaPorque = null,
			$varOperaciones = null,
			$varRecibidoTratamientoDental = null,
			$varAnestesiado = null,
			$varEfectosAnestesia = null,
			$varOclusionMolaresDer = null,
			$varOclusionMolaresIzq = null,
			$varSobremordidaVert = null,
			$varSobremordidaHor = null,
			$varMordidaAbierta = null,
			$varErupcionTardia = null,
			$varDientesAusentes = null,
			$varPerdidaPrematura = null,
			$varPerdidaProlongada = null,
			$varMordidaCruzadaPost = null,
			$varMordidaCruzadaAnt = null,
			$varEstadoPeriodontal = null,
			$varFistula = null,
			$varGingivitis = null,
			$varHabitos = null,
			$varDolorCabeza = null,
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
			$varMotivoConsulta = null,
			$varAtendidoConsultarioDental = null,
			$varExperienciaDentalPrevia = null,
			$varPracticaDeporte = null,
			$varPracticaDeporteCual = null,
			$varSuccionDedo = null,
			$varMorderseUnas = null,
			$varMorderseLabios = null,
			$varDuermeBocaAbierta = null,
			$varRechinarDientes = null,
			$varDolorCabezaFrecuente = null,
			$varPadeceEnfermedadActualmente = null,
			$varPadeceEnfermedadActualmenteCual = null,
			$varRecibiendoMedicamento = null,
			$varRecibiendoMedicamentoCual = null,
			$varDesordenesEmocionales = null,
			$varSangradoPersistente = null,
			$varHepatitis = null,
			$varHemofilia = null,
			$varFiebreReumatica = null,
			$varConvulsiones = null,
			$varObstruccionNasalCronica = null,
			$varAccidentesCabezaCara = null,
			$varAccidentesCabezaCaraCuando = null,
			$varAlergico = null,
			$varAlergicoQue = null,
			$varInfeccionesFrecuentesGarganta = null,
			$varOperadoAmigdalas = null,
			$varOperadoAmigdalasCuando = null,
			$varAdenoides = null,
			$varAdenoidesCuando = null,
			$varAusentesCongenitamente = null,
			$varSupernumerarios = null,
			$varMalformados = null,
			$varLesionesPeriapicales = null,
			$varQuistes = null,
			$varIncluidos = null,
			$varRaicesAnormales = null,
			$varResorcionRadicular = null,
			$varTercerosMolares = null,
			$varTraumatismos = null,
			$varOtrasPatologias = null,
			$varRiesgo = null,
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
			$varDiagnosticoIntegral1 = null,
			$varDiagnosticoIntegral2 = null,
			$varDiagnosticoIntegral3 = null,
			$varDiagnosticoIntegral4 = null,
			$varDiagnosticoIntegral5 = null,
			$varDiagnosticoIntegral6 = null,
			$varPrevencion = null,
			$varOperacion = null,
			$varOrtodonciaPreventiva = null,
			$varCita1 = null,
			$varCita2 = null,
			$varCita3 = null,
			$varCita4 = null,
			$varCita5 = null,
			$varCita6 = null,
			$varCita7 = null,
			$varCita8 = null,
			$varCita9 = null,
			$varCita10 = null,
			$varCita11 = null,
			$varAprobado = null,
			$varEstatus = null,
			$varFechaRegistro = null
		)
		{
			$this->IdHistoriaClinicaPediatrica = $varIdHistoriaClinicaPediatrica;
			$this->IdParejaClinica = $varIdParejaClinica;
			$this->Paciente = $varPaciente;
			$this->Calle = $varCalle;
			$this->Numero = $varNumero;
			$this->Colonia = $varColonia;
			$this->Poblacion = $varPoblacion;
			$this->Telefono = $varTelefono;
			$this->Ocupacion = $varOcupacion;
			$this->CodigoPostal = $varCodigoPostal;
			$this->Escuela = $varEscuela;
			$this->GradoEscolar = $varGradoEscolar;
			$this->NumHermanos = $varNumHermanos;
			$this->NombrePadre = $varNombrePadre;
			$this->OcupacionPadre = $varOcupacionPadre;
			$this->TelefonoPadre = $varTelefonoPadre;
			$this->NombreMedico = $varNombreMedico;
			$this->Peso = $varPeso;
			$this->Estatura = $varEstatura;
			$this->TA = $varTA;
			$this->Temp = $varTemp;
			$this->Conducta = $varConducta;
			$this->EstadoActualSalud = $varEstadoActualSalud;
			$this->EnfermedadesProlongadas = $varEnfermedadesProlongadas;
			$this->UltimoExamenFisico = $varUltimoExamenFisico;
			$this->RecibeAtencionMedica = $varRecibeAtencionMedica;
			$this->RecibeAtencionMedicaPorque = $varRecibeAtencionMedicaPorque;
			$this->Operaciones = $varOperaciones;
			$this->RecibidoTratamientoDental = $varRecibidoTratamientoDental;
			$this->Anestesiado = $varAnestesiado;
			$this->EfectosAnestesia = $varEfectosAnestesia;
			$this->OclusionMolaresDer = $varOclusionMolaresDer;
			$this->OclusionMolaresIzq = $varOclusionMolaresIzq;
			$this->SobremordidaVert = $varSobremordidaVert;
			$this->SobremordidaHor = $varSobremordidaHor;
			$this->MordidaAbierta = $varMordidaAbierta;
			$this->ErupcionTardia = $varErupcionTardia;
			$this->DientesAusentes = $varDientesAusentes;
			$this->PerdidaPrematura = $varPerdidaPrematura;
			$this->PerdidaProlongada = $varPerdidaProlongada;
			$this->MordidaCruzadaPost = $varMordidaCruzadaPost;
			$this->MordidaCruzadaAnt = $varMordidaCruzadaAnt;
			$this->EstadoPeriodontal = $varEstadoPeriodontal;
			$this->Fistula = $varFistula;
			$this->Gingivitis = $varGingivitis;
			$this->Habitos = $varHabitos;
			$this->DolorCabeza = $varDolorCabeza;
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
			$this->MotivoConsulta = $varMotivoConsulta;
			$this->AtendidoConsultarioDental = $varAtendidoConsultarioDental;
			$this->ExperienciaDentalPrevia = $varExperienciaDentalPrevia;
			$this->PracticaDeporte = $varPracticaDeporte;
			$this->PracticaDeporteCual = $varPracticaDeporteCual;
			$this->SuccionDedo = $varSuccionDedo;
			$this->MorderseUnas = $varMorderseUnas;
			$this->MorderseLabios = $varMorderseLabios;
			$this->DuermeBocaAbierta = $varDuermeBocaAbierta;
			$this->RechinarDientes = $varRechinarDientes;
			$this->DolorCabezaFrecuente = $varDolorCabezaFrecuente;
			$this->PadeceEnfermedadActualmente = $varPadeceEnfermedadActualmente;
			$this->PadeceEnfermedadActualmenteCual = $varPadeceEnfermedadActualmenteCual;
			$this->RecibiendoMedicamento = $varRecibiendoMedicamento;
			$this->RecibiendoMedicamentoCual = $varRecibiendoMedicamentoCual;
			$this->DesordenesEmocionales = $varDesordenesEmocionales;
			$this->SangradoPersistente = $varSangradoPersistente;
			$this->Hepatitis = $varHepatitis;
			$this->Hemofilia = $varHemofilia;
			$this->FiebreReumatica = $varFiebreReumatica;
			$this->Convulsiones = $varConvulsiones;
			$this->ObstruccionNasalCronica = $varObstruccionNasalCronica;
			$this->AccidentesCabezaCara = $varAccidentesCabezaCara;
			$this->AccidentesCabezaCaraCuando = $varAccidentesCabezaCaraCuando;
			$this->Alergico = $varAlergico;
			$this->AlergicoQue = $varAlergicoQue;
			$this->InfeccionesFrecuentesGarganta = $varInfeccionesFrecuentesGarganta;
			$this->OperadoAmigdalas = $varOperadoAmigdalas;
			$this->OperadoAmigdalasCuando = $varOperadoAmigdalasCuando;
			$this->Adenoides = $varAdenoides;
			$this->AdenoidesCuando = $varAdenoidesCuando;
			$this->AusentesCongenitamente = $varAusentesCongenitamente;
			$this->Supernumerarios = $varSupernumerarios;
			$this->Malformados = $varMalformados;
			$this->LesionesPeriapicales = $varLesionesPeriapicales;
			$this->Quistes = $varQuistes;
			$this->Incluidos = $varIncluidos;
			$this->RaicesAnormales = $varRaicesAnormales;
			$this->ResorcionRadicular = $varResorcionRadicular;
			$this->TercerosMolares = $varTercerosMolares;
			$this->Traumatismos = $varTraumatismos;
			$this->OtrasPatologias = $varOtrasPatologias;
			$this->Riesgo = $varRiesgo;
			$this->Pregunta1 = $varPregunta1;
			$this->Pregunta2 = $varPregunta2;
			$this->Pregunta3 = $varPregunta3;
			$this->Pregunta4 = $varPregunta4;
			$this->Pregunta5 = $varPregunta5;
			$this->Pregunta6 = $varPregunta6;
			$this->Pregunta7 = $varPregunta7;
			$this->Pregunta8 = $varPregunta8;
			$this->Pregunta9 = $varPregunta9;
			$this->Pregunta10 = $varPregunta10;
			$this->Pregunta11 = $varPregunta11;
			$this->DiagnosticoIntegral1 = $varDiagnosticoIntegral1;
			$this->DiagnosticoIntegral2 = $varDiagnosticoIntegral2;
			$this->DiagnosticoIntegral3 = $varDiagnosticoIntegral3;
			$this->DiagnosticoIntegral4 = $varDiagnosticoIntegral4;
			$this->DiagnosticoIntegral5 = $varDiagnosticoIntegral5;
			$this->DiagnosticoIntegral6 = $varDiagnosticoIntegral6;
			$this->Prevencion = $varPrevencion;
			$this->Operacion = $varOperacion;
			$this->OrtodonciaPreventiva = $varOrtodonciaPreventiva;
			$this->Cita1 = $varCita1;
			$this->Cita2 = $varCita2;
			$this->Cita3 = $varCita3;
			$this->Cita4 = $varCita4;
			$this->Cita5 = $varCita5;
			$this->Cita6 = $varCita6;
			$this->Cita7 = $varCita7;
			$this->Cita8 = $varCita8;
			$this->Cita9 = $varCita9;
			$this->Cita10 = $varCita10;
			$this->Cita11 = $varCita11;
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
                        FROM SIS_Listado_Historia_Clinica_Pediatrica;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Pediatrica
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
						<td><a href="formatohistoriaclinicapediatrica-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaPediatrica']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaclinicapediatrica-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaPediatrica']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas pediatrica registradas todavía.":"No se encontro ningún formato de historias clinicas pediatrica en la busqueda."); ?></td>
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
                        FROM SIS_Listado_Historia_Clinica_Pediatrica
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Pediatrica
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
                        <td><a href="formatohistoriaclinicapediatrica-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaPediatrica']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>									<td><a href="reportes/formatohistoriaclinicapediatrica-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaPediatrica']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de pediatrica registradas todavía.":"No se encontro ningún formato de historias clinicas de pediatrica en la busqueda."); ?></td>
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
                        FROM SIS_Listado_Historia_Clinica_Pediatrica
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Pediatrica
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
						<td><a href="formatohistoriaclinicapediatrica-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaPediatrica']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>								        <td><a href="reportes/formatohistoriaclinicapediatrica-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaPediatrica']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas de pediatrica registradas todavía.":"No se encontro ningún formato de historias clinicas de pediatrica en la busqueda."); ?></td>
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
			$SQL = "CALL Formato_Historia_Clinica_Pediatrica_Alta(
                        '$this->IdParejaClinica',
                        '$this->Paciente',
                        '$this->Calle',
			'$this->Numero',
			'$this->Colonia',
			'$this->Poblacion',
			'$this->Telefono',
			'$this->Ocupacion',
			'$this->CodigoPostal',
			'$this->Escuela',
			'$this->GradoEscolar',
			'$this->NumHermanos',
			'$this->NombrePadre',
			'$this->OcupacionPadre',
			'$this->TelefonoPadre',
			'$this->NombreMedico',
			'$this->Peso',
			'$this->Talla',
			'$this->TA',
			'$this->Temp',
			'$this->Conducta',
			'$this->EstadoActualSalud',
			'$this->EnfermedadesProlongadas',
			'$this->UltimoExamenFisico',
			'$this->RecibeAtencionMedica',
			'$this->RecibeAtencionMedicaPorque',
			'$this->Operaciones',
			'$this->RecibidoTratamientoDental',
			'$this->Anestesiado',
			'$this->EfectosAnestesia',
			'$this->OclusionMolaresDer',
			'$this->OclusionMolaresIzq',
			'$this->SobremordidaVert',
			'$this->SobremordidaHor',
			'$this->MordidaAbierta',
			'$this->ErupcionTardia',
			'$this->DientesAusentes',
			'$this->PerdidaPrematura',
			'$this->PerdidaProlongada',
			'$this->MordidaCruzadaPost',
			'$this->MordidaCruzadaAnt',
			'$this->EstadoPeriodontal',
			'$this->Fistula',
			'$this->Gingivitis',
			'$this->Habitos',
			'$this->DolorCabeza',
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
			'$this->MotivoConsulta',
			'$this->AtendidoConsultarioDental',
			'$this->ExperienciaDentalPrevia',
			'$this->PracticaDeporte',
			'$this->PracticaDeporteCual',
			'$this->SuccionDedo',
			'$this->MorderseUnas',
			'$this->MorderseLabios',
			'$this->DuermeBocaAbierta',
			'$this->RechinarDientes',
			'$this->DolorCabezaFrecuente',
			'$this->PadeceEnfermedadActualmente',
			'$this->PadeceEnfermedadActualmenteCual',
			'$this->RecibiendoMedicamento',
			'$this->RecibiendoMedicamentoCual',
			'$this->DesordenesEmocionales',
			'$this->SangradoPersistente',
			'$this->Hepatitis',
			'$this->Hemofilia',
			'$this->FiebreReumatica',
			'$this->Convulsiones',
			'$this->ObstruccionNasalCronica',
			'$this->AccidentesCabezaCara',
			'$this->AccidentesCabezaCaraCuando',
			'$this->Alergico',
			'$this->AlergicoQue',
			'$this->InfeccionesFrecuentesGarganta',
			'$this->OperadoAmigdalas',
			'$this->OperadoAmigdalasCuando',
			'$this->Adenoides',
			'$this->AdenoidesCuando',
			'$this->AusentesCongenitamente',
			'$this->Supernumerarios',
			'$this->Malformados',
			'$this->LesionesPeriapicales',
			'$this->Quistes',
			'$this->Incluidos',
			'$this->RaicesAnormales',
			'$this->ResorcionRadicular',
			'$this->TercerosMolares',
			'$this->Traumatismos',
			'$this->OtrasPatologias',
			'$this->Riesgo',
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
			'$this->DiagnosticoIntegral1',
			'$this->DiagnosticoIntegral2',
			'$this->DiagnosticoIntegral3',
			'$this->DiagnosticoIntegral4',
			'$this->DiagnosticoIntegral5',
			'$this->DiagnosticoIntegral6',
			'$this->Prevencion',
			'$this->Operacion',
			'$this->OrtodonciaPreventiva',
			'$this->Cita1',
			'$this->Cita2',
			'$this->Cita3',
			'$this->Cita4',
			'$this->Cita5',
			'$this->Cita6',
			'$this->Cita7',
			'$this->Cita8',
			'$this->Cita9',
			'$this->Cita10',
			'$this->Cita11'                     
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{ 
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo el llenado de una historia clinica pediatrica",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaclinicapediatrica.php?exito=Se guardo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaclinicapediatrica.php?error=Ocurrio un error. '.mysqli_error($Conexion));
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
                        FROM SIS_Listado_Historia_Clinica_Pediatrica;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Pediatrica
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas pediatrica registradas todavía.":"No se encontro ningún formato de historias clinicas pediatrica en la busqueda."); ?></td>
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
                        FROM SIS_Listado_Historia_Clinica_Pediatrica
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Pediatrica
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas pediatrica registradas todavía.":"No se encontro ningún formato de historias clinicas pediatrica en la busqueda."); ?></td>
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
                        FROM SIS_Listado_Historia_Clinica_Pediatrica                         WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Pediatrica
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas pediatrica registradas todavía.":"No se encontro ningún formato de historias clinicas pediatrica en la busqueda."); ?></td>
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
                    FROM SIS_Listado_Historia_Clinica_Pediatrica
                    WHERE IdHistoriaClinicaPediatrica = '$this->IdHistoriaClinicaPediatrica';";
            
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