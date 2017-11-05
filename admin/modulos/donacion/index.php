<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 

include '../config.inc.php';

/* Inicia Modulos Donacion (Administracion) */

function donacion($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$npass){

$smarty->assign('timodulo', "<img src='../imagenes/admin/noticia.gif' align='middle' border='0' title='Donaci&oacute;n'> M&oacute;dulo: Donaci&oacute;n");


if($operacion=="lectura"){

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=20; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * FROM  donacion where fecha_ingreso_don=fecha_ingreso_don ORDER BY fecha_ingreso_don desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($nbase,$pegar) or die (mysql_error());

$contar = "select * from donacion where fecha_ingreso_don=fecha_ingreso_don order by fecha_ingreso_don desc"; 
$contarok= mysql_db_query($nbase,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

$smarty->assign('tablanoticia1', "Donador");
$smarty->assign('tablanoticia2', "Tipo Donaci&oacute;n");
$smarty->assign('tablanoticia3', "Pa&iacute;s");
$smarty->assign('tablanoticia4', "Fecha de Ingreso");

while ($row=mysql_fetch_array($cad))
{
$smarty->append(array("tablanoticia5" => "<a href='modulos.php?modulo=donacion&operacion=ver&id_don=".$row["id_don"]."'>".$row["nombre_don"]."</a>"));
$smarty->append(array("tablanoticia6" => "".$row["pais_don"].""));
$smarty->append(array("tablanoticia7" => "".$row["fecha_ingreso_don"].""));

$smarty->append(array("opnoticia1" => ""));
$smarty->append(array("opnoticia2" => "".$row["forma_pago"].""));
}
mysql_free_result($cad);

// Creando los enlaces de paginación
$smarty->assign('enlacenoticia0', 'P&aacute;ginas');

if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('enlacenoticia1', "<a href='modulos.php?modulo=donacion&operacion=lectura&pg=".$url."'>Â« Anterior</a>");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("enlacenoticia2" => " ".$i." "));
}
else {
$smarty->append(array("enlacenoticia3" => "<a href='modulos.php?modulo=donacion&operacion=lectura&pg=".$i."'>".$i."</a>"));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('enlacenoticia4', "<a href='modulos.php?modulo=donacion&operacion=lectura&pg=".$url."'>Siguiente Â»</a>");
}
else {
}
$smarty->display('donacion/donacion.tpl');
}
/* Fin menu de noticias*/ 


if($operacion=="ver"){
	$id_don = $_GET['id_don'];

$result2=mysql_query("select * from donacion WHERE id_don='$id_don'");
while ($row=mysql_fetch_array($result2))
{
$smarty->assign('donacion1', "<a href='javascript:history.back()'><<- Regresar</a>&nbsp;&nbsp;&nbsp; <A HREF=javascript:imprimir()>[ Imprimir P&aacute;gina ]</A><br><br>

<center><TABLE border='0' width='80%'>
<TR>
	<TD width='40%'>Donador:</TD>
	<TD>".$row["nombre_don"]."
</TD>
</TR>
<TR>
	<TD>Direcci&oacute;n:</TD>
	<TD>".$row["direccion_don"]."
</TD>
</TR>
<TR>
	<TD>Ciudad:</TD>
	<TD>".$row["ciudad_don"]."
</TD>
</TR>
<TR>
	<TD>Pa&iacute;s:</TD>
	<TD>".$row["pais_don"]."
</TD>
</TR>
	<TR>
	<TD>Tel&eacute;fono Casa:</TD>
	<TD>".$row["tel_casa_don"]."
</TD>
</TR>
<TR>
	<TD>Tel&eacute;fono Celular:</TD>
	<TD>".$row["tel_cel_don"]."
</TD>
</TR>
<TR>
	<TD>Tel&eacute;fono Oficina:</TD>
	<TD>".$row["tel_ofi_don"]."
</TD>
</TR>
<TR>
	<TD>E-mail:</TD>
	<TD>".$row["email_don"]."
</TD>
</TR>
<TR>
	<TD>Nombre en el recibo:</TD>
	<TD>".$row["nom_recibo_don"]."
</TD>
</TR>
<TR>
	<TD>Nit:</TD>
	<TD>".$row["nit_don"]."
</TD>
</TR>
<TR>
	<TD>Direcci&oacute;n en el Recibo::</TD>
	<TD>".$row["dire_recibo_don"]."
</TD>
</TR>
	<TR>
	<TD>Monto de Donaci&oacute;n::</TD>
	<TD><b>".$row["monto_don"]."</b>
</TD>
</TR>
<TR>
	<TD>Fecha de Cobro:</TD>
	<TD>".$row["fecha_cobro"]."
</TD>
</TR>
<TR>
	<TD>Forma de Pago:</TD>
	<TD><b>".$row["forma_pago"]."</b>
</TD>
</TR>
	</TABLE></center>

<br><br>
<center><TABLE border='0' width='80%'>
	<TR>
	<TD width='40%'><em>Solicitud de Cobrador. (Solo para Guatemala)</em></TD>
	<TD>
</TD>
</TR>
<TR>
	<TD>Direcci&oacute;n de Cobro:</TD>
	<TD>".$row["dir_cobro_don"]."
</TD>
</TR>
<TR>
	<TD>Periodos de Cobro:</TD>
	<TD>".$row["periodo_don"]."
</TD>
</TR>
</TABLE></center>

<br><br>
<center><TABLE border='0' width='80%'>
	<TR>
	<TD width='40%'><em>Para Tarjeta de Crédito.</em></TD>
	<TD>
</TD>
</TR>
<TR>
	<TD>Tarjeta de Cr&eacute;dito:</TD>
	<TD>".$row["tar_credito_don"]."
</TD>
</TR>
<TR>
	<TD>Banco Emisor de la Tarjeta de Cr&eacute;dito:</TD>
	<TD>".$row["banco_tar_don"]."
</TD>
</TR>
<TR>
	<TD>No. Tarjeta de Cr&eacute;dito:</TD>
	<TD>".$row["no_tar_don"]."
</TD>
</TR>
<TR>
	<TD>Fecha de Vencimiento:</TD>
	<TD>".$row["fecha_ven_tar_don"]."
</TD>
</TR>

	<TR>
	<TD>Nombre que aparece en la Tarjeta de Cr&eacute;dito:</TD>
	<TD>".$row["nombre_tar_don"]."
</TD>
</TR>
<TR>
	<TD>Comentarios:</TD>
	<TD>".$row["comentarios_don"]."
</TD>
</TR>

</TABLE></center>


<br><br>");
}
mysql_free_result($result2);

$smarty->display('donacion/donacion.tpl');
}



}

/* Fin Modulo Donacion (Administracion) */



?>
