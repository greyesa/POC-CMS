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
/* Inicia Módulos Contenido (Administración) */

function contenido($modulo,$operacion,$smarty,$pg){
	$smarty->assign('timodulo', "<img src=../imagenes/admin/contenido.gif align=middle border=0 title=Contenido> M&oacute;dulo: Contenido");

	$smarty->assign('timodulo1', "[<a href='modulos.php?modulo=contenido&operacion=lectura'> Indice Contenido</a> ] [<a href='modulos.php?modulo=contenido&operacion=categoria'>Categorias</a>] [<a href='modulos.php?modulo=contenido&operacion=nuevo'>Nuevo Contenido</a>]<br><BR> ");


/* Eliminar Contenido especifico */
if($operacion=="eliminar"){
/* Capturamos datos */
$ID_cont_or = $_GET['ID_cont_or'];
$con_ti = $_GET['con_ti'];
$id_con = $_GET['id_con'];
/* Capturamos datos */

$smarty->assign('contenido0', "<center>&iquest; Usted realmente quiere eliminar por completo este contenido denominado: <br><b> ".$con_ti."</b> ? <br> Nota: Se eliminar&aacute;n solo el contenidos especifico.<br><br>");
$smarty->assign('contenido1', "[<a href='modulos.php?modulo=contenido&operacion=borrarcon2&ID_cont_or=".$ID_cont_or."&con_ti=".$con_ti."&id_con=".$id_con."'>Si</a>]");
$smarty->assign('contenido3', "[<a href='modulos.php?modulo=contenido&operacion=editar&ID_cont_or=".$ID_cont_or."'>No</a>]</center><br><br>");

$smarty->display('contenido/index.tpl');
}


/* Eliminar Contenido especifico */
if($operacion=="borrarcon2"){
/* Capturamos datos */
$ID_cont_or = $_GET['ID_cont_or'];
$con_ti = $_GET['con_ti'];
$id_con = $_GET['id_con'];
/* Capturamos datos */
$result = mysql_query("Delete From contenido Where id_con='$id_con'");
$result2 = mysql_query("UPDATE contenido_or set cont_or_pag=cont_or_pag-1 Where ID_cont_or='$ID_cont_or'");
$smarty->assign('contenido0', "<center>Informaci&oacute;n: El contenido denominado <B>".$con_ti."</B> fue eliminado satisfactoriamente.<br> <a href=modulos.php?modulo=contenido&operacion=lectura><-- Regresar al Men&uacute; de Contenidos.</a></center><br><br>");

$smarty->display('contenido/index.tpl');
}


/* Eliminar Contenido */
if($operacion=="eliminarcon"){
/* Capturamos datos */
$ID_cont_or = $_GET['ID_cont_or'];
$cont_ti = $_GET['cont_ti'];
/* Capturamos datos */

$smarty->assign('contenido0', "<center>&iquest; Usted realmente quiere eliminar por completo este contenido denominado: <br><b> ".$cont_ti."</b> ? <br> Nota: Se eliminar&aacute;n solo los contenidos, no la categoria.<br><br>");
$smarty->assign('contenido1', "[<a href='modulos.php?modulo=contenido&operacion=borrarcon&ID_cont_or=".$ID_cont_or."&cont_titulo=".$cont_ti."'>Si</a>]");
$smarty->assign('contenido3', "[<a href='modulos.php?modulo=contenido&operacion=lectura'>No</a>]</center><br><br>");

$smarty->display('contenido/index.tpl');
}

/* Eliminar Contenido */
if($operacion=="borrarcon"){
/* Capturamos datos */
$ID_cont_or = $_GET['ID_cont_or'];
$cont_titulo = $_GET['cont_titulo'];
/* Capturamos datos */
$result = mysql_query("Delete From contenido Where con_iden='$ID_cont_or'");
$result2 = mysql_query("UPDATE contenido_or set cont_or_pag='0' Where ID_cont_or='$ID_cont_or'");
$smarty->assign('contenido0', "<center>Informaci&oacute;n: El contenido denominado <B>".$cont_titulo."</B> fue eliminado satisfactoriamente.<br> <a href=modulos.php?modulo=contenido&operacion=lectura><-- Regresar al Men&uacute; de Contenidos.</a></center><br><br>");

$smarty->display('contenido/index.tpl');
}


/* Borrar Categoria 2 */
if($operacion=="borrarcategoria2"){
$cont_ti = $_GET['cont_ti'];
$ID_cont_or = $_GET['ID_cont_or'];
$result=mysql_query("Delete From contenido_or WHERE ID_cont_or='$ID_cont_or'");
$smarty->assign('contenido0', "<br><br><b>Informe:</b> Fue eliminada satisfactoriamente la categoria: <b>( $cont_ti )</b><br><BR><center><a href='modulos.php?modulo=contenido&operacion=categoria'><-- Regresar</a></center><BR><BR>");
$smarty->display('contenido/index.tpl');
}
/* Borrar Categoria 2 */


/* Borrar Categoria 1 */
if($operacion=="borrarcategoria"){
$cont_ti = $_GET['cont_ti'];
$ID_cont_or = $_GET['ID_cont_or'];
$smarty->assign('contenido0', "<br><br><center>Estas seguro de eliminar la categoria: <b>$cont_ti</b>?</center><br>
<center><a href='modulos.php?modulo=contenido&operacion=borrarcategoria2&ID_cont_or=".$ID_cont_or."&cont_ti=".$cont_ti."'>[ Si ]</a> <a href='modulos.php?modulo=contenido&operacion=categoria'> [ No ]</a></center><BR><BR>");
$smarty->display('contenido/index.tpl');

}
/* Borrar Categoria 1 */



/* Editar Categoria */
if($operacion=="editarcategoria2"){
$cont_ti = $_POST['cont_ti'];
$ID_cont_or = $_POST['ID_cont_or'];
$result=mysql_query("Update contenido_or set cont_ti='$cont_ti' WHERE ID_cont_or='$ID_cont_or'");
$smarty->assign('contenido0', "<CENTER><BR><b>Informe:</b> Se edito satisfactoriamente la categoria: <b>( $cont_ti )</b>.<br><BR><a href='modulos.php?modulo=contenido&operacion=categoria'><-- Regresar</a></CENTER><BR><BR>");
$smarty->display('contenido/index.tpl');
}
/* Editar Categoria */


/* Editar Categoria */
if($operacion=="editarcategoria"){
$ID_cont_or = $_GET['ID_cont_or'];
$result2=mysql_query("select * from contenido_or WHERE ID_cont_or='$ID_cont_or'");
while ($row=mysql_fetch_array($result2))
{
$smarty->assign('contenido0', "<form action='modulos.php?modulo=contenido&operacion=editarcategoria2' method='post'>
<a href=javascript:history.back()><<- Regresar</a> <center><b>Editando categoria:</b> <br><input type=text name=cont_ti value='".$row["cont_ti"]."' size='40'><BR><br></center>
<INPUT TYPE=hidden name=ID_cont_or value='".$row["ID_cont_or"]."'>
<center><input type=submit name=editarcategoria2 value=Editar></center>
</form>");
}
mysql_free_result($result2);
$smarty->display('contenido/index.tpl');
}
/* Editar Categoria */


/* Ingresar categoria */
if($operacion=="categoria2"){
	$cont_ti = $_POST['cont_ti'];
	$result=mysql_query("INSERT into contenido_or (cont_ti,cont_or_cont,cont_or_pag,cont_or_fecha) values('$cont_ti','0','0',now())");
$smarty->assign('contenido0', "<BR><BR><center><b>Informe:</b> Se ingreso satisfactoriamente la categoria:<b>( $cont_ti ).</b></center><br><BR><center><a href='modulos.php?modulo=contenido&operacion=categoria'><-- Regresar </a></center><BR><BR>");
$smarty->display('contenido/index.tpl');
}
/* Ingresar categoria*/



/* Menu Categoria */
if($operacion=="categoria"){
include '../config.inc.php';
$smarty->assign('contenido0', "<BR><BR><center><form action=modulos.php?modulo=contenido&operacion=categoria2 method=post>
<b>Nueva categoria:</b> <input type=text name=cont_ti size=40>
<input type=submit name=categoria2 value=Agregar>
</form></center>");

$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=20; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * from contenido_or ORDER BY cont_or_fecha desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from contenido_or order by cont_or_fecha desc"; 
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
<td class=noticia2><a href='modulos.php?modulo=contenido&operacion=editarcategoria&ID_cont_or=".$row["ID_cont_or"]."'>".$row["cont_ti"]."</a></td>
<td class=noticia2><CENTER>".$row["cont_or_fecha"]."</CENTER></td>
<td class=noticia2><CENTER><a href='modulos.php?modulo=contenido&operacion=editarcategoria&ID_cont_or=".$row["ID_cont_or"]."'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> <a href='modulos.php?modulo=contenido&operacion=borrarcategoria&ID_cont_or=".$row["ID_cont_or"]."&cont_ti=".$row["cont_ti"]."'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></CENTER></td>
</tr>"));
}
mysql_free_result($cad);
$smarty->assign('contenido3', "</table><BR>");

// Creando los enlaces de paginación
$smarty->assign('contenido4', "<center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('contenido5', "<a href='modulos.php?modulo=contenido&operacion=categoria&pg=".$url."'>« Anterior</a> ");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("contenido6" => "<font color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("contenido7" => "<a href='modulos.php?modulo=contenido&operacion=categoria&pg=".$i."'>".$i."</a> "));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('contenido8', "<a href='modulos.php?modulo=contenido&operacion=categoria&pg=".$url."'>Siguiente »</a>");
}
else {
echo " ";
}
$smarty->assign('contenido9', "</p></center>");
$smarty->display('contenido/index.tpl');
}
/* Menu Categoria */



	/* Ingresar Contenido 2 */
	if($operacion=="nuevo2"){
		$ID_cont_or = $_POST['ID_cont_or'];
		$id_con = $_POST['id_con'];
		$con_iden = $_POST['con_iden'];
		$con_ti = $_POST['con_ti'];
		$con_subti = $_POST['con_subti'];
		$texto = $_POST['texto'];
		$mas_noti = $_POST['mas_noti'];
		$con_enlaces = $_POST['con_enlaces'];
		$result = mysql_query("INSERT into contenido (con_ti,con_subti,con_tex1,con_tex2,con_enlaces,con_iden,con_fecha) values('$con_ti','$con_subti','$texto','$mas_noti','','$ID_cont_or',now() )");
		mysql_query("UPDATE contenido_or SET cont_or_pag=cont_or_pag+1 WHERE ID_cont_or='$ID_cont_or'");
$smarty->assign('contenido1', "<center><P><b>Informe:</b> Se ingreso satisfactoriamente el contenido web denominado: <br><b>".$con_ti."</b>.<br><a href='modulos.php?modulo=contenido&operacion=lectura'><-- Regresar </a></p></center>");
$smarty->display('contenido/index.tpl');
	}
	/* Ingresar Contenido 2 */


	/* Ingresar Contenido */
	if($operacion=="nuevo"){
	$smarty->assign('contenido0', "<a href=javascript:history.back()><<- Regresar</a> ");	

	$smarty->assign('contenido1', "<form action=modulos.php?modulo=contenido&operacion=nuevo2 method=post>");

	$smarty->assign('contenido3', "<br><br><table border=0 width=99%>
<tr>
<td><B>Categoria:</B></td>
<td><SELECT NAME='ID_cont_or' size=1>");
	
	$result=mysql_query("select * from contenido_or");

	while ($row=mysql_fetch_array($result))
	{
	$smarty->append(array("contenido444" => "<OPTION value='".$row["ID_cont_or"]."' name='".$row["ID_cont_or"]."'>".$row["cont_ti"]."</option>"));
	}
	mysql_free_result($result);
	$smarty->assign('contenido5', "</SELECT> <a href='modulos.php?modulo=contenido&operacion=categoria'>-></a> </td></tr>");
	
	
$smarty->assign('contenido66', "
<tr>
<td><b>T&iacute;tulo de contenido:</b></td>
<td><input type=text name=con_ti size=40></td>
</tr>
<tr>
<td><b>Subt&iacute;tulo de contenido web:</b></td>
<td><input type=text name=con_subti size=40 value='".$row["con_subti"]."'></td>
</tr></table>

<table border='0'>
<tr>
<td valign=top><b>Portada:</b>[ <a href=javascript:imagenNoticia('../include/w2box/index.php')>Imagen</a> ]<br><em>Este contenido es el que visualizar&aacute; el usuario en portada.</em></td>
</tr>
<tr>
<td><textarea cols='88' rows='20' name=texto wrap=VIRTUAL></textarea></td>
</tr>
</table>

<table border='0'>
<tr>
<td valign=top><b>Contenido:</b>[ <a href=javascript:imagenNoticia('../include/w2box/index.php')>Imagen</a> ]<br><em>Es la continuaci&oacute;n de la Portada. El contenido completo.</em></td>
</tr>
<tr>
<td><textarea cols='88' rows='20' name=mas_noti wrap=VIRTUAL></textarea></td>
</tr>
</table>

<!-- <table border='0'> -->
<!-- <tr> -->
<!-- <td valign=top><b>Firma para el documento:</b>[ <a href=javascript:imagenNoticia('../include/w2box/index.php')>Imagen</a> ]<br><em>Datos como Copyright, autor del documento etc.</em></td> -->
<!-- </tr> -->
<!-- <tr> -->
<!-- <td><textarea cols='88' rows='20' name=con_enlaces wrap=VIRTUAL></textarea></td></tr> -->
");


$smarty->assign('contenido77', "
<!-- </table> --><center><input type=submit name=nuevo2 value=Ingresar></center>
</form>");

$smarty->display('contenido/index.tpl');
}
	/* Ingresar Contenido */

	/* Indice de Contenido */
	if($operacion=="lectura"){
	
include '../config.inc.php';
$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);
if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=20; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * from contenido_or ORDER BY cont_or_fecha desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from contenido_or order by cont_or_fecha desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);


$smarty->assign('contenido1', "<TABLE width=99% border=0><TR>
<TD class=noticia1><center>Categoria</center></TD><td class=noticia1><center>Total</center></td><td class=noticia1><center>Impresiones</center></td><td class=noticia1><center>Modificado</center></td><td class=noticia1><center>Acci&oacute;n</center></td>
</TR>");
while ($row=mysql_fetch_array($cad))
{
$smarty->append(array("contenido2" => "<TR>
<TD class=noticia2><a href=modulos.php?modulo=contenido&operacion=editar&ID_cont_or=".$row["ID_cont_or"].">".$row["cont_ti"]."</a></td><td class=noticia2><center>".$row["cont_or_pag"]."</center></td> <td class=noticia2><center>".$row["cont_or_cont"]."</center></TD> <td class=noticia2><center>".$row["cont_or_fecha"]."</center></td><td class=noticia2><center><a href='modulos.php?modulo=contenido&operacion=editar&ID_cont_or=".$row["ID_cont_or"]."'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> <a href='modulos.php?modulo=contenido&operacion=eliminarcon&ID_cont_or=".$row["ID_cont_or"]."&cont_ti=".$row["cont_ti"]."'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></center></td>
</TR>"));
}
mysql_free_result($cad);
$smarty->assign('contenido3', "</TABLE><br>");

// Creando los enlaces de paginación
$smarty->assign('contenido4', "<center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('contenido5', "<a href='modulos.php?modulo=contenido&operacion=lectura&pg=".$url."'>« Anterior</a> ");
}
else {

}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("contenido6" => "<font color=ff0000><b> ".$i." </b></font>"));
}
else {
$smarty->append(array("contenido7" => "<a href='modulos.php?modulo=contenido&operacion=lectura&pg=".$i."'>".$i."</a> "));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('contenido8', "<a href='modulos.php?modulo=contenido&operacion=lectura&pg=".$url."'>Siguiente »</a>");
}
else {

}
$smarty->assign('contenido9', "</p></center>");
$smarty->display('contenido/index.tpl');
}
	/* Indice de Contenido */

	/* Indice de Contenido (paginas) */
	if($operacion=="editar"){
$ID_cont_or = $_GET['ID_cont_or'];

$smarty->assign('contenido0', "<a href=modulos.php?modulo=contenido&operacion=lectura><<- Regresar</a> ");

$result2=mysql_query("select * from contenido_or");
while ($row2=mysql_fetch_array($result2))
{
$smarty->assign('contenido', "<font color=#000000>[<b>Categoria: ".$row2["cont_ti"]."</b>]</font><br><br>");
}
mysql_free_result($result2);

$result=mysql_query("select * from contenido where con_iden='$ID_cont_or' order by con_fecha desc");
$smarty->assign('contenido1', "<TABLE width=99% border=0><TR>
<TD class=noticia1><center>Titulo</center></TD><TD class=noticia1><center>Modificado</center></td><td class=noticia1><center>Acci&oacute;n</center></td>
</TR>");
while ($row=mysql_fetch_array($result))
{

$smarty->append(array("contenido2" => "<TR>
<TD class=noticia2><a href='modulos.php?modulo=contenido&operacion=editar2&ID_cont_or=".$ID_cont_or."&con_iden=".$row["con_iden"]."&id_con=".$row["id_con"]."&con_ti=".$row["con_ti"]."'>".$row["con_ti"]."</a></TD><td class=noticia2><center>".$row["con_fecha"]."</center></td><td class=noticia2><center><a href='modulos.php?modulo=contenido&operacion=editar2&ID_cont_or=".$ID_cont_or."&con_iden=".$row["con_iden"]."&id_con=".$row["id_con"]."&con_ti=".$row["con_ti"]."'><img src='../imagenes/admin/sistema/editar.png' border='0' title='Editar'></a> <a href='modulos.php?modulo=contenido&operacion=eliminar&ID_cont_or=".$ID_cont_or."&con_iden=".$row["con_iden"]."&id_con=".$row["id_con"]."&con_ti=".$row["con_ti"]."'><img src='../imagenes/admin/sistema/eliminar.png' border='0' title='Eliminar'></a></center></td>
</TR>"));
}
mysql_free_result($result);
$smarty->assign('contenido3', "</TABLE><br>");

$smarty->display('contenido/index.tpl');
	}

	/* Indice de Contenido (paginas) */

	/* Editar 2 */
	if($operacion=="editar2"){
		$ID_cont_or = $_GET['ID_cont_or'];
		$id_con = $_GET['id_con'];
		$con_iden = $_GET['con_iden'];
		$smarty->assign('contenido0', "<a href=javascript:history.back()><<- Regresar</a> ");	$result=mysql_query("select * from contenido_or where ID_cont_or='$ID_cont_or'");
		while ($row=mysql_fetch_array($result))
		{
			$smarty->assign('contenido', "<font color=#000000>[<b>Contenido: ".$row["cont_ti"]."</b>]</font><br><br>");	
		}
	mysql_free_result($result);
	$smarty->assign('contenido1', "<form action=modulos.php?modulo=contenido&operacion=editar3 method=post><INPUT TYPE='hidden' name='ID_cont_or_v' value='".$ID_cont_or."'><INPUT TYPE=hidden value='".$id_con."' name='id_con'>");

	$smarty->assign('contenido3', "<br><br><table border=0 width=99%>
<tr>
<td><B>Categoria:</B></td>
<td><SELECT NAME='ID_cont_or' size=1>");
	
	$result=mysql_query("select * from contenido_or where ID_cont_or='$ID_cont_or'");

	while ($row=mysql_fetch_array($result))
	{
	$smarty->assign('contenido44', "<OPTION value='".$row["ID_cont_or"]."' name='".$row["ID_cont_or"]."'>".$row["cont_ti"]."</option><option>-------------</option>");
	}
	mysql_free_result($result);

$result3=mysql_query("select * from contenido_or");
	while ($row3=mysql_fetch_array($result3))
	{
	$smarty->append(array("contenido444" => "<OPTION value='".$row3["ID_cont_or"]."' name='".$row3["ID_cont_or"]."'>".$row3["cont_ti"]."</option>"));
	}
	mysql_free_result($result3);
	$smarty->assign('contenido5', "</SELECT> <a href='modulos.php?modulo=contenido&operacion=categoria'>-></a> </td></tr>");

	$result2=mysql_query("select * from contenido where id_con='$id_con'");
	while ($row=mysql_fetch_array($result2))
	{
	$mensaje = htmlspecialchars($row["con_tex1"]);
	$mensaje2 = htmlspecialchars($row["con_tex2"]);
	$mensaje3 = htmlspecialchars($row["con_enlaces"]);


$smarty->assign('contenido66', "
<tr>
<td><b>T&iacute;tulo de contenido:</b></td>
<td><input type=text name=con_ti size=40 value='".$row["con_ti"]."'></td>
</tr>
<tr>
<td><b>Subt&iacute;tulo de contenido web:</b></td>
<td><input type=text name=con_subti size=40 value='".$row["con_subti"]."'></td>
</tr>
</table>

<table>
<tr>
<td valign=top><b>Portada:</b>[ <a href=javascript:imagenNoticia('../include/w2box/index.php')>Imagen</a> ]<br><em>Este contenido es el que visualizar&aacute; el usuario en portada.</em></td>
</tr>
<tr>
<td><textarea cols='88' rows='20' name='texto' wrap=VIRTUAL>".$mensaje."</textarea></td>
</tr>
</table>

<table>
<tr>
<td valign=top><b>Contenido:</b>[ <a href=javascript:imagenNoticia('../include/w2box/index.php')>Imagen</a> ]<br><em>Es la continuaci&oacute;n de la Portada. El contenido completo.</em></td>
</tr>
<tr>
<td><textarea cols='88' rows='20' name=mas_noti wrap=VIRTUAL>".$mensaje2."</textarea></td>
</tr>
</table>

<!-- <table> -->
<!-- <tr> -->
<!-- <td valign=top><b>Firma para el documento:</b>[ <a href=javascript:imagenNoticia('../include/w2box/index.php')>Imagen</a> ]<br><em>Datos como Copyright, autor del documento etc.</em></td> -->
<!-- </tr> -->
<!-- <tr> -->
<!-- <td><textarea cols='88' rows='20' name=con_enlaces wrap=VIRTUAL>".$mensaje3."</textarea></td></tr> -->
");
}
mysql_free_result($result2);

$smarty->assign('contenido77', "
<!-- </table> --><center><input type=submit name=editar3 value=Editar></center>
</form>");

$smarty->display('contenido/index.tpl');
}
/* Editar 2 */

	/* Editar 3 */
	if($operacion=="editar3")
	{
	$ID_cont_or = $_POST['ID_cont_or'];
	$ID_cont_or_v = $_POST['ID_cont_or_v'];
	$id_con = $_POST['id_con'];
	$con_iden = $_POST['con_iden'];
	$con_ti = $_POST['con_ti'];
	$con_subti = $_POST['con_subti'];
	$texto = $_POST['texto'];
	$mas_noti = $_POST['mas_noti'];
	$con_enlaces = $_POST['con_enlaces'];
	
	// $con_ti = addslashes($_POST['con_ti']);
        //$texto = addslashes($_POST['texto']);
	//$mas_noti = addslashes($_POST['mas_noti']);
	//$con_enlaces = addslashes($_POST['con_enlaces']);
	
	$smarty->assign('contenido0', "<a href=javascript:history.back()><<- Regresar</a> ");
	
		$smarty->assign('contenido', "<font color=#000000>[<b>Contenido: ".$cont_ti."</b>]</font><br><br>");
		 
	$result=mysql_query("Update contenido set con_ti='$con_ti', con_subti='$con_subti', con_tex1='$texto', con_tex2='$mas_noti', con_enlaces='', con_iden='$ID_cont_or', con_fecha=now() WHERE id_con='$id_con'");

	$result2=mysql_query("Update contenido_or set cont_or_pag=cont_or_pag-1 WHERE ID_cont_or='$ID_cont_or_v'");
	$result2=mysql_query("Update contenido_or set cont_or_pag=cont_or_pag+1 WHERE ID_cont_or='$ID_cont_or'");

$smarty->assign('contenido1', "<center><P><b>Informe:</b> Se edito satisfactoriamente el contenido web denominado: <br><b>".$con_ti."</b>.<br><a href='modulos.php?modulo=contenido&operacion=lectura'><-- Regresar </a></p></center>");
$smarty->display('contenido/index.tpl');
}
/* Editar 3 */
}
/* Fin Módulos Informacion (Administración) */
?>
