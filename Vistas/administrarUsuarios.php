<!DOCTYPE HTM>
<html>
	<head>
		<title>Admnistración de usuarios</title>
		<link rel="stylesheet" type="text/css" href="../Vistas/Estilos/basicos.css" />
	</head>
	<body>
		
		<?php
		 function generarTablaUsuarios(){
		 	
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
						<th></th>
						<th></th>
					</tr>";
			for ($i = 0; $x < count($listaUsuarios); $i++) {
				echo  "<tr>
						<tr><input type=\"checkbox\" /></tr>
						<td>useruno</td>
						<td>Juan</td>
						<td>Perez</td>
						<td>Lopez</td>
						<td>pelo@mail.com</td>
						<td>19</td>
						<td>H</td>
						<td><input type=\"button\" value=\"Editar\"/></td>											
						<td><input type=\"button\" value=\"Eliminar\"/></td>
					</tr>";
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
