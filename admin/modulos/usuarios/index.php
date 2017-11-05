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
/* Inicia Módulos Usuarios (Administración) */

function usuarios($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$npass){
	$smarty->assign('timodulo', "<img src=../imagenes/admin/usuarios.gif align=middle border=0 title=Usuarios> M&oacute;dulo: Usuarios");

	//$smarty->assign('timodulo1', "[<a href='modulos.php?modulo=contenido&operacion=lectura'> Agregar Usuario</a> ] <br><BR> ");



/* Menu Usuarios */
if($operacion=="menu"){
$palabra = $_GET["palabra"];
$result=mysql_query("select * from usuarios where ID_usuarios");
$r=mysql_num_rows($result);
$smarty->assign('contenido0', "<center>Total de usuarios registrados: <b>".$r."</b><br></center>
<center>Por favor elige una letra para ver los datos de usuario.<br><br></center> 
<center>[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=a>a</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=b>b</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=c>c</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=d>d</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=e>e</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=f>f</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=g>g</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=h>h</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=i>i</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=j>j</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=k>k</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=l>l</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=m>m</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=n>n</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=o>o</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=p>p</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=q>q</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=r>r</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=s>s</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=t>t</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=u>u</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=v>v</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=w>w</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=x>x</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=y>y</a>]
[<a href=modulos.php?modulo=usuarios&operacion=menu&palabra=z>z</a>]</center><br><br>");
if($palabra) {

if (!isset($pg))

$pg = 0; // $pg es la pagina actual
$cantidad=10; // cantidad de resultados por página
$inicial = $pg * $cantidad;

// Datos de conexión a la base
$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=5; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * FROM usuarios where nombre LIKE '$palabra%' LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "SELECT * FROM usuarios where nombre LIKE '$palabra%'"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

while($array = mysql_fetch_array($cad)) 
	{

$smarty->append(array("contenido2" => "<br><center><table width='50%' border='0'>
<tr><td class='noticia1'><b>Id:</b></td><td class='noticia2'>".$array["ID_usuarios"]."</td></tr>
<tr><td class='noticia1'><b>Nombre o Nick: </b></td><td class='noticia2'> ".$array["nombre"]."</td></tr>
<tr><td class='noticia1'><b>Web: </b></td><td class='noticia2'><a href='".$array["web"]."' target='blank'>".$array["web"]."</a></td></tr>
<tr><td class='noticia1'><b>Nacionalidad: </b></td><td class='noticia2'>".$array["pais"]."</td></tr>
<tr><td class='noticia1'><b>E-mail: </b></td><td class='noticia2'><a href='mailto:".$array["correo"]."'>".$array["correo"]."</a></td></tr>
<tr><td class='noticia1'><b>Fecha de Ingreso: </b></td><td class='noticia2'>".$array["fecha"]."</td></tr>

<!-- <tr><td class='noticia1'><b>Acci&oacute;n: </b></td><td class='noticia2'>&nbsp;&nbsp;&nbsp;&nbsp;<a href='modulos.php?modulo=usuarios&operacion=editar&ID_usuarios=".$array["ID_usuarios"]."'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> <a href='modulos.php?modulo=usuarios&operacion=borrar&ID_usuarios=".$array["ID_usuarios"]."&nombre=".$array["nombre"]."'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></td></tr>-->

</table></center>"));
}
$con=mysql_close($con);

// Creando los enlaces de paginación
$smarty->assign('contenido3', "<br><br><center><p>P&aacute;ginas<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('contenido4', "<a href='modulos.php?modulo=usuarios&operacion=menu&palabra=".$palabra."&pg=".$url."'>« Anterior</a> ");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("contenido6" => "<font face=Arial size=2 color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("contenido7" => "<a href='modulos.php?modulo=usuarios&operacion=menu&palabra=".$palabra."&pg=".$i."'>".$i."</a> "));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('contenido77', "<a href='modulos.php?modulo=usuarios&operacion=menu&palabra=".$palabra."&pg=".$url."'>Siguiente »</a>");
}
else {
echo " ";
}
$smarty->assign('contenido8', "</p></center>");
}
$smarty->display('usuarios/index.tpl');
}
/* Menu Usuarios */


}
/* Fin Módulos Usuarios (Administración) */
?>
