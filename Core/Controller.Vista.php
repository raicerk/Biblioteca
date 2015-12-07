<?php

include 'class.ddbb.php';
include 'Controller.Usuarios.php';
include 'class.utiles.php';

class Vista{
	
	public function ListaClasificaciones(){

		$ddbb = new DDBB("Biblioteca");
		$data = $ddbb->Query("spRec_BIBLIOTECA_ListaClasificacion",true);
		$option = "";
		foreach ($data as $campo) {
			$option .= "<option value='".$campo['IdClasificacion']."'>".$campo['Clasificacion']."</option>";
		}
		return $option;
	}

	public function ValidaLogin($Usuario, $Contrasena){
		$usu = new Usuarios();
		if ($usu->ValidaLogin($Usuario,$Contrasena)) {

			$_SESSION['Usuario'] = $Usuario;
			
			header("location: AgregaLibro.php");
		}else{
			header("location: login.php?error=Error de login");
		}
	}

	public function ValidaAcceso($Usuario, $NombreVista, $Redirige){
		$usu = new Usuarios();
		if (!$usu->ValidaAcceso($Usuario, $NombreVista)) {
			header("location:".$Redirige);
		}
	}

	

}

?>