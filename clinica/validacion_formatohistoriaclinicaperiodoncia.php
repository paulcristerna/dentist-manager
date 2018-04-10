<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Formato_Historia_Clinica_Periodoncia.php");

//validar el guardado de la historia clinica   

if(isset($_REQUEST['guardar']))
{
    $IdParejaClinica = $_POST["pareja-clinica"];
    $Paciente = $_POST["sltpaciente-periodoncia"];
    
    $Ocupacion = $_POST["ocupacion"];
    $Calle = $_POST["calle"];
    $Numero = $_POST["numero"];
    $Colonia = $_POST["colonia"];
    $Poblacion = $_POST["poblacion"];
    $Telefono = $_POST["telefono"];
    
    $Arriba1 = $_POST["arriba-padecimiento-1"];
    $Abajo1 = $_POST["abajo-padecimiento-1"];
    $Izq1 = $_POST["izq-padecimiento-1"];
    $Der1 = $_POST["der-padecimiento-1"];
    $Margen1 = $_POST["margen-1"];
    $Diente1 = $Arriba1.'|'.$Abajo1.'|'.$Izq1.'|'.$Der1.'|'.$Margen1;
    
    $Arriba2 = $_POST["arriba-padecimiento-2"];
    $Abajo2 = $_POST["abajo-padecimiento-2"];
    $Izq2 = $_POST["izq-padecimiento-2"];
    $Der2 = $_POST["der-padecimiento-2"];
    $Margen2 = $_POST["margen-2"];
    $Diente2 = $Arriba2.'|'.$Abajo2.'|'.$Izq2.'|'.$Der2.'|'.$Margen2;
    
    $Arriba3 = $_POST["arriba-padecimiento-3"];
    $Abajo3 = $_POST["abajo-padecimiento-3"];
    $Izq3 = $_POST["izq-padecimiento-3"];
    $Der3 = $_POST["der-padecimiento-3"];
    $Margen3 = $_POST["margen-3"];
    $Diente3 = $Arriba3.'|'.$Abajo3.'|'.$Izq3.'|'.$Der3.'|'.$Margen3;
    
    $Arriba4 = $_POST["arriba-padecimiento-4"];
    $Abajo4 = $_POST["abajo-padecimiento-4"];
    $Izq4 = $_POST["izq-padecimiento-4"];
    $Der4 = $_POST["der-padecimiento-4"];
    $Margen4 = $_POST["margen-4"];
    $Diente4 = $Arriba4.'|'.$Abajo4.'|'.$Izq4.'|'.$Der4.'|'.$Margen4;
    
    $Arriba5 = $_POST["arriba-padecimiento-5"];
    $Abajo5 = $_POST["abajo-padecimiento-5"];
    $Izq5 = $_POST["izq-padecimiento-5"];
    $Der5 = $_POST["der-padecimiento-5"];
    $Margen5 = $_POST["margen-5"];
    $Diente5 = $Arriba5.'|'.$Abajo5.'|'.$Izq5.'|'.$Der5.'|'.$Margen5;
    
    $Arriba6 = $_POST["arriba-padecimiento-6"];
    $Abajo6 = $_POST["abajo-padecimiento-6"];
    $Izq6 = $_POST["izq-padecimiento-6"];
    $Der6 = $_POST["der-padecimiento-6"];
    $Margen6 = $_POST["margen-6"];
    $Diente6 = $Arriba6.'|'.$Abajo6.'|'.$Izq6.'|'.$Der6.'|'.$Margen6;
    
    $Arriba7 = $_POST["arriba-padecimiento-7"];
    $Abajo7 = $_POST["abajo-padecimiento-7"];
    $Izq7 = $_POST["izq-padecimiento-7"];
    $Der7 = $_POST["der-padecimiento-7"];
    $Margen7 = $_POST["margen-7"];
    $Diente7 = $Arriba7.'|'.$Abajo7.'|'.$Izq7.'|'.$Der7.'|'.$Margen7;
    
    $Arriba8 = $_POST["arriba-padecimiento-8"];
    $Abajo8 = $_POST["abajo-padecimiento-8"];
    $Izq8 = $_POST["izq-padecimiento-8"];
    $Der8 = $_POST["der-padecimiento-8"];
    $Margen8 = $_POST["margen-8"];
    $Diente8 = $Arriba8.'|'.$Abajo8.'|'.$Izq8.'|'.$Der8.'|'.$Margen8;
    
    $Arriba9 = $_POST["arriba-padecimiento-9"];
    $Abajo9 = $_POST["abajo-padecimiento-9"];
    $Izq9 = $_POST["izq-padecimiento-9"];
    $Der9 = $_POST["der-padecimiento-9"];
    $Margen9 = $_POST["margen-9"];
    $Diente9 = $Arriba9.'|'.$Abajo9.'|'.$Izq9.'|'.$Der9.'|'.$Margen9;
    
    $Arriba10 = $_POST["arriba-padecimiento-10"];
    $Abajo10 = $_POST["abajo-padecimiento-10"];
    $Izq10 = $_POST["izq-padecimiento-10"];
    $Der10 = $_POST["der-padecimiento-10"];
    $Margen10 = $_POST["margen-10"];
    $Diente10 = $Arriba10.'|'.$Abajo10.'|'.$Izq10.'|'.$Der10.'|'.$Margen10;
    
    $Arriba11 = $_POST["arriba-padecimiento-11"];
    $Abajo11 = $_POST["abajo-padecimiento-11"];
    $Izq11 = $_POST["izq-padecimiento-11"];
    $Der11 = $_POST["der-padecimiento-11"];
    $Margen11 = $_POST["margen-11"];
    $Diente11 = $Arriba11.'|'.$Abajo11.'|'.$Izq11.'|'.$Der11.'|'.$Margen11;
    
    $Arriba12 = $_POST["arriba-padecimiento-12"];
    $Abajo12 = $_POST["abajo-padecimiento-12"];
    $Izq12 = $_POST["izq-padecimiento-12"];
    $Der12 = $_POST["der-padecimiento-12"];
    $Margen12 = $_POST["margen-12"];
    $Diente12 = $Arriba12.'|'.$Abajo12.'|'.$Izq12.'|'.$Der12.'|'.$Margen12;
    
    $Arriba13 = $_POST["arriba-padecimiento-13"];
    $Abajo13 = $_POST["abajo-padecimiento-13"];
    $Izq13 = $_POST["izq-padecimiento-13"];
    $Der13 = $_POST["der-padecimiento-13"];
    $Margen13 = $_POST["margen-13"];
    $Diente13 = $Arriba13.'|'.$Abajo13.'|'.$Izq13.'|'.$Der13.'|'.$Margen13;
    
    $Arriba14 = $_POST["arriba-padecimiento-14"];
    $Abajo14 = $_POST["abajo-padecimiento-14"];
    $Izq14 = $_POST["izq-padecimiento-14"];
    $Der14 = $_POST["der-padecimiento-14"];
    $Margen14 = $_POST["margen-14"];
    $Diente14 = $Arriba14.'|'.$Abajo14.'|'.$Izq14.'|'.$Der14.'|'.$Margen14;
    
    $Arriba15 = $_POST["arriba-padecimiento-15"];
    $Abajo15 = $_POST["abajo-padecimiento-15"];
    $Izq15 = $_POST["izq-padecimiento-15"];
    $Der15 = $_POST["der-padecimiento-15"];
    $Margen15 = $_POST["margen-15"];
    $Diente15 = $Arriba15.'|'.$Abajo15.'|'.$Izq15.'|'.$Der15.'|'.$Margen15;
    
    $Arriba16 = $_POST["arriba-padecimiento-16"];
    $Abajo16 = $_POST["abajo-padecimiento-16"];
    $Izq16 = $_POST["izq-padecimiento-16"];
    $Der16 = $_POST["der-padecimiento-16"];
    $Margen16 = $_POST["margen-16"];
    $Diente16 = $Arriba16.'|'.$Abajo16.'|'.$Izq16.'|'.$Der16.'|'.$Margen16;
    
    $Arriba17 = $_POST["arriba-padecimiento-17"];
    $Abajo17 = $_POST["abajo-padecimiento-17"];
    $Izq17 = $_POST["izq-padecimiento-17"];
    $Der17 = $_POST["der-padecimiento-17"];
    $Margen17 = $_POST["margen-17"];
    $Diente17 = $Arriba17.'|'.$Abajo17.'|'.$Izq17.'|'.$Der17.'|'.$Margen17;
    
    $Arriba18 = $_POST["arriba-padecimiento-18"];
    $Abajo18 = $_POST["abajo-padecimiento-18"];
    $Izq18 = $_POST["izq-padecimiento-18"];
    $Der18 = $_POST["der-padecimiento-18"];
    $Margen18 = $_POST["margen-18"];
    $Diente18 = $Arriba18.'|'.$Abajo18.'|'.$Izq18.'|'.$Der18.'|'.$Margen18;
    
    $Arriba19 = $_POST["arriba-padecimiento-19"];
    $Abajo19 = $_POST["abajo-padecimiento-19"];
    $Izq19 = $_POST["izq-padecimiento-19"];
    $Der19 = $_POST["der-padecimiento-19"];
    $Margen19 = $_POST["margen-19"];
    $Diente19 = $Arriba19.'|'.$Abajo19.'|'.$Izq19.'|'.$Der19.'|'.$Margen19;
    
    $Arriba20 = $_POST["arriba-padecimiento-20"];
    $Abajo20 = $_POST["abajo-padecimiento-20"];
    $Izq20 = $_POST["izq-padecimiento-20"];
    $Der20 = $_POST["der-padecimiento-20"];
    $Margen20 = $_POST["margen-20"];
    $Diente20 = $Arriba20.'|'.$Abajo20.'|'.$Izq20.'|'.$Der20.'|'.$Margen20;
    
    $Arriba21 = $_POST["arriba-padecimiento-21"];
    $Abajo21 = $_POST["abajo-padecimiento-21"];
    $Izq21 = $_POST["izq-padecimiento-21"];
    $Der21 = $_POST["der-padecimiento-21"];
    $Margen21 = $_POST["margen-21"];
    $Diente21 = $Arriba21.'|'.$Abajo21.'|'.$Izq21.'|'.$Der21.'|'.$Margen21;
    
    $Arriba22 = $_POST["arriba-padecimiento-22"];
    $Abajo22 = $_POST["abajo-padecimiento-22"];
    $Izq22 = $_POST["izq-padecimiento-22"];
    $Der22 = $_POST["der-padecimiento-22"];
    $Margen22 = $_POST["margen-22"];
    $Diente22 = $Arriba22.'|'.$Abajo22.'|'.$Izq22.'|'.$Der22.'|'.$Margen22;
    
    $Arriba23 = $_POST["arriba-padecimiento-23"];
    $Abajo23 = $_POST["abajo-padecimiento-23"];
    $Izq23 = $_POST["izq-padecimiento-23"];
    $Der23 = $_POST["der-padecimiento-23"];
    $Margen23 = $_POST["margen-23"];
    $Diente23 = $Arriba23.'|'.$Abajo23.'|'.$Izq23.'|'.$Der23.'|'.$Margen23;
    
    $Arriba24 = $_POST["arriba-padecimiento-24"];
    $Abajo24 = $_POST["abajo-padecimiento-24"];
    $Izq24 = $_POST["izq-padecimiento-24"];
    $Der24 = $_POST["der-padecimiento-24"];
    $Margen24 = $_POST["margen-24"];
    $Diente24 = $Arriba24.'|'.$Abajo24.'|'.$Izq24.'|'.$Der24.'|'.$Margen24;
    
    $Arriba25 = $_POST["arriba-padecimiento-25"];
    $Abajo25 = $_POST["abajo-padecimiento-25"];
    $Izq25 = $_POST["izq-padecimiento-25"];
    $Der25 = $_POST["der-padecimiento-25"];
    $Margen25 = $_POST["margen-25"];
    $Diente25 = $Arriba25.'|'.$Abajo25.'|'.$Izq25.'|'.$Der25.'|'.$Margen25;
    
    $Arriba26 = $_POST["arriba-padecimiento-26"];
    $Abajo26 = $_POST["abajo-padecimiento-26"];
    $Izq26 = $_POST["izq-padecimiento-26"];
    $Der26 = $_POST["der-padecimiento-26"];
    $Margen26 = $_POST["margen-26"];
    $Diente26 = $Arriba26.'|'.$Abajo26.'|'.$Izq26.'|'.$Der26.'|'.$Margen26;
    
    $Arriba27 = $_POST["arriba-padecimiento-27"];
    $Abajo27 = $_POST["abajo-padecimiento-27"];
    $Izq27 = $_POST["izq-padecimiento-27"];
    $Der27 = $_POST["der-padecimiento-27"];
    $Margen27 = $_POST["margen-27"];
    $Diente27 = $Arriba27.'|'.$Abajo27.'|'.$Izq27.'|'.$Der27.'|'.$Margen27;
    
    $Arriba28 = $_POST["arriba-padecimiento-28"];
    $Abajo28 = $_POST["abajo-padecimiento-28"];
    $Izq28 = $_POST["izq-padecimiento-28"];
    $Der28 = $_POST["der-padecimiento-28"];
    $Margen28 = $_POST["margen-28"];
    $Diente28 = $Arriba28.'|'.$Abajo28.'|'.$Izq28.'|'.$Der28.'|'.$Margen28;
    
    $Arriba29 = $_POST["arriba-padecimiento-29"];
    $Abajo29 = $_POST["abajo-padecimiento-29"];
    $Izq29 = $_POST["izq-padecimiento-29"];
    $Der29 = $_POST["der-padecimiento-29"];
    $Margen29 = $_POST["margen-29"];
    $Diente29 = $Arriba29.'|'.$Abajo29.'|'.$Izq29.'|'.$Der29.'|'.$Margen29;
    
    $Arriba30 = $_POST["arriba-padecimiento-30"];
    $Abajo30 = $_POST["abajo-padecimiento-30"];
    $Izq30 = $_POST["izq-padecimiento-30"];
    $Der30 = $_POST["der-padecimiento-30"];
    $Margen30 = $_POST["margen-30"];
    $Diente30 = $Arriba30.'|'.$Abajo30.'|'.$Izq30.'|'.$Der30.'|'.$Margen30;
    
    $Arriba31 = $_POST["arriba-padecimiento-31"];
    $Abajo31 = $_POST["abajo-padecimiento-31"];
    $Izq31 = $_POST["izq-padecimiento-31"];
    $Der31 = $_POST["der-padecimiento-31"];
    $Margen31 = $_POST["margen-31"];
    $Diente31 = $Arriba31.'|'.$Abajo31.'|'.$Izq31.'|'.$Der31.'|'.$Margen31;
    
    $Arriba32 = $_POST["arriba-padecimiento-32"];
    $Abajo32 = $_POST["abajo-padecimiento-32"];
    $Izq32 = $_POST["izq-padecimiento-32"];
    $Der32 = $_POST["der-padecimiento-32"];
    $Margen32 = $_POST["margen-32"];
    $Diente32 = $Arriba32.'|'.$Abajo32.'|'.$Izq32.'|'.$Der32.'|'.$Margen32;
    
    $Arriba33 = $_POST["arriba-padecimiento-33"];
    $Abajo33 = $_POST["abajo-padecimiento-33"];
    $Izq33 = $_POST["izq-padecimiento-33"];
    $Der33 = $_POST["der-padecimiento-33"];
    $Margen33 = $_POST["margen-33"];
    $Diente33 = $Arriba33.'|'.$Abajo33.'|'.$Izq33.'|'.$Der33.'|'.$Margen33;
    
    $Arriba34 = $_POST["arriba-padecimiento-34"];
    $Abajo34 = $_POST["abajo-padecimiento-34"];
    $Izq34 = $_POST["izq-padecimiento-34"];
    $Der34 = $_POST["der-padecimiento-34"];
    $Margen34 = $_POST["margen-34"];
    $Diente34 = $Arriba34.'|'.$Abajo34.'|'.$Izq34.'|'.$Der34.'|'.$Margen34;
    
    $Arriba35 = $_POST["arriba-padecimiento-35"];
    $Abajo35 = $_POST["abajo-padecimiento-35"];
    $Izq35 = $_POST["izq-padecimiento-35"];
    $Der35 = $_POST["der-padecimiento-35"];
    $Margen35 = $_POST["margen-35"];
    $Diente35 = $Arriba35.'|'.$Abajo35.'|'.$Izq35.'|'.$Der35.'|'.$Margen35;
    
    $Arriba36 = $_POST["arriba-padecimiento-36"];
    $Abajo36 = $_POST["abajo-padecimiento-36"];
    $Izq36 = $_POST["izq-padecimiento-36"];
    $Der36 = $_POST["der-padecimiento-36"];
    $Margen36 = $_POST["margen-36"];
    $Diente36 = $Arriba36.'|'.$Abajo36.'|'.$Izq36.'|'.$Der36.'|'.$Margen36;
    
    $Arriba37 = $_POST["arriba-padecimiento-37"];
    $Abajo37 = $_POST["abajo-padecimiento-37"];
    $Izq37 = $_POST["izq-padecimiento-37"];
    $Der37 = $_POST["der-padecimiento-37"];
    $Margen37 = $_POST["margen-37"];
    $Diente37 = $Arriba37.'|'.$Abajo37.'|'.$Izq37.'|'.$Der37.'|'.$Margen37;
    
    $Arriba38 = $_POST["arriba-padecimiento-38"];
    $Abajo38 = $_POST["abajo-padecimiento-38"];
    $Izq38 = $_POST["izq-padecimiento-38"];
    $Der38 = $_POST["der-padecimiento-38"];
    $Margen38 = $_POST["margen-38"];
    $Diente38 = $Arriba38.'|'.$Abajo38.'|'.$Izq38.'|'.$Der38.'|'.$Margen38;
    
    $Arriba39 = $_POST["arriba-padecimiento-39"];
    $Abajo39 = $_POST["abajo-padecimiento-39"];
    $Izq39 = $_POST["izq-padecimiento-39"];
    $Der39 = $_POST["der-padecimiento-39"];
    $Margen39 = $_POST["margen-39"];
    $Diente39 = $Arriba39.'|'.$Abajo39.'|'.$Izq39.'|'.$Der39.'|'.$Margen39;
    
    $Arriba40 = $_POST["arriba-padecimiento-40"];
    $Abajo40 = $_POST["abajo-padecimiento-40"];
    $Izq40 = $_POST["izq-padecimiento-40"];
    $Der40 = $_POST["der-padecimiento-40"];
    $Margen40 = $_POST["margen-40"];
    $Diente40 = $Arriba40.'|'.$Abajo40.'|'.$Izq40.'|'.$Der40.'|'.$Margen40;
    
    $Arriba41 = $_POST["arriba-padecimiento-41"];
    $Abajo41 = $_POST["abajo-padecimiento-41"];
    $Izq41 = $_POST["izq-padecimiento-41"];
    $Der41 = $_POST["der-padecimiento-41"];
    $Margen41 = $_POST["margen-41"];
    $Diente41 = $Arriba41.'|'.$Abajo41.'|'.$Izq41.'|'.$Der41.'|'.$Margen41;
    
    $Arriba42 = $_POST["arriba-padecimiento-42"];
    $Abajo42 = $_POST["abajo-padecimiento-42"];
    $Izq42 = $_POST["izq-padecimiento-42"];
    $Der42 = $_POST["der-padecimiento-42"];
    $Margen42 = $_POST["margen-42"];
    $Diente42 = $Arriba42.'|'.$Abajo42.'|'.$Izq42.'|'.$Der42.'|'.$Margen42;
    
    $Arriba43 = $_POST["arriba-padecimiento-43"];
    $Abajo43 = $_POST["abajo-padecimiento-43"];
    $Izq43 = $_POST["izq-padecimiento-43"];
    $Der43 = $_POST["der-padecimiento-43"];
    $Margen43 = $_POST["margen-43"];
    $Diente43 = $Arriba43.'|'.$Abajo43.'|'.$Izq43.'|'.$Der43.'|'.$Margen43;
    
    $Arriba44 = $_POST["arriba-padecimiento-44"];
    $Abajo44 = $_POST["abajo-padecimiento-44"];
    $Izq44 = $_POST["izq-padecimiento-44"];
    $Der44 = $_POST["der-padecimiento-44"];
    $Margen44 = $_POST["margen-44"];
    $Diente44 = $Arriba44.'|'.$Abajo44.'|'.$Izq44.'|'.$Der44.'|'.$Margen44;
    
    $Arriba45 = $_POST["arriba-padecimiento-45"];
    $Abajo45 = $_POST["abajo-padecimiento-45"];
    $Izq45 = $_POST["izq-padecimiento-45"];
    $Der45 = $_POST["der-padecimiento-45"];
    $Margen45 = $_POST["margen-45"];
    $Diente45 = $Arriba45.'|'.$Abajo45.'|'.$Izq45.'|'.$Der45.'|'.$Margen45;
    
    $Arriba46 = $_POST["arriba-padecimiento-46"];
    $Abajo46 = $_POST["abajo-padecimiento-46"];
    $Izq46 = $_POST["izq-padecimiento-46"];
    $Der46 = $_POST["der-padecimiento-46"];
    $Margen46 = $_POST["margen-46"];
    $Diente46 = $Arriba46.'|'.$Abajo46.'|'.$Izq46.'|'.$Der46.'|'.$Margen46;
    
    $Arriba47 = $_POST["arriba-padecimiento-47"];
    $Abajo47 = $_POST["abajo-padecimiento-47"];
    $Izq47 = $_POST["izq-padecimiento-47"];
    $Der47 = $_POST["der-padecimiento-47"];
    $Margen47 = $_POST["margen-47"];
    $Diente47 = $Arriba47.'|'.$Abajo47.'|'.$Izq47.'|'.$Der47.'|'.$Margen47;
    
    $Arriba48 = $_POST["arriba-padecimiento-48"];
    $Abajo48 = $_POST["abajo-padecimiento-48"];
    $Izq48 = $_POST["izq-padecimiento-48"];
    $Der48 = $_POST["der-padecimiento-48"];
    $Margen48 = $_POST["margen-48"];
    $Diente48 = $Arriba48.'|'.$Abajo48.'|'.$Izq48.'|'.$Der48.'|'.$Margen48;
    
    $Arriba49 = $_POST["arriba-padecimiento-49"];
    $Abajo49 = $_POST["abajo-padecimiento-49"];
    $Izq49 = $_POST["izq-padecimiento-49"];
    $Der49 = $_POST["der-padecimiento-49"];
    $Margen49 = $_POST["margen-49"];
    $Diente49 = $Arriba49.'|'.$Abajo49.'|'.$Izq49.'|'.$Der49.'|'.$Margen49;
    
    $Arriba50 = $_POST["arriba-padecimiento-50"];
    $Abajo50 = $_POST["abajo-padecimiento-50"];
    $Izq50 = $_POST["izq-padecimiento-50"];
    $Der50 = $_POST["der-padecimiento-50"];
    $Margen50 = $_POST["margen-50"];
    $Diente50 = $Arriba50.'|'.$Abajo50.'|'.$Izq50.'|'.$Der50.'|'.$Margen50;
    
    $Arriba51 = $_POST["arriba-padecimiento-51"];
    $Abajo51 = $_POST["abajo-padecimiento-51"];
    $Izq51 = $_POST["izq-padecimiento-51"];
    $Der51 = $_POST["der-padecimiento-51"];
    $Margen51 = $_POST["margen-51"];
    $Diente51 = $Arriba51.'|'.$Abajo51.'|'.$Izq51.'|'.$Der51.'|'.$Margen51;
    
    $Arriba52 = $_POST["arriba-padecimiento-52"];
    $Abajo52 = $_POST["abajo-padecimiento-52"];
    $Izq52 = $_POST["izq-padecimiento-52"];
    $Der52 = $_POST["der-padecimiento-52"];
    $Margen52 = $_POST["margen-52"];
    $Diente52 = $Arriba52.'|'.$Abajo52.'|'.$Izq52.'|'.$Der52.'|'.$Margen52;
    
    $Arriba53 = $_POST["arriba-padecimiento-53"];
    $Abajo53 = $_POST["abajo-padecimiento-53"];
    $Izq53 = $_POST["izq-padecimiento-53"];
    $Der53 = $_POST["der-padecimiento-53"];
    $Margen53 = $_POST["margen-53"];
    $Diente53 = $Arriba53.'|'.$Abajo53.'|'.$Izq53.'|'.$Der53.'|'.$Margen53;
    
    $Arriba54 = $_POST["arriba-padecimiento-54"];
    $Abajo54 = $_POST["abajo-padecimiento-54"];
    $Izq54 = $_POST["izq-padecimiento-54"];
    $Der54 = $_POST["der-padecimiento-54"];
    $Margen54 = $_POST["margen-54"];
    $Diente54 = $Arriba54.'|'.$Abajo54.'|'.$Izq54.'|'.$Der54.'|'.$Margen54;
    
    $Arriba55 = $_POST["arriba-padecimiento-55"];
    $Abajo55 = $_POST["abajo-padecimiento-55"];
    $Izq55 = $_POST["izq-padecimiento-55"];
    $Der55 = $_POST["der-padecimiento-55"];
    $Margen55 = $_POST["margen-55"];
    $Diente55 = $Arriba55.'|'.$Abajo55.'|'.$Izq55.'|'.$Der55.'|'.$Margen55;
    
    $Arriba56 = $_POST["arriba-padecimiento-56"];
    $Abajo56 = $_POST["abajo-padecimiento-56"];
    $Izq56 = $_POST["izq-padecimiento-56"];
    $Der56 = $_POST["der-padecimiento-56"];
    $Margen56 = $_POST["margen-56"];
    $Diente56 = $Arriba56.'|'.$Abajo56.'|'.$Izq56.'|'.$Der56.'|'.$Margen56;
    
    $Arriba57 = $_POST["arriba-padecimiento-57"];
    $Abajo57 = $_POST["abajo-padecimiento-57"];
    $Izq57 = $_POST["izq-padecimiento-57"];
    $Der57 = $_POST["der-padecimiento-57"];
    $Margen57 = $_POST["margen-57"];
    $Diente57 = $Arriba57.'|'.$Abajo57.'|'.$Izq57.'|'.$Der57.'|'.$Margen57;
    
    $Arriba58 = $_POST["arriba-padecimiento-58"];
    $Abajo58 = $_POST["abajo-padecimiento-58"];
    $Izq58 = $_POST["izq-padecimiento-58"];
    $Der58 = $_POST["der-padecimiento-58"];
    $Margen58 = $_POST["margen-58"];
    $Diente58 = $Arriba58.'|'.$Abajo58.'|'.$Izq58.'|'.$Der58.'|'.$Margen58;
    
    $Arriba59 = $_POST["arriba-padecimiento-59"];
    $Abajo59 = $_POST["abajo-padecimiento-59"];
    $Izq59 = $_POST["izq-padecimiento-59"];
    $Der59 = $_POST["der-padecimiento-59"];
    $Margen59 = $_POST["margen-59"];
    $Diente59 = $Arriba59.'|'.$Abajo59.'|'.$Izq59.'|'.$Der59.'|'.$Margen59;
    
    $Arriba60 = $_POST["arriba-padecimiento-60"];
    $Abajo60 = $_POST["abajo-padecimiento-60"];
    $Izq60 = $_POST["izq-padecimiento-60"];
    $Der60 = $_POST["der-padecimiento-60"];
    $Margen60 = $_POST["margen-60"];
    $Diente60 = $Arriba60.'|'.$Abajo60.'|'.$Izq60.'|'.$Der60.'|'.$Margen60;
    
    $Arriba61 = $_POST["arriba-padecimiento-61"];
    $Abajo61 = $_POST["abajo-padecimiento-61"];
    $Izq61 = $_POST["izq-padecimiento-61"];
    $Der61 = $_POST["der-padecimiento-61"];
    $Margen61 = $_POST["margen-61"];
    $Diente61 = $Arriba61.'|'.$Abajo61.'|'.$Izq61.'|'.$Der61.'|'.$Margen61;
    
    $Arriba62 = $_POST["arriba-padecimiento-62"];
    $Abajo62 = $_POST["abajo-padecimiento-62"];
    $Izq62 = $_POST["izq-padecimiento-62"];
    $Der62 = $_POST["der-padecimiento-62"];
    $Margen62 = $_POST["margen-62"];
    $Diente62 = $Arriba62.'|'.$Abajo62.'|'.$Izq62.'|'.$Der62.'|'.$Margen62;
    
    $Arriba63 = $_POST["arriba-padecimiento-63"];
    $Abajo63 = $_POST["abajo-padecimiento-63"];
    $Izq63 = $_POST["izq-padecimiento-63"];
    $Der63 = $_POST["der-padecimiento-63"];
    $Margen63 = $_POST["margen-63"];
    $Diente63 = $Arriba63.'|'.$Abajo63.'|'.$Izq63.'|'.$Der63.'|'.$Margen63;
    
    $Arriba64 = $_POST["arriba-padecimiento-64"];
    $Abajo64 = $_POST["abajo-padecimiento-64"];
    $Izq64 = $_POST["izq-padecimiento-64"];
    $Der64 = $_POST["der-padecimiento-64"];
    $Margen64 = $_POST["margen-64"];
    $Diente64 = $Arriba64.'|'.$Abajo64.'|'.$Izq64.'|'.$Der64.'|'.$Margen64;
    
    $Informacion_Microbiana = $_POST["inflamacion_microbiana"];
    $Traumatismo_oclusal = $_POST["traumatismo_oclusal"];
    $Parafunciones = $_POST["parafunciones"];
    $Morfologia_Funcion = $_POST["morfologia_funcion"];
    $Articulacion_Temporo_Mandibular = $_POST["articulacion_temporo_mandibular"];
    $Peculiaridad = $_POST["peculiaridad"];
    $Cuant_Plac_Fecha_1 = $_POST["cuant_plac_fecha_1"];
    $Cuant_Plac_A_18 = $_POST["cuant_plac_a_18"];
    $Cuant_Plac_A_17 = $_POST["cuant_plac_a_17"];
    $Cuant_Plac_A_16 = $_POST["cuant_plac_a_16"];
    $Cuant_Plac_A_15 = $_POST["cuant_plac_a_15"];
    $Cuant_Plac_A_14 = $_POST["cuant_plac_a_14"];
    $Cuant_Plac_A_13 = $_POST["cuant_plac_a_13"];
    $Cuant_Plac_A_12 = $_POST["cuant_plac_a_12"];
    $Cuant_Plac_A_11 = $_POST["cuant_plac_a_11"];
    $Cuant_Plac_A_21 = $_POST["cuant_plac_a_21"];
    $Cuant_Plac_A_22 = $_POST["cuant_plac_a_22"];
    $Cuant_Plac_A_23 = $_POST["cuant_plac_a_23"];
    $Cuant_Plac_A_24 = $_POST["cuant_plac_a_24"];
    $Cuant_Plac_A_25 = $_POST["cuant_plac_a_25"];
    $Cuant_Plac_A_26 = $_POST["cuant_plac_a_26"];
    $Cuant_Plac_A_27 = $_POST["cuant_plac_a_27"];
    $Cuant_Plac_A_28 = $_POST["cuant_plac_a_28"];
    $Cuant_Plac_Porcentaje_1 = $_POST["cuant_plac_porcentaje_1"];
    $Cuant_Plac_Fecha_2 = $_POST["cuant_plac_fecha_2"];
    $Cuant_Plac_B_18 = $_POST["cuant_plac_b_18"];
    $Cuant_Plac_B_17 = $_POST["cuant_plac_b_17"];
    $Cuant_Plac_B_16 = $_POST["cuant_plac_b_16"];
    $Cuant_Plac_B_15 = $_POST["cuant_plac_b_15"];
    $Cuant_Plac_B_14 = $_POST["cuant_plac_b_14"];
    $Cuant_Plac_B_13 = $_POST["cuant_plac_b_13"];
    $Cuant_Plac_B_12 = $_POST["cuant_plac_b_12"];
    $Cuant_Plac_B_11 = $_POST["cuant_plac_b_11"];
    $Cuant_Plac_B_21 = $_POST["cuant_plac_b_21"];
    $Cuant_Plac_B_22 = $_POST["cuant_plac_b_22"];
    $Cuant_Plac_B_23 = $_POST["cuant_plac_b_23"];
    $Cuant_Plac_B_24 = $_POST["cuant_plac_b_24"];
    $Cuant_Plac_B_25 = $_POST["cuant_plac_b_25"];
    $Cuant_Plac_B_26 = $_POST["cuant_plac_b_26"];
    $Cuant_Plac_B_27 = $_POST["cuant_plac_b_27"];
    $Cuant_Plac_B_28 = $_POST["cuant_plac_b_28"];
    $Cuant_Plac_Porcentaje_2 = $_POST["cuant_plac_porcentaje_2"];
    $Cuant_Plac_Fecha_3 = $_POST["cuant_plac_fecha_3"];
    $Cuant_Plac_C_18 = $_POST["cuant_plac_c_18"];
    $Cuant_Plac_C_17 = $_POST["cuant_plac_c_17"];
    $Cuant_Plac_C_16 = $_POST["cuant_plac_c_16"];
    $Cuant_Plac_C_15 = $_POST["cuant_plac_c_15"];
    $Cuant_Plac_C_14 = $_POST["cuant_plac_c_14"];
    $Cuant_Plac_C_13 = $_POST["cuant_plac_c_13"];
    $Cuant_Plac_C_12 = $_POST["cuant_plac_c_12"];
    $Cuant_Plac_C_11 = $_POST["cuant_plac_c_11"];
    $Cuant_Plac_C_21 = $_POST["cuant_plac_c_21"];
    $Cuant_Plac_C_22 = $_POST["cuant_plac_c_22"];
    $Cuant_Plac_C_23 = $_POST["cuant_plac_c_23"];
    $Cuant_Plac_C_24 = $_POST["cuant_plac_c_24"];
    $Cuant_Plac_C_25 = $_POST["cuant_plac_c_25"];
    $Cuant_Plac_C_26 = $_POST["cuant_plac_c_26"];
    $Cuant_Plac_C_27 = $_POST["cuant_plac_c_27"];
    $Cuant_Plac_C_28 = $_POST["cuant_plac_c_28"];
    $Cuant_Plac_Porcentaje_3 = $_POST["cuant_plac_porcentaje_3"];
    $Cuant_Plac_Fecha_4 = $_POST["cuant_plac_fecha_4"];
    $Cuant_Plac_A_48 = $_POST["cuant_plac_a_48"];
    $Cuant_Plac_A_47 = $_POST["cuant_plac_a_47"];
    $Cuant_Plac_A_46 = $_POST["cuant_plac_a_46"];
    $Cuant_Plac_A_45 = $_POST["cuant_plac_a_45"];
    $Cuant_Plac_A_44 = $_POST["cuant_plac_a_44"];
    $Cuant_Plac_A_43 = $_POST["cuant_plac_a_43"];
    $Cuant_Plac_A_42 = $_POST["cuant_plac_a_42"];
    $Cuant_Plac_A_41 = $_POST["cuant_plac_a_41"];
    $Cuant_Plac_A_31 = $_POST["cuant_plac_a_31"];
    $Cuant_Plac_A_32 = $_POST["cuant_plac_a_32"];
    $Cuant_Plac_A_33 = $_POST["cuant_plac_a_33"];
    $Cuant_Plac_A_34 = $_POST["cuant_plac_a_34"];
    $Cuant_Plac_A_35 = $_POST["cuant_plac_a_35"];
    $Cuant_Plac_A_36 = $_POST["cuant_plac_a_36"];
    $Cuant_Plac_A_37 = $_POST["cuant_plac_a_37"];
    $Cuant_Plac_A_38 = $_POST["cuant_plac_a_38"];
    $Cuant_Plac_Porcentaje_4 = $_POST["cuant_plac_porcentaje_4"];
    $Cuant_Plac_Fecha_5 = $_POST["cuant_plac_fecha_5"];
    $Cuant_Plac_B_48 = $_POST["cuant_plac_b_48"];
    $Cuant_Plac_B_47 = $_POST["cuant_plac_b_47"];
    $Cuant_Plac_B_46 = $_POST["cuant_plac_b_46"];
    $Cuant_Plac_B_45 = $_POST["cuant_plac_b_45"];
    $Cuant_Plac_B_44 = $_POST["cuant_plac_b_44"];
    $Cuant_Plac_B_43 = $_POST["cuant_plac_b_43"];
    $Cuant_Plac_B_42 = $_POST["cuant_plac_b_42"];
    $Cuant_Plac_B_41 = $_POST["cuant_plac_b_41"];
    $Cuant_Plac_B_31 = $_POST["cuant_plac_b_31"];
    $Cuant_Plac_B_32 = $_POST["cuant_plac_b_32"];
    $Cuant_Plac_B_33 = $_POST["cuant_plac_b_33"];
    $Cuant_Plac_B_34 = $_POST["cuant_plac_b_34"];
    $Cuant_Plac_B_35 = $_POST["cuant_plac_b_35"];
    $Cuant_Plac_B_36 = $_POST["cuant_plac_b_36"];
    $Cuant_Plac_B_37 = $_POST["cuant_plac_b_37"];
    $Cuant_Plac_B_38 = $_POST["cuant_plac_b_38"];
    $Cuant_Plac_Porcentaje_5 = $_POST["cuant_plac_porcentaje_5"];
    $Cuant_Plac_Fecha_6 = $_POST["cuant_plac_fecha_6"];
    $Cuant_Plac_C_48 = $_POST["cuant_plac_c_48"];
    $Cuant_Plac_C_47 = $_POST["cuant_plac_c_47"];
    $Cuant_Plac_C_46 = $_POST["cuant_plac_c_46"];
    $Cuant_Plac_C_45 = $_POST["cuant_plac_c_45"];
    $Cuant_Plac_C_44 = $_POST["cuant_plac_c_44"];
    $Cuant_Plac_C_43 = $_POST["cuant_plac_c_43"];
    $Cuant_Plac_C_42 = $_POST["cuant_plac_c_42"];
    $Cuant_Plac_C_41 = $_POST["cuant_plac_c_41"];
    $Cuant_Plac_C_31 = $_POST["cuant_plac_c_31"];
    $Cuant_Plac_C_32 = $_POST["cuant_plac_c_32"];
    $Cuant_Plac_C_33 = $_POST["cuant_plac_c_33"];
    $Cuant_Plac_C_34 = $_POST["cuant_plac_c_34"];
    $Cuant_Plac_C_35 = $_POST["cuant_plac_c_35"];
    $Cuant_Plac_C_36 = $_POST["cuant_plac_c_36"];
    $Cuant_Plac_C_37 = $_POST["cuant_plac_c_37"];
    $Cuant_Plac_C_38 = $_POST["cuant_plac_c_38"];
    $Cuant_Plac_Porcentaje_6 = $_POST["cuant_plac_porcentaje_6"];
    $Gin_18 = $_POST["gin_18"];
    $Gin_17 = $_POST["gin_17"];
    $Gin_16 = $_POST["gin_16"];
    $Gin_15 = $_POST["gin_15"];
    $Gin_14 = $_POST["gin_14"];
    $Gin_13 = $_POST["gin_13"];
    $Gin_12 = $_POST["gin_12"];
    $Gin_11 = $_POST["gin_11"];
    $Gin_21 = $_POST["gin_21"];
    $Gin_22 = $_POST["gin_22"];
    $Gin_23 = $_POST["gin_23"];
    $Gin_24 = $_POST["gin_24"];
    $Gin_25 = $_POST["gin_25"];
    $Gin_26 = $_POST["gin_26"];
    $Gin_27 = $_POST["gin_27"];
    $Gin_28 = $_POST["gin_28"];
    $Gin_48 = $_POST["gin_48"];
    $Gin_47 = $_POST["gin_47"];
    $Gin_46 = $_POST["gin_46"];
    $Gin_45 = $_POST["gin_45"];
    $Gin_44 = $_POST["gin_44"];
    $Gin_43 = $_POST["gin_43"];
    $Gin_42 = $_POST["gin_42"];
    $Gin_41 = $_POST["gin_41"];
    $Gin_31 = $_POST["gin_31"];
    $Gin_32 = $_POST["gin_32"];
    $Gin_33 = $_POST["gin_33"];
    $Gin_34 = $_POST["gin_34"];
    $Gin_35 = $_POST["gin_35"];
    $Gin_36 = $_POST["gin_36"];
    $Gin_37 = $_POST["gin_37"];
    $Gin_38 = $_POST["gin_38"];
    $Leve_18 = $_POST["leve_18"];
    $Leve_17 = $_POST["leve_17"];
    $Leve_16 = $_POST["leve_16"];
    $Leve_15 = $_POST["leve_15"];
    $Leve_14 = $_POST["leve_14"];
    $Leve_13 = $_POST["leve_13"];
    $Leve_12 = $_POST["leve_12"];
    $Leve_11 = $_POST["leve_11"];
    $Leve_21 = $_POST["leve_21"];
    $Leve_22 = $_POST["leve_22"];
    $Leve_23 = $_POST["leve_23"];
    $Leve_24 = $_POST["leve_24"];
    $Leve_25 = $_POST["leve_25"];
    $Leve_26 = $_POST["leve_26"];
    $Leve_27 = $_POST["leve_27"];
    $Leve_28 = $_POST["leve_28"];
    $Leve_48 = $_POST["leve_48"];
    $Leve_47 = $_POST["leve_47"];
    $Leve_46 = $_POST["leve_46"];
    $Leve_45 = $_POST["leve_45"];
    $Leve_44 = $_POST["leve_44"];
    $Leve_43 = $_POST["leve_43"];
    $Leve_42 = $_POST["leve_42"];
    $Leve_41 = $_POST["leve_41"];
    $Leve_31 = $_POST["leve_31"];
    $Leve_32 = $_POST["leve_32"];
    $Leve_33 = $_POST["leve_33"];
    $Leve_34 = $_POST["leve_34"];
    $Leve_35 = $_POST["leve_35"];
    $Leve_36 = $_POST["leve_36"];
    $Leve_37 = $_POST["leve_37"];
    $Leve_38 = $_POST["leve_38"];
    $Moderna_18 = $_POST["moderna_18"];
    $Moderna_17 = $_POST["moderna_17"];
    $Moderna_16 = $_POST["moderna_16"];
    $Moderna_15 = $_POST["moderna_15"];
    $Moderna_14 = $_POST["moderna_14"];
    $Moderna_13 = $_POST["moderna_13"];
    $Moderna_12 = $_POST["moderna_12"];
    $Moderna_11 = $_POST["moderna_11"];
    $Moderna_21 = $_POST["moderna_21"];
    $Moderna_22 = $_POST["moderna_22"];
    $Moderna_23 = $_POST["moderna_23"];
    $Moderna_24 = $_POST["moderna_24"];
    $Moderna_25 = $_POST["moderna_25"];
    $Moderna_26 = $_POST["moderna_26"];
    $Moderna_27 = $_POST["moderna_27"];
    $Moderna_28 = $_POST["moderna_28"];
    $Moderna_48 = $_POST["moderna_48"];
    $Moderna_47 = $_POST["moderna_47"];
    $Moderna_46 = $_POST["moderna_46"];
    $Moderna_45 = $_POST["moderna_45"];
    $Moderna_44 = $_POST["moderna_44"];
    $Moderna_43 = $_POST["moderna_43"];
    $Moderna_42 = $_POST["moderna_42"];
    $Moderna_41 = $_POST["moderna_41"];
    $Moderna_31 = $_POST["moderna_31"];
    $Moderna_32 = $_POST["moderna_32"];
    $Moderna_33 = $_POST["moderna_33"];
    $Moderna_34 = $_POST["moderna_34"];
    $Moderna_35 = $_POST["moderna_35"];
    $Moderna_36 = $_POST["moderna_36"];
    $Moderna_37 = $_POST["moderna_37"];
    $Moderna_38 = $_POST["moderna_38"];
    $Grave_18 = $_POST["grave_18"];
    $Grave_17 = $_POST["grave_17"];
    $Grave_16 = $_POST["grave_16"];
    $Grave_15 = $_POST["grave_15"];
    $Grave_14 = $_POST["grave_14"];
    $Grave_13 = $_POST["grave_13"];
    $Grave_12 = $_POST["grave_12"];
    $Grave_11 = $_POST["grave_11"];
    $Grave_21 = $_POST["grave_21"];
    $Grave_22 = $_POST["grave_22"];
    $Grave_23 = $_POST["grave_23"];
    $Grave_24 = $_POST["grave_24"];
    $Grave_25 = $_POST["grave_25"];
    $Grave_26 = $_POST["grave_26"];
    $Grave_27 = $_POST["grave_27"];
    $Grave_28 = $_POST["grave_28"];
    $Grave_48 = $_POST["grave_48"];
    $Grave_47 = $_POST["grave_47"];
    $Grave_46 = $_POST["grave_46"];
    $Grave_45 = $_POST["grave_45"];
    $Grave_44 = $_POST["grave_44"];
    $Grave_43 = $_POST["grave_43"];
    $Grave_42 = $_POST["grave_42"];
    $Grave_41 = $_POST["grave_41"];
    $Grave_31 = $_POST["grave_31"];
    $Grave_32 = $_POST["grave_32"];
    $Grave_33 = $_POST["grave_33"];
    $Grave_34 = $_POST["grave_34"];
    $Grave_35 = $_POST["grave_35"];
    $Grave_36 = $_POST["grave_36"];
    $Grave_37 = $_POST["grave_37"];
    $Grave_38 = $_POST["grave_38"];
    $Diagnostico_General = $_POST["diagnostico_general"];
    $Fecha_Basica_1 = $_POST["fecha_basica_1"];
    $Fecha_Basica_2 = $_POST["fecha_basica_2"];
    $Basica_18 = $_POST["basica_18"];
    $Basica_17 = $_POST["basica_17"];
    $Basica_16 = $_POST["basica_16"];
    $Basica_15 = $_POST["basica_15"];
    $Basica_14 = $_POST["basica_14"];
    $Basica_13 = $_POST["basica_13"];
    $Basica_12 = $_POST["basica_12"];
    $Basica_11 = $_POST["basica_11"];
    $Basica_21 = $_POST["basica_21"];
    $Basica_22 = $_POST["basica_22"];
    $Basica_23 = $_POST["basica_23"];
    $Basica_24 = $_POST["basica_24"];
    $Basica_25 = $_POST["basica_25"];
    $Basica_26 = $_POST["basica_26"];
    $Basica_27 = $_POST["basica_27"];
    $Basica_28 = $_POST["basica_28"];
    $Basica_48 = $_POST["basica_48"];
    $Basica_47 = $_POST["basica_47"];
    $Basica_46 = $_POST["basica_46"];
    $Basica_45 = $_POST["basica_45"];
    $Basica_44 = $_POST["basica_44"];
    $Basica_43 = $_POST["basica_43"];
    $Basica_42 = $_POST["basica_42"];
    $Basica_41 = $_POST["basica_41"];
    $Basica_31 = $_POST["basica_31"];
    $Basica_32 = $_POST["basica_32"];
    $Basica_33 = $_POST["basica_33"];
    $Basica_34 = $_POST["basica_34"];
    $Basica_35 = $_POST["basica_35"];
    $Basica_36 = $_POST["basica_36"];
    $Basica_37 = $_POST["basica_37"];
    $Basica_38 = $_POST["basica_38"];
    $Porcentaje_Basica_1 = $_POST["porcentaje_basica_1"];
    $Porcentaje_Basica_2 = $_POST["porcentaje_basica_2"];
    $Fecha_Final_1 = $_POST["fecha_final_1"];
    $Fecha_Final_2 = $_POST["fecha_final_2"];
    $Final_18 = $_POST["final_18"];
    $Final_17 = $_POST["final_17"];
    $Final_16 = $_POST["final_16"];
    $Final_15 = $_POST["final_15"];
    $Final_14 = $_POST["final_14"];
    $Final_13 = $_POST["final_13"];
    $Final_12 = $_POST["final_12"];
    $Final_11 = $_POST["final_11"];
    $Final_21 = $_POST["final_21"];
    $Final_22 = $_POST["final_22"];
    $Final_23 = $_POST["final_23"];
    $Final_24 = $_POST["final_24"];
    $Final_25 = $_POST["final_25"];
    $Final_26 = $_POST["final_26"];
    $Final_27 = $_POST["final_27"];
    $Final_28 = $_POST["final_28"];
    $Final_48 = $_POST["final_48"];
    $Final_47 = $_POST["final_47"];
    $Final_46 = $_POST["final_46"];
    $Final_45 = $_POST["final_45"];
    $Final_44 = $_POST["final_44"];
    $Final_43 = $_POST["final_43"];
    $Final_42 = $_POST["final_42"];
    $Final_41 = $_POST["final_41"];
    $Final_31 = $_POST["final_31"];
    $Final_32 = $_POST["final_32"];
    $Final_33 = $_POST["final_33"];
    $Final_34 = $_POST["final_34"];
    $Final_35 = $_POST["final_35"];
    $Final_36 = $_POST["final_36"];
    $Final_37 = $_POST["final_37"];
    $Final_38 = $_POST["final_38"];
    $Porcentaje_Final_1 = $_POST["porcentaje_final_1"];
    $Porcentaje_Final_2 = $_POST["porcentaje_final_2"];
    $Observaciones = $_POST["observaciones"];
    
    $Bolsa_M_18 = $_POST["bolsa_m_18"];
    $Bolsa_F_18 = $_POST["bolsa_f_18"];
    $Bolsa_H_18 = $_POST["bolsa_h_18"];
    $Bolsa_V_18 = $_POST["bolsa_v_18"];
    $Bolsa_P_18 = $_POST["bolsa_p_18"];
    $Bolsa_D_18 = $_POST["bolsa_d_18"];
    $Bolsa_M2_18 = $_POST["bolsa_m2_18"];
    
    $Bolsa_M_17 = $_POST["bolsa_m_17"];
    $Bolsa_F_17 = $_POST["bolsa_f_17"];
    $Bolsa_H_17 = $_POST["bolsa_h_17"];
    $Bolsa_V_17 = $_POST["bolsa_v_17"];
    $Bolsa_P_17 = $_POST["bolsa_p_17"];
    $Bolsa_D_17 = $_POST["bolsa_d_17"];
    $Bolsa_M2_17 = $_POST["bolsa_m2_17"];
    
    $Bolsa_M_16 = $_POST["bolsa_m_16"];
    $Bolsa_F_16 = $_POST["bolsa_f_16"];
    $Bolsa_H_16 = $_POST["bolsa_h_16"];
    $Bolsa_V_16 = $_POST["bolsa_v_16"];
    $Bolsa_P_16 = $_POST["bolsa_p_16"];
    $Bolsa_D_16 = $_POST["bolsa_d_16"];
    $Bolsa_M2_16 = $_POST["bolsa_m2_16"];
    
    $Bolsa_M_15 = $_POST["bolsa_m_15"];
    $Bolsa_F_15 = $_POST["bolsa_f_15"];
    $Bolsa_H_15 = $_POST["bolsa_h_15"];
    $Bolsa_V_15 = $_POST["bolsa_v_15"];
    $Bolsa_P_15 = $_POST["bolsa_p_15"];
    $Bolsa_D_15 = $_POST["bolsa_d_15"];
    $Bolsa_M2_15 = $_POST["bolsa_m2_15"];
    
    $Bolsa_M_14 = $_POST["bolsa_m_14"];
    $Bolsa_F_14 = $_POST["bolsa_f_14"];
    $Bolsa_H_14 = $_POST["bolsa_h_14"];
    $Bolsa_V_14 = $_POST["bolsa_v_14"];
    $Bolsa_P_14 = $_POST["bolsa_p_14"];
    $Bolsa_D_14 = $_POST["bolsa_d_14"];
    $Bolsa_M2_14 = $_POST["bolsa_m2_14"];
    
    $Bolsa_M_13 = $_POST["bolsa_m_13"];
    $Bolsa_F_13 = $_POST["bolsa_f_13"];
    $Bolsa_H_13 = $_POST["bolsa_h_13"];
    $Bolsa_V_13 = $_POST["bolsa_v_13"];
    $Bolsa_P_13 = $_POST["bolsa_p_13"];
    $Bolsa_D_13 = $_POST["bolsa_d_13"];
    $Bolsa_M2_13 = $_POST["bolsa_m2_13"];
    
    $Bolsa_M_12 = $_POST["bolsa_m_12"];
    $Bolsa_F_12 = $_POST["bolsa_f_12"];
    $Bolsa_H_12 = $_POST["bolsa_h_12"];
    $Bolsa_V_12 = $_POST["bolsa_v_12"];
    $Bolsa_P_12 = $_POST["bolsa_p_12"];
    $Bolsa_D_12 = $_POST["bolsa_d_12"];
    $Bolsa_M2_12 = $_POST["bolsa_m2_12"];
    
    $Bolsa_M_11 = $_POST["bolsa_m_11"];
    $Bolsa_F_11 = $_POST["bolsa_f_11"];
    $Bolsa_H_11 = $_POST["bolsa_h_11"];
    $Bolsa_V_11 = $_POST["bolsa_v_11"];
    $Bolsa_P_11 = $_POST["bolsa_p_11"];
    $Bolsa_D_11 = $_POST["bolsa_d_11"];
    $Bolsa_M2_11 = $_POST["bolsa_m2_11"];
    
    $Bolsa_M_21 = $_POST["bolsa_m_21"];
    $Bolsa_F_21 = $_POST["bolsa_f_21"];
    $Bolsa_H_21 = $_POST["bolsa_h_21"];
    $Bolsa_V_21 = $_POST["bolsa_v_21"];
    $Bolsa_P_21 = $_POST["bolsa_p_21"];
    $Bolsa_D_21 = $_POST["bolsa_d_21"];
    $Bolsa_M2_21 = $_POST["bolsa_m2_21"];
    
    $Bolsa_M_22 = $_POST["bolsa_m_22"];
    $Bolsa_F_22 = $_POST["bolsa_f_22"];
    $Bolsa_H_22 = $_POST["bolsa_h_22"];
    $Bolsa_V_22 = $_POST["bolsa_v_22"];
    $Bolsa_P_22 = $_POST["bolsa_p_22"];
    $Bolsa_D_22 = $_POST["bolsa_d_22"];
    $Bolsa_M2_22 = $_POST["bolsa_m2_22"];
    
    $Bolsa_M_23 = $_POST["bolsa_m_23"];
    $Bolsa_F_23 = $_POST["bolsa_f_23"];
    $Bolsa_H_23 = $_POST["bolsa_h_23"];
    $Bolsa_V_23 = $_POST["bolsa_v_23"];
    $Bolsa_P_23 = $_POST["bolsa_p_23"];
    $Bolsa_D_23 = $_POST["bolsa_d_23"];
    $Bolsa_M2_23 = $_POST["bolsa_m2_23"];
    
    $Bolsa_M_24 = $_POST["bolsa_m_24"];
    $Bolsa_F_24 = $_POST["bolsa_f_24"];
    $Bolsa_H_24 = $_POST["bolsa_h_24"];
    $Bolsa_V_24 = $_POST["bolsa_v_24"];
    $Bolsa_P_24 = $_POST["bolsa_p_24"];
    $Bolsa_D_24 = $_POST["bolsa_d_24"];
    $Bolsa_M2_24 = $_POST["bolsa_m2_24"];
    
    $Bolsa_M_25 = $_POST["bolsa_m_25"];
    $Bolsa_F_25 = $_POST["bolsa_f_25"];
    $Bolsa_H_25 = $_POST["bolsa_h_25"];
    $Bolsa_V_25 = $_POST["bolsa_v_25"];
    $Bolsa_P_25 = $_POST["bolsa_p_25"];
    $Bolsa_D_25 = $_POST["bolsa_d_25"];
    $Bolsa_M2_25 = $_POST["bolsa_m2_25"];
    
    $Bolsa_M_26 = $_POST["bolsa_m_26"];
    $Bolsa_F_26 = $_POST["bolsa_f_26"];
    $Bolsa_H_26 = $_POST["bolsa_h_26"];
    $Bolsa_V_26 = $_POST["bolsa_v_26"];
    $Bolsa_P_26 = $_POST["bolsa_p_26"];
    $Bolsa_D_26 = $_POST["bolsa_d_26"];
    $Bolsa_M2_26 = $_POST["bolsa_m2_26"];
    
    $Bolsa_M_27 = $_POST["bolsa_m_27"];
    $Bolsa_F_27 = $_POST["bolsa_f_27"];
    $Bolsa_H_27 = $_POST["bolsa_h_27"];
    $Bolsa_V_27 = $_POST["bolsa_v_27"];
    $Bolsa_P_27 = $_POST["bolsa_p_27"];
    $Bolsa_D_27 = $_POST["bolsa_d_27"];
    $Bolsa_M2_27 = $_POST["bolsa_m2_27"]; 
    
    $Bolsa_M_28 = $_POST["bolsa_m_28"];
    $Bolsa_F_28 = $_POST["bolsa_f_28"];
    $Bolsa_H_28 = $_POST["bolsa_h_28"];
    $Bolsa_V_28 = $_POST["bolsa_v_28"];
    $Bolsa_P_28 = $_POST["bolsa_p_28"];
    $Bolsa_D_28 = $_POST["bolsa_d_28"];
    $Bolsa_M2_28 = $_POST["bolsa_m2_28"];
    
    $Bolsa_M_41 = $_POST["bolsa_m_41"];
    $Bolsa_F_41 = $_POST["bolsa_f_41"];
    $Bolsa_H_41 = $_POST["bolsa_h_41"];
    $Bolsa_V_41 = $_POST["bolsa_v_41"];
    $Bolsa_P_41 = $_POST["bolsa_p_41"];
    $Bolsa_D_41 = $_POST["bolsa_d_41"];
    $Bolsa_M2_41 = $_POST["bolsa_m2_41"];
    
    $Bolsa_M_42 = $_POST["bolsa_m_42"];
    $Bolsa_F_42 = $_POST["bolsa_f_42"];
    $Bolsa_H_42 = $_POST["bolsa_h_42"];
    $Bolsa_V_42 = $_POST["bolsa_v_42"];
    $Bolsa_P_42 = $_POST["bolsa_p_42"];
    $Bolsa_D_42 = $_POST["bolsa_d_42"];
    $Bolsa_M2_42 = $_POST["bolsa_m2_42"];
    
    $Bolsa_M_43 = $_POST["bolsa_m_43"];
    $Bolsa_F_43 = $_POST["bolsa_f_43"];
    $Bolsa_H_43 = $_POST["bolsa_h_43"];
    $Bolsa_V_43 = $_POST["bolsa_v_43"];
    $Bolsa_P_43 = $_POST["bolsa_p_43"];
    $Bolsa_D_43 = $_POST["bolsa_d_43"];
    $Bolsa_M2_43 = $_POST["bolsa_m2_43"];
    
    $Bolsa_M_44 = $_POST["bolsa_m_44"];
    $Bolsa_F_44 = $_POST["bolsa_f_44"];
    $Bolsa_H_44 = $_POST["bolsa_h_44"];
    $Bolsa_V_44 = $_POST["bolsa_v_44"];
    $Bolsa_P_44 = $_POST["bolsa_p_44"];
    $Bolsa_D_44 = $_POST["bolsa_d_44"];
    $Bolsa_M2_44 = $_POST["bolsa_m2_44"];
    
    $Bolsa_M_45 = $_POST["bolsa_m_45"];
    $Bolsa_F_45 = $_POST["bolsa_f_45"];
    $Bolsa_H_45 = $_POST["bolsa_h_45"];
    $Bolsa_V_45 = $_POST["bolsa_v_45"];
    $Bolsa_P_45 = $_POST["bolsa_p_45"];
    $Bolsa_D_45 = $_POST["bolsa_d_45"];
    $Bolsa_M2_45 = $_POST["bolsa_m2_45"];
    
    $Bolsa_M_46 = $_POST["bolsa_m_46"];
    $Bolsa_F_46 = $_POST["bolsa_f_46"];
    $Bolsa_H_46 = $_POST["bolsa_h_46"];
    $Bolsa_V_46 = $_POST["bolsa_v_46"];
    $Bolsa_P_46 = $_POST["bolsa_p_46"];
    $Bolsa_D_46 = $_POST["bolsa_d_46"];
    $Bolsa_M2_46 = $_POST["bolsa_m2_46"];
    
    $Bolsa_M_47 = $_POST["bolsa_m_47"];
    $Bolsa_F_47 = $_POST["bolsa_f_47"];
    $Bolsa_H_47 = $_POST["bolsa_h_47"];
    $Bolsa_V_47 = $_POST["bolsa_v_47"];
    $Bolsa_P_47 = $_POST["bolsa_p_47"];
    $Bolsa_D_47 = $_POST["bolsa_d_47"];
    $Bolsa_M2_47 = $_POST["bolsa_m2_47"];
    
    $Bolsa_M_48 = $_POST["bolsa_m_48"];
    $Bolsa_F_48 = $_POST["bolsa_f_48"];
    $Bolsa_H_48 = $_POST["bolsa_h_48"];
    $Bolsa_V_48 = $_POST["bolsa_v_48"];
    $Bolsa_P_48 = $_POST["bolsa_p_48"];
    $Bolsa_D_48 = $_POST["bolsa_d_48"];
    $Bolsa_M2_48 = $_POST["bolsa_m2_48"];
    
    $Bolsa_M_31 = $_POST["bolsa_m_31"];
    $Bolsa_F_31 = $_POST["bolsa_f_31"];
    $Bolsa_H_31 = $_POST["bolsa_h_31"];
    $Bolsa_V_31 = $_POST["bolsa_v_31"];
    $Bolsa_P_31 = $_POST["bolsa_p_31"];
    $Bolsa_D_31 = $_POST["bolsa_d_31"];
    $Bolsa_M2_31 = $_POST["bolsa_m2_31"];
    
    $Bolsa_M_32 = $_POST["bolsa_m_32"];
    $Bolsa_F_32 = $_POST["bolsa_f_32"];
    $Bolsa_H_32 = $_POST["bolsa_h_32"];
    $Bolsa_V_32 = $_POST["bolsa_v_32"];
    $Bolsa_P_32 = $_POST["bolsa_p_32"];
    $Bolsa_D_32 = $_POST["bolsa_d_32"];
    $Bolsa_M2_32 = $_POST["bolsa_m2_32"];
    
    $Bolsa_M_33 = $_POST["bolsa_m_33"];
    $Bolsa_F_33 = $_POST["bolsa_f_33"];
    $Bolsa_H_33 = $_POST["bolsa_h_33"];
    $Bolsa_V_33 = $_POST["bolsa_v_33"];
    $Bolsa_P_33 = $_POST["bolsa_p_33"];
    $Bolsa_D_33 = $_POST["bolsa_d_33"];
    $Bolsa_M2_33 = $_POST["bolsa_m2_33"];
    
    $Bolsa_M_34 = $_POST["bolsa_m_34"];
    $Bolsa_F_34 = $_POST["bolsa_f_34"];
    $Bolsa_H_34 = $_POST["bolsa_h_34"];
    $Bolsa_V_34 = $_POST["bolsa_v_34"];
    $Bolsa_P_34 = $_POST["bolsa_p_34"];
    $Bolsa_D_34 = $_POST["bolsa_d_34"];
    $Bolsa_M2_34 = $_POST["bolsa_m2_34"];
    
    $Bolsa_M_35 = $_POST["bolsa_m_35"];
    $Bolsa_F_35 = $_POST["bolsa_f_35"];
    $Bolsa_H_35 = $_POST["bolsa_h_35"];
    $Bolsa_V_35 = $_POST["bolsa_v_35"];
    $Bolsa_P_35 = $_POST["bolsa_p_35"];
    $Bolsa_D_35 = $_POST["bolsa_d_35"];
    $Bolsa_M2_35 = $_POST["bolsa_m2_35"];
    
    $Bolsa_M_36 = $_POST["bolsa_m_36"];
    $Bolsa_F_36 = $_POST["bolsa_f_36"];
    $Bolsa_H_36 = $_POST["bolsa_h_36"];
    $Bolsa_V_36 = $_POST["bolsa_v_36"];
    $Bolsa_P_36 = $_POST["bolsa_p_36"];
    $Bolsa_D_36 = $_POST["bolsa_d_36"];
    $Bolsa_M2_36 = $_POST["bolsa_m2_36"];
    
    $Bolsa_M_37 = $_POST["bolsa_m_37"];
    $Bolsa_F_37 = $_POST["bolsa_f_37"];
    $Bolsa_H_37 = $_POST["bolsa_h_37"];
    $Bolsa_V_37 = $_POST["bolsa_v_37"];
    $Bolsa_P_37 = $_POST["bolsa_p_37"];
    $Bolsa_D_37 = $_POST["bolsa_d_37"];
    $Bolsa_M2_37 = $_POST["bolsa_m2_37"];
    
    $Bolsa_M_38 = $_POST["bolsa_m_38"];
    $Bolsa_F_38 = $_POST["bolsa_f_38"];
    $Bolsa_H_38 = $_POST["bolsa_h_38"];
    $Bolsa_V_38 = $_POST["bolsa_v_38"];
    $Bolsa_P_38 = $_POST["bolsa_p_38"];
    $Bolsa_D_38 = $_POST["bolsa_d_38"];
    $Bolsa_M2_38 = $_POST["bolsa_m2_38"];
    
    $Planificacion_Tratamiento = $_POST["planificacion_tratamiento"];
    $Revision_Meses = $_POST["revision_meses"];
    
    $Fecha_Tratamiento_1 = $_POST["fecha_tratamiento_1"];
    $Tratamiento_1 = $_POST["tratamiento_1"];
    
    $Fecha_Tratamiento_2 = $_POST["fecha_tratamiento_2"];
    $Tratamiento_2 = $_POST["tratamiento_2"];
    
    $Fecha_Tratamiento_3 = $_POST["fecha_tratamiento_3"];
    $Tratamiento_3 = $_POST["tratamiento_3"];
    
    $Fecha_Tratamiento_4 = $_POST["fecha_tratamiento_4"];
    $Tratamiento_4 = $_POST["tratamiento_4"];
    
    $Fecha_Tratamiento_5 = $_POST["fecha_tratamiento_5"];
    $Tratamiento_5 = $_POST["tratamiento_5"];
    
    $Fecha_Tratamiento_6 = $_POST["fecha_tratamiento_6"];
    $Tratamiento_6 = $_POST["tratamiento_6"];
    
    $Fecha_Tratamiento_7 = $_POST["fecha_tratamiento_7"];
    $Tratamiento_7 = $_POST["tratamiento_7"];
    
    $Fecha_Tratamiento_8 = $_POST["fecha_tratamiento_8"];
    $Tratamiento_8 = $_POST["tratamiento_8"];
    
    $Fecha_Tratamiento_9 = $_POST["fecha_tratamiento_9"];
    $Tratamiento_9 = $_POST["tratamiento_9"];
    
    $Fecha_Tratamiento_10 = $_POST["fecha_tratamiento_10"];
    $Tratamiento_10 = $_POST["tratamiento_10"];
    
    $Folio_Recibos_TX = $_POST["folio_recibos_tx"];
    $Numero_Recibos_Radiograficos = $_POST["numero_recibos_radiograficos"];
    $Tratamiento_11 = $_POST["tratamiento_11"];
	
	//guardar la historia clinica
    
    $Formato_Historia_Clinica_Periodoncia = new Formato_Historia_Clinica_Periodoncia(    
        '',
        $IdParejaClinica,
        $Paciente,
        $Ocupacion,
        $Calle,
        $Numero,
        $Colonia,
        $Poblacion,
        $Telefono,
        $Diente1,
        $Diente2,    
        $Diente3,    
        $Diente4,    
        $Diente5,
        $Diente6,
        $Diente7,
        $Diente8,    
        $Diente9,
        $Diente10,
        $Diente11,
        $Diente12,
        $Diente13,
        $Diente14,
        $Diente15,
        $Diente16,
        $Diente17,
        $Diente18,
        $Diente19,
        $Diente20,
        $Diente21,
        $Diente22,
        $Diente23,
        $Diente24,
        $Diente25,
        $Diente26,
        $Diente27,
        $Diente28,
        $Diente29,
        $Diente30,
        $Diente31,
        $Diente32,
        $Diente33,
        $Diente34,
        $Diente35,
        $Diente36,
        $Diente37,
        $Diente38,
        $Diente39,
        $Diente40,
        $Diente41,
        $Diente42,
        $Diente43,
        $Diente44,
        $Diente45,
        $Diente46,
        $Diente47,
        $Diente48,
        $Diente49,
        $Diente50,
        $Diente51,
        $Diente52,
        $Diente53,
        $Diente54,
        $Diente55,
        $Diente56,
        $Diente57,
        $Diente58,
        $Diente59,
        $Diente60,
        $Diente61,
        $Diente62,
        $Diente63,
        $Diente64,
        $Informacion_Microbiana,
        $Traumatismo_oclusal,
        $Parafunciones,
        $Morfologia_Funcion,
        $Articulacion_Temporo_Mandibular,
        $Peculiaridad,
        $Cuant_Plac_Fecha_1,
        $Cuant_Plac_A_18,
        $Cuant_Plac_A_17,
        $Cuant_Plac_A_16,
        $Cuant_Plac_A_15,
        $Cuant_Plac_A_14,
        $Cuant_Plac_A_13,
        $Cuant_Plac_A_12,
        $Cuant_Plac_A_11,
        $Cuant_Plac_A_21,
        $Cuant_Plac_A_22,
        $Cuant_Plac_A_23,
        $Cuant_Plac_A_24,
        $Cuant_Plac_A_25,
        $Cuant_Plac_A_26,
        $Cuant_Plac_A_27,
        $Cuant_Plac_A_28,
        $Cuant_Plac_Porcentaje_1,
        $Cuant_Plac_Fecha_2,
        $Cuant_Plac_B_18,
        $Cuant_Plac_B_17,
        $Cuant_Plac_B_16,
        $Cuant_Plac_B_15,
        $Cuant_Plac_B_14,
        $Cuant_Plac_B_13,
        $Cuant_Plac_B_12,
        $Cuant_Plac_B_11,
        $Cuant_Plac_B_21,
        $Cuant_Plac_B_22,
        $Cuant_Plac_B_23,
        $Cuant_Plac_B_24,
        $Cuant_Plac_B_25,
        $Cuant_Plac_B_26,
        $Cuant_Plac_B_27,
        $Cuant_Plac_B_28,
        $Cuant_Plac_Porcentaje_2,
        $Cuant_Plac_Fecha_3,
        $Cuant_Plac_C_18,
        $Cuant_Plac_C_17,
        $Cuant_Plac_C_16,
        $Cuant_Plac_C_15,
        $Cuant_Plac_C_14,
        $Cuant_Plac_C_13,
        $Cuant_Plac_C_12,
        $Cuant_Plac_C_11,
        $Cuant_Plac_C_21,
        $Cuant_Plac_C_22,
        $Cuant_Plac_C_23,
        $Cuant_Plac_C_24,
        $Cuant_Plac_C_25,
        $Cuant_Plac_C_26,
        $Cuant_Plac_C_27,
        $Cuant_Plac_C_28,
        $Cuant_Plac_Porcentaje_3,
        $Cuant_Plac_Fecha_4,
        $Cuant_Plac_A_48,
        $Cuant_Plac_A_47,
        $Cuant_Plac_A_46,
        $Cuant_Plac_A_45,
        $Cuant_Plac_A_44,
        $Cuant_Plac_A_43,
        $Cuant_Plac_A_42,
        $Cuant_Plac_A_41,
        $Cuant_Plac_A_31,
        $Cuant_Plac_A_32,
        $Cuant_Plac_A_33,
        $Cuant_Plac_A_34,
        $Cuant_Plac_A_35,
        $Cuant_Plac_A_36,
        $Cuant_Plac_A_37,
        $Cuant_Plac_A_38,
        $Cuant_Plac_Porcentaje_4,
        $Cuant_Plac_Fecha_5,
        $Cuant_Plac_B_48,
        $Cuant_Plac_B_47,
        $Cuant_Plac_B_46,
        $Cuant_Plac_B_45,
        $Cuant_Plac_B_44,
        $Cuant_Plac_B_43,
        $Cuant_Plac_B_42,
        $Cuant_Plac_B_41,
        $Cuant_Plac_B_31,
        $Cuant_Plac_B_32,
        $Cuant_Plac_B_33,
        $Cuant_Plac_B_34,
        $Cuant_Plac_B_35,
        $Cuant_Plac_B_36,
        $Cuant_Plac_B_37,
        $Cuant_Plac_B_38,
        $Cuant_Plac_Porcentaje_5,
        $Cuant_Plac_Fecha_6,
        $Cuant_Plac_C_48,
        $Cuant_Plac_C_47,
        $Cuant_Plac_C_46,
        $Cuant_Plac_C_45,
        $Cuant_Plac_C_44,
        $Cuant_Plac_C_43,
        $Cuant_Plac_C_42,
        $Cuant_Plac_C_41,
        $Cuant_Plac_C_31,
        $Cuant_Plac_C_32,
        $Cuant_Plac_C_33,
        $Cuant_Plac_C_34,
        $Cuant_Plac_C_35,
        $Cuant_Plac_C_36,
        $Cuant_Plac_C_37,
        $Cuant_Plac_C_38,
        $Cuant_Plac_Porcentaje_6,
        $Gin_18,
        $Gin_17,
        $Gin_16,
        $Gin_15,
        $Gin_14,
        $Gin_13,
        $Gin_12,
        $Gin_11,
        $Gin_21,
        $Gin_22,
        $Gin_23,
        $Gin_24,
        $Gin_25,
        $Gin_26,
        $Gin_27,
        $Gin_28,
        $Gin_48,
        $Gin_47,
        $Gin_46,
        $Gin_45,
        $Gin_44,
        $Gin_43,
        $Gin_42,
        $Gin_41,
        $Gin_31,
        $Gin_32,
        $Gin_33,
        $Gin_34,
        $Gin_35,
        $Gin_36,
        $Gin_37,
        $Gin_38,
        $Leve_18,
        $Leve_17,
        $Leve_16,
        $Leve_15,
        $Leve_14,
        $Leve_13,
        $Leve_12,
        $Leve_11,
        $Leve_21,
        $Leve_22,
        $Leve_23,
        $Leve_24,
        $Leve_25,
        $Leve_26,
        $Leve_27,
        $Leve_28,
        $Leve_48,
        $Leve_47,
        $Leve_46,
        $Leve_45,
        $Leve_44,
        $Leve_43,
        $Leve_42,
        $Leve_41,
        $Leve_31,
        $Leve_32,
        $Leve_33,
        $Leve_34,
        $Leve_35,
        $Leve_36,
        $Leve_37,
        $Leve_38,
        $Moderna_18,
        $Moderna_17,
        $Moderna_16,
        $Moderna_15,
        $Moderna_14,
        $Moderna_13,
        $Moderna_12,
        $Moderna_11,
        $Moderna_21,
        $Moderna_22,
        $Moderna_23,
        $Moderna_24,
        $Moderna_25,
        $Moderna_26,
        $Moderna_27,
        $Moderna_28,
        $Moderna_48,
        $Moderna_47,
        $Moderna_46,
        $Moderna_45,
        $Moderna_44,
        $Moderna_43,
        $Moderna_42,
        $Moderna_41,
        $Moderna_31,
        $Moderna_32,
        $Moderna_33,
        $Moderna_34,
        $Moderna_35,
        $Moderna_36,
        $Moderna_37,
        $Moderna_38,
        $Grave_18,
        $Grave_17,
        $Grave_16,
        $Grave_15,
        $Grave_14,
        $Grave_13,
        $Grave_12,
        $Grave_11,
        $Grave_21,
        $Grave_22,
        $Grave_23,
        $Grave_24,
        $Grave_25,
        $Grave_26,
        $Grave_27,
        $Grave_28,
        $Grave_48,
        $Grave_47,
        $Grave_46,
        $Grave_45,
        $Grave_44,
        $Grave_43,
        $Grave_42,
        $Grave_41,
        $Grave_31,
        $Grave_32,
        $Grave_33,
        $Grave_34,
        $Grave_35,
        $Grave_36,
        $Grave_37,
        $Grave_38,
        $Diagnostico_General,
        $Fecha_Basica_1,
        $Fecha_Basica_2,
        $Basica_18,
        $Basica_17,
        $Basica_16,
        $Basica_15,
        $Basica_14,
        $Basica_13,
        $Basica_12,
        $Basica_11,
        $Basica_21,
        $Basica_22,
        $Basica_23,
        $Basica_24,
        $Basica_25,
        $Basica_26,
        $Basica_27,
        $Basica_28,
        $Basica_48,
        $Basica_47,
        $Basica_46,
        $Basica_45,
        $Basica_44,
        $Basica_43,
        $Basica_42,
        $Basica_41,
        $Basica_31,
        $Basica_32,
        $Basica_33,
        $Basica_34,
        $Basica_35,
        $Basica_36,
        $Basica_37,
        $Basica_38,
        $Porcentaje_Basica_1,
        $Porcentaje_Basica_2,
        $Fecha_Final_1,
        $Fecha_Final_2,
        $Final_18,
        $Final_17,
        $Final_16,
        $Final_15,
        $Final_14,
        $Final_13,
        $Final_12,
        $Final_11,
        $Final_21,
        $Final_22,
        $Final_23,
        $Final_24,
        $Final_25,
        $Final_26,
        $Final_27,
        $Final_28,
        $Final_48,
        $Final_47,
        $Final_46,
        $Final_45,
        $Final_44,
        $Final_43,
        $Final_42,
        $Final_41,
        $Final_31,
        $Final_32,
        $Final_33,
        $Final_34,
        $Final_35,
        $Final_36,
        $Final_37,
        $Final_38,
        $Porcentaje_Final_1,
        $Porcentaje_Final_2,
        $Observaciones,
        $Bolsa_M_18,
        $Bolsa_F_18,
        $Bolsa_H_18,
        $Bolsa_V_18,
        $Bolsa_P_18,
        $Bolsa_D_18,
        $Bolsa_M2_18,
        $Bolsa_M_17,
        $Bolsa_F_17,
        $Bolsa_H_17,
        $Bolsa_V_17,
        $Bolsa_P_17,
        $Bolsa_D_17,
        $Bolsa_M2_17,
        $Bolsa_M_16,
        $Bolsa_F_16,
        $Bolsa_H_16,
        $Bolsa_V_16,
        $Bolsa_P_16,
        $Bolsa_D_16,
        $Bolsa_M2_16,
        $Bolsa_M_15,
        $Bolsa_F_15,
        $Bolsa_H_15,
        $Bolsa_V_15,
        $Bolsa_P_15,
        $Bolsa_D_15,
        $Bolsa_M2_15,
        $Bolsa_M_14,
        $Bolsa_F_14,
        $Bolsa_H_14,
        $Bolsa_V_14,
        $Bolsa_P_14,
        $Bolsa_D_14,
        $Bolsa_M2_14,
        $Bolsa_M_13,
        $Bolsa_F_13,
        $Bolsa_H_13,
        $Bolsa_V_13,
        $Bolsa_P_13,
        $Bolsa_D_13,
        $Bolsa_M2_13,
        $Bolsa_M_12,
        $Bolsa_F_12,
        $Bolsa_H_12,
        $Bolsa_V_12,
        $Bolsa_P_12,
        $Bolsa_D_12,
        $Bolsa_M2_12,
        $Bolsa_M_11,
        $Bolsa_F_11,
        $Bolsa_H_11,
        $Bolsa_V_11,
        $Bolsa_P_11,
        $Bolsa_D_11,
        $Bolsa_M2_11,
        $Bolsa_M_21,
        $Bolsa_F_21,
        $Bolsa_H_21,
        $Bolsa_V_21,
        $Bolsa_P_21,
        $Bolsa_D_21,
        $Bolsa_M2_21,
        $Bolsa_M_22,
        $Bolsa_F_22,
        $Bolsa_H_22,
        $Bolsa_V_22,
        $Bolsa_P_22,
        $Bolsa_D_22,
        $Bolsa_M2_22,
        $Bolsa_M_23,
        $Bolsa_F_23,
        $Bolsa_H_23,
        $Bolsa_V_23,
        $Bolsa_P_23,
        $Bolsa_D_23,
        $Bolsa_M2_23,
        $Bolsa_M_24,
        $Bolsa_F_24,
        $Bolsa_H_24,
        $Bolsa_V_24,
        $Bolsa_P_24,
        $Bolsa_D_24,
        $Bolsa_M2_24,
        $Bolsa_M_25,
        $Bolsa_F_25,
        $Bolsa_H_25,
        $Bolsa_V_25,
        $Bolsa_P_25,
        $Bolsa_D_25,
        $Bolsa_M2_25,
        $Bolsa_M_26,
        $Bolsa_F_26,
        $Bolsa_H_26,
        $Bolsa_V_26,
        $Bolsa_P_26,
        $Bolsa_D_26,
        $Bolsa_M2_26,
        $Bolsa_M_27,
        $Bolsa_F_27,
        $Bolsa_H_27,
        $Bolsa_V_27,
        $Bolsa_P_27,
        $Bolsa_D_27,
        $Bolsa_M2_27,
        $Bolsa_M_28,
        $Bolsa_F_28,
        $Bolsa_H_28,
        $Bolsa_V_28,
        $Bolsa_P_28,
        $Bolsa_D_28,
        $Bolsa_M2_28,
        $Bolsa_M_41,
        $Bolsa_F_41,
        $Bolsa_H_41,
        $Bolsa_V_41,
        $Bolsa_P_41,
        $Bolsa_D_41,
        $Bolsa_M2_41,
        $Bolsa_M_42,
        $Bolsa_F_42,
        $Bolsa_H_42,
        $Bolsa_V_42,
        $Bolsa_P_42,
        $Bolsa_D_42,
        $Bolsa_M2_42,
        $Bolsa_M_43,
        $Bolsa_F_43,
        $Bolsa_H_43,
        $Bolsa_V_43,
        $Bolsa_P_43,
        $Bolsa_D_43,
        $Bolsa_M2_43,
        $Bolsa_M_44,
        $Bolsa_F_44,
        $Bolsa_H_44,
        $Bolsa_V_44,
        $Bolsa_P_44,
        $Bolsa_D_44,
        $Bolsa_M2_44,
        $Bolsa_M_45,
        $Bolsa_F_45,
        $Bolsa_H_45,
        $Bolsa_V_45,
        $Bolsa_P_45,
        $Bolsa_D_45,
        $Bolsa_M2_45,
        $Bolsa_M_46,
        $Bolsa_F_46,
        $Bolsa_H_46,
        $Bolsa_V_46,
        $Bolsa_P_46,
        $Bolsa_D_46,
        $Bolsa_M2_46,
        $Bolsa_M_47,
        $Bolsa_F_47,
        $Bolsa_H_47,
        $Bolsa_V_47,
        $Bolsa_P_47,
        $Bolsa_D_47,
        $Bolsa_M2_47,
        $Bolsa_M_48,
        $Bolsa_F_48,
        $Bolsa_H_48,
        $Bolsa_V_48,
        $Bolsa_P_48,
        $Bolsa_D_48,
        $Bolsa_M2_48,
        $Bolsa_M_31,
        $Bolsa_F_31,
        $Bolsa_H_31,
        $Bolsa_V_31,
        $Bolsa_P_31,
        $Bolsa_D_31,
        $Bolsa_M2_31,
        $Bolsa_M_32,
        $Bolsa_F_32,
        $Bolsa_H_32,
        $Bolsa_V_32,
        $Bolsa_P_32,
        $Bolsa_D_32,
        $Bolsa_M2_32,
        $Bolsa_M_33,
        $Bolsa_F_33,
        $Bolsa_H_33,
        $Bolsa_V_33,
        $Bolsa_P_33,
        $Bolsa_D_33,
        $Bolsa_M2_33,
        $Bolsa_M_34,
        $Bolsa_F_34,
        $Bolsa_H_34,
        $Bolsa_V_34,
        $Bolsa_P_34,
        $Bolsa_D_34,
        $Bolsa_M2_34,
        $Bolsa_M_35,
        $Bolsa_F_35,
        $Bolsa_H_35,
        $Bolsa_V_35,
        $Bolsa_P_35,
        $Bolsa_D_35,
        $Bolsa_M2_35,
        $Bolsa_M_36,
        $Bolsa_F_36,
        $Bolsa_H_36,
        $Bolsa_V_36,
        $Bolsa_P_36,
        $Bolsa_D_36,
        $Bolsa_M2_36,
        $Bolsa_M_37,
        $Bolsa_F_37,
        $Bolsa_H_37,
        $Bolsa_V_37,
        $Bolsa_P_37,
        $Bolsa_D_37,
        $Bolsa_M2_37,
        $Bolsa_M_38,
        $Bolsa_F_38,
        $Bolsa_H_38,
        $Bolsa_V_38,
        $Bolsa_P_38,
        $Bolsa_D_38,
        $Bolsa_M2_38,
        $Planificacion_Tratamiento,
        $Revision_Meses,
        $Fecha_Tratamiento_1,
        $Tratamiento_1,
        $Fecha_Tratamiento_2,
        $Tratamiento_2,
        $Fecha_Tratamiento_3,
        $Tratamiento_3,
        $Fecha_Tratamiento_4,
        $Tratamiento_4,
        $Fecha_Tratamiento_5,
        $Tratamiento_5,
        $Fecha_Tratamiento_6,
        $Tratamiento_6,
        $Fecha_Tratamiento_7,
        $Tratamiento_7,
        $Fecha_Tratamiento_8,
        $Tratamiento_8,
        $Fecha_Tratamiento_9,
        $Tratamiento_9,
        $Fecha_Tratamiento_10,
        $Tratamiento_10,
        $Folio_Recibos_TX,
        $Numero_Recibos_Radiograficos,
        $Tratamiento_11
    );
    
    $Formato_Historia_Clinica_Periodoncia->Alta();
} 

//aprobar la historia clinica

if(isset($_REQUEST['aprobar']))
{
    $Historia_Clinica = $_POST["historia_clinica"];
    $Aprobado = $_POST["aprobacion"];
	
	$Formato_Historia_Clinica_Periodoncia = new Formato_Historia_Clinica_Periodoncia();
	
	$Formato_Historia_Clinica_Periodoncia->IdHistoriaClinicaPeriodoncia = $Historia_Clinica;
	$Formato_Historia_Clinica_Periodoncia->Aprobado = $Aprobado;
	
	$Formato_Historia_Clinica_Periodoncia->Aprobar();
}
?>