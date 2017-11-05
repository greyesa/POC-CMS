<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 
session_start();

/* Generar codigo para ingresar comentario CAPTCHA */
		function caracter_aleatorio() {
		mt_srand((double)microtime()*1000000);
		$valor_aleatorio = mt_rand(1,3);
		switch ($valor_aleatorio) {
	    	case 1:
	        $valor_aleatorio = mt_rand(97, 122); 
	        break;
	    	case 2:
	        $valor_aleatorio = mt_rand(48, 57);
	        break;
	    	case 3:
	        $valor_aleatorio = mt_rand(65, 90);
	        break;
		}
		return chr($valor_aleatorio);
		}
/* Generar codigo para ingresar comentario CAPTCHA */

include 'config.inc.php';
include 'libreria/fecha.php';
include 'globales.php';
include 'contador.php';

// ######## Calcular tiempo de carga de página ######## //
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$tiempoinicial = $mtime; 
// ######## Calcular tiempo de carga de página ######## //
$result=mysql_query("select * from cuerpo where id_cuerpo=1");
while ($row=mysql_fetch_array($result))
{
$plantilla1= $row["valores"];
$resto = substr ("$plantilla1", 18,-4); 
}
mysql_free_result($result);
// Configuración de Smarty Templates.
require('include/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$plantilla = "".$resto."";
$smarty->assign('codificacion', $codificacion);
$smarty->assign('fecha', $fecha);
$smarty->assign('codificacion', $codificacion);
$smarty->template_dir = 'plantillas/'.$plantilla.'/fuentes';
$smarty->compile_dir = 'plantillas/'.$plantilla.'/compilado';
$smarty->caching = false;
$smarty->cache_dir = 'plantillas/cache';
$smarty->config_dir = 'include/Smarty/unit_test/configs';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!--  ################## Sistema trabajando con tecnologia POC-CMS http://www.poccms.com   ################## -->

<!--  ################## Inicia Cabecera  ################## -->
<?php
$result=mysql_query("select * from cabecera");
while ($row=mysql_fetch_array($result))
{
echo '<title>'.$row["titulo"].'</title>';
$smarty->assign('titulo', $row["titulo"]);
print " \n";
echo '<meta name="description" content="'.$row["descripcion"].'" />';
$smarty->assign('descripcion', $row["descripcion"]);
print " \n";
echo '<meta name="keywords" content="'.$row["llaves"].'" />';
print " \n";
echo '<meta name="Generator" content="POC-CMS (C)2007" />';
print " \n";
echo '<meta name="robots" content="index, follow" />';
print " \n";
echo '<link rel="shortcut icon" href="imagenes/poccms.ico" type="image/x-icon">';
print " \n";
echo '<link rel="alternate" type="application/rss+xml" title="'.$row["titulo"].'" href="feed.xml">';
}
mysql_free_result($result);
?>
<?php
$result2=mysql_query("select * from logotipo");
while ($row=mysql_fetch_array($result2))
{
$smarty->assign('logotipo1', "".$row["direccion"]."");
$smarty->assign('logotipo2', "".$row["nombre_logo"]."");
$smarty->assign('logotipo3', "".$row["alt"]."");
}
mysql_free_result($result2);
?>
<!-- PopUps -->
<script type="text/javascript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,directories=0,status=0,copyhistory=0,statusbar=0,menubar=0,resizable=0,width=500,height=500,left = 150,top = 10');");
}
</script>
<!-- PopUps -->
<!-- Validador -->
<script language="javascript" type="text/javascript" src="include/jsval/jsval.js"></script>
<!-- Validador -->
<!-- Calendario -->
<style type="text/css">@import url(include/calendar/calendar-win2k-1.css);</style>
<script language="javascript" type="text/javascript" src="include/calendar/calendar.js"></script>
<script language="javascript" type="text/javascript" src="include/calendar/lang/calendar-es.js"></script>
<script language="javascript" type="text/javascript" src="include/calendar/calendar-setup.js"></script>
<!-- Calendario -->
<!-- Modulo Donacion -->
<script type="text/javascript" language="JavaScript">
<!--
// Copyright information must stay intact
// FormCheck v1.10
// Copyright NavSurf.com 2002, all rights reserved
// Creative Solutions for JavaScript navigation menus, scrollers and web widgets
// Affordable Services in JavaScript consulting, customization and trouble-shooting
// Visit NavSurf.com at http://navsurf.com

function formCheck(formobj){
	// name of mandatory fields
	var fieldRequired = Array("nombre_don","direccion_don","ciudad_don","tel_casa_don","email_don","nom_recibo_don","dire_recibo_don","monto_don","fecha_cobro");
	// field description to appear in the dialog box
	var fieldDescription = Array("Nombre del Padrino:","Dirección","Ciudad","Teléfono Casa","E-mail","Nombre en el recibo","Dirección en el Recibo","Monto de Donación","Fecha de Cobro");
	// dialog message
	var alertMsg = "Por favor llena las casillas:\n";
	
	var l_Msg = alertMsg.length;
	
	for (var i = 0; i < fieldRequired.length; i++){
		var obj = formobj.elements[fieldRequired[i]];
		if (obj){
			if (obj.type == null){
				var blnchecked = false;
				for (var j = 0; j < obj.length; j++){
					if (obj[j].checked){
						blnchecked = true;
					}
				}
				if (!blnchecked){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				continue;
			}

			switch(obj.type){
			case "select-one":
				if (obj.selectedIndex == -1 || obj.options[obj.selectedIndex].text == ""){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "select-multiple":
				if (obj.selectedIndex == -1){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "text":
			case "textarea":
				if (obj.value == "" || obj.value == null){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			default:
			}
		}
	}

	if (alertMsg.length == l_Msg){
		return true;
	}else{
		alert(alertMsg);
		return false;
	}
}
// -->
</script>
<!-- Modulo Donacion -->

<!-- PodCast -->
<script type="text/javascript" src="include/podcast/ufo.js"></script>
<!-- PodCast -->
