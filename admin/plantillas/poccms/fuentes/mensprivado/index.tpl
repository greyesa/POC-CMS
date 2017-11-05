{include file="cabecera.tpl"}

<!-- ################## Inicia Noticia (Administración) ################## -->

 <center><b>{$timodulo}</b></center> <br><BR>


{$mensprivado1}

{$mensprivado2}

{$mensprivado3}

{$mensprivado4}

{section name=contador loop=$mensprivado44}
<b>{$mensprivado44[contador]}
{/section}

{$mensprivado5}<br><br>
{$mensprivado6}
{$mensprivado7}
{section name=contador loop=$mensprivado8}
{$mensprivado8[contador]}
{/section}
{section name=contador loop=$mensprivado9}
{$mensprivado9[contador]}
{/section}
{$mensprivado10}
{$mensprivado11}




<!-- ################## Fin Noticia (Administración) ################## -->

{include file="pie.tpl"}
