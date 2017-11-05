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

/* Inicia Módulos Seguridad (Administración) */

function seguridad($modulo,$operacion,$smarty){
$smarty->assign('timodulo', "<img src=../imagenes/admin/seguridad.gif align=middle border=0 title=Seguridad> M&oacute;dulo: Seguridad");

if($operacion=="descargas"){
$smarty->assign('seg1', "<br><b>Permitir a los usuarios acceso a descargas:</b><br>");
$result=mysql_query("select * from seguridad");
while ($row=mysql_fetch_array($result))
{
$si=$row["seguridad_des"];
if($row["seguridad_des"]==1) {
	$si="No Autenticar a usuario.";
}
elseif($row["seguridad_des"]==0) {
	$si="Autenticar a usuario.";
}
$smarty->assign('seg2', "Actualmente esta opci&oacute;n esta en: <b>$si</b><br><br>");
}

$smarty->assign('seg3', "<form action='modulos.php?modulo=seguridad&operacion=descargas2'  method='post'>
<center><br><b>Permitir acceso a descargas con autenticaci&oacute;n:</b>
<SELECT NAME='seguridad_des' size='1'>
<OPTION selected value='1' name='seguridad_des'>No</option>
<OPTION value='0' name='seguridad_des'>Si</option>
</SELECT ><br><br>
<input type='submit' name='descargas2' value='Actualizar'>
</form></center><BR><BR>");

$smarty->display('seguridad/index.tpl');
}

if($operacion=="descargas2"){
$seguridad_des = $_POST['seguridad_des'];
$result=mysql_query("Update seguridad Set seguridad_des='$seguridad_des'");
$smarty->assign('seg1', "<CENTER><b>Informe:</b> Dato actualizado satisfactoriamente. <a href=javascript:history.back()><<- Regresar</a><br><br><BR><BR></CENTER>");
$smarty->display('seguridad/index.tpl');
}



}

/* Fin Módulos Informacion (Administración) */



?>
