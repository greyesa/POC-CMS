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

/* Inicia Módulos Estadisticas (Administración) */

function estadisticas($modulo,$operacion,$smarty,$version){
	$smarty->assign('timodulo', "<img src=../imagenes/admin/estadisticas.gif align=middle border=0 title=Estadisticas> M&oacute;dulo: Estad&iacute;sticas");
	$smarty->assign('pref1', " <a href=javascript:history.back()><<- Regresar</a> ");

/* Menu de noticias */
if($operacion=="lectura"){
	$result=mysql_query("select * from administrador where ID_adm=1");
while ($row=mysql_fetch_array($result))
{
	$smarty->assign('pref2', "Las estadisticas estan siendo contabilizadas en la fecha que se instalo <br><b>POC-CMS</b>: ".$row["fecha"]."");
}
mysql_free_result($result);

$smarty->assign('pref3', "Versi&oacute;n de t&uacute; sistema: <B>POC-CMS $version</B> <BR><b>VISITAS TOTALES</b>");


//Modulo de estadisticas generales

	
/* Estadisticas del contador general de visitas*/



$result2=mysql_query("select id from contador");
while ($row=mysql_fetch_array($result2))
{
$smarty->assign('pref0', "".$row["id"]."");
}
mysql_free_result($result2);
    
 $smarty->assign('pref4', "<center><table width=85% border=0><tr> <td class=noticia1><div align=center><strong>Miscel&aacute;neas</strong></div></td><td class=noticia1><div align=center><strong>Registros</strong></div></td></tr>");


// ESTADISTICAS DE USUARIOS //
 $smarty->assign('pref5', "<tr>");

$result=mysql_query("select * from usuarios where ID_usuarios");
$r=mysql_num_rows($result);
$smarty->assign('pref6', "<td class=noticia2>Total de usuarios registrados: </td><td class=noticia2><center>$r</center></td>");

mysql_free_result($result);
$smarty->assign('pref7', "</tr>");


// ESTADISTICAS DE NOTICIAS //
$smarty->assign('pref8', "<tr>");

$result=mysql_query("select * from noticia where ID_noticia");
$r=mysql_num_rows($result);
$smarty->assign('pref9', "<td class=noticia2>Total noticias ingresadas: </td><td class=noticia2><center>$r</center></td>");

mysql_free_result($result);

$smarty->assign('pref10', "</tr>");

// ESTADISTICAS DE DESCARGAS //
$result=mysql_query("select * from uldescargas where id_ul");
$r=mysql_num_rows($result);
$smarty->assign('pref12', "<tr>");
$smarty->assign('pref13', "<td class=noticia2>Total descargas ingresadas: </td><td class=noticia2><center>$r</center></td>");
mysql_free_result($result);
$smarty->assign('pref14', "</tr>");


// ESTADISTICAS DE FORO //

$smarty->assign('pref15', "<tr>");

//$result=mysql_query("select * from foro where id");
//$r=mysql_num_rows($result);
//$smarty->assign('pref16', "<td class=noticia2>Total mensajes ingresados en el foro: </td><td class=noticia2><center>$r</center></td>");

//mysql_free_result($result);

$smarty->assign('pref17', "</tr>");


// ESTADISTICAS DE ENLACES //
$smarty->assign('pref18', "<tr>");


//$result=mysql_query("select * from enlaces where ID_enlace");
//$r=mysql_num_rows($result);
$smarty->assign('pref19', "<td class=noticia2>Total enlaces ingresados: </td><td class=noticia2><center>$r</center></td>");

//mysql_free_result($result);

$smarty->assign('pref20', "</tr>");


// ESTADISTICAS DE ENCUESTAS //
$smarty->assign('pref21', "<tr>");


$result=mysql_query("select * from votacion_tema where id_vot");
$r=mysql_num_rows($result);
$smarty->assign('pref22', "<td class=noticia2>Total encuestas ingresadas: </td><td class=noticia2><center>$r</center></td>");

mysql_free_result($result);
$smarty->assign('pref23', "</tr>");


// ESTADISTICAS DE BANNERS //
$smarty->assign('pref24', "<tr>");


//$result=mysql_query("select * from banner where id_banner");
//$r=mysql_num_rows($result);
$smarty->assign('pref25', "<td class=noticia2>Total banners ingresados: </td><td class=noticia2><center>$r</center></td>");
 
//mysql_free_result($result);
$smarty->assign('pref26', "</tr>");


// ESTADISTICAS DE ARTICULOS //
$smarty->assign('pref27', "<tr>");

//$result=mysql_query("select * from articulos where Id_articulos");
//$r=mysql_num_rows($result);
$smarty->assign('pref28', "<td class=noticia2>Total articulos ingresados: </td><td class=noticia2><center>$r</center></td>");

//mysql_free_result($result);
$smarty->assign('pref29', "</tr>");

// ESTADISTICAS DE MANUALES ON-LINE //

$smarty->assign('pref30', "<tr>");

//$result=mysql_query("select * from manonline where id_man");
//$r=mysql_num_rows($result);
$smarty->assign('pref31', "<td class=noticia2>Total manuales on-line ingresados: </td><td class=noticia2><center>$r</center></td>");

//mysql_free_result($result);
$smarty->assign('pref32', "</tr></table></center>");



// ESTADISTICAS DE PAGINAS //

/*echo'<br><br><center><b>PAGINAS MAS VISUALIZADAS</b></center><BR>';

$result=mysql_query("select * from estadisticas_pagina,cuerpo,contador where pag_contador", $link);
echo'<center><TABLE WIDTH="85%" BORDER="0">';

echo '<tr> <td width="60%" bgcolor="#CE272A"><div align="center"><strong><font color="#FFFFFF">PÃ¡gina</font></strong></div></td><td width="30%" bgcolor="#CE272A"><div align="center"><strong><font color="#FFFFFF">Grafica</font></strong></div></td><td width="10%" bgcolor="#CE272A"><div align="center"><font color="#FFFFFF"><strong>Impresiones</td></tr>';

while ($row=mysql_fetch_array($result))
{
$resto = substr ("".$row["pag_nombre"]."", 12,25); 
echo'	<TR bgcolor="#CCCCCC">';
echo'		<TD bgcolor="#DBDBDB">'.$resto.'</TD>';
echo'<td bgcolor="#DBDBDB">';

<IMG height="9" WIDTH="<? echo $row["pag_contador"]*100/$row["id"]?>%" SRC="../imagenes/estadisticas/imagen/green.jpg">
</td>
<?
echo' <TD bgcolor="#DBDBDB"><center>'.$row["pag_contador"].'</center></TD>';
echo'	</TR>';
}
mysql_free_result($result);
echo'	</TABLE></center>';*/




// Estadisticas del navegador 
$result=mysql_query("select * from estadisticas_brow,contador,cuerpo order by tema desc");
$smarty->assign('pref33', "
<BR><BR><center><b>NAVEGADORES</b></center>
<center><table width=85% border=0><tr> <td class=noticia1><div align=center><strong>Navegador</strong></div></td><td class=noticia1><div align=center><strong>Grafica</strong></div></td><td class=noticia1><div align=center><strong>impresiones</strong></div></td></tr>");
while ($row=mysql_fetch_array($result))
{
$tamano1 = $row["contador"]*100/$row["id"];

	$smarty->append(array('pref34' => "
<tr>
<td class=noticia2><img src='".$row["imagen_brow"]."'> ".$row["nombre_bro"]."</td>

<td class=noticia2><IMG height='9' WIDTH='$tamano1%' SRC='../imagenes/estadisticas/imagen/green.jpg'>
</td>
<td class=noticia2><center>".$row["contador"]."</center></td>
</tr>"));
}
mysql_free_result($result);
$smarty->assign('pref35', "</tr></table></center>");


// Estadisticas Sistema Operativo
$result=mysql_query("select * from estadisticas_os,cuerpo,contador order by tema desc");
$smarty->assign('pref36', "<br><br><center><b>SISTEMAS OPERATIVOS</b></center>
<center><table width=85% border=0><tr> <td class=noticia1><div align=center><strong>Sistema Operativo</strong></div></td><td class=noticia1><div align=center><strong>Grafica</strong></div></td><td class=noticia1><div align=center><strong>impresiones</strong></div></td></tr>");
while ($row=mysql_fetch_array($result))
{
$tamano2 = $row["contador"]*100/$row["id"];
$smarty->append(array('pref37' => "
<tr> 
<td class=noticia2><img src='".$row["imagen_os"]."'> ".$row["nombre_os"]."</td>
<td class=noticia2>
<IMG height='9' WIDTH='$tamano2%' SRC='../imagenes/estadisticas/imagen/green.jpg'>
</td>

<td class=noticia2><center>".$row["contador"]."</center></td>
</tr>"));
}
mysql_free_result($result);
$smarty->assign('pref38', "</table>");




// Estadisticas por mes
$result = mysql_query("SELECT * FROM estadisticas_mes,contador,cuerpo");
$smarty->assign('pref39', "<br><br><center><b>VISITAS POR MES</b></center>
<center><table width=85% border=0><tr> <td class=noticia1><div align=center><strong>Mes</strong></div></td><td class=noticia1><div align=center><strong>Grafica</strong></div></td><td class=noticia1><div align=center><strong>impresiones</strong></div></td></tr>");

while ($row=mysql_fetch_array($result))
{
$tamano3 = $row["hits"]*100/$row["id"];
$smarty->append(array('pref40' => "<tr> 
<td class=noticia2>".$row["mes_nom"]."</td>
<td class=noticia2>

<IMG height='9' WIDTH='$tamano3%' SRC='../imagenes/estadisticas/imagen/green.jpg'>
</td>

<td class=noticia2><center>".$row["hits"]."</center></td>
</tr>"));
}
mysql_free_result($result);
$smarty->assign('pref41', "</table>");



// Estadisticas por semana

$result = mysql_query("SELECT * FROM estadisticas_semana,contador,cuerpo");
$smarty->assign('pref42', "<br><br><center><b>VISITAS POR SEMANA</b></center>
<center><table width=85% border=0><tr> <td class=noticia1><div align=center><strong>Dia</strong></div></td><td class=noticia1><div align=center><strong>Grafica</strong></div></td><td class=noticia1><div align=center><strong>impresiones</strong></div></td></tr>");

while ($row=mysql_fetch_array($result))
{
$tamano4 = $row["hits"]*100/$row["id"];
$smarty->append(array('pref43' => "<tr> 
<td class=noticia2>".$row["nom_semana"]."</td>
<td class=noticia2>

<IMG height='9' WIDTH='$tamano4%' SRC='../imagenes/estadisticas/imagen/green.jpg'>
</td>

<td class=noticia2><center>".$row["hits"]."</center></td>
</tr>"));
}
mysql_free_result($result);
$smarty->assign('pref44', "</table>");



// Estadisticas por hora
$result = mysql_query("SELECT * FROM estadisticas_hora,contador,cuerpo");
$smarty->assign('pref45', "<br><br><center><b>VISITAS POR HORA</b></center>
<center><table width=85% border=0><tr> <td class=noticia1><div align=center><strong>Hora</strong></div></td><td class=noticia1><div align=center><strong>Grafica</strong></div></td><td class=noticia1><div align=center><strong>impresiones</strong></div></td></tr>");

while ($row=mysql_fetch_array($result))
{
$tamano5 = $row["hits"]*100/$row["id"];
$smarty->append(array('pref46' => "<tr> 
<td class=noticia2>".$row["nom_hora"]."</td>
<td class=noticia2>

<IMG height='9' WIDTH='$tamano5%' SRC='../imagenes/estadisticas/imagen/green.jpg'>
</td>

<td class=noticia2><center>".$row["hits"]."</center></td>
</tr>"));

}
mysql_free_result($result);
$smarty->assign('pref47', "</table>");

$smarty->display('estadisticas/index.tpl');
}
/* Estadisticas */
}
/* Fin Módulos Estadisticas (Administración) */
?>
