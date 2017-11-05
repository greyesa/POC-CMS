{include file="cabecera.tpl"}

<!-- ################## Inicia Comentarios (Administración) ################## -->
<center><b>{$timodulo}</b></center> <br>

<center>{$menu0} {$menu1}</center>

<center><table width="99%" border="0"><tr> <td class="noticia1"><div align="center">{$tablanoticia1}</div></td><td class="noticia1"><div align="center">{$tablanoticia3}</div></td><td class="noticia1"><div align="center">{$tablanoticia4}</div></td><td class="noticia1"><div align="center">{$tablanoticia2}</div></td></tr>

{section name=contador loop=$tablanoticia5}
<TR><TD class="noticia2" valign="top"><font size="2">{$tablanoticia5[contador]}</font></TD><td class="noticia2"><font size="2">{$tablanoticia6[contador]}</font></td><td class="noticia2" valign="top"><font size="2"><CENTER>{$tablanoticia7[contador]}</CENTER></font></td><td class="noticia2" valign="top"><div align="center">{$opnoticia1[contador]} {$opnoticia2[contador]}</div></td></tr>
{/section}
</TABLE>
<BR><BR>{$enlacenoticia0}<br>{$enlacenoticia1}<font color=ff0000><b>{section name=contador loop=$enlacenoticia2}
{$enlacenoticia2[contador]}
{/section}</b></font>{section name=contador loop=$enlacenoticia3}
{$enlacenoticia3[contador]}
{/section}{$enlacenoticia4}
</center>

<center>{$mensaje1}<br>
{$mensaje2}
{$mensaje3}
</center><br><br>
<!-- ################## Fin Comentarios (Administración) ################## -->

{include file="pie.tpl"}
