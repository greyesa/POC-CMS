{include file="cabecera.tpl"}

<!-- ################## Inicia Menu (Administración) ################## -->

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
  <th class='noticia1'><div align='center'><strong>{$encbloque.titulo}</strong></div></th>
 
  <th class='noticia1'><div align='center'><strong>{$encbloque.visualizar}</strong></div></th>
  <th class='noticia1'><div align='center'><strong>{$encbloque.accion}</strong></div></th>
</tr>
{section name=contador loop=$bloque}
<tr>
<td class='noticia2'><a href='modulos.php?modulo=menu&operacion=editar&titulo={$bloque[contador].titulo}&ID_menu={$bloque[contador].ID_bordede}'>{$bloque[contador].titulo}</a></td>

<td class='noticia2'><div align='center'><a href='modulos.php?modulo=menu&operacion=mostrar&sis={$bloque[contador].sis}&ID_menu={$bloque[contador].ID_bordede}&titulo={$bloque[contador].titulo}'>{$bloque[contador].ver}</a></div></td>

<td class='noticia2'><div align='center'><a href='modulos.php?modulo=menu&operacion=editar&titulo={$bloque[contador].titulo}&ID_menu={$bloque[contador].ID_bordede}'><img src=../imagenes/admin/sistema/editar.png border=0 title=Editar></a> 

<a href='modulos.php?modulo=menu&operacion=borrar&titulo={$bloque[contador].titulo}&ID_menu={$bloque[contador].ID_bordede}'><img src=../imagenes/admin/sistema/eliminar.png border=0 title=Eliminar></a></div></td>

{if $bloque[contador].enlace1 eq ""}
  <td class='noticia2'> </td>
{else}
  <td class='noticia2'><div align='center'><b>
<a href='modulos.php?modulo=menu&{$bloque[contador].enlace1}'>
   <img src='../imagenes/menus/abajo.png' border='0' alt='abajo'></b></div>
</a>
</td>
{/if}

{if $bloque[contador].enlace2 eq ""}
  <td class='noticia2'> </td>
{else}
  <td class='noticia2'><div align='center'><b>
  <a href='modulos.php?modulo=menu&{$bloque[contador].enlace2}'>
   <img src='../imagenes/menus/arriba.png' border='0' alt='arriba'></b></div>
  </a>
  </td>
{/if}
</tr>
{/section}
</table>
<br><BR>

<!-- ################## Fin Menu (Administración) ################## -->

{include file="pie.tpl"}
