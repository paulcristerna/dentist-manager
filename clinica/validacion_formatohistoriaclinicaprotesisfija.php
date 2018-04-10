<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Formato_Historia_Clinica_Protesis_Fija.php");

//validar el guardado de la historia clinica   

if(isset($_REQUEST['guardar']))
{
    $Pareja_Clinica = $_POST["pareja-clinica"];
    $Paciente = $_POST["sltpaciente-protesis-fija"];
    
    $Ocupacion = $_POST["ocupacion"];
    $Telefono = $_POST["telefono"];
    $Calle = $_POST["calle"];
    $Numero = $_POST["numero"];
    $Colonia = $_POST["colonia"];
    $Poblacion = $_POST["poblacion"];
    $LugarNacimiento = $_POST["lugar-nacimiento"];
    
    $Motivo_Consulta = $_POST["motivo_consulta"];
    $Tx_Medico = $_POST["tx_medico"];
    $Cual_Motivo = $_POST["cual_motivo"];
    $DienteIzq_1 = $_POST["campo-diente-izq-1"];
    $DienteIzq_2 = $_POST["campo-diente-izq-2"];
    $DienteIzq_3 = $_POST["campo-diente-izq-3"];
    $DienteIzq_4 = $_POST["campo-diente-izq-4"];
    $DienteIzq_5 = $_POST["campo-diente-izq-5"];
    $DienteIzq_6 = $_POST["campo-diente-izq-6"];
    $DienteIzq_7 = $_POST["campo-diente-izq-7"];
    $DienteIzq_8 = $_POST["campo-diente-izq-8"];
    $DienteIzq_9 = $_POST["campo-diente-izq-9"];
    $DienteIzq_10 = $_POST["campo-diente-izq-10"];
    $DienteIzq_11 = $_POST["campo-diente-izq-11"];
    $DienteIzq_12 = $_POST["campo-diente-izq-12"];
    $DienteIzq_13 = $_POST["campo-diente-izq-13"];
    $DienteIzq_14 = $_POST["campo-diente-izq-14"];
    $DienteDer_1 = $_POST["campo-diente-der-1"];
    $DienteDer_2 = $_POST["campo-diente-der-2"];
    $DienteDer_3 = $_POST["campo-diente-der-3"];
    $DienteDer_4 = $_POST["campo-diente-der-4"];
    $DienteDer_5 = $_POST["campo-diente-der-5"];
    $DienteDer_6 = $_POST["campo-diente-der-6"];
    $DienteDer_7 = $_POST["campo-diente-der-7"];
    $DienteDer_8 = $_POST["campo-diente-der-8"];
    $DienteDer_9 = $_POST["campo-diente-der-9"];
    $DienteDer_10 = $_POST["campo-diente-der-10"];
    $DienteDer_11 = $_POST["campo-diente-der-11"];
    $DienteDer_12 = $_POST["campo-diente-der-12"];
    $DienteDer_13 = $_POST["campo-diente-der-13"];
    $DienteDer_14 = $_POST["campo-diente-der-14"];
    $Observaciones_1 = $_POST["observaciones_1"];
    $Clasificacion_Angle = $_POST["clasificacion_angle"];
    $Proteccion_Canina = $_POST["proteccion_canina"];
    $Proteccion_Anterior = $_POST["proteccion_anterior"];
    $Funcion_Grupo = $_POST["funcion_grupo"];
    $Proteccion_Mutua = $_POST["proteccion_mutua"];
    $Mordida_Cruzada = $_POST["mordida_cruzada"];
    $Mordida_Abierta = $_POST["mordida_abierta"];
    $Sobremordida = $_POST["sobremordida"];
    $Traslape_Horizontal = $_POST["traslape_horizontal"];
    $Observaciones_2 = $_POST["observaciones_2"];
    $Examen_Radiografico = $_POST["examen_radiografico"];
    $Relacion_Corona_Raiz = $_POST["relacion_corona_raiz"];
    $Soporte_Oseo = $_POST["soporte_oseo"];
    $Region_Desdentada = $_POST["region_desdentada"];
    $Observaciones_3 = $_POST["observaciones_3"];
    $Pregunta_1 = $_POST["pregunta_1"];
    $Pregunta_2 = $_POST["pregunta_2"];
    $Pregunta_3 = $_POST["pregunta_3"];
    $Habitos_Bucales = $_POST["habitos_bucales"];
    $Plan_Tratamiento = $_POST["plan_tratamiento"];
    $Dientes_Pilares = $_POST["dientes_pilares"];
    $Ponticos = $_POST["ponticos"];
    $Restauraciones_Individuales = $_POST["restauraciones_individuales"];
    $Otros = $_POST["otros"];
    $Material_Utilizar = $_POST["material_utilizar"];
    $Modelos_Estudio = $_POST["modelos_estudio"];
    $Preparaciones = $_POST["preparaciones"];
    $Impresiones = $_POST["impresiones"];
    $Protesis_Provicionales = $_POST["protesis_provicionales"];
    $Prueba_Metal = $_POST["prueba_metal"];
    $Prueba_Protesis = $_POST["prueba_protesis"];
    $Cemento = $_POST["cemento"];
    $Otros_Tratamientos = $_POST["otros_tratamientos"];
	
	//guardar la historia clinica
    
    $Formato_Historia_Clinica_Protesis_Fija = new Formato_Historia_Clinica_Protesis_Fija (
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
        $Motivo_Consulta,
        $Tx_Medico,
        $Cual_Motivo,
        $DienteIzq_1,
        $DienteIzq_2,
        $DienteIzq_3,
        $DienteIzq_4,
        $DienteIzq_5,
        $DienteIzq_6,
        $DienteIzq_7,
        $DienteIzq_8,
        $DienteIzq_9,
        $DienteIzq_10,
        $DienteIzq_11,
        $DienteIzq_12,
        $DienteIzq_13,
        $DienteIzq_14,
        $DienteDer_1,
        $DienteDer_2,
        $DienteDer_3,
        $DienteDer_4,
        $DienteDer_5,
        $DienteDer_6,
        $DienteDer_7,
        $DienteDer_8,
        $DienteDer_9,
        $DienteDer_10,
        $DienteDer_11,
        $DienteDer_12,
        $DienteDer_13,
        $DienteDer_14,
        $Observaciones_1,
        $Clasificacion_Angle,
        $Proteccion_Canina,
        $Proteccion_Anterior,
        $Funcion_Grupo,
        $Proteccion_Mutua,
        $Mordida_Cruzada,
        $Mordida_Abierta,
        $Sobremordida,
        $Traslape_Horizontal,
        $Observaciones_2,
        $Examen_Radiografico,
        $Relacion_Corona_Raiz,
        $Soporte_Oseo,
        $Region_Desdentada,
        $Observaciones_3,
        $Pregunta_1,
        $Pregunta_2,
        $Pregunta_3,
        $Habitos_Bucales,
        $Plan_Tratamiento,
        $Dientes_Pilares,
        $Ponticos,
        $Restauraciones_Individuales,
        $Otros,
        $Material_Utilizar,
        $Modelos_Estudio,
        $Preparaciones,
        $Impresiones,
        $Protesis_Provicionales,
        $Prueba_Metal,
        $Prueba_Protesis,
        $Cemento,
        $Otros_Tratamientos
    );
    
    $Formato_Historia_Clinica_Protesis_Fija->Alta();
} 

//validar la historia clinica

if(isset($_REQUEST['aprobar']))
{
    $Historia_Clinica = $_POST["historia_clinica"];
    $Aprobacion = $_POST["aprobacion"];
    
    $Formato_Historia_Clinica_Protesis_Fija = new Formato_Historia_Clinica_Protesis_Fija();
    
    $Formato_Historia_Clinica_Protesis_Fija->IdHistoriaClinicaProtesisFija = $Historia_Clinica;
    $Formato_Historia_Clinica_Protesis_Fija->Aprobado = $Aprobacion;
    
    $Formato_Historia_Clinica_Protesis_Fija->Aprobar();
}
?>