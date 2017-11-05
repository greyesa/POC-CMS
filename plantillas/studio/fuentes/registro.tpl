{include file="cabecera.tpl"}
<table border="0" class="contenido" height="100%">
<tr>
<td height="100%" valign="top">
<!--  ################## Inicia Registro  ################## -->
<div class="titulos_seccion">Suscripci&oacute;n</div>
<a href=javascript:history.back()><<- Regresar</a><br><br>

{$mensaje}<br><br>

<!--  ################## Fin Registro  ################## -->

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

