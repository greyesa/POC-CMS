<?PHP
include 'libreria/cabecera.php';
include 'libreria/bloques.php';
include 'libreria/menu.php';
include "../config.inc.php";
//  ------ create table variable ------
// variables for Netscape Navigator 3 & 4 are +4 for compensation of render errors
$Browser_Type  =  strtok($HTTP_ENV_VARS['HTTP_USER_AGENT'],  "/");
if ( ereg( "MSIE", $HTTP_ENV_VARS['HTTP_USER_AGENT']) || ereg( "Mozilla/5.0", $HTTP_ENV_VARS['HTTP_USER_AGENT']) || ereg ("Opera/5.11", $HTTP_ENV_VARS['HTTP_USER_AGENT']) ) {
	$theTable = 'WIDTH="400" HEIGHT="245"';
} else {
	$theTable = 'WIDTH="404" HEIGHT="249"';
}

// ------ create document-location variable ------
if ( ereg("php\.exe", $HTTP_SERVER_VARS['PHP_SELF']) || ereg("php3\.cgi", $HTTP_SERVER_VARS['PHP_SELF']) || ereg("phpts\.exe", $HTTP_SERVER_VARS['PHP_SELF']) ) {
	$documentLocation = $HTTP_ENV_VARS['PATH_INFO'];
} else {
	$documentLocation = $HTTP_SERVER_VARS['PHP_SELF'];
}
if ( $HTTP_ENV_VARS['QUERY_STRING'] ) {
	$documentLocation .= "?" . $HTTP_ENV_VARS['QUERY_STRING'];
}

?>	
<SCRIPT LANGUAGE="JavaScript">
<!--
//  ------ check form ------
function checkData() {
	var f1 = document.forms[0];
	var wm = "<?PHP echo $strJSHello; ?>\n\r\n";
	var noerror = 1;

	// --- entered_login ---
	var t1 = f1.entered_login;
	if (t1.value == "" || t1.value == " ") {
		wm += "<?PHP echo $strLogin; ?>\r\n";
		noerror = 0;
	}

	// --- entered_password ---
	var t1 = f1.entered_password;
	if (t1.value == "" || t1.value == " ") {
		wm += "<?PHP echo $strPassword; ?>\r\n";
		noerror = 0;
	}

	// --- check if errors occurred ---
	if (noerror == 0) {
		alert(wm);
		return false;
	}
	else return true;
}
//-->
</SCRIPT>

<?php
$smarty->assign('formularioadminti', "<img src=../imagenes/admin/login.gif width=41 height=37 border=0 title=Login POC-CMS align=left><font size=5>Ingreso</font><br>Bienvenido a POC-CMS.<br><br> Ingresa un nombre y una contrase&ntilde;a v&aacute;lida para poder ingresar al sistema de Administraci&oacute;n.");

$smarty->assign('formularioadmin', "<form method=post action=index.php onSubmit='return checkData()'>
<b>Nombre:</b><br><input type=text size=18 name=entered_login><br><br>
<b>Contrase&ntilde;a:</b><br><input type=password size=18 name=entered_password><br>
<br><INPUT TYPE=submit name=ingresar value=Ingresar>
</form>");

?>
<SCRIPT LANGUAGE="JavaScript">
<!--
document.forms[0].entered_login.select();
document.forms[0].entered_login.focus();
//-->
</SCRIPT>
<?php
$smarty->display('formulario.tpl');
?>

