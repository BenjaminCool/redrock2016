<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 */

get_header();

	echo "<div class=\"container\">";
    
	while ( have_posts() ) {
		the_post();
      		// Include the page content template.
      		get_template_part( 'template-parts/content', 'page' );
    	}
	echo "</div>";
 get_footer(); ?>
