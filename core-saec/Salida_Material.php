<?php class Salida_Material extends AccesoBD
	{
		public $IdSalidaMaterial;
		public $IdUsuario;
		public $FolioSalidaMaterial;
		public $IdAdministracion;
        public $IdDepartamento;
        public $IdComunidad;
		public $FechaRegistro;
		public $Estatus;

		public function __construct
		(
			$varIdSalidaMaterial = '',
			$varIdUsuario = '',
			$varFolioSalidaMaterial = '',
			$varIdAdministracion = '',
			$varIdDepartamento = '',
			$varIdComunidad = '',
			$varFechaRegistro = '',
			$varEstatus = ''
		)
		{
			$this->IdSalidaMaterial = $varIdSalidaMaterial;
			$this->IdUsuario = $varIdUsuario;
			$this->FolioSalidaMaterial = $varFolioSalidaMaterial;
			$this->IdAdministracion = $varIdAdministracion;
			$this->IdDepartamento = $varIdDepartamento;
			$this->IdComunidad = $varIdComunidad;
			$this->FechaRegistro = $varFechaRegistro;
			$this->Estatus = $varEstatus;
		}

		//catalogo de salidas de materiales
	
		public function Catalogo_Salida_Material($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "";
            
            if($Buscar==null){
				if($this->IdDepartamento != "" && $this->IdComunidad == "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSalidaMaterial,	
									FolioSalidaMaterial, 
									IdDepartamento, 
									Entregado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE IdDepartamento = $this->IdDepartamento;";	
				}
				else if($this->IdComunidad != "" && $this->IdDepartamento == "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSalidaMaterial,	
									FolioSalidaMaterial, 
									IdDepartamento, 
									Entregado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE IdComunidad = $this->IdComunidad;";
				}

				else if($this->IdComunidad != "" && $this->IdDepartamento != "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSalidaMaterial,	
									FolioSalidaMaterial, 
									IdDepartamento, 
									Entregado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE IdComunidad = $this->IdComunidad
                        OR IdDepartamento = $this->IdDepartamento;";
				}
			}else{
				if($this->IdDepartamento != "" && $this->IdComunidad == "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSalidaMaterial,	
									FolioSalidaMaterial, 
									IdDepartamento, 
									Entregado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
							FROM SIS_Listado_Salidas_Materiales
							WHERE IdDepartamento = $this->IdDepartamento 
							AND FolioSalidaMaterial LIKE '%$Buscar%' 
							OR NombreDepartamento LIKE '%$Buscar%';";
				}
				else if($this->IdComunidad != "" && $this->IdDepartamento == "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSalidaMaterial,	
									FolioSalidaMaterial, 
									IdDepartamento, 
									Entregado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
							FROM SIS_Listado_Salidas_Materiales
							WHERE IdComunidad = $this->IdComunidad
							AND FolioSalidaMaterial LIKE '%$Buscar%' 
							OR NombreComunidad LIKE '%$Buscar%';";
				}

				else if($this->IdComunidad != "" && $this->IdDepartamento != "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSalidaMaterial,	
									FolioSalidaMaterial, 
									IdDepartamento, 
									Entregado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
							FROM SIS_Listado_Salidas_Materiales
							WHERE IdComunidad = $this->IdComunidad
							OR IdDepartamento = $this->IdDepartamento
							AND FolioSalidaMaterial LIKE '%$Buscar%' 
							OR NombreComunidad LIKE '%$Buscar%'
							OR NombreDepartamento LIKE '%$Buscar%';";
				}
            }
            
            if($SQL != ""):
                $Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

                $Num_Filas = mysqli_num_rows($Resultado);

                if($Num_Filas>0): ?>
                <?php while($Linea = mysqli_fetch_array($Resultado)): ?>
                    <tr>
                        <td><?php echo $Linea['FolioSalidaMaterial']; ?></td>
                        <td><?php 
                        	if($Linea['NombreComunidad']!="")
                            {
                            	echo $Linea['NombreComunidad'].' '.$Linea['Semestre'].'-'.$Linea['Grupo'];        
                            }
                            else
                            {
                                echo $Linea['NombreDepartamento'];            
                            }
                            ?>
                        </td>	
                        <td><?php 
                                if($Linea['Entregado']=="0")
                                {
                                    echo "No Entregado";
                                }
                                else
                                {
                                    echo "Entregado";
                                }
                            ?>
                        </td>
                        <td><a href="salida-material-detalle.php?salida=<?php echo $Linea['IdSalidaMaterial']; ?>" class='btn btn-institucional'>Ver Salida</a>
                        </td>
                        <td><td><a href="reportes/salida-material-generar-pdf.php?salida=<?php echo $Linea['IdSalidaMaterial']; ?>" class='btn btn-institucional' target="_blank">Generar PDF</a></td>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5"><?php echo ($Buscar==null ? "No hay salidas de materiales registradas todavía.":"No se encontro ninguna salida de material en la busqueda."); ?></td>
                    </tr>
                <?php endif;
            
            // Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
            
            else: ?>
                <tr>
                    <td colspan="5"><?php echo ($Buscar==null ? "No hay salidas de materiales registradas todavía.":"No se encontro ninguna salida de material en la busqueda."); ?></td>
                </tr>
            <?php endif;
		}

		//catalogo de salida de materiales en modo Doctor Comunitario

		public function Catalogo_Salida_Material_Doctor_Comunitario($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
                                Grupo,
                                IdDoctorComunitario,
                                IdDepartamento
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE IdDoctorComunitario = $this->IdUsuario
                        OR IdDepartamento = $this->IdDepartamento;";
            else:
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
                                Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE FolioSalidaMaterial LIKE '%$Buscar%' OR 
						Solicitante LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['FolioSalidaMaterial']; ?></td>
					<td><?php 
                        if($Linea['NombreComunidad']!="")
                        {
                            echo $Linea['NombreComunidad'].' '.$Linea['Semestre'].'-'.$Linea['Grupo'];           
                        }
                        else
                        {
                            echo $Linea['NombreDepartamento'];            
                        }
                        ?>
                    </td>
					<td><?php 
                            if($Linea['Entregado']=="0")
                            {
                                echo "No Entregado";
                            }
                            else
                            {
                                echo "Entregado";
                            }
                        ?>
                    </td>
                    <td><a href="salida-material-detalle.php?salida=<?php echo $Linea['IdSalidaMaterial']; ?>" class='btn btn-institucional'>Ver Salida</a>
                    </td>
					<td><td><a href="reportes/salida-material-generar-pdf.php?salida=<?php echo $Linea['IdSalidaMaterial']; ?>" class='btn btn-institucional' target="_blank">Generar PDF</a></td>
                    </td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay salidas de materiales registradas todavía.":"No se encontro ninguna salida de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de salida de materiales en modo administrador

		public function Catalogo_Salida_Material_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
                                Grupo
                        FROM SIS_Listado_Salidas_Materiales;";
            else:
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
                                Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE FolioSalidaMaterial LIKE '%$Buscar%' OR 
						Solicitante LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['FolioSalidaMaterial']; ?></td>
					<td><?php 
                        if($Linea['NombreComunidad']!="")
                        {
                            echo $Linea['NombreComunidad'].' '.$Linea['Semestre'].'-'.$Linea['Grupo'];           
                        }
                        else
                        {
                            echo $Linea['NombreDepartamento'];            
                        }
                        ?>
                    </td>
					<td><?php 
                            if($Linea['Entregado']=="0")
                            {
                                echo "No Entregado";
                            }
                            else
                            {
                                echo "Entregado";
                            }
                        ?>
                    </td>
                    <td><a href="salida-material-detalle.php?salida=<?php echo $Linea['IdSalidaMaterial']; ?>" class='btn btn-institucional'>Ver Salida</a>
                    </td>
					<td><td><a href="reportes/salida-material-generar-pdf.php?salida=<?php echo $Linea['IdSalidaMaterial']; ?>" class='btn btn-institucional' target="_blank">Generar PDF</a></td>
                    </td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay salidas de materiales registradas todavía.":"No se encontro ninguna salida de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}

                //catalogo de salida de materiales en modo administrador

		public function Catalogo_Salida_Material_Administrador_Reportes($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE Entregado = 1;";
            else:
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE FolioSalidaMaterial LIKE '%$Buscar%' OR 
						Solicitante LIKE '%$Buscar%'
                        AND Entregado = 1;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['FolioSalidaMaterial']; ?></td>
					<td><?php 
                        if($Linea['NombreComunidad']!="")
		                {
		                    echo $Linea['NombreComunidad'].' '.$Linea['Semestre'].'-'.$Linea['Grupo'];
		                } 
		                else
		                {
		                    echo $Linea['NombreDepartamento'];            
		                }
                        ?>
                    </td>		
                    <td><a href="salida-material-detalle.php?salida=<?php echo $Linea['IdSalidaMaterial']; ?>" class='btn btn-institucional'>Ver Salida</a>
                    </td>
					<td><td><a href="reportes/salida-material-generar-pdf.php?salida=<?php echo $Linea['IdSalidaMaterial']; ?>" class='btn btn-institucional' target="_blank">Generar PDF</a></td>
                    </td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay salidas de materiales registradas todavía.":"No se encontro ninguna salida de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de salidas de materiales en modo de almacenista
		
		public function Catalogo_Salida_Material_Almacenista($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE Entregado = 0;";
            else:
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE FolioSalidaMaterial LIKE '%$Buscar%' OR
                        Solicitante LIKE '%$Buscar%' AND Entregado = 0;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['FolioSalidaMaterial']; ?></td>
					<td><?php 
                        if($Linea['NombreComunidad']!="")
		                {
		                    echo $Linea['NombreComunidad'].' '.$Linea['Semestre'].'-'.$Linea['Grupo'];
		                } 
		                else
		                {
		                    echo $Linea['NombreDepartamento'];            
		                }
                        ?>
                    </td>
					<td><?php 
                            if($Linea['Entregado']=="0")
                            {
                                echo "No Entregado";
                            }
                            else
                            {
                                echo "Entregado";
                            }
                        ?>
                    </td>
                    <td><a href="salida-material-detalle.php?salida=<?php echo $Linea['IdSalidaMaterial']; ?>" class='btn btn-institucional'>Ver Salida</a>
                    </td>
					<td><td><a href="reportes/salida-material-generar-pdf.php?salida=<?php echo $Linea['IdSalidaMaterial']; ?>" class='btn btn-institucional' target="_blank">Generar PDF</a></td>
                    </td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay salidas de materiales registradas todavía.":"No se encontro ninguna salida de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de salidas de material en reporte en modo de administrador
        
        public function Catalogo_Salida_Material_Administrador_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Salidas_Materiales";
            else:
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE FolioSalidaMaterial LIKE '%$Buscar%' OR
                        Solicitante LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
                    <td><?php 
                            $string = $Linea['FolioSalidaMaterial'];
            
                            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['NombreComunidad'] != "" ? $Linea['NombreComunidad'].' '.$Linea['Semestre'].'-'.$Linea['Grupo']:$Linea['NombreDepartamento']; 
            
                            echo (strlen($string) > 100) ? substr($string,0,100).'...' : $string; 
                    ?></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar==null ? "No hay salidas de materiales registradas todavía.":"No se encontro ninguna salida de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}    
	
		//catalogo de salidas de material en reporte individual
        
        public function Catalogo_Salida_Material_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE Entregado = 0;";
            else:
                $SQL = "SELECT  IdSalidaMaterial, 
                                FolioSalidaMaterial, 
                                Solicitante, 
                                Entregado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE FolioSalidaMaterial LIKE '%$Buscar%' OR
                        Solicitante LIKE '%$Buscar%' AND Entregado = 0;";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
                    <td><?php 
                            $string = $Linea['FolioSalidaMaterial'];
            
                            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['NombreComunidad'] != "" ? $Linea['NombreComunidad'].' '.$Linea['Semestre'].'-'.$Linea['Grupo']:$Linea['NombreDepartamento']; 
            
                            echo (strlen($string) > 100) ? substr($string,0,100).'...' : $string; 
                    ?></td>
				</tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay salidas de materiales registradas todavía.":"No se encontro ninguna salida de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    
        //catalogo de salidas de material en reporte en conjunto
	
		public function Catalogo_Salida_Materiales_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            $SQL = "";
            if($Buscar==null){
				if($this->IdDepartamento != "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSalidaMaterial,	
									FolioSalidaMaterial, 
									IdDepartamento, 
									Entregado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE IdDepartamento = $this->IdDepartamento;";	
				}
				else if($this->IdComunidad != "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSalidaMaterial,	
									FolioSalidaMaterial, 
									IdDepartamento, 
									Entregado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
                        FROM SIS_Listado_Salidas_Materiales
                        WHERE IdComunidad = $this->IdComunidad;";
				}
			}else{
				if($this->IdDepartamento != "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSalidaMaterial,	
									FolioSalidaMaterial, 
									IdDepartamento, 
									Entregado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
							FROM SIS_Listado_Salidas_Materiales
							WHERE IdDepartamento = $this->IdDepartamento AND
							FolioSalidaMaterial LIKE '%$Buscar%';";
				}
				else if($this->IdComunidad != "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSalidaMaterial,	
									FolioSalidaMaterial, 
									IdDepartamento, 
									Entregado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
							FROM SIS_Listado_Salidas_Materiales
							WHERE IdComunidad = $this->IdComunidad AND
							FolioSalidaMaterial LIKE '%$Buscar%'';";
				}
            }
            
            if($SQL != ""):
                $Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

                $Num_Filas = mysqli_num_rows($Resultado);

                if($Num_Filas>0): ?>
                <?php while($Linea = mysqli_fetch_array($Resultado)): ?>
                    <tr>
                    <td><?php 
                            $string = $Linea['FolioSalidaMaterial'];
            
                            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['NombreComunidad'] != "" ? $Linea['NombreComunidad'].' '.$Linea['Semestre'].'-'.$Linea['Grupo']:$Linea['NombreDepartamento']; 
            
                            echo (strlen($string) > 100) ? substr($string,0,100).'...' : $string; 
                    ?></td>
				</tr>
                <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2"><?php echo ($Buscar==null ? "No hay salidas de materiales registradas todavía.":"No se encontro ninguna salida de material en la busqueda."); ?></td>
                    </tr>
                <?php endif;

                // Liberar resultados
                mysqli_free_result($Resultado);

                // Cerrar la conexión
                mysqli_close($Conexion);
            else: ?>
                <tr>
                        <td colspan="2"><?php echo ($Buscar==null ? "No hay salidas de materiales registradas todavía.":"No se encontro ninguna salida de material en la busqueda."); ?></td>
                    </tr>
            <?php endif; 
		}
	
		//obtener los datos de una salida material

		public function Obtener_Salida_Material()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT 	IdSalidaMaterial, 
							FolioSalidaMaterial, 
                            FolioSolicitudMaterial,
                            NombreDepartamento,
                    		NombreComunidad,
                    		Semestre,
							Grupo,
							Solicitante,
                            SolicitanteAut,
                            SolicitanteEnt,
                            IdUsuario,
							Nota, 
							Entregado 
					FROM SIS_Listado_Salidas_Materiales
					WHERE IdSalidaMaterial = $this->IdSalidaMaterial;";

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
	
		//obtener los materiales de las salidas de materiales 
        
        public function Datos_Materiales_Salida()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdMaterial,
                            NombreMaterial,
                            CantidadMaterial,
                            UnidadMedidaMaterial,
                            Precio
                    FROM SIS_Listado_Materiales_Salida_Material
                    WHERE IdSalidaMaterial = $this->IdSalidaMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0):
            $Total=0;
			while($Linea = mysqli_fetch_array($Resultado)):
				$Cantidad = number_format($Linea['CantidadMaterial'],2);
                $Precio = number_format($Linea['Precio'],2);
                $Total += $Cantidad * $Precio; ?>
                <tr>
	            	<td><?php 
                            $string = $Linea['NombreMaterial']; 
                            echo (strlen($string) > 45) ? substr($string,0,45).'...' : $string; 
                        ?>
                    </td>
	            	<td><?php echo $Cantidad." ".$Linea['UnidadMedidaMaterial']; ?></td>
	            	<td>$ <?php echo $Precio; ?></td>
	            	<td>$ <?php echo number_format($Cantidad*$Precio,2); ?></td>
            	</tr>
			<?php endwhile; ?> 
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo "$ ".number_format($Total,2); ?></td>
                </tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los materiales de las salidas de materiales en reportes
        
        public function Datos_Materiales_Salida_Reporte()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdMaterial,
                            NombreMaterial,
                            CantidadMaterial,
                            UnidadMedidaMaterial,
                            Precio
                    FROM SIS_Listado_Materiales_Salida_Material
                    WHERE IdSalidaMaterial = $this->IdSalidaMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0):
            $Total = 0; ?>
            <table id="contenido">            
		      <tr style="background:#e3e3e3;">
		        <th style="padding:5px;width:260px;">Material</th>
		        <th style="padding:5px;width:150px;">Cantidad</th>
		        <th style="padding:5px;width:120px;">Precio</th>
		        <th style="padding:5px;width:120px;">Total</th>
		      </tr>
			<?php while($Linea = mysqli_fetch_array($Resultado)): 
				$Cantidad = number_format($Linea['CantidadMaterial'],2);
                $Precio = number_format($Linea['Precio'],2);
                $Total += $Cantidad * $Precio; ?>
                <tr>
	            	<td><?php 
                            $string = $Linea['NombreMaterial']; 
            
                            echo (strlen($string) > 50) ? substr($string,0,50).'...' : $string; 
                        ?>
                    </td>
                    <td><?php 
                            $string = $Cantidad." ".$Linea['UnidadMedidaMaterial'];
            
                            echo (strlen($string) > 30) ? substr($string,0,30).'...' : $string; 
                        ?>
                    </td>
                    <td>$<?php 
                            $string = $Precio;
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                    ?></td>
                    <td>$<?php 
                            $string = number_format($Cantidad*$Precio,2);
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                    ?></td>
            	</tr>
			<?php endwhile; ?>                
            </table>
            <table>
                <tr>
                    <td style="padding:5px;width:260px;"></td>
                    <td style="padding:5px;width:150px;"></td>
                    <td style="padding:5px;width:120px;"></td>
                    <td style="background:#e3e3e3;border:1px solid #e3e3e3;margin:0;padding:3px;width:128px;">
                        $<?php 
                            $string = number_format($Total,2);
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                    ?></td>                    
                </tr>
            </table>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//entregar una salida de material 
        
        public function Entregar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Salida_Material_Entregar(
                                        '$this->IdSalidaMaterial',
                                        '$this->IdUsuario'
                        );";

			$IdSalida = $this->IdSalidaMaterial;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));
			
			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("entrego una salida de material",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: salidas-material.php?exito=Se guardo la Entrega de Material con exito&salida='.$IdSalida);
			}else{
				header('Location: salidas-material.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	}
?>
