<?php
/*
	Template Name: Plantilla Básica
*/
?>

<?php get_header(); ?>

<div class="content hero__two-columns">
    <div class="hero">
      <?php the_post_thumbnail('full', array('class' => 'hero__img')); ?>
      <?php custom_breadcrumbs(); ?>
    </div>
    <div class="sidebar one_third">

	    <?php
			if ( $post->post_parent ) {
			    $children = wp_list_pages( array(
			        'title_li' => '',
			        'child_of' => $post->post_parent,
			        'echo'     => 0,
			        'depth'    => '1',
			    ) );
			} else {
			    $children = wp_list_pages( array(
			        'title_li' => '',
			        'child_of' => $post->ID,
			        'echo'     => 0,
			        'depth'    => '1',
			    ) );
			}
			 
			if ( $children ) : ?>
			    <ul>
			        <?php echo $children; ?>
			    </ul>
		<?php endif; ?>
      
    </div>
    <div class="content two_thirds styled__content">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      	<?php the_content();?>
      
      <?php endwhile; else: endif; ?>
    </div>
</div>

<?php get_footer(); ?>