<?php

class Usuarios {
	
	public function ValidaLogin($Usuario,$Contrasena){
		$ddbb = new DDBB("Biblioteca");
		$datos = array($Usuario, $Contrasena);
		$data = $ddbb->Query("spRec_BIBLIOTECA_ValidaLogin",true,$datos);
		foreach ($data as $campo) {
			if ($campo['Acceso'] == "AUTORIZADO") {
				return true;
			}else{
				return false;
			}
		}
	}

	public function ValidaAcceso($Usuario, $NombreVista){
		$ddbb = new DDBB("Biblioteca");
		$data = $ddbb->Query("spRec_BIBLIOTECA_ConsultaPermisoVista",true,array($Usuario,$NombreVista));
		foreach ($data as $campo) {
			if ($campo['Permiso'] == "AUTORIZADO") {
				return true;
			}else{
				return false;
			}
		}
	}
}

?>