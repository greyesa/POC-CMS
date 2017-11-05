<?

$captcha_imagen = imagecreate(280,60);

 $color_negro = imagecolorallocate ($captcha_imagen, 245, 245, 245);
$color_blanco = imagecolorallocate ($captcha_imagen, 0, 0, 0);

imagefill($captcha_imagen, 0, 0, $color_negro);

session_start();
$captcha_texto = $HTTP_SESSION_VARS["captcha_texto_session"];
 
imagechar($captcha_imagen, 8, 40, 26, $captcha_texto[0] ,$color_blanco);
imagechar($captcha_imagen, 10, 80, 26, $captcha_texto[1] ,$color_blanco);
imagechar($captcha_imagen, 6, 120, 26, $captcha_texto[2] ,$color_blanco);
imagechar($captcha_imagen, 8, 160, 26, $captcha_texto[3] ,$color_blanco);
imagechar($captcha_imagen, 10, 200, 26, $captcha_texto[4] ,$color_blanco);
imagechar($captcha_imagen, 6, 240, 26, $captcha_texto[5] ,$color_blanco);

header("Content-type: image/jpeg");
imagejpeg($captcha_imagen);

?>
