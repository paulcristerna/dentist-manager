<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="solicitud-material">
    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Solicitud_Material.php"); ?>

        <div class="span9">

          <h2>Detalle Solicitud de Material</h2>

          <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger" id="error"><?php echo $_GET['error']; ?></div>
          <?php endif; ?>

          <?php 
            $Solicitud_Material = new Solicitud_Material($_GET['solicitud']);
            $Datos_Solicitud_Material = $Solicitud_Material->Obtener_Solicitud_Material();
          ?>

          <form method="post" id="form" action="validacion_solicitud_material.php">
          <div class="well"> 
            <div class="row">
              <div class="span3">
                <label><strong>Folio de Solicitud</strong></label>
                <span><?php echo $Datos_Solicitud_Material['FolioSolicitudMaterial']; ?></span>
              </div>
            </div>

            <hr style="border-top:1px solid lightgray">                    
            
            <table id="tabla" class="table table-striped" style="overflow-y:scroll">
              <thead>
                <tr>
                  <th>Material</th>
                  <th>Cantidad</th>
                  <th></th>
                </tr>
              </thead>
              <?php $Solicitud_Material->Datos_Materiales_Solicitud_Detalle(); ?>
            </table>

          <hr style="border-top:1px solid lightgray">  

          <div class="row">
            <div class="span8">
              <label><strong>Sugerencias y Comentarios:</strong></label>
              <p><?php echo $Datos_Solicitud_Material['Nota']; ?></p>
            </div>
          </div>      

          </div>
        </div>
        <div class="row">
            <a href="../almacen/solicitudes-material.php" class="btn btn-danger pull-right "> Atras</a>
          </div>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>