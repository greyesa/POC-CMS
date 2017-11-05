{include file="cabecera.tpl"}
<table border="0" class="contenido" height="100%">
<tr>
<td height="100%" valign="top">
<!--  ################## Inicia Contenido  ################## -->
<div class="titulos_seccion">{$titulocategoria}</div>
<div class="linea_horiz"></div>
<div class="titulos">{$titulo}</div>



<a href=javascript:history.back()><<- Regresar</a><br><BR>

{section name=contador loop=$titulocat}
<div class="titulos">{$titulocat[contador]}</div>
<div class="fechas">{$fechacat2[contador]} {$fechacat1[contador]}</div>
{/section}
{$imprimir}
<br><br>
{$texto1}
{$texto2}
{$con_enlaces}
{$contenido3}
{$contenido4}
{$contenido5}
{section name=contador loop=$contenido6}
{$contenido6[contador]}
{/section}
{section name=contador loop=$contenido7}
{$contenido7[contador]}
{/section}
{$contenido8}
{$contenido9}

<br><br>{$ingresarnoti}<br><br>
<font size="3"><b>{$operacion}</b></font><br><br>

{section name=contador loop=$comentarioautor}
{$comentarioautor[contador]} {$comentario[contador]}<br>
{/section}


<a name="comentario" id="comentario"></a>{$formulariocomentario}
{$mensaje1}{$mensaje2}{$mensaje3}{$mensaje4}{$mensaje5}

</td>
</tr>
</table>

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
<tr><td class="titulo_bloquederecho"><b>{$bloqdertitulo[contador]}</b>
<div class="linea_horiz"></div></td></tr>
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

