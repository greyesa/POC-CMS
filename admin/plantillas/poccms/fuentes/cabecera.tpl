{include file="css.tpl"}
{$codificacion}
{literal}
<!--  Menu -->
<script language="JavaScript" type="text/javascript" src="../include/JSCookMenu/JSCookMenu.js"></script>
<link rel="stylesheet" href="../include/JSCookMenu/ThemeOffice/theme.css" type="text/css" />
<script language="JavaScript" type="text/javascript" src="../include/JSCookMenu/ThemeOffice/theme.js"></script>
<!--  Menu -->
{/literal}

</head>
<!--  ################## Fin de Cabecera  ################## -->

<!--  ################## Inicia Cuerpo de Pagina  ################## -->

<body>
<!-- Logotipo -->
<div id="cabecera"><div class="ancho_general">
{$tituloadm}<br> 
<font size="4" color="#000000"><b>Sistema de Administraci&oacute;n </b></font><br>

</div>
</div>
<!-- Logotipo -->

<table border="0" align="center">
<tr>
<td class="caja2">
 
 
<table align="center" CELLSPACING=0 CELLSPACING=0 width="752" border="0">
<tr>
<td class="login"><a href="http://www.poccms.com" target="_blank" alt="Powered by POC-CMS [{$version}]"><img src="../imagenes/poccms_small.gif" border="0" align="right"></a>{$cubologin} {$loginmensaje1} {$loginmensaje2} {$loginmensaje3}[{$desconectar}]<br>{$loginmensaje4}

<!--  ################## Inicia Fecha  ################## -->
&nbsp;&nbsp;&nbsp; <BR>{$fecha} 
<!--  ################## Fin Fecha  ################## -->
</td>
</tr>
</table>

<table align="center" CELLSPACING=0 CELLSPACING=0 width="752" height="26" border="0">
<tr>
<td class="menu">
<!-- ################## Inicia Menu  ################## --> 
<div id="myMenuID">
<script language="JavaScript" type="text/javascript"><!--
var myMenu =
[
	_cmSplit,
	[null, 'Inicio', 'index.php', null, null],  // a menu item
        _cmSplit,
	
	[null, 'Configuraci&oacute;n', '#', null, null,
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Administrador', 'modulos.php?modulo=administrador&operacion=datos', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Dise&ntilde;o', 'modulos.php?modulo=diseno&operacion=diseno', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'E-mail', 'modulos.php?modulo=email&operacion=preferencias', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Idioma', '#', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Llaves', '#', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Normas', '#', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Preferencias', 'modulos.php?modulo=preferencias&operacion=lectura', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Seguridad', 'modulos.php?modulo=seguridad&operacion=descargas', null, null],
	],  // a menu item
	_cmSplit,

	[null, 'Contenidos', '#', null, null,
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Articulos', '#', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Ayuda', '#', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Eventos', 'modulos.php?modulo=eventos&operacion=lectura', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Contenido', 'modulos.php?modulo=contenido&operacion=lectura', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Mensaje', 'modulos.php?modulo=mensaje&operacion=lectura', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Noticias', 'modulos.php?modulo=noticia&operacion=lectura', null, null],
	],  // a menu item
	_cmSplit,

	[null, 'Dependencias', '#', null, null,
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Banners', '#', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Bloques', 'modulos.php?modulo=bloques&operacion=menu', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Descargas', 'modulos.php?modulo=descargas&operacion=lectura', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Comentarios', 'modulos.php?modulo=comentarios&operacion=menu', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Encuestas', 'modulos.php?modulo=encuesta&operacion=menu', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Enlaces', '#', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Foros', '#', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Men&uacute;', 'modulos.php?modulo=menu&operacion=menu', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Manuales', '#', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'M&oacute;dulos', '#', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'PHP', '#', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'MySQL', '#', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Usuarios', 'modulos.php?modulo=usuarios&operacion=menu', null, null],
	],  // a menu item
	_cmSplit,

	[null, 'Herramientas', '#', null, null,
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'PDF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '#', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'RSS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '#', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Estad&iacute;sticas', 'modulos.php?modulo=estadisticas&operacion=lectura', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Informaci&oacute;n del Sistema', 'modulos.php?modulo=sisinfo&operacion=panel', null, null],
//['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'ZIP', '#', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Donaci&oacute;n', 'modulos.php?modulo=donacion&operacion=lectura', null, null],
	],  // a menu item
	_cmSplit,

	[null, 'Ayuda', '#', null, null,
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Actualizar', 'modulos.php?modulo=info&operacion=actualizar', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Autor-Director', 'modulos.php?modulo=info&operacion=director', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Contribuir', 'modulos.php?modulo=info&operacion=contribuir', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Cr&eacute;ditos', 'modulos.php?modulo=info&operacion=creditos', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Documentaci&oacute;n', 'modulos.php?modulo=info&operacion=documentacion', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Licencia', 'modulos.php?modulo=info&operacion=licencia', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Mensajes', 'modulos.php?modulo=info&operacion=mensajes', null, null],
['<img src="../include/JSCookMenu/ThemeOffice/arrow.gif">', 'Web', 'modulos.php?modulo=info&operacion=web', null, null],
	],  // a menu item
	_cmSplit,
	
];
cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
--></script></div>
<!--  ################## Fin Menu  ################## -->
</td></tr></table>

<table align="center" CELLSPACING=0 CELLSPACING=0 width="752" border="0">
<tr>

<!--  ################## Inicia Bloque Izquierdo  ################## -->  

<!--  ################## Fin Bloque Izquierdo  ################## --> 

<td width="100%" class="caja" valign="top">


