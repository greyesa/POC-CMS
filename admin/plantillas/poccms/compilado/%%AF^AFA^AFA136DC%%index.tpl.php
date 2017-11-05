<?php /* Smarty version 2.6.18, created on 2007-07-09 01:08:27
         compiled from diseno/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- ################## Inicia Diseño (Administración) ################## -->

 <center><b><?php echo $this->_tpl_vars['timodulo']; ?>
</b></center> <br><BR>
<?php echo $this->_tpl_vars['timodulo1']; ?>

<?php echo $this->_tpl_vars['contenido']; ?>

<?php echo $this->_tpl_vars['contenido0']; ?>
 
<center><?php echo $this->_tpl_vars['contenido1']; ?>

<?php unset($this->_sections['contador']);
$this->_sections['contador']['name'] = 'contador';
$this->_sections['contador']['loop'] = is_array($_loop=$this->_tpl_vars['contenido2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo $this->_tpl_vars['contenido2'][$this->_sections['contador']['index']]; ?>

<?php endfor; endif; ?>
<?php echo $this->_tpl_vars['contenido3']; ?>
</center>
<?php echo $this->_tpl_vars['contenido4']; ?>

<?php unset($this->_sections['contador']);
$this->_sections['contador']['name'] = 'contador';
$this->_sections['contador']['loop'] = is_array($_loop=$this->_tpl_vars['contenido44']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo $this->_tpl_vars['contenido44'][$this->_sections['contador']['index']]; ?>

<?php endfor; endif; ?>
<?php echo $this->_tpl_vars['contenido5']; ?>

<?php echo $this->_tpl_vars['contenido66']; ?>

<?php unset($this->_sections['contador']);
$this->_sections['contador']['name'] = 'contador';
$this->_sections['contador']['loop'] = is_array($_loop=$this->_tpl_vars['contenido6']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo $this->_tpl_vars['contenido6'][$this->_sections['contador']['index']]; ?>

<?php endfor; endif; ?>
<?php unset($this->_sections['contador']);
$this->_sections['contador']['name'] = 'contador';
$this->_sections['contador']['loop'] = is_array($_loop=$this->_tpl_vars['contenido7']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo $this->_tpl_vars['contenido7'][$this->_sections['contador']['index']]; ?>

<?php endfor; endif; ?>
<?php echo $this->_tpl_vars['contenido77']; ?>

<?php echo $this->_tpl_vars['contenido8']; ?>

<?php echo $this->_tpl_vars['contenido9']; ?>


<!-- ################## Fin Diseño (Administración) ################## -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>