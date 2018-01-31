<?php

/*  Register Scripts and Style */

function theme_register_scripts() {
    wp_enqueue_style( 'olympos-css', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'theme_register_scripts', 1 );


/* Add menu support */
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

/* Add post image support */
add_theme_support( 'post-thumbnails' );


/* Add custom thumbnail sizes */
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( '300x180', 300, 180, true );
}  

// Allow SVG
function allow_svgimg_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'allow_svgimg_types');


function wpsd_add_location_args() {
    global $wp_post_types;
 
    $wp_post_types['location']->show_in_rest = true;
    $wp_post_types['location']->rest_base = 'location';
    $wp_post_types['location']->rest_controller_class = 'WP_REST_Posts_Controller';
}
add_action( 'init', 'wpsd_add_location_args', 30 );


/*  EXCERPT 
    Usage:
    
    <?php echo excerpt(100); ?>
*/

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
    } else {
    $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

function wpsd_add_event_args() {
    global $wp_post_types;
 
    $wp_post_types['event']->show_in_rest = true;
    $wp_post_types['event']->rest_base = 'event';
    $wp_post_types['event']->rest_controller_class = 'WP_REST_Posts_Controller';
}
add_action( 'init', 'wpsd_add_event_args', 30 );

// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $breadcrums_class   = 'breadcrumbs';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul class="' . $breadcrums_class . '">';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li>' . post_type_archive_title($prefix, false) . '</li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li><a href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li>' . $custom_tax_name . '</li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li><a href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li>' . get_the_title() . '</li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li><a href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li">' . get_the_title() . '</li>';
              
            } else {
                  
                echo '<li>' . get_the_title() . '</li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li>' . single_cat_title('', false) . '</li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li><a href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="active"><span class="text-wrapper"><span class="letters">' . get_the_title() . '</span></span></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="active"><span class="text-wrapper"><span class="letters">' . get_the_title() . '</li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li>' . $get_term_name . '</li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li><a href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month link
            echo '<li><a href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
               
            // Day display
            echo '<li>' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li><a href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month display
            echo '<li>' . get_the_time('M') . ' Archives</li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li>' . get_the_time('Y') . ' Archives</li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li>' . 'Author: ' . $userdata->display_name . '</li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li>'.__('Page') . ' ' . get_query_var('paged') . '</li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li>Search results for: ' . get_search_query() . '</li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

/** Data from API **/
function prepare_rest($data, $post, $request){
    $_data = $data->data;

    //Thumbnails
    $thumbnail_id = get_post_thumbnail_id( $post->ID );
    $thumbnail300x800 = wp_get_attachment_image_src( $thumbnail_id, '300x180' );
    $full = wp_get_attachment_image_src( $thumbnail_id, 'full' );

    //Categories
    $cats = get_the_category( $post->ID );

    //next/prev
    $nextPost = get_adjacent_post(false, '', true);
    $nextPost = $nextPost->ID;

    $prevPost = get_adjacent_post(false, '', false);
    $prevPost = $prevPost->ID;

    $_data['fi_300x180'] = $thumbnail300x800[0];
    $_data['full'] = $full[0];
    $_data['cats'] = $cats;
    $_data['next_post'] = $nextPost;
    $_data['previous_post'] = $prevPost;
    $data->data = $_data;

    return $data;
}
add_filter('rest_prepare_post', 'prepare_rest', 10, 3);

/** Get main menu from API **/
function get_menu() {
    return wp_get_nav_menu_items('main');
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'myroutes', '/menu', array(
        'methods' => 'GET',
        'callback' => 'get_menu',
    ) );
} );

/** Get full size thumbnail to page **/
add_action( 'rest_api_init', 'add_thumbnail_to_page' );

function add_thumbnail_to_page() {
register_rest_field( 'page',
    'full',
    array(
        'get_callback'    => 'get_image_src',
        'update_callback' => null,
        'schema'          => null,
         )
    );
}

