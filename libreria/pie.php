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
$result=mysql_query("select * from cuerpo where id_cuerpo=2", $link);
while ($row=mysql_fetch_array($result))
{
echo ''.$row["valores"].'';
}
mysql_free_result($result);

// ######## Calcular tiempo de carga de página ######## //
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$tiempofinal = $mtime;
$tiempototal = ($tiempofinal - $tiempoinicial);
// ######## Calcular tiempo de carga de página ######## //

echo '<BR><font face="verdana,helvetica" color="#8A8A8A" size="1">Powered by: poccms ['.$version.'] &copy; 1999-2007 <!--Tiempo de carga: '.$tiempototal.' Segundos --></font>';

?>
