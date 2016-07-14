<?php
/*
Template Name: Beer
*/

class RedRockBeerTemplate {

  function show_beer() {
    get_header();
    echo<<<HTML

<div id="content">
	<div class="wrapper wrapper-main">
		<div id="main">
			<div class="wrapper-content">
        <div class="post-single">

HTML;
      
      $this->output_beer();

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
  
  

  private function output_beer(){
    echo<<<HTML
            <div class="food-beer rounded3" style="margin-bottom:20px">
              <div class="red-title-bar">
                <div class="title-bar-image-large"></div>
                <h2>The Beer Enthusiast</h2>
              </div>
              <div class="cleaner">&nbsp;</div>


HTML;


        $args = array (
         'post_type' => 'beer',
         'post_status' => 'publish',
         'paged' => false,
        );
        $temp = $wp_query; // assign ordinal query to temp variable for later use  
        $wp_query = null;
        $wp_query = new WP_Query($args); 
        if ( $wp_query->have_posts() ) :
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
              $name = the_title( '', '', false );
              $link = get_permalink();
               echo<<<HTML
                    <div style="float:left;width:300px">
                      <h4 ><a href="{$link}" rel="bookmark" title="{$name}">{$name}</a></h4>
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
            </div><!-- .food-beer -->
            <div class="cleaner">&nbsp;</div>
HTML;

  }
  
}

$redrockbeer = new RedRockBeerTemplate();
$redrockbeer->show_beer();
