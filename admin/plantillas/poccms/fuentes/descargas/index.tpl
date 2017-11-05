{include file="cabecera.tpl"}

<!-- ################## Inicia Descargas (Administración) ################## -->

 <center><b>{$timodulo}</b></center> <br><BR>
&nbsp;&nbsp;{$timodulo2}<br><BR>
{$descargas0}
{$descargas1}

{$categoria1}{$categoria2}{$categoria3}{section name=contador loop=$categoria33}{$categoria33[contador]}{/section} {$categoria4}

{$descargas11}

{section name=contador loop=$descargas2}
{$descargas2[contador]}
{/section}


{$descargas3}

{$descargas4}
{$descargas5}
{section name=contador loop=$descargas6}
{$descargas6[contador]}
{/section}
{section name=contador loop=$descargas7}
{$descargas7[contador]}
{/section}
{$descargas8}
{$descargas9}

<!-- ################## Fin Descargas (Administración) ################## -->

{include file="pie.tpl"}
