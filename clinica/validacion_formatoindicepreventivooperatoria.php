<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Formato_Indice_Preventivo_Operatoria.php");

date_default_timezone_set('America/Mazatlan'); 

//validar el guardado de la historia clinica

if(isset($_REQUEST['guardar']))
{
  $Pareja_Clinica = $_POST["pareja-clinica"];
  $Paciente = $_POST["sltpaciente-indice-preventivo-operatoria"];
  $Estatura_Paciente = $_POST["estatura_paciente"];
  $Peso_Paciente = $_POST["peso_paciente"];
  $Edad_Paciente = $_POST["edad_paciente"];
  $Ocupacion_Paciente = $_POST["ocupacion"];
  $Calculo17_16 = $_POST["calculo17_16"];
  $Calculo11_21 = $_POST["calculo11_21"];
  $Calculo26_27 = $_POST["calculo26_27"];
  $Placa17_16 = $_POST["placa17_16"];
  $Placa11_21 = $_POST["placa11_21"];
  $Placa26_27 = $_POST["placa26_27"];
  $IndicePlaca = $_POST["indice-placa"];
  $IndiceCalculo = $_POST["indice-calculo"];
  $IHOS = $_POST["ihos"];
  $Placa47_46 = $_POST["placa47_46"];
  $Placa41_31 = $_POST["placa41_31"];
  $Placa36_37 = $_POST["placa36_37"];
  $Calculo47_46 = $_POST["calculo47_46"];
  $Calculo41_31 = $_POST["calculo41_31"];
  $Calculo36_37 = $_POST["calculo36_37"];
  $IHOS_Nivel = $_POST["ihos-nivel"];
  $CPO_17 = $_POST["cpo_17"];
  $CPO_16 = $_POST["cpo_16"];    
  $CPO_15 = $_POST["cpo_15"];    
  $CPO_14 = $_POST["cpo_14"];    
  $CPO_13 = $_POST["cpo_13"];    
  $CPO_12 = $_POST["cpo_12"];    
  $CPO_11 = $_POST["cpo_11"];    
  $CPO_21 = $_POST["cpo_21"];    
  $CPO_22 = $_POST["cpo_22"];    
  $CPO_23 = $_POST["cpo_23"];    
  $CPO_24 = $_POST["cpo_24"];    
  $CPO_25 = $_POST["cpo_25"];    
  $CPO_26 = $_POST["cpo_26"];    
  $CPO_27 = $_POST["cpo_27"];    
  $CPO_47 = $_POST["cpo_47"];    
  $CPO_46 = $_POST["cpo_46"];    
  $CPO_45 = $_POST["cpo_45"];    
  $CPO_44 = $_POST["cpo_44"];    
  $CPO_43 = $_POST["cpo_43"];    
  $CPO_42 = $_POST["cpo_42"];    
  $CPO_41 = $_POST["cpo_41"];    
  $CPO_31 = $_POST["cpo_31"];    
  $CPO_32 = $_POST["cpo_32"];    
  $CPO_33 = $_POST["cpo_33"];    
  $CPO_34 = $_POST["cpo_34"];    
  $CPO_35 = $_POST["cpo_35"];    
  $CPO_36 = $_POST["cpo_36"];    
  $CPO_37 = $_POST["cpo_37"];    
  $CI = $_POST["ci"];    
  $CC = $_POST["cc"];    
  $P = $_POST["p"];    
  $O = $_POST["o"];    
  $CPO = $_POST["cpo"];    
  $TotalPiezasExaminadas = $_POST["total-piezas-examinadas"];    
  $IndiceCPO = $_POST["indice-cpo"];    
  $S = $_POST["s"];    
  $Desayuno = $_POST["desayuno"];    
  $EntreComidas1 = $_POST["entre-comidas1"];    
  $ComidaPrincipal = $_POST["comida-principal"];    
  $EntreComidas2 = $_POST["entre-comidas2"];    
  $Cena = $_POST["cena"];    
  $EntreComidas3 = $_POST["entre-comidas3"];    
  $Total1 = $_POST["total1"];    
  $BebidasDesayuno = $_POST["bebidas-desayuno"];    
  $BebidasComidaPrincipal = $_POST["bebidas-comida-principal"];    
  $BebidasCena = $_POST["bebidas-cena"];    
  $BebidasEntreComidas = $_POST["bebidas-entre-comidas"];    
  $DulcesDesayuno = $_POST["dulces-desayuno"];    
  $DulcesComidaPrincipal = $_POST["dulces-comida-principal"];    
  $DulcesCena = $_POST["dulces-cena"];    
  $DulcesEntreComidas = $_POST["dulces-entre-comidas"];    
  $PastasDesayuno = $_POST["pastas-desayuno"];    
  $PastasComidaPrincipal = $_POST["pastas-comida-principal"];    
  $PastasCena = $_POST["pastas-cena"];    
  $PastasEntreComidas = $_POST["pastas-entre-comidas"];    
  $JarabesDesayuno = $_POST["jarabes-desayuno"];    
  $JarabesComidaPrincipal = $_POST["jarabes-comida-principal"];    
  $JarabesCena = $_POST["jarabes-cena"];    
  $JarabesEntreComidas = $_POST["jarabes-entre-comidas"];    
  $TotalDesayuno1 = $_POST["total-desayuno1"];    
  $TotalComidaPrincipal2 = $_POST["total-comida-principal2"];    
  $TotalCena3 = $_POST["total-cena3"];    
  $TotalEntreComidas4 = $_POST["total-entre-comidas4"];    
  $Total2 = $_POST["total2"];    
  $CarneDesayuno = $_POST["carne-desayuno"];    
  $CarneComidaPrincipal = $_POST["carne-comida-principal"];
  $CarneCena = $_POST["carne-cena"];    
  $CarneEntreComidas = $_POST["carne-entre-comidas"];    
  $CerealesDesayuno = $_POST["cereales-desayuno"];    
  $CerealesComidaPrincipal = $_POST["cereales-comida-principal"];    
  $CerealesCena = $_POST["cereales-cena"];    
  $CerealesEntreComidas = $_POST["cereales-entre-comidas"];    
  $VerdurasDesayuno = $_POST["verduras-desayuno"];    
  $VerdurasComidaPrincipal = $_POST["verduras-comida-principal"];    
  $VerdurasCena = $_POST["verduras-cena"];    
  $VerdurasEntreComidas = $_POST["verduras-entre-comidas"];    
  $SustitutosAzucarDesayuno = $_POST["sustituto-azucar-desayuno"];
  $SustitutosAzucarComidaPrincipal = $_POST["sustituto-azucar-comida-principal"];
  $SustitutosAzucarCena = $_POST["sustituto-azucar-cena"];
  $SustitutosAzucarEntreComidas = $_POST["sustituto-azucar-entre-comidas"];
  $TotalDesayuno = $_POST["total-desayuno"];
  $TotalComidaPrincipal = $_POST["total-comida-principal"];
  $TotalCena = $_POST["total-cena"];
  $TotalEntreComidas = $_POST["total-entre-comidas"];
  $Total3 = $_POST["total3"];
  $Alimentacion = $_POST["alimentacion"];
  $FlujoSalival = $_POST["flujo-salival"];
  $HabitosHigiene = $_POST["habitos-higiene"];
  $IndicePlacaNivel = $_POST["indice-placa-nivel"];
  $AtencionDentalRegular = $_POST["atencion-dental-regular"];
  $MultiplesRestauracionesOrtodoncia = $_POST["multiples-restauraciones-ortodoncia"];
  $Enfermedades = $_POST["enfermedades"];
  $AntecedentesFamiliaresCaries = $_POST["antecedentes-familiares-caries"];
  $TotalAlta = $_POST["total-alta"];
  $TotalMedia = $_POST["total-media"];
  $TotalBaja = $_POST["total-baja"];
  $RiesgoCariesDental = $_POST["riesgo-caries-dental"];
    
  $Formato_Indice_Preventivo_Operatoria = new Formato_Indice_Preventivo_Operatoria(
	  '',
      $Pareja_Clinica,
      $Paciente,
	  $Estatura_Paciente,
	  $Peso_Paciente,
	  $Edad_Paciente,
	  $Ocupacion_Paciente,
      $Calculo17_16,
      $Calculo11_21,
      $Calculo26_27,
      $Placa17_16,
      $Placa11_21,
      $Placa26_27,
      $IndicePlaca,
      $IndiceCalculo,
      $IHOS,
      $Placa47_46,
      $Placa41_31,
      $Placa36_37,
      $Calculo47_46,
      $Calculo41_31,
      $Calculo36_37,
      $IHOS_Nivel,
      $CPO_17,
      $CPO_16,
      $CPO_15,
      $CPO_14,
      $CPO_13,
      $CPO_12,
      $CPO_11,
      $CPO_21,
      $CPO_22,
      $CPO_23,
      $CPO_24,
      $CPO_25,
      $CPO_26,
      $CPO_27,
      $CPO_47,
      $CPO_46,
      $CPO_45,
      $CPO_44,
      $CPO_43,
      $CPO_42,
      $CPO_41,
      $CPO_31,
      $CPO_32,
      $CPO_33,
      $CPO_34,
      $CPO_35,
      $CPO_36,
      $CPO_37,
      $CI,
      $CC,
      $P,
      $O,
      $CPO,
      $TotalPiezasExaminadas,
      $IndiceCPO,
      $S,
      $Desayuno,
      $EntreComidas1,
      $ComidaPrincipal,
      $EntreComidas2,
      $Cena,
      $EntreComidas3,
      $Total1,
      $BebidasDesayuno,
      $BebidasComidaPrincipal,
      $BebidasCena,
      $BebidasEntreComidas,
      $DulcesDesayuno,
      $DulcesComidaPrincipal,
      $DulcesCena,
      $DulcesEntreComidas,
      $PastasDesayuno,
      $PastasComidaPrincipal,
      $PastasCena,
      $PastasEntreComidas,
      $JarabesDesayuno,
      $JarabesComidaPrincipal,
      $JarabesCena,
      $JarabesEntreComidas,
      $TotalDesayuno1,
      $TotalComidaPrincipal2,
      $TotalCena3,
      $TotalEntreComidas4,
      $Total2,
      $CarneDesayuno,
      $CarneComidaPrincipal,
      $CarneCena,
      $CarneEntreComidas,
      $CerealesDesayuno,
      $CerealesComidaPrincipal,
      $CerealesCena,
      $CerealesEntreComidas,
      $VerdurasDesayuno,
      $VerdurasComidaPrincipal,
      $VerdurasCena,
      $VerdurasEntreComidas,
      $SustitutosAzucarDesayuno,
      $SustitutosAzucarComidaPrincipal,
      $SustitutosAzucarCena,
      $SustitutosAzucarEntreComidas,
      $TotalDesayuno,
      $TotalComidaPrincipal,
      $TotalCena,
      $TotalEntreComidas,
      $Total3,
      $Alimentacion,
      $FlujoSalival,
      $HabitosHigiene,
      $IndicePlacaNivel,
      $AtencionDentalRegular,
      $MultiplesRestauracionesOrtodoncia,
      $Enfermedades,
      $AntecedentesFamiliaresCaries,
      $TotalAlta,
      $TotalMedia,
      $TotalBaja,
      $RiesgoCariesDental
  );
    
  $Formato_Indice_Preventivo_Operatoria->Alta();
}

//aprobar la historia clinica

if(isset($_REQUEST['aprobar']))
{
  $Historia_Clinica = $_POST["historia_clinica"];
  $Aprobar = $_POST["aprobacion"];
    
  $Formato_Indice_Preventivo_Operatoria = new Formato_Indice_Preventivo_Operatoria();
   
  $Formato_Indice_Preventivo_Operatoria->IdIndicePreventivoOperatoria = $Historia_Clinica;
  
  $Formato_Indice_Preventivo_Operatoria->Aprobado = $Aprobar;
    
  $Formato_Indice_Preventivo_Operatoria->Aprobar();
}
?>