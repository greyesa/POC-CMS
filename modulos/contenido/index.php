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

/* Inicia Modulos Contenido */

function contenido($modulo,$operacion,$id_con,$ID_cont_or,$smarty,$nbase,$nuser,$nhost,$npass){

/* ########## Ver Contenido ############# */
if($operacion=="lectura"){ 

/* Generar codigo para ingresar comentario CAPTCHA */
	$captcha_texto = "";
	for ($i = 1; $i <= 6; $i++) {
	$captcha_texto .= caracter_aleatorio();
	}
	$_SESSION["captcha_texto_session"] = $captcha_texto;
/* Generar codigo para ingresar comentario CAPTCHA */

//Inicia Contador
$identificador = $_GET["identificador"];
$id_con = $_GET["id_con"];
$cont_ti = $_GET["cont_ti"];
$result2= mysql_query("SELECT * FROM contenido_or where ID_cont_or='$identificador'");
mysql_query("UPDATE contenido_or SET cont_or_cont=cont_or_cont+1 WHERE ID_cont_or='$identificador'");
//Fin de Contador

$result=mysql_query("select * from contenido,contenido_or where (id_con='$id_con') and (ID_cont_or='$identificador') order by con_fecha");
while ($row=mysql_fetch_array($result))
{
$smarty->assign('titulocategoria', "".$row["cont_ti"]."");
$smarty->assign('titulo', "".$row["con_ti"]."");
$smarty->assign('subti', "".$row["con_subti"]."");
$smarty->assign('fecha1', "".$row["con_fecha"]."");
$smarty->assign('fecha2', "Fecha de ingreso:");

$smarty->assign('imprimir', "<A HREF=javascript:popUp('imprimir.php?modulo=documentos&id_con=$row[id_con]') TITLE='Imprimir $row[con_ti]'><img src='imagenes/imprimir.gif' border='0'> Versi&oacute;n para Impresi&oacute;n</a>");

$smarty->assign('texto1', "".$row["con_tex1"]."");
$smarty->assign('texto2', "".$row["con_tex2"]."");
$smarty->assign('enlaces', "".$row["con_enlaces"]."");
}
mysql_free_result($result);

/* inicia sistema de comentarios */
/* Generar codigo para ingresar comentario CAPTCHA */
$codigo_comentario = SID;
/* Generar codigo para ingresar comentario CAPTCHA */

      $smarty->assign('operacion', 'Comentarios:');
      $smarty->assign('formulariocomentario', "<FORM METHOD='POST' ACTION='modulos.php?modulo=contenido&operacion=ingresarcom'>
		<br><b>Ingresa t&uacute; nombre:</b><br><INPUT TYPE='text' NAME='con_usuario' size='30'><br><br>
		<b>Ingresa t&uacute; comentario:</b> <br><TEXTAREA NAME='con_com_tex' ROWS='10' COLS='40'></TEXTAREA><br><br>
		<INPUT TYPE='hidden' name='identificador' value='".$identificador."'>
		<INPUT TYPE='hidden' name='id_con' value='".$id_con."'>
<b>C&oacute;digo de seguridad:</b> <br>
<img src='include/captcha/crear_imagen.php?".$codigo_comentario."'><br><br>
<b>C&oacute;digo:</b> (El c&oacute;digo es sensible a las may&uacute;culas y min&uacute;sculas)<br>
<input name='texto_ingresado' type='text' id='texto_ingresado' size='30'><br><br>
		<INPUT TYPE='submit' value='Enviar' name='ingresarcom'></FORM>");
		$result2=mysql_query("select * from contenido_com where id_con_iden='$id_con' ORDER BY con_fecha asc LIMIT 40");
		while ($row=mysql_fetch_array($result2))
		{
		$smarty->append(array('comentarioautor' => "<b>Autor:</b> ".$row["con_usuario"]."<br><b>Fecha:</b> ".$row["con_fecha"]."<br>"));
		$smarty->append(array('comentario' => "<b>Comentario:</b> ".$row["con_com_tex"]."<br><br>"));
		}
		mysql_free_result($result2);
/* inicia sistema de comentarios */

		
$smarty->display('contenido.tpl'); /* Llamamos a la plantilla */
}
/* ########## Ver Contenido ############# */
		
/* ########## Ingresar comentario para Contenido ############# */
		
		if($operacion=="ingresarcom"){
		/* Capturar datos por POST */ 
		$identificador = $_POST["identificador"];
		$id_con = $_POST["id_con"];
		$cont_ti = $_POST["cont_ti"];
		$identificador = $_POST["identificador"];
		$id_con = $_POST["id_con"];
		$con_usuario = $_POST["con_usuario"];
		$con_com_tex = $_POST["con_com_tex"];
		/* Capturar datos por POST */ 

		$result=mysql_query("select * from contenido,contenido_or where (id_con='$id_con') and (ID_cont_or='$identificador') order by con_fecha");
while ($row=mysql_fetch_array($result))
{
$smarty->assign('titulocategoria', "".$row["cont_ti"]."");
$smarty->assign('titulo', "".$row["con_ti"]."");
$smarty->assign('subti', "".$row["con_subti"]."");
$smarty->assign('fecha1', "".$row["con_fecha"]."");
$smarty->assign('fecha2', "Fecha de ingreso:");

$smarty->assign('imprimir', "<A HREF=javascript:popUp('imprimir.php?modulo=documentos&id_con=$row[id_con]') TITLE='Imprimir $row[con_ti]'><img src='imagenes/imprimir.gif' border='0'> Versi&oacute;n para Impresi&oacute;n</a>");

$smarty->assign('texto1', "".$row["con_tex1"]."");
$smarty->assign('texto2', "".$row["con_tex2"]."");
$smarty->assign('enlaces', "".$row["con_enlaces"]."");
}
mysql_free_result($result);

	/* Generar codigo para ingresar comentario CAPTCHA */
	$texto_ingresado = $_POST["texto_ingresado"];
	$captcha_texto = $_SESSION["captcha_texto_session"];
	/* Generar codigo para ingresar comentario CAPTCHA */

	if ($texto_ingresado == $captcha_texto) {

			if ($con_usuario=$con_usuario) {
   			if ($con_com_tex=$con_com_tex){

/* Sistema de seguridad para eliminar ingreso de etiquetas html */
$con_usuario = strtolower($con_usuario);
$con_usuario = ucfirst ($con_usuario); 
$con_usuario = strip_tags ($con_usuario); 
$con_com_tex = strtolower($con_com_tex);
$con_com_tex = ucfirst ($con_com_tex); 
$con_com_tex = strip_tags ($con_com_tex); 
/* Sistema de seguridad para eliminar ingreso de etiquetas html */

				$result=mysql_query("INSERT into contenido_com (con_usuario,con_com_tex,id_con_iden,con_fecha) values('$con_usuario','$con_com_tex','$id_con',now() )");

				$smarty->assign('mensaje1', "Gracias su mensaje a sido recibido satisfactoriamente. Puedes regresar <a href='modulos.php?modulo=contenido&operacion=lectura&id_con=".$id_con."&identificador=".$identificador."'>pulsando aqui.</a><br>");
			}
			else{
			$smarty->assign('mensaje2',"<b>NOTA:</b> Lo sentimos, no se pudo ingresar tu comentario, posiblemente porque no ingresaste un comentario. <a href=javascript:history.back()><<- Regresar</a><br>");
			}
			}
			else {
			$smarty->assign('mensaje3', "<b>NOTA:</b> Lo sentimos, no se pudo ingresar tu comentario, posiblemente porque no ingresaste tu nombre. <a href=javascript:history.back()><<- Regresar</a><br>");
			}
} else {
$smarty->assign('mensaje3', "<b>NOTA:</b> El c&oacute;digo ingresado no coincide. Por favor intentelo de nuevo. <a href='modulos.php?modulo=contenido&operacion=lectura&id_con=".$id_con."&identificador=".$identificador."'><<- Regresar</a><br>");
	}
	
	session_unset();
	session_destroy();

			$smarty->display('contenido.tpl'); /* Llamamos a la plantilla */
		}
		/* ########## Ingresar comentario para Contenido ############# */




/* ########## Ver Contenido por Categoria ############# */
if($operacion=="lecturacat"){
$identificador = $_GET["identificador"];
$cont_ti = $_GET["cont_ti"];

$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=150; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * from contenido where con_iden='$identificador' order by con_ti desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from contenido where con_iden='$identificador' order by con_ti desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

$smarty->assign('titulocategoria', "".$cont_ti."");

while ($row=mysql_fetch_array($cad))
{
$smarty->append(array("titulocat" => "<a href='modulos.php?modulo=contenido&operacion=lectura&id_con=".$row["id_con"]."&identificador=".$row["con_iden"]."&cont_ti=".$cont_ti."'>".$row["con_ti"]."</a>"));
$smarty->append(array("fechacat1" => "".$row["con_fecha"].""));
$smarty->append(array("fechacat2" => "Fecha de ingreso:"));
}
mysql_free_result($cad);
$smarty->assign('contenido3', "<BR>");

// Creando los enlaces de paginación
$smarty->assign('contenido4', "<center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('contenido5', "<a href='modulos.php?modulo=contenido&operacion=lecturacat&pg=".$url."&cont_ti=".$cont_ti."&identificador=".$identificador."'>&lt; Anterior</a> ");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("contenido6" => "<font color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("contenido7" => "<a href='modulos.php?modulo=contenido&operacion=lecturacat&pg=".$i."&cont_ti=".$cont_ti."&identificador=".$identificador."'>".$i."</a> "));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('contenido8', "<a href='modulos.php?modulo=contenido&operacion=lecturacat&pg=".$url."&cont_ti=".$cont_ti."&identificador=".$identificador."'>Siguiente &gt;</a>");
}
else {
echo " ";
}
$smarty->assign('contenido9', "</p></center>");
$smarty->display('contenido.tpl');
}
/* ########## Ver Contenido por Categoria ############# */


}
/* Fin de Modulos Contenido */
?>
