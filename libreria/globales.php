<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 

if($_POST)
{
    $keys_post = array_keys($_POST);
    foreach ($keys_post as $key_post)
     {
      $$key_post = $_POST[$key_post];
      error_log("variable $key_post viene desde $ _POST");
     }
}

if($_GET)
{
    $keys_get = array_keys($_GET);
    foreach ($keys_get as $key_get)
     {
        $$key_get = $_GET[$key_get];
        error_log("variable $key_get viene desde $ _GET");
     }
}

if($_SESSION)
{
    $keys_sesion = array_keys($_SESSION);
    foreach ($keys_sesion as $key_sesion)
     {
       $$key_sesion = $_SESSION[$key_sesion];
       error_log("variable $key_sesion viene desde $ _SESSION");
     }
}

?> 

