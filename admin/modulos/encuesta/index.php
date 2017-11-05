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

/* Inicia Módulos Encuestas (Administración) */

function encuesta($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$nhost,$npass){
$smarty->assign('timodulo', "<img src='../imagenes/admin/encuestas.gif' align='middle' border='0' title='Encuestas'> M&oacute;dulo: Encuestas");

$smarty->assign('enc1', "[ <a href='modulos.php?modulo=encuesta&operacion=menu'>Indice Encuestas</a> ] [ <a href='modulos.php?modulo=encuesta&operacion=nuevo'>Ingresar nueva Encuesta o Trivia </a> ] [<a href='modulos.php?modulo=encuesta&operacion=categoria'>Categorias de Trivias</a>] [<a href='modulos.php?modulo=encuesta&operacion=estadisticas'>Estad&iacute;sticas</a>]<br><br>");


/* Estadisticas */
if($operacion=="estadisticas"){

/* Total General */
$result0 = mysql_query("select id_vot from votacion_tema where vot_activar='1'");
$r0= mysql_num_rows($result0);
$result1 = mysql_query("select ID_vot_preg from votacion_preg");
$r1= mysql_num_rows($result1);
/* Total General */

/* Total trivias */
$result2 = mysql_query("select id_vot from votacion_tema where tipo='trivia' and vot_activar='1'");
$r2= mysql_num_rows($result2);
/* Total trivias */

/* Total encuesta */
$result3 = mysql_query("select id_vot from votacion_tema where tipo='encuesta' and vot_activar='1'");
$r3= mysql_num_rows($result3);
/* Total encuesta */

/* Suma de votos totales */
$r4 = mysql_result(mysql_query("select SUM(vot_cont) from votacion_tema where vot_activar='1'"),0);
/* Suma de votos totales */

/* Suma de votos totales trivias */
$r5 = mysql_result(mysql_query("select SUM(vot_cont) from votacion_tema where vot_activar='1' and tipo='trivia'"),0);
/* Suma de votos totales trivias */

/* Suma de votos totales encuestas */
$r6 = mysql_result(mysql_query("select SUM(vot_cont) from votacion_tema where vot_activar='1' and tipo='encuesta'"),0);
/* Suma de votos totales encuestas */

/* Usuarios más activos */
$r7 = mysql_result(mysql_query("select @vot:=COUNT(votacion_ips) from votacion_ips group by us_vot"),0);
$r8 = mysql_result(mysql_query("select max(@vot) from votacion_ips"),0);


//echo "".$r7."<br>";
//echo "".$r8."<br><br>";


/* Usuarios más activos */




$smarty->assign('contenido0', "<center><i>Total Encuestas Globales:</i> <b>".$r0."</b><br><i>Total preguntas Globales:</i> <b>".$r1."</b><br><i>Total Votos Globales:</i> <b>".$r4."</b><br><br><table width='80%'>
<tr>
<td class='noticia1'>Encuestas</td>
<td class='noticia1'>Trivias</td>
</tr>
<tr>
<td><i>Total Encuestas:</i> <b>".$r3."</b><br><i>Total Votos:</i> <b>".$r6."</b></td>
<td><i>Total Trivias:</i> <b>".$r2."</b><br><i>Total Votos:</i> <b>".$r5."</b></td>
</tr>
</table></center><br><br>");
}
/* Estadisticas */


/* Borrar Categoria 2 */
if($operacion=="borrarcategoria2"){
$not_ti = $_GET['not_ti'];
$id_cat_triv = $_GET['id_cat_triv'];
$result=mysql_query("Delete From votacion_categoria_triv WHERE id_cat_triv='$id_cat_triv'");
$smarty->assign('contenido0', "<br><br><b>Informe:</b> Fue eliminada satisfactoriamente la categoria: <b>( $not_ti )</b><br><BR><center><a href='modulos.php?modulo=encuesta&operacion=categoria'><-- Regresar</a></center><BR><BR>");
}
/* Borrar Categoria 2 */


/* Borrar Categoria 1 */
if($operacion=="borrarcategoria"){
$not_ti = $_GET['not_ti'];
$id_cat_triv = $_GET['id_cat_triv'];
$smarty->assign('contenido0', "<br><br><center>Estas seguro de eliminar la categoria: <b>$not_ti</b>?</center><br>
<center><a href='modulos.php?modulo=encuesta&operacion=borrarcategoria2&id_cat_triv=".$id_cat_triv."&not_ti=".$not_ti."'>[ Si ]</a> <a href='modulos.php?modulo=encuesta&operacion=categoria'> [ No ]</a></center><BR><BR>");
}
/* Borrar Categoria 1 */


/* Editar Categoria */
if($operacion=="editarcategoria2"){
$not_ti = $_POST['not_ti'];
$id_cat_triv = $_POST['id_cat_triv'];
$result=mysql_query("Update votacion_categoria_triv set nom_cat_triv='$not_ti' WHERE id_cat_triv='$id_cat_triv'");
$smarty->assign('contenido0', "<BR><CENTER><BR><b>Informe:</b> Se edito satisfactoriamente la categoria: <b>( $not_ti )</b>.<br><BR><a href='modulos.php?modulo=encuesta&operacion=categoria'><-- Regresar</a></CENTER><BR><BR>");
}
/* Editar Categoria */


/* Editar Categoria */
if($operacion=="editarcategoria"){
$id_cat_triv = $_GET['id_cat_triv'];
$result2=mysql_query("select * from votacion_categoria_triv WHERE id_cat_triv='$id_cat_triv'");
while ($row=mysql_fetch_array($result2))
{
$smarty->assign('contenido0', "<BR><BR><form action='modulos.php?modulo=encuesta&operacion=editarcategoria2' method='post'>
<a href=javascript:history.back()><<- Regresar</a> <center><b>Editando categoria:</b> <br><input type=text name=not_ti value='".$row["nom_cat_triv"]."' size='40'><BR><br></center>
<INPUT TYPE=hidden name=id_cat_triv value='".$row["id_cat_triv"]."'>
<center><input type=submit name=editarcategoria2 value=Editar></center>
</form>");
}
mysql_free_result($result2);
}
/* Editar Categoria */

/* Ingresar categoria */
if($operacion=="categoria2"){
	$not_ti = $_POST['not_ti'];
	$result=mysql_query("INSERT into votacion_categoria_triv (nom_cat_triv,fecha_cat_triv) values('$not_ti',now())");
$smarty->assign('contenido0', "<BR><BR><center><b>Informe:</b> Se ingreso satisfactoriamente la categoria:<b>( $not_ti ).</b></center><br><BR><center><a href='modulos.php?modulo=encuesta&operacion=categoria'><-- Regresar </a></center><BR><BR>");

}
/* Ingresar categoria*/

/* Menu Categoria */
if($operacion=="categoria"){
include '../config.inc.php';
$smarty->assign('contenido0', "<BR><BR><center><form action=modulos.php?modulo=encuesta&operacion=categoria2 method=post>
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

$pegar = "SELECT * from votacion_categoria_triv ORDER BY fecha_cat_triv desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from votacion_categoria_triv order by fecha_cat_triv desc"; 
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
<td class=noticia2><a href='modulos.php?modulo=encuesta&operacion=editarcategoria&id_cat_triv=".$row["id_cat_triv"]."'>".$row["nom_cat_triv"]."</a></td>
<td class=noticia2><CENTER>".$row["fecha_cat_triv"]."</CENTER></td>
<td class=noticia2><CENTER><a href='modulos.php?modulo=encuesta&operacion=editarcategoria&id_cat_triv=".$row["id_cat_triv"]."'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> <a href='modulos.php?modulo=encuesta&operacion=borrarcategoria&id_cat_triv=".$row["id_cat_triv"]."&not_ti=".$row["nom_cat_triv"]."'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></CENTER></td>
</tr>"));
}
mysql_free_result($cad);
$smarty->assign('contenido3', "</table><BR>");

// Creando los enlaces de paginación
$smarty->assign('contenido4', "<center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('contenido5', "<a href='modulos.php?modulo=encuesta&operacion=categoria&pg=".$url."'>« Anterior</a> ");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("contenido6" => "<font color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("contenido7" => "<a href='modulos.php?modulo=encuesta&operacion=categoria&pg=".$i."'>".$i."</a> "));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('contenido8', "<a href='modulos.php?modulo=encuesta&operacion=categoria&pg=".$url."'>Siguiente »</a>");
}
else {
echo " ";
}
$smarty->assign('contenido9', "</p></center>");

}
/* Menu Categoria */




if($operacion=="menu"){
$pg = $_GET['pg'];

$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=22; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * from votacion_tema where vot_activar='1' ORDER BY vot_fecha desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from votacion_tema where vot_activar='1' order by vot_fecha desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

$smarty->assign('enc2', "<center>
<table width='100%' border='0'>
<tr> 
<td class=noticia1 ><div align='center'>
<strong>Tema</strong></div></td>
<td class=noticia1><div align='center'><strong>Votos</strong></div></td>
<td class=noticia1><div align='center'><strong>Modificado</strong></div></td>
<td class=noticia1><div align='center'><strong>Publicaci&oacute;n</strong></div></td>
<td class=noticia1><div align='center'><strong>Fin Publicaci&oacute;n</strong></div></td>
<td class=noticia1><div align='center'><strong>Tipo</strong></div></td>
<td class=noticia1><div align='center'><strong>Acci&oacute;n</strong></div></td>
</tr><tr>");

while ($row=mysql_fetch_array($cad))
{
$smarty->append(array("enc3" => "
<td class=noticia2><a href='modulos.php?modulo=encuesta&operacion=editar&id_vot=".$row["id_vot"]."&tipo=".$row["tipo"]."'>".$row["vot_tema"]."</a></td>
<td class=noticia2><CENTER>".$row["vot_cont"]."</CENTER></td>
<td class=noticia2><CENTER>".$row["vot_fecha"]."</CENTER></td>
<td class=noticia2><CENTER>".$row["vot_pub"]."</CENTER></td>
<td class=noticia2><CENTER>".$row["vot_fin_pub"]."</CENTER></td>
<td class=noticia2><CENTER>".$row["tipo"]."</CENTER></td>
<td class=noticia2><CENTER><a href='modulos.php?modulo=encuesta&operacion=editar&id_vot=".$row["id_vot"]."&tipo=".$row["tipo"]."'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> <a href='modulos.php?modulo=encuesta&operacion=borrar&id_vot=".$row["id_vot"]."&vot_tema=".$row["vot_tema"]."&tipo=".$row["tipo"]."'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></CENTER></td>
</tr>"));
}
mysql_free_result($cad);
$smarty->assign('enc4', "</table>");

// Creando los enlaces de paginación
$smarty->assign('enc5', "<center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('enc6', "<a href='modulos.php?modulo=encuesta&operacion=menu&pg=".$url."'>« Anterior</a> ");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("enc7" => "<font color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("enc8" => "<a href='modulos.php?modulo=encuesta&operacion=menu&pg=".$i."'>".$i."</a> "));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('enc9', "<a href='modulos.php?modulo=encuesta&operacion=menu&pg=".$url."'>Siguiente »</a>");
}
else {
echo " ";
}
$smarty->assign('enc19', "</p></center>");
}

/* Ingresar Encuesta */ 
if($operacion=="nuevo"){

$result=mysql_query("select * from votacion_tema ORDER BY id_vot DESC LIMIT 1");
while ($row=mysql_fetch_array($result))
{
$id_vot = $row["id_vot"]+1;
}
mysql_free_result($result);

$smarty->assign('enc2', "<BR><BR><CENTER><form action='modulos.php?modulo=encuesta&operacion=ingresar' method='post'><input type='hidden' name='id_vot' value='$id_vot'><TABLE BORDER='0'>
<TR>
	<TD><B>Tema de la Encuesta o Trivia</B><BR><font size='1'>Ejemplo: &iquest;Que sistema operativo utilizas?</font></TD>
	<TD><input type='text' name='vot_tema'></TD>
</TR>
<TR>
	<TD><B>Tipo:</B><BR><font size='1'></font></TD>
	<TD><select name='tipo' size='0'><option selected value='encuesta'>Encuesta</option><option value='trivia'>Trivia</option></select></TD>
</TR>

<TR>
	<TD><B>N&uacute;mero de Opciones:</B><BR><font size='1'>Es la cantidad exacta de opciones<BR> que necesitar&aacute;s. Ejemplo: 3</font></TD>
	<TD><input type='text' name='campos'></TD>
</TR>
</TABLE><BR><BR><input type='submit' name='ingresar' value='Agregar'></form></CENTER><BR><BR>");
}


/* Visualizar campos para preguntas para procesarlas */
if($operacion=="ingresar"){
	
	$id_vot=$_POST['id_vot'];
	$vot_tema=$_POST['vot_tema'];
	$campos=$_POST['campos'];
 	$tipo=$_POST['tipo'];
 	
	if($id_vot=$id_vot){
		$id_vot_hidden = "<INPUT TYPE='hidden' name='id_vot' value='$id_vot'>";
	}
	else{
		$id_vot_hidden = "<INPUT TYPE='hidden' name='id_vot' value='1'>";
	}
	
	if($campos=$campos){
	
$smarty->assign('enc2', "<BR><BR><CENTER><form action='modulos.php?modulo=encuesta&operacion=insertar' method='post'>".$id_vot_hidden."<TABLE BORDER='0'>
<TR>
	<TD><a href=javascript:history.back()><<- Regresar</a><BR><BR><B>Tema de la Encuesta o Trivia:</B><BR><font size='1'>Ejemplo: &iquest;Que sistema operativo utilizas?</font></TD>
	<TD><BR><BR><input type='text' name='vot_tema' value='$vot_tema'></TD>
</TR><tr><td><b>Tipo:</b></td><td><b><i>$tipo</i></b><input type='hidden' name='tipo' value='$tipo'></td></tr><TR><TD><B>Fecha de publicaci&oacute;n:</B><BR><font size='1'>Fecha y hora que sera publicada la Encuesta.<BR> Ejemplo: 2005-12-20 16:18:51</font></TD><TD><INPUT TYPE='text' NAME='vot_pub' id='vot_pub'>
	<img src=../include/calendar/img.gif id=trigger
     style='cursor: pointer; border: 1px solid red;'
     title='Selector de fecha'
     onmouseover=this.style.background='red';
     onmouseout=this.style.background='' />
		 
 <script type=text/javascript>
  Calendar.setup(
    {
      inputField  : 'vot_pub',         // ID of the input field
      align          :    'Tl',
      singleClick    :    false,
      ifFormat    : '%Y-%m-%d %H:%M:%S',    // the date format %d/%m/%Y
      button      : 'trigger'       // ID of the button
    }
  );
</script></TD></TR><TR><TD><B>Fecha Fin de la publicaci&oacute;n:</B><BR><font size='1'>Fecha y hora que sera Finalizada la<BR> publicaci&oacute;n de la Encuesta.<BR> Ejemplo: 2005-12-20 16:18:51</font></TD><TD><INPUT TYPE='text' NAME='vot_fin_pub' id='vot_fin_pub'>
	<img src=../include/calendar/img.gif id=trigger
     style='cursor: pointer; border: 1px solid red;'
     title='Selector de fecha'
     onmouseover=this.style.background='red';
     onmouseout=this.style.background='' />
		 
 <script type=text/javascript>
  Calendar.setup(
    {
      inputField  : 'vot_fin_pub',         // ID of the input field
      align          :    'Tl',
      singleClick    :    false,
      ifFormat    : '%Y-%m-%d %H:%M:%S',    // the date format %d/%m/%Y
      button      : 'trigger'       // ID of the button
    }
  );
</script></TD></TR></TABLE><BR><BR>");

if($tipo=="encuesta"){
for($i=1; $i<$campos+1; $i++) {
	$smarty->append(array("enc3" => "<table border='0'><TR>
	<TD><B>Opci&oacute;n No $i:</B><BR><font size='1'>Ingresa la opci&oacute;n por favor.</font>&nbsp;&nbsp;&nbsp;&nbsp;</TD>
	<TD><input type='text' name='campos[]'></TD></tr></table>"));
}
}
elseif($tipo=="trivia"){

$result=mysql_query("select * from votacion_categoria_triv ORDER BY id_cat_triv DESC");
$smarty->assign('enc32', "<table border='0' width='50%'><TR>
<TD><B>Categoria de esta trivia:</B><BR><font size='1'>Ubiquela en una categoria.</font>&nbsp;&nbsp;&nbsp;&nbsp;</TD>
<TD><select name='id_cat_triv' size='0'>");
while ($row=mysql_fetch_array($result))
{
$smarty->append(array("enc33" => "<option value='".$row["id_cat_triv"]."'>".$row["nom_cat_triv"]."</option>"));
}
mysql_free_result($result);
$smarty->assign('enc34', "</select> <a href='modulos.php?modulo=encuesta&operacion=categoria'>-></a></TD></tr></table>");

for($i=1; $i<$campos+1; $i++) {
	$smarty->append(array("enc3" => "<table border='0' width='50%'><TR>
	<TD><B>Opci&oacute;n No $i:</B><BR><font size='1'>Ingresa la opci&oacute;n por favor.</font>&nbsp;&nbsp;&nbsp;&nbsp;</TD>
	<TD><input type='text' name='campos[]'></TD></tr></table>"));
}
}

$smarty->assign('enc4', "
<BR><BR><input type='submit' name='insertar' value='Agregar'></form></CENTER><BR><BR>");
}
else{
$smarty->assign('enc2', "No ingresaste n&uacute;mero de campos, es un dato necesario. <a href='javascript:history.back()'><<- Regresar</a><br><br>");
}


}


/* Insertar la encuesta y trivia*/
if($operacion=="insertar"){
	$id_vot=$_POST['id_vot'];
	$vot_tema=$_POST['vot_tema'];
	$campos=$_POST['campos'];
	$vot_pub=$_POST['vot_pub'];
	$vot_fin_pub=$_POST['vot_fin_pub'];
	$tipo=$_POST['tipo'];
	$id_cat_triv=$_POST['id_cat_triv'];
	
if($tipo=="encuesta"){
$result=mysql_query("INSERT into votacion_tema (iden_cat_triv,vot_tema,vot_cont,vot_fecha,vot_pub,vot_fin_pub,vot_activar,tipo) values ('0','$vot_tema','0', now(),'$vot_pub','$vot_fin_pub','1','$tipo')"); 
for($i=0; $i<count($campos); $i++) {
$result=mysql_query("INSERT into votacion_preg (vot_iden_preg,vot_pregunta,vot_punteo,vot_fecha_preg,tipo,correcta) values ('$id_vot','$campos[$i]','0', now(),'$tipo','0')");
}
$smarty->assign('enc2', "La Encuesta fue ingresada satisfactoriamente. Puede ver su Encuesta <a href='modulos.php?modulo=encuesta&operacion=menu'> pulsando aqui</a>.<br><br> ");
}
elseif($tipo=="trivia"){
$result=mysql_query("INSERT into votacion_tema (iden_cat_triv,vot_tema,vot_cont,vot_fecha,vot_pub,vot_fin_pub,vot_activar,tipo) values ('$id_cat_triv','$vot_tema','0', now(),'$vot_pub','$vot_fin_pub','1','$tipo')"); 
for($i=0; $i<count($campos); $i++) {
$result=mysql_query("INSERT into votacion_preg (vot_iden_preg,vot_pregunta,vot_punteo,vot_fecha_preg,tipo,correcta) values ('$id_vot','$campos[$i]','0', now(),'$tipo','0')");
}
$smarty->assign('enc2', "La Trivia fue ingresada satisfactoriamente. Asignele respuesta a su Trivia&nbsp;&nbsp; <a href='modulos.php?modulo=encuesta&operacion=resptrivia&vot_tema=".$vot_tema."'> pulsando aqui</a>.<br><br> ");
}
}

/* Ingresar respuesta correcta de trivia*/
if($operacion=="resptrivia"){
$vot_tema = $_GET["vot_tema"];
$result=mysql_query("select * from votacion_tema where tipo='trivia' ORDER BY id_vot desc LIMIT 1");
$smarty->assign('enc0', "<center><table border='0'><tr><td><i>Selecciona la respuesta de esta trivia.</i><br><br><form method='POST' action='modulos.php?modulo=encuesta&operacion=resptrivia2'>");
while ($row=mysql_fetch_array($result))
{
$id_vot = $row["id_vot"];
$smarty->assign('enc2', "<b>Tema de la Trivia: <i>".$vot_tema."</i></b><input type='hidden' name='vot_tema' value='".$vot_tema."'><br><br>");
}
mysql_free_result($result);

$result2=mysql_query("select * from votacion_preg where (vot_iden_preg='$id_vot') and (tipo='trivia') ORDER BY vot_iden_preg desc");
while ($row2=mysql_fetch_array($result2))
{
	$smarty->append(array("enc3" => "<table border='0' width='100%'><TR>
	<TD><B>Opci&oacute;n:</B></TD>
	<TD><input type='text' name='campos[]' value='".$row2["vot_pregunta"]."' READONLY></TD><td><input type='radio' name='correcta' value='".$row2["ID_vot_preg"]."'></td></tr></table>"));
}
mysql_free_result($result2);
$smarty->assign('enc4', "<br><br><div align='center'><input type='submit' name='resptrivia2' value='Aceptar'></div></form></td></tr></table></center><br><br>");
}


/* Ingresar respuesta correcta de trivia */ 
if($operacion=="resptrivia2"){
$correcta = $_POST["correcta"];
$vot_tema = $_POST["vot_tema"];

	if($correcta){
$result=mysql_query("Update votacion_preg set correcta='1' WHERE ID_vot_preg='$correcta'");
$smarty->assign('enc2', "Se ha finalizado el proceso de crear la trivia denominada <i>".$vot_tema."</i> <br> <a href='modulos.php?modulo=encuesta&operacion=menu'> pulsa aqui. </a>. <br><br>");
	}
	else{
	$smarty->assign('enc2', "No ingreso una respuesta valida para la trivia denominada <i>".$vot_tema."</i> <br> <a href='modulos.php?modulo=encuesta&operacion=resptrivia'> <-- Regresar. </a>. <br><br>");
	}

}



/* Editar encuesta */
if($operacion=="editar"){
	$id_vot = $_GET['id_vot'];
	$tipo = $_GET["tipo"];
	$result=mysql_query("select * from votacion_tema where id_vot='$id_vot'");
	while ($row=mysql_fetch_array($result))
	{
	$smarty->assign('enc2', "<BR><BR><CENTER><form action='modulos.php?modulo=encuesta&operacion=editar2' method='post'><INPUT TYPE='hidden' name='id_vot' value='".$id_vot."'><TABLE BORDER='0'>
<TR>
	<TD><a href=javascript:history.back()><<- Regresar</a><BR><BR><B>Tema de la Encuesta:</B><BR><font size='1'>Ejemplo: &iquest;Que sistema operativo utilizas?</font></TD>
	<TD><BR><BR><input type='text' name='vot_tema' value='".$row["vot_tema"]."'></TD>
</TR><tr><td><b>Tipo:</b></td><td><b><i>".$tipo."<input type='hidden' name='tipo' value='".$tipo."'></i></b></td></tr><TR><TD><B>Fecha de publicaci&oacute;n:</B><BR><font size='1'>Fecha y hora que sera publicada la Encuesta.<BR> Ejemplo: 2005-12-20 16:18:51</font></TD><TD><INPUT TYPE='text' NAME='vot_pub' value='".$row["vot_pub"]."' id='vot_pub'>
	<img src=../include/calendar/img.gif id=trigger
     style='cursor: pointer; border: 1px solid red;'
     title='Selector de fecha'
     onmouseover=this.style.background='red';
     onmouseout=this.style.background='' />
		 
 <script type=text/javascript>
  Calendar.setup(
    {
      inputField  : 'vot_pub',         // ID of the input field
      align          :    'Tl',
      singleClick    :    false,
      ifFormat    : '%Y-%m-%d %H:%M:%S',    // the date format %d/%m/%Y
      button      : 'trigger'       // ID of the button
    }
  );
</script></TD></TR><TR><TD><B>Fecha Fin de la publicaci&oacute;n:</B><BR><font size='1'>Fecha y hora que sera Finalizada la<BR> publicaci&oacute;n de la Encuesta.<BR> Ejemplo: 2005-12-20 16:18:51</font></TD><TD><INPUT TYPE='text' NAME='vot_fin_pub' value='".$row["vot_fin_pub"]."' id='vot_fin_pub'>
	<img src=../include/calendar/img.gif id=trigger
     style='cursor: pointer; border: 1px solid red;'
     title='Selector de fecha'
     onmouseover=this.style.background='red';
     onmouseout=this.style.background='' />
		 
 <script type=text/javascript>
  Calendar.setup(
    {
      inputField  : 'vot_fin_pub',         // ID of the input field
      align          :    'Tl',
      singleClick    :    false,
      ifFormat    : '%Y-%m-%d %H:%M:%S',    // the date format %d/%m/%Y
      button      : 'trigger'       // ID of the button
    }
  );
</script></TD></TR></TABLE><BR><BR>");
$iden_cat = $row["iden_cat_triv"];

	}
	mysql_free_result($result);
	
	if($tipo=="encuesta"){
	$result2=mysql_query("select * from votacion_preg where vot_iden_preg='$id_vot'");
	while ($row2=mysql_fetch_array($result2))
	{
	$smarty->append(array("enc3" => "<table border='0'><TR>
	<TD><B>Opci&oacute;nes:</B><BR><font size='1'>Ingresa la opci&oacute;n por favor.</font>&nbsp;&nbsp;&nbsp;&nbsp;</TD>
	<TD><input type='hidden' name='ID_vot_preg[]' value='".$row2["ID_vot_preg"]."'><input type='text' name='campos[]' value='".$row2["vot_pregunta"]."'></TD></tr></table>"));
	}
	mysql_free_result($result2);
	}
	elseif($tipo=="trivia"){
	
$result=mysql_query("select * from votacion_categoria_triv where id_cat_triv='$iden_cat'");
$smarty->assign('enc32', "<table border='0' width='50%'><TR>
<TD><B>Categoria de esta trivia:</B><BR><font size='1'>Ubiquela en una categoria.</font>&nbsp;&nbsp;&nbsp;&nbsp;</TD>
<TD><select name='id_cat_triv' size='0'>");
while ($row=mysql_fetch_array($result))
{
$smarty->append(array("enc30" => "<option value='".$row["id_cat_triv"]."' selected>".$row["nom_cat_triv"]."</option><option>----------------------</option>"));
}
mysql_free_result($result);

$result3=mysql_query("select * from votacion_categoria_triv");
while ($row3=mysql_fetch_array($result3))
{
$smarty->append(array("enc33" => "<option value='".$row3["id_cat_triv"]."'>".$row3["nom_cat_triv"]."</option>"));
}
mysql_free_result($result3);


$smarty->assign('enc34', "</select> <a href='modulos.php?modulo=encuesta&operacion=categoria'>-></a></TD></tr></table>");
	
	$result2=mysql_query("select * from votacion_preg where (vot_iden_preg='$id_vot')");
	while ($row2=mysql_fetch_array($result2))
	{
		if($row2["correcta"]=='1'){
		$correcta2 = "<input type='radio' name='correcta' value='".$row2["ID_vot_preg"]."' checked>";
		}
		elseif($row2["correcta"]=='0'){
		$correcta2 = "<input type='radio' name='correcta' value='".$row2["ID_vot_preg"]."'>";
		}
	$smarty->append(array("enc3" => "<table border='0'><TR>
	<TD><B>Opci&oacute;nes:</B><BR><font size='1'>Ingresa la opci&oacute;n por favor.</font>&nbsp;&nbsp;&nbsp;&nbsp;</TD>
	<TD><input type='text' name='campos[]' value='".$row2["vot_pregunta"]."'></TD><td>".$correcta2."</td></tr></table>"));
	}
	mysql_free_result($result2);
	}
	
	$smarty->assign('enc4', "
<BR><BR><input type='submit' name='editar2' value='Editar'></form></CENTER><BR><BR>");
}

/* Editar Encuesta */
if($operacion=="editar2"){
	$id_vot=$_POST['id_vot'];
	$ID_vot_preg=$_POST['ID_vot_preg'];
	$vot_tema=$_POST['vot_tema'];
	$campos=$_POST['campos'];
	$vot_pub=$_POST['vot_pub'];
	$vot_fin_pub=$_POST['vot_fin_pub'];
	$correcta=$_POST['correcta'];
	$tipo=$_POST['tipo'];
	$id_cat_triv=$_POST['id_cat_triv'];

if($tipo=="encuesta"){
$result=mysql_query("Update votacion_tema Set iden_cat_triv='0', vot_tema='$vot_tema', vot_cont=vot_cont, vot_fecha=now(), vot_pub='$vot_pub', vot_fin_pub='$vot_fin_pub', vot_activar='1', tipo='$tipo' where id_vot='$id_vot'"); 
for($i=0; $i<count($campos); $i++) {
$result=mysql_query("Update votacion_preg Set vot_iden_preg=vot_iden_preg, vot_pregunta='$campos[$i]', vot_punteo=vot_punteo, vot_fecha_preg=now(), tipo='$tipo', correcta='0' where vot_iden_preg='$id_vot' and ID_vot_preg='$ID_vot_preg[$i]'");
}
$smarty->assign('enc2', "La Encuesta fue editada satisfactoriamente. Puede ver su Encuesta <a href='modulos.php?modulo=encuesta&operacion=menu'> pulsando aqui</a>.<br><br> ");
}
elseif($tipo=="trivia"){
$result1=mysql_query("Update votacion_preg Set correcta='0' where vot_iden_preg='$id_vot'");
$result=mysql_query("Update votacion_tema Set iden_cat_triv='$id_cat_triv', vot_tema='$vot_tema', vot_cont=vot_cont, vot_fecha=now(), vot_pub='$vot_pub', vot_fin_pub='$vot_fin_pub', vot_activar='1', tipo='$tipo' where id_vot='$id_vot'"); 
for($i=0; $i<count($campos); $i++) {
$result2=mysql_query("Update votacion_preg Set vot_iden_preg=vot_iden_preg, vot_pregunta='$campos[$i]', vot_punteo=vot_punteo, vot_fecha_preg=now(), tipo='$tipo' where vot_iden_preg='$id_vot' and ID_vot_preg='$ID_vot_preg[$i]'");
}
$result3=mysql_query("Update votacion_preg Set correcta='1' where ID_vot_preg='$correcta'");
$smarty->assign('enc2', "La Trivia fue editada satisfactoriamente. Puede ver su Trivia&nbsp;&nbsp; <a href='modulos.php?modulo=encuesta&operacion=menu'> pulsando aqui</a>.<br><br> ");
}

}

/* Borrar Encuesta */
if($operacion=="borrar"){
$id_vot=$_GET['id_vot'];
$vot_tema=$_GET['vot_tema'];
$smarty->assign('enc2', "<a href=javascript:history.back()><- Regresar</a><div align='center'>Estas seguro de querer eliminar por completo la Encuesta denominada:<br> <i><b>".$vot_tema."</b></i> ? <br><br>[<a href='modulos.php?modulo=encuesta&operacion=borrar2&id_vot=".$id_vot."'>Si</a>] [<a href='modulos.php?modulo=encuesta&operacion=menu'>No</a>]</div><br><br> ");
}

/* Borrar Encuesta */
if($operacion=="borrar2"){
$id_vot=$_GET['id_vot'];
$vot_tema=$_GET['vot_tema'];
$result=mysql_query("Update votacion_tema Set vot_activar='0' WHERE id_vot='$id_vot'"); 
//$result=mysql_query("Delete From votacion_tema WHERE id_vot='$id_vot'");
$result=mysql_query("Delete From votacion_preg WHERE vot_iden_preg='$id_vot'");
$smarty->assign('enc2', "<div align='center'>Informe: La Encuesta denomidada <i><b>".$vot_tema."</b></i> fue eliminada satisfactoriamente.<br><a href='modulos.php?modulo=encuesta&operacion=menu'><- Regresar</a>  <br><br>");
}

$smarty->display('encuesta/index.tpl');
}
/* Fin Módulos Informacion (Administración) */



?>
