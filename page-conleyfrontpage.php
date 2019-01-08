<?php
/**Template Name: Conley Front Page
 **
 */

get_header(); 

?>

<?php
				
					global $paged;  
					    if( get_query_var( 'paged' ) ) {
					        $paged = get_query_var( 'paged' );
					    } elseif( get_query_var( 'page' ) ) {
					        $paged = get_query_var( 'page' );
					    } else {
					        $paged = 1;
					    }

					// The Query

					// $args = array( 'post_type' => 'Persons', 'posts_per_page' => 5, 'paged' => $paged );
					// $the_query = new WP_Query( $args );
					echo '<pre>';

					// print_r($the_query->posts);

					// $arr = $he_query->posts;
					echo "my array";
					// print_r($arr);
					echo '</pre>';



					// $the_query = new WP_Query( $args );
					// echo '<pre>';
					// print_r($the_query->posts);
					// $the_query = $the_query->posts;
					// echo '</pre>';

					echo "end of print r";

				?>

		<?php  //Show the selected frontpage content.
 get_footer();