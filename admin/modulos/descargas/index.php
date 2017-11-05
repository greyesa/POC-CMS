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

/* Inicia Módulos descargas (Administración) */

function descargas($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$npass){

$smarty->assign('timodulo', "<img src=../imagenes/admin/descargas.gif align=middle border=0 title=descargas> M&oacute;dulo: Descargas");

$smarty->assign('timodulo2', "[<a href='modulos.php?modulo=descargas&operacion=lectura'>Indice Descargas</a>] [<a href='modulos.php?modulo=descargas&operacion=nuevo'>Ingresar Nueva Descarga</a>] [<a href='modulos.php?modulo=descargas&operacion=categoria'>Categorias</a>]");

/* Borrar Categoria 2 */
if($operacion=="borrarcategoria2"){
$tem_ul2 = $_GET['tem_ul2'];
$id_ul2 = $_GET['id_ul2'];
$result=mysql_query("Delete From uldescargastem  WHERE id_ul2='$id_ul2'");
$smarty->assign('descargas0', "<br><br><center><b>Informe:</b> Fue eliminada satisfactoriamente la categoria: <b> ($tem_ul2) </b><br><BR><center><a href='modulos.php?modulo=descargas&operacion=categoria'><-- Regresar</a></center><BR><BR>");
$smarty->display('descargas/index.tpl');
}
/* Borrar Categoria 2 */


/* Borrar Categoria 1 */
if($operacion=="borrarcategoria"){
$tem_ul2 = $_GET['tem_ul2'];
$id_ul2 = $_GET['id_ul2'];
$smarty->assign('descargas0', "<br><br><center>Estas seguro de eliminar la categoria: <b>$tem_ul2</b>?</center><br>
<center><a href='modulos.php?modulo=descargas&operacion=borrarcategoria2&id_ul2=".$id_ul2."&tem_ul2=".$tem_ul2."'>[ Si ]</a> <a href='modulos.php?modulo=descargas&operacion=categoria'> [ No ]</a></center><BR><BR>");
$smarty->display('descargas/index.tpl');

}
/* Borrar Categoria 1 */



/* Editar Categoria */
if($operacion=="editarcategoria2"){
$tem_ul2 = $_POST['tem_ul2'];
$id_ul2 = $_POST['id_ul2'];
$result=mysql_query("Update uldescargastem set tem_ul2='$tem_ul2' WHERE id_ul2='$id_ul2'");
$smarty->assign('descargas0', "<BR><CENTER><BR><b>Informe:</b> Se edito satisfactoriamente la categoria: <b> ($tem_ul2)</b>.<br><BR><a href='modulos.php?modulo=descargas&operacion=categoria'><-- Regresar</a></CENTER><BR><BR>");
$smarty->display('descargas/index.tpl');
}
/* Editar Categoria */


/* Editar Categoria */
if($operacion=="editarcategoria"){
$id_ul2 = $_GET['id_ul2'];
$result2=mysql_query("select * from uldescargastem WHERE id_ul2='$id_ul2'");
while ($row=mysql_fetch_array($result2))
{
$smarty->assign('descargas0', "<BR><BR><form action='modulos.php?modulo=descargas&operacion=editarcategoria2' method='post'>
<a href=javascript:history.back()><<- Regresar</a> <center><b>Editando categoria:</b> <br><input type=text name=tem_ul2 value='".$row["tem_ul2"]."' size='40'><BR><br></center>
<INPUT TYPE=hidden name=id_ul2 value='".$row["id_ul2"]."'>
<center><input type=submit name=editarcategoria2 value=Editar></center>
</form>");
}
mysql_free_result($result2);
$smarty->display('descargas/index.tpl');
}
/* Editar Categoria */


/* Ingresar categoria */
if($operacion=="categoria2"){
	$tem_ul2 = $_POST['tem_ul2'];
	$result=mysql_query("INSERT into uldescargastem (tem_ul2,con_ul2,vot_fecha) values('$tem_ul2','0',now())");
$smarty->assign('descargas0', "<BR><BR><center><b>Informe:</b> Se ingreso satisfactoriamente la categoria:<b> ($tem_ul2).</b></center><br><BR><center><a href='modulos.php?modulo=descargas&operacion=categoria'><-- Regresar </a></center><BR><BR>");
$smarty->display('descargas/index.tpl');
}
/* Ingresar categoria*/



/* Menu Categoria */
if($operacion=="categoria"){
include '../config.inc.php';
$smarty->assign('descargas0', "<BR><BR><center><form action=modulos.php?modulo=descargas&operacion=categoria2 method=post>
<b>Nueva categoria:</b> <input type=text name=tem_ul2 size=40>
<input type=submit name=categoria2 value=Agregar>
</form></center>");

$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=20; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * from uldescargastem ORDER BY vot_fecha desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from uldescargastem order by vot_fecha desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

$smarty->assign('descargas1', "<br><b>Categorias:<br><br></b>
<table BORDER=0 width=99%>
<tr>
<td class=noticia1><CENTER><font color=#000000><B>Tema</B></font></CENTER></td>
<td class=noticia1><CENTER><font color=#000000><B>Modificado</B></font></CENTER></td>
<td class=noticia1><CENTER><font color=#000000><B>Acci&oacute;n</B></font></CENTER></td>
</tr>");

while ($row=mysql_fetch_array($cad))
{
$smarty->append(array("descargas2" => "<tr>
<td class=noticia2><a href='modulos.php?modulo=descargas&operacion=editarcategoria&id_ul2=".$row["id_ul2"]."'>".$row["tem_ul2"]."</a></td>
<td class=noticia2><CENTER>".$row["vot_fecha"]."</CENTER></td>
<td class=noticia2><CENTER><a href='modulos.php?modulo=descargas&operacion=editarcategoria&id_ul2=".$row["id_ul2"]."'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> <a href='modulos.php?modulo=descargas&operacion=borrarcategoria&id_ul2=".$row["id_ul2"]."&tem_ul2=".$row["tem_ul2"]."'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></CENTER></td>
</tr>"));
}
mysql_free_result($cad);
$smarty->assign('descargas3', "</table><BR>");

// Creando los enlaces de paginación
$smarty->assign('descargas4', "<center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('descargas5', "<a href='modulos.php?modulo=noticia&operacion=categoria&pg=".$url."'>« Anterior</a> ");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("descargas6" => "<font color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("descargas7" => "<a href='modulos.php?modulo=noticia&operacion=categoria&pg=".$i."'>".$i."</a> "));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('descargas8', "<a href='modulos.php?modulo=noticia&operacion=categoria&pg=".$url."'>Siguiente »</a>");
}
else {
echo " ";
}
$smarty->assign('descargas9', "</p></center>");
$smarty->display('descargas/index.tpl');
}
/* Menu Categoria */



/* Indice descargas */
if($operacion=="lectura"){

$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=25; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * from uldescargas ORDER BY fecha desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from uldescargas order by fecha desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

$smarty->assign('descargas1', "<TABLE BORDER=0 WIDTH=99%>
<TR>
<TD class='noticia1'><CENTER><font color=#000000><b>Descarga</b></font></CENTER></TD>
<TD class='noticia1'><CENTER><font color=#000000><b>Modificado</b></font></CENTER></TD>
<TD class='noticia1'><CENTER><font color=#000000><b>Acci&oacute;n</b></font></CENTER></TD>
</TR>");
while ($row=mysql_fetch_array($cad))
{
$smarty->append(array("descargas2" => "<TR>
<TD class='noticia2'><a href='modulos.php?modulo=descargas&operacion=editar&id_ul=".$row["id_ul"]."&iden_ul=".$row["iden_ul"]."'>".$row["titulo"]."</a></TD>
	<TD class='noticia2'><CENTER>".$row["fecha"]."</CENTER></em></TD>
	<TD class='noticia2'><CENTER><a href='modulos.php?modulo=descargas&operacion=editar&id_ul=".$row["id_ul"]."&iden_ul=".$row["iden_ul"]."'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> <a href='modulos.php?modulo=descargas&operacion=eliminar&id_ul=".$row["id_ul"]."&titulo=".$row["titulo"]."'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></CENTER></TD>
</TR>"));
}
mysql_free_result($cad);
$smarty->assign('descargas3', "</TABLE>");

// Creando los enlaces de paginación
$smarty->assign('descargas4', "<center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('descargas5', "<a href='modulos.php?modulo=descargas&operacion=lectura&pg=".$url."'>« Anterior</a> ");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("descargas6" => "<font color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("descargas7" => "<a href='modulos.php?modulo=descargas&operacion=lectura&pg=".$i."'>".$i."</a> "));
}
}
if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('descargas8', "<a href='modulos.php?modulo=descargas&operacion=lectura&pg=".$url."'>Siguiente »</a>");
}
else {
echo " ";
}
$smarty->assign('descargas9', "</p></center>");
$smarty->display('descargas/index.tpl');
}
/* Indice descargas */


/* Editar descargas */

if($operacion=="editar"){
$id_ul = $_GET['id_ul'];
$iden_ul = $_GET['iden_ul'];
$result=mysql_query("select * from uldescargas WHERE id_ul='$id_ul'");
while ($row=mysql_fetch_array($result))
{
$smarty->assign('descargas1', "<form action='modulos.php?modulo=descargas&operacion=editar2' method='post'>
<input type=hidden name=id_ul value=".$row["id_ul"].">

<center><table border='0'>
<tr><td>
<table border='0'>
<tr><td><a href=javascript:history.back()><- Regresar</a><br><br></td></tr>
<tr>
<td class=caja><font color='#000000'><B>Datos:</B></font> <B>ID del Sistema</B>: ".$row["id_ul"]." <B>Modificado:</B> ".$row["fecha"]."
</td>
</tr>
</table><br> 
<table border=0 width=99%>
<tr>
<td class='sinborde'>

<table border=0 width=99%><tr>");

	$smarty->assign('categoria1', "<td><B>Categoria:</B></td>");
	$smarty->assign('categoria2', "<td><SELECT NAME='iden_ul' size=1>");
	
	$result2=mysql_query("select * from uldescargastem where id_ul2='$iden_ul'");

	while ($row2=mysql_fetch_array($result2))
	{
	$smarty->assign('categoria3', "<OPTION value='".$row2["id_ul2"]."' name='".$row2["id_ul2"]."'>".$row2["tem_ul2"]."</option><option>-------------</option>");
	}
	mysql_free_result($result2);

	$result3=mysql_query("select * from uldescargastem");
	while ($row3=mysql_fetch_array($result3))
	{
	$smarty->append(array("categoria33" => "<OPTION value='".$row3["id_ul2"]."' name='".$row3["id_ul2"]."'>".$row3["tem_ul2"]."</option>"));
	}
	mysql_free_result($result3);
	$smarty->assign('categoria4', "</SELECT></td></tr>");

$smarty->assign('descargas11', "

<tr>
<td><b>T&iacute;tulo:</b></td>
<td><input type=text name=titulo value='".$row["titulo"]."' size=40></td>
</tr>

<tr>
<td><b>Autor:</b></td> <td><input type=text size=40 name=autor value='".$row["autor"]."'></td>
</tr> 

<tr>
<td><b>P&aacute;gina Web:</b></td> 
<td><input type=text name=web value='".$row["web"]."' size=40></td>
</tr>

<tr>
<td><b>E-mail:</b> </td> <td><input type=text size=40 name=correo value='".$row["correo"]."'></td></tr>

<tr>
<td><b>Versi&oacute;n:</b></td> 
<td><input type=text name=version value='".$row["version"]."' size=40>
</td></tr>

<tr>
<td><b>Licencia:</b></td> 
<td><input type=text name=licencia value='".$row["licencia"]."' size=40></td>
</tr>

<tr>
<td><b>Tama&ntilde;o:</b></td> 
<td><input type=text name=tamano value='".$row["tamano"]."' size=40></td>
</tr>

<tr>
<td><b>Link Descarga:</b></td>
<td><input type=text name=descarga value='".$row["descarga"]."' size=40></td>
	</tr>
</table>

<table border='0'>
<tr>
<td><b>Descripci&oacute;n:</b></td>
</tr>
<tr>
<td><textarea rows=20 cols=88 name=descripcion wrap=phisical>".$row["descripcion"]."</textarea><td>
</tr>
</table>
</td>
	
</tr></table><BR><BR>
<center><input type='hidden' name='iden_ul_no' value='".$row["iden_ul"]."'><input type=submit value=Editar name=editar2>
</form></td></tr></table>");
}
mysql_free_result($result);
$smarty->display('descargas/index.tpl');
}
/* Editar descargas */

/* Editar descargas */
if($operacion=="editar2"){
$id_ul = $_POST['id_ul'];
$iden_ul = $_POST['iden_ul'];
$iden_ul_no = $_POST['iden_ul_no'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$web = $_POST['web'];
$correo = $_POST['correo'];
$version = $_POST['version'];
$licencia = $_POST['licencia'];
$tamano = $_POST['tamano'];
$descarga = $_POST['descarga'];
$descripcion = $_POST['descripcion'];

mysql_query("Update uldescargas set titulo='$titulo', descripcion='$descripcion', tamano='$tamano', licencia='$licencia', autor='$autor', correo='$correo', descarga='$descarga',fecha=now(),web='$web', version='$version', iden_ul='$iden_ul' WHERE id_ul='$id_ul'");

$result2=mysql_query("Update uldescargastem set con_ul2=con_ul2-1 WHERE id_ul2='$iden_ul_no'");
	$result2=mysql_query("Update uldescargastem set con_ul2=con_ul2+1 WHERE id_ul2='$iden_ul'");

$smarty->assign('descargas1', "<BR><BR><CENTER>La descarga: <B>".$titulo."</B> fue editada satisfactoriamente.<br><br><a href='modulos.php?modulo=descargas&operacion=lectura'><- Regresar </a></CENTER><BR><BR><BR>");
$smarty->display('descargas/index.tpl');
}
/* Editar descargas */

/* Ingresar descargas */
if($operacion=="nuevo"){
	$smarty->assign('descargas1', "<form action='modulos.php?modulo=descargas&operacion=nuevo2' method='post'>
<input type=hidden name=id_ul value='".$row["id_ul"]."'>

<center><table border='0'>
<tr><td>
<table border='0' width=64%>
<tr><td><a href=javascript:history.back()><- Regresar</a><br><br></td><td></td></tr>
<tr><td><b>Categoria:</b></td><td><SELECT NAME='id_ul2' size='1'>");

$link= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
$result=mysql_query("select * from uldescargastem");
while ($row=mysql_fetch_array($result))
{
$smarty->append(array('descargas2' => '<OPTION value="'.$row["id_ul2"].'" name="'.$row["id_ul2"].'">'.$row["tem_ul2"].'</option>'));
}
mysql_free_result($result);


$smarty->assign('descargas3', "</SELECT> <a href='modulos.php?modulo=descargas&operacion=categoria'>-></a></td></tr>
</table>

<table border=0 width=99%>
<tr>
<td class='sinborde'>

<table border=0 width=99%>
<tr>
<td><b>T&iacute;tulo:</b></td>
<td><input type=text name=titulo value='".$row["titulo"]."' size=40></td>
</tr>

<tr>
<td><b>Autor:</b></td> <td><input type=text size=40 name=autor value='".$row["autor"]."'></td>
</tr> 

<tr>
<td><b>P&aacute;gina Web:</b></td> 
<td><input type=text name=web value='".$row["web"]."' size=40></td>
</tr>

<tr>
<td><b>E-mail:</b> </td> <td><input type=text size=40 name=correo value='".$row["correo"]."'></td></tr>

<tr>
<td><b>Versi&oacute;n:</b></td> 
<td><input type=text name=version value='".$row["version"]."' size=40>
</td></tr>

<tr>
<td><b>Licencia:</b></td> 
<td><input type=text name=licencia value='".$row["licencia"]."' size=40></td>
</tr>

<tr>
<td><b>Tama&ntilde;o:</b></td> 
<td><input type=text name=tamano value='".$row["tamano"]."' size=40></td>
</tr>

<tr>
<td><b>Link Descarga:</b></td>
<td><input type=text name=descarga value='".$row["descarga"]."' size=40></td>
	</tr>
</table>

<table border='0'>
<tr>
<td><b>Descripci&oacute;n:</b></td>
</tr>
<tr>
<td><textarea rows=20 cols=88 name=descripcion wrap=phisical>".$row["descripcion"]."</textarea><td>
</tr>
</table>
</td>
	
</tr></table><BR><BR>
<center><input type=submit value=Ingresar name=nuevo2>
</form></td></tr></table>");

$smarty->display('descargas/index.tpl');
}
/* Ingresar descargas */


/* Ingresar descargas 2 */
if($operacion=="nuevo2"){
$id_ul2 = $_POST['id_ul2'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$web = $_POST['web'];
$correo = $_POST['correo'];
$version = $_POST['version'];
$licencia = $_POST['licencia'];
$tamano = $_POST['tamano'];
$descarga = $_POST['descarga'];
$descripcion = $_POST['descripcion'];

$result=mysql_query("INSERT into uldescargas (titulo,descripcion,tamano,autor,correo,descarga,fecha,version,licencia,web,iden_ul) values('$titulo','$descripcion','$tamano','$autor','$correo','$descarga',now(),'$version','$licencia','$web','$id_ul2')");

$result2 = mysql_query("UPDATE uldescargastem SET con_ul2=con_ul2+1 WHERE id_ul2='$id_ul2'");

$smarty->assign('descargas1', "<BR><BR><CENTER>El evento: <B>".$titulo."</B> fue ingresado satisfactoriamente.<br><br><a href='modulos.php?modulo=descargas&operacion=lectura'><- Regresar </a></CENTER><BR><BR><BR>");

$smarty->display('descargas/index.tpl');
}
/* Ingresar descargas 2 */

/* Borrar descargas */
if($operacion=="eliminar"){
$titulo = $_GET['titulo'];
$id_ul = $_GET['id_ul'];

$smarty->assign('descargas1', "<BR><BR><center>Estas seguro de eliminar la descarga: <B>".$titulo."</B>?<BR><br>
<a href='modulos.php?modulo=descargas&operacion=borrar2&titulo=".$titulo."&id_ul=".$id_ul."'>[ Si ]</a> <a href='modulos.php?modulo=descargas&operacion=lectura'>[ No ]</a></center><BR><BR>");
$smarty->display('descargas/index.tpl');
}
/* Borrar descargas */

/* Borrar descargas 2 */
if($operacion=="borrar2"){
$titulo = $_GET['titulo'];
$id_ul = $_GET['id_ul'];
mysql_query("Delete From uldescargas Where id_ul='$id_ul'");
$smarty->assign('descargas1', "<BR><BR><center>La descarga: <B>$titulo</B> fue eliminada satisfactoriamente.<BR><BR><a href='modulos.php?modulo=descargas&operacion=lectura'><- Regresar </a></center><BR><BR>");

	$smarty->display('descargas/index.tpl');
}
/* Borrar descargas 2 */


}
/* Fin Módulos descargas (Administración) */



?>
