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

/* Inicia Módulos Menu (Administración) */

function menu($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$npass){

$smarty->assign('timodulo', "<img src=../imagenes/admin/menu.gif align=middle border=0 title=Menu> M&oacute;dulo: Menu");
$smarty->assign('contenido0', "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;[ <a href='modulos.php?modulo=menu&operacion=nuevo'>Agregar Men&uacute;</a> ]<br><br>");

if ($operacion=="ordenar"){
$operador=$_GET['operador'];
$ID_menu = $_GET['ID_menu'];
$ID_alterno = $_GET['ID_alterno'];
  $result = mysql_query('update menuindex set menu_orden=menu_orden+'.$operador.' where ID_menu='.$ID_menu.'');
  $result2 = mysql_query('update menuindex set menu_orden=menu_orden-'.$operador.' where ID_menu='.$ID_alterno.'');
$smarty->assign('contenido1', "Los Cambios han sido actualizados satisfactoriamente.<br> <a href=javascript:history.back()><<- Regresar</a> ");
$smarty->display('menu/index.tpl');
}


if($operacion=="menu"){
include '../config.inc.php';
$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);
$pegar = "SELECT * from menuindex ORDER BY menu_orden asc";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());
$enlace1 = $enlace2 = '';
$indice = 0;
$idanterior = $idsiguiente ='';

  $e_bloque['titulo']= 'Nombre';
 
  $e_bloque['visualizar']= 'Estado Actual';
  $e_bloque['accion']= 'Acci&oacute;n';

$smarty->assign('encbloque', $e_bloque);

while ($row=mysql_fetch_array($cad))
{ 
  if ($indice!= 0 ){
    $a_bloque[$indice-1]['enlace1'] = "operacion=ordenar&operador=1&ID_menu=".$idanterior.
                                    "&ID_alterno=".$row['ID_menu'];
    $enlace2 = "operacion=ordenar&operador=-1&ID_menu=".$row['ID_menu']."&ID_alterno=".$idanterior;   
  }
  $a_bloque[$indice]['ID_bordede']= $row['ID_menu'];
  $a_bloque[$indice]['titulo']= $row['titulo'];
  
  $a_bloque[$indice]['ver']= ($row["menu_activar"]==1)?'<img src="../imagenes/admin/sistema/si.png" border="0">':'<img src="../imagenes/admin/sistema/no.png" border="0">';
  $a_bloque[$indice]['sis']= ($row["menu_activar"]==1)?'0':'1';
  $a_bloque[$indice]['enlace1']='';
  $a_bloque[$indice]['enlace2']= $enlace2;
  $idanterior =$row['ID_menu'];
  $indice ++;
  
} //while
$smarty->assign('bloque', $a_bloque);
$smarty->display('menu/index.tpl');

}

/* Nuevo Menu */
if($operacion=="nuevo2"){
$titulo=$_POST["titulo"];
$direccion_local=$_POST["direccion_local"];
$menu_orden=$_POST["menu_orden"];
$query="INSERT into menuindex (titulo,direccion_local,direccion_exterior,menu_activar,menu_orden) values ('$titulo','$direccion_local','---','1','$menu_orden')";
$res=mysql_query($query);
$smarty->assign('contenido1', "<br><br><center>Se ingreso satisfactoriamente el men&uacute;: <b>".$titulo."</b> <a href='modulos.php?modulo=menu&operacion=menu'><<- Regresar</a></center><br><br><br>");
$smarty->display('menu/index.tpl');
}


