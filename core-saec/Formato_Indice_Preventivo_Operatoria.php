<?php class Formato_Indice_Preventivo_Operatoria extends AccesoBD
	{
		public $IdIndicePreventivoOperatoria;
        public $ParejaClinica;
        public $Paciente;
		public $Estatura;
		public $Peso;
		public $Edad;
		public $Ocupacion;
        public $Calculo17_16;
        public $Calculo11_21;
        public $Calculo26_27;
        public $Placa17_16;
        public $Placa11_21;
        public $Placa26_27;
        public $IndicePlaca;
        public $IndiceCalculo;
        public $IHOS;
        public $Placa47_46;
        public $Placa41_31;
        public $Placa36_37;
        public $Calculo47_46;
        public $Calculo41_31;
        public $Calculo36_37;
        public $IHOS_Nivel;
        public $CPO_17;
        public $CPO_16;
        public $CPO_15;
        public $CPO_14;
        public $CPO_13;
        public $CPO_12;
        public $CPO_11;
        public $CPO_21;
        public $CPO_22;
        public $CPO_23;
        public $CPO_24;
        public $CPO_25;
        public $CPO_26;
        public $CPO_27;
        public $CPO_47;
        public $CPO_46;
        public $CPO_45;
        public $CPO_44;
        public $CPO_43;
        public $CPO_42;
        public $CPO_41;
        public $CPO_31;
        public $CPO_32;
        public $CPO_33;
        public $CPO_34;
        public $CPO_35;
        public $CPO_36;
        public $CPO_37;
        public $CI;
        public $CC;
        public $P;
        public $O;
        public $CPO;
        public $TotalPiezasExaminadas;
        public $IndiceCPO;
        public $S;
        public $Desayuno;
        public $EntreComidas1;
        public $ComidaPrincipal;
        public $EntreComidas2;
        public $Cena;
        public $EntreComidas3;
        public $Total1;
        public $BebidasDesayuno;
        public $BebidasComidaPrincipal;
        public $BebidasCena;
        public $BebidasEntreComidas;
        public $DulcesDesayuno;
        public $DulcesComidaPrincipal;
        public $DulcesCena;
        public $DulcesEntreComidas;
        public $PastasDesayuno;
        public $PastasComidaPrincipal;
        public $PastasCena;
        public $PastasEntreComidas;
        public $JarabesDesayuno;
        public $JarabesComidaPrincipal;
        public $JarabesCena;
        public $JarabesEntreComidas;
        public $TotalDesayuno1;
        public $TotalComidaPrincipal2;
        public $TotalCena3;
        public $TotalEntreComidas4;
        public $Total2;
        public $CarneDesayuno;
        public $CarneComidaPrincipal;
        public $CarneCena;
        public $CarneEntreComidas;
        public $CerealesDesayuno;
        public $CerealesComidaPrincipal;
        public $CerealesCena;
        public $CerealesEntreComidas;
        public $VerdurasDesayuno;
        public $VerdurasComidaPrincipal;
        public $VerdurasCena;
        public $VerdurasEntreComidas;
        public $SustitutosAzucarDesayuno;
        public $SustitutosAzucarComidaPrincipal;
        public $SustitutosAzucarCena;
        public $SustitutosAzucarEntreComidas;
        public $TotalDesayuno;
        public $TotalComidaPrincipal;
        public $TotalCena;
        public $TotalEntreComidas;
        public $Total3;
        public $Alimentacion;
        public $FlujoSalival;
        public $HabitosHigiene;
        public $IndicePlacaNivel;
        public $AtencionDentalRegular;
        public $MultiplesRestauracionesOrtodoncia;
        public $Enfermedades;
        public $AntecedentesFamiliaresCaries;
        public $TotalAlta;
        public $TotalMedia;
        public $TotalBaja;
        public $RiesgoCariesDental;
        public $Aprobado;
        public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdIndicePreventivoOperatoria = null,
            $varParejaClinica = null,
            $varPaciente = null,
			$varEstatura = null,
			$varPeso = null,
			$varEdad = null,
			$varOcupacion = null,
            $varCalculo17_16 = null,
            $varCalculo11_21 = null,
            $varCalculo26_27 = null,
            $varPlaca17_16 = null,
            $varPlaca11_21 = null,
            $varPlaca26_27 = null,
            $varIndicePlaca = null,
            $varIndiceCalculo = null,
            $varIHOS = null,
            $varPlaca47_46 = null,
            $varPlaca41_31 = null,
            $varPlaca36_37 = null,
            $varCalculo47_46 = null,
            $varCalculo41_31 = null,
            $varCalculo36_37 = null,
            $varIHOS_Nivel = null,
            $varCPO_17 = null,
            $varCPO_16 = null,
            $varCPO_15 = null,
            $varCPO_14 = null,
            $varCPO_13 = null,
            $varCPO_12 = null,
            $varCPO_11 = null,
            $varCPO_21 = null,
            $varCPO_22 = null,
            $varCPO_23 = null,
            $varCPO_24 = null,
            $varCPO_25 = null,
            $varCPO_26 = null,
            $varCPO_27 = null,
            $varCPO_47 = null,
            $varCPO_46 = null,
            $varCPO_45 = null,
            $varCPO_44 = null,
            $varCPO_43 = null,
            $varCPO_42 = null,
            $varCPO_41 = null,
            $varCPO_31 = null,
            $varCPO_32 = null,
            $varCPO_33 = null,
            $varCPO_34 = null,
            $varCPO_35 = null,
            $varCPO_36 = null,
            $varCPO_37 = null,
            $varCI = null,
            $varCC = null,
            $varP = null,
            $varO = null,
            $varCPO = null,
            $varTotalPiezasExaminadas = null,
            $varIndiceCPO = null,
            $varS = null,
            $varDesayuno = null,
            $varEntreComidas1 = null,
            $varComidaPrincipal = null,
            $varEntreComidas2 = null,
            $varCena = null,
            $varEntreComidas3 = null,
            $varTotal1 = null,
            $varBebidasDesayuno = null,
            $varBebidasComidaPrincipal = null,
            $varBebidasCena = null,
            $varBebidasEntreComidas = null,
            $varDulcesDesayuno = null,
            $varDulcesComidaPrincipal = null,
            $varDulcesCena = null,
            $varDulcesEntreComidas = null,
            $varPastasDesayuno = null,
            $varPastasComidaPrincipal = null,
            $varPastasCena = null,
            $varPastasEntreComidas = null,
            $varJarabesDesayuno = null,
            $varJarabesComidaPrincipal = null,
            $varJarabesCena = null,
            $varJarabesEntreComidas = null,
            $varTotalDesayuno1 = null,
            $varTotalComidaPrincipal2 = null,
            $varTotalCena3 = null,
            $varTotalEntreComidas4 = null,
            $varTotal2 = null,
            $varCarneDesayuno = null,
            $varCarneComidaPrincipal = null,
            $varCarneCena = null,
            $varCarneEntreComidas = null,
            $varCerealesDesayuno = null,
            $varCerealesComidaPrincipal = null,
            $varCerealesCena = null,
            $varCerealesEntreComidas = null,
            $varVerdurasDesayuno = null,
            $varVerdurasComidaPrincipal = null,
            $varVerdurasCena = null,
            $varVerdurasEntreComidas = null,
            $varSustitutosAzucarDesayuno = null,
            $varSustitutosAzucarComidaPrincipal = null,
            $varSustitutosAzucarCena = null,
            $varSustitutosAzucarEntreComidas = null,
            $varTotalDesayuno = null,
            $varTotalComidaPrincipal = null,
            $varTotalCena = null,
            $varTotalEntreComidas = null,
            $varTotal3 = null,
            $varAlimentacion = null,
            $varFlujoSalival = null,
            $varHabitosHigiene = null,
            $varIndicePlacaNivel = null,
            $varAtencionDentalRegular = null,
            $varMultiplesRestauracionesOrtodoncia = null,
            $varEnfermedades = null,
            $varAntecedentesFamiliaresCaries = null,
            $varTotalAlta = null,
            $varTotalMedia = null,
            $varTotalBaja = null,
            $varRiesgoCariesDental = null,
            $varAprobado = null,
            $varEstatus = null,
            $varFechaRegistro = null
		)
		{
			$this->IdIndicePreventivoOperatoria = $varIdIndicePreventivoOperatoria;
			$this->ParejaClinica = $varParejaClinica;
			$this->Paciente = $varPaciente;
			$this->Estatura = $varEstatura;
			$this->Peso = $varPeso;
			$this->Edad = $varEdad;
			$this->Ocupacion = $varOcupacion;
            $this->Calculo17_16 = $varCalculo17_16;
            $this->Calculo11_21 = $varCalculo11_21;
            $this->Calculo26_27 = $varCalculo26_27;
            $this->Placa17_16 = $varPlaca17_16;
            $this->Placa11_21 = $varPlaca11_21;
            $this->Placa26_27 = $varPlaca26_27;
            $this->IndicePlaca = $varIndicePlaca;
            $this->IndiceCalculo = $varIndiceCalculo;
            $this->IHOS = $varIHOS;
            $this->Placa47_46 = $varPlaca47_46;
            $this->Placa41_31 = $varPlaca41_31;
            $this->Placa36_37 = $varPlaca36_37;
            $this->Calculo47_46 = $varCalculo47_46;
            $this->Calculo41_31 = $varCalculo41_31;
            $this->Calculo36_37 = $varCalculo36_37;
            $this->IHOS_Nivel = $varIHOS_Nivel;
            $this->CPO_17 = $varCPO_17;
            $this->CPO_16 = $varCPO_16;
            $this->CPO_15 = $varCPO_15;
            $this->CPO_14 = $varCPO_14;
            $this->CPO_13 = $varCPO_13;
            $this->CPO_12 = $varCPO_12;
            $this->CPO_11 = $varCPO_11;
            $this->CPO_21 = $varCPO_21;
            $this->CPO_22 = $varCPO_22;
            $this->CPO_23 = $varCPO_23;
            $this->CPO_24 = $varCPO_24;
            $this->CPO_25 = $varCPO_25;
            $this->CPO_26 = $varCPO_26;
            $this->CPO_27 = $varCPO_27;
            $this->CPO_47 = $varCPO_47;
            $this->CPO_46 = $varCPO_46;
            $this->CPO_45 = $varCPO_45;
            $this->CPO_44 = $varCPO_44;
            $this->CPO_43 = $varCPO_43;
            $this->CPO_42 = $varCPO_42;
            $this->CPO_41 = $varCPO_41;
            $this->CPO_31 = $varCPO_31;
            $this->CPO_32 = $varCPO_32;
            $this->CPO_33 = $varCPO_33;
            $this->CPO_34 = $varCPO_34;
            $this->CPO_35 = $varCPO_35;
            $this->CPO_36 = $varCPO_36;
            $this->CPO_37 = $varCPO_37;
            $this->CI = $varCI;
            $this->CC = $varCC;
            $this->P = $varP;
            $this->O = $varO;
            $this->CPO = $varCPO;
            $this->TotalPiezasExaminadas = $varTotalPiezasExaminadas;
            $this->IndiceCPO = $varIndiceCPO;
            $this->S = $varS;
            $this->Desayuno = $varDesayuno;
            $this->EntreComidas1 = $varEntreComidas1;
            $this->ComidaPrincipal = $varComidaPrincipal;
            $this->EntreComidas2 = $varEntreComidas2;
            $this->Cena = $varCena;
            $this->EntreComidas3 = $varEntreComidas3;
            $this->Total1 = $varTotal1;
            $this->BebidasDesayuno = $varBebidasDesayuno;
            $this->BebidasComidaPrincipal = $varBebidasComidaPrincipal;
            $this->BebidasCena = $varBebidasCena;
            $this->BebidasEntreComidas = $varBebidasEntreComidas;
            $this->DulcesDesayuno = $varDulcesDesayuno;
            $this->DulcesComidaPrincipal = $varDulcesComidaPrincipal;
            $this->DulcesCena = $varDulcesCena;
            $this->DulcesEntreComidas = $varDulcesEntreComidas;
            $this->PastasDesayuno = $varPastasDesayuno;
            $this->PastasComidaPrincipal = $varPastasComidaPrincipal;
            $this->PastasCena = $varPastasCena;
            $this->PastasEntreComidas = $varPastasEntreComidas;
            $this->JarabesDesayuno = $varJarabesDesayuno;
            $this->JarabesComidaPrincipal = $varJarabesComidaPrincipal;
            $this->JarabesCena = $varJarabesCena;
            $this->JarabesEntreComidas = $varJarabesEntreComidas;
            $this->TotalDesayuno1 = $varTotalDesayuno1;
            $this->TotalComidaPrincipal2 = $varTotalComidaPrincipal2;
            $this->TotalCena3 = $varTotalCena3;
            $this->TotalEntreComidas4 = $varTotalEntreComidas4;
            $this->Total2 = $varTotal2;
            $this->CarneDesayuno = $varCarneDesayuno;
            $this->CarneComidaPrincipal = $varCarneComidaPrincipal;
            $this->CarneCena = $varCarneCena;
            $this->CarneEntreComidas = $varCarneEntreComidas;
            $this->CerealesDesayuno = $varCerealesDesayuno;
            $this->CerealesComidaPrincipal = $varCerealesComidaPrincipal;
            $this->CerealesCena = $varCerealesCena;
            $this->CerealesEntreComidas = $varCerealesEntreComidas;
            $this->VerdurasDesayuno = $varVerdurasDesayuno;
            $this->VerdurasComidaPrincipal = $varVerdurasComidaPrincipal;
            $this->VerdurasCena = $varVerdurasCena;
            $this->VerdurasEntreComidas = $varVerdurasEntreComidas;
            $this->SustitutosAzucarDesayuno = $varSustitutosAzucarDesayuno;
            $this->SustitutosAzucarComidaPrincipal = $varSustitutosAzucarComidaPrincipal;
            $this->SustitutosAzucarCena = $varSustitutosAzucarCena;
            $this->SustitutosAzucarEntreComidas = $varSustitutosAzucarEntreComidas;
            $this->TotalDesayuno = $varTotalDesayuno;
            $this->TotalComidaPrincipal = $varTotalComidaPrincipal;
            $this->TotalCena = $varTotalCena;
            $this->TotalEntreComidas = $varTotalEntreComidas;
            $this->Total3 = $varTotal3;
            $this->Alimentacion = $varAlimentacion;
            $this->FlujoSalival = $varFlujoSalival;
            $this->HabitosHigiene = $varHabitosHigiene;
            $this->IndicePlacaNivel = $varIndicePlacaNivel;
            $this->AtencionDentalRegular = $varAtencionDentalRegular;
            $this->MultiplesRestauracionesOrtodoncia = $varMultiplesRestauracionesOrtodoncia;
            $this->Enfermedades = $varEnfermedades;
            $this->AntecedentesFamiliaresCaries = $varAntecedentesFamiliaresCaries;
            $this->TotalAlta = $varTotalAlta;
            $this->TotalMedia = $varTotalMedia;
            $this->TotalBaja = $varTotalBaja;
            $this->RiesgoCariesDental = $varRiesgoCariesDental;
            $this->Aprobado = $varAprobado;
            $this->Estatus = $varEstatus;
            $this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de formatos de indice preventivo de operatoria en modo administrador

		public function Catalogo_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria
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
						<td><a href="formatoindicepreventivooperatoria-ver.php?formato=<?php echo $Linea['IdIndicePreventivoOperatoria']; ?>" class="btn btn-institucional">Ver Historia Clinica</a></td>								<td><a href="reportes/formatoindicepreventivooperatoria-generar-pdf.php?formato=<?php echo $Linea['IdIndicePreventivoOperatoria']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de indice preventivo de operatoria registradas todavía.":"No se encontro ningún formato de indice preventivo de operatoria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de formatos de indice preventivo de operatoria en modo medico titular
        
        public function Catalogo_Medico_Titular($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria
                        WHERE IdParejaClinica = '$this->ParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria
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
                        AND IdParejaClinica = '$this->ParejaClinica' AND Aprobado = 0;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['NombrePaciente'].' '.$Linea['ApellidoPaternoPaciente'].' '.$Linea['ApellidoPaternoPaciente']; ?></td>
						<td><?php echo $Linea['NombreAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1'].' '.$Linea['ApellidoPaternoAlumnoOpAs1']; ?> y
                            <?php echo $Linea['NombreAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2'].' '.$Linea['ApellidoPaternoAlumnoOpAs2']; ?></td>
                        <td><a href="formatoindicepreventivooperatoria-ver.php?formato=<?php echo $Linea['IdIndicePreventivoOperatoria']; ?>" class="btn btn-institucional">Ver Historia Clinica</a></td>
			<td><a href="reportes/formatoindicepreventivooperatoria-generar-pdf.php?formato=<?php echo $Linea['IdIndicePreventivoOperatoria']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de indice preventivo de operatoria registradas todavía.":"No se encontro ningún formato de indice preventivo de operatoria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de formatos de indice preventivo de operatoria en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria
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
						<td><a href="formatoindicepreventivooperatoria-ver.php?formato=<?php echo $Linea['IdIndicePreventivoOperatoria']; ?>" class="btn btn-institucional">Ver Historia Clinica</a></td>
						<td><a href="reportes/formatoindicepreventivooperatoria-generar-pdf.php?formato=<?php echo $Linea['IdIndicePreventivoOperatoria']; ?>" class="btn btn-institucional" target="blank">Generar PDF</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar == null ? "No hay formatos de indice preventivo de operatoria registradas todavía.":"No se encontro ningún formato de indice preventivo de operatoria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de formatos de indice preventivo de operatoria en reportes en modo administrador
        
        public function Catalogo_Administrador_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de indice preventivo de operatoria registradas todavía.":"No se encontro ningún formato de indice preventivo de operatoria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de formatos de indice preventivo de operatoria en reportes en modo medico titular
        
        public function Catalogo_Medico_Titular_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria
                        WHERE IdParejaClinica = '$this->ParejaClinica' AND Aprobado = 0;";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria
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
                        AND IdParejaClinica = '$this->ParejaClinica' AND Aprobado = 0;";
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de indice preventivo de operatoria registradas todavía.":"No se encontro ningún formato de indice preventivo de operatoria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		} 
	
		//catalogo de formatos de indice preventivo de operatoria en reportes en modo alumno operador/asistente
        
        public function Catalogo_Alumno_Op_As_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria
                        WHERE IdParejaClinica = '$this->IdParejaClinica';";
            else:
                $SQL = "SELECT  *
                        FROM SIS_Listado_Indice_Preventivo_Operatoria
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
					<td colspan="2"><?php echo ($Buscar == null ? "No hay formatos de indice preventivo de operatoria registradas todavía.":"No se encontro ningún formato de indice preventivo de operatoria en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
        
		//dar de alta un formato de indice preventivo de operatoria
	
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "CALL Formato_Indice_Preventivo_Operatoria_Alta(
                        '$this->ParejaClinica',
                        '$this->Paciente',
						'$this->Estatura',
						'$this->Peso',
						'$this->Edad',
						'$this->Ocupacion',
                        '$this->Calculo17_16',
                        '$this->Calculo11_21',
                        '$this->Calculo26_27',
                        '$this->Placa17_16',
                        '$this->Placa11_21',
                        '$this->Placa26_27',
                        '$this->IndicePlaca',
                        '$this->IndiceCalculo',
                        '$this->IHOS',
                        '$this->Placa47_46',
                        '$this->Placa41_31',
                        '$this->Placa36_37',
                        '$this->Calculo47_46',
                        '$this->Calculo41_31',
                        '$this->Calculo36_37',
                        '$this->IHOS_Nivel',
                        '$this->CPO_17',
                        '$this->CPO_16',
                        '$this->CPO_15',
                        '$this->CPO_14',
                        '$this->CPO_13',
                        '$this->CPO_12',
                        '$this->CPO_11',
                        '$this->CPO_21',
                        '$this->CPO_22',
                        '$this->CPO_23',
                        '$this->CPO_24',
                        '$this->CPO_25',
                        '$this->CPO_26',
                        '$this->CPO_27',
                        '$this->CPO_47',
                        '$this->CPO_46',
                        '$this->CPO_45',
                        '$this->CPO_44',
                        '$this->CPO_43',
                        '$this->CPO_42',
                        '$this->CPO_41',
                        '$this->CPO_31',
                        '$this->CPO_32',
                        '$this->CPO_33',
                        '$this->CPO_34',
                        '$this->CPO_35',
                        '$this->CPO_36',
                        '$this->CPO_37',
                        '$this->CI',
                        '$this->CC',
                        '$this->P',
                        '$this->O',
                        '$this->CPO',
                        '$this->TotalPiezasExaminadas',
                        '$this->IndiceCPO',
                        '$this->S',
                        '$this->Desayuno',
                        '$this->EntreComidas1',
                        '$this->ComidaPrincipal',
                        '$this->EntreComidas2',
                        '$this->Cena',
                        '$this->EntreComidas3',
                        '$this->Total1',
                        '$this->BebidasDesayuno',
                        '$this->BebidasComidaPrincipal',
                        '$this->BebidasCena',
                        '$this->BebidasEntreComidas',
                        '$this->DulcesDesayuno',
                        '$this->DulcesComidaPrincipal',
                        '$this->DulcesCena',
                        '$this->DulcesEntreComidas',
                        '$this->PastasDesayuno',
                        '$this->PastasComidaPrincipal',
                        '$this->PastasCena',
                        '$this->PastasEntreComidas',
                        '$this->JarabesDesayuno',
                        '$this->JarabesComidaPrincipal',
                        '$this->JarabesCena',
                        '$this->JarabesEntreComidas',
                        '$this->TotalDesayuno1',
                        '$this->TotalComidaPrincipal2',
                        '$this->TotalCena3',
                        '$this->TotalEntreComidas4',
                        '$this->Total2',
                        '$this->CarneDesayuno',
                        '$this->CarneComidaPrincipal',
                        '$this->CarneCena',
                        '$this->CarneEntreComidas',
                        '$this->CerealesDesayuno',
                        '$this->CerealesComidaPrincipal',
                        '$this->CerealesCena',
                        '$this->CerealesEntreComidas',
                        '$this->VerdurasDesayuno',
                        '$this->VerdurasComidaPrincipal',
                        '$this->VerdurasCena',
                        '$this->VerdurasEntreComidas',
                        '$this->SustitutosAzucarDesayuno',
                        '$this->SustitutosAzucarComidaPrincipal',
                        '$this->SustitutosAzucarCena',
                        '$this->SustitutosAzucarEntreComidas',
                        '$this->TotalDesayuno',
                        '$this->TotalComidaPrincipal',
                        '$this->TotalCena',
                        '$this->TotalEntreComidas',
                        '$this->Total3',
                        '$this->Alimentacion',
                        '$this->FlujoSalival',
                        '$this->HabitosHigiene',
                        '$this->IndicePlacaNivel',
                        '$this->AtencionDentalRegular',
                        '$this->MultiplesRestauracionesOrtodoncia',
                        '$this->Enfermedades',
                        '$this->AntecedentesFamiliaresCaries',
                        '$this->TotalAlta',
                        '$this->TotalMedia',
                        '$this->TotalBaja',
                        '$this->RiesgoCariesDental'
					);";
            
            echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{    
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo el llenado de formato de indice preventivo de operatoria",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatoindicepreventivooperatoria.php?exito=Se guardo el area con exito');
			}else{
                header('Location: formatoindicepreventivooperatoria.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de un formato de indice preventivo de operatoria
        
        public function Obtener_Formato()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "SELECT  *
                    FROM SIS_Listado_Indice_Preventivo_Operatoria
                    WHERE IdIndicePreventivoOperatoria = '$this->IdIndicePreventivoOperatoria';";

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
	
		//aprobar un formato de indice preventivo de operatoria
        
        public function Aprobar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "CALL Formato_Indice_Preventivo_Operatoria_Aprobar(
                '$this->IdIndicePreventivoOperatoria',
                '$this->Aprobado'
            );";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{  
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("aprobo un formato de indice preventivo de operatoria",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: formatoindicepreventivooperatoria.php?mensaje=Se aprobo la historia clinica con exito');
			}else{
                header('Location: formatoindicepreventivooperatoria.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>