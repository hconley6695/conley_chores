
<?php 

// Custom Post Type People

add_action( 'init', 'create_post_type' );
function create_post_type() {

register_post_type( 'Persons',
        array(
	        'labels' => array(
		        'name' => __( 'persons' ),
		        'singular_name' => __( 'person' ),
		        'menu_name' => __( 'person' ),
		        'name_admin_bar' => __( 'person' ),
		        'all_items' => __( 'All persons' ),
		        'add_new' => __( 'Add New person' ),
		        'new_item' => __( 'Add New person' ),
		        'add_new_item' => __( 'Add New person' ),
		        'edit_item' => __( 'Edit person' ),
		        'view_item' => __( 'View person' ),
	        ),
	        'public' => true,
	        'has_archive' => true,
	        'supports' => array("title", "editor", "thumbnail", "custom-fields","page-attributes"),
	        'menu_icon' => 'dashicons-editor-help',
	        'rewrite' => array('slug' => 'person'),
		)
    );
}


//Enqueue parent style.css
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


// Show posts of 'post', 'page' and 'movie' post types on home page
function add_my_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'Persons' ) );
  return $query;
}
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
?>