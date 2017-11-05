<?php /* Smarty version 2.6.18, created on 2007-07-09 01:56:04
         compiled from cabecera.tpl */ ?>
<?php echo $this->_tpl_vars['codificacion']; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "css.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<!--  Menu -->
<script language="JavaScript" type="text/javascript" src="templates/ayuvi/templates/JSCookMenu/JSCookMenu.js"></script>
<link rel="stylesheet" href="templates/ayuvi/templates/JSCookMenu/ThemeOffice/theme.css" type="text/css" />
<script language="JavaScript" type="text/javascript" src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/theme.js"></script>
<script type="text/javascript" src="templates/ayuvi/templates/JSCookMenu/effect.js"></script>
<!--  Menu -->
'; ?>


</head>
<!--  ################## Fin de Cabecera  ################## -->

<!--  ################## Inicia Cuerpo de Pagina  ################## -->

<body>

<table width="752" border="0" align="center">
<tr>
<td> 

<!-- Logotipo -->
<table align="center"  width="752" cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="cabecera" valign="top">
<a href="index.php"><img src="<?php echo $this->_tpl_vars['logotipo1']; ?>
/<?php echo $this->_tpl_vars['logotipo2']; ?>
" border="0" alt="<?php echo $this->_tpl_vars['logotipo3']; ?>
"> </a>
</td>
</tr>
</table>
<!-- Logotipo -->

