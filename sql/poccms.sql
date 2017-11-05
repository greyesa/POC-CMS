-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 07-07-2007 a las 07:21:39
-- Versión del servidor: 5.0.38
-- Versión de PHP: 5.2.1

-- 
-- Base de datos: `poccms`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `activadores`
-- 

CREATE TABLE `activadores` (
  `id_act` int(11) NOT NULL auto_increment,
  `nom` varchar(255) NOT NULL default '',
  `val` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id_act`)
) TYPE=MyISAM  AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `activadores`
-- 

INSERT INTO `activadores` (`id_act`, `nom`, `val`) VALUES 
(1, 'act_bann', '1'),
(2, 'act_art', '0'),
(3, 'sesion', '0'),
(4, 'clave', 'poccms_usuarios'),
(5, 'llave', 'poccms_usuarios'),
(6, 'act_not', '1'),
(7, 'act_men', '1'),
(8, 'ver_art', '5'),
(9, 'ver_noticia', '7');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `administrador`
-- 

CREATE TABLE `administrador` (
  `ID_adm` int(11) NOT NULL auto_increment,
  `correo` varchar(255) default NULL,
  `contrasena` varchar(255) default NULL,
  `web` varchar(255) default NULL,
  `nombre` varchar(255) default NULL,
  `pais` varchar(100) default NULL,
  `nivel` varchar(255) NOT NULL default '',
  UNIQUE KEY `ID_adm` (`ID_adm`)
) TYPE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `administrador`
-- 

INSERT INTO `administrador` (`ID_adm`, `correo`, `contrasena`, `web`, `nombre`, `pais`, `nivel`) VALUES 
(1, 'info@localhost', '21232f297a57a5a743894a0e4a801fc3', 'http://localhost/poc', 'admin', 'Guatemala', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `bloques`
-- 

CREATE TABLE `bloques` (
  `ID_bloque` int(11) NOT NULL auto_increment,
  `orden` int(11) NOT NULL default '0',
  `titulo` varchar(255) default NULL,
  `texto` text,
  `imagen` text,
  `tipo` varchar(255) default NULL,
  `ver` varchar(255) default NULL,
  `posicion` varchar(255) default NULL,
  PRIMARY KEY  (`ID_bloque`),
  UNIQUE KEY `ID_bloque` (`ID_bloque`)
) TYPE=MyISAM  AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `bloques`
-- 

INSERT INTO `bloques` (`ID_bloque`, `orden`, `titulo`, `texto`, `imagen`, `tipo`, `ver`, `posicion`) VALUES 
(1, 1, 'Categorias', '<? \r\n/* ############### Parte del Modulo para visualizar contenido ################## */\r\n\r\n/* ----------Visualiza Contenido, titulo de Categoria--------------*/\r\n\r\n$link=mysql_connect("$nhost","$nuser","$npass"); /* Datos de conexion a base de datos */\r\n\r\nmysql_select_db("$nbase", $link);  /* Seleccionamos la Base de datos */\r\n\r\n$result=mysql_query("select * from contenido_or ORDER BY cont_or_fecha DESC LIMIT 80", $link);\r\n\r\nwhile ($row=mysql_fetch_array($result)) /* La consulta */\r\n{\r\n\r\n/* Visualizamos los datos */\r\n/* Incluye parametros de enlace */\r\n\r\necho ''<a href="modulos.php?modulo=contenido&operacion=lecturacat&cont_ti=''.$row["cont_ti"].''&identificador=''.$row["ID_cont_or"].''"><b>- ''.$row["cont_ti"].''</b></a>'';\r\n\r\n}\r\nmysql_free_result($result);\r\n/* ----------Visualiza Contenido, titulo de Categoria --------------*/\r\n?>', 'separador.gif', 'php', '1', 'Derecho'),
(2, 2, 'Contenidos', '<? \r\n/* ############### Parte del Modulo para visualizar contenido ################## */\r\n\r\n/* ----------Visualiza Contenido, titulo de pagina--------------*/\r\n\r\n$link=mysql_connect("$nhost","$nuser","$npass"); /* Datos de conexion a base de datos */\r\n\r\nmysql_select_db("$nbase", $link);  /* Seleccionamos la Base de datos */\r\n\r\n$result=mysql_query("select * from contenido ORDER BY con_ti DESC LIMIT 7", $link);\r\n\r\nwhile ($row=mysql_fetch_array($result)) /* La consulta */\r\n{\r\n\r\n/* Visualizamos los datos */\r\n/* Incluye parametros de enlace */\r\n\r\necho ''<a href="modulos.php?modulo=contenido&operacion=lectura&id_con=''.$row["id_con"].''&identificador=''.$row["con_iden"].''"><b>- ''.$row["con_ti"].''</b></a>'';\r\necho''<br>'';\r\n\r\n}\r\nmysql_free_result($result);\r\n/* ----------Visualiza Contenido, titulo de pagina --------------*/\r\n?>', 'separador.gif', 'php', '1', 'Derecho'),
(3, 3, 'Sistema de Votaci&oacute;n', '<? \r\n/* ################# Parte del modulo de sistema de Encuesta ################### */\r\n\r\n$result1=mysql_query("select * from cabecera");\r\n\r\nwhile ($row1=mysql_fetch_array($result1))\r\n{\r\n$difhor = $row1["hora_ser"]; //Diferencia horaria entre el server y la Laguna.\r\n}\r\nmysql_free_result($result1);\r\n$ajuste = ($difhor * 60 * 60); //Ajustamos por horas 60 seg* 60 min.\r\n$hora = date("g:i:s",time() + $ajuste); //la hora es igual a la hora del server + el ajuste.\r\n\r\n$fecha_votacion = gmdate("Y-m-d $hora");\r\n$result2=mysql_query("select * from votacion_tema where (vot_activar=1) AND (vot_pub <=  sysdate()) AND (vot_fin_pub >= sysdate()) limit 1");\r\n\r\nwhile ($row2=mysql_fetch_array($result2))\r\n{\r\n\r\nif($row2["tipo"]=="encuesta"){\r\n\r\necho ''<table border="0"><tr><td><form action="modulos.php?modulo=encuestas&operacion=votar&op=encuesta" method="POST"><table>'';\r\n\r\necho ''<tr>\r\n<td><input type="hidden" name="ipcontrol" value="encuestaip"><input type="hidden" name="op" value="encuesta"> ''.$row2["vot_tema"].''<input type="hidden" name="vot_tema" value="''.$row2["id_vot"].''"></td>\r\n</tr>'';\r\n\r\necho ''</tr><td><table>'';\r\n\r\n$id_vot2 = $row2["id_vot"];\r\n\r\n$result3=mysql_query("select * from votacion_preg WHERE vot_iden_preg=''$id_vot2'' ORDER BY vot_fecha_preg asc");\r\n\r\nwhile ($row3=mysql_fetch_array($result3)){\r\n\r\necho "<tr><td><input type=''radio'' name=''vot_pregunta'' value=''".$row3["ID_vot_preg"]."''><input type=''hidden'' name=''vot_iden_preg'' value=''".$row3["vot_iden_preg"]."''></td><td>".$row3["vot_pregunta"]."</td>";\r\n\r\n}\r\nmysql_free_result($result3);\r\n\r\necho "</tr></table></td>\r\n</tr>\r\n</table>\r\n<input type=''submit'' name=''votar'' value=''Votar''></form><font size=''1''><a href=''modulos.php?modulo=encuestas&operacion=resultados&id_vot=".$id_vot2."''>Ver Resultados</a><br><a href=''modulos.php?modulo=encuestas&operacion=encuestas''>Mas Encuestas</a></font>\r\n</td>\r\n</tr>\r\n</table>";\r\n}\r\n\r\nelseif($row2["tipo"]=="trivia")\r\n{\r\necho "Hay una Trivia Disponible.<br><a href=''modulos.php?modulo=encuestas&operacion=trivia&iden_cat_triv=".$row2["iden_cat_triv"]."''>pulsa aqui.</a><br><br>";\r\n}\r\n}\r\nmysql_free_result($result2);\r\n\r\n/* ################# Parte del modulo de sistema de Encuesta ################### */\r\n\r\n?>', 'separador.gif', 'php', '0', 'Derecho'),
(4, 4, 'Noticias', '<? \r\n/* ############### Parte del Modulo para visualizar noticias ################## */\r\n\r\n/* ----------Visualiza noticias, titulo de Categoria--------------*/\r\n\r\n$link=mysql_connect("$nhost","$nuser","$npass"); /* Datos de conexion a base de datos */\r\n\r\nmysql_select_db("$nbase", $link);  /* Seleccionamos la Base de datos */\r\n\r\n$result=mysql_query("select * from noticia_or ORDER BY not_or_fecha", $link);\r\n\r\nwhile ($row=mysql_fetch_array($result)) /* La consulta */\r\n{\r\n\r\n/* Visualizamos los datos */\r\n/* Incluye parametros de enlace */\r\n\r\necho ''<a href="modulos.php?modulo=noticia&operacion=lecturacat&ID_not_or=''.$row["ID_not_or"].''&noticia_ti=''.$row["not_ti"].''"><b>- ''.$row["not_ti"].''</b></a>'';\r\necho''<br>'';\r\n\r\n}\r\nmysql_free_result($result);\r\n/* ----------Visualiza noticias, titulo de Categoria --------------*/\r\n?>', 'separador.gif', 'php', '1', 'Derecho'),
(5, 5, 'Eventos', '<? \r\n/* ############### Parte del Modulo para visualizar eventos ################## */\r\n// Conexion con la base de datos\r\n$link= mysql_connect("$nhost","$nuser","$npass");\r\n\r\n// Ejecutamos la sentencia SQL\r\nmysql_select_db("$nbase", $link); \r\n$result=mysql_query("select * from eventos,cuerpo ORDER BY fecha DESC LIMIT 1", $link);\r\n\r\n// Mostramos los registros\r\nwhile ($row=mysql_fetch_array($result))\r\n{\r\necho ''<b>Titulo del evento:</b><br>''.$row["titulo"].''<br>'';\r\necho ''<b>Fecha del evento:</b><br>''.$row["fecha_evento"].''<br>'';\r\necho ''<b>Lugar del evento:</b><br>''.$row["lugar"].''<br>'';\r\necho ''<b>Pais del evento:</b><br>''.$row["pais"].''<br>'';\r\necho ''<b>E-Mail de contacto:<b/><br><a href="mailto:''.$row["correo"].''">''.$row["correo"].''</a><br><br>'';\r\necho ''<a href="modulos.php?modulo=eventos&operacion=lectura&ID_eventos=''.$row["ID_eventos"].''">Ver más</a><br>'';\r\n\r\n}\r\nmysql_free_result($result);\r\n/* ############### Parte del Modulo para visualizar eventos ################## */\r\n?>', 'separador.gif', 'php', '1', 'Derecho'),
(6, 6, 'RSS local', 'feed.xml', 'separador.gif', 'rss', '1', 'Derecho'),
(7, 7, 'Software Libre', '<p><strong>Software libre</strong> (en <a href="http://es.wikipedia.org/wiki/Idioma_ingl%C3%A9s" title="Idioma inglÃ©s">inglÃ©s</a> <em><strong>free software</strong></em>) es el <a href="http://es.wikipedia.org/wiki/Software" title="Software">software</a> que, una vez obtenido, puede ser usado, copiado, estudiado, modificado y redistribuido libremente.</p><p><em>Extraido de Wikipedia.com </em></p>', 'separador.gif', 'html', '1', 'Derecho');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cabecera`
-- 

CREATE TABLE `cabecera` (
  `titulo` varchar(100) default NULL,
  `descripcion` text,
  `llaves` text,
  `clasificacion` text,
  `hora_ser` varchar(255) default NULL
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `cabecera`
-- 

INSERT INTO `cabecera` (`titulo`, `descripcion`, `llaves`, `clasificacion`, `hora_ser`) VALUES 
('POC - Power Of Content', 'poc, poccms', 'poc, poccms,opensource', 'poccms', '0');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `contador`
-- 

CREATE TABLE `contador` (
  `id` int(11) unsigned NOT NULL default '0'
) TYPE=MyISAM COMMENT='Tabla Contador de Visitas';

-- 
-- Volcar la base de datos para la tabla `contador`
-- 

INSERT INTO `contador` (`id`) VALUES 
(4);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `contenido`
-- 

CREATE TABLE `contenido` (
  `id_con` int(11) NOT NULL auto_increment,
  `con_fecha` datetime default NULL,
  `con_ti` varchar(255) default NULL,
  `con_subti` varchar(255) default NULL,
  `con_tex1` text,
  `con_tex2` text,
  `con_enlaces` text,
  `con_iden` varchar(255) default NULL,
  PRIMARY KEY  (`id_con`)
) TYPE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `contenido`
-- 

INSERT INTO `contenido` (`id_con`, `con_fecha`, `con_ti`, `con_subti`, `con_tex1`, `con_tex2`, `con_enlaces`, `con_iden`) VALUES 
(1, '2007-07-04 22:59:02', 'Esto es un contenido de prueba', '', 'Hola mundo', '', '', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `contenido_com`
-- 

CREATE TABLE `contenido_com` (
  `id_con_com` int(11) NOT NULL auto_increment,
  `id_con_iden` text NOT NULL,
  `con_com_tex` text NOT NULL,
  `con_usuario` varchar(255) NOT NULL default '',
  `con_fecha` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_con_com`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `contenido_com`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `contenido_or`
-- 

CREATE TABLE `contenido_or` (
  `ID_cont_or` int(11) NOT NULL auto_increment,
  `cont_ti` varchar(255) NOT NULL default '',
  `cont_or_fecha` datetime default NULL,
  `cont_or_cont` varchar(255) default NULL,
  `cont_or_pag` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID_cont_or`)
) TYPE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `contenido_or`
-- 

INSERT INTO `contenido_or` (`ID_cont_or`, `cont_ti`, `cont_or_fecha`, `cont_or_cont`, `cont_or_pag`) VALUES 
(1, 'Contenido de prueba', '2007-07-04 22:58:37', '26', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `control_ip`
-- 

CREATE TABLE `control_ip` (
  `ip` varchar(255) NOT NULL default '',
  `fecha` datetime NOT NULL default '0000-00-00 00:00:00',
  KEY `ip` (`ip`)
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `control_ip`
-- 

INSERT INTO `control_ip` (`ip`, `fecha`) VALUES 
('localhost-127.0.0.1', '2006-07-21 22:29:42');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `correo`
-- 

CREATE TABLE `correo` (
  `encabezado` text,
  `departe_de` text,
  `mensaje` text,
  `firma` text NOT NULL,
  `servicio` varchar(255) default NULL
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `correo`
-- 

INSERT INTO `correo` (`encabezado`, `departe_de`, `mensaje`, `firma`, `servicio`) VALUES 
('POC-CMS', 'info@localhost', 'Bienvenidos.', '<strong>POCCMS (C)2005</strong><br />', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cuerpo`
-- 

CREATE TABLE `cuerpo` (
  `id_cuerpo` int(11) NOT NULL auto_increment,
  `valores` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_cuerpo`)
) TYPE=MyISAM  AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `cuerpo`
-- 

INSERT INTO `cuerpo` (`id_cuerpo`, `valores`) VALUES 
(1, '../plantillas/prev/minerva.png'),
(2, '<strong>POC - Power Of Content (C) 1999 - 2007</strong><br />  <font color="#666666">Con licencia activa GNU versiÃ³n 2. Web: <a href="http://www.poccms.com" target="_blank">http://www.poccms.com</a><a href="mailto:greyes@poccms.com"></a></font>');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `donacion`
-- 

CREATE TABLE `donacion` (
  `id_don` int(11) NOT NULL auto_increment,
  `fecha_ingreso_don` datetime NOT NULL default '0000-00-00 00:00:00',
  `nombre_don` varchar(255) NOT NULL default '',
  `direccion_don` varchar(255) NOT NULL default '',
  `ciudad_don` varchar(255) NOT NULL default '',
  `pais_don` varchar(255) NOT NULL default '',
  `tel_casa_don` varchar(255) NOT NULL default '',
  `tel_ofi_don` varchar(255) NOT NULL default '',
  `tel_cel_don` varchar(255) NOT NULL default '',
  `email_don` varchar(255) NOT NULL default '',
  `nom_recibo_don` varchar(255) NOT NULL default '',
  `nit_don` varchar(255) NOT NULL default '',
  `dire_recibo_don` varchar(255) NOT NULL default '',
  `monto_don` varchar(255) NOT NULL default '',
  `fecha_cobro` date NOT NULL default '0000-00-00',
  `forma_pago` varchar(255) NOT NULL default '',
  `dir_cobro_don` varchar(255) NOT NULL default '',
  `periodo_don` varchar(255) NOT NULL default '',
  `tar_credito_don` varchar(255) NOT NULL default '',
  `banco_tar_don` varchar(255) NOT NULL default '',
  `no_tar_don` varchar(255) NOT NULL default '',
  `fecha_ven_tar_don` varchar(255) NOT NULL default '',
  `nombre_tar_don` varchar(255) NOT NULL default '',
  `firma_don` varchar(255) NOT NULL default '',
  `comentarios_don` text NOT NULL,
  PRIMARY KEY  (`id_don`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `donacion`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estadisticas_brow`
-- 

CREATE TABLE `estadisticas_brow` (
  `imagen_brow` text,
  `tema` varchar(80) NOT NULL default '',
  `nombre_bro` varchar(80) NOT NULL default '',
  `contador` int(11) unsigned NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `estadisticas_brow`
-- 

INSERT INTO `estadisticas_brow` (`imagen_brow`, `tema`, `nombre_bro`, `contador`) VALUES 
('../imagenes/estadisticas/brows/lynx.gif', 'browser', 'Lynx', 0),
('../imagenes/estadisticas/brows/explorer.gif', 'browser', 'MSIE', 1),
('../imagenes/estadisticas/brows/opera.gif', 'browser', 'Opera', 0),
('../imagenes/estadisticas/brows/konqueror.gif', 'browser', 'Konqueror', 0),
('../imagenes/estadisticas/brows/netscape.gif', 'browser', 'Netscape', 3),
('../imagenes/estadisticas/brows/altavista.gif', 'browser', 'Bot', 0),
('../imagenes/estadisticas/brows/webtv.gif', 'browser', 'WebTV', 0),
('../imagenes/estadisticas/brows/question.gif', 'browser', 'otros', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estadisticas_fecha`
-- 

CREATE TABLE `estadisticas_fecha` (
  `dia` varchar(80) NOT NULL default '',
  `hits` int(11) unsigned NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `estadisticas_fecha`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estadisticas_hora`
-- 

CREATE TABLE `estadisticas_hora` (
  `hora` tinyint(2) unsigned NOT NULL default '0',
  `nom_hora` text,
  `hits` int(11) unsigned NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `estadisticas_hora`
-- 

INSERT INTO `estadisticas_hora` (`hora`, `nom_hora`, `hits`) VALUES 
(0, '12:00 AM', 0),
(1, '1:00 AM', 0),
(2, '2:00 AM', 0),
(3, '3:00 AM', 0),
(4, '4:00 AM', 0),
(5, '5:00 AM', 0),
(6, '6:00 AM', 0),
(7, '7:00 AM', 0),
(8, '8:00 AM', 0),
(9, '9:00 AM', 0),
(10, '10:00 AM', 0),
(11, '11:00 AM', 0),
(12, '12:00 PM', 0),
(13, '1:00 PM', 2),
(14, '2:00 PM', 0),
(15, '3:00 PM', 1),
(16, '4:00 PM', 0),
(17, '5:00 PM', 0),
(18, '6:00 PM', 0),
(19, '7:00 PM', 0),
(20, '8:00 PM', 0),
(21, '9:00 PM', 0),
(22, '10:00 PM', 1),
(23, '11:00 PM', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estadisticas_mes`
-- 

CREATE TABLE `estadisticas_mes` (
  `mes` tinyint(2) unsigned NOT NULL default '0',
  `mes_nom` text,
  `hits` int(11) unsigned NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `estadisticas_mes`
-- 

INSERT INTO `estadisticas_mes` (`mes`, `mes_nom`, `hits`) VALUES 
(1, 'Enero', 0),
(2, 'Febrero', 0),
(3, 'Marzo', 1),
(4, 'Abril', 0),
(5, 'Mayo', 1),
(6, 'Junio', 0),
(7, 'Julio', 2),
(8, 'Agosto', 0),
(9, 'Septiembre', 0),
(10, 'Octubre', 0),
(11, 'Noviembre', 0),
(12, 'Diciembre', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estadisticas_os`
-- 

CREATE TABLE `estadisticas_os` (
  `imagen_os` text,
  `tema` varchar(80) NOT NULL default '',
  `nombre_os` varchar(80) NOT NULL default '',
  `contador` int(11) unsigned NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `estadisticas_os`
-- 

INSERT INTO `estadisticas_os` (`imagen_os`, `tema`, `nombre_os`, `contador`) VALUES 
('../imagenes/estadisticas/os/windows.gif', 'os', 'Windows', 1),
('../imagenes/estadisticas/os/linux.gif', 'os', 'Linux', 3),
('../imagenes/estadisticas/os/mac.gif', 'os', 'Mac', 0),
('../imagenes/estadisticas/os/bsd.gif', 'os', 'FreeBSD', 0),
('../imagenes/estadisticas/os/sun.gif', 'os', 'SunOS', 0),
('../imagenes/estadisticas/os/irix.gif', 'os', 'IRIX', 0),
('../imagenes/estadisticas/os/be.gif', 'os', 'BeOS', 0),
('../imagenes/estadisticas/os/os2.gif', 'os', 'OS/2', 0),
('../imagenes/estadisticas/os/aix.gif', 'os', 'AIX', 0),
('../imagenes/estadisticas/os/question.gif', 'os', 'Otros', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estadisticas_pagina`
-- 

CREATE TABLE `estadisticas_pagina` (
  `pag_nombre` varchar(255) default NULL,
  `pag_contador` varchar(255) default NULL
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `estadisticas_pagina`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estadisticas_semana`
-- 

CREATE TABLE `estadisticas_semana` (
  `dia_semana` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `nom_semana` text
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `estadisticas_semana`
-- 

INSERT INTO `estadisticas_semana` (`dia_semana`, `hits`, `nom_semana`) VALUES 
(0, 0, 'Domingo'),
(1, 0, 'Lunes'),
(2, 1, 'Martes'),
(3, 1, 'Mi&eacute;rcoles'),
(4, 1, 'Jueves'),
(5, 1, 'Viernes'),
(6, 0, 'S&aacute;bado');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `eventos`
-- 

CREATE TABLE `eventos` (
  `ID_eventos` int(11) NOT NULL auto_increment,
  `titulo` text,
  `fecha` datetime default NULL,
  `fecha_evento` text,
  `lugar` text,
  `pais` text,
  `temas` text,
  `nombre` text,
  `correo` text,
  PRIMARY KEY  (`ID_eventos`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `eventos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `logotipo`
-- 

CREATE TABLE `logotipo` (
  `nombre_logo` varchar(100) default NULL,
  `alt` varchar(100) default NULL,
  `direccion` text
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `logotipo`
-- 

INSERT INTO `logotipo` (`nombre_logo`, `alt`, `direccion`) VALUES 
('poccms.gif', 'POC - Power Of Content', 'imagenes');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `mensaje`
-- 

CREATE TABLE `mensaje` (
  `titulo` varchar(255) default NULL,
  `texto` text,
  `fecha` datetime default NULL,
  `usuario` varchar(255) default NULL,
  `imagen` text
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `mensaje`
-- 

INSERT INTO `mensaje` (`titulo`, `texto`, `fecha`, `usuario`, `imagen`) VALUES 
('Hola amigo este es tu primer mensaje !!!', '<p>Bienvenido a <a href="http://www.poccms.com" target="_blank">POC-CMS</a> una nueva experiencia en el gestionamiento de tu sitio web, un software desarrollado 100% en idioma espaÃ±ol, no te parece genial !!!</p><p>Esperamos que lo disfrutes. </p>', '2007-07-06 22:56:36', 'Gustavo Reyes', 'separador.gif');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `menuindex`
-- 

CREATE TABLE `menuindex` (
  `ID_menu` int(11) NOT NULL auto_increment,
  `titulo` varchar(255) default NULL,
  `direccion_local` text,
  `direccion_exterior` text,
  `menu_activar` varchar(255) default NULL,
  `menu_orden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ID_menu`)
) TYPE=MyISAM  AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `menuindex`
-- 

INSERT INTO `menuindex` (`ID_menu`, `titulo`, `direccion_local`, `direccion_exterior`, `menu_activar`, `menu_orden`) VALUES 
(1, 'Inicio', 'index.php', '---', '1', 0),
(2, 'Administrador', 'admin', '---', '1', 3),
(3, 'Contenidos ', 'modulos.php?modulo=contenido&operacion=lecturacat&cont_ti=Contenido%20de%20prueba&identificador=1', '---', '1', 1),
(4, 'Contacto', 'modulos.php?modulo=formularios&operacion=forma', '---', '1', 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `noticia`
-- 

CREATE TABLE `noticia` (
  `ID_noticia` int(11) NOT NULL auto_increment,
  `titulo` varchar(255) default NULL,
  `texto` text,
  `fecha` datetime default NULL,
  `usuario` varchar(100) NOT NULL default '',
  `mas_noti` text,
  `picture` text,
  `not_cont` varchar(255) default NULL,
  `not_iden` varchar(255) default NULL,
  PRIMARY KEY  (`ID_noticia`),
  UNIQUE KEY `ID_noticia` (`ID_noticia`)
) TYPE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `noticia`
-- 

INSERT INTO `noticia` (`ID_noticia`, `titulo`, `texto`, `fecha`, `usuario`, `mas_noti`, `picture`, `not_cont`, `not_iden`) VALUES 
(1, 'POC-CMS es tuyo', '<p>Ãšnete a nuestra comunidad de usuarios de <a href="http://www.poccms.com" target="_blank">POC-CMS</a> y se parte de esta familia. Queremos saber tu opiniÃ³n, tus observaciones, tus comentarios en relaciÃ³n a esta aplicaciÃ³n de Software Libre que estas probando.</p><p>Agradecemos tu interÃ©s en el proyecto del <a href="htttp://www.poccms.com" target="_blank">Grupo de Software Libre POC</a> .</p><p align="right"><em><strong> -- Atentamente, Grupo de usuarios de POC-CMS --</strong></em> </p>', '2007-07-06 22:44:08', 'Gustavo Reyes', '', 'imagenes/noticia/Lin_formal.png', '0', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `noticia_com`
-- 

CREATE TABLE `noticia_com` (
  `id_not_com` int(11) NOT NULL auto_increment,
  `id_not_iden` varchar(255) default NULL,
  `noti_com_tex` text,
  `not_usuario` varchar(255) default NULL,
  `not_fecha` datetime default NULL,
  PRIMARY KEY  (`id_not_com`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `noticia_com`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `noticia_or`
-- 

CREATE TABLE `noticia_or` (
  `ID_not_or` int(11) NOT NULL auto_increment,
  `not_ti` varchar(255) default NULL,
  `not_or_fecha` datetime default NULL,
  `not_or_cont` varchar(255) default NULL,
  `not_or_pag` varchar(255) default NULL,
  PRIMARY KEY  (`ID_not_or`)
) TYPE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `noticia_or`
-- 

INSERT INTO `noticia_or` (`ID_not_or`, `not_ti`, `not_or_fecha`, `not_or_cont`, `not_or_pag`) VALUES 
(1, 'Noticias Generales', '2007-07-05 01:05:16', '0', '2');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `registrosadmin`
-- 

CREATE TABLE `registrosadmin` (
  `id_reg` int(11) NOT NULL auto_increment,
  `nombreus` varchar(255) default NULL,
  `correous` varchar(255) default NULL,
  `paisus` varchar(255) default NULL,
  `webus` varchar(255) default NULL,
  `errorus` text NOT NULL,
  `tipos` varchar(255) default NULL,
  `fecha` datetime default NULL,
  `ver` varchar(255) NOT NULL default '',
  `iden_admin` varchar(255) default NULL,
  PRIMARY KEY  (`id_reg`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `registrosadmin`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `seguridad`
-- 

CREATE TABLE `seguridad` (
  `seguridad_des` varchar(255) default NULL
) TYPE=MyISAM;

-- 
-- Volcar la base de datos para la tabla `seguridad`
-- 

INSERT INTO `seguridad` (`seguridad_des`) VALUES 
('0');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `sesiones`
-- 

CREATE TABLE `sesiones` (
  `id_sesiones` int(11) NOT NULL auto_increment,
  `sesiones_us_nom` varchar(255) default NULL,
  `sesiones_us_ex` varchar(255) default NULL,
  `sesion_us_llave` varchar(255) default NULL,
  PRIMARY KEY  (`id_sesiones`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `sesiones`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `uldescargas`
-- 

CREATE TABLE `uldescargas` (
  `id_ul` int(11) NOT NULL auto_increment,
  `titulo` text,
  `descripcion` text,
  `tamano` text,
  `autor` text,
  `correo` text,
  `descarga` text,
  `fecha` datetime default NULL,
  `version` text,
  `licencia` text,
  `tema` text,
  `web` varchar(255) default NULL,
  `contador` int(11) NOT NULL default '0',
  `iden_ul` varchar(255) default NULL,
  PRIMARY KEY  (`id_ul`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `uldescargas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `uldescargastem`
-- 

CREATE TABLE `uldescargastem` (
  `id_ul2` int(11) NOT NULL auto_increment,
  `tem_ul2` varchar(255) default NULL,
  `con_ul2` varchar(255) default NULL,
  `vot_fecha` datetime default NULL,
  PRIMARY KEY  (`id_ul2`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `uldescargastem`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `ID_usuarios` int(11) NOT NULL auto_increment,
  `correo` varchar(60) NOT NULL default '',
  `contrasena` varchar(100) NOT NULL default '',
  `recucontrasena` text,
  `web` varchar(255) NOT NULL default '',
  `nombre` varchar(255) NOT NULL default '',
  `pais` varchar(100) NOT NULL default '',
  `fecha` datetime default NULL,
  `picture` text,
  `us_enlace` varchar(255) NOT NULL default '0',
  PRIMARY KEY  (`ID_usuarios`),
  UNIQUE KEY `ID_usuarios` (`ID_usuarios`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `votacion_categoria_triv`
-- 

CREATE TABLE `votacion_categoria_triv` (
  `id_cat_triv` int(11) NOT NULL auto_increment,
  `nom_cat_triv` varchar(255) NOT NULL default '',
  `fecha_cat_triv` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_cat_triv`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `votacion_categoria_triv`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `votacion_ips`
-- 

CREATE TABLE `votacion_ips` (
  `votacion_id_ips` int(11) NOT NULL auto_increment,
  `votacion_ips` varchar(255) default NULL,
  `votacion_control` varchar(255) default NULL,
  `votacion_pregunta_control` varchar(255) NOT NULL default '',
  `us_vot` varchar(255) NOT NULL default '',
  `pais_vot` varchar(255) NOT NULL default '',
  `tipo` varchar(255) NOT NULL default '',
  `fecha_vot` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`votacion_id_ips`)
) TYPE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `votacion_ips`
-- 

INSERT INTO `votacion_ips` (`votacion_id_ips`, `votacion_ips`, `votacion_control`, `votacion_pregunta_control`, `us_vot`, `pais_vot`, `tipo`, `fecha_vot`) VALUES 
(1, '1', '1', '2', '', '', 'encuesta', '2006-04-19 22:52:11');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `votacion_preg`
-- 

CREATE TABLE `votacion_preg` (
  `ID_vot_preg` int(11) NOT NULL auto_increment,
  `vot_iden_preg` varchar(255) default NULL,
  `vot_pregunta` varchar(255) default NULL,
  `vot_punteo` varchar(255) default NULL,
  `vot_fecha_preg` datetime default NULL,
  `tipo` varchar(255) NOT NULL default '',
  `correcta` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID_vot_preg`),
  UNIQUE KEY `ID_vot` (`ID_vot_preg`)
) TYPE=MyISAM  AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `votacion_preg`
-- 

INSERT INTO `votacion_preg` (`ID_vot_preg`, `vot_iden_preg`, `vot_pregunta`, `vot_punteo`, `vot_fecha_preg`, `tipo`, `correcta`) VALUES 
(1, '1', 'Excelente', '0', '2006-04-19 22:51:41', 'encuesta', '0'),
(2, '1', 'Muy Bueno', '1', '2006-04-19 22:51:41', 'encuesta', '0'),
(3, '1', 'Bueno', '0', '2006-04-19 22:51:41', 'encuesta', '0');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `votacion_tema`
-- 

CREATE TABLE `votacion_tema` (
  `id_vot` int(11) NOT NULL auto_increment,
  `iden_cat_triv` varchar(255) NOT NULL default '',
  `vot_tema` varchar(255) default NULL,
  `vot_cont` varchar(255) default NULL,
  `vot_fecha` datetime default NULL,
  `vot_pub` datetime default NULL,
  `vot_fin_pub` datetime default NULL,
  `vot_activar` varchar(255) default NULL,
  `tipo` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id_vot`)
) TYPE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `votacion_tema`
-- 

INSERT INTO `votacion_tema` (`id_vot`, `iden_cat_triv`, `vot_tema`, `vot_cont`, `vot_fecha`, `vot_pub`, `vot_fin_pub`, `vot_activar`, `tipo`) VALUES 
(1, '0', 'Que te parece POC ?', '1', '2006-04-19 22:51:41', '2006-04-18 22:51:00', '2011-04-19 22:51:20', '1', 'encuesta');

