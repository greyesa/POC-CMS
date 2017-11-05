<?php /* Smarty version 2.6.18, created on 2007-07-09 10:25:14
         compiled from sisinfo/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- ################## Inicia Informacion del Sistema (Administración) ################## -->

 <center><b><?php echo $this->_tpl_vars['timodulo']; ?>
</b></center> <br><BR>
<?php echo $this->_tpl_vars['timodulo1']; ?>

<?php echo $this->_tpl_vars['contenido']; ?>


<?php 

echo '<center><table border="0" width="90%"><tr><td>';
echo '<b>Sistema Operativo:</b><br>';
echo '<table border="0" width="90%"><tr><td class="noticia1">';
echo 'Sistema</td><td class="noticia2">'.php_uname().'</td></tr></table>';

echo '<br><b>Servidor Web:</b><br>';
echo '<table border="0" width="90%"><tr><td class="noticia1">';
echo 'Servidor Web</td><td class="noticia2">'.$_SERVER["SERVER_SOFTWARE"].'</td></tr></table>';

$listas = mysql_get_client_info();
$listas2 = mysql_get_host_info();
$listas3 = mysql_get_proto_info();
$listas4 = mysql_get_server_info();

echo '<br><b>MySQL - Base de datos:</b><br>';
echo '<table border="0" width="90%"><tr><td class="noticia1">';
echo 'Informaci&oacute;n de cliente:</td><td class="noticia2">'.$listas.'</td></tr><tr><td class="noticia1">';
echo 'Informaci&oacute;n de Host:</td><td class="noticia2">'.$listas2.'</td></tr><tr><td class="noticia1">';
echo 'Informaci&oacute;n del protocolo:</td><td class="noticia2">'.$listas3.'</td></tr><tr><td class="noticia1">';
echo 'Versi&oacute;n de Host:</td><td class="noticia2">'.$listas4.'</td></tr></table>';

echo '<br><b>PHP:</b> [ <a href="modulos/sisinfo/phpinfo.php" target="_blank">phpinfo</a> ]<br>';
echo '<table border="0" width="90%"><tr><td class="noticia1">';
echo 'PHP</td><td class="noticia2">'.phpversion().'</td></tr><tr><td class="noticia1">';
echo 'PHP API</td><td class="noticia2">'.php_sapi_name().'</td></tr><tr><td class="noticia1">';
echo 'display_errors</td><td class="noticia2"> ' . ini_get('display_errors') . "</td></tr>";
echo '<tr><td class="noticia1">register_globals</td><td class="noticia2"> ' . ini_get('register_globals') . "</td></tr>";
echo '<tr><td class="noticia1">post_max_size</td><td class="noticia2">  ' . ini_get('post_max_size') . "</td></tr>";
echo '<tr><td class="noticia1">post_max_size+1</td><td class="noticia2"> ' . (ini_get('post_max_size')+1) . "</td></tr>";
echo '<tr><td class="noticia1">post_max_size en bytes </td><td class="noticia2"> ' . return_bytes(ini_get('post_max_size'))."</td></tr>";

function return_bytes($val) {
   $val = trim($val);
   $ultimo = strtolower($val{strlen($val)-1});
   switch($ultimo) {
       // El modificador 'G' se encuentra disponible desde PHP 5.1.0
       case 'g':
           $val *= 1024;
       case 'm':
           $val *= 1024;
       case 'k':
           $val *= 1024;
   }

   return $val;
}
echo '</table>';

$fun = get_loaded_extensions();
reset($fun);
echo '<center><br><b>PHP-extensiones instaladas:</b><br>';
echo '<table border="0" width="30%">';
while (list($clave, $valor) = each($fun))
{
echo '<tr><td class="noticia2"><center>'.$valor.'</center></td></tr>';
}

echo '</table></center><br><br>';




echo '</td></tr></table></center>';

echo '<center><div style="
		border:#CCCCCC solid 1px;
		background-color: #f0f0f0;
		padding:0px;
		color: #0066CC;
		width:90%;
		margin:0px;
		overflow:scroll;
		font-size: 1.2em;
		height:200px; align:left;
	 ">';

ob_start();                                                                                                       
phpinfo();                                                                                                   
$info = ob_get_contents();                                                                                       
ob_end_clean(); 
$info = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $info);
echo $info;
echo '</div></center>';

 ?>



<!-- ################## Fin Informacion del Sistema (Administración) ################## -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>