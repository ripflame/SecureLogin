<!DOCTYPE HTML>
<html>
	<head>
		<title>Admnistración de usuarios</title>
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
		
		function obtenerUsuarios() {
			$usuarios = array();
			$SMBD = new SMBD("localhost", "securelogin_db", "root", "");
			$SMBD->conectar();			
			$SMBD->query("SELECT * FROM securelogin_db.usuarios");
			$datosUsuario = $SMBD->fetchNextRow();
			while ($datosUsuario != NULL) {				
				$usuario = array($datosUsuario[0],$datosUsuario[1],$datosUsuario[2],$datosUsuario[3],
				$datosUsuario[4],$datosUsuario[5],$datosUsuario[6],$datosUsuario[7],$datosUsuario[8]);
				array_push($usuarios,$usuario);	
				$datosUsuario = $SMBD->fetchNextRow();				
			}						
			$SMBD->close();
			return $usuarios;
		}
		
		//las siguientes funciones solo están aqui para realizar pruebas.--------------------------------------------------
		function puedoEditar() {
			return TRUE;
		}
		
		function puedoEliminar() {
			return TRUE;
		}
		//-----------------------------------------------------------------------------------------------------------------
		
		function generarTablaUsuarios(){
			
			$listaUsuarios = obtenerUsuarios();
			
			//Esta función debe devolver un booleano que indique si el usuario dueño de sesion puede editar 
			//los datos de los usuarios que se muestran en la tabla.
			$puedoEditar = puedoEditar();
		
			//Esta función debe devolver un booleano que indique si el usuario dueño de sesion puede eliminar 
			//a los usuarios que se muestran en la tabla.				
			$puedoEliminar = puedoEliminar();		
			//------------------------------------------------------------------------------------------------------------------
			
			echo "<table>
				<tr>
					<th></th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Apellido P.</th>
					<th>Apellido M.</th>
					<th>Correo</th>
					<th>Edad</th>
					<th>Sexo</th>
					<th>Contraseña</th>
					<th>Permisos</th>
					<th></th>
					<th></th>
				</tr>";	
			for ($indexUser=0; $indexUser < count($listaUsuarios); $indexUser++) {
				$usuarioActual = $listaUsuarios[$indexUser];
				$usuario = $usuarioActual[0];  
				$apellidop = $usuarioActual[1];
				$apellidom = $usuarioActual[2];
				$nombre = $usuarioActual[3];
				$correo = $usuarioActual[4];
				$edad = $usuarioActual[5];
				$sexo = $usuarioActual[6];
				$contrasena = $usuarioActual[7];
				$permisos = $usuarioActual[8];
								
				echo "<tr>";
				echo "<td><input type=\"checkbox\" name=\"checkOps\"/></td>";
				echo "<td>"; echo $usuario; echo "</td>";
				echo "<td>"; echo $apellidop; echo "</td>";
				echo "<td>"; echo $apellidom; echo "</td>";
				echo "<td>"; echo $nombre; echo"</td>";
				echo "<td>"; echo $correo; echo "</td>";
				echo "<td>"; echo $edad; echo "</td>";
				echo "<td>"; echo $sexo; echo "</td>";
				echo "<td><input type=\"password\" value="; echo $contrasena; echo " disabled ></td>";
				echo "<td>";
				for ($indexPermiso=0; $indexPermiso < count($permisos); $indexPermiso++) {
					switch ($permisos[$indexPermiso]) {
						case 1:
							echo "-Cr ";
							echo "-Ed ";
							echo "-Del ";							
							break;
						case 2:
							echo "-Ed ";
							echo "-Del";
							break;
						case 3:
							echo "-Ed ";
							break;
						default:
							echo "-?";								
							break;
					} 
				} 
				echo "</td>";
				echo "<td>";
				echo "<form action=\"editarUsuario.php\" method=\"post\" >";
				echo "<input type=\"hidden\" name=\"usuarioParaEditar\" value="; echo $usuario; echo " />";
				echo "<input type=\"hidden\" name=\"myusername\" value=\""; echo obtenerUsuario()->getUsername(); echo "\" />"; 
				echo "<input type=\"submit\" value=\"Editar\" />";
				echo "</form>";
				echo "</td>";
				echo "<td>";
				echo "<form action=\"editarUsuario.php\" method=\"post\" >";
				echo "<input type=\"hidden\" name=\"usuarioParaEliminar\" value="; echo $usuario; echo " />";
				echo "<input type=\"hidden\" name=\"myusername\" value=\""; echo obtenerUsuario()->getUsername(); echo "\" />";
				echo "<input type=\"submit\" value=\"Eliminar\" />";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
			}	
			echo "</table>";
		}		 								
		?>
		
		<div>
			<div >
				<h1>Administracion de usuarios</h1>	
			</div>				
			<div >
				<p>Usted es el usuario [<?php echo obtenerUsuario()->getUsername(); ?>]</p>
				<?php generarTablaUsuarios(); ?>
			</div>
			<div >
				Esta pagina contiene estilos basicos, unicamente con fines de prueba.
			</div>
		</div>
	</body>
</html>
