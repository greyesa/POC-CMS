<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 

include 'config.inc.php';

/* Inicia Módulos Noticia */

function noticia($modulo,$operacion,$ID_noticia,$smarty,$nombre,$texto_ingresado,$captcha_texto){

		/* ########## Ver Noticia ############# */
		if($operacion=="vernoti"){ 
		
/* Generar codigo para ingresar comentario CAPTCHA */
	$captcha_texto = "";
	for ($i = 1; $i <= 6; $i++) {
	$captcha_texto .= caracter_aleatorio();
	}
	$_SESSION["captcha_texto_session"] = $captcha_texto;
/* Generar codigo para ingresar comentario CAPTCHA */

		/* Contador de la noticia */ 
		$result1= mysql_query("SELECT * FROM noticia where ID_noticia='$ID_noticia'");
      		mysql_query("UPDATE noticia SET not_cont=not_cont+1 WHERE ID_noticia='$ID_noticia'");
      		/* Contador de la noticia*/

		$result=mysql_query("select * from noticia WHERE ID_noticia='$ID_noticia'");
		while ($row=mysql_fetch_array($result))
		{
		$smarty->assign('titulonoticia', $row["titulo"]);
		$smarty->assign("imagennoticia", "<a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$row["ID_noticia"]."'><img src='".$row["picture"]."' vspace='0' hspace='5' alt='".$row["titulo"]."' align='left' border='0'></a>");
		$smarty->assign("textonoticia", "".$row["texto"]."");
		$smarty->assign("masnoti", "".$row["mas_noti"]."");
		$smarty->assign("enlacenoticia", "<a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$row["ID_noticia"]."' alt='M&aacute;s informaci&oacute;n acerca de ".$row["titulo"]."'> <IMG SRC='imagenes/masinfo.gif' WIDTH='14' HEIGHT='14' BORDER='0' alt='M&aacute;s informaci&oacute;n acerca de ".$row["titulo"]."'> M&aacute;s informaci&oacute;n.</a>");
		$smarty->assign("imprimirnoticia", "<A HREF=javascript:popUp('imprimir.php?modulo=noticia&ID_noticia=$row[ID_noticia]') alt='Imprimir $row[titulo]'>Versi&oacute;n para Impresi&oacute;n</A>");
		$smarty->assign("enviarnoticia", "<A HREF='modulos.php?modulo=noticia&operacion=enviarnoti&ID_noticia=$row[ID_noticia]#comentario' alt='Enviar por e-mail $row[titulo]'>Enviar a alguien</A>");
		$id_no=''.$row["ID_noticia"].'';

		$result2=mysql_query("select * from noticia_com where id_not_iden='$id_no'");
		$r=mysql_num_rows($result2);
		$smarty->assign('comentarionoticia', "Total comentarios: [ $r ]");
		mysql_free_result($result2);
		$smarty->assign('visualizacionnoticia', "Total visualizaci&oacute;nes: [ ".$row["not_cont"]." ]");
      $smarty->assign('pienoticia', "Por: ".$row["usuario"]." Ingreso: ".$row["fecha"]."");

/* Generar codigo para ingresar comentario CAPTCHA */
$codigo_comentario = SID;
/* Generar codigo para ingresar comentario CAPTCHA */

      $smarty->assign('operacion', 'Comentarios:');
      $smarty->assign('formulariocomentario', "<FORM METHOD='POST' ACTION='modulos.php?modulo=noticia&operacion=ingresarcom'>
		<br><b>Ingresa t&uacute; nombre:</b><br><INPUT TYPE='text' NAME='not_usuario' size='30'><br><br>
		<b>Ingresa t&uacute; comentario:</b> <br><TEXTAREA NAME='noti_com_tex' ROWS='10' COLS='40'></TEXTAREA><br><br>
		<INPUT TYPE='hidden' name='ID_noticia' value='".$row["ID_noticia"]."'>
		<INPUT TYPE='hidden' name='id_not_iden' value='".$row["ID_noticia"]."'>
<b>C&oacute;digo de seguridad:</b> <br>
<img src='include/captcha/crear_imagen.php?".$codigo_comentario."'><br><br>
<b>C&oacute;digo:</b> (El c&oacute;digo es sensible a las may&uacute;culas y min&uacute;sculas)<br>
<input name='texto_ingresado' type='text' id='texto_ingresado' size='30'><br><br>
		<INPUT TYPE='submit' value='Enviar' name='ingresarcom'></FORM>");
		
		}
		mysql_free_result($result);

		$result2=mysql_query("select * from noticia_com where id_not_iden='$ID_noticia' ORDER BY not_fecha asc LIMIT 40");
		while ($row=mysql_fetch_array($result2))
		{
		$smarty->append(array('comentarioautor' => "<b>Autor:</b> ".$row["not_usuario"]."<br><b>Fecha:</b> ".$row["not_fecha"]."<br>"));
		$smarty->append(array('comentario' => "<b>Comentario:</b> ".$row["noti_com_tex"]."<br><br>"));
		}
		mysql_free_result($result2);

		$result6=mysql_query("select * from noticia where ID_noticia='$ID_noticia'");
		while ($row=mysql_fetch_array($result6))
		{
      $smarty->assign('ingresarnoti', "<a href='#comentario'>[Ingresar comentario]</a>");
		}
		mysql_free_result($result6);
		$smarty->display('noticia.tpl'); /* Llamamos a la plantilla */
		}
		/* ########## Ver Noticia ############# */
		
		/* ########## Ingresar comentario para Noticia ############# */
		
		if($operacion=="ingresarcom"){
		/* Capturar datos por POST */ 
		$ID_noticia = $_POST['ID_noticia'];
		$not_usuario = $_POST['not_usuario'];
		$noti_com_tex = $_POST['noti_com_tex'];
		$id_not_iden = $_POST['id_not_iden'];
		/* Capturar datos por POST */ 

		$result=mysql_query("select * from noticia WHERE ID_noticia='$ID_noticia'");
		while ($row=mysql_fetch_array($result))
		{
		$smarty->assign('titulonoticia', $row["titulo"]);
		$smarty->assign("imagennoticia", "<a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$row["ID_noticia"]."'><img src='".$row["picture"]."' vspace='0' hspace='5' alt='".$row["titulo"]."' align='left' border='0'></a>");
		$smarty->assign("textonoticia", "".$row["texto"]."");
		$smarty->assign("masnoti", "".$row["mas_noti"]."");
		$smarty->assign("enlacenoticia", "<a href='modulos.php?modulo=noticia&ID_noticia=".$row["ID_noticia"]."' alt='M&aacute;s informaci&oacute;n acerca de ".$row["titulo"]."'> <IMG SRC='imagenes/masinfo.gif' WIDTH='14' HEIGHT='14' BORDER='0' alt='M&aacute;s informaci&oacute;n acerca de ".$row["titulo"]."'> M&aacute;s informaci&oacute;n.</a>");
		$smarty->assign("imprimirnoticia", "<A HREF=javascript:popUp('imprimir.php?modulo=noticia&ID_noticia=$row[ID_noticia]') alt='Imprimir $row[titulo]'>Versi&oacute;n para Impresi&oacute;n</A>");
		$smarty->assign("enviarnoticia", "<A HREF='modulos.php?modulo=noticia&operacion=enviarnoti&ID_noticia=$row[ID_noticia]#comentario' alt='Enviar por e-mail $row[titulo]'>Enviar a alguien</A>");
		$id_no=''.$row["ID_noticia"].'';

		$result2=mysql_query("select * from noticia_com where id_not_iden='$id_no'");
		$r=mysql_num_rows($result2);
		$smarty->assign('comentarionoticia', "Total comentarios: [ $r ]");
		mysql_free_result($result2);
		$smarty->assign('visualizacionnoticia', "Total visualizaci&oacute;nes: [ ".$row["not_cont"]." ]");
      $smarty->assign('pienoticia', "Por: ".$row["usuario"]." Ingreso: ".$row["fecha"]."");
		}
		mysql_free_result($result);
		
	/* Generar codigo para ingresar comentario CAPTCHA */
	$texto_ingresado = $_POST["texto_ingresado"];
	$captcha_texto = $_SESSION["captcha_texto_session"];
	/* Generar codigo para ingresar comentario CAPTCHA */

	if ($texto_ingresado == $captcha_texto) {

			if ($not_usuario=$not_usuario) {
   			if ($noti_com_tex=$noti_com_tex){

/* Sistema de seguridad para eliminar ingreso de etiquetas html */
$not_usuario = strtolower($not_usuario);
$not_usuario = ucfirst ($not_usuario); 
$not_usuario = strip_tags ($not_usuario); 
$noti_com_tex = strtolower($noti_com_tex);
$noti_com_tex = ucfirst ($noti_com_tex); 
$noti_com_tex = strip_tags ($noti_com_tex); 
/* Sistema de seguridad para eliminar ingreso de etiquetas html */

				$result=mysql_query("INSERT into noticia_com (not_usuario,noti_com_tex,id_not_iden,not_fecha) values('$not_usuario','$noti_com_tex','$id_not_iden',now() )");

				$smarty->assign('mensaje1', "Gracias su mensaje a sido recibido satisfactoriamente. Puedes regresar <a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$ID_noticia."'>pulsando aqui.</a><br>");
			}
			else{
			$smarty->assign('mensaje2',"<b>NOTA:</b> Lo sentimos, no se pudo ingresar tu comentario, posiblemente porque no ingresaste un comentario. <a href=javascript:history.back()><<- Regresar</a><br>");
			}
			}
			else {
			$smarty->assign('mensaje3', "<b>NOTA:</b> Lo sentimos, no se pudo ingresar tu comentario, posiblemente porque no ingresaste tu nombre. <a href=javascript:history.back()><<- Regresar</a><br>");
			}
} else {
$smarty->assign('mensaje3', "<b>NOTA:</b> El c&oacute;digo ingresado no coincide. Por favor intentelo de nuevo. <a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$ID_noticia."'><<- Regresar</a><br>");
	}
	
	session_unset();
	session_destroy();

			$smarty->display('noticia.tpl'); /* Llamamos a la plantilla */
		}
		/* ########## Ingresar comentario para Noticia ############# */

		
		
		/* ########## Enviar Noticia 1 ############# */
		if($operacion=="enviarnoti"){

		$sql3 = "SELECT * FROM correo";
		$result3 = mysql_query($sql3);
		$num2 = mysql_numrows($result3);
		;
		$result=mysql_query("select * from noticia WHERE ID_noticia='$ID_noticia'");
		while ($row=mysql_fetch_array($result))
		{
		$smarty->assign('titulonoticia', $row["titulo"]);
		$smarty->assign("imagennoticia", "<a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$row["ID_noticia"]."'><img src='".$row["picture"]."' vspace='0' hspace='5' alt='".$row["titulo"]."' align='left' border='0'></a>");
		$smarty->assign("textonoticia", "".$row["texto"]."");
		$smarty->assign("masnoti", "".$row["mas_noti"]."");
		$smarty->assign("enlacenoticia", "<a href='modulos.php?modulo=noticia&ID_noticia=".$row["ID_noticia"]."' alt='M&aacute;s informaci&oacute;n acerca de ".$row["titulo"]."'> <IMG SRC='imagenes/masinfo.gif' WIDTH='14' HEIGHT='14' BORDER='0' alt='M&aacute;s informaci&oacute;n acerca de ".$row["titulo"]."'> M&aacute;s informaci&oacute;n.</a>");
		$smarty->assign("imprimirnoticia", "<A HREF=javascript:popUp('imprimir.php?modulo=noticia&ID_noticia=$row[ID_noticia]') alt='Imprimir $row[titulo]'>Versi&oacute;n para Impresi&oacute;n</A>");
		$smarty->assign("enviarnoticia", "<A HREF='modulos.php?modulo=noticia&operacion=enviarnoti&ID_noticia=$row[ID_noticia]#comentario' alt='Enviar por e-mail $row[titulo]'>Enviar a alguien</A>");
		$id_no=''.$row["ID_noticia"].'';

		$result2=mysql_query("select * from noticia_com where id_not_iden='$id_no'");
		$r=mysql_num_rows($result2);
		$smarty->assign('comentarionoticia', "Total comentarios: [ $r ]");
		mysql_free_result($result2);
		$smarty->assign('visualizacionnoticia', "Total visualizaci&oacute;nes: [ ".$row["not_cont"]." ]");
      $smarty->assign('pienoticia', "Por: ".$row["usuario"]." Ingreso: ".$row["fecha"]."");
		}
		mysql_free_result($result);
		
		while ($row=mysql_fetch_array($result3))
		{
		$num2 = $row["servicio"];
		}
		mysql_free_result($result3);

		if ($num2 == 1) {
		$result=mysql_query("select * from noticia WHERE ID_noticia='$ID_noticia' ");
		while ($row=mysql_fetch_array($result))
		{
		$smarty->assign('operacion', 'Enviar Noticia:');
		$smarty->assign('formulariocomentario', "Enviar&aacute;s la noticia denominada: <br> <strong>".$row["titulo"]."</strong><br><br><center><FORM action='modulos.php?modulo=noticia&operacion=enviarnoti2' method='post'>
		<br><br><center>
		<B>Ingresa t&uacute; nombre:</B><br>
		<INPUT type='text' name='nombre' size='37'>&nbsp;<BR><BR><BR>
		<B>Ingresa el correo electr&oacute;nico<br> a quien se lo quieres enviar:</B><br>
		<INPUT type='text' name='correo' size='37'> <br><br>
		<INPUT type='hidden' name='ID_noticia' value='".$ID_noticia."'><br><br>
		<INPUT type='submit'  value='Enviarlos'>
		</FORM></center><br><br>");
		}
		mysql_free_result($result);
		}
		elseif ($num2 == 0)  {
		$smarty->assign('mensaje2',"<b>Nota:</b> Actualmente no tenemos activo el servicio de enviar noticias, pronto lo resolveremos. Gracias por su comprensi&oacute;n.<br><br>");
		}
		$smarty->display('noticia.tpl'); /* Llamamos a la plantilla */
		}
		/* ########## Enviar Noticia 1 ############# */
		
		/* ########## Enviar Noticia 2 ############# */
		if($operacion=="enviarnoti2"){
			/* Capturar datos por POST */ 
		$ID_noticia = $_POST['ID_noticia'];
		$nombre = $_POST['nombre'];
		$correo = $_POST['correo'];
		/* Capturar datos por POST */ 
		$result=mysql_query("select * from noticia WHERE ID_noticia='$ID_noticia'");
		while ($row=mysql_fetch_array($result))
		{
		$smarty->assign('titulonoticia', $row["titulo"]);
		$smarty->assign("imagennoticia", "<a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$row["ID_noticia"]."'><img src=".$row["picture"]." vspace=0 hspace=5 alt=".$row["titulo"]." align=left border=0></a>");
		$smarty->assign("textonoticia", "".$row["texto"]."");
		$smarty->assign("masnoti", "".$row["mas_noti"]."");
		$smarty->assign("enlacenoticia", "<a href=modulos.php?modulo=noticia&ID_noticia=".$row["ID_noticia"]." alt=M&aacute;s informaci&oacute;n acerca de ".$row["titulo"]."> <IMG SRC=imagenes/masinfo.gif WIDTH=14 HEIGHT=14 BORDER=0 alt=M&aacute;s informaci&oacute;n acerca de ".$row["titulo"]."> M&aacute;s informaci&oacute;n.</a>");
		$smarty->assign("imprimirnoticia", "<A HREF=javascript:popUp('imprimir.php?modulo=noticia&ID_noticia=$row[ID_noticia]') alt='Imprimir $row[titulo]'>Versi&oacute;n para Impresi&oacute;n</A>");
		$smarty->assign("enviarnoticia", "<A HREF='modulos.php?modulo=noticia&operacion=enviarnoti&ID_noticia=$row[ID_noticia]#comentario' alt='Enviar por e-mail $row[titulo]'>Enviar a alguien</A>");
		$id_no=''.$row["ID_noticia"].'';

		$result2=mysql_query("select * from noticia_com where id_not_iden='$id_no'");
		$r=mysql_num_rows($result2);
		$smarty->assign('comentarionoticia', "Total comentarios: [ $r ]");
		mysql_free_result($result2);
		$smarty->assign('visualizacionnoticia', "Total visualizaci&oacute;nes: [ ".$row["not_cont"]." ]");
      $smarty->assign('pienoticia', "Por: ".$row["usuario"]." Ingreso: ".$row["fecha"]."");
		}
		mysql_free_result($result);
		
		$result3=mysql_query("select * from correo,administrador");
		while ($row=mysql_fetch_array($result3))
		{
		$nencabezado = $row["encabezado"];
		$nmensaje = $row["mensaje"];
		$nde = $row["departe_de"];
		$nfirma = $row["firma"];
		$web = $row["web"];

		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= $codificacion_mail;
		$cabeceras .= 'From: <'.$nde.'>' . "\r\n";
		}
		mysql_free_result($result3);

		$result4=mysql_query("select * from noticia WHERE ID_noticia='$ID_noticia'");
		while ($row=mysql_fetch_array($result4))
		{
		$texto= $row["texto"];
		$texto2= $row["mas_noti"];
		$titulo= $row["titulo"];
		}
		mysql_free_result($result4);

		define("_THE","");
		define("_AT","::");
		$fecha= time();
		$fecha = strftime(""._THE." %d/%m/%Y "._AT." %H:%M", $fecha);

		if($correo == $correo) {
		mail("".$correo."","".$nencabezado." Noticia ".$fecha."","<b>Noticia:</b><br><br>Aqui te envia <i>".$nombre."</i> una invitaci&oacute;n para leer la noticia denominada<br><b>".$titulo."</b><br><br>Si deseas visualizar la noticia completa solo presiona el siguiente enlace:<br><br> <a href='".$web."/modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$ID_noticia."' target='_blank'>".$web."/modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$ID_noticia."</a><br><br>".$nfirma."<br><br>","".$cabeceras.""); 
		$smarty->assign('mensaje4', 'Se ha enviado un correo a: '.$correo.' <br><a href=index.php>[ Regresar a la pagina principal ]</a>');
		}
		else {
		$smarty->assign('mensaje5', 'No se pudo enviar el correo, posiblemente por que esta web no tiene este servicio, por favor contacta al administrador del sitio.');
		}
		$smarty->display('noticia.tpl'); /* Llamamos a la plantilla */
		}
		/* ########## Enviar Noticia 2 ############# */






/* ########## Ver noticias por Categoria ############# */
if($operacion=="lecturacat"){
include 'config.inc.php';
$ID_not_or = $_GET["ID_not_or"];
$not_ti = $_GET["not_ti"];

$base=$nbase;
$con=mysql_connect($nhost,$nuser,$npass);
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=50; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * from noticia where not_iden='$ID_not_or' order by titulo desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from noticia where not_iden='$ID_not_or' order by titulo desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

$smarty->assign('titulocategoria', "".$not_ti."");

while ($row=mysql_fetch_array($cad))
{
$smarty->append(array("titulocat" => "<a href='modulos.php?modulo=noticia&operacion=vernoti&ID_noticia=".$row["ID_noticia"]."'>".$row["titulo"]."</a>"));
$smarty->append(array("fechacat1" => "".$row["fecha"].""));
$smarty->append(array("fechacat2" => "Fecha de ingreso:"));
}
mysql_free_result($cad);
$smarty->assign('contenido3', "<BR>");

// Creando los enlaces de paginación
$smarty->assign('contenido4', "<center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('contenido5', "<a href='modulos.php?modulo=noticia&operacion=lecturacat&pg=".$url."'>« Anterior</a> ");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("contenido6" => "<font color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("contenido7" => "<a href='modulos.php?modulo=noticia&operacion=lecturacat&pg=".$i."'>".$i."</a> "));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('contenido8', "<a href='modulos.php?modulo=noticia&operacion=lecturacat&pg=".$url."'>Siguiente »</a>");
}
else {
echo " ";
}
$smarty->assign('contenido9', "</p></center>");
$smarty->display('noticia.tpl');
}
/* ########## Ver noticias por Categoria ############# */





}
/* Fin de Módulos Noticia */
?>
