<?php class Solicitud_Material extends AccesoBD
	{
		public $IdSolicitudMaterial;
		public $FolioSolicitudMaterial;
		public $IdAdministracion;
		public $IdSolicitante;
		public $Nota;
		public $IdMateriales;
        public $IdDepartamento;
        public $IdComunidad;
		public $Precios;
		public $Cantidades;
        public $Autorizado;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdSolicitudMaterial = null,
			$varIdAdministracion = null,
			$varFolioSolicitudMaterial = null,
			$varIdSolicitante = null,
			$varNota = null,
			$varIdMateriales = null,
            $varIdDepartamento = null,
            $varIdComunidad = null,
			$varPrecios = null,
			$varCantidades = null,
            $varAutorizado = null,
			$varEstatus = null,
			$varFechaRegistro = null
		)
		{
			$this->IdSolicitudMaterial = $varIdSolicitudMaterial;
			$this->IdAdministracion = $varIdAdministracion;
			$this->FolioSolicitudMaterial = $varFolioSolicitudMaterial;
			$this->IdSolicitante = $varIdSolicitante;
			$this->Nota = $varNota;
			$this->IdMateriales = $varIdMateriales;
            $this->IdDepartamento = $varIdDepartamento;
            $this->IdComunidad = $varIdComunidad;
			$this->Precios = $varPrecios;
			$this->Cantidades = $varCantidades;
            $this->Autorizado = $varAutorizado;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de solicitudes de materiales

		public function Catalogo_Solicitud_Material($Buscar=null)
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
						        	IdSolicitudMaterial,	
									FolioSolicitudMaterial, 
									Solicitante, 
									Autorizado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
		                            NombreComunidad,
		                            Semestre,
									Grupo,
									IdAsignacionComunidad
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE IdDepartamento = $this->IdDepartamento;";	
				}
				else if($this->IdComunidad != "" && $this->IdDepartamento == "")
				{
					$SQL = "SELECT  IdUsuario,
	                                IdSolicitudMaterial,	
	                                FolioSolicitudMaterial, 
	                                Solicitante, 
	                                Autorizado,
									IdDepartamento,
									IdComunidad,
	                                NombreDepartamento,
	                                NombreComunidad,
	                                Semestre,
									Grupo,
									IdAsignacionComunidad
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE IdAsignacionComunidad = $this->IdComunidad;";
				} 
				else if($this->IdComunidad != "" && $this->IdDepartamento != "")
				{
					$SQL = "SELECT  IdUsuario,
	                                IdSolicitudMaterial,	
	                                FolioSolicitudMaterial, 
	                                Solicitante, 
	                                Autorizado,
									IdDepartamento,
									IdComunidad,
	                                NombreDepartamento,
	                                NombreComunidad,
	                                Semestre,
									Grupo,
									IdAsignacionComunidad
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE IdAsignacionComunidad = $this->IdComunidad
                        OR IdDepartamento = $this->IdDepartamento;";
				} 
			}else{
				if($this->IdDepartamento != "" && $this->IdComunidad == "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSolicitudMaterial,	
									FolioSolicitudMaterial, 
									Solicitante, 
									Autorizado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo,
									IdAsignacionComunidad
						FROM SIS_Listado_Solicitudes_Materiales
						WHERE IdDepartamento = $this->IdDepartamento 
						AND FolioSolicitudMaterial LIKE '%$Buscar%' 
						OR Solicitante LIKE '%$Buscar%'
						OR NombreDepartamento LIKE '%$Buscar%';";
				}
				else if($this->IdComunidad != "" && $this->IdDepartamento == "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSolicitudMaterial,	
									FolioSolicitudMaterial, 
									Solicitante, 
									Autorizado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
                                    NombreComunidad,
                                    Semestre,
									Grupo,
									IdAsignacionComunidad
						FROM SIS_Listado_Solicitudes_Materiales
						WHERE IdAsignacionComunidad = $this->IdComunidad 
						AND FolioSolicitudMaterial LIKE '%$Buscar%' 
						OR Solicitante LIKE '%$Buscar%'
						OR NombreComunidad LIKE '%$Buscar%';";
				}
				else if($this->IdComunidad != "" && $this->IdDepartamento != "")
				{
					$SQL = "SELECT  IdUsuario,
	                                IdSolicitudMaterial,	
	                                FolioSolicitudMaterial, 
	                                Solicitante, 
	                                Autorizado,
									IdDepartamento,
									IdComunidad,
	                                NombreDepartamento,
	                                NombreComunidad,
	                                Semestre,
									Grupo,
									IdAsignacionComunidad
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE IdAsignacionComunidad = $this->IdComunidad
                        OR IdDepartamento = $this->IdDepartamento
                        AND	FolioSolicitudMaterial LIKE '%$Buscar%' 
                        OR Solicitante LIKE '%$Buscar%'
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
                        <td><?php echo $Linea['FolioSolicitudMaterial']; ?></td>	
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
                                if($Linea['Autorizado']=='0'){
                                    echo 'Esperando Autorizacion';
                                }else if($Linea['Autorizado']=='1'){
                                    echo 'Autorizado';
                                }else if($Linea['Autorizado']=='2'){
                                    echo 'No Autorizado';
                                }
                            ?>
                        </td>	
                        <?php if($Linea['Autorizado']==0): ?>
                        <td><a href='solicitud-material-editar.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' class='btn btn-institucional'>Editar</a></td>
                        <?php else: ?>
                        <td><a href='solicitud-material-detalle.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' class='btn btn-institucional'>Ver Solicitud</a></td>
                        <?php endif; ?>
			<td><a href='reportes/solicitud-material-generar-pdf.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' target="_blank" class='btn btn-institucional' target="_blank">Generar PDF</a></td>
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5"><?php echo ($Buscar==null ? "No hay solicitudes de materiales registradas todavía.":"No se encontro ninguna solicitudes de material en la busqueda."); ?></td>
                    </tr>
                <?php endif;

                // Liberar resultados
                mysqli_free_result($Resultado);

                // Cerrar la conexión
                mysqli_close($Conexion);
            else: ?>
                <tr>
                    <td colspan="5"><?php echo ($Buscar==null ? "No hay solicitudes de materiales registradas todavía.":"No se encontro ninguna solicitudes de material en la busqueda."); ?></td>
                </tr>
            <?php endif;
		}

		//catalogo de solicitudes de materiales en modo doctor comunitario

		public function Catalogo_Solicitud_Material_Doctor_Comunitario($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysql_error());

			// realizar la consulta
			if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo,
								IdDoctorComunitario
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE IdDoctorComunitario = $this->IdSolicitante
                        OR IdDepartamento = $this->IdDepartamento;";
            else:
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE FolioSolicitudMaterial LIKE '%$Buscar%' OR
                        Solicitante LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['FolioSolicitudMaterial']; ?></td>	
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
                            if($Linea['Autorizado']=='0'){
                                echo 'Esperando Autorizacion';
                            }else if($Linea['Autorizado']=='1'){
                                echo 'Autorizado';
                            }else if($Linea['Autorizado']=='2'){
                                echo 'No Autorizado';
                            }
                        ?>
                    </td>	
					<?php if($Linea['Autorizado']==0): ?>
                    <td><a href='solicitud-material-editar.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' class='btn btn-institucional'>Editar</a></td>
                    <?php else: ?>
                    <td><a href='solicitud-material-detalle.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' class='btn btn-institucional'>Ver Solicitud</a></td>
                    <?php endif; ?>
                    <td><a href='reportes/solicitud-material-generar-pdf.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' target="_blank" class='btn btn-institucional' target="_blank">Generar PDF</a></td>
                </tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay solicitudes de materiales registradas todavía.":"No se encontro ninguna solicitudes de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de solicitudes de materiales en modo administrador

		public function Catalogo_Solicitud_Material_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysql_error());

			// realizar la consulta
			if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Solicitudes_Materiales;";
            else:
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE FolioSolicitudMaterial LIKE '%$Buscar%' OR
                        Solicitante LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
					<td><?php echo $Linea['FolioSolicitudMaterial']; ?></td>	
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
                            if($Linea['Autorizado']=='0'){
                                echo 'Esperando Autorizacion';
                            }else if($Linea['Autorizado']=='1'){
                                echo 'Autorizado';
                            }else if($Linea['Autorizado']=='2'){
                                echo 'No Autorizado';
                            }
                        ?>
                    </td>	
					<?php if($Linea['Autorizado']==0): ?>
                    <td><a href='solicitud-material-editar.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' class='btn btn-institucional'>Editar</a></td>
                    <?php else: ?>
                    <td><a href='solicitud-material-detalle.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' class='btn btn-institucional'>Ver Solicitud</a></td>
                    <?php endif; ?>
                    <td><a href='reportes/solicitud-material-generar-pdf.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' target="_blank" class='btn btn-institucional' target="_blank">Generar PDF</a></td>
                </tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay solicitudes de materiales registradas todavía.":"No se encontro ninguna solicitudes de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de solicitudes de materiales en reportes en modo administrador
        
        public function Catalogo_Solicitud_Material_Reporte_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Solicitudes_Materiales;";
            else:
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE FolioSolicitudMaterial LIKE '%$Buscar%' OR
                        Solicitante LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
                    <td><?php 
                            $string = $Linea['FolioSolicitudMaterial'];
            
                            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['NombreDepartamento'] != "" ? 
                                      $Linea['NombreDepartamento']:$Linea['NombreComunidad'].' '.$Linea['Semestre'].'-'.$Linea['Grupo'];
            
                            echo (strlen($string) > 90) ? substr($string,0,90).'...' : $string; 
                    ?></td>
                </tr>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay solicitudes de materiales registradas todavía.":"No se encontro ninguna solicitudes de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    
        //catalogo de solicitudes de materiales en reporte en modo de un usuario no administrador

		public function Catalogo_Solicitud_Material_Reporte($Buscar=null)
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
									IdSolicitudMaterial,	
									FolioSolicitudMaterial, 
									Solicitante, 
									Autorizado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE IdDepartamento = $this->IdDepartamento;";	
				}
				else if($this->IdComunidad != "")
				{
					$SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
								IdDepartamento,
								IdComunidad,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE IdComunidad = $this->IdComunidad;";
				} 
			}else{
				if($this->IdDepartamento != "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSolicitudMaterial,	
									FolioSolicitudMaterial, 
									Solicitante, 
									Autorizado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
							FROM SIS_Listado_Solicitudes_Materiales
							WHERE IdDepartamento = $this->IdDepartamento AND
							FolioSolicitudMaterial LIKE '%$Buscar%' OR
							Solicitante LIKE '%$Buscar%';";
				}
				else if($this->IdComunidad != "")
				{
					$SQL = "SELECT  IdUsuario,
									IdSolicitudMaterial,	
									FolioSolicitudMaterial, 
									Solicitante, 
									Autorizado,
									IdDepartamento,
									IdComunidad,
									NombreDepartamento,
									NombreComunidad,
									Semestre,
									Grupo
							FROM SIS_Listado_Solicitudes_Materiales
							WHERE IdComunidad = $this->IdComunidad AND
							FolioSolicitudMaterial LIKE '%$Buscar%' OR
							Solicitante LIKE '%$Buscar%';";
				}
			}
            
            if($SQL != ""):

                $Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

                $Num_Filas = mysqli_num_rows($Resultado);

                if($Num_Filas>0): ?>
                <?php while($Linea = mysqli_fetch_array($Resultado)): ?>
                    <tr>
                        <td><?php 
                                $string = $Linea['FolioSolicitudMaterial'];

                                echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
                        ?></td>
                        <td><?php 
                                $string = $Linea['NombreDepartamento'] != "" ? 
                                          $Linea['NombreDepartamento']:$Linea['NombreComunidad'].' '.$Linea['Semestre'].'-'.$Linea['Grupo'];

                                echo (strlen($string) > 90) ? substr($string,0,90).'...' : $string; 
                        ?></td>
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2"><?php echo ($Buscar==null ? "No hay solicitudes de materiales registradas todavía.":"No se encontro ninguna solicitudes de material en la busqueda."); ?></td>
                    </tr>
                <?php endif;

                // Liberar resultados
                mysqli_free_result($Resultado);

                // Cerrar la conexión
                mysqli_close($Conexion);
            else: ?>
                <tr>
                    <td colspan="2"><?php echo ($Buscar==null ? "No hay solicitudes de materiales registradas todavía.":"No se encontro ninguna solicitudes de material en la busqueda."); ?></td>
                </tr>
            <?php endif; 
		}
	
		//dar de alta una solicitud de material
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Solicitud_Material_Alta(
                        '$this->IdSolicitante',
                        '$this->Nota',
                        '$this->IdMateriales',
                        '$this->IdDepartamento',
                        '$this->IdComunidad',
                        '$this->Precios',
                        '$this->Cantidades'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("realizo una solicitud de material",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: solicitudes-material.php?exito=Se guardo el Solicitud de material con exito');
			}else{
				header('Location: solicitudes-material.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo para autorizar solicitudes de materiales
        
        public function CatalogoAutorizar_Administrador($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
                                Grupo
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE Autorizado = 0;";
            else:
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
                                Grupo
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE Autorizado = 0 
                        AND FolioSolicitudMaterial LIKE '%$Buscar%' 
                        OR Solicitante LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
				<td><?php echo $Linea['FolioSolicitudMaterial']; ?></td>	
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
                        if($Linea['Autorizado']=='0'){
                            echo 'Esperando Autorizacion';
                        }else if($Linea['Autorizado']=='1'){
                            echo 'Autorizado';
                        }else if($Linea['Autorizado']=='2'){
                            echo 'No Autorizado';
                        }
                    ?>
                </td>
				<?php if($Linea['Autorizado']==0): ?>
                    <td><a href='autorizar-solicitud-material.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' class='btn btn-institucional'>Ver Solicitud</a></td>
                    <?php endif; ?>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay solicitudes de materiales registradas todavía.":"No se encontro ninguna solicitudes de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
	
		//catalogo para autorizar solicitudes de materiales en modo coordinador de comunidades
        
        public function CatalogoAutorizar_Coordinador_Comunidades($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombrePuesto,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE Autorizado = 0
                        AND NombrePuesto = 'Alumno Tesorero' 
                        OR NombrePuesto = 'Doctor Comunitario';";
            else:
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombrePuesto,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE Autorizado = 0 
                        AND NombrePuesto = 'Alumno Tesorero' 
                        OR NombrePuesto = 'Doctor Comunitario' 
                        OR FolioSolicitudMaterial LIKE '%$Buscar%' 
                        OR Solicitante LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
				<td><?php echo $Linea['FolioSolicitudMaterial']; ?></td>	
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
                        if($Linea['Autorizado']=='0'){
                            echo 'Esperando Autorizacion';
                        }else if($Linea['Autorizado']=='1'){
                            echo 'Autorizado';
                        }else if($Linea['Autorizado']=='2'){
                            echo 'No Autorizado';
                        }
                    ?>
                </td>	
				<?php if($Linea['Autorizado']==0): ?>
                    <td><a href='autorizar-solicitud-material.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' class='btn btn-institucional'>Autorizar</a></td>
                    <?php else: ?>
                    <td><a href='autorizar-solicitud-material-detalle.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' class='btn btn-institucional'>Ver Solicitud</a></td>
                    <?php endif; ?>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay solicitudes de materiales registradas todavía.":"No se encontro ninguna solicitudes de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
	
		//catalogo para autorizar solicitudes de materiales en modo secretario administrativo
        
        public function CatalogoAutorizar_Secretario_Administrativo($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			if($Buscar==null):
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombrePuesto,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE Autorizado = 0
                        AND NombrePuesto != 'Alumno Tesorero' 
                        AND NombrePuesto != 'Doctor Comunitario';";
            else:
                $SQL = "SELECT  IdUsuario,
                                IdSolicitudMaterial,	
                                FolioSolicitudMaterial, 
                                Solicitante, 
                                Autorizado,
                                NombrePuesto,
                                NombreDepartamento,
                                NombreComunidad,
                                Semestre,
								Grupo
                        FROM SIS_Listado_Solicitudes_Materiales
                        WHERE Autorizado = 0
                        AND NombrePuesto != 'Alumno Tesorero' 
                        AND NombrePuesto != 'Doctor Comunitario' 
                        OR FolioSolicitudMaterial  LIKE '%$Buscar%' 
                        OR Solicitante LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<tr>
				<td><?php echo $Linea['FolioSolicitudMaterial']; ?></td>	
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
                        if($Linea['Autorizado']=='0'){
                            echo 'Esperando Autorizacion';
                        }else if($Linea['Autorizado']=='1'){
                            echo 'Autorizado';
                        }else if($Linea['Autorizado']=='2'){
                            echo 'No Autorizado';
                        }
                    ?>
                </td>				
				<?php if($Linea['Autorizado']==0): ?>
                    <td><a href='autorizar-solicitud-material.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' class='btn btn-institucional'>Autorizar</a></td>
                    <?php else: ?>
                    <td><a href='autorizar-solicitud-material-detalle.php?solicitud=<?php echo $Linea['IdSolicitudMaterial']; ?>' class='btn btn-institucional'>Ver Solicitud</a></td>
                    <?php endif; ?>
			<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo ($Buscar==null ? "No hay solicitudes de materiales registradas todavía.":"No se encontro ninguna solicitudes de material en la busqueda."); ?></td>
				</tr>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}  
	
		//obtener los datos de una solicitud de material
        
        public function Obtener_Solicitud_Material()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdSolicitudMaterial,
							IdDepartamento,
							IdComunidad,
						 	FolioSolicitudMaterial, 
						 	Solicitante,
							NombreDepartamento,
							NombreComunidad,
							Semestre,
							Grupo,
						 	Nota, 
						 	Autorizado,
                            FechaRegistro,
                            IdDoctorComunitario
			    FROM SIS_Listado_Solicitudes_Materiales
			    WHERE IdSolicitudMaterial = $this->IdSolicitudMaterial;";

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
	
		//obtener los materiales de una solicitud de material
        
        public function Datos_Materiales_Solicitud()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
			$SQL = "SELECT  IdMaterial,
                            NombreMaterial,
                            Precio,
                            Cantidad,
                            UnidadMedida,
                            Existencia
                    FROM SIS_Listado_Materiales_Solicitud_Material
                    WHERE IdSolicitudMaterial = $this->IdSolicitudMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0):
			while($Linea = mysqli_fetch_array($Resultado)):?>
				<tr>
	            	<td><input type='hidden' name='material[]' value="<?php echo $Linea['IdMaterial']; ?>" class="material"><input type='hidden' name='precio[]' value="<?php echo $Linea['Precio']; ?>"><?php echo $Linea['NombreMaterial']; ?></td>
	            	<td><input type='text' class='cantidad-material' style='width:50px' name='cantidad[]' value="<?php echo $Linea['Cantidad']; ?>"><?php echo " ".$Linea['UnidadMedida']; ?></td>
	            	<td class='eliminar-fila'><a class='btn btn-danger'>Eliminar</a></td>
            	</tr>
			<?php endwhile; 
			endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}

                public function Datos_Materiales_Solicitud_Autorizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
			$SQL = "SELECT  IdMaterial,
                            NombreMaterial,
                            Precio,
                            Cantidad,
                            UnidadMedida,
                            Existencia
                    FROM SIS_Listado_Materiales_Solicitud_Material
                    WHERE IdSolicitudMaterial = $this->IdSolicitudMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0):
			while($Linea = mysqli_fetch_array($Resultado)):?>
				<tr>
	            	<td><input type='hidden' name='material[]' value="<?php echo $Linea['IdMaterial']; ?>" class="material"><input type='hidden' name='precio[]' value="<?php echo $Linea['Precio']; ?>"><?php echo $Linea['NombreMaterial']; ?></td>
	            	<td><input type='text' class='cantidad-material' style='width:50px' name='cantidad[]' value="<?php echo $Linea['Cantidad']; ?>"><?php echo " ".$Linea['UnidadMedida']; ?></td>
			<td><?php echo $Linea['Existencia']; ?> <input type="hidden" class="existencia-material" value="<?php echo $Linea['Existencia']; ?>"></td>
	            	<td class='eliminar-fila'><a class='btn btn-danger'>Eliminar</a></td>
            	</tr>
			<?php endwhile; 
			endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los detalles de una solicitud de material
        
        public function Datos_Materiales_Solicitud_Detalle()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT  IdMaterial,
                            NombreMaterial,
                            Precio,
                            Cantidad,
                            UnidadMedida
                    FROM SIS_Listado_Materiales_Solicitud_Material
                    WHERE IdSolicitudMaterial = $this->IdSolicitudMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0):
			while($Linea = mysqli_fetch_array($Resultado, MYSQL_ASSOC)):?>
				<tr>
	            	<td><?php echo $Linea['NombreMaterial']; ?></td>
	            	<td><?php echo $Linea['Cantidad']." ".$Linea['UnidadMedida']; ?></td>
            	</tr>
			<?php endwhile; 
			endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los materiales de una solicitud de material en reporte
        
        public function Datos_Materiales_Solicitud_Reporte()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));
            
			// realizar la consulta
			$SQL = "SELECT  IdMaterial,
                            NombreMaterial,
                            Precio,
                            Cantidad,
                            UnidadMedida
                    FROM SIS_Listado_Materiales_Solicitud_Material
                    WHERE IdSolicitudMaterial = $this->IdSolicitudMaterial;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas>0): ?>
            <table id="contenido">            
		      <tr style="background:#e3e3e3;">
		        <th style="padding:5px;width:350px;">Material</th>
		        <th style="padding:5px;width:350px;">Cantidad</th>
		      </tr>
			<?php while($Linea = mysqli_fetch_array($Resultado, MYSQL_ASSOC)):?>
				<tr>
	            	<td><?php 
                            $string = $Linea['NombreMaterial']; 
                            echo (strlen($string) > 45) ? substr($string,0,45).'...' : $string; 
                    ?></td>
                    <td><?php 
                            $string = $Linea['Cantidad']." ".$Linea['UnidadMedida'];
                            echo (strlen($string) > 45) ? substr($string,0,45).'...' : $string; 
                    ?></td>
            	</tr>
			<?php endwhile; ?> 
            </table>
			<?php endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//actualizar una solicitud de material
        
        public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Solicitud_Material_Actualizar(
                        '$this->IdSolicitudMaterial',
                        '$this->Nota',
                        '$this->IdMateriales',
                        '$this->Precios',
                        '$this->Cantidades'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo una solicitud de material",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: solicitudes-material.php?exito=Se guardo el Solicitud de material con exito');
			}else{
				header('Location: solicitudes-material.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//autorizar una solicitud de material

		public function Autorizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Solicitud_Material_Autorizar(
                        '$this->IdSolicitudMaterial',
                        '$this->IdDepartamento',
                        '$this->IdComunidad',
                        '$this->IdSolicitante',
                        '$this->Nota',
                        '$this->IdMateriales',
                        '$this->Precios',
                        '$this->Cantidades',
                        '$this->Autorizado'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("autorizo una solicitud de material",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar
				header('Location: autorizar-solicitudes.php?exito=Se guardo el Solicitud de material con exito'); 
			}else{
				header('Location: autorizar-solicitudes.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	}
?>