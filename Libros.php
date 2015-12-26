<?php
	session_start();
	include 'Core/Controller.Vista.php';
	$vista = new Vista();
	$vista->ValidaAcceso($_SESSION['Usuario'], $vista->ObtienePagina(), "login.php?error=Error de permiso a las busquedas");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Buscar Libros</title>
</head>
<body>

	<form action="Libros.php" method="GET">
		<input type="text" name="txtBuscador" placeholder = "Ingrese un texto">
		<select name="cbEstado">
			<option value="1">Disponible</option>
			<option value="0">Prestado</option>
		</select>
		<input type="submit" value="Buscar" name="btnBuscar">
		<a href="AgregaLibro.php"><input type="button" value="Agregar nuevo libro"></a>
	</form>
	<?php
		if (isset($_GET['txtBuscador']) && isset($_GET['cbEstado'])) {
			echo $vista->BuscaLibros($_GET['txtBuscador'], $_GET['cbEstado']);
		}
		
	?>
</body>
</html>