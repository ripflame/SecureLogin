<?php
include("include/config.inc.php");
			if((!isset($_GET["tipo"]) || $_GET["tipo"] == "") || (!isset($_GET["descripcion"]) || $_GET["descripcion"] == "")){
				echo("<script language=javascript>alert('Se ha detectado un intento de acceso ilegal a la página de errores. Será redirigido a la página principal.');
				window.location='".$raizSitio."'</script>");
			}else{	
				$tipo="Error: ".$_GET["tipo"];
				$descripcion=$_GET["descripcion"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link  rel="stylesheet" type="text/css" href="css/estilos.css" />
<link  rel="stylesheet" type="text/css" href="css/estilo-barra-menu.css" />
<link rel="stylesheet" type="text/css" href="css/estilo-menu-lateral.css" />
<link rel="stylesheet" type="text/css" href="css/estilo-contenido.css" />
<style>
	#msg{
	background:#FFFFFF;
	height:400px;
	background-image:url(images/homero2.png);
	-moz-border-radius: 10px 10px 10px 10px;
	border-radius:10px;
	margin-top:10px;
}
</style>
<title>Error: No lo quiero!</title>
<script type="text/javascript">	
	function redirect(){
		var texto = "Redireccionando en ";
		var s = document.getElementById("tiempo").value;
		if(s==0){
			document.location.href="index.php";
		}else{
			s=s-1;
			document.getElementById("tiempo").value=s;
			var mensaje = texto+s+" segundos..."
			var donde = document.getElementById("redirect");
			donde.innerHTML=mensaje;
			setTimeout("redirect()",1000);
		}
	}
</script>
</head>

<body onload="redirect();">
<div id="barra_superior" class="establece-tamanio">
		<div id="logo_barra"><img src="images/logo.png" width="243" height="41" /></div>
		<div id="bloque_info">
			<div id="info_cuenta">
			<div id="info_arriba">
				<div id="info_usuario" class="div_tbl_col">				</div>
				<div id="avatar" class="div_tbl_col">							</div>
			</div>
			</div>
	  </div>		
</div>
<div align="center" class="establece-tamanio" id="msg">
<div style="top:10px; position:relative" >
<table width="93%">
	<tr><td width="86%" align="center"><h2><?php echo $tipo; ?></h2></td><td width="14%">&nbsp;</td>
</table></div>
<div style="top:0px; position:relative; height:28%;" >
<table width="93%">
	<tr><td width="86%" align="center"><h3><?php echo $descripcion; ?></h3></td><td width="14%">&nbsp;</td>
</table></div>
<div style="top:150px; position:relative" >
<input type="button" onclick="javascript:document.location.href='index.php'" value="S&aacute;came de aqu&iacute;!"/>
<p><input type="hidden" value="11" id="tiempo" /></p></div>
<div id="redirect" style="top:150px; position:relative;">Redireccionando en 10 segundos...</div>
</div>
</body>
</html><?php } ?>
