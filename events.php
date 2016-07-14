<?php
/*
Template Name: Events
*/

class RedRockEventsTemplate {

  function show_events() {
    get_header();
    echo<<<HTML

<div id="content">
	<div class="wrapper wrapper-main">
		<div id="main">
			<div class="wrapper-content">
        <div class="post-single">

HTML;
      
      $this->output_events();

echo<<<HTML
        </div><!--post single-->
      </div><!-- .wrapper-content -->
		</div><!-- #main -->
		<div class="cleaner">&nbsp;</div>
	</div><!-- .wrapper .wrapper-main -->
</div><!-- #content -->

HTML;
    get_footer();
  }
  
  

  private function output_events(){
    echo<<<HTML
            <div class="food-menu rounded3" style="margin-bottom:20px">
              <div class="red-title-bar">
                <div class="title-bar-image"></div>
                <h2>Events</h2>
              </div>
              <div class="cleaner">&nbsp;</div>


HTML;


        $args = array (
         'post_type' => 'events',
         'post_status' => 'publish',
         'paged' => false,
         'posts_per_page' => 10
        );
        $temp = $wp_query; // assign ordinal query to temp variable for later use  
        $wp_query = null;
        $wp_query = new WP_Query($args); 
        if ( $wp_query->have_posts() ) :
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
              $name = the_title( '', '', false );
              $link = get_permalink();
              $custom = get_post_custom();
              
                                            $date = new DateTime($custom['event_date'][0]);
                                  $date = $date->format('M d, Y');
                                  if(isset($custom['recurring'][0]) && $custom['recurring'][0] != 'Not Recurring'){
                                      $date = "<span>Every {$custom['recurring'][0]}</span>";
                                  }


              echo<<<HTML
                    <div style="clear:both; padding:10px;">
                      <h4 ><a href="{$link}" rel="bookmark" title="{$name}">{$name}</a> - {$date}</h4>
                    </div>
                    
HTML;
            endwhile;
        else :
            echo '<h2>Not Found</h2>';
            get_search_form();
        endif;
        $wp_query = $temp;

echo<<<HTML

              <div class="cleaner">&nbsp;</div>
            </div><!-- .food-events -->
            <div class="cleaner">&nbsp;</div>
HTML;

  }
  
}

$redrockevents = new RedRockEventsTemplate();
$redrockevents->show_events();
