{include file="cabecera.tpl"}

<!-- ################## Inicia Noticia (Administración) ################## -->

 <center><b>{$timodulo}</b></center> <br>
[ {$ingresarnoticia} ]<br>

<center> {$actualizar} </center><br>

<center><table width="99%" border="0"><tr> <td class="noticia1"><div align="center">{$tablanoticia1}</div></td><td class="noticia1"><div align="center">{$tablanoticia3}</div></td><td class="noticia1"><div align="center">{$tablanoticia4}</div></td><td class="noticia1"><div align="center">{$tablanoticia2}</div></td></tr>


{section name=contador loop=$tablanoticia5}
<TR><TD class="noticia2">{$tablanoticia5[contador]}</TD><td class="noticia2"><CENTER>{$tablanoticia6[contador]}</CENTER></td><td class="noticia2"><CENTER>{$tablanoticia7[contador]}</CENTER></td><td class="noticia2"><div align="center">{$opnoticia1[contador]} {$opnoticia2[contador]}</div></td></tr>
{/section}
</TABLE>
<BR><BR>{$enlacenoticia0}<br>{$enlacenoticia1}<font color=ff0000><b>{section name=contador loop=$enlacenoticia2}
{$enlacenoticia2[contador]}
{/section}</b></font>{section name=contador loop=$enlacenoticia3}
{$enlacenoticia3[contador]}
{/section}{$enlacenoticia4}
</center>
<!-- ################## Fin Noticia (Administración) ################## -->

{include file="pie.tpl"}
