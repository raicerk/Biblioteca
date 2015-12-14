<?php
	session_start();
	include 'Core/Controller.Vista.php';
	$vista = new Vista();
	$vista->ValidaAcceso($_SESSION['Usuario'], "Libros.php", "login.php?error=Error de permiso");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Buscar Libros</title>
</head>
<body>

</body>
</html>