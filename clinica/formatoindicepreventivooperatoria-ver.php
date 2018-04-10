<?php include("../header2.php"); ?>

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Formato_Indice_Preventivo_Operatoria.php"); ?>

        <div class="span9">

        <h2>Formato de Índice y Preventivo de Operatoria</h2>

        <div class="well">
            
          <form method="post" action="validacion_formatoindicepreventivooperatoria.php">
        
        <input type="hidden" id="historia_clinica" name="historia_clinica" value="<?php echo $_GET['formato']; ?>">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab1">Datos del Paciente</a></li>
            <li><a href="#tab2">Índice de Higiene Oral Simplificado (IHOS)</a></li>
            <li><a href="#tab3">Índice de Caries Dental CPO Permanentes</a></li>
            <li><a href="#tab4">Valoración de Riesgo de Caries Dental</a></li>
            <li><a href="#tab5">Factores de Riesgo</a></li>
          </ul>
            
          <?php 
            $Formato_Indice_Preventivo_Operatoria = new Formato_Indice_Preventivo_Operatoria();

            $Formato_Indice_Preventivo_Operatoria->IdIndicePreventivoOperatoria = $_GET['formato'];

			$Datos_Formato = $Formato_Indice_Preventivo_Operatoria->Obtener_Formato();
			//fecha de registro de la historia clinica

			$fecha_registro = $Datos_Formato['FechaRegistro'];
			$fecha_registro = date_create($fecha_registro);
			$fecha_registro = date_format($fecha_registro,'d-m-y');

			//calcular edad del paciente

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
 
          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <h2>Datos del Paciente.</h2>
              <br>
              <div class="row"> 
                <div class="span4"> 
                  <label><strong>Nombre: </strong></label>
                  <label><?php echo $Datos_Formato['NombrePaciente'].' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></label>
                </div> 
                <div class="span2">
                  <label><strong>Fecha: </strong>
                  <label><?php echo $fecha_registro; ?></label>
                </div>
              </div>

              <br />
              
              <div class="row"> 
                <div class="span2"> 
                  <label><strong>Ocupación:</strong></label>
                  <label><?php echo $Datos_Formato['OcupacionPaciente']; ?></label>
                </div> 
                <div class="span2">
                  <label><strong>Edad: </strong></label>
                  <label><?php echo $Edad; ?> Año(s)</label>
                </div>
              </div>
              <br />
              <div class="row">
                <div class="span1"> 
                  <label><strong>Estatura: </strong></label>
                  <label><?php echo  $Datos_Formato['Estatura']; ?> Mts.</label>
                </div> 
                <div class="span1"> 
                  <label><strong>Peso: </strong></label>
                  <label><?php echo $Datos_Formato['Peso']; ?> Kgs.</label> 
                </div>

              </div>
            </div><!-- fin tab1 -->

            <div class="tab-pane" id="tab2">
              <h2>Índice de Higiene Oral Simplificado (IHOS).</h2>

              <table class="table table-striped">
                <thead>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                      <td>Cálculo</td>
                      <td><input type="text" style="width:50px;" id="calculo17_16" name="calculo17_16" value="<?php echo $Datos_Formato['Calculo17_16']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="calculo11_21" name="calculo11_21" value="<?php echo $Datos_Formato['Calculo11_21']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="calculo26_27" name="calculo26_27" value="<?php echo $Datos_Formato['Calculo26_27']; ?>"></td>
                  </tr>
                  <tr>
                      <td>Placa</td>
                      <td><input type="text" style="width:50px;" id="placa17_16" name="placa17_16" value="<?php echo $Datos_Formato['Placa17_16']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="placa11_21" name="placa11_21" value="<?php echo $Datos_Formato['Placa11_21']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="placa26_27" name="placa26_27" value="<?php echo $Datos_Formato['Placa26_27']; ?>"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>17 - 16</td>
                      <td>11 - 21</td>
                      <td>26 - 27</td>
                      <td>Índice de placa</td>
                      <td>Índice de cálculo</td>
                      <td>IHOS</td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>47 - 46</td>
                      <td>41 - 31</td>
                      <td>36 - 37</td>
                      <td><input type="text" style="width:50px;" id="indice-placa" name="indice-placa" value="<?php echo $Datos_Formato['IndicePlaca']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="indice-calculo" name="indice-calculo" value="<?php echo $Datos_Formato['IndiceCalculo']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="ihos" name="ihos" value="<?php echo $Datos_Formato['IHOS']; ?>"></td>
                  </tr>
                  <tr>
                      <td>Placa</td>
                      <td><input type="text" style="width:50px;" id="placa47_46" name="placa47_46" value="<?php echo $Datos_Formato['Placa47_46']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="placa41_31" name="placa41_31" value="<?php echo $Datos_Formato['Placa41_31']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="placa36_37" name="placa36_37" value="<?php echo $Datos_Formato['Placa36_37']; ?>"></td>
                  </tr>
                  <tr>
                      <td>Cálculo</td>
                      <td><input type="text" style="width:50px;" id="calculo47_46" name="calculo47_46" value="<?php echo $Datos_Formato['Calculo47_46']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="calculo41_31" name="calculo41_31" value="<?php echo $Datos_Formato['Calculo41_31']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="calculo36_37" name="calculo36_37" value="<?php echo $Datos_Formato['Calculo36_37']; ?>"></td>
                  </tr>
                </tbody>
              </table>

              <div class="row"> 
                <div class="span2"> 
                  <label><strong>Adecuado 0.0 – 1.2</strong>
                  <input type="radio" name="ihos-nivel" id="ihos-nivel" value="1" <?php echo ($Datos_Formato['IHOS_Nivel'] == "1" ? "checked":""); ?>></label> 
                </div>
                <div class="span2"> 
                  <label><strong>Aceptable 1.3 – 3.0</strong> 
                  <input type="radio" id="ihos-nivel" name="ihos-nivel" value="2" <?php echo ($Datos_Formato['IHOS_Nivel'] == "2" ? "checked":""); ?>></label> 
                </div> 
                <div class="span2"> 
                  <label><strong>Deficiente 3.1 – 6.0</strong>                         <input type="radio" id="ihos-nivel" name="ihos-nivel" value="3" <?php echo ($Datos_Formato['IHOS_Nivel'] == "3" ? "checked":""); ?>></label> 
                </div>
              </div>

            </div><!-- fin tab2 -->

            <div class="tab-pane" id="tab3">
              <h2>Índice de Caries Dental CPO Permanentes.</h2>
              <br>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" style="width:35%;" id="cpo_17" name="cpo_17" value="<?php echo $Datos_Formato['CPO_17']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_16" name="cpo_16" value="<?php echo $Datos_Formato['CPO_16']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_15" name="cpo_15" value="<?php echo $Datos_Formato['CPO_15']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_14" name="cpo_14" value="<?php echo $Datos_Formato['CPO_14']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_13" name="cpo_13" value="<?php echo $Datos_Formato['CPO_13']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_12" name="cpo_12" value="<?php echo $Datos_Formato['CPO_12']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_11" name="cpo_11" value="<?php echo $Datos_Formato['CPO_11']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_21" name="cpo_21" value="<?php echo $Datos_Formato['CPO_21']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_22" name="cpo_22" value="<?php echo $Datos_Formato['CPO_22']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_23" name="cpo_23" value="<?php echo $Datos_Formato['CPO_23']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_24" name="cpo_24" value="<?php echo $Datos_Formato['CPO_24']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_25" name="cpo_25" value="<?php echo $Datos_Formato['CPO_25']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_26" name="cpo_26" value="<?php echo $Datos_Formato['CPO_26']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_27" name="cpo_27" value="<?php echo $Datos_Formato['CPO_27']; ?>"></td>
                  </tr>
                  <tr>
                    <td>17</td>
                    <td>16</td>
                    <td>15</td>
                    <td>14</td>
                    <td>13</td>
                    <td>12</td>
                    <td>11</td>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                  </tr>
                  <tr>
                    <td>47</td>
                    <td>46</td>
                    <td>45</td>
                    <td>44</td>
                    <td>43</td>
                    <td>42</td>
                    <td>41</td>
                    <td>31</td>
                    <td>32</td>
                    <td>33</td>
                    <td>34</td>
                    <td>35</td>
                    <td>36</td>
                    <td>37</td>
                  </tr>
                  <tr>
                    <td><input type="text" style="width:35%;" id="cpo_47" name="cpo_47" value="<?php echo $Datos_Formato['CPO_47']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_46" name="cpo_46" value="<?php echo $Datos_Formato['CPO_46']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_45" name="cpo_45" value="<?php echo $Datos_Formato['CPO_45']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_44" name="cpo_44" value="<?php echo $Datos_Formato['CPO_44']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_43" name="cpo_43" value="<?php echo $Datos_Formato['CPO_43']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_42" name="cpo_42" value="<?php echo $Datos_Formato['CPO_42']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_41" name="cpo_41" value="<?php echo $Datos_Formato['CPO_41']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_31" name="cpo_31" value="<?php echo $Datos_Formato['CPO_31']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_32" name="cpo_32" value="<?php echo $Datos_Formato['CPO_32']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_33" name="cpo_33" value="<?php echo $Datos_Formato['CPO_33']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_34" name="cpo_34" value="<?php echo $Datos_Formato['CPO_34']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_35" name="cpo_35" value="<?php echo $Datos_Formato['CPO_35']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_36" name="cpo_36" value="<?php echo $Datos_Formato['CPO_36']; ?>"></td>
                    <td><input type="text" style="width:35%;" id="cpo_37" name="cpo_37" value="<?php echo $Datos_Formato['CPO_37']; ?>"></td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th colspan="2" style="text-align: center;"><label><strong>C</strong></label></th>
                  </tr>
                  <tr>
                    <th style="text-align: center;">CI</th>
                    <th style="text-align: center;">CC</th>
                    <th style="text-align: center;">P</th>
                    <th style="text-align: center;">O</th>
                    <th style="text-align: center;">CPO</th>
                    <th style="text-align: center;">Total piezas examinadas</th>
                    <th style="text-align: center;">Índice CPO</th>
                    <th style="text-align: center;">S</th>
                  </tr>
                  <tr>
                    <td style="text-align: center;"><input type="text" style="width:35%;" id="ci" name="ci" value="<?php echo $Datos_Formato['CI']; ?>"><center></center></td>
                    <td style="text-align: center;"><input type="text" style="width:35%;" id="cc" name="cc" value="<?php echo $Datos_Formato['CC']; ?>"><center></center></td>
                    <td style="text-align: center;"><input type="text" style="width:35%;" id="p" name="p" value="<?php echo $Datos_Formato['P']; ?>"><center></center></td>
                    <td style="text-align: center;"><input type="text" style="width:35%;" id="o" name="o" value="<?php echo $Datos_Formato['O']; ?>"><center></center></td>
                    <td style="text-align: center;"><input type="text" style="width:35%;" id="cpo" name="cpo" value="<?php echo $Datos_Formato['CPO']; ?>"><center></center></td>
                    <td style="text-align: center;"><input type="text" style="width:35%;" id="total-piezas-examinadas" name="total-piezas-examinadas" value="<?php echo $Datos_Formato['TotalPiezasExaminadas']; ?>"><center></center></td>
                    <td style="text-align: center;"><input type="text" style="width:35%;" id="indice-cpo" name="indice-cpo" value="<?php echo $Datos_Formato['IndiceCPO']; ?>"><center></center></td>
                    <td style="text-align: center;"><input type="text" style="width:35%;" id="s" name="s" value="<?php echo $Datos_Formato['S']; ?>"><center></center></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- fin tab3 -->

            <div class="tab-pane" id="tab4">
              <h2>Valoración de Riesgo de Caries Dental.</h2>
              <br>
              <label><strong>1. ¿Cuantas comidas realiza al día?</strong></label> 
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Desayuno</td>
                      <td><input type="text" style="width:50px;" id="desayuno" name="desayuno" value="<?php echo $Datos_Formato['Desayuno']; ?>"></td>
                    </tr>
                    <tr>
                      <td>Entre Comidas</td>
                      <td><input type="text" style="width:50px;" id="entre-comidas1" name="entre-comidas1" value="<?php echo $Datos_Formato['EntreComidas1']; ?>"></td>
                    </tr>
                    <tr>
                      <td>Comida Principal</td>
                      <td><input type="text" style="width:50px;" id="comida-principal" name="comida-principal" value="<?php echo $Datos_Formato['ComidaPrincipal']; ?>"></td>
                    </tr>
                    <tr>
                      <td>Entre Comidas</td>
                      <td><input type="text" style="width:50px;" id="entre-comidas2" name="entre-comidas2" value="<?php echo $Datos_Formato['EntreComidas2']; ?>"></td>
                    </tr>
                    <tr>
                      <td>Cena</td>
                      <td><input type="text" style="width:50px;" id="cena" name="cena" value="<?php echo $Datos_Formato['Cena']; ?>"></td>
                    </tr>
                    <tr>
                      <td>Entre Comidas</td>
                      <td><input type="text" style="width:50px;" id="entre-comidas3" name="entre-comidas3" value="<?php echo $Datos_Formato['EntreComidas3']; ?>"></td>
                    </tr>
                    <tr>
                      <td>Total</td>
                      <td><input type="text" style="width:50px;" id="total1" name="total1" value="<?php echo $Datos_Formato['Total1']; ?>"></td>
                    </tr>
                </tbody>
              </table>
              
              <br><br>

              <div class="row">
                <div class="span3">
                <label><strong>2. Exposición a azúcares</strong></label>
                </div>
              </div>
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Forma</th>
                      <th>Desayuno</th>
                      <th>Comida principal</th>
                      <th>Cena</th>
                      <th>Entre comidas</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>Bebidas (sodas, jugos, te, café, etc.)</td>
                      <td><input type="text" style="width:50px;" id="bebidas-desayuno" name="bebidas-desayuno" value="<?php echo $Datos_Formato['BebidasDesayuno']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="bebidas-comida-principal" name="bebidas-comida-principal" value="<?php echo $Datos_Formato['BebidasComidaPrincipal']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="bebidas-cena" name="bebidas-cena" value="<?php echo $Datos_Formato['BebidasCena']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="bebidas-entre-comidas" name="bebidas-entre-comidas" value="<?php echo $Datos_Formato['BebidasEntreComidas']; ?>"></td>
                    </tr>

                    <tr>
                      <td>Dulces, pasteles,  postres, etc.</td>
                      <td><input type="text" style="width:50px;" id="dulces-desayuno" name="dulces-desayuno" value="<?php echo $Datos_Formato['DulcesDesayuno']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="dulces-comida-principal" name="dulces-comida-principal" value="<?php echo $Datos_Formato['DulcesComidaPrincipal']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="dulces-cena" name="dulces-cena" value="<?php echo $Datos_Formato['DulcesCena']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="dulces-entre-comidas" name="dulces-entre-comidas" value="<?php echo $Datos_Formato['DulcesEntreComidas']; ?>"></td>
                    </tr>

                    <tr>
                      <td>Pastas, papas, frutas dulces</td>
                      <td><input type="text" style="width:50px;" id="pastas-desayuno" name="pastas-desayuno" value="<?php echo $Datos_Formato['PastasDesayuno']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="pastas-comida-principal" name="pastas-comida-principal" value="<?php echo $Datos_Formato['PastasComidaPrincipal']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="pastas-cena" name="pastas-cena" value="<?php echo $Datos_Formato['PastasCena']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="pastas-entre-comidas" name="pastas-entre-comidas" value="<?php echo $Datos_Formato['PastasEntreComidas']; ?>"></td>
                    </tr>

                    <tr>
                      <td>Jarabes, pastillas para la garganta</td>
                      <td><input type="text" style="width:50px;" id="jarabes-desayuno" name="jarabes-desayuno" value="<?php echo $Datos_Formato['JarabesDesayuno']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="jarabes-comida-principal" name="jarabes-comida-principal" value="<?php echo $Datos_Formato['JarabesComidaPrincipal']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="jarabes-cena" name="jarabes-cena" value="<?php echo $Datos_Formato['JarabesCena']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="jarabes-entre-comidas" name="jarabes-entre-comidas" value="<?php echo $Datos_Formato['JarabesEntreComidas']; ?>"></td>
                    </tr>

                    <tr>
                      <td>Total</td>
                      <td><input type="text" style="width:50px;" id="total-desayuno1" name="total-desayuno1" value="<?php echo $Datos_Formato['TotalDesayuno1']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="total-comida-principal2" name="total-comida-principal2" value="<?php echo $Datos_Formato['TotalComidaPrincipal2']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="total-cena3" name="total-cena3" value="<?php echo $Datos_Formato['TotalCena3']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="total-entre-comidas4" name="total-entre-comidas4" value="<?php echo $Datos_Formato['TotalEntreComidas4']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="total2" name="total2" value="<?php echo $Datos_Formato['Total2']; ?>"></td>
                    </tr>
                </tbody>
              </table>

              <div class="row"> 
                <div class="span1"> 
                  <label><strong>Observación: </strong></label> 
                </div> 
                <div class="span5"> 
                  <label><strong>Baja: 0 a 3 por día</strong></label> 
                  <label><strong>Media: 4 a 7 por día</strong></label> 
                  <label><strong>Alta: 8 o más por día</strong></label> 
                </div> 
              </div> <!-- exposicion a azucares -->
              <br><br> 

              <div class="row">
                <div class="span4">
                <label><strong>3. Alimentos no cariogénicos en la dieta</strong></label>
                </div>
              </div>
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Forma</th>
                      <th>Desayuno</th>
                      <th>Comida principal</th>
                      <th>Cena</th>
                      <th>Entre comidas</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>Huevos, quesos, carnes y pescados</td>
                      <td><input type="text" style="width:50px;" id="carne-desayuno" name="carne-desayuno" value="<?php echo $Datos_Formato['CarneDesayuno']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="carne-comida-principal" name="carne-comida-principal" value="<?php echo $Datos_Formato['CarneComidaPrincipal']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="carne-cena" name="carne-cena" value="<?php echo $Datos_Formato['CarneCena']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="carne-entre-comidas" name="carne-entre-comidas" value="<?php echo $Datos_Formato['CarneEntreComidas']; ?>"></td>
                    </tr>

                    <tr>
                      <td>Cereales y galletas integrales</td>
                      <td><input type="text" style="width:50px;" id="cereales-desayuno" name="cereales-desayuno" value="<?php echo $Datos_Formato['CerealesDesayuno']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="cereales-comida-principal" name="cereales-comida-principal" value="<?php echo $Datos_Formato['CerealesComidaPrincipal']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="cereales-cena" name="cereales-cena" value="<?php echo $Datos_Formato['CerealesCena']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="cereales-entre-comidas" name="cereales-entre-comidas" value="<?php echo $Datos_Formato['CerealesEntreComidas']; ?>"></td>
                    </tr>

                    <tr>
                      <td>Verduras y vegetales</td>
                      <td><input type="text" style="width:50px;" id="verduras-desayuno" name="verduras-desayuno" value="<?php echo $Datos_Formato['VerdurasDesayuno']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="verduras-comida-principal" name="verduras-comida-principal" value="<?php echo $Datos_Formato['VerdurasComidaPrincipal']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="verduras-cena" name="verduras-cena" value="<?php echo $Datos_Formato['VerdurasCena']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="verduras-entre-comidas" name="verduras-entre-comidas" value="<?php echo $Datos_Formato['VerdurasEntreComidas']; ?>"></td>
                    </tr>

                    <tr>
                      <td>Sustitutos de azúcar (p. ej. Esplenda)</td>
                      <td><input type="text" style="width:50px;" id="sustituto-azucar-desayuno" name="sustituto-azucar-desayuno" value="<?php echo $Datos_Formato['SustitutosAzucarDesayuno']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="sustituto-azucar-comida-principal" name="sustituto-azucar-comida-principal" value="<?php echo $Datos_Formato['SustitutosAzucarComidaPrincipal']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="sustituto-azucar-comida-cena" name="sustituto-azucar-cena" value="<?php echo $Datos_Formato['SustitutosAzucarCena']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="sustituto-azucar-entre-comidas" name="sustituto-azucar-entre-comidas" value="<?php echo $Datos_Formato['SustitutosAzucarEntreComidas']; ?>"></td>
                    </tr>

                    <tr>
                      <td>Total</td>
                      <td><input type="text" style="width:50px;" id="total-desayuno" name="total-desayuno" value="<?php echo $Datos_Formato['TotalDesayuno']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="total-comida-principal" name="total-comida-principal" value="<?php echo $Datos_Formato['TotalComidaPrincipal']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="total-cena" name="total-cena" value="<?php echo $Datos_Formato['TotalCena']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="total-entre-comidas" name="total-entre-comidas" value="<?php echo $Datos_Formato['TotalEntreComidas']; ?>"></td>
                      <td><input type="text" style="width:50px;" id="total3" name="total3" value="<?php echo $Datos_Formato['Total3']; ?>"></td>
                    </tr>
                </tbody>
              </table> <!-- alimentos no cariogenicos en la dieta -->

            </div><!-- fin tab4 -->
            <div class="tab-pane" id="tab5">
              <h2>Factores de Riesgo.</h2>
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Exposición a los azúcares</th>
                      <th>Alta</th>
                      <th>Media</th>
                      <th>Baja</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>Alimentación</td>
                      <td>Deficiente <input type="radio" id="alimentacion" name="alimentacion" value="1" <?php echo ($Datos_Formato['Alimentacion'] == '1' ? "checked":""); ?>></td>
                      <td>Aceptable <input type="radio" id="alimentacion" name="alimentacion" value="2" <?php echo ($Datos_Formato['Alimentacion'] == '2' ? "checked":""); ?>></td>
                      <td>Adecuada <input type="radio" id="alimentacion" name="alimentacion" value="3" <?php echo ($Datos_Formato['Alimentacion'] == '3' ? "checked":""); ?>></td>
                    </tr>

                    <tr>
                      <td>Flujo salival </td>
                      <td>Escaso <input type="radio" name="flujo-salival" value="1" <?php echo ($Datos_Formato['FlujoSalival'] == '1' ? "checked":""); ?>></td>
                      <td>Normal <input type="radio" name="flujo-salival" value="2" <?php echo ($Datos_Formato['FlujoSalival'] == '2' ? "checked":""); ?>></td>
                      <td>Abundante <input type="radio" name="flujo-salival" value="3" <?php echo ($Datos_Formato['FlujoSalival'] == '3' ? "checked":""); ?>></td>
                    </tr>

                    <tr>
                      <td>Hábitos de higiene</td>
                      <td>Deficiente <input type="radio" name="habitos-higiene" value="1" <?php echo ($Datos_Formato['HabitosHigiene'] == '1' ? "checked":""); ?>></td>
                      <td>Aceptable <input type="radio" name="habitos-higiene" value="2" <?php echo ($Datos_Formato['HabitosHigiene'] == '2' ? "checked":""); ?>></td>
                      <td>Adecuado <input type="radio" name="habitos-higiene" value="3" <?php echo ($Datos_Formato['HabitosHigiene'] == '3' ? "checked":""); ?>></td>
                    </tr>

                    <tr>
                      <td>Índice de placa</td>
                      <td>Deficiente <input type="radio" name="indice-placa-nivel" value="1" <?php echo ($Datos_Formato['IndicePlacaNivel'] == '1' ? "checked":""); ?>></td>
                      <td>Aceptable <input type="radio" name="indice-placa-nivel" value="2" <?php echo ($Datos_Formato['IndicePlacaNivel'] == '2' ? "checked":""); ?>></td>
                      <td>Adecuado <input type="radio" name="indice-placa-nivel" value="3" <?php echo ($Datos_Formato['IndicePlacaNivel'] == '3' ? "checked":""); ?>></td>
                    </tr>

                    <tr>
                      <td>Atención dental regular</td>
                      <td>No <input type="radio" name="atencion-dental-regular" value="1" <?php echo ($Datos_Formato['AtencionDentalRegular'] == '1' ? "checked":""); ?>></td>
                      <td></td>
                      <td>Si <input type="radio" name="atencion-dental-regular" value="2" <?php echo ($Datos_Formato['AtencionDentalRegular'] == '2' ? "checked":""); ?>></td>
                    </tr>

                    <tr>
                      <td>Múltiples restauraciones y/o ortodoncia</td>
                      <td>Si <input type="radio" name="multiples-restauraciones-ortodoncia" value="1" <?php echo ($Datos_Formato['MultiplesRestauracionesOrtodoncia'] == '1' ? "checked":""); ?>></td>
                      <td></td>
                      <td>No <input type="radio" name="multiples-restauraciones-ortodoncia" value="2" <?php echo ($Datos_Formato['MultiplesRestauracionesOrtodoncia'] == '2' ? "checked":""); ?>></td>
                    </tr>

                    <tr>
                      <td>Enfermedades (p.ej. diabetes, bulimia)</td>
                      <td>Si <input type="radio" name="enfermedades" value="1" <?php echo ($Datos_Formato['Enfermedades'] == '1' ? "checked":""); ?>></td>
                      <td></td>
                      <td>No <input type="radio" name="enfermedades" value="2" <?php echo ($Datos_Formato['Enfermedades'] == '2' ? "checked":""); ?>></td>
                    </tr>

                    <tr>
                      <td>Antecedentes familiares de caries</td>
                      <td>Si <input type="radio" name="antecedentes-familiares-caries" value="1" <?php echo ($Datos_Formato['AntecedentesFamiliaresCaries'] == '1' ? "checked":""); ?>></td>
                      <td>No sabe <input type="radio" name="antecedentes-familiares-caries" value="2" <?php echo ($Datos_Formato['AntecedentesFamiliaresCaries'] == '2' ? "checked":""); ?>></td>
                      <td>No <input type="radio" name="antecedentes-familiares-caries" value="3" <?php echo ($Datos_Formato['AntecedentesFamiliaresCaries'] == '3' ? "checked":""); ?>></td>
                    </tr>

                    <tr>
                      <td>Total</td>
                      <td><input type="text" style="width:25px;" name="total-alta" value="<?php echo $Datos_Formato['TotalAlta']; ?>"></td>
                      <td><input type="text" style="width:25px;" name="total-media" value="<?php echo $Datos_Formato['TotalMedia']; ?>"></td>
                      <td><input type="text" style="width:25px;" name="total-baja" value="<?php echo $Datos_Formato['TotalBaja']; ?>"></td>
                    </tr>
                </tbody>
              </table> <!-- factores de riesgo -->

              <label><strong>Consideración del nivel de riesgo de caries dental</strong></label>
              
              <div class="row"> 
                <div class="span1.5"> 
                  <label>Bajo <input type="radio" name="riesgo-caries-dental" value="1" <?php echo ($Datos_Formato['RiesgoCariesDental'] == '1' ? "checked":""); ?>></label> 
                </div>
                <div class="span1.5"> 
                  <label>Medio <input type="radio" name="riesgo-caries-dental" value="2" <?php echo ($Datos_Formato['RiesgoCariesDental'] == '2' ? "checked":""); ?>></label>            
                </div>
                <div class="span1.5"> 
                  <label>Alto <input type="radio" name="riesgo-caries-dental" value="3" <?php echo ($Datos_Formato['RiesgoCariesDental'] == '3' ? "checked":""); ?>></label>
                </div>
              </div>
            </div><!-- fin tab5 -->
          </div><!-- fin tab-content -->
        </div><!-- well -->
		<?php if($SIS_Datos_Usuario['NombrePuesto'] == "Medico Titular"): ?>
        
        <div class="row">
            <div class="span8">
            <label><strong>Aprobación de Historia Clínica</strong></label>
            <select class="input-block-level2" id="aprobacion" name="aprobacion">
                <option value="1" selected>Aprobado</option>
                <option value="2">No Aprobado</option>
            </select>            
            </div>
        </div>		
        <br />
        <div align="row">
          <input type="submit" class="btn btn-institucional" name="aprobar" id="guardar" value="Aprobar">            
            <a href="../clinica/formatoindicepreventivooperatoria.php" class="btn btn-danger pull-right cancelar"> Cancelar</a>
        </div>
		<?php endif; ?>
        </form>

        </div> <!-- class span9 -->

      </div><!--/.row -->
      <input type="hidden" id="ventana" value="formato-indice-preventivo-operatoria">

<?php include("../footer2.php"); ?>