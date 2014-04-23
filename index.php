<?php
session_start();
include("include/config.inc.php");	
require("controller/SMBD.class.php");
	$registrado = false;
	if(isset($_SESSION["estado"]) && $_SESSION["estado"] == "logueado"){
		$registrado = true;
		if($_SESSION["acceso"]=="2"){
			header("Location:admin/indexadmin.php");
		}
	}
	$manejabd = new SMBD($srv,$bd,$usr,$pwd);
	if(!$manejabd->conectar()){
		session_unset();
		session_destroy();
		header("Location:".$raizSitio."/error2.php?tipo=".$manejabd->getErrorT()."&descripcion=".$manejabd->getErrorDesc());
		exit();
	}else{
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla-general.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>SecureLogin : Inicio</title>

<link  rel="stylesheet" type="text/css" href="css/estilos.css" />
<link  rel="stylesheet" type="text/css" href="css/estilo-barra-menu.css" />
<link rel="stylesheet" type="text/css" href="css/modal.css" />
<link rel="stylesheet" type="text/css" href="css/usr.css" />
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script language="javascript">
 var modal = (function(){
				var 
				method = {},
				$overlay,
				$modal,
				$content,
				$close;
				
				method.center = function () {
					var top, left;

					top = Math.max($(window).height() - $modal.outerHeight(), 0) / 2;
					left = Math.max($(window).width() - $modal.outerWidth(), 0) / 2;

					$modal.css({
						top:top + $(window).scrollTop(), 
						left:left + $(window).scrollLeft()
					});
				};

				method.open = function (settings) {
					$content.empty().append(settings.content);

					$modal.css({
						width: settings.width || 'auto', 
						height: settings.height || 'auto'
					});

					method.center();
					$(window).bind('resize.modal', method.center);
					$modal.show();
					$overlay.show();
				};

				method.close = function () {
					$modal.hide();
					$overlay.hide();
					$content.empty();
					$(window).unbind('resize.modal');
				};

				// Generate the HTML and add it to the document
				$overlay = $('<div id="overlay"></div>');
				$modal = $('<div id="modal"></div>');
				$content = $('<div id="content"></div>');
				$close = $('<a id="close" href="#">close</a>');

				$modal.hide();
				$overlay.hide();
				$modal.append($content, $close);

				$(document).ready(function(){
					$('body').append($overlay, $modal);						
				});

				$close.click(function(e){
					e.preventDefault();
					method.close();
				});

				return method;
			}());

			$(document).ready(function(){

				$('.modalink').click(function(e){
				var id_producto="id: ";
				 var id_producto=id_producto+$(this).attr('id-prod');
					modal.open({content: id_producto});
					e.preventDefault();
				});
			});
			$(document).ready(function() {
    $('#showlogin').click(function() {
        $('#loginpanel').slideToggle('slow', function() {
			$('#username').focus();
            $("#triangle_down").toggle(); 
            $("#triangle_up").toggle();
        });
    });
 });
</script>
<style>
	
	#msg{
	background:#FFFFFF;
	height:400px;
	background-image:url(images/fondomsg.png);
	-moz-border-radius: 10px 10px 10px 10px;
	border-radius:10px;
	margin-top:10px;
}
</style>
</head>
<body>
<div id="envolvente" class="establece-tamanio">
	<div id="barra_superior" class="establece-tamanio">
		<div id="logo_barra">	
		<img src="images/logo.png" width="243" height="41" />		</div>
		<div id="bloque_info">
			<div id="info_cuenta">
			<div id="info_arriba">
				<div id="info_usuario" class="div_tbl_col">
						<?php
							if(!$registrado){
							echo("Bienvenido invitado.<br /> Por favor <a href=\"login.php\">inicia sesi&oacute;n</a>");
							}else{
								$nombreu = $_SESSION["nombres"];
								echo("Bienvenido ".$nombreu.".<br /><a href=\"salir.php\">cerrar sesi&oacute;n</a>");
							}
							
						?>				
						
				</div>
				<div id="avatar" class="div_tbl_col">
				<?php if($registrado){				
						echo("<img src=\"".$raizSitio."/avatars/user_icon1.png\"  height=\"40px\"/>");
						}else{
							echo("<img src=\"".$raizSitio."/avatars/user_icon3.png\"  height=\"40px\"/>");
						}
				?>
				</div>
			</div>			
	  </div>		
  </div>
</div>
	<div id="barra_menu" class="establece-tamanio">	
<ul>
	<li class='elegido'><a href='#'><span>Inicio</span></a></li>
</ul>
<!-- InstanceEndEditable -->	</div>
	<div align="center" class="establece-tamanio" id="msg">
<div style="top:10px; position:relative" >
<table width="93%">
	<tr><td width="86%" align="center"><h2>Titulito</h2></td><td width="14%">&nbsp;</td>
</table></div>
<div style="top:0px; position:relative; height:28%;" >
<table width="93%">
	<tr><td width="86%" align="center"><h3>Contenido</h3></td><td width="14%">&nbsp;</td>
</table></div>
</div>
</body>
<!-- InstanceEnd --></html><?php } ?>