<!-- Menu -->
<div id="menu">
<?php unset($this->_sections['contador']);
$this->_sections['contador']['name'] = 'contador';
$this->_sections['contador']['loop'] = is_array($_loop=$this->_tpl_vars['menu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['contador']['show'] = true;
$this->_sections['contador']['max'] = $this->_sections['contador']['loop'];
$this->_sections['contador']['step'] = 1;
$this->_sections['contador']['start'] = $this->_sections['contador']['step'] > 0 ? 0 : $this->_sections['contador']['loop']-1;
if ($this->_sections['contador']['show']) {
    $this->_sections['contador']['total'] = $this->_sections['contador']['loop'];
    if ($this->_sections['contador']['total'] == 0)
        $this->_sections['contador']['show'] = false;
} else
    $this->_sections['contador']['total'] = 0;
if ($this->_sections['contador']['show']):

            for ($this->_sections['contador']['index'] = $this->_sections['contador']['start'], $this->_sections['contador']['iteration'] = 1;
                 $this->_sections['contador']['iteration'] <= $this->_sections['contador']['total'];
                 $this->_sections['contador']['index'] += $this->_sections['contador']['step'], $this->_sections['contador']['iteration']++):
$this->_sections['contador']['rownum'] = $this->_sections['contador']['iteration'];
$this->_sections['contador']['index_prev'] = $this->_sections['contador']['index'] - $this->_sections['contador']['step'];
$this->_sections['contador']['index_next'] = $this->_sections['contador']['index'] + $this->_sections['contador']['step'];
$this->_sections['contador']['first']      = ($this->_sections['contador']['iteration'] == 1);
$this->_sections['contador']['last']       = ($this->_sections['contador']['iteration'] == $this->_sections['contador']['total']);
?> 
<?php echo $this->_tpl_vars['menu'][$this->_sections['contador']['index']]; ?>
 |
<?php endfor; endif; ?>  
</div>
<!-- Menu -->

<table CELLSPACING=0 CELLSPADING=0 width="752" border="0">
<tr>
<td class="menu" align="center">
<!-- ################## Inicia Menu  ################## --> 
<center>

<div id="myMenuID">
<script language="JavaScript" type="text/javascript"><!--
var myMenu =
[
	_cmSplit,
	[null, 'Inicio', 'index.php', null, null],  // a menu item
        _cmSplit,
	
	[null, 'Qui&eacute;nes Somos', '#', null, null,
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Qui&eacute;nes Somos', 'modulos.php?modulo=contenido&operacion=lectura&id_con=12&identificador=1&cont_ti=Qui%EF%BF%BDnes%20Somos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Autoridades', 'modulos.php?modulo=contenido&operacion=lectura&id_con=52&identificador=1&cont_ti=Qui%EF%BF%BDnes%20Somos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Nuestra Historia', 'modulos.php?modulo=contenido&operacion=lectura&id_con=13&identificador=1&cont_ti=Qui%EF%BF%BDnes%20Somos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Nuestra Mision', 'modulos.php?modulo=contenido&operacion=lectura&id_con=14&identificador=1&cont_ti=Qui%EF%BF%BDnes%20Somos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Nuestra Vision', 'modulos.php?modulo=contenido&operacion=lectura&id_con=15&identificador=1&cont_ti=Qui%EF%BF%BDnes%20Somos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Nuestros Objetivos', 'modulos.php?modulo=contenido&operacion=lectura&id_con=16&identificador=1&cont_ti=Qui%EF%BF%BDnes%20Somos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Nuestros Valores', 'modulos.php?modulo=contenido&operacion=lectura&id_con=17&identificador=1&cont_ti=Qui%EF%BF%BDnes%20Somos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Origen y Aplicaci&oacute;n de fondos', 'modulos.php?modulo=contenido&operacion=lectura&id_con=18&identificador=1&cont_ti=Qui%EF%BF%BDnes%20Somos?', null, null],
	],  // a menu item
	_cmSplit,

	[null, 'Qu&eacute; hacemos', '#', null, null,
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Qu&eacute; hacemos', 'modulos.php?modulo=contenido&operacion=lectura&id_con=19&identificador=2&cont_ti=Qu%EF%BF%BD%20Hacemos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Logros', 'modulos.php?modulo=contenido&operacion=lectura&id_con=20&identificador=2&cont_ti=Qu%EF%BF%BD%20Hacemos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Juego Hospitalario', 'modulos.php?modulo=contenido&operacion=lectura&id_con=23&identificador=2&cont_ti=Qu%EF%BF%BD%20Hacemos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Apoyo Psicol&oacute;gico', 'modulos.php?modulo=contenido&operacion=lectura&id_con=46&identificador=2&cont_ti=Qu%EF%BF%BD%20Hacemos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Medicina Paliativa', 'modulos.php?modulo=contenido&operacion=lectura&id_con=21&identificador=2&cont_ti=Qu%EF%BF%BD%20Hacemos?', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Albergue', 'modulos.php?modulo=contenido&operacion=lectura&id_con=24&identificador=2&cont_ti=Qu%EF%BF%BD%20Hacemos?', null, null],
	],  // a menu item
	_cmSplit,

	[null, 'Colabora', '#', null, null,
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', '&#191; Por qu&eacute; necesitamos tu ayuda ?', 'modulos.php?modulo=contenido&operacion=lectura&id_con=25&identificador=3&cont_ti=Colabora%20con%20nosotros', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Padrinos', 'modulos.php?modulo=contenido&operacion=lectura&id_con=28&identificador=3&cont_ti=Colabora%20con%20nosotros', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Preguntas frecuentes sobre apadrinamiento', 'modulos.php?modulo=contenido&operacion=lectura&id_con=35&identificador=3&cont_ti=Colabora%20con%20nosotros', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Para empresas', 'modulos.php?modulo=contenido&operacion=lectura&id_con=27&identificador=3&cont_ti=Colabora%20con%20nosotros', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Donaciones', 'modulos.php?modulo=contenido&operacion=lectura&id_con=29&identificador=3&cont_ti=Colabora%20con%20nosotros', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Voluntarios', 'modulos.php?modulo=contenido&operacion=lectura&id_con=31&identificador=3&cont_ti=Colabora%20con%20nosotros', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Dona sangre', 'modulos.php?modulo=contenido&operacion=lectura&id_con=32&identificador=3&cont_ti=Colabora%20con%20nosotros', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Organiza o colabora en eventos', 'modulos.php?modulo=contenido&operacion=lectura&id_con=33&identificador=3&cont_ti=Colabora%20con%20nosotros', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Empresas e instituciones amigas', 'modulos.php?modulo=contenido&operacion=lectura&id_con=34&identificador=3&cont_ti=Colabora%20con%20nosotros', null, null],
	],  // a menu item
	_cmSplit,

	[null, 'C&aacute;ncer Pedi&aacute;trico', '#', null, null,
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'C&aacute;ncer', 'modulos.php?modulo=contenido&operacion=lectura&id_con=36&identificador=4&cont_ti=C%EF%BF%BDncer%20Pedi%EF%BF%BDtrico', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'C&aacute;ncer pedi&aacute;trico', 'modulos.php?modulo=contenido&operacion=lectura&id_con=37&identificador=4&cont_ti=C%EF%BF%BDncer%20Pedi%EF%BF%BDtrico', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Crecimiento promedio mensual en la UNOP', 'modulos.php?modulo=contenido&operacion=lectura&id_con=38&identificador=4&cont_ti=C%EF%BF%BDncer%20Pedi%EF%BF%BDtrico', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Diagn&oacute;stico y tratamiento en la UNOP', 'modulos.php?modulo=contenido&operacion=lectura&id_con=39&identificador=4&cont_ti=C%EF%BF%BDncer%20Pedi%EF%BF%BDtrico', null, null],
	],  // a menu item
	_cmSplit,

	[null, 'Pacientes', '#', null, null,
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Ingresos familiares', 'modulos.php?modulo=contenido&operacion=lectura&id_con=40&identificador=5&cont_ti=Nuestros%20Pacientes', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Procedencia', 'modulos.php?modulo=contenido&operacion=lectura&id_con=41&identificador=5&cont_ti=Nuestros%20Pacientes', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Expresiones', 'modulos.php?modulo=contenido&operacion=lectura&id_con=42&identificador=5&cont_ti=Nuestros%20Pacientes', null, null],
	],  // a menu item
	_cmSplit,

	[null, 'Historias', '#', null, null,
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Havi, la ni&ntilde;a de las pulseritas de colores', 'modulos.php?modulo=contenido&operacion=lectura&id_con=54&identificador=7&cont_ti=Historias%20de%20Esperanza', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Rosie', 'modulos.php?modulo=contenido&operacion=lectura&id_con=51&identificador=7&cont_ti=Historias%20de%20Esperanza', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Magda y los molinos de viento', 'modulos.php?modulo=contenido&operacion=lectura&id_con=48&identificador=7&cont_ti=Historias%20de%20Esperanza', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Hans', 'modulos.php?modulo=contenido&operacion=lectura&id_con=49&identificador=7&cont_ti=Historias%20de%20Esperanza', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Chusito Castro', 'modulos.php?modulo=contenido&operacion=lectura&id_con=43&identificador=7&cont_ti=Historias%20de%20Esperanza', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Byron', 'modulos.php?modulo=contenido&operacion=lectura&id_con=47&identificador=7&cont_ti=Historias%20de%20Esperanza', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Brian', 'modulos.php?modulo=contenido&operacion=lectura&id_con=50&identificador=7&cont_ti=Historias%20de%20Esperanza', null, null],
['<img src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/arrow.gif">', 'Naty, y los Castillos de Arena', 'modulos.php?modulo=contenido&operacion=lectura&id_con=56&identificador=7&cont_ti=Historias%20de%20Esperanza', null, null],
	],  // a menu item
	_cmSplit,

	[null, 'Donaci&oacute;n', 'modulos.php?modulo=donacion&operacion=formu', null, null,

	],  // a menu item
	_cmSplit,
	
];
cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
--></script></div></center>
</td></tr></table>

<table align="center" width="752" height="100%" border="0">
<tr>
<td valign="top" width="70%" height="100%">

