<!DOCTYPE HTM>
<html>
	<head>
		<title>Admnistración de usuarios</title>
		<link rel="stylesheet" type="text/css" href="../Vistas/Estilos/basicos.css" />
	</head>
	<body>
		
		<?php
		 function generarTablaUsuarios(){
			//Debe devolver un array de usuarios donde cada usuario debe tener la siguiente estructura:
			//{nomuser, nombre, apellidop, apellidom, correo, edad, sexo, permisos[1, 2, 3]}
			//donde permisos es un array que contiene los ids de los permisos que tiene el usuario.
			$listaUsuarios = obtenerUsuarios();
			
		 	echo "<table id=\"tablaUsusarios\">					
					<tr>
						<th></th>
						<th>Usuario</th>
						<th>Nombre</th>
						<th>Apellido paterno</th>
						<th>Apellido materno</th>
						<th>Correo</th>
						<th>Edad</th>
						<th>Sexo</th>
						<th>Permisos</th>
						<th></th>
						<th></th>
					</tr>";
			for ($i = 0; $i < count($listaUsuarios); $i++) {
				$nomuser = $listaUsuarios[0];
				$nombre = $listaUsuarios[1];
				$apellidop = $listaUsuarios[2];
				$apellidom = $listaUsuarios[3];				
				$correo = $listaUsuarios[4];
				$edad = $listaUsuarios[5];
				$sexo = $listaUsuarios[6];
				// Debe contener un array con los permisos del usuario seleccionado
				$permisos = $listaUsuarios[7];
				echo  "<tr>
						<tr><input type=\"checkbox\" /></tr>
						<td>" + $nomuser + "</td>
						<td>"+ $nombre + "</td>
						<td>" + $apellidop + "</td>
						<td>" + $apellidom + "</td>
						<td>" + $correo + "</td>
						<td>" + $edad + "</td>
						<td>" + $sexo + "</td>
						<td>"; 
				for ($i=0; $i < count($permisos); $i++) { 
					switch ($permisos[i]) {
						case 1:
							echo "-Crear usuario ";
							break;
						case 2:
							echo "-Editar usuario ";
							break;
						case 3:
							echo "-Eliminar Usuario ";
							break;						
						default:
							echo "No especificado";
							break;
					}
				} 						
				echo "<td>";
				$puedoEditar = puedoEditar();
				$puedoEliminar = puedoEliminar();							
				if ($puedoEditar) {
					echo "<td><input type=\"button\" value=\"Editar\"/></td>											
							<td><input type=\"button\" value=\"Eliminar\"/></td>";					
				}					
				if ($puedoEliminar) {
					echo "<td><input type=\"button\" value=\"Editar\"/></td>											
							<td><input type=\"button\" value=\"Eliminar\"/></td>";					
				}
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
				<?php generaTablaUsuarios(); ?>
			</div>
			<div class="PiePagina">
				Esta pagina contiene estilos basicos, unicamente con fines de prueba.
			</div>
		</div>
	</body>
</html>
