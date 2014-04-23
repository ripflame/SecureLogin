<!DOCTYPE HTML>
<html>
	<head>
		<title>Admnistración de usuarios</title>
		<link rel="stylesheet" type="text/css" href="../Vistas/Estilos/basicos.css" />
	</head>
	<body>
		
		<?php
		//las siguientes funciones solo están aqui para realizar pruebas.--------------------------------------------------
		function puedoEditar(){
			return TRUE;
		}
		
		function puedoEliminar(){
			return TRUE;
		}
		//-----------------------------------------------------------------------------------------------------------------
		
		function generarTablaUsuarios(){
			//Debe devolver un array de usuarios donde cada usuario debe tener la siguiente estructura:
			//{nomuser, nombre, apellidop, apellidom, correo, edad, sexo, permisos[1, 2, 3]}
			//donde permisos es un array que contiene los ids de los permisos que tiene el usuario.
			//
			//$listaUsuarios = obtenerUsuarios();
			
			//Las siguientes lineas solo están para probar la funcionalidad de la pag.------------------------------------------
			$usuario1 = array("useruno","Juan","Perez","Lopez","pelo@mail.com",19,'H',array(1,2,3));
			$usuario2 = array("userdos","Robert","Garcia","Leon","gale@mail.com",23,'H',array(2,3));
			$usuario3 = array("usertres","Liz","Camaro","Flores","caflo@mail.com",21,'M',array(2,3));
			$usuario4 = array("usercuatro","Memo","Canul","Jhonson","cajho@mail.com",18,'H',array(2));
			$listaUsuarios = array($usuario1, $usuario2, $usuario3, $usuario4);
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
					<th>Permisos</th>
					<th></th>
					<th></th>
				</tr>";	
			for ($indexUser=0; $indexUser < count($listaUsuarios); $indexUser++) {
				$usuarioActual = $listaUsuarios[$indexUser];
				$usuario = $usuarioActual[0];  
				$nombre = $usuarioActual[1];
				$apellidop = $usuarioActual[2];
				$apellidom = $usuarioActual[3];
				$correo = $usuarioActual[4];
				$edad = $usuarioActual[5];
				$sexo = $usuarioActual[6];
				$permisos = $usuarioActual[7];
				echo "<tr>
					<td><input type=\"checkbox\" /></td>
					<td>"; echo $usuario; echo "</td>";
				echo "<td>"; echo $nombre; echo"</td>";
				echo "<td>"; echo $apellidop; echo "</td>";
				echo "<td>"; echo $apellidom; echo "</td>";
				echo "<td>"; echo $correo; echo "</td>";
				echo "<td>"; echo $edad; echo "</td>";
				echo "<td>"; echo $sexo; echo "</td>";
				echo "<td>";
				for ($indexPermiso=0; $indexPermiso < count($permisos); $indexPermiso++) {
					switch ($permisos[$indexPermiso]) {
						case 1:
							echo "-Cr ";							
							break;
						case 2:
							echo "-Ed ";
							break;
						case 3:
							echo "-Del";
							break;
						default:
							echo "-?";								
							break;
					} 
				} 
				echo "</td>";
				echo "<td><input type=\"button\" value=\"Editar\" /></td>";
				echo "<td><input type=\"button\" value=\"Eliminar\" /></td>";
				echo "</tr>";				
			}	
			echo "</table>";
		}		 								
		?>
		
		<div class="ContenedorPrincipal">
			<div class="ContenedorTitulo">
				<h1>Administracion de usuarios</h1>	
			</div>				
			<div class="ContenedorContenido">
				<?php generarTablaUsuarios(); ?>
			</div>
			<div class="PiePagina">
				Esta pagina contiene estilos basicos, unicamente con fines de prueba.
			</div>
		</div>
	</body>
</html>
