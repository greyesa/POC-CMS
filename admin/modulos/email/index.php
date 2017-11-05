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
/* Inicia Módulos e-mail (Administración) */

function email($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser){
	$smarty->assign('timodulo', "<img src=../imagenes/admin/email.gif align=middle border=0 title=E-mail> M&oacute;dulo: E-mail");

	$smarty->assign('timodulo1', "[ <a href='modulos.php?modulo=email&operacion=preferencias'>Preferencias</a> ] [<a href='modulos.php?modulo=email&operacion=editar'> Editar Mensaje de Suscripci&oacute;n</a> ] [<a href='modulos.php?modulo=email&operacion=enviar'>Enviar E-mail a todos los usuarios</a>]<br><BR> ");

/* Mandar correo */
if($operacion=="enviar"){
$result=mysql_query("select * from usuarios,correo");
while ($row=mysql_fetch_array($result))
{
$smarty->assign('contenido0', "<br><div align='center'>Este mensaje sera enviado a todos los usuarios que tiene registrado en su web.</div><br><br><FORM METHOD='POST' ACTION='modulos.php?modulo=email&operacion=enviar2'>");
$smarty->append(array("contenido2" => "<input type='hidden' name='correo[]' value='".$row["correo"]."'>"));
$smarty->assign('contenido4', "<input type='hidden' name='departe_de' value='".$row["departe_de"]."'>
<center><table border='0'><tr><td><b>Encabezado:</b></td><td><INPUT TYPE='text' NAME='encabezado_env'></td></tr>
<tr><td valign='top'><b>Eviado por:</b></td><td><b>".$row["departe_de"]."</b><br><font size='1'>Si quieres cambiarla puedes hacerlo, <a href='modulos.php?modulo=email&operacion=preferencias'>pulsando aqui.</a></font></td></tr></table>
<table border='0'><tr><td valign='top'><b>Mensaje:</b><br><TEXTAREA NAME='mensaje' cols='88' rows='20' wrap='VIRTUAL'></TEXTAREA></td></tr></table><br><br>
<INPUT TYPE='submit' value='Enviar' name='enviar2'></center>
</FORM>");
}
mysql_free_result($result);
$smarty->display('email/index.tpl');
}
/* Mandar correo */


/* Mandar correo */
if($operacion=="enviar2"){
$correo = $_POST["correo"];
$encabezado_env = $_POST["encabezado_env"];
$departe_de = $_POST["departe_de"];
$mensaje = $_POST["mensaje"];
   
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=Unicode-UTF-8' . "\r\n";
$cabeceras .= 'From: <'.$departe_de.'>' . "\r\n";


for($i=0; $i<count($correo); $i++) {
mail("".$correo[$i]."","".$encabezado_env."","".$mensaje."","".$cabeceras."");
}
$smarty->assign('contenido0', "<br><br><div align='center'>Se esta enviando el mensaje a sus usuarios...</div><br><br><br>");
$smarty->display('email/index.tpl');
}
/* Mandar correo */

/* Editar Mensaje */
if($operacion=="editar"){
$result=mysql_query("select * from correo");
while ($row=mysql_fetch_array($result))
{
$smarty->assign('contenido0', "<br><div align='left'>Este mensaje sera enviado a los usuarios que se registren en su web y en otros servicios que requieran e-mail.</div><br><br><form action='modulos.php?modulo=email&operacion=editar2' method='post'>
<INPUT TYPE='hidden' value='editarmail' name='editarmail'>
<center><table border='0'><tr><td><b>Encabezado:</b></td><td><input type='text' name='encabezado' value='".$row["encabezado"]."'></td></tr>
<tr><td valign='top'><b>Eviado por:</b></td><td><b>".$row["departe_de"]."</b><br><font size='1'>Si quieres cambiarla puedes hacerlo, <a href='modulos.php?modulo=email&operacion=preferencias'>pulsando aqui.</a></font></td></tr></table>

<table border='0'>
<tr><td valign='top'><b>Mensaje:</b> <br><textarea cols='88' rows='20' name='mensaje' wrap='VIRTUAL'>".$row["mensaje"]."</textarea></td></tr>
<tr><td valign='top'><b>Firma:</b><br> <textarea cols='88' rows='20' name='firma' wrap='VIRTUAL'>".$row["firma"]."</textarea></td></tr></table>
<br><br><input type='submit' name='editarmen2' value='Editar'></center>
</form>");
}
mysql_free_result($result);

$smarty->display('email/index.tpl');
}
/* Editar Mensaje */


/* Editar Mensaje */
if($operacion=="editar2"){
$editarmail = $_POST["editarmail"];
$encabezado = $_POST["encabezado"];
$mensaje = $_POST["mensaje"];
$firma = $_POST["firma"];
$result=mysql_query("UPDATE correo SET encabezado='$encabezado',mensaje='$mensaje',firma='$firma'");
$smarty->assign('contenido0', "<br><br><div align='center'>Datos actualizados satisfactoriamente. <a href='modulos.php?modulo=email&operacion=editar'> <<- Regresar </a></div><br><br>");
$smarty->display('email/index.tpl');
}
/* Editar Mensaje */


/* Preferencias */
if($operacion=="preferencias"){
$result=mysql_query("select * from correo");
while ($row=mysql_fetch_array($result))
{
$si=$row["servicio"];
if($row["servicio"]==1) {
	$si="Hay servicio de correo y puedo mandar informaci&oacute;n.";
}
elseif($row["servicio"]==0) {
	$si="No hay servicio de correo y no puedo mandar informaci&oacute;n.";
}
}
mysql_free_result($result);
$smarty->assign('contenido0', "<center><table border='0' width='95%'><tr><td>Aqu&iacute; debes configurar si quieres enviar un correo con los datos del usuario cuando se registran. Esto es necesario si tienes todos los elementos para que funcione el sistema de correos. Como el programa o el sistema que enviar&aacute; el correo y la configuraci&oacute;n de tu <i>php.ini</i>. Esto t&aacute;mbien es aplicable para el sistema de envio de noticias y articulos.
<br><br>Actualmente esta opci&oacute;n esta en: <br><b>".$si."</b></td></tr></table></center><br><br><br>");
$result2=mysql_query("select * from correo");
while ($row2=mysql_fetch_array($result2))
{
$smarty->assign('contenido1', "<form action='modulos.php?modulo=email&operacion=preferencias2' method='post'>
<INPUT TYPE=hidden value=preferencias name=preferencias>
<center><table border='0'><tr><td><b>Activar Servicio de E-mail:</b><br><font size='1'>Elige una opci&oacute;n.</font></td>
<td><SELECT NAME='servicio'><OPTION selected value='1' name='servicio'>Si</OPTION><OPTION value='0' name='servicio'>No</OPTION></SELECT></td></tr>
<tr><td><b>Direccion de los correos:</b><br><font size='1'>Cual es la cuenta de e-mail<br> que se utilizara para enviar correo.</font> </td><td><input type='text' name='departe_de' value='".$row2["departe_de"]."'></td></tr></table><br><br>
<input type='submit' name='preferencias2' value='Actualizar'></center>
</form>");
}
mysql_free_result($result2);
$smarty->display('email/index.tpl');
}
/* Preferencias */


/* Cambiar Preferencias */
if($operacion=="preferencias2"){
$servicio = $_POST["servicio"];
$preferencias = $_POST["preferencias"];
$departe_de = $_POST["departe_de"];
$result2=mysql_query("UPDATE correo SET servicio='$servicio',departe_de='$departe_de'");
$smarty->assign('contenido0', "<br><br><div align='center'>Datos actualizados satisfactoriamente. <a href='modulos.php?modulo=email&operacion=preferencias'><<- Regresar</a></div><br><br><br>");
$smarty->display('email/index.tpl');
}
/* Cambiar Preferencias */


}
/* Fin Módulos e-mail (Administración) */
?>
