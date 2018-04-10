<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Formato_Historia_Clinica_Protesis_Total.php");

//validar el guardado de la historia clinica 

if(isset($_REQUEST['guardar']))
{
    $IdParejaClinica = $_POST["pareja-clinica"];
    $Paciente = $_POST["sltpaciente-protesis-total"];
    $Ocupacion = $_POST["ocupacion"];
    $Telefono = $_POST["telefono"];
    $Calle = $_POST["calle"];
    $Numero = $_POST["numero"];
    $Colonia = $_POST["colonia"];
    $Poblacion = $_POST["poblacion"];    
    $Pregunta_1 = $_POST["pregunta_1"];
    $Pregunta_2 = $_POST["pregunta_2"];
    $Fecha_Superior = $_POST["fecha_superior"];
    $Fecha_Inferior = $_POST["fecha_inferior"];
    $Pregunta_3 = $_POST["pregunta_3"];
    $Pregunta_4 = $_POST["pregunta_4"];
    $Pregunta_5 = $_POST["pregunta_5"];
    $Pregunta_6 = $_POST["pregunta_6"];
    $Pregunta_7 = $_POST["pregunta_7"];
    $Pregunta_8 = $_POST["pregunta_8"];
    $Pregunta_9 = $_POST["pregunta_9"];
    $Pregunta_10 = $_POST["pregunta_10"];
    $Pregunta_11 = $_POST["pregunta_11"];
    $Pregunta_12 = $_POST["pregunta_12"];
    $Pregunta_13 = $_POST["pregunta_13"];
    $Pregunta_14 = $_POST["pregunta_14"];
    $Pregunta_15 = $_POST["pregunta_15"];
    $Pregunta_16 = $_POST["pregunta_16"];
    $Pregunta_17 = $_POST["pregunta_17"];
    $Pregunta_18 = $_POST["pregunta_18"];
    $Pregunta_19 = $_POST["pregunta_19"];
    $Pregunta_20 = $_POST["pregunta_20"];
    $Residuales_Superior = $_POST["residuales_superior"];
    $Residuales_Inferior = $_POST["residuales_inferior"];
    $Mucosa_Superior = $_POST["mucosa_superior"];
    $Mucosa_Inferior = $_POST["mucosa_inferior"];
    $Posicion_Lingual = $_POST["posicion_lingual"];
    $Volumen_Salival = $_POST["volumen_salival"];
    $Condicion_Salival = $_POST["condicion_salival"];
    $Torus_Palatino = $_POST["torus_palatino"];
    $Torus_Mandibular = $_POST["torus_mandibular"];
    $Reflejo_Nauseoso = $_POST["reflejo_nauseoso"];
    $Relacion_intermaxilar = $_POST["relacion_intermaxilar"];
    $Frenillo = $_POST["frenillo"];
    $Observaciones_Especiales = $_POST["observaciones_especiales"];
    $Diagnostico = $_POST["diagnostico"];
    $Pronostico = $_POST["pronostico"];
    $Plan_Tratamiento = $_POST["plan_tratamiento"]; 
	
	//guardar la historia clinica
    
    $Formato_Historia_Clinica_Protesis_Total = new Formato_Historia_Clinica_Protesis_Total(
        '',
        $IdParejaClinica,
        $Paciente,
        $Ocupacion,
        $Telefono,
        $Calle,
        $Numero,
        $Colonia,
        $Poblacion,
        $Pregunta_1,
        $Pregunta_2,
        $Fecha_Superior,
        $Fecha_Inferior,
        $Pregunta_3,
        $Pregunta_4,
        $Pregunta_5,
        $Pregunta_6,
        $Pregunta_7,
        $Pregunta_8,
        $Pregunta_9,
        $Pregunta_10,
        $Pregunta_11,
        $Pregunta_12,
        $Pregunta_13,
        $Pregunta_14,
        $Pregunta_15,
        $Pregunta_16,
        $Pregunta_17,
        $Pregunta_18,
        $Pregunta_19,
        $Pregunta_20,
        $Residuales_Superior,
        $Residuales_Inferior,
        $Mucosa_Superior,
        $Mucosa_Inferior,
        $Posicion_Lingual,
        $Volumen_Salival,
        $Condicion_Salival,
        $Torus_Palatino,
        $Torus_Mandibular,
        $Reflejo_Nauseoso,
        $Relacion_intermaxilar,
        $Frenillo,
        $Observaciones_Especiales,
        $Diagnostico,
        $Pronostico,
        $Plan_Tratamiento
    );
    
    $Formato_Historia_Clinica_Protesis_Total->Alta();
}

//guardar la historia clinica

if(isset($_REQUEST['aprobar']))
{
    $Historia_Clinica = $_POST["historia_clinica"];
    $Aprobacion = $_POST["aprobacion"];
	
	$Formato_Historia_Clinica_Protesis_Total = new Formato_Historia_Clinica_Protesis_Total();
	
	$Formato_Historia_Clinica_Protesis_Total->IdHistoriaClinicaProtesisTotal = $Historia_Clinica;
	$Formato_Historia_Clinica_Protesis_Total->Aprobado = $Aprobacion;
	
	$Formato_Historia_Clinica_Protesis_Total->Aprobar();
}
?>