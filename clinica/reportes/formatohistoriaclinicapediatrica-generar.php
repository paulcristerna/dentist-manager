<html>
<head>
  <meta charset="utf-8">
  <title>Formato de Historia Clinica Pediatriaca</title>
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
  <?php include("../../core-saec/Formato_Historia_Clinica_Pediatrica.php"); ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <th style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </th>
        <th style="width:470px;">
          <h4>Formato de Historia Clínica Pediatrica</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </th>
        <th style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </th>
      </tr> 
    </table> 

    <?php 
            $Formato_Historia_Clinica_Pediatrica = new Formato_Historia_Clinica_Pediatrica();

            $Formato_Historia_Clinica_Pediatrica->IdHistoriaClinicaPediatrica = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Pediatrica->Obtener_Formato();

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

      <h2>Datos del Paciente</h2>
    <table>
              <br>
              <tr> 
                <td> 
                  <label><strong>Nombre:</strong></label>
                </td>
                <td>
                  <?php echo $Datos_Formato['NombrePaciente'].' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?>
                </td>
            </tr>
        <tr>
	       <td> 
                  <label><strong>Sexo: </strong></label>
            </td>
            <td>
		          <?php echo $Datos_Formato['SexoPaciente']; ?>
            </td>
         </tr>
        <tr>
		  <td> 
	           <label><strong>Edad: </strong></label>
            </td>
            <td>
		   <?php echo (isset($Edad) ? $Edad:"0"); ?> Año(s).
                </td>
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
               <label><strong>Código postal: </strong></label>
		    </td>
            <td>
                <?php echo $Datos_Formato['CodigoPostalPaciente']; ?>
                </td> 
        </tr>
	   <tr>
            <td> 
               <label><strong>Escuela: </strong></label>
		      </td>
            <td>
                <?php echo $Datos_Formato['EscuelaPaciente']; ?>
            </td>
        </tr>
        <tr>
            <td> 
	          <label><strong>Grado escolar: </strong></label>
		  </td>
            <td>
                <?php echo $Datos_Formato['GradoEscolarPaciente']; ?>
            </td> 
        </tr>
	   <tr>
            <td> 
               <label><strong>Num. de Hermanos: </strong></label>
		  </td>
           <td>
                <?php echo $Datos_Formato['NumHermanosPaciente']; ?>
            </td> 
        </tr>
	      <tr>
             <td> 
                <label><strong>Nombre del padre: </strong></label>
		      </td>
              <td>
                 <?php echo $Datos_Formato['NombrePadrePaciente']; ?>
            </td> 
        </tr>
	      <tr>
             <td> 
                <label><strong>Ocupación: </strong></label>
		      </td>
              <td>
                 <?php echo $Datos_Formato['OcupacionPadrePaciente']; ?>
                </td>
        </tr>
        <tr>
                <td> 
                  <label><strong>Teléfono: </strong></label>
                </td>
                <td>
		          <?php echo $Datos_Formato['TelefonoPadrePaciente']; ?>
                </td> 
         </tr>
	      <tr>
             <td> 
                <label><strong>Nombre de su médico: </strong></label>
		      </td>
              <td>
                 <?php echo $Datos_Formato['NombreMedicoPaciente']; ?>
                </td> 
          </tr>
          <tr>                 
                <td> 
                  <label><strong>Peso: </strong></label>
		          </td>
                  <td>
                    <?php echo $Datos_Formato['PesoPaciente']; ?> kg.
                </td>
	      </tr>
            <tr>
                <td>
                 <label><strong>Estatura: </strong></label>
		          </td>
                <td>
                    <?php echo $Datos_Formato['EstaturaPaciente']; ?> cm.
                </td>
            </tr> 
            <tr>
                <td> 
                  <label><strong>T/A: </strong></label>
		          </td>
                  <td>
                    <?php echo $Datos_Formato['TA']; ?>
                </td> 
            </tr>
            <tr>
                <td>
                  <label><strong>Temp: </strong></label>
		          </td>
                    <td>
                    <?php echo $Datos_Formato['Temp']; ?>
                </td>
              </tr>
              <tr>
                <td> 
                  <label><strong>Conducta: </strong></label>
		          </td>
                  <td>
                    <?php echo $Datos_Formato['Conducta']; ?>
                </td> 
              </tr> 
    </table>    
      
      <h3>Historia Clínica</h3>
      
      <table> 
        <tr> 
            <td>
                <label><strong>Estado actual de salud:</strong> </label></td>
            <td><?php echo $Datos_Formato['EstadoActualSalud']; ?></td>
        </tr>
      <tr> 
        <td> 
          <label><strong>Enfermedades prolongadas o debilitanes:</strong></label></td>
          <td>
          <?php echo $Datos_Formato['EnfermedadesProlongadas']; ?>
        </td>
      </tr>
      <tr> 
        <td> 
          <label><strong>Ultimo examen fisico:</strong></label>
          </td>
          <td>
            <?php echo $Datos_Formato['UltimoExamenFisico']; ?>
        </td>
      </tr>
      <tr> 
        <td> 
          <label><strong>¿Recibe atención medica?:</strong></label>
         </td>
        <td>
            <?php echo $Datos_Formato['RecibeAtencionMedica']; ?>
        </td>
      </tr>
      <tr> 
        <td> 
          <label><strong>¿Porqué?:</strong></label>
          </td>
          <td>
            <?php echo $Datos_Formato['RecibeAtencionMedicaPorque']; ?>
        </td>
      </tr>
      <tr> 
        <td> 
          <label><strong>Operaciones:</strong></label>
        </td>
          <td><?php echo $Datos_Formato['Operaciones']; ?></td>
      </tr>
      <tr> 
        <td> 
          <strong>Ha recibido tratamiento dental:</strong>
          </td>
          <td>
            <?php echo $Datos_Formato['RecibidoTratamientoDental']; ?>
        </td>
      </tr>
      <tr> 
        <td><strong>¿Ha sido anestesiado?:</strong></td>
        <td><?php echo $Datos_Formato['Anestesiado']; ?></td>
    </tr>
      <tr> 
        <td> 
          <label><strong>Efectos de la Anestesia:</strong></label>
          </td>
          <td>
            <?php echo $Datos_Formato['EfectosAnestesia']; ?>
        </td>
      </tr>
    </table>
      
      <h3>Examen Bucal</h3>
        <h4>Oclusión de molares:</h4>
      <table>
      <tr> 
        <td><strong>Derecha:</strong></td>
        <td><?php echo $Datos_Formato['OclusionMolaresDer']; ?></td>
        <td><strong>Izquierda:</strong></td>
        <td><strong>Derecha:</strong> <?php echo $Datos_Formato['OclusionMolaresIzq']; ?></td>
        </tr>
      <tr> 
        <td><strong>Sobremordida vertical (mm):</strong></td>
        <td><?php echo $Datos_Formato['SobremordidaVert']; ?></td> 
        <td><strong>Sobremordida horizontal (mm):</strong></td>
        <td><?php echo $Datos_Formato['SobremordidaHor']; ?></td>
      </tr>
          <br />
      <tr> 
        <td> 
            <label><strong>Mordida abierta (mm):</strong></label>
        </td>
        <td>
          <?php echo $Datos_Formato['MordidaAbierta']; ?> 
        </td>
      </tr>
      <tr> 
        <td> 
            <label><strong>Erupción tardía:</strong></label>
        </td>
        <td>
            <?php echo $Datos_Formato['ErupcionTardia']; ?>  
        </td>               
    </tr>
    <tr>
            <td>
                <label><strong>Dientes ausentes:</strong></label>
            </td>
            <td>
                <?php echo $Datos_Formato['DientesAusentes']; ?>                 </td>
        </tr>
      <tr> 
        <td> 
            <label><strong>Perdida prematura D. temporal</strong></label></td>
        <td>
            <?php echo $Datos_Formato['PerdidaPrematura']; ?>  
        </td>
    </tr>
    <tr>
        <td> 
        <label><strong>Perdida prolongada D. temporal</strong></label>
        </td>
        <td>
        <?php echo $Datos_Formato['PerdidaProlongada']; ?>  
        </td>
      </tr>
      <tr> 
        <td> 
        <label><strong>Mordida cruzada posterior</strong></label>
        </td>
        <td>
        <?php echo $Datos_Formato['MordidaCruzadaPost']; ?> 
        </td>
    </tr>
    <tr>
        <td>
            <label><strong>Mordida cruzada anterior</strong></label>
        </td>
        <td>
            <?php echo $Datos_Formato['MordidaCruzadaAnt']; ?> 
        </td>
    </tr> 
    <tr> 
        <td> 
            <label><strong>Estado periodontal</strong></label>
        </td>
        <td>
            <?php echo $Datos_Formato['EstadoPeriodontal']; ?> 
        </td>
    </tr>
    <tr>
        <td> 
            <label><strong>Fistula</strong></label>
        </td>
        <td>
            <?php echo $Datos_Formato['Fistula']; ?> 
        </td>
      </tr>
      <tr> 
        <td> 
            <label><strong>Gingivitis</strong></label>
        </td>
        <td>
            <?php echo $Datos_Formato['Gingivitis']; ?> 
        </td>
      </tr>
      <tr> 
        <td> 
            <label><strong>Hábitos</strong></label>
        </td>
        <td>
            <?php echo $Datos_Formato['Habitos']; ?>  
        </td>
    </tr>
    <tr>
        <td>
            <label><strong>Dolor de cabeza</strong></label>
        </td>
        <td>
            <?php echo $Datos_Formato['DolorCabeza']; ?>  
        </td>
    </tr>
      </table>
      
      <h3>Odontograma</h3>

    <table>
	      <tr>
	        <td>Sano (<strong>S</strong>)</td>
	        <td>Obturado (<strong>O</strong>)</td>
	        <td>Cariado (<strong>C</strong>)</td>
	        <td>Ausente (<strong>A</strong>)</td>
	        <td>Descalcificación (<strong>D</strong>)</td>
	        <td>Patología Pulpal (<strong>PP</strong>)</td>
	        <td>Fractura (<strong>F</strong>)</td>
	      </tr>
	      </table>
      
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
      
      <h3>Información Dental</h3>
	      <table>
              <tr>
                <td> 
	           <label><strong>Motivo de la consulta:</strong></label>
               </td>
                  <td>
                    <?php echo $Datos_Formato['MotivoConsulta']; ?> 
                </td>
              </tr>
              <tr> 
                <td> 
	               <label><strong>¿Ha sido atendido el niño(a) en un consultorio dental?</strong></label>
                    </td>
                    <td>
                <?php echo $Datos_Formato['AtendidoConsultarioDental']; ?>
                    </td>
                </tr>
              <tr>
              <td> 
	           <label><strong>¿Como ha sido su experiencia dental previa?</strong></label>
            </td>
                <td>
                <?php echo $Datos_Formato['ExperienciaDentalPrevia']; ?>          
                  </td>
                </tr>
              <tr> 
                <td> 
	           <label><strong>¿Practica el paciente algún deporte?</strong></label></td>
                  <td>
                    <?php echo $Datos_Formato['PracticaDeporte']; ?> 
                  </td>
                </tr>
              <tr> 
                <td> 
	               <label><strong>¿Cual?</strong></label>
                </td>
                <td>
                    <?php echo $Datos_Formato['PracticaDeporteCual']; ?> 
                </td>
              </tr>
            </table>
      
	      <h4>¿Ha tenido o tiene alguno de los siguientes habitos?</h4>
      
        <table>
            <tr>
                <td> 
	               <label><strong>Succión del dedo:</strong></label>
                </td>
                <td>
                   <?php echo $Datos_Formato['SuccionDedo']; ?>
                </td>
	      <tr> 
                <td> 
	               <label><strong>Morderse la uñas:</strong></label>
                  </td>
                 <td>
                    <?php echo $Datos_Formato['MorderseUnas']; ?>
                 </td>
            </tr>
          </tr>
	       <tr> 
                <td>
                    <label><strong>Morderse los labios:</strong></label>
                    </td>
                <td>
                    <?php echo $Datos_Formato['MorderseLabios']; ?>
                </td>
            </tr>
	      <tr> 
             <td> 
	           <label><strong>Duerme con la boca abierta:</strong></label></td>
              <td>
                <?php echo $Datos_Formato['DuermeBocaAbierta']; ?>
              </td>
        </tr>
	      <tr> 
                <td> 
	               <label><strong>Rechinar los dientes:</strong></label>
              </td>
              <td>
                <?php echo $Datos_Formato['RechinarDientes']; ?>
              </td>
        </tr>      
	      <tr> 
                <td> 
	               <label><strong>Dolor de cabeza frecuente:</strong></label>
              </td>
              <td>
              <?php echo $Datos_Formato['DolorCabezaFrecuente']; ?>
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