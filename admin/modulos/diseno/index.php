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
/* Inicia Módulos Diseño (Administración) */

function diseno($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser){
	$smarty->assign('timodulo', "<img src=../imagenes/admin/diseno.gif align=middle border=0 title=Diseño> M&oacute;dulo: Dise&ntilde;o");
	//$smarty->assign('timodulo1', "[<a href='modulos.php?modulo=contenido&operacion=lectura'> Indice Contenido</a> ] [<a href='modulos.php?modulo=contenido&operacion=categoria'>Categorias</a>] [<a href='modulos.php?modulo=contenido&operacion=nuevo'>Nuevo Contenido</a>]<br><BR> ");

/* Aplicar Diseño */
if($operacion=="editar"){
$picture = $_POST["picture"];
if($picture=="../templates/prev/previsualizador.gif"){
$smarty->assign('contenido0', "<div align='center'>La plantilla seleccionada no es v&aacute;lida. <a href='modulos.php?modulo=diseno&operacion=diseno'><<- Regresar</a></div><br><br><br>");
}
else{
mysql_query("Update cuerpo Set valores='$picture' where id_cuerpo=1");
$smarty->assign('contenido0', "<div align='center'>La plantilla fue aplicada satisfactoriamente. <a href='modulos.php?modulo=diseno&operacion=diseno'><<- Regresar</a></div><br><br><br>");
}
$smarty->display('diseno/index.tpl');
}


/* Diseño */
if($operacion=="diseno"){
$result=mysql_query("select * from cuerpo where id_cuerpo=1");
while ($row=mysql_fetch_array($result))
{
$plantilla = $row["valores"];
$resto = substr ("$plantilla", 18,-4); 
}
mysql_free_result($result);
$smarty->assign('contenido0', "<center><b>Plantilla para P&aacute;gina Principal</b></center><br>
<center><table border='0' width='70%'><tr><td>Aqui puedes editar el dise&ntilde;o que tendra tu p&aacute;gina principal, 
no aplicable a tu panel de administraci&oacute;n, puedes elegir varias plantillas, 
o crear la tuya, para m&aacute;s informaci&oacute;n mira la documentaci&oacute;n.</td></tr></table></center><br><br>
<center><form action='modulos.php?modulo=diseno&operacion=editar' name='mygallery' method='post'>
<b>Plantilla en uso: </b> <i>".$resto."</i><br><br><b>Nombre de plantilla para pre-visualizar:</b><br><br>
<SELECT NAME='picture' size='1' onChange='showimage()'>

<OPTION selected value='../plantillas/prev/previsualizador.gif'>---Previsualizador---</option>");
$handle=opendir('../plantillas/prev'); 
      while ($file = readdir($handle)) { 
       if ($file != "." && $file != ".." && $file != "CVS" && $file != "previsualizador.gif" && $file != "Thumbs.db" && $file != "index.html" && $file != "leeme.txt" && $file != "LEEME.TXT") { 

$resto = substr ("$file", 0,-4);   
$smarty->append(array("contenido2" => "<OPTION value='../plantillas/prev/".$file."' name='".$resto."'>".$resto."</option>"));
} 
}
closedir($handle); 
$smarty->assign('contenido5', "</SELECT><br><br>
&nbsp &nbsp &nbsp <img src='../plantillas/prev/previsualizador.gif' name='pictures'><br><br>
<INPUT TYPE='SUBMIT' value='Editar ahora' name='editar'>
</form></center>");

$smarty->assign('contenido8', "<br><br>");
$smarty->display('diseno/index.tpl');
}
/* Diseño */

}
/* Fin Módulos Diseño (Administración) */
?>
