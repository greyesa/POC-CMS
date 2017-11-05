<?php /* Smarty version 2.6.18, created on 2007-07-08 12:42:38
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

<!-- Logotipo -->
<div id="cabecera"><div class="ancho_general">
<a href="index.php"><img src="<?php echo $this->_tpl_vars['logotipo1']; ?>
/<?php echo $this->_tpl_vars['logotipo2']; ?>
" border="0" alt="<?php echo $this->_tpl_vars['logotipo3']; ?>
"> </a>
</div>
</div>
<!-- Logotipo -->

<table width="752" border="0" align="center">
<tr>
<td> 

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


<table align="center" width="752" height="100%" border="0">
<tr>
<td valign="top" width="70%" height="100%">

