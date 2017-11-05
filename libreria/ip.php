<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 
/* Control de Ip */

function GetVar($name,$default) {
        $ret = "";
    if($var = getenv($name)){
            $ret = $var;
        }
        elseif(@$_ENV["$name"]) {
        $ret = $_ENV["$name"];
        }
    elseif(@$_SERVER["$name"]) {
        $ret = $_SERVER["$name"];
        }
    else {
        $ret = $default;
    }
    
    return trim(htmlspecialchars(stripslashes($ret)));
}
$remote = "";
        if(!$remote = GetVar("HTTP_X_FORWARDED_FOR",false)){
            $remote = gethostbyaddr(GetVar("REMOTE_ADDR", "127.0.0.1"));
                }

        if(!$remote_host = GetVar("REMOTE_HOST", false)) {
           $remote_host = GetVar("REMOTE_ADDR",  "-");
        }
$ip=$remote.'-'.$remote_host;
/* Control de Ip */
?>
