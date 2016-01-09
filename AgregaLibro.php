<?php
	session_start();
	include 'Core/Controller.Vista.php';
	$vista = new Vista();
	$vista->ValidaAcceso($_SESSION['Usuario'], $vista->ObtienePagina(), "login.php?error=Error de permiso");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="Libros.php"><input type="button" value="Lista libros"></a><br><br>
	<form action="./Core/Controller.Ajax.php?option=1" method="POST">
		ISBN : <input type="text" name="txtISBN" value=""><br>
		Nombre : <input type="text" name="txtNombre" value=""><br>
		Autor : <input type="text" name="txtAutor" value=""><br>
		Clasificacion : <select name="cbClasificacion">
						<?php echo $vista->ListaClasificaciones();?>
						</select><br>
		Cantidad Paginas : <input type="text" name="txtPaginas" value=""><br>
		Editorial : <input type="text" name="txtEditorial" value=""><br>
		Fecha Publicacion : <input type="text" name="txtFechaPublicacion" value=""><br>
		<input type="submit" value="Guardar Libro">

	</form>
</body>
</html>