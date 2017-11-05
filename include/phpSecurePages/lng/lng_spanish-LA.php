<?php
// ------ Latin America Spanish translated by Manuel Herrera ------

// Login and Password errors
$strNoAccess          = "Acceso no autorizado";
$strNoPassword        = "Falta la clave";
$strPwFalse           = "La clave no es correcta";
$strPwNotFound        = "No se encontr&oacute; la clave en la base de datos";
$strUserNotAllowed    = "Este usuario no tiene acceso a esta p&aacute;gina";
$strUserNotExist      = "Este usuario no existe";

// Interface words
$strCancel            = "Cancelar";
$strEnter             = "Entrar";
$strInfo              = "informaci&oacute;n";
$strInfoOn            = "informaci&oacute;n si";
$strJSHello           = "Estimado Administrador," . " indique los siguientes datos:";
$strLogin             = "Nombre";
$strLoginInterface    = "Pantalla de Entrada";
$strPassword          = "Clave";
$strPoweredBy         = "realizado con";

// Installation and Database errors
$strNoConnection      = "POC-CMS: Atenci&oacute;n: Su navegador no ha sido capaz de conectarse al servidor de bases de datos. Por favor reintente cargar la p&aacute;gina presionando <a href='javascript:location.reload()' target='_self'>reload</a>. Si el problema se repite, contacte con el administrador: " . admEmail();
$strNoDatabase        = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>POC-CMS &rsaquo; Error</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="plantillas/instalacion/poccms.css" type="text/css" />
</head>
<body>
<img src="../imagenes/poccms.png">
<div class="caja"> <b>Atenci&oacute;n:</b> El sistema <a href="http://www.poccms.com" target="_blank">POC-CMS</a> no ha podido encontrar la base de datos y sus tablas. Por favor reintente cargar la p&aacute;gina presionando <a href="javascript:location.reload()" target="_self">reload</a>. <br><br>Posibles causas:<br>- No hay contacto con la base de datos.<br> - A&uacute;n no se ha realizado una instalaci&oacute;n.<br> - El sitio aparentemente esta fuera de linea por mantenimiento. <br><br> Si el problema persiste por favor, contacte con el administrador: <a href="mailto:$emailadmser">'.$emailadmser.'
</a></div>

</body>
</html>';
$strNoDataMethod      = "POC-CMS: Error en el archivo de configuraci&oacute;n.<BR>Ninguno de los dos datos en entrada han sido elegidos.<BR>Contacte con el administrador: " . admEmail();
$strNoUserLevelColumn = "POC-CMS : Error en el archivo de configuraci&oacute;n.<BR>No puedo encontrar la base de datos con los niveles de usuario.<BR>Contacte con el administrador: " . admEmail();
?>
