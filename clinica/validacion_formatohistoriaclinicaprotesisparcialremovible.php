<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Formato_Historia_Clinica_Protesis_Parcial_Removible.php");

//validar el guardado de la historia clinica 

if(isset($_REQUEST['guardar']))
{
    $Pareja_Clinica = $_POST["pareja-clinica"];
    $Paciente = $_POST["sltpaciente-protesis-parcial-removible"];
    $Ocupacion = $_POST["ocupacion"];
    $Telefono = $_POST["telefono"];
    $Calle = $_POST["calle"];
    $Numero = $_POST["numero"];
    $Colonia = $_POST["colonia"];
    $Poblacion = $_POST["poblacion"];
    $LugarNacimiento = $_POST["lugar-nacimiento"];
    $Estado_Salud_General = $_POST["estado_salud_general"];
    $Problema_Principal_1 = $_POST["problema_principal_1"];
    $Trtatamiento_1 = $_POST["tratamiento_1"];
    $Ultima_Visita_Medico = $_POST["ultima_visita_medico"];
    $Motivo_1 = $_POST["motivo_1"];
    $Estado_Salud_Oral = $_POST["estado_salud_oral"];
    $Problema_Principal_2 = $_POST["problema_principal_2"];
    $Tratamiento_2 = $_POST["tratamiento_2"];
    $Otros = $_POST["otros"];
    $Tratamiento_3 = $_POST["tratamiento_3"];
    $Ultima_Visita_Dentista = $_POST["ultima_visita_dentista"];
    $Motivo_2 = $_POST["motivo_2"];
    $Motivo_Perdia_Piezas = $_POST["motivo_perdida_piezas"];
    $Tiene_Protesis = $_POST["tiene_protesis"];
    $Forma_1 = $_POST["forma_1"];
    $Color_1 = $_POST["color_1"];
    $Tamano_1 = $_POST["tamano_1"];
    $Posicion = $_POST["posicion"];
    $Vitalidad_Pulpar = $_POST["vitalidad_pulpar"];
    $Forma_2 = $_POST["forma_2"];
    $Tamano_2 = $_POST["tamano_2"];
    $relacion_intermaxilar = $_POST["relacion_intermaxilar"];
    $Procesos_Residuales = $_POST["procesos_residuales"];
    $Forma_Boveda_Palatina = $_POST["forma_boveda_palatina"];
    $Presencia_Torus = $_POST["presencia_torus"];
    $Color_2 = $_POST["color_2"];
    $Consistencia = $_POST["consistencia"];
    $Espesor = $_POST["espesor"];
    $Altura_Nivel_Piezas = $_POST["altura_nivel_piezas"];
    $Frenillos = $_POST["frenillos"];
    $Condiciones_Periodonto = $_POST["condiciones_periodonto"];
    $Movilidad_Dental = $_POST["movilidad_dental"];
    $IHOS = $_POST["ihos"];
    $Clasificacion_Bracha = $_POST["clasificacion_brecha"];
    $Hallazgos = $_POST["hallazgos"];
    $Estudio_Radiografico = $_POST["estudio_radiografico"];
    
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
    $Diente_34 = $Padecimiento_34.'|'.$Arriba_34.'|'.$Izquierda_34.'|'.$Centro_34.'|'.$Derecha_34.'|'.$Abajo_34;
    
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
    
    $Diagnostico = $_POST["diagnostico"];
    $Plan_Tratamiento = $_POST["plan_tratamiento"];
	
	//guardar la historia clinica
    
    $Formato_Historia_Clinica_Protesis_Parcial_Removible = new Formato_Historia_Clinica_Protesis_Parcial_Removible (
        '',
        $Pareja_Clinica,
        $Paciente,
        $Ocupacion,
        $Telefono,
        $Calle,
        $Numero,
        $Colonia,
        $Poblacion,
        $LugarNacimiento,
        $Estado_Salud_General,
        $Problema_Principal_1,
        $Trtatamiento_1,
        $Ultima_Visita_Medico,
        $Motivo_1,
        $Estado_Salud_Oral,
        $Problema_Principal_2,
        $Tratamiento_2,
        $Otros,
        $Tratamiento_3,
        $Ultima_Visita_Dentista,
        $Motivo_2,
        $Motivo_Perdia_Piezas,
        $Tiene_Protesis,
        $Forma_1,
        $Color_1,
        $Tamano_1,
        $Posicion,
        $Vitalidad_Pulpar,
        $Forma_2,
        $Tamano_2,
        $relacion_intermaxilar,
        $Procesos_Residuales,
        $Forma_Boveda_Palatina,
        $Presencia_Torus,
        $Color_2,
        $Consistencia,
        $Espesor,
        $Altura_Nivel_Piezas,
        $Frenillos,
        $Condiciones_Periodonto,
        $Movilidad_Dental,
        $IHOS,
        $Clasificacion_Bracha,
        $Hallazgos,
        $Estudio_Radiografico,
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
        $Diagnostico,
        $Plan_Tratamiento  
    );
    
    $Formato_Historia_Clinica_Protesis_Parcial_Removible->Alta();
} 

//aprobar la historia clinica

if(isset($_REQUEST['aprobar']))
{
    $Historia_Clinica = $_POST["historia_clinica"];
    $Aprobado = $_POST["aprobacion"];
    
    $Formato_Historia_Clinica_Protesis_Parcial_Removible = new Formato_Historia_Clinica_Protesis_Parcial_Removible();
    
    $Formato_Historia_Clinica_Protesis_Parcial_Removible->IdHistoriaClinicaProtesisParcialRemovible = $Historia_Clinica;
    $Formato_Historia_Clinica_Protesis_Parcial_Removible->Aprobado = $Aprobado;
    
    $Formato_Historia_Clinica_Protesis_Parcial_Removible->Aprobar();
}
?>