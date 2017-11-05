{include file="cabecera.tpl"}

<!-- ################## Inicia Eventos (Administración) ################## -->

 <center><b>{$timodulo}</b></center> <br><BR>
&nbsp;&nbsp;{$timodulo2}<br><BR>

{$eventos1}

{section name=contador loop=$eventos2}
{$eventos2[contador]}
{/section}


{$eventos3}

{$eventos4}
{$eventos5}
{section name=contador loop=$eventos6}
{$eventos6[contador]}
{/section}
{section name=contador loop=$eventos7}
{$eventos7[contador]}
{/section}
{$eventos8}
{$eventos9}

<!-- ################## Fin Eventos (Administración) ################## -->

{include file="pie.tpl"}
