<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 

include 'libreria/ip.php';
include 'config.inc.php';

  $result3=mysql_query("select * from control_ip where (ip='$ip')");
	   $num = mysql_numrows($result3);

if($num==0){
/* Base de datos de Visualizador */
if((ereg("Nav", getenv("HTTP_USER_AGENT"))) || (ereg("Gold", getenv("HTTP_USER_AGENT"))) || (ereg("X11", getenv("HTTP_USER_AGENT"))) || (ereg("Mozilla", getenv("HTTP_USER_AGENT"))) || (ereg("Netscape", getenv("HTTP_USER_AGENT"))) AND (!ereg("MSIE", getenv("HTTP_USER_AGENT"))) AND (!ereg("Konqueror", getenv("HTTP_USER_AGENT")))) $browser = "Netscape";
    elseif(ereg("Opera", getenv("HTTP_USER_AGENT"))) $browser = "Opera";
    elseif(ereg("MSIE", getenv("HTTP_USER_AGENT"))) $browser = "MSIE";
    elseif(ereg("Lynx", getenv("HTTP_USER_AGENT"))) $browser = "Lynx";
    elseif(ereg("WebTV", getenv("HTTP_USER_AGENT"))) $browser = "WebTV";
    elseif(ereg("Konqueror", getenv("HTTP_USER_AGENT"))) $browser = "Konqueror";
    elseif((eregi("bot", getenv("HTTP_USER_AGENT"))) || (ereg("Google", getenv("HTTP_USER_AGENT"))) || (ereg("Slurp", getenv("HTTP_USER_AGENT"))) || (ereg("Scooter", getenv("HTTP_USER_AGENT"))) || (eregi("Spider", getenv("HTTP_USER_AGENT"))) || (eregi("Infoseek", getenv("HTTP_USER_AGENT")))) $browser = "Bot";
    else $browser = "otros";

    /* Base de datos de Sistema Operativo*/
    if(ereg("Win", getenv("HTTP_USER_AGENT"))) $os = "Windows";
    elseif((ereg("Mac", getenv("HTTP_USER_AGENT"))) || (ereg("PPC", getenv("HTTP_USER_AGENT")))) $os = "Mac";
    elseif(ereg("Linux", getenv("HTTP_USER_AGENT"))) $os = "Linux";
    elseif(ereg("FreeBSD", getenv("HTTP_USER_AGENT"))) $os = "FreeBSD";
    elseif(ereg("SunOS", getenv("HTTP_USER_AGENT"))) $os = "SunOS";
    elseif(ereg("IRIX", getenv("HTTP_USER_AGENT"))) $os = "IRIX";
    elseif(ereg("BeOS", getenv("HTTP_USER_AGENT"))) $os = "BeOS";
    elseif(ereg("OS/2", getenv("HTTP_USER_AGENT"))) $os = "OS/2";
    elseif(ereg("AIX", getenv("HTTP_USER_AGENT"))) $os = "AIX";
    else $os = "Otros";

      $result4=mysql_query("select * from contador");
      $num4 = mysql_numrows($result4);
	if($num4==0){
	$result5=mysql_query("INSERT INTO contador (id) VALUES ('1')");
 	}
	elseif($num4==1){
	$result5=mysql_query("UPDATE contador SET id=id+1");
	}

     
	$result7=mysql_query("UPDATE estadisticas_brow SET contador=contador+1 WHERE nombre_bro='$browser'");

	$result8=mysql_query("UPDATE estadisticas_os SET contador=contador+1 WHERE nombre_os='$os'");

	$xyweekday=date("w");
	$result9=mysql_query("UPDATE estadisticas_semana SET hits=hits+1 WHERE dia_semana='$xyweekday'");

	$xyhour=date("G");
	$result10=mysql_query("UPDATE estadisticas_hora SET hits=hits+1 WHERE hora='$xyhour'");

	$xymonth=date("m");
	$result11=mysql_query("UPDATE estadisticas_mes SET hits=hits+1 WHERE mes='$xymonth'");
	
    
    $result6=mysql_query("INSERT INTO control_ip (ip,fecha) VALUES ('$ip',now())");
}
elseif($num==1){
}
?>
