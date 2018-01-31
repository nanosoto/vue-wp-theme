<?php get_header(); ?>

			<div class="content">
				<div class="actualidad">

					<div class="actualidad__list">
						<h1 class="h2-headline">Actualidad / <?php single_cat_title(); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article class="post-item">
							<a class="post__thumbnail-container" href="<?php the_permalink();?>">
								<?php the_post_thumbnail('full', array('class' => 'post__thumbnail')); ?>
							</a>
							<div class="post__content">
								<ul class="post__tags">
									<li>#<?php 
										$category_detail=get_the_category( $post->ID );//$post->ID
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

						<?php endwhile; ?>
						<?php endif; ?>
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