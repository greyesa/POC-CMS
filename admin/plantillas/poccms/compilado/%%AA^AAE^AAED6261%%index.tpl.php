<?php /* Smarty version 2.6.18, created on 2007-07-09 10:25:10
         compiled from menu/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- ################## Inicia Menu (Administración) ################## -->

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
<?php echo $this->_tpl_vars['contenido8']; ?>

<?php echo $this->_tpl_vars['contenido9']; ?>


<table align='center' width='85%' border='0'>
<tr>
  <th class='noticia1'><div align='center'><strong><?php echo $this->_tpl_vars['encbloque']['titulo']; ?>
</strong></div></th>
 
  <th class='noticia1'><div align='center'><strong><?php echo $this->_tpl_vars['encbloque']['visualizar']; ?>
</strong></div></th>
  <th class='noticia1'><div align='center'><strong><?php echo $this->_tpl_vars['encbloque']['accion']; ?>
</strong></div></th>
</tr>
<?php unset($this->_sections['contador']);
$this->_sections['contador']['name'] = 'contador';
$this->_sections['contador']['loop'] = is_array($_loop=$this->_tpl_vars['bloque']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr>
<td class='noticia2'><a href='modulos.php?modulo=menu&operacion=editar&titulo=<?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['titulo']; ?>
&ID_menu=<?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['ID_bordede']; ?>
'><?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['titulo']; ?>
</a></td>

<td class='noticia2'><div align='center'><a href='modulos.php?modulo=menu&operacion=mostrar&sis=<?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['sis']; ?>
&ID_menu=<?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['ID_bordede']; ?>
&titulo=<?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['titulo']; ?>
'><?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['ver']; ?>
</a></div></td>

<td class='noticia2'><div align='center'><a href='modulos.php?modulo=menu&operacion=editar&titulo=<?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['titulo']; ?>
&ID_menu=<?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['ID_bordede']; ?>
'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> 

<a href='modulos.php?modulo=menu&operacion=borrar&titulo=<?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['titulo']; ?>
&ID_menu=<?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['ID_bordede']; ?>
'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></div></td>

<?php if ($this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['enlace1'] == ""): ?>
  <td class='noticia2'> </td>
<?php else: ?>
  <td class='noticia2'><div align='center'><b>
<a href='modulos.php?modulo=menu&<?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['enlace1']; ?>
'>
   <img src='../imagenes/menus/abajo.png' border='0' alt='abajo'></b></div>
</a>
</td>
<?php endif; ?>

<?php if ($this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['enlace2'] == ""): ?>
  <td class='noticia2'> </td>
<?php else: ?>
  <td class='noticia2'><div align='center'><b>
  <a href='modulos.php?modulo=menu&<?php echo $this->_tpl_vars['bloque'][$this->_sections['contador']['index']]['enlace2']; ?>
'>
   <img src='../imagenes/menus/arriba.png' border='0' alt='arriba'></b></div>
  </a>
  </td>
<?php endif; ?>
</tr>
<?php endfor; endif; ?>
</table>
<br><BR>

<!-- ################## Fin Menu (Administración) ################## -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>