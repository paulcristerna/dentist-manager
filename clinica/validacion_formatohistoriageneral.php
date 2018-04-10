<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Formato_Historia_Clinica_General.php");

//validar el guardado de la historia clinica    

if(isset($_REQUEST['guardar']))
{
    $IdParejaClinica = $_POST["pareja-clinica"];
    $Paciente = $_POST["sltpaciente-general"];
    $Telefono = $_POST["telefono"];
    $Email = $_POST["email"];
    $Calle = $_POST["calle"];
    $Numero = $_POST["numero"];
    $Colonia = $_POST["colonia"];
    $Poblacion = $_POST["poblacion"];    
    $Padecimiento_Actual = $_POST["padecimiento_actual"];
    $Diabetes = $_POST["diabetes"];
    $Observaciones_1 = $_POST["observaciones_1"];
    $Cardiopatias = $_POST["cardiopatias"];
    $Observaciones_2 = $_POST["observaciones_2"];
    $Hipertension = $_POST["hipertension"];
    $Observaciones_3 = $_POST["observaciones_3"];
    $Obesidad = $_POST["obesidad"];
    $Observaciones_4 = $_POST["observaciones_4"];
    $Cancer = $_POST["cancer"];
    $Observaciones_5 = $_POST["observaciones_5"];
    $Sifilis = $_POST["sifilis"];
    $Observaciones_6 = $_POST["observaciones_6"];
    $Anomalias_Congenitas = $_POST["anomalias_congenitas"];
    $Observaciones_7 = $_POST["observaciones_7"];
    $Trastornos_Hematicos = $_POST["trastornos_hematicos"];
    $Observaciones_8 = $_POST["observaciones_8"];
    $Otros = $_POST["otros"];
    $Observaciones_9 = $_POST["observaciones_9"];
    $Habitacion = $_POST["habitacion"];
    $Observaciones_10 = $_POST["observaciones_10"];
    $Alimentacion = $_POST["alimentacion"];
    $Observaciones_11 = $_POST["observaciones_11"];
    $Higiene = $_POST["higiene"];
    $Observaciones_12 = $_POST["observaciones_12"];
    $Alcoholismo = $_POST["alcoholismo"];
    $Observaciones_13 = $_POST["observaciones_13"];
    $Tabaquismo = $_POST["tabaquismo"];
    $Observaciones_14 = $_POST["observaciones_14"];
    $Toxicomania = $_POST["toxicomania"];
    $Observaciones_15 = $_POST["observaciones_15"];
    $Diabetes_2 = $_POST["diabetes_2"];
    $Observaciones_16 = $_POST["observaciones_16"];
    $Hipertension_2 = $_POST["hipertension_2"];
    $Observaciones_17 = $_POST["observaciones_17"];
    $Gastritis = $_POST["gastritis"];
    $Observaciones_18 = $_POST["observaciones_18"];
    $Hepatitis = $_POST["hepatitis"];
    $Observaciones_19 = $_POST["observaciones_19"];
    $Hipertiroidismo = $_POST["hipertiroidismo"];
    $Observaciones_20 = $_POST["observaciones_20"];
    $Hemorragias = $_POST["hemorragias"];
    $Observaciones_21 = $_POST["observaciones_21"];
    $Epilepsia = $_POST["epilepsia"];
    $Observaciones_22 = $_POST["observaciones_22"];
    $Alergias = $_POST["alergias"];
    $Observaciones_23 = $_POST["observaciones_23"];
    $Transfuciones = $_POST["transfusiones"];
    $Observaciones_24 = $_POST["observaciones_24"];
    $Quirurgico = $_POST["quirurgico"];
    $Observaciones_25 = $_POST["observaciones_25"];
    $Otros_2 = $_POST["otros_2"];
    $Observaciones_26 = $_POST["observaciones_26"];
    $Mercarca = $_POST["menarca"];
    $Observaciones_27 = $_POST["observaciones_27"];
    $Ritmo = $_POST["ritmo"];
    $Observaciones_28 = $_POST["observaciones_28"];
    $Usa = $_POST["usa"];
    $Observaciones_29 = $_POST["observaciones_29"];
    $Gesta = $_POST["gesta"];
    $Observaciones_30 = $_POST["observaciones_30"];
    $Para = $_POST["para"];
    $Observaciones_31 = $_POST["observaciones_31"];
    $Aborto = $_POST["aborto"];
    $Observaciones_32 = $_POST["observaciones_32"];
    $Cesarea = $_POST["cesarea"];
    $Observaciones_33 = $_POST["observaciones_33"];
    $Fur = $_POST["fur"];
    $Observaciones_34 = $_POST["observaciones_34"];
    $Menopausia = $_POST["menopausia"];
    $Observaciones_35 = $_POST["observaciones_35"];
    $Doc = $_POST["doc"];
    $Observaciones_36 = $_POST["observaciones_36"];
    $Planificacion_Familiar = $_POST["planificacion_familiar"];
    $Observaciones_37 = $_POST["observaciones_37"];
    $Anorexia = $_POST["anorexia"];
    $Observaciones_38 = $_POST["observaciones_38"];
    $Polifagia = $_POST["polifagia"];
    $Observaciones_39 = $_POST["observaciones_39"];
    $Polidipsia = $_POST["polidipsia"];
    $Observaciones_40 = $_POST["observaciones_40"];
    $Halitosis = $_POST["halitosis"];
    $Observaciones_41 = $_POST["observaciones_41"];
    $Sialorrea = $_POST["sialorrea"];
    $Observaciones_42 = $_POST["observaciones_42"];
    $Xerostomia = $_POST["xerostomia"];
    $Observaciones_43 = $_POST["observaciones_43"];
    $Disfagia = $_POST["disfagia"];
    $Observaciones_44 = $_POST["observaciones_44"];
    $Odinofagia = $_POST["odinofagia"];
    $Observaciones_45 = $_POST["observaciones_45"];
    $Dolor_Abdominal = $_POST["dolor_abdominal"];
    $Observaciones_46 = $_POST["observaciones_46"];
    $Hematemesis = $_POST["hematemesis"];
    $Observaciones_47 = $_POST["observaciones_47"];
    $Pirosis = $_POST["pirosis"];
    $Observaciones_48 = $_POST["observaciones_48"];
    $Vomito = $_POST["vomito"];
    $Observaciones_49 = $_POST["observaciones_49"];
    $Flatulencia = $_POST["flatulencia"];
    $Observaciones_50 = $_POST["observaciones_50"];
    $Ictericia = $_POST["ictericia"];
    $Observaciones_51 = $_POST["observaciones_51"];
    $Rectorragia = $_POST["rectorragia"];
    $Observaciones_52 = $_POST["observaciones_52"];
    $Melena = $_POST["melena"];
    $Observaciones_53 = $_POST["observaciones_53"];
    $Prurito_Anal = $_POST["prurito_anal"];
    $Observaciones_54 = $_POST["observaciones_54"];
    $Dolor_Precordial = $_POST["dolor_precordial"];
    $Observaciones_55 = $_POST["observaciones_55"];
    $Disnea = $_POST["disnea"];
    $Observaciones_56 = $_POST["observaciones_56"];
    $Ortopnea = $_POST["ortopnea"];
    $Observaciones_57 = $_POST["observaciones_57"];
    $Acufenos = $_POST["acufenos"];
    $Observaciones_58 = $_POST["observaciones_58"];
    $Forfenos = $_POST["forfenos"];
    $Observaciones_59 = $_POST["observaciones_59"];
    $Vertigos = $_POST["vertigos"];
    $Observaciones_60 = $_POST["observaciones_60"];
    $Cefalea = $_POST["cefalea"];
    $Observaciones_61 = $_POST["observaciones_61"];
    $Palpitaciones = $_POST["palpitaciones"];
    $Observaciones_62 = $_POST["observaciones_62"];
    $Parestesias = $_POST["parestesias"];
    $Observaciones_63 = $_POST["observaciones_63"];
    $Cianosis = $_POST["cianosis"];
    $Observaciones_64 = $_POST["observaciones_64"];
    $Edema = $_POST["edema"];
    $Observaciones_65 = $_POST["observaciones_65"];
    $Bochorno = $_POST["bochorno"];
    $Observaciones_66 = $_POST["observaciones_66"];
    $Lipotimias = $_POST["lipotimias"];
    $Observaciones_67 = $_POST["observaciones_67"];
    $Cambios_Piel = $_POST["cambios_piel"];
    $Observaciones_68 = $_POST["observaciones_68"];
    $Epistaxis = $_POST["epistaxis"];
    $Observaciones_69 = $_POST["observaciones_69"];
    $Disnea_2 = $_POST["disnea_2"];
    $Observaciones_70 = $_POST["observaciones_70"];
    $Tos = $_POST["tos"];
    $Observaciones_71 = $_POST["observaciones_71"];
    $Hemoptisis = $_POST["hemoptisis"];
    $Observaciones_72 = $_POST["observaciones_72"];
    $Sibilancias = $_POST["sibilancias"];
    $Observaciones_73 = $_POST["observaciones_73"];
    $Dolor = $_POST["dolor"];
    $Observaciones_74 = $_POST["observaciones_74"];
    $Respiracion_Bucal_Nasal = $_POST["respiracion_bucal_nasal"];
    $Observaciones_75 = $_POST["observaciones_75"];
    $Nictamero = $_POST["nictamero"];
    $Observaciones_76 = $_POST["observaciones_76"];
    $Disuria = $_POST["disuria"];
    $Observaciones_77 = $_POST["observaciones_77"];
    $Poliuria = $_POST["poliuria"];
    $Observaciones_78 = $_POST["observaciones_78"];
    $Poliarquiuria = $_POST["poliarquiuria"];
    $Observaciones_79 = $_POST["observaciones_79"];
    $Hematuria = $_POST["hematuria"];
    $Observaciones_80 = $_POST["observaciones_80"];
    $Algiuria = $_POST["algiuria"];
    $Observaciones_81 = $_POST["observaciones_81"];
    $Caso_Fememino = $_POST["caso_femenino"];
    $Observaciones_82 = $_POST["observaciones_82"];
    $Caso_Masculino = $_POST["caso_masculino"];
    $Observaciones_83 = $_POST["observaciones_83"];
    $Fiebre_Larga = $_POST["fiebre_larga"];
    $Observaciones_84 = $_POST["observaciones_84"];
    $Palidez = $_POST["palidez"];
    $Observaciones_85 = $_POST["observaciones_85"];
    $Edema_2 = $_POST["edema_2"];
    $Observaciones_86 = $_POST["observaciones_86"];
    $Hemorragia = $_POST["hemorragia"];
    $Observaciones_87 = $_POST["observaciones_87"];
    $Petequias = $_POST["petequias"];
    $Observaciones_88 = $_POST["observaciones_88"];
    $Equimosis = $_POST["equimosis"];
    $Observaciones_89 = $_POST["observaciones_89"];
    $Hematomas = $_POST["hematomas"];
    $Observaciones_90 = $_POST["observaciones_90"];
    $Perdida_Aumento_Peso = $_POST["perdida_aumento_peso"];
    $Observaciones_91 = $_POST["observaciones_91"];
    $Nerviosismo = $_POST["nerviosismo"];
    $Observaciones_92 = $_POST["observaciones_92"];
    $Alteraciones_Menstruacion = $_POST["alteraciones_menstruacion"];
    $Observaciones_93 = $_POST["observaciones_93"];
    $Pilificacion = $_POST["pilificacion"];
    $Observaciones_94 = $_POST["observaciones_94"];
    $Convulsiones = $_POST["convulsiones"];
    $Observaciones_95 = $_POST["observaciones_95"];
    $Cefaleas = $_POST["cefaleas"];
    $Observaciones_96 = $_POST["observaciones_96"];
    $Parestesias_2 = $_POST["parestesias_2"];
    $Observaciones_97 = $_POST["observaciones_97"];
    $Anestesias = $_POST["anestesias"];
    $Observaciones_98 = $_POST["observaciones_98"];
    $Paresias = $_POST["paresias"];
    $Observaciones_99 = $_POST["observaciones_99"];
    $Paralisis = $_POST["paralisis"];
    $Observaciones_100 = $_POST["observaciones_100"];
    $Vertigos_2 = $_POST["vertigos_2"];
    $Observaciones_101 = $_POST["observaciones_101"];
    $Hiperestesias = $_POST["hiperestesias"];
    $Observaciones_102 = $_POST["observaciones_102"];
    $Angustia = $_POST["angustia"];
    $Observaciones_103 = $_POST["observaciones_103"];
    $Ansiedad = $_POST["ansiedad"];
    $Observaciones_104 = $_POST["observaciones_104"];
    $Otalgias = $_POST["otalgias"];
    $Observaciones_105 = $_POST["observaciones_105"];
    $Otorrea = $_POST["otorrea"];
    $Observaciones_106 = $_POST["observaciones_106"];
    $Otorragia = $_POST["otorragia"];
    $Observaciones_107 = $_POST["observaciones_107"];
    $Acufenos_2 = $_POST["acufenos_2"];
    $Observaciones_108 = $_POST["observaciones_108"];
    $Vertigos_3 = $_POST["vertigos_3"];
    $Observaciones_109 = $_POST["observaciones_109"];
    $Fosfenos = $_POST["fosfenos"];
    $Observaciones_110 = $_POST["observaciones_110"];
    $Agudeza_Visual = $_POST["agudeza_visual"];
    $Observaciones_111 = $_POST["observaciones_111"];
    $Fotofobia = $_POST["fotofobia"];
    $Observaciones_112 = $_POST["observaciones_112"];
    $Lagrimeo = $_POST["lagrimeo"];
    $Observaciones_113 = $_POST["observaciones_113"];
    $Secreciones = $_POST["secreciones"];
    $Observaciones_114 = $_POST["observaciones_114"];
    $Parosmia = $_POST["parosmia"];
    $Observaciones_115 = $_POST["observaciones_115"];
    $Hipersmia = $_POST["hiperosmia"];
    $Observaciones_116 = $_POST["observaciones_116"];
    $Secreciones_2 = $_POST["secreciones_2"];
    $Observaciones_117 = $_POST["observaciones_117"];
    $Prurito = $_POST["prurito"];
    $Observaciones_118 = $_POST["observaciones_118"];
    $Epistaxis_2 = $_POST["epistaxis_2"];
    $Observaciones_119 = $_POST["observaciones_119"];
    $Dolor_Nasal = $_POST["dolor_nasal"];
    $Observaciones_120 = $_POST["observaciones_120"];
    $Hipergeusia = $_POST["hipergeusia"];
    $Observaciones_121 = $_POST["observaciones_121"];
    $Parageusia = $_POST["parageusia"];
    $Observaciones_122 = $_POST["observaciones_122"];
    $Ageusia = $_POST["ageusia"];
    $Observaciones_123 = $_POST["observaciones_123"];
    $Glosalgia = $_POST["glosalgia"];
    $Observaciones_124 = $_POST["observaciones_124"];
    $Glosodinia = $_POST["glosodinia"];
    $Observaciones_125 = $_POST["observaciones_125"];
    $Examen_Laboratorio = $_POST["examen_laboratorio"];
    $Terapeutica = $_POST["terapeutica"];
    $Frecuencia_Cardiaca = $_POST["frecuencia_cardiaca"];
    $Temperatura = $_POST["temperatura"];
    $Pulso = $_POST["pulso"];
    $Respiracion = $_POST["respiracion"];
    $Tension_Arterial = $_POST["tension_arterial"];
    $Somatometria_Peso = $_POST["somatometria_peso"];
    $Somatometria_Estatura = $_POST["somatometria_estatura"];
    $Craneo_Tamano = $_POST["craneo_tamano"];
    $Craneo_Contorno = $_POST["craneo_contorno"];
    $Craneo_Implantacion_Cabello = $_POST["craneo_implantacion_cabello"];
    $Craneo_Deformidades = $_POST["craneo_deformidades"];
    $Craneo_Deformidades = $_POST["craneo_deformidades"];
    $Craneo_Exostosis = $_POST["craneo_exostosis"];
    $Craneo_Endostosis = $_POST["craneo_endostosis"];
    $Cara_Expresion_Facial = $_POST["cara_expresion_facial"];
    $Cara_Simetria = $_POST["cara_simetria"];
    $Cara_Movimientos_Involuntarios = $_POST["cara_movimientos_involuntarios"];
    $Cara_Edemas = $_POST["cara_edemas"];
    $Cara_Masas = $_POST["cara_masas"];
    $Oidos = $_POST["oidos"];
    $Ojos = $_POST["ojos"];
    $Nariz = $_POST["nariz"];
    $Anestesicos_Bucales = $_POST["anestesicos_bucales"];
    $Pregunta_1 = $_POST["pregunta_1"];
    $Region_Anterior = $_POST["region_anterior"];
    $Region_Lateral = $_POST["region_lateral"];
    $Region_Mejillas = $_POST["region_mejillas"];
    $Paladar_Duro = $_POST["paladar_duro"];
    $Paladar_Blando = $_POST["paladar_blando"];
    $Region_Inferior = $_POST["region_inferior"];
    $Piso_Boca = $_POST["piso_boca"];
    $Pilar_Anterior = $_POST["pilar_anterior"];
    $Pilar_Posterior = $_POST["pilar_posterior"];
    $Amigdalas = $_POST["amigdalas"];
    $Faringe = $_POST["faringe"];
    $Region_Gingival = $_POST["region_gingival"];
    $Encia_Insertada_Adherida = $_POST["encia_insertada_adherida"];
    $Mucosa = $_POST["mucosa"];
    $Proceso_Alveolar = $_POST["proceso_alveolar"];
    $Aumento_Volumen = $_POST["aumento_volumen"];
    $Masas = $_POST["masas"];
    $Cantidad_Saliva = $_POST["cantidad_saliva"];
    $Calidad_Saliva = $_POST["calidad_saliva"];
    $Palpitacion_ATM_I = $_POST["palpitacion_atm_i"];
    $Palpitacion_ATM_D = $_POST["palpitacion_atm_d"];
    $Apertura_Cierre_I = $_POST["apertura_cierre_i"];
    $Apertura_Cierre_D = $_POST["apertura_cierre_d"];
    $Protrusiva_I = $_POST["protrusiva_i"];
    $Protrusiva_D = $_POST["protrusiva_d"];
    $Retrusiva_I = $_POST["retrusiva_i"];
    $Retrusiva_D = $_POST["retrusiva_d"];
    $Lateralidades_I = $_POST["lateralidades_i"];
    $Lateralidades_D = $_POST["lateralidades_d"];
    $Lado_Trabajo_I = $_POST["lado_trabajo_i"];
    $Lado_Trabajo_D = $_POST["lado_trabajo_d"];
    $Lado_Balance_I = $_POST["lado_balance_i"];
    $Lado_Balance_D = $_POST["lado_balance_d"];
    $Temporal = $_POST["temporal"];
    $Masetero = $_POST["masetero"];
    $Pterigoideo_Externo = $_POST["pterigoideo_externo"];
    $Pterigoideo_Interno = $_POST["pterigoideo_interno"];
    $Observaciones_126 = $_POST["observaciones_126"];
    
    $Padecimiento_18 = $_POST["padecimiento-18"];
    $Arriba_18 = $_POST["campo-seleccionado-arriba-18"];
    $Izquierda_18 = $_POST["campo-seleccionado-izquierda-18"];
    $Derecha_18 = $_POST["campo-seleccionado-derecha-18"];
    $Centro_18 = $_POST["campo-seleccionado-centro-18"];
    $Abajo_18 = $_POST["campo-seleccionado-abajo-18"];
    $Diente_18 = $Padecimiento_18.'|'.$Arriba_18.'|'.$Izquierda_18.'|'.$Centro_18.'|'.$Derecha_18.'|'.$Abajo_18;
    
    $Padecimiento_17 = $_POST["padecimiento-17"];
    $Arriba_17 = $_POST["campo-seleccionado-arriba-17"];
    $Izquierda_17 = $_POST["campo-seleccionado-izquierda-17"];
    $Derecha_17 = $_POST["campo-seleccionado-derecha-17"];
    $Centro_17 = $_POST["campo-seleccionado-centro-17"];
    $Abajo_17 = $_POST["campo-seleccionado-abajo-17"];
    $Diente_17 = $Padecimiento_17.'|'.$Arriba_17.'|'.$Izquierda_17.'|'.$Centro_17.'|'.$Derecha_17.'|'.$Abajo_17;
    
    $Padecimiento_16 = $_POST["padecimiento-16"];
    $Arriba_16 = $_POST["campo-seleccionado-arriba-16"];
    $Izquierda_16 = $_POST["campo-seleccionado-izquierda-16"];
    $Derecha_16 = $_POST["campo-seleccionado-derecha-16"];
    $Centro_16 = $_POST["campo-seleccionado-centro-16"];
    $Abajo_16 = $_POST["campo-seleccionado-abajo-16"];
    $Diente_16 = $Padecimiento_16.'|'.$Arriba_16.'|'.$Izquierda_16.'|'.$Centro_16.'|'.$Derecha_16.'|'.$Abajo_16;
    
    $Padecimiento_15 = $_POST["padecimiento-15"];
    $Arriba_15 = $_POST["campo-seleccionado-arriba-15"];
    $Izquierda_15 = $_POST["campo-seleccionado-izquierda-15"];
    $Derecha_15 = $_POST["campo-seleccionado-derecha-15"];
    $Centro_15 = $_POST["campo-seleccionado-centro-15"];
    $Abajo_15 = $_POST["campo-seleccionado-abajo-15"];
    $Diente_15 = $Padecimiento_15.'|'.$Arriba_15.'|'.$Izquierda_15.'|'.$Centro_15.'|'.$Derecha_15.'|'.$Abajo_15;
    
    $Padecimiento_14 = $_POST["padecimiento-14"];
    $Arriba_14 = $_POST["campo-seleccionado-arriba-14"];
    $Izquierda_14 = $_POST["campo-seleccionado-izquierda-14"];
    $Derecha_14 = $_POST["campo-seleccionado-derecha-14"];
    $Centro_14 = $_POST["campo-seleccionado-centro-14"];
    $Abajo_14 = $_POST["campo-seleccionado-abajo-14"];
    $Diente_14 = $Padecimiento_14.'|'.$Arriba_14.'|'.$Izquierda_14.'|'.$Centro_14.'|'.$Derecha_14.'|'.$Abajo_14;
    
    $Padecimiento_13 = $_POST["padecimiento-13"];
    $Arriba_13 = $_POST["campo-seleccionado-arriba-13"];
    $Izquierda_13 = $_POST["campo-seleccionado-izquierda-13"];
    $Derecha_13 = $_POST["campo-seleccionado-derecha-13"];
    $Centro_13 = $_POST["campo-seleccionado-centro-13"];
    $Abajo_13 = $_POST["campo-seleccionado-abajo-13"];
    $Diente_13 = $Padecimiento_13.'|'.$Arriba_13.'|'.$Izquierda_13.'|'.$Centro_13.'|'.$Derecha_13.'|'.$Abajo_13;
    
    $Padecimiento_12 = $_POST["padecimiento-12"];
    $Arriba_12 = $_POST["campo-seleccionado-arriba-12"];
    $Izquierda_12 = $_POST["campo-seleccionado-izquierda-12"];
    $Derecha_12 = $_POST["campo-seleccionado-derecha-12"];
    $Centro_12 = $_POST["campo-seleccionado-centro-12"];
    $Abajo_12 = $_POST["campo-seleccionado-abajo-12"];
    $Diente_12 = $Padecimiento_12.'|'.$Arriba_12.'|'.$Izquierda_12.'|'.$Centro_12.'|'.$Derecha_12.'|'.$Abajo_12;
    
    $Padecimiento_11 = $_POST["padecimiento-11"];
    $Arriba_11 = $_POST["campo-seleccionado-arriba-11"];
    $Izquierda_11 = $_POST["campo-seleccionado-izquierda-11"];
    $Derecha_11 = $_POST["campo-seleccionado-derecha-11"];
    $Centro_11 = $_POST["campo-seleccionado-centro-11"];
    $Abajo_11 = $_POST["campo-seleccionado-abajo-11"];
    $Diente_11 = $Padecimiento_11.'|'.$Arriba_11.'|'.$Izquierda_11.'|'.$Centro_11.'|'.$Derecha_11.'|'.$Abajo_11;
    
    $Padecimiento_21 = $_POST["padecimiento-21"];
    $Arriba_21 = $_POST["campo-seleccionado-arriba-21"];
    $Izquierda_21 = $_POST["campo-seleccionado-izquierda-21"];
    $Derecha_21 = $_POST["campo-seleccionado-derecha-21"];
    $Centro_21 = $_POST["campo-seleccionado-centro-21"];
    $Abajo_21 = $_POST["campo-seleccionado-abajo-21"];
    $Diente_21 = $Padecimiento_21.'|'.$Arriba_21.'|'.$Izquierda_21.'|'.$Centro_21.'|'.$Derecha_21.'|'.$Abajo_21;
    
    $Padecimiento_22 = $_POST["padecimiento-22"];
    $Arriba_22 = $_POST["campo-seleccionado-arriba-22"];
    $Izquierda_22 = $_POST["campo-seleccionado-izquierda-22"];
    $Derecha_22 = $_POST["campo-seleccionado-derecha-22"];
    $Centro_22 = $_POST["campo-seleccionado-centro-22"];
    $Abajo_22 = $_POST["campo-seleccionado-abajo-22"];
    $Diente_22 = $Padecimiento_22.'|'.$Arriba_22.'|'.$Izquierda_22.'|'.$Centro_22.'|'.$Derecha_22.'|'.$Abajo_22;
    
    $Padecimiento_23 = $_POST["padecimiento-23"];
    $Arriba_23 = $_POST["campo-seleccionado-arriba-23"];
    $Izquierda_23 = $_POST["campo-seleccionado-izquierda-23"];
    $Derecha_23 = $_POST["campo-seleccionado-derecha-23"];
    $Centro_23 = $_POST["campo-seleccionado-centro-23"];
    $Abajo_23 = $_POST["campo-seleccionado-abajo-23"];
    $Diente_23 = $Padecimiento_23.'|'.$Arriba_23.'|'.$Izquierda_23.'|'.$Centro_23.'|'.$Derecha_23.'|'.$Abajo_23;
    
    $Padecimiento_24 = $_POST["padecimiento-24"];
    $Arriba_24 = $_POST["campo-seleccionado-arriba-24"];
    $Izquierda_24 = $_POST["campo-seleccionado-izquierda-24"];
    $Derecha_24 = $_POST["campo-seleccionado-derecha-24"];
    $Centro_24 = $_POST["campo-seleccionado-centro-24"];
    $Abajo_24 = $_POST["campo-seleccionado-abajo-24"];
    $Diente_24 = $Padecimiento_24.'|'.$Arriba_24.'|'.$Izquierda_24.'|'.$Centro_24.'|'.$Derecha_24.'|'.$Abajo_24;
    
    $Padecimiento_25 = $_POST["padecimiento-25"];
    $Arriba_25 = $_POST["campo-seleccionado-arriba-25"];
    $Izquierda_25 = $_POST["campo-seleccionado-izquierda-25"];
    $Derecha_25 = $_POST["campo-seleccionado-derecha-25"];
    $Centro_25 = $_POST["campo-seleccionado-centro-25"];
    $Abajo_25 = $_POST["campo-seleccionado-abajo-25"];
    $Diente_25 = $Padecimiento_25.'|'.$Arriba_25.'|'.$Izquierda_25.'|'.$Centro_25.'|'.$Derecha_25.'|'.$Abajo_25;
    
    $Padecimiento_26 = $_POST["padecimiento-26"];
    $Arriba_26 = $_POST["campo-seleccionado-arriba-26"];
    $Izquierda_26 = $_POST["campo-seleccionado-izquierda-26"];
    $Derecha_26 = $_POST["campo-seleccionado-derecha-26"];
    $Centro_26 = $_POST["campo-seleccionado-centro-26"];
    $Abajo_26 = $_POST["campo-seleccionado-abajo-26"];
    $Diente_26 = $Padecimiento_26.'|'.$Arriba_26.'|'.$Izquierda_26.'|'.$Centro_26.'|'.$Derecha_26.'|'.$Abajo_26;
    
    $Padecimiento_27 = $_POST["padecimiento-27"];
    $Arriba_27 = $_POST["campo-seleccionado-arriba-27"];
    $Izquierda_27 = $_POST["campo-seleccionado-izquierda-27"];
    $Derecha_27 = $_POST["campo-seleccionado-derecha-27"];
    $Centro_27 = $_POST["campo-seleccionado-centro-27"];
    $Abajo_27 = $_POST["campo-seleccionado-abajo-27"];
    $Diente_27 = $Padecimiento_27.'|'.$Arriba_27.'|'.$Izquierda_27.'|'.$Centro_27.'|'.$Derecha_27.'|'.$Abajo_27;
    
    $Padecimiento_28 = $_POST["padecimiento-28"];
    $Arriba_28 = $_POST["campo-seleccionado-arriba-28"];
    $Izquierda_28 = $_POST["campo-seleccionado-izquierda-28"];
    $Derecha_28 = $_POST["campo-seleccionado-derecha-28"];
    $Centro_28 = $_POST["campo-seleccionado-centro-28"];
    $Abajo_28 = $_POST["campo-seleccionado-abajo-28"];
    $Diente_28 = $Padecimiento_28.'|'.$Arriba_28.'|'.$Izquierda_28.'|'.$Centro_28.'|'.$Derecha_28.'|'.$Abajo_28;
    
    $Padecimiento_48 = $_POST["padecimiento-48"];
    $Arriba_48 = $_POST["campo-seleccionado-arriba-48"];
    $Izquierda_48 = $_POST["campo-seleccionado-izquierda-48"];
    $Derecha_48 = $_POST["campo-seleccionado-derecha-48"];
    $Centro_48 = $_POST["campo-seleccionado-centro-48"];
    $Abajo_48 = $_POST["campo-seleccionado-abajo-48"];
    $Diente_48 = $Padecimiento_48.'|'.$Arriba_48.'|'.$Izquierda_48.'|'.$Centro_48.'|'.$Derecha_48.'|'.$Abajo_48;
    
    $Padecimiento_47 = $_POST["padecimiento-47"];
    $Arriba_47 = $_POST["campo-seleccionado-arriba-47"];
    $Izquierda_47 = $_POST["campo-seleccionado-izquierda-47"];
    $Derecha_47 = $_POST["campo-seleccionado-derecha-47"];
    $Centro_47 = $_POST["campo-seleccionado-centro-47"];
    $Abajo_47 = $_POST["campo-seleccionado-abajo-47"];
    $Diente_47 = $Padecimiento_47.'|'.$Arriba_47.'|'.$Izquierda_47.'|'.$Centro_47.'|'.$Derecha_47.'|'.$Abajo_47;
    
    $Padecimiento_46 = $_POST["padecimiento-46"];
    $Arriba_46 = $_POST["campo-seleccionado-arriba-46"];
    $Izquierda_46 = $_POST["campo-seleccionado-izquierda-46"];
    $Derecha_46 = $_POST["campo-seleccionado-derecha-46"];
    $Centro_46 = $_POST["campo-seleccionado-centro-46"];
    $Abajo_46 = $_POST["campo-seleccionado-abajo-46"];
    $Diente_46 = $Padecimiento_46.'|'.$Arriba_46.'|'.$Izquierda_46.'|'.$Centro_46.'|'.$Derecha_46.'|'.$Abajo_46;
    
    $Padecimiento_45 = $_POST["padecimiento-45"];
    $Arriba_45 = $_POST["campo-seleccionado-arriba-45"];
    $Izquierda_45 = $_POST["campo-seleccionado-izquierda-45"];
    $Derecha_45 = $_POST["campo-seleccionado-derecha-45"];
    $Centro_45 = $_POST["campo-seleccionado-centro-45"];
    $Abajo_45 = $_POST["campo-seleccionado-abajo-45"];
    $Diente_45 = $Padecimiento_45.'|'.$Arriba_45.'|'.$Izquierda_45.'|'.$Centro_45.'|'.$Derecha_45.'|'.$Abajo_45;
    
    $Padecimiento_44 = $_POST["padecimiento-44"];
    $Arriba_44 = $_POST["campo-seleccionado-arriba-44"];
    $Izquierda_44 = $_POST["campo-seleccionado-izquierda-44"];
    $Derecha_44 = $_POST["campo-seleccionado-derecha-44"];
    $Centro_44 = $_POST["campo-seleccionado-centro-44"];
    $Abajo_44 = $_POST["campo-seleccionado-abajo-44"];
    $Diente_44 = $Padecimiento_44.'|'.$Arriba_44.'|'.$Izquierda_44.'|'.$Centro_44.'|'.$Derecha_44.'|'.$Abajo_44;
    
    $Padecimiento_43 = $_POST["padecimiento-43"];
    $Arriba_43 = $_POST["campo-seleccionado-arriba-43"];
    $Izquierda_43 = $_POST["campo-seleccionado-izquierda-43"];
    $Derecha_43 = $_POST["campo-seleccionado-derecha-43"];
    $Centro_43 = $_POST["campo-seleccionado-centro-43"];
    $Abajo_43 = $_POST["campo-seleccionado-abajo-43"];
    $Diente_43 = $Padecimiento_43.'|'.$Arriba_43.'|'.$Izquierda_43.'|'.$Centro_43.'|'.$Derecha_43.'|'.$Abajo_43;
    
    $Padecimiento_42 = $_POST["padecimiento-42"];
    $Arriba_42 = $_POST["campo-seleccionado-arriba-42"];
    $Izquierda_42 = $_POST["campo-seleccionado-izquierda-42"];
    $Derecha_42 = $_POST["campo-seleccionado-derecha-42"];
    $Centro_42 = $_POST["campo-seleccionado-centro-42"];
    $Abajo_42 = $_POST["campo-seleccionado-abajo-42"];
    $Diente_42 = $Padecimiento_42.'|'.$Arriba_42.'|'.$Izquierda_42.'|'.$Centro_42.'|'.$Derecha_42.'|'.$Abajo_42;
    
    $Padecimiento_41 = $_POST["padecimiento-41"];
    $Arriba_41 = $_POST["campo-seleccionado-arriba-41"];
    $Izquierda_41 = $_POST["campo-seleccionado-izquierda-41"];
    $Derecha_41 = $_POST["campo-seleccionado-derecha-41"];
    $Centro_41 = $_POST["campo-seleccionado-centro-41"];
    $Abajo_41 = $_POST["campo-seleccionado-abajo-41"];
    $Diente_41 = $Padecimiento_41.'|'.$Arriba_41.'|'.$Izquierda_41.'|'.$Centro_41.'|'.$Derecha_41.'|'.$Abajo_41;
    
    $Padecimiento_31 = $_POST["padecimiento-31"];
    $Arriba_31 = $_POST["campo-seleccionado-arriba-31"];
    $Izquierda_31 = $_POST["campo-seleccionado-izquierda-31"];
    $Derecha_31 = $_POST["campo-seleccionado-derecha-31"];
    $Centro_31 = $_POST["campo-seleccionado-centro-31"];
    $Abajo_31 = $_POST["campo-seleccionado-abajo-31"];
    $Diente_31 = $Padecimiento_31.'|'.$Arriba_31.'|'.$Izquierda_31.'|'.$Centro_31.'|'.$Derecha_31.'|'.$Abajo_31;
    
    $Padecimiento_32 = $_POST["padecimiento-32"];
    $Arriba_32 = $_POST["campo-seleccionado-arriba-32"];
    $Izquierda_32 = $_POST["campo-seleccionado-izquierda-32"];
    $Derecha_32 = $_POST["campo-seleccionado-derecha-32"];
    $Centro_32 = $_POST["campo-seleccionado-centro-32"];
    $Abajo_32 = $_POST["campo-seleccionado-abajo-32"];
    $Diente_32 = $Padecimiento_32.'|'.$Arriba_32.'|'.$Izquierda_32.'|'.$Centro_32.'|'.$Derecha_32.'|'.$Abajo_32;
    
    $Padecimiento_33 = $_POST["padecimiento-33"];
    $Arriba_33 = $_POST["campo-seleccionado-arriba-33"];
    $Izquierda_33 = $_POST["campo-seleccionado-izquierda-33"];
    $Derecha_33 = $_POST["campo-seleccionado-derecha-33"];
    $Centro_33 = $_POST["campo-seleccionado-centro-33"];
    $Abajo_33 = $_POST["campo-seleccionado-abajo-33"];
    $Diente_33 = $Padecimiento_33.'|'.$Arriba_33.'|'.$Izquierda_33.'|'.$Centro_33.'|'.$Derecha_33.'|'.$Abajo_33;
    
    $Padecimiento_34 = $_POST["padecimiento-34"];
    $Arriba_34 = $_POST["campo-seleccionado-arriba-34"];
    $Izquierda_34 = $_POST["campo-seleccionado-izquierda-34"];
    $Derecha_34 = $_POST["campo-seleccionado-derecha-34"];
    $Centro_34 = $_POST["campo-seleccionado-centro-34"];
    $Abajo_34 = $_POST["campo-seleccionado-abajo-34"];
    $Diente_34 = $Padecimiento_34.'|'.$Arriba_34.'|'.$Izquierda_34.'|'.$Centro_33.'|'.$Derecha_33.'|'.$Abajo_33;
    
    $Padecimiento_35 = $_POST["padecimiento-35"];
    $Arriba_35 = $_POST["campo-seleccionado-arriba-35"];
    $Izquierda_35 = $_POST["campo-seleccionado-izquierda-35"];
    $Derecha_35 = $_POST["campo-seleccionado-derecha-35"];
    $Centro_35 = $_POST["campo-seleccionado-centro-35"];
    $Abajo_35 = $_POST["campo-seleccionado-abajo-35"];
    $Diente_35 = $Padecimiento_35.'|'.$Arriba_35.'|'.$Izquierda_35.'|'.$Centro_35.'|'.$Derecha_35.'|'.$Abajo_35;
    
    $Padecimiento_36 = $_POST["padecimiento-36"];
    $Arriba_36 = $_POST["campo-seleccionado-arriba-36"];
    $Izquierda_36 = $_POST["campo-seleccionado-izquierda-36"];
    $Derecha_36 = $_POST["campo-seleccionado-derecha-36"];
    $Centro_36 = $_POST["campo-seleccionado-centro-36"];
    $Abajo_36 = $_POST["campo-seleccionado-abajo-36"];
    $Diente_36 = $Padecimiento_36.'|'.$Arriba_36.'|'.$Izquierda_36.'|'.$Centro_36.'|'.$Derecha_36.'|'.$Abajo_36;
    
    $Padecimiento_37 = $_POST["padecimiento-37"];
    $Arriba_37 = $_POST["campo-seleccionado-arriba-37"];
    $Izquierda_37 = $_POST["campo-seleccionado-izquierda-37"];
    $Derecha_37 = $_POST["campo-seleccionado-derecha-37"];
    $Centro_37 = $_POST["campo-seleccionado-centro-37"];
    $Abajo_37 = $_POST["campo-seleccionado-abajo-37"];
    $Diente_37 = $Padecimiento_37.'|'.$Arriba_37.'|'.$Izquierda_37.'|'.$Centro_37.'|'.$Derecha_37.'|'.$Abajo_37;
    
    $Padecimiento_38 = $_POST["padecimiento-38"];
    $Arriba_38 = $_POST["campo-seleccionado-arriba-38"];
    $Izquierda_38 = $_POST["campo-seleccionado-izquierda-38"];
    $Derecha_38 = $_POST["campo-seleccionado-derecha-38"];
    $Centro_38 = $_POST["campo-seleccionado-centro-38"];
    $Abajo_38 = $_POST["campo-seleccionado-abajo-38"];
    $Diente_38 = $Padecimiento_38.'|'.$Arriba_38.'|'.$Izquierda_38.'|'.$Centro_38.'|'.$Derecha_38.'|'.$Abajo_38;
    
    $Padecimiento_55 = $_POST["padecimiento-55"];
    $Arriba_55 = $_POST["campo-seleccionado-arriba-55"];
    $Izquierda_55 = $_POST["campo-seleccionado-izquierda-55"];
    $Derecha_55 = $_POST["campo-seleccionado-derecha-55"];
    $Centro_55 = $_POST["campo-seleccionado-centro-55"];
    $Abajo_55 = $_POST["campo-seleccionado-abajo-55"];
    $Diente_55 = $Padecimiento_55.'|'.$Arriba_55.'|'.$Izquierda_55.'|'.$Centro_55.'|'.$Derecha_55.'|'.$Abajo_55;
    
    $Padecimiento_54 = $_POST["padecimiento-54"];
    $Arriba_54 = $_POST["campo-seleccionado-arriba-54"];
    $Izquierda_54 = $_POST["campo-seleccionado-izquierda-54"];
    $Derecha_54 = $_POST["campo-seleccionado-derecha-54"];
    $Centro_54 = $_POST["campo-seleccionado-centro-54"];
    $Abajo_54 = $_POST["campo-seleccionado-abajo-54"];
    $Diente_54 = $Padecimiento_54.'|'.$Arriba_54.'|'.$Izquierda_54.'|'.$Centro_54.'|'.$Derecha_54.'|'.$Abajo_54;
    
    $Padecimiento_53 = $_POST["padecimiento-53"];
    $Arriba_53 = $_POST["campo-seleccionado-arriba-53"];
    $Izquierda_53 = $_POST["campo-seleccionado-izquierda-53"];
    $Derecha_53 = $_POST["campo-seleccionado-derecha-53"];
    $Centro_53 = $_POST["campo-seleccionado-centro-53"];
    $Abajo_53 = $_POST["campo-seleccionado-abajo-53"];
    $Diente_53 = $Padecimiento_53.'|'.$Arriba_53.'|'.$Izquierda_53.'|'.$Centro_53.'|'.$Derecha_53.'|'.$Abajo_53;
    
    $Padecimiento_52 = $_POST["padecimiento-52"];
    $Arriba_52 = $_POST["campo-seleccionado-arriba-52"];
    $Izquierda_52 = $_POST["campo-seleccionado-izquierda-52"];
    $Derecha_52 = $_POST["campo-seleccionado-derecha-52"];
    $Centro_52 = $_POST["campo-seleccionado-centro-52"];
    $Abajo_52 = $_POST["campo-seleccionado-abajo-52"];
    $Diente_52 = $Padecimiento_52.'|'.$Arriba_52.'|'.$Izquierda_52.'|'.$Centro_52.'|'.$Derecha_52.'|'.$Abajo_52;
    
    $Padecimiento_51 = $_POST["padecimiento-51"];
    $Arriba_51 = $_POST["campo-seleccionado-arriba-51"];
    $Izquierda_51 = $_POST["campo-seleccionado-izquierda-51"];
    $Derecha_51 = $_POST["campo-seleccionado-derecha-51"];
    $Centro_51 = $_POST["campo-seleccionado-centro-51"];
    $Abajo_51 = $_POST["campo-seleccionado-abajo-51"];
    $Diente_51 = $Padecimiento_51.'|'.$Arriba_51.'|'.$Izquierda_51.'|'.$Centro_51.'|'.$Derecha_51.'|'.$Abajo_51;
    
    $Padecimiento_61 = $_POST["padecimiento-61"];
    $Arriba_61 = $_POST["campo-seleccionado-arriba-61"];
    $Izquierda_61 = $_POST["campo-seleccionado-izquierda-61"];
    $Derecha_61 = $_POST["campo-seleccionado-derecha-61"];
    $Centro_61 = $_POST["campo-seleccionado-centro-61"];
    $Abajo_61 = $_POST["campo-seleccionado-abajo-61"];
    $Diente_61 = $Padecimiento_61.'|'.$Arriba_61.'|'.$Izquierda_61.'|'.$Centro_61.'|'.$Derecha_61.'|'.$Abajo_61;
    
    $Padecimiento_62 = $_POST["padecimiento-62"];
    $Arriba_62 = $_POST["campo-seleccionado-arriba-62"];
    $Izquierda_62 = $_POST["campo-seleccionado-izquierda-62"];
    $Derecha_62 = $_POST["campo-seleccionado-derecha-62"];
    $Centro_62 = $_POST["campo-seleccionado-centro-62"];
    $Abajo_62 = $_POST["campo-seleccionado-abajo-62"];
    $Diente_62 = $Padecimiento_62.'|'.$Arriba_62.'|'.$Izquierda_62.'|'.$Centro_62.'|'.$Derecha_62.'|'.$Abajo_62;
    
    $Padecimiento_63 = $_POST["padecimiento-63"];
    $Arriba_63 = $_POST["campo-seleccionado-arriba-63"];
    $Izquierda_63 = $_POST["campo-seleccionado-izquierda-63"];
    $Derecha_63 = $_POST["campo-seleccionado-derecha-63"];
    $Centro_63 = $_POST["campo-seleccionado-centro-63"];
    $Abajo_63 = $_POST["campo-seleccionado-abajo-63"];
    $Diente_63 = $Padecimiento_63.'|'.$Arriba_63.'|'.$Izquierda_63.'|'.$Centro_63.'|'.$Derecha_63.'|'.$Abajo_63;
    
    $Padecimiento_64 = $_POST["padecimiento-64"];
    $Arriba_64 = $_POST["campo-seleccionado-arriba-64"];
    $Izquierda_64 = $_POST["campo-seleccionado-izquierda-64"];
    $Derecha_64 = $_POST["campo-seleccionado-derecha-64"];
    $Centro_64 = $_POST["campo-seleccionado-centro-64"];
    $Abajo_64 = $_POST["campo-seleccionado-abajo-64"];
    $Diente_64 = $Padecimiento_64.'|'.$Arriba_64.'|'.$Izquierda_64.'|'.$Centro_64.'|'.$Derecha_64.'|'.$Abajo_64;
    
    $Padecimiento_65 = $_POST["padecimiento-25"];
    $Arriba_65 = $_POST["campo-seleccionado-arriba-25"];
    $Izquierda_65 = $_POST["campo-seleccionado-izquierda-25"];
    $Derecha_65 = $_POST["campo-seleccionado-derecha-25"];
    $Centro_65 = $_POST["campo-seleccionado-centro-25"];
    $Abajo_65 = $_POST["campo-seleccionado-abajo-25"];
    $Diente_65 = $Padecimiento_65.'|'.$Arriba_65.'|'.$Izquierda_65.'|'.$Centro_65.'|'.$Derecha_65.'|'.$Abajo_65;
    
    $Padecimiento_85 = $_POST["padecimiento-85"];
    $Arriba_85 = $_POST["campo-seleccionado-arriba-85"];
    $Izquierda_85 = $_POST["campo-seleccionado-izquierda-85"];
    $Derecha_85 = $_POST["campo-seleccionado-derecha-85"];
    $Centro_85 = $_POST["campo-seleccionado-centro-85"];
    $Abajo_85 = $_POST["campo-seleccionado-abajo-85"];
    $Diente_85 = $Padecimiento_85.'|'.$Arriba_85.'|'.$Izquierda_85.'|'.$Centro_85.'|'.$Derecha_85.'|'.$Abajo_85;
    
    $Padecimiento_84 = $_POST["padecimiento-84"];
    $Arriba_84 = $_POST["campo-seleccionado-arriba-84"];
    $Izquierda_84 = $_POST["campo-seleccionado-izquierda-84"];
    $Derecha_84 = $_POST["campo-seleccionado-derecha-84"];
    $Centro_84 = $_POST["campo-seleccionado-centro-84"];
    $Abajo_84 = $_POST["campo-seleccionado-abajo-84"];
    $Diente_84 = $Padecimiento_84.'|'.$Arriba_84.'|'.$Izquierda_84.'|'.$Centro_84.'|'.$Derecha_84.'|'.$Abajo_84;
    
    $Padecimiento_83 = $_POST["padecimiento-83"];
    $Arriba_83 = $_POST["campo-seleccionado-arriba-83"];
    $Izquierda_83 = $_POST["campo-seleccionado-izquierda-83"];
    $Derecha_83 = $_POST["campo-seleccionado-derecha-83"];
    $Centro_83 = $_POST["campo-seleccionado-centro-83"];
    $Abajo_83 = $_POST["campo-seleccionado-abajo-83"];
    $Diente_83 = $Padecimiento_83.'|'.$Arriba_83.'|'.$Izquierda_83.'|'.$Centro_83.'|'.$Derecha_83.'|'.$Abajo_83;
    
    $Padecimiento_82 = $_POST["padecimiento-82"];
    $Arriba_82 = $_POST["campo-seleccionado-arriba-82"];
    $Izquierda_82 = $_POST["campo-seleccionado-izquierda-82"];
    $Derecha_82 = $_POST["campo-seleccionado-derecha-82"];
    $Centro_82 = $_POST["campo-seleccionado-centro-82"];
    $Abajo_82 = $_POST["campo-seleccionado-abajo-82"];
    $Diente_82 = $Padecimiento_82.'|'.$Arriba_82.'|'.$Izquierda_82.'|'.$Centro_82.'|'.$Derecha_82.'|'.$Abajo_82;
    
    $Padecimiento_81 = $_POST["padecimiento-81"];
    $Arriba_81 = $_POST["campo-seleccionado-arriba-81"];
    $Izquierda_81 = $_POST["campo-seleccionado-izquierda-81"];
    $Derecha_81 = $_POST["campo-seleccionado-derecha-81"];
    $Centro_81 = $_POST["campo-seleccionado-centro-81"];
    $Abajo_81 = $_POST["campo-seleccionado-abajo-81"];
    $Diente_81 = $Padecimiento_81.'|'.$Arriba_81.'|'.$Izquierda_81.'|'.$Centro_81.'|'.$Derecha_81.'|'.$Abajo_81;
    
    $Padecimiento_71 = $_POST["padecimiento-71"];
    $Arriba_71 = $_POST["campo-seleccionado-arriba-71"];
    $Izquierda_71 = $_POST["campo-seleccionado-izquierda-71"];
    $Derecha_71 = $_POST["campo-seleccionado-derecha-71"];
    $Centro_71 = $_POST["campo-seleccionado-centro-71"];
    $Abajo_71 = $_POST["campo-seleccionado-abajo-71"];
    $Diente_71 = $Padecimiento_71.'|'.$Arriba_71.'|'.$Izquierda_71.'|'.$Centro_71.'|'.$Derecha_71.'|'.$Abajo_71;
    
    $Padecimiento_72 = $_POST["padecimiento-72"];
    $Arriba_72 = $_POST["campo-seleccionado-arriba-72"];
    $Izquierda_72 = $_POST["campo-seleccionado-izquierda-72"];
    $Derecha_72 = $_POST["campo-seleccionado-derecha-72"];
    $Centro_72 = $_POST["campo-seleccionado-centro-72"];
    $Abajo_72 = $_POST["campo-seleccionado-abajo-72"];
    $Diente_72 = $Padecimiento_72.'|'.$Arriba_72.'|'.$Izquierda_72.'|'.$Centro_72.'|'.$Derecha_72.'|'.$Abajo_72;
    
    $Padecimiento_73 = $_POST["padecimiento-73"];
    $Arriba_73 = $_POST["campo-seleccionado-arriba-73"];
    $Izquierda_73 = $_POST["campo-seleccionado-izquierda-73"];
    $Derecha_73 = $_POST["campo-seleccionado-derecha-73"];
    $Centro_73 = $_POST["campo-seleccionado-centro-73"];
    $Abajo_73 = $_POST["campo-seleccionado-abajo-73"];
    $Diente_73 = $Padecimiento_73.'|'.$Arriba_73.'|'.$Izquierda_73.'|'.$Centro_73.'|'.$Derecha_73.'|'.$Abajo_73;
    
    $Padecimiento_74 = $_POST["padecimiento-74"];
    $Arriba_74 = $_POST["campo-seleccionado-arriba-74"];
    $Izquierda_74 = $_POST["campo-seleccionado-izquierda-74"];
    $Derecha_74 = $_POST["campo-seleccionado-derecha-74"];
    $Centro_74 = $_POST["campo-seleccionado-centro-74"];
    $Abajo_74 = $_POST["campo-seleccionado-abajo-74"];
    $Diente_74 = $Padecimiento_74.'|'.$Arriba_74.'|'.$Izquierda_74.'|'.$Centro_73.'|'.$Derecha_73.'|'.$Abajo_73;
    
    $Padecimiento_75 = $_POST["padecimiento-75"];
    $Arriba_75 = $_POST["campo-seleccionado-arriba-75"];
    $Izquierda_75 = $_POST["campo-seleccionado-izquierda-75"];
    $Derecha_75 = $_POST["campo-seleccionado-derecha-75"];
    $Centro_75 = $_POST["campo-seleccionado-centro-75"];
    $Abajo_75 = $_POST["campo-seleccionado-abajo-75"];
    $Diente_75 = $Padecimiento_75.'|'.$Arriba_75.'|'.$Izquierda_75.'|'.$Centro_75.'|'.$Derecha_75.'|'.$Abajo_75;
    
    $Examen_Oclusal = $_POST["examen_oclusal"];
    $Abrasiones = $_POST["abrasiones"];
    $Atriciones = $_POST["atriciones"];
    $Apinamiento = $_POST["apinamiento"];
    $Mordida_Cruzada = $_POST["mordida_cruzada"];
    $Malposiciones_Individuales = $_POST["malposiciones_individuales"];
    $Diastemas = $_POST["diastemas"];
    $Linea_Medida = $_POST["linea_media"];
    $Examen_Radiografico = $_POST["examen_radiografico"];
    $Cuello_Forma = $_POST["cuello_forma"];
    $Cuello_Volumen = $_POST["cuello_volumen"];
    $Cuello_Movimientos = $_POST["cuello_movimientos"];
    $Cuello_Ganglios = $_POST["cuello_ganglios"];
    $Cuello_Traquea = $_POST["cuello_traquea"];
    $Cuello_Tiroides = $_POST["cuello_tiroides"];
    $Cuello_Masas = $_POST["cuello_masas"];
    $Cuello_Pulsos = $_POST["cuello_pulsos"];
    $Cuello_Carotideos = $_POST["cuello_carotideos"];
    $Cuello_Ingurgitacion_Yugular = $_POST["cuello_ingurgitacion_yugular"];
    $Torax = $_POST["torax"];
    $Abdomen = $_POST["abdomen"];
    $Miembro_Superior_Inferior = $_POST["miembro_superior_inferior"];
    $Observaciones_Medicas = $_POST["observaciones_medicas"];
    $Diagnostico_Bucal = $_POST["diagnostico_bucal"];
    $Pronostico_Favorable = $_POST["pronostico_favorable"];
    $Pronostico_Desfavorable = $_POST["pronostico_desfavorable"];
    $Pronostico_Reservado = $_POST["pronostico_reservado"];
    $Pronostico_Porque = $_POST["pronostico_porque"];
    $Pronostico_Para_Quien = $_POST["pronostico_para_quien"];
    $Pronostico_Plan_Tratamiento = $_POST["pronostico_plan_tratamiento"]; 
	
	//guardar la historia clinica
    
    $Formato_Historia_Clinica_General = new Formato_Historia_Clinica_General(
        '',
        $IdParejaClinica,
        $Paciente,
        $Telefono,
        $Email,
        $Calle,
        $Numero,
        $Colonia,
        $Poblacion,
        $Padecimiento_Actual,
        $Diabetes,
        $Observaciones_1,
        $Cardiopatias,
        $Observaciones_2,
        $Hipertension,
        $Observaciones_3,
        $Obesidad,
        $Observaciones_4,
        $Cancer,
        $Observaciones_5,
        $Sifilis,
        $Observaciones_6,
        $Anomalias_Congenitas,
        $Observaciones_7,
        $Trastornos_Hematicos,
        $Observaciones_8,
        $Otros,
        $Observaciones_9,
        $Habitacion,
        $Observaciones_10,
        $Alimentacion,
        $Observaciones_11,
        $Higiene,
        $Observaciones_12,
        $Alcoholismo,
        $Observaciones_13,
        $Tabaquismo,
        $Observaciones_14,
        $Toxicomania,
        $Observaciones_15,
        $Diabetes_2,
        $Observaciones_16,
        $Hipertension_2,
        $Observaciones_17,
        $Gastritis,
        $Observaciones_18,
        $Hepatitis,
        $Observaciones_19,
        $Hipertiroidismo,
        $Observaciones_20,
        $Hemorragias,
        $Observaciones_21,
        $Epilepsia,
        $Observaciones_22,
        $Alergias,
        $Observaciones_23,
        $Transfuciones,
        $Observaciones_24,
        $Quirurgico,
        $Observaciones_25,
        $Otros_2,
        $Observaciones_26,
        $Mercarca,
        $Observaciones_27,
        $Ritmo,
        $Observaciones_28,
        $Usa,
        $Observaciones_29,
        $Gesta,
        $Observaciones_30,
        $Para,
        $Observaciones_31,
        $Aborto,
        $Observaciones_32,
        $Cesarea,
        $Observaciones_33,
        $Fur,
        $Observaciones_34,
        $Menopausia,
        $Observaciones_35,
        $Doc,
        $Observaciones_36,
        $Planificacion_Familiar,
        $Observaciones_37,
        $Anorexia,
        $Observaciones_38,
        $Polifagia,
        $Observaciones_39,
        $Polidipsia,
        $Observaciones_40,
        $Halitosis,
        $Observaciones_41,
        $Sialorrea,
        $Observaciones_42,
        $Xerostomia,
        $Observaciones_43,
        $Disfagia,
        $Observaciones_44,
        $Odinofagia,
        $Observaciones_45,
        $Dolor_Abdominal,
        $Observaciones_46,
        $Hematemesis,
        $Observaciones_47,
        $Pirosis,
        $Observaciones_48,
        $Vomito,
        $Observaciones_49,
        $Flatulencia,
        $Observaciones_50,
        $Ictericia,
        $Observaciones_51,
        $Rectorragia,
        $Observaciones_52,
        $Melena,
        $Observaciones_53,
        $Prurito_Anal,
        $Observaciones_54,
        $Dolor_Precordial,
        $Observaciones_55,
        $Disnea,
        $Observaciones_56,
        $Ortopnea,
        $Observaciones_57,
        $Acufenos,
        $Observaciones_58,
        $Forfenos,
        $Observaciones_59,
        $Vertigos,
        $Observaciones_60,
        $Cefalea,
        $Observaciones_61,
        $Palpitaciones,
        $Observaciones_62,
        $Parestesias,
        $Observaciones_63,
        $Cianosis,
        $Observaciones_64,
        $Edema,
        $Observaciones_65,
        $Bochorno,
        $Observaciones_66,
        $Lipotimias,
        $Observaciones_67,
        $Cambios_Piel,
        $Observaciones_68,
        $Epistaxis,
        $Observaciones_69,
        $Disnea_2,
		$Observaciones_70,
        $Tos,
        $Observaciones_71,
        $Hemoptisis,
        $Observaciones_72,
        $Sibilancias,
        $Observaciones_73,
        $Dolor,
        $Observaciones_74,
        $Respiracion_Bucal_Nasal,
        $Observaciones_75,
        $Nictamero,
        $Observaciones_76,
        $Disuria,
        $Observaciones_77,
        $Poliuria,
        $Observaciones_78,
        $Poliarquiuria,
        $Observaciones_79,
        $Hematuria,
        $Observaciones_80,
        $Algiuria,
        $Observaciones_81,
        $Caso_Fememino,
        $Observaciones_82,
        $Caso_Masculino,
        $Observaciones_83,
        $Fiebre_Larga,
        $Observaciones_84,
        $Palidez,
        $Observaciones_85,
        $Edema_2,
        $Observaciones_86,
        $Hemorragia,
        $Observaciones_87,
        $Petequias,
        $Observaciones_88,
        $Equimosis,
        $Observaciones_89,
        $Hematomas,
        $Observaciones_90,
        $Perdida_Aumento_Peso,
        $Observaciones_91,
        $Nerviosismo,
        $Observaciones_92,
        $Alteraciones_Menstruacion,
        $Observaciones_93,
        $Pilificacion,
        $Observaciones_94,
        $Convulsiones,
        $Observaciones_95,
        $Cefaleas,
        $Observaciones_96,
        $Parestesias_2,
        $Observaciones_97,
        $Anestesias,
        $Observaciones_98,
        $Paresias,
        $Observaciones_99,
        $Paralisis,
        $Observaciones_100,
        $Vertigos_2,
        $Observaciones_101,
        $Hiperestesias,
        $Observaciones_102,
        $Angustia,
        $Observaciones_103,
        $Ansiedad,
        $Observaciones_104,
        $Otalgias,
        $Observaciones_105,
        $Otorrea,
        $Observaciones_106,
        $Otorragia,
        $Observaciones_107,
        $Acufenos_2,
        $Observaciones_108,
        $Vertigos_3,
        $Observaciones_109,
        $Fosfenos,
        $Observaciones_110,
        $Agudeza_Visual,
        $Observaciones_111,
        $Fotofobia,
        $Observaciones_112,
        $Lagrimeo,
        $Observaciones_113,
        $Secreciones,
        $Observaciones_114,
        $Parosmia,
        $Observaciones_115,
        $Hipersmia,
        $Observaciones_116,
        $Secreciones_2,
        $Observaciones_117,
        $Prurito,
        $Observaciones_118,
        $Epistaxis_2,
        $Observaciones_119,
        $Dolor_Nasal,
        $Observaciones_120,
        $Hipergeusia,
        $Observaciones_121,
        $Parageusia,
        $Observaciones_122,
        $Ageusia,
        $Observaciones_123,
        $Glosalgia,
        $Observaciones_124,
        $Glosodinia,
        $Observaciones_125,
        $Examen_Laboratorio,
        $Terapeutica,
        $Frecuencia_Cardiaca,
        $Temperatura,
        $Pulso,
        $Respiracion,
        $Tension_Arterial,
	$Somatometria_Peso,
        $Somatometria_Estatura,
        $Craneo_Tamano,
        $Craneo_Contorno,
        $Craneo_Implantacion_Cabello,
        $Craneo_Deformidades,
        $Craneo_Exostosis,
        $Craneo_Endostosis,
        $Cara_Expresion_Facial,
        $Cara_Simetria,
        $Cara_Movimientos_Involuntarios,
        $Cara_Edemas,
        $Cara_Masas,
        $Oidos,
        $Ojos,
        $Nariz,
        $Anestesicos_Bucales,
        $Pregunta_1,
        $Region_Anterior,
        $Region_Lateral,
        $Region_Mejillas,
        $Paladar_Duro,
        $Paladar_Blando,
		$Region_Inferior,
		$Piso_Boca,
		$Pilar_Anterior,
		$Pilar_Posterior,
        $Amigdalas,
        $Faringe,
        $Region_Gingival,
        $Encia_Insertada_Adherida,
        $Mucosa,
        $Proceso_Alveolar,
        $Aumento_Volumen,
        $Masas,
        $Cantidad_Saliva,
        $Calidad_Saliva,
        $Palpitacion_ATM_I,
        $Palpitacion_ATM_D,
        $Apertura_Cierre_I,
        $Apertura_Cierre_D,
        $Protrusiva_I,
        $Protrusiva_D,
        $Retrusiva_I,
        $Retrusiva_D,
        $Lateralidades_I,
        $Lateralidades_D,
        $Lado_Trabajo_I,
        $Lado_Trabajo_D,
        $Lado_Balance_I,
        $Lado_Balance_D,
        $Temporal,
        $Masetero,
        $Pterigoideo_Externo,
        $Pterigoideo_Interno,
        $Observaciones_126,    
        $Diente_18, 
        $Diente_17,
        $Diente_16,
        $Diente_15,
        $Diente_14,
        $Diente_13,
        $Diente_12,
        $Diente_11,
        $Diente_21,
        $Diente_22,
        $Diente_23,
        $Diente_24,
        $Diente_25,
        $Diente_26,
        $Diente_27,
        $Diente_28,
        $Diente_48,
        $Diente_47,
        $Diente_46,
        $Diente_45,
        $Diente_44,
        $Diente_43,
        $Diente_42,
        $Diente_41,
        $Diente_31,    
        $Diente_32,
        $Diente_33,
        $Diente_34,
        $Diente_35,
        $Diente_36,
        $Diente_37,
        $Diente_38,  
        $Diente_55,
        $Diente_54,
        $Diente_53,
        $Diente_52,
        $Diente_51,
        $Diente_61,
        $Diente_62,
        $Diente_63,
        $Diente_64,
        $Diente_65,
        $Diente_85,
        $Diente_84,
        $Diente_83,
        $Diente_82,
        $Diente_81,
        $Diente_71,    
        $Diente_72,
        $Diente_73,
        $Diente_74,
        $Diente_75,
        $Examen_Oclusal,
        $Abrasiones,
        $Atriciones,
        $Apinamiento,
        $Mordida_Cruzada,
        $Malposiciones_Individuales,
        $Diastemas,
        $Linea_Medida,
        $Examen_Radiografico,
        $Cuello_Forma,
        $Cuello_Volumen,
        $Cuello_Movimientos,
        $Cuello_Ganglios,
        $Cuello_Traquea,
        $Cuello_Tiroides,
        $Cuello_Masas,
        $Cuello_Pulsos,
        $Cuello_Carotideos,
        $Cuello_Ingurgitacion_Yugular,
        $Torax,
        $Abdomen,
        $Miembro_Superior_Inferior,
        $Observaciones_Medicas,
        $Diagnostico_Bucal,
        $Pronostico_Favorable,
        $Pronostico_Desfavorable,
        $Pronostico_Reservado, 
        $Pronostico_Porque,
        $Pronostico_Para_Quien,
        $Pronostico_Plan_Tratamiento
    );
    
    $Formato_Historia_Clinica_General->Alta();   
}

//aprobar la historia clinica

if(isset($_REQUEST['aprobar']))
{
    $Historia_Clinica = $_POST["historia_clinica"];
    $Aprobacion = $_POST["aprobacion"];
    
    $Formato_Historia_Clinica_General = new Formato_Historia_Clinica_General(); 
    
    $Formato_Historia_Clinica_General->IdHistoriaClinicaGeneral = $Historia_Clinica; 
    $Formato_Historia_Clinica_General->Aprobado = $Aprobacion;
    
    $Formato_Historia_Clinica_General->Aprobar(); 
}
?>