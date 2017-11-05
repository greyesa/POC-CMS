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

/* Inicia Módulos eventos (Administración) */

function eventos($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$base,$con,$nhost,$npass){

$smarty->assign('timodulo', "<img src=../imagenes/admin/eventos.gif align=middle border=0 title=Eventos> M&oacute;dulo: Eventos");

$smarty->assign('timodulo2', "[<a href='modulos.php?modulo=eventos&operacion=lectura'>Indice Eventos</a>] [<a href='modulos.php?modulo=eventos&operacion=nuevo'>Ingresar Nuevo Evento</a>]");

/* Indice Eventos */
if($operacion=="lectura"){

$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=25; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * from eventos ORDER BY fecha desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from eventos order by fecha desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

$smarty->assign('eventos1', "<TABLE BORDER=0 WIDTH=99%>
<TR>
<TD class='noticia1'><CENTER><font color=#000000><b>Evento</b></font></CENTER></TD>
<TD class='noticia1'><CENTER><font color=#000000><b>Usuario</b></font></CENTER></TD>
<TD class='noticia1'><CENTER><font color=#000000><b>Modificado</b></font></CENTER></TD>
<TD class='noticia1'><CENTER><font color=#000000><b>Acci&oacute;n</b></font></CENTER></TD>
</TR>");
while ($row=mysql_fetch_array($cad))
{
$smarty->append(array("eventos2" => "<TR>
<TD class='noticia2'><a href='modulos.php?modulo=eventos&operacion=editar&ID_eventos=".$row["ID_eventos"]."'>".$row["titulo"]."</a></TD>
	<TD class='noticia2'><CENTER>".$row["nombre"]."</CENTER></TD>
<TD class='noticia2'><CENTER>".$row["fecha"]."</CENTER></em></TD>
	<TD class='noticia2'><CENTER><a href='modulos.php?modulo=eventos&operacion=editar&ID_eventos=".$row["ID_eventos"]."'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> <a href='modulos.php?modulo=eventos&operacion=eliminar&ID_eventos=".$row["ID_eventos"]."&titulo=".$row["titulo"]."'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></CENTER></TD>
</TR>"));
}
mysql_free_result($cad);
$smarty->assign('eventos3', "</TABLE>");

// Creando los enlaces de paginación
$smarty->assign('eventos4', "<center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('eventos5', "<a href='modulos.php?modulo=eventos&operacion=lectura&pg=".$url."'>« Anterior</a> ");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("eventos6" => "<font color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("eventos7" => "<a href='modulos.php?modulo=eventos&operacion=lectura&pg=".$i."'>".$i."</a> "));
}
}
if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('eventos8', "<a href='modulos.php?modulo=eventos&operacion=lectura&pg=".$url."'>Siguiente »</a>");
}
else {
echo " ";
}
$smarty->assign('eventos9', "</p></center>");
$smarty->display('eventos/index.tpl');
}
/* Indice Eventos */


/* Editar Eventos */

if($operacion=="editar"){
$ID_eventos = $_GET['ID_eventos'];
$result=mysql_query("select * from eventos WHERE ID_eventos='$ID_eventos'");
while ($row=mysql_fetch_array($result))
{
$smarty->assign('eventos1', "<form action='modulos.php?modulo=eventos&operacion=editar2' method='post'>
<input type=hidden name=ID_eventos value=".$row["ID_eventos"].">

<center><table border='0' width='80%'>
<tr><td>
<table border='0'>
<tr><td><a href=javascript:history.back()><- Regresar</a><br><br></td></tr>
<tr>
<td class=caja><font color='#000000'><B>Datos:</B></font> <B>ID del Sistema</B>: ".$row["ID_eventos"]." <B>Modificado:</B> ".$row["fecha"]."
</td>
</tr>
</table><br>

<table border=0 width=80%>
<tr>
<td class='sinborde'>

<table border=0 width=80%>
<tr>
<td><b>T&iacute;tulo:</b></td>
<td><input type=text name=titulo value='".$row["titulo"]."' size=40></td>
</tr>

<tr>
<td><b>Nombre:</b></td> <td><input type=text size=40 name=nombre value='".$row["nombre"]."'></td>
</tr> 

<tr>
<td><b>E-mail:</b> </td> <td><input type=text size=40 name=correo value='".$row["correo"]."'></td></tr>

<tr>
<td><b>Fecha:</b></td> 
<td><input type=text name=fecha_evento id='fecha_evento' value='".$row["fecha_evento"]."' size=40 readonly='1' />
	<img src=../include/calendar/img.gif id=trigger
     style='cursor: pointer; border: 1px solid red;'
     title='Selector de fecha'
     onmouseover=this.style.background='red';
     onmouseout=this.style.background='' />
		 
 <script type=text/javascript>
  Calendar.setup(
    {
      inputField  : 'fecha_evento',         // ID of the input field
      align          :    'Tl',
      singleClick    :    false,
      ifFormat    : '%d/%m/%Y',    // the date format
      button      : 'trigger'       // ID of the button
    }
  );
</script>
</td></tr>

<tr>
<td><b>Lugar:</b></td> 
<td><input type=text name=lugar value='".$row["lugar"]."' size=40></td>
</tr>

<tr>
<td><b>Pais:</b></td>
<td><input type=text name=pais value='".$row["pais"]."' size=40></td>
	</tr>
</table>

<table border='0' width='80%'>
<tr>
<td><b>Temas: [ <a href=javascript:imagenNoticia('../include/w2box/index.php?modo=cerrarnoti')>Agregar Imagen</a> ]</b></td>
</tr>
<tr>
<td><textarea rows='20' cols='88' name='texto' wrap='phisical'>".$row["temas"]."</textarea><td>
</tr>
</table>
</td>
	
</tr></table><BR><BR>
<center><input type=submit value=Editar name=editar2>
</form></td></tr></table>");
}
mysql_free_result($result);
$smarty->display('eventos/index.tpl');
}
/* Editar Eventos */

/* Editar Eventos */
if($operacion=="editar2"){
$titulo = $_POST['titulo'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$ID_eventos = $_POST['ID_eventos'];
$fecha_evento = $_POST['fecha_evento'];
$lugar = $_POST['lugar'];
$pais = $_POST['pais'];
$texto = $_POST['texto'];

mysql_query("Update eventos Set titulo='$titulo',temas='$texto',nombre='$nombre',fecha_evento='$fecha_evento',lugar='$lugar',correo='$correo',pais='$pais' WHERE ID_eventos='$ID_eventos'");

$smarty->assign('eventos1', "<BR><BR><CENTER>El evento: <B>".$titulo."</B> fue editado satisfactoriamente.<br><br><a href='modulos.php?modulo=eventos&operacion=lectura'><- Regresar </a></CENTER><BR><BR><BR>");
$smarty->display('eventos/index.tpl');
}
/* Editar Eventos */

/* Ingresar Eventos */
if($operacion=="nuevo"){
	$smarty->assign('eventos1', "<form action='modulos.php?modulo=eventos&operacion=nuevo2' method='post'>
<center><table border='0' width=80%>
<tr>
<td>
<table border=0 width=80%>
<tr><td><a href=javascript:history.back()><- Regresar</a><br><br></td><td></td></tr>
<tr>
<td><b>T&iacute;tulo:</b></td>
<td><input type=text name=titulo value='' size=40></td>
</tr>

<tr>
<td><b>Nombre:</b></td> <td><input type=text size=40 name=nombre value=''></td>
</tr> 

<tr>
<td><b>E-mail:</b> </td> <td><input type=text size=40 name=correo value=''></td></tr>

<tr>
<td><b>Fecha:</b></td> 
<td><input type=text id=fecha_evento name=fecha_evento value='' size=40 readonly='1' />
	<img src=../include/calendar/img.gif id=trigger
     style='cursor: pointer; border: 1px solid red;'
     title='Selector de fecha'
     onmouseover=this.style.background='red';
     onmouseout=this.style.background='' />
		 
 <script type=text/javascript>
  Calendar.setup(
    {
      inputField  : 'fecha_evento',         // ID of the input field
      align          :    'Tl',
      singleClick    :    false,
      ifFormat    : '%d/%m/%Y',    // the date format
      button      : 'trigger'       // ID of the button
    }
  );
</script>

</td></tr>

<tr>
<td><b>Lugar:</b></td> 
<td><input type=text name=lugar value='' size=40></td>
</tr>

<tr>
<td><b>Pais:</b></td>
<td><input type=text name=pais value='' size=40></td>
	</tr>
</table><br>

<table border='0'>
<tr>
<td><b>Temas: [ <a href=javascript:imagenNoticia('../include/w2box/index.php?modo=cerrarnoti')>Agregar Imagen</a> ]</b></td>
</tr>

<tr>
<td><textarea rows='20' cols='85' name='texto' wrap='phisical'></textarea><td>
</tr>
</table></center><BR><BR>
<center><input type=submit  value=Ingresar name=nuevo2>
</form></td></tr></table></center>");

$smarty->display('eventos/index.tpl');
}
/* Ingresar Eventos */


/* Ingresar Eventos 2 */
if($operacion=="nuevo2"){
$titulo = $_POST['titulo'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$fecha_evento = $_POST['fecha_evento'];
$lugar = $_POST['lugar'];
$pais = $_POST['pais'];
$texto = $_POST['texto'];

$result=mysql_query("INSERT into eventos (titulo,lugar,pais,temas,nombre,correo,fecha_evento,fecha) values('$titulo','$lugar','$pais','$texto','$nombre','$correo','$fecha_evento',now() )");

$smarty->assign('eventos1', "<BR><BR><CENTER>El evento: <B>".$titulo."</B> fue ingresado satisfactoriamente.<br><br><a href='modulos.php?modulo=eventos&operacion=lectura'><- Regresar </a></CENTER><BR><BR><BR>");

$smarty->display('eventos/index.tpl');
}
/* Ingresar Eventos 2 */

/* Borrar Eventos */
if($operacion=="eliminar"){
$titulo = $_GET['titulo'];
$ID_eventos = $_GET['ID_eventos'];

$smarty->assign('eventos1', "<BR><BR><center>Estas seguro de eliminar el evento: <B>".$titulo."</B>?<BR><br>
<a href='modulos.php?modulo=eventos&operacion=borrar2&titulo=".$titulo."&ID_eventos=".$ID_eventos."'>[ Si ]</a> <a href='modulos.php?modulo=eventos&operacion=lectura'>[ No ]</a></center><BR><BR>");
$smarty->display('eventos/index.tpl');
}
/* Borrar Eventos */

/* Borrar Eventos 2 */
if($operacion=="borrar2"){
$titulo = $_GET['titulo'];
$ID_eventos = $_GET['ID_eventos'];
mysql_query("Delete From eventos Where ID_eventos='$ID_eventos'");
$smarty->assign('eventos1', "<BR><BR><center>El evento: <B>$titulo</B> fue eliminado satisfactoriamente.<BR><BR><a href='modulos.php?modulo=eventos&operacion=lectura'><- Regresar </a></center><BR><BR>");

	$smarty->display('eventos/index.tpl');
}
/* Borrar Eventos 2 */


}
/* Fin Módulos eventos (Administración) */



?>
