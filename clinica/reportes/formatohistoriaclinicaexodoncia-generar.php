<html>
<head>
  <meta charset="utf-8">
  <title>Formato de Historia Clinica de Exodoncia</title>
  <style type="text/css">
     table th{
        text-align: center;
     }

    #contenido th{
      background:#e3e3e3;
    }

    #contenido th, #contenido td{
      border:1px solid #e3e3e3;
      margin: 0;
      padding:3px;
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
  <?php include("../../core-saec/Formato_Historia_Clinica_Exodoncia.php"); ?>

    <table id="cabecera">
      <tr>
        <th style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </th>
        <th style="width:470px;">
          <h4>Formato de Historia Clínica de Exodoncia</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </th>
        <th style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </th>
      </tr> 
    </table>

    <?php 
            $Formato_Historia_Clinica_Exodoncia = new Formato_Historia_Clinica_Exodoncia();

            $Formato_Historia_Clinica_Exodoncia->IdHistoriaClinicaExodoncia = $_GET['formato'];

            $Datos_Formato = $Formato_Historia_Clinica_Exodoncia->Obtener_Formato();

            $fecha = date_create($Datos_Formato['FechaNacimientoPaciente']);
            $FechaNacimiento = date_format($fecha,'Y');
            $Edad = date("Y") - $FechaNacimiento;

            $FechaRegistro = date_create($Datos_Formato['FechaRegistro']);
            $FechaRegistro = date_format($FechaRegistro,'d-m-Y');
    ?>

    <h4>Datos del Paciente</h4>
      
    <table>
     <tr>
	      <td><strong>Nombre:</strong></td>
	      <td><?php echo $Datos_Formato['NombrePaciente'].' '.$Datos_Formato['ApellidoPaternoPaciente'].' '.$Datos_Formato['ApellidoMaternoPaciente']; ?></td>
     </tr>
      <tr>
	      <td><strong>Edad:</strong></td>
	      <td><?php echo $Edad; ?> Años</td>
     </tr>
     <tr>
	      <td><strong>Sexo:</strong></td>
	      <td><?php echo $Datos_Formato['SexoPaciente']; ?></td>
     </tr>
      <tr>
	      <td><strong>Fecha:</strong></td>
	      <td><?php echo $FechaRegistro; ?></td>
     </tr>
     <tr>
	      <td><strong>Ocupación:</strong></td>
	      <td><?php echo $Datos_Formato['OcupacionPaciente']; ?></td>
     </tr>
     <tr>
	      <td><strong>Lugar de Nacimiento:</strong></td>
	      <td><?php echo $Datos_Formato['PoblacionPaciente']; ?></td>
     </tr>
    </table>

    <h4>Examen bucal</h4>

    <table>
     <tr>
	      <td><strong>Diagnóstico:</strong></td>
	      <td><?php echo $Datos_Formato['Examen_Bucal_Diagnostico']; ?></td>
     </tr>
     <tr>
	      <td><strong>Tratamiento:</strong></td>
	      <td><?php echo $Datos_Formato['Examen_Bucal_Tratamiento']; ?></td>
     </tr>
    </table>

    <h4>Aparatos y Sístemas</h4>

    <table>
     <tr>
	      <td><strong>Cardiovascular:</strong></td>
	      <td><?php echo $Datos_Formato['Aparatos_Sistemas_Cardiovascular']; ?></td>
     </tr>
     <tr>
	      <td><strong>Renal:</strong></td>
	      <td><?php echo $Datos_Formato['Aparatos_Sistemas_Renal']; ?></td>
     </tr>
     <tr>
	      <td><strong>Nervioso:</strong></td>
	      <td><?php echo $Datos_Formato['Aparatos_Sistemas_Nervioso']; ?></td>
     </tr>
     <tr>
	      <td><strong>Digestivo:</strong></td>
	      <td><?php echo $Datos_Formato['Aparatos_Sistemas_Digestivo']; ?></td>
     </tr>
     <tr>
	      <td><strong>Respiratorio:</strong></td>
	      <td><?php echo $Datos_Formato['Aparatos_Sistemas_Respiratorio']; ?></td>
     </tr>
    </table>

    <h5>Genitourinario</h5>

    <table>
     <tr>
	      <td><strong>Embarazo:</strong></td>
	      <td><?php echo $Datos_Formato['Genitourinario_Embarazo']; ?></td>
     </tr>
     <tr>
	      <td><strong>Menopausia:</strong></td>
	      <td><?php echo $Datos_Formato['Genitourinario_Menopausia']; ?></td>
     </tr>
     <tr>
	      <td><strong>Lactancia:</strong></td>
	      <td><?php echo $Datos_Formato['Genitourinario_Lactancia']; ?></td>
     </tr>
     <tr>
	      <td><strong>Menstruación:</strong></td>
	      <td><?php echo $Datos_Formato['Genitourinario_Menstruacion']; ?></td>
     </tr>
     <tr>
	      <td><strong>Propensión Hemorragíca:</strong></td>
	      <td><?php echo $Datos_Formato['Propension_Hemorragica']; ?></td>
     </tr>
     <tr>
	      <td><strong>Pruebas de Laboratorio:</strong></td>
	      <td><?php echo $Datos_Formato['Pruebas_Laboratorio']; ?></td>
     </tr>
     <tr>
	      <td><strong>Estado General:</strong></td>
	      <td><?php echo $Datos_Formato['Estado_General']; ?></td>
     </tr>
     <tr>
	      <td><strong>Indica la Extracción Dentaria:</strong></td>
	      <td><?php echo $Datos_Formato['Extraccion_Dentaria']; ?></td>
     </tr>
     <tr>
	      <td><strong>Analgesia Indicada:</strong></td>
	      <td><?php echo $Datos_Formato['Analgesia_Indicada']; ?></td>
     </tr>
     <tr>
	      <td><strong>Prescripciones Operatorias:</strong></td>
	      <td><?php echo $Datos_Formato['Prescripciones_Operatorias']; ?></td>
     </tr>
     <tr>
	      <td><strong>Complicaciones:</strong></td>
	      <td><?php echo $Datos_Formato['Complicaciones']; ?></td>
     </tr>
     <tr>
	      <td><strong>Indicaciones al Paciente:</strong></td>
	      <td><?php echo $Datos_Formato['Indicacion_Paciente']; ?></td>
     </tr>
    </table>

    <h3>Odontograma</h3>
    
    <h4>Permanentes</h4>

    <table id="contenido">    
	          <tr>
                    <th>18</th>
                    <th>17</th>
                    <th>16</th>
                    <th>15</th>
                    <th>14</th>
                    <th>13</th>
                    <th>12</th>
                    <th>11</th>
                    <th></th>
                    <th>21</th>
                    <th>22</th>
                    <th>23</th>
                    <th>24</th>
                    <th>25</th>
                    <th>26</th>
                    <th>27</th>
                    <th>28</th>
                  </tr>
                  <tr>
                    <td><?php echo ($Datos_Formato['Diente_18'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_17'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_16'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_15'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_14'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_13'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_12'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_11'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td>&nbsp;</td>
                    <td><?php echo ($Datos_Formato['Diente_21'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_22'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_23'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_24'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_25'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_26'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_27'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_28'] == "1" ? "X":"&nbsp;"); ?></td>
                  </tr>
      </table>
      <table id="contenido"> 
	      <tr>
	            <th>48</th>
                    <th>47</th>
                    <th>46</th>
                    <th>45</th>
                    <th>44</th>
                    <th>43</th>
                    <th>42</th>
                    <th>41</th>
                    <th></th>
                    <th>31</th>
                    <th>32</th>
                    <th>33</th>
                    <th>34</th>
                    <th>35</th>
                    <th>36</th>
                    <th>37</th>
                    <th>38</th>
             </tr>
	     <tr>
	            <td><?php echo ($Datos_Formato['Diente_48'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_47'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_46'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_45'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_44'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_43'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_42'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_41'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td>&nbsp;</td>
                    <td><?php echo ($Datos_Formato['Diente_31'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_32'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_33'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_34'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_35'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_36'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_37'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_38'] == "1" ? "X":"&nbsp;"); ?></td>
             </tr>
      </table>
    
    <h4>Temporales</h4>
    
      <table id="contenido">    
	          <tr>
                    <th>55</th>
                    <th>54</th>
                    <th>53</th>
                    <th>52</th>
                    <th>51</th>
                    <th></th>
                    <th>61</th>
                    <th>62</th>
                    <th>63</th>
                    <th>64</th>
                    <th>65</th>
                  </tr>
                  <tr>
                    <td><?php echo ($Datos_Formato['Diente_55'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_54'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_53'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_52'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_51'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td>&nbsp;</td>
                    <td><?php echo ($Datos_Formato['Diente_61'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_62'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_63'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_64'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_65'] == "1" ? "X":"&nbsp;"); ?></td>
                  </tr>
      </table>
      <table id="contenido"> 
	      <tr>
                    <th>85</th>
                    <th>84</th>
                    <th>83</th>
                    <th>82</th>
                    <th>81</th>
                    <th></th>
                    <th>71</th>
                    <th>72</th>
                    <th>73</th>
                    <th>74</th>
                    <th>75</th>
             </tr>
	     <tr>
                    <td><?php echo ($Datos_Formato['Diente_85'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_84'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_83'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_82'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_81'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td>&nbsp;</td>
                    <td><?php echo ($Datos_Formato['Diente_71'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_72'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_73'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_74'] == "1" ? "X":"&nbsp;"); ?></td>
                    <td><?php echo ($Datos_Formato['Diente_75'] == "1" ? "X":"&nbsp;"); ?></td>
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
</body>
</html>
