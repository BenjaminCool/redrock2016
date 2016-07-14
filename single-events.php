<?php get_header(); ?>

<div id="content">
	
	<div class="wrapper wrapper-main">

		<div id="main">
		
			<div class="wrapper-content">
			
				<?php 
				
				    while (have_posts()) : the_post(); 
				
    				  $custom = get_post_custom();
					    $date = new DateTime($custom['event_date'][0]);
                                  $date = $date->format('M d, Y');
                                  if(isset($custom['recurring'][0]) && $custom['recurring'][0] != 'Not Recurring'){
                                      $date = "<span>Every {$custom['recurring'][0]}</span>";
                                  }
				?>
	
				<div class="post-intro">
					<h1 class="title-l title-margin"><?php the_title(); echo " - $date" ?></h1>
					<?php edit_post_link( __('Edit post', 'campus'), '<p class="postmeta">', '</p>'); ?>
				</div><!-- end .post-intro -->
	
				<div class="divider">&nbsp;</div>
	
				<div class="post-single">
				
					<?php the_content(); ?>
					
					<div class="cleaner">&nbsp;</div>
					
					<?php wp_link_pages(array('before' => '<p class="page-navigation"><strong>'.__('Pages', 'campus').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php the_tags( '<p class="post-meta"><strong>'.__('Tags', 'campus').':</strong> ', ', ', '</p>'); ?>
					
				</div><!-- .post-single -->

				<?php endwhile; ?>

        <?
          $args = array(
            'numberposts' => 5,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'exclude' => $post->ID,
            'post_type' => 'events',
            'post_status' => 'publish',
            'suppress_filters' => true );
          
          $recent_posts = wp_get_recent_posts( $args );
          
          foreach( $recent_posts as $recent ) {
		        echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   ( __($recent["post_title"])).'</a> </li> ';
	        }
        
        ?>
				<div id="academia-comments">
					<?php comments_template(); ?>  
				</div><!-- end #academia-comments -->				

			</div><!-- .wrapper-content -->
		
		</div><!-- #main -->
		
		<?php get_sidebar(); ?>
		
		<div class="cleaner">&nbsp;</div>
	</div><!-- .wrapper .wrapper-main -->
	
</div><!-- #content -->

<?php get_footer(); ?>
