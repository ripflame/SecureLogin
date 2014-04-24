<!DOCTYPE HTML>
<html>
	<head>
		<title>Perfil de usuario</title>
		<link rel="stylesheet" type="text/css" href="../css/estilos.css" />
		<?php include '../controller/SMBD.class.php'; ?>
		<?php include '../Modelo/Usuario.class.php'; ?>
	</head>
	<body>
		<?php
		function obtenerUsuario(){
				if (isset($_POST["myusername"])) {
					$SMBD = new SMBD("localhost", "securelogin_db", "root", "");
					$SMBD->conectar();			
					$SMBD->query("SELECT * FROM securelogin_db.usuarios WHERE username='".$_POST["myusername"]."'");
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
				} else {
					echo "<h1>No se ha loggeado!</h1>";
				}
				return $usuario;
		}
		?>
		<div class="ContenedorPrincipal">
			<div class="ContenedorTitulo">
				<h1>Perfil de usuario [<?php echo obtenerUsuario()->getUserName(); ?>] </h1>	
			</div>				
			<div class="ContenedorContenido">
				<form action="editarPerfilDeUsuario.php" method="post">
					<p>Usted es el usuario [<?php echo obtenerUsuario()->getUsername(); ?>]</p>
					<input type="hidden" name="myusername" value=<?php echo obtenerUsuario()->getUsername(); ?> />
						
					<p>
						Usuario: <?php echo obtenerUsuario()->getUserName(); ?>
					<input type="hidden" name="username" value=<?php echo obtenerUsuario()->getUserName(); ?>>
					</p>
					<p>
						Apellido Paterno: <?php echo obtenerUsuario()->getApellido1(); ?>
						<input type="hidden" name="apellidop" value=<?php echo obtenerUsuario()->getApellido1(); ?>>
					</p>
					<p>
						Apellido Materno: <?php echo obtenerUsuario()->getApellido2(); ?>
						<input type="hidden" name="apellidom" value=<?php echo obtenerUsuario()->getApellido2(); ?>>
					</p>
					<p>
						Nombre: <?php echo obtenerUsuario()->getNombres(); ?>
						<input type="hidden" name="nombre" value=<?php echo obtenerUsuario()->getNombres(); ?>>
					</p>
					<p>
						Correo: <?php echo obtenerUsuario()->getEmail(); ?>
						<input type="hidden" name="correo" value=<?php echo obtenerUsuario()->getEmail(); ?>>
					</p>
					<p>
						Edad: <?php echo obtenerUsuario()->getEdad(); ?>
						<input type="hidden" name="edad" value=<?php echo obtenerUsuario()->getEdad(); ?>>
					</p>
					<p>
						Sexo: <?php echo obtenerUsuario()->getGenero(); ?>
						<input type="hidden" name="sexo" value=<?php echo obtenerUsuario()->getGenero(); ?>>
					</p>
					<p>
						Contraseña: <input type="password" name="contrasena" value=<?php echo obtenerUsuario()->getPassword(); ?> disabled>
					</p>
					<input type="submit" value="Editar datos de perfil" />
				</form>
			</div>
			<div class="PiePagina">
				Esta pagina contiene estilos basicos, unicamente con fines de prueba.
			</div>
		</div>
	</body>
</html>
		