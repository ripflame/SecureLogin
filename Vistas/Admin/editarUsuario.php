<!DOCTYPE HTML>
<html>
	<head>
		<title>Editar usuario</title>
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css" />	
		<?php include '../../controller/SMBD.class.php'; ?>	
		<?php include '../../Modelo/Usuario.class.php'; ?>
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
		 
		function obtenerUsuarioSeleccionado() {
			if (!empty($_POST["usuarioParaEditar"])) {
				$usuarioParaEditar = $_POST["usuarioParaEditar"];
				$SMBD = new SMBD("localhost", "securelogin_db", "root", "");
				$SMBD->conectar();			
				$SMBD->query("SELECT * FROM securelogin_db.usuarios WHERE username='".$usuarioParaEditar."'");
				$datosUsuario = $SMBD->fetchNextRow();
				$SMBD->close();
				return $datosUsuario;				
			}
		}
		
		//Debe devolver un array de usuarios con los datos del usuario que fue seleccionado para editar en la
		//vista de Administracion de usuarios.
		//El array con los datos del usuario debe tener la siguiente estructura:
		//{nomuser, nombre, apellidop, apellidom, correo, edad, sexo, permisos[1, 2, 3]}
		//donde permisos es un array que contiene los ids de los permisos que tiene el usuario.
		
		$usuarioSeleccionado = obtenerUsuarioSeleccionado();
		
		$nomuser = $usuarioSeleccionado[0];
		$apellidop = $usuarioSeleccionado[1];
		$apellidom = $usuarioSeleccionado[2];
		$nombre = $usuarioSeleccionado[3];
		$correo = $usuarioSeleccionado[4];
		$edad = $usuarioSeleccionado[5];
		$sexo = $usuarioSeleccionado[6];
		$contrasena = $usuarioSeleccionado[7];
		$permisos = $usuarioSeleccionado[8]; 
		?>
		<div>
			<div>
				<h1>Editar datos del usuario [<?php echo $nomuser ?>]</h1>	
			</div>				
			<div>
				<form action="guardarCambiosDeUsuario.php" method="post">
				<p>Usted es el usuario [<?php echo obtenerUsuario()->getUsername(); ?>]</p>
				<input type="hidden" name="myusername" value=<?php echo obtenerUsuario()->getUsername(); ?> />
				<br>	
				<p>Usuario : <input type="text" value=<?php echo $nomuser ?> name="username"></p>
				<input type="hidden" value=<?php echo $nomuser ?> name="usernameOriginal" />
				<p>Apellido Paterno: <?php echo $apellidop ?></p>
				<p>Apellido Materno: <?php echo $apellidom ?></p>
				<p>Nombre: <?php echo $nombre ?></p>
				<p>Correo: <input type="text" value=<?php echo $correo ?> name="correo"></p>
				<p>Edad: <?php echo $edad ?></p>
				<p>Sexo: <?php echo $sexo ?></p>
				<p>Contraseña: <input type="password" value=<?php echo $contrasena ?> name="contrasena"></p>
				<p>Permisos: <br>
					<?php
					//Estas variables solo sirven para determinar si los checkbox de permisos
					//para el usuario seleccionado deben estar marcados o no. 
					$puedeCrearEditarEliminar = FALSE;
					$puedeEditarEliminar = FALSE;
					$puedeEditar = FALSE;									
						for ($i=0; $i < count($permisos); $i++) { 
							switch ($permisos[$i]) {
								case 1:
									$puedeCrearEditarEliminar = TRUE;
									break;
								case 2:
									$puedeEditarEliminar = TRUE;
									break;
								case 3:
									$puedeEditar = TRUE;
									break;
								default:
									$puedeCrearEditarEliminar = FALSE;
									$puedeEditarEliminar = FALSE;
									$puedeEditar = FALSE;								
									break;
							}						
						} 
					?>
					<input type="radio" value="1" name="privilegio" 
						<?php if($puedeCrearEditarEliminar){echo "checked=\"checked\"";}?>/>Puede crear, editar y eliminar usuarios		
					<br>			
					<input type="radio" value="2" name="privilegio"
						<?php if($puedeEditarEliminar){echo "checked=\"checked\"";}?>/>Puede editar y eliminar usuarios
					<br>	
					<input type="radio" value="3" name="privilegio"
						<?php if($puedeEditar){echo "checked=\"checked\"";}?>/>Puede editar usuarios
					<br>
				</p>
				<input type="submit" value="Guardar cambios" />
				</form>
			</div>
			<div>
				Esta pagina contiene estilos basicos, unicamente con fines de prueba.
			</div>
		</div>
	</body>
</html>
