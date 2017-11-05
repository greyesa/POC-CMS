{include file="cabecera.tpl"}

<!-- ################## Inicia categoria (Administración) ################## -->

 <center><b>{$timodulo}</b></center> <br>
 [ {$ingresarnoticia} ]<br>
{$timodulo1}
{$contenido}
{$noticiaingreso}
{$contenido0} 
<center>{$contenido1}
{section name=contador loop=$contenido2}
{$contenido2[contador]}
{/section}
{$contenido3}</center>
{$contenido4}
{section name=contador loop=$contenido44}
{$contenido44[contador]}
{/section}
{$contenido5}
{section name=contador loop=$contenido6}
{$contenido6[contador]}
{/section}
{section name=contador loop=$contenido7}
{$contenido7[contador]}
{/section}
{$contenido8}
{$contenido9}

<!-- ################## Fin categoria (Administración) ################## -->

{include file="pie.tpl"}
