<?php
$cfgProgDir =  '../include/phpSecurePages/';
include($cfgProgDir . "secure.php");
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

/* Inicia Sistema de Administración */

$smarty->assign('admin1', '<div class="titulo">Bienvenido a <b>POC-CMS '.$version.'</b></div><div class="linea_horiz"></div><br><br><b>Accesos directos:</b><br><br>

<b>Apariencia:</b>
<table border="0" width="100%">
<tr>
<td valign="top" class="iconos" width="33%"><img src="../imagenes/admin/preferencias.gif" align="middle" border="0" alt="preferencias"><a href="modulos.php?modulo=preferencias&operacion=lectura">Preferencias</a><br> Cambia las preferencias generales de tu sitio web.</td>
<td valign="top" class="iconos" width="33%"><img src="../imagenes/admin/diseno.gif" align="middle" border="0" alt="Diseño"><a href="modulos.php?modulo=diseno&operacion=diseno">Dise&ntilde;o</a><br>Cambia la plantilla de tu sitio web.</td>
<td valign="top" class="iconos" width="33%"><img src="../imagenes/admin/administrador.gif" align="middle" border="0" alt="Administrador"><a href="modulos.php?modulo=administrador&operacion=datos">Administrador</a><br>Cambia los par&aacute;metros del Administrador.</td>
</tr>
</table><br>

<b>Contenidos:</b>
<table border="0" width="100%">
<tr>
<td valign="top" class="iconos" width="33%"><img src="../imagenes/admin/contenido.gif" align="middle" border="0" alt="Contenido"><a href="modulos.php?modulo=contenido&operacion=nuevo">Contenido nuevo</a><br>Agrega p&aacute;ginas nuevas a tu sitio web.</td>
<td valign="top" class="iconos" width="33%"><img src="../imagenes/admin/mensaje.gif" align="middle" border="0" alt="Mensaje Principal"><a href="modulos.php?modulo=mensaje&operacion=lectura">Mensaje principal</a><br> Edita el mensaje principal para tu sitio web.</td>
<td valign="top" class="iconos" width="33%"><img src="../imagenes/admin/noticia.gif" align="middle" border="0" alt="Noticias"><a href="modulos.php?modulo=noticia&operacion=ingresarnoticia">Noticias nueva</a><br> Agrega nuevas noticias a tu sitio web.</td>
</tr>
</table><br>

<b>Extras:</b>
<table border="0" width="100%">
<tr>
<td valign="top" class="iconos" width="33%"><img src="../imagenes/admin/bloques.gif" align="middle" border="0" alt="Bloques"><a href="modulos.php?modulo=bloques&operacion=menu">Bloques</a><br>Agrega y edita tus bloques.</td>
<td valign="top" class="iconos" width="33%"><img src="../imagenes/admin/manuales.gif" align="middle" border="0" alt="Comentarios"><a href="modulos.php?modulo=comentarios&operacion=menu">Comentarios</a> <br>Gestiona los comentarios en tu sitio web.</td>
<td valign="top" class="iconos" width="33%"><img src="../imagenes/admin/menu.gif" align="middle" border="0" alt="Menu"><a href="modulos.php?modulo=menu&operacion=menu">Men&uacute;</a> <br>Agrega o edita tu men&uacute; principal.</td>
</tr>
</table>

<br><br>
');

/* Fin de Sistema de Administración */ 

$smarty->display('index.tpl');


?>
