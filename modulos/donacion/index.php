<?php
/*  
    POC-CMS (C)1999-2007 Interactiva Web (C)2012
    Autor y Director: Gustavo Reyes Twitter: @greyes
    http://www.interactivaweb.com
    contacto@interactivaweb.com
    Mayo 2005
    Nueva liberación 18-5-2012
*/ 

/* 7/11/2006 - Para Fundación Ayudame a Vivir, Niños con Cáncer */

include 'config.inc.php';

/* Inicia Módulos Donacion */

function donacion($modulo,$operacion,$smarty,$nbase,$nuser,$nhost,$npass){

		$smarty->assign('donacion1', "Programa de Apadrinamiento");

		/* ########## formulario de donacion ############# */
		if($operacion=="formu"){ 

$smarty->assign('donacion2', "<br>Antes de iniciar, le mencionamos que usted esta navegando en una p&aacute;gina segura, ya que esta protegida por <a href='http://es.wikipedia.org/wiki/Ssl' target='_blank'>SSL - Secure Sockets Layer</a>, una tecnolog&iacute;a que permite de manera criptogr&aacute;fica gestionar de manera segura su informaci&oacute;n por internet. Para m&aacute;s informaci&oacute;n puede ponerse en contacto con nosotros v&iacute;a mail a: <a href='mailto:info@ayuvi.org.gt'>info@ayuvi.org.gt</a>, o por tel&eacute;fono a: <b>(502)2471-4998</b>,<b> (502) 2471-8290</b>, con gusto le atenderemos.");

$smarty->assign('donacion3', '
<b>Formulario, ingreso de datos</b><br><br>
<form method="post" action="modulos.php?modulo=donacion&operacion=ingresar" onsubmit="return formCheck(this);" >
<table border="0" width="100%">
<tr>
<td width="30%">Nombre del Padrino:
</td>
<td><input type="text" name="nombre_don" value="">
</td>
<tr>
<td width="30%">Direcci&oacute;n:
</td>
<td><input type="text" name="direccion_don" value="">
</td>
</tr>
<tr>
<td width="30%">Ciudad:
</td>
<td><input type="text" name="ciudad_don" value="">
</td>
</tr>
<tr>
<td width="30%">Pa&iacute;s:
</td>
<td><select name="pais_don" size="1" maxlength="100"><option value="Guatemala">[seleccione su pa&iacute;s]</option><option value="Guatemala">Guatemala </option><option value="El Salvador">El Salvador </option><option value="Honduras">Honduras </option><option value="Nicaragua">Nicaragua </option><option value="Costa Rica">Costa Rica </option><option value="Panama">Panama </option><option value="M&eacute;xico">M&eacute;xico </option><option value="Estados Unidos">USA </option><option value="---------------">--- </option><option value="Alemania">Alemania </option><option value="Angola">Angola </option><option value="Anguilla">Anguilla </option><option value="Ant&aacute;rtida">Ant&aacute;rtida </option><option value="Antigua y Barbuda">Antigua y Barbuda </option><option value="Arabia Saudita">Arabia Saudita </option><option value="Argelia">Argelia </option><option value="Argentina">Argentina </option><option value="Armenia">Armenia </option><option value="Aruba">Aruba </option><option value="Aruba">Aruba </option><option value="Aruba">Aruba </option><option value="Australia">Australia </option><option value="Austria">Austria </option><option value="Azerbaijan">Azerbaijan </option><option value="B&eacute;lgica">B&eacute;lgica </option><option value="Bahamas">Bahamas </option><option value="Bahrain">Bahrain </option><option value="Bangladesh">Bangladesh </option><option value="Barbados">Barbados </option><option value="Belize">Belize </option><option value="Benin">Benin </option><option value="Bermuda">Bermuda </option><option value="Bhutan">Bhutan </option><option value="Bolivia">Bolivia </option><option value="Bosnia y Herzegovina">Bosnia y Herzegovina </option><option value="Botswana">Botswana </option><option value="Brasil">Brasil </option><option value="British Indian Ocean">British Indian Ocean </option><option value="Brunei">Brunei </option><option value="Brunei">Brunei </option><option value="Bulgaria">Bulgaria </option><option value="Burkina Faso">Burkina Faso </option><option value="Burundi">Burundi </option><option value="Camboya">Camboya </option><option value="Camer&uacute;n">Camer&uacute;n </option><option value="Canada">Canada </option><option value="Cape Verde">Cape Verde </option><option value="Chad">Chad </option><option value="Chile">Chile </option><option value="China">China </option><option value="Chipre">Chipre </option><option value="Colombia">Colombia </option><option value="Congo">Congo </option><option value="Corea del Sur">Corea del Sur </option><option value="Costa de Marfil">Costa de Marfil </option><option value="Croacia">Croacia </option><option value="Cuba">Cuba </option><option value="Dinamarca">Dinamarca </option><option value="Djibouti">Djibouti </option><option value="Dominica">Dominica </option><option value="Ecuador">Ecuador </option><option value="Egypt">Egypt </option><option value="Emiratos &Aacute;rabes">Emiratos &Aacute;rabes </option><option value="Eslovaquia">Eslovaquia </option><option value="Espa&ntilde;a">Espa&ntilde;a </option><option value="Estonia">Estonia </option><option value="Etiop&iacute;a">Etiop&iacute;a </option><option value="Faroe Islands">Faroe Islands </option><option value="Fiji">Fiji </option><option value="Filipinas">Filipinas </option><option value="Finlandia">Finlandia </option><option value="Fmr USSR-Byelorussia">Fmr USSR-Byelorussia </option><option value="Fmr Yugoslavia">Fmr Yugoslavia </option><option value="Francia">Francia </option><option value="Gab&oacute;n">Gab&oacute;n </option><option value="Gambia">Gambia </option><option value="Georgia">Georgia </option><option value="Ghana">Ghana </option><option value="Gibraltar">Gibraltar </option><option value="Granada">Granada </option><option value="Grecia">Grecia </option><option value="Groenlandia">Groenlandia </option><option value="Guadeloupe">Guadeloupe </option><option value="Guam">Guam </option><option value="Guam">Guam </option><option value="Guinea">Guinea </option><option value="Guinea Ecuatorial">Guinea Ecuatorial </option><option value="Guinea-Bissau">Guinea-Bissau </option><option value="Guyana">Guyana </option><option value="Guyana Francesa">Guyana Francesa </option><option value="Hait&iacute;">Hait&iacute; </option><option value="Holanda">Holanda </option><option value="Hong Kong">Hong Kong </option><option value="Hungr&iacute;a">Hungr&iacute;a </option><option value="India">India </option><option value="Indonesia">Indonesia </option><option value="Ir&aacute;n">Ir&aacute;n </option><option value="Irak">Irak </option><option value="Irlanda">Irlanda </option><option value="Islandia">Islandia </option><option value="Islas Caim&aacute;n">Islas Caim&aacute;n </option><option value="Islas Cook">Islas Cook </option><option value="Islas Falkland">Islas Falkland </option><option value="Islas Solom&oacute;n">Islas Solom&oacute;n </option><option value="Islas Turks y Caicos">Islas Turks y Caicos </option><option value="Islas V&iacute;rgenes">Islas V&iacute;rgenes </option><option value="Israel">Israel </option><option value="Israel">Israel </option><option value="Italia">Italia </option><option value="Jamaica">Jamaica </option><option value="Jap&oacute;n">Jap&oacute;n </option><option value="Jordania">Jordania </option><option value="Kazakhstan">Kazakhstan </option><option value="Kenia">Kenia </option><option value="Kiribati">Kiribati </option><option value="Kuwait">Kuwait </option><option value="Kyrghyzstan">Kyrghyzstan </option><option value="L&iacute;bano">L&iacute;bano </option><option value="Laos">Laos </option><option value="Latvia">Latvia </option><option value="Liberia">Liberia </option><option value="Libia">Libia </option><option value="Lituania">Lituania </option><option value="Luxemburgo">Luxemburgo </option><option value="Macau">Macau </option><option value="Macedonia">Macedonia </option><option value="Madagascar">Madagascar </option><option value="Malawi">Malawi </option><option value="Malaysia">Malaysia </option><option value="Maldivas">Maldivas </option><option value="Mali">Mali </option><option value="Malta">Malta </option><option value="Marruecos">Marruecos </option><option value="Marshall Islands">Marshall Islands </option><option value="Martinique">Martinique </option><option value="Mauritania">Mauritania </option><option value="Micronesia">Micronesia </option><option value="Monaco">Monaco </option><option value="Mongolia">Mongolia </option><option value="Montserrat">Montserrat </option><option value="Mozambique">Mozambique </option><option value="Myanmar">Myanmar </option><option value="Namibia">Namibia </option><option value="Nauru">Nauru </option><option value="Nepal">Nepal </option><option value="New Zealand">New Zealand </option><option value="Niger">Niger </option><option value="Nigeria">Nigeria </option><option value="North Korea">North Korea </option><option value="Norway">Norway </option><option value="Nueva Caledonia">Nueva Caledonia </option><option value="Oman">Oman </option><option value="Pakist&aacute;n">Pakist&aacute;n </option><option value="Papua Nueva Guinea">Papua Nueva Guinea </option><option value="Paraguay">Paraguay </option><option value="Per&uacute;">Per&uacute; </option><option value="Polinesia Francesa">Polinesia Francesa </option><option value="Polonia">Polonia </option><option value="Portugal">Portugal </option><option value="Puerto Rico">Puerto Rico </option><option value="Qatar">Qatar </option><option value="Reino Unido">Reino Unido </option><option value="Rep&uacute;blica Central">Rep&uacute;blica Central </option><option value="Rep&uacute;blica Checa">Rep&uacute;blica Checa </option><option value="Rep&uacute;blica Dominicana">Rep&uacute;blica Dominicana </option><option value="Reuni&oacute;n e islas">Reuni&oacute;n e islas </option><option value="Ruanda">Ruanda </option><option value="Rumania">Rumania </option><option value="Rusia">Rusia </option><option value="Samoa">Samoa </option><option value="San Vicente y las Granadinas">San Vicente y las Granadinas </option><option value="Santa Luc&iacute;a">Santa Luc&iacute;a </option><option value="Senegal">Senegal </option><option value="Seychelles">Seychelles </option><option value="Sierra Le&oacute;n">Sierra Le&oacute;n </option><option value="Singapur">Singapur </option><option value="Siria">Siria </option><option value="Somalia">Somalia </option><option value="Sri Lanka">Sri Lanka </option><option value="St Helena">St Helena </option><option value="St Pierre and Miquelon">St Pierre and Miquelon </option><option value="Sud&aacute;frica">Sud&aacute;frica </option><option value="Sud&aacute;n">Sud&aacute;n </option><option value="Suecia">Suecia </option><option value="Suiza">Suiza </option><option value="Suriname">Suriname </option><option value="Swaziland">Swaziland </option><option value="T&uacute;nez">T&uacute;nez </option><option value="Tailandia">Tailandia </option><option value="Taiw&aacute;n">Taiw&aacute;n </option><option value="Tajikistan">Tajikistan </option><option value="Tanzania">Tanzania </option><option value="Timor">Timor </option><option value="Togo">Togo </option><option value="Tonga">Tonga </option><option value="Trinidad y Tobago">Trinidad y Tobago </option><option value="Turk&iacute;a">Turk&iacute;a </option><option value="Turkmenist&aacute;n">Turkmenist&aacute;n </option><option value="Tuvalu">Tuvalu </option><option value="Ucrania">Ucrania </option><option value="Uganda">Uganda </option><option value="Uruguay">Uruguay </option><option value="Uzbekist&aacute;n">Uzbekist&aacute;n </option><option value="Vanuatu">Vanuatu </option><option value="Venezuela">Venezuela </option><option value="Vietnam">Vietnam </option><option value="Yemen">Yemen </option><option value="Yemen">Yemen </option><option value="Zaire">Zaire </option><option value="Zambia">Zambia </option><option value="Zimbabwe">Zimbabwe </option></select>
</td>
</tr>
</table>

<table border="0" width="100%">
<tr>
<td width="30%">Tel&eacute;fono Casa:
</td>
<td><input type="text" size="10" name="tel_casa_don" value="">
</td>
<td>Oficina:
</td>
<td><input type="text" size="10" name="tel_ofi_don" value="">
</td>
<td>Celular:
</td>
<td><input type="text" size="10" name="tel_cel_don" value="">
</td>
</tr>
</table>

<table border="0" width="100%">
<tr>
<td width="30%">E-mail
</td>
<td><input type="text" name="email_don" value="">
</td>
</tr>
<tr>
<td width="30%">Nombre en el Recibo:
</td>
<td><input type="text" name="nom_recibo_don" value="">
</td>
<td>Nit:
</td>
<td><input type="text" name="nit_don" value="Solo para Guatemala">
</td>
</tr>
</table>

<table border="0" width="100%">
<tr>
<td width="30%">Direcci&oacute;n en el Recibo:
</td>
<td><input type="text" name="dire_recibo_don" value="">
</td>
</tr>
<tr>
<td width="30%">Monto de Donaci&oacute;n:
</td>
<td><input type="text" name="monto_don" value="">
</td>
</tr>
<tr>
<td width="30%">Fecha de Cobro:
</td>
<td><input type="text" name="fecha_cobro" id="fecha_cobro" value="" readonly="1" />
	<img src=include/calendar/img.gif id=trigger
     style="cursor: pointer; border: 1px solid red;"
     title="Selector de fecha"
     onmouseover=this.style.background="red";
     onmouseout=this.style.background="" />
		 
 <script type=text/javascript>
  Calendar.setup(
    {
      inputField  : "fecha_cobro",         // ID of the input field
      align          :    "Tl",
      singleClick    :    false,
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "trigger"       // ID of the button
    }
  );
</script>
</td>
</tr>
<tr>
<td width="30%">Forma de Pago:
</td>
<td><select name="forma_pago" size="1" maxlength="100"><option value="Tarjeta de Credito">Tarjeta de Cr&eacute;dito </option><option value="Solicito Cobrador">Solicito Cobrador (Solo para Guatemala)</option></select>
</td>
</tr>
</table>
<br><br>
<b>Para: Solicitud de Cobrador &uacute;nicamente. (Solo para Guatemala)</b><br>(Si eligi&oacute; tarjeta de cr&eacute;dito no llene estas casillas.)

<table border="0" width="100%">
<tr>
<td width="30%">Direcci&oacute;n de Cobro:</td>
<td><input type="text" name="dir_cobro_don" value=""></td>
</tr>
<tr>
<td width="30%">Periodos de Cobro:</td>
<td><select name="periodo_don" size="1" maxlength="100"><option value="Mensual">Mensual</option><option value="Bimestral">Bimestral</option><option value="Anual">Anual</option></select></td>
</tr>
</table>

<br><br>
<b>Para: Para Tarjeta de Cr&eacute;dito &uacute;nicamente</b><br>(Si eligi&oacute; Solicitud de Cobrador, no llene estas casillas.)

<table border="0" width="100%">
<tr>
<td width="30%">Tarjeta de Cr&eacute;dito:</td>
<td><select name="tar_credito_don" size="1" maxlength="100"><option value="Visa">Visa</option><option value="Master Card">Master Card</option><option value="Diners Club">Diners Club</option><option value="American Express">American Express</option></select></td>
</tr>
<tr>
<td width="30%">Banco Emisor de la Tarjeta de Cr&eacute;dito:</td>
<td><input type="text" name="banco_tar_don" value=""></td>
</tr>
<tr>
<td width="30%">No. Tarjeta de Cr&eacute;dito:
</td>
<td><input type="text" name="no_tar_don" value="">
</td>
</tr>
<tr>
<td width="30%">Fecha de Vencimiento:
</td>
<td><input type="text" name="fecha_ven_tar_don" value="">
</td>
</tr>
<tr>
<td width="30%">Nombre que aparece en la Tarjeta de Cr&eacute;dito:
</td>
<td><input type="text" name="nombre_tar_don" value="">
</td>
</tr>
</table>
<input type="hidden" name="firma_don" value="----">


<br><br>
<b>Apartado Extra:</b><br>

<table border="0" width="100%">
<tr>
<td width="30%" valign="top">Comentarios:</td>
<td><TEXTAREA NAME="comentarios_don" ROWS="10" COLS="35"></TEXTAREA></td>
</tr>

</table>

<br><br>
<input type="submit" value="Ingresar" name="ingresar">
</form>
<br><br>
Para informaci&oacute;n adicional s&iacute;rvase contactarnos: <a href="mailto:info@ayuvi.org.gt">info@ayuvi.org.gt</a>

');

}
/* ########## formulario de donacion ############# */


/* ########## Ingresar datos #################### */
if($operacion=="ingresar"){

$nombre_don = $_POST['nombre_don'];
$direccion_don = $_POST['direccion_don'];
$ciudad_don = $_POST['ciudad_don'];
$pais_don = $_POST['pais_don'];
$tel_casa_don = $_POST['tel_casa_don'];
$tel_ofi_don = $_POST['tel_ofi_don'];
$tel_cel_don = $_POST['tel_cel_don'];
$email_don = $_POST['email_don'];
$nom_recibo_don = $_POST['nom_recibo_don'];
$nit_don = $_POST['nit_don'];
$dire_recibo_don = $_POST['dire_recibo_don'];
$monto_don = $_POST['monto_don'];
$fecha_cobro = $_POST['fecha_cobro'];
$forma_pago = $_POST['forma_pago'];
$dir_cobro_don = $_POST['dir_cobro_don'];
$periodo_don = $_POST['periodo_don'];
$tar_credito_don = $_POST['tar_credito_don'];
$banco_tar_don = $_POST['banco_tar_don'];
$no_tar_don = $_POST['no_tar_don'];
$fecha_ven_tar_don = $_POST['fecha_ven_tar_don'];
$nombre_tar_don = $_POST['nombre_tar_don'];
$firma_don =$_POST['firma_don'];
$comentarios_don = $_POST['comentarios_don'];

	$smarty->assign('donacion2', "<br>Sus datos han sido ingresados satisfactoriamente, muy pronto nos pondremos en contacto con usted, si desea m&aacute;s informaci&oacute;n puede enviarnos un e-mail a: <a href='mailto:info@ayuvi.org.gt'>info@ayuvi.org.gt</a>, o llenar nuestro formulario en <a href='modulos.php?modulo=formularios&operacion=forma'>l&iacute;nea</a>, adem&aacute;s de tener a su disposici&oacute;n nuestros tel&eacute;fonos <b>(502)2471-4998</b>, <b>(502) 2471-8290</b>.");
    
	$result=mysql_query("INSERT into donacion (fecha_ingreso_don,nombre_don,direccion_don,ciudad_don,pais_don,tel_casa_don,tel_ofi_don,tel_cel_don,email_don,nom_recibo_don,nit_don,dire_recibo_don,monto_don,fecha_cobro,forma_pago,dir_cobro_don,periodo_don,tar_credito_don,banco_tar_don,no_tar_don,fecha_ven_tar_don,nombre_tar_don,firma_don,comentarios_don) values(now(),'$nombre_don','$direccion_don','$ciudad_don','$pais_don','$tel_casa_don','$tel_ofi_don','$tel_cel_don','$email_don','$nom_recibo_don','$nit_don','$dire_recibo_don','$monto_don','$fecha_cobro','$forma_pago','$dir_cobro_don','$periodo_don','$tar_credito_don','$banco_tar_don','$no_tar_don','$fecha_ven_tar_don','$nombre_tar_don','$firma_don','$comentarios_don')");

}

/* ########## Ingresar datos #################### */

$smarty->display('donacion.tpl');


}
/* Fin de Módulos Noticia */
?>
