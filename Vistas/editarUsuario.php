<!DOCTYPE HTML>
<html>
	<head>
		<title>Editar usuario</title>
		<link rel="stylesheet" type="text/css" href="../Vistas/Estilos/basicos.css" />
	</head>
	<body>		
		<?php
		//Debe devolver un array de usuarios con los datos del usuario que fue seleccionado para editar en la
		//vista de Administracion de usuarios.
		//El array con los datos del usuario debe tener la siguiente estructura:
		//{nomuser, nombre, apellidop, apellidom, correo, edad, sexo, permisos[1, 2, 3]}
		//donde permisos es un array que contiene los ids de los permisos que tiene el usuario.
		//
		//$usuarioSeleccionado = obtenerUsuarioSeleccionado();
		
		//Las siguientes lineas solo están para probar la funcionalidad de la pag.------------------------------------------
		$permisosUsuarioSel = array(2,3);
		$usuarioSeleccionado = array("useruno","Juan","Perez","Lopez","pelo@mail.com", 19, 'H', $permisosUsuarioSel);
		//------------------------------------------------------------------------------------------------------------------
		$nomuser = $usuarioSeleccionado[0];
		$nombre = $usuarioSeleccionado[1];
		$apellidop = $usuarioSeleccionado[2];
		$apellidom = $usuarioSeleccionado[3];
		$correo = $usuarioSeleccionado[4];
		$edad = $usuarioSeleccionado[5];
		$sexo = $usuarioSeleccionado[6];
		// Debe contener un array con los permisos del usuario seleccionado
		$permisos = $usuarioSeleccionado[7]; 
		?>
		<div class="ContenedorPrincipal">
			<div class="ContenedorTitulo">
				<h1>Editar datos del usuario []<?php echo $nomuser ?>]</h1>	
			</div>				
			<div class="ContenedorContenido">
				<p>Usuario : <input type="text" value=<?php echo $nomuser ?>></p>
				<p>Nombre: <?php echo $nombre ?></p>
				<p>Apellido Paterno: <?php echo $apellidop ?></p>
				<p>Apellido Materno: <?php echo $apellidom ?></p>
				<p>Correo: <input type="text" value=<?php echo $correo ?>></p>
				<p>Edad: <?php echo $edad ?></p>
				<p>Sexo: <?php echo $sexo ?></p>
				<p>Permisos: <br>
					<?php
					//Estas variables solo sirven para determinar si los checkbox de permisos
					//para el usuario seleccionado deben estar marcados o no. 
					$puedeCrear = FALSE;
					$puedeEditar = FALSE;
					$puedeEliminar = FALSE;									
						for ($i=0; $i < count($permisos); $i++) { 
							switch ($permisos[$i]) {
								case 1:
									$puedeCrear = TRUE;
									break;
								case 2:
									$puedeEditar = TRUE;
									break;
								case 3:
									$puedeEliminar = TRUE;
									break;
								default:
									$puedeCrear = FALSE;
									$puedeEditar = FALSE;
									$puedeEliminar = FALSE;								
									break;
							}						
						} 
					?>
					<label><input type="checkbox" value="1" id="checkCrear" 
						<?php if($puedeCrear){echo "checked=\"checked\"";}?>/>Puede crear usuarios</label>		
					<br>			
					<label><input type="checkbox" value="2" id="checkEditar" 
						<?php if($puedeEditar){echo "checked=\"checked\"";}?>/>Puede editar usuarios</label>
					<br>	
					<label><input type="checkbox" value="3" id="checkEliminar" 
						<?php if($puedeEliminar){echo "checked=\"checked\"";}?>/>Puede eliminar usuarios</label>
					<br>
				</p>
			</div>
			<div class="PiePagina">
				Esta pagina contiene estilos basicos, unicamente con fines de prueba.
			</div>
		</div>
	</body>
</html>
