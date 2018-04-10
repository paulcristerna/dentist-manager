<?php class Formato_Historia_Clinica_Periodoncia extends AccesoBD
	{
        public $IdHistoriaClinicaPeriodoncia;
		public $IdParejaClinica;
        public $Paciente;
        public $Ocupacion;
        public $Calle;
        public $Numero;
        public $Colonia;
        public $Poblacion;
        public $Telefono;
        public $Diente1;
        public $Diente2;    
        public $Diente3;    
        public $Diente4;    
        public $Diente5;
        public $Diente6;
        public $Diente7;
        public $Diente8;    
        public $Diente9;
        public $Diente10;
        public $Diente11;
        public $Diente12;
        public $Diente13;
        public $Diente14;
        public $Diente15;
        public $Diente16;
        public $Diente17;
        public $Diente18;
        public $Diente19;
        public $Diente20;
        public $Diente21;
        public $Diente22;
        public $Diente23;
        public $Diente24;
        public $Diente25;
        public $Diente26;
        public $Diente27;
        public $Diente28;
        public $Diente29;
        public $Diente30;
        public $Diente31;
        public $Diente32;
        public $Diente33;
        public $Diente34;
        public $Diente35;
        public $Diente36;
        public $Diente37;
        public $Diente38;
        public $Diente39;
        public $Diente40;
        public $Diente41;
        public $Diente42;
        public $Diente43;
        public $Diente44;
        public $Diente45;
        public $Diente46;
        public $Diente47;
        public $Diente48;
        public $Diente49;
        public $Diente50;
        public $Diente51;
        public $Diente52;
        public $Diente53;
        public $Diente54;
        public $Diente55;
        public $Diente56;
        public $Diente57;
        public $Diente58;
        public $Diente59;
        public $Diente60;
        public $Diente61;
        public $Diente62;
        public $Diente63;
        public $Diente64;
        public $Informacion_Microbiana;
        public $Traumatismo_oclusal;
        public $Parafunciones;
        public $Morfologia_Funcion;
        public $Articulacion_Temporo_Mandibular;
        public $Peculiaridad;
		public $Cuant_Plac_Fecha_1;
        public $Cuant_Plac_A_18;
        public $Cuant_Plac_A_17;
        public $Cuant_Plac_A_16;
        public $Cuant_Plac_A_15;
        public $Cuant_Plac_A_14;
        public $Cuant_Plac_A_13;
        public $Cuant_Plac_A_12;
        public $Cuant_Plac_A_11;
        public $Cuant_Plac_A_21;
        public $Cuant_Plac_A_22;
        public $Cuant_Plac_A_23;
        public $Cuant_Plac_A_24;
        public $Cuant_Plac_A_25;
        public $Cuant_Plac_A_26;
        public $Cuant_Plac_A_27;
        public $Cuant_Plac_A_28;
        public $Cuant_Plac_Porcentaje_1;
        public $Cuant_Plac_Fecha_2;
        public $Cuant_Plac_B_18;
        public $Cuant_Plac_B_17;
        public $Cuant_Plac_B_16;
        public $Cuant_Plac_B_15;
        public $Cuant_Plac_B_14;
        public $Cuant_Plac_B_13;
        public $Cuant_Plac_B_12;
        public $Cuant_Plac_B_11;
        public $Cuant_Plac_B_21;
        public $Cuant_Plac_B_22;
        public $Cuant_Plac_B_23;
        public $Cuant_Plac_B_24;
        public $Cuant_Plac_B_25;
        public $Cuant_Plac_B_26;
        public $Cuant_Plac_B_27;
        public $Cuant_Plac_B_28;
        public $Cuant_Plac_Porcentaje_2;
        public $Cuant_Plac_Fecha_3;
        public $Cuant_Plac_C_18;
        public $Cuant_Plac_C_17;
        public $Cuant_Plac_C_16;
        public $Cuant_Plac_C_15;
        public $Cuant_Plac_C_14;
        public $Cuant_Plac_C_13;
        public $Cuant_Plac_C_12;
        public $Cuant_Plac_C_11;
        public $Cuant_Plac_C_21;
        public $Cuant_Plac_C_22;
        public $Cuant_Plac_C_23;
        public $Cuant_Plac_C_24;
        public $Cuant_Plac_C_25;
        public $Cuant_Plac_C_26;
        public $Cuant_Plac_C_27;
        public $Cuant_Plac_C_28;
        public $Cuant_Plac_Porcentaje_3;
        public $Cuant_Plac_Fecha_4;
        public $Cuant_Plac_A_48;
        public $Cuant_Plac_A_47;
        public $Cuant_Plac_A_46;
        public $Cuant_Plac_A_45;
        public $Cuant_Plac_A_44;
        public $Cuant_Plac_A_43;
        public $Cuant_Plac_A_42;
        public $Cuant_Plac_A_41;
        public $Cuant_Plac_A_31;
        public $Cuant_Plac_A_32;
        public $Cuant_Plac_A_33;
        public $Cuant_Plac_A_34;
        public $Cuant_Plac_A_35;
        public $Cuant_Plac_A_36;
        public $Cuant_Plac_A_37;
        public $Cuant_Plac_A_38;
        public $Cuant_Plac_Porcentaje_4;
        public $Cuant_Plac_Fecha_5;
        public $Cuant_Plac_B_48;
        public $Cuant_Plac_B_47;
        public $Cuant_Plac_B_46;
        public $Cuant_Plac_B_45;
        public $Cuant_Plac_B_44;
        public $Cuant_Plac_B_43;
        public $Cuant_Plac_B_42;
        public $Cuant_Plac_B_41;
        public $Cuant_Plac_B_31;
        public $Cuant_Plac_B_32;
        public $Cuant_Plac_B_33;
        public $Cuant_Plac_B_34;
        public $Cuant_Plac_B_35;
        public $Cuant_Plac_B_36;
        public $Cuant_Plac_B_37;
        public $Cuant_Plac_B_38;
        public $Cuant_Plac_Porcentaje_5;
        public $Cuant_Plac_Fecha_6;
        public $Cuant_Plac_C_48;
        public $Cuant_Plac_C_47;
        public $Cuant_Plac_C_46;
        public $Cuant_Plac_C_45;
        public $Cuant_Plac_C_44;
        public $Cuant_Plac_C_43;
        public $Cuant_Plac_C_42;
        public $Cuant_Plac_C_41;
        public $Cuant_Plac_C_31;
        public $Cuant_Plac_C_32;
        public $Cuant_Plac_C_33;
        public $Cuant_Plac_C_34;
        public $Cuant_Plac_C_35;
        public $Cuant_Plac_C_36;
        public $Cuant_Plac_C_37;
        public $Cuant_Plac_C_38;
        public $Cuant_Plac_Porcentaje_6;
        public $Gin_18;
        public $Gin_17;
        public $Gin_16;
        public $Gin_15;
        public $Gin_14;
        public $Gin_13;
        public $Gin_12;
        public $Gin_11;
        public $Gin_21;
        public $Gin_22;
        public $Gin_23;
        public $Gin_24;
        public $Gin_25;
        public $Gin_26;
        public $Gin_27;
        public $Gin_28;
        public $Gin_48;
        public $Gin_47;
        public $Gin_46;
        public $Gin_45;
        public $Gin_44;
        public $Gin_43;
        public $Gin_42;
        public $Gin_41;
        public $Gin_31;
        public $Gin_32;
        public $Gin_33;
        public $Gin_34;
        public $Gin_35;
        public $Gin_36;
        public $Gin_37;
        public $Gin_38;
        public $Leve_18;
        public $Leve_17;
        public $Leve_16;
        public $Leve_15;
        public $Leve_14;
        public $Leve_13;
        public $Leve_12;
        public $Leve_11;
        public $Leve_21;
        public $Leve_22;
        public $Leve_23;
        public $Leve_24;
        public $Leve_25;
        public $Leve_26;
        public $Leve_27;
        public $Leve_28;
        public $Leve_48;
        public $Leve_47;
        public $Leve_46;
        public $Leve_45;
        public $Leve_44;
        public $Leve_43;
        public $Leve_42;
        public $Leve_41;
        public $Leve_31;
        public $Leve_32;
        public $Leve_33;
        public $Leve_34;
        public $Leve_35;
        public $Leve_36;
        public $Leve_37;
        public $Leve_38;
        public $Moderna_18;
        public $Moderna_17;
        public $Moderna_16;
        public $Moderna_15;
        public $Moderna_14;
        public $Moderna_13;
        public $Moderna_12;
        public $Moderna_11;
        public $Moderna_21;
        public $Moderna_22;
        public $Moderna_23;
        public $Moderna_24;
        public $Moderna_25;
        public $Moderna_26;
        public $Moderna_27;
        public $Moderna_28;
        public $Moderna_48;
        public $Moderna_47;
        public $Moderna_46;
        public $Moderna_45;
        public $Moderna_44;
        public $Moderna_43;
        public $Moderna_42;
        public $Moderna_41;
        public $Moderna_31;
        public $Moderna_32;
        public $Moderna_33;
        public $Moderna_34;
        public $Moderna_35;
        public $Moderna_36;
        public $Moderna_37;
        public $Moderna_38;
        public $Grave_18;
        public $Grave_17;
        public $Grave_16;
        public $Grave_15;
        public $Grave_14;
        public $Grave_13;
        public $Grave_12;
        public $Grave_11;
        public $Grave_21;
        public $Grave_22;
        public $Grave_23;
        public $Grave_24;
        public $Grave_25;
        public $Grave_26;
        public $Grave_27;
        public $Grave_28;
        public $Grave_48;
        public $Grave_47;
        public $Grave_46;
        public $Grave_45;
        public $Grave_44;
        public $Grave_43;
        public $Grave_42;
        public $Grave_41;
        public $Grave_31;
        public $Grave_32;
        public $Grave_33;
        public $Grave_34;
        public $Grave_35;
        public $Grave_36;
        public $Grave_37;
        public $Grave_38;
        public $Diagnostico_General;
        public $Fecha_Basica_1;
        public $Fecha_Basica_2;
        public $Basica_18;
        public $Basica_17;
        public $Basica_16;
        public $Basica_15;
        public $Basica_14;
        public $Basica_13;
        public $Basica_12;
        public $Basica_11;
        public $Basica_21;
        public $Basica_22;
        public $Basica_23;
        public $Basica_24;
        public $Basica_25;
        public $Basica_26;
        public $Basica_27;
        public $Basica_28;
        public $Basica_48;
        public $Basica_47;
        public $Basica_46;
        public $Basica_45;
        public $Basica_44;
        public $Basica_43;
        public $Basica_42;
        public $Basica_41;
        public $Basica_31;
        public $Basica_32;
        public $Basica_33;
        public $Basica_34;
        public $Basica_35;
        public $Basica_36;
        public $Basica_37;
        public $Basica_38;
        public $Porcentaje_Basica_1;
        public $Porcentaje_Basica_2;
        public $Fecha_Final_1;
        public $Fecha_Final_2;
        public $Final_18;
        public $Final_17;
        public $Final_16;
        public $Final_15;
        public $Final_14;
        public $Final_13;
        public $Final_12;
        public $Final_11;
        public $Final_21;
        public $Final_22;
        public $Final_23;
        public $Final_24;
        public $Final_25;
        public $Final_26;
        public $Final_27;
        public $Final_28;
        public $Final_48;
        public $Final_47;
        public $Final_46;
        public $Final_45;
        public $Final_44;
        public $Final_43;
        public $Final_42;
        public $Final_41;
        public $Final_31;
        public $Final_32;
        public $Final_33;
        public $Final_34;
        public $Final_35;
        public $Final_36;
        public $Final_37;
        public $Final_38;
        public $Porcentaje_Final_1;
        public $Porcentaje_Final_2;
        public $Observaciones;
        public $Bolsa_M_18;
        public $Bolsa_F_18;
        public $Bolsa_H_18;
        public $Bolsa_V_18;
        public $Bolsa_P_18;
        public $Bolsa_D_18;
        public $Bolsa_M2_18;
        public $Bolsa_M_17;
        public $Bolsa_F_17;
        public $Bolsa_H_17;
        public $Bolsa_V_17;
        public $Bolsa_P_17;
        public $Bolsa_D_17;
        public $Bolsa_M2_17;
        public $Bolsa_M_16;
        public $Bolsa_F_16;
        public $Bolsa_H_16;
        public $Bolsa_V_16;
        public $Bolsa_P_16;
        public $Bolsa_D_16;
        public $Bolsa_M2_16;
        public $Bolsa_M_15;
        public $Bolsa_F_15;
        public $Bolsa_H_15;
        public $Bolsa_V_15;
        public $Bolsa_P_15;
        public $Bolsa_D_15;
        public $Bolsa_M2_15;
        public $Bolsa_M_14;
        public $Bolsa_F_14;
        public $Bolsa_H_14;
        public $Bolsa_V_14;
        public $Bolsa_P_14;
        public $Bolsa_D_14;
        public $Bolsa_M2_14;
        public $Bolsa_M_13;
        public $Bolsa_F_13;
        public $Bolsa_H_13;
        public $Bolsa_V_13;
        public $Bolsa_P_13;
        public $Bolsa_D_13;
        public $Bolsa_M2_13;
        public $Bolsa_M_12;
        public $Bolsa_F_12;
        public $Bolsa_H_12;
        public $Bolsa_V_12;
        public $Bolsa_P_12;
        public $Bolsa_D_12;
        public $Bolsa_M2_12;
        public $Bolsa_M_11;
        public $Bolsa_F_11;
        public $Bolsa_H_11;
        public $Bolsa_V_11;
        public $Bolsa_P_11;
        public $Bolsa_D_11;
        public $Bolsa_M2_11;
        public $Bolsa_M_21;
        public $Bolsa_F_21;
        public $Bolsa_H_21;
        public $Bolsa_V_21;
        public $Bolsa_P_21;
        public $Bolsa_D_21;
        public $Bolsa_M2_21;
        public $Bolsa_M_22;
        public $Bolsa_F_22;
        public $Bolsa_H_22;
        public $Bolsa_V_22;
        public $Bolsa_P_22;
        public $Bolsa_D_22;
        public $Bolsa_M2_22;
        public $Bolsa_M_23;
        public $Bolsa_F_23;
        public $Bolsa_H_23;
        public $Bolsa_V_23;
        public $Bolsa_P_23;
        public $Bolsa_D_23;
        public $Bolsa_M2_23;
        public $Bolsa_M_24;
        public $Bolsa_F_24;
        public $Bolsa_H_24;
        public $Bolsa_V_24;
        public $Bolsa_P_24;
        public $Bolsa_D_24;
        public $Bolsa_M2_24;
        public $Bolsa_M_25;
        public $Bolsa_F_25;
        public $Bolsa_H_25;
        public $Bolsa_V_25;
        public $Bolsa_P_25;
        public $Bolsa_D_25;
        public $Bolsa_M2_25;
        public $Bolsa_M_26;
        public $Bolsa_F_26;
        public $Bolsa_H_26;
        public $Bolsa_V_26;
        public $Bolsa_P_26;
        public $Bolsa_D_26;
        public $Bolsa_M2_26;
        public $Bolsa_M_27;
        public $Bolsa_F_27;
        public $Bolsa_H_27;
        public $Bolsa_V_27;
        public $Bolsa_P_27;
        public $Bolsa_D_27;
        public $Bolsa_M2_27;
        public $Bolsa_M_28;
        public $Bolsa_F_28;
        public $Bolsa_H_28;
        public $Bolsa_V_28;
        public $Bolsa_P_28;
        public $Bolsa_D_28;
        public $Bolsa_M2_28;
        public $Bolsa_M_41;
        public $Bolsa_F_41;
        public $Bolsa_H_41;
        public $Bolsa_V_41;
        public $Bolsa_P_41;
        public $Bolsa_D_41;
        public $Bolsa_M2_41;
        public $Bolsa_M_42;
        public $Bolsa_F_42;
        public $Bolsa_H_42;
        public $Bolsa_V_42;
        public $Bolsa_P_42;
        public $Bolsa_D_42;
        public $Bolsa_M2_42;
        public $Bolsa_M_43;
        public $Bolsa_F_43;
        public $Bolsa_H_43;
        public $Bolsa_V_43;
        public $Bolsa_P_43;
        public $Bolsa_D_43;
        public $Bolsa_M2_43;
        public $Bolsa_M_44;
        public $Bolsa_F_44;
        public $Bolsa_H_44;
        public $Bolsa_V_44;
        public $Bolsa_P_44;
        public $Bolsa_D_44;
        public $Bolsa_M2_44;
        public $Bolsa_M_45;
        public $Bolsa_F_45;
        public $Bolsa_H_45;
        public $Bolsa_V_45;
        public $Bolsa_P_45;
        public $Bolsa_D_45;
        public $Bolsa_M2_45;
        public $Bolsa_M_46;
        public $Bolsa_F_46;
        public $Bolsa_H_46;
        public $Bolsa_V_46;
        public $Bolsa_P_46;
        public $Bolsa_D_46;
        public $Bolsa_M2_46;
        public $Bolsa_M_47;
        public $Bolsa_F_47;
        public $Bolsa_H_47;
        public $Bolsa_V_47;
        public $Bolsa_P_47;
        public $Bolsa_D_47;
        public $Bolsa_M2_47;
        public $Bolsa_M_48;
        public $Bolsa_F_48;
        public $Bolsa_H_48;
        public $Bolsa_V_48;
        public $Bolsa_P_48;
        public $Bolsa_D_48;
        public $Bolsa_M2_48;
        public $Bolsa_M_31;
        public $Bolsa_F_31;
        public $Bolsa_H_31;
        public $Bolsa_V_31;
        public $Bolsa_P_31;
        public $Bolsa_D_31;
        public $Bolsa_M2_31;
        public $Bolsa_M_32;
        public $Bolsa_F_32;
        public $Bolsa_H_32;
        public $Bolsa_V_32;
        public $Bolsa_P_32;
        public $Bolsa_D_32;
        public $Bolsa_M2_32;
        public $Bolsa_M_33;
        public $Bolsa_F_33;
        public $Bolsa_H_33;
        public $Bolsa_V_33;
        public $Bolsa_P_33;
        public $Bolsa_D_33;
        public $Bolsa_M2_33;
        public $Bolsa_M_34;
        public $Bolsa_F_34;
        public $Bolsa_H_34;
        public $Bolsa_V_34;
        public $Bolsa_P_34;
        public $Bolsa_D_34;
        public $Bolsa_M2_34;
        public $Bolsa_M_35;
        public $Bolsa_F_35;
        public $Bolsa_H_35;
        public $Bolsa_V_35;
        public $Bolsa_P_35;
        public $Bolsa_D_35;
        public $Bolsa_M2_35;
        public $Bolsa_M_36;
        public $Bolsa_F_36;
        public $Bolsa_H_36;
        public $Bolsa_V_36;
        public $Bolsa_P_36;
        public $Bolsa_D_36;
        public $Bolsa_M2_36;
        public $Bolsa_M_37;
        public $Bolsa_F_37;
        public $Bolsa_H_37;
        public $Bolsa_V_37;
        public $Bolsa_P_37;
        public $Bolsa_D_37;
        public $Bolsa_M2_37;
        public $Bolsa_M_38;
        public $Bolsa_F_38;
        public $Bolsa_H_38;
        public $Bolsa_V_38;
        public $Bolsa_P_38;
        public $Bolsa_D_38;
        public $Bolsa_M2_38;
        public $Planificacion_Tratamiento;
        public $Revision_Meses;
        public $Fecha_Tratamiento_1;
        public $Tratamiento_1;
        public $Fecha_Tratamiento_2;
        public $Tratamiento_2;
        public $Fecha_Tratamiento_3;
        public $Tratamiento_3;
        public $Fecha_Tratamiento_4;
        public $Tratamiento_4;
        public $Fecha_Tratamiento_5;
        public $Tratamiento_5;
        public $Fecha_Tratamiento_6;
        public $Tratamiento_6;
        public $Fecha_Tratamiento_7;
        public $Tratamiento_7;
        public $Fecha_Tratamiento_8;
        public $Tratamiento_8;
        public $Fecha_Tratamiento_9;
        public $Tratamiento_9;
        public $Fecha_Tratamiento_10;
        public $Tratamiento_10;
        public $Folio_Recibos_TX;
        public $Numero_Recibos_Radiograficos;
        public $Tratamiento_11;
        public $Aprobado;
        public $Estatus;
        public $FechaRegistro;
        
        public function __construct
		(
			$varIdHistoriaClinicaPeriodoncia = null,
            $varIdParejaClinica = null,
            $varPaciente = null,
            $varOcupacion = null,
            $varCalle = null,
            $varNumero = null,
            $varColonia = null,
            $varPoblacion = null,
            $varTelefono = null,
            $varDiente1 = null,
            $varDiente2 = null,    
            $varDiente3 = null,    
            $varDiente4 = null,    
            $varDiente5 = null,
            $varDiente6 = null,
            $varDiente7 = null,
            $varDiente8 = null,    
            $varDiente9 = null,
            $varDiente10 = null,
            $varDiente11 = null,
            $varDiente12 = null,
            $varDiente13 = null,
            $varDiente14 = null,
            $varDiente15 = null,
            $varDiente16 = null,
            $varDiente17 = null,
            $varDiente18 = null,
            $varDiente19 = null,
            $varDiente20 = null,
            $varDiente21 = null,
            $varDiente22 = null,
            $varDiente23 = null,
            $varDiente24 = null,
            $varDiente25 = null,
            $varDiente26 = null,
            $varDiente27 = null,
            $varDiente28 = null,
            $varDiente29 = null,
            $varDiente30 = null,
            $varDiente31 = null,
            $varDiente32 = null,
            $varDiente33 = null,
            $varDiente34 = null,
            $varDiente35 = null,
            $varDiente36 = null,
            $varDiente37 = null,
            $varDiente38 = null,
            $varDiente39 = null,
            $varDiente40 = null,
            $varDiente41 = null,
            $varDiente42 = null,
            $varDiente43 = null,
            $varDiente44 = null,
            $varDiente45 = null,
            $varDiente46 = null,
            $varDiente47 = null,
            $varDiente48 = null,
            $varDiente49 = null,
            $varDiente50 = null,
            $varDiente51 = null,
            $varDiente52 = null,
            $varDiente53 = null,
            $varDiente54 = null,
            $varDiente55 = null,
            $varDiente56 = null,
            $varDiente57 = null,
            $varDiente58 = null,
            $varDiente59 = null,
            $varDiente60 = null,
            $varDiente61 = null,
            $varDiente62 = null,
            $varDiente63 = null,
            $varDiente64 = null,
            $varInformacion_Microbiana = null,
            $varTraumatismo_oclusal = null,
            $varParafunciones = null,
            $varMorfologia_Funcion = null,
            $varArticulacion_Temporo_Mandibular = null,
            $varPeculiaridad = null,
			$varCuant_Plac_Fecha_1 = null,
            $varCuant_Plac_A_18 = null,
            $varCuant_Plac_A_17 = null,
            $varCuant_Plac_A_16 = null,
            $varCuant_Plac_A_15 = null,
            $varCuant_Plac_A_14 = null,
            $varCuant_Plac_A_13 = null,
            $varCuant_Plac_A_12 = null,
            $varCuant_Plac_A_11 = null,
            $varCuant_Plac_A_21 = null,
            $varCuant_Plac_A_22 = null,
            $varCuant_Plac_A_23 = null,
            $varCuant_Plac_A_24 = null,
            $varCuant_Plac_A_25 = null,
            $varCuant_Plac_A_26 = null,
            $varCuant_Plac_A_27 = null,
            $varCuant_Plac_A_28 = null,
            $varCuant_Plac_Porcentaje_1 = null,
            $varCuant_Plac_Fecha_2 = null,
            $varCuant_Plac_B_18 = null,
            $varCuant_Plac_B_17 = null,
            $varCuant_Plac_B_16 = null,
            $varCuant_Plac_B_15 = null,
            $varCuant_Plac_B_14 = null,
            $varCuant_Plac_B_13 = null,
            $varCuant_Plac_B_12 = null,
            $varCuant_Plac_B_11 = null,
            $varCuant_Plac_B_21 = null,
            $varCuant_Plac_B_22 = null,
            $varCuant_Plac_B_23 = null,
            $varCuant_Plac_B_24 = null,
            $varCuant_Plac_B_25 = null,
            $varCuant_Plac_B_26 = null,
            $varCuant_Plac_B_27 = null,
            $varCuant_Plac_B_28 = null,
            $varCuant_Plac_Porcentaje_2 = null,
            $varCuant_Plac_Fecha_3 = null,
            $varCuant_Plac_C_18 = null,
            $varCuant_Plac_C_17 = null,
            $varCuant_Plac_C_16 = null,
            $varCuant_Plac_C_15 = null,
            $varCuant_Plac_C_14 = null,
            $varCuant_Plac_C_13 = null,
            $varCuant_Plac_C_12 = null,
            $varCuant_Plac_C_11 = null,
            $varCuant_Plac_C_21 = null,
            $varCuant_Plac_C_22 = null,
            $varCuant_Plac_C_23 = null,
            $varCuant_Plac_C_24 = null,
            $varCuant_Plac_C_25 = null,
            $varCuant_Plac_C_26 = null,
            $varCuant_Plac_C_27 = null,
            $varCuant_Plac_C_28 = null,
            $varCuant_Plac_Porcentaje_3 = null,
            $varCuant_Plac_Fecha_4 = null,
            $varCuant_Plac_A_48 = null,
            $varCuant_Plac_A_47 = null,
            $varCuant_Plac_A_46 = null,
            $varCuant_Plac_A_45 = null,
            $varCuant_Plac_A_44 = null,
            $varCuant_Plac_A_43 = null,
            $varCuant_Plac_A_42 = null,
            $varCuant_Plac_A_41 = null,
            $varCuant_Plac_A_31 = null,
            $varCuant_Plac_A_32 = null,
            $varCuant_Plac_A_33 = null,
            $varCuant_Plac_A_34 = null,
            $varCuant_Plac_A_35 = null,
            $varCuant_Plac_A_36 = null,
            $varCuant_Plac_A_37 = null,
            $varCuant_Plac_A_38 = null,
            $varCuant_Plac_Porcentaje_4 = null,
            $varCuant_Plac_Fecha_5 = null,
            $varCuant_Plac_B_48 = null,
            $varCuant_Plac_B_47 = null,
            $varCuant_Plac_B_46 = null,
            $varCuant_Plac_B_45 = null,
            $varCuant_Plac_B_44 = null,
            $varCuant_Plac_B_43 = null,
            $varCuant_Plac_B_42 = null,
            $varCuant_Plac_B_41 = null,
            $varCuant_Plac_B_31 = null,
            $varCuant_Plac_B_32 = null,
            $varCuant_Plac_B_33 = null,
            $varCuant_Plac_B_34 = null,
            $varCuant_Plac_B_35 = null,
            $varCuant_Plac_B_36 = null,
            $varCuant_Plac_B_37 = null,
            $varCuant_Plac_B_38 = null,
            $varCuant_Plac_Porcentaje_5 = null,
            $varCuant_Plac_Fecha_6 = null,
            $varCuant_Plac_C_48 = null,
            $varCuant_Plac_C_47 = null,
            $varCuant_Plac_C_46 = null,
            $varCuant_Plac_C_45 = null,
            $varCuant_Plac_C_44 = null,
            $varCuant_Plac_C_43 = null,
            $varCuant_Plac_C_42 = null,
            $varCuant_Plac_C_41 = null,
            $varCuant_Plac_C_31 = null,
            $varCuant_Plac_C_32 = null,
            $varCuant_Plac_C_33 = null,
            $varCuant_Plac_C_34 = null,
            $varCuant_Plac_C_35 = null,
            $varCuant_Plac_C_36 = null,
            $varCuant_Plac_C_37 = null,
            $varCuant_Plac_C_38 = null,
            $varCuant_Plac_Porcentaje_6 = null,
            $varGin_18 = null,
            $varGin_17 = null,
            $varGin_16 = null,
            $varGin_15 = null,
            $varGin_14 = null,
            $varGin_13 = null,
            $varGin_12 = null,
            $varGin_11 = null,
            $varGin_21 = null,
            $varGin_22 = null,
            $varGin_23 = null,
            $varGin_24 = null,
            $varGin_25 = null,
            $varGin_26 = null,
            $varGin_27 = null,
            $varGin_28 = null,
            $varGin_48 = null,
            $varGin_47 = null,
            $varGin_46 = null,
            $varGin_45 = null,
            $varGin_44 = null,
            $varGin_43 = null,
            $varGin_42 = null,
            $varGin_41 = null,
            $varGin_31 = null,
            $varGin_32 = null,
            $varGin_33 = null,
            $varGin_34 = null,
            $varGin_35 = null,
            $varGin_36 = null,
            $varGin_37 = null,
            $varGin_38 = null,
            $varLeve_18 = null,
            $varLeve_17 = null,
            $varLeve_16 = null,
            $varLeve_15 = null,
            $varLeve_14 = null,
            $varLeve_13 = null,
            $varLeve_12 = null,
            $varLeve_11 = null,
            $varLeve_21 = null,
            $varLeve_22 = null,
            $varLeve_23 = null,
            $varLeve_24 = null,
            $varLeve_25 = null,
            $varLeve_26 = null,
            $varLeve_27 = null,
            $varLeve_28 = null,
            $varLeve_48 = null,
            $varLeve_47 = null,
            $varLeve_46 = null,
            $varLeve_45 = null,
            $varLeve_44 = null,
            $varLeve_43 = null,
            $varLeve_42 = null,
            $varLeve_41 = null,
            $varLeve_31 = null,
            $varLeve_32 = null,
            $varLeve_33 = null,
            $varLeve_34 = null,
            $varLeve_35 = null,
            $varLeve_36 = null,
            $varLeve_37 = null,
            $varLeve_38 = null,
            $varModerna_18 = null,
            $varModerna_17 = null,
            $varModerna_16 = null,
            $varModerna_15 = null,
            $varModerna_14 = null,
            $varModerna_13 = null,
            $varModerna_12 = null,
            $varModerna_11 = null,
            $varModerna_21 = null,
            $varModerna_22 = null,
            $varModerna_23 = null,
            $varModerna_24 = null,
            $varModerna_25 = null,
            $varModerna_26 = null,
            $varModerna_27 = null,
            $varModerna_28 = null,
            $varModerna_48 = null,
            $varModerna_47 = null,
            $varModerna_46 = null,
            $varModerna_45 = null,
            $varModerna_44 = null,
            $varModerna_43 = null,
            $varModerna_42 = null,
            $varModerna_41 = null,
            $varModerna_31 = null,
            $varModerna_32 = null,
            $varModerna_33 = null,
            $varModerna_34 = null,
            $varModerna_35 = null,
            $varModerna_36 = null,
            $varModerna_37 = null,
            $varModerna_38 = null,
            $varGrave_18 = null,
            $varGrave_17 = null,
            $varGrave_16 = null,
            $varGrave_15 = null,
            $varGrave_14 = null,
            $varGrave_13 = null,
            $varGrave_12 = null,
            $varGrave_11 = null,
            $varGrave_21 = null,
            $varGrave_22 = null,
            $varGrave_23 = null,
            $varGrave_24 = null,
            $varGrave_25 = null,
            $varGrave_26 = null,
            $varGrave_27 = null,
            $varGrave_28 = null,
            $varGrave_48 = null,
            $varGrave_47 = null,
            $varGrave_46 = null,
            $varGrave_45 = null,
            $varGrave_44 = null,
            $varGrave_43 = null,
            $varGrave_42 = null,
            $varGrave_41 = null,
            $varGrave_31 = null,
            $varGrave_32 = null,
            $varGrave_33 = null,
            $varGrave_34 = null,
            $varGrave_35 = null,
            $varGrave_36 = null,
            $varGrave_37 = null,
            $varGrave_38 = null,
            $varDiagnostico_General = null,
            $varFecha_Basica_1 = null,
            $varFecha_Basica_2 = null,
            $varBasica_18 = null,
            $varBasica_17 = null,
            $varBasica_16 = null,
            $varBasica_15 = null,
            $varBasica_14 = null,
            $varBasica_13 = null,
            $varBasica_12 = null,
            $varBasica_11 = null,
            $varBasica_21 = null,
            $varBasica_22 = null,
            $varBasica_23 = null,
            $varBasica_24 = null,
            $varBasica_25 = null,
            $varBasica_26 = null,
            $varBasica_27 = null,
            $varBasica_28 = null,
            $varBasica_48 = null,
            $varBasica_47 = null,
            $varBasica_46 = null,
            $varBasica_45 = null,
            $varBasica_44 = null,
            $varBasica_43 = null,
            $varBasica_42 = null,
            $varBasica_41 = null,
            $varBasica_31 = null,
            $varBasica_32 = null,
            $varBasica_33 = null,
            $varBasica_34 = null,
            $varBasica_35 = null,
            $varBasica_36 = null,
            $varBasica_37 = null,
            $varBasica_38 = null,
            $varPorcentaje_Basica_1 = null,
            $varPorcentaje_Basica_2 = null,
            $varFecha_Final_1 = null,
            $varFecha_Final_2 = null,
            $varFinal_18 = null,
            $varFinal_17 = null,
            $varFinal_16 = null,
            $varFinal_15 = null,
            $varFinal_14 = null,
            $varFinal_13 = null,
            $varFinal_12 = null,
            $varFinal_11 = null,
            $varFinal_21 = null,
            $varFinal_22 = null,
            $varFinal_23 = null,
            $varFinal_24 = null,
            $varFinal_25 = null,
            $varFinal_26 = null,
            $varFinal_27 = null,
            $varFinal_28 = null,
            $varFinal_48 = null,
            $varFinal_47 = null,
            $varFinal_46 = null,
            $varFinal_45 = null,
            $varFinal_44 = null,
            $varFinal_43 = null,
            $varFinal_42 = null,
            $varFinal_41 = null,
            $varFinal_31 = null,
            $varFinal_32 = null,
            $varFinal_33 = null,
            $varFinal_34 = null,
            $varFinal_35 = null,
            $varFinal_36 = null,
            $varFinal_37 = null,
            $varFinal_38 = null,
            $varPorcentaje_Final_1 = null,
            $varPorcentaje_Final_2 = null,
            $varObservaciones = null,
            $varBolsa_M_18 = null,
            $varBolsa_F_18 = null,
            $varBolsa_H_18 = null,
            $varBolsa_V_18 = null,
            $varBolsa_P_18 = null,
            $varBolsa_D_18 = null,
            $varBolsa_M2_18 = null,
            $varBolsa_M_17 = null,
            $varBolsa_F_17 = null,
            $varBolsa_H_17 = null,
            $varBolsa_V_17 = null,
            $varBolsa_P_17 = null,
            $varBolsa_D_17 = null,
            $varBolsa_M2_17 = null,
            $varBolsa_M_16 = null,
            $varBolsa_F_16 = null,
            $varBolsa_H_16 = null,
            $varBolsa_V_16 = null,
            $varBolsa_P_16 = null,
            $varBolsa_D_16 = null,
            $varBolsa_M2_16 = null,
            $varBolsa_M_15 = null,
            $varBolsa_F_15 = null,
            $varBolsa_H_15 = null,
            $varBolsa_V_15 = null,
            $varBolsa_P_15 = null,
            $varBolsa_D_15 = null,
            $varBolsa_M2_15 = null,
            $varBolsa_M_14 = null,
            $varBolsa_F_14 = null,
            $varBolsa_H_14 = null,
            $varBolsa_V_14 = null,
            $varBolsa_P_14 = null,
            $varBolsa_D_14 = null,
            $varBolsa_M2_14 = null,
            $varBolsa_M_13 = null,
            $varBolsa_F_13 = null,
            $varBolsa_H_13 = null,
            $varBolsa_V_13 = null,
            $varBolsa_P_13 = null,
            $varBolsa_D_13 = null,
            $varBolsa_M2_13 = null,
            $varBolsa_M_12 = null,
            $varBolsa_F_12 = null,
            $varBolsa_H_12 = null,
            $varBolsa_V_12 = null,
            $varBolsa_P_12 = null,
            $varBolsa_D_12 = null,
            $varBolsa_M2_12 = null,
            $varBolsa_M_11 = null,
            $varBolsa_F_11 = null,
            $varBolsa_H_11 = null,
            $varBolsa_V_11 = null,
            $varBolsa_P_11 = null,
            $varBolsa_D_11 = null,
            $varBolsa_M2_11 = null,
            $varBolsa_M_21 = null,
            $varBolsa_F_21 = null,
            $varBolsa_H_21 = null,
            $varBolsa_V_21 = null,
            $varBolsa_P_21 = null,
            $varBolsa_D_21 = null,
            $varBolsa_M2_21 = null,
            $varBolsa_M_22 = null,
            $varBolsa_F_22 = null,
            $varBolsa_H_22 = null,
            $varBolsa_V_22 = null,
            $varBolsa_P_22 = null,
            $varBolsa_D_22 = null,
            $varBolsa_M2_22 = null,
            $varBolsa_M_23 = null,
            $varBolsa_F_23 = null,
            $varBolsa_H_23 = null,
            $varBolsa_V_23 = null,
            $varBolsa_P_23 = null,
            $varBolsa_D_23 = null,
            $varBolsa_M2_23 = null,
            $varBolsa_M_24 = null,
            $varBolsa_F_24 = null,
            $varBolsa_H_24 = null,
            $varBolsa_V_24 = null,
            $varBolsa_P_24 = null,
            $varBolsa_D_24 = null,
            $varBolsa_M2_24 = null,
            $varBolsa_M_25 = null,
            $varBolsa_F_25 = null,
            $varBolsa_H_25 = null,
            $varBolsa_V_25 = null,
            $varBolsa_P_25 = null,
            $varBolsa_D_25 = null,
            $varBolsa_M2_25 = null,
            $varBolsa_M_26 = null,
            $varBolsa_F_26 = null,
            $varBolsa_H_26 = null,
            $varBolsa_V_26 = null,
            $varBolsa_P_26 = null,
            $varBolsa_D_26 = null,
            $varBolsa_M2_26 = null,
            $varBolsa_M_27 = null,
            $varBolsa_F_27 = null,
            $varBolsa_H_27 = null,
            $varBolsa_V_27 = null,
            $varBolsa_P_27 = null,
            $varBolsa_D_27 = null,
            $varBolsa_M2_27 = null,
            $varBolsa_M_28 = null,
            $varBolsa_F_28 = null,
            $varBolsa_H_28 = null,
            $varBolsa_V_28 = null,
            $varBolsa_P_28 = null,
            $varBolsa_D_28 = null,
            $varBolsa_M2_28 = null,
            $varBolsa_M_41 = null,
            $varBolsa_F_41 = null,
            $varBolsa_H_41 = null,
            $varBolsa_V_41 = null,
            $varBolsa_P_41 = null,
            $varBolsa_D_41 = null,
            $varBolsa_M2_41 = null,
            $varBolsa_M_42 = null,
            $varBolsa_F_42 = null,
            $varBolsa_H_42 = null,
            $varBolsa_V_42 = null,
            $varBolsa_P_42 = null,
            $varBolsa_D_42 = null,
            $varBolsa_M2_42 = null,
            $varBolsa_M_43 = null,
            $varBolsa_F_43 = null,
            $varBolsa_H_43 = null,
            $varBolsa_V_43 = null,
            $varBolsa_P_43 = null,
            $varBolsa_D_43 = null,
            $varBolsa_M2_43 = null,
            $varBolsa_M_44 = null,
            $varBolsa_F_44 = null,
            $varBolsa_H_44 = null,
            $varBolsa_V_44 = null,
            $varBolsa_P_44 = null,
            $varBolsa_D_44 = null,
            $varBolsa_M2_44 = null,
            $varBolsa_M_45 = null,
            $varBolsa_F_45 = null,
            $varBolsa_H_45 = null,
            $varBolsa_V_45 = null,
            $varBolsa_P_45 = null,
            $varBolsa_D_45 = null,
            $varBolsa_M2_45 = null,
            $varBolsa_M_46 = null,
            $varBolsa_F_46 = null,
            $varBolsa_H_46 = null,
            $varBolsa_V_46 = null,
            $varBolsa_P_46 = null,
            $varBolsa_D_46 = null,
            $varBolsa_M2_46 = null,
            $varBolsa_M_47 = null,
            $varBolsa_F_47 = null,
            $varBolsa_H_47 = null,
            $varBolsa_V_47 = null,
            $varBolsa_P_47 = null,
            $varBolsa_D_47 = null,
            $varBolsa_M2_47 = null,
            $varBolsa_M_48 = null,
            $varBolsa_F_48 = null,
            $varBolsa_H_48 = null,
            $varBolsa_V_48 = null,
            $varBolsa_P_48 = null,
            $varBolsa_D_48 = null,
            $varBolsa_M2_48 = null,
            $varBolsa_M_31 = null,
            $varBolsa_F_31 = null,
            $varBolsa_H_31 = null,
            $varBolsa_V_31 = null,
            $varBolsa_P_31 = null,
            $varBolsa_D_31 = null,
            $varBolsa_M2_31 = null,
            $varBolsa_M_32 = null,
            $varBolsa_F_32 = null,
            $varBolsa_H_32 = null,
            $varBolsa_V_32 = null,
            $varBolsa_P_32 = null,
            $varBolsa_D_32 = null,
            $varBolsa_M2_32 = null,
            $varBolsa_M_33 = null,
            $varBolsa_F_33 = null,
            $varBolsa_H_33 = null,
            $varBolsa_V_33 = null,
            $varBolsa_P_33 = null,
            $varBolsa_D_33 = null,
            $varBolsa_M2_33 = null,
            $varBolsa_M_34 = null,
            $varBolsa_F_34 = null,
            $varBolsa_H_34 = null,
            $varBolsa_V_34 = null,
            $varBolsa_P_34 = null,
            $varBolsa_D_34 = null,
            $varBolsa_M2_34 = null,
            $varBolsa_M_35 = null,
            $varBolsa_F_35 = null,
            $varBolsa_H_35 = null,
            $varBolsa_V_35 = null,
            $varBolsa_P_35 = null,
            $varBolsa_D_35 = null,
            $varBolsa_M2_35 = null,
            $varBolsa_M_36 = null,
            $varBolsa_F_36 = null,
            $varBolsa_H_36 = null,
            $varBolsa_V_36 = null,
            $varBolsa_P_36 = null,
            $varBolsa_D_36 = null,
            $varBolsa_M2_36 = null,
            $varBolsa_M_37 = null,
            $varBolsa_F_37 = null,
            $varBolsa_H_37 = null,
            $varBolsa_V_37 = null,
            $varBolsa_P_37 = null,
            $varBolsa_D_37 = null,
            $varBolsa_M2_37 = null,
            $varBolsa_M_38 = null,
            $varBolsa_F_38 = null,
            $varBolsa_H_38 = null,
            $varBolsa_V_38 = null,
            $varBolsa_P_38 = null,
            $varBolsa_D_38 = null,
            $varBolsa_M2_38 = null,
            $varPlanificacion_Tratamiento = null,
            $varRevision_Meses = null,
            $varFecha_Tratamiento_1 = null,
            $varTratamiento_1 = null,
            $varFecha_Tratamiento_2 = null,
            $varTratamiento_2 = null,
            $varFecha_Tratamiento_3 = null,
            $varTratamiento_3 = null,
            $varFecha_Tratamiento_4 = null,
            $varTratamiento_4 = null,
            $varFecha_Tratamiento_5 = null,
            $varTratamiento_5 = null,
            $varFecha_Tratamiento_6 = null,
            $varTratamiento_6 = null,
            $varFecha_Tratamiento_7 = null,
            $varTratamiento_7 = null,
            $varFecha_Tratamiento_8 = null,
            $varTratamiento_8 = null,
            $varFecha_Tratamiento_9 = null,
            $varTratamiento_9 = null,
            $varFecha_Tratamiento_10 = null,
            $varTratamiento_10 = null,
            $varFolio_Recibos_TX = null,
            $varNumero_Recibos_Radiograficos = null,
            $varTratamiento_11 = null,
            $varAprobado = null,
            $varEstatus = null,
            $varFechaRegistro = null
		)
		{
			$this->IdHistoriaClinicaPeriodoncia = $varIdHistoriaClinicaPeriodoncia;
			$this->IdParejaClinica = $varIdParejaClinica;
			$this->Paciente = $varPaciente;
            $this->Ocupacion = $varOcupacion;
            $this->Calle = $varCalle;
            $this->Numero = $varNumero;
            $this->Colonia = $varColonia;
            $this->Poblacion = $varPoblacion;
            $this->Telefono = $varTelefono;
            $this->Diente1 = $varDiente1;
            $this->Diente2 = $varDiente2;    
            $this->Diente3 = $varDiente3;    
            $this->Diente4 = $varDiente4;    
            $this->Diente5 = $varDiente5;
            $this->Diente6 = $varDiente6;
            $this->Diente7 = $varDiente7;
            $this->Diente8 = $varDiente8;    
            $this->Diente9 = $varDiente9;
            $this->Diente10 = $varDiente10;
            $this->Diente11 = $varDiente11;
            $this->Diente12 = $varDiente12;
            $this->Diente13 = $varDiente13;
            $this->Diente14 = $varDiente14;
            $this->Diente15 = $varDiente15;
            $this->Diente16 = $varDiente16;
            $this->Diente17 = $varDiente17;
            $this->Diente18 = $varDiente18;
            $this->Diente19 = $varDiente19;
            $this->Diente20 = $varDiente21;
            $this->Diente21 = $varDiente21;
            $this->Diente22 = $varDiente22;
            $this->Diente23 = $varDiente23;
            $this->Diente24 = $varDiente24;
            $this->Diente25 = $varDiente25;
            $this->Diente26 = $varDiente26;
            $this->Diente27 = $varDiente27;
            $this->Diente28 = $varDiente28;
            $this->Diente29 = $varDiente29;
            $this->Diente30 = $varDiente30;
            $this->Diente31 = $varDiente31;
            $this->Diente32 = $varDiente32;
            $this->Diente33 = $varDiente33;
            $this->Diente34 = $varDiente34;
            $this->Diente35 = $varDiente35;
            $this->Diente36 = $varDiente36;
            $this->Diente37 = $varDiente37;
            $this->Diente38 = $varDiente38;
            $this->Diente39 = $varDiente39;
            $this->Diente40 = $varDiente40;
            $this->Diente41 = $varDiente41;
            $this->Diente42 = $varDiente42;
            $this->Diente43 = $varDiente43;
            $this->Diente44 = $varDiente44;
            $this->Diente45 = $varDiente45;
            $this->Diente46 = $varDiente46;
            $this->Diente47 = $varDiente47;
            $this->Diente48 = $varDiente48;
            $this->Diente49 = $varDiente49;
            $this->Diente50 = $varDiente50;
            $this->Diente51 = $varDiente51;
            $this->Diente52 = $varDiente52;
            $this->Diente53 = $varDiente53;
            $this->Diente54 = $varDiente54;
            $this->Diente55 = $varDiente55;
            $this->Diente56 = $varDiente56;
            $this->Diente57 = $varDiente57;
            $this->Diente58 = $varDiente58;
            $this->Diente59 = $varDiente59;
            $this->Diente60 = $varDiente60;
            $this->Diente61 = $varDiente61;
            $this->Diente62 = $varDiente62;
            $this->Diente63 = $varDiente63;
            $this->Diente64 = $varDiente64;
            $this->Informacion_Microbiana = $varInformacion_Microbiana;
            $this->Traumatismo_oclusal = $varTraumatismo_oclusal;
            $this->Parafunciones = $varParafunciones;
            $this->Morfologia_Funcion = $varMorfologia_Funcion;
            $this->Articulacion_Temporo_Mandibular = $varArticulacion_Temporo_Mandibular;
            $this->Peculiaridad = $varPeculiaridad;
			$this->Cuant_Plac_Fecha_1 = $varCuant_Plac_Fecha_1;
            $this->Cuant_Plac_A_18 = $varCuant_Plac_A_18;
            $this->Cuant_Plac_A_17 = $varCuant_Plac_A_17;
            $this->Cuant_Plac_A_16 = $varCuant_Plac_A_16;
            $this->Cuant_Plac_A_15 = $varCuant_Plac_A_15;
            $this->Cuant_Plac_A_14 = $varCuant_Plac_A_14;
            $this->Cuant_Plac_A_13 = $varCuant_Plac_A_13;
            $this->Cuant_Plac_A_12 = $varCuant_Plac_A_12;
            $this->Cuant_Plac_A_11 = $varCuant_Plac_A_11;
            $this->Cuant_Plac_A_21 = $varCuant_Plac_A_21;
            $this->Cuant_Plac_A_22 = $varCuant_Plac_A_22;
            $this->Cuant_Plac_A_23 = $varCuant_Plac_A_23;
            $this->Cuant_Plac_A_24 = $varCuant_Plac_A_24;
            $this->Cuant_Plac_A_25 = $varCuant_Plac_A_25;
            $this->Cuant_Plac_A_26 = $varCuant_Plac_A_26;
            $this->Cuant_Plac_A_27 = $varCuant_Plac_A_27;
            $this->Cuant_Plac_A_28 = $varCuant_Plac_A_28;
            $this->Cuant_Plac_Porcentaje_1 = $varCuant_Plac_Porcentaje_1;
            $this->Cuant_Plac_Fecha_2 = $varCuant_Plac_Fecha_2;
            $this->Cuant_Plac_B_18 = $varCuant_Plac_B_18;
            $this->Cuant_Plac_B_17 = $varCuant_Plac_B_17;
            $this->Cuant_Plac_B_16 = $varCuant_Plac_B_16;
            $this->Cuant_Plac_B_15 = $varCuant_Plac_B_15;
            $this->Cuant_Plac_B_14 = $varCuant_Plac_B_14;
            $this->Cuant_Plac_B_13 = $varCuant_Plac_B_13;
            $this->Cuant_Plac_B_12 = $varCuant_Plac_B_12;
            $this->Cuant_Plac_B_11 = $varCuant_Plac_B_11;
            $this->Cuant_Plac_B_21 = $varCuant_Plac_B_21;
            $this->Cuant_Plac_B_22 = $varCuant_Plac_B_22;
            $this->Cuant_Plac_B_23 = $varCuant_Plac_B_23;
            $this->Cuant_Plac_B_24 = $varCuant_Plac_B_24;
            $this->Cuant_Plac_B_25 = $varCuant_Plac_B_25;
            $this->Cuant_Plac_B_26 = $varCuant_Plac_B_26;
            $this->Cuant_Plac_B_27 = $varCuant_Plac_B_27;
            $this->Cuant_Plac_B_28 = $varCuant_Plac_B_28;
            $this->Cuant_Plac_Porcentaje_2 = $varCuant_Plac_Porcentaje_2;
            $this->Cuant_Plac_Fecha_3 = $varCuant_Plac_Fecha_3;
            $this->Cuant_Plac_C_18 = $varCuant_Plac_C_18;
            $this->Cuant_Plac_C_17 = $varCuant_Plac_C_17;
            $this->Cuant_Plac_C_16 = $varCuant_Plac_C_16;
            $this->Cuant_Plac_C_15 = $varCuant_Plac_C_15;
            $this->Cuant_Plac_C_14 = $varCuant_Plac_C_14;
            $this->Cuant_Plac_C_13 = $varCuant_Plac_C_13;
            $this->Cuant_Plac_C_12 = $varCuant_Plac_C_12;
            $this->Cuant_Plac_C_11 = $varCuant_Plac_C_11;
            $this->Cuant_Plac_C_21 = $varCuant_Plac_C_21;
            $this->Cuant_Plac_C_22 = $varCuant_Plac_C_22;
            $this->Cuant_Plac_C_23 = $varCuant_Plac_C_23;
            $this->Cuant_Plac_C_24 = $varCuant_Plac_C_24;
            $this->Cuant_Plac_C_25 = $varCuant_Plac_C_25;
            $this->Cuant_Plac_C_26 = $varCuant_Plac_C_26;
            $this->Cuant_Plac_C_27 = $varCuant_Plac_C_27;
            $this->Cuant_Plac_C_28 = $varCuant_Plac_C_28;
            $this->Cuant_Plac_Porcentaje_3 = $varCuant_Plac_Porcentaje_3;
            $this->Cuant_Plac_Fecha_4 = $varCuant_Plac_Fecha_4;
            $this->Cuant_Plac_A_48 = $varCuant_Plac_A_48;
            $this->Cuant_Plac_A_47 = $varCuant_Plac_A_47;
            $this->Cuant_Plac_A_46 = $varCuant_Plac_A_46;
            $this->Cuant_Plac_A_45 = $varCuant_Plac_A_45;
            $this->Cuant_Plac_A_44 = $varCuant_Plac_A_44;
            $this->Cuant_Plac_A_43 = $varCuant_Plac_A_43;
            $this->Cuant_Plac_A_42 = $varCuant_Plac_A_42;
            $this->Cuant_Plac_A_41 = $varCuant_Plac_A_41;
            $this->Cuant_Plac_A_31 = $varCuant_Plac_A_31;
            $this->Cuant_Plac_A_32 = $varCuant_Plac_A_32;
            $this->Cuant_Plac_A_33 = $varCuant_Plac_A_33;
            $this->Cuant_Plac_A_34 = $varCuant_Plac_A_34;
            $this->Cuant_Plac_A_35 = $varCuant_Plac_A_35;
            $this->Cuant_Plac_A_36 = $varCuant_Plac_A_36;
            $this->Cuant_Plac_A_37 = $varCuant_Plac_A_37;
            $this->Cuant_Plac_A_38 = $varCuant_Plac_A_38;
            $this->Cuant_Plac_Porcentaje_4 = $varCuant_Plac_Porcentaje_4;
            $this->Cuant_Plac_Fecha_5 = $varCuant_Plac_Fecha_5;
            $this->Cuant_Plac_B_48 = $varCuant_Plac_B_48;
            $this->Cuant_Plac_B_47 = $varCuant_Plac_B_47;
            $this->Cuant_Plac_B_46 = $varCuant_Plac_B_46;
            $this->Cuant_Plac_B_45 = $varCuant_Plac_B_45;
            $this->Cuant_Plac_B_44 = $varCuant_Plac_B_44;
            $this->Cuant_Plac_B_43 = $varCuant_Plac_B_43;
            $this->Cuant_Plac_B_42 = $varCuant_Plac_B_42;
            $this->Cuant_Plac_B_41 = $varCuant_Plac_B_41;
            $this->Cuant_Plac_B_31 = $varCuant_Plac_B_31;
            $this->Cuant_Plac_B_32 = $varCuant_Plac_B_32;
            $this->Cuant_Plac_B_33 = $varCuant_Plac_B_33;
            $this->Cuant_Plac_B_34 = $varCuant_Plac_B_34;
            $this->Cuant_Plac_B_35 = $varCuant_Plac_B_35;
            $this->Cuant_Plac_B_36 = $varCuant_Plac_B_36;
            $this->Cuant_Plac_B_37 = $varCuant_Plac_B_37;
            $this->Cuant_Plac_B_38 = $varCuant_Plac_B_38;
            $this->Cuant_Plac_Porcentaje_5 = $varCuant_Plac_Porcentaje_5;
            $this->Cuant_Plac_Fecha_6 = $varCuant_Plac_Fecha_6;
            $this->Cuant_Plac_C_48 = $varCuant_Plac_C_48;
            $this->Cuant_Plac_C_47 = $varCuant_Plac_C_47;
            $this->Cuant_Plac_C_46 = $varCuant_Plac_C_46;
            $this->Cuant_Plac_C_45 = $varCuant_Plac_C_45;
            $this->Cuant_Plac_C_44 = $varCuant_Plac_C_44;
            $this->Cuant_Plac_C_43 = $varCuant_Plac_C_43;
            $this->Cuant_Plac_C_42 = $varCuant_Plac_C_42;
            $this->Cuant_Plac_C_41 = $varCuant_Plac_C_41;
            $this->Cuant_Plac_C_31 = $varCuant_Plac_C_31;
            $this->Cuant_Plac_C_32 = $varCuant_Plac_C_32;
            $this->Cuant_Plac_C_33 = $varCuant_Plac_C_33;
            $this->Cuant_Plac_C_34 = $varCuant_Plac_C_34;
            $this->Cuant_Plac_C_35 = $varCuant_Plac_C_35;
            $this->Cuant_Plac_C_36 = $varCuant_Plac_C_36;
            $this->Cuant_Plac_C_37 = $varCuant_Plac_C_37;
            $this->Cuant_Plac_C_38 = $varCuant_Plac_C_38;
            $this->Cuant_Plac_Porcentaje_6 = $varCuant_Plac_Porcentaje_6;
            $this->Gin_18 = $varGin_18;
            $this->Gin_17 = $varGin_17;
            $this->Gin_16 = $varGin_16;
            $this->Gin_15 = $varGin_15;
            $this->Gin_14 = $varGin_14;
            $this->Gin_13 = $varGin_13;
            $this->Gin_12 = $varGin_12;
            $this->Gin_11 = $varGin_11;
            $this->Gin_21 = $varGin_21;
            $this->Gin_22 = $varGin_22;
            $this->Gin_23 = $varGin_23;
            $this->Gin_24 = $varGin_24;
            $this->Gin_25 = $varGin_25;
            $this->Gin_26 = $varGin_26;
            $this->Gin_27 = $varGin_27;
            $this->Gin_28 = $varGin_28;
            $this->Gin_48 = $varGin_48;
            $this->Gin_47 = $varGin_47;
            $this->Gin_46 = $varGin_46;
            $this->Gin_45 = $varGin_45;
            $this->Gin_44 = $varGin_44;
            $this->Gin_43 = $varGin_43;
            $this->Gin_42 = $varGin_42;
            $this->Gin_41 = $varGin_41;
            $this->Gin_31 = $varGin_31;
            $this->Gin_32 = $varGin_32;
            $this->Gin_33 = $varGin_33;
            $this->Gin_34 = $varGin_34;
            $this->Gin_35 = $varGin_35;
            $this->Gin_36 = $varGin_36;
            $this->Gin_37 = $varGin_37;
            $this->Gin_38 = $varGin_38;
            $this->Leve_18 = $varLeve_18;
            $this->Leve_17 = $varLeve_17;
            $this->Leve_16 = $varLeve_16;
            $this->Leve_15 = $varLeve_15;
            $this->Leve_14 = $varLeve_14;
            $this->Leve_13 = $varLeve_13;
            $this->Leve_12 = $varLeve_12;
            $this->Leve_11 = $varLeve_11;
            $this->Leve_21 = $varLeve_21;
            $this->Leve_22 = $varLeve_22;
            $this->Leve_23 = $varLeve_23;
            $this->Leve_24 = $varLeve_24;
            $this->Leve_25 = $varLeve_25;
            $this->Leve_26 = $varLeve_26;
            $this->Leve_27 = $varLeve_27;
            $this->Leve_28 = $varLeve_28;
            $this->Leve_48 = $varLeve_48;
            $this->Leve_47 = $varLeve_47;
            $this->Leve_46 = $varLeve_46;
            $this->Leve_45 = $varLeve_45;
            $this->Leve_44 = $varLeve_44;
            $this->Leve_43 = $varLeve_43;
            $this->Leve_42 = $varLeve_42;
            $this->Leve_41 = $varLeve_41;
            $this->Leve_31 = $varLeve_31;
            $this->Leve_32 = $varLeve_32;
            $this->Leve_33 = $varLeve_33;
            $this->Leve_34 = $varLeve_34;
            $this->Leve_35 = $varLeve_35;
            $this->Leve_36 = $varLeve_36;
            $this->Leve_37 = $varLeve_37;
            $this->Leve_38 = $varLeve_38;
            $this->Moderna_18 = $varModerna_18;
            $this->Moderna_17 = $varModerna_17;
            $this->Moderna_16 = $varModerna_16;
            $this->Moderna_15 = $varModerna_15;
            $this->Moderna_14 = $varModerna_14;
            $this->Moderna_13 = $varModerna_13;
            $this->Moderna_12 = $varModerna_12;
            $this->Moderna_11 = $varModerna_11;
            $this->Moderna_21 = $varModerna_21;
            $this->Moderna_22 = $varModerna_22;
            $this->Moderna_23 = $varModerna_23;
            $this->Moderna_24 = $varModerna_24;
            $this->Moderna_25 = $varModerna_25;
            $this->Moderna_26 = $varModerna_26;
            $this->Moderna_27 = $varModerna_27;
            $this->Moderna_28 = $varModerna_28;
            $this->Moderna_48 = $varModerna_48;
            $this->Moderna_47 = $varModerna_47;
            $this->Moderna_46 = $varModerna_46;
            $this->Moderna_45 = $varModerna_45;
            $this->Moderna_44 = $varModerna_44;
            $this->Moderna_43 = $varModerna_43;
            $this->Moderna_42 = $varModerna_42;
            $this->Moderna_41 = $varModerna_41;
            $this->Moderna_31 = $varModerna_31;
            $this->Moderna_32 = $varModerna_32;
            $this->Moderna_33 = $varModerna_33;
            $this->Moderna_34 = $varModerna_34;
            $this->Moderna_35 = $varModerna_35;
            $this->Moderna_36 = $varModerna_36;
            $this->Moderna_37 = $varModerna_37;
            $this->Moderna_38 = $varModerna_38;
            $this->Grave_18 = $varGrave_18;
            $this->Grave_17 = $varGrave_17;
            $this->Grave_16 = $varGrave_16;
            $this->Grave_15 = $varGrave_15;
            $this->Grave_14 = $varGrave_14;
            $this->Grave_13 = $varGrave_13;
            $this->Grave_12 = $varGrave_12;
            $this->Grave_11 = $varGrave_11;
            $this->Grave_21 = $varGrave_21;
            $this->Grave_22 = $varGrave_22;
            $this->Grave_23 = $varGrave_23;
            $this->Grave_24 = $varGrave_24;
            $this->Grave_25 = $varGrave_25;
            $this->Grave_26 = $varGrave_26;
            $this->Grave_27 = $varGrave_27;
            $this->Grave_28 = $varGrave_28;
            $this->Grave_48 = $varGrave_48;
            $this->Grave_47 = $varGrave_47;
            $this->Grave_46 = $varGrave_46;
            $this->Grave_45 = $varGrave_45;
            $this->Grave_44 = $varGrave_44;
            $this->Grave_43 = $varGrave_43;
            $this->Grave_42 = $varGrave_42;
            $this->Grave_41 = $varGrave_41;
            $this->Grave_31 = $varGrave_31;
            $this->Grave_32 = $varGrave_32;
            $this->Grave_33 = $varGrave_33;
            $this->Grave_34 = $varGrave_34;
            $this->Grave_35 = $varGrave_35;
            $this->Grave_36 = $varGrave_36;
            $this->Grave_37 = $varGrave_37;
            $this->Grave_38 = $varGrave_38;
            $this->Diagnostico_General = $varDiagnostico_General;
            $this->Fecha_Basica_1 = $varFecha_Basica_1;
            $this->Fecha_Basica_2 = $varFecha_Basica_2;
            $this->Basica_18 = $varBasica_18;
            $this->Basica_17 = $varBasica_17;
            $this->Basica_16 = $varBasica_16;
            $this->Basica_15 = $varBasica_15;
            $this->Basica_14 = $varBasica_14;
            $this->Basica_13 = $varBasica_13;
            $this->Basica_12 = $varBasica_12;
            $this->Basica_11 = $varBasica_11;
            $this->Basica_21 = $varBasica_21;
            $this->Basica_22 = $varBasica_22;
            $this->Basica_23 = $varBasica_23;
            $this->Basica_24 = $varBasica_24;
            $this->Basica_25 = $varBasica_25;
            $this->Basica_26 = $varBasica_26;
            $this->Basica_27 = $varBasica_27;
            $this->Basica_28 = $varBasica_28;
            $this->Basica_48 = $varBasica_48;
            $this->Basica_47 = $varBasica_47;
            $this->Basica_46 = $varBasica_46;
            $this->Basica_45 = $varBasica_45;
            $this->Basica_44 = $varBasica_44;
            $this->Basica_43 = $varBasica_43;
            $this->Basica_42 = $varBasica_42;
            $this->Basica_41 = $varBasica_41;
            $this->Basica_31 = $varBasica_31;
            $this->Basica_32 = $varBasica_32;
            $this->Basica_33 = $varBasica_33;
            $this->Basica_34 = $varBasica_34;
            $this->Basica_35 = $varBasica_35;
            $this->Basica_36 = $varBasica_36;
            $this->Basica_37 = $varBasica_37;
            $this->Basica_38 = $varBasica_38;
            $this->Porcentaje_Basica_1 = $varPorcentaje_Basica_1;
            $this->Porcentaje_Basica_2 = $varPorcentaje_Basica_2;
            $this->Fecha_Final_1 = $varFecha_Final_1;
            $this->Fecha_Final_2 = $varFecha_Final_2;
            $this->Final_18 = $varFinal_18;
            $this->Final_17 = $varFinal_17;
            $this->Final_16 = $varFinal_16;
            $this->Final_15 = $varFinal_15;
            $this->Final_14 = $varFinal_14;
            $this->Final_13 = $varFinal_13;
            $this->Final_12 = $varFinal_12;
            $this->Final_11 = $varFinal_11;
            $this->Final_21 = $varFinal_21;
            $this->Final_22 = $varFinal_22;
            $this->Final_23 = $varFinal_23;
            $this->Final_24 = $varFinal_24;
            $this->Final_25 = $varFinal_25;
            $this->Final_26 = $varFinal_26;
            $this->Final_27 = $varFinal_27;
            $this->Final_28 = $varFinal_28;
            $this->Final_48 = $varFinal_48;
            $this->Final_47 = $varFinal_47;
            $this->Final_46 = $varFinal_46;
            $this->Final_45 = $varFinal_45;
            $this->Final_44 = $varFinal_44;
            $this->Final_43 = $varFinal_43;
            $this->Final_42 = $varFinal_42;
            $this->Final_41 = $varFinal_41;
            $this->Final_31 = $varFinal_31;
            $this->Final_32 = $varFinal_32;
            $this->Final_33 = $varFinal_33;
            $this->Final_34 = $varFinal_34;
            $this->Final_35 = $varFinal_35;
            $this->Final_36 = $varFinal_36;
            $this->Final_37 = $varFinal_37;
            $this->Final_38 = $varFinal_38;
            $this->Porcentaje_Final_1 = $varPorcentaje_Final_1;
            $this->Porcentaje_Final_2 = $varPorcentaje_Final_2;
            $this->Observaciones = $varObservaciones;
            $this->Bolsa_M_18 = $varBolsa_M_18;
            $this->Bolsa_F_18 = $varBolsa_F_18;
            $this->Bolsa_H_18 = $varBolsa_H_18;
            $this->Bolsa_V_18 = $varBolsa_V_18;
            $this->Bolsa_P_18 = $varBolsa_P_18;
            $this->Bolsa_D_18 = $varBolsa_D_18;
            $this->Bolsa_M2_18 = $varBolsa_M2_18;
            $this->Bolsa_M_17 = $varBolsa_M_17;
            $this->Bolsa_F_17 = $varBolsa_F_17;
            $this->Bolsa_H_17 = $varBolsa_H_17;
            $this->Bolsa_V_17 = $varBolsa_V_17;
            $this->Bolsa_P_17 = $varBolsa_P_17;
            $this->Bolsa_D_17 = $varBolsa_D_17;
            $this->Bolsa_M2_17 = $varBolsa_M2_17;
            $this->Bolsa_M_16 = $varBolsa_M_16;
            $this->Bolsa_F_16 = $varBolsa_F_16;
            $this->Bolsa_H_16 = $varBolsa_H_16;
            $this->Bolsa_V_16 = $varBolsa_V_16;
            $this->Bolsa_P_16 = $varBolsa_P_16;
            $this->Bolsa_D_16 = $varBolsa_D_16;
            $this->Bolsa_M2_16 = $varBolsa_M2_16;
            $this->Bolsa_M_15 = $varBolsa_M_15;
            $this->Bolsa_F_15 = $varBolsa_F_15;
            $this->Bolsa_H_15 = $varBolsa_H_15;
            $this->Bolsa_V_15 = $varBolsa_V_15;
            $this->Bolsa_P_15 = $varBolsa_P_15;
            $this->Bolsa_D_15 = $varBolsa_D_15;
            $this->Bolsa_M2_15 = $varBolsa_M2_15;
            $this->Bolsa_M_14 = $varBolsa_M_14;
            $this->Bolsa_F_14 = $varBolsa_F_14;
            $this->Bolsa_H_14 = $varBolsa_H_14;
            $this->Bolsa_V_14 = $varBolsa_V_14;
            $this->Bolsa_P_14 = $varBolsa_P_14;
            $this->Bolsa_D_14 = $varBolsa_D_14;
            $this->Bolsa_M2_14 = $varBolsa_M2_14;
            $this->Bolsa_M_13 = $varBolsa_M_13;
            $this->Bolsa_F_13 = $varBolsa_F_13;
            $this->Bolsa_H_13 = $varBolsa_H_13;
            $this->Bolsa_V_13 = $varBolsa_V_13;
            $this->Bolsa_P_13 = $varBolsa_P_13;
            $this->Bolsa_D_13 = $varBolsa_D_13;
            $this->Bolsa_M2_13 = $varBolsa_M2_13;
            $this->Bolsa_M_12 = $varBolsa_M_12;
            $this->Bolsa_F_12 = $varBolsa_F_12;
            $this->Bolsa_H_12 = $varBolsa_H_12;
            $this->Bolsa_V_12 = $varBolsa_V_12;
            $this->Bolsa_P_12 = $varBolsa_P_12;
            $this->Bolsa_D_12 = $varBolsa_D_12;
            $this->Bolsa_M2_12 = $varBolsa_M2_12;
            $this->Bolsa_M_11 = $varBolsa_M_11;
            $this->Bolsa_F_11 = $varBolsa_F_11;
            $this->Bolsa_H_11 = $varBolsa_H_11;
            $this->Bolsa_V_11 = $varBolsa_V_11;
            $this->Bolsa_P_11 = $varBolsa_P_11;
            $this->Bolsa_D_11 = $varBolsa_D_11;
            $this->Bolsa_M2_11 = $varBolsa_M2_11;
            $this->Bolsa_M_21 = $varBolsa_M_21;
            $this->Bolsa_F_21 = $varBolsa_F_21;
            $this->Bolsa_H_21 = $varBolsa_H_21;
            $this->Bolsa_V_21 = $varBolsa_V_21;
            $this->Bolsa_P_21 = $varBolsa_P_21;
            $this->Bolsa_D_21 = $varBolsa_D_21;
            $this->Bolsa_M2_21 = $varBolsa_M2_21;
            $this->Bolsa_M_22 = $varBolsa_M_22;
            $this->Bolsa_F_22 = $varBolsa_F_22;
            $this->Bolsa_H_22 = $varBolsa_H_22;
            $this->Bolsa_V_22 = $varBolsa_V_22;
            $this->Bolsa_P_22 = $varBolsa_P_22;
            $this->Bolsa_D_22 = $varBolsa_D_22;
            $this->Bolsa_M2_22 = $varBolsa_M2_22;
            $this->Bolsa_M_23 = $varBolsa_M_23;
            $this->Bolsa_F_23 = $varBolsa_F_23;
            $this->Bolsa_H_23 = $varBolsa_H_23;
            $this->Bolsa_V_23 = $varBolsa_V_23;
            $this->Bolsa_P_23 = $varBolsa_P_23;
            $this->Bolsa_D_23 = $varBolsa_D_23;
            $this->Bolsa_M2_23 = $varBolsa_M2_23;
            $this->Bolsa_M_24 = $varBolsa_M_24;
            $this->Bolsa_F_24 = $varBolsa_F_24;
            $this->Bolsa_H_24 = $varBolsa_H_24;
            $this->Bolsa_V_24 = $varBolsa_V_24;
            $this->Bolsa_P_24 = $varBolsa_P_24;
            $this->Bolsa_D_24 = $varBolsa_D_24;
            $this->Bolsa_M2_24 = $varBolsa_M2_24;
            $this->Bolsa_M_25 = $varBolsa_M_25;
            $this->Bolsa_F_25 = $varBolsa_F_25;
            $this->Bolsa_H_25 = $varBolsa_H_25;
            $this->Bolsa_V_25 = $varBolsa_V_25;
            $this->Bolsa_P_25 = $varBolsa_P_25;
            $this->Bolsa_D_25 = $varBolsa_D_25;
            $this->Bolsa_M2_25 = $varBolsa_M2_25;
            $this->Bolsa_M_26 = $varBolsa_M_26;
            $this->Bolsa_F_26 = $varBolsa_F_26;
            $this->Bolsa_H_26 = $varBolsa_H_26;
            $this->Bolsa_V_26 = $varBolsa_V_26;
            $this->Bolsa_P_26 = $varBolsa_P_26;
            $this->Bolsa_D_26 = $varBolsa_D_26;
            $this->Bolsa_M2_26 = $varBolsa_M2_26;
            $this->Bolsa_M_27 = $varBolsa_M_27;
            $this->Bolsa_F_27 = $varBolsa_F_27;
            $this->Bolsa_H_27 = $varBolsa_H_27;
            $this->Bolsa_V_27 = $varBolsa_V_27;
            $this->Bolsa_P_27 = $varBolsa_P_27;
            $this->Bolsa_D_27 = $varBolsa_D_27;
            $this->Bolsa_M2_27 = $varBolsa_M2_27;
            $this->Bolsa_M_28 = $varBolsa_M_28;
            $this->Bolsa_F_28 = $varBolsa_F_28;
            $this->Bolsa_H_28 = $varBolsa_H_28;
            $this->Bolsa_V_28 = $varBolsa_V_28;
            $this->Bolsa_P_28 = $varBolsa_P_28;
            $this->Bolsa_D_28 = $varBolsa_D_28;
            $this->Bolsa_M2_28 = $varBolsa_M2_28;
            $this->Bolsa_M_41 = $varBolsa_M_41;
            $this->Bolsa_F_41 = $varBolsa_F_41;
            $this->Bolsa_H_41 = $varBolsa_H_41;
            $this->Bolsa_V_41 = $varBolsa_V_41;
            $this->Bolsa_P_41 = $varBolsa_P_41;
            $this->Bolsa_D_41 = $varBolsa_D_41;
            $this->Bolsa_M2_41 = $varBolsa_M2_41;
            $this->Bolsa_M_42 = $varBolsa_M_42;
            $this->Bolsa_F_42 = $varBolsa_F_42;
            $this->Bolsa_H_42 = $varBolsa_H_42;
            $this->Bolsa_V_42 = $varBolsa_V_42;
            $this->Bolsa_P_42 = $varBolsa_P_42;
            $this->Bolsa_D_42 = $varBolsa_D_42;
            $this->Bolsa_M2_42 = $varBolsa_M2_42;
            $this->Bolsa_M_43 = $varBolsa_M_43;
            $this->Bolsa_F_43 = $varBolsa_F_43;
            $this->Bolsa_H_43 = $varBolsa_H_43;
            $this->Bolsa_V_43 = $varBolsa_V_43;
            $this->Bolsa_P_43 = $varBolsa_P_43;
            $this->Bolsa_D_43 = $varBolsa_D_43;
            $this->Bolsa_M2_43 = $varBolsa_M2_43;
            $this->Bolsa_M_44 = $varBolsa_M_44;
            $this->Bolsa_F_44 = $varBolsa_F_44;
            $this->Bolsa_H_44 = $varBolsa_H_44;
            $this->Bolsa_V_44 = $varBolsa_V_44;
            $this->Bolsa_P_44 = $varBolsa_P_44;
            $this->Bolsa_D_44 = $varBolsa_D_44;
            $this->Bolsa_M2_44 = $varBolsa_M2_44;
            $this->Bolsa_M_45 = $varBolsa_M_45;
            $this->Bolsa_F_45 = $varBolsa_F_45;
            $this->Bolsa_H_45 = $varBolsa_H_45;
            $this->Bolsa_V_45 = $varBolsa_V_45;
            $this->Bolsa_P_45 = $varBolsa_P_45;
            $this->Bolsa_D_45 = $varBolsa_D_45;
            $this->Bolsa_M2_45 = $varBolsa_M2_45;
            $this->Bolsa_M_46 = $varBolsa_M_46;
            $this->Bolsa_F_46 = $varBolsa_F_46;
            $this->Bolsa_H_46 = $varBolsa_H_46;
            $this->Bolsa_V_46 = $varBolsa_V_46;
            $this->Bolsa_P_46 = $varBolsa_P_46;
            $this->Bolsa_D_46 = $varBolsa_D_46;
            $this->Bolsa_M2_46 = $varBolsa_M2_46;
            $this->Bolsa_M_47 = $varBolsa_M_47;
            $this->Bolsa_F_47 = $varBolsa_F_47;
            $this->Bolsa_H_47 = $varBolsa_H_47;
            $this->Bolsa_V_47 = $varBolsa_V_47;
            $this->Bolsa_P_47 = $varBolsa_P_47;
            $this->Bolsa_D_47 = $varBolsa_D_47;
            $this->Bolsa_M2_47 = $varBolsa_M2_47;
            $this->Bolsa_M_48 = $varBolsa_M_48;
            $this->Bolsa_F_48 = $varBolsa_F_48;
            $this->Bolsa_H_48 = $varBolsa_H_48;
            $this->Bolsa_V_48 = $varBolsa_V_48;
            $this->Bolsa_P_48 = $varBolsa_P_48;
            $this->Bolsa_D_48 = $varBolsa_D_48;
            $this->Bolsa_M2_48 = $varBolsa_M2_48;
            $this->Bolsa_M_31 = $varBolsa_M_31;
            $this->Bolsa_F_31 = $varBolsa_F_31;
            $this->Bolsa_H_31 = $varBolsa_H_31;
            $this->Bolsa_V_31 = $varBolsa_V_31;
            $this->Bolsa_P_31 = $varBolsa_P_31;
            $this->Bolsa_D_31 = $varBolsa_D_31;
            $this->Bolsa_M2_31 = $varBolsa_M2_31;
            $this->Bolsa_M_32 = $varBolsa_M_32;
            $this->Bolsa_F_32 = $varBolsa_F_32;
            $this->Bolsa_H_32 = $varBolsa_H_32;
            $this->Bolsa_V_32 = $varBolsa_V_32;
            $this->Bolsa_P_32 = $varBolsa_P_32;
            $this->Bolsa_D_32 = $varBolsa_D_32;
            $this->Bolsa_M2_32 = $varBolsa_M2_32;
            $this->Bolsa_M_33 = $varBolsa_M_33;
            $this->Bolsa_F_33 = $varBolsa_F_33;
            $this->Bolsa_H_33 = $varBolsa_H_33;
            $this->Bolsa_V_33 = $varBolsa_V_33;
            $this->Bolsa_P_33 = $varBolsa_P_33;
            $this->Bolsa_D_33 = $varBolsa_D_33;
            $this->Bolsa_M2_33 = $varBolsa_M2_33;
            $this->Bolsa_M_34 = $varBolsa_M_34;
            $this->Bolsa_F_34 = $varBolsa_F_34;
            $this->Bolsa_H_34 = $varBolsa_H_34;
            $this->Bolsa_V_34 = $varBolsa_V_34;
            $this->Bolsa_P_34 = $varBolsa_P_34;
            $this->Bolsa_D_34 = $varBolsa_D_34;
            $this->Bolsa_M2_34 = $varBolsa_M2_34;
            $this->Bolsa_M_35 = $varBolsa_M_35;
            $this->Bolsa_F_35 = $varBolsa_F_35;
            $this->Bolsa_H_35 = $varBolsa_H_35;
            $this->Bolsa_V_35 = $varBolsa_V_35;
            $this->Bolsa_P_35 = $varBolsa_P_35;
            $this->Bolsa_D_35 = $varBolsa_D_35;
            $this->Bolsa_M2_35 = $varBolsa_M2_35;
            $this->Bolsa_M_36 = $varBolsa_M_36;
            $this->Bolsa_F_36 = $varBolsa_F_36;
            $this->Bolsa_H_36 = $varBolsa_H_36;
            $this->Bolsa_V_36 = $varBolsa_V_36;
            $this->Bolsa_P_36 = $varBolsa_P_36;
            $this->Bolsa_D_36 = $varBolsa_D_36;
            $this->Bolsa_M2_36 = $varBolsa_M2_36;
            $this->Bolsa_M_37 = $varBolsa_M_37;
            $this->Bolsa_F_37 = $varBolsa_F_37;
            $this->Bolsa_H_37 = $varBolsa_H_37;
            $this->Bolsa_V_37 = $varBolsa_V_37;
            $this->Bolsa_P_37 = $varBolsa_P_37;
            $this->Bolsa_D_37 = $varBolsa_D_37;
            $this->Bolsa_M2_37 = $varBolsa_M2_37;
            $this->Bolsa_M_38 = $varBolsa_M_38;
            $this->Bolsa_F_38 = $varBolsa_F_38;
            $this->Bolsa_H_38 = $varBolsa_H_38;
            $this->Bolsa_V_38 = $varBolsa_V_38;
            $this->Bolsa_P_38 = $varBolsa_P_38;
            $this->Bolsa_D_38 = $varBolsa_D_38;
            $this->Bolsa_M2_38 = $varBolsa_M2_38;
            $this->Planificacion_Tratamiento = $varPlanificacion_Tratamiento;
            $this->Revision_Meses = $varRevision_Meses;
            $this->Fecha_Tratamiento_1 = $varFecha_Tratamiento_1;
            $this->Tratamiento_1 = $varTratamiento_1;
            $this->Fecha_Tratamiento_2 = $varFecha_Tratamiento_2;
            $this->Tratamiento_2 = $varTratamiento_2;
            $this->Fecha_Tratamiento_3 = $varFecha_Tratamiento_3;
            $this->Tratamiento_3 = $varTratamiento_3;
            $this->Fecha_Tratamiento_4 = $varFecha_Tratamiento_4;
            $this->Tratamiento_4 = $varTratamiento_4;
            $this->Fecha_Tratamiento_5 = $varFecha_Tratamiento_5;
            $this->Tratamiento_5 = $varTratamiento_5;
            $this->Fecha_Tratamiento_6 = $varFecha_Tratamiento_6;
            $this->Tratamiento_6 = $varTratamiento_6;
            $this->Fecha_Tratamiento_7 = $varFecha_Tratamiento_7;
            $this->Tratamiento_7 = $varTratamiento_7;
            $this->Fecha_Tratamiento_8 = $varFecha_Tratamiento_8;
            $this->Tratamiento_8 = $varTratamiento_8;
            $this->Fecha_Tratamiento_9 = $varFecha_Tratamiento_9;
            $this->Tratamiento_9 = $varTratamiento_9;
            $this->Fecha_Tratamiento_10 = $varFecha_Tratamiento_10;
            $this->Tratamiento_10 = $varTratamiento_10;
            $this->Folio_Recibos_TX = $varFolio_Recibos_TX;
            $this->Numero_Recibos_Radiograficos = $varNumero_Recibos_Radiograficos;
            $this->Tratamiento_11 = $varTratamiento_11;
            $this->Aprobado = $varAprobado;
            $this->Estatus = $varEstatus;
            $this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de formatos de historias clinicas de periodoncia en modo administrador
        
        public function Catalogo_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia
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
						<td><a href="formatohistoriaperiodoncia-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaPeriodoncia']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaperiodoncia-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaPeriodoncia']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas periodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas periodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de formatos de historias clinicas de periodoncia en modo medico titular
        
        public function Catalogo_Medico_Titular($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND
						Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia
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
						AND IdParejaClinica = '$this->IdParejaClinica' AND
						Aprobado = 0;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysql_error());

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1']; ?> y
                            <?php echo $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2']; ?></td>
                        <td><a href="formatohistoriaperiodoncia-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaPeriodoncia']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
			<td><a href="reportes/formatohistoriaperiodoncia-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaPeriodoncia']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas periodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas periodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//catalogo de formatos de historias clinicas de periodoncia en modo alumno operador/asistencia
        
        public function Catalogo_Alumno_Op_As($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia
                         WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia
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
						<td><a href="formatohistoriaperiodoncia-ver.php?formato=<?php echo $Linea['IdHistoriaClinicaPeriodoncia']; ?>" class="btn btn-institucional">Ver Historia Clínica</a></td>
						<td><a href="reportes/formatohistoriaperiodoncia-generar-pdf.php?formato=<?php echo $Linea['IdHistoriaClinicaPeriodoncia']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas periodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas periodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//dar de alta un formato de historia clinica de periodoncia
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Periodoncia_Alta(
                        '$this->IdParejaClinica',
                        '$this->Paciente',
                        '$this->Ocupacion',
                        '$this->Calle',
                        '$this->Numero',
                        '$this->Colonia',
                        '$this->Poblacion',
                        '$this->Telefono',
                        '$this->Diente1',
                        '$this->Diente2',    
                        '$this->Diente3',    
                        '$this->Diente4',    
                        '$this->Diente5',
                        '$this->Diente6',
                        '$this->Diente7',
                        '$this->Diente8',    
                        '$this->Diente9',
                        '$this->Diente10',
                        '$this->Diente11',
                        '$this->Diente12',
                        '$this->Diente13',
                        '$this->Diente14',
                        '$this->Diente15',
                        '$this->Diente16',
                        '$this->Diente17',
                        '$this->Diente18',
                        '$this->Diente19',
                        '$this->Diente20',
                        '$this->Diente21',
                        '$this->Diente22',
                        '$this->Diente23',
                        '$this->Diente24',
                        '$this->Diente25',
                        '$this->Diente26',
                        '$this->Diente27',
                        '$this->Diente28',
                        '$this->Diente29',
                        '$this->Diente30',
                        '$this->Diente31',
                        '$this->Diente32',
                        '$this->Diente33',
                        '$this->Diente34',
                        '$this->Diente35',
                        '$this->Diente36',
                        '$this->Diente37',
                        '$this->Diente38',
                        '$this->Diente39',
                        '$this->Diente40',
                        '$this->Diente41',
                        '$this->Diente42',
                        '$this->Diente43',
                        '$this->Diente44',
                        '$this->Diente45',
                        '$this->Diente46',
                        '$this->Diente47',
                        '$this->Diente48',
                        '$this->Diente49',
                        '$this->Diente50',
                        '$this->Diente51',
                        '$this->Diente52',
                        '$this->Diente53',
                        '$this->Diente54',
                        '$this->Diente55',
                        '$this->Diente56',
                        '$this->Diente57',
                        '$this->Diente58',
                        '$this->Diente59',
                        '$this->Diente60',
                        '$this->Diente61',
                        '$this->Diente62',
                        '$this->Diente63',
                        '$this->Diente64',
                        '$this->Informacion_Microbiana',
                        '$this->Traumatismo_oclusal',
                        '$this->Parafunciones',
                        '$this->Morfologia_Funcion',
                        '$this->Articulacion_Temporo_Mandibular',
                        '$this->Peculiaridad',
			'$this->Cuant_Plac_Fecha_1',
                        '$this->Cuant_Plac_A_18',
                        '$this->Cuant_Plac_A_17',
                        '$this->Cuant_Plac_A_16',
                        '$this->Cuant_Plac_A_15',
                        '$this->Cuant_Plac_A_14',
                        '$this->Cuant_Plac_A_13',
                        '$this->Cuant_Plac_A_12',
                        '$this->Cuant_Plac_A_11',
                        '$this->Cuant_Plac_A_21',
                        '$this->Cuant_Plac_A_22',
                        '$this->Cuant_Plac_A_23',
                        '$this->Cuant_Plac_A_24',
                        '$this->Cuant_Plac_A_25',
                        '$this->Cuant_Plac_A_26',
                        '$this->Cuant_Plac_A_27',
                        '$this->Cuant_Plac_A_28',
                        '$this->Cuant_Plac_Porcentaje_1',
                        '$this->Cuant_Plac_Fecha_2',
                        '$this->Cuant_Plac_B_18',
                        '$this->Cuant_Plac_B_17',
                        '$this->Cuant_Plac_B_16',
                        '$this->Cuant_Plac_B_15',
                        '$this->Cuant_Plac_B_14',
                        '$this->Cuant_Plac_B_13',
                        '$this->Cuant_Plac_B_12',
                        '$this->Cuant_Plac_B_11',
                        '$this->Cuant_Plac_B_21',
                        '$this->Cuant_Plac_B_22',
                        '$this->Cuant_Plac_B_23',
                        '$this->Cuant_Plac_B_24',
                        '$this->Cuant_Plac_B_25',
                        '$this->Cuant_Plac_B_26',
                        '$this->Cuant_Plac_B_27',
                        '$this->Cuant_Plac_B_28',
                        '$this->Cuant_Plac_Porcentaje_2',
                        '$this->Cuant_Plac_Fecha_3',
                        '$this->Cuant_Plac_C_18',
                        '$this->Cuant_Plac_C_17',
                        '$this->Cuant_Plac_C_16',
                        '$this->Cuant_Plac_C_15',
                        '$this->Cuant_Plac_C_14',
                        '$this->Cuant_Plac_C_13',
                        '$this->Cuant_Plac_C_12',
                        '$this->Cuant_Plac_C_11',
                        '$this->Cuant_Plac_C_21',
                        '$this->Cuant_Plac_C_22',
                        '$this->Cuant_Plac_C_23',
                        '$this->Cuant_Plac_C_24',
                        '$this->Cuant_Plac_C_25',
                        '$this->Cuant_Plac_C_26',
                        '$this->Cuant_Plac_C_27',
                        '$this->Cuant_Plac_C_28',
                        '$this->Cuant_Plac_Porcentaje_3',
                        '$this->Cuant_Plac_Fecha_4',
                        '$this->Cuant_Plac_A_48',
                        '$this->Cuant_Plac_A_47',
                        '$this->Cuant_Plac_A_46',
                        '$this->Cuant_Plac_A_45',
                        '$this->Cuant_Plac_A_44',
                        '$this->Cuant_Plac_A_43',
                        '$this->Cuant_Plac_A_42',
                        '$this->Cuant_Plac_A_41',
                        '$this->Cuant_Plac_A_31',
                        '$this->Cuant_Plac_A_32',
                        '$this->Cuant_Plac_A_33',
                        '$this->Cuant_Plac_A_34',
                        '$this->Cuant_Plac_A_35',
                        '$this->Cuant_Plac_A_36',
                        '$this->Cuant_Plac_A_37',
                        '$this->Cuant_Plac_A_38',
                        '$this->Cuant_Plac_Porcentaje_4',
                        '$this->Cuant_Plac_Fecha_5',
                        '$this->Cuant_Plac_B_48',
                        '$this->Cuant_Plac_B_47',
                        '$this->Cuant_Plac_B_46',
                        '$this->Cuant_Plac_B_45',
                        '$this->Cuant_Plac_B_44',
                        '$this->Cuant_Plac_B_43',
                        '$this->Cuant_Plac_B_42',
                        '$this->Cuant_Plac_B_41',
                        '$this->Cuant_Plac_B_31',
                        '$this->Cuant_Plac_B_32',
                        '$this->Cuant_Plac_B_33',
                        '$this->Cuant_Plac_B_34',
                        '$this->Cuant_Plac_B_35',
                        '$this->Cuant_Plac_B_36',
                        '$this->Cuant_Plac_B_37',
                        '$this->Cuant_Plac_B_38',
                        '$this->Cuant_Plac_Porcentaje_5',
                        '$this->Cuant_Plac_Fecha_6',
                        '$this->Cuant_Plac_C_48',
                        '$this->Cuant_Plac_C_47',
                        '$this->Cuant_Plac_C_46',
                        '$this->Cuant_Plac_C_45',
                        '$this->Cuant_Plac_C_44',
                        '$this->Cuant_Plac_C_43',
                        '$this->Cuant_Plac_C_42',
                        '$this->Cuant_Plac_C_41',
                        '$this->Cuant_Plac_C_31',
                        '$this->Cuant_Plac_C_32',
                        '$this->Cuant_Plac_C_33',
                        '$this->Cuant_Plac_C_34',
                        '$this->Cuant_Plac_C_35',
                        '$this->Cuant_Plac_C_36',
                        '$this->Cuant_Plac_C_37',
                        '$this->Cuant_Plac_C_38',
                        '$this->Cuant_Plac_Porcentaje_6',
                        '$this->Gin_18',
                        '$this->Gin_17',
                        '$this->Gin_16',
                        '$this->Gin_15',
                        '$this->Gin_14',
                        '$this->Gin_13',
                        '$this->Gin_12',
                        '$this->Gin_11',
                        '$this->Gin_21',
                        '$this->Gin_22',
                        '$this->Gin_23',
                        '$this->Gin_24',
                        '$this->Gin_25',
                        '$this->Gin_26',
                        '$this->Gin_27',
                        '$this->Gin_28',
                        '$this->Gin_48',
                        '$this->Gin_47',
                        '$this->Gin_46',
                        '$this->Gin_45',
                        '$this->Gin_44',
                        '$this->Gin_43',
                        '$this->Gin_42',
                        '$this->Gin_41',
                        '$this->Gin_31',
                        '$this->Gin_32',
                        '$this->Gin_33',
                        '$this->Gin_34',
                        '$this->Gin_35',
                        '$this->Gin_36',
                        '$this->Gin_37',
                        '$this->Gin_38',
                        '$this->Leve_18',
                        '$this->Leve_17',
                        '$this->Leve_16',
                        '$this->Leve_15',
                        '$this->Leve_14',
                        '$this->Leve_13',
                        '$this->Leve_12',
                        '$this->Leve_11',
                        '$this->Leve_21',
                        '$this->Leve_22',
                        '$this->Leve_23',
                        '$this->Leve_24',
                        '$this->Leve_25',
                        '$this->Leve_26',
                        '$this->Leve_27',
                        '$this->Leve_28',
                        '$this->Leve_48',
                        '$this->Leve_47',
                        '$this->Leve_46',
                        '$this->Leve_45',
                        '$this->Leve_44',
                        '$this->Leve_43',
                        '$this->Leve_42',
                        '$this->Leve_41',
                        '$this->Leve_31',
                        '$this->Leve_32',
                        '$this->Leve_33',
                        '$this->Leve_34',
                        '$this->Leve_35',
                        '$this->Leve_36',
                        '$this->Leve_37',
                        '$this->Leve_38',
                        '$this->Moderna_18',
                        '$this->Moderna_17',
                        '$this->Moderna_16',
                        '$this->Moderna_15',
                        '$this->Moderna_14',
                        '$this->Moderna_13',
                        '$this->Moderna_12',
                        '$this->Moderna_11',
                        '$this->Moderna_21',
                        '$this->Moderna_22',
                        '$this->Moderna_23',
                        '$this->Moderna_24',
                        '$this->Moderna_25',
                        '$this->Moderna_26',
                        '$this->Moderna_27',
                        '$this->Moderna_28',
                        '$this->Moderna_48',
                        '$this->Moderna_47',
                        '$this->Moderna_46',
                        '$this->Moderna_45',
                        '$this->Moderna_44',
                        '$this->Moderna_43',
                        '$this->Moderna_42',
                        '$this->Moderna_41',
                        '$this->Moderna_31',
                        '$this->Moderna_32',
                        '$this->Moderna_33',
                        '$this->Moderna_34',
                        '$this->Moderna_35',
                        '$this->Moderna_36',
                        '$this->Moderna_37',
                        '$this->Moderna_38',
                        '$this->Grave_18',
                        '$this->Grave_17',
                        '$this->Grave_16',
                        '$this->Grave_15',
                        '$this->Grave_14',
                        '$this->Grave_13',
                        '$this->Grave_12',
                        '$this->Grave_11',
                        '$this->Grave_21',
                        '$this->Grave_22',
                        '$this->Grave_23',
                        '$this->Grave_24',
                        '$this->Grave_25',
                        '$this->Grave_26',
                        '$this->Grave_27',
                        '$this->Grave_28',
                        '$this->Grave_48',
                        '$this->Grave_47',
                        '$this->Grave_46',
                        '$this->Grave_45',
                        '$this->Grave_44',
                        '$this->Grave_43',
                        '$this->Grave_42',
                        '$this->Grave_41',
                        '$this->Grave_31',
                        '$this->Grave_32',
                        '$this->Grave_33',
                        '$this->Grave_34',
                        '$this->Grave_35',
                        '$this->Grave_36',
                        '$this->Grave_37',
                        '$this->Grave_38',
                        '$this->Diagnostico_General',
                        '$this->Fecha_Basica_1',
                        '$this->Fecha_Basica_2',
                        '$this->Basica_18',
                        '$this->Basica_17',
                        '$this->Basica_16',
                        '$this->Basica_15',
                        '$this->Basica_14',
                        '$this->Basica_13',
                        '$this->Basica_12',
                        '$this->Basica_11',
                        '$this->Basica_21',
                        '$this->Basica_22',
                        '$this->Basica_23',
                        '$this->Basica_24',
                        '$this->Basica_25',
                        '$this->Basica_26',
                        '$this->Basica_27',
                        '$this->Basica_28',
                        '$this->Basica_48',
                        '$this->Basica_47',
                        '$this->Basica_46',
                        '$this->Basica_45',
                        '$this->Basica_44',
                        '$this->Basica_43',
                        '$this->Basica_42',
                        '$this->Basica_41',
                        '$this->Basica_31',
                        '$this->Basica_32',
                        '$this->Basica_33',
                        '$this->Basica_34',
                        '$this->Basica_35',
                        '$this->Basica_36',
                        '$this->Basica_37',
                        '$this->Basica_38',
                        '$this->Porcentaje_Basica_1',
                        '$this->Porcentaje_Basica_2',
                        '$this->Fecha_Final_1',
                        '$this->Fecha_Final_2',
                        '$this->Final_18',
                        '$this->Final_17',
                        '$this->Final_16',
                        '$this->Final_15',
                        '$this->Final_14',
                        '$this->Final_13',
                        '$this->Final_12',
                        '$this->Final_11',
                        '$this->Final_21',
                        '$this->Final_22',
                        '$this->Final_23',
                        '$this->Final_24',
                        '$this->Final_25',
                        '$this->Final_26',
                        '$this->Final_27',
                        '$this->Final_28',
                        '$this->Final_48',
                        '$this->Final_47',
                        '$this->Final_46',
                        '$this->Final_45',
                        '$this->Final_44',
                        '$this->Final_43',
                        '$this->Final_42',
                        '$this->Final_41',
                        '$this->Final_31',
                        '$this->Final_32',
                        '$this->Final_33',
                        '$this->Final_34',
                        '$this->Final_35',
                        '$this->Final_36',
                        '$this->Final_37',
                        '$this->Final_38',
                        '$this->Porcentaje_Final_1',
                        '$this->Porcentaje_Final_2',
                        '$this->Observaciones',
                        '$this->Bolsa_M_18',
                        '$this->Bolsa_F_18',
                        '$this->Bolsa_H_18',
                        '$this->Bolsa_V_18',
                        '$this->Bolsa_P_18',
                        '$this->Bolsa_D_18',
                        '$this->Bolsa_M2_18',
                        '$this->Bolsa_M_17',
                        '$this->Bolsa_F_17',
                        '$this->Bolsa_H_17',
                        '$this->Bolsa_V_17',
                        '$this->Bolsa_P_17',
                        '$this->Bolsa_D_17',
                        '$this->Bolsa_M2_17',
                        '$this->Bolsa_M_16',
                        '$this->Bolsa_F_16',
                        '$this->Bolsa_H_16',
                        '$this->Bolsa_V_16',
                        '$this->Bolsa_P_16',
                        '$this->Bolsa_D_16',
                        '$this->Bolsa_M2_16',
                        '$this->Bolsa_M_15',
                        '$this->Bolsa_F_15',
                        '$this->Bolsa_H_15',
                        '$this->Bolsa_V_15',
                        '$this->Bolsa_P_15',
                        '$this->Bolsa_D_15',
                        '$this->Bolsa_M2_15',
                        '$this->Bolsa_M_14',
                        '$this->Bolsa_F_14',
                        '$this->Bolsa_H_14',
                        '$this->Bolsa_V_14',
                        '$this->Bolsa_P_14',
                        '$this->Bolsa_D_14',
                        '$this->Bolsa_M2_14',
                        '$this->Bolsa_M_13',
                        '$this->Bolsa_F_13',
                        '$this->Bolsa_H_13',
                        '$this->Bolsa_V_13',
                        '$this->Bolsa_P_13',
                        '$this->Bolsa_D_13',
                        '$this->Bolsa_M2_13',
                        '$this->Bolsa_M_12',
                        '$this->Bolsa_F_12',
                        '$this->Bolsa_H_12',
                        '$this->Bolsa_V_12',
                        '$this->Bolsa_P_12',
                        '$this->Bolsa_D_12',
                        '$this->Bolsa_M2_12',
                        '$this->Bolsa_M_11',
                        '$this->Bolsa_F_11',
                        '$this->Bolsa_H_11',
                        '$this->Bolsa_V_11',
                        '$this->Bolsa_P_11',
                        '$this->Bolsa_D_11',
                        '$this->Bolsa_M2_11',
                        '$this->Bolsa_M_21',
                        '$this->Bolsa_F_21',
                        '$this->Bolsa_H_21',
                        '$this->Bolsa_V_21',
                        '$this->Bolsa_P_21',
                        '$this->Bolsa_D_21',
                        '$this->Bolsa_M2_21',
                        '$this->Bolsa_M_22',
                        '$this->Bolsa_F_22',
                        '$this->Bolsa_H_22',
                        '$this->Bolsa_V_22',
                        '$this->Bolsa_P_22',
                        '$this->Bolsa_D_22',
                        '$this->Bolsa_M2_22',
                        '$this->Bolsa_M_23',
                        '$this->Bolsa_F_23',
                        '$this->Bolsa_H_23',
                        '$this->Bolsa_V_23',
                        '$this->Bolsa_P_23',
                        '$this->Bolsa_D_23',
                        '$this->Bolsa_M2_23',
                        '$this->Bolsa_M_24',
                        '$this->Bolsa_F_24',
                        '$this->Bolsa_H_24',
                        '$this->Bolsa_V_24',
                        '$this->Bolsa_P_24',
                        '$this->Bolsa_D_24',
                        '$this->Bolsa_M2_24',
                        '$this->Bolsa_M_25',
                        '$this->Bolsa_F_25',
                        '$this->Bolsa_H_25',
                        '$this->Bolsa_V_25',
                        '$this->Bolsa_P_25',
                        '$this->Bolsa_D_25',
                        '$this->Bolsa_M2_25',
                        '$this->Bolsa_M_26',
                        '$this->Bolsa_F_26',
                        '$this->Bolsa_H_26',
                        '$this->Bolsa_V_26',
                        '$this->Bolsa_P_26',
                        '$this->Bolsa_D_26',
                        '$this->Bolsa_M2_26',
                        '$this->Bolsa_M_27',
                        '$this->Bolsa_F_27',
                        '$this->Bolsa_H_27',
                        '$this->Bolsa_V_27',
                        '$this->Bolsa_P_27',
                        '$this->Bolsa_D_27',
                        '$this->Bolsa_M2_27',
                        '$this->Bolsa_M_28',
                        '$this->Bolsa_F_28',
                        '$this->Bolsa_H_28',
                        '$this->Bolsa_V_28',
                        '$this->Bolsa_P_28',
                        '$this->Bolsa_D_28',
                        '$this->Bolsa_M2_28',
                        '$this->Bolsa_M_41',
                        '$this->Bolsa_F_41',
                        '$this->Bolsa_H_41',
                        '$this->Bolsa_V_41',
                        '$this->Bolsa_P_41',
                        '$this->Bolsa_D_41',
                        '$this->Bolsa_M2_41',
                        '$this->Bolsa_M_42',
                        '$this->Bolsa_F_42',
                        '$this->Bolsa_H_42',
                        '$this->Bolsa_V_42',
                        '$this->Bolsa_P_42',
                        '$this->Bolsa_D_42',
                        '$this->Bolsa_M2_42',
                        '$this->Bolsa_M_43',
                        '$this->Bolsa_F_43',
                        '$this->Bolsa_H_43',
                        '$this->Bolsa_V_43',
                        '$this->Bolsa_P_43',
                        '$this->Bolsa_D_43',
                        '$this->Bolsa_M2_43',
                        '$this->Bolsa_M_44',
                        '$this->Bolsa_F_44',
                        '$this->Bolsa_H_44',
                        '$this->Bolsa_V_44',
                        '$this->Bolsa_P_44',
                        '$this->Bolsa_D_44',
                        '$this->Bolsa_M2_44',
                        '$this->Bolsa_M_45',
                        '$this->Bolsa_F_45',
                        '$this->Bolsa_H_45',
                        '$this->Bolsa_V_45',
                        '$this->Bolsa_P_45',
                        '$this->Bolsa_D_45',
                        '$this->Bolsa_M2_45',
                        '$this->Bolsa_M_46',
                        '$this->Bolsa_F_46',
                        '$this->Bolsa_H_46',
                        '$this->Bolsa_V_46',
                        '$this->Bolsa_P_46',
                        '$this->Bolsa_D_46',
                        '$this->Bolsa_M2_46',
                        '$this->Bolsa_M_47',
                        '$this->Bolsa_F_47',
                        '$this->Bolsa_H_47',
                        '$this->Bolsa_V_47',
                        '$this->Bolsa_P_47',
                        '$this->Bolsa_D_47',
                        '$this->Bolsa_M2_47',
                        '$this->Bolsa_M_48',
                        '$this->Bolsa_F_48',
                        '$this->Bolsa_H_48',
                        '$this->Bolsa_V_48',
                        '$this->Bolsa_P_48',
                        '$this->Bolsa_D_48',
                        '$this->Bolsa_M2_48',
                        '$this->Bolsa_M_31',
                        '$this->Bolsa_F_31',
                        '$this->Bolsa_H_31',
                        '$this->Bolsa_V_31',
                        '$this->Bolsa_P_31',
                        '$this->Bolsa_D_31',
                        '$this->Bolsa_M2_31',
                        '$this->Bolsa_M_32',
                        '$this->Bolsa_F_32',
                        '$this->Bolsa_H_32',
                        '$this->Bolsa_V_32',
                        '$this->Bolsa_P_32',
                        '$this->Bolsa_D_32',
                        '$this->Bolsa_M2_32',
                        '$this->Bolsa_M_33',
                        '$this->Bolsa_F_33',
                        '$this->Bolsa_H_33',
                        '$this->Bolsa_V_33',
                        '$this->Bolsa_P_33',
                        '$this->Bolsa_D_33',
                        '$this->Bolsa_M2_33',
                        '$this->Bolsa_M_34',
                        '$this->Bolsa_F_34',
                        '$this->Bolsa_H_34',
                        '$this->Bolsa_V_34',
                        '$this->Bolsa_P_34',
                        '$this->Bolsa_D_34',
                        '$this->Bolsa_M2_34',
                        '$this->Bolsa_M_35',
                        '$this->Bolsa_F_35',
                        '$this->Bolsa_H_35',
                        '$this->Bolsa_V_35',
                        '$this->Bolsa_P_35',
                        '$this->Bolsa_D_35',
                        '$this->Bolsa_M2_35',
                        '$this->Bolsa_M_36',
                        '$this->Bolsa_F_36',
                        '$this->Bolsa_H_36',
                        '$this->Bolsa_V_36',
                        '$this->Bolsa_P_36',
                        '$this->Bolsa_D_36',
                        '$this->Bolsa_M2_36',
                        '$this->Bolsa_M_37',
                        '$this->Bolsa_F_37',
                        '$this->Bolsa_H_37',
                        '$this->Bolsa_V_37',
                        '$this->Bolsa_P_37',
                        '$this->Bolsa_D_37',
                        '$this->Bolsa_M2_37',
                        '$this->Bolsa_M_38',
                        '$this->Bolsa_F_38',
                        '$this->Bolsa_H_38',
                        '$this->Bolsa_V_38',
                        '$this->Bolsa_P_38',
                        '$this->Bolsa_D_38',
                        '$this->Bolsa_M2_38',
                        '$this->Planificacion_Tratamiento',
                        '$this->Revision_Meses',
                        '$this->Fecha_Tratamiento_1',
                        '$this->Tratamiento_1',
                        '$this->Fecha_Tratamiento_2',
                        '$this->Tratamiento_2',
                        '$this->Fecha_Tratamiento_3',
                        '$this->Tratamiento_3',
                        '$this->Fecha_Tratamiento_4',
                        '$this->Tratamiento_4',
                        '$this->Fecha_Tratamiento_5',
                        '$this->Tratamiento_5',
                        '$this->Fecha_Tratamiento_6',
                        '$this->Tratamiento_6',
                        '$this->Fecha_Tratamiento_7',
                        '$this->Tratamiento_7',
                        '$this->Fecha_Tratamiento_8',
                        '$this->Tratamiento_8',
                        '$this->Fecha_Tratamiento_9',
                        '$this->Tratamiento_9',
                        '$this->Fecha_Tratamiento_10',
                        '$this->Tratamiento_10',
                        '$this->Folio_Recibos_TX',
                        '$this->Numero_Recibos_Radiograficos',
                        '$this->Tratamiento_11'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{   
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo el llenado de una historia clinica de periodoncia",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaperiodoncia.php?exito=Se guardo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaperiodoncia.php?error=Ocurrio un error. '.mysqli_error($Conexion));
				echo "No se pudo guardar.";
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de formatos de historias clinicas de periodoncia en reporte en modo administrador
        
        public function Catalogo_Administrador_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas periodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas periodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//catalogo de formatos de historias clinicas de periodoncia en reporte en modo medico titular
        
        public function Catalogo_Medico_Titular_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia
                        WHERE IdParejaClinica = '$this->IdParejaClinica' AND
						Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia
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
						AND IdParejaClinica = '$this->IdParejaClinica' AND
						Aprobado = 0;";
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas periodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas periodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}   
	
		//catalogo de formatos de historias clinicas de periodoncia en reporte en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysql_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia
                         WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Historia_Clinica_Periodoncia
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
                        AND IdParejaClinica = '$this->IdParejaClinica';";
            endif;

			$Resultado = mysql_query($SQL) or die('Consulta fallida: '.mysql_error());

			$Num_Filas = mysql_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysql_fetch_array($Resultado, MYSQL_ASSOC)): ?>
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de historias clinicas periodoncia registradas todavía.":"No se encontro ningún formato de historias clinicas periodoncia en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysql_free_result($Resultado);

			// Cerrar la conexión
			mysql_close($Conexion);
		}   
	
		//obtener los datos de un formato de historia clinica de periodoncia
        
        public function Obtener_Formato()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "SELECT  *
                    FROM SIS_Listado_Historia_Clinica_Periodoncia
					WHERE IdHistoriaClinicaPeriodoncia = '$this->IdHistoriaClinicaPeriodoncia';";    
			
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
	
		//aprobar un formato de historia clinica de periodoncia
		
		public function Aprobar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Formato_Historia_Clinica_Periodoncia_Aprobar(
                        '$this->IdHistoriaClinicaPeriodoncia',
                        '$this->Aprobado'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{   
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("aprobo una historia clinica de periodoncia",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatohistoriaperiodoncia.php?exito=Se aprobo la historia clinica con exito');
			}else{
                header('Location: formatohistoriaperiodoncia.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	}
?>