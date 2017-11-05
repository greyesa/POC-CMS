{$codificacion}
{include file="css.tpl"}
{literal}
<!--  Menu -->
<script language="JavaScript" type="text/javascript" src="templates/ayuvi/templates/JSCookMenu/JSCookMenu.js"></script>
<link rel="stylesheet" href="templates/ayuvi/templates/JSCookMenu/ThemeOffice/theme.css" type="text/css" />
<script language="JavaScript" type="text/javascript" src="templates/ayuvi/templates/JSCookMenu/ThemeOffice/theme.js"></script>
<script type="text/javascript" src="templates/ayuvi/templates/JSCookMenu/effect.js"></script>
<!--  Menu -->
{/literal}

</head>
<!--  ################## Fin de Cabecera  ################## -->

<!--  ################## Inicia Cuerpo de Pagina  ################## -->

<body>

<!-- Logotipo -->
<div id="cabecera"><div class="ancho_general">
<a href="index.php"><img src="{$logotipo1}/{$logotipo2}" border="0" alt="{$logotipo3}"> </a>
</div>
</div>
<!-- Logotipo -->

<table width="752" border="0" align="center">
<tr>
<td> 

<!-- Menu -->
<div id="menu">
{section name=contador loop=$menu} 
{$menu[contador]} |
{/section}  
</div>
<!-- Menu -->



<table align="center" width="752" height="100%" border="0">
<tr>
<td valign="top" width="70%" height="100%">


