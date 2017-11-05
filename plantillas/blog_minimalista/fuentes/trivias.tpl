{include file="cabecera.tpl"}

<!--  ################## Inicia Trivias  ################## -->
<div class="titulos_seccion">Encuestas -Trivias</div>
<a href=javascript:history.back()><<- Regresar</a><br>

{$tema}
{php}

$iden_cat_triv=$_GET["iden_cat_triv"];
echo '<form action="modulos.php?modulo=encuestas&operacion=votar" method="POST" onSubmit="return validateStandard(this);">';
echo '<input type="hidden" name="ipcontrol" value="triviaip">';
echo '<input type="hidden" name="op" value="trivia">';
echo '<input type="hidden" name="vot_categoria" value="'.$iden_cat_triv.'">';
$result2=mysql_query("select * from votacion_tema where (iden_cat_triv='$iden_cat_triv') AND (vot_activar=1) AND (tipo='trivia') AND (vot_pub <=  sysdate()) AND (vot_fin_pub >= sysdate())");
while ($row2=mysql_fetch_array($result2))
{
echo '<table border="0"><tr><td><table><tr>
<td><b>'.$row2["vot_tema"].'</b><input type="hidden" name="vot_tema[]" value="'.$row2["id_vot"].'"></td></tr>
</tr><td><table>';
$id_vot2 = $row2["id_vot"];
$result3=mysql_query("select * from votacion_preg WHERE vot_iden_preg='$id_vot2' ORDER BY vot_fecha_preg asc");
while ($row3=mysql_fetch_array($result3))
{
echo "<tr><td><input type='radio' name='vot_pregunta[".$row3["vot_iden_preg"]."]' value='".$row3["ID_vot_preg"]."' required='1'></td>
<td>".$row3["vot_pregunta"]."</td>";
}
mysql_free_result($result3);
echo "</tr></table></td></tr></table></td></tr></table>";
}
mysql_free_result($result2);
echo "<input type='submit' name='votar' value='Votar'></form>";
{/php}
<!--  ################## Fin Trivias  ################## -->
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

