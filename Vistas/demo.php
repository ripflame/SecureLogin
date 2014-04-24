<!DOCTYPE HTML>
<html>	
	<head>
		<title>Pagina de inicia de prueba</title>
		<?php include '../controller/SMBD.class.php'; ?>
		<?php include '../Modelo/Usuario.class.php'; ?>
	</head>
	<body>
		<div>
			<h1>Esta es una pagina de inicio de prueba</h1>
			<?php
			function obtenerUsuario(){
				$SMBD = new SMBD("localhost", "securelogin_db", "root", "");
				$SMBD->conectar();			
				$SMBD->query("SELECT * FROM securelogin_db.usuarios WHERE username='useruno'");
				$datosUsuario = $SMBD->fetchNextRow();
				$usr = $datosUsuario[0];
				$ape1 = $datosUsuario[1];
				$ape2 = $datosUsuario[2];
				$nom = $datosUsuario[3];
				$mail = $datosUsuario[4];
				$age = $datosUsuario[5];
				$gen = $datosUsuario[6];
				$pass = $datosUsuario[7];
				$priv = $datosUsuario[8];
				$usuario = new Usuario($usr,$ape1,$ape2,$nom,$mail,$age,$gen,$pass,$priv);				
				return $usuario;
			}
			?>
			<p>Usted es el usuario [<?php echo obtenerUsuario()->getUsername(); ?>]</p>		
			<form action="Admin/administrarUsuarios.php" method="post">
				<input type="hidden" name="myusername" value=<?php echo obtenerUsuario()->getUsername(); ?> />
				<input type="submit" name="enviarAAdminUs" value="Ir a panel de Administración de Usuarios" id="enviarAAdminUs"/>		
			</form>
			
			<form action="perfilDeUsuario.php" method="post">
				<input type="hidden" name="myusername" value=<?php echo obtenerUsuario()->getUsername(); ?> />
				<input type="submit" name="enviarAPerfilDeUs" value="Ver perfil de usuario" id="enviarAPerfilDeUs"/>		
			</form>
			
		</div>
	</body>
</html>