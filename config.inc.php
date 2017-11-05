<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 

// Variables para Conexión a Base de Datos.
$nhost="localhost";
$nbase="poccms";
$nuser="root";
$npass="";

// E-mail del Administrador del servidor o del sitio web.
$emailadmser = "contacto@localhost";

// Base del sitio http:// 
// Debe colocarlo de esta manera. Ejemplo: http://www.misitio.com/ agregar la ultima diagonal (/).
$base_sitio = "http://localhost/poc/";

// Juego de Caracteres WebSite
//$codificacion = '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
$codificacion = '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';

// Juego de Caracteres e-mail
//$codificacion_mail = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$codificacion_mail = 'Content-type: text/html; charset=Unicode-UTF-8' . "\r\n";


/* ########### NO MODIFICAR NADA DESDE AQUI ############### */

// Conexión a Base de Datos. 
$link= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);

// Versión del Sistema
$version="1.2";
$revision_md5 = "5f9505a6b46e4be43fa296d279501717";

?>
