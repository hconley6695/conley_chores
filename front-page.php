<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); 

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

<?php

		// The Query
		$args = array( 'post_type' => 'Persons' );
		$the_query = new WP_Query( $args );
?>

		<div class="body-wrapper">
			<h1>Conley Family Chores</h1>
			<section>
			<!-- wordpress loop -->
				<ul class="user-list">

				<?php // The Loop

					while ( $the_query->have_posts() ) : $the_query->the_post();
					  echo '<li class="single-user">';
					  echo '<a href="'. get_the_permalink() . '">';
					  echo '<img src="' . get_the_post_thumbnail();
					  echo '</a>';

					  echo '</li>';
					  // echo '<div class="title">' . get_the_title() . '</div>';
					endwhile;

					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );
			?>

				</ul>
			</section>

<!-- 			<section class="section1">
				<div class="class1"></div>
				<div class="class2"></div>
				<div class="class3"></div>
				<div class="class4"></div>
				<div class="class5"></div>
				<div class="class6"></div>
				<div class="class7"></div>
			</section> -->
<!-- 			<section class="section2">
				<div class="class1"></div>
				<div class="class2"></div>
				<div class="class3"></div>
				<div class="class4"></div>
				<div class="class5"></div>
				<div class="class6"></div>
				<div class="class7"></div>
			</section> -->
		</div>

		<?php  //Show the selected frontpage content.
		 // if ( have_posts() ) :
			//  while ( have_posts() ) : the_post();
			// 	 get_template_part( 'template-parts/page/content', 'front-page' );
			//  endwhile;
		 // else :
			//  get_template_part( 'template-parts/post/content', 'none' );
		 // endif; ?> 

		<?php
		// Get each of our panels and show the post data.
		if ( 0 !== twentyseventeen_panel_count() || is_customize_preview() ) : // If we have pages to show.

			/**
			 * Filter number of front page sections in Twenty Seventeen.
			 *
			 * @since Twenty Seventeen 1.0
			 *
			 * @param int $num_sections Number of front page sections.
			 */
			$num_sections = apply_filters( 'twentyseventeen_front_page_sections', 4 );
			global $twentyseventeencounter;

			// Create a setting and control for each of the sections available in the theme.
			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
				$twentyseventeencounter = $i;
				twentyseventeen_front_page_section( null, $i );
			}

	endif; // The if ( 0 !== twentyseventeen_panel_count() ) ends here. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php //get_footer();
