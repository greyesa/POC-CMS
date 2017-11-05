{include file="cabecera.tpl"}
<table border="0" class="contenido" height="100%">
<tr>
<td height="100%" valign="top">
<!--  ################## Inicia Formularios  ################## -->
<div class="titulos_seccion">Cont&aacute;ctanos</div>
<a href=javascript:history.back()><<- Regresar</a><br><br>

{$mensaje}<br><br>

<!--  ################## Fin Formularios  ################## -->

</td>
</tr>
</table>

</td>
  <td valign="top" class="bloquederecho">
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
<tr><td>{$bloqdertexto[contador]}</td></tr>
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

<br><br><center> <a href="rss.php"><img src="imagenes/feed-icon-16x16.gif" border="0" align="top"></a> <font color="#66737b" size="2"><b>Sind&iacute;canos</b></font>
</center>
  <!-- ################## Fin Bloque Derecho  ##################  -->
{include file="pie.tpl"}

