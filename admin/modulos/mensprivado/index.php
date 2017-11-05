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
/* Inicia Módulos Informacion (AdministraciÃ³n) */

function mensprivado($modulo,$operacion,$smarty,$tipos){
	$smarty->assign('timodulo', "<img src=../imagenes/admin/mensajes.gif align=middle border=0 title=Mensajes Privados> M&oacute;dulo: Mensajes Privados");
	
	if($operacion=="lectura"){
$result=mysql_query("select * from registrosadmin where id_reg");
$r=mysql_num_rows($result);
$smarty->assign('mensprivado1', "<center>Total Mensajes: <b>$r</b><br></center><br><br>");

// Para reportar errores.

$result=mysql_query("select * from registrosadmin WHERE tipos='errores' and ver='0'");
$cad=mysql_query("select * from registrosadmin WHERE tipos='errores'");
$r=mysql_num_rows($result);
$r2=mysql_num_rows($cad);
while ($row=mysql_fetch_array($result))
{
if($array["ver"]=="1"){
$opcion="<font color='#000000'>Leido</font>";
}
elseif($array["ver"]==""){
$opcion="<font color='#000000'><b>".$r."</b></font>";
}
}

mysql_free_result($result);

$smarty->assign('mensprivado2', "<center><table border='0' width='70%'><tr><td><IMG SRC='../imagenes/admin/preferencias.gif' align='left' BORDER=0 ALT=''><a href=modulos.php?modulo=mensprivado&operacion=mensajes&tipos=errores> Reporte de Errores </a>[".$r2."]<br> Mensajes Nuevos: ( ".$opcion." )<BR><BR></td>");



// Para contactarnos.

$result2=mysql_query("select * from registrosadmin WHERE tipos='contactarnos' and ver='0'");
$cad=mysql_query("select * from registrosadmin WHERE tipos='contactarnos'");
$r=mysql_num_rows($result2);
$r2=mysql_num_rows($cad);
while ($row=mysql_fetch_array($result2))
{
if($array["ver"]=="1"){
$opcionn="<font color='#000000'>Leido</font>";
}
elseif($array["ver"]==""){
$opcionn="<font color='#000000'><b>".$r."</b></font>";
}
}
mysql_free_result($result2);

$smarty->assign('mensprivado3', "<td><IMG SRC='../imagenes/admin/usuarios.gif' align='left' BORDER=0 ALT=''><a href=modulos.php?modulo=mensprivado&operacion=mensajes&tipos=contactarnos> Mensajes de contacto </a>[".$r2."]<br> Mensajes Nuevos: ( ".$opcionn." )<BR><BR></td></tr>");


// Para colaborar.

$result3=mysql_query("select * from registrosadmin WHERE tipos='colaborar' and ver='0'");
$cad=mysql_query("select * from registrosadmin WHERE tipos='colaborar'");
$r=mysql_num_rows($result3);
$r2=mysql_num_rows($cad);
while ($row=mysql_fetch_array($result3))
{
if($array["ver"]=="1"){
$opcionnn="<font color='#000000'>Leido</font>";
}
elseif($array["ver"]==""){
$opcionnn="<font color='#000000'><b>".$r."</b></font>";
}
}
mysql_free_result($result3);
$smarty->assign('mensprivado4', "<tr><td><IMG SRC='../imagenes/admin/contribuir.gif' align='left' BORDER=0 ALT=''><a href=modulos.php?modulo=mensprivado&operacion=mensajes&tipos=colaborar> Mensajes para colaborar </a>[".$r2."]<br> Mensajes Nuevos: ( ".$opcionnn." )</td>");




// Para publicidad

$result4=mysql_query("select * from registrosadmin WHERE tipos='publicidad' and ver='0'");
$cad=mysql_query("select * from registrosadmin WHERE tipos='publicidad'");
$r=mysql_num_rows($result4);
$r2=mysql_num_rows($cad);
while ($row=mysql_fetch_array($result4))
{
if($array["ver"]=="1"){
$opcionnnn="<font color='#000000'>Leido</font>";
}
elseif($array["ver"]==""){
$opcionnnn="<font color='#000000'><b>".$r."</b></font>";
}
}
mysql_free_result($result4);
$smarty->assign('mensprivado5', "<td><IMG SRC='../imagenes/admin/web.gif' align='left' BORDER=0 ALT=''><a href=modulos.php?modulo=mensprivado&operacion=mensajes&tipos=publicidad> Mensajes de P&uacute;blicidad </a>[".$r2."]<br> Mensajes Nuevos: ( ".$opcionnnn." )</td></tr></table></center>");
$smarty->display('mensprivado/index.tpl');
}


/* Entrada de Mensajes */
if($operacion=="mensajes"){
	$smarty->assign('mensprivado1', "<CENTER><a href=modulos.php?modulo=mensprivado&operacion=lectura><b> <<- Regresar </b></a></CENTER><br><br>");

include '../config.inc.php';
$pg = $_GET['pg'];
$tipos = $_GET['tipos'];

$smarty->assign('mensprivado2', "<font color=#000000><b><center>Lectura de mensajes: ".$tipos."</center></b></font><br><br>");

$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=45; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * FROM registrosadmin where tipos='$tipos' ORDER BY fecha desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from registrosadmin where tipos='$tipos' order by fecha desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

$smarty->assign('mensprivado3', "<center><TABLE width=85% border=0><TR>
<TD class=noticia1><center><b>Caracter</b></center></TD>
<TD class=noticia1><center><b>Enviado por</b></center></TD>
<TD class=noticia1><center><b>Fecha</b></center></TD>
<TD class=noticia1><center><b>Opci&oacute;n</b></center></TD>
</TR>");

while ($array=mysql_fetch_array($cad))
{

if($array["ver"]=="1"){
$opcion="<font color='#000000'>Leido</font>";
}
elseif($array["ver"]=="0"){
$opcion="<font color='#000000'><b>Nuevo</b></font>";
}

$smarty->append(array('mensprivado44' => "<TR>
<TD class=noticia2><center>".$opcion."</center></TD>
<TD class=noticia2><center>".$array["nombreus"]."</center></TD>
<TD class=noticia2><center>".$array["fecha"]."</center></TD>
<TD class=noticia2><center><b><a href=modulos.php?modulo=mensprivado&operacion=verfull&id_reg=".$array["id_reg"]."&tipos=".$tipos."><< Abrir mensaje</a></center></TD>
</TR>"));
}
$con=mysql_close($con);
$smarty->assign('mensprivado5', "</TABLE></center>");


// Creando los enlaces de paginación
$smarty->assign('mensprivado6', "<center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('mensprivado7', "<a href=modulos.php?modulo=mensprivado&operacion=mensajes&tipos=".$tipos."&pg=".$url.">&laquo; Anterior</a>");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("mensprivado8" => "<font color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("mensprivado9" => "<a href=modulos.php?modulo=mensprivado&operacion=mensajes&tipos=".$tipos."&pg=".$i.">".$i."</a> "));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('mensprivado10', "<a href=modulos.php?modulo=mensprivado&operacion=mensajes&tipos=".$tipos."&pg=".$url.">Siguiente &raquo;</a>");
}
else {
echo " ";
}
$smarty->assign('mensprivado11', "</p></center>");


$smarty->display('mensprivado/index.tpl');
}


/* Verfull mensaje */
if($operacion=="verfull"){
$smarty->assign('mensprivado1', "<CENTER><a href=javascript:history.back()><b> <<- Regresar </b></a></CENTER><BR>");
$id_reg = $_GET['id_reg'];
include '../config.inc.php';
$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);
$pegar = "SELECT * FROM registrosadmin where id_reg='$id_reg'";
$result=mysql_query("UPDATE registrosadmin SET ver=1 WHERE id_reg='$id_reg'",$con);
$cad = mysql_db_query($base,$pegar) or die (mysql_error());
$smarty->assign('mensprivado2', "<font color=#000000><b><center>Lectura de mensajes: ".$tipos."</center></b></font><br><br>");
while ($array=mysql_fetch_array($cad))
{
$array2=nl2br($array["errorus"]);
$smarty->assign('mensprivado3', "<center><TABLE BORDER=0 WIDTH=90%><TR>
<TD class=noticia2><b>Enviado por:</b> ".$array["nombreus"]."<br><b>Correo electr&oacute;nico:</b> <a href=mailto:".$array["correous"].">".$array["correous"]." </a><br> <b>Nacionalidad:</b> ".$array["paisus"]."<br><b>Web:</b> <a href=".$array["webus"]." target=_blank>".$array["webus"]."</a><br><b>Fecha de ingreso:</b> ".$array["fecha"]."<br><br>

<b>Mensaje:</b><br> ".$array2."</DIV></TD>
</TR>
</TABLE><br><br>
<center><a href='modulos.php?modulo=mensprivado&operacion=respondermen&correo=".$array["correous"]."&nombreus=".$array["nombreus"]."&mensaje=".$array2."'>[ Responder a este mensaje ]</a></center>");
}
$con=mysql_close($con);
$smarty->display('mensprivado/index.tpl');
}

/* Enviar Mensaje */
if($operacion=="respondermen"){
$correo = $_GET['correo'];
$nombreus = $_GET['nombreus'];
$mensaje = $_GET['mensaje'];

$smarty->assign('mensprivado1', "<CENTER><a href=javascript:history.back()><b> <<- Regresar </b></a></CENTER><BR><br>");

$smarty->assign('mensprivado2', "<center><FORM action=modulos.php?modulo=mensprivado&operacion=enviar method=post>
<INPUT type=hidden name=correous value=".$correo.">
<INPUT type=hidden name=nombreus value=".$nombreus.">
<table border=0>
<tr>
<td><b>Respuesta:</b></td>
<td>".$nombreus."</td>
</tr>
<tr>
<td><b>Encabezado:</b></td>
<td><INPUT type=text name=encabezadous size=47 value=Respuesta:></td>
</tr>
<tr>
<td valign=top><b>Texto:</b></td>
<td><TEXTAREA NAME=comentarious ROWS=20 COLS=60>---------".$nombreus." escribio:------<br>".$mensaje."</TEXTAREA></td>
</tr>
</table>

<br><INPUT type='submit' value='Enviar'>
</FORM></center>");

$smarty->display('mensprivado/index.tpl');
}

/* Enviando mensaje */
if($operacion=="enviar"){
$correous = $_POST['correous'];
$nombreus = $_POST['nombreus'];
$encabezadous = $_POST['encabezadous'];
$comentarious = $_POST['comentarious'];

$result=mysql_query("select * from correo");
while ($row=mysql_fetch_array($result))
{
$nde = $row["departe_de"];
$nfirma = $row["firma"];
$headers= "Content-Type: text/html; charset=windows-1254\n";
$headers.= "X-Priority: 1\r\n";
}
mysql_free_result($result);

if($correous==$correous) {
mail("$correous","$encabezadous","Amigo: $nombreus:\n\n $comentarious\n\n $nfirma","FROM:$nde\n","$headers");

$smarty->assign('mensprivado1', "<center>Se ha enviado satisfactoriamente un correo a: <b>$correous</b>.<br>
<a href='modulos.php?modulo=mensprivado&operacion=lectura'> [ Regresar] </a></center>");

}
else {

$smarty->assign('mensprivado2', "No se pudo enviar el correo, posiblemente por que esta web no tiene este servicio, o hay algún error interno por favor contacta al administrador del sitio.");

}
$smarty->display('mensprivado/index.tpl');
}

}

/* Fin Módulos Informacion (Administración) */



?>
