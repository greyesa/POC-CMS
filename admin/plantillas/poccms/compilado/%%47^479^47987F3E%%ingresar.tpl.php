<?php /* Smarty version 2.6.18, created on 2007-07-09 10:26:32
         compiled from noticia/ingresar.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<!-- ################## Inicia Noticia (Administración) ################## -->

<center><b><?php echo $this->_tpl_vars['timodulo']; ?>
</b></center> <br>
[ <?php echo $this->_tpl_vars['ingresarnoticia']; ?>
 ]<br><br>
<center><table border="0" width="80%"><tr><td width="50%" class="sinborde"><a href="modulos.php?modulo=noticia&operacion=lectura"><<- Regresar</a></td></tr></table></center>
<!--<table border="0" width="100%"><tr><td width="50%" class="sinborde">-->

<?php echo $this->_tpl_vars['noticiaingreso']; ?>
<br>

<form method="post" action="modulos.php?modulo=noticia&operacion=ingresarnoticia2" name="mygallery">

<center>
<table border="0" width="80%">
<tr><td width="10%"><?php echo $this->_tpl_vars['categoria1']; ?>
</td><td><?php echo $this->_tpl_vars['categoria2']; ?>
<?php unset($this->_sections['contador']);
$this->_sections['contador']['name'] = 'contador';
$this->_sections['contador']['loop'] = is_array($_loop=$this->_tpl_vars['categoria3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><?php echo $this->_tpl_vars['categoria3'][$this->_sections['contador']['index']]; ?>
<?php endfor; endif; ?> <?php echo $this->_tpl_vars['categoria4']; ?>
 <a href="modulos.php?modulo=noticia&operacion=categoria">-></a></td></tr>
</table>
</center>
<center>
<table border="0" width="80%">
<tr>
<td class="noticia3"><b><?php echo $this->_tpl_vars['titulonoticiaesp']; ?>
</b>&nbsp;<input type="text" name="titulo" size="50"></td>
</tr>
<tr>
<td class="noticia3"><b><?php echo $this->_tpl_vars['autornoticiaesp']; ?>
</b> <input type="text" name="usuario" size="50"> </td>
</tr>
<tr>
<td class="noticia3" valign="top"> 



<table border="0" width="70%">
<tr>
<td class="caja" width="40%" valign="top"><b><?php echo $this->_tpl_vars['imagennoticiaesp']; ?>
</b><br><?php echo $this->_tpl_vars['imagennoticiaesp2']; ?>
</td>
<td class="caja" valign="top">
<center><SELECT NAME="picture" size="1" onChange="showimage()">
<OPTION value="../imagenes/noticia/noticia.jpg" selected>---------------------</option>

<?php 
$handle=opendir('../imagenes/noticia'); 
      while ($file = readdir($handle)) { 
       if ($file != "noticia.jpg" && $file != "index.html" && $file != "." && $file != ".." && $file != "CVS" && $file != "Thumbs.db") { 
echo"<OPTION value=../imagenes/noticia/$file>$file\n</option>";
} 
}
closedir($handle); 
  ?>
</SELECT ><br><br>
<img src="../imagenes/noticia/noticia.jpg" name="pictures"><br><br><BR></CENTER>

</td>
</tr>
</table>

</td>
</tr>
<tr>
<td class="noticia3"><b><?php echo $this->_tpl_vars['portadanoticiaesp']; ?>
</b><br><?php echo $this->_tpl_vars['portadanoticiaesp2']; ?>
<br>

<textarea name="texto" rows="20" cols="88"></textarea>
</td>
</tr>
<tr>
<td class="noticia3"><b><?php echo $this->_tpl_vars['notanoticiaesp']; ?>
</b><br><?php echo $this->_tpl_vars['notanoticiaesp2']; ?>
<br>
<textarea name="mas_noti" rows="20" cols="88"></textarea>
</td>
</tr>

</table></center>
<br><br><div align="center"><input type="submit" name="ingresarnoticia2" value="Ingresar"></div>

</form>
<!--</td>
<td width="50%" valign="top" class="sinborde">
<table width="100%" border="0"><tr><td width="100%"><font color="#000000"><b>Notas:</b></font></td></tr><tr><td class="caja"><b>ID dentro del sistema:</b><br><?php echo $this->_tpl_vars['ID_noticia']; ?>
<br><br><b>Ingreso:</b> <br> <?php echo $this->_tpl_vars['fechanoticia']; ?>
<br><br> <b>Contador:</b> <br><?php echo $this->_tpl_vars['contadornoticia']; ?>
</td></tr></table>
</td>
</tr>
</table>-->


<!-- ################## Fin Noticia (Administración) ################## -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>