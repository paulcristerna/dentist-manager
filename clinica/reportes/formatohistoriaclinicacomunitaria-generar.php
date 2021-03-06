<html>
<head>
  <meta charset="utf-8">
  <title>Formato de Historia Clinica Comunitaria</title>
  <style type="text/css">
    table th{
      text-align: center;
    }

    .tabla{
      text-align: center;
      border:1px solid #e3e3e3;
    }

    .tabla th, .tabla td{
      border:1px solid #e3e3e3;
    }

    .tabla th{
      background:#e3e3e3;
      margin: 0;
    }

    .tabla td{
      height:8px;
      width:5px;
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
  <?php include("../../core-saec/Formato_Historia_Clinica_Comunitaria.php"); ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <th style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </th>
        <th style="width:470px;">
          <h4>Formato de Historia Clinica Comunitaria</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </th>
        <th style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </th>
      </tr> 
    </table>

    <?php 
            $Formato_Historia_Clinica_Comunitaria = new Formato_Historia_Clinica_Comunitaria();

            $Formato_Historia_Clinica_Comunitaria->IdHistoriaClinicaComunitaria = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Comunitaria->Obtener_Formato(); 
            //fecha de registro de la historia clinica

			$fecha_registro = $Datos_Formato['FechaRegistro'];
			$fecha_registro = date_create($fecha_registro);
			$fecha_registro = date_format($fecha_registro,'d-m-y');

			//calcular edad del paciente

			$dia=date('d');
			$mes=date('m');
			$ano=date('Y');

			$fecha_nacimiento = date_create($Datos_Formato['FechaNacimientoPaciente']);

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

     <h4>Datos del Paciente</h4>

     <table>
     <tr>
        <td><strong>Nombre:</strong></td>
        <td><?php echo $Datos_Formato['NombrePaciente'].' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></td>
     </tr>
    <tr>
        <td><strong>Sexo:</strong></td>
        <td><?php echo $Datos_Formato['SexoPaciente']; ?></td>
     </tr>
    <tr>
        <td><strong>Edad:</strong></td>
        <td><?php echo (isset($Edad) ? $Edad:"0"); ?> Año(s).</</td>
     </tr>
     <tr>
	      <td> 
	          <label><strong>Calle: </strong></label>
            </td>
            <td>
              <?php echo $Datos_Formato['CallePaciente']; ?>
            </td>
        </tr>
        <tr>
		  <td> 
	          <label><strong>Numero: </strong></label>
            </td>
            <td>
	          <?php echo $Datos_Formato['NumeroPaciente']; ?>
	      </td>
	   </tr>
        <tr>
		  <td> 
            
	          <label><strong>Colonia: </strong></label>
            </td>
            <td>
                <?php echo $Datos_Formato['ColoniaPaciente']; ?>
            </td>
        </tr>
        <tr>
            <td> 
	          <label><strong>Población: </strong></label>
            </td>
              <td>
                  <?php echo $Datos_Formato['PoblacionPaciente']; ?>            </td>
	   </tr>
        <tr>                  
           <td> 
	          <label><strong>Teléfono:</strong></label>
            </td>
            <td>
	          <?php echo $Datos_Formato['TelefonoPaciente']; ?>
            </td>
        </tr>
        <tr>
            <td>
	          <label><strong>Ocupación: </strong></label>
            </td>
            <td>
	          <?php echo $Datos_Formato['OcupacionPaciente']; ?>
            </td>                
        </tr>
        <tr>                  
           <td> 
	          <label><strong>Estado civil:</strong></label>
            </td>
            <td>
	          <?php echo $Datos_Formato['EstadoCivilPaciente']; ?>
            </td>
        </tr>
        <tr>
            <td>
	          <label><strong>Escolaridad: </strong></label>
            </td>
            <td>
	          <?php echo $Datos_Formato['EscolaridadPaciente']; ?>
            </td>                
        </tr>
        <tr>
            <td>
	          <label><strong>Pacimiento actual: </strong></label>
            </td>
            <td>
	          <?php echo $Datos_Formato['PadecimientoActual']; ?>
            </td>                
        </tr>
     </table> 
      
      <h3>Signos Vitales</h3>
      <table>
      <tr> 
        <td> 
          <strong>Temperatura: </strong>
        </td>
        <td>
          <?php echo $Datos_Formato['Temperatura']; ?>
        </td>
    </tr>
    <tr>
        <td>
          <strong>Pulso: </strong>
          <?php echo $Datos_Formato['Pulso']; ?>
        </td>
    </tr>
    <tr>
        <td> 
          <strong>Presion arterial: </strong>
        </td>
        <td>
          <?php echo $Datos_Formato['PresionArterial']; ?>
        </td>
    </tr>
    <tr> 
        <td> 
          <strong>Respiración: </strong>
        </td>
        <td>
          <?php echo $Datos_Formato['Respiracion']; ?>
        </td>
    </tr>
    <tr>
        <td>
          <strong>Altura: </strong>
        </td>
        <td>
            <?php echo $Datos_Formato['Altura']; ?>
        </td>  
    </tr>
    <tr>
        <td> 
          <strong>Peso: </strong>
        </td>
        <td>
          <?php echo $Datos_Formato['Peso']; ?>
        </td>
    </tr>
    </table>
      
    <h3>Cuestionario de Evaluación</h3>

    <table>
    <tr>
        <td>
         <label><strong>1. ¿Está o estuvo en los últimos 12 meses bajo Tx médico? </strong></label> 
        </td>
        <td>
             <?php echo $Datos_Formato['Pregunta1']; ?>
        </td>
    </tr>
    <tr>
      <td> 
         <label><strong>2. ¿Padece de alergia o reacción de sensibilidad conocida? </strong></label>
        </td>
        <td>
            <?php echo $Datos_Formato['Pregunta2']; ?>
        </td>
      </tr>
      <tr>
          <td>
         <label><strong>3. ¿Tuvo alguna vez una reacción desfavorable con los anestésicos locales? </strong></label> 
          </td>
        <td>
            <?php echo $Datos_Formato['Pregunta3']; ?>
          </td>
      </tr> 
    <tr> 
        <td>
         <label><strong>4. ¿Padece o padeció algún trastorno cardiaco? </strong></label>
        </td>
        <td>
             <?php echo $Datos_Formato['Pregunta4']; ?>
        </td>
      </tr>
      <tr> 
         <td> 
         <label><strong>5. ¿Tiene presión arterial alta? </strong> </label>
             </td>
             <td>
             <?php echo $Datos_Formato['Pregunta5']; ?>
            </td>
      </tr>
      <tr>
        <td>  
         <label><strong>6. ¿Es usted diabético? </strong> </label>
            </td>
          <td>
             <?php echo $Datos_Formato['Pregunta6']; ?>
        </td>
      </tr>
      <tr> 
        <td> 
         <label><strong>7. ¿Tiene algún trastorno de tipo epiléptico convulsivo? </strong> </label>
             <?php echo $Datos_Formato['Pregunta7']; ?>
            </td>
      </tr>
      <tr> 
         <td> 
            <label><strong>8. ¿Padece o padeció hepatitis?</strong></label> 
         </td>
        <td>
             <?php echo $Datos_Formato['Pregunta8']; ?>
        </td>
    </tr>
    <tr>
      <td>  
         <label><strong>9. ¿Tiene o tuvo algún padecimiento quirúrgico o infeccioso? </strong></label>
          </td>
        <td>
             <?php echo $Datos_Formato['Pregunta9']; ?>
        </td>
      </tr> 
      <tr> 
         <td> 
         <label><strong>10. ¿Alctualmente está tomando algún medicamento? </strong></label></td>
          <td>
             <?php echo $Datos_Formato['Pregunta10']; ?>
          </td>
        </tr>
        <tr> 
            <td> 
            <label><strong>11. ¿Es usted propenso a hemorragia? </strong></label>
            </td>
            <td>
             <?php echo $Datos_Formato['Pregunta11']; ?>
            </td>
        </tr>
    </table>
      
    <h4>Únicamente Mujeres:</h4>
      
    <table>  
      <tr>
          <td>
         <label><strong>12. ¿Esta tomando anticonceptivos? </strong></label> 
        </td>
      <td>
             <?php echo $Datos_Formato['Pregunta12']; ?>
      </td>
      </tr>
      <tr> 
         <td> 
         <label><strong>13. ¿Está embarazada? </strong></label>
          </td> 
          <td>
            <?php echo $Datos_Formato['Pregunta13']; ?>
          </td>  
    </tr>
     <tr>
         <td>
         <label><strong>14. ¿Ha observado algún cambio en su periodo de menstruación?</strong></label> 
         </td> 
         <td>
             <?php echo $Datos_Formato['Pregunta14']; ?>
         </td>
            </tr>
    </table>

    <h3>Examen de la Cavidad Oral</h3>
        
    <table>
	    <tr>
          <td>  
              <label><strong>Cara: </strong></label>
            </td>
            <td>
              <?php echo $Datos_Formato['Cara']; ?>
            </td>
        </tr>
        <tr>
            <td>
              <label><strong>Labios: </strong></label>
            </td>
            <td>
              <?php echo $Datos_Formato['Labios']; ?>
            </td>
        </tr>
      <tr> 
            <td> 
              <label><strong>Macosa bucal: </strong></label>
            </td>
          <td>
              <?php echo $Datos_Formato['MucosaBucal']; ?>
          </td>
    </tr>
    <tr> 
       <td>
        <label><strong>Lengua: </strong></label>
        </td>       
        <td>
        <?php echo $Datos_Formato['Lengua']; ?>
        </td>      
    </tr>
      <tr> 
         <td> 
              <label><strong>Piso de boca: </strong></label>
        </td>
          <td>
              <?php echo $Datos_Formato['PisoBoca']; ?>
          </td>
        </tr>
    <tr>
        <td> 
            <label><strong>Ganglios linfáticos: </strong></label>
        </td>
        <td>
          <?php echo $Datos_Formato['GangliosLinfaticos']; ?>
        </td>
    </tr>
      <tr> 
         <td> 
              <label><strong>Paladar duro: </strong></label>
        </td>
          <td>
             <?php echo $Datos_Formato['PaladarDuro']; ?>
          </td>
    </tr>
    <tr> 
       <td>
            <label><strong>Paladar blando: </strong></label>
        </td>
        <td>
              <?php echo $Datos_Formato['PaladarBlando']; ?>
        </td>
    </tr>
    <tr> 
       <td> 
          <label><strong>Buco faringe: </strong></label>
        </td>
        <td>
           <?php echo $Datos_Formato['BucoFaringe']; ?>
        </td>
    </tr>
    <tr>
        <td> 
           <label><strong>Encía: </strong></label>
        </td>
        <td>
              <?php echo $Datos_Formato['Encia']; ?>
        </td>
    </tr>
    </table>
      
      <h3>Odontograma</h3>

    <table>
	      <tr>
	        <td>Diente Ausente (<strong>A</strong>)</td>
	        <td>Extracción (<strong>X</strong>)</td>
	        <td>Caries (<strong>C</strong>)</td>
	        <td>Dolor (<strong>D</strong>)</td>
              </tr>
              <tr>
	        <td>Restauración (<strong>R</strong>)</td>
	        <td>Traumatismo (<strong>T</strong>)</td>
	        <td>Maloclusión (<strong>#</strong>)</td>
	        <td>Movilidad (<strong>M</strong>)</td>
	      </tr>
	      <tr>
	        <td>Protesis Parcial Removible (<strong>PPR</strong>)</td>
	        <td>Área de Impacto de Alimento (<strong>=</strong>)</td>
	        <td>Restauración Defectuosa (<strong>RD</strong>)</td>
	        <td>Prótesis Fija (<strong>PF</strong>)</td>
	      </tr>
	      </table>
      
      <br />
      
      <h4>Permanentes</h4>

    <table class="tabla">                           
                  <tr>
                    <th colspan="3">18</th>
                    <th colspan="3">17</th>
                    <th colspan="3">16</th>
                    <th colspan="3">15</th>
                    <th colspan="3">14</th>
                    <th colspan="3">13</th>
                    <th colspan="3">12</th>
                    <th colspan="3">11</th>
                    <th></th>
                    <th colspan="3">21</th>
                    <th colspan="3">22</th>
                    <th colspan="3">23</th>
                    <th colspan="3">24</th>
                    <th colspan="3">25</th>
                    <th colspan="3">26</th>
                    <th colspan="3">27</th>
                    <th colspan="3">28</th>
                  </tr>
                  <tr>
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_18']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>  
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_17']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_16']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_15']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_14']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_13']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_12']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_11']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_21']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_22']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_23']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_24']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_25']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_26']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_27']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_28']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>                      
                  </tr>

                  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_18']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_17']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_16']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_15']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_14']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_13']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_12']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_11']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_21']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_22']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_23']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_24']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_25']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_26']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_27']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_28']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    
                 </tr> 

		  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_18']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_17']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_16']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_15']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_14']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_13']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":"&nbsp;"); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_12']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_11']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_21']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_22']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_23']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_24']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_25']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_26']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_27']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_28']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>
                 </tr> 

		 <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_18']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_17']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":"&nbsp;"); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_16']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_15']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_14']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_13']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_12']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_11']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_21']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_22']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_23']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_24']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_25']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_26']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_27']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_28']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		 </tr>
                 </table>

		<table class="tabla">                           
                  <tr>
                    <th colspan="3">48</th>
                    <th colspan="3">47</th>
                    <th colspan="3">46</th>
                    <th colspan="3">45</th>
                    <th colspan="3">44</th>
                    <th colspan="3">43</th>
                    <th colspan="3">42</th>
                    <th colspan="3">41</th>
                    <th></th>
                    <th colspan="3">31</th>
                    <th colspan="3">32</th>
                    <th colspan="3">33</th>
                    <th colspan="3">34</th>
                    <th colspan="3">35</th>
                    <th colspan="3">36</th>
                    <th colspan="3">37</th>
                    <th colspan="3">38</th>
                  </tr>
                  <tr>
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_48']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>  
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_47']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_46']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_45']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_44']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_43']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_42']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_41']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_31']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_32']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_33']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_34']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_35']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_36']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_37']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_38']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>                      
                  </tr>

                  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_48']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_47']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_46']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_45']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_44']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_43']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_42']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_41']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_31']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_32']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_33']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_34']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_35']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_36']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_37']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_38']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    
                 </tr> 

		  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_48']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_47']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_46']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_45']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_44']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_43']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":"&nbsp;"); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_42']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_41']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_31']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_32']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_33']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_34']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_35']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_36']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_37']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_38']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>
                 </tr> 

		 <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_48']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_47']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":"&nbsp;"); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_46']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_45']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_44']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_43']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_42']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_41']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_31']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_32']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_33']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_34']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_35']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_36']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_37']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_38']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		 </tr>
    </table>
      
      <h4>Temporales</h4>
      
    <table class="tabla">
        <tr>
                    <th colspan="3">55</th>
                    <th colspan="3">54</th>
                    <th colspan="3">53</th>
                    <th colspan="3">52</th>
                    <th colspan="3">51</th>
                    <th></th>
                    <th colspan="3">61</th>
                    <th colspan="3">62</th>
                    <th colspan="3">63</th>
                    <th colspan="3">64</th>
                    <th colspan="3">65</th>
                  </tr>
        <tr> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_55']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_54']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_53']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_52']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_51']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_61']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:"&nbsp;"); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_62']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_63']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_64']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_65']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>                      
                  </tr>

                  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_55']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_54']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_53']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_52']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_51']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_61']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_62']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_63']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_64']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_65']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>
		    <td></td>
		        
        </tr> 
		  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_55']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_54']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_53']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":"&nbsp;"); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_52']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_51']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_61']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_62']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_63']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_64']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_65']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>
                 </tr> 

		 <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_55']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_54']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_53']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_52']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_51']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_61']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_62']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_63']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_64']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_65']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		 </tr>
                 </table>

		<table class="tabla">                           
                  <tr>
                    <th colspan="3">85</th>
                    <th colspan="3">84</th>
                    <th colspan="3">83</th>
                    <th colspan="3">82</th>
                    <th colspan="3">81</th>
                    <th></th>
                    <th colspan="3">71</th>
                    <th colspan="3">72</th>
                    <th colspan="3">73</th>
                    <th colspan="3">74</th>
                    <th colspan="3">75</th>
                  </tr>
                  <tr>
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_85']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_84']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_83']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_82']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_81']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_71']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_72']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_73']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_74']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td> 
                    <td colspan="3"><?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_75']);
                            echo ($Datos_Diente[0] != "0" ? $Datos_Diente[0]:""); 
                    ?></td>                      
                  </tr>

                  <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_85']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_84']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_83']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_82']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_81']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_71']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_72']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_73']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_74']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_75']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[1] != "0" ? "X":""); ?></td>
		    <td></td>
        </tr>
        <tr>		
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_85']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_84']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_83']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":"&nbsp;"); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":"&nbsp;"); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_82']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_81']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_71']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_72']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_73']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_74']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_75']);
                    ?>
		    <td><?php echo ($Datos_Diente[2] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[3] != "0" ? "X":""); ?></td>
		    <td><?php echo ($Datos_Diente[4] != "0" ? "X":""); ?></td>
                 </tr> 

            <tr>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_85']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_84']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_83']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_82']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_81']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_71']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_72']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_73']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>

		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_74']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    <?php 
                            $Datos_Diente = explode('|',$Datos_Formato['Diente_75']);
                    ?>
		    <td></td>
		    <td><?php echo ($Datos_Diente[5] != "0" ? "X":""); ?></td>
		    <td></td>
		    <td></td>
		 </tr>
        </table>
      <br />
      <table> 
        <tr>
            <td>
            <label><strong>Diagnóstico: </strong></label>
            </td>
            <td>
            <?php echo $Datos_Formato['Diagnostico']; ?>
            </td>
        </tr>
      <tr>
        <td> 
          <label><strong>Pronóstico: </strong></label>
        </td>
          <td>
          <?php echo $Datos_Formato['Pronostico']; ?>
          </td>
        </tr>
    <tr>
        <td> 
           <label><strong>Plan de tratamiento: </strong></label>
        </td>
        <td>
              <?php echo $Datos_Formato['PlanTratamiento']; ?>
        </td>
      </tr>
    <tr>
        <td>
              <label><strong>Observaciones: </strong></label>
        </td>
        <td>
              <?php echo $Datos_Formato['Observaciones']; ?>
        </td>
      </tr>
    </table>

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