<?php class Reporte extends AccesoBD
	{
		public $IdReporte;
		public $FechaInicio;
		public $FechaFin;
		public $IdDepartamento;
        public $IdComunidad;
        public $IdMateria;
        public $Sexo;
        public $EdadInicio;
        public $EdadFin;
        public $IdCajero;
        public $Turno;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdReporte = null,
		 	$varFechaInicio = null,
		 	$varFechaFin = null,
		 	$varIdDepartamento = null,
            $varIdComunidad = null,
            $varIdMateria = null,
            $varSexo = null,
            $varEdadInicio = null,
            $varEdadFin = null,
            $varIdCajero = null,
            $varTurno = null,
		 	$varEstatus = null,
		 	$varFechaRegistro = null
		)
		{
			$this->IdReporte = $varIdReporte;
			$this->FechaInicio = $varFechaInicio;
			$this->FechaFin = $varFechaFin;
			$this->IdDepartamento = $varIdDepartamento;
            $this->IdComunidad = $varIdComunidad;
            $this->IdMateria = $varIdMateria;
            $this->Sexo = $varSexo;
            $this->EdadInicio = $varEdadInicio;
            $this->EdadFin = $varEdadFin;
            $this->IdCajero = $varIdCajero;
            $this->Turno = $varTurno;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//generar un reporte de estadisticas de salida
        
        public function Generar_Estadistica_Salida()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Estadisticas_Salida('$this->FechaInicio','$this->FechaFin');";

			//echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado); ?>

			<table id="contenido">            
		      <tr style="background:#e3e3e3;">
		        <th style="padding:5px;width:70px;">Folio</th>
		        <th style="padding:5px;width:100px;">Fecha</th>
		        <th style="padding:5px;width:380px;">Departamento</th>
		        <th style="padding:5px;width:100px;">Total</th>
		      </tr>

			<?php if($Num_Filas > 0):
				$TotalGlobal = floatval(0); ?>				
			<?php while($Linea = mysqli_fetch_array($Resultado)):
					// formato de salida de valores
					$date = new DateTime($Linea['Fecha']);
					$Fecha = $date->format('d-m-Y'); 

					$Total = number_format($Linea['Total'],2);
					$TotalGlobal = floatval($TotalGlobal) + floatval($Linea['Total']);
			?>
					<tr>
                        <td><?php 
                            $string = $Linea['Folio']; 
            
                            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Fecha;
            
                            echo (strlen($string) > 10) ? substr($string,0,10).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['NombreDepartamento'] != "" ? 
                                      $Linea['NombreDepartamento']:$Linea['NombreComunidad'];
            
                            echo (strlen($string) > 80) ? substr($string,0,80).'...' : $string; 
                        ?></td>
                        <td>$<?php 
                            $string = $Total;
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
				</table>
				<table>
					<tr>
						<td style="padding:5px;width:70px;"></td>
				        <td style="padding:5px;width:100px;"></td>
				        <td style="padding:5px;width:380px;"></td>
                        <td style="background:#e3e3e3;border:1px solid #e3e3e3;margin:0;padding:3px;width:108px;">
                        $<?php 
                            $string = number_format($TotalGlobal,2);;
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                        ?></td>
					</tr>
				</table>				
			<?php else: ?>
				<tr>
					<td>No hay estadisticas para este rango.</td>
				</tr>
			</table>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//generar un reporte de dinero entregado a departamentos
        
        public function Generar_Dinero_Entregado_Departamentos()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Dinero_Entregado_Departamentos('$this->FechaInicio','$this->FechaFin');";

			//echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado); ?>

			<table id="contenido">            
		      <tr style="background:#e3e3e3;">
		        <th style="padding:5px;width:600px;">Departamento</th>
		        <th style="padding:5px;width:100px;">Total</th>
		      </tr>

			<?php if($Num_Filas > 0):
				$TotalGlobal = floatval(0);
				while($Linea = mysqli_fetch_array($Resultado)):
					// formato de salida de valores
					$Total = number_format($Linea['Total'],2);
					$TotalGlobal = floatval($TotalGlobal) + floatval($Linea['Total']);
				?>
					<tr>
                        <td><?php 
                            $string = $Linea['NombreDepartamento'] != "" ? 
                                      $Linea['NombreDepartamento']:$Linea['NombreComunidad'];
            
                            echo (strlen($string) > 80) ? substr($string,0,80).'...' : $string; 
                        ?></td>
                        <td>$<?php 
                            $string = $Total;
            
                            echo (strlen($string) > 80) ? substr($string,0,80).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
				</table>
				<table>
					<tr>
				        <td style="padding:5px;width:600px;"></td>
						<td style="background:#e3e3e3;border:1px solid #e3e3e3;margin:0;padding:3px;width:108px;">
                        $<?php 
                            $string = number_format($TotalGlobal,2);
            
                            echo (strlen($string) > 80) ? substr($string,0,80).'...' : $string; 
                        ?></td>
					</tr>
				</table>				
			<?php else: ?>
				<tr>
					<td>No hay estadisticas para este rango.</td>
				</tr>
			</table>
			<?php endif;					

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//generar un reporte de estadisticas de total de materiales

        public function Generar_Estadistico_Total_Materiales()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Estadistico_Total_Materiales('$this->FechaInicio','$this->FechaFin','$this->IdDepartamento','$this->IdComunidad');";

			//echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado); ?>

			<table id="contenido">            
		      <tr style="background:#e3e3e3;">
		        <th style="padding:5px;width:350px;">Material</th>
		        <th style="padding:5px;width:100px;">Cantidad</th>
		        <th style="padding:5px;width:100px;">Precio</th>
		        <th style="padding:5px;width:100px;">Total</th>
		      </tr>

			<?php if($Num_Filas > 0):
				$TotalGlobal = floatval(0);
				while($Linea = mysqli_fetch_array($Resultado)):
					// formato de salida de valores
					$Total = number_format($Linea['Total'],2);
					$TotalGlobal = floatval($TotalGlobal) + floatval($Linea['Total']);
				?>
					<tr>
                        <td><?php 
                            $string = $Linea['NombreMaterial'];
            
                            echo (strlen($string) > 80) ? substr($string,0,80).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['Cantidad'];
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                        ?></td>
                        <td>$<?php 
                            $string = $Linea['Precio'];
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                        ?></td>
                        <td>$<?php 
                            $string = $Total;
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
				</table>
				<table>
					<tr>
				        <td style="padding:5px;width:350px;"></td>
				        <td style="padding:5px;width:100px;"></td>
				        <td style="padding:5px;width:100px;"></td>
                        <td style="background:#e3e3e3;border:1px solid #e3e3e3;margin:0;padding:3px;width:108px;">
                        $<?php 
                            $string = number_format($TotalGlobal,2);
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                        ?></td>
					</tr>
				</table>				
			<?php else: ?>
				<tr>
					<td colspan="4">No hay estadisticas para este rango.</td>
				</tr>
			</table>
			<?php endif;		

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//generar un reporte de total de egresos
        
        public function Generar_Total_Egresos()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Total_Egresos('$this->FechaInicio','$this->FechaFin','$this->IdDepartamento','$this->IdComunidad');";

			//echo $SQL;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado); ?>

			<table id="contenido">            
		      <tr style="background:#e3e3e3;">
		        <th style="padding:5px;width:230px;">Folio</th>
		        <th style="padding:5px;width:230px;">Administracion</th>
		        <th style="padding:5px;width:230px;">Total</th>
		      </tr>

			<?php if($Num_Filas > 0):
				$TotalGlobal = floatval(0);
				while($Linea = mysqli_fetch_array($Resultado)):
					// formato de salida de valores
					$date = new DateTime($Linea['FechaInicio']);
    				$FechaInicio = $date->format('Y');
    				$date = new DateTime($Linea['FechaFin']);
    				$FechaFin = $date->format('Y');
    				$Administracion = $FechaInicio.'-'.$FechaFin;

					$Total = number_format($Linea['Total'],2);
					$TotalGlobal = floatval($TotalGlobal) + floatval($Linea['Total']);
				?>
					<tr>
                        <td><?php 
                            $string = $Linea['FolioSalidaMaterial']; 
            
                            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Administracion;
            
                            echo (strlen($string) > 9) ? substr($string,0,9).'...' : $string; 
                        ?></td>
                        <td>$<?php 
                            $string = $Total;
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
				</table>
				<table>
					<tr>
				        <td style="padding:5px;width:230px;"></td>
				        <td style="padding:5px;width:230px;"></td>
                        <td style="background:#e3e3e3;border:1px solid #e3e3e3;margin:0;padding:3px;width:238px;">
                        $<?php 
                            $string = number_format($TotalGlobal,2);
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                        ?></td>
					</tr>
				</table>				
			<?php else: ?>
				<tr>
					<td>No hay estadisticas para este rango.</td>
				</tr>
			</table>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//generar un reporte de total de pacientes en las historias clinicas
        
        public function Generar_Total_Pacientes_Historias_Clinicas()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Total_Pacientes_Historias_Clinicas('$this->FechaInicio','$this->FechaFin','$this->IdDepartamento','$this->IdComunidad','$this->IdMateria','$this->Sexo','$this->EdadInicio','$this->EdadFin');";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado); ?>

			<table id="contenido">            
		      <tr style="background:#e3e3e3;">
		        <th style="padding:5px;width:380px;">
                    Nombre del Paciente
                </th>
                <th style="padding:5px;width:200px;">
                    Población
                </th>
                <th style="padding:5px;width:80px;">
                    Sexo
                </th>
              </tr>
			<?php if($Num_Filas > 0):
				while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
                        <td><?php 
                            $string = $Linea['NombrePaciente'].' '.
                                      $Linea['ApellidoPaternoPaciente'].' '.
                                      $Linea['ApellidoMaternoPaciente'];
            
                            echo (strlen($string) > 60) ? substr($string,0,60).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['Poblacion'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['Sexo'];
            
                            echo (strlen($string) > 1) ? substr($string,0,1).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
            </table>				
			<?php else: ?>
				<tr>
					<td>No hay estadisticas para este rango.</td>
				</tr>
			</table>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//generar un reporte de corte de cajas
		
		public function Generar_Corte_Caja()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Corte_Caja('$this->FechaInicio','$this->FechaFin','$this->IdCajero','$this->Turno');";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado); ?>

			<table id="contenido">            
		      <tr style="background:#e3e3e3;">
                <th style="padding:5px;width:50px;">
                    Folio
                </th>
		        <th style="padding:5px;width:210px;">
                    Nombre del Paciente
                </th>
                <th style="padding:5px;width:170px;">
                    Concepto
                </th>
                <th style="padding:5px;width:120px;">
                    Descuento
                </th>
                <th style="padding:5px;width:80px;">
                    Total
                </th>
              </tr>
            <?php $Total = 0; ?>
			<?php if($Num_Filas > 0):            
				while($Linea = mysqli_fetch_array($Resultado)): ?> 
					<tr>
                        <td><?php 
                            $string = $Linea['FolioCobrosCaja'];
            
                            echo (strlen($string) > 7) ? substr($string,0,7).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['NombrePaciente'].' '.
                                      $Linea['ApellidoPaternoPaciente'].' '.
                                      $Linea['ApellidoMaternoPaciente'];
            
                            echo (strlen($string) > 40) ? substr($string,0,40).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['CantidadConcepto'].' '.$Linea['NombreConcepto'];
            
                            echo (strlen($string) > 30) ? substr($string,0,30).'...' : $string; 
                        ?></td>
                        <td><?php 
                            $string = $Linea['NombreDescuento'];
            
                            echo (strlen($string) > 15) ? substr($string,0,15).'...' : $string; 
                        ?>
                        <?php 
                            $string = $Linea['PorcentajeDescuento'];
            
                            echo (strlen($string) > 6) ? substr($string,0,6).'...' : $string; 
                        ?>%
                        </td>
                        <td>$<?php 
                            $string = $Linea['CantidadConcepto']*$Linea['PrecioConcepto'];

                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
            
                            $Total += $Linea['CantidadConcepto']*$Linea['PrecioConcepto'];            
                        ?></td>
					</tr>
				<?php endwhile; ?>
            </table>
            <table>            
		      <tr>
                <td style="padding:5px;width:50px;"></td>
		        <td style="padding:5px;width:210px;"></td>
                <td style="padding:5px;width:170px;"></td>
                <td style="padding:5px;width:120px;"></td>
                <td style="background:#e3e3e3;border:1px solid #e3e3e3;margin:0;padding:3px;width:88px;">
                $<?php 
                    $string = $Total;

                    echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string;           
                ?></td>
              </tr>
            </table>
			<?php else: ?>
				<tr>
					<td colspan="5">No hay estadisticas para este rango.</td>
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