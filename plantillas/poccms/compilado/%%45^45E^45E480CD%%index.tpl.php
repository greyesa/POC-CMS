<?php /* Smarty version 2.6.18, created on 2007-07-09 01:56:04
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- ################## Inicia Mensaje ################## -->
<table border="0">
<tr>
<td>
<div class="titulos"><?php echo $this->_tpl_vars['titulomensaje']; ?>
</div>
</td>
</tr>
<tr>
<td class="mensaje">
<?php echo $this->_tpl_vars['textomensaje']; ?>

</td>
</tr>
</table>
<!-- ################## Fin Mensaje ################## -->

<!-- ################## Inicia Noticia ################## -->

<table border="0" width="100%">
<tr>
<td width="100%" valign="top" class="home_noticia">
<table border="0" width="100%">
<tr>
<td>
<div class="titulos_seccion"><?php echo $this->_tpl_vars['tinoticia']; ?>
</div>
</td></tr></table>
<?php unset($this->_sections['contador']);
$this->_sections['contador']['name'] = 'contador';
$this->_sections['contador']['loop'] = is_array($_loop=$this->_tpl_vars['titulonoticia']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table border="0" width="100%">
<tr>
<td class="home_noticia_bloques">
<div class="titulos"><?php echo $this->_tpl_vars['titulonoticia'][$this->_sections['contador']['index']]; ?>
</div>
<div class="fechas"><?php echo $this->_tpl_vars['pienoticia'][$this->_sections['contador']['index']]; ?>
 - <?php echo $this->_tpl_vars['comentarionoticia'][$this->_sections['contador']['index']]; ?>
 - <?php echo $this->_tpl_vars['visualizacionnoticia'][$this->_sections['contador']['index']]; ?>
 </div> 
<?php echo $this->_tpl_vars['imagennoticia'][$this->_sections['contador']['index']]; ?>
 <?php echo $this->_tpl_vars['textonoticia'][$this->_sections['contador']['index']]; ?>


</td>
</tr>
</table>
<?php endfor; endif; ?>
<div align="right"><a href="modulos.php?modulo=noticia&operacion=lecturacat&ID_not_or=1&noticia_ti=Noticias%20Generales">+ M&aacute;s noticias</a></div>
</td>

</tr>
</table>
<!-- ################## Fin Noticia ################## -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>