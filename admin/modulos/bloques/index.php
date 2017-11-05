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

/* Inicia Meulos Bloques (Administracion) */
function bloques($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$npass){
	$smarty->assign('timodulo', "<img src=../imagenes/admin/bloques.gif align=middle border=0 title=Bloques> M&oacute;dulo: Bloques");
   $smarty->assign('timodulo1', "<center>[ <a href='modulos.php?modulo=bloques&operacion=nuevo'>Ingresar Nuevo Bloque</a> ]</center><br><br>");



/* Ordenar bloques, Arriba - Abajo */
if ($operacion=="ordenar"){
$operador=$_GET['operador'];
$ID_bloque = $_GET['ID_bloque'];
$ID_alterno = $_GET['ID_alterno'];
  $result = mysql_query('update bloques set orden=orden+'.$operador.' where ID_bloque='.$ID_bloque.'');
  $result2 = mysql_query('update bloques set orden=orden-'.$operador.' where ID_bloque='.$ID_alterno.'');
$smarty->assign('contenido1', "Los Cambios han sido actualizados satisfactoriamente.<br> <a href=javascript:history.back()><<- Regresar</a> ");
$smarty->display('bloques/bloques.tpl');
}


/* Ordenar bloques, Derecho - Izquierdo */
if ($operacion=="ubicacion"){
$operador=$_GET['operador'];
$ID_bloque = $_GET['ID_bloque'];
$posicion = $_GET['posicion'];
$nombre = $_GET['nombre'];
  $result = mysql_query("update bloques set posicion='".$posicion."' where ID_bloque='".$ID_bloque."'");

 $smarty->assign('contenido1', "Los Cambios han sido actualizados satisfactoriamente.<br> <a href=javascript:history.back()><<- Regresar</a> ");
$smarty->display('bloques/bloques.tpl');
}
   
if($operacion=="menu"){
include '../config.inc.php';
$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);
$pegar = "SELECT * from bloques ORDER BY orden asc";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());
$enlace1 = $enlace2 = '';
$indice = 0;
$idanterior = $idsiguiente ='';

  $e_bloque['titulo']= 'Nombre del Bloque';
  $e_bloque['tipo']= 'Tipo';
  $e_bloque['visualizar']= 'Estado actual';
  $e_bloque['accion']= 'Acci&oacute;n';
  $e_bloque['posicion']= 'Posici&oacute;n';

$smarty->assign('encbloque', $e_bloque);

while ($row=mysql_fetch_array($cad))
{ 
  if ($indice!= 0 ){
    $a_bloque[$indice-1]['enlace1'] = "operacion=ordenar&operador=1&ID_bloque=".$idanterior.
                                    "&ID_alterno=".$row['ID_bloque'];
    $enlace2 = "operacion=ordenar&operador=-1&ID_bloque=".$row['ID_bloque']."&ID_alterno=".$idanterior;   
  }
  $a_bloque[$indice]['ID_bloque']= $row['ID_bloque'];
  $a_bloque[$indice]['titulo']= $row['titulo'];
  $a_bloque[$indice]['tipo']= $row['tipo'];
  
  if($row["posicion"]=="Derecho"){
$smarty->assign('posicion', "<a href='modulos.php?modulo=bloques&operacion=posicion&pos=Izquierdo'>Izquierdo</a>");
  }
  elseif($row["posicion"]=="Izquierdo") {
  $smarty->assign('posicion', "<a href='modulos.php?modulo=bloques&operacion=posicion&pos=Derecho'>Derecho</a>");
  }
  
   $a_bloque[$indice]['ant']= ($row["posicion"]==Derecho)?'<img src="../imagenes/menus/izquierda.png" border="0">':'<img src="../imagenes/menus/derecha.png" border="0">';
  $a_bloque[$indice]['posicion']= ($row["posicion"]==Derecho)?'Izquierdo':'Derecho';
  
  $a_bloque[$indice]['ver']= ($row["ver"]==1)?'<img src="../imagenes/admin/sistema/si.png" border="0">':'<img src="../imagenes/admin/sistema/no.png" border="0">';
  $a_bloque[$indice]['sis']= ($row["ver"]==1)?'0':'1';
  $a_bloque[$indice]['enlace1']='';
  $a_bloque[$indice]['enlace2']= $enlace2;
  $idanterior =$row['ID_bloque'];
  $indice ++;
  
} //while
$smarty->assign('bloque', $a_bloque);
$smarty->display('bloques/bloques.tpl');

}
   
 /* Editar Bloques */
