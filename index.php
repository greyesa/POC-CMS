<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 

include 'libreria/cabecera.php';
include 'libreria/bloques.php';
include 'libreria/menu.php';

/* Inicia Mensaje */
$result=mysql_query("select val from activadores where nom='act_men'", $link);
while ($row=mysql_fetch_array($result))
{
$ver = $row["val"];
if($ver == 1) {
$result2=mysql_query("select * from mensaje ORDER BY fecha DESC LIMIT 8", $link);
while ($row=mysql_fetch_array($result2))
{
$piemensaje = ''.$row["usuario"].' - '.$row["fecha"].'';
$smarty->assign('titulomensaje', "".$row["titulo"]."");
$smarty->assign('textomensaje', "".$row["texto"]."");
$smarty->assign('piemensaje', "".$piemensaje."");
}
mysql_free_result($result2);
}
elseif ($ver == 0)  {

}
}

mysql_free_result($result);

/* Fin de Mensaje */

/* Inicia Articulos */
$result3=mysql_query("select val from activadores where nom='act_art'", $link);
while ($row=mysql_fetch_array($result3))
{
$ver = $row["val"];
if($ver == 1) {
$result4=mysql_query("select val from activadores where nom='ver_art'", $link);
while ($row=mysql_fetch_array($result4))
{
$numero= $row["val"];
$result5=mysql_query("select * from articulos,cuerpo ORDER BY ar_fecha asc LIMIT $numero", $link);
}
mysql_free_result($result4);
while ($row=mysql_fetch_array($result5))
{
$texto = ''.$row["ar_texto"].'';
$resto = substr ("$texto", 0, 80); 

$smarty->assign('tiarticulos', "Articulos");

$smarty->append(array("tituloarticulo" => "<a href='modulos.php?modulo=articulo&operacion=verfull&Id_articulos=".$row["Id_articulos"]."'> - ".$row["ar_titulo"]."</a>"));
$smarty->append(array("textoarticulo" => "".$resto."..."));
$smarty->append(array("piearticulo" => "".$row["ar_usuario"]." - ".$row["ar_fecha"].""));
}
mysql_free_result($result5);
$masarticulo = '<a href="modulos.php?modulo=articulos"><IMG SRC="imagenes/masinfo.gif" WIDTH="14" HEIGHT="14" BORDER="0" alt="Visualizar todos los articulos."> Visualizar todos los articulos.</a>';
$smarty->assign('masarticulo', $masarticulo);

}
elseif ($ver == 0)  {
}
}
mysql_free_result($result3);
/* Fin de Articulos */ 

/* Inicio Noticia */
$result6=mysql_query("select val from activadores where nom='act_not'", $link);
while ($row=mysql_fetch_array($result6))
{
$ver = $row["val"];
if($ver == 1) {
$t=mysql_query("select val from activadores where nom='ver_noticia'", $link);
while ($row=mysql_fetch_array($t))
{
$numero = $row["val"];
$result7=mysql_query("select * from noticia ORDER BY ID_noticia desc LIMIT $numero", $link);
}
mysql_free_result($t);
while ($row=mysql_fetch_array($result7))
{



$categoria_noticia = $row["not_iden"];

		$categoria_not=mysql_query("select * from noticia_or WHERE ID_not_or='$categoria_noticia'");
		while ($registro=mysql_fetch_array($categoria_not))
		{
        $smarty->append(array("categoria_noticia" => $registro["not_ti"]));
			
	     }
		mysql_free_result($categoria_not);


$smarty->assign('tinoticia', "Noticias");

$smarty->append(array("titulonoticia" => "<a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$row["ID_noticia"]."'>".$row["titulo"]."</a>"));
$smarty->append(array("imagennoticia" => "<a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$row["ID_noticia"]."'><img src='".$row["picture"]."' vspace='0' hspace='5' alt='".$row["titulo"]."' align='left' border='0'></a>"));
$smarty->append(array("textonoticia" => "".$row["texto"].""));
$smarty->append(array("enlacenoticia" => "<a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$row["ID_noticia"]."' alt='M&aacute;s informaci&oacute;n acerca de ".$row["titulo"]."'> <IMG SRC='imagenes/masinfo.gif' WIDTH='14' HEIGHT='14' BORDER='0' alt='M&aacute;s informaci&oacute;n acerca de ".$row["titulo"]."'> M&aacute;s informaci&oacute;n.</a>"));
$smarty->append(array("imprimirnoticia" => "<A HREF=javascript:popUp('imprimir.php?modulo=noticia&ID_noticia=$row[ID_noticia]') alt='Imprimir $row[titulo]'>Versi&oacute;n para Impresi&oacute;n</A>"));
$smarty->append(array("enviarnoticia" => "<A HREF='modulos.php?modulo=noticia&operacion=enviarnoti&ID_noticia=$row[ID_noticia]#comentario' alt='Enviar por e-mail $row[titulo]'>Enviar a alguien</A>"));
$id_no=''.$row["ID_noticia"].'';
$result8=mysql_query("select * from noticia_com where id_not_iden='$id_no'", $link);
$r=mysql_num_rows($result8);
$smarty->append(array("comentarionoticia" => "<a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$row["ID_noticia"]."'>Comentarios: [ $r ]</a>"));
mysql_free_result($result8);
$smarty->append(array("visualizacionnoticia" => "Lecturas: [ ".$row["not_cont"]." ]"));
$smarty->append(array("pienoticia" => "".$row["usuario"]." - ".$row["fecha"].""));
}
mysql_free_result($result7);
}
elseif ($ver == 0)  {
}
}
mysql_free_result($result6);
/* Fin de Noticia */ 
$smarty->display('index.tpl');
?>