function get_image_src( $object, $field_name, $request ) {
    $feat_img_array = wp_get_attachment_image_src($object['featured_media'], 'full', true);
    return $feat_img_array[0];
}

/** Get full size thumbnail to page **/
add_action( 'rest_api_init', 'has_children_to_page' );

function has_children_to_page() {
register_rest_field( 'page',
    'has_children',
    array(
        'get_callback'    => 'has_children',
        'update_callback' => null,
        'schema'          => null,
         )
    );
}

function has_children( $object, $field_name, $request ) {

    $args = array(
        'post_parent' => get_the_ID(), // Current post's ID
    );
    $children = get_children( $args );
    
    if ( ! empty($children) ) {
        return true;
    } else {
        return false;
    }
}

/** Getting author meta from single post **/
function get_author_meta($object, $field_name, $request) {
    $user_data = get_userdata($object['author']); // get user data from author ID.
    $array_data = (array)($user_data->data); // object to array conversion.
    $array_data['description'] = get_user_meta($object['author'], 'description', true);
    // prevent user enumeration.
    unset($array_data['user_login']);
    unset($array_data['user_pass']);
    unset($array_data['user_activation_key']);
    unset($array_data['ID']);
    unset($array_data['user_nicename']);
    unset($array_data['user_registered']);
    return array_filter($array_data);
}

function register_author_meta_rest_field() {
    register_rest_field('post', 'author_meta', array(
        'get_callback'    => 'get_author_meta',
        'update_callback' => null,
        'schema'          => null,
    ));
}
add_action('rest_api_init', 'register_author_meta_rest_field');

/*******************************************************************************/

function list_subpages( $request ) {

   $id = (string) $request['id'];
   $subpages = get_posts( array( 'post_parent' => $id, 'post_type' => 'page', 'posts_per_page' => -1) );

   if ( empty( $subpages ) ) {
       return null;
   }

   foreach ($subpages as $p) {

   }

   return rest_ensure_response( $subpages );
}

function prefix_register_product_routes() {
    // Here we are registering our route for a collection of products.
    register_rest_route( 'wp/v2', '/get_children_of', array(
        // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
        'methods'  => 'GET',
        // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        'callback' => 'list_subpages',
    ) );
    // Here we are registering our route for single products. The (?P<id>[\d]+) is our path variable for the ID, which, in this example, can only be some form of positive number.
    register_rest_route( 'wp/v2', '/get_children_of/(?P<id>[\d]+)', array(
        // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
        'methods'  => 'GET',
        // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        'callback' => 'list_subpages',
    ) );
}
add_action( 'rest_api_init', 'prefix_register_product_routes' );

/*******************************************************************************/

/*******************************************************************************/

function list_events( $request ) {

   $events = EM_Events::get(array('scope'=>'future'));

   if ( empty( $events ) ) {
       return null;
   }

   foreach ($events as $p) {

   }

   return rest_ensure_response( $events );
}

function prefix_register_list_events_routes() {
    // Here we are registering our route for a collection of products.
    register_rest_route( 'wp/v2', '/list_events', array(
        // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
        'methods'  => 'GET',
        // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        'callback' => 'list_events',
    ) );
}
add_action( 'rest_api_init', 'prefix_register_list_events_routes' );

/*******************************************************************************/

/*******************************************************************************/

function events_calendar( $request ) {

   $calendar = EM_Calendar::output();

   if ( empty( $calendar ) ) {
       return null;
   }

   foreach ($calendar as $p) {

   }

   return rest_ensure_response( $calendar );
}

function prefix_register_events_calendar_routes() {
    // Here we are registering our route for a collection of products.
    register_rest_route( 'wp/v2', '/events_calendar', array(
        // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
        'methods'  => 'GET',
        // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        'callback' => 'events_calendar',
    ) );
}
add_action( 'rest_api_init', 'prefix_register_events_calendar_routes' );

/*******************************************************************************/


?>