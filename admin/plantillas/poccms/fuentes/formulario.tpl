{include file="css.tpl"}
{$codificacion}
</head>
<!--  ################## Fin de Cabecera  ################## -->

<!--  ################## Inicia Cuerpo de Página  ################## -->

<body>

<!-- Logotipo -->
<div id="cabecera"><div class="ancho_general">
{$tituloadm}<br> 
<font size="4" color="#000000"><b>Sistema de Administraci&oacute;n </b></font><br>
<font size="2">[POC-CMS {$version}]</font>
</div>
</div>
<!-- Logotipo -->

<table border="0" align="center">
<tr>
<td class="caja2">
<table align="center" CELLSPACING=0 CELLSPACING=0 width="752" border="0">
<tr>
<td class="tituloadm" valign="top">

</td></tr></table>

<table align="center" CELLSPACING=0 CELLSPACING=0 width="752" border="0">
<tr>
<td class="login">
<!--  ################## Inicia Fecha  ################## -->
&nbsp;{$fecha} 
<!--  ################## Fin Fecha  ################## -->
</td>
</tr>
</table>

<table align="center" CELLSPACING=0 CELLSPACING=0 width="752" border="0">
<tr>
<td width="65%" class="caja" valign="top">

<!-- ################## Inicia Formulario de ingreso ################## -->

<br><br><center><table border="0" width="80%">
<tr>
<td valign="top" width="40%" class="login1">{$formularioadminti} <br><br><br> <a href=javascript:history.back()><<- Regresar</a><br><a href="../index.php">Home del Sitio</a></td>
<td valign="top" class="login2" width="40%">{$formularioadmin}</td>
</tr>
</table></center><br><br>



<!-- ################## Fin Formulario de ingreso ################## -->

{include file="pie.tpl"}
