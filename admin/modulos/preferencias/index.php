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

function preferencias($modulo,$operacion,$smarty){

$smarty->assign('timodulo', "<img src=../imagenes/admin/preferencias.gif align=middle border=0 title=Mensajes Privados> M&oacute;dulo: Preferencias");

if($operacion=="lectura"){
$result=mysql_query("select * from cabecera,logotipo,cuerpo where (id_cuerpo=2)");
while ($row=mysql_fetch_array($result))
{
$smarty->assign('pref1', "<form action=modulos.php?modulo=preferencias&operacion=editar method=post>");


$smarty->assign('pref2', "<center><table width=90% border=0>
<tr>
<td><b>Titulo de la Web:</b></td></tr>
<tr><td><input type=text name=titulo size=40 value='".$row["titulo"]."'></td>
</tr>
<tr>
<td><br><b>Descripci&oacute;n de la Web:</b></td></tr>
<tr>
<td><input type=text size=40 name=descripcionn value='".$row["descripcion"]."'></td>
</tr>
<tr>
<td><br><b>Llaves del sitio:</b></td></tr>
<tr>
<td><input type=text size=40 name=llaves value='".$row["llaves"]."'></td>
</tr>
<tr>
<td><br><b>Clasificaci&oacute;n de la Web:</b></td></tr>
<tr>
<td><input type=text size=40 name=clasificacion value='".$row["clasificacion"]."'></td>
</tr>
<tr>
<td><br><b>Tiempo de diferencia que habr&aacute; con el servidor:</b><br><em>Aplicado de esta manera 1, -1, 2 -2, etc.</em></td></tr>
<tr>
<td><INPUT TYPE=text NAME=hora value='".$row["hora_ser"]."'></td>
</tr>
<tr>
<td><br><b>Nombre de archivo del logotipo:</b><br><em>Nota: Coloca en nombre del archivo de imag&eacute;n que se encuentra en la carpeta de /imagenes.</em></td></tr>
<tr>
<td><input type=text size=40 name=nombre_logo value='".$row["nombre_logo"]."'></td>
</tr>
<tr>
<td><br><b>Texto alternativo del logotipo:</b></td></tr>
<tr>
<td><input type=text size=40 name=alt value='".$row["alt"]."'></td>
</tr>
<tr>
<td><br><b>Direcci&oacute;n del logotipo:</b><br><em>Nota: Deja lo predeterminado en el &aacute;rea de imagenes de la carpeta principal.</em></td></tr>
<tr>
<td><input type=text name=direccion size=40 value='".$row["direccion"]."'></td>
</tr>
<tr>
<td><br><b>Texto de final de p&aacute;gina: </b></td></tr>
<tr>
<td><textarea rows='20' cols='88' name=texto wrap=VIRTUAL>".$row["valores"]."</textarea></td>
</tr>
</table></center><br><br><center><INPUT TYPE=SUBMIT value=Editar name=editar></center>
</form>");


}
mysql_free_result($result);


$smarty->display('preferencias/index.tpl');
}

/* Editar */
if($operacion=="editar"){
$titulo = $_POST['titulo'];
$descripcionn = $_POST['descripcionn'];
$clasificacion = $_POST['clasificacion'];
$nombre_logo = $_POST['nombre_logo'];
$alt = $_POST['alt'];
$direccion = $_POST['direccion'];
$texto = $_POST['texto'];
$hora = $_POST['hora'];
$llaves = $_POST['llaves'];

$result = mysql_query("Update cabecera Set titulo='$titulo',descripcion='$descripcionn',llaves='$llaves',clasificacion='$clasificacion',hora_ser='$hora'");
$result2 = mysql_query("Update logotipo Set nombre_logo='$nombre_logo',alt='$alt',direccion='$direccion'");
$result3 = mysql_query("Update cuerpo Set valores='$texto' where id_cuerpo=2");
$smarty->assign('pref1', "<center>Datos actualizados satisfactoriamente.<BR><a href=modulos.php?modulo=preferencias&operacion=lectura>Regresar</a></center><br><br><br>");
$smarty->display('preferencias/index.tpl');
}

/* Editar */

}

/* Fin Módulos Informacion (Administración) */



?>
