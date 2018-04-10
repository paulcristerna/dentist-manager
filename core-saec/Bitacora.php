<?php class Bitacora extends AccesoBD
	{
		public $Mensaje;
		public $Tipo;

		public function __construct
		(
			$varMensaje = null,
			$varTipo = null
		)
		{
			$this->Mensaje = $varMensaje;
			$this->Tipo = $varTipo;
		}
	
		//escribir en la bitacora

		public function Entrada_Bitacora()
		{
			if(!isset($_SESSION['Usuario']))
			{
				session_start();
			}
			
			$SIS_Usuario = $_SESSION['Usuario'];
			
			if($this->Tipo == 3)
			{
				include("../core-saec/Usuario.php");
			}

			$UsuarioSIS = new Usuario($SIS_Usuario);
			$SIS_Datos_Usuario = $UsuarioSIS->Obtener_Usuario();

			$NombreUsuario = $SIS_Datos_Usuario['Nombre'].' '.
							 $SIS_Datos_Usuario['ApellidoPaterno'].' '.
							 $SIS_Datos_Usuario['ApellidoMaterno'];

			$now = new DateTime();
			$fecha = $now->format('d-m-y');
			$fecha_completa = $now->format('d-m-y h:i:s');

			$contenido = $fecha_completa.": ".$NombreUsuario." ".$this->Mensaje."."."\n";
			
			if($this->Tipo == 1)
			{
				$nombre_archivo = 'bitacoras/bitacora-SIS-SAEC-'.$fecha.'.php';
			}
			else if($this->Tipo = 2 || $this->Tipo = 3)
			{
				$nombre_archivo = '../bitacoras/bitacora-SIS-SAEC-'.$fecha.'.php';
			}		
			
			$archivo=fopen($nombre_archivo,'a');

			fwrite($archivo, $contenido);
			fclose($archivo);
		}
	}
?>