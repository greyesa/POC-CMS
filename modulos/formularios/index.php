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

/* Inicia Modulos formularios - contaco, publicidad, etc. */

function formularios($modulo,$operacion,$smarty,$link,$nbase,$nuser){

/* ########## Formularios - ingreso  ############# */
		if($operacion=="ingresar"){ 

$correous = $_POST["correous"];
$paisus = $_POST["paisus"];
$errorus = $_POST["errorus"];
$nombreus = $_POST["nombreus"];
$webus = $_POST["webus"];
$tipos = $_POST["tipos"];

if($nombreus=$nombreus){
   if($paisus=$paisus){
       if($errorus=$errorus){
            if ( strstr( $correous, '@' ) ) {


$errorus = htmlspecialchars($errorus);
$errorus = strtolower($errorus);
$errorus = ucfirst ($errorus); 
$nombreus = strtolower($nombreus);
$nombreus = ucfirst ($nombreus); 

$result=mysql_query("INSERT into registrosadmin (nombreus,correous,paisus,webus,errorus,tipos,fecha,ver) values('$nombreus','$correous','$paisus','$webus','$errorus','$tipos',now(),'0' )",$link);

$smarty->assign('mensaje', '<b><u>Informe:</u></b> La informaci&oacute;n fue ingresada satisfactoriamente, dependiendo del mensaje que ingresaste nosotros nos pondremos en contacto contigo. Esta informaci&oacute;n se manejara confidencialmente por tu seguridad. Gracias.<br><br><a href="index.php">[<< Pulsa aqui para ir a la pagina principal]</a>');
}
   else {
$smarty->assign('mensaje', 'Lo sentimos, no se pudo ingresar el mensaje posiblemente por que no ingresaste un correo electr&oacute;nico v&aacute;ido.');
   }
   
}
else {
$smarty->assign('mensaje', 'Lo sentimos, no se pudo ingresar el mensaje posiblemente por que no ingresaste un mensaje.');
}
	}
	else {
$smarty->assign('mensaje', 'Lo sentimos, no se pudo ingresar el mensaje posiblemente por que no ingresaste t&uacute; pa&iacute;s.');
	}
	}
	else {
$smarty->assign('mensaje', 'Lo sentimos, no se pudo ingresar el mensaje posiblemente por que no ingresaste t&uacute; nombre.');
	}


$smarty->display('formularios.tpl'); /* Llamamos a la plantilla */
}

/* ########## Formularios - forma  ############# */
if($operacion=="forma"){ 

$smarty->assign('mensaje', 'Usted pueden contactarse con nosotros, llenando el presente formulario. <br><br> 
<FORM METHOD=POST ACTION="modulos.php?modulo=formularios&operacion=ingresar">
<table border=0>
<tr>
<td><b>Nombre:</b></td>
<td><INPUT TYPE="text" NAME="nombreus"></td>
</tr>
<tr>
<td><b>Correo electr&oacute;nico:</b></td>
<td><INPUT TYPE="text" NAME="correous" value=""></td>
</tr>
<tr>
<td><b>Direcci&oacute;n web:</b></td>
<td><INPUT TYPE="text" NAME="webus" value="http://"></td>
</tr>
<tr>
<td><b>Nacionalidad:</b></td>
<td><select name="paisus" size="1" maxlength="100"><option value="value">[seleccione su pa&iacute;s]</option><option value="Guatemala">Guatemala </option><option value="El Salvador">El Salvador </option><option value="Honduras">Honduras </option><option value="Nicaragua">Nicaragua </option><option value="Costa Rica">Costa Rica </option><option value="Panama">Panama </option><option value="M&eacute;xico">M&eacute;xico </option><option value="Estados Unidos">USA </option><option value="---------------">--- </option><option value="Alemania">Alemania </option><option value="Angola">Angola </option><option value="Anguilla">Anguilla </option><option value="Ant&aacute;rtida">Ant&aacute;rtida </option><option value="Antigua y Barbuda">Antigua y Barbuda </option><option value="Arabia Saudita">Arabia Saudita </option><option value="Argelia">Argelia </option><option value="Argentina">Argentina </option><option value="Armenia">Armenia </option><option value="Aruba">Aruba </option><option value="Aruba">Aruba </option><option value="Aruba">Aruba </option><option value="Australia">Australia </option><option value="Austria">Austria </option><option value="Azerbaijan">Azerbaijan </option><option value="B&eacute;lgica">B&eacute;lgica </option><option value="Bahamas">Bahamas </option><option value="Bahrain">Bahrain </option><option value="Bangladesh">Bangladesh </option><option value="Barbados">Barbados </option><option value="Belize">Belize </option><option value="Benin">Benin </option><option value="Bermuda">Bermuda </option><option value="Bhutan">Bhutan </option><option value="Bolivia">Bolivia </option><option value="Bosnia y Herzegovina">Bosnia y Herzegovina </option><option value="Botswana">Botswana </option><option value="Brasil">Brasil </option><option value="British Indian Ocean">British Indian Ocean </option><option value="Brunei">Brunei </option><option value="Brunei">Brunei </option><option value="Bulgaria">Bulgaria </option><option value="Burkina Faso">Burkina Faso </option><option value="Burundi">Burundi </option><option value="Camboya">Camboya </option><option value="Camer&uacute;n">Camer&uacute;n </option><option value="Canada">Canada </option><option value="Cape Verde">Cape Verde </option><option value="Chad">Chad </option><option value="Chile">Chile </option><option value="China">China </option><option value="Chipre">Chipre </option><option value="Colombia">Colombia </option><option value="Congo">Congo </option><option value="Corea del Sur">Corea del Sur </option><option value="Costa de Marfil">Costa de Marfil </option><option value="Croacia">Croacia </option><option value="Cuba">Cuba </option><option value="Dinamarca">Dinamarca </option><option value="Djibouti">Djibouti </option><option value="Dominica">Dominica </option><option value="Ecuador">Ecuador </option><option value="Egypt">Egypt </option><option value="Emiratos &Aacute;rabes">Emiratos &Aacute;rabes </option><option value="Eslovaquia">Eslovaquia </option><option value="Espa&ntilde;a">Espa&ntilde;a </option><option value="Estonia">Estonia </option><option value="Etiop&iacute;a">Etiop&iacute;a </option><option value="Faroe Islands">Faroe Islands </option><option value="Fiji">Fiji </option><option value="Filipinas">Filipinas </option><option value="Finlandia">Finlandia </option><option value="Fmr USSR-Byelorussia">Fmr USSR-Byelorussia </option><option value="Fmr Yugoslavia">Fmr Yugoslavia </option><option value="Francia">Francia </option><option value="Gab&oacute;n">Gab&oacute;n </option><option value="Gambia">Gambia </option><option value="Georgia">Georgia </option><option value="Ghana">Ghana </option><option value="Gibraltar">Gibraltar </option><option value="Granada">Granada </option><option value="Grecia">Grecia </option><option value="Groenlandia">Groenlandia </option><option value="Guadeloupe">Guadeloupe </option><option value="Guam">Guam </option><option value="Guam">Guam </option><option value="Guinea">Guinea </option><option value="Guinea Ecuatorial">Guinea Ecuatorial </option><option value="Guinea-Bissau">Guinea-Bissau </option><option value="Guyana">Guyana </option><option value="Guyana Francesa">Guyana Francesa </option><option value="Hait&iacute;">Hait&iacute; </option><option value="Holanda">Holanda </option><option value="Hong Kong">Hong Kong </option><option value="Hungr&iacute;a">Hungr&iacute;a </option><option value="India">India </option><option value="Indonesia">Indonesia </option><option value="Ir&aacute;n">Ir&aacute;n </option><option value="Irak">Irak </option><option value="Irlanda">Irlanda </option><option value="Islandia">Islandia </option><option value="Islas Caim&aacute;n">Islas Caim&aacute;n </option><option value="Islas Cook">Islas Cook </option><option value="Islas Falkland">Islas Falkland </option><option value="Islas Solom&oacute;n">Islas Solom&oacute;n </option><option value="Islas Turks y Caicos">Islas Turks y Caicos </option><option value="Islas V&iacute;rgenes">Islas V&iacute;rgenes </option><option value="Israel">Israel </option><option value="Israel">Israel </option><option value="Italia">Italia </option><option value="Jamaica">Jamaica </option><option value="Jap&oacute;n">Jap&oacute;n </option><option value="Jordania">Jordania </option><option value="Kazakhstan">Kazakhstan </option><option value="Kenia">Kenia </option><option value="Kiribati">Kiribati </option><option value="Kuwait">Kuwait </option><option value="Kyrghyzstan">Kyrghyzstan </option><option value="L&iacute;bano">L&iacute;bano </option><option value="Laos">Laos </option><option value="Latvia">Latvia </option><option value="Liberia">Liberia </option><option value="Libia">Libia </option><option value="Lituania">Lituania </option><option value="Luxemburgo">Luxemburgo </option><option value="Macau">Macau </option><option value="Macedonia">Macedonia </option><option value="Madagascar">Madagascar </option><option value="Malawi">Malawi </option><option value="Malaysia">Malaysia </option><option value="Maldivas">Maldivas </option><option value="Mali">Mali </option><option value="Malta">Malta </option><option value="Marruecos">Marruecos </option><option value="Marshall Islands">Marshall Islands </option><option value="Martinique">Martinique </option><option value="Mauritania">Mauritania </option><option value="Micronesia">Micronesia </option><option value="Monaco">Monaco </option><option value="Mongolia">Mongolia </option><option value="Montserrat">Montserrat </option><option value="Mozambique">Mozambique </option><option value="Myanmar">Myanmar </option><option value="Namibia">Namibia </option><option value="Nauru">Nauru </option><option value="Nepal">Nepal </option><option value="New Zealand">New Zealand </option><option value="Niger">Niger </option><option value="Nigeria">Nigeria </option><option value="North Korea">North Korea </option><option value="Norway">Norway </option><option value="Nueva Caledonia">Nueva Caledonia </option><option value="Oman">Oman </option><option value="Pakist&aacute;n">Pakist&aacute;n </option><option value="Papua Nueva Guinea">Papua Nueva Guinea </option><option value="Paraguay">Paraguay </option><option value="Per&uacute;">Per&uacute; </option><option value="Polinesia Francesa">Polinesia Francesa </option><option value="Polonia">Polonia </option><option value="Portugal">Portugal </option><option value="Puerto Rico">Puerto Rico </option><option value="Qatar">Qatar </option><option value="Reino Unido">Reino Unido </option><option value="Rep&uacute;blica Central">Rep&uacute;blica Central </option><option value="Rep&uacute;blica Checa">Rep&uacute;blica Checa </option><option value="Rep&uacute;blica Dominicana">Rep&uacute;blica Dominicana </option><option value="Reuni&oacute;n e islas">Reuni&oacute;n e islas </option><option value="Ruanda">Ruanda </option><option value="Rumania">Rumania </option><option value="Rusia">Rusia </option><option value="Samoa">Samoa </option><option value="San Vicente y las Granadinas">San Vicente y las Granadinas </option><option value="Santa Luc&iacute;a">Santa Luc&iacute;a </option><option value="Senegal">Senegal </option><option value="Seychelles">Seychelles </option><option value="Sierra Le&oacute;n">Sierra Le&oacute;n </option><option value="Singapur">Singapur </option><option value="Siria">Siria </option><option value="Somalia">Somalia </option><option value="Sri Lanka">Sri Lanka </option><option value="St Helena">St Helena </option><option value="St Pierre and Miquelon">St Pierre and Miquelon </option><option value="Sud&aacute;frica">Sud&aacute;frica </option><option value="Sud&aacute;n">Sud&aacute;n </option><option value="Suecia">Suecia </option><option value="Suiza">Suiza </option><option value="Suriname">Suriname </option><option value="Swaziland">Swaziland </option><option value="T&uacute;nez">T&uacute;nez </option><option value="Tailandia">Tailandia </option><option value="Taiw&aacute;n">Taiw&aacute;n </option><option value="Tajikistan">Tajikistan </option><option value="Tanzania">Tanzania </option><option value="Timor">Timor </option><option value="Togo">Togo </option><option value="Tonga">Tonga </option><option value="Trinidad y Tobago">Trinidad y Tobago </option><option value="Turk&iacute;a">Turk&iacute;a </option><option value="Turkmenist&aacute;n">Turkmenist&aacute;n </option><option value="Tuvalu">Tuvalu </option><option value="Ucrania">Ucrania </option><option value="Uganda">Uganda </option><option value="Uruguay">Uruguay </option><option value="Uzbekist&aacute;n">Uzbekist&aacute;n </option><option value="Vanuatu">Vanuatu </option><option value="Venezuela">Venezuela </option><option value="Vietnam">Vietnam </option><option value="Yemen">Yemen </option><option value="Yemen">Yemen </option><option value="Zaire">Zaire </option><option value="Zambia">Zambia </option><option value="Zimbabwe">Zimbabwe </option></select></td>
</tr>
<tr>
<td><b>Tipo de contacto:</b></td>
<td><select name="tipos" size="1" maxlength="100"><option value="contactarnos">[seleccione su tipo de contacto]</option><option value="contactarnos">Contactarnos </option><option value="errores">Problemas en el sitio web </option><option value="colaborar">Colaborar con nosotros </option><option value="publicidad">Publicidad </option><option value="contactarnos">Otros</option></select></td>
</tr>
<tr>
<td valign=top><b>Mensaje:</b></td>
<td><TEXTAREA NAME="errorus" ROWS="10" COLS="45"></TEXTAREA></td>
</tr>
</table>
<br><br><center><INPUT TYPE="submit" name="ingresar" value="Enviar"></center></FORM>');

$smarty->display('formularios.tpl'); /* Llamamos a la plantilla */
}

}
?>
