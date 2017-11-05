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

/* Inicia Módulos Mensaje (AdministraciÃ³n) */

function mensaje($modulo,$operacion,$smarty){

$smarty->assign('timodulo', "<img src=../imagenes/admin/mensaje.gif align=middle border=0 title=Mensaje> M&oacute;dulo: Mensaje");

$smarty->assign('mensaje0', "<center><table border='0'><tr><td><table width=76% border=0><tr><td>[ <a href=modulos.php?modulo=mensaje&operacion=preferencias>Preferencias</a>]</td></tr></table><BR> ");

if($operacion=="lectura"){

$result=mysql_query("select * from mensaje ");
while ($row=mysql_fetch_array($result))
{

$smarty->assign('mensaje1', "<form action=modulos.php?modulo=mensaje&operacion=editar method=post>
<table width=76% border=0><tr><td><b>T&iacute;tulo del mensaje:</b></td> <td><input type=text name=titulo value='".$row["titulo"]."' size=40></td></tr><tr>
<td><b>Ingresa t&uacute; nombre:</b> </td><td><input type=text name=usuario value='".$row["usuario"]."' size=40></td></tr></table><br>

<table width=76% border=0><tr><td><b>Texto del mensaje [ <a href=javascript:imagenNoticia('../include/w2box/index.php?modo=cerrarnoti')>Agregar</a> ]:</b></td></tr><tr>
<td><textarea rows=25 cols=88 name=texto wrap=phisical>".$row["texto"]."</textarea></td></tr></table><br><br>

<center><input type=submit  name=editar value='Editar'>
</form>
</td></tr></table></center>");
}
mysql_free_result($result);

$smarty->display('mensaje/index.tpl');
}

/* Editar mensaje */
if($operacion=="editar"){
$titulo = $_POST['titulo'];
$usuario = $_POST['usuario'];
$texto = $_POST['texto'];

mysql_query("Update mensaje Set titulo='$titulo',texto='$texto',usuario='$usuario',fecha=now()");	
$smarty->assign('mensaje1', "<center>El mensaje fue actualizado satisfactoriamente.<br><a href=modulos.php?modulo=mensaje&operacion=lectura><-- Regresar </a></center><br><br>");

$smarty->display('mensaje/index.tpl');
}
/* Editar mensaje */


/* Editar Preferencia mensaje */
if($operacion=="preferencias"){

$result=mysql_query("select val from activadores where nom='act_men'");
while ($row=mysql_fetch_array($result))
{
$si=$row["val"];
if($row["val"]==1) {
	$si="Visualizar Mensaje Principal.";
}
elseif($row["val"]==0) {
	$si="No visualizar Mensaje Principal.";
}
$smarty->assign('mensaje1', "<center><table width=70% border=0><tr><td><a href=modulos.php?modulo=mensaje&operacion=lectura><-- Regresar</a><br>Aqui debes configurar si quieres visualizar el Mensaje Principal<br> en el home del sitio.<br><br>
Actualmente esta opci&oacute;n esta en: <br><b>$si</b><br><br>");

}
mysql_free_result($result);

$smarty->assign('mensaje2', "<form action=modulos.php?modulo=mensaje&operacion=preferencias2 method=post>
<center><b>Quieres activar el Mensaje Principal:</b>
<SELECT NAME=val><OPTION selected value=1 name=val>Si</OPTION><OPTION value=0 name=val>No</OPTION></SELECT><br><br></center>
<INPUT TYPE=hidden value=act_men name=act_men>
<center><input type=submit name=preferencias2 value=Actualizar></center>
</form></td></tr></table></center>");

$smarty->display('mensaje/index.tpl');
}
/* Editar Preferencia mensaje */

/*  Editar Preferencia mensaje 2 */
if($operacion=="preferencias2"){
$val = $_POST['val'];
$act_men = $_POST['act_men'];
mysql_query("Update activadores Set val='$val' where nom='$act_men'");
$smarty->assign('mensaje1', "<center>Registros actualizados satisfactoriamente.<br><a href=modulos.php?modulo=mensaje&operacion=preferencias><-- Regresar</a></center><br><br>");

$smarty->display('mensaje/index.tpl');
}
/*  Editar Preferencia mensaje 2 */

}

/* Fin Módulos Mensaje (Administración) */



?>
