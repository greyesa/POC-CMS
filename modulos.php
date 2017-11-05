<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 
include 'libreria/cabecera.php';
include 'libreria/bloques.php';
include 'libreria/menu.php';

/* Inicia Módulos */

/********** Capturar datos por GET *************/
$modulo = $_GET['modulo'];
$operacion = $_GET['operacion'];
/********** Capturar datos por GET *************/

	if($modulo=="noticia"){ /* Verificar que tipo de modulo es. */
		include "modulos/noticia/index.php"; /* Hacemos un llamado al modulo */
		noticia($modulo,$operacion,$ID_noticia,$smarty,$nombre,$texto_ingresado,$captcha_texto); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="articulo"){ /* Verificar que tipo de modulo es. */
		include "modulos/articulo/index.php"; /* Hacemos un llamado al modulo */
		articulo($modulo,$operacion,$Id_articulos,$smarty); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="contenido"){ /* Verificar que tipo de modulo es. */
		include "modulos/contenido/index.php"; /* Hacemos un llamado al modulo */
		contenido($modulo,$operacion,$id_con,$ID_cont_or,$smarty,$nbase,$nuser,$nhost,$npass); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="encuestas"){ /* Verificar que tipo de modulo es. */
		include "modulos/encuestas/index.php"; /* Hacemos un llamado al modulo */
		encuestas($modulo,$operacion,$id_con,$ID_cont_or,$smarty,$nbase,$nuser,$id_vot2,$op,$vot_tema,$vot_pregunta,$ip,$nhost,$npass,$base); /* Mandamos-Recibimos parámetros */
	}


	if($modulo=="formularios"){ /* Verificar que tipo de modulo es. */
		include "modulos/formularios/index.php"; /* Hacemos un llamado al modulo */
		formularios($modulo,$operacion,$smarty,$link,$nbase,$nuser); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="eventos"){ /* Verificar que tipo de modulo es. */
		include "modulos/eventos/index.php"; /* Hacemos un llamado al modulo */
		eventos($modulo,$operacion,$smarty,$nbase,$nuser,$nhost,$npass); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="donacion"){ /* Verificar que tipo de modulo es. */
		include "modulos/donacion/index.php"; /* Hacemos un llamado al modulo */
		donacion($modulo,$operacion,$smarty,$nbase,$nuser,$nhost,$npass); /* Mandamos-Recibimos parámetros */
	}
	
	if($modulo=="registro"){ /* Verificar que tipo de modulo es. */
		include "modulos/registro/index.php"; /* Hacemos un llamado al modulo */
		registro($modulo,$operacion,$smarty,$nbase,$nuser,$nhost,$npass); /* Mandamos-Recibimos parámetros */
	}

/* Fin de Módulos */

?>
