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
/* Inicia Módulos Informacion del sistema (Administración) */

function sisinfo($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser){
	$smarty->assign('timodulo', "<img src=../imagenes/admin/sisinfo.png align=middle border=0 title=Informaci&oacute;n del Sistema> M&oacute;dulo: Informaci&oacute;n del Sistema");


/* Panel */
if($operacion=="panel"){

$smarty->display('sisinfo/index.tpl');
}
/* Menu Panel */


}
/* Fin Módulos Informacion del Sistema (Administración) */
?>
