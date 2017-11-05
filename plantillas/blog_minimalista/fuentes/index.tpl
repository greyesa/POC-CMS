{include file="cabecera.tpl"}
<!-- ################## Inicia Mensaje ################## -->
 <!-- <table border="0"> -->
 <!-- <tr> -->
 <!-- <td> -->
 <!-- <div class="titulos">{$titulomensaje}</div> -->
 <!-- </td> -->
 <!-- </tr> -->
 <!-- <tr> -->
 <!-- <td class="mensaje"> -->
 <!-- {$textomensaje} -->
 <!-- </td> -->
 <!-- </tr>  -->
 <!-- </table> -->
<!-- ################## Fin Mensaje ################## -->

<!-- ################## Inicia Noticia ################## -->

 <!-- <table border="0" width="100%"> -->
 <!-- <tr> -->
 <!-- <td> -->
 <!-- <div class="titulos_seccion">{$tinoticia}</div> -->
 <!-- </td></tr></table> -->

<table border="0" width="100%">
<tr>
<td width="100%" valign="top" class="home_noticia_bloques">
{section name=contador loop=$titulonoticia}
<table border="0" width="100%">
<tr>
<td>
<div class="titulos">{$titulonoticia[contador]}</div>
<br>
{$imagennoticia[contador]} {$textonoticia[contador]}

</td>
</tr>
<tr>
<td>
<div class="fechas">{$pienoticia[contador]}  <img src="plantillas/blog_minimalista/fuentes/comentario.gif" border="0"> {$comentarionoticia[contador]} <!-- - {$visualizacionnoticia[contador]} --> </div> 
<div class="linea_horiz"></div>
</td>
</tr>
</table>
{/section}
<div align="right"><a href="modulos.php?modulo=noticia&operacion=lecturacat&ID_not_or=1&noticia_ti=Noticias%20Generales">+ M&aacute;s noticias</a></div>
</td>

</tr>
</table>
<!-- ################## Fin Noticia ################## -->

</td>
  <td valign="top" width="25%">
  <!-- ################## Inicia Bloque Derecho  ##################  -->
   <!-- ################## Inicia Menu  ##################  -->
	<!--<table border="0" width="100%"> -->
	<!--{section name=contador loop=$menu} -->
	<!--<tr><td>{$menu[contador]}</td></tr> -->
	<!--{/section}  -->
	<!--</table><br> -->
<!--   ################## Fin Menu  ##################  -->

{section name=contador loop=$bloqdertitulo}
 <table border="0" width="100%">
<tr><td><b>{$bloqdertitulo[contador]}</b></td></tr>
<tr><td class="bloquederecho">{$bloqdertexto[contador]}</td></tr>
</table><br>	
{/section} 

<table border="0" width="100%">
{section name=contador loop=$bloqdertitulorss1}
<tr><td><b>{$bloqdertitulorss1[contador]}</b></td></tr>
{/section}
<tr><td> 
{section name=contador loop=$bloqdertextorss2}
{$bloqdertextorss2[contador]}
{/section} 
</td>
</tr>
</table>

<br><br><center> <a href="rss.php"><img src="imagenes/rss.gif" border="0" align="top"></a>
</center>
  <!-- ################## Fin Bloque Derecho  ##################  -->

{include file="pie.tpl"}
