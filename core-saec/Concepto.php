<?php class Concepto extends AccesoBD
	{
		public $IdConcepto;
		public $Nombre;
		public $Precio;
		public $Estatus;
		public $FechaRegistro;

		public function __construct
		(
			$varIdConcepto = null,
		 	$varNombre = null,
		 	$varPrecio = null,
		 	$varEstatus = null,
		 	$varFechaRegistro = null
		)
		{
			$this->IdConcepto = $varIdConcepto;
			$this->Nombre = $varNombre;
			$this->Precio = $varPrecio;
			$this->Estatus = $varEstatus;
			$this->FechaRegistro = $varFechaRegistro;
		}
	
		//catalogo de conceptos

		public function Catalogo_Conceptos($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdConcepto, 
                                Nombre, 
                                Precio 
                        FROM SIS_Listado_Conceptos;";
            else:
                $SQL = "SELECT  IdConcepto, 
                                Nombre, 
                                Precio 
                        FROM SIS_Listado_Conceptos
                        WHERE Nombre LIKE '%$Buscar%' OR 
                        Precio LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
					<tr>
						<td><?php echo $Linea['Nombre']; ?></td>
						<td>$<?php echo $Linea['Precio']; ?></td>
						<td><a href="concepto-editar.php?concepto=<?php echo $Linea['IdConcepto']; ?>" class='btn btn-institucional'>Editar</a></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo ($Buscar==null ? "No hay conceptos registrados todavía.":"No se encontro ningún concepto en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//catalogo de conceptos de reportes
        
        public function Catalogo_Conceptos_Reporte($Buscar=null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
            if($Buscar==null):
                $SQL = "SELECT  IdConcepto, 
                                Nombre, 
                                Precio 
                        FROM SIS_Listado_Conceptos;";
            else:
                $SQL = "SELECT  IdConcepto, 
                                Nombre, 
                                Precio 
                        FROM SIS_Listado_Conceptos
                        WHERE Nombre LIKE '%$Buscar%' OR 
                        Precio LIKE '%$Buscar%';";
            endif;

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			if($Num_Filas > 0):?>
				<?php while($Linea = mysqli_fetch_array($Resultado)): ?>    
					<tr>
                        <td><?php 
                            $string = $Linea['Nombre'];
            
                            echo (strlen($string) > 90) ? substr($string,0,90).'...' : $string; 
                        ?></td>
                        <td>$<?php 
                            $string = $Linea['Precio'];
            
                            echo (strlen($string) > 12) ? substr($string,0,12).'...' : $string; 
                        ?></td>
					</tr>
				<?php endwhile; ?>
			<?php else: ?>
				<tr>
					<td colspan="2"><?php echo ($Buscar==null ? "No hay conceptos registrados todavía.":"No se encontro ningún concepto en la busqueda."); ?></td>
				</tr>
			<?php endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//dar de alta un concepto
        
        public function Alta()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Concepto_Alta(
						'$this->Nombre',
						'$this->Precio'
					);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{  
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("dio de alta un concepto",3);
				$Bitacora->Entrada_Bitacora();
				
                //redireccionar al usuario                
                header('Location: conceptos.php?exito=Se guardo el Concepto con exito');
			}else{
                header('Location: conceptos.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//obtener los datos de un concepto

		public function Obtener_Concepto()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

            // realizar la consulta
			$SQL = "SELECT  IdConcepto, 
                            Nombre, 
                            Precio 
                    FROM SIS_Listado_Conceptos
                    WHERE IdConcepto = $this->IdConcepto;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			$Num_Filas = mysqli_num_rows($Resultado);

			$Datos = null;

			if($Num_Filas > 0):
				$Datos = mysqli_fetch_array($Resultado);
			endif;			

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);

			return $Datos;
		}		

		//listado de conceptos en checkbox
	
		public function ListadoCheckBox($Concepto = null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysql_error());

            // realizar la consulta
			$SQL = "SELECT IdConcepto, Nombre FROM SIS_Listado_Conceptos;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			while($Linea = mysqli_fetch_array($Resultado)):
			$seleccionado = ""; ?>
			<?php for($i=0;$i<sizeof($Concepto);$i++): 
				if($Linea['IdConcepto'] == $Concepto[$i]):
					$seleccionado = "checked";
					$i = sizeof($Concepto)-1;
				endif;
			endfor;
			?>
				<div class="span2">	
					<input type="checkbox" name="Concepto[]" id="Concepto" value="<?php echo $Linea['IdConcepto']; ?>" <?php echo $seleccionado; ?>><?php echo $Linea['Nombre']; ?>					
				</div>
			<?php endwhile;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//listado de conceptos en select

		public function ListadoSelect($Concepto = null)
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "SELECT IdConcepto, Nombre FROM SIS_Listado_Conceptos;";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if(mysqli_num_rows($Resultado) > 0):?>
			<?php while($Linea = mysqli_fetch_array($Resultado)): ?>
				<option value='<?php echo $Linea['IdConcepto']; ?>' <?php echo ($this->IdConcepto == $Linea['IdConcepto'] ? "selected":""); ?>><?php echo $Linea['Nombre']; ?></option>
			<?php endwhile;endif;

			// Liberar resultados
			mysqli_free_result($Resultado);

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
	
		//actualizar un concepto

		public function Actualizar()
		{
			//conectar a la base de datos
			$Conexion = mysqli_connect($this->Host,$this->US,$this->PASS,$this->BD) 
			or die('No se pudo conectar: '.mysqli_error($Conexion));

			// realizar la consulta
			$SQL = "CALL Concepto_Actualizar($this->IdConcepto,'$this->Nombre','$this->Precio',$this->Estatus);";

			$Resultado = $Conexion->query($SQL) or die('Consulta fallida: '.mysqli_error($Conexion));

			if($Resultado==1)
			{
				//escribir en la bitacora
				include("Bitacora.php");
				$Bitacora = new Bitacora("actualizo un concepto",3);
				$Bitacora->Entrada_Bitacora();
				
                //redirecionar
				header('Location: conceptos.php?exito=Se guardo el Concepto con exito');
			}else{
				header('Location: conceptos.php?error=Ocurrio un error. '.mysqli_error($Conexion));
			}

			// Cerrar la conexión
			mysqli_close($Conexion);
		}
    }
?>