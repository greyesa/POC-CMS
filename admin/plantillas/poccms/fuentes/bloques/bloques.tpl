{include file="cabecera.tpl"}

<!-- ################## Inicia Bloques (Administración) ################## -->

 <center><b>{$timodulo}</b></center> <br><BR>
{$timodulo1}
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
<table align='center' width='85%' border='0'>
<tr>
  <td class='noticia1'><div align='center'><strong>{$encbloque.titulo}</strong></div></td>
  <td class='noticia1'><div align='center'><strong>{$encbloque.tipo}</strong></div></td>
  <td class='noticia1'><div align='center'><strong>{$encbloque.visualizar}</strong></div></td>
    <td class='noticia1'><div align='center'><strong>{$encbloque.posicion}</strong></div></td>
  <td class='noticia1'><div align='center'><strong>{$encbloque.accion}</strong></div></td>
  
 
</tr>
{section name=contador loop=$bloque}
<tr>
<td class='noticia2'><a href='modulos.php?modulo=bloques&operacion=editar&ID_bloque={$bloque[contador].ID_bloque}&tipo={$bloque[contador].tipo}'>{$bloque[contador].titulo}</a></td>

<td class='noticia2'><div align='center'><b><img src='../imagenes/documentos/{$bloque[contador].tipo}.gif' border='0' alt='{$bloque[contador].tipo}'></b></div></td>

<td class='noticia2'><div align='center'><a href='modulos.php?modulo=bloques&operacion=mostrar&ID_bloque={$bloque[contador].ID_bloque}&sis={$bloque[contador].sis}&nombre={$bloque[contador].titulo}'>{$bloque[contador].ver}</a></div></td>
<td class='noticia2'><div align='center'><a href='modulos.php?modulo=bloques&operacion=ubicacion&ID_bloque={$bloque[contador].ID_bloque}&posicion={$bloque[contador].posicion}&nombre={$bloque[contador].titulo}'>{$bloque[contador].ant}</a></div></td>

<td class='noticia2'><div align='center'><a href='modulos.php?modulo=bloques&operacion=editar&ID_bloque={$bloque[contador].ID_bloque}&tipo={$bloque[contador].tipo}'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> <a href='modulos.php?modulo=bloques&operacion=borrar&ID_bloque={$bloque[contador].ID_bloque}&titulo={$bloque[contador].titulo}'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></div></td>

{if $bloque[contador].enlace1 eq ""}
  <td class='noticia2'> </td>
{else}
  <td class='noticia2'><div align='center'><b>
<a href='modulos.php?modulo=bloques&tipo={$bloque[contador].tipo}&{$bloque[contador].enlace1}'>
   <img src='../imagenes/menus/abajo.png' border='0' alt='abajo'></b></div>
</a>
</td>
{/if}

{if $bloque[contador].enlace2 eq ""}
  <td class='noticia2'> </td>
{else}
  <td class='noticia2'><div align='center'><b>
  <a href='modulos.php?modulo=bloques&tipo={$bloque[contador].tipo}&{$bloque[contador].enlace2}'>
   <img src='../imagenes/menus/arriba.png' border='0' alt='arriba'></b></div>
  </a>
  </td>
{/if}
</tr>
{/section}
</table>
<br><BR>

<!-- ################## Fin Bloques (Administración) ################## -->

{include file="pie.tpl"}
