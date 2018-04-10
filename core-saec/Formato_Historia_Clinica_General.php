<?php class Formato_Historia_Clinica_General extends AccesoBD
	{
		public $IdHistoriaClinicaGeneral;
		public $IdParejaClinica;
        public $Paciente;
        public $Telefono;
        public $Email;
        public $Calle;
        public $Numero;
        public $Colonia;
        public $Poblacion;
        public $Padecimiento_Actual;
        public $Diabetes;
        public $Observaciones_1;
        public $Cardiopatias;
        public $Observaciones_2;
        public $Hipertension;
        public $Observaciones_3;
        public $Obesidad;
        public $Observaciones_4;
        public $Cancer;
        public $Observaciones_5;
        public $Sifilis;
        public $Observaciones_6;
        public $Anomalias_Congenitas;
        public $Observaciones_7;
        public $Trastornos_Hematicos;
        public $Observaciones_8;
        public $Otros;
        public $Observaciones_9;
        public $Habitacion;
        public $Observaciones_10;
        public $Alimentacion;
        public $Observaciones_11;
        public $Higiene;
        public $Observaciones_12;
        public $Alcoholismo;
        public $Observaciones_13;
        public $Tabaquismo;
        public $Observaciones_14;
        public $Toxicomania;
        public $Observaciones_15;
        public $Diabetes_2;
        public $Observaciones_16;
        public $Hipertension_2;
        public $Observaciones_17;
        public $Gastritis;
        public $Observaciones_18;
        public $Hepatitis;
        public $Observaciones_19;
        public $Hipertiroidismo;
        public $Observaciones_20;
        public $Hemorragias;
        public $Observaciones_21;
        public $Epilepsia;
        public $Observaciones_22;
        public $Alergias;
        public $Observaciones_23;
        public $Transfuciones;
        public $Observaciones_24;
        public $Quirurgico;
        public $Observaciones_25;
        public $Otros_2;
        public $Observaciones_26;
        public $Mercarca;
        public $Observaciones_27;
        public $Ritmo;
        public $Observaciones_28;
        public $Usa;
        public $Observaciones_29;
        public $Gesta;
        public $Observaciones_30;
        public $Para;
        public $Observaciones_31;
        public $Aborto;
        public $Observaciones_32;
        public $Cesarea;
        public $Observaciones_33;
        public $Fur;
        public $Observaciones_34;
        public $Menopausia;
        public $Observaciones_35;
        public $Doc;
        public $Observaciones_36;
        public $Planificacion_Familiar;
        public $Observaciones_37;
        public $Anorexia;
        public $Observaciones_38;
        public $Polifagia;
        public $Observaciones_39;
        public $Polidipsia;
        public $Observaciones_40;
        public $Halitosis;
        public $Observaciones_41;
        public $Sialorrea;
        public $Observaciones_42;
        public $Xerostomia;
        public $Observaciones_43;
        public $Disfagia;
        public $Observaciones_44;
        public $Odinofagia;
        public $Observaciones_45;
        public $Dolor_Abdominal;
        public $Observaciones_46;
        public $Hematemesis;
        public $Observaciones_47;
        public $Pirosis;
        public $Observaciones_48;
        public $Vomito;
        public $Observaciones_49;
        public $Flatulencia;
        public $Observaciones_50;
        public $Ictericia;
        public $Observaciones_51;
        public $Rectorragia;
        public $Observaciones_52;
        public $Melena;
        public $Observaciones_53;
        public $Prurito_Anal;
        public $Observaciones_54;
        public $Dolor_Precordial;
        public $Observaciones_55;
        public $Disnea;
        public $Observaciones_56;
        public $Ortopnea;
        public $Observaciones_57;
        public $Acufenos;
        public $Observaciones_58;
        public $Forfenos;
        public $Observaciones_59;
        public $Vertigos;
        public $Observaciones_60;
        public $Cefalea;
        public $Observaciones_61;
        public $Palpitaciones;
        public $Observaciones_62;
        public $Parestesias;
        public $Observaciones_63;
        public $Cianosis;
        public $Observaciones_64;
        public $Edema;
        public $Observaciones_65;
        public $Bochorno;
        public $Observaciones_66;
        public $Lipotimias;
        public $Observaciones_67;
        public $Cambios_Piel;
        public $Observaciones_68;
        public $Epistaxis;
        public $Observaciones_69;
        public $Disnea_2;
		public $Observaciones_70;
        public $Tos;
        public $Observaciones_71;
        public $Hemoptisis;
        public $Observaciones_72;
        public $Sibilancias;
        public $Observaciones_73;
        public $Dolor;
        public $Observaciones_74;
        public $Respiracion_Bucal_Nasal;
        public $Observaciones_75;
        public $Nictamero;
        public $Observaciones_76;
        public $Disuria;
        public $Observaciones_77;
        public $Poliuria;
        public $Observaciones_78;
        public $Poliarquiuria;
        public $Observaciones_79;
        public $Hematuria;
        public $Observaciones_80;
        public $Algiuria;
        public $Observaciones_81;
        public $Caso_Fememino;
        public $Observaciones_82;
        public $Caso_Masculino;
        public $Observaciones_83;
        public $Fiebre_Larga;
        public $Observaciones_84;
        public $Palidez;
        public $Observaciones_85;
        public $Edema_2;
        public $Observaciones_86;
        public $Hemorragia;
        public $Observaciones_87;
        public $Petequias;
        public $Observaciones_88;
        public $Equimosis;
        public $Observaciones_89;
        public $Hematomas;
        public $Observaciones_90;
        public $Perdida_Aumento_Peso;
        public $Observaciones_91;
        public $Nerviosismo;
        public $Observaciones_92;
        public $Alteraciones_Menstruacion;
        public $Observaciones_93;
        public $Pilificacion;
        public $Observaciones_94;
        public $Convulsiones;
        public $Observaciones_95;
        public $Cefaleas;
        public $Observaciones_96;
        public $Parestesias_2;
        public $Observaciones_97;
        public $Anestesias;
        public $Observaciones_98;
        public $Paresias;
        public $Observaciones_99;
        public $Paralisis;
        public $Observaciones_100;
        public $Vertigos_2;
        public $Observaciones_101;
        public $Hiperestesias;
        public $Observaciones_102;
        public $Angustia;
        public $Observaciones_103;
        public $Ansiedad;
        public $Observaciones_104;
        public $Otalgias;
        public $Observaciones_105;
        public $Otorrea;
        public $Observaciones_106;
        public $Otorragia;
        public $Observaciones_107;
        public $Acufenos_2;
        public $Observaciones_108;
        public $Vertigos_3;
        public $Observaciones_109;
        public $Fosfenos;
        public $Observaciones_110;
        public $Agudeza_Visual;
        public $Observaciones_111;
        public $Fotofobia;
        public $Observaciones_112;
        public $Lagrimeo;
        public $Observaciones_113;
        public $Secreciones;
        public $Observaciones_114;
        public $Parosmia;
        public $Observaciones_115;
        public $Hipersmia;
        public $Observaciones_116;
        public $Secreciones_2;
        public $Observaciones_117;
        public $Prurito;
        public $Observaciones_118;
        public $Epistaxis_2;
        public $Observaciones_119;
        public $Dolor_Nasal;
        public $Observaciones_120;
        public $Hipergeusia;
        public $Observaciones_121;
        public $Parageusia;
        public $Observaciones_122;
        public $Ageusia;
        public $Observaciones_123;
        public $Glosalgia;
        public $Observaciones_124;
        public $Glosodinia;
        public $Observaciones_125;
        public $Examen_Laboratorio;
        public $Terapeutica;
        public $Frecuencia_Cardiaca;
        public $Temperatura;
        public $Pulso;
        public $Respiracion;
        public $Tension_Arterial;
	public $Somatometria_Peso;
        public $Somatometria_Estatura;
        public $Craneo_Tamano;
        public $Craneo_Contorno;
        public $Craneo_Implantacion_Cabello;
        public $Craneo_Deformidades;
        public $Craneo_Exostosis;
        public $Craneo_Endostosis;
        public $Cara_Expresion_Facial;
        public $Cara_Simetria;
        public $Cara_Movimientos_Involuntarios;
        public $Cara_Edemas;
        public $Cara_Masas;
        public $Oidos;
        public $Ojos;
        public $Nariz;
        public $Anestesicos_Bucales;
        public $Pregunta_1;
        public $Region_Anterior;
        public $Region_Lateral;
        public $Region_Mejillas;
        public $Paladar_Duro;
        public $Paladar_Blando;
        public $Region_Inferior;
        public $Piso_Boca;
        public $Pilar_Anterior;
        public $Pilar_Posterior;
        public $Amigdalas;
        public $Faringe;
        public $Region_Gingival;
        public $Encia_Insertada_Adherida;
        public $Mucosa;
        public $Proceso_Alveolar;
        public $Aumento_Volumen;
        public $Masas;
        public $Cantidad_Saliva;
        public $Calidad_Saliva;
        public $Palpitacion_ATM_I;
        public $Palpitacion_ATM_D;
        public $Apertura_Cierre_I;
        public $Apertura_Cierre_D;
        public $Protrusiva_I;
        public $Protrusiva_D;
        public $Retrusiva_I;
        public $Retrusiva_D;
        public $Lateralidades_I;
        public $Lateralidades_D;
        public $Lado_Trabajo_I;
        public $Lado_Trabajo_D;
        public $Lado_Balance_I;
        public $Lado_Balance_D;
        public $Temporal;
        public $Masetero;
        public $Pterigoideo_Externo;
        public $Pterigoideo_Interno;
        public $Observaciones_126;    
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
        public $Examen_Oclusal;
        public $Abrasiones;
        public $Atriciones;
        public $Apinamiento;
        public $Mordida_Cruzada;
        public $Malposiciones_Individuales;
        public $Diastemas;
        public $Linea_Medida;
        public $Examen_Radiografico;
        public $Cuello_Forma;
        public $Cuello_Volumen;
        public $Cuello_Movimientos;
        public $Cuello_Ganglios;
        public $Cuello_Traquea;
        public $Cuello_Tiroides;
        public $Cuello_Masas;
        public $Cuello_Pulsos;
        public $Cuello_Carotideos;
        public $Cuello_Ingurgitacion_Yugular;
        public $Torax;
        public $Abdomen;
        public $Miembro_Superior_Inferior;
        public $Observaciones_Medicas;
        public $Diagnostico_Bucal;
        public $Pronostico_Favorable;
        public $Pronostico_Desfavorable;
        public $Pronostico_Reservado; 
        public $Pronostico_Porque;
        public $Pronostico_Para_Quien;
        public $Pronostico_Plan_Tratamiento;
        public $Aprobado;
        public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdHistoriaClinicaGeneral = null,
            $varIdParejaClinica = null,
            $varPaciente = null,
            $varTelefono = null,
            $varEmail = null,
            $varCalle = null,
            $varNumero = null,
            $varColonia = null,
            $varPoblacion = null,
            $varPadecimiento_Actual = null,
            $varDiabetes = null,
            $varObservaciones_1 = null,
            $varCardiopatias = null,
            $varObservaciones_2 = null,
            $varHipertension = null,
            $varObservaciones_3 = null,
            $varObesidad = null,
            $varObservaciones_4 = null,
            $varCancer = null,
            $varObservaciones_5 = null,
            $varSifilis = null,
            $varObservaciones_6 = null,
            $varAnomalias_Congenitas = null,
            $varObservaciones_7 = null,
            $varTrastornos_Hematicos = null,
            $varObservaciones_8 = null,
            $varOtros = null,
            $varObservaciones_9 = null,
            $varHabitacion = null,
            $varObservaciones_10 = null,
            $varAlimentacion = null,
            $varObservaciones_11 = null,
            $varHigiene = null,
            $varObservaciones_12 = null,
            $varAlcoholismo = null,
            $varObservaciones_13 = null,
            $varTabaquismo = null,
            $varObservaciones_14 = null,
            $varToxicomania = null,
            $varObservaciones_15 = null,
            $varDiabetes_2 = null,
            $varObservaciones_16 = null,
            $varHipertension_2 = null,
            $varObservaciones_17 = null,
            $varGastritis = null,
            $varObservaciones_18 = null,
            $varHepatitis = null,
            $varObservaciones_19 = null,
            $varHipertiroidismo = null,
            $varObservaciones_20 = null,
            $varHemorragias = null,
            $varObservaciones_21 = null,
            $varEpilepsia = null,
            $varObservaciones_22 = null,
            $varAlergias = null,
            $varObservaciones_23 = null,
            $varTransfuciones = null,
            $varObservaciones_24 = null,
            $varQuirurgico = null,
            $varObservaciones_25 = null,
            $varOtros_2 = null,
            $varObservaciones_26 = null,
            $varMercarca = null,
            $varObservaciones_27 = null,
            $varRitmo = null,
            $varObservaciones_28 = null,
            $varUsa = null,
            $varObservaciones_29 = null,
            $varGesta = null,
            $varObservaciones_30 = null,
            $varPara = null,
            $varObservaciones_31 = null,
            $varAborto = null,
            $varObservaciones_32 = null,
            $varCesarea = null,
            $varObservaciones_33 = null,
            $varFur = null,
            $varObservaciones_34 = null,
            $varMenopausia = null,
            $varObservaciones_35 = null,
            $varDoc = null,
            $varObservaciones_36 = null,
            $varPlanificacion_Familiar = null,
            $varObservaciones_37 = null,
            $varAnorexia = null,
            $varObservaciones_38 = null,
            $varPolifagia = null,
            $varObservaciones_39 = null,
            $varPolidipsia = null,
            $varObservaciones_40 = null,
            $varHalitosis = null,
            $varObservaciones_41 = null,
            $varSialorrea = null,
            $varObservaciones_42 = null,
            $varXerostomia = null,
            $varObservaciones_43 = null,
            $varDisfagia = null,
            $varObservaciones_44 = null,
            $varOdinofagia = null,
            $varObservaciones_45 = null,
            $varDolor_Abdominal = null,
            $varObservaciones_46 = null,
            $varHematemesis = null,
            $varObservaciones_47 = null,
            $varPirosis = null,
            $varObservaciones_48 = null,
            $varVomito = null,
            $varObservaciones_49 = null,
            $varFlatulencia = null,
            $varObservaciones_50 = null,
            $varIctericia = null,
            $varObservaciones_51 = null,
            $varRectorragia = null,
            $varObservaciones_52 = null,
            $varMelena = null,
            $varObservaciones_53 = null,
            $varPrurito_Anal = null,
            $varObservaciones_54 = null,
            $varDolor_Precordial = null,
            $varObservaciones_55 = null,
            $varDisnea = null,
            $varObservaciones_56 = null,
            $varOrtopnea = null,
            $varObservaciones_57 = null,
            $varAcufenos = null,
            $varObservaciones_58 = null,
            $varForfenos = null,
            $varObservaciones_59 = null,
            $varVertigos = null,
            $varObservaciones_60 = null,
            $varCefalea = null,
            $varObservaciones_61 = null,
            $varPalpitaciones = null,
            $varObservaciones_62 = null,
            $varParestesias = null,
            $varObservaciones_63 = null,
            $varCianosis = null,
            $varObservaciones_64 = null,
            $varEdema = null,
            $varObservaciones_65 = null,
            $varBochorno = null,
            $varObservaciones_66 = null,
            $varLipotimias = null,
            $varObservaciones_67 = null,
            $varCambios_Piel = null,
            $varObservaciones_68 = null,
            $varEpistaxis = null,
            $varObservaciones_69 = null,
            $varDisnea_2 = null,
			$varObservaciones_70 = null,
            $varTos = null,
            $varObservaciones_71 = null,
            $varHemoptisis = null,
            $varObservaciones_72 = null,
            $varSibilancias = null,
            $varObservaciones_73 = null,
            $varDolor = null,
            $varObservaciones_74 = null,
            $varRespiracion_Bucal_Nasal = null,
            $varObservaciones_75 = null,
            $varNictamero = null,
            $varObservaciones_76 = null,
            $varDisuria = null,
            $varObservaciones_77 = null,
            $varPoliuria = null,
            $varObservaciones_78 = null,
            $varPoliarquiuria = null,
            $varObservaciones_79 = null,
            $varHematuria = null,
            $varObservaciones_80 = null,
            $varAlgiuria = null,
            $varObservaciones_81 = null,
            $varCaso_Fememino = null,
            $varObservaciones_82 = null,
            $varCaso_Masculino = null,
            $varObservaciones_83 = null,
            $varFiebre_Larga = null,
            $varObservaciones_84 = null,
            $varPalidez = null,
            $varObservaciones_85 = null,
            $varEdema_2 = null,
            $varObservaciones_86 = null,
            $varHemorragia = null,
            $varObservaciones_87 = null,
            $varPetequias = null,
            $varObservaciones_88 = null,
            $varEquimosis = null,
            $varObservaciones_89 = null,
            $varHematomas = null,
            $varObservaciones_90 = null,
            $varPerdida_Aumento_Peso = null,
            $varObservaciones_91 = null,
            $varNerviosismo = null,
            $varObservaciones_92 = null,
            $varAlteraciones_Menstruacion = null,
            $varObservaciones_93 = null,
            $varPilificacion = null,
            $varObservaciones_94 = null,
            $varConvulsiones = null,
            $varObservaciones_95 = null,
            $varCefaleas = null,
            $varObservaciones_96 = null,
            $varParestesias_2 = null,
            $varObservaciones_97 = null,
            $varAnestesias = null,
            $varObservaciones_98 = null,
            $varParesias = null,
            $varObservaciones_99 = null,
            $varParalisis = null,
            $varObservaciones_100 = null,
            $varVertigos_2 = null,
            $varObservaciones_101 = null,
            $varHiperestesias = null,
            $varObservaciones_102 = null,
            $varAngustia = null,
            $varObservaciones_103 = null,
            $varAnsiedad = null,
            $varObservaciones_104 = null,
            $varOtalgias = null,
            $varObservaciones_105 = null,
            $varOtorrea = null,
            $varObservaciones_106 = null,
            $varOtorragia = null,
            $varObservaciones_107 = null,
            $varAcufenos_2 = null,
            $varObservaciones_108 = null,
            $varVertigos_3 = null,
            $varObservaciones_109 = null,
            $varFosfenos = null,
            $varObservaciones_110 = null,
            $varAgudeza_Visual = null,
            $varObservaciones_111 = null,
            $varFotofobia = null,
            $varObservaciones_112 = null,
            $varLagrimeo = null,
            $varObservaciones_113 = null,
            $varSecreciones = null,
            $varObservaciones_114 = null,
            $varParosmia = null,
            $varObservaciones_115 = null,
            $varHipersmia = null,
            $varObservaciones_116 = null,
            $varSecreciones_2 = null,
            $varObservaciones_117 = null,
            $varPrurito = null,
            $varObservaciones_118 = null,
            $varEpistaxis_2 = null,
            $varObservaciones_119 = null,
            $varDolor_Nasal = null,
            $varObservaciones_120 = null,
            $varHipergeusia = null,
            $varObservaciones_121 = null,
            $varParageusia = null,
            $varObservaciones_122 = null,
            $varAgeusia = null,
            $varObservaciones_123 = null,
            $varGlosalgia = null,
            $varObservaciones_124 = null,
            $varGlosodinia = null,
            $varObservaciones_125 = null,
            $varExamen_Laboratorio = null,
            $varTerapeutica = null,
            $varFrecuencia_Cardiaca = null,
            $varTemperatura = null,
            $varPulso = null,
            $varRespiracion = null,
            $varTension_Arterial = null,
	    $varSomatometria_Peso = null,
	    $varSomatometria_Estatura = null,
            $varCraneo_Tamano = null,
            $varCraneo_Contorno = null,
            $varCraneo_Implantacion_Cabello = null,
            $varCraneo_Deformidades = null,
            $varCraneo_Exostosis = null,
            $varCraneo_Endostosis = null,
            $varCara_Expresion_Facial = null,
            $varCara_Simetria = null,
            $varCara_Movimientos_Involuntarios = null,
            $varCara_Edemas = null,
            $varCara_Masas = null,
            $varOidos = null,
            $varOjos = null,
            $varNariz = null,
            $varAnestesicos_Bucales = null,
            $varPregunta_1 = null,
            $varRegion_Anterior = null,
            $varRegion_Lateral = null,
            $varRegion_Mejillas = null,
            $varPaladar_Duro = null,
            $varPaladar_Blando = null,
            $varRegion_Inferior = null,
            $varPiso_Boca = null,
            $varPilar_Anterior = null,
            $varPilar_Posterior = null,
            $varAmigdalas = null,
            $varFaringe = null,
            $varRegion_Gingival = null,
            $varEncia_Insertada_Adherida = null,
            $varMucosa = null,
            $varProceso_Alveolar = null,
            $varAumento_Volumen = null,
            $varMasas = null,
            $varCantidad_Saliva = null,
            $varCalidad_Saliva = null,
            $varPalpitacion_ATM_I = null,
            $varPalpitacion_ATM_D = null,
            $varApertura_Cierre_I = null,
            $varApertura_Cierre_D = null,
            $varProtrusiva_I = null,
            $varProtrusiva_D = null,
            $varRetrusiva_I = null,
            $varRetrusiva_D = null,
            $varLateralidades_I = null,
            $varLateralidades_D = null,
            $varLado_Trabajo_I = null,
            $varLado_Trabajo_D = null,
            $varLado_Balance_I = null,
            $varLado_Balance_D = null,
            $varTemporal = null,
            $varMasetero = null,
            $varPterigoideo_Externo = null,
            $varPterigoideo_Interno = null,
            $varObservaciones_126 = null,    
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
            $varExamen_Oclusal = null,
            $varAbrasiones = null,
            $varAtriciones = null,
            $varApinamiento = null,
            $varMordida_Cruzada = null,
            $varMalposiciones_Individuales = null,
            $varDiastemas = null,
            $varLinea_Medida = null,
            $varExamen_Radiografico = null,
            $varCuello_Forma = null,
            $varCuello_Volumen = null,
            $varCuello_Movimientos = null,
            $varCuello_Ganglios = null,
            $varCuello_Traquea = null,
            $varCuello_Tiroides = null,
            $varCuello_Masas = null,
            $varCuello_Pulsos = null,
            $varCuello_Carotideos = null,
            $varCuello_Ingurgitacion_Yugular = null,
            $varTorax = null,
            $varAbdomen = null,
            $varMiembro_Superior_Inferior = null,
            $varObservaciones_Medicas = null,
            $varDiagnostico_Bucal = null,
            $varPronostico_Favorable = null,
            $varPronostico_Desfavorable = null,
            $varPronostico_Reservado = null, 
            $varPronostico_Porque = null,
            $varPronostico_Para_Quien = null,
            $varPronostico_Plan_Tratamiento = null,
            $varAprobado = null,
            $varEstatus = null,
            $varFechaRegistro = null
		)
		{
			$this->IdHistoriaClinicaGeneral = $varIdHistoriaClinicaGeneral;
			$this->IdParejaClinica = $varIdParejaClinica;
			$this->Paciente = $varPaciente;
            $this->Telefono = $varTelefono;
            $this->Email = $varEmail;
            $this->Calle = $varCalle;
            $this->Numero = $varNumero;
            $this->Colonia = $varColonia;
            $this->Poblacion = $varPoblacion;
            $this->Padecimiento_Actual = $varPadecimiento_Actual;
            $this->Diabetes = $varDiabetes;
            $this->Observaciones_1 = $varObservaciones_1;
            $this->Cardiopatias = $varCardiopatias;
            $this->Observaciones_2 = $varObservaciones_2;
            $this->Hipertension = $varHipertension;
            $this->Observaciones_3 = $varObservaciones_3;
            $this->Obesidad = $varObesidad;
            $this->Observaciones_4 = $varObservaciones_4;
            $this->Cancer = $varCancer;
            $this->Observaciones_5 = $varObservaciones_5;
            $this->Sifilis = $varSifilis;
            $this->Observaciones_6 = $varObservaciones_6;
            $this->Anomalias_Congenitas = $varAnomalias_Congenitas;
            $this->Observaciones_7 = $varObservaciones_7;
            $this->Trastornos_Hematicos = $varTrastornos_Hematicos;
            $this->Observaciones_8 = $varObservaciones_8;
            $this->Otros = $varOtros;
            $this->Observaciones_9 = $varObservaciones_9;
            $this->Habitacion = $varHabitacion;
            $this->Observaciones_10 = $varObservaciones_10;
            $this->Alimentacion = $varAlimentacion;
            $this->Observaciones_11 = $varObservaciones_11;
            $this->Higiene = $varHigiene;
            $this->Observaciones_12 = $varObservaciones_12;
            $this->Alcoholismo = $varAlcoholismo;
            $this->Observaciones_13 = $varObservaciones_13;
            $this->Tabaquismo = $varTabaquismo;
            $this->Observaciones_14 = $varObservaciones_14;
            $this->Toxicomania = $varToxicomania;
            $this->Observaciones_15 = $varObservaciones_15;
            $this->Diabetes_2 = $varDiabetes_2;
            $this->Observaciones_16 = $varObservaciones_16;
            $this->Hipertension_2 = $varHipertension_2;
            $this->Observaciones_17 = $varObservaciones_17;
            $this->Gastritis = $varGastritis;
            $this->Observaciones_18 = $varObservaciones_18;
            $this->Hepatitis = $varHepatitis;
            $this->Observaciones_19 = $varObservaciones_19;
            $this->Hipertiroidismo = $varHipertiroidismo;
            $this->Observaciones_20 = $varObservaciones_20;
            $this->Hemorragias = $varHemorragias;
            $this->Observaciones_21 = $varObservaciones_21;
            $this->Epilepsia = $varEpilepsia;
            $this->Observaciones_22 = $varObservaciones_22;
            $this->Alergias = $varAlergias;
            $this->Observaciones_23 = $varObservaciones_23;
            $this->Transfuciones = $varTransfuciones;
            $this->Observaciones_24 = $varObservaciones_24;
            $this->Quirurgico = $varQuirurgico;
            $this->Observaciones_25 = $varObservaciones_25;
            $this->Otros_2 = $varOtros_2;
            $this->Observaciones_26 = $varObservaciones_26;
            $this->Mercarca = $varMercarca;
            $this->Observaciones_27 = $varObservaciones_27;
            $this->Ritmo = $varRitmo;
            $this->Observaciones_28 = $varObservaciones_28;
            $this->Usa = $varUsa;
            $this->Observaciones_29 = $varObservaciones_29;
            $this->Gesta = $varGesta;
            $this->Observaciones_30 = $varObservaciones_30;
            $this->Para = $varPara;
            $this->Observaciones_31 = $varObservaciones_31;
            $this->Aborto = $varAborto;
            $this->Observaciones_32 = $varObservaciones_32;
            $this->Cesarea = $varCesarea;
            $this->Observaciones_33 = $varObservaciones_33;
            $this->Fur = $varFur;
            $this->Observaciones_34 = $varObservaciones_34;
            $this->Menopausia = $varMenopausia;
            $this->Observaciones_35 = $varObservaciones_35;
            $this->Doc = $varDoc;
            $this->Observaciones_36 = $varObservaciones_36;
            $this->Planificacion_Familiar = $varPlanificacion_Familiar;
            $this->Observaciones_37 = $varObservaciones_37;
            $this->Anorexia = $varAnorexia;
            $this->Observaciones_38 = $varObservaciones_38;
            $this->Polifagia = $varPolifagia;
            $this->Observaciones_39 = $varObservaciones_39;
            $this->Polidipsia = $varPolidipsia;
            $this->Observaciones_40 = $varObservaciones_40;
            $this->Halitosis = $varHalitosis;
            $this->Observaciones_41 = $varObservaciones_41;
            $this->Sialorrea = $varSialorrea;
            $this->Observaciones_42 = $varObservaciones_42;
            $this->Xerostomia = $varXerostomia;
            $this->Observaciones_43 = $varObservaciones_43;
            $this->Disfagia = $varDisfagia;
            $this->Observaciones_44 = $varObservaciones_44;
            $this->Odinofagia = $varOdinofagia;
            $this->Observaciones_45 = $varObservaciones_45;
            $this->Dolor_Abdominal = $varDolor_Abdominal;
            $this->Observaciones_46 = $varObservaciones_46;
            $this->Hematemesis = $varHematemesis;
            $this->Observaciones_47 = $varObservaciones_47;
            $this->Pirosis = $varPirosis;
            $this->Observaciones_48 = $varObservaciones_48;
            $this->Vomito = $varVomito;
            $this->Observaciones_49 = $varObservaciones_49;
            $this->Flatulencia = $varFlatulencia;
            $this->Observaciones_50 = $varObservaciones_50;
            $this->Ictericia = $varIctericia;
            $this->Observaciones_51 = $varObservaciones_51;
            $this->Rectorragia = $varRectorragia;
            $this->Observaciones_52 = $varObservaciones_52;
            $this->Melena = $varMelena;
            $this->Observaciones_53 = $varObservaciones_53;
            $this->Prurito_Anal = $varPrurito_Anal;
            $this->Observaciones_54 = $varObservaciones_54;
            $this->Dolor_Precordial = $varDolor_Precordial;
            $this->Observaciones_55 = $varObservaciones_55;
            $this->Disnea = $varDisnea;
            $this->Observaciones_56 = $varObservaciones_56;
            $this->Ortopnea = $varOrtopnea;
            $this->Observaciones_57 = $varObservaciones_57;
            $this->Acufenos = $varAcufenos;
            $this->Observaciones_58 = $varObservaciones_58;
            $this->Forfenos = $varForfenos;
            $this->Observaciones_59 = $varObservaciones_59;
            $this->Vertigos = $varVertigos;
            $this->Observaciones_60 = $varObservaciones_60;
            $this->Cefalea = $varCefalea;
            $this->Observaciones_61 = $varObservaciones_61;
            $this->Palpitaciones = $varPalpitaciones;
            $this->Observaciones_62 = $varObservaciones_62;
            $this->Parestesias = $varParestesias;
            $this->Observaciones_63 = $varObservaciones_63;
            $this->Cianosis = $varCianosis;
            $this->Observaciones_64 = $varObservaciones_64;
            $this->Edema = $varEdema;
            $this->Observaciones_65 = $varObservaciones_65;
            $this->Bochorno = $varBochorno;
            $this->Observaciones_66 = $varObservaciones_66;
            $this->Lipotimias = $varLipotimias;
            $this->Observaciones_67 = $varObservaciones_67;
            $this->Cambios_Piel = $varCambios_Piel;
            $this->Observaciones_68 = $varObservaciones_68;
            $this->Epistaxis = $varEpistaxis;
            $this->Observaciones_69 = $varObservaciones_69;
            $this->Disnea_2 = $varDisnea_2;
			$this->Observaciones_70 = $varObservaciones_70;
            $this->Tos = $varTos;
            $this->Observaciones_71 = $varObservaciones_71;
            $this->Hemoptisis = $varHemoptisis;
            $this->Observaciones_72 = $varObservaciones_72;
            $this->Sibilancias = $varSibilancias;
            $this->Observaciones_73 = $varObservaciones_73;
            $this->Dolor = $varDolor;
            $this->Observaciones_74 = $varObservaciones_74;
            $this->Respiracion_Bucal_Nasal = $varRespiracion_Bucal_Nasal;
            $this->Observaciones_75 = $varObservaciones_75;
            $this->Nictamero = $varNictamero;
            $this->Observaciones_76 = $varObservaciones_76;
            $this->Disuria = $varDisuria;
            $this->Observaciones_77 = $varObservaciones_77;
            $this->Poliuria = $varPoliuria;
            $this->Observaciones_78 = $varObservaciones_78;
            $this->Poliarquiuria = $varPoliarquiuria;
            $this->Observaciones_79 = $varObservaciones_79;
            $this->Hematuria = $varHematuria;
            $this->Observaciones_80 = $varObservaciones_80;
            $this->Algiuria = $varAlgiuria;
            $this->Observaciones_81 = $varObservaciones_81;
            $this->Caso_Fememino = $varCaso_Fememino;
            $this->Observaciones_82 = $varObservaciones_82;
            $this->Caso_Masculino = $varCaso_Masculino;
            $this->Observaciones_83 = $varObservaciones_83;
            $this->Fiebre_Larga = $varFiebre_Larga;
            $this->Observaciones_84 = $varObservaciones_84;
            $this->Palidez = $varPalidez;
            $this->Observaciones_85 = $varObservaciones_85;
            $this->Edema_2 = $varEdema_2;
            $this->Observaciones_86 = $varObservaciones_86;
            $this->Hemorragia = $varHemorragia;
            $this->Observaciones_87 = $varObservaciones_87;
            $this->Petequias = $varPetequias;
            $this->Observaciones_88 = $varObservaciones_88;
            $this->Equimosis = $varEquimosis;
            $this->Observaciones_89 = $varObservaciones_89;
            $this->Hematomas = $varHematomas;
            $this->Observaciones_90 = $varObservaciones_90;
            $this->Perdida_Aumento_Peso = $varPerdida_Aumento_Peso;
            $this->Observaciones_91 = $varObservaciones_91;
            $this->Nerviosismo = $varNerviosismo;
            $this->Observaciones_92 = $varObservaciones_92;
            $this->Alteraciones_Menstruacion = $varAlteraciones_Menstruacion;
            $this->Observaciones_93 = $varObservaciones_93;
            $this->Pilificacion = $varPilificacion;
            $this->Observaciones_94 = $varObservaciones_94;
            $this->Convulsiones = $varConvulsiones;
            $this->Observaciones_95 = $varObservaciones_95;
            $this->Cefaleas = $varCefaleas;
            $this->Observaciones_96 = $varObservaciones_96;
            $this->Parestesias_2 = $varParestesias_2;
            $this->Observaciones_97 = $varObservaciones_97;
            $this->Anestesias = $varAnestesias;
            $this->Observaciones_98 = $varObservaciones_98;
            $this->Paresias = $varParesias;
            $this->Observaciones_99 = $varObservaciones_99;
            $this->Paralisis = $varParalisis;
            $this->Observaciones_100 = $varObservaciones_100;
            $this->Vertigos_2 = $varVertigos_2;
            $this->Observaciones_101 = $varObservaciones_101;
            $this->Hiperestesias = $varHiperestesias;
            $this->Observaciones_102 = $varObservaciones_102;
            $this->Angustia = $varAngustia;
            $this->Observaciones_103 = $varObservaciones_103;
            $this->Ansiedad = $varAnsiedad;
            $this->Observaciones_104 = $varObservaciones_104;
            $this->Otalgias = $varOtalgias;
            $this->Observaciones_105 = $varObservaciones_105;
            $this->Otorrea = $varOtorrea;
            $this->Observaciones_106 = $varObservaciones_106;
            $this->Otorragia = $varOtorragia;
            $this->Observaciones_107 = $varObservaciones_107;
            $this->Acufenos_2 = $varAcufenos_2;
            $this->Observaciones_108 = $varObservaciones_108;
            $this->Vertigos_3 = $varVertigos_3;
            $this->Observaciones_109 = $varObservaciones_109;
            $this->Fosfenos = $varFosfenos;
            $this->Observaciones_110 = $varObservaciones_110;
            $this->Agudeza_Visual = $varAgudeza_Visual;
            $this->Observaciones_111 = $varObservaciones_111;
            $this->Fotofobia = $varFotofobia;
            $this->Observaciones_112 = $varObservaciones_112;
            $this->Lagrimeo = $varLagrimeo;
            $this->Observaciones_113 = $varObservaciones_113;
            $this->Secreciones = $varSecreciones;
            $this->Observaciones_114 = $varObservaciones_114;
            $this->Parosmia = $varParosmia;
            $this->Observaciones_115 = $varObservaciones_115;
            $this->Hipersmia = $varHipersmia;
            $this->Observaciones_116 = $varObservaciones_116;
            $this->Secreciones_2 = $varSecreciones_2;
            $this->Observaciones_117 = $varObservaciones_117;
            $this->Prurito = $varPrurito;
            $this->Observaciones_118 = $varObservaciones_118;
            $this->Epistaxis_2 = $varEpistaxis_2;
            $this->Observaciones_119 = $varObservaciones_119;
            $this->Dolor_Nasal = $varDolor_Nasal;
            $this->Observaciones_120 = $varObservaciones_120;
            $this->Hipergeusia = $varHipergeusia;
            $this->Observaciones_121 = $varObservaciones_121;
            $this->Parageusia = $varParageusia;
            $this->Observaciones_122 = $varObservaciones_122;
            $this->Ageusia = $varAgeusia;
            $this->Observaciones_123 = $varObservaciones_123;
            $this->Glosalgia = $varGlosalgia;
            $this->Observaciones_124 = $varObservaciones_124;
            $this->Glosodinia = $varGlosodinia;
            $this->Observaciones_125 = $varObservaciones_125;
            $this->Examen_Laboratorio = $varExamen_Laboratorio;
            $this->Terapeutica = $varTerapeutica;
            $this->Frecuencia_Cardiaca = $varFrecuencia_Cardiaca;
            $this->Temperatura = $varTemperatura;
            $this->Pulso = $varPulso;
            $this->Respiracion = $varRespiracion;
            $this->Tension_Arterial = $varTension_Arterial;
	    $this->Somatometria_Peso = $varSomatometria_Peso;
	    $this->Somatometria_Estatura = $varSomatometria_Estatura;
            $this->Craneo_Tamano = $varCraneo_Tamano;
            $this->Craneo_Contorno = $varCraneo_Contorno;
            $this->Craneo_Implantacion_Cabello = $varCraneo_Implantacion_Cabello;
            $this->Craneo_Deformidades = $varCraneo_Deformidades;
            $this->Craneo_Exostosis = $varCraneo_Exostosis;
            $this->Craneo_Endostosis = $varCraneo_Endostosis;
            $this->Cara_Expresion_Facial = $varCara_Expresion_Facial;
            $this->Cara_Simetria = $varCara_Simetria;
            $this->Cara_Movimientos_Involuntarios = $varCara_Movimientos_Involuntarios;
            $this->Cara_Edemas = $varCara_Edemas;
            $this->Cara_Masas = $varCara_Masas;
            $this->Oidos = $varOidos;
            $this->Ojos = $varOjos;
            $this->Nariz = $varNariz;
            $this->Anestesicos_Bucales = $varAnestesicos_Bucales;
            $this->Pregunta_1 = $varPregunta_1;
            $this->Region_Anterior = $varRegion_Anterior;
            $this->Region_Lateral = $varRegion_Lateral;
            $this->Region_Mejillas = $varRegion_Mejillas;
            $this->Paladar_Duro = $varPaladar_Duro;
            $this->Paladar_Blando = $varPaladar_Blando;
            $this->Region_Inferior = $varRegion_Inferior;
            $this->Piso_Boca = $varPiso_Boca;
            $this->Pilar_Anterior = $varPilar_Anterior;
            $this->Pilar_Posterior = $varPilar_Posterior;
            $this->Amigdalas = $varAmigdalas;
            $this->Faringe = $varFaringe;
            $this->Region_Gingival = $varRegion_Gingival;
            $this->Encia_Insertada_Adherida = $varEncia_Insertada_Adherida;
            $this->Mucosa = $varMucosa;
            $this->Proceso_Alveolar = $varProceso_Alveolar;
            $this->Aumento_Volumen = $varAumento_Volumen;
            $this->Masas = $varMasas;
            $this->Cantidad_Saliva = $varCantidad_Saliva;
            $this->Calidad_Saliva = $varCalidad_Saliva;
            $this->Palpitacion_ATM_I = $varPalpitacion_ATM_I;
            $this->Palpitacion_ATM_D = $varPalpitacion_ATM_D;
            $this->Apertura_Cierre_I = $varApertura_Cierre_I;
            $this->Apertura_Cierre_D = $varApertura_Cierre_D;
            $this->Protrusiva_I = $varProtrusiva_I;
            $this->Protrusiva_D = $varProtrusiva_D;
            $this->Retrusiva_I = $varRetrusiva_I;
            $this->Retrusiva_D = $varRetrusiva_D;
            $this->Lateralidades_I = $varLateralidades_I;
            $this->Lateralidades_D = $varLateralidades_D;
            $this->Lado_Trabajo_I = $varLado_Trabajo_I;
            $this->Lado_Trabajo_D = $varLado_Trabajo_D;
            $this->Lado_Balance_I = $varLado_Balance_I;
            $this->Lado_Balance_D = $varLado_Balance_D;
            $this->Temporal = $varTemporal;
            $this->Masetero = $varMasetero;
            $this->Pterigoideo_Externo = $varPterigoideo_Externo;
            $this->Pterigoideo_Interno = $varPterigoideo_Interno;
            $this->Observaciones_126 = $varObservaciones_126;    
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
            $this->Examen_Oclusal = $varExamen_Oclusal;
            $this->Abrasiones = $varAbrasiones;
            $this->Atriciones = $varAtriciones;
            $this->Apinamiento = $varApinamiento;
            $this->Mordida_Cruzada = $varMordida_Cruzada;
            $this->Malposiciones_Individuales = $varMalposiciones_Individuales;
            $this->Diastemas = $varDiastemas;
            $this->Linea_Medida = $varLinea_Medida;
            $this->Examen_Radiografico = $varExamen_Radiografico;
            $this->Cuello_Forma = $varCuello_Forma;
            $this->Cuello_Volumen = $varCuello_Volumen;
            $this->Cuello_Movimientos = $varCuello_Movimientos;
            $this->Cuello_Ganglios = $varCuello_Ganglios;
            $this->Cuello_Traquea = $varCuello_Traquea;
            $this->Cuello_Tiroides = $varCuello_Tiroides;
            $this->Cuello_Masas = $varCuello_Masas;
            $this->Cuello_Pulsos = $varCuello_Pulsos;
            $this->Cuello_Carotideos = $varCuello_Carotideos;
            $this->Cuello_Ingurgitacion_Yugular = $varCuello_Ingurgitacion_Yugular;
            $this->Torax = $varTorax;
            $this->Abdomen = $varAbdomen;
            $this->Miembro_Superior_Inferior = $varMiembro_Superior_Inferior;
            $this->Observaciones_Medicas = $varObservaciones_Medicas;
            $this->Diagnostico_Bucal = $varDiagnostico_Bucal;
            $this->Pronostico_Favorable = $varPronostico_Favorable;
            $this->Pronostico_Desfavorable = $varPronostico_Desfavorable;
            $this->Pronostico_Reservado = $varPronostico_Reservado; 
            $this->Pronostico_Porque = $varPronostico_Porque;
            $this->Pronostico_Para_Quien = $varPronostico_Para_Quien;
            $this->Pronostico_Plan_Tratamiento = $varPronostico_Plan_Tratamiento;
            $this->Aprobado = $varAprobado;
            $this->Estatus = $varEstatus;
            $this->FechaRegistro = $varFechaRegistro;
		}
		
		//catalogo de formatos de historias clinicas general en modo administrador

		public function Catalogo_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General
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
						<td><a href="formatohistoriageneral-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaGeneral']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
					        <td><a href="reportes/formatohistoriageneral-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaGeneral']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas general registradas todavía.":"No se encontro ningún formato de historias clinicas general en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
		
		//catalogo de formatos de historias clinicas general en modo medico titular
        
        public function Catalogo_Medico_Titular($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General
						WHERE Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General
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
						WHERE Aprobado = 0;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1']; ?> y
                            <?php echo $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2']; ?></td>
                        <td><a href="formatohistoriageneral-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaGeneral']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
                        <td><a href="reportes/formatohistoriageneral-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaGeneral']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas general registradas todavía.":"No se encontro ningún formato de historias clinicas general en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
		
		//catalogo de formatos de historias clinicas general en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General
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
						<td><a href="formatohistoriageneral-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaGeneral']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
                            <td><a href="reportes/formatohistoriageneral-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaGeneral']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas general registradas todavía.":"No se encontro ningún formato de historias clinicas general en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
		
		//dar de alta un formato de historia clinica general
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_General_Alta(
                        '$this->IdParejaClinica',
                        '$this->Paciente',
                        '$this->Telefono',
                        '$this->Email',
                        '$this->Calle',
                        '$this->Numero',
                        '$this->Colonia',
                        '$this->Poblacion',
                        '$this->Padecimiento_Actual',
                        '$this->Diabetes',
                        '$this->Observaciones_1',
                        '$this->Cardiopatias',
                        '$this->Observaciones_2',
                        '$this->Hipertension',
                        '$this->Observaciones_3',
                        '$this->Obesidad',
                        '$this->Observaciones_4',
                        '$this->Cancer',
                        '$this->Observaciones_5',
                        '$this->Sifilis',
                        '$this->Observaciones_6',
                        '$this->Anomalias_Congenitas',
                        '$this->Observaciones_7',
                        '$this->Trastornos_Hematicos',
                        '$this->Observaciones_8',
                        '$this->Otros',
                        '$this->Observaciones_9',
                        '$this->Habitacion',
                        '$this->Observaciones_10',
                        '$this->Alimentacion',
                        '$this->Observaciones_11',
                        '$this->Higiene',
                        '$this->Observaciones_12',
                        '$this->Alcoholismo',
                        '$this->Observaciones_13',
                        '$this->Tabaquismo',
                        '$this->Observaciones_14',
                        '$this->Toxicomania',
                        '$this->Observaciones_15',
                        '$this->Diabetes_2',
                        '$this->Observaciones_16',
                        '$this->Hipertension_2',
                        '$this->Observaciones_17',
                        '$this->Gastritis',
                        '$this->Observaciones_18',
                        '$this->Hepatitis',
                        '$this->Observaciones_19',
                        '$this->Hipertiroidismo',
                        '$this->Observaciones_20',
                        '$this->Hemorragias',
                        '$this->Observaciones_21',
                        '$this->Epilepsia',
                        '$this->Observaciones_22',
                        '$this->Alergias',
                        '$this->Observaciones_23',
                        '$this->Transfuciones',
                        '$this->Observaciones_24',
                        '$this->Quirurgico',
                        '$this->Observaciones_25',
                        '$this->Otros_2',
                        '$this->Observaciones_26',
                        '$this->Mercarca',
                        '$this->Observaciones_27',
                        '$this->Ritmo',
                        '$this->Observaciones_28',
                        '$this->Usa',
                        '$this->Observaciones_29',
                        '$this->Gesta',
                        '$this->Observaciones_30',
                        '$this->Para',
                        '$this->Observaciones_31',
                        '$this->Aborto',
                        '$this->Observaciones_32',
                        '$this->Cesarea',
                        '$this->Observaciones_33',
                        '$this->Fur',
                        '$this->Observaciones_34',
                        '$this->Menopausia',
                        '$this->Observaciones_35',
                        '$this->Doc',
                        '$this->Observaciones_36',
                        '$this->Planificacion_Familiar',
                        '$this->Observaciones_37',
                        '$this->Anorexia',
                        '$this->Observaciones_38',
                        '$this->Polifagia',
                        '$this->Observaciones_39',
                        '$this->Polidipsia',
                        '$this->Observaciones_40',
                        '$this->Halitosis',
                        '$this->Observaciones_41',
                        '$this->Sialorrea',
                        '$this->Observaciones_42',
                        '$this->Xerostomia',
                        '$this->Observaciones_43',
                        '$this->Disfagia',
                        '$this->Observaciones_44',
                        '$this->Odinofagia',
                        '$this->Observaciones_45',
                        '$this->Dolor_Abdominal',
                        '$this->Observaciones_46',
                        '$this->Hematemesis',
                        '$this->Observaciones_47',
                        '$this->Pirosis',
                        '$this->Observaciones_48',
                        '$this->Vomito',
                        '$this->Observaciones_49',
                        '$this->Flatulencia',
                        '$this->Observaciones_50',
                        '$this->Ictericia',
                        '$this->Observaciones_51',
                        '$this->Rectorragia',
                        '$this->Observaciones_52',
                        '$this->Melena',
                        '$this->Observaciones_53',
                        '$this->Prurito_Anal',
                        '$this->Observaciones_54',
                        '$this->Dolor_Precordial',
                        '$this->Observaciones_55',
                        '$this->Disnea',
                        '$this->Observaciones_56',
                        '$this->Ortopnea',
                        '$this->Observaciones_57',
                        '$this->Acufenos',
                        '$this->Observaciones_58',
                        '$this->Forfenos',
                        '$this->Observaciones_59',
                        '$this->Vertigos',
                        '$this->Observaciones_60',
                        '$this->Cefalea',
                        '$this->Observaciones_61',
                        '$this->Palpitaciones',
                        '$this->Observaciones_62',
                        '$this->Parestesias',
                        '$this->Observaciones_63',
                        '$this->Cianosis',
                        '$this->Observaciones_64',
                        '$this->Edema',
                        '$this->Observaciones_65',
                        '$this->Bochorno',
                        '$this->Observaciones_66',
                        '$this->Lipotimias',
                        '$this->Observaciones_67',
                        '$this->Cambios_Piel',
                        '$this->Observaciones_68',
                        '$this->Epistaxis',
                        '$this->Observaciones_69',
                        '$this->Disnea_2',
			'$this->Observaciones_70',
                        '$this->Tos',
                        '$this->Observaciones_71',
                        '$this->Hemoptisis',
                        '$this->Observaciones_72',
                        '$this->Sibilancias',
                        '$this->Observaciones_73',
                        '$this->Dolor',
                        '$this->Observaciones_74',
                        '$this->Respiracion_Bucal_Nasal',
                        '$this->Observaciones_75',
                        '$this->Nictamero',
                        '$this->Observaciones_76',
                        '$this->Disuria',
                        '$this->Observaciones_77',
                        '$this->Poliuria',
                        '$this->Observaciones_78',
                        '$this->Poliarquiuria',
                        '$this->Observaciones_79',
                        '$this->Hematuria',
                        '$this->Observaciones_80',
                        '$this->Algiuria',
                        '$this->Observaciones_81',
                        '$this->Caso_Fememino',
                        '$this->Observaciones_82',
                        '$this->Caso_Masculino',
                        '$this->Observaciones_83',
                        '$this->Fiebre_Larga',
                        '$this->Observaciones_84',
                        '$this->Palidez',
                        '$this->Observaciones_85',
                        '$this->Edema_2',
                        '$this->Observaciones_86',
                        '$this->Hemorragia',
                        '$this->Observaciones_87',
                        '$this->Petequias',
                        '$this->Observaciones_88',
                        '$this->Equimosis',
                        '$this->Observaciones_89',
                        '$this->Hematomas',
                        '$this->Observaciones_90',
                        '$this->Perdida_Aumento_Peso',
                        '$this->Observaciones_91',
                        '$this->Nerviosismo',
                        '$this->Observaciones_92',
                        '$this->Alteraciones_Menstruacion',
                        '$this->Observaciones_93',
                        '$this->Pilificacion',
                        '$this->Observaciones_94',
                        '$this->Convulsiones',
                        '$this->Observaciones_95',
                        '$this->Cefaleas',
                        '$this->Observaciones_96',
                        '$this->Parestesias_2',
                        '$this->Observaciones_97',
                        '$this->Anestesias',
                        '$this->Observaciones_98',
                        '$this->Paresias',
                        '$this->Observaciones_99',
                        '$this->Paralisis',
                        '$this->Observaciones_100',
                        '$this->Vertigos_2',
                        '$this->Observaciones_101',
                        '$this->Hiperestesias',
                        '$this->Observaciones_102',
                        '$this->Angustia',
                        '$this->Observaciones_103',
                        '$this->Ansiedad',
                        '$this->Observaciones_104',
                        '$this->Otalgias',
                        '$this->Observaciones_105',
                        '$this->Otorrea',
                        '$this->Observaciones_106',
                        '$this->Otorragia',
                        '$this->Observaciones_107',
                        '$this->Acufenos_2',
                        '$this->Observaciones_108',
                        '$this->Vertigos_3',
                        '$this->Observaciones_109',
                        '$this->Fosfenos',
                        '$this->Observaciones_110',
                        '$this->Agudeza_Visual',
                        '$this->Observaciones_111',
                        '$this->Fotofobia',
                        '$this->Observaciones_112',
                        '$this->Lagrimeo',
                        '$this->Observaciones_113',
                        '$this->Secreciones',
                        '$this->Observaciones_114',
                        '$this->Parosmia',
                        '$this->Observaciones_115',
                        '$this->Hipersmia',
                        '$this->Observaciones_116',
                        '$this->Secreciones_2',
                        '$this->Observaciones_117',
                        '$this->Prurito',
                        '$this->Observaciones_118',
                        '$this->Epistaxis_2',
                        '$this->Observaciones_119',
                        '$this->Dolor_Nasal',
                        '$this->Observaciones_120',
                        '$this->Hipergeusia',
                        '$this->Observaciones_121',
                        '$this->Parageusia',
                        '$this->Observaciones_122',
                        '$this->Ageusia',
                        '$this->Observaciones_123',
                        '$this->Glosalgia',
                        '$this->Observaciones_124',
                        '$this->Glosodinia',
                        '$this->Observaciones_125',
                        '$this->Examen_Laboratorio',
                        '$this->Terapeutica',
                        '$this->Frecuencia_Cardiaca',
                        '$this->Temperatura',
                        '$this->Pulso',
                        '$this->Respiracion',
                        '$this->Tension_Arterial',
                        '$this->Somatometria_Peso',
                        '$this->Somatometria_Estatura',
                        '$this->Craneo_Tamano',
                        '$this->Craneo_Contorno',
                        '$this->Craneo_Implantacion_Cabello',
                        '$this->Craneo_Deformidades',
                        '$this->Craneo_Exostosis',
                        '$this->Craneo_Endostosis',
                        '$this->Cara_Expresion_Facial',
                        '$this->Cara_Simetria',
                        '$this->Cara_Movimientos_Involuntarios',
                        '$this->Cara_Edemas',
                        '$this->Cara_Masas',
                        '$this->Oidos',
                        '$this->Ojos',
                        '$this->Nariz',
                        '$this->Anestesicos_Bucales',
                        '$this->Pregunta_1',
                        '$this->Region_Anterior',
                        '$this->Region_Lateral',
                        '$this->Region_Mejillas',
                        '$this->Paladar_Duro',
                        '$this->Paladar_Blando',
                        '$this->Region_Inferior',
                        '$this->Piso_Boca',
                        '$this->Pilar_Anterior',
                        '$this->Pilar_Posterior',
                        '$this->Amigdalas',
                        '$this->Faringe',
                        '$this->Region_Gingival',
                        '$this->Encia_Insertada_Adherida',
                        '$this->Mucosa',
                        '$this->Proceso_Alveolar',
                        '$this->Aumento_Volumen',
                        '$this->Masas',
                        '$this->Cantidad_Saliva',
                        '$this->Calidad_Saliva',
                        '$this->Palpitacion_ATM_I',
                        '$this->Palpitacion_ATM_D',
                        '$this->Apertura_Cierre_I',
                        '$this->Apertura_Cierre_D',
                        '$this->Protrusiva_I',
                        '$this->Protrusiva_D',
                        '$this->Retrusiva_I',
                        '$this->Retrusiva_D',
                        '$this->Lateralidades_I',
                        '$this->Lateralidades_D',
                        '$this->Lado_Trabajo_I',
                        '$this->Lado_Trabajo_D',
                        '$this->Lado_Balance_I',
                        '$this->Lado_Balance_D',
                        '$this->Temporal',
                        '$this->Masetero',
                        '$this->Pterigoideo_Externo',
                        '$this->Pterigoideo_Interno',
                        '$this->Observaciones_126',
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
                        '$this->Examen_Oclusal',
                        '$this->Abrasiones',
                        '$this->Atriciones',
                        '$this->Apinamiento',
                        '$this->Mordida_Cruzada',
                        '$this->Malposiciones_Individuales',
                        '$this->Diastemas',
                        '$this->Linea_Medida',
                        '$this->Examen_Radiografico',
                        '$this->Cuello_Forma',
                        '$this->Cuello_Volumen',
                        '$this->Cuello_Movimientos',
                        '$this->Cuello_Ganglios',
                        '$this->Cuello_Traquea',
                        '$this->Cuello_Tiroides',
                        '$this->Cuello_Masas',
                        '$this->Cuello_Pulsos',
                        '$this->Cuello_Carotideos',
                        '$this->Cuello_Ingurgitacion_Yugular',
                        '$this->Torax',
                        '$this->Abdomen',
                        '$this->Miembro_Superior_Inferior',
                        '$this->Observaciones_Medicas',
                        '$this->Diagnostico_Bucal',
                        '$this->Pronostico_Favorable',
                        '$this->Pronostico_Desfavorable',
                        '$this->Pronostico_Reservado',
                        '$this->Pronostico_Porque',
                        '$this->Pronostico_Para_Quien',
                        '$this->Pronostico_Plan_Tratamiento'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{  
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo el llenado de una historia clinica general",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriageneral.php?exito=Se guardo el area con exito');
			}else{
                header('Location: formatohistoriageneral.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
		
		//catalogo de formatos de historias clinicas general en reportes en modo administrador
        
        public function Catalogo_Administrador_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas general registradas todavía.":"No se encontro ningún formato de historias clinicas general en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
		
		//catalogo de formatos de historias clinicas general en reportes en modo medico titular
        
        public function Catalogo_Medico_Titular_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General
						WHERE Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General
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
						WHERE Aprobado = 0;";
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas general registradas todavía.":"No se encontro ningún formato de historias clinicas general en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
		
		//catalogo de formatos de historias clinicas general en reportes en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_General
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas general registradas todavía.":"No se encontro ningún formato de historias clinicas general en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
		
		//obtener los datos de un formato de historia clinica general
		
		public function Obtener_Formato($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  *
					FROM SIS_Listado_Historia_Clinica_General
					WHERE IdHistoriaClinicaGeneral = '$this->IdHistoriaClinicaGeneral';";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			$Datos = null;

			if($Num_Filas > 0):
				$Datos = mysqli_fetch_array($Resultado, MYSQL_ASSOC);
			endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
            
            return $Datos;
		} 
		
		//aprobar un formato de historia clinica general
        
        public function Aprobar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_General_Aprobar(
                        '$this->IdHistoriaClinicaGeneral',
                        '$this->Aprobado'
					);";
            
			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{  
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("aprobo una historia clinica general",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriageneral.php?exito=Se aprobo la historia clinica con exito');
			}else{
                header('Location: formatohistoriageneral.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>