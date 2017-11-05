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

/* Inicia Modulos Encuestas */

function encuestas($modulo,$operacion,$id_con,$ID_cont_or,$smarty,$nbase,$nuser,$id_vot2,$op,$vot_tema,$vot_pregunta,$ip,$nhost,$npass) {

//echo $ip;

		/* Trivias */
		if($operacion=="trivia"){
		echo $ip;
		
		/* En plantilla se incluye las respectivas consultas */
		$smarty->display('trivias.tpl'); /* Llamamos a la plantilla */
		}
		/* Trivias */



		/* ########## Encuestas ############# */
		
		/* Realizar Votos */
		if($operacion=="votar"){ 
		
		$vot_tema = $_POST["vot_tema"];
		$vot_pregunta = $_POST["vot_pregunta"];
		$vot_iden_preg = $_POST["vot_iden_preg"];
		$vot_categoria = $_POST["vot_categoria"];
		$op = $_POST["op"];
		$ipcontrol = $_POST["ipcontrol"];
		
		//$ip= getenv("REMOTE_ADDR");
		
	  	if($vot_pregunta=$vot_pregunta) {
	  	
	  	if($ipcontrol=="encuestaip"){
	   $result3=mysql_query("select * from votacion_ips where (votacion_ips='$ip') and (votacion_control='$vot_iden_preg')");
	   $num = mysql_numrows($result3);
		}
		elseif($ipcontrol=="triviaip"){
		for($i=0; $i<count($vot_tema); $i++){
		$result3=mysql_query("select * from votacion_ips where (votacion_ips='$ip') and (votacion_control='$vot_tema[$i]')");
		$num = mysql_numrows($result3);
	
		}
		}
   	
   	
		if($num==0){
		if($op=="encuesta"){
		$result4=mysql_query("INSERT INTO votacion_ips (votacion_ips,votacion_control,votacion_pregunta_control,us_vot,pais_vot,tipo,fecha_vot) VALUES ('$ip','$vot_iden_preg','$vot_pregunta','$nombre','$pais','encuesta',now())");
		mysql_query("UPDATE votacion_preg SET vot_punteo=vot_punteo+1 WHERE ID_vot_preg='$vot_pregunta'");
      mysql_query("UPDATE votacion_tema SET vot_cont=vot_cont+1 WHERE id_vot='$vot_tema'");
      $smarty->assign('error1', "Su voto fue contabilizado satisfactoriamente. Gracias por participar. Puede ver los resultados de esta encuesta <a href='modulos.php?modulo=encuestas&operacion=resultados&id_vot=".$vot_tema."'>pulsando aqui</a>.");
      }
		elseif($op=="trivia"){
		$trivia=mysql_query("select id_vot from votacion_tema WHERE iden_cat_triv='$vot_categoria'");
		while ($rowtrivia=mysql_fetch_array($trivia))
		{
		$variable = $vot_pregunta[$rowtrivia["id_vot"]];
		mysql_query("UPDATE votacion_preg SET vot_punteo=vot_punteo+1 WHERE ID_vot_preg='$variable'");
		$id_vot = $rowtrivia["id_vot"];
	   $result4=mysql_query("INSERT INTO votacion_ips (votacion_ips,votacion_control,votacion_pregunta_control,us_vot,pais_vot,tipo,fecha_vot) VALUES ('$ip','$id_vot','$variable','tavo','Guatemala','trivia',now())");
		}
		mysql_free_result($trivia);
		
		for($i=0; $i<count($vot_tema); $i++){
		mysql_query("UPDATE votacion_tema SET vot_cont=vot_cont+1 WHERE id_vot='$vot_tema[$i]'");
		}
		
		$smarty->assign('error1', "La Trivia fue ingresada satisfactoriamente. Gracias por participar.");
		}
		}
		elseif($num==1){
		$smarty->assign('error1', "Al parecer usted ya realizo el voto. Solo se permite un voto por persona.<br>Gracias por participar.");
		}
		}
		else{
		$smarty->assign('error1', "No selecciono nada. Por favor seleccione al menos una casilla.");
		}
		$smarty->display('encuestas.tpl'); /* Llamamos a la plantilla */
		}
		/* Realizar Votos */
		
		/* Ver resultados */
		if($operacion=="resultados"){
		$id_vot = $_GET["id_vot"];
	   $result2=mysql_query("select * from votacion_tema where id_vot='$id_vot' ORDER BY vot_fecha DESC LIMIT 1");
		while ($row=mysql_fetch_array($result2))
		{
		
		$vot_cont = $row["vot_cont"];
		
		$smarty->assign('tema', "<br><br><br><CENTER><B>".$row["vot_tema"]."</B></CENTER><br>");
		
		$result=mysql_query("select * from votacion_preg WHERE vot_iden_preg='$id_vot' ORDER BY vot_fecha_preg");
		while ($row2=mysql_fetch_array($result))
		{
		
		$ancho = "".$row2["vot_punteo"]."*100/".$vot_cont."";
		
		if($ancho==0){
		$nuevo_ancho = "<IMG height='9' WIDTH='1%' SRC='imagenes/estadisticas/imagen/green.jpg'>";
		}
		else{
		$nuevo_ancho = "<IMG height='9' WIDTH='".$ancho."%' SRC='imagenes/estadisticas/imagen/green.jpg'>";
		}
		
		$smarty->append(array('preguntas' => "
		<b>".$row2["vot_pregunta"]."</b><br> ".$nuevo_ancho." <i>(".$row2["vot_punteo"].")</i><br><br>"));
		}
		mysql_free_result($result);
		$smarty->assign('resultados', "<br><br><center><i><b>Total votos:</b> ".$row["vot_cont"]."</i></center>");
		}
		mysql_free_result($result2);

		$smarty->display('encuestas.tpl'); /* Llamamos a la plantilla */
		}
		/* Ver resultados */
		
		
		/* Mas Encuestas */
		if($operacion=="encuestas"){
		$pg = $_GET['pg'];
include 'config.inc.php';
$base=$nbase;
$con=mysql_connect($nhost,$nuser,$npass);
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=22; // cantidad de resultados por página
$inicial = $pg * $cantidad;

$pegar = "SELECT * from votacion_tema where vot_activar='1' ORDER BY vot_fecha desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from votacion_tema where vot_activar='1' order by vot_fecha desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

$smarty->assign('enc2', "<br><br><br><center>
<table width='100%' border='0'>
<tr> 
<td><div align='left'>
<strong>Tema</strong></div></td>
<td><div align='center'><strong>Votos</strong></div></td>
</tr><tr>");

while ($row=mysql_fetch_array($cad))
{
$smarty->append(array("enc3" => "
<td><a href='modulos.php?modulo=encuestas&operacion=resultados&id_vot=".$row["id_vot"]."'>".$row["vot_tema"]."</a></td>
<td><CENTER>".$row["vot_cont"]."</CENTER></td>
</tr>"));
}
mysql_free_result($cad);
$smarty->assign('enc4', "</table>");

// Creando los enlaces de paginación
$smarty->assign('enc5', "<br><br><center><p>P&aacute;ginas:<br>");
if ($pg <> 0)
{
$url = $pg - 1;
$smarty->assign('enc6', "<a href='modulos.php?modulo=encuestas&operacion=encuestas&id_vot=".$row["id_vot"]."&pg=".$url."'>« Anterior</a> ");
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
$smarty->append(array("enc7" => "<font color=ff0000><b> $i </b></font>"));
}
else {
$smarty->append(array("enc8" => "<a href='modulos.php?modulo=encuestas&operacion=encuestas&id_vot=".$row["id_vot"]."&pg=".$i."'>".$i."</a> "));
}
}

if ($pg < $pages) {
$url = $pg + 1;
$smarty->assign('enc9', "<a href='modulos.php?modulo=encuestas&operacion=encuestas&id_vot=".$row["id_vot"]."&pg=".$url."'>Siguiente »</a>");
}
else {
echo " ";
}
		$smarty->display('encuestas.tpl'); /* Llamamos a la plantilla */
		}
		/* Mas Encuestas */
	
		
		
		/* ########## Encuestas ############# */
		
}
/* Fin de Modulos Encuestas */
?>
