<?php


class Utiles{
	
	public function Si($evalua,$verdadero,$falso){
		
		if ($evalua) {
			return $verdadero;
		}else{
			return $falso;
		}
	}

	public function ObtienePagina(){
		$Directorio = explode("/", $_SERVER['PHP_SELF']);
		return $Directorio[count($Directorio)-1]; 
	}
}

?>