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
/*$result=mysql_query("select * from finalpa", $link);
while ($row=mysql_fetch_array($result))
{
echo ''.$row["texto"].'<BR>';
}
mysql_free_result($result);*/

// ######## Calcular tiempo de carga de página ######## //
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$tiempofinal = $mtime;
$tiempototal = ($tiempofinal - $tiempoinicial);
// ######## Calcular tiempo de carga de página ######## //
echo '<font color="#666666"><B>Powered by POC-CMS ['.$version.'] &copy; 1999-2007.</B> <a href="http://www.poccms.com" target="_blank">http://www.poccms.com</a> <br>Simplificando la vida y compartiendo conocimientos.&nbsp;&nbsp;<br>Con licencia activa GNU/GPL versi&oacute;n 2.&nbsp;&nbsp;<!--Tiempo de carga: '.$tiempototal.' Segundos --></font>';

?>
