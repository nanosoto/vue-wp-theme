<?php get_header(); ?>

  <div class="content">
    <div v-if="post" class="single-post">
      <div class="single-post__thumbnail-container">
        <div :speedFactor="0.30" :sectionClass="single-post__thumbnail-container__parallax" :containerClass="single-post__thumbnail__parallax">
          <?php the_post_thumbnail('full', array('class' => 'single-post__thumbnail')); ?>
        </div>
      </div>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="single-post__details-bar">
        <div class="single-post__info">
          <p>Por <a href="mailto:<?php echo get_the_author_meta('user_email', $author_id);?>"><?php echo get_the_author_meta('display_name', $author_id);?></a></p>
          <p><?php echo get_the_author_meta('user_description', $author_id);?></p>
        </div>
        <post-actions></post-actions>
      </div>
      <div class="single-post__content styled__content">
        <h1 class="single-post__title"><?php the_title( ); ?></h1>
        <h3 class="single-post__subtitle"><?php echo get_the_excerpt(); ?></h3>
        <div class="single-post__body"><?php the_content(); ?></div>
      </div>

      <?php endwhile; else: endif; ?>
    </div>
  </div>
	
<?php get_footer(); ?>