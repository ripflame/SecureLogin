<?php

include '../../controller/SMBD.class.php';

if(isset($_POST["myusername"]) &&
 isset($_POST["username"]) &&
 isset($_POST["usernameOriginal"]) &&
 isset($_POST["correo"]) &&
 isset($_POST["contrasena"])){
	$nuevoUsername = $_POST["username"];
	$usernameOriginal = $_POST["usernameOriginal"];
	$nuevoCorreo = $_POST["correo"];
	$nuevaContrasena = $_POST["contrasena"];
	if (isset($_POST["confirmContrasena"]) && isset($_POST["nuevaContrasena"])) {
		if ($_POST["confirmContrasena"] == $_POST["contrasena"]) {
			$nuevaContrasena = $_POST["nuevaContrasena"];
		} else {
			echo "La contraseña actual no coinside con la contraseña del campo de confirmación.";
		}	
	} 
	$nuevoPrivilegio = -1;
	$valoresParaActualizar = "";
	if(isset($_POST["privilegio"])){
		if($_POST["privilegio"]>=1 || $_POST["privilegio"]<=3){
			$nuevoPrivilegio = $_POST["privilegio"];					
		} 
		$valoresParaActualizar = "username='".$nuevoUsername."', email='".$nuevoCorreo."', password='".$nuevaContrasena."', privilegio=".$nuevoPrivilegio;	
	} else {
		$valoresParaActualizar = "username='".$nuevoUsername."', email='".$nuevoCorreo."', password='".$nuevaContrasena."'";
	}
	$SMBD = new SMBD("localhost", "securelogin_db", "root", "");
	$SMBD->conectar();
	$query = "UPDATE usuarios SET ".$valoresParaActualizar." WHERE username='".$usernameOriginal."'";
	$result = $SMBD->query($query);
	$SMBD->close();	
}

?>
<html>
	<head>
		<title>Guardando los cambios</title>
	</head>
	<body>
		<form action="administrarUsuarios.php" method="post">
			<p>Usted es el usuario [<?php echo $_POST["myusername"]; ?>]</p>
			<h1>Los cambios han sido guardados</h1>	
			<input type="hidden" name="myusername" value=<?php echo $_POST["myusername"]; ?> />			
			<p><input type="submit" value="Continuar"/></p>
		</form>
	</body>
</html>