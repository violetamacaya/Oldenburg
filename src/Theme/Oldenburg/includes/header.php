<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="">

	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<!-- Place favicon.ico in the root directory -->

	<?php
	ipAddCss('Ip/Internal/Core/assets/ipContent/ipContent.css'); // include default CSS for widgets
	ipAddCss("../css/normalize.css");
	ipAddCss("../css/main.css");
	ipAddCss("../css/styles.css");
	ipAddCss("../css/theme.css");
	ipAddCss("../css/responsive.css");
	ipAddCss("../fonts/font.css");
	ipAddJs('../js/vendor/modernizr-2.8.3.min.js');
	echo ipHead();
	?>

</head>
<body>
<header class="header">

	<div class="menu-top">
		<a href="/">
			<img class="logo" src="<?php echo ipThemeUrl('img/header-logo.png'); ?>" alt="Oldenburg">
		</a>
		<div class="toggle-menu"></div>
	</div>


	<div class="menu col-md-12 nav-menu">
		<a href="/">
			<img class="logo logo-md" src="<?php echo ipThemeUrl('img/header-logo.png'); ?>" alt="Oldenburg">
		</a>
		<ul class="level1 ">
			<li class="active home-li">
				<a href="#home" title="Inicio">Inicio</a>
			</li>
			<li class="noticias-li">
				<a href="#noticias" title="Noticias">Noticias</a>
			</li>
			<li class="carta-li">
				<a href="#carta" title="Carta">Carta</a>
			</li>
			<li class="eventos-li">
				<a href="#eventos" title="Catas">Eventos</a>
			</li>
			<li class="pedidos-li">
				<a href="#pedidos" title="Pedidos">Pedidos</a>
			</li>
			<li class="contacto-li">
				<a href="#contacto" title="Contacto">Contacto</a>
			</li>
		</ul>
	</div>

	</div>
</header>