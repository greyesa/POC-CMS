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

/* Inicia Modulos Eventos */

function eventos($modulo,$operacion,$smarty,$nbase,$nuser,$nhost,$npass){

		/* ########## Ver Eventos ############# */
		if($operacion=="lectura"){ 
		$ID_eventos = $_GET["ID_eventos"];
		//$fecha_evento = $_GET["fecha_evento"];

$dia = $_GET["dia"];
		$mes = $_GET["mes"];

if($dia == "1"){
$dia = "01";
}
elseif($dia == "2"){
$dia = "02";
}
elseif($dia == "3"){
$dia = "03";
}
elseif($dia == "4"){
$dia = "04";
}
elseif($dia == "5"){
$dia = "05";
}
elseif($dia == "6"){
$dia = "06";
}
elseif($dia == "7"){
$dia = "07";
}
elseif($dia == "8"){
$dia = "08";
}
elseif($dia == "9"){
$dia = "09";
}


if($mes == "1"){
$mes = "01";
}
elseif($mes == "2"){
$mes = "02";
}
elseif($mes == "3"){
$mes = "03";
}
elseif($mes == "4"){
$mes = "04";
}
elseif($mes == "5"){
$mes = "05";
}
elseif($mes == "6"){
$mes = "06";
}
elseif($mes == "7"){
$mes = "07";
}
elseif($mes == "8"){
$mes = "08";
}
elseif($mes == "9"){
$mes = "09";
}


		$anio = $_GET["anio"];
	    
		$fecha_evento = $dia."/".$mes."/".$anio;



		$result=mysql_query("select * from eventos where ID_eventos='$ID_eventos' or fecha_evento='$fecha_evento' ORDER BY fecha DESC LIMIT 1");
		while ($row=mysql_fetch_array($result))
		{
		$smarty->assign('tituloeventos', $row["titulo"]);
		$smarty->assign('fecha_eventos', $row["fecha"]);
		$smarty->assign('fecha_eventos_or', "<b>Fecha que se llevar&aacute; a cabo:</b> ".$row["fecha_evento"]."");
		$smarty->assign('lugar_eventos', "<b>Lugar:</b> ".$row["lugar"]."");
		$smarty->assign('pais_eventos', "<b>Pa&iacute;s:</b> ".$row["pais"]."");
		$smarty->assign('temas_eventos', "<b>Sumario:</b><br> ".$row["temas"]."");
		$smarty->assign("nombre_eventos", "<b>Contacto:</b> ".$row["nombre"]."");
		$smarty->assign("correoeventos", "<a href='mailto:".$row["correo"]."'> ".$row["correo"]."</a>");
		}
		mysql_free_result($result);

		$result2=mysql_query("select * from eventos where ID_eventos=ID_eventos or fecha_evento='$fecha_evento' ORDER BY fecha DESC LIMIT 30");
		
		while ($row=mysql_fetch_array($result2))
		{
$smarty->assign('tituloeventos0', "M&aacute;s eventos:");
$smarty->append(array('tituloeventos2' => "<a href='modulos.php?modulo=eventos&operacion=lectura&ID_eventos=".$row["ID_eventos"]."'>".$row["titulo"]."</a> (".$row["fecha_evento"].")"));


                
		}
		mysql_free_result($result2);
		$smarty->display('eventos.tpl'); /* Llamamos a la plantilla */
		}
		/* ########## Ver Eventos ############# */
		
}
/* Fin de Modulos Eventos */
?>
