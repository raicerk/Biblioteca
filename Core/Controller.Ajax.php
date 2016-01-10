<?php

include_once 'Init.php';

switch ($_GET['option']) {
	case '1':
		$ddbb = new DDBB("Biblioteca");
		$sana = new Sana();

		$datos = array($_POST['txtISBN'],$_POST['txtNombre'],$sana->Mayusculas($_POST['txtAutor']),$_POST['cbClasificacion'],$_POST['txtPaginas'],$_POST['txtEditorial'], $_POST['txtFechaPublicacion']);
		$ddbb->Query("spIns_BIBLIOTECA_GuardaLibro",false,$datos);
		break;

	case '2':
		# code...
	break;
	
	default:
		# code...
		break;
}


?>