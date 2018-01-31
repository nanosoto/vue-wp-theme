<?php
/*
	Template Name: Plantilla Actualidad
*/
?>

<?php get_header(); ?>

			<div class="content">
				<div class="actualidad">

					<div class="actualidad__featured">
						<h1 class="h2-headline">Lo + destacado</h1>
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

					<div class="actualidad__list">
						<h1 class="h2-headline">Actualidad</h1>
						<?php $args = array( 'orderby' => 'date', 'order' => 'DESC', 'post__not_in' => get_option( 'sticky_posts' ));?>
	                    <?php $query = new WP_Query($args);   ?>   
	                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

						<article class="post-item">
							<a class="post__thumbnail-container" href="<?php the_permalink();?>">
								<?php the_post_thumbnail('full', array('class' => 'post__thumbnail')); ?>
							</a>
							<div class="post__content">
								<ul class="post__tags">
									<li>#<?php 
										$category_detail=get_the_category( $post->ID );
										foreach($category_detail as $cd){
										echo $cd->cat_name;
										}
										?>
									</li>
								</ul>
								<a href="<?php the_permalink();?>">
									<h2 class="post__title"><?php the_title( ); ?></h2>
								</a>
								<p class="post__excerpt"><?php echo get_the_excerpt(); ?></p>
								<ul class="post__actions">
									<li class="post__like">
										<div class="heart"></div> Like
									</li>
								    <li class="post__share">Compartir</li>
								</ul>
							</div>
						</article>

						<?php endwhile;?>
                    	<?php wp_reset_postdata(); ?>

					</div>

					<div class="actualidad__sidebar">
						<h1 class="h2-headline">Topics</h1>
						<div>
							<ul>
								<?php wp_list_categories( array(
							          'title_li' => '',
							          'order'    => 'ASC',
							          'orderby'  => id,
							      ) ); ?>
							</ul>
						</div>
					</div>

				</div>
			</div>
<?php get_footer(); ?>