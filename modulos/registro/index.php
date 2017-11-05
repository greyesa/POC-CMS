<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 

include 'config.inc.php';

/* Inicia Modulos registro de usuarios  */

function registro($modulo,$operacion,$smarty,$link,$nbase,$nuser){

/* ########## Formularios - ingreso  ############# */
		if($operacion=="ingresar"){ 
		 
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];


/* $correous = $_POST["correous"];
$paisus = $_POST["paisus"];
$errorus = $_POST["errorus"];
$nombreus = $_POST["nombreus"];
$webus = $_POST["webus"];
$tipos = $_POST["tipos"];

if($nombreus=$nombreus){
   if($paisus=$paisus){
       if($errorus=$errorus){
            if ( strstr( $correous, '@' ) ) {


$errorus = htmlspecialchars($errorus);
$errorus = strtolower($errorus);
$errorus = ucfirst ($errorus); 
$nombreus = strtolower($nombreus);
$nombreus = ucfirst ($nombreus);  */


$result=mysql_query("INSERT into usuarios (correo,contrasena,recucontrasena,web,nombre,pais,fecha,picture,us_enlace) values ('$correo','--','--','--','$nombre','--',now(),'--','0')");

$smarty->assign('mensaje', 'Enhorabuena, ya est&aacute;s registrado en el sistema.');

/*}
   else {
$smarty->assign('mensaje', 'Lo sentimos, no se pudo ingresar el mensaje posiblemente por que no ingresaste un correo electr&oacute;nico v&aacute;ido.');
   }
   
}
else {
$smarty->assign('mensaje', 'Lo sentimos, no se pudo ingresar el mensaje posiblemente por que no ingresaste un mensaje.');
}
	}
	else {
$smarty->assign('mensaje', 'Lo sentimos, no se pudo ingresar el mensaje posiblemente por que no ingresaste t&uacute; pa&iacute;s.');
	}
	}
	else {
$smarty->assign('mensaje', 'Lo sentimos, no se pudo ingresar el mensaje posiblemente por que no ingresaste t&uacute; nombre.');
	}*/


$smarty->display('registro.tpl'); /* Llamamos a la plantilla */
}

/* ########## Formularios - forma  ############# */
if($operacion=="forma"){ 

$smarty->assign('mensaje', '<form method="post" action="modulos.php?modulo=registro&operacion=ingresar">

<table border=0>
<tr>
<td><b>Nombre:</b></td>
<td><INPUT TYPE="text" NAME="nombre"></td>
</tr>
<tr>
<td><b>Correo electr&oacute;nico:</b></td>
<td><INPUT TYPE="text" NAME="correo" value=""></td>
</tr>
</table>

<br><br><INPUT TYPE="submit" name="ingresar" value="Registrar">

</form>');

$smarty->display('registro.tpl'); /* Llamamos a la plantilla */
}

}
?>
