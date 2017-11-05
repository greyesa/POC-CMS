{include file="cabecera.tpl"}
<table border="0" class="contenido" height="100%">
<tr>
<td height="100%" valign="top">
<!--  ################## Inicia Eventos  ################## -->
<div class="titulos_seccion">Eventos</div>
<a href=javascript:history.back()><<- Regresar</a><br><br>

<div class="titulos">{$tituloeventos}</div>
<div class="fechas">{$fecha_eventos}</div><br>


 {$lugar_eventos}<br>
 {$fecha_eventos_or}<br>
 {$pais_eventos}<br>
 {$nombre_eventos} - {$correoeventos} <br><br>
 {$temas_eventos}

<br><br><br>

<div class="titulos">{$tituloeventos0}</div>

{section name=contador loop=$tituloeventos2}
<div class="titulos">{$tituloeventos2[contador]}</div>
{/section}
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

