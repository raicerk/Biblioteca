<?php

include 'class.ddbb.php';
include 'Controller.Usuarios.php';
include 'class.utiles.php';
include 'Controller.Libros.php';

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
			
			header("location: Libros.php");
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

	public function BuscaLibros($Buscar, $EstadoLibro){
		$li = new Libros();
		$datos = $li->BuscaLibros($Buscar, $EstadoLibro);
		$html = "<br><br><table border=1>";
		$html .= "<tr><td>ISBN</td><td>Nombre</td><td>Autor</td><td>Clasificacion</td><td>Paginas</td><td>Editorial</td><td>Fecha Publicación</td></tr>";
		foreach ($datos as $campo) {
			$html .= "<tr>";
			$html .= "<td>";
			$html .= $campo['ISBN'];
			$html .= "</td>";
			$html .= "<td>";
			$html .= $campo['Nombre'];
			$html .= "</td>";
			$html .= "<td>";
			$html .= $campo['Autor'];
			$html .= "</td>";
			$html .= "<td>";
			$html .= $campo['Clasificacion'];
			$html .= "</td>";
			$html .= "<td>";
			$html .= $campo['Paginas'];
			$html .= "</td>";
			$html .= "<td>";
			$html .= $campo['Editorial'];
			$html .= "</td>";
			$html .= "<td>";
			$html .= $campo['FechaPublicacion'];
			$html .= "</td>";
			$html .= "</tr>";
		}
		$html .= "</tabla>";
		return $html;
	}

	public function ObtienePagina(){
		$utiles = new Utiles();
		return $utiles->ObtienePagina();
	}
	

}

?>