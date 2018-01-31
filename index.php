<?php get_header(); ?>

			<div class="content">

				<div class="intro__container" id="introContainer">
					<img class="intro__bg" src="<?php bloginfo('template_directory'); ?>/img/intro.png">
					<div class="intro__body styled__content">
						<h1 class="intro__title">Bienvenido! 👋</h1>
						<p class="intro__text">Este año en CIC nos hemos marcado como objetivo mejorar la comunicación interna. Al fin y al cabo, todos somos embajadores de la marca CIC. Y por eso hemos lanzado esta web de uso interno.
						<br/><br/>
						Buscamos poner a vuestra disposición unas herramientas y conocimientos sobre los que puedes leer más <a href="<?php bloginfo('url')?>/blog/bienvenido">aquí</a>. También si lo deseas puedes <a class="discard-message" id="closeIntro" href="#">descartar</a> este mensaje para que no se vuelva a mostrar.
						</p>
					</div>
				</div>

				<div class="actualidad__featured">
					<div class="featured__container">

						<?php $args = array( 'posts_per_page' => 5, 'post__in'  => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 5 );?><?php $query = new WP_Query($args);   ?>
          				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

						<article class="post-item sticky" v-for="post in stickyPosts">
							<a class="post__thumbnail-container" href="<?php the_permalink();?>">
								<?php the_post_thumbnail('full', array('class' => 'post__thumbnail')); ?>
							</a>
							<div class="post__content">
								<a href="<?php the_permalink();?>">
									<h2 class="post__title"><?php the_title( ); ?></h2>
								</a>
								<p class="post__excerpt"><?php echo get_the_excerpt(); ?></p>
							</div>
						</article>

						<?php endwhile;?>
          				<?php wp_reset_postdata(); ?>

					</div>
				</div>
<!--
				<div class="product__list">
					<div class="product__item" data-tilt data-tilt-scale="1.1">
						<div class="product-logo__container">
							<img class="product-logo" src="<?php bloginfo('template_directory'); ?>/img/sgrwin.svg">
						</div>
						<div>
						<h1 class="product__item__title">SGRwin</h1>
						<p class="product__item__body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
					<div class="product__item" data-tilt data-tilt-scale="1.1">
						<div class="product-logo__container">
							<img class="product-logo" src="<?php bloginfo('template_directory'); ?>/img/idbox.svg">
						</div>
						<div>
						<h1 class="product__item__title">IDbox RT</h1>
						<p class="product__item__body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
					<div class="product__item" data-tilt data-tilt-scale="1.1">
						<div class="product-logo__container">
							<img class="product-logo" src="<?php bloginfo('template_directory'); ?>/img/luca.svg">
						</div>
						<div>
						<h1 class="product__item__title">LUCA</h1>
						<p class="product__item__body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
					<div class="product__item" data-tilt data-tilt-scale="1.1">
						<div class="product-logo__container">
							<img class="product-logo" src="<?php bloginfo('template_directory'); ?>/img/fieldeas.svg">
						</div>
						<div>
						<h1 class="product__item__title">FIELDEAS</h1>
						<p class="product__item__body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
				</div>
-->
<!--
				<div class="events__list">
					<h1 class="events__list__title h2-headline">Agenda</h1>
					<div class="events__container carousel">
						<?php 
						$argsEvents = array(
							'post_type' => 'event',
						);
						$the_query = new WP_Query( $argsEvents ); ?>

						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<div class="event-item carousel-cell">
							<div class="event-item__wrapper">
								<h2 class="event__title"><?php the_title(); ?></h2>
								<p><?php echo get_the_excerpt(); ?></p>
							</div>
						</div>

						<?php endwhile;?>
          				<?php wp_reset_postdata(); ?>
					</div>
					<img src="<?php bloginfo('template_directory'); ?>/img/footer__bg.svg" alt="" class="bottom__bg">
				</div>
-->
				<div class="card__list">
					<h1 class="h1-display">Identidad corporativa</h1>
					<h2 class="display-helper"><a href="<?php bloginfo('url')?>/identidad-corporativa">Conoce más sobre la marca CIC</a></h2>
					<div class="card__list__container">
						<a href="<?php bloginfo('url')?>/identidad-corporativa/firmas-correo" class="card__item" data-tilt data-tilt-scale="1.1">
							<img class="card__icon" src="<?php bloginfo('template_directory'); ?>/img/SVG/firmas.svg">
							<h1 class="card__title">Firmas<br/>de correo</h1>
						</a>
						<a href="#" class="card__item light-blue" data-tilt data-tilt-scale="1.1">
							<img class="card__icon" src="<?php bloginfo('template_directory'); ?>/img/SVG/tarjetas.svg">
							<h1 class="card__title">Tarjetas<br/>de visita</h1>
						</a>
						<a href="<?php bloginfo('url')?>/identidad-corporativa/colores-y-tipografias" class="card__item green" data-tilt data-tilt-scale="1.1">
							<img class="card__icon" src="<?php bloginfo('template_directory'); ?>/img/SVG/colores.svg">
							<h1 class="card__title">Colores<br/>y tipografías</h1>
						</a>
						<a href="<?php bloginfo('url')?>/identidad-corporativa/logotipos" class="card__item" data-tilt data-tilt-scale="1.1">
							<img class="card__icon" src="<?php bloginfo('template_directory'); ?>/img/SVG/logotipo.svg">
							<h1 class="card__title">Uso correcto<br/>del logotipo</h1>
						</a>
					</div>
				</div>

				<div class="card__list">
					<h1 class="h1-display">Descargas</h1>
					<h2 class="display-helper"><a href="<?php bloginfo('url')?>/descargas">Ver todas las descargas</a></h2>
					<div class="card__list__container">
						<a href="<?php bloginfo('url')?>/identidad-corporativa/firmas-correo" class="card__item" data-tilt data-tilt-scale="1.1">
							<img class="card__icon" src="<?php bloginfo('template_directory'); ?>/img/SVG/firmas.svg">
							<h1 class="card__title">Firmas<br/>de correo</h1>
						</a>
						<a href="#" class="card__item light-blue" data-tilt data-tilt-scale="1.1">
							<img class="card__icon" src="<?php bloginfo('template_directory'); ?>/img/SVG/tarjetas.svg">
							<h1 class="card__title">Tarjetas<br/>de visita</h1>
						</a>
						<a href="<?php bloginfo('url')?>/identidad-corporativa/colores-y-tipografias" class="card__item green" data-tilt data-tilt-scale="1.1">
							<img class="card__icon" src="<?php bloginfo('template_directory'); ?>/img/SVG/colores.svg">
							<h1 class="card__title">Colores<br/>y tipografías</h1>
						</a>
						<a href="<?php bloginfo('url')?>/identidad-corporativa/logotipos" class="card__item" data-tilt data-tilt-scale="1.1">
							<img class="card__icon" src="<?php bloginfo('template_directory'); ?>/img/SVG/logotipo.svg">
							<h1 class="card__title">Uso correcto<br/>del logotipo</h1>
						</a>
					</div>
				</div>

			</div>

<?php get_footer(); ?>