if($operacion=="editar"){
$ID_bloque = $_GET['ID_bloque'];
$tipo = $_GET['tipo'];
$result=mysql_query("select * from bloques,cuerpo WHERE ID_bloque='$ID_bloque'");	
while ($row=mysql_fetch_array($result))
{
	
$smarty->assign('contenido1', "<form action='modulos.php?modulo=bloques&operacion=editar2' method='post'>
<input type='hidden' name='ID_bloque' value='".$row["ID_bloque"]."'>
<input type='hidden' name='imagen' value='separador.gif'>
<table border='0'><tr><td><a href=javascript:history.back()><<- Regresar</a></td></tr>
<tr>
<td><b>Titulo del bloque: </b></td>
<td><input type='text' name='titulo' value='".$row["titulo"]."' ></td>
</tr>
<tr>
<td><b>Tipo de contenido:</b><br><font size='1'>Seleccione tipo de contenido.</font></td>
<td><SELECT NAME='tipo' size='1'><OPTION selected value='".$tipo."' name='".$tipo."'>".$tipo."</option> <option>-----------------</option><OPTION value='texto' name='texto'>texto</option><OPTION value='html' name='html'>html</option><OPTION value='php' name='php'>php</option><OPTION value='rss' name='rss'>rss</option></SELECT></td>
</tr>
<tr>
<td><b>Ubicaci&oacute;n</b></td>
<td><SELECT NAME='ubicacion' size='1'><OPTION value='".$row["posicion"]."' name='".$row["posicion"]."'>".$row["posicion"]."</option>
<option>-----------------</option>
<OPTION value='Derecho' name='Derecho'>Derecho</option>
<OPTION value='Izquierdo' name='Izquierdo'>Izquierdo</option>
</SELECT></td>
</tr>
<tr>
<td><b>Visualizar ahora:</b><br><font size='1'>Visualizar en el Sitio Web.</font></td>
<td><SELECT NAME='versa' size='1'><OPTION selected value='1' name='1'>Si</option><OPTION value='0' name='0'>No</option></SELECT></td>
</tr></table>
<table border='0'>
<tr>
<td valign='top'><b>Texto del bloque:</b> [ <a href=javascript:popUp('modulos/bloques/ayuda.php')>Ayuda</a> ] <br><font size='1'>Si realiza un cambio en el tipo de contenido, por favor edite e ingrese de nuevo. Para que los cambios surtan efecto.</font></td></tr>");
if($tipo=="html"){
$smarty->assign('contenido3', "<tr><td><textarea rows='20' cols='88' name='texto' wrap='phisical'>".$row["texto"]."</textarea><input type='hidden' name='tipo2' value='".$row["tipo"]."'></td>");
}
elseif($tipo=="php" || $tipo=="rss" || $tipo=="texto"){
$smarty->assign('contenido3', "<tr><td><textarea rows='20' cols='88' name='texto_2' wrap='phisical'>".$row["texto"]."</textarea><input type='hidden' name='tipo2' value='".$row["tipo"]."'></td>");
}
$smarty->assign('contenido4', "</tr>
</table><input type='submit' value='Editar' name='editar2'></form>");

//echo '<center><table border="0" WIDTH="60%"><tr><td><br>Para el contenido del bloque debes elegir el tipo que este ser�por ejemplo Texto, HTML o PHP.<br><br>Hay requisitos que seguir para cada tipo por ejemplo:<br><br><b>*PHP:</b> Incluye el contenido normal PHP, al principio abrir con  < ?, y al final cerrar con ? ><br><br><b>*Texto:</b> Escribe con texto normal.<br><br><b>*HTML:</b> Escribe con etiquetas html.<br><br></td></tr></table></center>';
}
mysql_free_result($result);
$smarty->display('bloques/bloques.tpl');
}


/* Editar Bloques */
if($operacion=="editar2"){
$ID_bloque = $_POST['ID_bloque'];
$imagen = $_POST['imagen'];
$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];
$versa = $_POST['versa'];
$texto = $_POST['texto'];
$texto_2 = $_POST['texto_2'];
$tipo2 = $_POST['tipo2'];
$ubicacion = $_POST['ubicacion'];

if($tipo=="html"){
$result=mysql_query("Update bloques Set titulo='$titulo',texto='$texto',imagen='$imagen',ver='$versa',tipo='$tipo',posicion='$ubicacion' WHERE ID_bloque='$ID_bloque'");
}
elseif($tipo=="php" || $tipo=="rss" || $tipo=="texto" ){

//$texto_2=addslashes($texto_2); /* Agregar lineas invertidas para ingresar queries para las consultas DB */

$result=mysql_query("Update bloques Set titulo='$titulo',texto='$texto_2',imagen='$imagen',ver='$versa',tipo='$tipo',posicion='$ubicacion' WHERE ID_bloque='$ID_bloque'");

}
$smarty->assign('contenido1', "<b>Resultado:</b> El bloque fue editado satisfactoriamente.<a href='modulos.php?modulo=bloques&operacion=menu'><-- Regresar</a><br><br><br>");
$smarty->display('bloques/bloques.tpl');
}


/* Mostar Bloques */
if($operacion=="mostrar"){
$ID_bloque= $_GET['ID_bloque'];
$sis = $_GET['sis'];
$nombre = $_GET['nombre'];
if($sis==1) {
	$mensaje="mostrar";
}
elseif($sis==0) {
	$mensaje="no mostrar";
}
mysql_query("Update bloques Set ver='$sis' Where ID_bloque='$ID_bloque'");
$smarty->assign('contenido1', "Has elegido <i>$mensaje</i> el bloque <i><b>'$nombre'</b></i>. <a href='modulos.php?modulo=bloques&operacion=menu'><- Regresar</a></center><br><br><br>");
$smarty->display('bloques/bloques.tpl');
}


/* Borrar Bloques */
if($operacion=="borrar"){
$ID_bloque = $_GET['ID_bloque'];
$titulo = $_GET['titulo'];
$smarty->assign('contenido1', "<center>Estas seguro de eliminar el bloque denominado como <BR><B>".$titulo."</B>?</center><br>
<center>[<a href='modulos.php?modulo=bloques&operacion=borrar2&ID_bloque=".$ID_bloque."&titulo=".$titulo."'> Si </a> ] [ <a href='modulos.php?modulo=bloques&operacion=menu'>No </a>]</center><br><br><br>");
$smarty->display('bloques/bloques.tpl');
}

/* Eliminar Bloques */
if($operacion=="borrar2"){
$ID_bloque = $_GET['ID_bloque'];
$titulo = $_GET['titulo'];
mysql_query("Delete From bloques Where ID_bloque='$ID_bloque'");
$smarty->assign('contenido1', "<div align='center'>El bloque denominado <b><i>'".$titulo."'</i></b> fue eliminado satisfactoriamente. <a href='modulos.php?modulo=bloques&operacion=menu&ID_bloque=".$ID_bloque."&titulo=".$titulo."'><- Regresar</a></div><br><br><br>");
$smarty->display('bloques/bloques.tpl');
}


/* Nuevo Bloque */
if($operacion=="nuevo"){
$smarty->assign('contenido1', "<form action='modulos.php?modulo=bloques&operacion=nuevo2' method='post'>
<table border='0'><tr><td><a href=javascript:history.back()><<- Regresar</a></td>
<td></td></tr>
<tr>
<td><b>Titulo del Bloque:</b></td>
<td><input type='text' name='titulo'></td>
</tr>
<tr>
<td><b>Tipo de contenido:</b><br>
<font size='1'>Seleccione tipo de contenido.</font></td>
<td><SELECT NAME='tipo' size='1'><option>-----------------</option>
<OPTION value='texto' name='texto'>texto</option>
<OPTION value='html' name='html'>html</option>
<OPTION value='php' name='php'>php</option>
<OPTION value='rss' name='rss'>rss</option></SELECT>
</td>
</tr>
<tr>
<td><b>Ubicaci&oacute;n</b></td>
<td><SELECT NAME='ubicacion' size='1'><option>-----------------</option>
<OPTION value='Derecho' name='Derecho'>Derecho</option>
<OPTION value='Izquierdo' name='Izquierdo'>Izquierdo</option>
</SELECT></td>
</tr>
</table>
<br><br><input type='submit' value='Ingresar' name='nuevo2'></form>");
$smarty->display('bloques/bloques.tpl');
}

/* Ingresar Bloque Derecho */
if($operacion=="nuevo2"){
$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];
$ubicacion = $_POST['ubicacion'];

$result=mysql_query("select * from bloques ORDER BY ID_bloque DESC LIMIT 1");
$row=mysql_fetch_array($result);

$contador = $row["0"]+1;

$smarty->assign('contenido1', "<form action='modulos.php?modulo=bloques&operacion=nuevo3' method='post'>
<input type='hidden' name='contador' value='".$contador."'>
<input type='hidden' name='imagen' value='separador.gif'>
<table border='0'><tr><td>
<table border='0'><tr><td><a href=javascript:history.back()><<- Regresar</a></td><td></td></tr>
<tr>
<td><b>Titulo del bloque: </b></td>
<td><input type='text' name='titulo' value='".$titulo."' ></td>
</tr>
<tr>
<td><b>Tipo de contenido:</b><br><font size='1'>Seleccione tipo de contenido.</font></td>
<td><SELECT NAME='tipo' size='1'><OPTION selected value='".$tipo."' name='".$tipo."'>".$tipo."</option> <option>-----------------</option><OPTION value='texto' name='texto'>texto</option><OPTION value='html' name='html'>html</option><OPTION value='php' name='php'>php</option><OPTION value='rss' name='rss'>rss</option></SELECT></td>
</tr>
<tr>
<td><b>Ubicaci&oacute;n</b></td>
<td><SELECT NAME='ubicacion' size='1'>
<OPTION value='".$ubicacion."' name='".$ubicacion."'>".$ubicacion."</option>
<option>------------</option>
<OPTION value='Derecho' name='Derecho'>Derecho</option>
<OPTION value='Izquierdo' name='Izquierdo'>Izquierdo</option>
</SELECT></td>
</tr>
<tr>
<td><b>Visualizar ahora:</b><br><font size='1'>Visualizar en el Sitio Web.</font></td>
<td><SELECT NAME='versa' size='1'><OPTION selected value='1' name='1'>Si</option><OPTION value='0' name='0'>No</option></SELECT></td>
</tr>
</table>
</td></tr>
<tr><td>
<table border='0'>
<tr>
<td valign='top'><b>Texto del bloque: </b> [ <a href=javascript:popUp('modulos/bloques/ayuda.php')>Ayuda</a> ] <br><font size='1'>Si realiza un cambio en el tipo de contenido, por favor edite e ingrese de nuevo. Para que los cambios surtan efecto.</font></td></tr>");
if($tipo=="html"){
$smarty->assign('contenido3', "<tr><td><textarea rows='20' cols='88' name='texto' wrap='phisical'></textarea><input type='hidden' name='tipo2' value='".$row["tipo"]."'></td>");
}
elseif($tipo=="php" || $tipo=="rss" || $tipo=="texto"){
$smarty->assign('contenido3', "<tr><td><textarea rows='20' cols='88' name='texto_2' wrap='phisical'></textarea><input type='hidden' name='tipo2' value='".$row["tipo"]."'></td>");
}
$smarty->assign('contenido4', "</tr>
</table></td></tr></table><input type='submit' value='Ingresar' name='nuevo3'></form>");
$smarty->display('bloques/bloques.tpl');
}

/* Insertar Bloques */
if($operacion=="nuevo3"){
$imagen = $_POST['imagen'];
$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];
$versa = $_POST['versa'];
$texto = $_POST['texto'];
$texto_2 = $_POST['texto_2'];
$tipo2 = $_POST['tipo2'];
$ubicacion = $_POST['ubicacion'];
$contador = $_POST['contador'];
if($tipo=="html"){
$result=mysql_query("INSERT into bloques (orden,imagen,titulo,texto,tipo,ver,posicion) values('$contador','$imagen','$titulo','$texto','$tipo','$versa','$ubicacion')");
}
elseif($tipo=="php" || $tipo=="rss" || $tipo=="texto"){
// $texto_2=addslashes($texto_2); /* Agregar lineas invertidas para ingresar queries para las consultas DB */
$result=mysql_query("INSERT into bloques (orden,imagen,titulo,texto,tipo,ver,posicion) values('$contador','$imagen','$titulo','$texto_2','$tipo','$versa','$ubicacion')");
}
$smarty->assign('contenido1', "<div align='center'>El bloque denominado <b><i>'".$titulo."'</i></b> fue ingresado satisfactoriamente. <a href='modulos.php?modulo=bloques&operacion=menu'><- Regresar</a></div><br><br><br>");
$smarty->display('bloques/bloques.tpl');
}


}
/* Fin M�ulos Bloques (Administraci�) */
?>
