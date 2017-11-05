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

$result=mysql_query("select * from menuindex ORDER BY menu_orden", $link);
while ($row=mysql_fetch_array($result))
{
$ver = $row["menu_activar"];
if($ver == 1) {
$smarty->append(array("menu" => "<a href='".$row["direccion_local"]."' title='".$row["titulo"]."'>".$row["titulo"]."</a>"));
}
elseif ($ver == 0)  {
}
}
mysql_free_result($result);
?>

