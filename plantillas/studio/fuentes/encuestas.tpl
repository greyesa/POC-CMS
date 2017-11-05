{include file="cabecera.tpl"}

<!--  ################## Inicia Encuestas  ################## -->
<div class="titulos_seccion">Encuestas</div>
<a href=javascript:history.back()><<- Regresar</a><br>


{$tema}
<center><table border='0' width='50%'><tr><td>
{section name=contador loop=$preguntas}
{$preguntas[contador]}
{/section}
</td></tr></table></center>
{$resultados}

{$enc1}
{$enc2}
{section name=contador loop=$enc3}
{$enc3[contador]}
{/section}
{$enc4}
{$enc5}
{$enc6}
{section name=contador loop=$enc7}
{$enc7[contador]}
{/section}
{section name=contador loop=$enc8}
{$enc8[contador]}
{/section}
{$enc9}
{$enc10}

{$error1}
{$error2}
{$error3}

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

