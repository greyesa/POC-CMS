{include file="cabecera.tpl"}


<!-- ################## Inicia Noticia (Administración) ################## -->

<center><b>{$timodulo}</b></center> <br>
[ {$ingresarnoticia} ]<br><br>
<center><table border="0" width="80%"><tr><td width="50%" class="sinborde"><a href="modulos.php?modulo=noticia&operacion=lectura"><<- Regresar</a></td></tr></table></center>
<!--<table border="0" width="100%"><tr><td width="50%" class="sinborde">-->

{$noticiaingreso}<br>

<form method="post" action="modulos.php?modulo=noticia&operacion=ingresarnoticia2" name="mygallery">

<center>
<table border="0" width="80%">
<tr><td width="10%">{$categoria1}</td><td>{$categoria2}{section name=contador loop=$categoria3}{$categoria3[contador]}{/section} {$categoria4} <a href="modulos.php?modulo=noticia&operacion=categoria">-></a></td></tr>
</table>
</center>
<center>
<table border="0" width="80%">
<tr>
<td class="noticia3"><b>{$titulonoticiaesp}</b>&nbsp;<input type="text" name="titulo" size="50"></td>
</tr>
<tr>
<td class="noticia3"><b>{$autornoticiaesp}</b> <input type="text" name="usuario" size="50"> </td>
</tr>
<tr>
<td class="noticia3" valign="top"> 



<table border="0" width="70%">
<tr>
<td class="caja" width="40%" valign="top"><b>{$imagennoticiaesp}</b><br>{$imagennoticiaesp2}</td>
<td class="caja" valign="top">
<center><SELECT NAME="picture" size="1" onChange="showimage()">
<OPTION value="../imagenes/noticia/noticia.jpg" selected>---------------------</option>

{php}
$handle=opendir('../imagenes/noticia'); 
      while ($file = readdir($handle)) { 
       if ($file != "noticia.jpg" && $file != "index.html" && $file != "." && $file != ".." && $file != "CVS" && $file != "Thumbs.db") { 
echo"<OPTION value=../imagenes/noticia/$file>$file\n</option>";
} 
}
closedir($handle); 
 {/php}
</SELECT ><br><br>
<img src="../imagenes/noticia/noticia.jpg" name="pictures"><br><br><BR></CENTER>

</td>
</tr>
</table>

</td>
</tr>
<tr>
<td class="noticia3"><b>{$portadanoticiaesp}</b><br>{$portadanoticiaesp2}<br>

<textarea name="texto" rows="20" cols="88"></textarea>
</td>
</tr>
<tr>
<td class="noticia3"><b>{$notanoticiaesp}</b><br>{$notanoticiaesp2}<br>
<textarea name="mas_noti" rows="20" cols="88"></textarea>
</td>
</tr>

</table></center>
<br><br><div align="center"><input type="submit" name="ingresarnoticia2" value="Ingresar"></div>

</form>
<!--</td>
<td width="50%" valign="top" class="sinborde">
<table width="100%" border="0"><tr><td width="100%"><font color="#000000"><b>Notas:</b></font></td></tr><tr><td class="caja"><b>ID dentro del sistema:</b><br>{$ID_noticia}<br><br><b>Ingreso:</b> <br> {$fechanoticia}<br><br> <b>Contador:</b> <br>{$contadornoticia}</td></tr></table>
</td>
</tr>
</table>-->


<!-- ################## Fin Noticia (Administración) ################## -->

{include file="pie.tpl"}
