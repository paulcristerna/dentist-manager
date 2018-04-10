<?php class Devolucion_Material extends AccesoBD
	{
		public $IdDevolucionMaterial;
        public $IdSalidaMaterial;
		public $IdSolicitante;
		public $IdAdministracion;
		public $FolioDevolucionMaterial;
		public $Nota;
		public $IdMateriales;
		public $Cantidades;
		public $Caducidades;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdDevolucionMaterial = null,
			$varIdSalidaMaterial = null,
			$varIdSolicitante = null,
			$varIdAdministracion = null,
			$varFolioDevolucionMaterial = null,
			$varNota = null,
			$varMateriales = null,
			$varCantidades = null,
			$varCaducidades = null,
			$varEstatus = null,
			$varFechaRegistro = null
		)
		{
			$this->IdDevolucionMaterial = $varIdDevolucionMaterial;
			$this->IdSalidaMaterial = $varIdSalidaMaterial;
			$this->IdSolicitante = $varIdSolicitante;
			$this->IdAdministracion = $varIdAdministracion;
			$this->FolioDevolucionMaterial = $varFolioDevolucionMaterial;
			$this->Nota = $varNota;
			$this->IdMateriales = $varMateriales;
			$this->Cantidades = $varCantidades;
			$this->Caducidades = $varCaducidades;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de devoluciones de material en modo administrador

		public function Catalogo_Devolucion_Material_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                IdDevolucionMaterial, 
                                FolioDevolucionMaterial, 
                                Solicitante,
                                NombreDepartamento,
                                CONCAT(NombreComunidad,' ',Semestre,'-',Grupo) AS NombreComunidad
                        FROM SIS_Listado_Devoluciones_Materiales;";
            else:
                $SQL = "SELECT  IdUsuario,
                                IdDevolucionMaterial, 
                                FolioDevolucionMaterial, 
                                Solicitante,
                                NombreDepartamento,
                                CONCAT(NombreComunidad,' ',Semestre,'-',Grupo) AS NombreComunidad
                        FROM SIS_Listado_Devoluciones_Materiales
                        WHERE FolioDevolucionMaterial LIKE '%$Buscar%' OR
                        Solicitante LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['FolioDevolucionMaterial']; ?></td>	
					<td><?php 
                        if($Linea['NombreComunidad']!=""):
                            echo $Linea['NombreComunidad'];            
                        endif; 

                        if($Linea['NombreDepartamento']!=""):
                            echo $Linea['NombreDepartamento'];            
                        endif; 
                        ?>
                    </td>
					<td><a href="devolucion-material-detalle.php?devolucion=<?php echo $Linea['IdDevolucionMaterial'] ?>" class='btn btn-institucional'>Ver Detalle</a></td>
                    <td><a href="reportes/devolucion-material-generar-pdf.php?devolucion=<?php echo $Linea['IdDevolucionMaterial'] ?>" class='btn btn-institucional' target="_blank">Generar PDF</a></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="4"><?php echo ($Buscar == null ? "No hay devoluciones de materiales registradas todavía.":"No se encontro ninguna devolución de material en la busqueda."); ?></td>
				</tr>
			<?php endif; 

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
        
		//catalogo de dovoluciones de material en los reportes
	
        public function Catalogo_Devolucion_Material_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                IdDevolucionMaterial, 
                                FolioDevolucionMaterial, 
                                Solicitante,
                                NombreDepartamento,
                                CONCAT(NombreComunidad,' ',Semestre,'-',Grupo) AS NombreComunidad
                        FROM SIS_Listado_Devoluciones_Materiales;";
            else:
                $SQL = "SELECT  IdUsuario,
                                IdDevolucionMaterial, 
                                FolioDevolucionMaterial, 
                                Solicitante,
                                NombreDepartamento,
                                CONCAT(NombreComunidad,' ',Semestre,'-',Grupo) AS NombreComunidad
                        FROM SIS_Listado_Devoluciones_Materiales
                        WHERE FolioDevolucionMaterial LIKE '%$Buscar%' OR
                        Solicitante LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>	
                    <td><?php 
                            $string = $Linea['FolioDevolucionMaterial'];
            
                            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = ($Linea['NombreComunidad'] != "" ?
                                       $Linea['NombreComunidad']:$Linea['NombreDepartamento']);
            
                            echo (strlen($string) > 90) ? substr($string,0,90).'...' : $string; 
                    ?></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar == null ? "No hay devoluciones de materiales registradas todavía.":"No se encontro ninguna devolución de material en la busqueda."); ?></td>
				</tr>
			<?php endif; 

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//dar de alta una devolucion de material
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Devolucion_Material_Alta(
                        '$this->IdSalidaMaterial',
                        '$this->IdSolicitante',
                        '$this->Nota',
                        '$this->IdMateriales',
                        '$this->Cantidades',
                        '$this->Caducidades'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo una devolucion de material",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: devoluciones-materiales.php?exito=Se guardo la Devolución con exito');
			}else{
				header('Location: devoluciones-materiales.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}      
	
		//obtener los datos de una devolucion de material
        
        public function Obtener_Devolucion_Material()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "SELECT  IdDevolucionMaterial, 
							FolioDevolucionMaterial,
                                                        NombreDepartamento,
                                                        CONCAT(NombreComunidad,' ',Semestre,'-',Grupo) AS NombreComunidad,
							Nota,	
							Solicitante 
					FROM SIS_Listado_Devoluciones_Materiales
					WHERE IdDevolucionMaterial = $this->IdDevolucionMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			$Datos = null;

			if($Num_Filas>0):
				$Datos = mysqli_fetch_array($Resultado);
			endif;					

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);

			return $Datos;
		}
	
		//obtener las salidas de materiales
        
        public function Salida_Material_Materiales($Folio_Salida=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdSalidaMaterial,
                            IdMaterial,
                            FolioSalidaMaterial,
                            NombreMaterial,
                            CantidadMaterial,
                            UnidadMedidaMaterial
                    FROM SIS_Listado_Materiales_Salida_Material
                    WHERE FolioSalidaMaterial = '$Folio_Salida';";
            
			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			$IdSalidaMaterial = "";

			if($Num_Filas>0):
			while($Linea = mysqli_fetch_array($Resultado)):?>
			  <?php $IdSalidaMaterial = $Linea['IdSalidaMaterial']; ?>
				<tr>
	            	<td>
                        <input type='hidden' name='material[]' value="<?php echo $Linea['IdMaterial']; ?>" class="material">
                        <?php echo $Linea['NombreMaterial']; ?>
                    </td>
	            	<td>
                        <input type='text' style='width:50px' name='cantidad[]' value="<?php echo $Linea['CantidadMaterial']; ?>">
                        <?php echo " ".$Linea['UnidadMedidaMaterial']; ?>
                    </td>
                    <td><input type="text" class="calendario" placeholder="Fecha de Caducidad" name="caducidad[]"></td>
	            	<td class='eliminar-fila'><a class='btn btn-danger'>Eliminar</a></td>
            	</tr>
			<?php endwhile;	?>
            <input type="hidden" name="salida-material" value="<?php echo $IdSalidaMaterial; ?>">
            <?php else: ?>
				<tr>
					<td colspan="3">No existe un hoja de salida con el folio de salida indicado.</td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);

			return $IdSalidaMaterial;
		}
	
		//obtener el detalle de materiales de una devolucion de material
        
        public function Devolucion_Material_Materiales_Detalle()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdMaterial,
                            NombreMaterial,
                            Cantidad,
                            UnidadMedida,
                            Precio
                    FROM SIS_Listado_Materiales_Devolucion_Material
                    WHERE IdDevolucionMaterial = $this->IdDevolucionMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0):
			while($Linea = mysqli_fetch_array($Resultado, MYSQL_ASSOC)):?>
				<tr>
            	<td><?php echo $Linea['NombreMaterial']; ?></td>
            	<td><?php echo $Linea['Cantidad']." ".$Linea['UnidadMedida']; ?></td>
            	</tr>
			<?php endwhile;	else: ?>
				<tr>
					<td colspan="5">No se encontraron materiales.</td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los materiales de una devolucion de material en le reporte
        
        public function Devolucion_Material_Materiales_Reporte()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdMaterial,
                            NombreMaterial,
                            Cantidad,
                            UnidadMedida,
                            Precio
                    FROM SIS_Listado_Materiales_Devolucion_Material
                    WHERE IdDevolucionMaterial = $this->IdDevolucionMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0):
            $Total = 0; ?>
            <table id="contenido">            
		      <tr style="background:#e3e3e3;">
		        <th style="padding:5px;width:350px;">Material</th>
		        <th style="padding:5px;width:350px;">Cantidad</th>
		      </tr>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
                <tr>
	            	<td><?php 
                            $string = $Linea['NombreMaterial']; 
            
                            echo (strlen($string) > 55) ? substr($string,0,55).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Cantidad']." ".$Linea['UnidadMedida'];
            
                            echo (strlen($string) > 55) ? substr($string,0,55).'...' : $string; 
                    ?></td>
            	</tr>
			<?php endwhile; ?>                
            </table>
            <table style="margin-top:100px">
                <tr>
                    <td style="padding:15px 15px 15px 150px;">
                        <span>_____________________________</span>
                        <p>Firma de Almacenista</p>
                    </td>
                    <td style="padding:15px 100px 15px 15px;">
                        <span>_____________________________</span>
                        <p>Firma de Solicitante</p>
                    </td>
                </tr>
            </table>
			<?php endif;            

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	}
?>