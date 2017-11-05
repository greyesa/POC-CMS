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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<?php
$result=mysql_query("select * from cabecera", $link);
while ($row=mysql_fetch_array($result))
{
print " \n";
echo     '<TITLE>'.$row["titulo"].'</TITLE>';
print " \n";
}
mysql_free_result($result);
?>
<SCRIPT LANGUAGE="JavaScript">
function imprimir() {
  if (window.print)
    window.print()
  else
    alert("Disculpe, su navegador no soporta esta opci&oacute;n.");
}

</SCRIPT>
<style type="text/css">
body {
	font-size: 12px;
	font-family: arial, helvetica, sans-serif;
	color: #666666;
}

a:link{
color: #000000;
text-decoration: none;
font-weight: bold;
}
a:visited{
color: #000000;
text-decoration: none;
font-weight: bold;
}
a:hover{
color: #000000;
text-decoration: underline;
font-weight: bold;
}
</style>




</HEAD>
<?php
/* Inicia Impresion */
echo "<body>";
/********** Capturar datos por GET *************/

/* Noticia */
$modulo = $_GET['modulo'];
$ID_noticia = $_GET['ID_noticia'];
/* Noticia */

/* Documentos */
$id_con = $_GET['id_con'];
/* Documentos */

/********** Capturar datos por GET *************/

//Modulo de impresion de noticias.
if ($modulo=="noticia") { 

$result=mysql_query("select * from cabecera,administrador");
while ($row=mysql_fetch_array($result))
{
echo'Informaci&oacute;n extraida de: <b> '.$row["titulo"].'</b><br>';
echo'Direcci&oacute;n Web: <b> '.$row["web"].'</b><br>';
echo'Correo electr&oacute;nico: <b> '.$row["correo"].'</b><br>';
echo'Documento: <b> Versi&oacute;n Imprimible. </b><br>';
echo'<A HREF=javascript:imprimir()>[ Imprimir P&aacute;gina ]</A><br><br>';
echo'<b>NOTICIAS</b><br><br>';
}
mysql_free_result($result);

$result=mysql_query("select * from noticia WHERE ID_noticia='$ID_noticia' ");
while ($row=mysql_fetch_array($result))
{
echo '<b>'.$row["titulo"].'</b><br>';
echo '<b>Escrito por:</b> '.$row["usuario"].'<br> '.$row["fecha"].'<br><br>';
echo ''.$row["texto"].'<br><br>';
echo ''.$row["mas_noti"].'<br><br><br>';
}
mysql_free_result($result);
echo '<center><a href="javascript:window.close();">[ Cerrar ventana ]</a></center>';
}



//Modulo para imprimir documentos o contenido web.
if ($modulo=="documentos"){

$result=mysql_query("select * from cabecera,administrador");
while ($row=mysql_fetch_array($result))
{
echo'Informaci&oacute;n extraida de: <b> '.$row["titulo"].'</b><br>';
echo'Direcci&oacute;n Web: <b> '.$row["web"].'</b><br>';
echo'Correo electr&oacute;nico: <b> '.$row["correo"].'</b><br>';
echo'Documento: <b> Versi&oacute;n Imprimible. </b><br>';
echo'<A HREF=javascript:imprimir()>[ Imprimir P&aacute;gina ]</A>';
echo'<br><br>';
echo '<b>DOCUMENTOS</b><br><br>';
}
mysql_free_result($result);

$result=mysql_query("select * from contenido WHERE id_con='$id_con'");
while ($row=mysql_fetch_array($result))
{

echo '<b>'.$row["con_ti"].'</b><br><br>';
echo ''.$row["con_tex1"].'<br><br>';
echo ''.$row["con_tex2"].'<br>';
echo '<b>Fecha de ingreso:</b> '.$row["con_fecha"].'<br><br>';
}
mysql_free_result($result);
echo "<center><a href=javascript:window.close();>[ Cerrar ventana ]</a></center>";
}

/* Fin de Impresion */

echo "</body>";
echo "</html>";


?>
