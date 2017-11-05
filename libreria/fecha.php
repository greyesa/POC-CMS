<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 
/*Por: Wilder Monterroso wmonterroso@gmail.com*/


$dia=date("w");
$Ndia = array( "Domingo", "Lunes", "Martes", "Mi&eacute;rcoles", "Jueves", "Viernes", "S&aacute;bado" );

$dia = $Ndia[ $dia ];

//date("w") nos devuelve el n�mero del d�a con el switch case lo
//aplicamos a el d�a correspondiente en Espa�ol.

$mes=date("n");

$Nmes = array( "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
			   "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$mes = $Nmes[ $mes-1 ];

//aplicamos a el mes correspondiente en Espa�ol.

$numero=date("j");
$anio=date("Y");  
//Tomamos directos el d�a del mes y el a�o.

$result=mysql_query("select * from cabecera")or die ('
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>POC-CMS &rsaquo; Error</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="admin/plantillas/instalacion/poccms.css" type="text/css" />
</head>
<body>
<img src="imagenes/poccms.png">
<div class="caja"> <b>Atenci&oacute;n:</b> El sistema <a href="http://www.poccms.com" target="_blank">POC-CMS</a> no ha podido encontrar la base de datos y sus tablas. Por favor reintente cargar la p&aacute;gina presionando <a href="javascript:location.reload()" target="_self">reload</a>. <br><br>Posibles causas:<br>- No hay contacto con la base de datos.<br> - A&uacute;n no se ha realizado una instalaci&oacute;n.<br> - El sitio aparentemente esta fuera de linea por mantenimiento. <br><br> Si el problema persiste por favor, contacte con el administrador: <a href="mailto:$emailadmser">'.$emailadmser.'
</a></div>

</body>
</html>
');

while ($row=mysql_fetch_array($result))
{
$difhor = $row["hora_ser"]; //Diferencia horaria entre el server y la Laguna.
}
mysql_free_result($result);

$ajuste = ($difhor * 60 * 60); //Ajustamos por horas 60 seg* 60 min.
$hora = date("g:i  a",time() + $ajuste); //la hora es igual a la hora del server + el ajuste.

//Mostrar fecha.
$fecha = " $dia $numero $mes $anio $hora <br>";
?>

