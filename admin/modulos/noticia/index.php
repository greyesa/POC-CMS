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

/* Inicia Modulos Noticia (Administracion) */

function noticia($modulo,$operacion,$smarty,$link,$nbase,$result,$pg){

$smarty->assign('timodulo', "<img src='../imagenes/admin/noticia.gif' align='middle' border='0' title='Noticia'> M&oacute;dulo: Noticias");
$smarty->assign('ingresarnoticia', "<a href='modulos.php?modulo=noticia&operacion=lectura'> Indice Noticia</a> ] [<a href='modulos.php?modulo=noticia&operacion=ingresarnoticia'>Ingresar Nueva noticia</a> ] [<a href='modulos.php?modulo=noticia&operacion=categoria'>Categorias</a>]  [ <a href='modulos.php?modulo=noticia&operacion=preferencias'>Preferencias</a> <!-- ]  [ <a href='modulos.php?modulo=noticia&operacion=subirimg1'>Subir im&aacute;genes</a>--> ");
/* Menu de noticias */

/* Subir imagenes 1 */
if($operacion=="subirimg1"){
$smarty->assign('contenido0', "<br><br><center>Antes de subir archivos, toma en cuenta lo siguiente:<ul><li>Los archivos no deben excederse de 10 Kb.<li> Debe tener dimensiones de:<br> Anchura: 80 p&iacute;xeles<br>
Altura: 80 p&iacute;xeles</ul><br><br>
<form method='POST' action='modulos.php?modulo=noticia&operacion=subirimg2' ENCTYPE='MULTIPART/FORM-DATA'>
<input type='FILE' name='userfile'>
<input type='SUBMIT' name='subirimg2' value='Subir Archivo'>
</form></center><br><br>
");
$smarty->display('noticia/index.tpl');
}
/* Subir imagenes 1 */


/* Subir imagenes 2 */
if($operacion=="subirimg2"){
$userfile = $_POST["userfile"];
print ($userfile);
$archive_dir = "../imagenes/noticia";
if(isset($WINDIR)) $userfile = str_replace("\\\\","\\", $userfile);
$filename = basename($userfile_name);
//if($userfile_size <= 0) die ("$filename esta vacio.");
if(!@copy($userfile,"$archive_dir/$filename")) die ("No se puede copiar ".$userfile_name." en $filename");
//if(isset(!$WINDIR) && !@unlink($userfile)) die("No se puede borrar el archivo $userfile_name");


$smarty->assign('contenido0', "<br><br>El archivo $filename fue subido satisfactoriamente.<br>Tama&ntilde;o = ".number_format($userfile_size)."<br>Tipo = ".$userfile_type."<br><br>");
$smarty->display('noticia/index.tpl');
}
/* Subir imagenes 2 */

/* Borrar Categoria 2 */
if($operacion=="borrarcategoria2"){
$not_ti = $_GET['not_ti'];
$ID_not_or = $_GET['ID_not_or'];
$result=mysql_query("Delete From noticia_or WHERE ID_not_or='$ID_not_or'");
$smarty->assign('contenido0', "<br><br><b><center>Informe:</b> Fue eliminada satisfactoriamente la categoria: <b> ($not_ti)</b><br><BR><center><a href='modulos.php?modulo=noticia&operacion=categoria'><-- Regresar</a></center><BR><BR>");
$smarty->display('noticia/index.tpl');
}
/* Borrar Categoria 2 */


/* Borrar Categoria 1 */
if($operacion=="borrarcategoria"){
$not_ti = $_GET['not_ti'];
$ID_not_or = $_GET['ID_not_or'];
$smarty->assign('contenido0', "<br><br><center>Estas seguro de eliminar la categoria: <b>$not_ti</b>?</center><br>
<center><a href='modulos.php?modulo=noticia&operacion=borrarcategoria2&ID_not_or=".$ID_not_or."&not_ti=".$not_ti."'>[ Si ]</a> <a href='modulos.php?modulo=noticia&operacion=categoria'> [ No ]</a></center><BR><BR>");
$smarty->display('noticia/index.tpl');

}
/* Borrar Categoria 1 */



/* Editar Categoria */
if($operacion=="editarcategoria2"){
$not_ti = $_POST['not_ti'];
$ID_not_or = $_POST['ID_not_or'];
$result=mysql_query("Update noticia_or set not_ti='$not_ti' WHERE ID_not_or='$ID_not_or'");
$smarty->assign('contenido0', "<BR><CENTER><BR><b>Informe:</b> Se edito satisfactoriamente la categoria: <b> ($not_ti)</b>.<br><BR><a href='modulos.php?modulo=noticia&operacion=categoria'><-- Regresar</a></CENTER><BR><BR>");
$smarty->display('noticia/index.tpl');
}
/* Editar Categoria */


/* Editar Categoria */
if($operacion=="editarcategoria"){
$ID_not_or = $_GET['ID_not_or'];
$result2=mysql_query("select * from noticia_or WHERE ID_not_or='$ID_not_or'");
while ($row=mysql_fetch_array($result2))
{
$smarty->assign('contenido0', "<BR><BR><form action='modulos.php?modulo=noticia&operacion=editarcategoria2' method='post'>
<a href=javascript:history.back()><<- Regresar</a> <center><b>Editando categoria:</b> <br><input type=text name=not_ti value='".$row["not_ti"]."' size='40'><BR><br></center>
<INPUT TYPE=hidden name=ID_not_or value='".$row["ID_not_or"]."'>
<center><input type=submit name=editarcategoria2 value=Editar></center>
</form>");
}
mysql_free_result($result2);
$smarty->display('noticia/index.tpl');
}
/* Editar Categoria */


/* Ingresar categoria */
if($operacion=="categoria2"){
	$not_ti = $_POST['not_ti'];
	$result=mysql_query("INSERT into noticia_or (not_ti,not_or_cont,not_or_pag,not_or_fecha) values('$not_ti','0','0',now())");
$smarty->assign('contenido0', "<BR><BR><center><b>Informe:</b> Se ingreso satisfactoriamente la categoria:<b> ($not_ti).</b></center><br><BR><center><a href='modulos.php?modulo=noticia&operacion=categoria'><-- Regresar </a></center><BR><BR>");
$smarty->display('noticia/index.tpl');
}
/* Ingresar categoria*/



/* Menu Categoria */
if($operacion=="categoria"){
include '../config.inc.php';
$smarty->assign('contenido0', "<BR><BR><center><form action=modulos.php?modulo=noticia&operacion=categoria2 method=post>
<b>Nueva categoria:</b> <input type=text name=not_ti size=40>
<input type=submit name=categoria2 value=Agregar>
</form></center>");

$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=20; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * from noticia_or ORDER BY not_or_fecha desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from noticia_or order by not_or_fecha desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

$smarty->assign('contenido1', "<br><b>Categorias:<br><br></b>
<table BORDER=0 width=99%>
<tr>
<td class=noticia1><CENTER><font color=#000000><B>Tema</B></font></CENTER></td>
<td class=noticia1><CENTER><font color=#000000><B>Modificado</B></font></CENTER></td>
<td class=noticia1><CENTER><font color=#000000><B>Acci&oacute;n</B></font></CENTER></td>
</tr>");

while ($row=mysql_fetch_array($cad))
{
$smarty->append(array("contenido2" => "<tr>
<td class=noticia2><a href='modulos.php?modulo=noticia&operacion=editarcategoria&ID_not_or=".$row["ID_not_or"]."'>".$row["not_ti"]."</a></td>
<td class=noticia2><CENTER>".$row["not_or_fecha"]."</CENTER></td>
<td class=noticia2><CENTER><a href='modulos.php?modulo=noticia&operacion=editarcategoria&ID_not_or=".$row["ID_not_or"]."'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> <a href='modulos.php?modulo=noticia&operacion=borrarcategoria&ID_not_or=".$row["ID_not_or"]."&not_ti=".$row["not_ti"]."'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></CENTER></td>
</tr>"));
}
mysql_free_result($cad);
$smarty->assign('contenido3', "</table><BR>");

// Creando los enlaces de paginación
$smarty->assign('contenido4', "<center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('contenido5', "<a href='modulos.php?modulo=noticia&operacion=categoria&pg=".$url."'>« Anterior</a> ");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("contenido6" => "<font color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("contenido7" => "<a href='modulos.php?modulo=noticia&operacion=categoria&pg=".$i."'>".$i."</a> "));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('contenido8', "<a href='modulos.php?modulo=noticia&operacion=categoria&pg=".$url."'>Siguiente »</a>");
}
else {
echo " ";
}
$smarty->assign('contenido9', "</p></center>");
$smarty->display('noticia/index.tpl');
}
/* Menu Categoria */



if($operacion=="lectura"){

$actualizar = $_POST['actualizar'];

/* Actualizar noticia */
if($actualizar=="1"){
/* Capturar datos por POST */ 
$ID_not_or_v = $_POST['ID_not_or_v'];
$ID_not_or = $_POST['ID_not_or'];
$titulo = $_POST['titulo'];
$usuario = $_POST['usuario'];
$texto = $_POST['texto'];
$mas_noti = $_POST['mas_noti'];
$picture = $_POST['picture'];
$ID_noticia = $_POST['ID_noticia'];
/* Capturar datos por POST */ 
$picture = substr ("".$picture."", 3); /* Quitamos "../" de la carpeta de noticias */
$smarty->assign('actualizar', "<br>Resultado: Noticia actualizada satisfactoriamente");
$result=mysql_query("Update noticia Set titulo='$titulo',texto='$texto',usuario='$usuario',mas_noti='$mas_noti',picture='$picture', not_iden='$ID_not_or', fecha=now() WHERE ID_noticia='$ID_noticia'");


$result2=mysql_query("Update noticia_or set not_or_pag=not_or_pag-1 WHERE ID_not_or='$ID_not_or_v'");
	$result2=mysql_query("Update noticia_or set not_or_pag=not_or_pag+1 WHERE ID_not_or='$ID_not_or'");
}
else{
}
/* Actualizar noticia */ 


if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=20; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * FROM  noticia where fecha=fecha ORDER BY ID_noticia desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($nbase,$pegar) or die (mysql_error());

$contar = "select * from noticia where fecha=fecha order by ID_noticia desc"; 
$contarok= mysql_db_query($nbase,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

$smarty->assign('tablanoticia1', "T&iacute;tulo");
$smarty->assign('tablanoticia2', "Acci&oacute;n");
$smarty->assign('tablanoticia3', "Autor");
$smarty->assign('tablanoticia4', "Modificado");

while ($row=mysql_fetch_array($cad))
{
$smarty->append(array("tablanoticia5" => "<a href='modulos.php?modulo=noticia&operacion=editar&ID_noticia=".$row["ID_noticia"]."&not_iden=".$row["not_iden"]."'>".$row["titulo"]."</a>"));
$smarty->append(array("tablanoticia6" => "".$row["usuario"].""));
$smarty->append(array("tablanoticia7" => "".$row["fecha"].""));

$smarty->append(array("opnoticia1" => "<a href='modulos.php?modulo=noticia&operacion=editar&ID_noticia=".$row["ID_noticia"]."&not_iden=".$row["not_iden"]."'><img src='../imagenes/admin/sistema/editar.png' border='0' title='Editar'></a>"));
$smarty->append(array("opnoticia2" => "<a href='modulos.php?modulo=noticia&operacion=eliminar&ID_noticia=".$row["ID_noticia"]."&titulo=".$row["titulo"]."&not_iden=".$row["not_iden"]."'><img src='../imagenes/admin/sistema/eliminar.png' border='0' title='Eliminar'></a>"));
}
mysql_free_result($cad);

// Creando los enlaces de paginación
$smarty->assign('enlacenoticia0', 'P&aacute;ginas');

if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('enlacenoticia1', "<a href='modulos.php?modulo=noticia&operacion=lectura&pg=".$url."'>Â« Anterior</a>");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("enlacenoticia2" => " ".$i." "));
}
else {
$smarty->append(array("enlacenoticia3" => "<a href='modulos.php?modulo=noticia&operacion=lectura&pg=".$i."'>".$i."</a>"));

}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('enlacenoticia4', "<a href='modulos.php?modulo=noticia&operacion=lectura&pg=".$url."'>Siguiente Â»</a>");
}
else {
}
$smarty->display('noticia/menu.tpl');
}
/* Fin menu de noticias*/ 

/* Editar Noticia */
if($operacion=="editar"){
$ID_noticia = $_GET['ID_noticia'];
$not_iden = $_GET['not_iden'];
$result=mysql_query("select * from noticia WHERE ID_noticia='$ID_noticia'");
while ($row=mysql_fetch_array($result))
{

	$smarty->assign('categoria1', "<B>Categoria:</B>");
	$smarty->assign('categoria2', "<SELECT NAME='ID_not_or' size=1>");
	
	$result2=mysql_query("select * from noticia_or where ID_not_or='$not_iden'");

	while ($row2=mysql_fetch_array($result2))
	{
	$smarty->assign('categoria3', "<OPTION value='".$row2["ID_not_or"]."' name='".$row2["ID_not_or"]."'>".$row2["not_ti"]."</option><option>-------------</option>");
	}
	mysql_free_result($result2);

	$result3=mysql_query("select * from noticia_or");
	while ($row3=mysql_fetch_array($result3))
	{
	$smarty->append(array("categoria33" => "<OPTION value='".$row3["ID_not_or"]."' name='".$row3["ID_not_or"]."'>".$row3["not_ti"]."</option>"));
	}
	mysql_free_result($result3);
	$smarty->assign('categoria4', "</SELECT>");

$smarty->assign('ID_not_or_v', "".$row["not_iden"]."");
$smarty->assign('ID_noticia', "".$row["ID_noticia"]."");
$smarty->assign('titulonoticia', "".$row["titulo"]."");
$smarty->assign('autornoticia', "".$row["usuario"]."");
$smarty->assign('textonoticia1', "".$row["texto"]."");
$smarty->assign('textonoticia2', "".$row["mas_noti"]."");
$smarty->assign('fechanoticia', "".$row["fecha"]."");
$smarty->assign('contadornoticia', "".$row["not_cont"]."");
$smarty->assign('titulonoticiaesp', "Titulo:");
$smarty->assign('autornoticiaesp', "Autor:");
$smarty->assign('imagennoticiaesp', "Imagen:<br> [ <a href=javascript:imagenNoticia('../include/w2box/index.php?modo=cerrarnoti')>Agregar</a> ]");
$smarty->assign('imagennoticiaesp2', "La imagen de portada es la que se mostrar&aacute; en el home del sitio. Estas imagenes estan ubicadas en la carpeta<br> <em>imagenes/noticia</em>");

$smarty->assign('portadanoticiaesp', "En portada: [ <a href=javascript:imagenNoticia('../include/w2box/index.php')>Imagen</a> ]");
$smarty->assign('portadanoticiaesp2', "<em>La portada es el primer contenido que visualizar&aacute; el usuario.<br> Puedes ingresar una peque&ntilde;a introducci&oacute;n del tema o la nota.</em>");

$smarty->assign('notanoticiaesp', "Nota: [ <a href=javascript:imagenNoticia('../include/w2box/index.php')>Imagen</a> ]");

$smarty->assign('notanoticiaesp2', "<em>Es la continuaci&oacute;n de la Portada.</em>");
$smarty->assign('picture', "".$row["picture"]."");

$smarty->assign('men1', "Datos:");
$smarty->assign('men2', "ID del sistema:");
$smarty->assign('men3', "Ingreso:");
$smarty->assign('men4', "Contador:");

}
mysql_free_result($result);

$smarty->display('noticia/editar.tpl');
}
/* Editar Noticia*/

/* Eliminar Noticia */
if($operacion=="eliminar"){
/* Capturamos datos */
$titulo = $_GET['titulo'];
$ID_noticia = $_GET['ID_noticia'];
/* Capturamos datos */

$smarty->assign('noticiamensaje', "&iquest; Usted realmente quiere eliminar esta noticia:<b> ".$titulo."</b>?");
$smarty->assign('noticiasi', "[<a href='modulos.php?modulo=noticia&operacion=borrar&ID_noticia=".$ID_noticia."&titulo=".$titulo."'>Si</a>]");
$smarty->assign('noticiano', "[<a href='modulos.php?modulo=noticia&operacion=lectura'>No</a>]");

$smarty->display('noticia/eliminar.tpl');
}



/* Eliminar Noticia */
if($operacion=="borrar"){
/* Capturamos datos */
$titulo = $_GET['titulo'];
$ID_noticia = $_GET['ID_noticia'];
/* Capturamos datos */
mysql_select_db("$nbase", $link);
mysql_query("Delete From noticia Where ID_noticia='$ID_noticia'",$link);
$smarty->assign('borrado', "<center>Informaci&oacute;n: La noticia <B>".$titulo."</B> fue eliminada satisfactoriamente.<br><br> <a href=modulos.php?modulo=noticia&operacion=lectura><-- Regresar al Men&uacute; de noticias</a></center>");

$smarty->display('noticia/eliminar.tpl');
}


/* Ingresar noticia */
if($operacion=="ingresarnoticia"){

	$smarty->assign('categoria1', "<B>Categoria:</B>");
	$smarty->assign('categoria2', "<SELECT NAME='ID_not_or' size=1>");
	
	$result2=mysql_query("select * from noticia_or");

	while ($row2=mysql_fetch_array($result2))
	{
	$smarty->append(array("categoria3" => "<OPTION value='".$row2["ID_not_or"]."' name='".$row2["ID_not_or"]."'>".$row2["not_ti"]."</option>"));
	}
	mysql_free_result($result2);
	$smarty->assign('categoria4', "</SELECT>");


$smarty->assign('titulonoticiaesp', "Titulo:");
$smarty->assign('autornoticiaesp', "Autor:");
$smarty->assign('imagennoticiaesp', "Imagen:<br> [ <a href=javascript:imagenNoticia('../include/w2box/index.php?modo=cerrarnoti')>Agregar</a> ]");
$smarty->assign('imagennoticiaesp2', "La imagen de portada es la que se mostrar&aacute; en el home del sitio. Estas imagenes estan ubicadas en la carpeta<br> <em>imagenes/noticia</em>");
$smarty->assign('portadanoticiaesp', "En portada: [ <a href=javascript:imagenNoticia('../include/w2box/index.php')>Imagen</a> ]");

$smarty->assign('portadanoticiaesp2', "<em>La portada es el primer contenido que visualizar&aacute; el usuario.<br> Puedes ingresar una peque&ntilde;a introducci&oacute;n del tema o la nota.</em>");

$smarty->assign('notanoticiaesp', "Nota: [ <a href=javascript:imagenNoticia('../include/w2box/index.php')>Imagen</a> ]");

$smarty->assign('notanoticiaesp2', "<em>Es la continuaci&oacute;n de la Portada.</em>");

$smarty->display('noticia/ingresar.tpl');
}


/* Ingresar noticia */
if($operacion=="ingresarnoticia2"){
$ID_not_or = $_POST['ID_not_or'];
$titulo = $_POST['titulo'];
$usuario = $_POST['usuario'];
$texto = $_POST['texto'];
$mas_noti = $_POST['mas_noti'];
$picture = $_POST['picture'];
$picture = substr ("".$picture."", 3);

$result=mysql_query("INSERT into noticia (titulo,picture,texto,usuario,mas_noti,not_cont,fecha,not_iden) values('$titulo','$picture','$texto','$usuario','$mas_noti','0',now(),'$ID_not_or')");
mysql_query("UPDATE noticia_or SET not_or_pag=not_or_pag+1 WHERE ID_not_or='$ID_not_or'");

$smarty->assign('noticiaingreso', "<br><br><div align=center>La noticia fue ingresada satisfactoriamente.<br><a href=modulos.php?modulo=noticia&operacion=lectura><-- Regresar al Men&uacute; de noticias</a></div><br><br>");

$smarty->display('noticia/index.tpl');
}

/* Preferencias */
if($operacion=="preferencias"){
$result2=mysql_query("select val from activadores where nom='act_not'");
while ($row=mysql_fetch_array($result2))
{
$si=$row["val"];
if($row["val"]==1) {
	$si="Visualizar Noticias.";
}
elseif($row["val"]==0) {
	$si="No visualizar Noticias.";
}

$smarty->assign('pref1', "Aqui debes configurar si quieres visualizar las Noticias en la p&aacute;gina principal del sitio.");
$smarty->assign('pref2', "Actualmente esta opci&oacute;n est&aacute; en: <b>$si</b>");

}
mysql_free_result($result2);


$t=mysql_query("select val from activadores where nom='ver_noticia'");
while ($row=mysql_fetch_array($t))
{
$smarty->assign('pref3', "<form action=modulos.php?modulo=noticia&operacion=preferencias2 method=post>
<center><table border=0 width=60%>
<tr>
<td>Quieres activar las Noticias:</td>
<td><SELECT NAME=val><OPTION selected value=1 name=val>Si</OPTION><OPTION value=0 name=val>No</OPTION></SELECT></td>
</tr>
<tr>
<td>N&uacute;mero de noticias para <br>visualizar en p&aacute;gina principal:</td>
<td><INPUT TYPE=text value=".$row["val"]." name=val_noticia size=12></td>
</tr>
</table></center><br><br>

<INPUT TYPE=hidden value=act_not name=act_not>

<center><input type=submit name=preferencias2 value=Actualizar></center>
</form>");

}
mysql_free_result($t);

$smarty->display('noticia/preferencias.tpl');
}
/* Preferencias */

/* Preferencias 2 */
if($operacion=="preferencias2"){
$val = $_POST['val'];
$val_noticia = $_POST['val_noticia'];
$act_not = $_POST['act_not'];

$result=mysql_query("Update activadores Set val='$val' where nom='$act_not'");
$result2=mysql_query("Update activadores Set val='$val_noticia' where nom='ver_noticia'");

$smarty->assign('pref3', "Datos actualizados satisfactoriamente.<br><br><a href=modulos.php?modulo=noticia&operacion=lectura ><-- Regresar al men&uacute; principal</a>");

$smarty->display('noticia/preferencias.tpl');
}
/* Preferencias 2*/



}

/* Fin Modulos Noticia (Administracion) */



?>
