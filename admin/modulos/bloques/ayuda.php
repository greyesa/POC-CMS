<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 
include "../../../config.inc.php";
?>

<html>
<head>
<TITLE><?php echo ''.$row["titulo"].' Administraci&oacute;n [POC-CMS]-['.$version.']'; ?></TITLE>
<style type="text/css">
h1 {
FONT-FAMILY: Arial, Helvetica, sans-serif;
FONT-SIZE: 20px;
color:#666666;
}
.caja1 {
PADDING-RIGHT: 3px;
PADDING-LEFT: 3px;
FONT-FAMILY: Arial, Helvetica, sans-serif;
FONT-SIZE: 12px;
PADDING-BOTTOM: 1px;
MARGIN: 0px 0px 0px 0px;
PADDING-TOP: 1px;
color: #666666;
background-color: #ffffff;
border: 1px solid #666666;
}
</style>

</head>

<body bgcolor="#ececec">



<table width='100%' border='0'>
<TR>
<TD class='caja1'>
<h1>POC-CMS <br> Ayuda para Bloques</h1>

<strong>Tipos de bloques soportados.</strong><br><br>

<strong>POC-CMS</strong> soporta los bloques del tipo:<br><br>
1. <strong>HTML</strong><br>
Cuenta con la ayuda de un editor, donde podr&aacute; darle formato a su contenido.<br><br>

2. <strong>RSS</strong><br>
Aqu&iacute; debe ingresar la direcci&oacute;n completa donde se encuentra el archivo del tipo *.rss/*.xml para compartir informaci&oacute;n.<br> Ejemplo. http://www.poccms.com/rss.php.<br><br> <em>Nota: RSS es un archivo por el cual podemos publicar informaci&oacute;n de otro sitio web atravez de un archivo XML.</em><br><br>

3. <strong>PHP</strong><br>
Aqu&iacute; puede ingresar contenido del tipo *.php, por favor debe tener cuidado de que su contenido inicie con el simbolo de apertura del lenguaje solamente agregando <strong><\?</strong> NO poniendolo de esta manera (<\?php) ya que le dara error de lectura, por favor tener cuidado con esto.<br><br>

4. <strong>TEXTO</strong><br>
Puedes ingresar texto sin ningun tipo de formato.<br><br>

<center><a href="javascript:window.close();">[ Cerrar ventana ]</a></center><br><br>
</TD>
</TR>
</table>

</body>

</html>
