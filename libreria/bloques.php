<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 

include 'config.inc.php';
include 'include/lastRSS/lastRSS.php';


/* Bloque Derecho */ 
$result8=mysql_query("select * from bloques where posicion='Derecho' ORDER BY orden");
while ($row=mysql_fetch_array($result8))
{
if($row['ver']==1) {

if($row['tipo']=="php") { /* PHP */
$smarty->append(array("bloqdertitulo" => "".$row["titulo"].""));
ob_start();
//$row['texto'] = Stripslashes ("".$row['texto'].""); /* Quita lineas de escape */
$row['texto'] = substr ("".$row['texto']."", 2);    // Quita la primera aparicion de <?
$texto = eval($row['texto']);
$texto.= ob_get_contents();
ob_end_clean();
$smarty->append(array("bloqdertexto" => "".$texto.""));
}

if($row['tipo']=="rss") { /* RSS */
$smarty->append(array("bloqdertitulorss1" => "".$row["titulo"].""));

$rss = new lastRSS; 

$rss->cache_dir = 'include/lastRSS/cache'; 
$rss->cache_time = 1200; 
$rss->items_limit = 3; //número de items que quieres ver
// Buscando el archivo RSS 
if ($rs = $rss->get(''.$row["texto"].'')) {

foreach($rs['items'] as $item) {
$smarty->append(array("bloqdertextorss2" => "<a href='".$item["link"]."' target='_blank'>".$item["title"]."</a><br>"));
}
// $item["description"].

}
else {
	die ('<b>POC-CMS:</b> Atenci&oacute;n: No se pudo cargar un contenido tipo RSS en un bloque. <br>Por favor reintente cargar la p&aacute;gina presionando <a href="javascript:location.reload()" target="_self">reload</a>. <br><br>Posibles causas:<br> - No se encontro un archivo RSS v&aacute;lido. <br> - El archivo XML emisor tiene un error.<br><br> Si el problema persiste por favor, contacte con el administrador: <a href="mailto:'.$emailadmser.'">'.$emailadmser.'</a>');
}
}

if($row['tipo']=="texto" or $row['tipo']=="html") { /* Texto y HTML */
$smarty->append(array("bloqdertitulo" => "".$row["titulo"].""));
$smarty->append(array("bloqdertexto" => "".$row["texto"].""));
}
}
elseif($row['ver']==0) {
}
else {
echo "<b>POC-CMS:</b> Error con los Bloques (".__FILE__." en la linea ".__LINE__.")";
}
}
mysql_free_result($result8);
/* Bloque Derecho */ 

/* Bloque Izquierdo */ 
$result9=mysql_query("select * from bloques where posicion='Izquierdo' ORDER BY orden");
while ($row=mysql_fetch_array($result9))
{
if($row['ver']==1) {
if($row['tipo']=="php") { /* PHP */
$smarty->append(array("bloqiztitulo" => "".$row["titulo"].""));
ob_start();
$row['texto'] = substr ("".$row['texto']."", 2);    // Quita la primera aparición de <?
$texto = eval($row['texto']);
$texto.= ob_get_contents();
ob_end_clean();
$smarty->append(array("bloqiztexto" => "".$texto.""));
}


if($row['tipo']=="rss") { /* RSS */
$smarty->append(array("bloqiztitulorss1" => "".$row["titulo"].""));

$rss = new lastRSS; 

$rss->cache_dir = 'include/lastRSS/cache'; 
$rss->cache_time = 1200; 
$rss->items_limit = 3; //número de items que quieres ver
// Buscando el archivo RSS 
if ($rs = $rss->get(''.$row["texto"].'')) {

foreach($rs['items'] as $item) {
$smarty->append(array("bloqiztextorss2" => "<a href='".$item["link"]."' target='_blank'>".$item["title"]."</a><br>"));
}
}
else {
	die ('<b>POC-CMS:</b> Atenci&oacute;n: No se pudo cargar un contenido tipo RSS en un bloque. <br>Por favor reintente cargar la p&aacute;gina presionando <a href="javascript:location.reload()" target="_self">reload</a>. <br><br>Posibles causas:<br> - No se encontro un archivo RSS v&aacute;lido. <br> - El archivo XML emisor tiene un error.<br><br> Si el problema persiste por favor, contacte con el administrador: <a href="mailto:'.$emailadmser.'">'.$emailadmser.'</a>');
}
}


if($row['tipo']=="texto" or $row['tipo']=="html") { /* Texto y HTML */
$smarty->append(array("bloqiztitulo" => "".$row["titulo"].""));
$smarty->append(array("bloqiztexto" => "".$row["texto"].""));
}
}
elseif($row['ver']==0) {
}
else {
echo "<b>POC-CMS:</b> Error con los Bloques (".__FILE__." en la linea ".__LINE__.")";
}
}
mysql_free_result($result9);
/* Bloque Izquierdo */ 



?>