/* Nuevo Menu */
if($operacion=="nuevo"){
$result=mysql_query("select * from menuindex order by menu_orden desc limit 1");	
while ($row=mysql_fetch_array($result))
{
$menu_orden = $row["menu_orden"]+1;
}
mysql_free_result($result);
$smarty->assign('contenido1', "<center><form action='modulos.php?modulo=menu&operacion=nuevo2' method='post'>
<table border='0'><tr><td><a href=javascript:history.back()><<- Regresar</a></td><td></td></tr><tr><td><b>T&iacute;tulo del menu:</b></td> <td><input type='text' name='titulo'></td></tr>
<tr><td><b>Direccion local:</b></td> <td><input type='text' name='direccion_local'></td></tr>
</table><br><br>
<input type='hidden' value='".$menu_orden."' name='menu_orden'>
<input type='submit' value='Ingresar' name='nuevo2'>
</form></center><br><br>");
$smarty->display('menu/index.tpl');
}


/* Mostar Menu */
if($operacion=="mostrar"){
$titulo=$_GET["titulo"];
$ID_menu=$_GET["ID_menu"];
$sis=$_GET["sis"];

if($sis==1) {
	$mensaje="mostrar";
}
elseif($sis==0) {
	$mensaje="no mostrar";
}

mysql_query("Update menuindex Set menu_activar='$sis' Where ID_menu='$ID_menu'");
$smarty->assign('contenido1', "<br><br><center>Has elegido <i>".$mensaje."</i> <b>'".$titulo."'</b> en el men&uacute; principal. <a href='modulos.php?modulo=menu&operacion=menu'><<- Regresar</a><br><br><br></center>");
$smarty->display('menu/index.tpl');
}


/* Borrar Menu */
if($operacion=="borrar"){
$titulo=$_GET["titulo"];
$ID_menu=$_GET["ID_menu"];
$smarty->assign('contenido1', "<center>Estas seguro de querer eliminar el menu denominado como <BR><i><B>".$titulo."</B></i>?</center><br>
<center>[ <a href='modulos.php?modulo=menu&operacion=borrar2&titulo=".$titulo."&ID_menu=".$ID_menu."'>Si</a> ] [ <a href='modulos.php?modulo=menu&operacion=menu'>No</a> ]</center><br><br>");
$smarty->display('menu/index.tpl');
}

/* Borrar Menu */
if($operacion=="borrar2"){
$titulo=$_GET["titulo"];
$ID_menu=$_GET["ID_menu"];
mysql_query("Delete From menuindex Where ID_menu='$ID_menu'");
$smarty->assign('contenido1', "<br><br><center><b>Informe:</b> <b><i>".$titulo."</i></b> fue eliminada satisfactoriamente. <a href='modulos.php?modulo=menu&operacion=menu'><<- Regresar</a></center><br><br>");
$smarty->display('menu/index.tpl');
}

/* Editar Menu */
if($operacion=="editar"){
$titulo=$_GET["titulo"];
$ID_menu=$_GET["ID_menu"];
$result=mysql_query("select * from menuindex WHERE ID_menu='$ID_menu' ");
while ($row=mysql_fetch_array($result))
{
$smarty->assign('contenido1', "<center><form action='modulos.php?modulo=menu&operacion=editar2' method='post'>
<input type='hidden' name='ID_menu' value='".$row["ID_menu"]."'>
<table border='0'><tr><td><a href=javascript:history.back()><<- Regresar</a></td><td></td></tr><tr><td><b>T&iacute;tulo del menu:</b></td> <td><input type='text' name='titulo' value='".$row["titulo"]."'></td></tr>
<tr><td><b>Direccion local:</b></td> <td><input type='text' name='direccion_local' value='".$row["direccion_local"]."'></td></tr>
</table><br><br>
<input type='submit' value='Editar' name='editar3'>
</form></center><br><br>");
}
mysql_free_result($result);
$smarty->display('menu/index.tpl');
}

/* Editar Menu */
if($operacion=="editar2"){
$titulo=$_POST["titulo"];
$ID_menu=$_POST["ID_menu"];
$direccion_local=$_POST["direccion_local"];
mysql_query("Update menuindex Set ID_menu='$ID_menu',titulo='$titulo',direccion_local='$direccion_local' WHERE ID_menu='$ID_menu'");
$smarty->assign('contenido1', "<br><br><center><b>Informe:</b> El menu fue actualizado satisfactoriamente. <a href='modulos.php?modulo=menu&operacion=menu'><- Regresar</a></center><br><br><br>");
$smarty->display('menu/index.tpl');
}


}

/* Fin Módulos Menu (Administración) */



?>
