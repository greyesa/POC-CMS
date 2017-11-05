<?php
$cfgProgDir =  '../include/phpSecurePages/';
include($cfgProgDir . "secure.php");
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
		noticia($modulo,$operacion,$smarty,$link,$nbase,$result,$pg); /* Mandamos-Recibimos parámetros */
	}


	if($modulo=="articulo"){ /* Verificar que tipo de modulo es. */
		include "modulos/articulo/index.php"; /* Hacemos un llamado al modulo */
		articulo($modulo,$operacion,$Id_articulos,$smarty); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="info"){ /* Verificar que tipo de modulo es. */
		include "modulos/info/index.php"; /* Hacemos un llamado al modulo */
		info($modulo,$operacion,$smarty); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="estadisticas"){ /* Verificar que tipo de modulo es. */
		include "modulos/estadisticas/index.php"; /* Hacemos un llamado al modulo */
		estadisticas($modulo,$operacion,$smarty,$version,$link); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="mensprivado"){ /* Verificar que tipo de modulo es. */
		include "modulos/mensprivado/index.php"; /* Hacemos un llamado al modulo */
		mensprivado($modulo,$operacion,$smarty,$tipos); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="preferencias"){ /* Verificar que tipo de modulo es. */
		include "modulos/preferencias/index.php"; /* Hacemos un llamado al modulo */
		preferencias($modulo,$operacion,$smarty); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="mensaje"){ /* Verificar que tipo de modulo es. */
		include "modulos/mensaje/index.php"; /* Hacemos un llamado al modulo */
		mensaje($modulo,$operacion,$smarty); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="contenido"){ /* Verificar que tipo de modulo es. */
		include "modulos/contenido/index.php"; /* Hacemos un llamado al modulo */
		contenido($modulo,$operacion,$smarty,$pg); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="eventos"){ /* Verificar que tipo de modulo es. */
		include "modulos/eventos/index.php"; /* Hacemos un llamado al modulo */
		eventos($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$base,$con,$nhost,$npass); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="seguridad"){ /* Verificar que tipo de modulo es. */
		include "modulos/seguridad/index.php"; /* Hacemos un llamado al modulo */
		seguridad($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="encuesta"){ /* Verificar que tipo de modulo es. */
		include "modulos/encuesta/index.php"; /* Hacemos un llamado al modulo */
		encuesta($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$nhost,$npass); /* Mandamos-Recibimos parámetros */
	}
	
	if($modulo=="bloques"){ /* Verificar que tipo de modulo es. */
		include "modulos/bloques/index.php"; /* Hacemos un llamado al modulo */
		bloques($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$npass); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="menu"){ /* Verificar que tipo de modulo es. */
		include "modulos/menu/index.php"; /* Hacemos un llamado al modulo */
		menu($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$npass); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="administrador"){ /* Verificar que tipo de modulo es. */
		include "modulos/administrador/index.php"; /* Hacemos un llamado al modulo */
		administrador($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="diseno"){ /* Verificar que tipo de modulo es. */
		include "modulos/diseno/index.php"; /* Hacemos un llamado al modulo */
		diseno($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="email"){ /* Verificar que tipo de modulo es. */
		include "modulos/email/index.php"; /* Hacemos un llamado al modulo */
		email($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="usuarios"){ /* Verificar que tipo de modulo es. */
		include "modulos/usuarios/index.php"; /* Hacemos un llamado al modulo */
		usuarios($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$npass); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="sisinfo"){ /* Verificar que tipo de modulo es. */
		include "modulos/sisinfo/index.php"; /* Hacemos un llamado al modulo */
		sisinfo($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="descargas"){ /* Verificar que tipo de modulo es. */
		include "modulos/descargas/index.php"; /* Hacemos un llamado al modulo */
		descargas($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$npass); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="comentarios"){ /* Verificar que tipo de modulo es. */
		include "modulos/comentarios/index.php"; /* Hacemos un llamado al modulo */
		comentarios($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$npass); /* Mandamos-Recibimos parámetros */
	}

	if($modulo=="donacion"){ /* Verificar que tipo de modulo es. */
		include "modulos/donacion/index.php"; /* Hacemos un llamado al modulo */
		donacion($modulo,$operacion,$smarty,$link,$nbase,$result,$pg,$nuser,$npass); /* Mandamos-Recibimos parámetros */
	}

/* Fin de Módulos */

?>
