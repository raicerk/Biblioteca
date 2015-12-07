<?php


#EJECUTAR PROCEDIMIENTOS ALMACENADOS

class DDBB
{
	private $NombreBaseDatos;
	
	function __construct($NombreBaseDeDatos){
		$this->NombreBaseDatos = $NombreBaseDeDatos;
	}


	public function Query($Procedimiento,$RetornaDatos,$arrayValores=""){

		$parametros = array();

		$NombreServidor = "DESKTOP-L0LTPUU\SQLEXPRESS"; #NombreInstancia
		$InfoConexion = array("UID"=>'sa',"PWD"=>'R042581796r',"Database"=>$this->NombreBaseDatos);
		$conn = sqlsrv_connect($NombreServidor, $InfoConexion);

		if (is_array($arrayValores)) {

			$stringInterrogacion = "(?";
			for ($i=1; $i < count($arrayValores); $i++) { 
				$stringInterrogacion .= ",?";
			}

			$stringInterrogacion .= ")";

			$Procedimiento = "{call ".$Procedimiento." ".$stringInterrogacion."}";

			for ($i=0; $i < count($arrayValores); $i++) { 
				array_push($parametros, array($arrayValores[$i],SQLSRV_PARAM_IN));
			}
		}else{
			$Procedimiento = "{call ".$Procedimiento."}";
		}

		$stmt3 = sqlsrv_query($conn, $Procedimiento, $parametros);

		if ($RetornaDatos) {
			$array = array();
			while ($obj = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
				$array[] = $obj;
			}
			return $array;
			sqlsrv_free_stmt($stmt3);
		}

		sqlsrv_close($conn);	
	}
}

?>