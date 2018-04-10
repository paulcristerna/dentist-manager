<html>
<head>
  <meta charset="utf-8">
  <title>Reporte de Pacientes</title>
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
  <?php include('../../core-saec/Paciente.php') ?>
  <div id="contenedor">
    <table id="cabecera">
      <tr>
        <td style="width:130px;">
          <img src="../../img/aguila_uas.jpg" width="130">
        </td>
        <td style="width:470px;">
          <h4>Reporte de Pacientes</h4>
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
            <th style="padding:5px;width:200px;">Nombre del Paciente</th>
            <th style="padding:5px;width:40px;">Sexo</th>
            <th style="padding:5px;width:100px;">Fecha de Nacimiento</th>
            <th style="padding:5px;width:100px;">Telefono</th>
            <th style="padding:5px;width:200px;">Email</th>
          </tr>
        </thead>
        <tbody>
        <?php     
            $Paciente = new Paciente();
            $Paciente->Catalogo_Pacientes_Reporte($_GET['buscar']); 
        ?>
        </tbody>
    </table>
      
  </div>
</body>
</html>
