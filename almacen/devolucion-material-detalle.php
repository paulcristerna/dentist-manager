<?php include("../header2.php"); ?>
<input type="hidden" id="ventana" value="devolucion-material">

    <div class="container">

      <div class="row" id="contenido-sistema">

        <!-- menu del sistema -->
        <?php include("../menu.php"); ?>
        <?php include("../core-saec/Devolucion_Material.php"); ?>

        <div class="span9">

          <h2>Detalle Devolución de Material</h2>

          <?php 
            $Devolucion_Material = new Devolucion_Material($_GET['devolucion']);
            $Datos_Devolucion_Material = $Devolucion_Material->Obtener_Devolucion_Material(); 
          ?>

          <div class="well">
            <div class="row">  
              <div class="span3">
                <label><strong>Folio de Devolución</strong></label>
                <label><?php echo $Datos_Devolucion_Material['FolioDevolucionMaterial']; ?></label>
              </div> 
            </div>   

            <hr style="border-top:1px solid lightgray">   

           <div class="row">  
              <div class="span3">
                <label><strong>Departamento/Comunidad</strong></label>
                <label><?php echo $Datos_Devolucion_Material['NombreDepartamento'] != "" ? $Datos_Devolucion_Material['NombreDepartamento']:$Datos_Devolucion_Material['NombreComunidad']; ?></label>
              </div> 
            </div>               
            
          <table id="tabla" class="table table-striped" style="overflow-y:scroll">
            <thead>
              <tr>
                <th>Material</th>
                <th>Cantidad</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php $Devolucion_Material->Devolucion_Material_Materiales_Detalle(); ?>
            </tbody>
          </table>

          <hr style="border-top:1px solid lightgray">  

          <div class="row">
            <div class="span8">
              <label><strong>Motivo de la Devolución:</strong></label>
              <p><?php echo $Datos_Devolucion_Material['Nota']; ?></p>
            </div>
            <input type="hidden" name="solicitante" value="<?php echo $SIS_Usuario; ?>">
          </div>

          </div>
        </div>
        <div class="row">
            <a href="../almacen/devoluciones-materiales.php" class="btn btn-danger pull-right "> Atras</a>
          </div>
        </div>

      </div><!--/.row -->
      

<?php include("../footer2.php"); ?>