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

/* Inicia Módulos Administrador (Administración) */

function administrador($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser){

$smarty->assign('timodulo', "<img src=../imagenes/admin/administrador.gif align=middle border=0 title=Administrador> M&oacute;dulo: Administrador");
//$smarty->assign('contenido0', "");

   $sql = "SELECT * FROM administrador WHERE (nombre='$login') and (contrasena='$password')";
	$comp = mysql_query($sql) or die("No se puede ejecutar el resultado de la base de datos.");
	$num = mysql_numrows($comp);

/* Controlar si es Administrador */
if($num == 0){

/* Visualizar Datos */
if($operacion=="datos"){
$result=mysql_query("select * from administrador");
while ($row=mysql_fetch_array($result))
{
$smarty->assign('contenido1', "<div align='center'>[ <a href='modulos.php?modulo=administrador&operacion=formulario'>Editar Datos</a> ]<br><br><table border='0'>
<tr>
<td><b>Nick:</b></td>
<td>".$row["nombre"]."</td>
</tr>
<tr>
<td><b>E-mail:</b></td>
<td>".$row["correo"]."</td>
</tr>
<tr>
<td><b>Web:</b></td>
<td>".$row["web"]."</td>
</tr>
<tr>
<td><b>Pais.</b></td>
<td>".$row["pais"]."</td>
</tr>
</table></div><br><br>");
}
mysql_free_result($result);
$smarty->display('administrador/index.tpl');
}

/* Formulario de Datos */
if($operacion=="formulario"){
$result=mysql_query("select * from administrador");
while ($row=mysql_fetch_array($result))
{
$smarty->assign('contenido1', "<div align='center'>[ <a href='modulos.php?modulo=administrador&operacion=formulario'>Editar Datos</a> ]<br><br><form action='modulos.php?modulo=administrador&operacion=editar' method='post'><input type='hidden' name='ID_adm' value='".$row["ID_adm"]."'><table border='0'>
<tr><td><a href=javascript:history.back()><<- Regresar</a></td><td></td></tr>
<tr>
<td><b>Nick:</b></td>
<td><input type='text' name='nombre' value='".$row["nombre"]."'></td>
</tr>
<tr>
<td><b>Nueva Contrase&ntilde;a:</b><br><font size='1'>Si no quieres cambiar <br>contrase&ntilde;a dejan en <br>blanco la casilla.</font></td>
<td><input type='text' name='contrasena'></td>
</tr>
<tr>
<td><b>E-mail:</b></td>
<td><input type='text' name='correo' value='".$row["correo"]."'></td>
</tr>
<tr>
<td><b>Web:</b></td>
<td><input type='text' name='web' value='".$row["web"]."'></td>
</tr>
<tr>
<td><b>Pais.</b></td>
<td><input type='text' name='pais' value='".$row["pais"]."'></td>
</tr>
</table><br><br><input type='submit' name='editar' value='Editar'></form></div><br><br>");
}
mysql_free_result($result);
$smarty->display('administrador/index.tpl');
}

/* Editar Datos de Administrador */
if($operacion=="editar"){
$ID_adm = $_POST["ID_adm"];
$nombre = $_POST["nombre"];
$contrasena = $_POST["contrasena"];
$correo = $_POST["correo"];
$web = $_POST["web"];
$pais = $_POST["pais"];
$login2 = $_SESSION["login"];
$password2 = $_SESSION["password"];
	/* Comprobamos contraseña */
	if($contrasena=$contrasena){
	$result=mysql_query("Update administrador Set ID_adm='$ID_adm',nombre='$nombre',contrasena=md5('$contrasena'),correo='$correo',pais='$pais',web='$web' where ID_adm='$ID_adm'");
	$result33 = mysql_query("select contrasena from administrador where ID_adm='$ID_adm'");
	$row=mysql_fetch_row($result33);
	session_start();
        unset($_SESSION["login"]);
        unset($_SESSION["password"]);
	//session_unset(); //PHP 4.0.6 o inferior
	// $HTTP_SESSION_VARS //PHP 4.0.6 o inferior
	$login3 = $nombre;
	// echo $login3;
	$password3=$row[0];
	// echo $password2;
        $_SESSION['login'] = $login3;
        $_SESSION['password'] = $password3;
	//session_register("login"); //PHP 4.0.6 o inferior
	//session_register("password"); //PHP 4.0.6 o inferior
	}
	else{
		$result=mysql_query("Update administrador Set ID_adm='$ID_adm',nombre='$nombre',correo='$correo',pais='$pais',web='$web'");
	}
	
$smarty->assign('contenido1', "<br><div align='center'>Datos actualizados satisfactoriamente, dependiendo de su opci&oacute;n <br> ser&aacute; necesario volverse a loguear. <a href='modulos.php?modulo=administrador&operacion=datos'><<- Regresar</a></div><br><br>");
$smarty->display('administrador/index.tpl');
}

}
elseif($num == 1){
$smarty->assign('contenido1', "<br><div align='center'>Lo sentimos, no puedes ingresar a este modulo no eres Administrador.</div><br><br>");
$smarty->display('administrador/index.tpl');
}

}

/* Fin Módulos Menu (Administración) */



?>
