<html>
<head>
  <meta charset="utf-8">
  <title>Formato de Indice y Preventivo de Operatoria</title>
  <style type="text/css">
    table th{
      text-align: center;
    }
    #contenido{
      border:1px solid #e3e3e3;
      margin: 0;
      padding:0px;
    }

    #contenido td{
      border:1px solid #e3e3e3;
      margin: 0;
      padding:3px;
    }

    .tabla th, .tabla td{
      text-align:center;
      padding:5px;
border:1px solid #e3e3e3;
    }

    .tabla th{
      background:1px solid #e3e3e3;
    }

    #firmas{
      text-align:center;
    }

    #firmas tr td{
      padding:20px 20px 0 20px;
    }
  </style>
</head>
<body>
  <?php include('../../core-saec/AccesoBD.php') ?>
  <?php include("../../core-saec/Formato_Indice_Preventivo_Operatoria.php"); ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <th style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </th>
        <th style="width:470px;">
          <h4>Formato de Indice y Preventivo de Operatoria</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </th>
        <th style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </th>
      </tr> 
    </table> 

      <?php 
            $Formato_Indice_Preventivo_Operatoria = new Formato_Indice_Preventivo_Operatoria();

            $Formato_Indice_Preventivo_Operatoria->IdIndicePreventivoOperatoria = $_GET['formato'];

			$Datos_Formato = $Formato_Indice_Preventivo_Operatoria->Obtener_Formato();

			$fecha_registro = $Datos_Formato['FechaRegistro'];
			$fecha_registro = date_create($fecha_registro);
			$fecha_registro = date_format($fecha_registro,'d-m-y');

			$dia=date('d');
			$mes=date('m');
			$ano=date('Y');

			$fecha_nacimiento = date_create($Datos_Formato['FechaNacimiento']);

			$dianac=date_format($fecha_nacimiento,'d');
			$mesnac=date_format($fecha_nacimiento,'m');
			$anonac=date_format($fecha_nacimiento,'Y');

			if (($mesnac == $mes) && ($dianac > $dia)) 
			{
				$ano=($ano-1); 
			}

			if ($mesnac > $mes)
			{
				$ano=($ano-1);
			}

			$Edad=($ano-$anonac);
          ?>
			
	  <h4>Datos del Paciente.</h4>

	  <table>
	  <tr>
	     <td><strong>Nombre:</strong></td>
	     <td><?php echo $Datos_Formato['NombrePaciente'].' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></td>
	  </tr>
	  <tr>
	     <td><strong>Fecha:</strong></td>
	     <td><?php echo $fecha_registro; ?></td>
	  </tr>
	  <tr>
	     <td><strong>Ocupación:</strong></td>
	     <td><?php echo $Datos_Formato['OcupacionPaciente']; ?></td>
	  </tr>
	  <tr>
	     <td><strong>Edad:</strong></td>
	     <td><?php echo $Datos_Formato['Estatura']; ?> Mts.</td>
	  </tr>
	  <tr>
	     <td><strong>Peso:</strong></td>
	     <td><?php echo $Datos_Formato['Peso']; ?> Kgs.</td>
	  </tr>
	  </table>

	  <h4>Índice de Higiene Oral Simplificado (IHOS).</h4>

	  <table class="tabla">
               <tr>
                  <th style="border:none;background:none;"></th>
                  <th style="border:none;background:none;"></th>
                  <th style="border:none;background:none;"></th>
                  <th style="border:none;background:none;"></th>
                  <th style="border:none;background:none;"></th>
                  <th style="border:none;background:none;"></th>
                  <th style="border:none;background:none;"></th>
	       </tr>
               <tr>
                      <th>Cálculo</th>
                      <td><?php echo $Datos_Formato['Calculo17_16']; ?></td>
                      <td><?php echo $Datos_Formato['Calculo11_21']; ?></td>
                      <td><?php echo $Datos_Formato['Calculo26_27']; ?></td>
                  </tr>
                  <tr>
                      <th>Placa</th>
                      <td><?php echo $Datos_Formato['Placa17_16']; ?></td>
                      <td><?php echo $Datos_Formato['Placa11_21']; ?></td>
                      <td><?php echo $Datos_Formato['Placa26_27']; ?></td>
                  </tr>
                  <tr>
                      <td></td>
                      <th>17 - 16</th>
                      <th>11 - 21</th>
                      <th>26 - 27</th>
                      <th>Índice de placa</th>
                      <th>Índice de cálculo</th>
                      <th>IHOS</th>
                  </tr>
                  <tr>
                      <td></td>
                      <th>47 - 46</th>
                      <th>41 - 31</th>
                      <th>36 - 37</th>
                      <td><?php echo $Datos_Formato['IndicePlaca']; ?></td>
                      <td><?php echo $Datos_Formato['IndiceCalculo']; ?></td>
                      <td><?php echo $Datos_Formato['IHOS']; ?></td>
                  </tr>
                  <tr>
                      <th>Placa</th>
                      <td><?php echo $Datos_Formato['Placa47_46']; ?></td>
                      <td><?php echo $Datos_Formato['Placa41_31']; ?></td>
                      <td><?php echo $Datos_Formato['Placa36_37']; ?></td>
                  </tr>
                  <tr>
                      <th>Cálculo</th>
                      <td><?php echo $Datos_Formato['Calculo47_46']; ?></td>
                      <td><?php echo $Datos_Formato['Calculo41_31']; ?></td>
                      <td><?php echo $Datos_Formato['Calculo36_37']; ?></td>
                  </tr>
           </table>
	       
	   <p><strong>Resultado:</strong>

           <?php switch ($Datos_Formato['IHOS_Nivel']) {
                 case 1:
                   echo "Adecuado";
                 break;
                 case 1:
                   echo "Aceptable";
                 break;
                 case 2:
                   echo "Deficiente";
                 break;
	   }?></p>

	   <h4>Índice de Caries Dental CPO Permanentes.</h4>

	   <table class="tabla">
                  <tr>
                    <th style="border:none;background:none;"></th>
		    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
		    <th style="border:none;background:none;"></th>
		    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['CPO_17']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_16']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_15']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_14']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_13']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_12']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_11']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_21']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_22']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_23']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_24']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_25']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_26']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_27']; ?></td>
                  </tr>
                  <tr>
                    <th>17</th>
                    <th>16</th>
                    <th>15</th>
                    <th>14</th>
                    <th>13</th>
                    <th>12</th>
                    <th>11</th>
                    <th>21</th>
                    <th>22</th>
                    <th>23</th>
                    <th>24</th>
                    <th>25</th>
                    <th>26</th>
                    <th>27</th>
                  </tr>
                  <tr>
                    <th>47</th>
                    <th>46</th>
                    <th>45</th>
                    <th>44</th>
                    <th>43</th>
                    <th>42</th>
                    <th>41</th>
                    <th>31</th>
                    <th>32</th>
                    <th>33</th>
                    <th>34</th>
                    <th>35</th>
                    <th>36</th>
                    <th>37</th>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['CPO_47']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_46']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_45']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_44']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_43']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_42']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_41']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_31']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_32']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_33']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_34']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_35']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_36']; ?></td>
                    <td><?php echo $Datos_Formato['CPO_37']; ?></td>
                  </tr>
              </table>

	      <table class="tabla">
                <thead>
                  <tr>
                    <th style="border:none;background:none;"></th>
		    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
                    <th style="border:none;background:none;"></th>
		    <th style="border:none;background:none;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th colspan="2"><label><strong>C</strong></label></th>
                  </tr>
                  <tr>
                    <th>CI</th>
                    <th>CC</th>
                    <th>P</th>
                    <th>O</th>
                    <th>CPO</th>
                    <th width="100">Total piezas examinadas</th>
                    <th>Índice CPO</th>
                    <th>S</th>
                  </tr>
                  <tr>
                    <td><?php echo $Datos_Formato['CI']; ?></td>
                    <td><?php echo $Datos_Formato['CC']; ?></td>
                    <td><?php echo $Datos_Formato['P']; ?></td>
                    <td><?php echo $Datos_Formato['O']; ?></td>
                    <td><?php echo $Datos_Formato['CPO']; ?></td>
                    <td><?php echo $Datos_Formato['TotalPiezasExaminadas']; ?></td>
                    <td><?php echo $Datos_Formato['IndiceCPO']; ?></td>
                    <td><?php echo $Datos_Formato['S']; ?></td>
                  </tr>
                </tbody>
              </table>

	      <h4>Valoración de Riesgo de Caries Dental.</h4>

	      <h5>1. ¿Cuantas comidas realiza al día?</h5>

	      <table>
                    <tr>
		      <td><strong>Desayuno:</strong></td>
                      <td><?php echo $Datos_Formato['Desayuno']; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Entre Comidas:</strong></td>
                      <td><?php echo $Datos_Formato['EntreComidas1']; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Comida Principal:</strong></td>
                      <td><?php echo $Datos_Formato['ComidaPrincipal']; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Entre Comidas:</strong></td>
                      <td><?php echo $Datos_Formato['EntreComidas2']; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Cena:</strong></td>
                      <td><?php echo $Datos_Formato['Cena']; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Entre Comidas:</strong></td>
                      <td><?php echo $Datos_Formato['EntreComidas3']; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Total:</strong></td>
                      <td><?php echo $Datos_Formato['Total1']; ?></td>
                    </tr>
              </table>

	      <h5>2. Exposición a azúcares</h5>

	      <table class="tabla">
                    <tr>
                      <th>Forma</th>
                      <th>Desayuno</th>
                      <th>Comida principal</th>
                      <th>Cena</th>
                      <th>Entre comidas</th>
                      <th style="border:none;background:none;"></th>
                    </tr>
                    <tr>
                      <td>Bebidas (sodas, jugos, te, café, etc.)</td>
                      <td><?php echo $Datos_Formato['BebidasDesayuno']; ?></td>
                      <td><?php echo $Datos_Formato['BebidasComidaPrincipal']; ?></td>
                      <td><?php echo $Datos_Formato['BebidasCena']; ?></td>
                      <td><?php echo $Datos_Formato['BebidasEntreComidas']; ?></td>
                    </tr>

                    <tr>
                      <td>Dulces, pasteles,  postres, etc.</td>
                      <td><?php echo $Datos_Formato['DulcesDesayuno']; ?></td>
                      <td><?php echo $Datos_Formato['DulcesComidaPrincipal']; ?></td>
                      <td><?php echo $Datos_Formato['DulcesCena']; ?></td>
                      <td><?php echo $Datos_Formato['DulcesEntreComidas']; ?></td>
                    </tr>

                    <tr>
                      <td>Pastas, papas, frutas dulces</td>
                      <td><?php echo $Datos_Formato['PastasDesayuno']; ?></td>
                      <td><?php echo $Datos_Formato['PastasComidaPrincipal']; ?></td>
                      <td><?php echo $Datos_Formato['PastasCena']; ?></td>
                      <td><?php echo $Datos_Formato['PastasEntreComidas']; ?></td>
                    </tr>

                    <tr>
                      <td>Jarabes, pastillas para la garganta</td>
                      <td><?php echo $Datos_Formato['JarabesDesayuno']; ?></td>
                      <td><?php echo $Datos_Formato['JarabesComidaPrincipal']; ?></td>
                      <td><?php echo $Datos_Formato['JarabesCena']; ?></td>
                      <td><?php echo $Datos_Formato['JarabesEntreComidas']; ?></td>
                    </tr>

                    <tr>
                      <th>Total</th>
                      <td><?php echo $Datos_Formato['TotalDesayuno1']; ?></td>
                      <td><?php echo $Datos_Formato['TotalComidaPrincipal2']; ?></td>
                      <td><?php echo $Datos_Formato['TotalCena3']; ?></td>
                      <td><?php echo $Datos_Formato['TotalEntreComidas4']; ?></td>
                      <td width="50"><?php echo $Datos_Formato['Total2']; ?></td>
                    </tr>
              </table>

	      <h5>Observación</h5>

	      <table>
	      <tr>
                      <td><strong>Baja:</strong></td>
                      <td>0 a 3 por día.</td>
              </tr>
	      <tr>
                      <td><strong>Media:</strong></td>
                      <td>4 a 7 por día.</td>
              </tr>
	      <tr>
                      <td><strong>Alta:</strong></td>
                      <td>8 o más por día.</td>
              </tr>
	      </table>

	      <h5>3. Alimentos no cariogénicos en la dieta</h5>

	      <table class="tabla">
                    <tr>
                      <th>Forma</th>
                      <th>Desayuno</th>
                      <th>Comida principal</th>
                      <th>Cena</th>
                      <th>Entre comidas</th>
                      <th style="border:none;background:none;"></th>
                    </tr>
                    <tr>
                      <td>Huevos, quesos, carnes y pescados</td>
                      <td><?php echo $Datos_Formato['CarneDesayuno']; ?></td>
                      <td><?php echo $Datos_Formato['CarneComidaPrincipal']; ?></td>
                      <td><?php echo $Datos_Formato['CarneCena']; ?></td>
                      <td><?php echo $Datos_Formato['CarneEntreComidas']; ?></td>
                    </tr>

                    <tr>
                      <td>Cereales y galletas integrales</td>
                      <td><?php echo $Datos_Formato['CerealesDesayuno']; ?></td>
                      <td><?php echo $Datos_Formato['CerealesComidaPrincipal']; ?></td>
                      <td><?php echo $Datos_Formato['CerealesCena']; ?></td>
                      <td><?php echo $Datos_Formato['CerealesEntreComidas']; ?></td>
                    </tr>

                    <tr>
                      <td>Verduras y vegetales</td>
                      <td><?php echo $Datos_Formato['VerdurasDesayuno']; ?></td>
                      <td><?php echo $Datos_Formato['VerdurasComidaPrincipal']; ?></td>
                      <td><?php echo $Datos_Formato['VerdurasCena']; ?></td>
                      <td><?php echo $Datos_Formato['VerdurasEntreComidas']; ?></td>
                    </tr>

                    <tr>
                      <td>Sustitutos de azúcar (p. ej. Esplenda)</td>
                      <td><?php echo $Datos_Formato['SustitutosAzucarDesayuno']; ?></td>
                      <td><?php echo $Datos_Formato['SustitutosAzucarComidaPrincipal']; ?></td>
                      <td><?php echo $Datos_Formato['SustitutosAzucarCena']; ?></td>
                      <td><?php echo $Datos_Formato['SustitutosAzucarEntreComidas']; ?></td>
                    </tr>

                    <tr>
                      <th>Total</th>
                      <td><?php echo $Datos_Formato['TotalDesayuno']; ?></td>
                      <td><?php echo $Datos_Formato['TotalComidaPrincipal']; ?></td>
                      <td><?php echo $Datos_Formato['TotalCena']; ?></td>
                      <td><?php echo $Datos_Formato['TotalEntreComidas']; ?></td>
                      <td width="50"><?php echo $Datos_Formato['Total3']; ?></td>
                    </tr>
              </table>

	      <h4>Factores de Riesgo.</h4>

	      <table class="tabla">
                  <thead>
                    <tr>
                      <th>Exposición a los azúcares</th>
                      <th>Alta</th>
                      <th>Media</th>
                      <th>Baja</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>Alimentación</td>
                      <td><?php echo ($Datos_Formato['Alimentacion'] == '1' ? "Deficiente":""); ?></td>
                      <td><?php echo ($Datos_Formato['Alimentacion'] == '2' ? "Aceptable":""); ?></td>
                      <td><?php echo ($Datos_Formato['Alimentacion'] == '3' ? "Adecuada":""); ?></td>
                    </tr>

                    <tr>
                      <td>Flujo salival </td>
                      <td><?php echo ($Datos_Formato['FlujoSalival'] == '1' ? "Escaso":""); ?></td>
                      <td><?php echo ($Datos_Formato['FlujoSalival'] == '2' ? "Normal":""); ?></td>
                      <td><?php echo ($Datos_Formato['FlujoSalival'] == '3' ? "Abundante":""); ?></td>
                    </tr>

                    <tr>
                      <td>Hábitos de higiene</td>
                      <td><?php echo ($Datos_Formato['HabitosHigiene'] == '1' ? "Deficiente":""); ?></td>
                      <td><?php echo ($Datos_Formato['HabitosHigiene'] == '2' ? "Aceptable":""); ?></td>
                      <td><?php echo ($Datos_Formato['HabitosHigiene'] == '3' ? "Adecuado":""); ?></td>
                    </tr>

                    <tr>
                      <td>Índice de placa</td>
                      <td><?php echo ($Datos_Formato['IndicePlacaNivel'] == '1' ? "Deficiente":""); ?></td>
                      <td><?php echo ($Datos_Formato['IndicePlacaNivel'] == '2' ? "Aceptable":""); ?></td>
                      <td><?php echo ($Datos_Formato['IndicePlacaNivel'] == '3' ? "Adecuado":""); ?></td>
                    </tr>

                    <tr>
                      <td>Atención dental regular</td>
                      <td><?php echo ($Datos_Formato['AtencionDentalRegular'] == '1' ? "No":""); ?></td>
                      <td></td>
                      <td><?php echo ($Datos_Formato['AtencionDentalRegular'] == '2' ? "Si":""); ?></td>
                    </tr>

                    <tr>
                      <td>Múltiples restauraciones y/o ortodoncia</td>
                      <td><?php echo ($Datos_Formato['MultiplesRestauracionesOrtodoncia'] == '1' ? "Si":""); ?></td>
                      <td></td>
                      <td><?php echo ($Datos_Formato['MultiplesRestauracionesOrtodoncia'] == '2' ? "No":""); ?></td>
                    </tr>

                    <tr>
                      <td>Enfermedades (p.ej. diabetes, bulimia)</td>
                      <td><?php echo ($Datos_Formato['Enfermedades'] == '1' ? "Si":""); ?></td>
                      <td></td>
                      <td><?php echo ($Datos_Formato['Enfermedades'] == '2' ? "No":""); ?></td>
                    </tr>

                    <tr>
                      <td>Antecedentes familiares de caries</td>
                      <td><?php echo ($Datos_Formato['AntecedentesFamiliaresCaries'] == '1' ? "Si":""); ?></td>
                      <td><?php echo ($Datos_Formato['AntecedentesFamiliaresCaries'] == '2' ? "No Sabe":""); ?></td>
                      <td><?php echo ($Datos_Formato['AntecedentesFamiliaresCaries'] == '3' ? "No":""); ?></td>
                    </tr>

                    <tr>
                      <th>Total</th>
                      <td><?php echo $Datos_Formato['TotalAlta']; ?></td>
                      <td><?php echo $Datos_Formato['TotalMedia']; ?></td>
                      <td><?php echo $Datos_Formato['TotalBaja']; ?></td>
                    </tr>
                </tbody>
              </table>

		      <p><strong>Consideración del nivel de riesgo de caries dental:</strong> 
		      <?php 
		      switch ($Datos_Formato['RiesgoCariesDental']) {
		      case 1:
			echo "Bajo";
			break;
		      case 2:
			echo "Medio";
			break;
		      case 3:
			echo "Alto";
			break;
		      }
                      ?></p>

	     <table id="firmas">
	  <tr>
	    <td><p>___________________________</p>
		Firma del Alumno
	    </td>
	    <td><p>___________________________</p>
		Firma del Maestro
	    </td>
	    <td><p>___________________________</p>
		Firma del Paciente
	    </td>
	  </tr>
      </table>

  </div>
</body>
</html>
