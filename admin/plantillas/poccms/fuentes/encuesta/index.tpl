{include file="cabecera.tpl"}

<!-- ################## Inicia Encuesta (Administración) ################## -->

 <center><b>{$timodulo}</b></center> <br><BR>

{$enc1}
{$enc0}
{$enc2}

{$enc32}
{section name=contador loop=$enc30}
{$enc30[contador]}
{/section}
{section name=contador loop=$enc33}
{$enc33[contador]}
{/section}
{$enc34}

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


{$contenido}
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

<!-- ################## Fin Encuesta (Administración) ################## -->

{include file="pie.tpl"}
