<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Formato_Historia_Clinica_Exodoncia.php");

//validar el guardado de la historia clinica

if(isset($_REQUEST['guardar']))
{
    $Pareja_Clinica = $_POST["pareja-clinica"];
    $Paciente = $_POST["sltpaciente-exodoncia"];
    $Ocupacion = $_POST["ocupacion"];
    $LugarNacimiento = $_POST["lugar-nacimiento"];
    $Examen_Bucal_Diagnostico = $_POST["examen_bucal_diagnostico"];
    $Examen_Bucal_Tratamiento = $_POST["examen_bucal_tratamiento"];
    $Aparatos_Sistemas_Cardiovascular = $_POST["aparatos_sistemas_cardiovascular"];  
    $Aparatos_Sistemas_Renal = $_POST["aparatos_sistemas_renal"];  
    $Aparatos_Sistemas_Nervioso = $_POST["aparatos_sistemas_nervioso"];  
    $Aparatos_Sistemas_Digestivo = $_POST["aparatos_sistemas_digestivo"];  
    $Aparatos_Sistemas_Respiratorio = $_POST["aparatos_sistemas_respiratorio"];    
    $Genitourinario_Embarazo = $_POST["genitourinario_embarazo"];  
    $Genitourinario_Menopausia = $_POST["genitourinario_menopausia"];  
    $Genitourinario_Lactancia = $_POST["genitourinario_lactancia"];  
    $Genitourinario_Menstruacion = $_POST["genitourinario_menstruacion"];  
    $Propension_Hemorragica = $_POST["propension_hemorragica"];  
    $Pruebas_Laboratorio = $_POST["pruebas_laboratorio"];  
    $Estudio_Radiologico = $_POST["estudio_radiologico"];  
    $Estado_General = $_POST["estado_general"];  
    $Extraccion_Dentaria = $_POST["extraccion_dentaria"];  
    $Analgesia_Indicada = $_POST["analgesia_indicada"];  
    $Prescripciones_Operatorias = $_POST["prescripciones_operatorias"];  
    $Complicaciones = $_POST["complicaciones"];  
    $Indicacion_Paciente = $_POST["indicacion_paciente"];  
    $Arriba_18 = $_POST["campo-seleccionado-arriba-18"];  
    $Izquierda_18 = $_POST["campo-seleccionado-izquierda-18"];  
    $Centro_18 = $_POST["campo-seleccionado-centro-18"];  
    $Derecha_18 = $_POST["campo-seleccionado-derecha-18"];  
    $Abajo_18 = $_POST["campo-seleccionado-abajo-18"];
    $Arriba_17 = $_POST["campo-seleccionado-arriba-17"];  
    $Izquierda_17 = $_POST["campo-seleccionado-izquierda-17"];  
    $Centro_17 = $_POST["campo-seleccionado-centro-17"];  
    $Derecha_17 = $_POST["campo-seleccionado-derecha-17"];  
    $Abajo_17 = $_POST["campo-seleccionado-abajo-17"]; 
    $Arriba_16 = $_POST["campo-seleccionado-arriba-16"];  
    $Izquierda_16 = $_POST["campo-seleccionado-izquierda-16"];  
    $Centro_16 = $_POST["campo-seleccionado-centro-16"];  
    $Derecha_16 = $_POST["campo-seleccionado-derecha-16"];  
    $Abajo_16 = $_POST["campo-seleccionado-abajo-16"]; 
    $Arriba_15 = $_POST["campo-seleccionado-arriba-15"];  
    $Izquierda_15 = $_POST["campo-seleccionado-izquierda-15"];  
    $Centro_15 = $_POST["campo-seleccionado-centro-15"];  
    $Derecha_15 = $_POST["campo-seleccionado-derecha-15"];  
    $Abajo_15 = $_POST["campo-seleccionado-abajo-15"]; 
    $Arriba_14 = $_POST["campo-seleccionado-arriba-14"];  
    $Izquierda_14 = $_POST["campo-seleccionado-izquierda-14"];  
    $Centro_14 = $_POST["campo-seleccionado-centro-14"];  
    $Derecha_14 = $_POST["campo-seleccionado-derecha-14"];  
    $Abajo_14 = $_POST["campo-seleccionado-abajo-14"]; 
    $Arriba_13 = $_POST["campo-seleccionado-arriba-13"];  
    $Izquierda_13 = $_POST["campo-seleccionado-izquierda-13"];  
    $Centro_13 = $_POST["campo-seleccionado-centro-13"];  
    $Derecha_13 = $_POST["campo-seleccionado-derecha-13"];  
    $Abajo_13 = $_POST["campo-seleccionado-abajo-13"]; 
    $Arriba_12 = $_POST["campo-seleccionado-arriba-12"];  
    $Izquierda_12 = $_POST["campo-seleccionado-izquierda-12"];  
    $Centro_12 = $_POST["campo-seleccionado-centro-12"];  
    $Derecha_12 = $_POST["campo-seleccionado-derecha-12"];  
    $Abajo_12 = $_POST["campo-seleccionado-abajo-12"]; 
    $Arriba_11 = $_POST["campo-seleccionado-arriba-11"];  
    $Izquierda_11 = $_POST["campo-seleccionado-izquierda-11"];  
    $Centro_11 = $_POST["campo-seleccionado-centro-11"];  
    $Derecha_11 = $_POST["campo-seleccionado-derecha-11"];  
    $Abajo_11 = $_POST["campo-seleccionado-abajo-11"]; 
    $Arriba_21 = $_POST["campo-seleccionado-arriba-21"];  
    $Izquierda_21 = $_POST["campo-seleccionado-izquierda-21"];  
    $Centro_21 = $_POST["campo-seleccionado-centro-21"];  
    $Derecha_21 = $_POST["campo-seleccionado-derecha-21"];  
    $Abajo_21 = $_POST["campo-seleccionado-abajo-21"]; 
    $Arriba_22 = $_POST["campo-seleccionado-arriba-22"];  
    $Izquierda_22 = $_POST["campo-seleccionado-izquierda-22"];  
    $Centro_22 = $_POST["campo-seleccionado-centro-22"];  
    $Derecha_22 = $_POST["campo-seleccionado-derecha-22"];  
    $Abajo_22 = $_POST["campo-seleccionado-abajo-22"]; 
    $Arriba_23 = $_POST["campo-seleccionado-arriba-23"];  
    $Izquierda_23 = $_POST["campo-seleccionado-izquierda-23"];  
    $Centro_23 = $_POST["campo-seleccionado-centro-23"];  
    $Derecha_23 = $_POST["campo-seleccionado-derecha-23"];  
    $Abajo_23 = $_POST["campo-seleccionado-abajo-23"]; 
    $Arriba_24 = $_POST["campo-seleccionado-arriba-24"];  
    $Izquierda_24 = $_POST["campo-seleccionado-izquierda-24"];  
    $Centro_24 = $_POST["campo-seleccionado-centro-24"];  
    $Derecha_24 = $_POST["campo-seleccionado-derecha-24"];  
    $Abajo_24 = $_POST["campo-seleccionado-abajo-24"];
    $Arriba_25 = $_POST["campo-seleccionado-arriba-25"];  
    $Izquierda_25 = $_POST["campo-seleccionado-izquierda-25"];  
    $Centro_25 = $_POST["campo-seleccionado-centro-25"];  
    $Derecha_25 = $_POST["campo-seleccionado-derecha-25"];  
    $Abajo_25 = $_POST["campo-seleccionado-abajo-25"]; 
    $Arriba_26 = $_POST["campo-seleccionado-arriba-26"];  
    $Izquierda_26 = $_POST["campo-seleccionado-izquierda-26"];  
    $Centro_26 = $_POST["campo-seleccionado-centro-26"];  
    $Derecha_26 = $_POST["campo-seleccionado-derecha-26"];  
    $Abajo_26 = $_POST["campo-seleccionado-abajo-26"]; 
    $Arriba_27 = $_POST["campo-seleccionado-arriba-27"];  
    $Izquierda_27 = $_POST["campo-seleccionado-izquierda-27"];  
    $Centro_27 = $_POST["campo-seleccionado-centro-27"];  
    $Derecha_27 = $_POST["campo-seleccionado-derecha-27"];  
    $Abajo_27 = $_POST["campo-seleccionado-abajo-27"]; 
    $Arriba_28 = $_POST["campo-seleccionado-arriba-28"];  
    $Izquierda_28 = $_POST["campo-seleccionado-izquierda-28"];  
    $Centro_28 = $_POST["campo-seleccionado-centro-28"];  
    $Derecha_28 = $_POST["campo-seleccionado-derecha-28"];  
    $Abajo_28 = $_POST["campo-seleccionado-abajo-28"]; 
    $Arriba_48 = $_POST["campo-seleccionado-arriba-48"];  
    $Izquierda_48 = $_POST["campo-seleccionado-izquierda-48"];  
    $Centro_48 = $_POST["campo-seleccionado-centro-48"];  
    $Derecha_48 = $_POST["campo-seleccionado-derecha-48"];  
    $Abajo_48 = $_POST["campo-seleccionado-abajo-48"]; 
    $Arriba_47 = $_POST["campo-seleccionado-arriba-47"];  
    $Izquierda_47 = $_POST["campo-seleccionado-izquierda-47"];  
    $Centro_47 = $_POST["campo-seleccionado-centro-47"];  
    $Derecha_47 = $_POST["campo-seleccionado-derecha-47"];  
    $Abajo_47 = $_POST["campo-seleccionado-abajo-47"]; 
    $Arriba_46 = $_POST["campo-seleccionado-arriba-46"];  
    $Izquierda_46 = $_POST["campo-seleccionado-izquierda-46"];  
    $Centro_46 = $_POST["campo-seleccionado-centro-46"];  
    $Derecha_46 = $_POST["campo-seleccionado-derecha-46"];  
    $Abajo_46 = $_POST["campo-seleccionado-abajo-46"]; 
    $Arriba_45 = $_POST["campo-seleccionado-arriba-45"];  
    $Izquierda_45 = $_POST["campo-seleccionado-izquierda-45"];  
    $Centro_45 = $_POST["campo-seleccionado-centro-45"];  
    $Derecha_45 = $_POST["campo-seleccionado-derecha-45"];  
    $Abajo_45 = $_POST["campo-seleccionado-abajo-45"]; 
    $Arriba_44 = $_POST["campo-seleccionado-arriba-44"];  
    $Izquierda_44 = $_POST["campo-seleccionado-izquierda-44"];  
    $Centro_44 = $_POST["campo-seleccionado-centro-44"];  
    $Derecha_44 = $_POST["campo-seleccionado-derecha-44"];  
    $Abajo_44 = $_POST["campo-seleccionado-abajo-44"]; 
    $Arriba_43 = $_POST["campo-seleccionado-arriba-43"];  
    $Izquierda_43 = $_POST["campo-seleccionado-izquierda-43"];  
    $Centro_43 = $_POST["campo-seleccionado-centro-43"];  
    $Derecha_43 = $_POST["campo-seleccionado-derecha-43"];  
    $Abajo_43 = $_POST["campo-seleccionado-abajo-43"]; 
    $Arriba_42 = $_POST["campo-seleccionado-arriba-42"];  
    $Izquierda_42 = $_POST["campo-seleccionado-izquierda-42"];  
    $Centro_42 = $_POST["campo-seleccionado-centro-42"];  
    $Derecha_42 = $_POST["campo-seleccionado-derecha-42"];  
    $Abajo_42 = $_POST["campo-seleccionado-abajo-42"]; 
    $Arriba_41 = $_POST["campo-seleccionado-arriba-41"];  
    $Izquierda_41 = $_POST["campo-seleccionado-izquierda-41"];  
    $Centro_41 = $_POST["campo-seleccionado-centro-41"];  
    $Derecha_41 = $_POST["campo-seleccionado-derecha-41"];  
    $Abajo_41 = $_POST["campo-seleccionado-abajo-41"];
    $Arriba_31 = $_POST["campo-seleccionado-arriba-31"];  
    $Izquierda_31 = $_POST["campo-seleccionado-izquierda-31"];  
    $Centro_31 = $_POST["campo-seleccionado-centro-31"];  
    $Derecha_31 = $_POST["campo-seleccionado-derecha-31"];  
    $Abajo_31 = $_POST["campo-seleccionado-abajo-31"];
    $Arriba_32 = $_POST["campo-seleccionado-arriba-32"];  
    $Izquierda_32 = $_POST["campo-seleccionado-izquierda-32"];  
    $Centro_32 = $_POST["campo-seleccionado-centro-32"];  
    $Derecha_32 = $_POST["campo-seleccionado-derecha-32"];  
    $Abajo_32 = $_POST["campo-seleccionado-abajo-32"];
    $Arriba_33 = $_POST["campo-seleccionado-arriba-33"];  
    $Izquierda_33 = $_POST["campo-seleccionado-izquierda-33"];  
    $Centro_33 = $_POST["campo-seleccionado-centro-33"];  
    $Derecha_33 = $_POST["campo-seleccionado-derecha-33"];  
    $Abajo_33 = $_POST["campo-seleccionado-abajo-33"];
    $Arriba_34 = $_POST["campo-seleccionado-arriba-34"];  
    $Izquierda_34 = $_POST["campo-seleccionado-izquierda-34"];  
    $Centro_34 = $_POST["campo-seleccionado-centro-34"];  
    $Derecha_34 = $_POST["campo-seleccionado-derecha-34"];  
    $Abajo_34 = $_POST["campo-seleccionado-abajo-34"];
    $Arriba_35 = $_POST["campo-seleccionado-arriba-35"];  
    $Izquierda_35 = $_POST["campo-seleccionado-izquierda-35"];  
    $Centro_35 = $_POST["campo-seleccionado-centro-35"];  
    $Derecha_35 = $_POST["campo-seleccionado-derecha-35"];  
    $Abajo_35 = $_POST["campo-seleccionado-abajo-35"];
    $Arriba_36 = $_POST["campo-seleccionado-arriba-36"];  
    $Izquierda_36 = $_POST["campo-seleccionado-izquierda-36"];  
    $Centro_36 = $_POST["campo-seleccionado-centro-36"];  
    $Derecha_36 = $_POST["campo-seleccionado-derecha-36"];  
    $Abajo_36 = $_POST["campo-seleccionado-abajo-36"];
    $Arriba_37 = $_POST["campo-seleccionado-arriba-37"];  
    $Izquierda_37 = $_POST["campo-seleccionado-izquierda-37"];  
    $Centro_37 = $_POST["campo-seleccionado-centro-37"];  
    $Derecha_37 = $_POST["campo-seleccionado-derecha-37"];  
    $Abajo_37 = $_POST["campo-seleccionado-abajo-37"];
    $Arriba_38 = $_POST["campo-seleccionado-arriba-38"];  
    $Izquierda_38 = $_POST["campo-seleccionado-izquierda-38"];  
    $Centro_38 = $_POST["campo-seleccionado-centro-38"];  
    $Derecha_38 = $_POST["campo-seleccionado-derecha-38"];  
    $Abajo_38 = $_POST["campo-seleccionado-abajo-38"];
    
    $Arriba_55 = $_POST["campo-seleccionado-arriba-55"];  
    $Izquierda_55 = $_POST["campo-seleccionado-izquierda-55"];  
    $Centro_55 = $_POST["campo-seleccionado-centro-55"];  
    $Derecha_55 = $_POST["campo-seleccionado-derecha-55"];  
    $Abajo_55 = $_POST["campo-seleccionado-abajo-55"]; 
    $Arriba_54 = $_POST["campo-seleccionado-arriba-54"];  
    $Izquierda_54 = $_POST["campo-seleccionado-izquierda-54"];  
    $Centro_54 = $_POST["campo-seleccionado-centro-54"];  
    $Derecha_54 = $_POST["campo-seleccionado-derecha-54"];  
    $Abajo_54 = $_POST["campo-seleccionado-abajo-54"]; 
    $Arriba_53 = $_POST["campo-seleccionado-arriba-53"];  
    $Izquierda_53 = $_POST["campo-seleccionado-izquierda-53"];  
    $Centro_53 = $_POST["campo-seleccionado-centro-53"];  
    $Derecha_53 = $_POST["campo-seleccionado-derecha-53"];  
    $Abajo_53 = $_POST["campo-seleccionado-abajo-53"]; 
    $Arriba_52 = $_POST["campo-seleccionado-arriba-52"];  
    $Izquierda_52 = $_POST["campo-seleccionado-izquierda-52"];  
    $Centro_52 = $_POST["campo-seleccionado-centro-52"];  
    $Derecha_52 = $_POST["campo-seleccionado-derecha-52"];  
    $Abajo_52 = $_POST["campo-seleccionado-abajo-52"]; 
    $Arriba_51 = $_POST["campo-seleccionado-arriba-51"];  
    $Izquierda_51 = $_POST["campo-seleccionado-izquierda-51"];  
    $Centro_51 = $_POST["campo-seleccionado-centro-51"];  
    $Derecha_51 = $_POST["campo-seleccionado-derecha-51"];  
    $Abajo_51 = $_POST["campo-seleccionado-abajo-51"];
    $Arriba_61 = $_POST["campo-seleccionado-arriba-61"];  
    $Izquierda_61 = $_POST["campo-seleccionado-izquierda-61"];  
    $Centro_61 = $_POST["campo-seleccionado-centro-61"];  
    $Derecha_61 = $_POST["campo-seleccionado-derecha-61"];  
    $Abajo_61 = $_POST["campo-seleccionado-abajo-61"];
    $Arriba_62 = $_POST["campo-seleccionado-arriba-62"];  
    $Izquierda_62 = $_POST["campo-seleccionado-izquierda-62"];  
    $Centro_62 = $_POST["campo-seleccionado-centro-62"];  
    $Derecha_62 = $_POST["campo-seleccionado-derecha-62"];  
    $Abajo_62 = $_POST["campo-seleccionado-abajo-62"];
    $Arriba_63 = $_POST["campo-seleccionado-arriba-63"];  
    $Izquierda_63 = $_POST["campo-seleccionado-izquierda-63"];  
    $Centro_63 = $_POST["campo-seleccionado-centro-63"];  
    $Derecha_63 = $_POST["campo-seleccionado-derecha-63"];  
    $Abajo_63 = $_POST["campo-seleccionado-abajo-63"];
    $Arriba_64 = $_POST["campo-seleccionado-arriba-64"];  
    $Izquierda_64 = $_POST["campo-seleccionado-izquierda-64"];  
    $Centro_64 = $_POST["campo-seleccionado-centro-64"];  
    $Derecha_64 = $_POST["campo-seleccionado-derecha-64"];  
    $Abajo_64 = $_POST["campo-seleccionado-abajo-64"];
    $Arriba_65 = $_POST["campo-seleccionado-arriba-65"];  
    $Izquierda_65 = $_POST["campo-seleccionado-izquierda-65"];  
    $Centro_65 = $_POST["campo-seleccionado-centro-65"];  
    $Derecha_65 = $_POST["campo-seleccionado-derecha-65"];  
    $Abajo_65 = $_POST["campo-seleccionado-abajo-65"];
    
    $Arriba_85 = $_POST["campo-seleccionado-arriba-85"];  
    $Izquierda_85 = $_POST["campo-seleccionado-izquierda-85"];  
    $Centro_85 = $_POST["campo-seleccionado-centro-85"];  
    $Derecha_85 = $_POST["campo-seleccionado-derecha-85"];  
    $Abajo_85 = $_POST["campo-seleccionado-abajo-85"]; 
    $Arriba_84 = $_POST["campo-seleccionado-arriba-84"];  
    $Izquierda_84 = $_POST["campo-seleccionado-izquierda-84"];  
    $Centro_84 = $_POST["campo-seleccionado-centro-84"];  
    $Derecha_84 = $_POST["campo-seleccionado-derecha-84"];  
    $Abajo_84 = $_POST["campo-seleccionado-abajo-84"]; 
    $Arriba_83 = $_POST["campo-seleccionado-arriba-83"];  
    $Izquierda_83 = $_POST["campo-seleccionado-izquierda-83"];  
    $Centro_83 = $_POST["campo-seleccionado-centro-83"];  
    $Derecha_83 = $_POST["campo-seleccionado-derecha-83"];  
    $Abajo_83 = $_POST["campo-seleccionado-abajo-83"]; 
    $Arriba_82 = $_POST["campo-seleccionado-arriba-82"];  
    $Izquierda_82 = $_POST["campo-seleccionado-izquierda-82"];  
    $Centro_82 = $_POST["campo-seleccionado-centro-82"];  
    $Derecha_82 = $_POST["campo-seleccionado-derecha-82"];  
    $Abajo_82 = $_POST["campo-seleccionado-abajo-82"]; 
    $Arriba_81 = $_POST["campo-seleccionado-arriba-81"];  
    $Izquierda_81 = $_POST["campo-seleccionado-izquierda-81"];  
    $Centro_81 = $_POST["campo-seleccionado-centro-81"];  
    $Derecha_81 = $_POST["campo-seleccionado-derecha-81"];  
    $Abajo_81 = $_POST["campo-seleccionado-abajo-81"];
    $Arriba_71 = $_POST["campo-seleccionado-arriba-71"];  
    $Izquierda_71 = $_POST["campo-seleccionado-izquierda-71"];  
    $Centro_71 = $_POST["campo-seleccionado-centro-71"];  
    $Derecha_71 = $_POST["campo-seleccionado-derecha-71"];  
    $Abajo_71 = $_POST["campo-seleccionado-abajo-71"];
    $Arriba_72 = $_POST["campo-seleccionado-arriba-72"];  
    $Izquierda_72 = $_POST["campo-seleccionado-izquierda-72"];  
    $Centro_72 = $_POST["campo-seleccionado-centro-72"];  
    $Derecha_72 = $_POST["campo-seleccionado-derecha-72"];  
    $Abajo_72 = $_POST["campo-seleccionado-abajo-72"];
    $Arriba_73 = $_POST["campo-seleccionado-arriba-73"];  
    $Izquierda_73 = $_POST["campo-seleccionado-izquierda-73"];  
    $Centro_73 = $_POST["campo-seleccionado-centro-73"];  
    $Derecha_73 = $_POST["campo-seleccionado-derecha-73"];  
    $Abajo_73 = $_POST["campo-seleccionado-abajo-73"];
    $Arriba_74 = $_POST["campo-seleccionado-arriba-74"];  
    $Izquierda_74 = $_POST["campo-seleccionado-izquierda-74"];  
    $Centro_74 = $_POST["campo-seleccionado-centro-74"];  
    $Derecha_74 = $_POST["campo-seleccionado-derecha-74"];  
    $Abajo_74 = $_POST["campo-seleccionado-abajo-74"];
    $Arriba_75 = $_POST["campo-seleccionado-arriba-75"];  
    $Izquierda_75 = $_POST["campo-seleccionado-izquierda-75"];  
    $Centro_75 = $_POST["campo-seleccionado-centro-75"];  
    $Derecha_75 = $_POST["campo-seleccionado-derecha-75"];  
    $Abajo_75 = $_POST["campo-seleccionado-abajo-75"];
    
    if($Arriba_18 == "1" || 
       $Izquierda_18 == "1" || 
       $Centro_18 == "1" || 
       $Derecha_18 == "1" || 
       $Abajo_18 == "1")
    {
        $Diente_18 = "1";
    }else{
        $Diente_18 = "0";
    }
    
    if($Arriba_17 == "1" || 
       $Izquierda_17 == "1" || 
       $Centro_17 == "1" || 
       $Derecha_17 == "1" || 
       $Abajo_17 == "1")
    {
        $Diente_17 = "1";
    }else{
        $Diente_17 = "0";
    }
    
    if($Arriba_16 == "1" || 
       $Izquierda_16 == "1" || 
       $Centro_16 == "1" || 
       $Derecha_16 == "1" || 
       $Abajo_16 == "1")
    {
        $Diente_16 = "1";
    }else{
        $Diente_16 = "0";
    }
    
    if($Arriba_15 == "1" || 
       $Izquierda_15 == "1" || 
       $Centro_15 == "1" || 
       $Derecha_15 == "1" || 
       $Abajo_15 == "1")
    {
        $Diente_15 = "1";
    }else{
        $Diente_15 = "0";
    }
    
    if($Arriba_14 == "1" || 
       $Izquierda_14 == "1" || 
       $Centro_14 == "1" || 
       $Derecha_14 == "1" || 
       $Abajo_14 == "1")
    {
        $Diente_14 = "1";
    }else{
        $Diente_14 = "0";
    }
    
    if($Arriba_13 == "1" || 
       $Izquierda_13 == "1" || 
       $Centro_13 == "1" || 
       $Derecha_13 == "1" || 
       $Abajo_13 == "1")
    {
        $Diente_13 = "1";
    }else{
        $Diente_13 = "0";
    }
    
    if($Arriba_12 == "1" || 
       $Izquierda_12 == "1" || 
       $Centro_12 == "1" || 
       $Derecha_12 == "1" || 
       $Abajo_12 == "1")
    {
        $Diente_12 = "1";
    }else{
        $Diente_12 = "0";
    }
    
    if($Arriba_11 == "1" || 
       $Izquierda_11 == "1" || 
       $Centro_11 == "1" || 
       $Derecha_11 == "1" || 
       $Abajo_11 == "1")
    {
        $Diente_11 = "1";
    }else{
        $Diente_11 = "0";
    }
    
    if($Arriba_21 == "1" || 
       $Izquierda_21 == "1" || 
       $Centro_21 == "1" || 
       $Derecha_21 == "1" || 
       $Abajo_21 == "1")
    {
        $Diente_21 = "1";
    }else{
        $Diente_21 = "0";
    }
    
    if($Arriba_22 == "1" || 
       $Izquierda_22 == "1" || 
       $Centro_22 == "1" || 
       $Derecha_22 == "1" || 
       $Abajo_22 == "1")
    {
        $Diente_22 = "1";
    }else{
        $Diente_22 = "0";
    }
    
    if($Arriba_23 == "1" || 
       $Izquierda_23 == "1" || 
       $Centro_23 == "1" || 
       $Derecha_23 == "1" || 
       $Abajo_23 == "1")
    {
        $Diente_23 = "1";
    }else{
        $Diente_23 = "0";
    }
    
    if($Arriba_24 == "1" || 
       $Izquierda_24 == "1" || 
       $Centro_24 == "1" || 
       $Derecha_24 == "1" || 
       $Abajo_24 == "1")
    {
        $Diente_24 = "1";
    }else{
        $Diente_24 = "0";
    }
    
    if($Arriba_25 == "1" || 
       $Izquierda_25 == "1" || 
       $Centro_25 == "1" || 
       $Derecha_25 == "1" || 
       $Abajo_25 == "1")
    {
        $Diente_25 = "1";
    }else{
        $Diente_25 = "0";
    }
    
    if($Arriba_26 == "1" || 
       $Izquierda_26 == "1" || 
       $Centro_26 == "1" || 
       $Derecha_26 == "1" || 
       $Abajo_26 == "1")
    {
        $Diente_26 = "1";
    }else{
        $Diente_26 = "0";
    }
    
    if($Arriba_27 == "1" || 
       $Izquierda_27 == "1" || 
       $Centro_27 == "1" || 
       $Derecha_27 == "1" || 
       $Abajo_27 == "1")
    {
        $Diente_27 = "1";
    }else{
        $Diente_27 = "0";
    }
    
    if($Arriba_28 == "1" || 
       $Izquierda_28 == "1" || 
       $Centro_28 == "1" || 
       $Derecha_28 == "1" || 
       $Abajo_28 == "1")
    {
        $Diente_28 = "1";
    }else{
        $Diente_28 = "0";
    }
    
    if($Arriba_48 == "1" || 
       $Izquierda_48 == "1" || 
       $Centro_48 == "1" || 
       $Derecha_48 == "1" || 
       $Abajo_48 == "1")
    {
        $Diente_48 = "1";
    }else{
        $Diente_48 = "0";
    }
    
    if($Arriba_47 == "1" || 
       $Izquierda_47 == "1" || 
       $Centro_47 == "1" || 
       $Derecha_47 == "1" || 
       $Abajo_47 == "1")
    {
        $Diente_47 = "1";
    }else{
        $Diente_47 = "0";
    }
    
    if($Arriba_46 == "1" || 
       $Izquierda_46 == "1" || 
       $Centro_46 == "1" || 
       $Derecha_46 == "1" || 
       $Abajo_46 == "1")
    {
        $Diente_46 = "1";
    }else{
        $Diente_46 = "0";
    }
    
    if($Arriba_45 == "1" || 
       $Izquierda_45 == "1" || 
       $Centro_45 == "1" || 
       $Derecha_45 == "1" || 
       $Abajo_45 == "1")
    {
        $Diente_45 = "1";
    }else{
        $Diente_45 = "0";
    }
    
    if($Arriba_44 == "1" || 
       $Izquierda_44 == "1" || 
       $Centro_44 == "1" || 
       $Derecha_44 == "1" || 
       $Abajo_44 == "1")
    {
        $Diente_44 = "1";
    }else{
        $Diente_44 = "0";
    }
    
    if($Arriba_43 == "1" || 
       $Izquierda_43 == "1" || 
       $Centro_43 == "1" || 
       $Derecha_43 == "1" || 
       $Abajo_43 == "1")
    {
        $Diente_43 = "1";
    }else{
        $Diente_43 = "0";
    }
    
    if($Arriba_42 == "1" || 
       $Izquierda_42 == "1" || 
       $Centro_42 == "1" || 
       $Derecha_42 == "1" || 
       $Abajo_42 == "1")
    {
        $Diente_42 = "1";
    }else{
        $Diente_42 = "0";
    }
    
    if($Arriba_41 == "1" || 
       $Izquierda_41 == "1" || 
       $Centro_41 == "1" || 
       $Derecha_41 == "1" || 
       $Abajo_41 == "1")
    {
        $Diente_41 = "1";
    }else{
        $Diente_41 = "0";
    }
    
    if($Arriba_31 == "1" || 
       $Izquierda_31 == "1" || 
       $Centro_31 == "1" || 
       $Derecha_31 == "1" || 
       $Abajo_31 == "1")
    {
        $Diente_31 = "1";
    }else{
        $Diente_31 = "0";
    }
    
    if($Arriba_32 == "1" || 
       $Izquierda_32 == "1" || 
       $Centro_32 == "1" || 
       $Derecha_32 == "1" || 
       $Abajo_32 == "1")
    {
        $Diente_32 = "1";
    }else{
        $Diente_32 = "0";
    }
    
    if($Arriba_33 == "1" || 
       $Izquierda_33 == "1" || 
       $Centro_33 == "1" || 
       $Derecha_33 == "1" || 
       $Abajo_33 == "1")
    {
        $Diente_33 = "1";
    }else{
        $Diente_33 = "0";
    }
    
    if($Arriba_34 == "1" || 
       $Izquierda_34 == "1" || 
       $Centro_34 == "1" || 
       $Derecha_34 == "1" || 
       $Abajo_34 == "1")
    {
        $Diente_34 = "1";
    }else{
        $Diente_34 = "0";
    }
    
    if($Arriba_35 == "1" || 
       $Izquierda_35 == "1" || 
       $Centro_35 == "1" || 
       $Derecha_35 == "1" || 
       $Abajo_35 == "1")
    {
        $Diente_35 = "1";
    }else{
        $Diente_35 = "0";
    }
    
    if($Arriba_36 == "1" || 
       $Izquierda_36 == "1" || 
       $Centro_36 == "1" || 
       $Derecha_36 == "1" || 
       $Abajo_36 == "1")
    {
        $Diente_36 = "1";
    }else{
        $Diente_36 = "0";
    }
    
    if($Arriba_37 == "1" || 
       $Izquierda_37 == "1" || 
       $Centro_37 == "1" || 
       $Derecha_37 == "1" || 
       $Abajo_37 == "1")
    {
        $Diente_37 = "1";
    }else{
        $Diente_37 = "0";
    }
    
    if($Arriba_38 == "1" || 
       $Izquierda_38 == "1" || 
       $Centro_38 == "1" || 
       $Derecha_38 == "1" || 
       $Abajo_38 == "1")
    {
        $Diente_38 = "1";
    }else{
        $Diente_38 = "0";
    }
        
    if($Arriba_55 == "1" || 
       $Izquierda_55 == "1" || 
       $Centro_55 == "1" || 
       $Derecha_55 == "1" || 
       $Abajo_55 == "1")
    {
        $Diente_55 = "1";
    }else{
        $Diente_55 = "0";
    }
    
    if($Arriba_54 == "1" || 
       $Izquierda_54 == "1" || 
       $Centro_54 == "1" || 
       $Derecha_54 == "1" || 
       $Abajo_54 == "1")
    {
        $Diente_54 = "1";
    }else{
        $Diente_54 = "0";
    }
    
    if($Arriba_53 == "1" || 
       $Izquierda_53 == "1" || 
       $Centro_53 == "1" || 
       $Derecha_53 == "1" || 
       $Abajo_53 == "1")
    {
        $Diente_53 = "1";
    }else{
        $Diente_53 = "0";
    }
    
    if($Arriba_52 == "1" || 
       $Izquierda_52 == "1" || 
       $Centro_52 == "1" || 
       $Derecha_52 == "1" || 
       $Abajo_52 == "1")
    {
        $Diente_52 = "1";
    }else{
        $Diente_52 = "0";
    }
    
    if($Arriba_51 == "1" || 
       $Izquierda_51 == "1" || 
       $Centro_51 == "1" || 
       $Derecha_51 == "1" || 
       $Abajo_51 == "1")
    {
        $Diente_51 = "1";
    }else{
        $Diente_51 = "0";
    }
    
    if($Arriba_61 == "1" || 
       $Izquierda_61 == "1" || 
       $Centro_61 == "1" || 
       $Derecha_61 == "1" || 
       $Abajo_61 == "1")
    {
        $Diente_61 = "1";
    }else{
        $Diente_61 = "0";
    }
    
    if($Arriba_62 == "1" || 
       $Izquierda_62 == "1" || 
       $Centro_62 == "1" || 
       $Derecha_62 == "1" || 
       $Abajo_62 == "1")
    {
        $Diente_62 = "1";
    }else{
        $Diente_62 = "0";
    }
    
    if($Arriba_63 == "1" || 
       $Izquierda_63 == "1" || 
       $Centro_63 == "1" || 
       $Derecha_63 == "1" || 
       $Abajo_63 == "1")
    {
        $Diente_63 = "1";
    }else{
        $Diente_63 = "0";
    }
    
    if($Arriba_64 == "1" || 
       $Izquierda_64 == "1" || 
       $Centro_64 == "1" || 
       $Derecha_64 == "1" || 
       $Abajo_64 == "1")
    {
        $Diente_64 = "1";
    }else{
        $Diente_64 = "0";
    }
    
    if($Arriba_65 == "1" || 
       $Izquierda_65 == "1" || 
       $Centro_65 == "1" || 
       $Derecha_65 == "1" || 
       $Abajo_65 == "1")
    {
        $Diente_65 = "1";
    }else{
        $Diente_65 = "0";
    }
        
    if($Arriba_85 == "1" || 
       $Izquierda_85 == "1" || 
       $Centro_85 == "1" || 
       $Derecha_85 == "1" || 
       $Abajo_85 == "1")
    {
        $Diente_85 = "1";
    }else{
        $Diente_85 = "0";
    }
    
    if($Arriba_84 == "1" || 
       $Izquierda_84 == "1" || 
       $Centro_84 == "1" || 
       $Derecha_84 == "1" || 
       $Abajo_84 == "1")
    {
        $Diente_84 = "1";
    }else{
        $Diente_84 = "0";
    }
    
    if($Arriba_83 == "1" || 
       $Izquierda_83 == "1" || 
       $Centro_83 == "1" || 
       $Derecha_83 == "1" || 
       $Abajo_83 == "1")
    {
        $Diente_83 = "1";
    }else{
        $Diente_83 = "0";
    }
    
    if($Arriba_82 == "1" || 
       $Izquierda_82 == "1" || 
       $Centro_82 == "1" || 
       $Derecha_82 == "1" || 
       $Abajo_82 == "1")
    {
        $Diente_82 = "1";
    }else{
        $Diente_82 = "0";
    }
    
    if($Arriba_81 == "1" || 
       $Izquierda_81 == "1" || 
       $Centro_81 == "1" || 
       $Derecha_81 == "1" || 
       $Abajo_81 == "1")
    {
        $Diente_81 = "1";
    }else{
        $Diente_81 = "0";
    }
    
    if($Arriba_71 == "1" || 
       $Izquierda_71 == "1" || 
       $Centro_71 == "1" || 
       $Derecha_71 == "1" || 
       $Abajo_71 == "1")
    {
        $Diente_71 = "1";
    }else{
        $Diente_71 = "0";
    }
    
    if($Arriba_72 == "1" || 
       $Izquierda_72 == "1" || 
       $Centro_72 == "1" || 
       $Derecha_72 == "1" || 
       $Abajo_72 == "1")
    {
        $Diente_72 = "1";
    }else{
        $Diente_72 = "0";
    }
    
    if($Arriba_73 == "1" || 
       $Izquierda_73 == "1" || 
       $Centro_73 == "1" || 
       $Derecha_73 == "1" || 
       $Abajo_73 == "1")
    {
        $Diente_73 = "1";
    }else{
        $Diente_73 = "0";
    }
    
    if($Arriba_74 == "1" || 
       $Izquierda_74 == "1" || 
       $Centro_74 == "1" || 
       $Derecha_74 == "1" || 
       $Abajo_74 == "1")
    {
        $Diente_74 = "1";
    }else{
        $Diente_74 = "0";
    }
    
    if($Arriba_75 == "1" || 
       $Izquierda_75 == "1" || 
       $Centro_75 == "1" || 
       $Derecha_75 == "1" || 
       $Abajo_75 == "1")
    {
        $Diente_75 = "1";
    }else{
        $Diente_75 = "0";
    }
	
	//guardar la historia clinica
    
    $Formato_Historia_Clinica_Exodoncia = new Formato_Historia_Clinica_Exodoncia(
        '',
        $Pareja_Clinica,
        $Paciente,
        $Ocupacion,
        $LugarNacimiento,
        $Examen_Bucal_Diagnostico,
        $Examen_Bucal_Tratamiento,
        $Aparatos_Sistemas_Cardiovascular, 
        $Aparatos_Sistemas_Renal,
        $Aparatos_Sistemas_Nervioso,
        $Aparatos_Sistemas_Digestivo, 
        $Aparatos_Sistemas_Respiratorio,  
        $Genitourinario_Embarazo,
        $Genitourinario_Menopausia,
        $Genitourinario_Lactancia, 
        $Genitourinario_Menstruacion, 
        $Propension_Hemorragica, 
        $Pruebas_Laboratorio, 
        $Estudio_Radiologico, 
        $Estado_General, 
        $Extraccion_Dentaria, 
        $Analgesia_Indicada,  
        $Prescripciones_Operatorias, 
        $Complicaciones,
        $Indicacion_Paciente,
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
        $Diente_75
    );
    
    $Formato_Historia_Clinica_Exodoncia->Alta();
} 

//aprobar la historia clinica

if(isset($_REQUEST['aprobar']))
{
    $Historia_Clinica = $_POST["historia_clinica"];
    $Aprobar = $_POST["aprobacion"];
    
    $Formato_Historia_Clinica_Exodoncia = new Formato_Historia_Clinica_Exodoncia();
    $Formato_Historia_Clinica_Exodoncia->IdHistoriaClinicaExodoncia = $Historia_Clinica;    
    $Formato_Historia_Clinica_Exodoncia->Aprobado = $Aprobar;    
    
    $Formato_Historia_Clinica_Exodoncia->Aprobar();    
}
?>