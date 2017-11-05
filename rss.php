<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 
include("include/feedcreator/feedcreator.class.php");
include("config.inc.php");

$rss = new UniversalFeedCreator();
$rss->useCached();

$res = mysql_query("SELECT * FROM administrador,cabecera");
while ($data = mysql_fetch_array($res)) {
	$web = $data["web"];
    $titulo = $data["titulo"];
	$descripcion = $data["descripcion"];
}

$rss->title = $titulo;
$rss->description = $descripcion;
$rss->link = $web;
$rss->syndicationURL = "".$PHP_SELF."";



$res = mysql_query("SELECT * FROM noticia ORDER BY ID_noticia DESC LIMIT 5");
while ($data = mysql_fetch_object($res)) {
    $item = new FeedItem();
    $item->title = $data->titulo;
   

$item->description = $data->texto;
   
$item->date = $data->fecha;
$item->source = "".$web."/modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=$data->ID_noticia";
     $item->link = "".$web."/modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=$data->ID_noticia";
	
$item->author = $data->usuario;
$rss->addItem($item);
}



$rss->saveFeed("RSS1.0", "feed.xml");
?> 
