{include file="cabecera.tpl"}


<!-- ################## Inicia Noticia (Administración) ################## -->

<center><b>{$timodulo}</b></center> <br>
[ {$ingresarnoticia} ]<br>

<center><table border="0" width="80%"><tr><td width="50%" class="sinborde">

<form method="post" action="modulos.php?modulo=noticia&operacion=lectura&actualizar=1" name="mygallery">
<input type="hidden" name="ID_not_or_v" value="{$ID_not_or_v}">
<input type="hidden" name="ID_noticia" value="{$ID_noticia}">
<input type="hidden" name="actualizar" value="1">

<table border="0">
<tr>
<td class="noticia3"><a href="modulos.php?modulo=noticia&operacion=lectura"><<- Regresar</a></td>
</tr>
<tr>

<td class="noticia3"><br>

<table border="0">
<tr>
<td class="caja">
<font color="#000000"><b>{$men1}</b></font> <b>{$men2}</b> {$ID_noticia} <b>{$men3}</b> {$fechanoticia} <b>{$men4}</b> {$contadornoticia}
</td>
</tr>
</table>

<br>
<b>{$titulonoticiaesp}</b>&nbsp;<input type="text" name="titulo" value="{$titulonoticia}" size="50"></td>
</tr>
<tr>
<td class="noticia3"><b>{$autornoticiaesp}</b> <input type="text" name="usuario" value="{$autornoticia}" size="50"></td>
</tr>
<tr>
<td class="noticia3" valign="top"> 

<table border="0" width="81%">
<tr><td width="10%">{$categoria1}</td><td>{$categoria2}{$categoria3}{section name=contador loop=$categoria33}{$categoria33[contador]}{/section} {$categoria4} <a href="modulos.php?modulo=noticia&operacion=categoria">-></a></td></tr>
</table>

<table border="0" width="70%">
<tr>
<td class="caja" width="40%" valign="top"><b>{$imagennoticiaesp}</b><br>{$imagennoticiaesp2}</td>
<td class="caja" valign="top">
<center><SELECT NAME="picture" size="1" onChange="showimage()">
<OPTION value="../{$picture}" selected>---------------------</option>

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
<img src="../{$picture}" name="pictures"><br><br><BR></CENTER>

</td>
</tr>
</table>

</td>
</tr>
<tr>
<td class="noticia3"><b>{$portadanoticiaesp}</b><br>{$portadanoticiaesp2}<br>

<textarea name="texto" rows="20" cols="88">{$textonoticia1}</textarea>
</td>
</tr>
<tr>
<td class="noticia3"><b>{$notanoticiaesp}</b><br>{$notanoticiaesp2}<br>
<textarea name="mas_noti" rows="20" cols="88">{$textonoticia2}</textarea>
</td>
</tr>

</table>
<br><br><div align="center"><input type="submit" name="lectura" value="Editar"></div>

</form>
</td>

</tr>
</table></center>


<!-- ################## Fin Noticia (Administración) ################## -->

{include file="pie.tpl"}
