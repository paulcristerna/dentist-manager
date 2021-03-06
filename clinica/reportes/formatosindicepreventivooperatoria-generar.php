<html>
<head>
  <meta charset="utf-8">
  <title>Formato de Indice y Preventivo de Operatoria</title>
  <style type="text/css">
    table td, table th{
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
  </style>
</head>
<body>
  <?php include('../../core-saec/AccesoBD.php') ?>
  <?php include('../../core-saec/Usuario.php') ?>
  <?php include('../../core-saec/Paciente.php') ?>
  <?php include('../../core-saec/Pareja_Clinica.php') ?>
  <?php include("../../core-saec/Formato_Indice_Preventivo_Operatoria.php"); ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <td style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </td>
        <td style="width:470px;">
          <h4>Formato de Indice y Preventivo de Operatoria</h4>
          <h3>UNIVERSIDAD AUTÓNOMA DE SINALOA <br /><br />
              FACULTAD DE ODONTOLOGÍA</h3>
        </td>
        <td style="width:130px;">
          <img src="../../img/fouas_logo.jpg" width="130">
        </td>
      </tr> 
    </table>   
      
    <table id="contenido">
      <thead>
          <tr style="background:#e3e3e3;">
            <th style="padding:5px;width:225px;">Nombre del Paciente</th>
            <th style="padding:5px;width:450px;">Pareja Clínica</th>
          </tr>
        </thead>
        <tbody>
        <?php 
				session_start();
				$SIS_Usuario = $_SESSION['Usuario'];
				$UsuarioSIS = new Usuario($SIS_Usuario);
            	$SIS_Datos_Usuario = $UsuarioSIS->Obtener_Usuario();

                $Formato_Indice_Preventivo_Operatoria = new Formato_Indice_Preventivo_Operatoria();

                $Pareja_Clinica = new Pareja_Clinica();
                    
                if($SIS_Datos_Usuario['NombrePuesto'] == 'Administrador'){

                    if(isset($_GET['buscar'])):
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Administrador_Reporte($_GET['buscar']);
                    else:
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Administrador_Reporte();
                    endif;
                }
                else if($SIS_Datos_Usuario['NombrePuesto'] == 'Medico Titular'){    
                    $Pareja_Clinica->IdMedicoTitular = $SIS_Usuario;
                    $DatosParejaClinica = $Pareja_Clinica->Buscar_Pareja_Clinica_Medico_TItular();   
                    
                    $Formato_Indice_Preventivo_Operatoria->ParejaClinica = $DatosParejaClinica['IdParejaClinica'];
                    
                    if(isset($_GET['buscar'])):
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Medico_Titular_Reporte($_GET['buscar']);
                    else:
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Medico_Titular_Reporte();
                    endif;
                }
                else if($SIS_Datos_Usuario['NombrePuesto'] == 'Alumno Operador/Asistente'){
                    
                    $Pareja_Clinica->IdAlumnoOpsAs1 = $SIS_Usuario;
                    $DatosParejaClinica = $Pareja_Clinica->Buscar_Pareja_Clinica_Alumno_Op_As();   
                    
                    $Formato_Indice_Preventivo_Operatoria->IdParejaClinica = $DatosParejaClinica['IdParejaClinica'];

                    if(isset($_GET['buscar'])):
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Alumno_Op_As_Reporte($_GET['buscar']);
                    else:
                        $Formato_Indice_Preventivo_Operatoria->Catalogo_Alumno_Op_As_Reporte();
                    endif;
                }
              ?>    
        </tbody>
    </table>
      
  </div>
</body>
</html>
