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
include 'fecha.php'; 
include 'globales.php';

// ######## Calcular tiempo de carga de pagina ######## //
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$tiempoinicial = $mtime; 
// ######## Calcular tiempo de carga de pagina ######## //
// Configuración de Smarty Templates.
require('../include/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$plantilla = "poccms";
$smarty->assign('codificacion', $codificacion);
$smarty->assign('fecha', $fecha);
$smarty->assign('version', $version);
$smarty->assign('codificacion', $codificacion);
$smarty->template_dir = 'plantillas/'.$plantilla.'/fuentes';
$smarty->compile_dir = 'plantillas/'.$plantilla.'/compilado';
$smarty->cache_dir = 'plantillas/cache';
$smarty->config_dir = 'include/Smarty/unit_test/configs';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!--  ################## Sistema trabajando con tecnologia POC-CMS http://www.poccms.com  ################## -->
<!--  ################## Inicia Cabecera  ################## -->
<?php
$result=mysql_query("select * from cabecera");
while ($row=mysql_fetch_array($result))
{
echo     '<TITLE>'.$row["titulo"].' - [ POC-CMS '.$version.' ]</TITLE>';
print " \n";
echo     '<META NAME="robots" content="all">';
print " \n";
echo     '<META NAME="distribution" content="global">';
print " \n";
echo     '<meta name="author" content="Gustavo Reyes">';
print " \n";
echo     '<meta name="generator" content="Bluefish 1.0.7">';
print " \n";
echo     '<META NAME="CLASSIFICATION" CONTENT="'.$row["clasificacion"].'">';
print " \n";
echo     '<META NAME="DESCRIPTION" CONTENT="'.$row["descripcion"].'">';
print " \n";
echo     '<META NAME="KEYWORDS" CONTENT="'.$row["llaves"].'">';
print " \n";
$smarty->assign('tituloadm', ''.$row["titulo"].'');
}
mysql_free_result($result);
?>

<!-- PopUps -->
<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,directories=0,status=0,copyhistory=0,statusbar=0,menubar=0,resizable=0,width=500,height=500,left = 150,top = 10');");
}
</script>
<SCRIPT LANGUAGE="JavaScript">
function imagenNoticia(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1,scrollbars=1,location=0,directories=0,status=0,copyhistory=0,statusbar=0,menubar=0,resizable=0,width=800,height=500,left = 80,top = 10');");
}
</script>
<!-- PopUps -->

<!-- Calendario -->
<style type="text/css">@import url(../include/calendar/calendar-win2k-1.css);</style>
<script type="text/javascript" src="../include/calendar/calendar.js"></script>
<script type="text/javascript" src="../include/calendar/lang/calendar-es.js"></script>
<script type="text/javascript" src="../include/calendar/calendar-setup.js"></script>
<!-- Calendario -->

 <!-- <script language="JavaScript" type="text/javascript" src="templates/poccms/templates/copiar.js"></script> -->

<!--  Editor -->
<script language="JavaScript" type="text/javascript" src="../include/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
    // <!--
function jInsertEditorText( text ) {
			tinyMCE.execCommand('mceInsertContent',false,text);
		}
    // -->
  </script>
  <script type="text/javascript">
    // <!--

			function insertReadmore() {
				var content = tinyMCE.getContent();
				if (content.match(/<hr id="system-readmore" \/>/)) {
					alert('Already Exists');
					return false;
				} else {
					jInsertEditorText('<hr id="system-readmore" />');
				}
			}
			
    // -->
  </script>
  
<?php  
$result=mysql_query("select * from cuerpo where id_cuerpo=1");
while ($row=mysql_fetch_array($result))
{
$plantilla1= $row["valores"];
$resto = substr ("$plantilla1", 18,-4); 
}
mysql_free_result($result);
?>
<script type="text/javascript">
			tinyMCE.init({
			theme : "advanced",
			language : "es",
			mode : "exact",
			document_base_url : "<?php echo $base_sitio; ?>",
			content_css : "<?php echo $base_sitio; ?>plantillas<?php echo $resto; ?>/fuentes<?php echo $resto; ?>.css", 
			elements : "texto,mas_noti,con_enlaces,mensaje,firma,descripcion",
			entities : "60,lt,62,gt",
			relative_urls : false,
			remove_script_host : false,
			save_callback : "TinyMCE_Save",
			invalid_elements : "applet",
			theme_advanced_toolbar_location : "top",
			theme_advanced_source_editor_height : "550",
			theme_advanced_source_editor_width : "750",
			directionality: "ltr",
			force_br_newlines : "false",
			force_p_newlines : "true",
			debug : false,
			cleanup : true,
			cleanup_on_startup : false,
			safari_warning : false,
			plugins : "advlink, advimage,  preview, searchreplace, insertdatetime, emotions, advhr, flash, table, fullscreen, directionality, layer, style",
			theme_advanced_buttons2_add : "preview, search,replace, insertdate, inserttime, emotions, ltr,rtl, insertlayer, moveforward, movebackward, absolute",
			theme_advanced_buttons3_add : "advhr, flash, tablecontrols, fullscreen, styleprops",
			theme_advanced_disable : "help",
			plugin_insertdate_dateFormat : "%Y-%m-%d",
			plugin_insertdate_timeFormat : "%H:%M:%S",
			extended_valid_elements : "hr[id|class|title], a[class|name|href|target|title|onclick], img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name], hr[class|width|size|noshade]",
			fullscreen_settings : {
				theme_advanced_path_location : "top"
			}
		});
		function TinyMCE_Save(editor_id, content, node)
		{
			base_url = tinyMCE.settings['document_base_url'];
			var vHTML = content;
			if (true == true){
				vHTML = tinyMCE.regexpReplace(vHTML, 'href\s*=\s*"?'+base_url+'', 'href="', 'gi');
				vHTML = tinyMCE.regexpReplace(vHTML, 'src\s*=\s*"?'+base_url+'', 'src="', 'gi');
				vHTML = tinyMCE.regexpReplace(vHTML, 'mce_real_src\s*=\s*"?', '', 'gi');
				vHTML = tinyMCE.regexpReplace(vHTML, 'mce_real_href\s*=\s*"?', '', 'gi');
			}
			return vHTML;
		}
	</script>

<script language="javascript">
function showimage()
{
if (!document.images)
return
document.images.pictures.src=
document.mygallery.picture.options[document.mygallery.picture.selectedIndex].value
}
//-->
</script>
<!--  Editor -->
<!-- Imprimir -->
<SCRIPT LANGUAGE="JavaScript">
function imprimir() {
  if (window.print)
    window.print()
  else
    alert("Disculpe, su navegador no soporta esta opci&oacute;n.");
}

</SCRIPT>
<!-- Imprimir -->
