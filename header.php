<!DOCTYPE html>
<!--[if lt IE 7] <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7] <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8] <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="es" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1"">
	<title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <script src="<?php bloginfo('template_directory'); ?>/js/cookies.js"></script>
	<?php wp_head(); ?>
</head>
<body>
	<div id="app" class="wrapper">

			<header class="navbar">

				<div class="menu__trigger">
					<div class="hamburger-menu">
						<div class="bar"></div> 
					</div>
					<span>Menú</span>
				</div>

				<div class="navbar__logo">
					<a class="logo__icon" href="<?php bloginfo('url')?>">
						<img class="logo__icon__img" src="<?php bloginfo('template_directory'); ?>/img/logo.svg">
					</a>
					<span class="logo__title">marketing y comunicación</span>
				</div>

				<ul class="navbar__social">
					<li class="social__item">
						<a target="_blank" href="https://twitter.com/CICactualidad">
							<img  class="social__icon" src="<?php bloginfo('template_directory'); ?>/img/twitter_logo.svg" alt="">
						</a>
					</li>
					<li class="social__item">
						<a target="_blank" href="https://www.facebook.com/CIC.Consulting/">
							<img  class="social__icon" src="<?php bloginfo('template_directory'); ?>/img/facebook_logo.svg" alt="">
						</a>
					</li>
					<li class="social__item">
						<a target="_blank" href="https://www.linkedin.com/company/2157627/">
							<img  class="social__icon" src="<?php bloginfo('template_directory'); ?>/img/linkedin_logo.svg" alt="">
						</a>
					</li>
				</ul>
				<!--
					<div class="search__trigger">
						<img class="search__icon" src="<?php bloginfo('template_directory'); ?>/img/search.svg">
					</div>
				-->
				<div class="menu__navigation">
		            <ul class="navigation__list">
		                <li class="navigation__item">
		                    <span></span>
		                    <a href="/actualidad">
		                      Actualidad
		                    </a>
		                </li>
		                <li class="navigation__item">
		                    <span></span>
		                    <a href="/descargas">
		                      Descargas
		                    </a>
		                </li>
		                <li class="navigation__item">
		                    <span></span>
		                    <a href="/identidad-corporativa">
		                      Identidad corporativa
		                    </a>
		                </li>
		            </ul>
		            <div class="navigation__contact">
		                <p>Para ponerte en contacto con nosotros puedes mandarnos un correo a marketing@cic.es o diseno@cic.es</p>
		            </div>
		        </div>
			</header>