<?php

session_start();

include 'Core/Controller.Vista.php';
$vi = new Vista();

if ($_POST) {
	$vi->ValidaLogin($_POST['txtUsuario'], $_POST['txtContrasena']);
}else{
	foreach ($_SESSION as $key=>$value) {
		unset($_SESSION[$key]);
	}
	session_destroy();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Biblioteca</title>
</head>
<body>

	<form action="login.php" method="POST">
		Usuario : <input type="text" name="txtUsuario" value=""><br>
		Contrasena : <input type="text" name="txtContrasena" value=""><br>
		<input type="submit" value="Ingresar">
		<script type="text/javascript"> alert("<?php echo $_GET['error'];?>");</script>
	</form>
</body>
</html>