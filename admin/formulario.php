<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 
include 'libreria/cabecera.php';
include 'libreria/bloques.php';
include 'libreria/menu.php';

/* Inicia Formulario de ingreso  */

$smarty->assign('formularioadminti', "<img src=../imagenes/admin/login.gif width=41 height=37 border=0 title=Login POC-CMS align=left><font size=5>Ingreso</font><br>Bienvenido a POC-CMS.<br><br> Ingresa un nombre y una contrase&ntilde;a v&aacute;lida para poder ingresar al sistema de Administraci&oacute;n.");

$smarty->assign('formularioadmin', "<form method=post action=index.php>
<b>Nombre:</b><br><input type=text size=18 name=login><br><br>
<b>Contrase&ntilde;a:</b><br><input type=password size=18 name=password><br>
<br><INPUT TYPE=submit name=ingresar value=Ingresar>
</form>");


/* Fin de formulario de ingreso */ 

$smarty->display('formulario.tpl');


?>
