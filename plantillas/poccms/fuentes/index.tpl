{include file="cabecera.tpl"}
<!-- ################## Inicia Mensaje ################## -->
<table border="0">
<tr>
<td>
<div class="titulos">{$titulomensaje}</div>
</td>
</tr>
<tr>
<td class="mensaje">
{$textomensaje}
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
<div class="titulos_seccion">{$tinoticia}</div>
</td></tr></table>
{section name=contador loop=$titulonoticia}
<table border="0" width="100%">
<tr>
<td class="home_noticia_bloques">
<div class="titulos">{$titulonoticia[contador]}</div>
<div class="fechas">{$pienoticia[contador]} - {$comentarionoticia[contador]} - {$visualizacionnoticia[contador]} </div> 
{$imagennoticia[contador]} {$textonoticia[contador]}

</td>
</tr>
</table>
{/section}
<div align="right"><a href="modulos.php?modulo=noticia&operacion=lecturacat&ID_not_or=1&noticia_ti=Noticias%20Generales">+ M&aacute;s noticias</a></div>
</td>

</tr>
</table>
<!-- ################## Fin Noticia ################## -->

{include file="pie.tpl"}
