<?php
/*
Template Name: Menu
*/

class RedRockMenuTemplate {

  function show_menu() {
    get_header();
    echo<<<HTML

<div id="content">
	<div class="wrapper wrapper-main">
		<div id="main">
			<div class="wrapper-content">
        <div class="post-single">

          <div class="column">
HTML;
      
    $this->output_menu('appetizer','Appetizers');
    $this->output_menu('entree','Entreés');
    $this->output_menu('burgers','Burgers');
          
    echo<<<HTML
          </div><!-- column-->
          
          <div class="column">
HTML;
      
    $this->output_menu('sandwiches','Sandwiches');
    $this->output_menu('mac','Mac');
    $this->output_menu('salads','Salads');
          
    echo<<<HTML
          </div><!-- column-->
          <div class="cleaner">&nbsp;</div>
HTML;

    $this->output_sides();

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
  
  
  
  private function output_menu($type = 'appetizer',$title = 'Appetizers'){
echo<<<HTML
            <div class="food-menu rounded3" style="margin-bottom:20px">
              <div class="red-title-bar">
                <div class="title-bar-image"></div>
                <h2>{$title}</h2>
              </div>
              <div class="cleaner">&nbsp;</div>
HTML;


        $args = array (
         'post_type' => $type,
         'post_status' => 'publish',
         'posts_per_page'=>-1,
         'paged' => false,
        );
        $temp = $wp_query; // assign ordinal query to temp variable for later use  
        $wp_query = null;
        $wp_query = new WP_Query($args); 
        if ( $wp_query->have_posts() ) :
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
              $name = the_title( '', '', false );
               echo<<<HTML
                    <div class="menu-item">
                      <h3>{$name}</h3>
                      <div class="description">
HTML;
                        the_content();
echo<<<HTML
                      </div>
                    </div>
                    <div class="cleaner">&nbsp;</div>
HTML;
            endwhile;
        else :
            echo '<h2>Not Found</h2>';
            get_search_form();
        endif;
        $wp_query = $temp;

echo<<<HTML

              <div class="cleaner">&nbsp;</div>
            </div><!-- .food-menu -->
            <div class="cleaner">&nbsp;</div>
HTML;

  }

  private function output_sides($type = 'sides',$title = 'Sides'){
    echo<<<HTML
            <div class="food-menu rounded3" style="margin-bottom:20px">
              <div class="red-title-bar">
                <div class="title-bar-image"></div>
                <h2>{$title}</h2>
              </div>
              <div class="cleaner">&nbsp;</div>


HTML;


        $args = array (
         'post_type' => $type,
         'post_status' => 'publish',
         'posts_per_page'=>-1,
         'paged' => false,
        );
        $temp = $wp_query; // assign ordinal query to temp variable for later use  
        $wp_query = null;
        $wp_query = new WP_Query($args); 
        if ( $wp_query->have_posts() ) :
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
              $name = the_title( '', '', false );
               echo<<<HTML
                    
                    <div style="float:left;width:300px">
                      <h3 >{$name}</h3>
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
            </div><!-- .food-menu -->
            <div class="cleaner">&nbsp;</div>
HTML;

  }
  
}

$redrockmenu = new RedRockMenuTemplate();
$redrockmenu->show_menu();
