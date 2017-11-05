<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 

include '../config.inc.php';

/* Inicia Módulos Comentarios (Administración) */

function comentarios($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$npass){

$smarty->assign('timodulo', "<img src=../imagenes/admin/manuales.gif align=middle border=0 title=Comentarios> M&oacute;dulo: Comentarios");
//$smarty->assign('contenido0', "");

/* Eliminar comentario */
$smarty->assign('menu0', '[<a href="modulos.php?modulo=comentarios&operacion=datos&ver=noticia_com">Comentarios en Noticias</a>]');
$smarty->assign('menu1', '[<a href="modulos.php?modulo=comentarios&operacion=datos&ver=contenido_com">Comentarios en Contenidos</a>]<br><br>');
if($operacion=="borrar"){
/* Capturamos datos */
$id_not_com = $_GET['id_not_com'];
$not_usuario = $_GET['not_usuario'];
$id_con_com = $_GET['id_con_com'];
$con_usuario = $_GET['con_usuario'];
$ver = $_GET["ver"];
/* Capturamos datos */
mysql_select_db("$nbase", $link);
if($ver=="noticia_com"){ // <-- Defino tipo de comentario.
mysql_query("Delete From noticia_com Where id_not_com='$id_not_com'",$link);
$smarty->assign('mensaje1', "<center>Informaci&oacute;n: El comentario de <B>".$not_usuario."</B> fue eliminado satisfactoriamente.<br><br> <a href=modulos.php?modulo=comentarios&operacion=datos&ver=noticia_com><-- Regresar al Men&uacute; de comentarios</a></center>");
}
elseif($ver=="contenido_com"){ //<-- Defino tipo de comentario.
mysql_query("Delete From contenido_com Where id_con_com='$id_con_com'",$link);
$smarty->assign('mensaje1', "<center>Informaci&oacute;n: El comentario de <B>".$not_usuario."</B> fue eliminado satisfactoriamente.<br><br> <a href=modulos.php?modulo=comentarios&operacion=datos&ver=contenido_com><-- Regresar al Men&uacute; de comentarios</a></center>");
}
$smarty->display('comentarios/index.tpl');
}
 
/* Eliminar comentario */
if($operacion=="eliminar"){
$smarty->assign('menu0', '[<a href="modulos.php?modulo=comentarios&operacion=datos&ver=noticia_com">Comentarios en Noticias</a>]');
$smarty->assign('menu1', '[<a href="modulos.php?modulo=comentarios&operacion=datos&ver=contenido_com">Comentarios en Contenidos</a>]<br><br>');
/* Capturamos datos */
$id_not_com = $_GET['id_not_com'];
$not_usuario = $_GET['not_usuario'];
$id_con_com = $_GET['id_con_com'];
$con_usuario = $_GET['con_usuario'];
$ver = $_GET["ver"];
/* Capturamos datos */
if($ver=="noticia_com"){ // <-- Defino tipo de comentario.
$smarty->assign('mensaje1', "&iquest; Usted realmente quiere eliminar el comentario de <b> ".$not_usuario."</b> ?");
$smarty->assign('mensaje2', "[<a href='modulos.php?modulo=comentarios&operacion=borrar&id_not_com=".$id_not_com."&not_usuario=".$not_usuario."&ver=noticia_com'>Si</a>]");
$smarty->assign('mensaje3', "[<a href='modulos.php?modulo=comentarios&operacion=datos&ver=noticia_com'>No</a>]");
}
elseif($ver=="contenido_com"){ //<-- Defino tipo de comentario.
$smarty->assign('mensaje1', "&iquest; Usted realmente quiere eliminar el comentario de <b> ".$con_usuario."</b> ?");
$smarty->assign('mensaje2', "[<a href='modulos.php?modulo=comentarios&operacion=borrar&id_con_com=".$id_con_com."&con_usuario=".$con_usuario."&ver=contenido_com'>Si</a>]");
$smarty->assign('mensaje3', "[<a href='modulos.php?modulo=comentarios&operacion=datos&ver=contenido_com'>No</a>]");
}
$smarty->display('comentarios/index.tpl');
}


/* Visualizar Datos */
if($operacion=="menu"){
$smarty->assign('menu0', '[<a href="modulos.php?modulo=comentarios&operacion=datos&ver=noticia_com">Comentarios en Noticias</a>]');
$smarty->assign('menu1', '[<a href="modulos.php?modulo=comentarios&operacion=datos&ver=contenido_com">Comentarios en Contenidos</a>]<br><br>');
$smarty->display('comentarios/index.tpl');
}


/* Menu */ 
if($operacion=="datos"){
$ver = $_GET["ver"];
$smarty->assign('menu0', '[<a href="modulos.php?modulo=comentarios&operacion=datos&ver=noticia_com">Comentarios en Noticias</a>]');
$smarty->assign('menu1', '[<a href="modulos.php?modulo=comentarios&operacion=datos&ver=contenido_com">Comentarios en Contenidos</a>]<br><br>');
if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=30; // cantidad de resultados por página
$inicial = $pg * $cantidad;
if($ver=="noticia_com"){ // <-- Defino tipo de comentario.
$pegar = "SELECT * FROM noticia_com where not_fecha=not_fecha ORDER BY not_fecha desc LIMIT $inicial,$cantidad";
}
elseif($ver=="contenido_com"){ //<-- Defino tipo de comentario.
$pegar = "SELECT * FROM contenido_com where con_fecha=con_fecha ORDER BY con_fecha desc LIMIT $inicial,$cantidad";
}
$cad = mysql_db_query($nbase,$pegar) or die (mysql_error());
if($ver=="noticia_com"){ // <-- Defino tipo de comentario.
$contar = "select * from noticia_com where not_fecha=not_fecha order by not_fecha desc";
} 
elseif($ver=="contenido_com"){ //<-- Defino tipo de comentario.
$contar = "select * from contenido_com where con_fecha=con_fecha order by con_fecha desc";
}
$contarok= mysql_db_query($nbase,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);
$smarty->assign('tablanoticia1', "Usuario");
$smarty->assign('tablanoticia2', "Acci&oacute;n");
$smarty->assign('tablanoticia3', "Comentario");
$smarty->assign('tablanoticia4', "Fecha");
while ($row=mysql_fetch_array($cad))
{
if($ver=="noticia_com"){ // <-- Defino tipo de comentario.
$smarty->append(array("tablanoticia5" => "".$row["not_usuario"].""));
$smarty->append(array("tablanoticia6" => "".$row["noti_com_tex"].""));
$smarty->append(array("tablanoticia7" => "".$row["not_fecha"].""));
$smarty->append(array("opnoticia1" => ""));
$smarty->append(array("opnoticia2" => "<a href='modulos.php?modulo=comentarios&operacion=eliminar&id_not_com=".$row["id_not_com"]."&id_not_iden=".$row["id_not_iden"]."&ver=noticia_com&not_usuario=".$row["not_usuario"]."'><img src='../imagenes/admin/sistema/eliminar.png' border='0' title='Eliminar'></a>"));
}
elseif($ver=="contenido_com"){ //<-- Defino tipo de comentario.
$smarty->append(array("tablanoticia5" => "".$row["con_usuario"].""));
$smarty->append(array("tablanoticia6" => "".$row["con_com_tex"].""));
$smarty->append(array("tablanoticia7" => "".$row["con_fecha"].""));
$smarty->append(array("opnoticia1" => ""));
$smarty->append(array("opnoticia2" => "<a href='modulos.php?modulo=comentarios&operacion=eliminar&id_con_com=".$row["id_con_com"]."&id_con_iden=".$row["id_con_iden"]."&ver=contenido_com&con_usuario=".$row["con_usuario"]."'><img src='../imagenes/admin/sistema/eliminar.png' border='0' title='Eliminar'></a>"));
}
}
mysql_free_result($cad);
// Creando los enlaces de paginación
$smarty->assign('enlacenoticia0', 'P&aacute;ginas');
if ($pg <> 0)
{
$url = $pg - 1;
if($ver=="noticia_com"){ // <-- Defino tipo de comentario.
$smarty->assign('enlacenoticia1', "<a href='modulos.php?modulo=comentarios&operacion=datos&pg=".$url."&ver=noticia_com'>« Anterior</a>");
}
elseif($ver=="contenido_com"){ //<-- Defino tipo de comentario.
$smarty->assign('enlacenoticia1', "<a href='modulos.php?modulo=comentarios&operacion=datos&pg=".$url."&ver=contenido_com'>« Anterior</a>");
}
}
else {
echo " ";
}
for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("enlacenoticia2" => " ".$i." "));
}
else {
if($ver=="noticia_com"){ // <-- Defino tipo de comentario.
$smarty->append(array("enlacenoticia3" => "<a href='modulos.php?modulo=comentarios&operacion=datos&pg=".$i."&ver=noticia_com'>".$i."</a>"));
}
elseif($ver=="contenido_com"){ //<-- Defino tipo de comentario.
$smarty->append(array("enlacenoticia3" => "<a href='modulos.php?modulo=comentarios&operacion=datos&pg=".$i."&ver=contenido_com'>".$i."</a>"));
}
}
}
if ($pg < $pages) {
$url = $pg + 1;
if($ver=="noticia_com"){ // <-- Defino tipo de comentario.
$smarty->assign('enlacenoticia4', "<a href='modulos.php?modulo=comentarios&operacion=datos&pg=".$url."&ver=noticia_com'>Siguiente »</a>");
}
elseif($ver=="contenido_com"){ //<-- Defino tipo de comentario.
$smarty->assign('enlacenoticia4', "<a href='modulos.php?modulo=comentarios&operacion=datos&pg=".$url."&ver=contenido_com'>Siguiente »</a>");
}
}
else {
}

$smarty->display('comentarios/index.tpl');
}

}
/* Menu */

/* Fin Módulos Comentarios (Administración) */



?>
