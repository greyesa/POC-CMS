<?php /* Smarty version 2.6.18, created on 2007-07-09 10:27:05
         compiled from comentarios/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- ################## Inicia Comentarios (Administración) ################## -->
<center><b><?php echo $this->_tpl_vars['timodulo']; ?>
</b></center> <br>

<center><?php echo $this->_tpl_vars['menu0']; ?>
 <?php echo $this->_tpl_vars['menu1']; ?>
</center>

<center><table width="99%" border="0"><tr> <td class="noticia1"><div align="center"><?php echo $this->_tpl_vars['tablanoticia1']; ?>
</div></td><td class="noticia1"><div align="center"><?php echo $this->_tpl_vars['tablanoticia3']; ?>
</div></td><td class="noticia1"><div align="center"><?php echo $this->_tpl_vars['tablanoticia4']; ?>
</div></td><td class="noticia1"><div align="center"><?php echo $this->_tpl_vars['tablanoticia2']; ?>
</div></td></tr>

<?php unset($this->_sections['contador']);
$this->_sections['contador']['name'] = 'contador';
$this->_sections['contador']['loop'] = is_array($_loop=$this->_tpl_vars['tablanoticia5']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<TR><TD class="noticia2" valign="top"><font size="2"><?php echo $this->_tpl_vars['tablanoticia5'][$this->_sections['contador']['index']]; ?>
</font></TD><td class="noticia2"><font size="2"><?php echo $this->_tpl_vars['tablanoticia6'][$this->_sections['contador']['index']]; ?>
</font></td><td class="noticia2" valign="top"><font size="2"><CENTER><?php echo $this->_tpl_vars['tablanoticia7'][$this->_sections['contador']['index']]; ?>
</CENTER></font></td><td class="noticia2" valign="top"><div align="center"><?php echo $this->_tpl_vars['opnoticia1'][$this->_sections['contador']['index']]; ?>
 <?php echo $this->_tpl_vars['opnoticia2'][$this->_sections['contador']['index']]; ?>
</div></td></tr>
<?php endfor; endif; ?>
</TABLE>
<BR><BR><?php echo $this->_tpl_vars['enlacenoticia0']; ?>
<br><?php echo $this->_tpl_vars['enlacenoticia1']; ?>
<font color=ff0000><b><?php unset($this->_sections['contador']);
$this->_sections['contador']['name'] = 'contador';
$this->_sections['contador']['loop'] = is_array($_loop=$this->_tpl_vars['enlacenoticia2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo $this->_tpl_vars['enlacenoticia2'][$this->_sections['contador']['index']]; ?>

<?php endfor; endif; ?></b></font><?php unset($this->_sections['contador']);
$this->_sections['contador']['name'] = 'contador';
$this->_sections['contador']['loop'] = is_array($_loop=$this->_tpl_vars['enlacenoticia3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo $this->_tpl_vars['enlacenoticia3'][$this->_sections['contador']['index']]; ?>

<?php endfor; endif; ?><?php echo $this->_tpl_vars['enlacenoticia4']; ?>

</center>

<center><?php echo $this->_tpl_vars['mensaje1']; ?>
<br>
<?php echo $this->_tpl_vars['mensaje2']; ?>

<?php echo $this->_tpl_vars['mensaje3']; ?>

</center><br><br>
<!-- ################## Fin Comentarios (Administración) ################## -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>