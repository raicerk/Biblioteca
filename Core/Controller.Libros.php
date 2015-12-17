<?php

class Libros {
	
	public function BuscaLibros($Buscar, $EstadoLibro){
		$ddbb = new DDBB("Biblioteca");
		$datos = $ddbb->query("spRec_BIBLIOTECA_BuscadorLibro", true, array($Buscar, $EstadoLibro));
		return $datos;
	}

}

?>