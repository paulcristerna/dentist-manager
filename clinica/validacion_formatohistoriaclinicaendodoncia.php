<?php 
include("../core-saec/AccesoBD.php");
include("../core-saec/Formato_Historia_Clinica_Endodoncia.php");

//validar el guardado de la historia clinica

if(isset($_REQUEST['guardar']))
{
  $Pareja_Clinica = $_POST["pareja-clinica"];
  $Paciente = $_POST["sltpaciente-endodoncia"];
  $Calle = $_POST["calle"];
  $Numero = $_POST["numero"];
  $Colonia = $_POST["colonia"];
  $Poblacion = $_POST["poblacion"];
  $Telefono = $_POST["telefono"];
  $Ocupacion = $_POST["ocupacion"];
  $Dolor = $_POST["dolor"];
  $DolorTipo = $_POST["dolor_tipo"];
  $DolorProvocadoPor = $_POST["dolor_provocado_por"];
  $NivelIntensidad = $_POST["nivel_intensidad"];
  $Presentacion = $_POST["presentacion"];
  $Duracion_Seg = $_POST["duracion_seg"];
  $Duracion_MIn = $_POST["duracion_min"];
  $Duracion_Horas = $_POST["duracion_horas"];
  $Sensacion_Diente = $_POST["sensacion_diente"];
  $Exposicio_Pulpar = $_POST["exposicion_pulpar"];
  $Lesion_Pulpar = $_POST["lesion_pulpar"];
  $Inflamacion = $_POST["inflamacion"];
  $Frio = $_POST["frio"];
  $Calor = $_POST["calor"];
  $Movilidad = $_POST["movilidad"];
  $Camara_Conducto_Pulpar = $_POST["camara_conducto_pulpar"];
  $Periapice = $_POST["periapice"];
  $Ligamento_Periodontal = $_POST["ligamento_periodontal"];
  $Rarefaccion_Apical = $_POST["rarefaccion_apical"];
  $Diagnostico_Pulpar = $_POST["diagnostico_pulpar"];
  $Pronostico = $_POST["pronostico"];
  $Plan_Tratamiento = $_POST["plan_tratamiento"];
  $Tecnica_Operatoria = $_POST["tecnica_operatoria"];
  $Materiales_Obturacion = $_POST["materiales_obturacion"];
  $Numero_Grapa = $_POST["numero_grapa"];
  $Pieza_Dental = $_POST["pieza_dental"];
  $Conducto_1 = $_POST["conducto_1"];
  $Conducto_2 = $_POST["conducto_2"];
  $Conducto_3 = $_POST["conducto_3"];
  $Conducto_4 = $_POST["conducto_4"];
  $Conducto_5 = $_POST["conducto_5"];
  $Conducto_6 = $_POST["conducto_6"];
  $Conducto_7 = $_POST["conducto_7"];
  $Tec_Long_Tent_1 = $_POST["tec_long_tent_1"];
  $Tec_Long_Tent_2 = $_POST["tec_long_tent_2"];
  $Tec_Long_Tent_3 = $_POST["tec_long_tent_3"];
  $Tec_Long_Tent_4 = $_POST["tec_long_tent_4"];
  $Tec_Long_Tent_5 = $_POST["tec_long_tent_5"];
  $Tec_Long_Tent_6 = $_POST["tec_long_tent_6"];
  $Tec_Long_Tent_7 = $_POST["tec_long_tent_7"];
  $Tec_Long_Rectif_1 = $_POST["tec_long_rectif_1"];
  $Tec_Long_Rectif_2 = $_POST["tec_long_rectif_2"];
  $Tec_Long_Rectif_3 = $_POST["tec_long_rectif_3"];
  $Tec_Long_Rectif_4 = $_POST["tec_long_rectif_4"];
  $Tec_Long_Rectif_5 = $_POST["tec_long_rectif_5"];
  $Tec_Long_Rectif_6 = $_POST["tec_long_rectif_6"];
  $Tec_Long_Rectif_7 = $_POST["tec_long_rectif_7"];
  $Tec_Long_Def_1 = $_POST["tec_long_def_1"];
  $Tec_Long_Def_2 = $_POST["tec_long_def_2"];
  $Tec_Long_Def_3 = $_POST["tec_long_def_3"];
  $Tec_Long_Def_4 = $_POST["tec_long_def_4"];
  $Tec_Long_Def_5 = $_POST["tec_long_def_5"];
  $Tec_Long_Def_6 = $_POST["tec_long_def_6"];
  $Tec_Long_Def_7 = $_POST["tec_long_def_7"];
  $Punto_Referencia_1 = $_POST["punto_referencia_1"];
  $Punto_Referencia_2 = $_POST["punto_referencia_2"];
  $Punto_Referencia_3 = $_POST["punto_referencia_3"];
  $Punto_Referencia_4 = $_POST["punto_referencia_4"];
  $Punto_Referencia_5 = $_POST["punto_referencia_5"];
  $Punto_Referencia_6 = $_POST["punto_referencia_6"];
  $Punto_Referencia_7 = $_POST["punto_referencia_7"];
  $Num_Instrumento_1 = $_POST["num_instrumento_1"];
  $Num_Instrumento_2 = $_POST["num_instrumento_2"];
  $Num_Instrumento_3 = $_POST["num_instrumento_3"];
  $Num_Instrumento_4 = $_POST["num_instrumento_4"];
  $Num_Instrumento_5 = $_POST["num_instrumento_5"];
  $Num_Instrumento_6 = $_POST["num_instrumento_6"];
  $Num_Instrumento_7 = $_POST["num_instrumento_7"];
  $Num_Cono_1 = $_POST["num_cono_1"];
  $Num_Cono_2 = $_POST["num_cono_2"];
  $Num_Cono_3 = $_POST["num_cono_3"];
  $Num_Cono_4 = $_POST["num_cono_4"];
  $Num_Cono_5 = $_POST["num_cono_5"];
  $Num_Cono_6 = $_POST["num_cono_6"];
  $Num_Cono_7 = $_POST["num_cono_7"];
  $Observacion = $_POST["observacion"];
	
  //guardar la historia clinica

  $Formato_Historia_Clinica_Endodoncia = new Formato_Historia_Clinica_Endodoncia(
          '',
          $Pareja_Clinica,
          $Paciente,
          $Calle,
          $Numero,
          $Colonia,
          $Poblacion,
          $Telefono,
          $Ocupacion,
          $Dolor,
          $DolorTipo,
          $DolorProvocadoPor,
          $NivelIntensidad,
          $Presentacion,
          $Duracion_Seg,
          $Duracion_MIn,
          $Duracion_Horas,
          $Sensacion_Diente,
          $Exposicio_Pulpar,
          $Lesion_Pulpar,
          $Inflamacion,
          $Frio,
          $Calor,
          $Movilidad,
          $Camara_Conducto_Pulpar,
          $Periapice,
          $Ligamento_Periodontal,
          $Rarefaccion_Apical,
          $Diagnostico_Pulpar,
          $Pronostico,
          $Plan_Tratamiento,
          $Tecnica_Operatoria,
          $Materiales_Obturacion,
          $Numero_Grapa,
          $Pieza_Dental,
          $Conducto_1,
          $Conducto_2,
          $Conducto_3,
          $Conducto_4,
          $Conducto_5,
          $Conducto_6,
          $Conducto_7,
          $Tec_Long_Tent_1,
          $Tec_Long_Tent_2,
          $Tec_Long_Tent_3,
          $Tec_Long_Tent_4,
          $Tec_Long_Tent_5,
          $Tec_Long_Tent_6,
          $Tec_Long_Tent_7,
          $Tec_Long_Rectif_1,
          $Tec_Long_Rectif_2,
          $Tec_Long_Rectif_3,
          $Tec_Long_Rectif_4,
          $Tec_Long_Rectif_5,
          $Tec_Long_Rectif_6,
          $Tec_Long_Rectif_7,
          $Tec_Long_Def_1,
          $Tec_Long_Def_2,
          $Tec_Long_Def_3,
          $Tec_Long_Def_4,
          $Tec_Long_Def_5,
          $Tec_Long_Def_6,
          $Tec_Long_Def_7,
          $Punto_Referencia_1,
          $Punto_Referencia_2,
          $Punto_Referencia_3,
          $Punto_Referencia_4,
          $Punto_Referencia_5,
          $Punto_Referencia_6,
          $Punto_Referencia_7,
          $Num_Instrumento_1,
          $Num_Instrumento_2,
          $Num_Instrumento_3,
          $Num_Instrumento_4,
          $Num_Instrumento_5,
          $Num_Instrumento_6,
          $Num_Instrumento_7,
          $Num_Cono_1,
          $Num_Cono_2,
          $Num_Cono_3,
          $Num_Cono_4,
          $Num_Cono_5,
          $Num_Cono_6,
          $Num_Cono_7,
          $Observacion
    );

    $Formato_Historia_Clinica_Endodoncia->Alta();
}

//aprobar el guardado de la historia clinica

if(isset($_REQUEST['aprobar']))
{
    $Historia_Clinica = $_POST["historia_clinica"];
    $Aprobacion = $_POST["aprobacion"];

    $Formato_Historia_Clinica_Endodoncia = new Formato_Historia_Clinica_Endodoncia();
    
    $Formato_Historia_Clinica_Endodoncia->IdHistoriaClinicaEndodoncia = $Historia_Clinica;
    $Formato_Historia_Clinica_Endodoncia->Aprobado = $Aprobacion;
    
    $Formato_Historia_Clinica_Endodoncia->Aprobar();
}
?>