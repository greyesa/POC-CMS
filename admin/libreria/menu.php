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

$smarty->assign('menu', '<a href="../index.php" title="Principal">Principal</a>');
$smarty->assign('desconectar', '<a href="deslogin.php">Desconectarte</a>');

$sql = "SELECT ID_adm FROM administrador WHERE nombre='$login' and contrasena='$password'";

$result = mysql_query($sql)
	or die("No se puede ejecutar el resultado de la base de datos.");

$num = mysql_numrows($result);
if ($num == 1) {
$result=mysql_query("select * from cabecera,administrador");

while ($row=mysql_fetch_array($result))
{

$smarty->assign('cubologin', '<b>Conectado:</b> [<a href="modulos.php?modulo=administrador&operacion=datos">'.$row["nombre"].'</a>]&nbsp;');

$smarty->assign('loginmensaje4', '<b>Sitio de Trabajo:</b> <font face="Verdana" size="1" color="#000000"><B>'.$row["titulo"].'</B></font> [<a href="../index.php">Home</a>]');

//echo '<img src="../imagenes/admin/adminemail.gif"> Correo Electrónico:<br><b>'.$row["correo"].'</b><br>';
//echo '<img src="../imagenes/admin/adminpais.gif"> Nacionalidad:<br><b> '.$row["pais"].'</b><br><br>';


$result2=mysql_query("select * from registrosadmin WHERE tipos='contactarnos,errores,publicidad,colaborar' and ver='1'");

$r=mysql_num_rows($result2);

if($r==" "){

$result3=mysql_query("select * from registrosadmin WHERE ver='0'");
$rs=mysql_num_rows($result3);
$smarty->assign('loginmensaje1', '<img src="../imagenes/email.gif"> <a href="modulos.php?modulo=mensprivado&operacion=lectura"> Mensajes ('.$rs.') </a>');
}
elseif($r==1){

$result4=mysql_query("select * from registrosadmin WHERE ver='1'");
$rs=mysql_num_rows($result4);
$smarty->assign('loginmensaje2', '<img src="../imagenes/email.gif"> <a href="modulos.php?modulo=mensprivado&operacion=lectura"> Mensajes ('.$rs.') </a>');

}
else{
	$smarty->assign('loginmensaje3', '<img src="../imagenes/email.gif"> <a href="modulos.php?modulo=mensprivado&operacion=lectura"> Mensajes (0) </a>');
}
}
mysql_free_result($result);
}
else {

}
?>


